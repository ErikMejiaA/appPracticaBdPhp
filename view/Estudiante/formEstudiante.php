<!--Formulario para el Estudiante-->
<div class="container mt-3 text-center">
    <div class="card">
        <h5 class="card-header">Registro Estudiante</h5>
        <div class="card-body">
            <form id="formEstudiantes">
                <div class="container text-center">
                    <div class="row">
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
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="edad" class="form-label">Ingrese su Edad:</label>
                                <input type="number" class="form-control" id="edad" name="edad" min="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="logros" class="form-label">Ingrese sus logros:</label>
                                <input type="text" class="form-control" id="logros" name="logros">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="detalle" class="form-label">Ingrese el detalle:</label>
                                <input type="text" class="form-control" id="detalle" name="detalle">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-center">
                    <button type="submit" class="btn btn-primary enviar" id="btnEstudiante">ENVIAR</button>
                    <button type="reset" class="btn btn-success">LIMPIAR</button>
                </div>
            </form>
        </div>
    </div>
</div>