<?php
// BeatSync - Road Map Page
// Dynamic content variables
$pageTitle = "Road Map - BeatSync | Future Plans & Development Timeline";
$pageDescription = "Discover BeatSync's future plans and exciting features. We're working hard to bring you an amazing overview of our roadmap.";
$keywords = "road map, development timeline, future features, BeatSync plans, EDM platform development";

// Site configuration
$siteConfig = [
    'company_name' => 'BeatSync',
    'contact' => [
        'address' => '123 BGC, Manila, Philippines',
        'phone' => '(+63) 967-386-5115',
        'email' => 'beatsync@gmail.com'
    ],
    'current_year' => date('Y'),
    'assets_path' => './images/event1.jpg',
    'css_path' => './css/roadmap.css',
    'js_path' => './js/roadmap.js'
];

// Navigation items
$navigation = [
    ['href' => 'landing', 'text' => 'Home'],
    ['href' => '#events', 'text' => 'Events'],
    ['href' => '#tickets', 'text' => 'Tickets']
];

// Road map features data
$roadmapFeatures = [
    [
        'title' => 'Event Gallery (Pictures Of Events)',
        'description' => 'Upload and manage event photos to showcase festivals.',
        'status' => 'Completed',
        'priority' => 'high'
    ],
    [
        'title' => 'Ticketing & Pricing Setup',
        'description' => 'Create and update ticket packages with clear pricing options and a checkout system for easy purchases.',
        'status' => 'Backlog',
        'priority' => 'medium'
    ],
    [
        'title' => 'Email Verification',
        'description' => 'Implement secure email verification system for user accounts and ticket purchases.',
        'status' => 'In Progress',
        'priority' => 'high'
    ]
];

// Footer links
$footerLinks = [
    'Menu' => [
        ['href' => 'landing.php', 'text' => 'Home'],
        ['href' => 'landing.php#events', 'text' => 'Line Up'],
        ['href' => 'landing.php#tickets', 'text' => 'Tickets']
    ],
    'Company' => [
        ['href' => 'moodboard.php', 'text' => 'Mood Board'],
        ['href' => 'roadmap.php', 'text' => 'Road Map']
    ]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>" />
    <meta name="keywords" content="<?php echo htmlspecialchars($keywords); ?>" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription); ?>" />

    <!-- External CSS -->
    <link rel="stylesheet" href="<?php echo $siteConfig['css_path']; ?>">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue:wght@400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script type="module" src="https://static.rocket.new/rocket-web.js?_cfg=https%3A%2F%2Fcallsapp3792back.builtwithrocket.new&_be=https%3A%2F%2Fapplication.rocket.new&_v=0.1.8"></script>
</head>

