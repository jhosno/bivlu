@extends('layouts.app')
@section('content')
<ul class="breadcrumb">
    <li><a href="">Inicio</a></li> 
    <li><a href="">Consultas del lector</a></li> 
</ul>
 
                <form class="search form"  >
                   <div class="row">
                       <div class="col-md-6"><input type="search" id="cedula" ng-model="query.q"  placeholder="Ingrese cédula del usuario aquí."></div>
                       <div class="col-md-3"><select class="form-control" id="clase">
                           <option>Seleccione</option>
                           <option value="carnet">Carnet</option>
                           <option value="solvencia">Solvencia</option>
                       </select></div>
                       <div class="col-md-3"><input type="button" onclick="makeQuery()" class="btn btn-raised btn-primary" value="Consultar"/></div>

                   </div> 
                    
                </form> 
            <div class="wrapper row" id="resultado">
                 
            </div>
@endsection

@section('scripts')
<script>

makeQuery = function(){
    var clase =$('#clase').val(), q= $('#cedula').val();
    if(clase.trim()!='' && q.trim()!='')
    $.get('api/consultas?peticion='+clase+'&cedula='+q,function(data){  
        console.log(data);
        if(data==-1)
        {
          $.alert({
              title: 'Notificación.',
              content: 'Usuario inexistente' ,
              type: 'red'
          });
          return;
        }

        if(data.prestamos!=undefined && (data.prestamos.length > 0  ) )
        {
          cadena = '<ul>';
          data.prestamos.forEach(function(prestamo){
            cadena+= '<li>'+prestamo.book.titulo+' Núm. '+prestamo.item.correlativo+' ('+prestamo.estado+')</li>';
          }); 
          cadena += '</ul>';
          $.alert({
              title: 'Notificación.',
              content: cadena ,
              type: 'red'
          });
           
          return false;
        }

        if( clase=="carnet")
        {
          console.log(data);
          if(data instanceof Object && data.nombres!=undefined)
          {
            if(data.foto==='')
            {
              $.alert({
              title : "No se puede proceder.",
              content : 'El estudiante no posee foto de perfil actualizada.',
              tipe : "red"
            });
              return false;
            }
            drawCarnet(data);
            cadena = "Para hacer valido el carnet debe tener el selló húmedo de la biblioteca. Por favor dirigirse a la bilioteca de la sede central en horarios de oficina."
            $.alert({
              title : "Notificación",
              content : cadena,
              tipe : "green"
            });
          }
        }
        else
        {  

          $('#resultado').html('');
          $('<embed src="'+'api/consultas?peticion=solvencia&cedula='+q+'" width="800" height="400"></embed>').appendTo('#resultado');
        }
        return false;
       });
  };

var drawCarnet = function(data)
  {
    $('#resultado').html('');
    $('<canvas width="500" height="300"></canvas>').appendTo('#resultado');
    var ctx = document.getElementById('resultado').children[0].getContext('2d');
    ctx.strokeStyle="black";
    try{
    var image = new Image();
    image.src='http://localhost/bivlu/public/uploads/'+data.foto;
   //image.src='http://bivlu.upta.edu.ve/public/uploads/'+data.foto;
    }catch( e){
      console.log(e);
    }
   image.onload=function(){ 
    image.width=2;
    image.height=2;
     ctx.drawImage(image,20, 27,80,90);//, 370, 220);
   };

   try{
    var logo = new Image();
    logo.src='https://localhost/bivlu/public/img/logo_upta.png';
    //logo.src='http://bivlu.upta.edu.ve/public/img/logo_upta.png';
    }catch( e){
      console.log(e);
    }
   logo.onload=function(){ 
    logo.width=2;
    logo.height=2;
     ctx.drawImage(logo,290, 27,80,100);//, 370, 220);
   };

   try{
    var firma = new Image();
    firma.src='https://localhost/bivlu/public/img/firma_jefe.png';
    //logo.src='http://bivlu.upta.edu.ve/public/img/firma_jefe.png';
    }catch( e){
      console.log(e);
    }
   firma.onload=function(){ 
    firma.width=2;
    firma.height=2;
     ctx.drawImage(firma,18, 130, 80, 25);//, 370, 220);
   };

  
    ctx.lineWidth=1;
    ctx.strokeRect(10, 10, 370, 220);
    ctx.strokeRect(20, 27, 80, 90);
    ctx.strokeRect(290, 27, 80, 90);
    ctx.fillStyle = "black";
    ctx.font = " bold 12px Arial ";
    ctx.textAlign="center"; 
    ctx.fillText( 'Universidad Politécnica', 185,35);
    ctx.fillText( 'Territorial de Aragua', 185,50);
    ctx.fillText( '"Federico Brito Figueroa"', 185,65);
/*    ctx.fillText( ' ', 200,50);
    ctx.fillText( '', 200,60);*/
    ctx.font = " 12px Arial";
    ctx.textAlign="left"; 
    ctx.fillText( 'Nombres:', 117,100);
    ctx.fillText( 'Apellidos:', 117,120);
    ctx.fillText( 'Carrera:', 117,140);
    ctx.fillText( 'Cédula:', 117,160);
    ctx.fillText( 'Vence:', 117,180);
    ctx.font = "bold 12px Arial";
    ctx.fillText(data.nombres, 180,100);
    ctx.fillText(data.apellidos, 180,120);
    ctx.fillText(data.carrera, 180,140);
    ctx.fillText(data.cedula, 180,160);
    ctx.fillText(data.vensimiento, 180,180);
    ctx.fillStyle = "MidnightBlue";
    ctx.fillRect(9, 205, 371, 25);
    ctx.font = "bold 18px Arial";
    ctx.textAlign = "center";
    ctx.fillStyle = "white";
    ctx.fillText(data.user_level=='estudiante'? 'ESTUDIANTE' : data.user_level, 300,224);
    ctx.fillText("BIBLIOTECA", 100,224);
    ctx.fillStyle = 'black';
    ctx.textAlign = 'center';
    ctx.font = '10px arial';
    ctx.fillText( 'Prof.', 58,170);
    ctx.fillText( data.jefe_nombres+' '+data.jefe_apellidos, 58,180);
    ctx.fillText( 'Jefe de centro', 58,190);
    ctx.fillText( 'de información', 58,200);
    //ctx.fillStyle = "Indigo";
    //ctx.fillRect(18, 130, 80, 25);
  }

</script>
@endsection