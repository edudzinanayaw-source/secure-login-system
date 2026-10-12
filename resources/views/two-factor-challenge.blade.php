<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Two-Factor Authentication | Secure Login System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f6fb;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #111827;
        }

        .container {
            width: 100%;
            max-width: 460px;
        }

        .card {
            background: white;
            border-radius: 20px;
            padding: 42px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.10);
        }

        .icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 22px;
            border-radius: 18px;
            background: #1e3a8a;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .header {
            text-align: center;
            margin-bottom: 28px;
        }

        .header h1 {
            font-size: 25px;
            color: #1e3a8a;
            margin-bottom: 10px;
        }

        .header p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
        }

        .security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            background: #f0fdf4;
            color: #15803d;
            border: 1px solid #bbf7d0;
            padding: 9px;
            border-radius: 8px;
            font-size: 12px;
            margin-bottom: 25px;
        }

        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .error-box p {
            margin-bottom: 4px;
        }

        .error-box p:last-child {
            margin-bottom: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            color: #374151;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            height: 50px;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            padding: 0 14px;
            font-size: 18px;
            text-align: center;
            letter-spacing: 6px;
            outline: none;
        }

        input:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.10);
        }

        .verify-button {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 9px;
            background: #1e3a8a;
            color: white;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .verify-button:hover {
            background: #172554;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 28px 0;
            color: #9ca3af;
            font-size: 12px;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #e5e7eb;
        }

        .recovery-title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .recovery-description {
            color: #6b7280;
            font-size: 12px;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .recovery-input {
            font-size: 14px;
            letter-spacing: 1px;
            text-align: left;
        }

        .recovery-button {
            width: 100%;
            height: 44px;
            border: 1px solid #1e3a8a;
            border-radius: 9px;
            background: white;
            color: #1e3a8a;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }

        .recovery-button:hover {
            background: #eff6ff;
        }

        .footer {
            text-align: center;
            margin-top: 22px;
            color: #9ca3af;
            font-size: 11px;
        }

        @media (max-width: 500px) {
            .card {
                padding: 30px 22px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <div class="icon">
            🔐
        </div>

        <div class="header">
            <h1>Two-Factor Authentication</h1>

            <p>
                Your password has been verified.
                Enter the verification code from your
                authenticator app to continue.
            </p>
        </div>

        <div class="security-badge">
            🛡️ Additional security verification required
        </div>

        @if ($errors->any())

            <div class="error-box">

                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach

            </div>

        @endif


        <!-- AUTHENTICATOR CODE -->

        <form method="POST" action="{{ route('two-factor.login') }}">

            @csrf

            <div class="form-group">

                <label for="code">
                    Authentication Code
                </label>

                <input
                    id="code"
                    type="text"
                    name="code"
                    inputmode="numeric"
                    autocomplete="one-time-code"
                    maxlength="6"
                    pattern="[0-9]{6}"
                    placeholder="000000"
                    required
                    autofocus
                >

            </div>

            <button
                type="submit"
                class="verify-button"
            >
                Verify & Continue
            </button>

        </form>


        <div class="divider">
            OR
        </div>


        <!-- RECOVERY CODE -->

        <div class="recovery-title">
            Can't access your authenticator?
        </div>

        <p class="recovery-description">
            Use one of your saved recovery codes to
            securely access your account.
        </p>

        <form method="POST" action="{{ route('two-factor.login') }}">

            @csrf

            <div class="form-group">

                <label for="recovery_code">
                    Recovery Code
                </label>

                <input
                    id="recovery_code"
                    class="recovery-input"
                    type="text"
                    name="recovery_code"
                    autocomplete="one-time-code"
                    placeholder="Enter recovery code"
                >

            </div>

            <button
                type="submit"
                class="recovery-button"
            >
                Use Recovery Code
            </button>

        </form>


        <div class="footer">
            Your verification code helps protect your account
            even if your password is compromised.
        </div>

    </div>

</div>

</body>
</html>