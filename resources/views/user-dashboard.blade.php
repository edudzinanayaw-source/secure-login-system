<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | Secure Login System</title>

```
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #f3f6fb;
        color: #172033;
    }

    .layout {
        display: flex;
        min-height: 100vh;
    }

    .sidebar {
        width: 255px;
        background: #14213d;
        color: white;
        padding: 28px 18px;
        display: flex;
        flex-direction: column;
        flex-shrink: 0;
    }

    .brand {
        font-size: 19px;
        font-weight: bold;
        line-height: 1.5;
        padding: 0 12px 30px;
        border-bottom: 1px solid #34415b;
    }

    .brand span {
        display: block;
        color: #93c5fd;
        font-size: 12px;
        font-weight: normal;
        margin-top: 4px;
    }

    .nav-title {
        color: #9caac2;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin: 28px 12px 12px;
    }

    .nav-link {
        display: block;
        color: #dbe5f5;
        text-decoration: none;
        padding: 13px 12px;
        border-radius: 9px;
        margin-bottom: 5px;
        font-size: 14px;
        transition: 0.2s;
    }

    .nav-link:hover,
    .nav-link.active {
        background: #263b60;
        color: white;
    }

    .sidebar-bottom {
        margin-top: auto;
        padding-top: 30px;
    }

    .main {
        flex: 1;
        min-width: 0;
        padding: 30px 36px;
    }

    .topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 35px;
    }

    .topbar h1 {
        font-size: 25px;
        margin-bottom: 7px;
    }

    .muted {
        color: #718096;
        font-size: 13px;
        line-height: 1.6;
    }

    .profile-chip {
        display: flex;
        align-items: center;
        gap: 12px;
        background: white;
        padding: 10px 15px;
        border-radius: 12px;
        box-shadow: 0 3px 15px rgba(15, 23, 42, 0.04);
    }

    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: #dbeafe;
        color: #1d4ed8;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 18px;
    }

    .profile-name {
        font-size: 13px;
        font-weight: bold;
        margin-bottom: 4px;
    }

    .profile-role {
        font-size: 11px;
        color: #718096;
    }

    .welcome {
        background: linear-gradient(120deg, #1e3a8a, #2563eb);
        color: white;
        padding: 30px;
        border-radius: 18px;
        margin-bottom: 28px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        box-shadow: 0 12px 30px rgba(37, 99, 235, 0.15);
    }

    .welcome h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .welcome p {
        color: #dbeafe;
        font-size: 14px;
        line-height: 1.7;
    }

    .welcome-badge {
        background: rgba(255, 255, 255, 0.13);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 12px 16px;
        border-radius: 12px;
        font-size: 12px;
        white-space: nowrap;
    }

    .section-heading {
        font-size: 17px;
        margin-bottom: 18px;
    }

    .stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        padding: 23px;
        border-radius: 14px;
        border: 1px solid #e8edf5;
        box-shadow: 0 4px 16px rgba(15, 23, 42, 0.025);
    }

    .stat-icon {
        width: 43px;
        height: 43px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
        margin-bottom: 19px;
    }

    .blue {
        background: #dbeafe;
    }

    .green {
        background: #dcfce7;
    }

    .purple {
        background: #ede9fe;
    }

    .stat-label {
        color: #718096;
        font-size: 12px;
        margin-bottom: 9px;
    }

    .stat-value {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .stat-note {
        font-size: 11px;
        color: #718096;
        line-height: 1.5;
    }

    .content-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.4fr) minmax(250px, 1fr);
        gap: 22px;
        margin-bottom: 25px;
    }

    .panel {
        background: white;
        border: 1px solid #e8edf5;
        border-radius: 14px;
        padding: 25px;
    }

    .panel h3 {
        font-size: 16px;
        margin-bottom: 8px;
    }

    .panel-description {
        color: #718096;
        font-size: 12px;
        line-height: 1.6;
        margin-bottom: 22px;
    }

    .security-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding: 16px 0;
        border-bottom: 1px solid #edf1f7;
    }

    .security-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .security-title {
        font-size: 13px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .security-description {
        color: #718096;
        font-size: 11px;
        line-height: 1.5;
    }

    .status {
        padding: 6px 9px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: bold;
        white-space: nowrap;
    }

    .status-success {
        color: #15803d;
        background: #dcfce7;
    }

    .status-neutral {
        color: #475569;
        background: #e2e8f0;
    }

    .quick-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 15px 0;
        text-decoration: none;
        color: #24334d;
        border-bottom: 1px solid #edf1f7;
        font-size: 13px;
    }

    .quick-link:last-child {
        border-bottom: none;
    }

    .quick-link:hover {
        color: #2563eb;
    }

    .quick-link span:last-child {
        color: #94a3b8;
        font-size: 18px;
    }

    .account-details {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .detail-label {
        color: #718096;
        font-size: 11px;
        margin-bottom: 7px;
    }

    .detail-value {
        font-size: 13px;
        font-weight: bold;
        overflow-wrap: anywhere;
    }

    .footer {
        text-align: center;
        color: #94a3b8;
        font-size: 11px;
        padding: 25px 0 5px;
    }

    .logout-button {
        width: 100%;
        border: 1px solid #52617a;
        border-radius: 9px;
        background: transparent;
        color: #fca5a5;
        padding: 12px;
        font-size: 13px;
        cursor: pointer;
    }

    .logout-button:hover {
        background: #263b60;
    }

    @media (max-width: 1050px) {
        .sidebar {
            width: 220px;
        }

        .main {
            padding: 25px;
        }

        .stats {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .content-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 700px) {
        .layout {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
            padding: 18px;
        }

        .brand {
            padding-bottom: 15px;
        }

        .nav-title {
            margin-top: 17px;
        }

        .sidebar-bottom {
            margin-top: 12px;
            padding-top: 0;
        }

        .main {
            padding: 22px 16px;
        }

        .topbar {
            align-items: flex-start;
            flex-direction: column;
        }

        .welcome {
            align-items: flex-start;
            flex-direction: column;
            padding: 23px;
        }

        .welcome h2 {
            font-size: 21px;
        }

        .stats {
            grid-template-columns: 1fr;
        }

        .account-details {
            grid-template-columns: 1fr;
        }
    }
</style>
```

