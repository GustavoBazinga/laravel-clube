<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFormRequest;
use App\Http\Requests\UpdateFormRequest;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($api = false)
    {
        $forms = Form::all();
        if($api){
            $json = json_encode($forms);
            return $json;
        }
        return view('form.index', compact('forms'));

    }

    public function indexByName($name)
    {
        if($name == 'inicio'){
            return $this->index(true);
        }
        return Form::where('name', $name)->firstOrFail();
    }

    public function indexByNumber($index)
    {
        $index = (int) $index - 1;
        $form = json_decode($this->index(true));
        if ($index < 0 || $index > count($form)-1) {
            return ['error' => 'Index out of range'];
        }
        $form = $form[$index];
        return $form;
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
    public function store(StoreFormRequest $request)
    {
        //;
    }

    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form)
    {
        return view('form.edit', compact('form'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormRequest $request, Form $form)
    {
        //Atualiza o formulário
        $form->update($request->all());
        //Redireciona para a página de edição do formulário
        return redirect()->route('questions.edit', $form);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {
        //
    }
}
