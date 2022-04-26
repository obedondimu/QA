<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = Question::whereNull('question_id')->get();
        return view('home')->with('questions', $questions);
    }
}
