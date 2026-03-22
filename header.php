<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header" id="siteHeader">
    <div class="nav-container">

        <!-- Logo -->
        <a href="<?php echo home_url(); ?>" class="nav-logo">
            <span class="nav-logo-icon">🎮</span>
            <span class="nav-logo-text"><?php bloginfo('name'); ?></span>
        </a>

        <!-- Desktop Nav -->
        <nav class="nav-menu" id="navMenu">
            <ul class="nav-list">

                <li class="nav-item">
                    <a href="<?php echo home_url('/'); ?>" class="nav-link">Home</a>
                </li>

                <!-- Games dropdown -->
                <li class="nav-item has-dropdown">
                    <a href="#games" class="nav-link nav-link--dropdown">
                        Games
                        <svg class="nav-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="14" height="14"><polyline points="6 9 12 15 18 9"/></svg>
                    </a>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="#games" class="nav-dd-item">
                                <span class="nav-dd-icon">🐍</span>
                                <div>
                                    <strong>Snake</strong>
                                    <small>Classic Arcade</small>
                                </div>
                            </a>
                            <a href="#games" class="nav-dd-item">
                                <span class="nav-dd-icon">🟦</span>
                                <div>
                                    <strong>Tetris</strong>
                                    <small>Puzzle</small>
                                </div>
                            </a>
                            <a href="#games" class="nav-dd-item">
                                <span class="nav-dd-icon">🃏</span>
                                <div>
                                    <strong>Memory Match</strong>
                                    <small>Brain Teaser</small>
                                </div>
                            </a>
                            <a href="#games" class="nav-dd-item">
                                <span class="nav-dd-icon">🔢</span>
                                <div>
                                    <strong>2048</strong>
                                    <small>Puzzle</small>
                                </div>
                            </a>
                            <a href="#games" class="nav-dd-item">
                                <span class="nav-dd-icon">🧱</span>
                                <div>
                                    <strong>Breakout</strong>
                                    <small>Arcade</small>
                                </div>
                            </a>
                            <a href="#games" class="nav-dd-item">
                                <span class="nav-dd-icon">✕</span>
                                <div>
                                    <strong>Tic-Tac-Toe</strong>
                                    <small>2 Player</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>

                <!-- Categories dropdown -->
                <li class="nav-item has-dropdown">
                    <a href="#" class="nav-link nav-link--dropdown">
                        Categories
                        <svg class="nav-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="14" height="14"><polyline points="6 9 12 15 18 9"/></svg>
                    </a>
                    <div class="nav-dropdown nav-dropdown--sm">
                        <div class="nav-dropdown-inner">
                            <a href="#games" class="nav-dd-item">
                                <span class="nav-dd-icon">🕹️</span>
                                <div><strong>Arcade</strong><small>Fast-paced classics</small></div>
                            </a>
                            <a href="#games" class="nav-dd-item">
                                <span class="nav-dd-icon">🧩</span>
                                <div><strong>Puzzle</strong><small>Think &amp; solve</small></div>
                            </a>
                            <a href="#games" class="nav-dd-item">
                                <span class="nav-dd-icon">👥</span>
                                <div><strong>Multiplayer</strong><small>Play with friends</small></div>
                            </a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="<?php echo home_url('/about'); ?>" class="nav-link">About</a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo home_url('/contact'); ?>" class="nav-link">Contact</a>
                </li>

            </ul>
        </nav>

        <!-- CTA + Auth + Hamburger -->
        <div class="nav-right">
            <a href="#games" class="nav-cta">Play Now 🎮</a>

            <?php if ( is_user_logged_in() ) :
                $current_user = wp_get_current_user(); ?>
            <!-- Logged-in: User Avatar Dropdown -->
            <div class="nav-user" id="gpUserDrop">
                <button class="nav-user-trigger" id="gpUserDropTrigger" aria-label="User menu">
                    <span class="nav-user-avatar"><?php echo esc_html( strtoupper( substr( $current_user->display_name, 0, 1 ) ) ); ?></span>
                    <span class="nav-user-name"><?php echo esc_html( $current_user->display_name ); ?></span>
                    <svg class="nav-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="12" height="12"><polyline points="6 9 12 15 18 9"/></svg>
                </button>
                <div class="nav-user-menu">
                    <div class="nav-user-menu-header">
                        <span class="nav-user-menu-avatar"><?php echo esc_html( strtoupper( substr( $current_user->display_name, 0, 1 ) ) ); ?></span>
                        <div>
                            <strong><?php echo esc_html( $current_user->display_name ); ?></strong>
                            <small><?php echo esc_html( $current_user->user_email ); ?></small>
                        </div>
                    </div>
                    <a href="#games" class="nav-user-menu-item">🎮 My Games</a>
                    <a href="#gpProgressSection" class="nav-user-menu-item">📊 My Progress</a>
                    <div class="nav-user-menu-divider"></div>
                    <a href="#" class="nav-user-menu-item nav-user-menu-item--danger" id="gpLogoutBtn">🚪 Logout</a>
                </div>
            </div>
            <?php else : ?>
            <!-- Logged-out: Login Button -->
            <button class="nav-login-btn" id="gpLoginBtn">🔐 Login</button>
            <?php endif; ?>

            <button class="nav-hamburger" id="navHamburger" aria-label="Toggle menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>

    </div>

    <!-- Mobile drawer -->
    <div class="nav-mobile" id="navMobile">
        <ul class="nav-mobile-list">
            <li><a href="<?php echo home_url('/'); ?>">🏠 Home</a></li>
            <li class="mobile-group">
                <button class="mobile-group-btn" onclick="this.parentElement.classList.toggle('open')">
                    🎮 Games <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="14" height="14"><polyline points="6 9 12 15 18 9"/></svg>
                </button>
                <ul class="mobile-sub">
                    <li><a href="#games">🐍 Snake</a></li>
                    <li><a href="#games">🟦 Tetris</a></li>
                    <li><a href="#games">🃏 Memory Match</a></li>
                    <li><a href="#games">🔢 2048</a></li>
                    <li><a href="#games">🧱 Breakout</a></li>
                    <li><a href="#games">✕ Tic-Tac-Toe</a></li>
                </ul>
            </li>
            <li class="mobile-group">
                <button class="mobile-group-btn" onclick="this.parentElement.classList.toggle('open')">
                    🧩 Categories <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="14" height="14"><polyline points="6 9 12 15 18 9"/></svg>
                </button>
                <ul class="mobile-sub">
                    <li><a href="#games">🕹️ Arcade</a></li>
                    <li><a href="#games">🧩 Puzzle</a></li>
                    <li><a href="#games">👥 Multiplayer</a></li>
                </ul>
            </li>
            <li><a href="<?php echo home_url('/about'); ?>">👤 About</a></li>
            <li><a href="<?php echo home_url('/contact'); ?>">📬 Contact</a></li>
            <?php if ( is_user_logged_in() ) : $u = wp_get_current_user(); ?>
            <li class="mobile-auth-item">
                <div class="mobile-user-info">
                    <span class="mobile-user-avatar"><?php echo esc_html( strtoupper( substr( $u->display_name, 0, 1 ) ) ); ?></span>
                    <strong><?php echo esc_html( $u->display_name ); ?></strong>
                </div>
                <a href="#" id="gpLogoutBtnMobile" class="mobile-logout-btn">🚪 Logout</a>
            </li>
            <?php else : ?>
            <li><button class="mobile-login-btn" id="gpLoginBtnMobile">🔐 Login / Register</button></li>
            <?php endif; ?>
        </ul>
    </div>
