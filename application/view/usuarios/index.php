<div class='table-responsive'>
    <table class='table table-hover'>
        <thead>
            <tr>
                <th>Documento</th>
                <th>Tipo Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Telefono Fijo</th>
                <th>Telefono Movil</th>
                <th>Direccion</th>
                <th>Estado</th>
                <th>Rol</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $value) : ?>
            <tr>
                <td>
                    <?= $value["documento"] ?>
                </td>
                <td>
                    <?= $value["nom_tipo"] ?>
                </td>
                <td>
                    <?= $value["nombres"] ?>
                </td>
                <td>
                    <?= $value["apellidos"] ?>
                </td>
                <td>
                    <?= $value["email"] ?>
                </td>
                <td>
                    <?= $value["contrasena"] ?>
                </td>
                <td>
                    <?= $value["telefonoFijo"] ?>
                </td>
                <td>
                    <?= $value["telefonoMovil"] ?>
                </td>
                <td>
                    <?= $value["direccion"] ?>
                </td>
                <td>
                    <?= $value["estado"]==1?"Activo":"Inactivo" ?>
                </td>
                <td>
                    <?= $value["rol"] ?>
                </td>
                <td>
                    <a href="<?= URL ?>usuarios/edit/<?= $value['documento']?>">Editar</a>
                    <?php if ($value["estado"]==1) {?>
                    <a href="#" onclick="cambiarEstado(<?= $value['documento']?>,0)">Inactivar</a>
                    <?php  }else{ ?>
                    <a href="#" onclick="cambiarEstado(<?= $value['documento']?>,1)">Activar</a>
                    <?php } ?>
                </td>
            </tr>
            <?php  endforeach ?>
        </tbody>
    </table>
</div>
