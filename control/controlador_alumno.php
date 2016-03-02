<?php 
	require("../modelo/modelo_alumno.php");
	$objFormulario = new Formulario();
	$mensajeExito="Registro Exitoso";
	$mensajeError="Error al Registrar: Datos Incompletos";	
	//-------------------------------------------EDITAR--------------------------------------------------------------------------------	
	if(isset($_POST["run_editar"]) && isset($_POST["nombre_editar"]) && isset($_POST["appat_editar"]) && isset($_POST["apmat_editar"]) && isset($_POST["direccion_editar"]) && isset($_POST["genero_editar"]) && isset($_POST["curso_editar"])){
			$objFormulario->modificarUsuario($_GET["run_editar"], $_GET["pass_editar"], $_GET["nombre_editar"], $_GET["appat_editar"], $_GET["apmat_editar"], $_GET["tel_editar"], $_GET["direccion_editar"], $_GET["email_editar"], $_GET["genero_editar"]);			
	}
	//------------------------------------------ REGISTRAR--------------------------------------------------------------------------------	
	if(isset($_POST["run"]) && isset($_POST["nombre"]) && isset($_POST["appat"]) && isset($_POST["apmat"]) && isset($_POST["direccion"]) && isset($_POST["genero"]) && isset($_POST["curso"])&& isset($_POST["letra"])){
			$objFormulario->registrar($_POST["run"], $_POST["nombre"], $_POST["appat"], $_POST["apmat"], $_POST["direccion"], $_POST["genero"],$_POST["curso"],$_POST["letra"]);
			
		}	
	//-------------------------ELIMINAR USUARIO-------------------------	
	if(isset($_GET["eliminar"])){
		?>
			<script>
            	confirmar=confirm("¿Esta seguro de eliminar el registro?");
				if(confirmar){
					location.href="controlador_alumno.php?confirmacion=si&ALU_RUN=<?php echo $_GET["run"]; ?>";
				}else{
					location.href="../modificar/modificar_alumno.php";
				}
           </script>
		<?php
	}
	if(isset($_GET["confirmacion"])){
		$objFormulario->eliminar($_GET["ALU_RUN"]);
	}	
?>