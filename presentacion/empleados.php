<?php
include "menu.php";




?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <br>
            <caption>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
                    Agregar nuevo
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
            </caption>
            <br>
            <br>
            <table class="table table-hover table-condensed table-bordered" id="tablaEmpleados">
                <thead>
                    <tr>
                    <td>#</td>
                    <td>Nombre</td>
                    <td>Usuario</td>
                    <td>Correo</td>
                    <td>Estatus</td>
                    <td>Editar</td>
                    <td>Eliminar</td>
                </tr>
                </thead>
                <tbody>
                        <tr>
                            <th>1</th>
                            <td>Angel Alvarez</td>
                            <td>Angel</td>
                            <td>angel@gmail.com</td>
                            <td>1</td>
                            <td>
                                <button class="btn btn-primary btnEditar" data-toggle="modal" data-target="#modalEdicion" onclick="">Editar</button>
                            </td>
                            <td>
                                <button class="btn btn-danger glyphicon glyphicon-remove" onclick="">Eliminar</button>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal para registros nuevos -->


<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #28a745; color: white;">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Empeado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Nombre</label>
                <input type="text" name="" id="nombre" class="form-control input-sm">
                <label>Usuario</label>
                <input type="text" name="" id="usuario" class="form-control input-sm">
                <label>Correo</label>
                <input type="text" name="" id="correo" class="form-control input-sm">
                <label>Contraseña</label>
                <input type="text" name="" id="password" class="form-control input-sm">
                <label>Estatus</label>
                <input type="text" name="" id="estatus" class="form-control input-sm">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="guardarnuevo" class="btn btn-dark">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #007bff; color: white;">
                <h5 class="modal-title" id="exampleModalLabel">Editar Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <label>Nombre</label>
                <input type="text" name="" id="nombreu" class="form-control input-sm">
                <label>Usuario</label>
                <input type="text" name="" id="usuariou" class="form-control input-sm">
                <label>Correo</label>
                <input type="text" name="" id="correou" class="form-control input-sm">
                <label>Contraseña</label>
                <input type="text" name="" id="passwordu" class="form-control input-sm">
                <label>Estatus</label>
                <input type="text" name="" id="estatusu" class="form-control input-sm">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="actualizadatos" class="btn btn-dark">Guardar</button>
            </div>
        </div>
    </div>
</div>

</div>

</div>

<?php include "menuFin.php"; ?>



</body>

</html>