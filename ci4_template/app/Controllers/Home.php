<?php

namespace App\Controllers;

class Home extends BaseController
{
    // public function index(): string
    // {
    //     return view('welcome_message');
    // }
    public function index()
    {
        $data = [
            'title' => 'Home Page',
            'content' => view ('welcome_message')
        ];
        return view('template', $data); 
    }
}


