<?php
include "menu.php";
?>
<div class="container">
    <?php
    require_once "../negociacion/NegProveedores.php";

    $negProveedores = new NegProveedores();
    $dato = $negProveedores->mostrar();

    ?>


    <div class="row">
        <div class="col-sm-12">
            <br>
            <caption>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
                    Agregar nuevo
                </button>
            </caption>
            <br>
            <br>
            <table class="table table-hover table-condensed table-bordered" id="tablaProveedores">
                <thead>
                    <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Status</td>
                    <td>Opciones</td>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dato as $dat) {
                        $datos = $dat->{"id_proveedor"} . "||" . $dat->{"nombre"} . "||" . $dat->{"estatus"};
                    ?>
                        <tr>
                            <th><?php echo ($dat->{"id_proveedor"}); ?> </th>
                            <td><?php echo ($dat->{"nombre"}); ?></td>
                            <td><?php echo ($dat->{"estatus"}); ?></td>
                            <td>
                                <button class="btn btn-primary btnEditar" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">Editar</button>
                                <button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo('<?php echo $dat->{'id_proveedor'} ?>')">Eliminar</button>                            
                            </td>
                        </tr>
                    <?php
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
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Nombre</label>
                <input type="text" name="" id="nombre" class="form-control input-sm">
                <label>Status
                <input type="checkbox" name="" id="status" class="form-control input-sm">
                </label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" id="guardarnuevo" class="btn btn-dark">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #007bff; color: white;">
                <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Id</label>
                <input type="text" name="" id="idProveedor" class="form-control input-sm" readonly>
                <label>Nombre</label>
                <input type="text" name="" id="nombreMod" class="form-control input-sm">
                <label>Status
                <input type="checkbox" name="" id="statusMod" class="form-control input-sm">
                </label>
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


<script src="js/proveedores.js"></script>

</body>

</html>