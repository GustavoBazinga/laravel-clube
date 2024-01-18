<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = Worker::all();
        return view('worker.index')->with('workers', $workers);
    }

    public function indexApi()
    {
        //Get only names of roles and workers

        $workers = Worker::all();
        $roles = Role::all();

        $list_names = [];
        foreach ($workers as $worker) {
            if(!in_array($worker->name, $list_names))
                $list_names[] = [$worker->register, $worker->name];
        }

        $list_roles = [];
        foreach ($roles as $role) {
            if(!in_array($role->name, $list_roles))
                $list_roles[] = $role->name;

        }
        
        return response()->json([
            'workers' => $list_names,
            'roles' => $list_roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('worker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkerRequest $request)
    {
        Worker::create($request->all());
        return redirect()->route('workers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Worker $worker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkerRequest $request, Worker $worker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {
        $worker->delete();
        return redirect()->route('workers.index');
    }
}
