<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">person</i>
        </div>
        <h4 class="card-title">Productos</h4>
        <div class="card-content">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Id Producto</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Stock</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-center">Categoria</th>
                            <th class="text-center">Sub Categoria</th>
                            <th class="text-center">Talla</th>
                            <th class="text-center">Marca</th>
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
                                <?= $value["nombre"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["stock"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["precio"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["estado"]==1?"Activo":"Inactivo" ?>
                            </td>
                            <td class="text-center">
                                <?= $value["cantidad"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["nom_categoria"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["nom_sub"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["nom_marca"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["nom_talla"] ?>
                            </td>
                            <td class="td-actions text-center">
                                <a class="btn btn-info" href="<?= URL ?>productos/edit/<?= $value['id']?>"><i class="material-icons">edit</i></a>
                                <?php if ($value["estado"]==1) {?>
                                <a class="btn btn-danger" href="#" onclick="cambiarEstadoProducto(<?= $value['id']?>,0)"><i class="material-icons">close</i></a>
                                <?php  }else{ ?>
                                <a class="btn btn-success" href="#" onclick="cambiarEstadoProducto(<?= $value['id']?>,1)"><i class="material-icons">check</i></a>
                                <?php } ?>
                            </td>
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
      <form id="RegisterValidation" action="<?= URL?>productos/insertarProducto" method="post">
         <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">edit</i>
         </div>
         <div class="form-group label-floating card-content">
            <h4 class="card-title">Modificar persona</h4>

            <div class="form-group label-floating col-md-6">
               <label class="control-label">
               Nombre del producto
               <small>*</small>
               </label>
               <input class="form-control" name="documento" type="text" required="true">
            </div>
            <div class="form-group label-floating col-md-6">
               <label class="control-label">
               Stock
               <small>*</small>
               </label>
               <input class="form-control" type="text" name="number" number="true" >
            </div>
            <div class="form-group label-floating col-md-6">
               <label class="control-label">
               Precio
               <small>*</small>
               </label>
               <input class="form-control" type="text" name="number" number="true" >
            </div>

            <div class="form-group label-floating col-md-6">
               <label class="control-label">
               Cantidad
               <small>*</small>
               </label>
               <input class="form-control" type="text" name="number" number="true">
            </div>

            <div class="form-group col-md-6">
              <label for="exampleInputFile">Cargar</label>
              <input type="file" id="exampleInputFile">
            </div>

            <div class="col-md-6">
               <select class="selectpicker" data-style="select-with-transition" multiple title="Categoria" data-size="10">
                  <option disabled></option>
                  <option value="2">Cedula </option>
                  <option value="3">Tarjeta de identidad</option>
               </select>
            </div>

            <div class="form-footer text-right">
               <button type="submit" class="btn btn-rose btn-fill">Modificar</button>
            </div>
         </div>
      </form>
   </div>
</div>
