<?php

namespace App\Services;

use Google\Client as Google_Client;
use Google\Service\YouTube as Google_Service_YouTube;

class YouTubeService
{
    protected $client;
    protected $youtube;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setDeveloperKey(env('YOUTUBE_API_KEY'));

        $this->youtube = new Google_Service_YouTube($this->client);
    }

    public function fetchAllVideosFromPlaylist($url)
    {
        $nextPageToken = '';
        $videos = [];

        do {
            $response = $this->youtube->playlistItems->listPlaylistItems('snippet', [
                'playlistId' => $this->parsePlaylistId($url),
                'maxResults' => 50,
                'pageToken' => $nextPageToken,
            ]);

            foreach ($response['items'] as $item) {
                $videos[] = [
                    'url' => $item['snippet']['resourceId']['videoId'],
                    'title' => $item['snippet']['title']
                ];
            }

            $nextPageToken = $response['nextPageToken'] ?? '';
        } while ($nextPageToken);

        return collect($videos);
    }

    public function parsePlaylistId($url) : string {
        $parsedUrl = parse_url($url, PHP_URL_QUERY);
        parse_str($parsedUrl, $query);
        return $query['list'] ?? null;
   }
}
