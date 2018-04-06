<?php

namespace App\Http\Controllers;

use App\Human;
use App\Query;
use App\User;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('queries.index');
    }
    
    public function index2(Request $request)
    {
        return view('queries.listados');
    }

    public function trueindex(Request $request)
    {
        $q = new Query;
        $human = Human::where('cedula',$request->cedula)
                        ->first();
                        if(!$human) return -1;
        $q->user_id = $human
                        ->user
                        ->id;
        $q->queried_resource = $request->peticion;
        $q->save();
        $cedula = $request->cedula;
        if($request->peticion=='carnet')
            return $this->carnet($request,$cedula);
        else
            return $this->solvencia($request,$cedula);
    }
    

    public function listado(Request $request)
    {
        $j = User::where('user_level', 'jefe')
                        ->first();
        $jefe = $j->human;

        $usuarios = User::whereIn('user_level', ['estudiante','profesor'])
                        ->get();
        $data = [];

        foreach ($usuarios as $usuario) {
            $human = Human::find($usuario->human_id); 
            $prestamos_raw = $usuario->loans()->whereIn('estado',['SIN RETIRAR','SIN DEVOLVER'])->get(); 
            if(count($prestamos_raw->toArray())==0) $estado = 'Solventes';
            else $estado = 'Morosos';
            if($request->clase==$estado) $data[]=$human;
        }
 
        $view =  \View::make('pdf.listado', ['clase' => $request->clase, 'data' => $data, 'jefe' => $jefe ])->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('listado');
    }

    private function solvencia(Request $request,$cedula)
    {
        $j = User::where('user_level', 'jefe')
                        ->first();
        $jefe = $j->human;

        $human = Human::where('cedula',$request->cedula)
                        ->first();

        $usr = $human->user;
        
        if(!$usr)
            return -1;
        
        $prestamos_raw = $usr->loans()->whereIn('estado',['SIN RETIRAR','SIN DEVOLVER'])->get(); 
$prestamos = $solicitudes = [];
        if($prestamos_raw)
            foreach ($prestamos_raw as $key => $value) {
              
                $temp['book'] = $value->item->book;  
                $temp['item'] = $value->item;  
                $temp['estado'] = $value->estado;  
                $prestamos[] = $temp;
            } 

        if(count($prestamos)>0 || count($solicitudes)>0)
        {
            $data = ['prestamos'=>$prestamos, 'solicitudes' => $solicitudes];
            return $data;
        }
        else $data = []; 
 


        $view =  \View::make('pdf.solvencia', ['persona' => $human, 'data' => $data, 'jefe' => $jefe ])->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('solvencia');
    }

    private function carnet(Request $request,$cedula)
    {
        $j = User::where('user_level', 'jefe')
                        ->first();
        $jefe = $j->human;
        $fecha = date("d-m-").(date("Y")+1);
        $human = Human::where('cedula',$request->cedula)
                        ->first();
                        $usr = $human->user;
        if(!$usr)
            return -1; 
        

        $prestamos_raw = $usr->loans()->whereIn('estado',['SIN RETIRAR','SIN DEVOLVER'])->get(); 
        
        $prestamos = $solicitudes = [];

        if($prestamos_raw)
            foreach ($prestamos_raw as $key => $value) {
                $temp['book'] = $value->item->book;  
                $temp['item'] = $value->item;  
                $temp['estado'] = $value->estado;  
                $prestamos[] = $temp;
            } 
        

        if(count($prestamos)>0 || count($solicitudes)>0)
            $data = ['prestamos'=>$prestamos, 'solicitudes' => $solicitudes];
        else
        {
         $data = $human->toArray(); 
         $data['carrera'] = $human->student->speciality->especialidad;
         $data['foto'] = $human->user->photo;
         $data['jefe_nombres'] = $jefe->nombres;
         $data['jefe_apellidos'] = $jefe->apellidos;
         $data['vensimiento'] = $fecha;
         $data['user_level']='estudiante';
        }

        return $data;
        
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
     * @param  \App\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function show(Query $query)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function edit(Query $query)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Query $query)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function destroy(Query $query)
    {
        //
    }
}
