<?php 

	require_once "conexion.php";
	$conexion=conexion();

		$nombre=$_POST['nombre'];
		$apellidopaterno=$_POST['apellidopaterno'];
		$apellidomaterno=$_POST['apellidomaterno'];
		$sexo=$_POST['sexo'];
		$telefono=$_POST['telefono'];
		$correo=$_POST['correo'];
		$usuario=$_POST['usuario'];
		$password=sha1($_POST['password']);

		if(buscaRepetido($usuario,$password,$conexion)==1){
			echo 2;
		}else{
			$sql="INSERT INTO t_registro (nombre,apellidopaterno,apellidomaterno,sexo,correo,usuario,password)

																		values ('$nombre','$apellidopaterno',
																		'$apellidomaterno','$sexo','$correo',
																		'$usuario','$password')";
			echo $result=mysqli_query($conexion,$sql);
		}


		function buscaRepetido($user,$pass,$conexion){
			$sql="SELECT * from t_registro
				where usuario='$user' and password='$pass'";
			$result=mysqli_query($conexion,$sql);

			if(mysqli_num_rows($result) > 0){
				return 1;
			}else{
				return 0;
			}
		}

?>