</header>

<!-- ===== AUTH MODAL ===== -->
<div class="gp-auth-modal" id="gpAuthModal" role="dialog" aria-modal="true" aria-label="Login / Register">
    <div class="gp-auth-overlay" id="gpAuthOverlay"></div>
    <div class="gp-auth-box">
        <!-- Close -->
        <button class="gp-auth-close" aria-label="Close">✕</button>

        <!-- Header -->
        <div class="gp-auth-header">
            <span class="gp-auth-logo">🎮</span>
            <h2 class="gp-auth-title">Welcome Back!</h2>
            <p class="gp-auth-sub">Sign in to track your game progress</p>
        </div>

        <!-- Tabs -->
        <div class="gp-auth-tabs">
            <button class="gp-auth-tab active" data-tab="login">Login</button>
            <button class="gp-auth-tab" data-tab="register">Register</button>
        </div>

        <!-- LOGIN PANEL -->
        <form class="gp-auth-panel active" data-panel="login" id="gpLoginForm" autocomplete="on">
            <div class="gp-auth-msg"></div>
            <div class="gp-auth-field">
                <label>Username or Email</label>
                <div class="gp-auth-input-wrap">
                    <span class="gp-auth-input-icon">👤</span>
                    <input type="text" name="username" placeholder="Enter username" required autocomplete="username">
                </div>
            </div>
            <div class="gp-auth-field">
                <label>Password</label>
                <div class="gp-auth-input-wrap">
                    <span class="gp-auth-input-icon">🔒</span>
                    <input type="password" name="password" placeholder="Enter password" required autocomplete="current-password">
                    <button type="button" class="gp-pw-toggle" data-target="login-pw">👁</button>
                </div>
            </div>
            <label class="gp-auth-remember">
                <input type="checkbox" name="remember"> Remember me
            </label>
            <button type="submit" class="gp-auth-submit">Login</button>
            <p class="gp-auth-switch">No account? <button type="button" class="gp-auth-tab-link" data-tab="register">Register here</button></p>
        </form>

        <!-- REGISTER PANEL -->
        <form class="gp-auth-panel" data-panel="register" id="gpRegForm" autocomplete="on">
            <div class="gp-auth-msg"></div>
            <div class="gp-auth-field">
                <label>Username</label>
                <div class="gp-auth-input-wrap">
                    <span class="gp-auth-input-icon">👤</span>
                    <input type="text" name="username" placeholder="Choose a username" required autocomplete="username">
                </div>
            </div>
            <div class="gp-auth-field">
                <label>Email</label>
                <div class="gp-auth-input-wrap">
                    <span class="gp-auth-input-icon">📧</span>
                    <input type="email" name="email" placeholder="Your email address" required autocomplete="email">
                </div>
            </div>
            <div class="gp-auth-field">
                <label>Password</label>
                <div class="gp-auth-input-wrap">
                    <span class="gp-auth-input-icon">🔒</span>
                    <input type="password" name="password" placeholder="Min. 6 characters" required autocomplete="new-password">
                </div>
            </div>
            <div class="gp-auth-field">
                <label>Confirm Password</label>
                <div class="gp-auth-input-wrap">
                    <span class="gp-auth-input-icon">🔒</span>
                    <input type="password" name="confirm" placeholder="Repeat password" required autocomplete="new-password">
                </div>
            </div>
            <p class="gp-auth-note">🔐 Password is securely hashed and stored in the database</p>
            <button type="submit" class="gp-auth-submit">Create Account</button>
            <p class="gp-auth-switch">Already have an account? <button type="button" class="gp-auth-tab-link" data-tab="login">Login here</button></p>
        </form>
    </div>
