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
			$this->mensajeExito="Duración Añadida con Exito";
			$this->mensajeError="Error al Añadir la Duración";
		}
		//-------------------------------------------REGISTRAR--------------------------------------------------------------------------------		
		function registrar($DUR_ID, $DUR_DESCRIP){
			
			$queryRegistrar = "insert into duracion (DUR_ID, DUR_DESCRIP) 
			values ('".$DUR_ID."', '".$DUR_DESCRIP."')";
			$registrar = mysqli_query($this->conn, $queryRegistrar) or die(mysqli_error());			
			
			if($registrar){
				echo "<script>location.href='../registrar/registrar_duracion.php?mensaje=". $this->mensajeExito."';</script>";				
			}else{
				echo "<script>location.href='../registrar/registrar_duracion.php?mensaje=".$this->mensajeError."';</script>";
			}
		}		
		//------------------------------------------LISTAR---------------------------------------------------------------------------------
		function listar(){
			$sql="select * from duracion";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "No hay Duración";	
			}else{
			 echo "<table border='0' align='center' class='table_' >";
			 echo "<thead>
					<th>ID</th>
					<th>Descripcion</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead>";
			 while ($row = mysqli_fetch_array($rs)){	 								
			echo "<td align='center'>".$row["DUR_ID"]."</td>";
			echo "<td align='center'>".$row["DUR_DESCRIP"]."</td>";
						
			echo '<td align="center">
			<a class="fancybox fancybox.iframe" href="../editar/editar_duracion.php?DUR_ID='.$row["DUR_ID"].'&DUR_DESCRIP='.$row["DUR_DESCRIP"].'" >Editar</a></td>';
			echo "<td><a href='../control/controlador_duracion.php?eliminar=si&DUR_ID=".$row["DUR_ID"]."'>Eliminar</a></td></tr>";
			$i++; 
			}			
			}
			echo "</table>";
		}
		//---------------------------------------------MODIFICAR USUARIO------------------------------------------------------------------------------
		function modificarUsuario($DUR_ID, $DUR_DESCRIP){
			$queryUpdate = "update duracion set DUR_ID = '".$DUR_ID."', DUR_DESCRIP = '".$DUR_DESCRIP."'  where DUR_ID = ".$DUR_ID;
			$update =mysqli_query($this->conn, $queryUpdate);
			if($update){
				echo "Actualizacion Exitosa";
			}else{
				echo "Error Al Actualizar";
				}
		}
		//---------------------------------------------ELIMINAR------------------------------------------------------------------------------
		function eliminar($pk){
			$queryDelete = "delete from duracion where DUR_ID = ".$pk;
			$delete =mysqli_query($this->conn, $queryDelete);
			if($delete){						
				echo "<script>
						alert('Eliminacion exitosa');
						location.href='../modificar/modificar_duracion.php';
				</script>";				
			}else{
				echo "<script>
						alert('Error Al Eliminar');
						location.href='../modificar/modificar_duracion.php';
				</script>";	
				}
		}
		//------------------------------BUSCAR--------------------------------------------------------------------------------
		function buscar($dato){
			$sql="select * 
			from duracion
			where DUR_ID like '%".$dato."%' OR DUR_DESCRIP like '%".$dato."%'";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "La busqueda no obtuvo resultados.";	
			}else{
			echo "<table border='0' align='center' class='table_' ><thead>
					<th>ID</th>
					<th>Descripción</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead><tbody>";
			 while ($row = mysqli_fetch_array($rs)){	 								
			echo "<tr><td align='center'>".$row["DUR_ID"]."</td>";
			echo "<td align='center'>".$row["DUR_DESCRIP"]."</td>";
			echo '<td align="center">
			<a class="fancybox fancybox.iframe" href="../editar/editar_duracion.php?DUR_ID='.$row["DUR_ID"].'&DUR_DESCRIP='.$row["DUR_DESCRIP"].'" >Editar</a></td>';
			echo "<td><a href='../control/controlador_duracion.php?eliminar=si&codigo=".$row["DUR_ID"]."'>Eliminar</a></td></tr>";
			$i++; 
			}			
			}
			echo "</tbody></table>";
		}
	}
?>