<?php

function conectarBD(){
$servidor="localhost";
$baseDatos="bdvideojuegos";
$usuario="root";
$contrasena="";

$conexion=mysqli_connect($servidor, $usuario, $contrasena, $baseDatos) or die("Error al intentar conectar");
return $conexion;
}

function insertarJuego($nom,$emp,$pre){
    $insert = "insert into CATALOGO(videojuego,desarrollador,precio) values(?,?,?)";
    
    
    $conex=conectarBD();

    try{
        $stm=$conex->prepare($insert);//usamos la conexion para prepara en el insert en $stm
        $stm->bind_param('ssd',$nom,$emp,$pre);//pasamos los parametro que vienen de la funcion
        $stm->execute();//ejecutamos el insert
        $stm->close();//cerramos el $stm
        mysqli_close($conex);//cerramos la conexion

        return 1;//regresamos 1 indicando que todo se ejecuto con exito


    }   catch(Exception $e){
            echo 'Excepcion capturada: ', $e->getMessage(), "\n";//imprimimos la execepcion en caso de algun error en la BD
    
    }
}

function consultaTodo (){

    $conex = conectarBD();
    $contod = "select * from CATALOGO"; //creacion de conexion y de consulta 

    $rscontod= mysqli_query($conex, $contod);
    mysqli_close($conex); //se ejecuta la consulta y se cierra la conexión

    return $rscontod;    //return de la variable con la consulta
}

function consultaVideojuego ($videojuego){
    $conex = conectarBD();
    $consjuego="select * from catalogo where videojuego = '$videojuego'";

    $rsconsvid = mysqli_query($conex, $consjuego);
    mysqli_close($conex); //se ejecuta la consulta y se cierra la conexión

    return $rsconsvid;

}

?>