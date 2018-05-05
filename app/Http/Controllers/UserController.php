<?php

namespace App\Http\Controllers;

use App\User;
use App\Privilegio;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('users.indaex')->with('users',User::all());
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
    'Libros'=>['Mis Solicitudes'=>'','Mis Préstamos'=>'','Histórico de Préstamos'=>''], 
    'Actividades'=> '', 
        ];
        $u = new User();
        $u->name = $request->nombres;
        $u->email = $request->email;
        $u->user_level = 'estudiante';
        $u->human_id = $request->human_id;
        $u->password = Hash::make($request->contrasena);
        $u->save();
        foreach($porDefectos as $modulo => $subPrivilegios)
        {
            if(is_string($subPrivilegios))
            {
                $p = new Privilege();
                $p->user_id = $u->id;
                $p->modulo = $modulo;
                $p->accion = null;
                $p->url = $subPrivilegios;
                $p->save();
            }
            else 
            {
                foreach ($subPrivilegios as $nombreSubprivilegio => $url) {
                    $p = new Privilege();
                    $p->user_id = $u->id;
                    $p->modulo = $modulo;
                    $p->accion = $nombreSubprivilegio;
                    $p->url = $url;
                    $p->save();
                }
            }
        }
       parent::saveOperation("Inicio","Prestamos","registrado al usuario ".$request->nombres." (".$request->email.")");
        $request->session()->flash('exito','Usuario registrado.');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $r, $id)
    {
        $usuario = User::find($id);
        return view('users.edit')
        ->with('listado',[
        'Registro'=>['Agregar'=>'','Modificar'=>'','Eliminar'=>'','Agregar Ejemplar'=>''],
        'Libros'=>['Mis Solicitudes'=>'','Mis Préstamos'=>'','Histórico de Préstamos'=>''],
        'Prestamos'=>['Solicitud'=>'','Devoluciones'=>''],
        'Eventos'=>['Propuestas'=>'','Pendientes'=>''],
        'Actividades'=> '',
        'Consultas'=>['Individuales'=>'','Solventes y Morosos'=>'','Estadisticas'=>''],
        'Mantenimiento'=>['Usuarios'=>'','Respaldo'=>'','Restauracion'=>'','Bitacora'=>'']
        ])->with('usuario',$usuario);
    }

    public function fetchQuestion(Request $r )
    {
        $usuario = User::where('email',$r->input('email'))->get();
        if(count($usuario) === 0)
        { 
            $r->session()->flash('error',1);
            return redirect('recuperacion');
        }
        return view('users.recuperacion')
        ->with('usuario',$usuario);
    }


    public function reset(Request $r )
    {
        $usuario = User::find($r->input('id'));
        $usuario->password = Hash::make($r->password);
        $usuario->save();
        $r->session()->flash('canvio',1);
        return view('welcome')
        ->with('usuario',$usuario); 
    }

    public function ask4Pass(Request $r )
    {
        $usuario = User::find($r->input('id'));
        if(count($usuario) == 0)
        { 
            $r->session()->flash('error',1);
            return redirect('recuperacion');
        } 
        $rece = md5($r->password); 
        if($rece==$usuario->answer)
        {
            $dani = substr(md5(date("d-m-Y h:i:s")),0,8);
            $usuario->password = Hash::make($dani);
            $usuario->save();
           
            $url = 'https://api.sendgrid.com/v3/mail/send';
            $data = [
                    "personalizations" => [
                        
                          "to" => [
                              ["email" => $usuario->email]
                          ],
                          "subject" => "Recuperacion de Clave"
                        
                      ],
                      "from" => [
                        ["email" => "bivlu@upta.edu.ve"]
                      ],
                      "content" => [
                        
                          "type" => "text/plain",
                          "value" => "Su nueva clave es ".$dani
                        
                      ]
            ];
            $apikey = '';
            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/json\r\n".
                                    "Authorization: Bearer $apikey\r\n",
                    'method'  => 'POST',
                    'content' => "{
  \"personalizations\": [
    {
      \"to\": [
        {
          \"email\": \"{$usuario->email}\"
        }
      ],
      \"subject\": \"Recuperacion de clave\"
    }
  ],
  \"from\": {
    \"email\": \"bivlu@upta.edu.ve\"
  },
  \"content\": [
    {
      \"type\": \"text/plain\",
      \"value\": \"Su nueva clave es: $dani\"
    }
  ]
}"
                )
            );
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            if ($result === FALSE) { 
                die("Error Inesperado ha ocurrido. Contacte con el administrador de la web.");
            } 
            
            return view('users.nuevaclave')
            ->with('usuario',$usuario); 
        } 
            $r->session()->flash('error2',1);
            return redirect('recuperacion');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        Privilegio::where('user_id',$id)->delete();

        $privile=[
        'Registro'=>['Agregar'=>'','Modificar'=>'','Eliminar'=>'','Agregar Ejemplar'=>''],
        'Libros'=>['Mis Solicitudes'=>url('virtuales'),'Mis Préstamos'=>url('prestamos'),'Histórico de Préstamos'=>url('historial')],
        'Prestamos'=>['Solicitud'=>url('virtuales'),'Devoluciones'=>url('prestamos')],
        'Eventos'=>['Propuestas'=>url('reservaciones'),'Pendientes'=>url('eventos')],
        'Actividades'=> url('actividades'),
        'Consultas'=>['Individuales'=>url('consultas'),'Solventes y Morosos'=>url('reportes'),'Estadisticas'=>url('estadisticas')],
        'Mantenimiento'=>['Usuarios'=>url('usuarios'),'Respaldo'=>url('respaldo'),'Restauracion'=>url('restauracion'),'Bitacora'=>url('bitacora')]
        ];
        foreach($privile as $modulo => $subPrivilegios)
        {
            if(is_string($subPrivilegios) && $request->input("privilegio_$modulo",false)!==false)
            {
                $p = new Privilegio();
                $p->user_id =  $id;
                $p->modulo = $modulo;
                $p->accion = null;
                $p->url_privilegio = $subPrivilegios;
                $p->save();
            }
            else if(is_array($subPrivilegios))
            { 
                foreach ($subPrivilegios as $nombreSubprivilegio => $url) {
                    $priviqueen = str_replace(' ','_',"privilegio_$modulo"."_".$nombreSubprivilegio);
                    if($request->input($priviqueen,false)!==false)
                    {
                    $p = new Privilegio();
                    $p->user_id = $request->input("user_id",false);
                    $p->modulo = $modulo;
                    $p->accion = $nombreSubprivilegio;
                    $p->url_privilegio = $url;
                    $p->save();
                    }
                }
            }
        }
       parent::saveOperation("Inicio","Usuarios","modificado privilegios del usuario # $id");
        return redirect('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Sends users comments.
     *
     * @return \Illuminate\Http\Response
     */
     public function suggestions(Request $r){
        $usuario = User::find($r->input('id'));
        if(count($usuario) == 0)
        { 
            $r->session()->flash('error',1);
            return redirect('recuperacion');
        } 
        $rece = md5($r->password); 
        if($rece==$usuario->answer)
        {
            $dani = substr(md5(date("d-m-Y h:i:s")),0,8);
            $usuario->password = Hash::make($dani);
            $usuario->save();
            $app_email = "bivlu.upta@gmail.com";
           
            $url = 'https://api.sendgrid.com/v3/mail/send';
            $data = [
                    "personalizations" => [
                        
                          "to" => [
                              ["email" => $app_email]
                          ],
                          "subject" => "Recuperacion de Clave"
                        
                      ],
                      "from" => [
                        ["email" => $r->email]
                      ],
                      "content" => [
                        
                          "type" => "text/plain",
                          "value" => "Su nueva clave es ".$dani
                        
                      ]
            ];
           $apikey = '';
            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/json\r\n".
                                    "Authorization: Bearer $apikey\r\n",
                    'method'  => 'POST',
                    'content' => "{
  \"personalizations\": [
    {
      \"to\": [
        {
          \"email\": \"{$usuario->email}\"
        }
      ],
      \"subject\": \"Recuperacion de clave\"
    }
  ],
  \"from\": {
    \"email\": \"bivlu@upta.edu.ve\"
  },
  \"content\": [
    {
      \"type\": \"text/plain\",
      \"value\": \"Su nueva clave es: $dani\"
    }
  ]
}"
                )
            );
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            if ($result === FALSE) { 
                die("Error Inesperado ha ocurrido. Contacte con la rectora.");
            } 
            
            return view('users.nuevaclave')
            ->with('usuario',$usuario); 
        } 
            $r->session()->flash('error2',1);
            return redirect('recuperacion');
    }
}

