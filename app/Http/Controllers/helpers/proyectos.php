<?php
        $cuentasHot2=$cuentasHot=[];
        $sql_base = "select * from books WHERE clasificacion=3 AND";
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
        
        $sql_base = substr($sql_base, 0,strlen($sql_base)-4);
        $sql_base .= 'LIMIT '.$request->input('cantidad_resultados',5);
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
    ?>