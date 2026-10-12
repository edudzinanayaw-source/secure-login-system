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

        body {
            font-family: Arial, sans-serif;
            background: #f4f6fb;
            color: #1f2937;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #111827;
            color: white;
            padding: 30px 20px;
            flex-shrink: 0;
        }

        .sidebar h2 {
            font-size: 21px;
            margin-bottom: 10px;
        }

        .sidebar .subtitle {
            color: #9ca3af;
            font-size: 13px;
            margin-bottom: 35px;
        }

        .sidebar a {
            display: block;
            color: #d1d5db;
            text-decoration: none;
            padding: 13px 15px;
            border-radius: 8px;
            margin-bottom: 8px;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background: #374151;
            color: white;
        }

        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            background: white;
            padding: 22px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .topbar h1 {
            font-size: 24px;
        }

        .topbar p {
            color: #6b7280;
            font-size: 14px;
            margin-top: 5px;
        }

        .logout-button {
            background: #dc2626;
            color: white;
            border: none;
            padding: 11px 16px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 14px;
        }

        .logout-button:hover {
            background: #b91c1c;
        }

        .content {
            padding: 30px;
        }

        .welcome {
            margin-bottom: 28px;
        }

        .welcome h2 {
            font-size: 25px;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #6b7280;
            line-height: 1.6;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 35px;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.03);
        }

        .card p {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .card h3 {
            font-size: 32px;
        }

        .card.total {
            border-top: 4px solid #2563eb;
        }

        .card.admins {
            border-top: 4px solid #7c3aed;
        }

        .card.users {
            border-top: 4px solid #059669;
        }

        .section {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
        }

        .section-header {
            padding: 22px 24px;
            border-bottom: 1px solid #e5e7eb;
        }

        .section-header h2 {
            font-size: 19px;
            margin-bottom: 6px;
        }

        .section-header p {
            color: #6b7280;
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
            padding: 16px 24px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
            white-space: nowrap;
        }

        th {
            background: #f9fafb;
            color: #6b7280;
            font-weight: 600;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .badge.admin {
            background: #ede9fe;
            color: #6d28d9;
        }

        .badge.user {
            background: #d1fae5;
            color: #047857;
        }

        .empty {
            padding: 30px;
            text-align: center;
            color: #6b7280;
        }

        .footer {
            padding: 25px 30px;
            color: #6b7280;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .cards {
                grid-template-columns: 1fr;
            }

            .sidebar {
                width: 200px;
            }
        }

        @media (max-width: 600px) {
            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
            }

            .sidebar .subtitle {
                margin-bottom: 15px;
            }

            .topbar {
                padding: 20px;
            }

            .topbar h1 {
                font-size: 20px;
            }

            .content {
                padding: 20px;
            }

            .topbar {
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <aside class="sidebar">
        <h2>SecurePanel</h2>
        <p class="subtitle">Administration System</p>

        <a href="{{ route('admin.dashboard') }}" class="active">
            Dashboard
        </a>

        <a href="#users">
            Registered Users
        </a>
    </aside>

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

            <section class="welcome">
                <h2>
                    Welcome, {{ auth()->user()->name }}!
                </h2>

                <p>
                    You are logged in as an administrator.
                    Manage your system and monitor registered accounts here.
                </p>

                <p style="margin-top: 8px;">
                    Account: {{ auth()->user()->email }}
                </p>
            </section>

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
                                    <td colspan="5" class="empty">
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