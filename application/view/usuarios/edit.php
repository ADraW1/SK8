<div class="container-fluid animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Usuario</h1>
        </div>
    </div>
    <div class="col-lg-6">
        <h1>Modificar Usuario</h1>
        <form action="<?= URL?>usuarios/modificar" method="post">

            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-address-card" style="width: 15px;"></i></span>
                <input type="text" class="form-control" name="documento" placeholder="Documento" value="<?= $datos["documento"] ?>">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-address-card" style="width: 15px;"></i></span>
                <input type="text" class="form-control" name="tipoDoc" placeholder="Documento" value="<?= $datos["tb_TipoDocumento_id_TipoDocumento"] ?>">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-address-card" style="width: 15px;"></i></span>
                <input type="text" class="form-control" name="nombre" placeholder="Documento" value="<?= $datos["nombres"] ?>">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-address-card" style="width: 15px;"></i></span>
                <input type="text" class="form-control" name="apellido" placeholder="Documento" value="<?= $datos["apellido_1"] ?>">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-address-card" style="width: 15px;"></i></span>
                <input type="text" class="form-control" name="email" placeholder="Documento" value="<?= $datos["email"] ?>">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-address-card" style="width: 15px;"></i></span>
                <input type="text" class="form-control" name="contrasena" placeholder="Documento" value="<?= $datos["contrasena"] ?>">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-address-card" style="width: 15px;"></i></span>
                <input type="text" class="form-control" name="telfijo" placeholder="Documento" value="<?= $datos["telefonoFijo"] ?>">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-address-card" style="width: 15px;"></i></span>
                <input type="text" class="form-control" name="telmovil" placeholder="Documento" value="<?= $datos["telefonoMovil"] ?>">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-address-card" style="width: 15px;"></i></span>
                <input type="text" class="form-control" name="direc" placeholder="Documento" value="<?= $datos["direccion"] ?>">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-address-card" style="width: 15px;"></i></span>
                <input type="text" class="form-control" name="rol" placeholder="Documento" value="<?= $datos["tb_Rol_id_rol"] ?>">
            </div>
            <div class="form-group input-group">
                <button type="submit" class="form-control">Modificar</button>
            </div>
        </form>
    </div>
</div>
