<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Card;

class DashboardController extends Controller
{
    public function index(){
        $url=env('URL_SERVER_API', 'http://127.0.0.1');
        $response= Http::get($url.'/books');
        $books = $response->json();
        return view('shop',compact('books'));
    }

    public function view($book){
        $url=env('URL_SERVER_API', 'http://127.0.0.1');
        $response= Http::get($url.'/books/'.$book);
        $book = $response->json();
        return view('card',compact('book'));
    }


    public function shop(Request $request)
    {$card = new Card;
        $card ->title=$request->title;
        $card ->description=$request->description;
        $card ['user_id'] = Auth::user()->id;;

        $card->save();
        return redirect()->route('shop');
    }

    public function history()
    {
        $user = Auth::user();

        $cards = Card::where('user_id', $user->id)->get();
        return view('history', compact('cards'));
    }
}
