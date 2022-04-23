<?php
$usuario=$_POST['Usuario'];
$clave=$_POST['Clave'];
session_start();
$_SESSION['usuario'] = $usuario;
$claveMD5 = md5($clave);

$conexion=mysqli_connect("localhost", "root", "Unmsm2017", "RelocaDB");
if (!$conexion){
    die("Error de conexion: " . mysqli_connect_error());
}
$consulta="SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$clave'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas>0){
    header("Location: Veterinaria/Veterinaria.php");
}else{
    echo "Error en la autentificación";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>