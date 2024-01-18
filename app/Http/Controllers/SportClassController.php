<?php

namespace App\Http\Controllers;

use App\Models\SportClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSportClassRequest;
use App\Http\Requests\UpdateSportClassRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sport;
use App\Models\Professor;


class SportClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = SportClass::all();
        $classes->load('sport');
        $classes->load('professor');

        // Group classes by sport name
        $classes = $classes->groupBy(function ($class) {
            return $class->sport->name;
        });

        //Order classes by sport name
        $classes = $classes->sortBy(function ($class, $key) {
            return $key;
        });

        return view('clubex.sportClass.index', compact('classes'));
    }

    public function sportsAndProfessors()
    {
        $sports = Sport::all();
        $professors = Professor::all();
        return response()->json([
            'sports' => $sports,
            'professors' => $professors
        ]);
    }

    public function getSpecified(Request $request){
        $class = SportClass::where('sport_id', $request->sport_id)->where('professor_id', $request->professor_id)->where('day', $request->day)->where('hour', $request->hour)->first();
        //Call the function to get the sports and professors
        $sportsProfessors = $this->sportsAndProfessors();

        //Convert to json
        $sportsProfessors = json_decode($sportsProfessors->content(), true);

        $sports = $sportsProfessors['sports'];
        $professors = $sportsProfessors['professors'];


        return response()->json([
            'class' => $class,
            'sports' => $sports,
            'professors' => $professors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSportClassRequest $request)
    {
        try {
            $input = $request->all();

            $sportClass = SportClass::create($input);
    
            notify()->success('Turma criada com sucesso!');
        }
        catch (\Exception $e) {
            notify()->error('Erro ao criar turma!');
        }
        return redirect()->route('sportsClass.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SportClass $sportClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SportClass $sportClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $input = $request->all();
        $original = $request->input('originalClass');
        $original = explode("_", strval($original));
        $old_sport_id = $original[0];
        $old_professor_id = $original[1];
        $old_day = $original[2];
        $old_hour = $original[3];

        try{
            DB::table('sport_classes')
            ->where('sport_id', $old_sport_id)
            ->where('professor_id', $old_professor_id)
            ->where('day', $old_day)
            ->where('hour', $old_hour)
            ->update([
                'sport_id' => $input['sport_id'],
                'professor_id' => $input['professor_id'],
                'day' => $input['day'],
                'hour' => $input['hour'],
                'name' => $input['name'],
                'description' => $input['description'],
                'slots' => $input['slots'],
                'price' => $input['price']
            ]);

            notify()->success('Turma atualizada com sucesso!');

        } catch (\Exception $e) {
            notify()->error('Erro ao atualizar turma!');
        }

        return redirect()->route('sportsClass.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($sport_id, $professor_id, $day, $hour)
    {
        try{
            DB::table('sport_classes')
                ->where('sport_id', $sport_id)
                ->where('professor_id', $professor_id)
                ->where('day', $day)
                ->where('hour', $hour)
                ->update(['deleted_at' => DB::raw('NOW()')]);

                notify()->success('Turma removida com sucesso!');
        }
        catch (\Exception $e) {
            notify()->error('Erro ao remover turma!');
        }

        return redirect()->route('sportsClass.index');
    }

}
