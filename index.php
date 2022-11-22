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
                    <div class="form-group m-2">
                        <input type="text" name="numControl" class="form-control" placeholder="Numero de control"
                            autofocus>
                    </div>

                    <div class="form-group m-2 ">
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //CRUD (R): Generando la consulta necesaria para la operacion basica (2) "READ":
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
                        <!-- Fin de la operacion basica READ -->

                        <td>
                            <!-- CRUD (UPDATE): Generando la consulta necesaria para la operacion basica (3) "UPDATE": -->
                            <a style="text-decoration:none; margin: 1px;"
                                href="actualizarDatos.php?numero_Control=<?php echo $row['numero_Control'] ?>">
                                <!-- <i class="fa-light fa-pen-to-square"></i> -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="#000000"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                    <line x1="16" y1="5" x2="19" y2="8" />
                                </svg>
                            </a>
                            <!-- Fin de la operacion basica UPDATE -->
                            <a style="font-size: 15px;">
                                |
                            </a>
                            <!-- CRUD (DELETE): Generando la consulta necesaria para la operacion basica (3) "UPDATE": -->
                            <a style="text-decoration:none; margin: 1px;"
                                href="elminarDatos.php?numero_Control=<?php echo $row['numero_Control'] ?>">
                                <!-- eliminar -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="#000000"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="4" y1="7" x2="20" y2="7" />
                                    <line x1="10" y1="11" x2="10" y2="17" />
                                    <line x1="14" y1="11" x2="14" y2="17" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </a>
                            <!-- Fin de la operacion basica DELETE -->

                        </td>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>




<?php include("../practica4.6_AcccesoDatos/includes/footer.php") ?>