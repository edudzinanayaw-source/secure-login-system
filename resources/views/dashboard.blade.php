<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Secure Login System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #1e3a8a;
            --primary-dark: #172554;
            --background: #f4f7fb;
            --white: #ffffff;
            --text: #111827;
            --muted: #6b7280;
            --border: #e5e7eb;
            --success: #16a34a;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
            min-height: 100vh;
        }

        /* =========================
           NAVIGATION
           ========================= */

        .navbar {
            height: 70px;
            background: var(--white);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 6%;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--primary);
            font-weight: bold;
            font-size: 17px;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            background: var(--primary);
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logout-button {
            border: 1px solid #d1d5db;
            background: white;
            color: #374151;
            padding: 9px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
        }

        .logout-button:hover {
            background: #f9fafb;
            border-color: var(--primary);
            color: var(--primary);
        }

        /* =========================
           MAIN
           ========================= */

        .container {
            width: 88%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .welcome p {
            color: var(--muted);
            font-size: 14px;
        }

        /* =========================
           WELCOME CARD
           ========================= */

        .hero {
            background:
                linear-gradient(
                    135deg,
                    #172554,
                    #1e3a8a,
                    #2563eb
                );
            color: white;
            border-radius: 18px;
            padding: 32px;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 50%;
            right: -70px;
            top: -80px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero h2 {
            font-size: 23px;
            margin-bottom: 10px;
        }

        .hero p {
            color: rgba(255,255,255,0.78);
            font-size: 14px;
            line-height: 1.6;
        }

        /* =========================
           CARDS
           ========================= */

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 22px;
        }

        .card-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #eff6ff;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .card h3 {
            font-size: 15px;
            margin-bottom: 7px;
        }

        .card p {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.5;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 12px;
            font-size: 11px;
            color: var(--success);
            font-weight: bold;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            background: var(--success);
            border-radius: 50%;
        }

        /* =========================
           SECURITY SECTION
           ========================= */

        .security-section {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 25px;
        }

        .security-section h2 {
            font-size: 18px;
            margin-bottom: 7px;
        }

        .security-section > p {
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 22px;
        }

        .security-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 0;
            border-top: 1px solid #f0f0f0;
        }

        .security-item-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .security-item-icon {
            width: 35px;
            height: 35px;
            border-radius: 9px;
            background: #f0fdf4;
            color: var(--success);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .security-item h4 {
            font-size: 13px;
            margin-bottom: 3px;
        }

        .security-item span {
            font-size: 11px;
            color: var(--muted);
        }

        .enabled {
            font-size: 11px;
            color: var(--success);
            font-weight: bold;
        }

        /* =========================
           FOOTER
           ========================= */

        footer {
            text-align: center;
            padding: 30px;
            color: #9ca3af;
            font-size: 11px;
        }

        /* =========================
           RESPONSIVE
           ========================= */

        @media (max-width: 750px) {

            .navbar {
                padding: 0 20px;
            }

            .container {
                width: 92%;
                margin: 25px auto;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .welcome h1 {
                font-size: 25px;
            }

            .hero {
                padding: 25px;
            }
        }

        @media (max-width: 450px) {

            .brand span {
                display: none;
            }

            .security-item {
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>
</head>

<body>

<!-- =========================
     NAVIGATION
     ========================= -->

<nav class="navbar">

    <div class="brand">

        <div class="brand-icon">
            🔐
        </div>

        <span>Secure Login System</span>

    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button
            type="submit"
            class="logout-button"
        >
            Logout
        </button>

    </form>

</nav>


<!-- =========================
     MAIN CONTENT
     ========================= -->

<main class="container">

    <div class="welcome">

        <h1>Dashboard</h1>

        <p>
            Welcome back. Your account is securely authenticated.
        </p>

    </div>


    <!-- HERO -->

    <section class="hero">

        <div class="hero-content">

            <h2>
                Welcome, {{ auth()->user()->name }} 👋
            </h2>

            <p>
                You have successfully completed the authentication
                process and are now securely signed in to the system.
            </p>

        </div>

    </section>


    <!-- SUMMARY CARDS -->

    <section class="cards">

        <div class="card">

            <div class="card-icon">
                👤
            </div>

            <h3>Account</h3>

            <p>
                Your account has been successfully authenticated.
            </p>

            <div class="status">
                <span class="status-dot"></span>
                Authenticated
            </div>

        </div>


        <div class="card">

            <div class="card-icon">
                🛡️
            </div>

            <h3>Security</h3>

            <p>
                Multiple security layers protect your credentials.
            </p>

            <div class="status">
                <span class="status-dot"></span>
                Protected
            </div>

        </div>


        <div class="card">

            <div class="card-icon">
                🔑
            </div>

            <h3>Access Level</h3>

            <p>
                Your account is operating with its assigned role.
            </p>

            <div class="status">
                <span class="status-dot"></span>
                {{ ucfirst(auth()->user()->role) }}
            </div>

        </div>

    </section>


    <!-- SECURITY OVERVIEW -->

    <section class="security-section">

        <h2>Security Overview</h2>

        <p>
            Your account is protected by multiple authentication
            and authorization mechanisms.
        </p>


        <div class="security-item">

            <div class="security-item-left">

                <div class="security-item-icon">
                    ✓
                </div>

                <div>

                    <h4>Password Authentication</h4>

                    <span>
                        Password credentials verified successfully.
                    </span>

                </div>

            </div>

            <div class="enabled">
                ACTIVE
            </div>

        </div>


        <div class="security-item">

            <div class="security-item-left">

                <div class="security-item-icon">
                    ✓
                </div>

                <div>

                    <h4>Password Protection</h4>

                    <span>
                        Password protected using hashing and secret pepper.
                    </span>

                </div>

            </div>

            <div class="enabled">
                ACTIVE
            </div>

        </div>


        <div class="security-item">

            <div class="security-item-left">

                <div class="security-item-icon">
                    ✓
                </div>

                <div>

                    <h4>Two-Factor Authentication</h4>

                    <span>
                        Additional verification protects account access.
                    </span>

                </div>

            </div>

            <div class="enabled">
                ACTIVE
            </div>

        </div>


        <div class="security-item">

            <div class="security-item-left">

                <div class="security-item-icon">
                    ✓
                </div>

                <div>

                    <h4>Role-Based Authorization</h4>

                    <span>
                        Access is controlled according to your assigned role.
                    </span>

                </div>

            </div>

            <div class="enabled">
                ACTIVE
            </div>

        </div>

    </section>

</main>


<footer>
    Secure Login System • Authentication & Authorization
</footer>

</body>
</html>