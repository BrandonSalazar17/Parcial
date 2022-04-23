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
            function redireccionar(){location.href="ConsultarPerro.php";}
        </script>
    </head>
<body>

    <form action="Registro.php" method="post" enctype="multipart/form-data">
        <!-- Formulario -->
        <h1 align="center">
            <i>Veterinaria Safety Can Plus</i></h1><hr>
            <img src="https://www.thevetonfourth.com/wp-content/uploads/2019/06/vet-on-4th-logo.png"
            align="right" alt="Perritos" width="500" height="333" border="3" style="border-radius: 30px;">
        <h2>Bienvenido: <?php echo $_SESSION['usuario'] ?></h2>
        <p><strong>Por favor ingresar los datos de la Consulta</strong></p>
        <p><strong>Ingresar Nombre del Veterinario:</strong></p>
        <input name="Veterinario" type="text" placeholder="ej. Mateo" required/>
        <p><strong>Ingresar Nombre de la mascota:</strong></p>
        <input name="Nombre" type="text" placeholder="ej. Fido" />
        <p><strong>Ingresar Fecha de la Consulta:</strong></p>
        <input name="Fecha" type="date" required/>
        <p>* Para mayor facilidad seleccione el icono que esta en la parte derecha del cuadro</p>
        <p><strong>Ingresar Sintomas:</strong></p>
        <input name="Sintomas" type="text" required/>
        <p><strong>Ingrese Diagnostico de la Prueba de Sangre:</strong></p>
        <input name="Sangre" type="text" required/>
        <p><strong>Ingresar la Medicación:</strong></p>
        <input name="Medicina" type="text" required/>
        <p><strong>Costo de la Consulta(En soles):</strong></p>
        <input name="Costo" type="text" placeholder="ej. 40" required/>
        <p><strong>Imagen de Rayos X</strong></p>
        <input name="Foto" type="file"/><br>
        
        <center><input type="submit" value="REGISTRAR" name="Registrar" class="btn fourth"></center>
        <center><input type="reset" value="CANCELAR" class="btn fourth"></center>
        <center><input type="button" value="CONSULTAR PERRO" onclick="redireccionar()" class="btn fourth"></center><hr>
    </form>
    <footer>
        <p><small>Pagina sin derechos de autor - <a href="CerrarSesion.php">Cerrar Sesión</a></small></p>
    </footer>
</body>
</html>