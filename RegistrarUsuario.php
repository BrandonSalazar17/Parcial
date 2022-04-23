<?php
$conn = mysqli_connect("localhost", "root", "Unmsm2017", "relocaDB");
if (!$conn){
    die("Error de conexion: " . mysqli_connect_error());
}
//capturando datos
$nombre = $_POST['Usuario'];
$clave = $_POST['Clave'];
$claveMD5 = md5($clave);

if(isset($_POST['Registrar'])){
    if(strlen($nombre) > 15){
        echo "<p class='error'>* El nombre es muy largo</p>";
    } else{
        if(is_numeric($nombre)){
            echo "<p class='error'>* El nombre no debe contener numeros</p>";
        }else{
            if(strlen($clave) < 8){
                echo "<p class='error'>* La contraseña es muy corta</p>";
            }else{
                $sql = "INSERT INTO Usuario (Usuario, Clave)";
                $sql .= "VALUES ('$nombre','$clave' )";
                if (mysqli_query($conn, $sql)) {
                    header("location: Login.html");
                } else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                mysqli_close($conn);
            }
        }
    }
    
}
?>