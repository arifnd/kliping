<?php

namespace App\Events;

use App\Models\News;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewsCreate
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The news instance.
     *
     * @var \App\Models\News
     */
    public $news;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('news-create');
    }
}
