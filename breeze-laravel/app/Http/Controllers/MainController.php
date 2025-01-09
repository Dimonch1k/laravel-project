<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $title = 'Welcome to Laravel';
        $subtitle = 'Hello World';
        $array = ['a', 'b', 'c'];
        return view('index', compact('title', 'subtitle', 'array'));
    }

    public function contacts()
    {
        return view('client.contacts');
    }

    public function sendEmail(Request $request)
    {
        dump($request->all());
        return "Ok";
    }
}