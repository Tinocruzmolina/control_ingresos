<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url(); ?>css/estilo.css" />
<title>Transparencia Publicidad</title>
</head>
<body>

<div class="page">

<table width="100%" class="opciones"> 
<tr>
<td align="left"> <h2> <?php if($opcion_proveedores=="ver_todos") { echo 'Listado de proveedores'; }  if($opcion_proveedores=="nuevo_proveedor") { echo 'Ingrese los datos del nuevo proveedor'; } if($opcion_proveedores=="buscar") { echo 'Resultado de la búsqueda'; } ?> </h2> </td>
<td width="50%" align="right"> 
<?=form_open(base_url().'index.php/medios/buscar')?>
<input type="text" name="buscar" id="buscar" size="40" value="Buscar" onfocus="if (this.value=='Buscar') this.value='';" onblur="if (this.value=='') this.value='Buscar';" />
<?=form_close()?>
</td>
</tr>
</table>

<br>


<div class="menu2">
<ul>
<li style="width:30%" <?php if($opcion_proveedores=="ver_todos") { echo 'id="primero"'; } ?>>
<a href="<?php echo base_url();?>index.php/administrador/proveedores/principal"> Ver todos </a>
</li>
<li style="width:70%" <?php if($opcion_proveedores=="nuevo_proveedor") { echo 'id="primero"'; } ?>>
<a style="margin-right:10px" href="<?php echo base_url();?>index.php/administrador/proveedores/administracion/add" > Agregar nuevo proveedor </a> 
</li>
</ul>
</div>


</div>
            
</body>
</html>