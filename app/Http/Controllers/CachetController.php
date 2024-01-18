<?php

namespace App\Http\Controllers;

use App\Models\Cachet;
use App\Models\Worker;
use App\Models\Event;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Requests\StoreCachetRequest;
use App\Http\Requests\UpdateCachetRequest;
use Illuminate\Http\Request;


class CachetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = Worker::all();
        $events = Event::all();
        $cachets = Cachet::all();
        return view('cachet.index', compact('cachets', 'workers', 'events'));
    }

    public function updateCachet(Request $request){
        $today = date("Y-m-d");
        //Convert to string
        $today = strtotime($today);
        $errors = [];
        foreach ($request->all() as $item) {
            $worker = Worker::where('register', $item['worker_id'])->first();
            if($item['start_time'] == $item['end_time']){
                $cachet = Cachet::where('worker_id', $item['worker_id'])->where('event_id', $item['event_id'])->first();
                if($cachet){
                    $cachet->delete();
                    return response()->json(['message' => 'Cachet deleted'], 200);
                }
            } else{
                $cachet = Cachet::where('worker_id', $item['worker_id'])->where('event_id', $item['event_id'])->first();
                if($cachet){
                    $cachet->start_time = "2010-01-01 " . $item['start_time'];
                    $cachet->end_time = "2010-01-01 " . $item['end_time'];

                    $diff = strtotime($cachet->end_time) - strtotime($cachet->start_time);
                    $hours = $diff / ( 60 * 60 ) + 0.25;

                    //Round to integer
                    $hours = round($hours);

                    $rolesCorrect = Role::where('name', $item['role_name'])->where('hours', $hours)->first();

                    if($rolesCorrect){
                        $cachet->role_id = $rolesCorrect->id;
                        $cachet->cash = $rolesCorrect->cash;
                    } else{
                        $erros[] = [$worker->name, "Numero de horas não cadastrado"];
                    }

                    $cachet->save();
                } else{
                    $cachet = new Cachet();
                    $cachet->worker_id = $worker->id;
                    $cachet->event_id = $item['event_id'];
                    $cachet->start_time = "2010-01-01 " . $item['start_time'];
                    $cachet->end_time = "2010-01-01 " . $item['end_time'];
                    $diff = strtotime($cachet->end_time) - strtotime($cachet->start_time);
                    $hours = $diff / ( 60 * 60 ) + 0.25;

                    //Round to integer
                    $hours = round($hours);

                    $rolesCorrect = Role::where('name', $item['role_name'])->where('hours', $hours)->first();

                    if($rolesCorrect){
                        $cachet->role_id = $rolesCorrect->id;
                        $cachet->cash = $rolesCorrect->cash;
                    } else{
                        $erros[] = [$worker->name, "Numero de horas não cadastrado"];
                    }
                    $cachet->save();
                }
                
            }
        }
        if(count($errors) > 0){
            return response()->json(['message' => $errors], 400);
        }
        return response()->json(['message' => 'Cachet updated'], 200);
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
    public function store(StoreCachetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cachet $cachet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cachet $cachet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCachetRequest $request, Cachet $cachet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cachet $cachet)
    {
        //
    }
}