<body>
    <main class="main-container">
        <!-- Header -->
        <header class="header">
            <div class="header-logo">
                <div class="logo-square">
                    <span class="logo-icon">♥</span>
                </div>
                <span class="logo-text">BEATSYNC</span>
            </div>

            <nav class="nav-menu" role="navigation">
                <?php foreach ($navigation as $nav): ?>
                    <a href="<?php echo $nav['href']; ?>" class="nav-item" role="menuitem"><?php echo htmlspecialchars($nav['text']); ?></a>
                <?php endforeach; ?>
            </nav>

            <div class="header-actions">
                <a href="#login" class="login-link">Login</a>
                <a href="#signup" class="signup-btn">Sign Up</a>
            </div>

            <button class="hamburger" aria-label="Menu">☰</button>
        </header>

        <!-- Road Map Section -->
        <section class="roadmap-section" id="roadmap">
            <div class="roadmap-container">
                <div class="roadmap-header">
                    <h1 class="roadmap-title bebas-neue">ROAD MAP</h1>
                    <p class="roadmap-description">We're working hard to bring you an amazing overview of BeatSync's future plans and exciting features.</p>
                </div>

                <!-- Pricing Plan Section -->
                <div class="pricing-plan-section">
                    <h2 class="section-title">PRICING PLAN</h2>

                    <div class="roadmap-features">
                        <?php foreach ($roadmapFeatures as $index => $feature): ?>
                            <div class="feature-card <?php echo strtolower(str_replace(' ', '-', $feature['status'])); ?> priority-<?php echo $feature['priority']; ?>" data-feature-index="<?php echo $index; ?>">
                                <div class="feature-header">
                                    <h3 class="feature-title"><?php echo htmlspecialchars($feature['title']); ?></h3>
                                    <span class="feature-status status-<?php echo strtolower(str_replace(' ', '-', $feature['status'])); ?>">
                                        <?php echo htmlspecialchars($feature['status']); ?>
                                    </span>
                                </div>
                                <p class="feature-description"><?php echo htmlspecialchars($feature['description']); ?></p>
                                <div class="feature-progress">
                                    <div class="progress-bar">
                                        <div class="progress-fill" data-progress="<?php
                                                                                    echo $feature['status'] === 'Completed' ? '100' : ($feature['status'] === 'In Progress' ? '60' : '0');
                                                                                    ?>"></div>
                                    </div>
                                    <span class="progress-text">
                                        <?php
                                        echo $feature['status'] === 'Completed' ? '100%' : ($feature['status'] === 'In Progress' ? '60%' : '0%');
                                        ?>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Coming Soon Section -->
                <div class="coming-soon-section">
                    <div class="coming-soon-card">
                        <h3 class="coming-soon-title bebas-neue">More Features Coming Soon</h3>
                        <p class="coming-soon-description">We're continuously working on new features to enhance your EDM experience. Stay tuned for exciting updates!</p>
                        <div class="coming-soon-features">
                            <div class="feature-tag">Live Streaming</div>
                            <div class="feature-tag">Artist Profiles</div>
                            <div class="feature-tag">Social Integration</div>
                            <div class="feature-tag">Mobile App</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-content">
                <div class="footer-main">
                    <div class="footer-brand">
                        <div class="footer-logo">
                            <div class="logo-square">
                                <span class="logo-icon">♥</span>
                            </div>
                            <span class="logo-text">BEATSYNC</span>
                        </div>
                        <div class="footer-tagline">The ultimate EDM experience.</div>
                        <div class="footer-contact">
                            <p><?php echo htmlspecialchars($siteConfig['contact']['address']); ?></p>
                            <p>Phone: <?php echo htmlspecialchars($siteConfig['contact']['phone']); ?></p>
                            <p>Email: <?php echo htmlspecialchars($siteConfig['contact']['email']); ?></p>
                        </div>
                        <div class="footer-social">
                            <a href="#" aria-label="Facebook">f</a>
                            <a href="#" aria-label="Twitter">𝕏</a>
                            <a href="#" aria-label="Instagram">📷</a>
                        </div>
                    </div>

                    <div class="footer-links">
                        <?php foreach ($footerLinks as $category => $links): ?>
                            <div class="footer-column">
                                <h3><?php echo htmlspecialchars($category); ?></h3>
                                <ul>
                                    <?php foreach ($links as $link): ?>
                                        <li><a href="<?php echo $link['href']; ?>"><?php echo htmlspecialchars($link['text']); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="newsletter-section">
                        <h3 class="newsletter-title">GET OUR LATEST UPDATES</h3>
                        <form class="newsletter-form" method="POST" action="landing.php">
                            <input type="email" name="newsletter_email" class="newsletter-input" placeholder="Enter your email" required />
                            <button type="submit" class="newsletter-btn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p class="copyright">© Copyright <strong><?php echo htmlspecialchars($siteConfig['company_name']); ?></strong>. All Rights Reserved</p>
            </div>
        </footer>
    </main>

    <!-- External JavaScript -->
    <script src="<?php echo $siteConfig['js_path']; ?>"></script>
</body>

</html>