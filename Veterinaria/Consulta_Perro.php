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
$v2 = $_REQUEST['Nombre'];

if(isset($_POST['buscar'])){
    if(strlen($v2) > 15){
        echo "<p class='error'>* El nombre es muy largo</p>";
    }else{
        if(is_numeric($v2)){
            echo "<p class='error'>* El nombre no debe contener numeros</p>";
        }else{
            $sql = "select * from scp where Nombre like '".$v2."'";
            $result = mysqli_query($conn, $sql);
          
            $num_resultados = mysqli_num_rows($result);
            echo "<h1 style='background-color:blue;font-family:Verdana;' align='center'>
            Número de perros encontrados: ".$num_resultados."</h1><hr>";

            for ($i=0; $i<$num_resultados; $i++){
                $row = mysqli_fetch_array($result);
                $imagen = base64_encode($row['Foto']);
                echo "<!DOCTYPE html><html><head><meta charset='utf-8'><title>Datos del Perro</title>
                <link rel='stylesheet' href='styles.css'><style>input{background-color: aquamarine;}
                body{background-image:url('https://img.freepik.com/vector-gratis/patron-transparente-vector-huellas-animales-domesticos-fondo-papel-tapiz-pagina-web-tienda-mascotas_562639-204.jpg');
                background-repeat:no-repeat;background-size: cover;background-attachment: fixed;background-position: center;}</style></head><body>";
                echo " </br>Datos de la consulta ";echo ($i+1);echo": </br>";
                echo " Veterinario que lo atendio: ".$row["Veterinario"];
                echo " </br>Nombre de la mascota : ".$row["Nombre"];
                echo " </br>Fecha de la consulta : ".$row["Fecha"];
                echo " </br>Sintomas que presento : ".$row["Sintomas"];
                echo " </br>Diagnostico de sangre : ".$row["Sangre"];
                echo " </br>Medicina recomendada : ".$row["Medicina"];
                echo " </br>Costo del diagnostico : ".$row["Costo"];
                echo " </br>Imagen de los Rayos X : ";
                echo " </br><img width='300' height='300' src='data:image/jpg;charset=utf8;base64,".$imagen."'/;<br/>";
                $deuda = $deuda + $row["Costo"];
            }
            
            if($num_resultados == 0){echo "<p class='error'>* El perro no existe</p>";}else{
                echo "</br>DEUDA TOTAL: ".$deuda;
            }
            echo "<p></p><hr> <a href='ConsultarPerro.php'>Volver</a><hr>";
            echo "<footer><p><small>Pagina sin derechos de autor - <a href='CerrarSesion.php'>Cerrar Sesión</a></p></footer></body></html>";
        }
    }
}
?>