<?php
// BeatSync - Mood Board Page
// Dynamic content variables
$pageTitle = "Mood Board - BeatSync | EDM Brand Guidelines & Design System";
$pageDescription = "Explore BeatSync's brand guidelines, color palette, typography, and design elements that define our EDM experience.";
$keywords = "mood board, brand guidelines, design system, color palette, typography, BeatSync, EDM branding";

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
    'css_path' => './css/moodboard.css',
    'js_path' => './js/moodboard-script.js'
];

// Navigation items
$navigation = [
    ['href' => 'landing', 'text' => 'Home'],
    ['href' => '#events', 'text' => 'Events'],
    ['href' => '#tickets', 'text' => 'Tickets']
];

// Color palette data
$colorPalette = [
    [
        'name' => 'Primary Red',
        'hex' => '#FE4858',
        'usage' => 'Main brand color, CTAs, highlights'
    ],
    [
        'name' => 'Dark Gray',
        'hex' => '#35373B',
        'usage' => 'Secondary elements, borders'
    ],
    [
        'name' => 'Deep Black',
        'hex' => '#181818',
        'usage' => 'Background, text on light surfaces'
    ]
];

// Typography data
$typography = [
    'headings' => [
        'font' => 'Bebas Neue',
        'weight' => '400',
        'usage' => 'Headlines, titles, hero text'
    ],
    'body' => [
        'font' => 'Inter',
        'weight' => '300-700',
        'usage' => 'Body text, descriptions, UI elements'
    ]
];

// Button types
$buttonTypes = [
    [
        'name' => 'Primary',
        'class' => 'btn-primary',
        'description' => 'Main actions, CTA'
    ],
    [
        'name' => 'Secondary',
        'class' => 'btn-secondary',
        'description' => 'Secondary actions'
    ],
    [
        'name' => 'Border',
        'class' => 'btn-border',
        'description' => 'Outline buttons'
    ],
    [
        'name' => 'Disabled',
        'class' => 'btn-disabled',
        'description' => 'Inactive state'
    ]
];

// Card samples
$cardSamples = [
    [
        'title' => 'Business Brand',
        'description' => 'The ultimate EDM experience.',
        'type' => 'brand'
    ],
    [
        'title' => 'Description',
        'description' => 'Experience the ultimate EDM journey with world-class DJs that will transform your night into pure magic.',
        'type' => 'description'
    ],
    [
        'title' => 'Headline',
        'description' => 'Live a life that is one of a kind.',
        'type' => 'headline'
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

        <!-- Mood Board Section -->
        <section class="moodboard-section" id="moodboard">
            <div class="moodboard-container">
                <div class="moodboard-header">
                    <h1 class="moodboard-title bebas-neue">MOOD BOARD</h1>
                </div>

                <!-- Color Palette -->
                <div class="section-block" id="color-palette">
                    <h2 class="section-title bebas-neue">Color Palette</h2>
                    <div class="color-grid">
                        <?php foreach ($colorPalette as $color): ?>
                            <div class="color-card" data-color="<?php echo $color['hex']; ?>">
                                <div class="color-swatch" style="background-color: <?php echo $color['hex']; ?>"></div>
                                <div class="color-info">
                                    <div class="color-hex"><?php echo $color['hex']; ?></div>
                                    <div class="color-name"><?php echo $color['name']; ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Typography -->
                <div class="section-block" id="typography">
                    <h2 class="section-title bebas-neue">Typography</h2>
                    <div class="typography-showcase">
                        <div class="font-demo">
                            <h3 class="font-label">HEADINGS: BEBAS NEUE</h3>
                            <div class="font-sample bebas-neue">LIVE A LIFE THAT IS ONE OF A KIND</div>
                        </div>
                        <div class="font-demo">
                            <h3 class="font-label">Body: Inter</h3>
                            <div class="font-sample">Experience the ultimate EDM journey with world-class DJs that will transform your night into pure magic.</div>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="section-block" id="buttons">
                    <h2 class="section-title bebas-neue">Buttons</h2>
                    <div class="button-showcase">
                        <?php foreach ($buttonTypes as $button): ?>
                            <div class="button-demo">
                                <button class="<?php echo $button['class']; ?>" <?php echo $button['name'] === 'Disabled' ? 'disabled' : ''; ?>>
                                    <?php echo $button['name']; ?>
                                </button>
                                <div class="button-label"><?php echo $button['description']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Card Samples -->
                <div class="section-block" id="card-samples">
                    <h2 class="section-title bebas-neue">Card Samples</h2>
                    <div class="cards-showcase">
                        <?php foreach ($cardSamples as $card): ?>
                            <div class="sample-card <?php echo $card['type']; ?>-card">
                                <h3 class="card-title bebas-neue"><?php echo $card['title']; ?></h3>
                                <p class="card-description"><?php echo $card['description']; ?></p>
                                <button class="card-btn">Read More</button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Logo -->
                <div class="section-block" id="logo">
                    <h2 class="section-title bebas-neue">Logo</h2>
                    <div class="logo-showcase">
                        <div class="logo-sample">
                            <div class="logo-display">
                                <div class="logo-square large">
                                    <span class="logo-icon">♥</span>
                                </div>
                                <span class="logo-text large">BEATSYNC</span>
                            </div>
                            <div class="logo-description">Primary logo with square background</div>
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
                        <form class="newsletter-form" method="POST" action="index.php">
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