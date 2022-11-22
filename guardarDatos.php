<?php

include ("../practica4.6_AcccesoDatos/conexion.php");
if (isset($_POST['registrar'])){
    $numControl=$_POST['numero_Control'];
    $nombre=$_POST['nombre'];
    $apePaterno=$_POST['apellido_paterno'];
    $apeMaterno=$_POST['apellido_materno'];
    $carrera=$_POST['carrera'];
    $semestre=$_POST['semestre'];

    //CRUD (C): Generando la consulta necesaria para la operacion basica (1) "CREATE":
    $query="INSERT INTO alumnos (numero_Control, nombre, apellido_Paterno, apellido_Materno, carrera, semestre)
            VALUES ('$numControl','$nombre','$apePaterno','$apeMaterno','$carrera','$semestre')";
    $resultado=mysqli_query($conexion,$query);

    if(!$resultado){
        die("La consulta a fallado");
    }
    //Fin de la operacion CREATE

    //Este es solo un mesaje que aparece cuando se registran correctamente.
    $_SESSION['message']='Datos registrados correctamente';
    $_SESSION['message_type']='success';
    header("Location: index.php");
    // echo("Datos registrados");
}
