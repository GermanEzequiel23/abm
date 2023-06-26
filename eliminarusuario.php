<?php
    include("conex.php");
    $link=conectar();
    if(isset($_GET['id'])) {
        $id=$_GET['id'];
    }
    $sql="DELETE FROM `usuarios` where `id`='$id'";
    if(mysqli_query($link, $sql)){
        echo"<p> Registro Eliminado!";
        echo"<p><a href='index.php'>Volver</a>";
    } else {
        echo"<p>Error";
        echo"<p><a href='index.php'>Volver</a>";
    }
?>