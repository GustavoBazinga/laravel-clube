<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfessorRequest;
use App\Http\Requests\UpdateProfessorRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professors = Professor::all();
        return view('clubex.professor.index', compact('professors'));
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
    public function store(StoreProfessorRequest $request)
    {
        try {
            $input = $request->all();

            if ($image = $request->file('image')) {
                $destinationPath = 'img/professors/';
                $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs($destinationPath, $imageName, 'public');
                $fullPath = $destinationPath . $imageName;
                $input['image'] = $imageName;
            } else $input['image'] = 'defaultImageProfessor.jpg';

            $input['name'] = $request->get('name');
            $input['email'] = $request->get('email');
            $input['telephone'] = $request->get('telephone');
            $input['more'] = $request->get('more');

            Professor::create($input);
            }
        catch (\Exception $e) {
            notify()->error('Erro ao criar professor!');
            return redirect()->route('sports.index');
        }
        

        notify()->success('Professor criado com sucesso!');

        return redirect()->route('professors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Professor $professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sport = Professor::findOrFail($id);

        // $path = PhotoController::image('img/sports/' . $sport->image);

        $path = Storage::url('img/professors/' . $sport->image);

        $sport->image = $path;

        return $sport;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $sport = Professor::findOrFail($id);

        if ($image = $request->file('image')) {
            //Delete old image
            if ($sport->image != 'defaultImageProfessor.jpg') {
                $fileOld = 'img/professors/' . $sport->image;
                if (Storage::disk('public')->exists($fileOld)) {
                    Storage::disk('public')->delete($fileOld);
                }
            }
            $destinationPath = 'img/professors/';
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs($destinationPath, $imageName, 'public');
            $fullPath = $destinationPath . $imageName;
            $input['image'] = $imageName;
        } else $input['image'] = $sport->image;

        $sport->update($input);

        notify()->success('Professor atualizado com sucesso!');
        return redirect()->route('professors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professor $professor)
    {
        try {
            $professor->delete();
        } catch (\Exception $e) {
            notify()->error('Erro ao apagar professor!');
            return redirect()->route('professors.index');
        }

        notify()->success('Professor apagado com sucesso!');

        return redirect()->route('professors.index');
    }

    public function getImage($id)
    {
        $professor = Professor::findOrFail($id);

        $path = Storage::url('img/professors/' . $professor->image);

        // $professor->image = $path;

        return $path;
    }
}
