<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Create your BeatSync account to access exclusive EDM events and book tickets." />

    <!-- External CSS -->
    <link rel="stylesheet" href="./css/signup.css">
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

        <!-- Sign Up Section -->
        <section class="auth-section">

            <div class="auth-content">
                <!-- Background Text -->
                <div class="section-bg-text">SIGN UP</div>

                <div class="auth-form-card">
                    <div class="auth-header-text">
                        <h1 class="auth-title">JOIN THE BEAT!</h1>
                        <p class="auth-subtitle">Create your account to get started</p>
                    </div>

                    <form class="auth-form" id="signupForm">
                        <div class="form-group">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input
                                type="text"
                                id="fullname"
                                name="fullname"
                                class="form-input"
                                placeholder="Enter your full name"
                                required />
                        </div>

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
                                    placeholder="Create a password"
                                    required />
                                <button type="button" class="password-toggle" id="togglePassword">
                                    <span class="eye-icon"></span>
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <div class="password-wrapper">
                                <input
                                    type="password"
                                    id="confirm_password"
                                    name="confirm_password"
                                    class="form-input"
                                    placeholder="Re-enter your password"
                                    required />
                                <button type="button" class="password-toggle" id="toggleConfirmPassword">
                                    <span class="eye-icon"></span>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="btn-signup">Sign Up</button>
                    </form>

                    <div class="auth-footer">
                        <p class="auth-footer-text">
                            Already have an account?
                            <a href="login.php" class="link-login">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="auth-page-footer">
            <p>Copyright © All Rights Reserved</p>
        </footer>
    </main>

    <!-- External JavaScript -->
    <script src="./js/signup.js"></script>
</body>

</html>