<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />

<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url(); ?>css/estilo.css" />

<style>
      #map-canvas {
        height: 200px;
		width: 508px;
        margin: 0px;
        padding: 0px
      }
</style>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
   
<script type="text/javascript">
   
function validar(e) {            
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; //Tecla de retroceso (para poder borrar)
    //if (tecla==44) return true; //Coma ( En este caso para diferenciar los decimales )
    if (tecla==48) return true;
    if (tecla==49) return true;
    if (tecla==50) return true;
    if (tecla==51) return true;
    if (tecla==52) return true;
    if (tecla==53) return true;
    if (tecla==54) return true;
    if (tecla==55) return true;
    if (tecla==56) return true;
	if (tecla==57) return true;
    patron = /1/; //ver nota
    te = String.fromCharCode(tecla);
    return patron.test(te); 
}


var stockholm = new google.maps.LatLng(17.0594169,-96.7216219);
var parliament = new google.maps.LatLng(17.0594169,-96.7216219);
var latalt;
var marker;
var map;

function initialize() {
  var mapOptions = {
    zoom: 13,
    center: stockholm
  };

  map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);

  marker = new google.maps.Marker({
    map:map,
    draggable:true,
    animation: google.maps.Animation.DROP,
    position: parliament
  });
  google.maps.event.addListener(marker, 'click', toggleBounce);
  
  google.maps.event.addListener(marker, 'drag', mostrar);
  
}

function toggleBounce() {

  if (marker.getAnimation() != null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}

function mostrar() {
	latalt=marker.getPosition();
	document.getElementById('latitud').value=latalt.lat();
	document.getElementById('altitud').value=latalt.lng();
	
}

google.maps.event.addDomListener(window, 'load', initialize);
   
</script>


<title>Nueva Obra</title>

</head>
<body>

<div class="page">

<br><br>

</div>

<div class="grocery">             
 
<form id="form1" method="post" enctype="multipart/form-data" action='<?php base_url(); ?>guardar'>

<h2>Datos generales</h2>
<table width="100%">
<tr>
<td width="20%">Nombre: </td><td width="80%">
<input type="text" name="nombre" id="nombre" value="<?php echo set_value('nombre'); ?>" class="introducir" />
</tr>

<tr>
<td width="20%">Ubicación: </td><td width="80%">
<div id="map-canvas"></div>
</tr>

  <input type="hidden" id="latitud" name="latitud" value="<?php echo set_value('latitud'); ?>">  
  <input type="hidden" id="altitud" name="altitud" value="<?php echo set_value('altitud'); ?>">
  <input type="hidden" id="tipo_obra" name="tipo_obra" value="<?php echo $tipo_obra ?>">
  
</table>
 <br>

<br>
<input type="submit" value="Guardar obra" class="boton" style="margin-right:20px;"/>
<input type="button" value="Cancelar" onclick="history.back()" class="boton"/>
<!--<div class="upload">!-->
<!--</div>!-->
</form>

<br>

</div>
            
</body>
</html>