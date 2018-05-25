<?php

namespace App\Http\Controllers;

use App\Event;
use App\Human;
use App\Notification;
use App\User;
use \Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reservaciones(Request $request)
    {
        $confirmado = $request->input('reservaciones',null) ? false : true;
        if($request->input('semana',null))
        {
            $rs = Event::
            where('confirmado',$confirmado)
            ->whereBetween('inicio', 
                [
                     Carbon::parse('last monday')->startOfDay(),
                     Carbon::parse('next friday')->endOfDay()
                ])
            ->get();
        }
        elseif($request->input('dia',null))
        {
            $rs = Event::
            where('confirmado',$confirmado)
            ->whereBetween('inicio', 
                [
                     $request->input('dia',null).' 00:00:00',
                     $request->input('dia',null).' 23:59:59'
                ])
            ->get();
        }
        else
        {
        $rs = Event::where('confirmado',0)
        ->get();
 

        }

            $data = [];
            foreach ($rs as $key => $value) {
                $temp = [];
                $temp['inicio'] = Carbon::parse($value->inicio)->format("d/m/Y h:i:s A");
                $temp['finalizacion'] = Carbon::parse($value->finalizacion)->format("d/m/Y h:i:s A");
                $temp['nombre'] = $value->nombre;
                $temp['id'] = $value->id;
                $temp['detalles'] = $value->detalles;
                $temp['nombre_responsable'] = $value->nombre_responsable;
                $temp['telefono_responsable'] = $value->telefono_responsable;
                $data[] = $temp;
            }

       Notification::where( [
            ['user_id','=',Auth::user()->id],
            ['visto','=',0],
            ['event_id','<>',null]
            ] )->update(['visto' => 1]);

            return view('events.noconfirm')->with(['data'=>$data,'perspective'=>'admin']);
    }


    public function index(Request $request,$mes='no')
    {
        if($mes=='no') $mes=date("m");
        $f1i = $request->input("fi",false)? $request->input("fi") : '';
        $f1f = $request->input("ff",false)? $request->input("ff") : '';
         
        $fi = $request->input("fi",false) ? Carbon::createFromFormat('m/d/Y h:i A',$request->input("fi"))->format('Y-m-d') : ""; 
        $ff = $request->input("ff",false) ? Carbon::createFromFormat('m/d/Y h:i A',$request->input("ff"))->format('Y-m-d') : ""; 
 
        $condiciones = [['confirmado',"=",true]];
        if($fi!=="") 
            $condiciones[] = ['fecha_inicio','>=',"$fi 00:00:00"];
        if($ff!=="") 
            $condiciones[] = ['fecha_inicio','<=',"$ff 23:59:00"];
        if($fi=='' && $ff=='')
            $condiciones[]=[ 'fecha_inicio','LIKE', "%".$mes."%"];

        $rs = Event::where($condiciones)->get();




            $data = [];
            foreach ($rs as $key => $value) {
                $temp = [];
                $temp['inicio'] = Carbon::parse($value->fecha_inicio)->format("d/m/Y h:i:s A");
                $temp['finalizacion'] = Carbon::parse($value->fecha_finalizacion)->format("d/m/Y h:i:s A");
                $temp['nombre'] = $value->nombre;
                $temp['detalles'] = $value->detalles;
                $temp['id'] = $value->id;
                $data[] = $temp;
            }
            if (!Auth::guest()) { 
                echo Auth::guest();
               Notification::where( [
                    ['user_id','=',Auth::user()->id],
                    ['visto','=',0],
                    ['event_id','<>',null]
                    ] )->update(['visto' => 1]);

           };
            return view('events.index')
            ->with('data',$data)
            ->with('fi',$fi)
            ->with('ff',$ff);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user() && Auth::user()->user_level =='admin')
            $tipo = 'Por Admin';
        elseif(Auth::user() && Auth::user()->user_level =='usuario')  
            $tipo = 'Por Estudiante';
        else
            $tipo = 'Afuera';
        $user = null;
        if(Auth::user())
            $user = Auth::user(); 

        if($user && $user->user_level=='admin')
        { 
        return view('events.formadmin')->with(
            ['accion'=>'Nuevo Evento',
            'tipo'=>$tipo,
            'user' => $user]);
        }
        else
        { 
        return view('events.form')->with(
            ['accion'=>'Nuevo Evento',
            'tipo'=>$tipo,
            'user' => $user]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->inicio = Carbon::createFromFormat('m/d/Y h:i A',$request->inicio)->format('Y-m-d h:i:00');
        $request->finalizacion = Carbon::createFromFormat('m/d/Y h:i A',$request->finalizacion)->format('Y-m-d h:i:00');

       

        $minimohabil = parent::calcularFechaExpiracion(date("Y-m-d"),5);
        if(strtotime($request->inicio) < strtotime($minimohabil)) {
            $request->session()->flash('error3',true);
            return redirect('eventos');
        }
        $e = new Event;
        $e->fecha_inicio = $request->inicio;
        $e->cantidad_asistentes = $request->cantidad_asistentes;
        $e->fecha_finalizacion = $request->finalizacion;
        $e->nombre = $request->evento;
        $e->detalles = $request->detalles;
        if( Auth::user() && $request->input('noupta',false) ) // Registrado por admin
        {

            $e->observaciones = $request->observaciones;
            $user =  Auth::user();
            $e->nombre_responsable =  $request->nombre_responsable;
            $tr = $request->telefono_responsable1.$request->telefono_responsable2;
            $e->telefono_responsable = $tr; 

             parent::saveOperation("Inicio","Eventos","registrado el evento ".$request->evento);
        }
        elseif( Auth::user() && $request->input('vienedeusuario',false) ) // Solicitud por usuario
        {
            $user =  Auth::user();
        $e->user_id =  $user->id; 
        $e->nombre_responsable =  $user->human->nombres.' '.$user->human->apellidos;
        $e->telefono_responsable = $user->human->numero_telefono;

             parent::saveOperation("Inicio","Eventos","solicitado el evento ".$request->evento);
        }
        elseif( Auth::user()) // Registrado por admin y el responsable es de la UPTA
        {              
            $user = User::find($request->user_id);
        $e->user_id =  $request->user_id; 
        $e->nombre_responsable =  $user->human->nombres.' '.$user->human->apellidos;
        $e->telefono_responsable = $user->human->telefono;

             parent::saveOperation("Inicio","Eventos","registrado el evento ".$request->evento);
        }
        else // Solicitud de afuera
        {
        $e->nombre_responsable = $request->nombre_responsable;
            $tr = $request->telefono_responsable1.$request->telefono_responsable2;
            $e->telefono_responsable = $tr; 
        }
        $e->confirmado = $request->input('confirmado',false);
        $e->observaciones='';
        $e->save();
        if(! ($request->input('confirmado',false)) )
            $this->generateNotifications('Evento', $e->id);
        $request->session()->flash('Éxito',true); 
        return redirect('eventos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $j = User::where('user_level', 'jefe')
                        ->first();
        $jefe = $j->human;

        $evento = Event::find($id);
        $view =  \View::make('pdf.solicitud', ['evento' => $evento,'jefe' => $jefe  ])->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('solvencia');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $r, $id)
    {
          $evento = Event::find($id);
        return view('events.confirm')->with('evento',$evento)
        ->with('evento',$evento)
        ->with('accion','Confirmar Evento');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $event)
    {
        $evento = Event::find($event);
        Event::destroy($event);
             parent::saveOperation("Inicio","Eventos","cancelado el evento ".$evento->nombre);
        $request->session()->flash('Éxito','Evento cancelado.');
        return redirect('reservaciones');
    }

    public function confirmar(Request $request)
    {
        $request->inicio = Carbon::createFromFormat('m/d/Y h:i A',$request->inicio)->format('Y-m-d h:i:00');
        $request->finalizacion = Carbon::createFromFormat('m/d/Y h:i A',$request->finalizacion)->format('Y-m-d h:i:00');
        //SDASDA
        $vv = Event::where('fecha_inicio','LIKE',"%".date("Y-m-d", strtotime($request->inicio))."%")
                    ->get()->toArray();
 
                    $suma=0;
                    foreach ($vv as $key => $value) {
                        
                       if($value['confirmado'])
                        $suma += $value['cantidad_asistentes'];
                    }
        $e = Event::find($request->event_id);
          
        $e->cantidad_asistentes = $request->cantidad_asistentes;
        $e->save();
        
        if($suma + $e->cantidad_asistentes > 150) {
            $request->session()->flash('error_porno', 'La cantidad asistentes excede la capacidad máxima de personas admitidas en la biblioteca para la fecha indicada. Procure reducir la cantidad de asistentes o cambie la fecha.');
        return redirect('reservaciones');
        }       
       

        $e->confirmado=true;
        $e->fecha_inicio = $request->inicio;
        $e->fecha_finalizacion = $request->finalizacion;
        $e->nombre = $request->evento;
        $e->detalles = $request->detalles;
        $e->observaciones = $request->observaciones;
        $e->save();
        if(is_numeric($e->user_id))
            $this->generateNotifications('Evento', $request->event_id, $e->user_id);
        $request->session()->flash('Éxito','Evento confirmado.');
                parent::saveOperation("Inicio","Eventos","confirmado el evento ".$e->nombre);
        return redirect('reservaciones');
    }

    public function notifications(Request $request)
    { 
        $lamount = Notification::where([
            ['user_id','=',Auth::user()->id],
            ['visto','=',0],
            ['loan_request_id','<>',null]
            ])->count();

        $eamount = Notification::where([
            ['user_id','=',Auth::user()->id],
            ['visto','=',0],
            ['event_id','<>',null]
            ])->count();

        return 
        [ 'loan_notif' => $lamount,
        'event_notif' => $eamount ];
    }

}
