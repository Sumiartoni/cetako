<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Article;
use App\Models\User;
use App\Models\SiteSetting;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArticles = Article::count();
        $publishedArticles = Article::where('status', 'published')->count();
        $draftArticles = Article::where('status', 'draft')->count();
        $recentArticles = Article::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalArticles', 'publishedArticles', 'draftArticles', 'recentArticles'
        ));
    }

    public function login()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        // Rate limiting: max 5 attempts per minute
        $key = 'login_attempts_' . $request->ip();
        if (cache()->get($key, 0) >= 5) {
            return back()->withErrors(['email' => 'Terlalu banyak percobaan login. Silakan coba lagi dalam 1 menit.'])->withInput();
        }

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            cache()->forget($key);
            session(['admin_logged_in' => true, 'admin_email' => $user->email, 'admin_name' => $user->name]);
            return redirect()->route('admin.dashboard');
        }

        // Increment failed attempts
        cache()->put($key, cache()->get($key, 0) + 1, now()->addMinute());

        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_email', 'admin_name']);
        return redirect()->route('admin.login');
    }
}
