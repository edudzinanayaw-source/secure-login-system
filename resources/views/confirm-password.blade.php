<!DOCTYPE html>
<html>
<head>
    <title>Confirm Password - Secure Login System</title>
    <meta charset="UTF-8">
</head>

<body>

    <h1>Secure Login System</h1>

    <h2>Confirm Your Password</h2>

    <p>
        For security, please confirm your password before continuing.
    </p>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div>
            <label>Password:</label>
            <input type="password" name="password" required autofocus>
        </div>

        <br>

        <button type="submit">Confirm Password</button>
    </form>

    <p>
        <a href="{{ url('/') }}">Back to Dashboard</a>
    </p>

</body>
</html>