<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function loginForm(): View
    {
        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $expectedEmail = config('admin.email');
        $expectedHash = config('admin.password_hash');

        if (! $expectedEmail || ! $expectedHash) {
            return back()->withErrors([
                'email' => 'Admin credentials are not configured. Set ADMIN_EMAIL and ADMIN_PASSWORD_HASH in .env.',
            ])->onlyInput('email');
        }

        if (
            ! hash_equals($expectedEmail, $credentials['email'])
            || ! Hash::check($credentials['password'], $expectedHash)
        ) {
            return back()->withErrors([
                'email' => 'Those credentials don’t match.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();
        $request->session()->put('admin', true);

        return redirect()->intended(route('admin.dashboard'));
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('admin');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('status', 'Signed out.');
    }

    public function dashboard(): View
    {
        $coaches = Coach::orderByRaw("CASE status WHEN 'pending' THEN 0 WHEN 'active' THEN 1 ELSE 2 END")
            ->orderBy('first_name')
            ->get();

        $counts = [
            'total' => $coaches->count(),
            'pending' => $coaches->where('status', 'pending')->count(),
            'active' => $coaches->where('status', 'active')->count(),
            'declined' => $coaches->where('status', 'declined')->count(),
        ];

        return view('admin.dashboard', compact('coaches', 'counts'));
    }

    public function show(Coach $coach): View
    {
        return view('admin.show', ['coach' => $coach]);
    }
}
