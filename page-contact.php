<?php
/**
 * Template Name: Contact Page
 */
get_header(); ?>

<section id="contact" class="contact-section">
    <div class="container">
        <div class="contact-content">
            <h1 class="section-title">Get In Touch</h1>
            <p class="section-subtitle">Let's work together on your next project</p>

            <div class="contact-grid">
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <span>📧</span>
                        </div>
                        <div class="contact-details">
                            <h3>Email</h3>
                            <p>hello@yourwebsite.com</p>
                            <p>I'll respond within 24 hours</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <span>📱</span>
                        </div>
                        <div class="contact-details">
                            <h3>Phone</h3>
                            <p>+1 (555) 123-4567</p>
                            <p>Mon-Fri 9AM-6PM</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <span>📍</span>
                        </div>
                        <div class="contact-details">
                            <h3>Location</h3>
                            <p>Your City, Country</p>
                            <p>Open to remote work</p>
                        </div>
                    </div>

                    <div class="social-links">
                        <h3>Follow Me</h3>
                        <div class="social-icons">
                            <a href="#" class="social-link">🐦</a>
                            <a href="#" class="social-link">💼</a>
                            <a href="#" class="social-link">📘</a>
                            <a href="#" class="social-link">📷</a>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <form class="contact-form-element">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="submit-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>