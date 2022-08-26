<?php

namespace App\Listeners;

use App\Events\NewsCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Telegram\Bot\Laravel\Facades\Telegram;

class SendNewsTelegram implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewsCreate  $event
     * @return void
     */
    public function handle(NewsCreate $event)
    {
        $title = $event->news->title;
        $source = $event->news->source->name;
        $url = $event->news->url;

        Telegram::sendMessage([
            'chat_id' => config('services.telegram.userid'),
            'text' => "\xF0\x9F\x86\x95 $title \xE2\x9E\xA1 $source [LINK]($url)",
            'parse_mode' => 'Markdown',
        ]);
    }
}
