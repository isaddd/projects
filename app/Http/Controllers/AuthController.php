<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan Form Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses Login
    public function login(Request $request)
    {
        // Validasi kredensial
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Kirim kredensial ke API eksternal untuk verifikasi
        $response = Http::post('https://services.snaplab.id/api/v1/auth/signin', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Cek apakah API eksternal merespons dengan sukses
        if ($response->successful()) {
            $userData = $response->json();  // Data pengguna yang dikirimkan oleh API eksternal

            // Dapatkan atau buat pengguna baru berdasarkan data dari API eksternal
            $user = User::firstOrCreate([
                'email' => $userData['email'], // Asumsi data email diberikan oleh API eksternal
            ], [
                'email' => $userData['email'], // Simpan nama pengguna dari API eksternal
                'password' => Hash::make($request->password),  // Simpan password menggunakan hash
            ]);

            // Generate token Sanctum untuk pengguna
            // $token = $user->createToken('Filament Admin')->plainTextToken;

            // Login pengguna menggunakan Laravel
            Auth::login($user);

            // Return token sebagai respon atau alihkan ke admin panel
            return redirect()->intended('/admin');
        }

        // Jika login gagal
        return back()->withErrors(['error' => 'Login gagal, periksa kredensial Anda']);
    }
}
