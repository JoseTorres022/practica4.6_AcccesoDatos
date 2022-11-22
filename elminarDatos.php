<?php
include("../practica4.6_AcccesoDatos/conexion.php");

if (isset($_GET['numero_Control'])) {
    $id = $_GET['numero_Control'];
    $query = "DELETE FROM alumnos WHERE numero_Control=$id";
    $resultado = mysqli_query($conexion, $query);

    if (!$resultado) {
        die("La consulta ha fallado, por ende el registro no se ha eliminado");
    }
    $_SESSION['message'] = "El resgistro ha sido eliminado correctamente.";
    $_SESSION['message_type'] = "danger";
    header("Location: index.php");
}
?>