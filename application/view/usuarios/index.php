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
                            <th class="text-center">Tipo Documento</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellido</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Telefono Fijo</th>
                            <th class="text-center">Telefono Movil</th>
                            <th class="text-center">Direccion</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Rol</th>
                            <th class="text-center">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $value) : ?>
                        <tr>
                            <td class="text-center">
                                <?= $value["documento"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["nom_tipo"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["nombres"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["apellidos"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["email"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["telefonoFijo"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["telefonoMovil"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["direccion"] ?>
                            </td>
                            <td class="text-center">
                                <?= $value["estado"]==1?"Activo":"Inactivo" ?>
                            </td>
                            <td class="text-center">
                                <?= $value["rol"] ?>
                            </td>
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
