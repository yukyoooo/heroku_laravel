<?php

namespace App\Models;

use GuzzleHttp\Client;

class Teams
{
    public static function notice($title, $message, $webhookUrl = null)
    {
        $_title = "新コメント!!";
        $teams = new Teams();
        $teams->sendMessage($title, $message, $webhookUrl, );
    }

    private function sendMessage($title, $message, $webhookUrl = null){
        $_webhookUrl = empty($webhookUrl) ? config('teams.test') : $webhookUrl;
        $method = "POST";

        $data = [
            'json' => [
                "title" => $title,
                "text" => $message,
            ],
            "headers" => [
                'Content-Type' => 'application/json',
            ],
            "format" => "json",
        ];

        $client = new Client();
        $client->request($method, $_webhookUrl, $data);
    }
}



