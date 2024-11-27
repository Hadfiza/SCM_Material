<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Pengiriman;
use App\Notifications\TanggalSelesaiNotification;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

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
        // Autentikasi pengguna
        $request->authenticate();

        // Regenerasi session untuk meningkatkan keamanan
        $request->session()->regenerate();

        // Ambil user yang sedang login
        $user = $request->user();

        // Pesan notifikasi default
        $pesan_notifikasi = '';

        // Cek jika pengguna adalah admin
        if ($user->usertype === 'admin') {
            $pesan_notifikasi = "Selamat datang admin";
        } else {
            // Query ke tabel pengiriman untuk mengambil tanggal_selesai terdekat
            $tanggal_selesai_terdekat = DB::table('pengiriman')
                ->where('status_pengiriman', '!=', 'batal') // Kecualikan pengiriman yang dibatalkan
                ->where('tanggal_selesai', '>', now())      // Hanya pengiriman dengan tanggal selesai di masa depan
                ->orderBy('tanggal_selesai', 'asc')         // Urutkan berdasarkan tanggal selesai terdekat
                ->value('tanggal_selesai');                 // Ambil nilai tanggal_selesai terdekat

            // Jika ada tanggal selesai terdekat, hitung selisih waktu
            if ($tanggal_selesai_terdekat) {
                $selisih = now()->diff(Carbon::parse($tanggal_selesai_terdekat));

                // Format selisih waktu
                $days = $selisih->d; // Hari
                $hours = $selisih->h; // Jam
                $minutes = $selisih->i; // Menit

                // Buat pesan notifikasi untuk pengguna biasa
                $pesan_notifikasi = "$days hari $hours jam $minutes menit lagi barang datang (tanggal: "
                    . Carbon::parse($tanggal_selesai_terdekat)->format('l, j F Y H:i:s') . ")";
            } else {
                // Jika tidak ada pengiriman yang terjadwal
                $pesan_notifikasi = "Tidak ada pengiriman yang dijadwalkan.";
            }
        }

        // Set session notifikasi
        session()->flash('status', $pesan_notifikasi);

        // Periksa tipe pengguna dan arahkan ke dashboard yang sesuai
        if ($user->usertype === 'admin') {
            return redirect('admin/dashboard');
        }

        return redirect()->intended(route('dashboard'));
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
