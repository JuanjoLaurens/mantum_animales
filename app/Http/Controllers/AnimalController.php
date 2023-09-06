<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\TipoAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $animales = Animal::all();
        return view('animales.index', compact('animales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $tiposAnimales = TipoAnimal::all();
        return view('animales.create', compact('tiposAnimales'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo_id' => 'required|exists:tipo_animales,id',
            'fecha_nacimiento' => 'required|date',
        ]);

        Animal::create($request->all());

        return redirect()->route('animales.index')
            ->with('success', 'Animal creado exitosamente.');
    }
    public function show($id)
    {
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('animales.index')
            ->with('success', 'Animal eliminado exitosamente.');
    }

    public function contar()
    {
        $resultados = Animal::join('tipo_animales', 'tipo_animales.id', '=', 'animales.tipo_id')
            ->select('tipo_animales.nombre AS TipoAnimal')
            ->selectRaw('COUNT(animales.id) AS Cantidad')
            ->where('animales.fecha_nacimiento', '>', '2020-01-01')
            ->groupBy('tipo_animales.nombre')
            ->havingRaw('COUNT(animales.id) > 2')
            ->get();
//        dd($resultados);

        return view('animales.contar', compact('resultados'));
    }

}
