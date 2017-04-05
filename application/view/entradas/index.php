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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $value) : ?>
                        <tr>
                            <td class="text-center"><?= $value["id_entradas"] ?></td>
                            <td class="text-center"><?= $value["cantidad"] ?></td>
                            <td class="text-center"><?= $value["fecha_entrada"] ?></td>
                            <td class="text-center"><?= $value["nom_proveedor"] ?></td>
                            <td class="text-center"><?= $value["nombre"] ?></td>
                        </tr>
                        <?php  endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <form id="RegisterValidation" action="<?= URL?>entradas/insertarEntrada" method="post">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">add</i>
            </div>
            <div class="form-group label-floating card-content">
                <h4 class="card-title">Ingresar Entrada</h4>

                <div class="col-md-4">
                    <select class="selectpicker" data-style="select-with-transition" name="producto" title="Seleccione Producto">
                 <?php foreach ($pro as $key):?>
                   <option value="<?= $key['id_Producto'] ?>"><?=$key['nombre'];?></option>
                 <?php  endforeach ?>
                    </select>
                </div>

                <div class="form-group label-floating col-md-4">
                    <label class="control-label">Cantidad<small>*</small></label>
                    <input class="form-control" name="cantidad" type="text" required="true">
                </div>

                <div class="col-md-4">
                    <select class="selectpicker" data-style="select-with-transition" name="proveedor" title="Seleccione Proveedor">
                 <?php foreach ($prove as $key):?>
                   <option value="<?= $key['id_Proovedor'] ?>"><?=$key['nom_proveedor'];?></option>
                 <?php  endforeach ?>
                    </select>
                </div>

                <div class="card-footer text-center col-md-12">
                    <button type="submit" name="addEntrada" class="btn btn-rose btn-fill">Insertar</button>
                </div>
            </div>
        </form>
    </div>
</div>
