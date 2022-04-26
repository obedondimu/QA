<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['string', 'required'],
            'description' => ['string', 'required'],
        ]);


        $question = new Question;
        $question->title = $request->input('title');
        $question->description = $request->input('description');
        $question->user_id = Auth::id();
        $question->save();

        return redirect()->route('q.show', $question->id);
    }

    /**
     * Answer a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function answer(Request $request)
    {
        $this->validate($request, [
            'question_id' => ['integer', 'required', 'exists:questions,id,deleted_at,NULL'],
            'description' => ['string', 'required'],
        ]);


        $question = new Question;
        $question->description = $request->input('description');
        $question->user_id = Auth::id();
        $question->question_id = $request->input('question_id');
        $question->save();

        return redirect()->route('q.show',  $request->input('question_id'));
    }

    /**
     * Answer a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function answerId(Request $request, $id)
    {
        $this->validate($request, [
            'description' => ['string', 'required'],
        ]);


        $question = new Question;
        $question->description = $request->input('description');
        $question->user_id = Auth::id();
        $question->question_id = $id;
        $question->save();

        return redirect()->route('q.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);

        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => ['string', 'required'],
            'description' => ['string', 'required'],
        ]);

        $question = Question::find($id);
        $question->title = $request->input('title');
        $question->description = $request->input('description');
        $question->save();

        return redirect()->route('q.show', $question->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            //code...
            $deleted = Question::destroy($id);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
        return redirect()->route('home');
    }
}
