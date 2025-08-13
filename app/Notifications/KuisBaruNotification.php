<?php

namespace App\Notifications;

use App\Models\Kuis;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class KuisBaruNotification extends Notification
{
    use Queueable;

    protected $kuis;

    public function __construct(Kuis $kuis)
    {
        $this->kuis = $kuis;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'pesan' => "🧠 Kuis baru: {$this->kuis->judul}",
            'url' => route('kuis.index'),
        ];
    }
}