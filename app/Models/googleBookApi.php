<?php

namespace App\Models;

use GuzzleHttp\Client;

class googleBookApi
{
    public static function getBooks($keyword = null)
    {
        $data = [];
        $items = null;
        if(!empty($keyword))
        {
            // 検索キーワードあり

            // 日本語で検索するためにURLエンコードする
            $title = urlencode($keyword);

            // APIを発行するURLを生成
            $url = 'https://www.googleapis.com/books/v1/volumes?q=' . $title . '&country=JP&tbm=bks';

            $client = new Client();

            // GETでリクエスト実行
            $response = $client->request("GET", $url);

            $body = $response->getBody();

            // レスポンスのJSON形式を連想配列に変換
            $bodyArray = json_decode($body, true);

            // 書籍情報部分を取得
            $items = $bodyArray['items'];
        }

        $data = [
            'items' => $items,
            'keyword' => $keyword,
        ];

        return $data;
    }
}



