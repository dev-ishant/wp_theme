<footer class="site-footer">
    <div class="footer-glow"></div>

    <div class="footer-inner">
        <!-- Brand Column -->
        <div class="footer-col footer-brand">
            <h2 class="footer-logo">
                <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
            </h2>
            <p class="footer-tagline"><?php bloginfo('description'); ?></p>
            <div class="footer-socials">
                <a href="#" class="social-btn" aria-label="GitHub">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.2 11.4.6.1.82-.26.82-.57v-2.01c-3.34.73-4.04-1.61-4.04-1.61-.54-1.38-1.33-1.75-1.33-1.75-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.24 1.84 1.24 1.07 1.83 2.8 1.3 3.48 1 .1-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.12-.3-.54-1.52.12-3.18 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 0 1 3-.4c1.02 0 2.04.14 3 .4 2.29-1.55 3.3-1.23 3.3-1.23.66 1.66.24 2.88.12 3.18.77.84 1.24 1.91 1.24 3.22 0 4.61-2.8 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.69.83.57C20.56 21.8 24 17.3 24 12c0-6.63-5.37-12-12-12z"/></svg>
                </a>
                <a href="#" class="social-btn" aria-label="LinkedIn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.03-3.04-1.85-3.04-1.85 0-2.13 1.45-2.13 2.94v5.67H9.35V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29zM5.34 7.43a2.07 2.07 0 1 1 0-4.14 2.07 2.07 0 0 1 0 4.14zM3.56 20.45h3.56V9H3.56v11.45zM22.23 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.46c.98 0 1.77-.77 1.77-1.72V1.72C24 .77 23.21 0 22.23 0z"/></svg>
                </a>
                <a href="#" class="social-btn" aria-label="Twitter / X">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.747l7.73-8.835-8.162-10.665h7.052l4.261 5.633 4.616-5.633zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </a>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="footer-col">
            <h3 class="footer-heading">Quick Links</h3>
            <ul class="footer-links">
                <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
                <li><a href="<?php echo home_url('/about'); ?>">About</a></li>
                <li><a href="<?php echo home_url('/portfolio'); ?>">Portfolio</a></li>
                <li><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
            </ul>
        </div>

        <!-- Contact Info -->
        <div class="footer-col">
            <h3 class="footer-heading">Get In Touch</h3>
            <ul class="footer-contact">
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <span><?php echo antispambot('hello@ishant.dev'); ?></span>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span>India</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>. All rights reserved.</p>
        <p class="footer-credit">Crafted with <span class="heart">♥</span> by Ishant Thakur</p>
    </div>
</footer>

<style>
/* ========== FOOTER STYLES ========== */
.site-footer {
    position: relative;
    background: rgba(255, 255, 255, 0.04);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-top: 1px solid rgba(0, 212, 255, 0.15);
    overflow: hidden;
    margin-top: 60px;
}

/* Ambient glow at top */
.footer-glow {
    position: absolute;
    top: -60px;
    left: 50%;
    transform: translateX(-50%);
    width: 600px;
    height: 120px;
    background: radial-gradient(ellipse at center, rgba(0, 212, 255, 0.12) 0%, transparent 70%);
    pointer-events: none;
    z-index: 0;
}

.footer-inner {
    position: relative;
    z-index: 1;
    display: flex;
    justify-content: space-between;
    gap: 40px;
    padding: 60px 60px 40px;
    flex-wrap: wrap;
}

/* ---- Brand Column ---- */
.footer-brand {
    flex: 1.4;
    min-width: 220px;
}

.footer-logo a {
    font-size: 26px;
    font-weight: 700;
    text-decoration: none;
    background: linear-gradient(45deg, #00d4ff, #4ecdc4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    display: inline-block;
    transition: opacity 0.3s ease;
}

.footer-logo a:hover { opacity: 0.8; }

.footer-tagline {
    color: rgba(255, 255, 255, 0.5);
    font-size: 14px;
    margin: 10px 0 24px;
    line-height: 1.6;
}

/* Social Icons */
.footer-socials {
    display: flex;
    gap: 12px;
}

.social-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: 1px solid rgba(0, 212, 255, 0.25);
    color: rgba(255, 255, 255, 0.6);
    text-decoration: none;
    transition: all 0.3s ease;
    background: rgba(0, 212, 255, 0.06);
}

.social-btn:hover {
    border-color: #00d4ff;
    color: #00d4ff;
    background: rgba(0, 212, 255, 0.15);
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(0, 212, 255, 0.25);
}

/* ---- Navigation Columns ---- */
.footer-col {
    flex: 1;
    min-width: 150px;
}

.footer-heading {
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    color: #00d4ff;
    margin: 0 0 20px;
}

.footer-links {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.footer-links a {
    color: rgba(255, 255, 255, 0.55);
    text-decoration: none;
    font-size: 14px;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.footer-links a::before {
    content: '›';
    color: #00d4ff;
    font-size: 16px;
    transition: transform 0.2s ease;
}

.footer-links a:hover {
    color: #ffffff;
    padding-left: 4px;
}

.footer-links a:hover::before {
    transform: translateX(2px);
}

/* Contact items */
.footer-contact {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.footer-contact li {
    display: flex;
    align-items: center;
    gap: 10px;
    color: rgba(255, 255, 255, 0.55);
    font-size: 14px;
}

.footer-contact svg {
    color: #00d4ff;
    flex-shrink: 0;
}

/* ---- Bottom Bar ---- */
.footer-bottom {
    position: relative;
    z-index: 1;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 60px;
    border-top: 1px solid rgba(255, 255, 255, 0.07);
    flex-wrap: wrap;
    gap: 10px;
}

.footer-bottom p {
    margin: 0;
    font-size: 13px;
    color: rgba(255, 255, 255, 0.35);
}

.footer-bottom a {
    color: rgba(0, 212, 255, 0.7);
    text-decoration: none;
    transition: color 0.2s ease;
}

.footer-bottom a:hover { color: #00d4ff; }

.heart {
    color: #ff6b6b;
    display: inline-block;
    animation: heartbeat 1.4s ease-in-out infinite;
}

@keyframes heartbeat {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.25); }
}

/* Responsive */
@media (max-width: 768px) {
    .footer-inner { padding: 40px 24px 30px; gap: 32px; }
    .footer-bottom { padding: 16px 24px; flex-direction: column; text-align: center; }
}
</style>

<?php wp_footer(); ?>
</body>
</html>