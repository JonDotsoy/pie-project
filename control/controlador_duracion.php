<?php 
	require("../modelo/modelo_duracion.php");
	$objFormulario = new Formulario();
	$mensajeExito="Registro Creado con Exito";
	$mensajeError="Error al Registrar: Datos Incompletos";	
	//-------------------------------------------EDITAR--------------------------------------------------------------------------------	
	if(isset($_POST["DUR_ID_editar"]) && isset($_POST["DUR_DESCRIP_editar"])){
			$objFormulario->modificarUsuario($_GET["DUR_ID_editar"], $_GET["DUR_DESCRIP_editar"]);			
	}
	//------------------------------------------ REGISTRAR--------------------------------------------------------------------------------	
	if(isset($_POST["DUR_ID"]) && isset($_POST["DUR_DESCRIP"])){
			$objFormulario->registrar($_POST["DUR_ID"], $_POST["DUR_DESCRIP"]);
			
		}	
	//-------------------------ELIMINAR USUARIO-------------------------	
	if(isset($_GET["eliminar"])){
		?>
			<script>
            	confirmar=confirm("¿Esta seguro de elimiar el registro?");
				if(confirmar){
					location.href="controlador_duracion.php?confirmacion=si&DUR_ID=<?php echo $_GET["DUR_ID"]; ?>";
				}else{
					location.href="../modificar/modificar_duracion.php";
				}
           </script>
		<?php
	}
	if(isset($_GET["confirmacion"])){
		$objFormulario->eliminar($_GET["DUR_ID"]);
	}	
?>