<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    // Otentikasi pengguna
    $request->authenticate();

    // Regenerasi sesi untuk keamanan
    $request->session()->regenerate();

    // Ambil user yang sedang login
    $user = $request->user();

    // Cek role dan arahkan ke dashboard yang sesuai
    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    } elseif ($user->hasRole('karyawan')) {
        return redirect()->route('karyawan.dashboard');
    }

    // Jika tidak punya role spesifik, redirect ke dashboard umum
    return redirect()->route('dashboard');
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
