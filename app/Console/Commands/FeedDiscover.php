<?php

namespace App\Console\Commands;

use FeedIo\Adapter\Http\Client;
use FeedIo\FeedIo;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Console\Command;

class FeedDiscover extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:discover {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Feeds discovery';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = $this->argument('url');
        $client = new Client(new GuzzleClient());
        $feedIo = new FeedIo($client);

        $feeds = $feedIo->discover($url);

        foreach ($feeds as $feed) {
            $this->line($feed);
        }
    }
}
