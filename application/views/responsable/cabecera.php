<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url(); ?>css/estilo.css" />
<title></title>

<style>

.rellenar{
background:#000069; 
height:120px; 
width:40%;
z-index:-999;
position:absolute; 
float:left; 
top:0;
}

</style>

</head>
<body>

<div class="logos">

<div class="rellenar"></div>

<div class="page" style="z-index:99; position:relative">

<DIV STYLE="position:absolute; left:0px; top:20px; visibility:visible z-index:2;"> 

</DIV>

<img src="<?php echo base_url()?>imagenes/logoERU.jpg" />

<img src="<?php echo base_url()?>imagenes/logoingMISA.png" width="100" height="110" />

</div>

</div>

</div>

<div class="page">

<div style="float:right;"> <label>Nombre de usuario: <label style="color:#00B5E2; font-weight:bold;"> <?php echo $nombre_usuario; ?> </label> </label>.<a href="<?php echo base_url(); ?>index.php/usuarios/principal" >
<img alt="Editar datos" src="<?php echo base_url(); ?>imagenes/editar.png"/>
</a>
</div>

<br>

<div class="menu" style="margin-top:35px; font-size:12px;">

<ul>   
<li><a href="<?php echo base_url(); ?>index.php/" <?php if($opcion=="campa") { echo 'id="primero"'; } ?> >Mapa</a></li> 
<li><a href="<?php echo base_url(); ?>index.php/responsable/obras" <?php if($opcion=="obras") { echo 'id="primero"'; } ?> >Obras</a></li>                  
<li><a href="<?php echo base_url(); ?>index.php/" <?php if($opcion=="ingresos") { echo 'id="primero"'; } ?> >Reporte</a></li>
<li><a href="<?php echo base_url(); ?>index.php/" <?php if($opcion=="campa") { echo 'id="primero"'; } ?> >Proveedor</a></li>
<li style="float:right"><a href="<?php echo base_url(); ?>index.php/login/salir" >Salir</a></li>                              
</ul>            

</div><!--menu---> 

</div>

<br>
            
</body>
</html>