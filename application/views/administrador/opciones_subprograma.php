<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url(); ?>css/estilo.css" />
<title></title>
</head>
<body>

<div class="page">

<table width="100%" class="opciones"> 
<tr>
<td align="left"> <h2> <?php if($opcion_subprograma=="ver_todos") { echo 'Listado de subprogrmas'; }  if($opcion_subprograma=="nuevo_subprograma") { echo 'Ingrese los datos del nuevo subprograma'; } if($opcion_subprograma=="buscar") { echo 'Resultado de la búsqueda'; } ?> </h2> </td>
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
<li style="width:30%" <?php if($opcion_subprograma=="ver_todos") { echo 'id="primero"'; } ?>>
<a href="<?php echo base_url();?>index.php/administrador/programa/principal"> Ver todos </a>
</li>
<li style="width:70%" <?php if($opcion_subprograma=="nuevo_subprograma") { echo 'id="primero"'; } ?>>
<a style="margin-right:10px" href="<?php echo base_url();?>index.php/administrador/subprograma/administracion/add" > Agregar nuevo subprograma </a> 
</li>
</ul>
</div>


</div>
            
</body>
</html>