<link href="../css/estilos_tabla.css" rel="stylesheet" type="text/css" />
<?php
	require "../conexion/conexion.php";
	class Formulario{
		var $conn;
		var $conexion;
		var $mensajeExito;
		var $mensajeError;
		function Formulario(){
			$this->conexion= new  Conexion();				
			$this->conn=$this->conexion->conectarse();
			$this->mensajeExito="Actividad Añadida con Exito";
			$this->mensajeError="Error al Añadir la Actividad";
		}
		//-------------------------------------------REGISTRAR--------------------------------------------------------------------------------		
		function registrar($ACT_ID, $ACT_DESCRIP, $ACT_PROF_RUN, $ACT_ALU_RUN, $ACT_TAC_ID, $ACT_CAL_ID){
			
			$queryRegistrar = "insert into actividad (ACT_ID, ACT_DESCRIP, ACT_PROF_RUN, ACT_ALU_RUN, ACT_TAC_ID, ACT_CAL_ID) 
			values ('".$ACT_ID."', '".$ACT_DESCRIP."', '".$ACT_PROF_RUN."', '".$ACT_ALU_RUN."', '".$ACT_TAC_ID."', '".$ACT_CAL_ID."')";
			$registrar = mysqli_query($this->conn, $queryRegistrar) or die(mysqli_error());			
			
			if($registrar){
				echo "<script>location.href='../registrar/registrar_actividad.php?mensaje=". $this->mensajeExito."';</script>";
			}else{
				echo "<script>location.href='../registrar/registrar_actividad.php?mensaje=".$this->mensajeError."';</script>";
			}
		}		
		//------------------------------------------LISTAR---------------------------------------------------------------------------------
		function listar(){
			$sql="select * from actividad";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "No Existen Alumnos";	
			}else{
			 echo "<table border='0' align='center' class='table_' >";
			 echo "<thead>
					<th>Id</th>
					<th>Descripcion</th>
					<th>RUN del Profesor</th>
					<th>RUN del Alumno</th>
					<th>Tipo de Calificacion</th>
					<th>Calificacion</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead>";
			 while ($row = mysqli_fetch_array($rs)){	 								
			echo "<td align='center'>".$row["ACT_ID"]."</td>";
			echo "<td align='center'>".$row["ACT_DESCRIP"]."</td>";
			echo "<td align='center'>".$row["ACT_PROF_RUN"]."</td>";
			echo "<td align='center'>".$row["ACT_ALU_RUN"]."</td>";
			echo "<td align='center'>".$row["ACT_TAC_ID"]."</td>";
			echo "<td align='center'>".$row["ACT_CAL_ID"]."</td>";
						
			echo '<td align="center">
			<a class="fancybox fancybox.iframe" href="../fancyBoxModificar/fancyBoxModificar_actividad.php?ACT_ID='.$row["ACT_ID"].'&ACT_DESCRIP='.$row["ACT_DESCRIP"].'&ACT_PROF_RUN='.$row["ACT_PROF_RUN"].'&ACT_ALU_RUN='.$row["ACT_ALU_RUN"].'&ACT_TAC_ID='.$row["ACT_TAC_ID"].'&ACT_CAL_ID='.$row["ACT_CAL_ID"].'" >Editar</a></td>';
			echo "<td><a href='../control/controlador_actividad.php?eliminar=si&ACT_ID=".$row["ACT_ID"]."'>Eliminar</a></td></tr>";
			$i++; 
			}			
			}
			echo "</table>";
		}
		//---------------------------------------------MODIFICAR USUARIO------------------------------------------------------------------------------
		function modificarUsuario($ACT_ID, $ACT_DESCRIP, $ACT_PROF_RUN, $ACT_ALU_RUN, $ACT_TAC_ID, $ACT_CAL_ID, $pk){
			$queryUpdate = "update actividad set ACT_ID = '".$ACT_ID."', ACT_DESCRIP = '".$ACT_DESCRIP."', ACT_PROF_RUN = '".$ACT_PROF_RUN."', ACT_ALU_RUN = '".$ACT_ALU_RUN."',  ACT_TAC_ID = '".$ACT_TAC_ID."', ACT_CAL_ID = '".$ACT_CAL_ID."'  where ACT_ID = ".$pk;
			$update =mysqli_query($this->conn, $queryUpdate);
			if($update){
				echo "Actualizacion Exitosa";
			}else{
				echo "Error Al Actualizar";
				}
		}
		//---------------------------------------------ELIMINAR------------------------------------------------------------------------------
		function eliminar($pk){
			$queryDelete = "delete from alumno where ACT_ID = ".$pk;
			$delete =mysqli_query($this->conn, $queryDelete);
			if($delete){						
				echo "<script>
						alert('Eliminacion exitosa');
						location.href='../modificar/modificar_actividad.php';
				</script>";				
			}else{
				echo "<script>
						alert('Error Al Eliminar');
						location.href='../modificar/modificar_actividad.php';
				</script>";	
				}
		}
		//------------------------------BUSCAR--------------------------------------------------------------------------------
		function buscar($dato){
			$sql="select * 
			from actividad
			where ACT_ID like '%".$dato."%' OR ACT_DESCRIP like '%".$dato."%' OR ACT_PROF_RUN like '%".$dato."%' OR ACT_ALU_RUN like '%".$dato."%' OR ACT_TAC_ID like '%".$dato."%' OR ACT_CAL_ID like '%".$dato."%'";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "La busqueda no obtuvo resultados.";	
			}else{
			echo "<table border='0' align='center' class='table_' ><thead>
					<th>Id</th>
					<th>Descripcion</th>
					<th>RUN del Profesor</th>
					<th>RUN del Alumno</th>
					<th>Tipo de Calificacion</th>
					<th>Calificacion</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead><tbody>";
			 while ($row = mysqli_fetch_array($rs)){	 								
			echo "<td align='center'>".$row["ACT_ID"]."</td>";
			echo "<td align='center'>".$row["ACT_DESCRIP"]."</td>";
			echo "<td align='center'>".$row["ACT_PROF_RUN"]."</td>";
			echo "<td align='center'>".$row["ACT_ALU_RUN"]."</td>";
			echo "<td align='center'>".$row["ACT_TAC_ID"]."</td>";
			echo "<td align='center'>".$row["ACT_CAL_ID"]."</td>";
			
			echo '<td align="center">
			<a class="fancybox fancybox.iframe" href="../fancyBoxModificar/fancyBoxModificar_actividad.php?ACT_ID='.$row["ACT_ID"].'&ACT_DESCRIP='.$row["ACT_DESCRIP"].'&ACT_PROF_RUN='.$row["ACT_PROF_RUN"].'&ACT_ALU_RUN='.$row["ACT_ALU_RUN"].'&ACT_TAC_ID='.$row["ACT_TAC_ID"].'&ACT_CAL_ID='.$row["ACT_CAL_ID"].'" >Editar</a></td>';
			echo "<td><a href='../control/controlador_actividad.php?eliminar=si&ACT_ID=".$row["ACT_ID"]."'>Eliminar</a></td></tr>";
			$i++; 
			}			
			}
			echo "</tbody></table>";
		}
	}
?>