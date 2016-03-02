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
			$this->mensajeExito="Registro Exitoso";
			$this->mensajeError="Error al Registrar";
		}
		//-------------------------------------------REGISTRAR--------------------------------------------------------------------------------		
		function registrar($PROF_RUN, $PROF_PASS, $PROF_NOMBRE, $PROF_AP_PAT, $PROF_AP_MAT, $PROF_TELEFONO, $PROF_DIRECCION, $PROF_EMAIL, $PROF_GEN_ID){
			
			$queryRegistrar = "insert into profesor (PROF_RUN, PROF_PASS, PROF_NOMBRE, PROF_AP_PAT, PROF_AP_MAT, PROF_TELEFONO, PROF_DIRECCION, PROF_EMAIL, PROF_GEN_ID) 
			values ('".$PROF_RUN."', '".$PROF_PASS."', '".$PROF_NOMBRE."', '".$PROF_AP_PAT."', '".$PROF_AP_MAT."', '".$PROF_TELEFONO."', '".$PROF_DIRECCION."', '".$PROF_EMAIL."', '".$PROF_GEN_ID."')";
			$registrar = mysqli_query($this->conn, $queryRegistrar) or die(mysqli_error());			
			
			if($registrar){
				echo "<script>location.href='../registrar/registrar_profesor.php?mensaje=". $this->mensajeExito."';</script>";				
			}else{
				echo "<script>location.href='../registrar/registrar_profesor.php?mensaje=".$this->mensajeError."';</script>";
			}
		}		
		//------------------------------------------LISTAR---------------------------------------------------------------------------------
		function listar(){
			$sql="select * from profesor";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "No hay profesores registrados";	
			}else{
			 echo "<table border='0' align='center' class='table_' >";
			 echo "<thead>
					<th>RUN</th>
					<th>pass</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Telefono</th>
					<th>Direccion</th>
					<th>e-mail</th>
					<th>Genero</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead>";
			 while ($row = mysqli_fetch_array($rs)){	 								
			echo "<td align='center'>".$row["PROF_RUN"]."</td>";
			echo "<td align='center'>".$row["PROF_PASS"]."</td>";
			echo "<td align='center'>".$row["PROF_NOMBRE"]."</td>";
			echo "<td align='center'>".$row["PROF_AP_PAT"]."</td>";
			echo "<td align='center'>".$row["PROF_AP_MAT"]."</td>";
			echo "<td align='center'>".$row["PROF_TELEFONO"]."</td>";
			echo "<td align='center'>".$row["PROF_DIRECCION"]."</td>";
			echo "<td align='center'>".$row["PROF_EMAIL"]."</td>";
			echo "<td align='center'>".$row["PROF_GEN_ID"]."</td>";
						
			echo '<td align="center">
			<a class="fancybox fancybox.iframe" href="../fancyBoxModificar/fancyBoxModificar_profesor.php?PROF_RUN='.$row["PROF_RUN"].'&PROF_PASS='.$row["PROF_PASS"].'&PROF_NOMBRE='.$row["PROF_NOMBRE"].'&PROF_AP_PAT='.$row["PROF_AP_PAT"].'&PROF_AP_MAT='.$row["PROF_AP_MAT"].'&PROF_TELEFONO='.$row["PROF_TELEFONO"].'&PROF_DIRECCION='.$row["PROF_DIRECCION"].'&PROF_EMAIL='.$row["PROF_EMAIL"].'&PROF_GEN_ID='.$row["PROF_GEN_ID"].'" >Editar</a></td>';
			echo "<td><a href='../control/controlador_profesor.php?eliminar=si&PROF_RUN=".$row["PROF_RUN"]."'>Eliminar</a></td></tr>";
			$i++; 
			}			
			}
			echo "</table>";
		}
		//---------------------------------------------MODIFICAR USUARIO------------------------------------------------------------------------------
		function modificarUsuario($PROF_PASS, $PROF_NOMBRE, $PROF_AP_PAT, $PROF_AP_MAT, $PROF_TELEFONO, $PROF_DIRECCION, $PROF_EMAIL, $PROF_GEN_ID, $PROF_RUN){
			$queryUpdate = "update profesor set PROF_PASS = '".$PROF_PASS."', PROF_NOMBRE = '".$PROF_NOMBRE."', PROF_AP_PAT = '".$PROF_AP_PAT."',  PROF_AP_MAT = '".$PROF_AP_MAT."', PROF_TELEFONO = '".$PROF_TELEFONO."', PROF_DIRECCION = '".$PROF_DIRECCION."', PROF_EMAIL = '".$PROF_EMAIL."', PROF_GEN_ID = '".$PROF_GEN_ID."'  where PROF_RUN = ".$PROF_RUN;
			$update =mysqli_query($this->conn, $queryUpdate);
			if($update){
				echo "Actualizacion Exitosa";
			}else{
				echo "Error Al Actualizar";
				}
		}
		//---------------------------------------------ELIMINAR------------------------------------------------------------------------------
		function eliminar($pk){
			$queryDelete = "delete from profesor where PROF_RUN = ".$pk;
			$delete =mysqli_query($this->conn, $queryDelete);
			if($delete){						
				echo "<script>
						alert('Eliminacion exitosa');
						location.href='../modificar/modificar_profesor.php';
				</script>";				
			}else{
				echo "<script>
						alert('Error Al Eliminar');
						location.href='../modificar/modificar_profesor.php';
				</script>";	
				}
		}
		//------------------------------BUSCAR--------------------------------------------------------------------------------
		function buscar($dato){
			$sql="select * 
			from profesor
			where PROF_RUN like '%".$dato."%' OR PROF_PASS like '".$dato."' OR PROF_NOMBRE like '".$dato."%' OR PROF_AP_PAT like '".$dato."%' OR PROF_AP_MAT like '".$dato."%' OR PROF_TELEFONO like '%".$dato."%' OR PROF_DIRECCION like '%".$dato."%' OR PROF_EMAIL like '%".$dato."%' OR PROF_GEN_ID like '".$dato."'";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "La busqueda no obtuvo resultados.";	
			}else{
			echo "<table border='0' align='center' class='table_' ><thead>
					<th>RUN</th>
					<th>pass</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Telefono</th>
					<th>Direccion</th>
					<th>e-mail</th>
					<th>Genero</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead><tbody>";
			 while ($row = mysqli_fetch_array($rs)){	 								
			echo "<tr><td align='center'>".$row["PROF_RUN"]."</td>";
			echo "<td align='center'>".$row["PROF_PASS"]."</td>";
			echo "<td align='center'>".$row["PROF_NOMBRE"]."</td>";
			echo "<td align='center'>".$row["PROF_AP_PAT"]."</td>";
			echo "<td align='center'>".$row["PROF_AP_MAT"]."</td>";
			echo "<td align='center'>".$row["PROF_TELEFONO"]."</td>";
			echo "<td align='center'>".$row["PROF_DIRECCION"]."</td>";
			echo "<td align='center'>".$row["PROF_EMAIL"]."</td>";
			echo "<td align='center'>".$row["PROF_GEN_ID"]."</td>";
			echo '<td align="center">
			<a class="fancybox fancybox.iframe" href="../fancyBoxModificar/fancyBoxModificar_profesor.php?PROF_RUN='.$row["PROF_RUN"].'&PROF_PASS='.$row["PROF_PASS"].'&PROF_NOMBRE='.$row["PROF_NOMBRE"].'&PROF_AP_PAT='.$row["PROF_AP_PAT"].'&PROF_AP_MAT='.$row["PROF_AP_MAT"].'&PROF_TELEFONO='.$row["PROF_TELEFONO"].'&PROF_DIRECCION='.$row["PROF_DIRECCION"].'&PROF_EMAIL='.$row["PROF_EMAIL"].'&PROF_GEN_ID='.$row["PROF_GEN_ID"].'" >Editar</a></td>';
			echo "<td><a href='../control/controlador_profesor.php?eliminar=si&PROF_RUN=".$row["PROF_RUN"]."'>Eliminar</a></td></tr>";
			$i++; 
			}			
			}
			echo "</tbody></table>";
		}
	}
?>