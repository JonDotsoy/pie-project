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
	var PROF_PASS="", PROF_NOMBRE="", PROF_AP_PAT="", PROF_AP_MAT="", PROF_TELEFONO="", PROF_DIRECCION="", PROF_EMAIL="", PROF_GEN_ID="",pk="";	
	
	function modificarInformacion(){
	
		PROF_PASS = document.getElementById("PROF_PASS_editar").value;
		PROF_NOMBRE = document.getElementById("PROF_NOMBRE_editar").value;
		PROF_AP_PAT = document.getElementById("PROF_AP_PAT_editar").value;
		PROF_AP_MAT = document.getElementById("PROF_AP_MAT_editar").value;
		PROF_TELEFONO = document.getElementById("PROF_TELEFONO_editar").value;
		PROF_DIRECCION = document.getElementById("PROF_DIRECCION_editar").value;
		PROF_EMAIL = document.getElementById("PROF_EMAIL_editar").value;
		PROF_GEN_ID = document.getElementById("PROF_GEN_ID_editar").value;
		PROF_RUN = document.getElementById("PROF_RUN_editar").value;
		}
		
		if(PROF_PASS!="" && PROF_NOMBRE!="" && PROF_AP_PAT!="" && PROF_AP_MAT!="" && PROF_TELEFONO!="" && PROF_DIRECCION!="" && PROF_EMAIL!="" && PROF_GEN_ID!=""){
			ajax_("../control/controlador_profesor.php?PROF_PASS_editar="+PROF_PASS+"&PROF_NOMBRE_editar="+PROF_NOMBRE+"&PROF_AP_PAT_editar="+PROF_AP_PAT+"&PROF_AP_MAT_editar="+PROF_AP_MAT+"&PROF_TELEFONO_editar="+PROF_TELEFONO+"&PROF_DIRECCION_editar="+PROF_DIRECCION+"&PROF_EMAIL_editar="+PROF_EMAIL+"&PROF_GEN_ID_editar="+PROF_GEN_ID+"&PROF_RUN_editar="+PROF_RUN);
		}else{
			alert("Ingrese toda la informacion.");
		}		
	}
</script>
</head>

<body>
<form>
  <?php	
		if(isset($_GET["PROF_PASS"]) && isset($_GET["PROF_NOMBRE"]) && isset($_GET["PROF_AP_PAT"]) && isset($_GET["PROF_AP_MAT"]) && isset($_GET["PROF_TELEFONO"]) && isset($_GET["PROF_DIRECCION"]) && isset($_GET["PROF_EMAIL"]) && isset($_GET["PROF_GEN_ID"])){
			$PROF_RUN=$_GET["PROF_RUN"];
			$PROF_PASS=$_GET["PROF_PASS"];
			$PROF_NOMBRE=$_GET["PROF_NOMBRE"];
			$PROF_AP_PAT=$_GET["PROF_AP_PAT"];
			$PROF_AP_MAT=$_GET["PROF_AP_MAT"];
			$PROF_TELEFONO=$_GET["PROF_TELEFONO"];
			$PROF_DIRECCION=$_GET["PROF_DIRECCION"];			
			$PROF_EMAIL=$_GET["PROF_EMAIL"];
			$PROF_GEN_ID=$_GET["PROF_GEN_ID"];
			}
	?>
  <br />
  <br />
  <table width="200" border="0" align="center">
	
    
    <input type="hidden" name="PROF_RUN_editar" id="PROF_RUN_editar" value="<?php echo $PROF_RUN; ?>" />
    
	<tr>
      <td>Password</td>
      <td><input type="text" name="PROF_PASS_editar" id="PROF_PASS_editar" value="<?php echo $PROF_PASS; ?>" /></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><input type="text" name="PROF_NOMBRE_editar" id="PROF_NOMBRE_editar" value="<?php echo $PROF_NOMBRE; ?>" /></td>
    </tr>
    <tr>
      <td>Apellido Paterno</td>
      <td><input type="text" name="PROF_AP_PAT_editar" id="PROF_AP_PAT_editar" value="<?php echo $PROF_AP_PAT; ?>" /></td>
    </tr>
	<tr>
      <td>Apellido Materno</td>
      <td><input type="text" name="PROF_AP_MAT_editar" id="PROF_AP_MAT_editar" value="<?php echo $PROF_AP_MAT; ?>" /></td>
    </tr>
    <tr>
      <td>Telefono</td>
      <td><input type="text" name="PROF_TELEFONO_editar" id="PROF_TELEFONO_editar"  value="<?php echo $PROF_TELEFONO; ?>" /></td>
    </tr>
    <tr>
      <td>Direccion</td>
      <td><input type="text" name="PROF_DIRECCION_editar" id="PROF_DIRECCION_editar" value="<?php echo $PROF_DIRECCION; ?>" /></td>
    </tr>
    <tr>
      <td>e-mail</td>
      <td><input type="text" name="PROF_EMAIL_editar" id="PROF_EMAIL_editar" value="<?php echo $PROF_EMAIL; ?>" /></td>
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