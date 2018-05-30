<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use App\Privilegio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $porDefectos = [ 
    'Libros'=>['Mis Solicitudes'=>url('virtuales'),'Mis Préstamos'=>url('prestamos'),'Histórico de Préstamos'=>url('historial')], 
    'Actividades'=> url('actividades'), 
        ];
        $u = new User();
        $name = explode(' ', $request->nombres);
        $u->name = $name[0];
        $u->email = $request->email;
        $u->user_level = 'estudiante';
        $u->human_id = $request->human_id;
        $u->password = Hash::make($request->contrasena);
        $u->domanda_di_securida = $request->domanda_di_securida;
        $u->answer = Hash::make($request->answer);
        
        $u->save();
        foreach($porDefectos as $modulo => $subPrivilegios)
        {
            if(is_string($subPrivilegios))
            {
                $p = new Privilegio();
                $p->user_id = $u->id;
                $p->modulo = $modulo;
                $p->accion = null;
                $p->url_privilegio = $subPrivilegios;
                $p->save();
            }
            else 
            {
                foreach ($subPrivilegios as $nombreSubprivilegio => $url) {
                    $p = new Privilegio();
                    $p->user_id = $u->id;
                    $p->modulo = $modulo;
                    $p->accion = $nombreSubprivilegio;
                    $p->url_privilegio = $url;
                    $p->save();
                }
            }
        }
       parent::saveOperation("Inicio","Prestamos","registrado al usuario ".$request->nombres." (".$request->email.")");
        $request->session()->flash('Éxito','Usuario registrado.');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
