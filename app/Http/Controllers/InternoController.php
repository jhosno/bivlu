<?php
namespace App\Http\Controllers;
use App\Interno;
use App\Author;
use App\Query;
use App\Event;
use App\Book;
use App\Loan;
use App\Speciality;
use App\Human;
use \Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class InternoController extends Controller
{
    public function auditoria(Request $request)
    {
        $users = User::all();
        $tipo = $request->input("tipo",false) ? $request->input("tipo") : ""; 
        $user_id = $request->input("user_id",false) ? $request->input("user_id") : "";
        $f1i = $request->input("fi",false)? $request->input("fi") : '';
        $f1f = $request->input("ff",false)? $request->input("ff") : '';
        $fi = $request->input("fi",false) ? Carbon::createFromFormat('m/d/Y h:i A',$request->input("fi"))->format('Y-m-d') : ""; 
        $ff = $request->input("ff",false) ? Carbon::createFromFormat('m/d/Y h:i A',$request->input("ff"))->format('Y-m-d') : ""; 
        
        $condiciones = [];
        if($tipo!=="") 
            $condiciones[] = ['tipo','=',$tipo]; 
        if($user_id!=="") 
            $condiciones[] = ['user_id','=',$user_id];
        if($fi!=="") 
            $condiciones[] = ['created_at','>=',"$fi 00:00:00"];
        if($ff!=="") 
            $condiciones[] = ['created_at','<=',"$ff 23:59:00"];
        $resultados = Interno::where($condiciones)->get();
        return view('interno.auditoria') 
        ->with(['data'=>$resultados,'usuarios'=>$users,'user_id'=>$user_id,'tipo'=>$tipo,'fi'=>$f1i,'ff'=>$f1f]);
    }
    public function respaldo()
    {
        return view('interno.respaldo');
    }
    public function getFiltros($id)
    {
        $pnfs = Speciality::all();
        return view('interno.filtros.'.strtolower($id))->with('pnfs',$pnfs);
    }
    public function estadisticas(Request $request)
    {
       return view('interno.estadisticas')
       ->with([ 'tipo'=>'','fi'=>'','ff'=>'']);
   }
   
   private function colorrandom()
   {
    $letrasXXX = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'];
    $cadenaPorno='#';
    for ($i=0; $i < 6; $i++) { 
        $cadenaPorno.= $letrasXXX[rand(0,15)];
    }
    return $cadenaPorno;
}
public function pnfs(Request $request)
{  
    $cuentasHot2=$cuentasHot=[];
    $rs = $coloresporno= '';
    switch ($request->input('tipo_consulta')) 
    {
        case "1": $results = \DB::select( \DB::raw("select * from books where deleted_at IS NULL AND id=ANY(select book_id from items where id=ANY(select item_id from loans group by item_id order by count(*) desc) and speciality_id=".$request->input('pnf',1)." group by book_id)"));
        $arrelo = [];
        foreach ($results as $key => $value) {
            $results2 = \DB::select( \DB::raw("select count(*) cuenta from loans where item_id=ANY(select id from items where book_id=".$value->id.")"));
            $cta = $results2[0]->cuenta;
            $arreglo[] = ['objeto'=>$value,'cuenta'=>$cta];
        } 
        if($request->input('mostrar_tablas','')==='on')
        {
            $rs .=  "<table class=\"table\">
            <thead>
            <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>A&ntilde;o</th>
            <th>Páginas</th>
            <th>Veces que ha sido prestado en el PNF</th>
            <th>Veces que ha sido prestado (%)</th>
            </tr>
            </thead>
            <tbody>";
            $totalporno=0;
            foreach ($arreglo as $key => $value)  $totalporno+=$value['cuenta'];
            foreach ($arreglo as $key => $value) 
            {
                $rs .= "<tr>
                <td>".$value['objeto']->titulo."</td>
                <td>";
                foreach(Book::find($value['objeto']->id)->authors as $v) $rs.= $v->nombre.'<br/>';
                $rs .=  "</td>
                <td>".$value['objeto']->anio_edicion."</td>
                <td>".$value['objeto']->numero_paginas."</td>
                <td>".$value['cuenta']."</td>
                <td>".sprintf("%.2f",($value['cuenta']/$totalporno) * 100)."</td>
                </tr>";
                
            }
            $rs .=  "</tbody>
            </table>";
        }
        if($request->input('mostrar_grafico','')==='on')
        {
            $rs .=  '<script>$(function(){new Chart(document.getElementById("donut"),{"type":"doughnut","data":{"labels":[';
            foreach ($arreglo as $key => $value){
                $coloresporno.='\''.($this->colorrandom()).'\',';
                $rs .=  "'".$value['objeto']->titulo."',";
            }
            $rs .=  '],"datasets":[{"label":"Solvencia","data":[';
            foreach ($arreglo as $key => $value) $rs .=  sprintf("%.2f",($value['cuenta']/$totalporno) * 100).",";
            $rs .=  '],"backgroundColor":['.$coloresporno.']}]}});});</script>';
        }
        break;
        case "2": $results = \DB::select( \DB::raw("select * from books where deleted_at IS NULL AND clasificacion=3  and speciality_id=".$request->input('pnf',1)." order by veces desc LIMIT ".$request->input('cantidad_resultados',5)));
        
        if($request->input('mostrar_tablas','')==='on')
        {
            $rs .=  "<table class=\"table\">
            <thead>
            <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>A&ntilde;o</th>
            <th>Páginas</th>
            <th>Veces que ha sido prestado en el PNF</th>
            <th>Veces que ha sido prestado (%)</th>
            </tr>
            </thead>
            <tbody>";
            $totalporno=0;
            foreach ($results as $key => $value)  $totalporno+=$value->veces;
            foreach ($results as $key => $value) 
            {
                $rs .= "<tr>
                <td>".$value->titulo."</td>
                <td>";
                foreach(Book::find($value->id)->authors as $v) $rs.= $v->nombre.'<br/>';
                $rs .=  "</td>
                <td>".$value->anio_edicion."</td>
                <td>".$value->numero_paginas."</td>
                <td>".$value->veces."</td>
                <td>".sprintf("%.2f",($value->veces/$totalporno) * 100)."</td>
                </tr>";
                
            }
            $rs .=  "</tbody>
            </table>";
        }
        if($request->input('mostrar_grafico','')==='on')
        {
            $rs .=  '<script>$(function(){new Chart(document.getElementById("donut"),{"type":"doughnut","data":{"labels":[';
            foreach ($results as $key => $value){
                $coloresporno.='\''.($this->colorrandom()).'\',';
                $rs .=  "'".substr($value->titulo,0,20)."',";
            }
            $rs .=  '],"datasets":[{"label":"Solvencia","data":[';
            foreach ($results as $key => $value) $rs .=  sprintf("%.2f",($value->veces/$totalporno) * 100).",";
            $rs .=  '],"backgroundColor":['.$coloresporno.']}]}});});</script>';
        }
        break;
        
        case '3':
        $results = \DB::select( \DB::raw("select * from authors where id=ANY(select author_id from author_book WHERE book_id=ANY(select id from books where deleted_at IS NULL AND id=ANY(select book_id from items where id=ANY(select item_id from loans group by item_id order by count(*) desc) and speciality_id=".$request->input('pnf',1)." group by book_id))) limit ".$request->input('cantidad_resultados','5')));
        
        if($request->input('mostrar_tablas','')==='on')
        {
            $rs .=  "<table class=\"table\">
            <thead>
            <tr>
            <th>Nombre</th>
            <th>Veces</th>
            </tr>
            </thead>
            <tbody>";
            $totalporno=0;
            $dataAutores=[];
            foreach ($results as $key => $value)
            {
                $beses_autor =0;
                foreach (Author::find($value->id)->books as $value2) {
                    $veces = \DB::select( \DB::raw("select count(*) cuentaporno from loans where item_id=ANY(select id from items where book_id={$value2->id})"));
                    $beses_autor += $veces[0]->cuentaporno;
                }
                $totalporno +=  $beses_autor;
                $dataAutores []= ['nombre'=> $value->nombre,'veces' => $beses_autor];
            }
            foreach ($dataAutores as $key => $value) 
            {
                $rs .= "<tr>
                <td>".$value['nombre']."</td>
                <td>".$value['veces']."</td>
                </tr>";
                
            }
            $rs .=  "</tbody>
            </table>";
        }
        if($request->input('mostrar_grafico','')==='on')
        {
            $rs .=  '<script>$(function(){new Chart(document.getElementById("donut"),{"type":"doughnut","data":{"labels":[';
            foreach ($dataAutores as $key => $value){
                $coloresporno.='\''.($this->colorrandom()).'\',';
                $rs .=  "'".substr($value['nombre'],0,20)."',";
            }
            $rs .=  '],"datasets":[{"label":"Solvencia","data":[';
            foreach ($dataAutores as $key => $value) $rs .=  sprintf("%.2f",($value['veces']/$totalporno) * 100).",";
            $rs .=  '],"backgroundColor":['.$coloresporno.']}]}});});</script>';
        }
        break;
        default: die('Error');
        break;
    }
    $cadenas = [null,'Los libros más consultados','Los proyectos más consultados','Los autores más consultados'];
    $parameters="<b>PNF:</b>".Speciality::find($request->input('pnf',1))->especialidad ."<br/><b>Tipo de Consultas:</b>".$cadenas[$request->input('tipo_consulta',1)]."<br/><b>Ordenar resultados:</b>".$request->input('ordenar',5)."<br/>";
    $request->input('ordenar')==='Ascendentemente'?
    asort($cuentasHot2)
    : arsort($cuentasHot2);
    
    
    return view('interno.resultados')
    ->with('resultados',$rs)
    ->with('parameters',$parameters);
}

public function libros(Request $request)
{  
    $cuentasHot2=$cuentasHot=[];
    $sql_base = "select * from books ";
    $parameters ='<h4>Filtros de búsquedas:</h4> <br/>';
    $lleva_algo_mas_que_huevos = (($titulo = $request->input('titulo',false)) 
        && !empty(trim($titulo)))
    ||  (($paginas_exactamente = $request->input('paginas_exactamente',false)) 
        && !empty(trim($paginas_exactamente)))
    ||  (($paginas_desde = $request->input('paginas_desde',false)) 
        && !empty(trim($paginas_desde)))
    ||  (($paginas_hasta = $request->input('paginas_hasta',false)) 
        && !empty(trim($paginas_hasta)))
    
    ||  (($incorporacion_exactamente = $request->input('incorporacion_exactamente',false)) 
        && !empty(trim($incorporacion_exactamente)))
    ||  (($incorporacion_desde = $request->input('incorporacion_desde',false)) 
        && !empty(trim($incorporacion_desde)))
    ||  (($incorporacion_hasta = $request->input('incorporacion_hasta',false)) 
        && !empty(trim($incorporacion_hasta)))
    ||  (($anio_exactamente = $request->input('anio_exactamente',false)) 
        && !empty(trim($anio_exactamente)))
    ||  (($anio_desde = $request->input('anio_desde',false)) 
        && !empty(trim($anio_desde)))
    ||  (($anio_hasta = $request->input('anio_hasta',false)) 
        && !empty(trim($anio_hasta)))
    || (($resumen = $request->input('resumen',false)) 
        && !empty(trim($resumen)));
    $sql_base .='WHERE deleted_at IS NULL AND';
    if(($titulo = $request->input('titulo',false)) 
        && !empty(trim($titulo)))
    {
        $sql_base.=" titulo LIKE '%$titulo%' AND";
        $parameters.="<b>Título COMO: </b>$titulo<br/>";
    }
    if(($resumen = $request->input('resumen',false)) 
        && !empty(trim($resumen)))
    {
        $sql_base.=" resumen LIKE '%$resumen%' AND";
        $parameters.="<b>Resumen CON: </b>$resumen<br/>";
    }
    if(($numero_paginas = $request->input('numero_paginas',false)) 
       && $numero_paginas==='Exactamente:' && 
       ($paginas_exactamente = $request->input('paginas_exactamente',false)) 
       && !empty(trim($paginas_exactamente)) )
    {
        $sql_base.= " numero_paginas = '$paginas_exactamente' AND";
        $parameters.="<b>Número de Página = </b>$paginas_exactamente<br/>";
    }
    if(($numero_paginas = $request->input('numero_paginas',false)) 
       && $numero_paginas==='Definido por intervalo')
    {
        if(($paginas_desde = $request->input('paginas_desde',false)) 
            && !empty(trim($paginas_desde)))
        {
            $sql_base.= " numero_paginas >= '$paginas_desde' AND";
            $parameters.="<b>Al menos </b>$paginas_desde páginas<br/>";
        }
        if(($paginas_hasta = $request->input('paginas_hasta',false)) 
            && !empty(trim($paginas_hasta)))
        {
            $sql_base.= " numero_paginas <= '$paginas_hasta' AND";
            $parameters.="<b>Hasta </b>$paginas_hasta páginas<br/>";
        }
    }
    if(($anio_edicion = $request->input('anio',false)) 
       && $anio_edicion==='Exactamente:' && 
       ($anio_exactamente = $request->input('anio_exactamente',false)) 
       && !empty(trim($anio_exactamente)) )
    {
        $sql_base.= " anio_edicion = '$anio_exactamente' AND";
        $parameters.="<b>Editado en el año </b>$anio_exactamente<br/>";
    }
    if(($anio_edicion = $request->input('anio',false)) 
       && $anio_edicion==='Definido por intervalo')
    {
        if(($anio_desde = $request->input('anio_desde',false)) 
            && !empty(trim($anio_desde)))
        {
            $sql_base.= " anio_edicion >= '$anio_desde' AND";
            $parameters.="<b>Editado desde el año </b>$anio_desde<br/>";
        }
        if(($anio_hasta = $request->input('anio_hasta',false)) 
            && !empty(trim($anio_hasta)))
        {
            $sql_base.= " anio_edicion <= '$anio_hasta' AND";
            $parameters.="<b>Editado hasta en el año </b>$anio_hasta<br/>";
        }
    }
    
    if(($incorporacion = $request->input('incorporacion',false)) 
       && $incorporacion==='Exactamente:' && 
       ($incorporacion_exactamente = $request->input('incorporacion_exactamente',false)) 
       && !empty(trim($incorporacion_exactamente)) )
    {
        $sql_base.= " YEAR(fecha_incorporacion) = '$incorporacion_exactamente' AND";
        $parameters.="<b>Fecha de Incorporación = </b>$incorporacion_exactamente<br/>";
    }
    if(($numero_paginas = $request->input('numero_paginas',false)) 
       && $numero_paginas==='Definido por intervalo')
    {
        if(($incorporacion_desde = $request->input('incorporacion_desde',false)) 
            && !empty(trim($incorporacion_desde)))
        {
            $sql_base.= " YEAR(fecha_incorporacion) >= '$incorporacion_desde' AND";
            $parameters.="<b>Incorporado desde </b>$incorporacion_desde páginas<br/>";
        }
        if(($incorporacion_hasta = $request->input('incorporacion_hasta',false)) 
            && !empty(trim($incorporacion_hasta)))
        {
            $sql_base.= " YEAR(fecha_incorporacion) <= '$incorporacion_hasta' AND";
            $parameters.="<b>Incorporado hasta </b>$incorporacion_hasta páginas<br/>";
        }
    }
    $sql_base = substr($sql_base, 0,strlen($sql_base)-4);
    $sql_base .= ' LIMIT '.$request->input('cantidad_resultados',5);
    $parameters.="<b>Hasta ".$request->input('cantidad_resultados',5)." resultados</b><br/>";
    $results = \DB::select( \DB::raw($sql_base) );
    if(count($results)===0)
        die('Error: Sin resultados');
    $coloresporno='';
    foreach ($results as $key => $value) {
        $coloresporno.='\''.($this->colorrandom()).'\',';
        $results_loans = \DB::select( \DB::raw("select count(*) as cuenta from loans where item_id=ANY(select id from items where book_id={$value->id})") );
        $cuentasHot[$value->id] = ['cuenta'=>$results_loans[0]->cuenta,
        'objeto'=>$value];
        $cuentasHot2[$value->id] = $results_loans[0]->cuenta;                     
    } 
    $parameters.="<b>Ordenar resultados:</b>".$request->input('ordenar',5)."<br/>";
    $request->input('ordenar')==='Ascendentemente'?
    asort($cuentasHot2)
    : arsort($cuentasHot2);
    $rs = '';
    if($request->input('mostrar_tablas','')==='on')
    {
        $rs .=  "<table class=\"table\">
        <thead>
        <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>A&ntilde;o</th>
        <th>Páginas</th>
        <th>Veces que ha sido prestado</th>
        <th>Veces que ha sido prestado (%)</th>
        </tr>
        </thead>
        <tbody>";
        $totalporno=0;
        foreach ($cuentasHot2 as $key => $value)  $totalporno+=$cuentasHot[$key]['cuenta'];
        foreach ($cuentasHot2 as $key => $value) {
            $rs .= "<tr>
            <td>".$cuentasHot[$key]['objeto']->titulo."</td>
            <td>";  
            $aa =  Book::find($key)->authors;
            if($aa)
                foreach($aa as $v)
                    {       $rs.= $v->nombre.'<br/>';  }
                $rs .=  "</td>
                <td>".$cuentasHot[$key]['objeto']->anio_edicion."</td>
                <td>".$cuentasHot[$key]['objeto']->numero_paginas."</td>
                <td>".$cuentasHot[$key]['cuenta']."</td>
                <td>".sprintf("%.2f",($totalporno ? $cuentasHot[$key]['cuenta']/$totalporno : 0) * 100)."</td>
                </tr>";
                
            }
            $rs .=  "</tbody>
            </table>";
        }
        if($request->input('mostrar_grafico','')==='on')
        {
            $rs .=  '<script>$(function(){new Chart(document.getElementById("donut"),{"type":"doughnut","data":{"labels":[';
            foreach ($cuentasHot2 as $key => $value) $rs .=  "'".$cuentasHot[$key]['objeto']->titulo."',";
            $rs .=  '],"datasets":[{"label":"Solvencia","data":[';
            foreach ($cuentasHot2 as $key => $value) $rs .=  sprintf("%.2f",($cuentasHot[$key]['cuenta']/$totalporno) * 100).",";
            $rs .=  '],"backgroundColor":['.$coloresporno.']}]}});});</script>';
        }
        
        return view('interno.resultados')
        ->with('resultados',$rs)
        ->with('parameters',$parameters);
    }
    public function lectores(Request $request)
    {
        $cuentasHot2=$cuentasHot=[];
        $rs = $coloresporno= '';
        
        $sql_base = "select *, students.id as id_estudiante from humans inner join students on students.human_id=humans.id ";
        $parameters ='<h4>Filtros de búsquedas:</h4> <br/>';
        $lleva_algo_mas_que_huevos = (($cedula = $request->input('cedula',false)) 
            && !empty(trim($cedula)))
        || (($pnf = $request->input('pnf',false)) 
            && !empty(trim($pnf)))
        || (($nombre = $request->input('nombre',false)) 
            && !empty(trim($nombre)));
        if($lleva_algo_mas_que_huevos) $sql_base .='WHERE';
        if(($cedula = $request->input('cedula',false)) 
            && !empty(trim($cedula)))
        {
            $sql_base.=" cedula = '$cedula' AND";
            $parameters.="<b>Cédula = </b>$cedula<br/>";
        }
        if(($pnf = $request->input('pnf',false)) 
            && !empty(trim($pnf)))
        {
            $sql_base.=" speciality_id = '$pnf' AND";
            $parameters.="<b>Especialidad = </b>".Speciality::find($request->input('pnf',1))->especialidad ."<br/>";
        }
        if(($nombre = $request->input('nombre',false)) 
            && !empty(trim($nombre)))
        {
            $sql_base.="nombres LIKE '%$nombre%' AND apellidos LIKE '%$nombre%' AND";
            $parameters.="<b>Se llama(n) </b>$nombre<br/>";
        }
        if($lleva_algo_mas_que_huevos) $sql_base = substr($sql_base, 0,strlen($sql_base)-4);
        $sql_base .= 'LIMIT '.$request->input('cantidad_resultados',5);
        $parameters .= "<b>Hasta ".$request->input('cantidad_resultados',5)." resultados</b><br/>";
        $results = \DB::select( \DB::raw($sql_base) );
        
        $rs =  "<table class=\"table\">
        <thead>
        <tr>
        <th>Cédula</th>
        <th>Nombre</th>
        <th>PNF</th>";
        if($request->input('tipo_consulta',false)=='1') 
            $rs .= "<th>Libros más Consultados</th>";
        if($request->input('tipo_consulta',false)=='2') 
            $rs .= "<th>Autores más Consultados</th>";
        $rs .= "</tr>
        </thead>
        <tbody>";
        foreach ($results as $key => $value) 
        {
            $rs .= "<tr>
            <td>".$value->cedula."</td>
            <td>".$value->nombres.' '.$value->apellidos."</td>
            <td>".Speciality::find($value->speciality_id)->especialidad."</td>";
            if($request->input('tipo_consulta',false)=='1')
            {
                $libros_favoritos = \DB::select( \DB::raw("select * from books where id=ANY(select book_id from items where id=ANY(select item_id from loans 
                    inner join users on loans.user_id=users.id
                    inner join humans on humans.id=users.human_id
                    inner join students on students.human_id=humans.id
                    where students.id=".$value->id_estudiante." group by item_id order by count(*) desc) and speciality_id=".$request->input('pnf',1)." group by book_id)"));
                $cadena_libros = '';
                foreach ($libros_favoritos as $key => $libro_favorito) {
                    $cadena_libros .= $libro_favorito->titulo.",";
                }
                $rs .= "<td>$cadena_libros</td>";
            }
            if($request->input('tipo_consulta',false)=='2')
            {
                
                $autores_favoritos = \DB::select( \DB::raw("select * from authors where id=ANY(select author_id from author_book WHERE book_id=ANY(select id from books where id=ANY(select book_id from items where id=ANY(select item_id from loans group by item_id order by count(*) desc) and speciality_id=".$request->input('pnf',1)." group by book_id))) limit ".$request->input('cantidad_resultados','5')));
                $cadena_libros = '';
                foreach ($autores_favoritos as $key => $autor_favorito) {
                    $cadena_libros .= $autor_favorito->nombre."<br/>";
                }
                $rs.= "<td>$cadena_libros</td>";
            }
            $rs .= "</tr>";
            
        }
        $rs .=  "</tbody>
        </table>";
        
        return view('interno.resultados')
        ->with('resultados',$rs)
        ->with('parameters',$parameters);
    } 
    public function eventos(Request $request)
    { 
        $fi = $request->input("fi",false) ? date("Y-m-d 00:00:00",strtotime($request->fi)) : ""; 
        $ff = $request->input("ff",false) ? date("Y-m-d 00:00:00",strtotime($request->ff)) : "";
        
        $amount = Event::whereBetween("fecha_inicio",[$fi,$ff])
        ->where([['confirmado','=',true],['user_id','<>',null]]) 
        ->count(); 
        $claves['Interno'] = $amount;
        $amount_former = $amount;
        $amount = Event::whereBetween("fecha_inicio",[$fi,$ff])
        ->where([['confirmado','=',true],['user_id','=',null]]) 
        ->count(); 
        $claves['De terceros'] = $amount;
        $total = $amount + $amount_former;
        
        
        $rs = "<h1>Estadisticas de Consulta de Eventos</h2><h3>Parámetros de Búsqueda</h3><label>Desde:</label>".date("d/m/Y",strtotime($request->input("fi",false)))."<br/><label>Hasta:</label>".date("d/m/Y",strtotime($request->input("ff",false)))."<br/><table class=\"table\"><thead><tr><th>Periodo</th><th>Cantidad</th><th>Cantidad (%)</th></tr></thead><tbody>";
        $coloresporno='';
        foreach ($claves as $key => $value) {
            $rs .= "<tr><td>$key</td><td>$value</td><td>".($value/$total * 100)." % </td></tr>";
            $coloresporno.='\''.($this->colorrandom()).'\',';
        }
        $rs .= "</tbody></table>";
        
        $rs .= '<script>$(function(){new Chart(document.getElementById("donut"),{"type":"doughnut","data":{"labels":[';
        foreach($claves as $k => $v) $rs .= "'$k',";
        $rs .= '],"datasets":[{"label":"Solvencia","data":[';
        foreach($claves as $k => $v) $rs .= ($v/$total*100).",";
        $rs .=    '],"backgroundColor":['.$coloresporno.']}]}});});</script>';
        return view('interno.resultados')
        ->with('resultados',$rs)
        ->with('parameters',''); 
    }
    public function autores(Request $request)
    {   
        $cuentasHot2=$cuentasHot=[];
        $rs = $coloresporno= '';
        
        
        $sql_base = "select * from authors ";
        $parameters ='<h4>Filtros de búsquedas:</h4> <br/>';
        $lleva_algo_mas_que_huevos = (($titulo = $request->input('titulo',false)) 
            && !empty(trim($titulo)))
        || (($libro = $request->input('libro',false)) 
            && !empty(trim($libro)))
        || (($resumen = $request->input('resumen',false)) 
            && !empty(trim($resumen)));
        if($lleva_algo_mas_que_huevos) $sql_base .='WHERE';
        if(($titulo = $request->input('titulo',false)) 
            && !empty(trim($titulo)))
        {
            $sql_base.=" nombre LIKE '%$titulo%' AND";
            $parameters.="<b>Nombre COMO: </b>$titulo<br/>";
        }
        if(($resumen = $request->input('resumen',false)) 
            && !empty(trim($resumen)))
        {
            $sql_base.=" id=ANY( select author_id from author_book where book_id=ANY(select id from books where resumen  LIKE '%$resumen%')) AND";
            $parameters.="<b>Con libros que traten de: </b>$resumen<br/>";
        }
        if(($libro = $request->input('libro',false)) 
            && !empty(trim($libro)))
        {
            $sql_base.=" id=ANY( select author_id from author_book where book_id=ANY(select id from books where titulo  LIKE '%$libro%')) AND";
            $parameters.="<b>Con libros llamados: </b>$libro<br/>";
        }
        if($lleva_algo_mas_que_huevos) $sql_base = substr($sql_base, 0,strlen($sql_base)-4);
        $sql_base .= $request->input('ordenar','Ascendentemente')=='Ascendentemente' ?
        "order by nombre " : "order by nombre desc ";
        $sql_base .= 'LIMIT '.$request->input('cantidad_resultados',5);
        $parameters .= "<b>Hasta ".$request->input('cantidad_resultados',5)." resultados</b><br/>";
        $results = \DB::select( \DB::raw($sql_base) );
        if($request->input('mostrar_tablas','')==='on')
        {
            $rs .=  "<table class=\"table\">
            <thead>
            <tr>
            <th>Nombre</th>
            <th>Veces</th>
            </tr>
            </thead>
            <tbody>";
            $totalporno=0;
            $dataAutores=$auxiliardeOrden=[];
            foreach ($results as $key => $value)
            {
                $beses_autor =0;
                foreach (Author::find($value->id)->books as $value2) {
                    $veces = \DB::select( \DB::raw("select count(*) cuentaporno from loans where item_id=ANY(select id from items where book_id={$value2->id})"));
                    $beses_autor += $veces[0]->cuentaporno;
                }
                $totalporno +=  $beses_autor;
                $auxiliardeOrden[$value->id]=$beses_autor;
                $dataAutores [$value->id]= ['nombre'=> $value->nombre,'veces' => $beses_autor];
            }
            foreach ($auxiliardeOrden as $key => $value) 
            {
                $rs .= "<tr>
                <td>".$dataAutores[$key]['nombre']."</td>
                <td>".$dataAutores[$key]['veces']."</td>
                </tr>";
                
            }
            $rs .=  "</tbody>
            </table>";
        }
        if($request->input('mostrar_grafico','')==='on')
        {
            $rs .=  '<script>$(function(){new Chart(document.getElementById("donut"),{"type":"doughnut","data":{"labels":[';
            foreach ($dataAutores as $key => $value){
                $coloresporno.='\''.($this->colorrandom()).'\',';
                $rs .=  "'".substr($value['nombre'],0,20)."',";
            }
            $rs .=  '],"datasets":[{"label":"Solvencia","data":[';
            foreach ($dataAutores as $key => $value) $rs .=  sprintf("%.2f",($value['veces']/$totalporno) * 100).",";
            $rs .=  '],"backgroundColor":['.$coloresporno.']}]}});});</script>';
        }
        $cadenas = [null,'Los libros más consultados','Los proyectos más consultados','Los autores más consultados']; 
        
        
        return view('interno.resultados')
        ->with('resultados',$rs)
        ->with('parameters',$parameters);
    }
    public function proyectos(Request $request)
    { $cuentasHot2=$cuentasHot=[];
        $sql_base = "select * from books WHERE clasificacion=3 AND deleted_at IS NULL AND";
        $parameters ='<h4>Filtros de búsquedas:</h4> <br/>';
        $lleva_algo_mas_que_huevos = (($titulo = $request->input('titulo',false)) 
            && !empty(trim($titulo)))
        ||  (($paginas_exactamente = $request->input('paginas_exactamente',false)) 
            && !empty(trim($paginas_exactamente)))
        ||  (($paginas_desde = $request->input('paginas_desde',false)) 
            && !empty(trim($paginas_desde)))
        ||  (($paginas_hasta = $request->input('paginas_hasta',false)) 
            && !empty(trim($paginas_hasta)))
        ||  (($anio_exactamente = $request->input('anio_exactamente',false)) 
            && !empty(trim($anio_exactamente)))
        ||  (($anio_desde = $request->input('anio_desde',false)) 
            && !empty(trim($anio_desde)))
        ||  (($anio_hasta = $request->input('anio_hasta',false)) 
            && !empty(trim($anio_hasta)))
        || (($resumen = $request->input('resumen',false)) 
            && !empty(trim($resumen)));
        
        if(($titulo = $request->input('titulo',false)) 
            && !empty(trim($titulo)))
        {
            $sql_base.=" titulo LIKE '%$titulo%' AND";
            $parameters.="<b>Título COMO: </b>$titulo<br/>";
        }
        if(($pnf = $request->input('pnf',false)) 
            && !empty(trim($pnf)))
        {
            $sql_base.=" speciality_id = '$pnf' AND";
            $parameters.="<b>Del PNF: </b> ".(Speciality::find($pnf)->especialidad)." <br/>";
        }
        if(($tipo_proyecto = $request->input('tipo_proyecto',false)) 
            && !empty(trim($tipo_proyecto)))
        { 
            $sql_base.=" subclasificacion= '$tipo_proyecto' AND";
            $parameters.="<b>Proyectos de Tipo: </b>".$tipo_proyecto."<br/>";
        }
        if(($resumen = $request->input('resumen',false)) 
            && !empty(trim($resumen)))
        {
            $sql_base.=" resumen LIKE '%$resumen%' AND";
            $parameters.="<b>Resumen CON: </b>$resumen<br/>";
        }
        if(($numero_paginas = $request->input('numero_paginas',false)) 
           && $numero_paginas==='Exactamente:' && 
           ($paginas_exactamente = $request->input('paginas_exactamente',false)) 
           && !empty(trim($paginas_exactamente)) )
        {
            $sql_base.= " numero_paginas = '$paginas_exactamente' AND";
            $parameters.="<b>Número de Página = </b>$paginas_exactamente<br/>";
        }
        if(($numero_paginas = $request->input('numero_paginas',false)) 
           && $numero_paginas==='Definido por intervalo')
        {
            if(($paginas_desde = $request->input('paginas_desde',false)) 
                && !empty(trim($paginas_desde)))
            {
                $sql_base.= " numero_paginas >= '$paginas_desde' AND";
                $parameters.="<b>Al menos </b>$paginas_desde páginas<br/>";
            }
            if(($paginas_hasta = $request->input('paginas_hasta',false)) 
                && !empty(trim($paginas_hasta)))
            {
                $sql_base.= " numero_paginas <= '$paginas_hasta' AND";
                $parameters.="<b>Hasta </b>$paginas_hasta páginas<br/>";
            }
        }
        if(($anio_edicion = $request->input('anio',false)) 
           && $anio_edicion==='Exactamente:' && 
           ($anio_exactamente = $request->input('anio_exactamente',false)) 
           && !empty(trim($anio_exactamente)) )
        {
            $sql_base.= " anio_edicion = '$anio_exactamente' AND";
            $parameters.="<b>Editado en el año </b>$anio_exactamente<br/>";
        }
        if(($anio_edicion = $request->input('anio',false)) 
           && $anio_edicion==='Definido por intervalo')
        {
            if(($anio_desde = $request->input('anio_desde',false)) 
                && !empty(trim($anio_desde)))
            {
                $sql_base.= " anio_edicion >= '$anio_desde' AND";
                $parameters.="<b>Editado desde el año </b>$anio_desde<br/>";
            }
            if(($anio_hasta = $request->input('anio_hasta',false)) 
                && !empty(trim($anio_hasta)))
            {
                $sql_base.= " anio_edicion <= '$anio_hasta' AND";
                $parameters.="<b>Editado hasta en el año </b>$anio_hasta<br/>";
            }
        }
        if(($incorporacion = $request->input('incorporacion',false)) 
           && $incorporacion==='Exactamente:' && 
           ($incorporacion_exactamente = $request->input('incorporacion_exactamente',false)) 
           && !empty(trim($incorporacion_exactamente)) )
        {
            $sql_base.= " YEAR(fecha_incorporacion) = '$incorporacion_exactamente' AND";
            $parameters.="<b>Fecha de Incorporación = </b>$incorporacion_exactamente<br/>";
        }
        if(($numero_paginas = $request->input('numero_paginas',false)) 
           && $numero_paginas==='Definido por intervalo')
        {
            if(($incorporacion_desde = $request->input('incorporacion_desde',false)) 
                && !empty(trim($incorporacion_desde)))
            {
                $sql_base.= " YEAR(fecha_incorporacion) >= '$incorporacion_desde' AND";
                $parameters.="<b>Incorporado desde </b>$incorporacion_desde páginas<br/>";
            }
            if(($incorporacion_hasta = $request->input('incorporacion_hasta',false)) 
                && !empty(trim($incorporacion_hasta)))
            {
                $sql_base.= " YEAR(fecha_incorporacion) <= '$incorporacion_hasta' AND";
                $parameters.="<b>Incorporado hasta </b>$incorporacion_hasta páginas<br/>";
            }
        }
        
        $sql_base = substr($sql_base, 0,strlen($sql_base)-4);
        $sql_base .= ' LIMIT '.$request->input('cantidad_resultados',5);
        $parameters.="<b>Hasta ".$request->input('cantidad_resultados',5)." resultados</b><br/>"; 
        $results = \DB::select( \DB::raw($sql_base) );
        if(count($results)===0)
            die('Error: Sin resultados');
        $coloresporno='';
        $totalporno = 0;
        foreach ($results as $key => $value) $totalporno += $value->veces;
        foreach ($results as $key => $value) {
            $coloresporno.='\''.($this->colorrandom()).'\',';
            $results_loans = \DB::select( \DB::raw("select count(*) as cuenta from loans where item_id=ANY(select id from items where book_id={$value->id})") );
            $cuentasHot[$value->id] = ['cuenta'=> $value->veces,
            'objeto'=>$value];
            $cuentasHot2[$value->id] = $results_loans[0]->cuenta;                     
        } 
        $parameters.="<b>Ordenar resultados:</b>".$request->input('ordenar',5)."<br/>";
        $request->input('ordenar')==='Ascendentemente'?
        asort($cuentasHot2)
        : arsort($cuentasHot2);
        $rs = '';
        if($request->input('mostrar_tablas','')==='on')
        {
            $rs .=  "<table class=\"table\">
            <thead>
            <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>A&ntilde;o</th>
            <th>Subclasificaci&oacute;n</th>
            <th>Veces que ha sido consultado</th>
            <th>Veces que ha sido consultado (%)</th>
            </tr>
            </thead>
            <tbody>";
            foreach ($cuentasHot2 as $key => $value) {
                $rs .= "<tr>
                <td>".$cuentasHot[$key]['objeto']->titulo."</td>
                <td>";
                foreach(Book::find($key)->authors as $v) $rs.= $v->nombre.'<br/>';
                $rs .=  "</td>
                <td>".$cuentasHot[$key]['objeto']->anio_edicion."</td>
                <td>".$cuentasHot[$key]['objeto']->subclasificacion."</td>
                <td>".$cuentasHot[$key]['objeto']->veces."</td>
                <td>".sprintf("%.2f",($cuentasHot[$key]['objeto']->veces /$totalporno) * 100)."</td>
                </tr>";
            }
            $rs .=  "</tbody>
            </table>";
        }
        if($request->input('mostrar_grafico','')==='on')
        {
            $rs .=  '<script>$(function(){new Chart(document.getElementById("donut"),{"type":"doughnut","data":{"labels":[';
            foreach ($cuentasHot2 as $key => $value) $rs .=  "'".substr($cuentasHot[$key]['objeto']->titulo,0,20)."',";
            $rs .=  '],"datasets":[{"label":"Solvencia","data":[';
            foreach ($cuentasHot2 as $key => $value) $rs .=  (($cuentasHot[$key]['cuenta']/$totalporno) * 100).",";
            $rs .=  '],"backgroundColor":['.$coloresporno.']}]}});});</script>';
        }
        
        return view('interno.resultados')
        ->with('resultados',$rs)
        ->with('parameters',$parameters);
    }
    public function emitirRespaldo(Request $request)
    {
        if (Hash::check($request->password, Auth::user()->password))
        {
            set_time_limit(3000); 
            $mysqli = new \mysqli( "localhost","root","","sensualidad"); 
            $mysqli->select_db("sensualidad"); 
            $mysqli->query("SET NAMES 'utf8'");
            $queryTables = $mysqli->query('SHOW TABLES');
            while($row = $queryTables->fetch_row()) 
                $target_tables[] = $row[0]; 
            
            $content = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\r\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\r\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\r\n/*!40101 SET NAMES utf8 */;\r\n--\r\n-- Database: `sensualidad`\r\n--\r\n\r\n\r\n";
            foreach($target_tables as $table)
            {
                if (empty($table)) 
                    continue; 
                $result = $mysqli->query('SELECT * FROM `'.$table.'`');     
                $fields_amount = $result->field_count;  
                $rows_num=$mysqli->affected_rows;     
                $res = $mysqli->query('SHOW CREATE TABLE '.$table); 
                $TableMLine=$res->fetch_row(); 
                $content .= "\n\n".$TableMLine[1].";\n\n";
                for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) 
                {
                    while($row = $result->fetch_row())  
                { //when started (and every after 100 command cycle):
                    if ($st_counter%100 == 0 || $st_counter == 0 )  
                        $content .= "\nINSERT INTO ".$table." VALUES";
                    $content .= "\n(";    
                    for($j=0; $j<$fields_amount; $j++)
                    { 
                        $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); 
                        if (isset($row[$j]))
                            $content .= '"'.$row[$j].'"' ;  
                        else
                            $content .= '""';     
                        if ($j<($fields_amount-1))
                            $content.= ',';   
                    }        
                    $content .=")";
                    //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                    if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) 
                        $content .= ";"; 
                    else 
                        $content .= ","; 
                    $st_counter=$st_counter+1;
                }
            } 
            $content .="\n\n\n";
        }
        $content .= "\r\n\r\n/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
        $name = 'bivlu-';
        $backup_name = $name." (".date('H.i.s')."_".date('d-m-Y').").sql";
        ob_get_clean(); 
        header('Content-Type: application/octet-stream');   
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"".$backup_name."\"");
        echo $content; 
        exit;
    }
    else 
    {
        $request->session()->flash("error",1);
        return redirect("respaldo");
    }
}

