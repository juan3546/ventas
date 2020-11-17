<?php
include "menu.php";
require "index.php";



?>
<div class="container">
    <?php
    require_once "../negociacion/NegEmpleados.php";
    

    $negEmpledos = new NegEmpledos();
    $dato = $negEmpledos->mostrar();

    ?>
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
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>Estatus</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contador= 1;
                    foreach ($dato as $key => $dat) {
                        $datos = $dat->{"idusuario"} . "||" . $dat->{"nombre"} . "||". $dat->{"usuario"} . "||" . $dat->{"password"} . "||" .$dat->{"correo"} . "||" . $dat->{"estatus"};
                        ?>
                        <tr>
                            <th><?php echo ($contador); ?></th>
                            <td><?php echo ($dat->{"nombre"}); ?></td>
                            <td><?php echo ($dat->{"usuario"}); ?></td>
                            <td><?php echo ($dat->{"correo"}); ?></td>
                            <td><?php echo ($dat->{"estatus"}); ?></td>
                            <td>
                                <button class="btn btn-primary btnEditar" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">Editar</button>
                            </td>
                            <td>
                                <button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo('<?php echo $dat->{'idusuario'} ?>')">Eliminar</button>
                            </td>
                        </tr>
                        <?php
                        $contador++;
                    }
                    ?>
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
                <input type="text" name="" id="idEmpleado" class="form-control input-sm" hidden>
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
                <input type="text" name="" id="idEmpleadou" class="form-control input-sm" hidden>
                <label>Nombre</label>
                <input type="text" name="" id="nombreu" class="form-control input-sm">
                <label>Usuario</label>
                <input type="text" name="" id="usuariou" class="form-control input-sm" readonly>
                <label>Correo</label>
                <input type="email" name="" id="correou" class="form-control input-sm">
                <label>Contraseña</label>
                <input type="password" name="" id="passwordu" class="form-control input-sm">
                <input type="password" name="" id="passwordActual" class="form-control input-sm" hidden>
                <label>Estatus</label>
                <input type="number" name="" id="estatusu" class="form-control input-sm">
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

<script src="js/empleados.js"></script>

</body>

</html>