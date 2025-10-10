$navigation = [
    ['href' => '#home', 'text' => 'Home'],
    ['href' => '#events', 'text' => 'Events'],
    ['href' => '#tickets', 'text' => 'Tickets']
];

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