</div>

<style>
/* =============================================
   GAMING NAVBAR
   ============================================= */
.site-header {
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 1000;
    transition: background 0.4s ease, box-shadow 0.4s ease, padding 0.3s ease;
    padding: 0;
}

/* Scrolled state — added via JS */
.site-header.scrolled {
    background: rgba(8, 8, 20, 0.92);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(0, 212, 255, 0.15);
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.4);
}

.nav-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 16px 40px;
    max-width: 1400px;
    margin: 0 auto;
    gap: 24px;
}

/* ---- Logo ---- */
.nav-logo {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    flex-shrink: 0;
}
.nav-logo-icon { font-size: 22px; }
.nav-logo-text {
    font-size: 20px;
    font-weight: 800;
    background: linear-gradient(90deg, #00d4ff, #4ecdc4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    letter-spacing: -0.5px;
}

/* ---- Nav list ---- */
.nav-menu { display: flex; align-items: center; }
.nav-list {
    list-style: none;
    display: flex;
    align-items: center;
    gap: 4px;
    margin: 0; padding: 0;
}
.nav-item { position: relative; }

.nav-link {
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 8px 14px;
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    border-radius: 8px;
    transition: color 0.2s, background 0.2s;
    white-space: nowrap;
}
.nav-link:hover, .nav-item.active > .nav-link {
    color: #ffffff;
    background: rgba(255, 255, 255, 0.06);
}

.nav-chevron {
    transition: transform 0.25s ease;
    opacity: 0.6;
}
.nav-item.has-dropdown:hover .nav-chevron { transform: rotate(180deg); }

/* ---- Dropdown ---- */
.nav-dropdown {
    position: absolute;
    top: calc(100% + 10px);
    left: 50%;
    transform: translateX(-50%);
    min-width: 340px;
    background: rgba(8, 8, 22, 0.97);
    border: 1px solid rgba(0, 212, 255, 0.15);
    border-radius: 14px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6), 0 0 0 1px rgba(0,212,255,0.05);
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transform: translateX(-50%) translateY(-8px);
    transition: opacity 0.22s ease, transform 0.22s ease, visibility 0.22s;
    backdrop-filter: blur(20px);
}
.nav-dropdown--sm { min-width: 240px; }
.nav-item.has-dropdown:hover .nav-dropdown {
    opacity: 1;
    visibility: visible;
    pointer-events: all;
    transform: translateX(-50%) translateY(0);
}
/* Arrow tip */
.nav-dropdown::before {
    content: '';
    position: absolute;
    top: -6px;
    left: 50%;
    transform: translateX(-50%);
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-bottom: 6px solid rgba(0, 212, 255, 0.2);
}

