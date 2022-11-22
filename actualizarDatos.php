<?php
include("../practica4.6_AcccesoDatos/conexion.php");

if (isset($_GET['numero_Control']))
    $id = $_GET['numero_Control'];
$query = "SELECT * FROM alumnos WHERE numero_Control=$id";
$resultado = mysqli_query($conexion, $query);
if (mysqli_num_rows($resultado) == 1) {
    $row = mysqli_fetch_array($resultado);
    $nombre = $row['nombre'];
    $paterno = $row['apellido_paterno'];
    $materno = $row['apellido_materno'];
    $carrera = $row['carrera'];
    $semestre = $row['semestre'];
}
if (isset($_POST['btn-actualizar'])) {
    $id = $_GET['numero_Control'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['apellido_paterno'];
    $materno = $_POST['apellido_materno'];
    $carrera = $_POST['carrera'];
    $semestre = $_POST['semestre'];

    $query = "UPDATE alumnos 
              SET nombre='$nombre', apellido_paterno='$paterno',apellido_materno='$materno',carrera='$carrera', semestre='$semestre' 
              WHERE numero_Control=$id";

    mysqli_query($conexion, $query);

    $_SESSION['message'] = "Dato(s) actualizados correctamente";
    $_SESSION['message_type'] = "warning";
    header("Location: index.php");
}


?>

<?php
include("../practica4.6_AcccesoDatos/includes/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <!-- CRUD (U): Generando la consulta necesaria para la operacion basica (3) "UPDATE": -->
                <form action="actualizarDatos.php?numero_Control=<?php echo $_GET['numero_Control']; ?>" method="POST">
                    <div class="form-group m-2">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control"
                            placeholder="Edita el nombre">
                    </div>

                    <div class="form-group m-2">
                        <input type="text" name="apellido_paterno" value="<?php echo $paterno; ?>" class="form-control"
                            placeholder="Edita el apelldio paterno">
                    </div>

                    <div class="form-group m-2">
                        <input type="text" name="apellido_materno" value="<?php echo $materno; ?>" class="form-control"
                            placeholder="Edita el apelldio materno">
                    </div>

                    <div class="form-group m-2">
                        <input type="text" name="carrera" value="<?php echo $carrera; ?>" class="form-control"
                            placeholder="Edita la carrare">
                    </div>

                    <div class="form-group m-2">
                        <input type="number" name="semestre" value="<?php echo $semestre; ?>" class="form-control"
                            placeholder="Edita el semestre">
                    </div>

                    <button class=" btn btn-success" name="btn-actualizar">
                        Actualizar
                    </button>

                    <!-- <button class=" btn btn-dark" name="btn-regresar" value="Regresar">
                        <a href="index.php">Regresar/Cancelar</a>
                    </button> -->
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("../practica4.6_AcccesoDatos/includes/footer.php") ?>