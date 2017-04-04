INSERT INTO `tb_sub_cate` (`id_sub`, `nombre`) VALUES
(1, 'Skateboard'),
(2, 'Longboard'),
(3, 'Ropa');

INSERT INTO `tb_categoria` (`id_Categoria`, `nom_categoria`, `tb_sub_cate_id_sub`) VALUES
(1, 'Trucks Skateboard', 1),
(2, 'Trucks Longboard', 2),
(3, 'Camisas', 3),
(4, 'Pantalones', 3);

INSERT INTO `tb_marca` (`id_Marca`, `nom_marca`) VALUES
(1, 'Indepedent'),
(2, 'Nike'),
(3, 'DC Shoes');

INSERT INTO `tb_tallas` (`idtallas`, `nombre`) VALUES
(1, '129 mm'),
(2, 'XL'),
(3, '30');

INSERT INTO `tb_categoria_has_tb_marca` (`id_cat+mar`, `tb_categoria_id_Categoria`, `tb_marca_id_Marca`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 4, 2);

INSERT INTO `tb_categoria_has_tb_tallas` (`id_cat_tall`, `tb_categoria_id_Categoria`, `tb_tallas_idtallas`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 4, 3);

INSERT INTO `tb_tipodocumento` (`id_TipoDocumento`, `nom_TipoDocumento`) VALUES
(1, 'Cedula (C.C)'),
(2, 'Tarjeta de Identidad (T.I)'),
(3, 'Cedula de Extranjeria.'),
(4, 'NIT');

INSERT INTO `tb_rol` (`id_rol`, `nom_rol`) VALUES
(1, 'Cliente'),
(2, 'Empleado');
