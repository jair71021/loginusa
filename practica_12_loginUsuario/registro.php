<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<?php require_once "libreria.php"; ?>
</head>
<body>
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-danger">
				<div class="panel panel-heading">Registro de usuario</div>
				<div class="panel panel-body">
					<form  id="frmRegistros">
						<label>Nombre</label>
					<input type="text" class="form-control input-sm" id="nombre" >
					<label>Apellido Parteno</label>
					<input type="text" class="form-control input-sm" id="apellidopaterno">
					<label>Apellido Marteno</label>
					<input type="text" class="form-control input-sm" id="apellidomaterno" >
					<label>Sexo</label>
					<input type="text" class="form-control input-sm" id="sexo" >
					<label>Telfono</label>
					<input type="text" class="form-control input-sm" id="telefono" >
					<label>Email</label>
					<input type="text" class="form-control input-sm" id="correo" >
					<label>Usuario</label>
					<input type="text" class="form-control input-sm" id="usuario" >
					<label>Password</label>
					<input type="text" class="form-control input-sm" id="password" >
					<p></p>
					<span class="btn btn-primary" id="registrarNuevos">Registrar</span>
					</form>
					<div style="text-align: right;">
						<a href="index.php" class="btn btn-info">Login</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registrarNuevos').click(function(){

			if($('#nombre').val()==""){
				alertify.alert("Debes agregar el nombre");
				return false;
			}else if($('#apellidopaterno').val()==""){
				alertify.alert("Debes agregar el apellido paterno");
				return false;
			}else if($('#apellidomaterno').val()==""){
				alertify.alert("Debes agregar el apellido materno");
				return false;
			}else if($('#sexo').val()==""){
				alertify.alert("Debes agregar tu genero");
				return false;
			}else if($('#telefono').val()==""){
				alertify.alert("Debes agregar tu telefono");
				return false;
			}else if($('#correo').val()==""){
				alertify.alert("Debes agregar un correo");
				return false;
			}else if($('#usuario').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}

			cadena="nombre=" + $('#nombre').val() +
					"&apellidopaterno=" + $('#apellidopaterno').val() +
					"&apellidomaterno=" + $('#apellidomaterno').val() +
					"&sexo=" + $('#sexo').val() +
					"&telefono=" + $('#telefono').val() +
					"&correo=" + $('#correo').val() +
					"&usuario=" + $('#usuario').val() + 
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"servidor/registro.php",
						data:cadena,
						success:function(r){

							if(r==2){
								alertify.alert("Este usuario ya existe, prueba con otro :)");
							}
							else if(r==1){
								$('#frmRegistros')[0].reset();
								alertify.success("Agregado con exito");
							}else{
								alertify.error("Fallo al agregar");
							}
						}
					});
		});
	});
</script>

