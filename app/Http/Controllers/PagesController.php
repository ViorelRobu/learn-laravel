<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        // session(['user' => auth()->user()]);
        // return session('user');
        return view('welcome');
    }

    public function test()
    {
        $tasks = [
            'Wake up at 5:30',
            'Go to work',
            'Have lunch',
            'Fill in papers',
            'Go home and rest'
        ];

        return view('test')->withTasks($tasks);
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }
}
