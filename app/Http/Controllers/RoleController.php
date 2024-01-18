<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function names()
    {
        //Get all roles names
        $names = Role::all()->pluck('name')->toArray();
        //Remove duplicates
        $names = array_unique($names);
        //Sort alphabetically
        sort($names);

        return $names;
    }

    public function hours($name)
    {
        //Get all roles names
        $roles = Role::where('name', $name)->get();
        //Get all hours
        $hours = $roles->pluck('hours')->toArray();
        //Remove duplicates
        $hours = array_unique($hours);
        //Sort alphabetically
        sort($hours);

        return $hours;
    }

    public function cash($name, $hour){
        //Get all roles names
        $roles = Role::where('name', $name)->where('hours', $hour)->first();
        $cash = $roles->cash;

        return $cash;
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
    public function store(StoreRoleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $role = Role::where('name', $request->name)->where('hours', $request->hours)->first();
        $role->cash = $request->cash;
        $role->save();

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
