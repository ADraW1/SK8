<div class="col-md-12">
   <div class="card">
      <form id="RegisterValidation" action="<?= URL?>usuarios/modificar" method="post">
         <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">edit</i>
         </div>
         <div class="form-group label-floating card-content">
            <h4 class="card-title">Modificar persona</h4>
            <div class="col-md-6">
               <select class="selectpicker" data-style="select-with-transition" title="Tipo de Identificacion" name="tipoDoc">
                  <?php foreach ($tdoc as $key): ?>
                    <option value="<?= $key['id_TipoDocumento'] ?>"><?=$key['nom_TipoDocumento'];?></option>
                 <?php endforeach ?>
               </select>
            </div>
            <div class="form-group label-floating col-md-6">
               <label class="control-label">
               Documento
               <small>*</small>
               </label>
               <input class="form-control" name="documento" type="text" required="true" value="<?= $datos["documento"] ?>">
            </div>
            <div class="form-group label-floating col-md-6">
               <label class="control-label">
               Nombre
               <small>*</small>
               </label>
               <input class="form-control" name="nombre" type="text" required="true" value="<?= $datos["nombres"] ?>"/>
            </div>
            <div class="form-group label-floating col-md-6">
               <label class="control-label">
               Apellido
               <small>*</small>
               </label>
               <input class="form-control" name="apellido" type="text" required="true" value="<?= $datos["apellido_1"] ?>"/>
            </div>
            <div class="form-group label-floating col-md-6">
               <label class="control-label">
               Email
               <small>*</small>
               </label>
               <input class="form-control" name="email" type="email" email="true" value="<?= $datos["email"] ?>"/>
            </div>
            <div class="form-group label-floating col-md-6">
               <label class="control-label">
               Contraseña
               <small>*</small>
               </label>
               <input class="form-control" name="contrasena" id="registerPassword" type="password" required="true" value="<?= $datos["contrasena"] ?>"/>
            </div>
            <div class="form-group label-floating col-md-6">
               <label class="control-label">
               Telefono Fijo
               <small>*</small>
               </label>
               <input class="form-control" type="text" name="telfijo" number="true" value="<?= $datos["telefonoFijo"] ?>"/>
            </div>
            <div class="form-group label-floating col-md-6">
               <label class="control-label">
               Telefono Movil
               <small>*</small>
               </label>
               <input class="form-control" type="text" name="telmovil" number="true" value="<?= $datos["telefonoMovil"] ?>"/>
            </div>
            <div class="form-group label-floating col-md-6">
               <label class="control-label">
               Direccion
               <small>*</small>
               </label>
               <input class="form-control" name="direc" type="text" required="true" value="<?= $datos["direccion"] ?>"/>
            </div>
            <div class="col-md-6">
               <select class="selectpicker" data-style="select-with-transition" title="Rol" name="rol">
                  <?php foreach ($rol as $key):?>
                    <option value="<?= $key['id_rol'] ?>"><?=$key['nom_rol'];?></option>
                  <?php  endforeach ?>
               </select>
            </div>
            <div class="form-footer text-right">
               <button type="submit" class="btn btn-rose btn-fill" name="updateUsuario">Modificar</button>
            </div>
         </div>
      </form>
   </div>
</div>
