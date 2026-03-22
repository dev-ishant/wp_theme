<?php get_header(); ?>

<!-- ============================================================
     GAMING PORTAL FRONT PAGE
     Game cards open in an iframe modal. To add or change games:
       - Edit the $games array below
       - Set 'src' to your game's embed URL (iframe src)
============================================================ -->

<?php
$template_uri = get_template_directory_uri();

$games = [
    [
        'id'      => 'snake',
        'title'   => 'Snake',
        'genre'   => 'Classic Arcade',
        'players' => '42.1K',
        'rating'  => '4.7',
        'tag'     => 'HOT',
        'img'     => $template_uri . '/images/game-snake.png',
        'color'   => 'linear-gradient(135deg,#0f4c1a,#00ff6a22)',
        'src'     => $template_uri . '/games/snake.html',
        'desc'    => 'The classic snake game — eat, grow, and don\'t hit yourself!',
    ],
    [
        'id'      => 'tetris',
        'title'   => 'Tetris',
        'genre'   => 'Puzzle',
        'players' => '38.5K',
        'rating'  => '4.9',
        'tag'     => 'TOP',
        'img'     => $template_uri . '/images/game-tetris.png',
        'color'   => 'linear-gradient(135deg,#1a0a4c,#a64eff22)',
        'src'     => $template_uri . '/games/tetris.html',
        'desc'    => 'Stack the falling blocks and clear lines in this timeless puzzle classic.',
    ],
    [
        'id'      => 'memory',
        'title'   => 'Memory Match',
        'genre'   => 'Brain Teaser',
        'players' => '19.8K',
        'rating'  => '4.6',
        'tag'     => 'NEW',
        'img'     => '',
        'color'   => 'linear-gradient(135deg,#1a0a4c,#a64eff44)',
        'src'     => $template_uri . '/games/memory.html',
        'desc'    => 'Flip cards and match emoji pairs before your memory runs out!',
    ],
    [
        'id'      => '2048',
        'title'   => '2048',
        'genre'   => 'Puzzle',
        'players' => '27.3K',
        'rating'  => '4.8',
        'tag'     => 'HOT',
        'img'     => '',
        'color'   => 'linear-gradient(135deg,#1a0e00,#ffd20033)',
        'src'     => $template_uri . '/games/2048.html',
        'desc'    => 'Slide tiles and merge numbers to reach the legendary 2048 tile!',
    ],
    [
        'id'      => 'breakout',
        'title'   => 'Breakout',
        'genre'   => 'Arcade',
        'players' => '15.2K',
        'rating'  => '4.5',
        'tag'     => '',
        'img'     => '',
        'color'   => 'linear-gradient(135deg,#1a0000,#ff4b4b33)',
        'src'     => $template_uri . '/games/breakout.html',
        'desc'    => 'Break all the bricks with your ball. Don\'t let it fall!',
    ],
    [
        'id'      => 'tictactoe',
        'title'   => 'Tic-Tac-Toe',
        'genre'   => '2 Player',
        'players' => '11.7K',
        'rating'  => '4.4',
        'tag'     => '',
        'img'     => '',
        'color'   => 'linear-gradient(135deg,#001a1a,#4ecdc433)',
        'src'     => $template_uri . '/games/tictactoe.html',
        'desc'    => 'Challenge a friend! First to get 3 in a row wins.',
    ],
];
?>

<!-- ===== HERO ===== -->
<section class="gp-hero">
    <div class="gp-hero-bg"></div>
    <div class="gp-hero-particles" id="gpParticles"></div>
    <div class="gp-hero-content">
        <div class="gp-hero-badge">🎮 Free to Play · No Download</div>
        <h1 class="gp-hero-title">Play <span class="gp-accent">Mini Games</span><br>Right in Your Browser</h1>
        <p class="gp-hero-sub">Jump into dozens of byte-sized games — no installs, no accounts, just pure fun.</p>
        <div class="gp-hero-stats">
            <div class="gp-stat"><span class="gp-stat-num">6+</span><span class="gp-stat-label">Games</span></div>
            <div class="gp-stat-divider"></div>
            <div class="gp-stat"><span class="gp-stat-num">100K+</span><span class="gp-stat-label">Players</span></div>
            <div class="gp-stat-divider"></div>
            <div class="gp-stat"><span class="gp-stat-num">Free</span><span class="gp-stat-label">Forever</span></div>
        </div>
        <a href="#games" class="gp-btn-primary">Browse Games ↓</a>
    </div>
