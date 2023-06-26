<?php
    include("conex.php");
    $name=$_GET['name'];
    $surname=$_GET['surname'];
    $email=$_GET['email'];
    $error_name=1;
    $error_surname=2;
    $error_email=3;
    $error_total=4;
    if(empty($_GET['name']) && empty($_GET['surname']) && empty($_GET['email'])) {
        header("Location:index.php?error=".$error_total);
    } 
    elseif(empty($_GET['name'])) {
        header("Location:index.php?error=".$error_name);
    }
    elseif(empty($_GET['surname'])) {
        header("Location:index.php?error=".$error_surname);
    }
    elseif(empty($_GET['email'])) {
        header("Location:index.php?error=".$error_email);
    } else {
        $conn=conectar();
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $fecha=date('d-m-Y H:i:s');
        $consulta="INSERT INTO `usuarios` (`nombre`, `apellido`, `email`, `fecha_ingreso`) VALUES
        ('$name', '$surname', '$email', '$fecha')";
        if(mysqli_query($conn, $consulta)) {
            echo"<p> Usuario añadido.";
            echo "<p><a href='index.php'>Volver</a>";
        } else {
            echo"Error: ";
            echo"<p><a href='index.php'>Volver</a>";
        }
    }
?>
