<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function contact(){
        $details = [
            "help@site.co.za",
            "0791234567"
        ];

        return view('contact', [
            "details" => $details
        ]);
    }

    public function about(){
        return view('about');
    }

    public function home(){
        return view('welcome', [
            "name" => request('name')
        ]);
    }
}
