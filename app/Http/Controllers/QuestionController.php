<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Form;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($form)
    {
        $form = Form::find($form);
        $questions = Question::where('form_id', $form)->get();
        return view('question.edit', compact('form', 'questions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($form, Request $request)
    {
        $questions = Question::where('form_id', $form)->get();
        //Compare question with old_questions and remove all not match

        foreach ($questions as $question){
            //Check if question is in old_questions
            if(!in_array($question->id, array_keys($request->old_questions))){
                //Delete question
                $question->delete();
            }
            else {
                //Update question
                $question->update([
                    'question' => $request->old_questions[$question->id],
                    'type' => $request->old_types[$question->id],
                ]);
            }
        }

        //Add new questions
        if ($request->new_questions != null) {
            foreach ($request->new_questions as $key => $question) {
                Question::create([
                    'form_id' => $form,
                    'question' => $question,
                    'type' => $request->new_types[$key],
                ]);
            }
        }

        return redirect()->route('options.edit', $form);




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
