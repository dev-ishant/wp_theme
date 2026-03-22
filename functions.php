<?php
/* ============================================================
   THEME SETUP
   ============================================================ */
function my_theme_setup()
{
    add_theme_support('title-tag');

    register_nav_menus(array(
        'primary' => 'Primary Menu',
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

/* ============================================================
   ENQUEUE STYLES & SCRIPTS
   ============================================================ */
function my_theme_enqueue_styles()
{
    wp_enqueue_style('main-style', get_stylesheet_uri());

    // Enqueue auth.js (defer-friendly: in footer)
    wp_enqueue_script(
        'gp-auth',
        get_template_directory_uri() . '/js/auth.js',
        array(),   // no jQuery dependency needed
        '1.0.0',
        true       // load in footer
    );

    // Pass data to auth.js
    wp_localize_script('gp-auth', 'gpData', array(
        'ajaxUrl'   => admin_url('admin-ajax.php'),
        'nonce'     => wp_create_nonce('gp_auth_nonce'),
        'isLoggedIn'=> is_user_logged_in(),
    ));
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

/* ============================================================
   HELPER — verify nonce & decode action
   ============================================================ */
function gp_verify()
{
    if (! check_ajax_referer('gp_auth_nonce', 'nonce', false)) {
        wp_send_json_error(array('message' => 'Security check failed.'), 403);
    }
}

/* ============================================================
   AJAX — LOGIN
   ============================================================ */
function gp_login_handler()
{
    gp_verify();

    $username = sanitize_text_field(wp_unslash($_POST['username'] ?? ''));
    $password = $_POST['password'] ?? '';
    $remember = ! empty($_POST['remember']);

    if (empty($username) || empty($password)) {
        wp_send_json_error(array('message' => 'Please enter your username and password.'));
    }

    $user = wp_signon(array(
        'user_login'    => $username,
        'user_password' => $password,
        'remember'      => $remember,
    ), is_ssl());

    if (is_wp_error($user)) {
        // Friendly message — don't expose which field is wrong
        wp_send_json_error(array('message' => 'Invalid username or password. Please try again.'));
    }

    wp_send_json_success(array('message' => 'Login successful! Welcome back, ' . esc_html($user->display_name) . '.'));
}
add_action('wp_ajax_nopriv_gp_login', 'gp_login_handler');
add_action('wp_ajax_gp_login',        'gp_login_handler');   // already logged-in edge case

/* ============================================================
   AJAX — REGISTER
   ============================================================ */
function gp_register_handler()
{
    gp_verify();

    // Check if user registration is enabled
    if (! get_option('users_can_register')) {
        wp_send_json_error(array('message' => 'User registration is currently disabled.'));
    }

    $username = sanitize_user(wp_unslash($_POST['username'] ?? ''), true);
    $email    = sanitize_email(wp_unslash($_POST['email']    ?? ''));
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm']  ?? '';

    // --- Validation ---
    if (empty($username) || empty($email) || empty($password) || empty($confirm)) {
        wp_send_json_error(array('message' => 'All fields are required.'));
    }
    if (! validate_username($username)) {
        wp_send_json_error(array('message' => 'Username contains invalid characters.'));
    }
    if (username_exists($username)) {
        wp_send_json_error(array('message' => 'That username is already taken. Please choose another.'));
    }
    if (! is_email($email)) {
        wp_send_json_error(array('message' => 'Please enter a valid email address.'));
    }
    if (email_exists($email)) {
        wp_send_json_error(array('message' => 'An account with that email already exists.'));
    }
    if (strlen($password) < 6) {
        wp_send_json_error(array('message' => 'Password must be at least 6 characters long.'));
    }
    if ($password !== $confirm) {
        wp_send_json_error(array('message' => 'Passwords do not match.'));
    }

    // --- Create user (WordPress hashes the password automatically) ---
    $user_id = wp_create_user($username, $password, $email);

    if (is_wp_error($user_id)) {
        wp_send_json_error(array('message' => $user_id->get_error_message()));
    }

    // Update display name to username
    wp_update_user(array('ID' => $user_id, 'display_name' => $username));

    // Auto-login after registration
    wp_set_auth_cookie($user_id, false);

    wp_send_json_success(array('message' => 'Account created! Welcome to the portal, ' . esc_html($username) . '! 🎮'));
}
add_action('wp_ajax_nopriv_gp_register', 'gp_register_handler');
add_action('wp_ajax_gp_register',        'gp_register_handler');

/* ============================================================
   AJAX — LOGOUT
   ============================================================ */
function gp_logout_handler()
{
    gp_verify();
    wp_logout();
    wp_send_json_success(array('message' => 'Logged out successfully.'));
}
add_action('wp_ajax_gp_logout', 'gp_logout_handler');

/* ============================================================
   AJAX — SAVE GAME PROGRESS
   ============================================================ */
function gp_save_progress_handler()
{
    gp_verify();

    if (! is_user_logged_in()) {
        wp_send_json_error(array('message' => 'You must be logged in to save progress.'));
    }

    $user_id  = get_current_user_id();
    $game_id  = sanitize_key(wp_unslash($_POST['game_id'] ?? ''));
    $score    = intval($_POST['score']  ?? 0);
    $played   = intval($_POST['played'] ?? 0);

    if (empty($game_id)) {
        wp_send_json_error(array('message' => 'Invalid game ID.'));
    }

    // Load existing progress
    $all_progress = get_user_meta($user_id, 'gp_game_progress', true);
    if (! is_array($all_progress)) {
        $all_progress = array();
    }

    $existing = $all_progress[$game_id] ?? array(
        'highScore'   => 0,
        'gamesPlayed' => 0,
        'lastPlayed'  => null,
    );

    // Update
    if ($score > intval($existing['highScore'])) {
        $existing['highScore'] = $score;
    }
    if ($played) {
        $existing['gamesPlayed'] = intval($existing['gamesPlayed']) + 1;
    }
    $existing['lastPlayed'] = gmdate('c'); // ISO 8601

    $all_progress[$game_id] = $existing;
    update_user_meta($user_id, 'gp_game_progress', $all_progress);

    wp_send_json_success(array('message' => 'Progress saved.', 'progress' => $existing));
}
add_action('wp_ajax_gp_save_progress', 'gp_save_progress_handler');

/* ============================================================
   AJAX — GET GAME PROGRESS
   ============================================================ */
function gp_get_progress_handler()
{
    gp_verify();

    if (! is_user_logged_in()) {
        wp_send_json_error(array('message' => 'Not logged in.'));
    }

    $user_id      = get_current_user_id();
    $all_progress = get_user_meta($user_id, 'gp_game_progress', true);

    if (! is_array($all_progress)) {
        $all_progress = array();
    }

    wp_send_json_success(array('progress' => $all_progress));
}
add_action('wp_ajax_gp_get_progress', 'gp_get_progress_handler');