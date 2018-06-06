<div id="resultado"></div>
<script>

var drawCarnet = function(data)
  {
    $('#resultado').html('');
    $('<canvas width="500" height="300"></canvas>').appendTo('#resultado');
    var ctx = document.getElementById('resultado').children[0].getContext('2d');
    ctx.strokeStyle="black";
    try{
    var image = new Image();
    image.src='http://localhost/bivlu/public/uploads/'+data.foto;
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
    logo.src='http://localhost/bivlu/public/img/logo_upta.png';
    }catch( e){
      console.log(e);
    }
   logo.onload=function(){ 
    logo.width=2;
    logo.height=2;
     ctx.drawImage(logo,290, 27,80,100);//, 370, 220);
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
    ctx.fillText(data.user_level=='estudiante'? 'ESTUDIANTE' : data.user_level, 200,224);
    ctx.fillStyle = 'black';
    ctx.textAlign = 'center';
    ctx.font = '10px arial';
    ctx.fillText( 'Prof(a)', 58,170);
    ctx.fillText( data.jefe_nombres+' '+data.jefe_apellidos, 58,180);
    ctx.fillText( 'Jefe de centro', 58,190);
    ctx.fillText( 'de información', 58,200);
    ctx.fillStyle = "Indigo";
    ctx.fillRect(18, 130, 80, 25);
  }
</script>