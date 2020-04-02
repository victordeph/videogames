<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-6">

    <title>Ingresar VideoJuego</title>
    <script src="js/validador.js"></script>


    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
<?php
        require 'funcionesBD.php';
        $consId = consultarId($_REQUEST['id']);
        $arrAct = mysqli_fetch_array($consId);
    ?>

    <form action="controlador.php" method="post" onsubmit="return vacios()">
        <center>
            <p>
                <h2>ACTUALIZAR VIDEJUEGO</h2>
            </p>
        </center>
        <center><img src="img/p3.png" alt="" width="80"></center>

        <input type="hidden" name = "txtId" value = "<?php echo $arrAct['idvideo']; ?>">

        <p>Juego: </p>
        <input type="text" name="txtjuego" id="txtjuego" class="camposDatos" value = "<?php echo $arrAct['videojuego']; ?>">

        <p>Desarrollador:</p>
        <input type="text" name="txtdes" id="txtdes" class="camposDatos1" value = "<?php echo $arrAct['desarrollador']; ?>">

        <p>Precio: </p>
        <input type="number" name="txtprecio" id="txtprecio" class="camposDatos2" value = "<?php echo $arrAct['precio']; ?>">
        <p class="centrarContenido"><input type="submit" name="btnEliminar" value="Eliminar" class="btnBuscar"></p>


        <center>
            <a href=menuVistas.html> <p>Regresar al menu</p> </a>
        </center>
        
        

    </form>
    

</body>

</html>
