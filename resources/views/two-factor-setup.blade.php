<!DOCTYPE html>
<html>
<head>
    <title>Two-Factor Authentication</title>
    <meta charset="UTF-8">
</head>

<body>

@if (session('status'))
    <p><strong>Status:</strong> {{ session('status') }}</p>
@endif

@if ($errors->any())
    <div>
        <strong>Errors:</strong>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
    <h1>Secure Login System</h1>

    <h2>Two-Factor Authentication</h2>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <p>
        Protect your account with an authenticator app.
    </p>

   @if (auth()->user()->two_factor_secret)
    <h3>Two-Factor Authentication Setup</h3>

    <p>Scan this QR code with your authenticator app:</p>

    {!! auth()->user()->twoFactorQrCodeSvg() !!}

    <h3>Confirm Two-Factor Authentication</h3>

    <p>Enter the 6-digit code shown in your authenticator app:</p>

    <form method="POST" action="{{ url('/user/confirmed-two-factor-authentication') }}">
        @csrf

        <input
            type="text"
            name="code"
            placeholder="123456"
            maxlength="6"
            required
        >

        <button type="submit">Confirm 2FA</button>
    </form>

    <h3>Recovery Codes</h3>

    <p>Keep these codes somewhere safe:</p>

    <ul>
        @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
            <li>{{ $code }}</li>
        @endforeach
    </ul>

@else

        <form method="POST" action="{{ url('/user/two-factor-authentication') }}">
            @csrf

            <button type="submit">
                Enable Two-Factor Authentication
            </button>
        </form>

    @endif

    <p>
        <a href="{{ url('/') }}">Back to Dashboard</a>
    </p>

</body>
</html>