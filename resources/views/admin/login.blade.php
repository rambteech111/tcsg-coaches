<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin sign in — TCSG</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --plum:#1E2B4D; --coral:#EA5F72; --coral-d:#D14E62; --line:#E4E0D8; --muted:#6B7488; }
        * { box-sizing: border-box; margin:0; padding:0; }
        body { font-family:'Inter',sans-serif; background:var(--plum); color:#222A3D; min-height:100vh; display:flex; align-items:center; justify-content:center; padding:20px; }
        .login-box { background:#fff; border-radius:16px; padding:36px; max-width:400px; width:100%; box-shadow:0 20px 60px rgba(0,0,0,.3); }
        h1 { font-size:24px; margin-bottom:24px; color:var(--plum); text-align:center; }
        label { display:block; font-weight:600; margin-bottom:6px; color:var(--plum); font-size:13px; }
        input { width:100%; padding:12px 14px; border:1.5px solid var(--line); border-radius:8px; font-size:15px; font-family:inherit; margin-bottom:18px; }
        input:focus { outline:none; border-color:var(--coral); }
        button { background:var(--coral); color:#fff; border:none; padding:13px; border-radius:100px; font-weight:700; cursor:pointer; width:100%; font-size:15px; }
        button:hover { background:var(--coral-d); }
        .flash { background:#FBE4E6; color:var(--coral-d); padding:12px 14px; border-radius:8px; margin-bottom:16px; font-size:14px; }
    </style>
</head>
<body>
<div class="login-box">
    <h1>TCSG Admin</h1>
    @if ($errors->any())
        <div class="flash">
            @foreach ($errors->all() as $error){{ $error }}@endforeach
        </div>
    @endif
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <label>Email</label>
        <input type="email" name="email" required autofocus value="{{ old('email') }}">
        <label>Password</label>
        <input type="password" name="password" required>
        <button type="submit">Sign in</button>
    </form>
</div>
</body>
</html>
