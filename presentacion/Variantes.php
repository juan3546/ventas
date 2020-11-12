 <?php
include "menu.php";
?>
<div class="container">
    <?php
    require_once "../negociacion/NegVariantes.php";

    $negVariante = new NegVariantes();
    $dato = $negVariante->mostrar();

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
            <table class="table table-hover table-condensed table-bordered" id="tablaCategorias">
                <thead>
                    <tr>
                    <td>#</td>
                    <td>Nombre</td>
                    <td>Estatus</td>
                    <td>Editar</td>
                    <td>Eliminar</td>
                </tr>
                </thead> 
                <tbody>
                    <?php
                    foreach ($dato as $dat) {
                       $datos = $dat->{"id_variante"} . "||" . $dat->{"nombre"} . "||" . $dat->{"estatus"};
                    ?>
                        <tr>
                            <th><?php echo ($dat->{"id_variante"}); ?> </th>
                            <td><?php echo ($dat->{"nombre"}); ?></td>
                            <td><?php echo ($dat->{"estatus"}); ?></td>
                            <td>
                                <button class="btn btn-primary btnEditar" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">Editar</button>
                            </td>
                            <td>
                                <button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo('<?php echo $dat->{'id_variante'} ?>')">Eliminar</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Nueva Variante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control input-sm">
                <label>Estatus</label>
                <select name="estatus" id="estatus" class="form-control input-sm">
                	<option value="0">0</option>
                	<option value="1">1</option>
                </select>
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
                <h5 class="modal-title" id="exampleModalLabel">Editar Variante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<label>Id Variante</label>
                <input type="text" name="id_variante" id="id_variante2" class="form-control input-sm">
            	<label>Nombre</label>
                <input type="text" name="nombre" id="nombre2" class="form-control input-sm">
                <label>Estatus</label>
                <select name="estatus" id="estatus2" class="form-control input-sm">
                	<option value="0">0</option>
                	<option value="1">1</option>
                </select>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="actualizadatos" class="btn btn-dark">Guardar</button>
            </div>
        </div>
    </div>
</div>
<?php include "menuFin.php"; ?>


<script src="js/variantes.js"></script>

</body>

</html>