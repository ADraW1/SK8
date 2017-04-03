<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Usuarios</h1>
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
                            <td><?= $value["documento"] ?></td>
                            <td><?= $value["nom_tipo"] ?></td>
                            <td><?= $value["nombres"] ?></td>
                            <td><?= $value["apellidos"] ?></td>
                            <td><?= $value["email"] ?></td>
                            <td><?= $value["contrasena"] ?></td>
                            <td><?= $value["telefonoFijo"] ?></td>
                            <td><?= $value["telefonoMovil"] ?></td>
                            <td><?= $value["direccion"] ?></td>
                            <td><?= $value["estado"]==1?"Activo":"Inactivo" ?></td>
                            <td><?= $value["rol"] ?></td>
                            <td>
                                <a class="btn btn-warning" href="<?= URL ?>usuarios/edit/<?= $value['documento']?>"><i class="fa fa-pencil fa-lg"></i></a>
                                <?php if ($value["estado"]==1) {?>
                                <a class="btn btn-danger" href="#" onclick="cambiarEstado(<?= $value['documento']?>,0)"><i class="fa fa-times fa-lg"></i></a>
                                <?php  }else{ ?>
                                <a class="btn btn-success" href="#" onclick="cambiarEstado(<?= $value['documento']?>,1)"><i class="fa fa-check fa-lg"></i></a>
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
