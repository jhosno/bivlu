@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="javascript:history.back();">Inicio</a></li> 
    <li><a href="">Visualización</a></li> 
    <li><a href="">{{ $libro->titulo }}</a></li> 
</ul>
 
                
                    
                </form> 
            <div class="wrapper row" id="resultado">
                 <iframe src="{{ url('uploads/'.$libro->url) }}" width="800" height="400"></iframe>
            </div>
@endsection
