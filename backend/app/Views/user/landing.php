<?php
// BeatSync - EDM Events Landing Page
// Dynamic content variables
$pageTitle = "BeatSync - Ultimate EDM Events & Music Festivals 2025 | Electronic Dance Music";
$pageDescription = "Experience world-class EDM events with BeatSync. Book tickets for electronic music festivals, live DJ performances, and dance music concerts. Transform your night into pure magic.";
$keywords = "EDM events, electronic music festivals, dance music concerts, DJ performances, music tickets, BeatSync, electronic dance music, live events 2025";

// Site configuration
$siteConfig = [
    'company_name' => 'BeatSync',
    'contact' => [
        'address' => '',
        'phone' => '',
        'email' => ''
    ],
    'current_year' => date('Y'),
    'assets_path' => './images/event1.jpg',
    'css_path' => './css/style.css',
    'js_path' => './js/script.js' // fixed .jss → .js
];

// Events data (can be fetched from database)
$events = [
    [
        'id' => 1,
        'title' => 'Electric Night Festival',
        'image' => 'https://images.unsplash.com/photo-1675480481794-8650d8419296?q=80&w=435&auto=format&fit=crop',
        'alt' => 'Electronic music festival with vibrant stage lighting'
    ],
    [
        'id' => 2,
        'title' => 'Beat Drop Experience',
        'image' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQ9dZ2_8mhjHiVXskeLxAwZ_eJhZOziOmiUlo_wRpKsf0vxsi_rlU82pJUM61i4l5HTWKCxXHW1YWgqsbY',
        'alt' => 'DJ performance with crowd and atmospheric lighting'
    ],
    [
        'id' => 3,
        'title' => 'Dark Halloween Rave',
        'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fedm-addicts.com%2Fevents%2Fdark-festival&psig=AOvVaw0A_MPeUTuBrPsWjOoKsK0S&ust=1760089883686000&source=images&cd=vfe&opi=89978449&ved=2ahUKEwiUoMvz65aQAxVYrq8BHYsFJHkQjRx6BAgAEBo',
        'alt' => 'Dark Halloween music festival with special effects'
    ]
];

// Handle newsletter submission
$newsletter_message = '';
if ($_POST && isset($_POST['newsletter_email'])) {
    $email = filter_var($_POST['newsletter_email'], FILTER_VALIDATE_EMAIL);
    if ($email) {
        // Save to DB or send to email service
        $newsletter_message = 'success';
    } else {
        $newsletter_message = 'error';
    }
}

// Navigation items
$navigation = [
    ['href' => '#home', 'text' => 'Home'],
    ['href' => '#events', 'text' => 'Events'],
    ['href' => '#tickets', 'text' => 'Tickets']
];

// Footer links (with moodboard & roadmap)
$footerLinks = [
    'Menu' => [
        ['href' => '#home', 'text' => 'Home'],
        ['href' => '#events', 'text' => 'Events'],
        ['href' => '#tickets', 'text' => 'Tickets']
    ],
    'Company' => [
        ['href' => 'moodboard', 'text' => 'Mood Board'],
        ['href' => 'roadmap', 'text' => 'Road Map']
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
                <a href="/login" class="login-link">Login</a>
                <a href="/signup" class="signup-btn">Sign Up</a>
            </div>

            <button class="hamburger" aria-label="Menu">☰</button>
        </header>

        <!-- Newsletter Message -->
        <?php if ($newsletter_message === 'success'): ?>
            <div class="alert alert-success" style="background: #4CAF50; color: white; padding: 16px; text-align: center; margin-top: 16px;">
                ✅ Thank you for subscribing! You'll receive our latest updates.
            </div>
        <?php elseif ($newsletter_message === 'error'): ?>
            <div class="alert alert-error" style="background: #f44336; color: white; padding: 16px; text-align: center; margin-top: 16px;">
                ❌ Please enter a valid email address.
            </div>
        <?php endif; ?>

        <!-- Hero Section -->
        <section class="hero-section" id="home">
            <div class="hero-container">
                <div class="hero-content">
                    <h1 class="hero-title">LIVE A LIFE THAT IS<br>ONE OF A KIND</h1>
                    <p class="hero-description">Experience the ultimate EDM journey with world-class DJs that will transform your night into pure magic.</p>
                    <div class="hero-buttons">
                        <a href="#tickets" class="btn-primary">Buy Tickets</a>
                        <a href="#highlights" class="btn-secondary">▶ Highlights</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1549046666-7c422ab19783?q=80&w=986&auto=format&fit=crop"
                        alt="EDM concert with dramatic lighting and crowd" />
                </div>
            </div>
        </section>

        <!-- Events Section -->
        <section class="events-section" id="events">
            <div class="events-container">
                <div class="events-header">
                    <h2 class="events-title">UPCOMING EVENTS</h2>
                </div>
                <div class="slider-controls">
                    <button class="slider-control" id="prevBtn" aria-label="Previous events">←</button>
                    <button class="slider-control" id="nextBtn" aria-label="Next events">→</button>
                </div>
                <div class="events-grid">
                    <?php foreach ($events as $event): ?>
                        <div class="event-card" data-event-id="<?php echo $event['id']; ?>">
                            <div class="event-image-wrapper">
                                <img src="<?php echo $event['image']; ?>" alt="<?php echo htmlspecialchars($event['alt']); ?>" />
                                <div class="event-overlay">
                                </div>
                            </div>
                            <div class="event-content">
                                <div class="event-date">
                                    <span class="event-month">OCT</span>
                                    <span class="event-day">31</span>
                                </div>
                                <div class="event-info">
                                    <h3 class="event-name"><?php echo htmlspecialchars($event['title']); ?></h3>
                                    <p class="event-location">BGC, Philippines</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="events-cta">
                    <a href="#all-events" class="btn-view-all"></a>
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
                        <form class="newsletter-form" method="POST" action="">
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