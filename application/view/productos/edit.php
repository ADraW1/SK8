<div class="col-md-12">
    <div class="card">
        <form id="RegisterValidation" action="<?= URL?>productos/insertarProducto" method="post">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">add</i>
            </div>
            <div class="form-group label-floating card-content">
                <h4 class="card-title">Ingresar productos</h4>

                <div class="form-group label-floating col-md-6">
                    <label class="control-label">Nombre del producto<small>*</small></label>
                    <input class="form-control" name="nombre" type="text" required="true">
                </div>

                <div class="form-group label-floating col-md-6">
                    <label class="control-label">Precio<small>*</small></label>
                    <input class="form-control" type="text" name="precio" number="true">
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
                              <input type="file" name="imagen" />
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
