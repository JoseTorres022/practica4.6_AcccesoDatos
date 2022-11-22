<?php include("../practica4.6_AcccesoDatos/conexion.php") ?>
<?php include("../practica4.6_AcccesoDatos/includes/header.php") ?>

</br>
</br>
<div class="container p-1">
    <div class="row">
        <div class="col-md-5">

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();
            } ?>

            <div class="card card-body">
                <form action="guardarDatos.php" method="POST">
                    <div class="form-group m-2">
                        <input type="text" name="numControl" class="form-control" placeholder="Numero de control" autofocus>
                    </div>

                    <div class="form-group m-2">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre alumno">
                    </div>

                    <div class="form-group m-2">
                        <input type="text" name="apellido_paterno" class="form-control" placeholder="Ape. paterno">
                    </div>

                    <div class="form-group m-2">
                        <input type="text" name="apellido_materno" class="form-control" placeholder="Ape. materno">
                    </div>

                    <div class="form-group m-2">
                        <input type="text" name="carrera" class="form-control" placeholder="Carrera">
                    </div>

                    <div class="form-group m-2">
                        <input type="number" name="semestre" class="form-control" placeholder="Semestre">
                    </div>

                    <div class="form-group m-2">
                        <input type="submit" class="btn btn-success btn-block" name="registrar" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include("../practica4.6_AcccesoDatos/includes/footer.php") ?>