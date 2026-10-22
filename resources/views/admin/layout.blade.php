<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin — TCSG')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --plum:#1E2B4D; --coral:#EA5F72; --coral-d:#D14E62;
            --cream:#F7F4EF; --blush:#EFEBE3; --ink:#222A3D;
            --muted:#6B7488; --line:#E4E0D8; --green:#1E6B3A;
        }
        * { box-sizing: border-box; margin:0; padding:0; }
        body { font-family:'Inter',sans-serif; background:var(--cream); color:var(--ink); line-height:1.5; }
        .admin-nav { background:var(--plum); color:#fff; padding:14px 28px; display:flex; justify-content:space-between; align-items:center; }
        .admin-nav .brand { font-weight:700; }
        .admin-nav a { color:#fff; text-decoration:none; margin-left:20px; font-weight:600; font-size:14px; }
        .admin-nav form { display:inline; }
        .admin-nav button { background:transparent; border:1px solid rgba(255,255,255,.3); color:#fff; padding:7px 16px; border-radius:100px; font-weight:600; cursor:pointer; font-size:13px; margin-left:16px; }
        .admin-nav button:hover { background:rgba(255,255,255,.1); }
        .admin-main { max-width:1200px; margin:40px auto; padding:0 28px; }
        .admin-card { background:#fff; border-radius:12px; padding:24px; box-shadow:0 2px 8px rgba(30,43,77,.06); margin-bottom:20px; }
        h1 { font-size:28px; margin-bottom:16px; color:var(--plum); }
        h2 { font-size:20px; margin-bottom:12px; color:var(--plum); }
        table { width:100%; border-collapse:collapse; }
        th, td { text-align:left; padding:12px 14px; border-bottom:1px solid var(--line); font-size:14px; }
        th { font-weight:700; color:var(--muted); text-transform:uppercase; font-size:12px; letter-spacing:0.05em; }
        tr:hover { background:var(--cream); }
        .status { display:inline-block; padding:3px 10px; border-radius:100px; font-size:12px; font-weight:700; text-transform:uppercase; }
        .status-pending { background:#FFF4D6; color:#8A6500; }
        .status-active { background:#E8F3EC; color:var(--green); }
        .status-declined { background:#FBE4E6; color:var(--coral-d); }
        a.row-link { color:var(--plum); text-decoration:none; font-weight:600; }
        a.row-link:hover { color:var(--coral-d); }
        .stat-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:16px; margin-bottom:24px; }
        @media(max-width:720px) { .stat-grid { grid-template-columns:1fr 1fr; } }
        .stat { background:#fff; border-radius:12px; padding:20px; box-shadow:0 2px 8px rgba(30,43,77,.06); }
        .stat b { font-size:32px; color:var(--plum); display:block; font-weight:700; }
        .stat span { color:var(--muted); font-size:13px; margin-top:4px; display:block; text-transform:uppercase; letter-spacing:0.05em; }
        .flash { background:#E8F3EC; color:var(--green); padding:14px 18px; border-radius:8px; margin-bottom:20px; }
        .flash.error { background:#FBE4E6; color:var(--coral-d); }
        .login-wrap { min-height:100vh; display:flex; align-items:center; justify-content:center; background:var(--plum); padding:20px; }
        .login-box { background:#fff; border-radius:16px; padding:36px; max-width:400px; width:100%; box-shadow:0 20px 60px rgba(0,0,0,.3); }
        .login-box h1 { text-align:center; margin-bottom:24px; }
        label { display:block; font-weight:600; margin-bottom:6px; color:var(--plum); font-size:13px; }
        input[type=email], input[type=password] { width:100%; padding:12px 14px; border:1.5px solid var(--line); border-radius:8px; font-size:15px; font-family:inherit; margin-bottom:18px; }
        input:focus { outline:none; border-color:var(--coral); }
        button.primary { background:var(--coral); color:#fff; border:none; padding:13px; border-radius:100px; font-weight:700; cursor:pointer; width:100%; font-size:15px; }
        button.primary:hover { background:var(--coral-d); }
        .profile-section { margin-bottom:28px; }
        .profile-section h3 { font-size:15px; text-transform:uppercase; letter-spacing:0.08em; color:var(--muted); margin-bottom:10px; }
        .tag-list span { display:inline-block; background:var(--blush); color:var(--coral-d); font-size:13px; font-weight:600; padding:5px 12px; border-radius:100px; margin:0 6px 6px 0; }
        .back-link { display:inline-block; margin-bottom:16px; color:var(--muted); text-decoration:none; font-size:14px; font-weight:600; }
        .back-link:hover { color:var(--plum); }
        .warn { background:#FFF4D6; color:#8A6500; padding:12px 16px; border-radius:8px; margin-bottom:16px; font-size:14px; }
    </style>
</head>
<body>
@if (session('admin'))
<nav class="admin-nav">
    <span class="brand">TCSG Admin</span>
    <div>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ url('/') }}" target="_blank">View site</a>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit">Sign out</button>
        </form>
    </div>
</nav>
@endif

<main class="admin-main">
    @if (session('status'))
        <div class="flash">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div class="flash error">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    @yield('content')
</main>
</body>
</html>
