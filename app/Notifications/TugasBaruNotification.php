<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Models\Tugas;

class TugasBaruNotification extends Notification
{
    use Queueable;

    protected $tugas;

    public function __construct(Tugas $tugas)
    {
        $this->tugas = $tugas;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'pesan' => "Tugas baru: {$this->tugas->judul}",
            'kategori' => 'tugas',
            'tugas_id' => $this->tugas->id,
            'guru' => $this->tugas->user->name ?? 'Guru',
        ];
    }
}