</head>

<body>

<div class="layout">

```
<aside class="sidebar">

    <div class="brand">
        🔐 SecureLogin
        <span>Account Security Portal</span>
    </div>

    <div class="nav-title">Workspace</div>

    <a href="{{ route('user.dashboard') }}" class="nav-link active">
        ◈ &nbsp; My Dashboard
    </a>

    <a href="#account" class="nav-link">
        👤 &nbsp; My Account
    </a>

    <a href="{{ route('two-factor.setup') }}" class="nav-link">
        🛡️ &nbsp; Security Settings
    </a>

    <div class="nav-title">Account</div>

    <a href="#security" class="nav-link">
        🔑 &nbsp; Security Overview
    </a>

    <div class="sidebar-bottom">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-button">
                ↪ &nbsp; Sign Out
            </button>
        </form>
    </div>

</aside>

<main class="main">

    <header class="topbar">

        <div>
            <h1>My Dashboard</h1>
            <p class="muted">Manage your account and keep your information secure.</p>
        </div>

        <div class="profile-chip">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
            </div>

            <div>
                <div class="profile-name">
                    {{ auth()->user()->name }}
                </div>
                <div class="profile-role">Standard User</div>
            </div>
        </div>

    </header>

    <section class="welcome">

        <div>
            <h2>Welcome back, {{ auth()->user()->name }}! 👋</h2>

            <p>
                Welcome to your personal security dashboard.
                Manage your account settings and review your security options
                from one convenient place.
            </p>
        </div>

        <div class="welcome-badge">
            🔒 Personal Account
        </div>

    </section>

    <h2 class="section-heading">Account Overview</h2>

    <section class="stats">

        <div class="stat-card">
            <div class="stat-icon blue">👤</div>

            <div class="stat-label">Account Type</div>

            <div class="stat-value">Standard User</div>

            <div class="stat-note">
                Your account has regular user access.
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon green">🔐</div>

            <div class="stat-label">Authentication</div>

            <div class="stat-value">Password Protected</div>

            <div class="stat-note">
                Your account uses password-based authentication.
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon purple">🛡️</div>

            <div class="stat-label">Account Security</div>

            <div class="stat-value">
                @if (auth()->user()->two_factor_secret)
                    2FA Enabled
                @else
                    Review Settings
                @endif
            </div>

            <div class="stat-note">
                Check your security settings to review additional protection.
            </div>
        </div>

    </section>

    <section class="content-grid">

        <div class="panel" id="security">

            <h3>Security Overview</h3>

            <p class="panel-description">
                Review the security features available for your account.
            </p>

            <div class="security-item">

                <div>
                    <div class="security-title">Password Authentication</div>
                    <div class="security-description">
                        Your account is protected by your login credentials.
                    </div>
                </div>

                <span class="status status-success">Available</span>

            </div>

            <div class="security-item">

                <div>
                    <div class="security-title">Two-Factor Authentication</div>
                    <div class="security-description">
                        Add an additional verification step to your login.
                    </div>
                </div>

                @if (auth()->user()->two_factor_secret)
                    <span class="status status-success">Enabled</span>
                @else
                    <span class="status status-neutral">Not Enabled</span>
                @endif

            </div>

            <div class="security-item">

                <div>
                    <div class="security-title">Passkeys</div>
                    <div class="security-description">
                        Explore passwordless authentication if supported.
                    </div>
                </div>

                <span class="status status-neutral">Manage</span>

            </div>

        </div>

        <div class="panel">

            <h3>Quick Actions</h3>

            <p class="panel-description">
                Shortcuts to your account and security settings.
            </p>

            <a href="#account" class="quick-link">
                <span>👤 &nbsp; View Account Information</span>
                <span>›</span>
            </a>

            <a href="{{ route('two-factor.setup') }}" class="quick-link">
                <span>🛡️ &nbsp; Two-Factor Setup</span>
                <span>›</span>
            </a>

            <a href="{{ route('password.request') }}" class="quick-link">
                <span>🔑 &nbsp; Password Recovery</span>
                <span>›</span>
            </a>

        </div>

    </section>

    <section class="panel" id="account">

        <h3>Account Information</h3>

        <p class="panel-description">
            Information associated with your signed-in account.
        </p>

        <div class="account-details">

            <div>
                <div class="detail-label">Full Name</div>
                <div class="detail-value">
                    {{ auth()->user()->name }}
                </div>
            </div>

            <div>
                <div class="detail-label">Email Address</div>
                <div class="detail-value">
                    {{ auth()->user()->email }}
                </div>
            </div>

            <div>
                <div class="detail-label">Account Role</div>
                <div class="detail-value">
                    {{ ucfirst(auth()->user()->role ?? 'user') }}
                </div>
            </div>

            <div>
                <div class="detail-label">Account Created</div>
                <div class="detail-value">
                    {{ auth()->user()->created_at?->format('d M Y') ?? 'Not available' }}
                </div>
            </div>

        </div>

    </section>

    <footer class="footer">
        SecureLogin &copy; {{ date('Y') }}. Protecting your digital identity.
    </footer>

</main>
```

</div>

</body>
</html>
