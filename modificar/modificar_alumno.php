<!doctype html>
<html lang="es">

<head>
	<meta charset="utf-8"/>
	<title>Alumnos</title>
	
	
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
			<article class="breadcrumbs"><a href="../index.php">PIE</a> <div class="breadcrumb_divider"></div> <a class="current">Alumnos Existentes</a></article>
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
	require("../modelo/modelo_alumno.php");
	$objModelo = new Formulario();
?>
<?php
	require '../ventana/ventana.php';
?>
<!-- ----------------------------------------------->
<!-- ----------------------------------------------->
<!-- -----------EDITAR EN VENTANA ------------------>
<!-- ---------------EMERGENTE----------------------->
<!-- ----------------------------------------------->

	<section id="main" class="column">
		
		<h4 class="alert_info">Bienvenido a PIE.</h4>
		
		<article class="module width_full">
			<header><h3>Alumnos</h3></header>
			
			
			<form action="" method="post">
      <div style="text-align:center; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; color:#0;">
        <h1 align="center">Editar Informacion</h1>
        <input type="text" name="boxBuscar" id="boxBuscar" autofocus="autofocus" value="" placeholder="Ingrese un dato." />
        <input type="submit" name="botonBuscar" value="Buscar" id="botonBuscar" />
        <input type="submit" name="botonListar" value="Listar Todos" id="botonListar" />
        <br />
        <br />
        <?php 
			//----------------------BUSCAR USUARIO---------------------------------------------------------------------------	
	if(isset($_POST["botonBuscar"]) && $_POST["boxBuscar"]!=""){
			$objModelo->buscar($_POST["boxBuscar"]);
	}else{
			$objModelo->listar(); 
	}
			?>
        <br />
        <br />
      </div>
    </form>
			
			
		</article><!-- end of stats article -->


</body>

</html>