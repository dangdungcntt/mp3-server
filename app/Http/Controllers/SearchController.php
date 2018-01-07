<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
        if (empty($request->input('q'))) {
            return json_encode(['error' => 'Missing query']);
        }
        $client = new Client();
        $response = $client->request('GET', 'https://ac.global.mp3.zing.vn/complete/desktop', [
            'query' => [
                'type' => 'artist,album,video,song',
                'num' => 3,
                'query' => $request->input('q')
            ]
        ]);
        $body = json_decode($response->getBody());
        $data = new \stdClass();
//        echo '<pre>';
        foreach ($body->data as $item) {
            $arrItem = (array)$item;
            if (count(array_values($arrItem)) == 0) continue;

            $key = array_keys($arrItem)[0];
            if (count($arrItem[$key]) == 0) continue;
            $data->{$key} = $arrItem[$key];
        }
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}
