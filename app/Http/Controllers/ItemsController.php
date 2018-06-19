<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class ItemsController extends Controller
{
    public function create()
    {
        $keyword = request()->keyword;
        $items = [];
        if ($keyword) {
            $client = new \RakutenRws_Client();
            $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));

            $rws_response = $client->execute('BooksBookSearch', [
                'keyword' => $keyword,
                'imageFlag' => 1,
                'hits' => 20,
            ]);

            // Creating "Item" instance to make it easy to handle.（not saving）
            foreach ($rws_response->getData()['Items'] as $rws_item) {
                $item = new Item();
                $item->title = $rws_item['Item']['title'];
                $item->author = $rws_item['Item']['author'];
                $item->publishername = $rws_item['Item']['publisherName'];
                $item->size = $rws_item['Item']['size'];
                $item->isbn = $rws_item['Item']['isbn'];
                $item->itemcaption = $rws_item['Item']['itemCaption'];
                $item->itemurl = $rws_item['Item']['itemUrl'];
                $item->image_url = str_replace('?_ex=128x128', '', $rws_item['Item']['mediumImageUrl']);
                $items[] = $item;
            }
        }

        return view('items.create', [
            'keyword' => $keyword,
            'items' => $items,
        ]);
    }
}
