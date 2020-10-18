<?php
require_once "../../negociacion/NegCategorias.php";

$negCategoria = new NegCategoria();
$dato = $negCategoria->mostrar();

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
        <table class="table table-hover table-condensed table-bordered">

            <tr>
                <td>id_categoria</td>
                <td>Nombre</td>
                <td>Estatus</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
            <?php
             foreach ($dato as $dat) {
                 $datos = $dat->{"id_categoria"}."||".$dat->{"nombre"}."||".$dat->{"estatus"};
            ?>
            <tr>
                <th><?php echo ($dat->{"id_categoria"}); ?> </th>
                <td><?php echo ($dat->{"nombre"}); ?></td>
                <td><?php echo ($dat->{"estatus"}); ?></td>
                <td>
                    <button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')"></button>
                </td>
                <td>
                    <button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo('<?php echo $dat->{'id_categoria'} ?>')"></button>
                </td>
            </tr>
            <?php
             }
            ?>

        </table>
    </div>
</div>