</section>

<!-- ===== MY PROGRESS (Logged-in only) ===== -->
<?php if ( is_user_logged_in() ) : $curr = wp_get_current_user(); ?>
<section class="gp-progress-section" id="gpProgressSection">
    <div class="gp-section-header">
        <h2>📊 My Progress</h2>
        <p>Hey <strong style="color:#00d4ff"><?php echo esc_html($curr->display_name); ?></strong> — here's how you're doing!</p>
    </div>
    <div class="gp-prog-grid" id="gpProgressGrid">
        <!-- Cards populated via JS (AJAX gp_get_progress) -->
        <div class="gp-prog-loading">Loading your stats…</div>
    </div>
</section>
<?php endif; ?>

<!-- ===== GAME CARDS GRID ===== -->
<section class="gp-games-section" id="games">
    <div class="gp-section-header">
        <h2>🕹️ Featured Games</h2>
        <p>Pick a game and start playing instantly</p>
    </div>

    <div class="gp-grid">
        <?php foreach ($games as $game) : ?>
        <div class="gp-card" data-game-id="<?php echo esc_attr($game['id']); ?>">
            <!-- Thumbnail -->
            <div class="gp-card-thumb" style="background: <?php echo $game['color']; ?>">
                <?php if (!empty($game['img'])) : ?>
                    <img src="<?php echo esc_url($game['img']); ?>" alt="<?php echo esc_attr($game['title']); ?>" loading="lazy">
                <?php else : ?>
                    <div class="gp-thumb-placeholder">
                        <span class="gp-thumb-icon">🎮</span>
                    </div>
                <?php endif; ?>
                <?php if (!empty($game['tag'])) : ?>
                    <span class="gp-badge gp-badge--<?php echo strtolower($game['tag']); ?>"><?php echo $game['tag']; ?></span>
                <?php endif; ?>
                <div class="gp-card-overlay">
                    <button class="gp-play-btn" data-src="<?php echo esc_url($game['src']); ?>" data-title="<?php echo esc_attr($game['title']); ?>">
                        <svg viewBox="0 0 24 24" fill="currentColor" width="28" height="28"><path d="M8 5v14l11-7z"/></svg>
                        Play Now
                    </button>
                </div>
            </div>

            <!-- Info -->
            <div class="gp-card-info">
                <div class="gp-card-meta">
                    <span class="gp-genre"><?php echo esc_html($game['genre']); ?></span>
                    <span class="gp-rating">⭐ <?php echo esc_html($game['rating']); ?></span>
                </div>
                <h3 class="gp-card-title"><?php echo esc_html($game['title']); ?></h3>
                <p class="gp-card-desc"><?php echo esc_html($game['desc']); ?></p>
                <div class="gp-card-footer">
                    <span class="gp-players">👥 <?php echo esc_html($game['players']); ?> playing</span>
                    <button class="gp-quick-play" data-src="<?php echo esc_url($game['src']); ?>" data-title="<?php echo esc_attr($game['title']); ?>">Play →</button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ===== GAME MODAL ===== -->
<div class="gp-modal" id="gpModal" role="dialog" aria-modal="true" aria-label="Game Player">
    <div class="gp-modal-backdrop" id="gpModalBackdrop"></div>
    <div class="gp-modal-box">
        <div class="gp-modal-header">
            <span class="gp-modal-title" id="gpModalTitle">Game</span>
            <div class="gp-modal-controls">
                <button class="gp-modal-fullscreen" id="gpFullscreen" title="Fullscreen">⛶</button>
                <button class="gp-modal-close" id="gpModalClose" title="Close">✕</button>
            </div>
        </div>
        <div class="gp-modal-body">
            <iframe id="gpGameFrame" src="" allowfullscreen frameborder="0" title="Game"></iframe>
        </div>
    </div>
</div>

