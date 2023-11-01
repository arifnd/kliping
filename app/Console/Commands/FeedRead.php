<?php

namespace App\Console\Commands;

use FeedIo\Adapter\Http\Client;
use FeedIo\FeedIo;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Console\Command;

class FeedRead extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:read {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read feed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = $this->argument('url');
        $client = new Client(new GuzzleClient());
        $feedIo = new FeedIo($client);

        $result = $feedIo->read($url);
        $feedTitle = $result->getFeed()->getTitle();

        $this->line("Feed Title: {$feedTitle}");

        foreach ($result->getFeed() as $item) {
            $this->line($item->getTitle());
        }
    }
}
