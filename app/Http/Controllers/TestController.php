<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TestController extends Controller
{
    public $users = [
        [ 'id' => 1, 'name' => 'Marko' ],
        [ 'id' => 2, 'name' => 'Janko' ],
        [ 'id' => 3, 'name' => 'Filip' ]
    ];

    public function greet(Request $request){
        $search = "";
        if($request->has('search')){
            $search = $request->search;
        }
        return view('test', [
            'subtitle' => "Subtitle test LARAVEL",
            "title" => "Naslov stranice ...",
            "users" => $this->users,
            'search' => $search,
            "test_id" => $request->test_id,
            'show_table' => false
        ]);
    }

    public function home(){
        return view('home');
    }

    public function about(){
        return view('about');
    }

    public function showContactPage(){
        return view('contact');
    }

    public function sendMessage(Request $request){
        dd($request);
    }

    public function updateMessage(Request $request){
        dump($request->first_name);
    }

    public function deleteMessage(Request $request){
        dump($request->first_name);
    }

    public function notFound(){
        return "404";
    }
}
