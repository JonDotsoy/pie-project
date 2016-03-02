<?php 
	require("../modelo/modelo_actividad.php");
	$objFormulario = new Formulario();
	$mensajeExito="Registro Exitoso";
	$mensajeError="Error al Registrar: Datos Incompletos";	
	//-------------------------------------------EDITAR--------------------------------------------------------------------------------	
	if(isset($_POST["ACT_ID_editar"]) && isset($_POST["ACT_DESCRIP_editar"]) && isset($_POST["ACT_PROF_RUN_editar"]) && isset($_POST["ACT_ALU_RUN_editar"]) && isset($_POST["ACT_TAC_ID_editar"]) && isset($_POST["ACT_CAL_ID_editar"])){
			$objFormulario->modificarUsuario($_GET["ACT_ID_editar"], $_GET["ACT_DESCRIP_editar"], $_GET["ACT_PROF_RUN_editar"], $_GET["ACT_ALU_RUN_editar"], $_GET["ACT_TAC_ID_editar"], $_GET["ACT_CAL_ID_editar"]);
	}
	//------------------------------------------ REGISTRAR--------------------------------------------------------------------------------	
	if(isset($_POST["ACT_ID"]) && isset($_POST["ACT_DESCRIP"]) && isset($_POST["ACT_PROF_RUN"]) && isset($_POST["ACT_ALU_RUN"]) && isset($_POST["ACT_TAC_ID"]) && isset($_POST["ACT_CAL_ID"])){
			$objFormulario->registrar($_POST["ACT_ID"], $_POST["ACT_DESCRIP"], $_POST["ACT_PROF_RUN"], $_POST["ACT_ALU_RUN"], $_POST["ACT_TAC_ID"], $_POST["ACT_CAL_ID"]);
			
		}	
	//-------------------------ELIMINAR USUARIO-------------------------	
	if(isset($_GET["eliminar"])){
		?>
			<script>
            	confirmar=confirm("¿Esta seguro de eliminar el registro?");
				if(confirmar){
					location.href="controlador_actividad.php?confirmacion=si&ACT_ID=<?php echo $_GET["ACT_ID"]; ?>";
				}else{
					location.href="../modificar/modificar_actividad.php";
				}
           </script>
		<?php
	}
	if(isset($_GET["confirmacion"])){
		$objFormulario->eliminar($_GET["ACT_ID"]);
	}	
?>