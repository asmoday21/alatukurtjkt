<?php

namespace App\Notifications;

use App\Models\Materi;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class MateriBaruNotification extends Notification
{
    use Queueable;

    protected $materi;

    public function __construct(Materi $materi)
    {
        $this->materi = $materi;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'pesan' => "📚 Materi baru: {$this->materi->judul}",
            'url' => route('materi.index'),
        ];
    }
}