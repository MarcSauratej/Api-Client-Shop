<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProviderController extends Controller
{
    public function index(){
        $url=env('URL_SERVER_API', 'http://127.0.0.1');
        $response= Http::get($url.'/providers');
        $data = $response->json();
        return view('provider',compact('data'));
    }


    public function store(Request $request){
        $url=env('URL_SERVER_API', 'http://127.0.0.1');
        $response =Http::post($url.'/providers/crear',[
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
        ]);
        return redirect()->route('provider.index');
    }

    public function view($provider){
        $url=env('URL_SERVER_API', 'http://127.0.0.1');
        $response= Http::get($url.'/providers/'.$provider);
        $provider = $response->json();
        return view('providerupdate',compact('provider'));
    }

    public function update(Request $request){
        $url=env('URL_SERVER_API', 'http://127.0.0.1');
        $response =Http::put($url.'providers/update/'.$request->id,[
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
        ]);
        return redirect()->route('provider.index');
    }

    public function delete($id){
        $url=env('URL_SERVER_API', 'http://127.0.0.1');
        $response= Http::delete($url.'/providers/delete/'.$id);
        return redirect()->route('provider.index');
    }
}
