<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showForm()
    {
        return view('forgot-password');
    }
    
    public function sendReset(Request $request)
    {
        $email = $request->input('email');
        
        // Cek jika email adalah email admin yang terdaftar
        if ($email == "admin@gmail.com") {
            // Generate token reset password
            $token = \Illuminate\Support\Str::random(60);
            
            // Simpan token di session dengan TTL 1 jam
            session(['reset_token' => $token, 'reset_email' => $email, 'reset_time' => now()]);
            
            return redirect('/reset-password/' . $token)
                    ->with('success', 'Email ditemukan! Silakan set password baru Anda.');
        }
        
        return back()->with('error', 'Email tidak ditemukan di sistem.');
    }
    
    public function showResetForm($token)
    {
        $storedToken = session('reset_token');
        $resetTime = session('reset_time');
        
        // Cek jika token valid dan belum expired (1 jam)
        if ($storedToken !== $token || !$resetTime || now()->diffInMinutes($resetTime) > 60) {
            return redirect('/forgot-password')->with('error', 'Link reset password sudah kadaluarsa. Silakan coba lagi.');
        }
        
        return view('reset-password', ['token' => $token]);
    }
    
    public function processReset(Request $request)
    {
        $token = $request->input('token');
        $password = $request->input('password');
        $passwordConfirm = $request->input('password_confirmation');
        $storedToken = session('reset_token');
        $resetEmail = session('reset_email');
        $resetTime = session('reset_time');
        
        // Validasi token dan waktu
        if ($storedToken !== $token || !$resetEmail || !$resetTime || now()->diffInMinutes($resetTime) > 60) {
            return redirect('/forgot-password')->with('error', 'Link reset password sudah kadaluarsa.');
        }
        
        // Validasi password
        if (strlen($password) < 6) {
            return back()->with('error', 'Password minimal harus 6 karakter.');
        }
        
        if ($password !== $passwordConfirm) {
            return back()->with('error', 'Password dan konfirmasi password tidak sesuai.');
        }
        
        // Simpan password baru di cache (persistent selama 30 hari)
        cache(['admin_password_' . $resetEmail => $password], now()->addDays(30));
        
        // Jika reset berhasil, clear session reset password
        session()->forget(['reset_token', 'reset_email', 'reset_time']);
        
        // Tampilkan pesan sukses
        return redirect('/login')->with('success', 'Password berhasil direset. Silakan login dengan password baru Anda.');
    }
}
