<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url(); ?>css/estilo.css" />
<title></title>

<style>

.rellenar{
background:#fff; 
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

<img src="<?php echo base_url()?>imagenes/logoERU.jpg" style="float:right" />

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
<li><a href="<?php echo base_url(); ?>index.php/" <?php if($opcion=="dependencias") { echo 'id="primero"'; } ?> >Mapa</a></li>
<li><a href="<?php echo base_url(); ?>index.php/administrador/aportaciones" <?php if($opcion=="aportaciones") { echo 'id="primero"'; } ?> >Aportaciones GF</a>
</li>                  
<li><a href="<?php echo base_url(); ?>index.php/administrador/ingresos" <?php if($opcion=="ingresos") { echo 'id="primero"'; } ?> >Ingresos</a></li>
<li><a href="<?php echo base_url(); ?>index.php/administrador/programa" <?php if($opcion=="programa") { echo 'id="primero"'; } ?> >Programa</a></li>
<li><a href="<?php echo base_url(); ?>index.php/administrador/subprograma" <?php if($opcion=="subprograma") { echo 'id="primero"'; } ?> >Subprograma</a></li>
<li><a href="<?php echo base_url(); ?>index.php/administrador/modalidad" <?php if($opcion=="modalidades") { echo 'id="primero"'; } ?> >Modalidad</a></li>
<li><a href="<?php echo base_url(); ?>index.php/administrador/obras" <?php if($opcion=="obras") { echo 'id="primero"'; } ?> >Obra</a></li>
<li><a href="<?php echo base_url(); ?>index.php/administrador/responsables" <?php if($opcion=="responsables") { echo 'id="primero"'; } ?> >Responsable</a></li>
<li><a href="<?php echo base_url(); ?>index.php/administrador/directorios" <?php if($opcion=="directorios") { echo 'id="primero"'; } ?> >Directorio</a></li>
<li><a href="<?php echo base_url(); ?>index.php/administrador/proveedores" <?php if($opcion=="proveedores") { echo 'id="primero"'; } ?> >Proveedor</a></li>
<li><a href="<?php echo base_url(); ?>index.php/" <?php if($opcion=="dependencias") { echo 'id="primero"'; } ?> >Empleado</a></li>
<li><a href="<?php echo base_url(); ?>index.php/" <?php if($opcion=="dependencias") { echo 'id="primero"'; } ?> >Usuarios</a></li>
<li style="float:right"><a href="<?php echo base_url(); ?>index.php/login/salir" >Salir</a></li>                              
</ul>            

</div><!--menu---> 

</div>

<br>
            
</body>
</html>