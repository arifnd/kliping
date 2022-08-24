<?php

namespace App\Console\Commands;

use App\Events\NewsCreate;
use App\Models\News;
use App\Models\Source;
use Carbon\Carbon;
use FeedIo\FeedIo;
use FeedIo\Adapter\Guzzle\Client;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Psr\Log\NullLogger;

class FeedUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client = new Client(new GuzzleClient());
        $logger = new NullLogger();
        $feedIo = new FeedIo($client, $logger);

        $feeds = Source::whereTypeId(1)
                        ->where('next_update', '<', Carbon::now())
                        ->whereActive(1)
                        ->get();

        foreach ($feeds as $feed) {
            $result = $feedIo->read($feed->url);

            foreach ($result->getFeed() as $item) {
                $news = News::updateOrCreate([
                    'source_id' => $feed->id,
                    'title' => Str::squish($item->getTitle()),
                ], [
                    'content' => Str::squish(strip_tags($item->getContent())),
                    'url' => $item->getLink(),
                    'date' => $item->getLastModified()->format('Y-m-d H:i:s')
                ]);

                if ($news->wasRecentlyCreated)
                    event(new NewsCreate($news));
            }

            $feed->next_update = $result->getNextUpdate()->format('Y-m-d H:i:s');
            $feed->save();
        }

        return 0;
    }
}
