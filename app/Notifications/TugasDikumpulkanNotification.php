<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Contracts\Queue\ShouldQueue;

class TugasDikumpulkanNotification extends Notification
{
    use Queueable;

    public $tugas;
    public $siswa;

    /**
     * Buat instance notifikasi baru.
     */
    public function __construct($tugas, $siswa)
    {
        $this->tugas = $tugas;
        $this->siswa = $siswa;
    }

    /**
     * Channel notifikasi (kita gunakan database).
     */
    public function via(object $notifiable): array
    {
        return ['database']; // Tambahkan 'mail' jika ingin juga kirim email
    }

    /**
     * Jika ingin kirim email juga (opsional).
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Halo ' . $notifiable->name)
            ->line('Siswa ' . $this->siswa->name . ' telah mengumpulkan tugas "' . $this->tugas->judul . '".')
            ->action('Lihat Penilaian', url(route('tugas.penilaian', $this->tugas->id)))
            ->line('Terima kasih telah menggunakan aplikasi kami!');
    }

    /**
     * Isi data yang disimpan di database.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => 'Tugas Dikumpulkan',
            'body' => $this->siswa->name . ' telah mengumpulkan tugas "' . $this->tugas->judul . '".',
            'url' => route('tugas.penilaian', $this->tugas->id),
            'siswa_id' => $this->siswa->id,
            'tugas_id' => $this->tugas->id,
        ];
    }

    public function toArray($notifiable)
{
    return [
        'pesan' => 'Siswa ' . $this->siswa->name . ' telah mengumpulkan tugas "' . $this->tugas->judul . '".',
        'kategori' => 'pengumpulan_tugas',
        'tugas_id' => $this->tugas->id,
    ];
}

}
