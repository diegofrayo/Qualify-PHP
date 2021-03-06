<?php

//$root = "http://qualify.hol.es";
// $root = "/Qualify";
$root = "";

session_start();
if (!isset($_SESSION["usuario"])) {
	
	$_SESSION["usuario"] = "Visitante";
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport"
	content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1 ">
<meta charset="utf-8">

<title>Qualify.com</title>
<link rel="shortcut icon"
	href="<?php echo $root; ?>/media/img/favicon.png">

<link rel="stylesheet"
	href="<?php echo $root; ?>/media/css/reset-layout.css" type="text/css" />
<link rel="stylesheet"
	href="<?php echo $root; ?>/media/css/bootstrap.css" type="text/css" />
<link rel="stylesheet"
	href="<?php echo $root; ?>/media/css/bootstrap-responsive.css"
	type="text/css" />
<link rel="stylesheet"
	href="<?php echo $root; ?>/media/css/datepicker.css">
<link rel="stylesheet"
	href="<?php echo $root; ?>/media/css/template.css" type="text/css" />

<script src="<?php echo $root; ?>/media/js/jquery.js"></script>
<script src="<?php echo $root; ?>/media/js/bootstrap.js"></script>
<script src="<?php echo $root; ?>/media/js/bootstrap-datepicker.js"></script>
<script src="<?php echo $root; ?>/media/js/validation/validate.js"></script>
<script src="<?php echo $root; ?>/media/js/script.js"></script>

</head>

<body>

	<!-- Contenedor Global -->
	<div id="contenedorGlobal" class="row-fluid">

		<!-- Contenedor Lateral (Argollas) -->
		<div id="divArgollas"></div>

		<!-- Contenedor Lateral (Cuaderno) -->
		<div id="contenedorCuaderno">

			<!-- Header -->

			<?php
			require_once 'modules/header/ControladorHeader.php';
			?>

			<!-- Fin header -->

			<!-- Contenedor con la informacion de la app -->
			<div class="row-fluid">

				<div id="contenedorInformacion" class="span12">
					<div class="row-fluid">
						<!-- Aqui va el contenido generado por php -->

						<?php

						$controlador = "";
						$usuarioApp = $_SESSION["usuario"];

						if($usuarioApp == 'Visitante'){

							if(isset ($_GET['section'])){

								$controlador = strtolower($_GET['section']);
								
								switch($controlador){

									case 'home':
										
										require_once 'modules/home/ControladorHome.php';
										break;

									default:
										
										require_once 'error404.html';
										break;
								}
								
							}else{

								require_once 'modules/home/ControladorHome.php';
							}
							
						}else{

							if(isset ($_GET['section'])){

								$controlador = strtolower($_GET['section']);

								switch($controlador){

									case 'home':
										
										require_once 'modules/home/ControladorHome.php';
										break;

									case 'periodo':
										
										if(isset ($_GET['id'])){
											
											require_once 'modules/periodo/ControladorPeriodo.php';
											echo $_SESSION["script"];
										}else{

											require_once 'error404.html';
										}
										break;

									default:
										require_once 'error404.html';
										break;
								}
								
							}else{

								require_once 'modules/home/ControladorHome.php';
							}
							
							echo "<script>modificarTituloApp('".$usuarioApp['nick']."');</script>";
						}

						if (isset($_SESSION["mensajes"])) {

							echo $_SESSION["mensajes"];
						}
						
						$_SESSION["mensajes"] = '';
						$_SESSION["script"] = '';
						?>

						<!-- Termina el contenido generado por php -->
					</div>
				</div>
			</div>

			<!-- Footer -->
			<div class="row-fluid">
				<div id="footer" class="span12"></div>
			</div>
			<!-- Fin Footer -->
		</div>
	</div>

</body>
</html>
