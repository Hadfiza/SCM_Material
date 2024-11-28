<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Bus\Queueable;

class TanggalSelesaiNotification extends Notification
{
    use Queueable;

    protected $tanggalSelesai;

    // Konstruktor untuk menerima tanggal_selesai
    public function __construct($tanggalSelesai)
    {
        $this->tanggalSelesai = $tanggalSelesai;
    }

    // Mengirim notifikasi melalui berbagai saluran
    public function via($notifiable)
    {
        return ['database', 'mail']; // Bisa disesuaikan, untuk menggunakan database dan email
    }

    // Menampilkan konten notifikasi
    public function toDatabase($notifiable)
    {
        return [
            'tanggal_selesai' => $this->tanggalSelesai,
            'message' => 'Pemberitahuan: Tanggal selesai Anda adalah ' . $this->tanggalSelesai
        ];
    }

    // Mengirim notifikasi melalui email
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Pemberitahuan: Tanggal selesai Anda adalah ' . $this->tanggalSelesai)
                    ->action('Lihat Profil', url('/profile'))
                    ->line('Terima kasih telah menggunakan aplikasi kami!');
    }
}
