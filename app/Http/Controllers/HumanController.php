<?php

namespace App\Http\Controllers;

use App\Human;
use Illuminate\Http\Request;

class HumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        //debo validar: si esta en la lista de usuarios, si esta el DB departamento, como profesor u estudiante, de lo contrario, el usuario es:foraneo o asosiado(actualmente no existe una lista fidedigna del cuerpo de empleados activos en la UPTA)
        $cedula = $request->cedula;
        $rs = Human::where('cedula',"$cedula")
                ->get()
                ->toArray(); 

        if($request->input('nouser',false)!=1 && Human::where('cedula',"$cedula")
                ->first()->user)
            return null;
        return $rs;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Human  $human
     * @return \Illuminate\Http\Response
     */
    public function show(Human $human)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Human  $human
     * @return \Illuminate\Http\Response
     */
    public function edit(Human $human)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Human  $human
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Human $human)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Human  $human
     * @return \Illuminate\Http\Response
     */
    public function destroy(Human $human)
    {
        //
    }
}
