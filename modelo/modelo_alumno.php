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
			$this->mensajeExito="Alumno Añadido con Exito";
			$this->mensajeError="Error al Añadir al Alumno";
		}
		//-------------------------------------------REGISTRAR--------------------------------------------------------------------------------		
		function registrar($run, $nombre, $appat, $apmat, $direccion, $genero, $curso, $letra){
			
			$queryRegistrar = "insert into alumno (ALU_RUN, ALU_NOMBRE, ALU_AP_PAT, ALU_AP_MAT, ALU_DIRECCION, ALU_GEN_ID, ALU_CURSO_ID) 
			values ('".$run."', '".$nombre."', '".$appat."', '".$apmat."', '".$direccion."', '".$genero."', '".$curso.$letra."')";
			$registrar = mysqli_query($this->conn, $queryRegistrar) or die(mysqli_error());			
			
			if($registrar){
				echo "<script>location.href='../registrar/registrar_alumno.php?mensaje=". $this->mensajeExito."';</script>";				
			}else{
				echo "<script>location.href='../registrar/registrar_alumno.php?mensaje=".$this->mensajeError."';</script>";
			}
		}		
		//------------------------------------------LISTAR---------------------------------------------------------------------------------
		function listar(){
			$sql="select * from alumno";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "No Existen Alumnos";	
			}else{
			 echo "<table border='0' align='center' class='table_' >";
			 echo "<thead>
					<th>RUN</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Direccion</th>
					<th>Genero</th>
					<th>Curso</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead>";
			 while ($row = mysqli_fetch_array($rs)){	 								
			echo "<td align='center'>".$row["ALU_RUN"]."</td>";
			echo "<td align='center'>".$row["ALU_NOMBRE"]."</td>";
			echo "<td align='center'>".$row["ALU_AP_PAT"]."</td>";
			echo "<td align='center'>".$row["ALU_AP_MAT"]."</td>";
			echo "<td align='center'>".$row["ALU_DIRECCION"]."</td>";
			echo "<td align='center'>".$row["ALU_GEN_ID"]."</td>";
			echo "<td align='center'>".$row["ALU_CURSO_ID"]."</td>";
						
			echo '<td align="center">
			<a class="fancybox fancybox.iframe" href="../editar/editar_alumno.php?RUN='.$row["ALU_RUN"].'&nombre='.$row["ALU_NOMBRE"].'&Apellido Paterno='.$row["ALU_AP_PAT"].'&Apellido Materno='.$row["ALU_AP_MAT"].'&Direccion='.$row["ALU_DIRECCION"].'&Genero='.$row["ALU_GEN_ID"].'&Curso='.$row["ALU_CURSO_ID"].'" >Editar</a></td>';
			echo "<td><a href='../control/controlador_alumno.php?eliminar=si&run=".$row["ALU_RUN"]."'>Eliminar</a></td></tr>";
			$i++; 
			}			
			}
			echo "</table>";
		}
		//---------------------------------------------MODIFICAR USUARIO------------------------------------------------------------------------------
		function modificarUsuario($run, $pass, $nombre, $appat, $apmat, $tel, $direccion, $email, $genero, $pk){
			$queryUpdate = "update profesor set PROF_RUN = '".$run."', PROF_PASS = '".$pass."', PROF_NOMBRE = '".$nombre."', PROF_AP_PAT = '".$appat."',  PROF_AP_MAT = '".$apmat."', PROF_TELEFONO = '".$tel."', PROF_DIRECCION = '".$direccion."', PROF_EMAIL = '".$email."', PROF_GEN_ID = '".$genero."'  where PROF_RUN = ".$pk;
			$update =mysqli_query($this->conn, $queryUpdate);
			if($update){
				echo "Actualizacion Exitosa";
			}else{
				echo "Error Al Actualizar";
				}
		}
		//---------------------------------------------ELIMINAR------------------------------------------------------------------------------
		function eliminar($pk){
			$queryDelete = "delete from alumno where ALU_RUN = ".$pk;
			$delete =mysqli_query($this->conn, $queryDelete);
			if($delete){						
				echo "<script>
						alert('Eliminacion exitosa');
						location.href='../modificar/modificar_alumno.php';
				</script>";				
			}else{
				echo "<script>
						alert('Error Al Eliminar');
						location.href='../modificar/modificar_alumno.php';
				</script>";	
				}
		}
		//------------------------------BUSCAR--------------------------------------------------------------------------------
		function buscar($dato){
			$sql="select * 
			from alumno
			where ALU_RUN like '%".$dato."%' OR ALU_NOMBRE like '".$dato."%' OR ALU_AP_PAT like '".$dato."%' OR ALU_AP_MAT like '".$dato."%' OR ALU_DIRECCION like '%".$dato."%' OR ALU_GEN_ID like '".$dato."'OR ALU_CURSO_ID like '%".$dato."%'";
			$rs=mysqli_query($this->conn, $sql);
			$i=0;
			if(mysqli_num_rows($rs)<1){
				echo "La busqueda no obtuvo resultados.";	
			}else{
			echo "<table border='0' align='center' class='table_' ><thead>
					<th>RUN</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Direccion</th>
					<th>Genero</th>
					<th>Curso</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				</thead><tbody>";
			 while ($row = mysqli_fetch_array($rs)){	 								
			echo "<tr><td align='center'>".$row["ALU_RUN"]."</td>";
			echo "<td align='center'>".$row["ALU_NOMBRE"]."</td>";
			echo "<td align='center'>".$row["ALU_AP_PAT"]."</td>";
			echo "<td align='center'>".$row["ALU_AP_MAT"]."</td>";
			echo "<td align='center'>".$row["ALU_DIRECCION"]."</td>";
			echo "<td align='center'>".$row["ALU_GEN_ID"]."</td>";
			echo "<td align='center'>".$row["ALU_CURSO_ID"]."</td>";
			echo '<td align="center">
			<a class="fancybox fancybox.iframe" href="../editar/editar_alumno.php?run='.$row["ALU_RUN"].'&nombre='.$row["ALU_NOMBRE"].'&Apellido Paterno='.$row["ALU_AP_PAT"].'&Apellido Materno='.$row["ALU_AP_MAT"].'&Direccion='.$row["ALU_DIRECCION"].'&Genero='.$row["ALU_GEN_ID"].'&Curso='.$row["ALU_CURSO_ID"].'" >Editar</a></td>';
			echo "<td><a href='../control/controlador_alumno.php?eliminar=si&run=".$row["ALU_RUN"]."'>Eliminar</a></td></tr>";
			$i++; 
			}			
			}
			echo "</tbody></table>";
		}
	}
?>