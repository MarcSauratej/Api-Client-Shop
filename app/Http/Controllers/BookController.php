<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    public function index(){
        $url=env('URL_SERVER_API', 'http://127.0.0.1');
        $response= Http::get($url.'/books');
        $data = $response->json();
        return view('book',compact('data'));
    }


    public function store(Request $request){
        $url=env('URL_SERVER_API', 'http://127.0.0.1');
        $response =Http::post($url.'/books/crear',[
            'provider_id'=> $request->provider_id,
            'title'=> $request->title,
            'description'=> $request->description,
        ]);
        return redirect()->route('book.index');
    }

    public function view($book){
        $url=env('URL_SERVER_API', 'http://127.0.0.1');
        $response= Http::get($url.'/books/'.$book);
        $book = $response->json();
        return view('bookupdate',compact('book'));
    }

    public function update(Request $request){
        $url=env('URL_SERVER_API', 'http://127.0.0.1');
        $response =Http::put($url.'books/update/'.$request->id,[
            'provider_id'=> $request->provider_id,
            'title'=> $request->title,
            'description'=> $request->description,
        ]);
        return redirect()->route('book.index');
    }

    public function delete($id){
        $url=env('URL_SERVER_API', 'http://127.0.0.1');
        $response= Http::delete($url.'/books/delete/'.$id);
        return redirect()->route('book.index');
    }
}
