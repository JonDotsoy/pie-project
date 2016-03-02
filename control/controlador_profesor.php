<?php 
	require("../modelo/modelo_profesor.php");
	$objFormulario = new Formulario();
	$mensajeExito="Registro Exitoso";
	$mensajeError="Error al Registrar: Datos Incompletos";	
	//-------------------------------------------EDITAR--------------------------------------------------------------------------------	
	if(isset($_POST["PROF_PASS_editar"]) && isset($_POST["PROF_NOMBRE_editar"]) && isset($_POST["PROF_AP_PAT_editar"]) && isset($_POST["PROF_AP_MAT_editar"]) && isset($_POST["PROF_TELEFONO_editar"]) && isset($_POST["PROF_DIRECCION_editar"]) && isset($_POST["PROF_EMAIL_editar"]) && isset($_POST["PROF_GEN_ID_editar"]) && isset($_POST["PROF_RUN_editar"])){
		
			$objFormulario->modificarUsuario($_GET["PROF_PASS_editar"], $_GET["PROF_NOMBRE_editar"], $_GET["PROF_AP_PAT_editar"], $_GET["PROF_AP_MAT_editar"], $_GET["PROF_TELEFONO_editar"], $_GET["PROF_DIRECCION_editar"], $_GET["PROF_EMAIL_editar"], $_GET["PROF_GEN_ID_editar"], $_GET["PROF_RUN_editar"]);			
	}
	//------------------------------------------ REGISTRAR--------------------------------------------------------------------------------	
	if(isset($_POST["PROF_RUN"]) && isset($_POST["PROF_PASS"]) && isset($_POST["PROF_NOMBRE"]) && isset($_POST["PROF_AP_PAT"]) && isset($_POST["PROF_AP_MAT"]) && isset($_POST["PROF_TELEFONO"]) && isset($_POST["PROF_DIRECCION"]) && isset($_POST["PROF_EMAIL"]) && isset($_POST["PROF_GEN_ID"])){
			$objFormulario->registrar($_POST["PROF_RUN"], $_POST["PROF_PASS"], $_POST["PROF_NOMBRE"], $_POST["PROF_AP_PAT"], $_POST["PROF_AP_MAT"], $_POST["PROF_TELEFONO"], $_POST["PROF_DIRECCION"], $_POST["PROF_EMAIL"], $_POST["PROF_GEN_ID"]);
			
		}	
	//-------------------------ELIMINAR USUARIO-------------------------	
	if(isset($_GET["eliminar"])){
		?>
			<script>
            	confirmar=confirm("¿Esta seguro de elimiar el registro?");
				if(confirmar){
					location.href="controlador_profesor.php?confirmacion=si&PROF_RUN=<?php echo $_GET["PROF_RUN"]; ?>";
				}else{
					location.href="../modificar/modificar_profesor.php";
				}
           </script>
		<?php
	}
	if(isset($_GET["confirmacion"])){
		$objFormulario->eliminar($_GET["PROF_RUN"]);
	}	
?>