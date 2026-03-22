/**
 * Gaming Portal — Auth + Game Progress
 * Uses WordPress AJAX (gpData.ajaxUrl injected via wp_localize_script)
 */
(function () {
    'use strict';

    /* ------------------------------------------------------------------ */
    /* Helpers                                                              */
    /* ------------------------------------------------------------------ */
    function qs(sel, ctx) { return (ctx || document).querySelector(sel); }
    function ajax(action, data, cb) {
        var fd = new FormData();
        fd.append('action', action);
        fd.append('nonce', gpData.nonce);
        Object.keys(data).forEach(function (k) { fd.append(k, data[k]); });

        fetch(gpData.ajaxUrl, { method: 'POST', body: fd, credentials: 'same-origin' })
            .then(function (r) { return r.json(); })
            .then(cb)
            .catch(function () { cb({ success: false, data: { message: 'Network error. Please try again.' } }); });
    }

    /* ------------------------------------------------------------------ */
    /* Auth Modal                                                           */
    /* ------------------------------------------------------------------ */
    var modal = qs('#gpAuthModal');
    var overlay = qs('#gpAuthOverlay');

    function openModal(tab) {
        if (!modal) return;
        modal.classList.add('is-open');
        document.body.style.overflow = 'hidden';
        if (tab) switchTab(tab);
    }
    function closeModal() {
        if (!modal) return;
        modal.classList.remove('is-open');
        document.body.style.overflow = '';
        clearMessages();
    }

    // Open modal on login button click
    var loginBtn = qs('#gpLoginBtn');
    if (loginBtn) loginBtn.addEventListener('click', function () { openModal('login'); });

    // Mobile login button
    var loginBtnMobile = qs('#gpLoginBtnMobile');
    if (loginBtnMobile) loginBtnMobile.addEventListener('click', function () { openModal('login'); });

    // Mobile logout button
    var logoutBtnMobile = qs('#gpLogoutBtnMobile');
    if (logoutBtnMobile) {
        logoutBtnMobile.addEventListener('click', function (e) {
            e.preventDefault();
            ajax('gp_logout', {}, function () { window.location.reload(); });
        });
    }

    // Close on overlay / ESC
    if (overlay) overlay.addEventListener('click', closeModal);
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeModal(); });

    // Close button inside modal
    var closeBtns = document.querySelectorAll('.gp-auth-close');
    closeBtns.forEach(function (b) { b.addEventListener('click', closeModal); });

    /* Tab switching */
    function switchTab(tab) {
        document.querySelectorAll('.gp-auth-tab').forEach(function (t) {
            t.classList.toggle('active', t.dataset.tab === tab);
        });
        document.querySelectorAll('.gp-auth-panel').forEach(function (p) {
            p.classList.toggle('active', p.dataset.panel === tab);
        });
        clearMessages();
    }
    document.querySelectorAll('.gp-auth-tab').forEach(function (t) {
        t.addEventListener('click', function () { switchTab(this.dataset.tab); });
    });

    /* Tab-links inside forms ("Register here" / "Login here") */
    document.querySelectorAll('.gp-auth-tab-link').forEach(function (btn) {
        btn.addEventListener('click', function () { switchTab(this.dataset.tab); });
    });

    /* Password show/hide toggle */
    document.querySelectorAll('.gp-pw-toggle').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var input = this.previousElementSibling;
            if (!input) return;
            input.type = input.type === 'password' ? 'text' : 'password';
            this.textContent = input.type === 'password' ? '👁' : '🙈';
        });
    });

    /* Messages */
    function showMessage(formId, msg, isError) {
        var el = qs('#' + formId + ' .gp-auth-msg');
        if (!el) return;
        el.textContent = msg;
        el.className = 'gp-auth-msg ' + (isError ? 'error' : 'success');
    }
    function clearMessages() {
        document.querySelectorAll('.gp-auth-msg').forEach(function (el) {
            el.textContent = ''; el.className = 'gp-auth-msg';
        });
    }

    /* ------------------------------------------------------------------ */
    /* LOGIN FORM                                                           */
    /* ------------------------------------------------------------------ */
    var loginForm = qs('#gpLoginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var btn = qs('#gpLoginForm .gp-auth-submit');
            btn.disabled = true; btn.textContent = 'Logging in…';

            ajax('gp_login', {
                username: loginForm.querySelector('[name=username]').value.trim(),
                password: loginForm.querySelector('[name=password]').value,
                remember: loginForm.querySelector('[name=remember]') && loginForm.querySelector('[name=remember]').checked ? 1 : 0,
            }, function (res) {
                btn.disabled = false; btn.textContent = 'Login';
                if (res.success) {
                    showMessage('gpLoginForm', '✅ ' + res.data.message, false);
                    setTimeout(function () { window.location.reload(); }, 800);
                } else {
                    showMessage('gpLoginForm', '❌ ' + (res.data ? res.data.message : 'Login failed.'), true);
                }
            });
        });
    }

    /* ------------------------------------------------------------------ */
    /* REGISTER FORM                                                        */
    /* ------------------------------------------------------------------ */
    var regForm = qs('#gpRegForm');
    if (regForm) {
        regForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var btn = qs('#gpRegForm .gp-auth-submit');
            btn.disabled = true; btn.textContent = 'Creating account…';

            ajax('gp_register', {
                username: regForm.querySelector('[name=username]').value.trim(),
                email:    regForm.querySelector('[name=email]').value.trim(),
                password: regForm.querySelector('[name=password]').value,
                confirm:  regForm.querySelector('[name=confirm]').value,
            }, function (res) {
                btn.disabled = false; btn.textContent = 'Create Account';
                if (res.success) {
                    showMessage('gpRegForm', '✅ ' + res.data.message, false);
                    setTimeout(function () { window.location.reload(); }, 1000);
                } else {
                    showMessage('gpRegForm', '❌ ' + (res.data ? res.data.message : 'Registration failed.'), true);
                }
            });
        });
    }

    /* ------------------------------------------------------------------ */
    /* USER DROPDOWN (logged-in state)                                      */
    /* ------------------------------------------------------------------ */
    var userDropTrigger = qs('#gpUserDropTrigger');
    var userDrop = qs('#gpUserDrop');
    if (userDropTrigger && userDrop) {
        userDropTrigger.addEventListener('click', function (e) {
            e.stopPropagation();
            userDrop.classList.toggle('is-open');
        });
        document.addEventListener('click', function () {
            if (userDrop) userDrop.classList.remove('is-open');
        });
    }

    /* LOGOUT */
    var logoutBtn = qs('#gpLogoutBtn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function (e) {
            e.preventDefault();
            ajax('gp_logout', {}, function () {
                window.location.reload();
            });
        });
    }

    /* ------------------------------------------------------------------ */
    /* GAME PROGRESS — Load on page ready                                   */
    /* ------------------------------------------------------------------ */
    var progressSection = qs('#gpProgressSection');
    if (progressSection && gpData.isLoggedIn) {
        loadProgress();
    }

    function loadProgress() {
        ajax('gp_get_progress', {}, function (res) {
            if (!res.success) return;
            var progress = res.data.progress;
            var gamesMeta = {
                snake:    { icon: '🐍', name: 'Snake' },
                tetris:   { icon: '🟦', name: 'Tetris' },
                memory:   { icon: '🃏', name: 'Memory' },
                '2048':   { icon: '🔢', name: '2048' },
                breakout: { icon: '🧱', name: 'Breakout' },
                tictactoe:{ icon: '✕', name: 'Tic-Tac-Toe' },
            };
            var grid = qs('#gpProgressGrid');
            if (!grid) return;
            grid.innerHTML = '';
            Object.keys(gamesMeta).forEach(function (id) {
                var meta = gamesMeta[id];
                var p = progress[id] || { highScore: 0, gamesPlayed: 0, lastPlayed: null };
                var lastP = p.lastPlayed ? new Date(p.lastPlayed).toLocaleDateString() : 'Never';
                var card = document.createElement('div');
                card.className = 'gp-prog-card' + (p.gamesPlayed > 0 ? ' played' : '');
                card.innerHTML =
                    '<div class="gp-prog-icon">' + meta.icon + '</div>' +
                    '<div class="gp-prog-name">' + meta.name + '</div>' +
                    '<div class="gp-prog-stats">' +
                        '<div class="gp-prog-stat"><span class="gp-prog-val">' + (p.highScore || 0) + '</span><span class="gp-prog-lbl">High Score</span></div>' +
                        '<div class="gp-prog-stat"><span class="gp-prog-val">' + (p.gamesPlayed || 0) + '</span><span class="gp-prog-lbl">Played</span></div>' +
                    '</div>' +
                    '<div class="gp-prog-last">Last: ' + lastP + '</div>';
                grid.appendChild(card);
            });
        });
    }

    /* ------------------------------------------------------------------ */
    /* SAVE PROGRESS — called when game modal closes                        */
    /* ------------------------------------------------------------------ */
    window.gpSaveProgress = function (gameId, score) {
        if (!gpData.isLoggedIn) return;
        ajax('gp_save_progress', {
            game_id: gameId,
            score: score || 0,
            played: 1,
        }, function (res) {
            if (res.success) loadProgress();
        });
    };

    /* Listen for postMessage from game iframes (score reports) */
    window.addEventListener('message', function (e) {
        if (!e.data || e.data.type !== 'gpScore') return;
        if (e.data.gameId && gpData.isLoggedIn) {
            window.gpSaveProgress(e.data.gameId, e.data.score || 0);
        }
    });

})();
