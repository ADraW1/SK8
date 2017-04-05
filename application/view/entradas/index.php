<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">shopping_cart</i>
        </div>
        <h4 class="card-title">Productos</h4>
        <div class="card-content">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Proveedor</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $value) : ?>
                        <tr>
                            <td class="text-center">
                                <?= $value["id"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["cantidad"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["fecha_entrada"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["nom_proveedor"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["nombre"] ?>
                            </td>
                            <td class="td-actions text-center">
                                <a class="btn btn-info" href="<?= URL ?>entradas/edit/<?= $value['id']?>"><i class="material-icons">edit</i></a>
                            </td>
                        </tr>
                        <?php  endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
