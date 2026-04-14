<?php

use Illuminate\Support\Facades\Route;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/', function () {
    return view('login');
});

// HALAMAN LOGIN
Route::get('/login', function () {
    return view('login');
});

// PROSES LOGIN
Route::post('/login', function () {
    $email = request('email');
    $password = request('password');
    
    // Cek di tabel users terlebih dahulu
    $user = \App\Models\User::where('email', $email)->first();
    
    if ($user && \Illuminate\Support\Facades\Hash::check($password, $user->password)) {
        // Jika user ditemukan dan password cocok
        session(['user_name' => $user->name, 'user_email' => $user->email, 'user_id' => $user->id]);
        return redirect('/dashboard');
    }
    
    // Jika tidak ada di database, cek akun admin default
    $resetPassword = cache('admin_password_' . $email, false);
    $defaultPassword = "123456";
    $defaultEmail = "admin@gmail.com";
    
    if ($email == $defaultEmail) {
        $validPassword = $resetPassword ? $resetPassword : $defaultPassword;
        
        if ($password == $validPassword) {
            session(['user_name' => 'Administrator', 'user_email' => $email]);
            return redirect('/dashboard');
        }
    }

    return back()->with('error', 'Email atau password salah!');
});

// LOGOUT
Route::get('/logout', function () {
    // clear session data
    session()->flush();
    return redirect('/');
});

// REGISTER
Route::get('/register', function () {
    return view('register');
});

Route::post('/register', function (Request $request) {
    $name = $request->input('name');
    $email = $request->input('email');
    $password = $request->input('password');
    $passwordConfirm = $request->input('password_confirmation');
    
    // Validasi input
    if (strlen($name) < 3) {
        return back()->with('error', 'Nama harus minimal 3 karakter.')->withInput();
    }
    
    if (strlen($password) < 6) {
        return back()->with('error', 'Password harus minimal 6 karakter.')->withInput();
    }
    
    if ($password !== $passwordConfirm) {
        return back()->with('error', 'Password dan konfirmasi password tidak cocok.')->withInput();
    }
    
    // Cek apakah email sudah terdaftar
    $existingUser = \App\Models\User::where('email', $email)->first();
    if ($existingUser) {
        return back()->with('error', 'Email ini sudah terdaftar di sistem.')->withInput();
    }
    
    // Buat user baru
    $user = \App\Models\User::create([
        'name' => $name,
        'email' => $email,
        'password' => \Illuminate\Support\Facades\Hash::make($password),
    ]);
    
    if ($user) {
        // Login otomatis setelah registrasi
        session(['user_name' => $user->name, 'user_email' => $user->email, 'user_id' => $user->id]);
        return redirect('/dashboard')->with('success', 'Akun berhasil dibuat! Selamat datang ' . $user->name);
    }
    
    return back()->with('error', 'Gagal membuat akun. Silakan coba lagi.')->withInput();
});

// LUPA PASSWORD
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendReset']);

// RESET PASSWORD FORM
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm']);

// PROSES RESET PASSWORD
Route::post('/reset-password', [ForgotPasswordController::class, 'processReset']);

// DASHBOARD SPK SMART
Route::get('/dashboard', function () {
    // replicate SMART calculation so dashboard can show current results
    $alternatifs = App\Models\Alternatif::where('is_active', true)->orderBy('code')->get();
    $kriterias = App\Models\Kriteria::orderBy('code')->get();
    $results = [];
    foreach ($alternatifs as $alt) {
        $score = 0;
        foreach ($kriterias as $kri) {
            $pen = App\Models\Penilaian::where('alternatif_id', $alt->id)
                    ->where('kriteria_id', $kri->id)
                    ->first();
            $val = $pen ? floatval($pen->value) : 0;
            $norm = $val / 10;
            $weight = floatval($kri->weight) / 100;
            $score += $norm * $weight;
        }
        $results[] = ['alternatif' => $alt, 'score' => $score];
    }
    usort($results, function ($a, $b) {
        return $b['score'] <=> $a['score'];
    });
    return view('dashboard', compact('results', 'alternatifs', 'kriterias'));
});

// ALTERNATIF
Route::get('/alternatif', [AlternatifController::class, 'index']);
Route::post('/alternatif', [AlternatifController::class, 'store']);

// KRITERIA
Route::get('/kriteria', [KriteriaController::class, 'index']);
Route::post('/kriteria', [KriteriaController::class, 'store']);

// BOBOT KRITERIA
Route::get('/bobot', [BobotController::class, 'index']);
Route::post('/bobot', [BobotController::class, 'update']);

// PENILAIAN
Route::get('/penilaian', [PenilaianController::class, 'index']);
Route::post('/penilaian', [PenilaianController::class, 'store']);

// HASIL ANALISIS
Route::get('/hasil', function () {
    return app(HasilController::class)->index();
});

// LAPORAN   
Route::get('/laporan', [LaporanController::class, 'index']);

// Kriteria edit/delete endpoints
Route::post('/kriteria/{kriteria}/update', [KriteriaController::class, 'update']);
Route::post('/kriteria/{kriteria}/delete', [KriteriaController::class, 'destroy']);

// Alternatif edit/delete endpoints
Route::post('/alternatif/{alternatif}/update', [AlternatifController::class, 'update']);
Route::post('/alternatif/{alternatif}/delete', [AlternatifController::class, 'destroy']);