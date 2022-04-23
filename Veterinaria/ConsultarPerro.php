<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene autorización';
    die();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Veterinaria </title>

        <!-- Load external CSS styles -->
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="Botones.css">
        <script>
            function redireccionar(){location.href="Veterinaria.php";}
        </script>
    </head>

    <body>
        <form action="Consulta_perro.php" method="post">
            <h1 align="center"><i>Modulo de Consulta</i></h1><hr>
                <img src="https://dam.ngenespanol.com/wp-content/uploads/2019/10/perros-personalidad-2.jpg"
                align="center" alt="Perritos" width="450" height="233" border="3" style="border-radius: 30px;">
            <h2>Bienvenido: <?php echo $_SESSION['usuario'] ?></h2>
            <p><strong>Ingresar Nombre a consultar:</strong></p>
            <input type = "text" name = "Nombre" placeholder="ej. Fido" required><br>
            <center><input type = "submit" name="buscar" value = "BUSCAR" class="btn fourth"></center>
            <center><input type="reset" value="CANCELAR" class="btn fourth"></center>
            <center><input type="button" onclick="redireccionar()" value="REGRESAR" class="btn fourth"></center><hr>
        </form>
        <footer>
            <p><small>Pagina sin derechos de autor - <a href="CerrarSesion.php">Cerrar Sesión</a></small></p>
        </footer>
    </body>
</html>