<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Http\Controllers\Controller;
use App\Models\Request as Requests;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use Illuminate\Http\Request;
use Mockery\Exception;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

    }

    public function indexByForm($id)
    {
        $requests = Requests::where('form_id', $id)->get();
        $requests->load('answers.question');


        return view('answer.index', compact('requests'));

//        $answers = Answer::whereHas('request', function ($query) use ($id) {
//            $query->where('form_id', $id);
//        })->get()->groupBy('request_id');
//        return view('answer.index', compact('answers'));
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
    public function store(Request $req)
    {
        $requestCreated =Requests::create([
            'form_id' => $req['form_id'],
            'number' => $req['number'],
            'name' => $req['name'] ?: ""
        ]);
        $requestId = $requestCreated['id'];
        $inserData = [];
        foreach ($req['responses'] as $item) {
            $questionId = $item['question']['id'];
            if (is_string($item['answer'])) {
                $optionId = null;
                $answer = $item['answer'];
            } else if (is_array($item['answer'])) {
                $optionId = $item['answer']['id'];
                $answer = $item['answer']['option'];
            }

            $inserData[] = [
                'request_id' => $requestId,
                'question_id' => $questionId,
                'option_id' => $optionId,
                'answer' => $answer,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        Answer::insert($inserData);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
