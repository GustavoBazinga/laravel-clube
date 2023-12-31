<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestRequest;
use App\Http\Requests\UpdateRequestRequest;
use Illuminate\Http\Request as RequestHttp;
use App\Http\Middleware\CodeBookConversor as CodeBook;
use App\Http\Services\RequestService;

class RequestController extends Controller
{
    public function indexDashboard($form, $timeStart = "", $timeEnd = ""){
        $data = RequestService::indexDashboard($form, $timeStart, $timeEnd);
        return $data;
    }

    public function index()
    {
        $requests = Request::all();
        $requests->load('answers');
        return $requests;
    }

    public function show($id)
    {
        $request = Request::find($id);
        return $request;
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update($id, RequestHttp $request)
    {
        $req = Request::find($id);
        $req->status = $request->status;
        $req->type = $request->type;
        $req->area = $request->area;
        $req->name = $request->name;
        if ($request->status == CodeBook::Finalizado) $req->finalized_at = now();
        $req->save();
        return $req;
    }


}
