<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Security settings | SecureLogin</title>@include('partials.theme')</head><body>
<main class="center-card panel"><div class="eyebrow">Account protection</div><h1>Two-factor authentication</h1><p class="intro">Add an extra verification step to help protect your account.</p>
@if (session('status'))<div class="alert">{{ session('status') }}</div>@endif
@if ($errors->any())<div class="errors">@foreach ($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>@endif
@if (auth()->user()->two_factor_secret)
<h3>1. Connect your authenticator</h3><p class="muted">Scan this QR code using your authenticator app.</p><div class="qr">{!! auth()->user()->twoFactorQrCodeSvg() !!}</div>
<h3>2. Confirm setup</h3><p class="muted">Enter the six-digit code shown in your app.</p><form method="POST" action="{{ url('/user/confirmed-two-factor-authentication') }}">@csrf<div class="field"><label for="code">Authentication code</label><input id="code" type="text" name="code" inputmode="numeric" maxlength="6" placeholder="000000" required></div><button type="submit">Confirm two-factor authentication</button></form>
<h3 style="margin-top:25px">Recovery codes</h3><p class="muted">Store these codes somewhere safe. Each code can be used once.</p><ul class="codes">@foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)<li>{{ $code }}</li>@endforeach</ul>
@else
<form method="POST" action="{{ url('/user/two-factor-authentication') }}">@csrf<button type="submit">Enable two-factor authentication</button></form>
@endif
<p style="margin:22px 0 0"><a href="{{ url('/') }}">← Back to dashboard</a></p></main></body></html>
