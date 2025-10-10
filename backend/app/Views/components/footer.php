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