<!-- ===== STYLES ===== -->
<style>
/* ---------- Reset & shared ---------- */
.gp-accent { background: linear-gradient(90deg,#00d4ff,#4ecdc4); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }

/* ---------- HERO ---------- */
.gp-hero {
    position: relative;
    min-height: 88vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    overflow: hidden;
    padding: 80px 24px 60px;
}
.gp-hero-bg {
    position: absolute; inset: 0;
    background: radial-gradient(ellipse 80% 60% at 50% 40%, rgba(0,212,255,0.08) 0%, transparent 70%),
                radial-gradient(ellipse 40% 40% at 80% 70%, rgba(78,205,196,0.06) 0%, transparent 60%);
}
.gp-hero-particles { position: absolute; inset: 0; pointer-events: none; overflow: hidden; }
.gp-particle {
    position: absolute;
    width: 2px; height: 2px;
    border-radius: 50%;
    background: #00d4ff;
    animation: floatUp linear infinite;
    opacity: 0;
}
@keyframes floatUp {
    0%   { transform: translateY(0) scale(1); opacity: 0; }
    10%  { opacity: 0.6; }
    90%  { opacity: 0.3; }
    100% { transform: translateY(-100vh) scale(0.5); opacity: 0; }
}
.gp-hero-content { position: relative; z-index: 2; max-width: 760px; }
.gp-hero-badge {
    display: inline-block;
    border: 1px solid rgba(0,212,255,0.35);
    background: rgba(0,212,255,0.08);
    color: #00d4ff;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 1px;
    padding: 6px 18px;
    border-radius: 999px;
    margin-bottom: 24px;
    text-transform: uppercase;
}
.gp-hero-title {
    font-size: clamp(36px, 6vw, 64px);
    font-weight: 800;
    line-height: 1.15;
    margin: 0 0 18px;
    color: #fff;
}
.gp-hero-sub { font-size: 18px; color: rgba(255,255,255,0.55); margin-bottom: 36px; line-height: 1.6; }
.gp-hero-stats { display: flex; justify-content: center; align-items: center; gap: 24px; margin-bottom: 40px; flex-wrap: wrap; }
.gp-stat { display: flex; flex-direction: column; align-items: center; }
.gp-stat-num { font-size: 28px; font-weight: 800; color: #fff; }
.gp-stat-label { font-size: 12px; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 1px; }
.gp-stat-divider { width: 1px; height: 40px; background: rgba(255,255,255,0.12); }
.gp-btn-primary {
    display: inline-block;
    padding: 14px 36px;
    background: linear-gradient(90deg, #00d4ff, #4ecdc4);
    color: #0a0a0a;
    font-weight: 700;
    font-size: 15px;
    text-decoration: none;
    border-radius: 999px;
    transition: all 0.3s ease;
    box-shadow: 0 0 30px rgba(0,212,255,0.3);
}
.gp-btn-primary:hover { transform: translateY(-2px); box-shadow: 0 0 45px rgba(0,212,255,0.5); }

/* ---------- GAMES SECTION ---------- */
.gp-games-section { padding: 60px 40px 100px; max-width: 1280px; margin: 0 auto; }
.gp-section-header { text-align: center; margin-bottom: 50px; }
.gp-section-header h2 { font-size: 36px; font-weight: 800; color: #fff; margin: 0 0 10px; }
.gp-section-header p { color: rgba(255,255,255,0.45); font-size: 15px; }

/* ---------- GRID ---------- */
.gp-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 28px;
}

/* ---------- CARD ---------- */
.gp-card {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 16px;
    overflow: hidden;
    transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}
.gp-card:hover {
    transform: translateY(-6px);
    border-color: rgba(0,212,255,0.3);
    box-shadow: 0 16px 48px rgba(0,0,0,0.4), 0 0 0 1px rgba(0,212,255,0.1);
}

/* Thumbnail */
.gp-card-thumb {
    position: relative;
    height: 200px;
    overflow: hidden;
}
.gp-card-thumb img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}
.gp-card:hover .gp-card-thumb img { transform: scale(1.06); }
.gp-thumb-placeholder {
    width: 100%; height: 100%;
    display: flex; align-items: center; justify-content: center;
}
.gp-thumb-icon { font-size: 64px; opacity: 0.4; }

/* Badge */
.gp-badge {
    position: absolute; top: 12px; left: 12px;
    font-size: 10px; font-weight: 800;
    letter-spacing: 1px; padding: 4px 10px;
    border-radius: 999px; text-transform: uppercase;
}
.gp-badge--hot  { background: #ff4b4b; color: #fff; }
.gp-badge--top  { background: linear-gradient(90deg,#f7971e,#ffd200); color: #000; }
.gp-badge--new  { background: linear-gradient(90deg,#4ecdc4,#00d4ff); color: #000; }

/* Overlay play button */
.gp-card-overlay {
    position: absolute; inset: 0;
    background: rgba(0,0,0,0.6);
    display: flex; align-items: center; justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    backdrop-filter: blur(4px);
}
.gp-card:hover .gp-card-overlay { opacity: 1; }
.gp-play-btn {
    display: flex; align-items: center; gap: 10px;
    padding: 14px 28px;
    background: linear-gradient(90deg,#00d4ff,#4ecdc4);
    color: #0a0a0a; font-weight: 800; font-size: 15px;
    border: none; border-radius: 999px; cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.gp-play-btn:hover { transform: scale(1.05); box-shadow: 0 0 30px rgba(0,212,255,0.5); }

/* Card info */
.gp-card-info { padding: 20px; }
.gp-card-meta { display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; }
.gp-genre { font-size: 11px; color: #00d4ff; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }
.gp-rating { font-size: 12px; color: rgba(255,255,255,0.5); }
.gp-card-title { font-size: 20px; font-weight: 700; color: #fff; margin: 0 0 8px; }
.gp-card-desc { font-size: 13px; color: rgba(255,255,255,0.45); line-height: 1.6; margin: 0 0 16px; }
.gp-card-footer { display: flex; align-items: center; justify-content: space-between; }
.gp-players { font-size: 12px; color: rgba(255,255,255,0.35); }
.gp-quick-play {
    padding: 8px 18px;
    border: 1px solid rgba(0,212,255,0.4);
    background: rgba(0,212,255,0.08);
    color: #00d4ff;
    font-weight: 700; font-size: 13px;
    border-radius: 999px; cursor: pointer;
    transition: all 0.2s ease;
}
.gp-quick-play:hover { background: rgba(0,212,255,0.2); border-color: #00d4ff; }

/* ---------- MODAL ---------- */
.gp-modal {
    display: none;
    position: fixed; inset: 0; z-index: 9999;
    align-items: center; justify-content: center;
}
.gp-modal.is-open { display: flex; }
.gp-modal-backdrop {
    position: absolute; inset: 0;
    background: rgba(0,0,0,0.85);
    backdrop-filter: blur(8px);
    cursor: pointer;
}
.gp-modal-box {
    position: relative; z-index: 2;
    width: min(90vw, 1000px);
    height: min(85vh, 680px);
    background: #0e0e1a;
    border: 1px solid rgba(0,212,255,0.2);
    border-radius: 16px;
    overflow: hidden;
    display: flex; flex-direction: column;
    box-shadow: 0 0 80px rgba(0,212,255,0.1), 0 40px 80px rgba(0,0,0,0.6);
    animation: modalIn 0.3s ease;
}
@keyframes modalIn {
    from { transform: scale(0.92) translateY(20px); opacity: 0; }
    to   { transform: scale(1) translateY(0); opacity: 1; }
}
.gp-modal-header {
    display: flex; align-items: center; justify-content: space-between;
    padding: 14px 20px;
    border-bottom: 1px solid rgba(255,255,255,0.07);
    background: rgba(255,255,255,0.03);
    flex-shrink: 0;
}
.gp-modal-title { font-size: 15px; font-weight: 700; color: #fff; }
.gp-modal-controls { display: flex; gap: 8px; }
.gp-modal-fullscreen,
.gp-modal-close {
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.1);
    color: rgba(255,255,255,0.7);
    width: 34px; height: 34px;
    border-radius: 8px; cursor: pointer; font-size: 15px;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.2s ease;
}
.gp-modal-fullscreen:hover { background: rgba(0,212,255,0.2); color: #00d4ff; border-color: rgba(0,212,255,0.4); }
.gp-modal-close:hover { background: rgba(255,75,75,0.2); color: #ff4b4b; border-color: rgba(255,75,75,0.4); }
.gp-modal-body { flex: 1; position: relative; }
.gp-modal-body iframe { width: 100%; height: 100%; border: 0; }

/* ---------- PROGRESS SECTION ---------- */
.gp-progress-section {
    padding: 40px 40px 20px;
    max-width: 1280px;
    margin: 0 auto;
}
.gp-prog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
    gap: 16px;
    margin-top: 30px;
}
.gp-prog-card {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 14px;
    padding: 18px 16px;
    text-align: center;
    transition: transform 0.25s, border-color 0.25s;
}
.gp-prog-card:hover { transform: translateY(-4px); border-color: rgba(0,212,255,0.25); }
.gp-prog-card.played { border-color: rgba(0,212,255,0.2); background: rgba(0,212,255,0.04); }
.gp-prog-icon { font-size: 32px; margin-bottom: 8px; }
.gp-prog-name { font-size: 13px; font-weight: 700; color: #fff; margin-bottom: 12px; }
.gp-prog-stats { display: flex; justify-content: center; gap: 16px; margin-bottom: 8px; }
.gp-prog-stat { display: flex; flex-direction: column; align-items: center; }
.gp-prog-val { font-size: 18px; font-weight: 800; color: #00d4ff; }
.gp-prog-lbl { font-size: 10px; color: rgba(255,255,255,0.35); text-transform: uppercase; letter-spacing: 0.5px; margin-top: 2px; }
.gp-prog-last { font-size: 10px; color: rgba(255,255,255,0.25); }
.gp-prog-loading { grid-column: 1/-1; text-align: center; color: rgba(255,255,255,0.3); padding: 30px; }

/* ---------- RESPONSIVE ---------- */
@media (max-width: 768px) {
    .gp-games-section { padding: 40px 20px 60px; }
    .gp-grid { grid-template-columns: 1fr; }
    .gp-hero-title { font-size: 32px; }
}
</style>

<!-- ===== SCRIPTS ===== -->
<script>
(function () {
    const modal    = document.getElementById('gpModal');
    const backdrop = document.getElementById('gpModalBackdrop');
    const frame    = document.getElementById('gpGameFrame');
    const titleEl  = document.getElementById('gpModalTitle');
    const closeBtn = document.getElementById('gpModalClose');
    const fsBtn    = document.getElementById('gpFullscreen');
    const modalBox = document.querySelector('.gp-modal-box');

    var currentGameId = null;

    function openGame(src, title, gameId) {
        if (!src || src === '#') {
            alert('🎮 Game coming soon! Drop your game embed URL in the $games array.');
            return;
        }
        currentGameId = gameId || null;
        frame.src = src;
        titleEl.textContent = '🎮 ' + title;
        modal.classList.add('is-open');
        document.body.style.overflow = 'hidden';
    }

    function closeGame() {
        if (currentGameId && typeof window.gpSaveProgress === 'function') {
            // Read the score DIRECTLY from the same-origin iframe window.
            // This works regardless of whether game-over was reached.
            var gameScore = 0;
            try {
                var fw = frame.contentWindow;
                if (currentGameId === 'memory') {
                    // Fewer moves = higher score
                    var m = parseInt(fw.moves) || 0;
                    gameScore = (m > 0) ? Math.max(0, 200 - m * 5) : 0;
                } else if (currentGameId === 'tictactoe') {
                    // Score = Player 1 (X) wins this session
                    gameScore = (fw.scores && fw.scores.X) ? parseInt(fw.scores.X) : 0;
                } else {
                    // snake, tetris, 2048, breakout all expose a top-level `score` var
                    gameScore = parseInt(fw.score) || 0;
                }
            } catch (e) { gameScore = 0; }

            window.gpSaveProgress(currentGameId, gameScore);
        }
        currentGameId = null;
        frame.src = '';
        modal.classList.remove('is-open');
        document.body.style.overflow = '';
    }

    // Play buttons (overlay + quick-play)
    document.querySelectorAll('.gp-play-btn, .gp-quick-play').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            // Get the game ID from the parent card
            var card = this.closest('[data-game-id]');
            var gameId = card ? card.dataset.gameId : null;
            openGame(this.dataset.src, this.dataset.title, gameId);
        });
    });

    // Close
    closeBtn.addEventListener('click', closeGame);
    backdrop.addEventListener('click', closeGame);
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeGame(); });

    // Fullscreen
    fsBtn.addEventListener('click', function () {
        if (document.fullscreenElement) {
            document.exitFullscreen();
        } else {
            modalBox.requestFullscreen().catch(function () {});
        }
    });

    // Floating particles
    var container = document.getElementById('gpParticles');
    for (var i = 0; i < 35; i++) {
        var p = document.createElement('div');
        p.className = 'gp-particle';
        p.style.left     = Math.random() * 100 + '%';
        p.style.bottom   = '-10px';
        p.style.animationDuration  = (6 + Math.random() * 12) + 's';
        p.style.animationDelay     = (Math.random() * 12) + 's';
        p.style.width  = (1 + Math.random() * 3) + 'px';
        p.style.height = p.style.width;
        p.style.opacity = Math.random() * 0.6;
        container.appendChild(p);
    }
})();
</script>

<?php get_footer(); ?>