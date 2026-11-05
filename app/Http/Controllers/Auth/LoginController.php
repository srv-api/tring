<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login.
     */
    public function login(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
            ],
            // 'cf-turnstile-response' => [
            //     'required',
            // ],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            // 'cf-turnstile-response.required' => 'Silakan selesaikan verifikasi keamanan.',
        ]);

        // 2. Verifikasi Cloudflare Turnstile
        // try {
        //     $turnstileResponse = Http::asForm()
        //         ->timeout(10)
        //         ->post(
        //             'https://challenges.cloudflare.com/turnstile/v0/siteverify',
        //             [
        //                 'secret' => config('services.turnstile.secret_key'),
        //                 'response' => $request->input('cf-turnstile-response'),
        //                 'remoteip' => $request->ip(),
        //             ]
        //         );

        //     if (
        //         ! $turnstileResponse->successful() ||
        //         ! $turnstileResponse->json('success')
        //     ) {
        //         return back()
        //             ->withErrors([
        //                 'cf-turnstile-response' => 'Verifikasi keamanan gagal. Silakan coba lagi.',
        //             ])
        //             ->withInput($request->only('email'));
        //     }
        // } catch (\Throwable $e) {
        //     report($e);

        //     return back()
        //         ->withErrors([
        //             'cf-turnstile-response' => 'Tidak dapat menghubungi layanan keamanan. Silakan coba lagi.',
        //         ])
        //         ->withInput($request->only('email'));
        // }

        // 3. Ambil hanya kredensial yang diperlukan untuk login
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        // 4. Proses autentikasi
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()
                ->intended(route('admin.dashboard'))
                ->with('success', 'Login berhasil. Selamat datang kembali!');
        }

        // 5. Jika email atau password salah
        return back()
            ->withErrors([
                'email' => 'Email atau password yang kamu masukkan salah.',
            ])
            ->withInput($request->only('email'));
    }

    /**
     * Logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Kamu berhasil logout.');
    }
}
