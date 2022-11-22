<?php

include ("../practica4.6_AcccesoDatos/conexion.php");
if (isset($_POST['registrar'])){
    $numControl=$_POST['numControl'];
    $nombre=$_POST['nombre'];
    $apePaterno=$_POST['apellido_paterno'];
    $apeMaterno=$_POST['apellido_materno'];
    $carrera=$_POST['carrera'];
    $semestre=$_POST['semestre'];

    $query="INSERT INTO alumnos (numero_Control, nombre, apellido_Paterno, apellido_Materno, carrera, semestre)
            VALUES ('$numControl','$nombre','$apePaterno','$apeMaterno','$carrera','$semestre')";
    $resultado=mysqli_query($conexion,$query);

    if(!$resultado){
        die("La consulta a fallado");
    }

    $_SESSION['message']='Datos registrados correctamente';
    $_SESSION['message_type']='success';
    header("Location: index.php");
    // echo("Datos registrados");
}
