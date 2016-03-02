<?php 
	require ("../modelo/modelo_profesor.php");
	$objModelo = new Formulario();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar</title>
<script type="text/javascript" src="../ajax/ajax.js"></script>
<script type="text/javascript">
	var ACT_ID="",ACT_DESCRIP="",ACT_PROF_RUN="",ACT_ALU_RUN="",ACT_TAC_ID="",ACT_CAL_ID="",pk="";	
	
	function modificarInformacion(){
	
		ACT_ID= document.getElementById("ACT_ID_editar").value;
		ACT_DESCRIP = document.getElementById("ACT_DESCRIP_editar").value;
		ACT_PROF_RUN = document.getElementById("ACT_PROF_RUN_editar").value;
		ACT_ALU_RUN = document.getElementById("ACT_ALU_RUN_editar").value;
		ACT_TAC_ID = document.getElementById("ACT_TAC_ID_editar").value;
		ACT_CAL_ID= document.getElementById("ACT_CAL_ID_editar").value;
		
		}
		
		if(ACT_ID!="" && ACT_DESCRIP!="" && ACT_PROF_RUN!="" && ACT_ALU_RUN!="" && ACT_TAC_ID!="" && ACT_CAL_ID!=""){
			ajax_("../control/controlador_profesor.php?ACT_DESCRIP_editar="+ACT_DESCRIP+"&ACT_PROF_RUN_editar="+ACT_PROF_RUN+"&ACT_ALU_RUN_editar="+ACT_ALU_RUN+"&ACT_TAC_ID_editar="+ACT_TAC_ID+"&ACT_CAL_ID_editar="+ACT_CAL_ID);
		}else{
			alert("Ingrese toda la informacion.");
		}		
	}
</script>
</head>

<body>
<form>
  <?php	
		if(isset($_GET["ACT_DESCRIP"]) && isset($_GET["ACT_PROF_RUN"]) && isset($_GET["ACT_ALU_RUN"]) && isset($_GET["ACT_TAC_ID"]) && isset($_GET["ACT_CAL_ID"])){
			$ACT_ID=$_GET["ACT_ID"];
			$ACT_DESCRIP=$_GET["ACT_DESCRIP"];
			$ACT_PROF_RUN=$_GET["ACT_PROF_RUN"];
			$ACT_ALU_RUN=$_GET["ACT_ALU_RUN"];
			$ACT_TAC_ID=$_GET["ACT_TAC_ID"];
			$ACT_CAL_ID=$_GET["ACT_CAL_ID"];
			}
	?>
  <br />
  <br />
  <table width="200" border="0" align="center">
	
    
    <input type="hidden" name="ACT_ID_editar" id="ACT_ID_editar" value="<?php echo $ACT_ID; ?>" />
    
	<tr>
      <td>Password</td>
      <td><input type="text" name="ACT_DESCRIP_editar" id="ACT_DESCRIP_editar" value="<?php echo $ACT_DESCRIP; ?>" /></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><input type="text" name="ACT_PROF_RUN_editar" id="ACT_PROF_RUN_editar" value="<?php echo $ACT_PROF_RUN; ?>" /></td>
    </tr>
    <tr>
      <td>Apellido Paterno</td>
      <td><input type="text" name="ACT_ALU_RUN_editar" id="ACT_ALU_RUN_editar" value="<?php echo $ACT_ALU_RUN; ?>" /></td>
    </tr>
	<tr>
      <td>Apellido Materno</td>
      <td><input type="text" name="ACT_TAC_ID_editar" id="ACT_TAC_ID_editar" value="<?php echo $ACT_TAC_ID; ?>" /></td>
    </tr>
    <tr>
      <td>Telefono</td>
      <td><input type="text" name="ACT_CAL_ID_editar" id="ACT_CAL_ID_editar"  value="<?php echo $ACT_CAL_ID; ?>" /></td>
    </tr>
    
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