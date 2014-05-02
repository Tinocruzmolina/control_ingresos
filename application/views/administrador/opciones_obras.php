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
<td align="left"> <h2> <?php if($opcion_obras=="ver_todos") { echo 'Listado de obras por contrato'; }  if($opcion_obras=="nueva_obra") { echo 'Ingrese los datos de la nueva obra'; } if($opcion_obras=="buscar") { echo 'Resultado de la búsqueda'; } ?> </h2> </td>
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
<li style="width:15%" <?php if($opcion_obras=="ver_todos") { echo 'id="primero"'; } ?>>
<a href="<?php echo base_url();?>index.php/administrador/obras/principal/1"> Obras por contrato </a>
</li>
<li style="width:25%" <?php if($opcion_obras=="ver_todos_admon") { echo 'id="primero"'; } ?>>
<a href="<?php echo base_url();?>index.php/administrador/obras/principal/2"> Obras por administración municipal </a>
</li>
<li style="width:25%" <?php if($opcion_obras=="nueva_obra") { echo 'id="primero"'; } ?>>
<a style="margin-right:10px" href="<?php echo base_url();?>index.php/administrador/obras/nuevo" > Agregar nueva obra por contrato</a> 
</li>
<li style="width:35%" <?php if($opcion_obras=="nueva_obra_admon") { echo 'id="primero"'; } ?>>
<a style="margin-right:10px" href="<?php echo base_url();?>index.php/administrador/obras/nuevo_admon" > Agregar nueva obra por administración municipal</a> 
</li>
</ul>
</div>


</div>
            
</body>
</html>