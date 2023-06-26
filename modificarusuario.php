<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="modificarusuario.php">
        <p>Nombre:<input type="text" name="name">
		<p>Apellido:<input type="text" name="surname">
		<p>Email:<input type="text" name="email">
        <?php
            if(isset($_GET['id'])){
        ?>
            <input type="hidden" value="<?=$_GET['id'] ?>" name="id_usuario">
        <?php 
        }
        ?>
        <input type="submit" value="Enviar" name="send">
    </form>
    <?php
        if(isset($_POST['send']) && isset($_POST['id_usuario'])) {
            include("conex.php");
            $link=conectar();
            $nombre=$_POST['name'];
            $apellido=$_POST['surname'];
            $email=$_POST['email'];
            $id=$_POST['id_usuario'];
            $consulta = "UPDATE `usuarios` SET `nombre` = '$nombre', `apellido` = '$apellido',
             `email` = '$email' WHERE `usuarios`.`id` = '$id'";
            if(mysqli_query($link, $consulta)) {
                    echo"<p>Registro Modificado";
                    echo"<a href='index.php'>Volver</a>";
            } else {
                echo"<p>Error";
                echo"<a href='index.php'>Volver</a>";
            }
        }
    ?>
</body>
</html>