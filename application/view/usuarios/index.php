<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">person</i>
        </div>
        <h4 class="card-title">Usuarios</h4>
        <div class="card-content">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Documento</th>
                            <th class="text-center">T.Documento</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellido</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Fijo</th>
                            <th class="text-center">Movil</th>
                            <th class="text-center">Direccion</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Rol</th>
                            <th class="text-center">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $value) : ?>
                        <tr>
                            <td class="text-center"><?= $value["documento"] ?></td>
                            <td class="text-center"><?= $value["nom_tipo"] ?></td>
                            <td class="text-center"><?= $value["nombres"] ?></td>
                            <td class="text-center"><?= $value["apellidos"] ?></td>
                            <td class="text-center"><?= $value["email"] ?></td>
                            <td class="text-center"><?= $value["telefonoFijo"] ?></td>
                            <td class="text-center"><?= $value["telefonoMovil"] ?></td>
                            <td class="text-center"><?= $value["direccion"] ?></td>
                            <td class="text-center"><?= $value["estado"]==1?"Activo":"Inactivo" ?></td>
                            <td class="text-center"><?= $value["rol"] ?></td>
                            <td class="td-actions text-center">
                                <a class="btn btn-info" href="<?= URL ?>usuarios/edit/<?= $value['documento']?>"><i class="material-icons">edit</i></a>
                                <?php if ($value["estado"]==1) {?>
                                <a class="btn btn-danger" href="#" onclick="cambiarEstado(<?= $value['documento']?>,0)"><i class="material-icons">close</i></a>
                                <?php  }else{ ?>
                                <a class="btn btn-success" href="#" onclick="cambiarEstado(<?= $value['documento']?>,1)"><i class="material-icons">check</i></a>
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
      <form action="<?php echo  URL?>usuarios/insertarUsuario" method="post" onsubmit="return val_reg_usu()">
         <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">person_add</i>
         </div>
         <div class="form-group label-floating card-content">
           <h4 class="card-title">Insertar Usuario</h4>

           <div class="col-md-6">
              <select class="selectpicker" data-style="select-with-transition" title="Tipo de Identificacion" name="tipoDoc" id="2">
                 <?php foreach ($tdoc as $key): ?>
                   <option value="<?= $key['id_TipoDocumento'] ?>"><?=$key['nom_TipoDocumento'];?></option>
                <?php endforeach ?>
              </select>
           </div>

           <div class="form-group label-floating col-md-6">
              <label class="control-label">Documento<small>*</small></label>
              <input class="form-control" name="documento" type="text" id="1">
           </div>

           <div class="form-group label-floating col-md-6">
              <label class="control-label">Nombre<small>*</small></label>
              <input class="form-control" name="nombre" type="text" id="3">
           </div>

           <div class="form-group label-floating col-md-6">
              <label class="control-label">Apellido<small>*</small></label>
              <input class="form-control" name="apellido" type="text" id="4">
           </div>

           <div class="form-group label-floating col-md-6">
              <label class="control-label">Email<small>*</small></label>
              <input class="form-control" name="email" type="email">
           </div>

           <div class="form-group label-floating col-md-6">
              <label class="control-label">Contraseña<small>*</small></label>
              <input class="form-control" name="contrasena" id="registerPassword" type="password">
            </div>

           <div class="form-group label-floating col-md-6">
              <label class="control-label">Telefono Fijo<small>*</small></label>
              <input class="form-control" type="text" name="telfijo" number="true">
           </div>

           <div class="form-group label-floating col-md-6">
              <label class="control-label">Telefono Movil<small>*</small></label>
              <input class="form-control" type="text" name="telmovil" number="true">
           </div>

           <div class="form-group label-floating col-md-6">
              <label class="control-label">Direccion<small>*</small></label>
              <input class="form-control" name="direccion" type="text">
           </div>

           <div class="col-md-6">
              <select class="selectpicker" data-style="select-with-transition" title="Rol" name="rol">
                 <?php foreach ($rol as $key):?>
                   <option value="<?= $key['id_rol'] ?>"><?=$key['nom_rol'];?></option>
                 <?php  endforeach ?>
              </select>
           </div>

           <div class="card-footer text-right col-md-12">
             <button type="submit" name="addUsuario" class="btn btn-rose btn-fill">Ingresar</button>
           </div>
         </div>
      </form>
   </div>
</div>
<script src="<?php echo URL;?>js/validaciones/val_reg_usu.js"></script>
