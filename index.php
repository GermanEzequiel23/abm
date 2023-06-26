<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo"<center><h1>Hola</h1></center>"; 
    ?>
    <form action="process.php" method="">
        <label for="name">Nombre:</label>
        <input type=text name="name">

        <label for="surname">Apellido:</label>
        <input type="text" name="surname">
        
        <label for="email">Email:</label>
        <input type="text" name="email">
        <input type="submit" value="Send" name="send">
        <div>
            <?php if(isset($_GET) && isset($_GET['error'])){ 
                    switch($_GET['error']){
                        case 1:
                            echo "<p style='color:red'>ERROR, NO INGRESASTE UN NOMBRE</p>";
                            break;
                        case 2:
                            echo "<p style='color:red'>ERROR, NO INGRESASTE UN APELLIDO</p>";
                            break;
                        case 3:
                            echo "<p style='color:red'>ERROR, NO INGRESASTE UN EMAIL</p>";
                            break;
                        case 4:
                            echo "<p style='color:red'>ERROR, NO INGRESASTE NADA</p>";
                            break;
                    }
                }
                include("conex.php"); 
                $linkconn=conectar(); 
                $sql="select * from usuarios"; 
                $resultado= mysqli_query($linkconn,$sql); 
                echo "<table border=1>";
                echo "<tr><th>Nombre</th><th>Apellido</th><th>Email</th><th>Fecha de Ingreso</th>
                <th>Modificar</th><th>Eliminar</th></tr>";
                foreach($resultado as $row) {
                    $id=$row['id'];
                    $nomb=$row['nombre'];
                    $ape=$row['apellido'];
                    $email=$row['email'];
                    $fecha=$row['fecha_ingreso'];   
                    echo "<tr><td>$nomb</td><td>$ape</td><td>$email</td><td>$fecha</td><td><center>
                    <a href=modificarusuario.php?id=$id><img src='imagenes/modificar.png' width='50' heigth='50'></a></center>
                    </t><td><a href=eliminarusuario.php?id=$id><img src='imagenes/Captura.PNG' width='50' heigth='50'>
                    </a></td></tr>";
                }
            ?>
        </div>
    </form>
</body>
</html>