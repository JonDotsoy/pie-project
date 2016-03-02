<!doctype html>
<html lang="es">

<head>
	<meta charset="utf-8"/>
	<title>Añadir Alumno</title>
	
	
	<link rel="stylesheet" href="../css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="../js/hideshow.js" type="text/javascript"></script>
	<script src="../js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>

<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="../index.php">PIE</a></h1>
			<h2 class="section_title">Administracion</h2>
		</hgroup>
	</header> <!-- end of header bar -->
<!-- ----------------------------------------------->
<!-- ----------------------------------------------->
<!-- -----------TERMINA EL HEADER------------------->
<!-- ----------------------------------------------->
<!-- ----------------------------------------------->
	
	<section id="secondary_bar">
		<div class="user">
			<p>John Doe (<a href="#">3 Messages</a>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php">PIE</a> <div class="breadcrumb_divider"></div> <a class="current">Registrar Profesor</a></article>
		</div>
	</section><!-- end of secondary bar -->

	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Busqueda" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<?php
			include('../hsf/side1.php');
		?>
		<?php
			include('../hsf/side2.php');
		?>
		<?php
			include('../hsf/side3.php');
		?>
		<?php
			include('../hsf/footer.php');
		?>
		
	</aside><!-- end of sidebar -->
<!-- ----------------------------------------------->
<!-- ----------------------------------------------->
<!-- -----------TERMINA EL SIDEBAR------------------>
<!-- ----------------------------------------------->
<!-- ----------------------------------------------->

<?php 
	require('../modelo/modelo_alumno.php');
	$objModelo = new Formulario();
?>
	<section id="main" class="column">
		
		<h4 class="alert_info">Bienvenido a PIE.</h4>
		
		<article class="module width_full">
			<header><h3>Añadir Alumno</h3></header>
			<form action="../control/controlador_alumno.php" method="post" enctype="multipart/form-data">    
    	<div style="text-align:center; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; color:#0;">
        	<h2></h2>
            <label>RUN</label><br />
            <input type="text" name="run" id="run" value="" required="required" /><br />
            <label>Nombre</label><br />
            <input type="text" value="" name="nombre" id="nombre" required="required" /><br />
            <label>Apellido Paterno</label><br />
            <input type="text" name="appat" id="appat" value="" required="required" /><br />
            <label>Apellido Materno</label><br />
            <input type="text" name="apmat" id="apmat" value="" required="required" /><br />
            <label>Direccion</label><br />
            <input type="text" name="direccion" id="direccion" value="" required="required" /><br />
			<label>Genero</label><br />
			<select name="genero" id="genero" required="required">
				<option selected="selected"></option>
				<option value="M">Masculino</option>
				<option value="F">Femenino</option>
			</select>
			<br />
			<label>Curso</label><br />
			<select name="curso" id="curso" required="required">
				<option selected="selected"></option>
				<option value="1">Primero Basico</option>
				
				<option value="2">Segundo Basico</option>
				
				<option value="3">Tercero Basico</option>
				
				<option value="4">Cuarto Basico</option>
				
				<option value="5">Quinto Basico</option>
				
				<option value="6">Sexto Basico</option>
				
				<option value="7">Septimo Basico</option>
				
				<option value="8">Octavo Basico</option>
				
			</select>
			<select name="letra" id="letra" required="required">
				<option selected="selected"></option>
				<option value="A">A</option>
				<option value="B">B</option>
				
			</select>
			<br /><br />
			
            <input type="submit" value="Registrar" />
            <?php 
            if(isset($_GET["mensaje"])){
            	echo "<center>".$_GET["mensaje"]."</center>";
            }
            ?>            
            <br /><br />
    </div>
    </form>
		</article><!-- end of stats article -->
		
		


</body>

</html>