<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Secure Login System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #1e3a8a;
            --primary-dark: #172554;
            --primary-light: #dbeafe;
            --text: #111827;
            --muted: #6b7280;
            --border: #d1d5db;
            --background: #f3f6fb;
            --white: #ffffff;
            --success: #16a34a;
            --danger: #dc2626;
        }

        body {
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at 10% 20%, rgba(30, 58, 138, 0.08), transparent 30%),
                radial-gradient(circle at 90% 80%, rgba(37, 99, 235, 0.08), transparent 30%),
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
           LEFT SECURITY PANEL
           ========================= */

        .security-panel {
            background:
                linear-gradient(145deg, #172554 0%, #1e3a8a 55%, #2563eb 100%);
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
           LOGIN PANEL
           ========================= */

        .login-panel {
            padding: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-content {
            width: 100%;
            max-width: 390px;
        }

        .mobile-brand {
            display: none;
        }

        .login-header {
            margin-bottom: 30px;
        }

        .login-header h2 {
            font-size: 28px;
            margin-bottom: 8px;
            color: var(--text);
        }

        .login-header p {
            color: var(--muted);
            font-size: 14px;
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
            margin-bottom: 22px;
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
            margin-bottom: 20px;
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
            height: 48px;
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
           OPTIONS
           ========================= */

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 5px 0 25px;
            font-size: 13px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #4b5563;
        }

        .remember input {
            width: 15px;
            height: 15px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .remember label {
            cursor: pointer;
        }

        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        /* =========================
           LOGIN BUTTON
           ========================= */

        .login-button {
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
        }

        .login-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(30, 58, 138, 0.25);
        }

        .login-button:active {
            transform: translateY(0);
        }

        /* =========================
           REGISTER
           ========================= */

        .register-section {
            text-align: center;
            margin-top: 25px;
            padding-top: 23px;
            border-top: 1px solid #e5e7eb;
            font-size: 13px;
            color: var(--muted);
        }

        .register-section a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
        }

        .register-section a:hover {
            text-decoration: underline;
        }

        /* =========================
           SECURITY STATUS
           ========================= */

        .security-status {
            margin-top: 20px;
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

            .login-panel {
                padding: 40px 30px;
            }

            .mobile-brand {
                display: block;
                text-align: center;
                margin-bottom: 30px;
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
            .login-panel {
                padding: 30px 20px;
            }

            .login-header h2 {
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
                🔐
            </div>

            <h1>Secure Login System</h1>

            <p class="brand-description">
                A secure authentication system designed to protect
                user accounts through multiple layers of security.
            </p>

            <div class="security-features">

                <h3>Security Layers</h3>

                <div class="feature">
                    <div class="feature-icon">✓</div>
                    <span>Secure password authentication</span>
                </div>

                <div class="feature">
                    <div class="feature-icon">✓</div>
                    <span>Password hashing with unique salts</span>
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
         LOGIN
         ========================= -->

    <section class="login-panel">

        <div class="login-content">

            <!-- Mobile-only branding -->

            <div class="mobile-brand">

                <div class="brand-mark">
                    🔐
                </div>

                <h1>Secure Login System</h1>

                <p>Secure authentication starts here.</p>

            </div>


            <div class="login-header">

                <h2>Welcome back</h2>

                <p>
                    Sign in to access your account.
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


            <!-- LOGIN FORM -->

            <form method="POST" action="{{ route('login.store') }}">

                @csrf

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
                            autocomplete="current-password"
                            placeholder="Enter your password"
                            required
                        >

                        <button
                            type="button"
                            class="toggle-password"
                            onclick="togglePassword()"
                            aria-label="Show password"
                            id="passwordToggle"
                        >
                            👁
                        </button>

                    </div>

                </div>


                <!-- OPTIONS -->

                <div class="form-options">

                    <div class="remember">

                        <input
                            id="remember"
                            type="checkbox"
                            name="remember"
                        >

                        <label for="remember">
                            Remember me
                        </label>

                    </div>

                    @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="forgot-password"
                        >
                            Forgot password?
                        </a>

                    @endif

                </div>


                <!-- LOGIN -->

                <button
                    type="submit"
                    class="login-button"
                >
                    Sign In
                </button>

            </form>


            <!-- REGISTER -->

            <div class="register-section">

                Don't have an account?

                <a href="{{ route('register') }}">
                    Create an account
                </a>

            </div>


            <!-- SECURITY STATUS -->

            <div class="security-status">

                <span class="status-dot"></span>

                <span>
                    Secure authentication enabled
                </span>

            </div>

        </div>

    </section>

</div>


<script>

    function togglePassword() {

        const password =
            document.getElementById("password");

        const toggle =
            document.getElementById("passwordToggle");

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