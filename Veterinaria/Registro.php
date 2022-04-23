<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene autorización';
    die();
}

$conn = mysqli_connect("localhost", "root", "Unmsm2017", "RelocaDB");
if (!$conn){
    die("Error de conexion: " . mysqli_connect_error());
}

//capturando datos
$v1 = $_POST['Veterinario'];
$v2 = $_POST['Nombre'];
$v3 = $_POST['Fecha'];
$v4 = $_POST['Sintomas'];
$v5 = $_POST['Sangre'];
$v6 = $_POST['Medicina'];
$v7 = $_POST['Costo'];
$v8 = addslashes(file_get_contents($_FILES['Foto']['tmp_name']));

if(isset($_POST['Registrar'])){
    if(strlen($v2)>15 or strlen($v1)>15){
        echo "<p class='error'>* El nombre es muy largo</p>";
    } else{
        if(is_numeric($v2) or is_numeric($v1)){
            echo "<p class='error'>* El nombre no debe contener numeros</p>";
        }else{
            if(!is_numeric($v7)){
                echo "<p class='error'>* El costo no debe contener letras</p>";
            }else{
                if(is_numeric($v4) or is_numeric($v5) or is_numeric($v6)){
                    echo "<p class='error'>* Los campos no deben contener numeros</p>";
                }else{
                    $sql = "INSERT INTO scp (Veterinario, Nombre, Fecha, Sintomas, Sangre, Medicina, Costo, Foto)";
                    $sql .= "VALUES ('$v1','$v2','$v3','$v4','$v5','$v6','$v7','$v8')";
                    if (mysqli_query($conn, $sql)) {
                    echo "<!DOCTYPE html><html><head><meta charset='utf-8'><title>Datos del Perro</title>
                    <link rel='stylesheet' href='styles.css'><style>input{background-color: lightblue;}
                    body{background-image:url('https://img.freepik.com/vector-gratis/patron-transparente-vector-huellas-animales-domesticos-fondo-papel-tapiz-pagina-web-tienda-mascotas_562639-204.jpg');background-size: cover;
                        background-repeat:no-repeat;background-attachment: fixed;background-position: center;}</style></head><body>";
                        echo "<hr><p>Datos ingresados correctamente</p>";
                        echo "<a href='Veterinaria.php'>Volver</a><br>";
                        echo "<a href='ConsultarPerro.php'>Consultar</a><hr>";
                        echo "<footer><p><small>Pagina sin derechos de autor - <a href='Cerrar_Sesion.php'>Cerrar Sesión</a></small></p></footer></body></html>";
                    } else{
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                }
                
            }
        }
    }
}

?>