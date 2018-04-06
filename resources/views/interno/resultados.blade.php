@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Estadísticas</a></li> 
</ul>

<div class="modal-header">Estadísticas</div>
                <div class="modal-body">  
                    {!!$parameters!!}
<a href="javascript:history.go(-1);" class="btn btn-primary">Volver Atr&aacute;s</a>
{!!$resultados!!}
<canvas id="donut" height="400" style="max-height: 450px;max-width: 400px;display:block;margin:10px auto;"></canvas>
</div>
@endsection
