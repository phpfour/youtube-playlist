<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\Session;
use App\Models\Speaker;
use Illuminate\Console\Command;
use Symfony\Component\Panther\Client;

class ImportEventFromYoutubeCommand extends Command
{
    protected $signature = 'import:event-from-youtube {eventName} {playlistUrl}';

    protected $description = 'Import event sessions from Youtube';

    public function handle()
    {
        $eventName = $this->argument('eventName');
        $playListsURL = $this->argument('playlistUrl');

        $client = Client::createChromeClient();
        $crawler = $client->request('GET', $playListsURL);

        $items = $crawler->filter('ytd-playlist-video-renderer')->each(function ($node) {
            return [
                'title' => $node->filter('a#video-title')->text(),
                'video' => $node->filter('a#thumbnail')->attr('href'),
            ];
        });

        $eventModel = $this->createEvent($eventName);

        $this->createEventSessionsWithSpeakers($items, $eventModel);
    }

    private function createEvent(string $eventName): Event
    {
        $event = Event::firstOrCreate(
            [
                'title' => $eventName,
            ],
            [
                'venue' => 'EU',
                'user_id' => 1
            ]
        );

        return $event;
    }

    private function createEventSessionsWithSpeakers(array $items, Event $event): void
    {
        collect($items)->each(function ($item) use ($event) {
            [$speakerName, $sessionName] = $this->extractSpeakerAndSession($item['title']);

            $speaker = Speaker::firstOrCreate(
                ['name' => $speakerName],
            );

            Session::create([
                'title' => $sessionName,
                'event_id' => $event->id,
                'speaker_id' => $speaker->id,
                'video_url' => 'https://www.youtube.com' . $item['video'],
            ]);
        });
    }

    private function extractSpeakerAndSession($title): array
    {
        $nameParts = explode('-', $title);

        $speakerName = trim($nameParts[1]);
        $sessionName = trim($nameParts[2]);
        return [$speakerName, $sessionName];
    }
}
