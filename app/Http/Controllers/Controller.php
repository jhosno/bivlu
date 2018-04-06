<?php

namespace App\Http\Controllers;

use App\Notification;
use App\User;
use App\Interno;
use \Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected  $pociblesPrivilegios = [
    'Registro'=>['Agregar','Modificar','Eliminar','Agregar Ejemplar'],
    'Libros'=>['Mis Solicitudes'=>'','Mis Préstamos'=>'','Histórico de Préstamos'=>''],
    'Prestamos'=>['Solicitud'=>'','Devoluciones'=>''],
    'Eventos'=>['Propuestas'=>'','Pendientes'=>''],
    'Actividades'=> '',
    'Consultas'=>['Individuales'=>'','Solventes y Morosos'=>'','Estadisticas'=>''],
    'Mantenimiento'=>['Usuarios'=>'','Respaldo'=>'','Restauracion'=>'','Bitacora'=>'']
    ];
    
    protected function calcularFechaExpiracion($fecha_peticion,$plazo)
    {
        $dias_habiles_pasados = 0;

        for ($fecha = Carbon::parse($fecha_peticion) ; 
                $dias_habiles_pasados < $plazo; 
                $fecha->addDays(1)) 
        {
            if($fecha->isWeekEnd()) continue;
            $dias_habiles_pasados++;
        }
        return $fecha->format("Y-m-d");
    }

    protected function generateNotifications($kind,$id,$usrs=null)
    {
        if($usrs==null)
        $usrs = User::where('user_level','admin')->get()->toArray();
    else $usrs = [['id'=>$usrs]];
        foreach ($usrs as $key => $value) {
            $notif = new Notification;
            if($kind=='Evento')
                $notif->event_id = $id;
            elseif($kind=='Solicitud')
                $notif->loan_request_id = $id; 
            $notif->visto = false;
            $notif->user_id = $value['id'];
            $notif->save();
        }
    }

    protected function tienePrivilegio($modulo,$accion)
    {
        if(Auth::user()->user_level==='ADMIN') return true;
    }

    protected function saveOperation($module,$kind,$details)
    {
        $interno = new Interno();
        $interno->user_id = Auth::user()->id;
        $interno->modulo = $module;
        $interno->tipo = $kind;
        $interno->detalles = "El usuario ".Auth::user()->human->nombres." ".Auth::user()->human->apellidos." ha $details";
        $interno->save();
    }
}
