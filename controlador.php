<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Controlador</title>

    <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  font-family: open sans;
  text-align: left;
  padding: 8px;
}

h3{
  font-family: open sans;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>

</head>
<body>
  <?php
    require 'funcionesBD.php';
    if (isset($_POST['btnGuardar'])) {
        
        $juego=$_POST['txtjuego'];
        $desa=$_POST['txtdes'];
        $precio=$_POST['txtprecio'];

        $status= insertarJuego($juego,$desa,$precio);

        if ($status===1) {
            echo '<script> alert("Videojuego agregado a la BD");</script>';
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0 ;URL=vistaInsert.html'>";
        }else{
            echo '<script> alert("Error: NO insertado");</script>';
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=vistaInsert.html'>";
        }
        
    }

   
    if (isset($_POST['btnConsulta'])) {

      $rsCT = consultaTodo (); //se hace la consulta y se guarda en $rsCT
      
      echo "<a href=menuVistas.html> <h3>Regresar al menu</h3> </a>"; //Link para regresar a la pagina principal
      echo "<table>
      <tr>
          <th>ID Juego:</th>
          <th>Nombre:</th>
          <th>Empresa:</th>
          <th>Precio:</th>
          <th>Actualizar:</th>
          <th>Eliminar:</th>
      </tr>"; //Impresion de emcabezado de la tabla
  while ($arrFilas = mysqli_fetch_array($rsCT)) //Convertimos 
  {
    echo "<tr>
    <td>". $arrFilas['idvideo']."</td>
    <td>". $arrFilas['videojuego']."</td>
    <td>". $arrFilas['desarrollador']."</td>
    <td>". $arrFilas['precio']."</td>

    <td> <a href='vistaActualizacion.php?id=" . $arrFilas['idvideo']."'> <img src='img/refrescar.png' > </a> </td>
    <td> <a href='vistaEliminar.php?id=" . $arrFilas['idvideo']."'> <img src='img/elim.png' > </a> </td>

    </tr>";
  }
echo "</table>";
    }

    if (isset($_POST['Buscar'])) {

      $videojuego=$_POST['txtjuego'];
      $rsvid= consultaVideojuego($videojuego);
      
      echo "<a href=menuVistas.html> <h3>Regresar al menu</h3> </a>"; //Link para regresar a la pagina principal
      echo "<table>
      <tr>
          <th>ID Juego:</th>
          <th>Nombre:</th>
          <th>Empresa:</th>
          <th>Precio:</th>
          <th>Actualizar:</th>
          <th>Eliminar:</th>
      </tr>"; //Impresion de emcabezado de la tabla
  while ($fila = mysqli_fetch_array($rsvid)) 
  {
    echo "<tr>
    <td>". $fila[0]."</td>
    <td>". $fila[1]."</td>
    <td>". $fila[2]."</td>
    <td>". $fila[3]."</td>

    <td> <a href='vistaActualizacion.php?id=" . $fila[0]."'> <img src='img/refrescar.png' > </a> </td>
    <td> <a href='vistaEliminar.php?id=" . $fila[0]."'> <img src='img/elim.png' > </a> </td>

    </tr>";
  }
echo "</table>";
    }

    



  ?>  
</body>
</html>