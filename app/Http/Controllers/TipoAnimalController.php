<?php

namespace App\Http\Controllers;

use App\Models\TipoAnimal;
use Illuminate\Http\Request;


class TipoAnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $tipoAnimales = TipoAnimal::all();
        return view('tipo_animales.index', compact('tipoAnimales'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_animales.create');
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
        ]);

        TipoAnimal::create($request->all());

        return redirect()->route('tipo_animales.index')
            ->with('success', 'Tipo de animal creado exitosamente.');
    }



    public function destroy(TipoAnimal $tipoAnimal)
    {
        $tipoAnimal->delete();

        return redirect()->route('tipo_animales.index')
            ->with('success', 'Tipo de animal eliminado exitosamente.');
    }


}