.nav-dropdown-inner {
    padding: 10px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4px;
}
.nav-dropdown--sm .nav-dropdown-inner { grid-template-columns: 1fr; }

.nav-dd-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 12px;
    border-radius: 10px;
    text-decoration: none;
    color: rgba(255, 255, 255, 0.7);
    transition: background 0.2s, color 0.2s;
}
.nav-dd-item:hover {
    background: rgba(0, 212, 255, 0.08);
    color: #fff;
}
.nav-dd-icon { font-size: 22px; flex-shrink: 0; }
.nav-dd-item strong { display: block; font-size: 13px; color: #fff; }
.nav-dd-item small { display: block; font-size: 11px; color: rgba(255,255,255,0.35); margin-top: 1px; }

/* ---- Right side ---- */
.nav-right { display: flex; align-items: center; gap: 12px; flex-shrink: 0; }

.nav-cta {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 9px 20px;
    background: linear-gradient(90deg, #00d4ff, #4ecdc4);
    color: #0a0a0a;
    font-weight: 700;
    font-size: 13px;
    text-decoration: none;
    border-radius: 999px;
    transition: all 0.3s ease;
    box-shadow: 0 0 20px rgba(0,212,255,0.25);
    white-space: nowrap;
}
.nav-cta:hover { transform: translateY(-1px); box-shadow: 0 0 30px rgba(0,212,255,0.45); }

/* ---- Hamburger ---- */
.nav-hamburger {
    display: none;
    flex-direction: column;
    gap: 5px;
    background: none;
    border: 1px solid rgba(0,212,255,0.25);
    border-radius: 8px;
    padding: 8px 10px;
    cursor: pointer;
}
.nav-hamburger span {
    display: block;
    width: 20px;
    height: 2px;
    background: #00d4ff;
    border-radius: 2px;
    transition: transform 0.3s ease, opacity 0.3s ease;
}
.nav-hamburger.is-open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
.nav-hamburger.is-open span:nth-child(2) { opacity: 0; }
.nav-hamburger.is-open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

/* ---- Mobile drawer ---- */
.nav-mobile {
    display: none;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s ease, padding 0.3s ease;
    background: rgba(8,8,22,0.97);
    border-top: 1px solid rgba(0,212,255,0.1);
}
.nav-mobile.is-open { max-height: 600px; }
.nav-mobile-list { list-style: none; padding: 12px 24px 20px; margin: 0; display: flex; flex-direction: column; gap: 4px; }
.nav-mobile-list > li > a {
    display: block; padding: 12px 14px;
    color: rgba(255,255,255,0.75); text-decoration: none;
    font-size: 15px; font-weight: 500; border-radius: 10px;
    transition: background 0.2s, color 0.2s;
}
.nav-mobile-list > li > a:hover { background: rgba(0,212,255,0.08); color: #fff; }

/* Mobile accordion groups */
.mobile-group-btn {
    width: 100%; display: flex; align-items: center; gap: 8px; justify-content: space-between;
    padding: 12px 14px; background: none; border: none; border-radius: 10px;
    color: rgba(255,255,255,0.75); font-size: 15px; font-weight: 500; cursor: pointer;
    transition: background 0.2s; text-align: left;
}
.mobile-group-btn:hover { background: rgba(0,212,255,0.08); color: #fff; }
.mobile-group-btn svg { transition: transform 0.25s ease; flex-shrink: 0; }
.mobile-group.open .mobile-group-btn svg { transform: rotate(180deg); }
.mobile-sub {
    list-style: none; padding: 4px 0 4px 24px; margin: 0;
    max-height: 0; overflow: hidden; transition: max-height 0.35s ease;
}
.mobile-group.open .mobile-sub { max-height: 400px; }
.mobile-sub li a {
    display: block; padding: 9px 14px;
    color: rgba(255,255,255,0.5); text-decoration: none;
    font-size: 13px; border-radius: 8px;
    transition: background 0.2s, color 0.2s;
}
.mobile-sub li a:hover { background: rgba(0,212,255,0.08); color: #fff; }

/* ---- Responsive ---- */
@media (max-width: 900px) {
    .nav-menu { display: none; }
    .nav-hamburger { display: flex; }
    .nav-mobile { display: block; }
    .nav-container { padding: 14px 24px; }
    .nav-cta { display: none; }
    .nav-login-btn { font-size: 12px; padding: 7px 12px; }
    .nav-user-name { display: none; }
}

/* =============================================
   AUTH BUTTON (logged-out)
   ============================================= */
.nav-login-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 18px;
    border: 1px solid rgba(0,212,255,0.45);
    background: rgba(0,212,255,0.08);
    color: #00d4ff;
    font-weight: 700;
    font-size: 13px;
    border-radius: 999px;
    cursor: pointer;
    transition: all 0.25s ease;
    white-space: nowrap;
}
.nav-login-btn:hover {
    background: rgba(0,212,255,0.18);
    border-color: #00d4ff;
    box-shadow: 0 0 18px rgba(0,212,255,0.3);
}

/* =============================================
   USER AVATAR DROPDOWN (logged-in)
   ============================================= */
.nav-user { position: relative; }
.nav-user-trigger {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 5px 14px 5px 5px;
    background: rgba(0,212,255,0.08);
    border: 1px solid rgba(0,212,255,0.2);
    border-radius: 999px;
    cursor: pointer;
    transition: all 0.2s ease;
    color: #fff;
}
.nav-user-trigger:hover { background: rgba(0,212,255,0.15); border-color: rgba(0,212,255,0.4); }
.nav-user-avatar {
    width: 32px; height: 32px;
    border-radius: 50%;
    background: linear-gradient(135deg,#00d4ff,#4ecdc4);
    color: #0a0a0a;
    font-size: 14px;
    font-weight: 800;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.nav-user-name { font-size: 13px; font-weight: 600; }

.nav-user-menu {
    position: absolute;
    top: calc(100% + 10px);
    right: 0;
    min-width: 220px;
    background: rgba(8,8,22,0.97);
    border: 1px solid rgba(0,212,255,0.15);
    border-radius: 14px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.6);
    backdrop-filter: blur(20px);
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transform: translateY(-8px);
    transition: opacity 0.22s ease, transform 0.22s ease, visibility 0.22s;
    padding: 8px;
    z-index: 2000;
}
.nav-user.is-open .nav-user-menu {
    opacity: 1; visibility: visible;
    pointer-events: all; transform: translateY(0);
}
.nav-user-menu-header {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 12px 14px;
    border-bottom: 1px solid rgba(255,255,255,0.06);
    margin-bottom: 6px;
}
.nav-user-menu-avatar {
    width: 38px; height: 38px; border-radius: 50%;
    background: linear-gradient(135deg,#00d4ff,#4ecdc4);
    color: #0a0a0a; font-size: 16px; font-weight: 800;
    display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}
.nav-user-menu-header strong { display: block; font-size: 13px; color: #fff; }
.nav-user-menu-header small { display: block; font-size: 11px; color: rgba(255,255,255,0.35); margin-top: 2px; }
.nav-user-menu-item {
    display: block; padding: 9px 12px;
    color: rgba(255,255,255,0.7); text-decoration: none;
    font-size: 13px; border-radius: 8px;
    transition: background 0.2s, color 0.2s; cursor: pointer;
}
.nav-user-menu-item:hover { background: rgba(0,212,255,0.08); color: #fff; }
.nav-user-menu-divider { height: 1px; background: rgba(255,255,255,0.06); margin: 6px 0; }
.nav-user-menu-item--danger:hover { background: rgba(255,75,75,0.1); color: #ff4b4b; }

/* Mobile auth */
.mobile-auth-item { padding: 12px 14px; }
.mobile-user-info { display: flex; align-items: center; gap: 10px; margin-bottom: 8px; }
.mobile-user-avatar {
    width: 34px; height: 34px; border-radius: 50%;
    background: linear-gradient(135deg,#00d4ff,#4ecdc4);
    color: #0a0a0a; font-size: 14px; font-weight: 800;
    display: flex; align-items: center; justify-content: center;
}
.mobile-user-info strong { font-size: 14px; color: #fff; }
.mobile-logout-btn, .mobile-login-btn {
    display: block; width: 100%; padding: 10px 14px;
    border-radius: 10px; font-size: 14px; font-weight: 600; cursor: pointer; text-align: left;
    transition: background 0.2s;
}
.mobile-logout-btn { background: rgba(255,75,75,0.1); color: #ff4b4b; border: 1px solid rgba(255,75,75,0.2); text-decoration: none; }
.mobile-login-btn { background: rgba(0,212,255,0.1); color: #00d4ff; border: 1px solid rgba(0,212,255,0.2); }
.mobile-logout-btn:hover { background: rgba(255,75,75,0.2); }
.mobile-login-btn:hover { background: rgba(0,212,255,0.2); }

/* =============================================
   AUTH MODAL
   ============================================= */
.gp-auth-modal {
    display: none;
    position: fixed; inset: 0; z-index: 10000;
    align-items: center; justify-content: center;
}
.gp-auth-modal.is-open { display: flex; }
.gp-auth-overlay {
    position: absolute; inset: 0;
    background: rgba(0,0,0,0.8);
    backdrop-filter: blur(10px);
    cursor: pointer;
}
.gp-auth-box {
    position: relative; z-index: 2;
    width: min(90vw, 440px);
    max-height: 90vh;
    overflow-y: auto;
    background: rgba(10,10,26,0.95);
    border: 1px solid rgba(0,212,255,0.2);
    border-radius: 20px;
    padding: 36px 32px 32px;
    box-shadow: 0 0 80px rgba(0,212,255,0.12), 0 40px 80px rgba(0,0,0,0.7);
    animation: authIn 0.3s ease;
}
.gp-auth-box::-webkit-scrollbar { width: 4px; }
.gp-auth-box::-webkit-scrollbar-track { background: transparent; }
.gp-auth-box::-webkit-scrollbar-thumb { background: rgba(0,212,255,0.2); border-radius: 4px; }
@keyframes authIn {
    from { transform: scale(0.9) translateY(20px); opacity: 0; }
    to   { transform: scale(1) translateY(0); opacity: 1; }
}
.gp-auth-close {
    position: absolute; top: 14px; right: 14px;
    width: 30px; height: 30px; border-radius: 8px;
    background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1);
    color: rgba(255,255,255,0.6); font-size: 13px; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.2s;
}
.gp-auth-close:hover { background: rgba(255,75,75,0.2); color: #ff4b4b; border-color: rgba(255,75,75,0.4); }

.gp-auth-header { text-align: center; margin-bottom: 24px; }
.gp-auth-logo { font-size: 36px; display: block; margin-bottom: 10px; }
.gp-auth-title { font-size: 22px; font-weight: 800; color: #fff; margin: 0 0 6px; }
.gp-auth-sub { font-size: 13px; color: rgba(255,255,255,0.45); margin: 0; }

.gp-auth-tabs {
    display: flex; gap: 0;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 10px; padding: 3px;
    margin-bottom: 24px;
}
.gp-auth-tab {
    flex: 1; padding: 9px;
    background: none; border: none;
    font-size: 13px; font-weight: 600;
    color: rgba(255,255,255,0.45);
    border-radius: 8px; cursor: pointer;
    transition: all 0.2s;
}
.gp-auth-tab.active {
    background: linear-gradient(90deg,#00d4ff22,#4ecdc422);
    color: #00d4ff;
    border: 1px solid rgba(0,212,255,0.25);
}

.gp-auth-panel { display: none; }
.gp-auth-panel.active { display: block; }

.gp-auth-msg {
    border-radius: 8px; font-size: 13px; font-weight: 500;
    margin-bottom: 14px; min-height: 0; transition: all 0.2s;
}
.gp-auth-msg.error   { background: rgba(255,75,75,0.1);  border: 1px solid rgba(255,75,75,0.3);  color: #ff6b6b; padding: 10px 12px; }
.gp-auth-msg.success { background: rgba(0,212,100,0.1); border: 1px solid rgba(0,212,100,0.3); color: #4ade80; padding: 10px 12px; }

.gp-auth-field { margin-bottom: 16px; }
.gp-auth-field label { display: block; font-size: 12px; font-weight: 600; color: rgba(255,255,255,0.5); margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.5px; }
.gp-auth-input-wrap { position: relative; display: flex; align-items: center; }
.gp-auth-input-icon { position: absolute; left: 13px; font-size: 15px; pointer-events: none; }
.gp-auth-input-wrap input {
    width: 100%; padding: 11px 14px 11px 40px;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 10px;
    color: #fff; font-size: 14px;
    outline: none; transition: border-color 0.2s, box-shadow 0.2s;
    box-sizing: border-box;
}
.gp-auth-input-wrap input:focus {
    border-color: rgba(0,212,255,0.5);
    box-shadow: 0 0 0 3px rgba(0,212,255,0.1);
    background: rgba(0,212,255,0.04);
}
.gp-auth-input-wrap input::placeholder { color: rgba(255,255,255,0.25); }
.gp-pw-toggle {
    position: absolute; right: 10px;
    background: none; border: none;
    color: rgba(255,255,255,0.35); cursor: pointer; font-size: 14px;
    padding: 4px;
}
.gp-pw-toggle:hover { color: #00d4ff; }

.gp-auth-remember {
    display: flex; align-items: center; gap: 8px;
    font-size: 13px; color: rgba(255,255,255,0.45);
    cursor: pointer; margin-bottom: 18px;
}
.gp-auth-remember input { width: 14px; height: 14px; accent-color: #00d4ff; }

.gp-auth-note {
    font-size: 11px; color: rgba(0,212,255,0.55);
    background: rgba(0,212,255,0.05);
    border: 1px solid rgba(0,212,255,0.15);
    border-radius: 8px; padding: 8px 12px;
    margin-bottom: 18px;
}

.gp-auth-submit {
    width: 100%; padding: 13px;
    background: linear-gradient(90deg,#00d4ff,#4ecdc4);
    color: #0a0a0a; font-weight: 800; font-size: 14px;
    border: none; border-radius: 10px; cursor: pointer;
    transition: all 0.25s ease;
    box-shadow: 0 0 24px rgba(0,212,255,0.3);
}
.gp-auth-submit:hover { transform: translateY(-1px); box-shadow: 0 0 36px rgba(0,212,255,0.5); }
.gp-auth-submit:disabled { opacity: 0.6; cursor: not-allowed; transform: none; }

.gp-auth-switch { text-align: center; font-size: 13px; color: rgba(255,255,255,0.35); margin-top: 16px; }
.gp-auth-tab-link { background: none; border: none; color: #00d4ff; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: underline; }
</style>

<script>
(function () {
    const header   = document.getElementById('siteHeader');
    const hamburger= document.getElementById('navHamburger');
    const mobile   = document.getElementById('navMobile');

    // Scroll — add glass effect when past 60px
    window.addEventListener('scroll', function () {
        header.classList.toggle('scrolled', window.scrollY > 60);
    }, { passive: true });
    // Init
    if (window.scrollY > 60) header.classList.add('scrolled');

    // Hamburger toggle
    hamburger.addEventListener('click', function () {
        const open = mobile.classList.toggle('is-open');
        hamburger.classList.toggle('is-open', open);
        hamburger.setAttribute('aria-expanded', open);
    });

    // Close mobile menu when a link is clicked
    mobile.querySelectorAll('a').forEach(function (a) {
        a.addEventListener('click', function () {
            mobile.classList.remove('is-open');
            hamburger.classList.remove('is-open');
            hamburger.setAttribute('aria-expanded', 'false');
        });
    });
})();
</script>