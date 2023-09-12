<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Http\Controllers\Controller;
use App\Models\Request as Requests;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use Illuminate\Http\Request;
use Mockery\Exception;
use App\Http\Middleware\CodeBookConversor as CodeBook;

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
        //Get all requests by form with trash
        $requests = Requests::where('form_id', $id)->with(['answers' => function ($query) {
            $query->withTrashed()->with(['question' => function ($query) {
                $query->withTrashed();
            }]);
        }])->get();


        // return $requests;

        if (is_object($requests)) {
            foreach ($requests as $request) {
                $request->statusCode = $request->status;
                $request->status = CodeBook::getStateByCode($request->status)['status'];
            }
        }

        $status = CodeBook::getStates();
        $keys = array_keys($status);

        foreach ($keys as $key) {
            $status[$key] = CodeBook::getStateByName($key)['status'];
        }


        return view('answer.index')->with('requests', $requests)->with('options', $status);

       $answers = Answer::whereHas('request', function ($query) use ($id) {
           $query->where('form_id', $id);
       })->get()->groupBy('request_id');
       return view('answer.index', compact('answers'));
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
            'name' => $req['name'] ?: "",
            'status' => '1'
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

        return $requestCreated;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
