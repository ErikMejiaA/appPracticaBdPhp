<!--listar los estudiantes-->
<?php
    require_once '../../app.php';
    use Models\Estudiante;

    $objEstudiante = new Estudiante();
    $datosEstudiante = $objEstudiante -> loadAllData();
?>

<section>
    <div class="container">
        <table id="myTablaEstudiante" class="table table-success table-striped table-hover dataTable">
            <thead>
                <tr>
                    <th scope="col">Id Estudiante</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Edad</th>
                    <th scope="col">logros</th>
                    <th scope="col">Detalle</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datosEstudiante as $estudiante) {?>
                    <tr>
                        <td><?php echo $estudiante['id_estudiante']; ?></td>
                        <td><?php echo $estudiante['nombre']; ?></td>
                        <td><?php echo $estudiante['direccion']; ?></td>
                        <td><?php echo $estudiante['edad']; ?></td>
                        <td><?php echo $estudiante['logros']; ?></td>
                        <td><?php echo $estudiante['detalle']; ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger eliminarEstudiante" data-bs-toggle="modal" data-bs-target="#elimarEstudy" id="<?php echo $estudiante['id_estudiante']; ?>">Eliminar</button>
                        </td>
                        <td>
                             <!-- Button trigger modal -->
                             <button type="button" class="btn btn-primary editarEstudiante" data-bs-toggle="modal" data-bs-target="#editarEstudy" id="<?php echo $estudiante['id_estudiante']; ?>">Editar</button>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</section>

<!--Modal que muestra el datoa a Eliminar-->
<div class="modal fade" id="elimarEstudy" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">-- ESTUDIANTE --</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card text-center">
                    <h5 class="card-header">Confirmar Eliminacion</h5>
                    <div class="card-body">
                        <div id="infoEstu"></div>
                        <br/>
                        <button type="button" class="btn btn-warning borrarEstudiante" data-bs-dismiss="modal">Eliminar</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>

<!--Modal que muestra los datos a editar-->
<div class="modal fade " id="editarEstudy" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">+-+ ESTUDIANTE +-+</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <h5 class="card-header text-center">Editar Estudiante</h5>
                    <div class="card-body text-center">
                        <form id="frmUpdateDataEstu">
                            <div class="container">
                                <div class="row bg-light p-1">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="id_estudiante" class="form-label">id Estudiante:</label>
                                            <br/>
                                            <span class="badge estu bg-primary"></span>
                                            <input id="id_estudiante" name="id_estudiante" type="hidden" value="0">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre del Estudiante:</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="direccion" class="form-label">Ingrese su dirección:</label>
                                            <input type="text" class="form-control" id="direccion" name="direccion">
                                        </div>
                                    </div>
                                </div>
                                <div class="row bg-light p-1">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="edad" class="form-label">Ingrese su Edad:</label>
                                            <input type="number" class="form-control" id="edad" name="edad" min="0">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="logros" class="form-label">Ingrese sus logros:</label>
                                            <input type="text" class="form-control" id="logros" name="logros">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="detalle" class="form-label">Ingrese el detalle:</label>
                                            <input type="text" class="form-control" id="detalle" name="detalle">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container text-center bg-light p-1">
                                <button type="button" class="btn btn-success guardarEtudiante" data-bs-dismiss="modal">GUARDAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>
