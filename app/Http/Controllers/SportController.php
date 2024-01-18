<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSportRequest;
use App\Http\Requests\UpdateSportRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PhotoController;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sports = Sport::all();
        return view('clubex.sport.index', compact('sports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clubex.sport.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $input = $request->all();

            if ($image = $request->file('image')) {
                $destinationPath = 'img/sports/';
                $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs($destinationPath, $imageName, 'public');
                $fullPath = $destinationPath . $imageName;
                $input['image'] = $imageName;
            } else $input['image'] = 'defaultImageSport.jpg';

            $input['name'] = $request->get('name');
            $input['description'] = $request->get('description');

            Sport::create($input);
            }
        catch (\Exception $e) {
            notify()->error('Erro ao criar esporte!');
            return redirect()->route('sports.index');
        }
        

        notify()->success('Esporte criado com sucesso!');

        return redirect()->route('sports.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sport = Sport::findOrFail($id);

        // $path = PhotoController::image('img/sports/' . $sport->image);

        $path = Storage::url('img/sports/' . $sport->image);

        $sport->image = $path;

        return $sport;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $sport = Sport::findOrFail($id);

        if ($image = $request->file('image')) {
            //Delete old image
            if ($sport->image != 'defaultImageSport.jpg') {
                $fileOld = 'img/sports/' . $sport->image;
                if (Storage::disk('public')->exists($fileOld)) {
                    Storage::disk('public')->delete($fileOld);
                }
            }

            $destinationPath = 'img/sports/';
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs($destinationPath, $imageName, 'public');
            $fullPath = $destinationPath . $imageName;
            $input['image'] = $imageName;
        } else $input['image'] = $sport->image;

        $sport->update($input);

        notify()->success('Esporte atualizado com sucesso!');
        return redirect()->route('sports.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $input = $request->all();

        $sport = Sport::findOrFail($id);

        //Delete old image
        if ($sport->image != 'defaultImageSport.jpg') {
            $fileOld = 'img/sports/' . $sport->image;
            if (Storage::disk('public')->exists($fileOld)) {
                Storage::disk('public')->delete($fileOld);
            }
        }

        $sport->delete();

        notify()->success('Esporte deletado com sucesso!');
        return redirect()->route('sports.index');
    }

    public function getImage($id)
    {
        $sport = Sport::findOrFail($id);

        $path = Storage::url('img/sports/' . $sport->image);

        // $sport->image = $path;

        return $path;
    }
}
