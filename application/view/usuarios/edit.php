<div class="col-md-12">
   <div class="card">
      <form id="RegisterValidation" action="<?= URL?>usuarios/modificar" method="post">
         <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">edit</i>
         </div>
         <div class="form-group label-floating card-content">
            <h4 class="card-title">Modificar persona</h4>
            <div class="col-md-6">
               <select class="selectpicker" data-style="select-with-transition" multiple title="Tipo de Identificacion" data-size="7">
                  <option disabled>Desactia</option>
                  <option value="2">Cedula </option>
                  <option value="3">Tarjeta de identidad</option>
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
               <input class="form-control" type="text" name="number" number="true" value="<?= $datos["telefonoFijo"] ?>"/>
            </div>
            <div class="form-group label-floating col-md-6">
               <label class="control-label">
               Telefono Movil
               <small>*</small>
               </label>
               <input class="form-control" type="text" name="number" number="true" value="<?= $datos["telefonoMovil"] ?>"/>
            </div>
            <div class="form-group label-floating col-md-6">
               <label class="control-label">
               Direccion
               <small>*</small>
               </label>
               <input class="form-control" name="apellido" type="text" required="true" value="<?= $datos["direccion"] ?>"/>
            </div>
            <div class="col-md-6">
               <select class="selectpicker" data-style="select-with-transition" multiple title="Rol" data-size="7">
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
