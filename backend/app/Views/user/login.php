<!DOCTYPE html>
<html lang="en">
<title>Login - BeatSync | EDM Events Platform</title>

<head>
    <meta name="description" content="Sign in to BeatSync to access exclusive EDM events and book tickets." />

    <!-- External CSS -->
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue:wght@400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <main class="auth-container">
        <!-- Header -->
        <header class="auth-header">
            <a href="landing.php" class="header-logo">
                <div class="logo-square">
                    <span class="logo-icon">♥</span>
                </div>
                <span class="logo-text">BEATSYNC</span>
            </a>
            <nav class="header-nav">
                <a href="landing.php" class="nav-link">Home</a>
                <a href="landing.php#events" class="nav-link">Events</a>
                <a href="landing.php#tickets" class="nav-link">Tickets</a>
            </nav>
        </header>

        <!-- Login Section -->
        <section class="auth-section">

            <div class="auth-content">
                <!-- Background Text -->
                <div class="section-bg-text">LOGIN</div>

                <div class="auth-form-card">
                    <div class="auth-header-text">
                        <h1 class="auth-title">STAY TUNED FOR 2026 TICKETS!</h1>
                        <p class="auth-subtitle">Please sign in to continue</p>
                    </div>

                    <form class="auth-form" id="loginForm">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-input"
                                placeholder="Enter your email"
                                required />
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <div class="password-wrapper">
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-input"
                                    placeholder="Enter your password"
                                    required />
                                <button type="button" class="password-toggle" id="togglePassword">
                                    <span class="eye-icon">️</span>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="btn-login">Login</button>
                    </form>

                    <div class="auth-footer">
                        <p class="auth-footer-text">
                            Don't have an account?
                            <a href="/signup" class="link-signup">Sign Up</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="auth-page-footer">
            <p>Copyright ©. All Rights Reserved</p>
        </footer>
    </main>

    <!-- External JavaScript -->
</body>

</html>