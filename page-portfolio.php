<?php
/**
 * Template Name: Portfolio Page
 */
get_header(); ?>

<section id="portfolio" class="portfolio-section">
    <div class="container">
        <div class="portfolio-content">
            <h1 class="section-title">My Portfolio</h1>
            <p class="section-subtitle">Showcasing my latest projects and work</p>

            <div class="portfolio-filters">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="web">Web Design</button>
                <button class="filter-btn" data-filter="app">Apps</button>
                <button class="filter-btn" data-filter="branding">Branding</button>
            </div>

            <div class="portfolio-grid">
                <div class="portfolio-item" data-category="web">
                    <div class="portfolio-image">
                        <div class="image-placeholder">
                            <span>Project 1</span>
                        </div>
                        <div class="portfolio-overlay">
                            <h3>E-commerce Website</h3>
                            <p>Modern online store with payment integration</p>
                            <a href="#" class="view-project-btn">View Project</a>
                        </div>
                    </div>
                </div>

                <div class="portfolio-item" data-category="app">
                    <div class="portfolio-image">
                        <div class="image-placeholder">
                            <span>Project 2</span>
                        </div>
                        <div class="portfolio-overlay">
                            <h3>Mobile App</h3>
                            <p>Cross-platform mobile application</p>
                            <a href="#" class="view-project-btn">View Project</a>
                        </div>
                    </div>
                </div>

                <div class="portfolio-item" data-category="branding">
                    <div class="portfolio-image">
                        <div class="image-placeholder">
                            <span>Project 3</span>
                        </div>
                        <div class="portfolio-overlay">
                            <h3>Brand Identity</h3>
                            <p>Complete brand design package</p>
                            <a href="#" class="view-project-btn">View Project</a>
                        </div>
                    </div>
                </div>

                <div class="portfolio-item" data-category="web">
                    <div class="portfolio-image">
                        <div class="image-placeholder">
                            <span>Project 4</span>
                        </div>
                        <div class="portfolio-overlay">
                            <h3>Corporate Website</h3>
                            <p>Professional business website</p>
                            <a href="#" class="view-project-btn">View Project</a>
                        </div>
                    </div>
                </div>

                <div class="portfolio-item" data-category="app">
                    <div class="portfolio-image">
                        <div class="image-placeholder">
                            <span>Project 5</span>
                        </div>
                        <div class="portfolio-overlay">
                            <h3>Web Application</h3>
                            <p>Interactive web application</p>
                            <a href="#" class="view-project-btn">View Project</a>
                        </div>
                    </div>
                </div>

                <div class="portfolio-item" data-category="branding">
                    <div class="portfolio-image">
                        <div class="image-placeholder">
                            <span>Project 6</span>
                        </div>
                        <div class="portfolio-overlay">
                            <h3>Logo Design</h3>
                            <p>Creative logo design solutions</p>
                            <a href="#" class="view-project-btn">View Project</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>