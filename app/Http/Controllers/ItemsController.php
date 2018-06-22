<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class ItemsController extends Controller
{
    public function create()
    {
        $title = request()->title;
        $author = request()->author;
        $items = [];
        if ($title||$author) {
            $client = new \RakutenRws_Client();
            $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));

            $rws_response = $client->execute('BooksBookSearch', [
                'title' => $title,
                'author' => $author,
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
                $item->image_url = str_replace('?_ex=120x120', '', $rws_item['Item']['mediumImageUrl']);
                $items[] = $item;
            }
        }

        return view('items.create', [
            'title' => $title,
            'author' => $author,
            'items' => $items,
        ]);
    }
    
     public function show($id)
    {
      $item = Item::find($id);
      $read_users = $item->read_users;
      $want_users = $item->want_users;

      return view('items.show', [
          'item' => $item,
          'read_users' => $read_users,
          'want_users' => $want_users,
      ]);
    }
  }