public function restauracion()
{
    return view('interno.restauracion');
}
public function foto()
{
    return view('interno.foto')->with('usuario',Auth::user())
    ->with('foto',Auth::user()->photo);
}
public function actualizarFoto(Request $request)
{ 
    if (Hash::check($request->password, Auth::user()->password))
    {
        $user = User::find(Auth::user()->id);
        if($request->file('archivo'))
        {
            $fileName = md5(rand(1,999999)) . '.' . 
            $request->file('archivo')->getClientOriginalExtension();
            $request->file('archivo')->move(
                base_path() . '/public/uploads', $fileName
            ); 
            $user->photo = $fileName;
        } 
        $user->email = $request->email;
        if (($c = $request->input('domanda_di_securida',false)) && trim($c)!='')
        {
            $user->domanda_di_securida = $c; 
            $user->save();
        }

        if (($c = $request->input('answer',false)) && trim($c)!='')
        {
            $user->answer = md5($c); 
            $user->save();
        } 

        if (($c = $request->input('contrasena',false)) && trim($c)!='')
        {
            $user->password = Hash::make($request->password); 
            $user->save();
        }
        else
            $user->save();
        $request->session()->flash("exito",1);
        return redirect("foto");
    }
    else 
    { 
        $request->session()->flash("error",1);
        return redirect("foto");
    }
}
public function restaurarBD(Request $request)
{
    if (Hash::check($request->password, Auth::user()->password))
    {
        set_time_limit(3000);
        $SQL_CONTENT =   $request->contenido;
        
        $allLines = explode("\n",$SQL_CONTENT); 
        $mysqli = new \mysqli( "localhost","root","","sensualidad"); 
        if (mysqli_connect_errno())
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        $zzzzzz = $mysqli->query('SET foreign_key_checks = 0');         
        preg_match_all("/\nCREATE TABLE(.*?)\`(.*?)\`/si", "\n". $SQL_CONTENT, $target_tables); 
        foreach ($target_tables[2] as $table)
            $mysqli->query('DROP TABLE IF EXISTS '.$table);         
        $zzzzzz = $mysqli->query('SET foreign_key_checks = 1');    
        $mysqli->query("SET NAMES 'utf8'"); 
            $templine = ''; // Temporary variable, used to store current query
            foreach ($allLines as $line)    
            {                                           // Loop through each line
                if (substr($line, 0, 2) != '--' && $line != '') 
                {
                    $templine .= $line;     // (if it is not a comment..) Add this line to the current segment
                    if (substr(trim($line), -1, 1) == ';') 
                    {       // If it has a semicolon at the end, it's the end of the query
                    if(!$mysqli->query($templine))
                        print('Error performing query \'<strong>' . $templine . '\': ' . $mysqli->error . '<br /><br />');  
                        $templine = ''; // set variable to empty, to start picking up the lines after ";"
                    }
                }
            } 
            return "Exito";
        }
        else 
        { 
            return "Error";
        }
    }
}