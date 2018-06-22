<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Item;

class ItemUserController extends Controller
{
    public function read()
    {
        $isbn = request()->isbn;

        // Search items from "itemCode"
        $client = new \RakutenRws_Client();
        $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));
        $rws_response = $client->execute('BooksBookSearch', [
            'isbn' => $isbn,
        ]);
        $rws_item = $rws_response->getData()['Items'][0]['Item'];

        // create Item, or get Item if an item is found
        $item = Item::firstOrCreate([
            'isbn' => $rws_item['isbn'],
            'title' => $rws_item['title'],
            'author' => $rws_item['author'],
            'size' => $rws_item['size'],
            'publishername' => $rws_item['publisherName'],
            'itemurl' => $rws_item['itemUrl'],
            // remove "?_ex=128x128" because its size is defined
            'image_url' => str_replace('?_ex=120x120', '', $rws_item['mediumImageUrl']),
        ]);

        \Auth::user()->read($item->id);

        return redirect()->back();
    }

    public function dont_read()
    {
        $isbn = request()->isbn;

        if (\Auth::user()->is_reading($isbn)) {
            $itemId = Item::where('isbn', $isbn)->first()->id;
            \Auth::user()->dont_read($itemId);
        }
        return redirect()->back();
    }
    
    public function want()
    {
        $isbn = request()->isbn;

        // Search items from "itemCode"
        $client = new \RakutenRws_Client();
        $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));
        $rws_response = $client->execute('BooksBookSearch', [
            'isbn' => $isbn,
        ]);
        $rws_item = $rws_response->getData()['Items'][0]['Item'];

        // create Item, or get Item if an item is found
        $item = Item::firstOrCreate([
            'isbn' => $rws_item['isbn'],
            'title' => $rws_item['title'],
            'author' => $rws_item['author'],
            'size' => $rws_item['size'],
            'publishername' => $rws_item['publisherName'],
            'itemurl' => $rws_item['itemUrl'],
            // remove "?_ex=128x128" because its size is defined
            'image_url' => str_replace('?_ex=120x120', '', $rws_item['mediumImageUrl']),
        ]);

        \Auth::user()->want($item->id);

        return redirect()->back();
    }

    public function dont_want()
    {
        $isbn = request()->isbn;

        if (\Auth::user()->is_wanting($isbn)) {
            $itemId = Item::where('isbn', $isbn)->first()->id;
            \Auth::user()->dont_want($itemId);
        }
        return redirect()->back();
    }
    
}
