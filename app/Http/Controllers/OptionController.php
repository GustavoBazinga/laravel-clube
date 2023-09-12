<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use Illuminate\Http\Request;

class OptionController extends Controller
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
    public function store(StoreOptionRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($form)
    {
        $questions = Question::where('form_id', $form)->get();

        foreach ($questions as $question) {
            $options = Option::where('question_id', $question->id)->get();
            $question->options = $options;
        }

        //Convert to array
        // $questions = $questions->toArray();


        // return $questions;

        // usort($questions, function($a, $b) {
        //     $a_next_id = $a->options->firstWhere('value', $a->answer)->next_question_id ?? null;
        //     $b_next_id = $b->options->firstWhere('value', $b->answer)->next_question_id ?? null;
        //     return $a_next_id <=> $b_next_id;
        // });

        return view('option.edit', compact('questions', 'form'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update($form, Request $request)
    {
        $questions = Question::where('form_id', $form)->get();

        $questions->load('options');

        foreach ($questions as $question){
            if ($question->type == 'select'){
                foreach ($question->options as $option){
                    //Verificar se o option existe no request e se não existir apagar
                    if (!array_key_exists($option->id, $request['old_options'][$question->id])){
                        $option->delete();
                    }
                    else{
                        $option = Option::updateOrCreate(
                            ['id' => $option->id],
                            [
                                'option' => $request['old_options'][$question->id][$option->id],
                                'next_question_id' => $request['old_next_question'][$question->id][$option->id]
                            ],
                        );
                    }

                }
            }
            else {
                $option = Option::updateOrCreate(
                    ['question_id' => $question->id],
                    [
                        'option' => "Livre",
                        'next_question_id' => $request['old_next_question']['free'][$question->id]
                    ],
                );
            }
        }
//        return [$request['new_option'], $request['new_next_question']];
        //Create options for new questions
        if (isset($request['new_option'])){
            foreach ($request['new_option'] as $question_id => $options){
                foreach ($options as $key => $option){
                    $option = Option::create([
                        'question_id' => $question_id,
                        'option' => $option,
                        'next_question_id' => $request['new_next_question'][$question_id][$key]
                    ]);
                }
            }
        }

        return redirect()->route('forms.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        //
    }
}
