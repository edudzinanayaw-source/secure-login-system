<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | Secure Login System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --navy: #101b35;
            --navy-light: #1b2a4a;
            --blue: #356df3;
            --purple: #7657e8;
            --green: #0f9f75;
            --page: #f4f7fc;
            --white: #ffffff;
            --text: #18243a;
            --muted: #718096;
            --border: #e5eaf2;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--page);
            color: var(--text);
            line-height: 1.5;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            flex-shrink: 0;
            padding: 30px 18px;
            background: linear-gradient(180deg, #101b35, #1b2a4a);
            color: white;
        }

        .brand {
            padding: 0 12px;
            font-size: 24px;
            font-weight: 700;
        }

        .subtitle {
            padding: 0 12px;
            margin: 5px 0 35px;
            color: #aab7d0;
            font-size: 13px;
        }

        .nav-label {
            padding: 0 12px;
            margin-bottom: 12px;
            color: #8392ad;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar a {
            display: block;
            margin-bottom: 8px;
            padding: 13px 15px;
            border-radius: 9px;
            color: #c8d2e5;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.2s ease;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background: #293b60;
            color: white;
        }

        /* Main area */
        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 23px 34px;
            background: white;
            border-bottom: 1px solid var(--border);
        }

        .topbar h1 {
            font-size: 24px;
        }

        .topbar p {
            margin-top: 4px;
            color: var(--muted);
            font-size: 13px;
        }

        .logout-button {
            padding: 10px 17px;
            border: 1px solid #f2caca;
            border-radius: 8px;
            background: #fff5f5;
            color: #c53030;
            font-weight: 600;
            cursor: pointer;
        }

        .logout-button:hover {
            background: #ffe5e5;
        }

        /* Content */
        .content {
            max-width: 1600px;
            margin: auto;
            padding: 34px;
        }

        .welcome {
            margin-bottom: 28px;
        }

        .welcome h2 {
            margin-bottom: 7px;
            font-size: 27px;
        }

        .welcome p {
            color: var(--muted);
            line-height: 1.7;
        }

        .account {
            margin-top: 8px;
            font-size: 13px;
        }

        /* Statistics */
        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            position: relative;
            overflow: hidden;
            padding: 25px;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: white;
            box-shadow: 0 4px 15px rgba(28, 48, 85, 0.04);
        }

        .card::after {
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            content: "";
        }

        .card.total::after {
            background: var(--blue);
        }

        .card.admins::after {
            background: var(--purple);
        }

        .card.users::after {
            background: var(--green);
        }

        .card p {
            margin-bottom: 13px;
            color: var(--muted);
            font-size: 14px;
            font-weight: 600;
        }

        .card h3 {
            font-size: 35px;
        }

        /* Registered users */
        .section {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: white;
            box-shadow: 0 4px 15px rgba(28, 48, 85, 0.04);
        }

        .section-header {
            padding: 23px 25px;
            border-bottom: 1px solid var(--border);
        }

        .section-header h2 {
            margin-bottom: 5px;
            font-size: 19px;
        }

        .section-header p {
            color: var(--muted);
            font-size: 13px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 16px 18px;
            border-bottom: 1px solid #edf0f6;
            font-size: 13px;
        }

        th {
            background: #f8faff;
            color: #64748b;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        tbody tr:hover {
            background: #f8faff;
        }

        .hash-cell {
            min-width: 220px;
            max-width: 360px;
            overflow-wrap: anywhere;
            font-family: monospace;
            font-size: 11px;
            color: #596579;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: capitalize;
        }

        .badge.admin {
            background: #f0eaff;
            color: #6941c6;
        }

        .badge.user {
            background: #e3f8ef;
            color: #087443;
        }

        .empty {
            padding: 30px;
            color: var(--muted);
            text-align: center;
        }

        .footer {
            padding: 25px 34px;
            color: #8a96a9;
            font-size: 12px;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .cards {
                gap: 13px;
            }

            .content {
                padding: 22px;
            }
        }

        @media (max-width: 700px) {
            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
                padding: 20px;
            }

            .subtitle {
                margin-bottom: 20px;
            }

            .topbar {
                padding: 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .content {
                padding: 18px;
            }
        }

        @media (max-width: 480px) {
            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- Sidebar -->
    <aside class="sidebar">

        <div class="brand">SecurePanel</div>

        <p class="subtitle">Administration System</p>

        <p class="nav-label">Main Menu</p>

        <a href="{{ route('admin.dashboard') }}" class="active">
            📊 &nbsp; Dashboard
        </a>

        <a href="#users">
            👥 &nbsp; Registered Users
        </a>

        <a href="{{ route('admin.tickets.index') }}">
            🎫 &nbsp; Helpdesk Tickets
        </a>

    </aside>

    <!-- Main Content -->
    <main class="main">

        <header class="topbar">

            <div>
                <h1>Admin Dashboard</h1>
                <p>Secure Login System</p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="logout-button">
                    Log Out
                </button>
            </form>

        </header>

        <div class="content">

            <!-- Welcome -->
            <section class="welcome">

                <h2>
                    Welcome, {{ auth()->user()->name }}!
                </h2>

                <p>
                    You are logged in as an administrator.
                    Manage your system and monitor registered accounts here.
                </p>

                <p class="account">
                    Account: {{ auth()->user()->email }}
                </p>

            </section>

            <!-- Statistics -->
            <section class="cards">

                <div class="card total">
                    <p>Total Registered Accounts</p>
                    <h3>{{ $totalUsers }}</h3>
                </div>

                <div class="card admins">
                    <p>Administrators</p>
                    <h3>{{ $totalAdmins }}</h3>
                </div>

                <div class="card users">
                    <p>Regular Users</p>
                    <h3>{{ $totalRegularUsers }}</h3>
                </div>

            </section>

            <!-- Users Table -->
            <section class="section" id="users">

                <div class="section-header">
                    <h2>Registered Users</h2>
                    <p>The 10 most recently registered accounts.</p>
                </div>

                <div class="table-wrapper">

                    <table>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Password Hash (Bcrypt)</th>
                                <th>Role</th>
                                <th>Registered</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($users as $user)

                                <tr>

                                    <td>{{ $user->id }}</td>

                                    <td>{{ $user->name }}</td>

                                    <td>{{ $user->email }}</td>

                                    <td class="hash-cell">
                                        {{ $user->password }}
                                    </td>

                                    <td>
                                        <span class="badge {{ $user->role === 'admin' ? 'admin' : 'user' }}">
                                            {{ $user->role }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $user->created_at?->format('d M Y') ?? 'N/A' }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="empty">
                                        No registered users found.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </section>

        </div>

        <footer class="footer">
            Secure Login System &copy; {{ date('Y') }}
        </footer>

    </main>

</div>

</body>
</html>