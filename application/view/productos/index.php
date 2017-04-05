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
                            <td class="text-center"><?= $value["id"] ?></td>
                            <td class="text-center"><?= $value["nombre"] ?></td>
                            <td class="text-center"><?= $value["stock"] ?></td>
                            <td class="text-center"><?= $value["precio"] ?></td>
                            <td class="text-center"><?= $value["estado"]==1?"Activo":"Inactivo" ?></td>
                            <td class="text-center"><?= $value["cantidad"] ?></td>
                            <td class="text-center"><?= $value["nom_categoria"] ?></td>
                            <td class="text-center"><?= $value["nom_sub"] ?></td>
                            <td class="text-center"><?= $value["nom_marca"] ?></td>
                            <td class="text-center"><?= $value["nom_talla"] ?></td>
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
      <!--   -->
        <form action="<?= URL?>productos/insertarProducto" method="post" onsubmit="return val_reg_prod()">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">add</i>
            </div>
            <div class="form-group label-floating card-content">
                <h4 class="card-title">Ingresar productos</h4>

                <div class="form-group label-floating col-md-6">
                    <label class="control-label">Nombre del producto<small>*</small></label>
                    <input class="form-control" name="nombre" type="text" id="2">
                </div>

                <div class="form-group label-floating col-md-6">
                    <label class="control-label">Precio<small>*</small></label>
                    <input class="form-control" name="precio" type="text" id="3">
                </div>

                <div class="col-md-6 col-sm-6">
                  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-new thumbnail">
                          <img src="<?php URL ?>img/image_placeholder.jpg">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                              <span class="fileinput-new">Seleccionar Imagen</span>
                              <span class="fileinput-exists">Cambiar</span>
                              <input type="file" name="imagen" id="4"/>
                            </span>
                            <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i>Quitar</a>
                        </div>
                  </div>
                </div>

                <div class="col-md-6">
                    <select class="selectpicker" data-style="select-with-transition" name="8" id="8" title="Sub Categoria">
                 <?php foreach ($sub as $key):?>
                   <option value="<?= $key['id_sub'] ?>"><?=$key['nombre'];?></option>
                 <?php  endforeach ?>
                    </select>
                </div>

                <script src="<?php echo URL;?>js/jquery-3.1.1.min.js" type="text/javascript"></script>
                <script language="javascript">
                        $("#8").change(function() {
                            $("#8 option:selected").each(function() {
                                id_sub = $(this).val();
                                $.post(uri+"productos/conCat", {
                                    id_sub: id_sub
                                }, function(data) {
                                    $("#9").html(data);
                                });
                            });
                        })
                </script>

                <div class="col-md-6">
                  <select id="9" name="categoria">
                    <option value=""></option>
                  </select>
                </div>

                <script language="javascript">
                        $("#9").change(function() {
                            $("#9 option:selected").each(function() {
                                id_Categoria = $(this).val();
                                $.post(uri+"productos/conTalla", {
                                    id_Categoria : id_Categoria
                                }, function(data) {
                                    $("#10").html(data);
                                });
                            });
                        })
                </script>

                <script language="javascript">
                        $("#9").change(function() {
                            $("#9 option:selected").each(function() {
                                id_Categoria = $(this).val();
                                $.post(uri+"productos/conMarca", {
                                    id_Categoria : id_Categoria
                                }, function(data) {
                                    $("#11").html(data);
                                });
                            });
                        })
                </script>

                <div class="col-md-6">
                  <select  id="10" name="talla">
                    <option value=""></option>
                  </select>
                </div>

                <div class="col-md-6">
                  <select  id="11" name="marca">
                    <option value=""></option>
                  </select>
                </div>

                <div class="card-footer text-center">
                    <button type="submit" name="addProducto" class="btn btn-rose btn-fill">Insertar</button>
                </div>

            </div>
        </form>
    </div>
</div>

<div class="col-md-6">
    <div class="card">
        <form id="RegisterValidation" action="<?= URL?>productos/insertarProducto" method="post">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">add</i>
            </div>
            <div class="form-group label-floating card-content">
                <h4 class="card-title">Ingresar Marca</h4>

                <div class="form-group label-floating">
                    <label class="control-label">Nombre de la Marca<small>*</small></label>
                    <input class="form-control" name="nombre" type="text">
                </div>

                <div class="card-footer text-center">
                    <button type="submit" name="" class="btn btn-rose btn-fill">Insertar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="col-md-6">
    <div class="card">
        <form id="RegisterValidation" action="<?= URL?>productos/insertarProducto" method="post">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">add</i>
            </div>
            <div class="form-group label-floating card-content">
                <h4 class="card-title">Ingresar Talla</h4>

                  <div class="form-group label-floating">
                      <label class="control-label">Ingrese Talla<small>*</small></label>
                      <input class="form-control" name="nombre" type="text">
                  </div>
                <div class="card-footer text-center">
                    <!--<button type="button" class="btn btn-rose btn-fill" onclick="val_reg_prod()">Insertar</button>-->
                </div>
            </div>
        </form>
    </div>
</div>
<script src="<?php echo URL;?>js/validaciones/val_reg_pro.js"></script>
