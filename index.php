<?php include("../practica4.6_AcccesoDatos/conexion.php") ?>
<?php include("../practica4.6_AcccesoDatos/includes/header.php") ?>

</br>
</br>
<div class="container">
    <div class="row">
        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();
            } ?>

            <div class="card card-body">
                <form action="guardarDatos.php" method="POST">
                    <div class="form-group m-1">
                        <input type="text" name="numControl" class="form-control" placeholder="Numero de control" autofocus>
                    </div>

                    <div class="form-group m-1 ">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre alumno">
                    </div>

                    <div class="form-group m-1">
                        <input type="text" name="apellido_paterno" class="form-control" placeholder="Ape. paterno">
                    </div>

                    <div class="form-group m-1">
                        <input type="text" name="apellido_materno" class="form-control" placeholder="Ape. materno">
                    </div>

                    <div class="form-group m-1">
                        <input type="text" name="carrera" class="form-control" placeholder="Carrera">
                    </div>

                    <div class="form-group m-1">
                        <input type="number" name="semestre" class="form-control" placeholder="Semestre">
                    </div>

                    <div class="form-group m-1">
                        <input type="submit" class="btn btn-success btn-block" name="registrar" value="Registrar">
                    </div>
                </form>
            </div>
        </div>

        <!-- estructura para crear una tabla, que asu vez mostramos los dataos -->
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Num. Control</th>
                        <th>Nombre(s)</th>
                        <th>Ape. Paterno</th>
                        <th>Ape. Materno</th>
                        <th>Carrera</th>
                        <th>Semestre</th>
                        <th>Fecha Alta</th>
                        <th>Fecha Modificacion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //CRUD (C): Generando la consulta necesaria para la operacion basica (1) "CREATE":
                    $query = "SELECT * FROM alumnos";
                    //un variable que resibe la conexion y la consulta
                    $resultado = mysqli_query($conexion, $query);

                    //Con el ciclo while recorremos las filas
                    while ($row = mysqli_fetch_array($resultado)) { ?>
                        <tr>
                            <!-- Lo que esta entre conchete el atributo va segun, lo estructurado
                        en la tabla, es decir, los nombres de las comlunas en la base  dedats -->
                            <td> <?php echo $row['numero_Control'] ?> </td>
                            <td> <?php echo $row['nombre'] ?> </td>
                            <td> <?php echo $row['apellido_paterno'] ?> </td>
                            <td> <?php echo $row['apellido_materno'] ?> </td>
                            <td> <?php echo $row['carrera'] ?> </td>
                            <td> <?php echo $row['semestre'] ?> </td>
                            <td> <?php echo $row['fecha_Alta'] ?> </td>
                            <td> <?php echo $row['fecha_Modificacion'] ?> </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>




<?php include("../practica4.6_AcccesoDatos/includes/footer.php") ?>