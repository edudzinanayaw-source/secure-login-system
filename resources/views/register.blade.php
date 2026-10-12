<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account | Secure Login System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #1e3a8a;
            --primary-dark: #172554;
            --text: #111827;
            --muted: #6b7280;
            --border: #d1d5db;
            --background: #f3f6fb;
            --white: #ffffff;
            --danger: #dc2626;
            --success: #16a34a;
        }

        body {
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(
                    circle at 10% 20%,
                    rgba(30, 58, 138, 0.08),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 90% 80%,
                    rgba(37, 99, 235, 0.08),
                    transparent 30%
                ),
                var(--background);
            color: var(--text);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .main-container {
            width: 100%;
            max-width: 1050px;
            min-height: 620px;
            background: var(--white);
            border-radius: 24px;
            overflow: hidden;
            box-shadow:
                0 25px 60px rgba(15, 23, 42, 0.12),
                0 4px 12px rgba(15, 23, 42, 0.05);
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* =========================
           LEFT PANEL
           ========================= */

        .security-panel {
            background:
                linear-gradient(
                    145deg,
                    #172554 0%,
                    #1e3a8a 55%,
                    #2563eb 100%
                );
            color: white;
            padding: 55px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .security-panel::before {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 50%;
            top: -120px;
            right: -100px;
        }

        .security-panel::after {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 50%;
            bottom: -220px;
            left: -170px;
        }

        .brand {
            position: relative;
            z-index: 2;
        }

        .brand-mark {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            background: rgba(255,255,255,0.14);
            border: 1px solid rgba(255,255,255,0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            font-size: 27px;
        }

        .brand h1 {
            font-size: 30px;
            line-height: 1.2;
            margin-bottom: 15px;
            letter-spacing: -0.5px;
        }

        .brand-description {
            color: rgba(255,255,255,0.78);
            font-size: 15px;
            line-height: 1.7;
            max-width: 400px;
        }

        .security-features {
            position: relative;
            z-index: 2;
            margin-top: 35px;
        }

        .security-features h3 {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255,255,255,0.65);
            margin-bottom: 20px;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 17px;
            font-size: 14px;
            color: rgba(255,255,255,0.9);
        }

        .feature-icon {
            width: 32px;
            height: 32px;
            border-radius: 9px;
            background: rgba(255,255,255,0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .panel-footer {
            position: relative;
            z-index: 2;
            color: rgba(255,255,255,0.55);
            font-size: 12px;
            line-height: 1.6;
        }

        /* =========================
           REGISTER PANEL
           ========================= */

        .register-panel {
            padding: 45px 55px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-content {
            width: 100%;
            max-width: 390px;
        }

        .mobile-brand {
            display: none;
        }

        .register-header {
            margin-bottom: 25px;
        }

        .register-header h2 {
            font-size: 28px;
            margin-bottom: 8px;
            color: var(--text);
        }

        .register-header p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.5;
        }

        /* =========================
           ERROR MESSAGE
           ========================= */

        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: var(--danger);
            border-radius: 10px;
            padding: 13px 15px;
            margin-bottom: 20px;
            font-size: 13px;
            line-height: 1.5;
        }

        .error-box p {
            margin-bottom: 3px;
        }

        .error-box p:last-child {
            margin-bottom: 0;
        }

        /* =========================
           FORM
           ========================= */

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input {
            width: 100%;
            height: 46px;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0 14px;
            font-size: 14px;
            color: var(--text);
            background: #fff;
            outline: none;
            transition: 0.2s ease;
        }

        .input-wrapper input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.10);
        }

        .password-input {
            padding-right: 48px !important;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            cursor: pointer;
            color: #6b7280;
            font-size: 17px;
            padding: 5px;
        }

        .toggle-password:hover {
            color: var(--primary);
        }

        /* =========================
           PASSWORD REQUIREMENTS
           ========================= */

        .password-help {
            margin-top: 7px;
            font-size: 11px;
            color: var(--muted);
            line-height: 1.5;
        }

        /* =========================
           REGISTER BUTTON
           ========================= */

        .register-button {
            width: 100%;
            height: 49px;
            border: none;
            border-radius: 10px;
            background: var(--primary);
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
            box-shadow: 0 5px 12px rgba(30, 58, 138, 0.20);
            margin-top: 5px;
        }

        .register-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(30, 58, 138, 0.25);
        }

        .register-button:active {
            transform: translateY(0);
        }

        /* =========================
           LOGIN LINK
           ========================= */

        .login-section {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            font-size: 13px;
            color: var(--muted);
        }

        .login-section a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
        }

        .login-section a:hover {
            text-decoration: underline;
        }

        /* =========================
           SECURITY STATUS
           ========================= */

        .security-status {
            margin-top: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            color: #6b7280;
            font-size: 11px;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--success);
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.10);
        }

        /* =========================
           RESPONSIVE
           ========================= */

        @media (max-width: 800px) {

            body {
                padding: 15px;
            }

            .main-container {
                grid-template-columns: 1fr;
                max-width: 480px;
                min-height: auto;
            }

            .security-panel {
                display: none;
            }

            .register-panel {
                padding: 40px 30px;
            }

            .mobile-brand {
                display: block;
                text-align: center;
                margin-bottom: 28px;
            }

            .mobile-brand .brand-mark {
                margin: 0 auto 15px;
                background: var(--primary);
                color: white;
            }

            .mobile-brand h1 {
                color: var(--primary);
                font-size: 23px;
                margin-bottom: 6px;
            }

            .mobile-brand p {
                color: var(--muted);
                font-size: 13px;
            }
        }

        @media (max-width: 420px) {

            .register-panel {
                padding: 30px 20px;
            }

            .register-header h2 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

<div class="main-container">

    <!-- =========================
         SECURITY INFORMATION
         ========================= -->

    <section class="security-panel">

        <div class="brand">

            <div class="brand-mark">
                🛡️
            </div>

            <h1>Create a Secure Account</h1>

            <p class="brand-description">
                Set up your account with strong authentication
                and multiple layers of security from the beginning.
            </p>

            <div class="security-features">

                <h3>Built-in Protection</h3>

                <div class="feature">
                    <div class="feature-icon">✓</div>
                    <span>Secure password hashing</span>
                </div>

                <div class="feature">
                    <div class="feature-icon">✓</div>
                    <span>Unique password salts</span>
                </div>

                <div class="feature">
                    <div class="feature-icon">✓</div>
                    <span>Secret pepper protection</span>
                </div>

                <div class="feature">
                    <div class="feature-icon">✓</div>
                    <span>Two-factor authentication</span>
                </div>

                <div class="feature">
                    <div class="feature-icon">✓</div>
                    <span>Role-based access control</span>
                </div>

            </div>

        </div>

        <div class="panel-footer">
            Secure Login System<br>
            Authentication • Authorization • Account Protection
        </div>

    </section>


    <!-- =========================
         REGISTRATION FORM
         ========================= -->

    <section class="register-panel">

        <div class="register-content">

            <!-- Mobile branding -->

            <div class="mobile-brand">

                <div class="brand-mark">
                    🛡️
                </div>

                <h1>Secure Login System</h1>

                <p>Create your secure account.</p>

            </div>


            <div class="register-header">

                <h2>Create your account</h2>

                <p>
                    Enter your details below to get started.
                </p>

            </div>


            <!-- ERROR MESSAGES -->

            @if ($errors->any())

                <div class="error-box">

                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach

                </div>

            @endif


            <!-- REGISTRATION FORM -->

            <form method="POST" action="{{ route('register.store') }}">

                @csrf

                <!-- NAME -->

                <div class="form-group">

                    <label for="name">
                        Full Name
                    </label>

                    <div class="input-wrapper">

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            autocomplete="name"
                            placeholder="Enter your full name"
                            required
                        >

                    </div>

                </div>


                <!-- EMAIL -->

                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>

                    <div class="input-wrapper">

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            placeholder="you@example.com"
                            required
                        >

                    </div>

                </div>


                <!-- PASSWORD -->

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="input-wrapper">

                        <input
                            id="password"
                            class="password-input"
                            type="password"
                            name="password"
                            autocomplete="new-password"
                            placeholder="Create a strong password"
                            required
                        >

                        <button
                            type="button"
                            class="toggle-password"
                            onclick="togglePassword('password', 'passwordToggle')"
                            id="passwordToggle"
                            aria-label="Show password"
                        >
                            👁
                        </button>

                    </div>

                    <p class="password-help">
                        Use a strong password that is difficult to guess.
                    </p>

                </div>


                <!-- CONFIRM PASSWORD -->

                <div class="form-group">

                    <label for="password_confirmation">
                        Confirm Password
                    </label>

                    <div class="input-wrapper">

                        <input
                            id="password_confirmation"
                            class="password-input"
                            type="password"
                            name="password_confirmation"
                            autocomplete="new-password"
                            placeholder="Re-enter your password"
                            required
                        >

                        <button
                            type="button"
                            class="toggle-password"
                            onclick="togglePassword('password_confirmation', 'confirmPasswordToggle')"
                            id="confirmPasswordToggle"
                            aria-label="Show password"
                        >
                            👁
                        </button>

                    </div>

                </div>


                <!-- REGISTER -->

                <button
                    type="submit"
                    class="register-button"
                >
                    Create Secure Account
                </button>

            </form>


            <!-- LOGIN -->

            <div class="login-section">

                Already have an account?

                <a href="{{ route('login') }}">
                    Sign in
                </a>

            </div>


            <!-- SECURITY STATUS -->

            <div class="security-status">

                <span class="status-dot"></span>

                <span>
                    Secure account creation enabled
                </span>

            </div>

        </div>

    </section>

</div>


<script>

    function togglePassword(inputId, buttonId) {

        const password =
            document.getElementById(inputId);

        const toggle =
            document.getElementById(buttonId);

        if (password.type === "password") {

            password.type = "text";

            toggle.textContent = "🙈";

            toggle.setAttribute(
                "aria-label",
                "Hide password"
            );

        } else {

            password.type = "password";

            toggle.textContent = "👁";

            toggle.setAttribute(
                "aria-label",
                "Show password"
            );
        }
    }

</script>

</body>
</html>