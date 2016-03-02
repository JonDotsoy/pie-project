<?php 
	require ("../modelo/modelo_duracion.php");
	$objModelo = new Formulario();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar</title>
<script type="text/javascript" src="../ajax/ajax.js"></script>
<script type="text/javascript">
	var DUR_ID="", DUR_DESCRIP="";	
	
	function modificarInformacion(){
		
		DUR_ID = document.getElementById("DUR_ID_editar").value;
		DUR_DESCRIP = document.getElementById("DUR_DESCRIP_editar").value;
		}
		
		if(DUR_DESCRIP!=""){
			ajax_("../control/controlador_duracion.php?DUR_ID_editar="+DUR_ID+"&DUR_DESCRIP_editar="+DUR_DESCRIP);
		}else{
			alert("Ingrese toda la informacion.");
		}		
	}
</script>
</head>

<body>
<form>
  <?php	
		if(isset($_GET["DUR_ID"]) && isset($_GET["DUR_DESCRIP"]) ){
			$DUR_ID=$_GET["DUR_ID"];
			$DUR_DESCRIP=$_GET["DUR_DESCRIP"];
			}
	?>
  <br />
  <br />
  <table width="200" border="0" align="center">
	<div align="center">Editar</div>
	<br />
	<tr>
      <td>Id</td>
      <td><input type="text" name="DUR_ID_editar" id="DUR_ID_editar" value="<?php echo $DUR_ID; ?>" /></td>
    </tr>
	<tr>
      <td>Descripcion</td>
      <td><input type="text" name="DUR_DESCRIP_editar" id="DUR_DESCRIP_editar" value="<?php echo $DUR_DESCRIP; ?>" /></td>
    </tr>
  
    <tr>
      <td colspan="3" align="center"><input type="button" value="Modificar" onclick="modificarInformacion();" /></td>
    </tr>
  </table>
  <div id="resultado" align="center"></div>
</form>
<br />
<br />
<br />
</body>
</html>