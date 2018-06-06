<?php

namespace App\Http\Controllers;

use \Carbon\Carbon;
use App\Loan;
use App\Book;
use App\Human;
use App\Item; 
use App\Notification;
use App\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function confirmar(Request $request,$id)
    {  
        $libro = Loan::find($id);
        $fecha_solicitud = new Carbon();
        $fecha_solicitud = $fecha_solicitud->toDateString();
        $libro->fecha_expiracion = 
            parent::calcularFechaExpiracion($fecha_solicitud,5);
        $libro->estado='SIN DEVOLVER';
        $libro->save();

        $i = Item::find($libro->item_id);
        $i->estado_item='AUSENTE';
        $i->save();

       parent::saveOperation("Inicio","Prestamos","confirmado el préstamo # $id");

            $this->generateNotifications('Solicitud', $id, $libro->user_id);
        $request->session()->flash('Éxito','Préstamo confirmado.');
         
        return redirect('prestamos');
    }

    public function devolver(Request $request,$id)
    { 
        $libro = Loan::find($id);
        $libro->fecha_devuelto = date("Y-m-d h:i:s");
        $libro->estado='DEVUELTO';
        $libro->observaciones = $request->observaciones;
        $libro->save();

        $i = Item::find($libro->item_id);
        $i->estado_item='DISPONIBLE';
        $i->save();

        $request->session()->flash('Éxito','Préstamo terminado.');
        parent::saveOperation("Inicio","Prestamos","finalizado el préstamo # $id");
         
        return redirect('prestamos');
    }

    public function cancelar(Request $request,$id)
    { 
        $libro = Loan::find($id);
        $libro->estado='CANCELADA';
        $libro->save();

        $request->session()->flash('Éxito','Préstamo cancelado.');
       parent::saveOperation("Inicio","Prestamos","cancelado el préstamo # $id");
         
        return redirect('virtuales');
    }

    public function prestamos_agrupados()
    {
        $user = Auth::user();
        if($user->user_level=='admin')
        $users = User::all();
        else $users = [$user];
         $cuentas=[];
         foreach ($users as $key => $value) 
         { 

              foreach (Loan::where([['estado','=','SIN DEVOLVER'],
            ['user_id','=',$value->id] ]) 
                        ->get() as $key2 => $value2) {
                $fecha = date("Y-m-d",strtotime($value2->created_at));
                  if(!isset($cuentas[$value->id][$fecha]))
                    $cuentas[$value->id][$fecha]=1;
                  else
                    $cuentas[$value->id][$fecha]++;
              }
         }

       
       Notification::where( [
            ['user_id','=',$user->id],
            ['visto','=',0],
            ['loan_request_id','<>',null]
            ] )->update(['visto' => 1]);

            return view('loans.prestamosagrupados')->with(['usuarios'=>$users, 
                'cuentas'=>$cuentas,
                'perspective'=>$user->user_level ]);
    }

    public function prestamos($usr,$fecha)
    {
        $user = Auth::user();
        if($user->user_level!=='admin')
            $usr = $user->id;

         $solicitudes  = Loan::where([['estado','=','SIN DEVOLVER'],
            ['user_id','=',$usr],
            ['created_at','LIKE',"$fecha%"] ]) 
                        ->get();

         $data = $elem = [];
         foreach ($solicitudes as $key => $value) 
         {
             $elem['expirada'] = strtotime( $value->fecha_expiracion) < time() ? true : false; 
             $elem['solicitud'] = $value->toArray();
             $elem['usuario'] = $value->user->human;
             $elem['item'] = $value->item;
             $elem['loan'] = $value;
             $elem['loan']['fecha'] = date("d/m/Y",strtotime( $value->updated_at));
             $elem['loan']['fecha_expiracion'] = date("d/m/Y",strtotime( $value->fecha_expiracion));
             $elem['book'] = $value->item->book;
             $data[]= $elem;
         }
 
            return view('loans.index')->with(['data'=>$data,'perspective'=> $user->user_level]);
    }


    public function devolvidos()
    {
        $user = Auth::user(); 
            $usr = $user->id;

         $solicitudes  = Loan::where([['estado','=','DEVUELTO'],
            ['user_id','=',$usr]]) 
                        ->get();

         $data = $elem = [];
         foreach ($solicitudes as $key => $value) 
         {
             $elem['expirada'] = strtotime( $value->fecha_expiracion) < time() ? true : false; 
             $elem['solicitud'] = $value->toArray();
             $elem['usuario'] = $value->user->human;
             $elem['item'] = $value->item;
             $elem['loan'] = $value;
             $elem['loan']['fecha'] = date("d/m/Y",strtotime( $value->updated_at));
             $elem['loan']['fecha_devuelto'] = date("d/m/Y",strtotime( $value->fecha_devuelto));
             $elem['book'] = $value->item->book;
             $data[]= $elem;
         }
 
            return view('loans.history')->with(['data'=>$data,'perspective'=> $user->user_level]);
    }

    public function noconfirm_agrupados()
    {
        $user = Auth::user();
        if($user->user_level=='admin')
        $users = User::all();
        else $users = [$user];
         $cuentas=[];
         foreach ($users as $key => $value) 
         { 
            $rporno=$user->user_level=='admin' ?
            Loan::where([['estado','=','SIN RETIRAR'],
            ['user_id','=',$value->id] ])
                        ->orWhere([['estado','=','CANCELADA'],
            ['user_id','=',$value->id] ])
                        ->get()
                        :
            Loan::where([['estado','=','SIN RETIRAR'],
            ['user_id','=',$value->id] ]) 
                        ->get();

              foreach ($rporno as $key2 => $value2) {
                $fecha = date("Y-m-d",strtotime($value2->created_at));
                  if(!isset($cuentas[$value->id][$fecha]))
                    $cuentas[$value->id][$fecha]=1;
                  else
                    $cuentas[$value->id][$fecha]++;
              }
         }

       if($user->user_level=='admin')
       Notification::where( [
            ['user_id','=',$user->id],
            ['visto','=',0],
            ['loan_request_id','<>',null]
            ] )->update(['visto' => 1]);

            return view('loans.virtualesagrupados')->with(['usuarios'=>$users, 
                'cuentas'=>$cuentas,
                'perspective'=>$user->user_level ]);
    }

    public function noconfirm($usr,$fecha)
    {
        $user = Auth::user();
        if($user->user_level!=='admin')
            $usr = $user->id;

         $solicitudes  = Loan::where([['estado','=','SIN RETIRAR'],
            ['fecha_expiracion','<', date("Y-m-d") ] ])
                        ->get();
                        foreach ($solicitudes as $key => $value) {
                        $i = Item::find($value->item_id);
                        $i->estado_item='DISPONIBLE';
                        $i->save();
                        }

         $solicitudes  = Loan::where([['estado','=','SIN RETIRAR'],
            ['user_id','=',$usr],
            ['created_at','LIKE',"$fecha%"] ])
                        ->orWhere([['estado','=','CANCELADA'],
            ['user_id','=',$usr],
            ['created_at','LIKE',"$fecha%"] ])
                        ->get();


         $data = $elem = [];
         foreach ($solicitudes as $key => $value) 
         {
             $elem['expirada'] = strtotime( $value->fecha_expiracion) < time() ? true : false;
             $value->fecha_expiracion= date("d/m/Y",strtotime( $value->fecha_expiracion));
             $elem['solicitud'] = $value->toArray();
             $elem['usuario'] = $value->user->human;
             $elem['item'] = $value->item;
             $elem['loan'] = $value;
             $elem['loan']['fecha'] = date("d/m/Y",strtotime( $value->created_at));
             $elem['book'] = $value->item->book;
             $data[]= $elem;
         }

       Notification::where( [
            ['user_id','=',$user->id],
            ['visto','=',0],
            ['loan_request_id','<>',null]
            ] )->update(['visto' => 1]);

            return view('loans.noconfirm')->with(['data'=>$data,'perspective'=> $user->user_level]);
    }

    public function index()
    {
        $user = Auth::user();
        $solicitudes  = Loan::where('estado','SIN DEVOLVER')
                        ->get();
         $data = $elem = [];
         foreach ($solicitudes as $key => $value) 
         {
             $elem['expirada'] = strtotime( $value->fecha_expiracion) < time() ? true : false; 
             $elem['solicitud'] = $value->toArray();
             $elem['usuario'] = $value->user->human;
             $elem['item'] = $value->item;
             $elem['loan'] = $value;
             $elem['loan']['fecha'] = date("d/m/Y",strtotime( $value->updated_at));
             $elem['loan']['fecha_expiracion'] = date("d/m/Y",strtotime( $value->fecha_expiracion));
             $elem['book'] = $value->item->book;
             $data[]= $elem;
         }
 


            return view('loans.index')->with(['data'=>$data,'perspective'=>'admin']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $libro = Book::find($id);
         
        return view('ajax.loanform')->with(
            ['accion'=>'Nuevo Evento',
            'libro'=>$libro,
            'user' => Auth::user()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        if(Auth::guest()) return view('ajax.novalid');
        if(Auth::user()->user_level=='admin' || Auth::user()->user_level=='encargado' || Auth::user()->user_level=='jefe')
            return redirect('prestamos/nuevo/'.$request->book_id);
        $b = new Loan();
        $fecha_solicitud = new Carbon();
        $fecha_solicitud = $fecha_solicitud->toDateString();
        if($request->input('solicitud',null))
        {
 
            if(Loan::where([['estado', '=','SIN RETIRAR'],
                ['user_id', '=',Auth::user()->id]])
                ->orWhere([['estado', '=','SIN DEVOLVER'],
                ['user_id', '=',Auth::user()->id]])
                ->count() >= 3)
            return 400;

            $loans = User::find(Auth::user()->id)->loans->whereIn('estado',['SIN RETIRAR','SIN DEVOLVER']);
            
            foreach ($loans as $loan)
            {
                if($loan->item->book_id == $request->book_id)
                    return 500;
            }

            $b->fecha_expiracion = 
            parent::calcularFechaExpiracion($fecha_solicitud,3);
            $b->user_id =  Auth::user()->id;
            $b->item_id = Item::where(
                [
                    ['book_id','=',$request->book_id], 
                    ['estado_item','=','DISPONIBLE']
                ])->first()
                ->id; 
                $b->estado = 'SIN RETIRAR';
            $b->save();

                $i = Item::find($b->item_id);
                $i->estado_item='SOLICITADO';
                $i->save();

                $libro = Book::find($request->book_id);
                $expiracion = date("d/m/Y", strtotime($b->fecha_expiracion));

                parent::generateNotifications('Solicitud', $b->id);

        }
                parent::saveOperation("Inicio","Prestamos","almacenado el préstamo # ".$b->id);

        
        return  view('ajax.success')->with(['libro'=>$libro->titulo,'fecha'=>$expiracion]);
    }

    public function store2(Request $request)
    {  
        $b = new Loan();
        $fecha_solicitud = new Carbon();
        $fecha_solicitud = $fecha_solicitud->toDateString();
        
 
            if(Loan::where([['estado', '=','SIN RETIRAR'],
                ['user_id', '=',Auth::user()->id]])
                ->orWhere([['estado', '=','SIN DEVOLVER'],
                ['user_id', '=',Auth::user()->id]])
                ->count() > 5)
            {
                $request->session()->flash('error','El usuario ya alcanzó los 5 préstamos pendientes.');
                return redirect('prestamos');
            }

            $loans = User::find(Auth::user()->id)->loans->whereIn('estado',['SIN RETIRAR','SIN DEVOLVER']);
            
            foreach ($loans as $loan)
            {
                if($loan->item->book_id == $request->book_id)
                {
                    $request->session()->flash('error','El usuario ya ha solicitado  o posee un ejemplar.');
                    return redirect('prestamos');
                }
            }

            $b->fecha_expiracion = 
            parent::calcularFechaExpiracion($fecha_solicitud,5);
            $b->user_id =  Human::find($request->user_id)->user->id;
            $b->item_id = Item::where(
                [
                    ['book_id','=',$request->book_id], 
                    ['estado_item','=','DISPONIBLE']
                ])->first()
                ->id; 
                $b->estado = 'SIN DEVOLVER';
            $b->save();

                $i = Item::find($b->item_id);
                $i->estado_item='AUSENTE';
                $i->save();

                $libro = Book::find($request->book_id);
                $expiracion = date("d/m/Y", strtotime($b->fecha_expiracion));
 

        $request->session()->flash('Éxito',"Préstamo concedido. Antes de la fecha $expiracion el usuario debe devolver el libro en horario de oficina.");
                parent::saveOperation("Inicio","Prestamos","almacenado el préstamo # ".$b->id);
        return redirect('prestamos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $b = Loan::find($id);
                $i = Item::find($b->item_id);
                $i->estado_item='DISPONIBLE';
                $i->save();

        Loan::destroy($id);

        $request->session()->flash('Éxito','Préstamo descartado.');
                parent::saveOperation("Inicio","Prestamos","descartado el préstamo # $id");
         
        return redirect('virtuales');    }
}
