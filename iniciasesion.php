<?php 
if (empty($mensaje)) {
	session_start();
	if (isset($_SESSION['usuario'])) {
		header('Location: verifica.php');
	}
}

include "cabecera.php";
?>
<h1 style="color: white">Iniciar Sesion</h1>
<span>o<a href="registrar.php">registrar</a></span>
<body>
	<div class="datos" >
	<form action="controladorsesion.php" method="GET" class="datos">
		<input type="text" name="nombre" placeholder="Nombre" value="">
		<input type="password" name="contraseña" placeholder="contraseña" value="">
		<input type="submit" value="Ingresar">
		<?php  if (!empty($mensaje)){ ?>
			<div>
				<?php echo $mensaje; ?>
			</div>
		<?php } ?>

	</form>
	</div>
</body>