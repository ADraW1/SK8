-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-04-2017 a las 18:48:37
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sk8`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `con_cat` (IN `cat` INT)  NO SQL
SELECT p.nom_categoria,p.id_Categoria from tb_categoria p JOIN tb_sub_cate sb on sb.id_sub=p.tb_sub_cate_id_sub where sb.id_sub=cat$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_cat_talla` (IN `id_talla` INT, IN `id_cat` INT)  NO SQL
SELECT * from tb_categoria_has_tb_tallas ct where ct.id_cat_tall=id_talla AND ct.tb_categoria_id_Categoria=id_cat$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_entrada_todo` ()  NO SQL
select e.id_entradas id,e.cantidad,e.fecha_entrada,p.nom_proveedor,pr.nombre
from tb_entrada e
join tb_proovedor p ON e.fk_proveedor = p.id_Proovedor
join tb_producto pr ON e.fk_producto = pr.id_Producto$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_marca` (IN `id` INT)  NO SQL
SELECT cm.tb_marca_id_Marca id_marca,m.nom_marca FROM tb_categoria_has_tb_marca cm join tb_categoria c on c.id_Categoria=cm.tb_categoria_id_Categoria join tb_marca m on m.id_Marca=cm.tb_marca_id_Marca where cm.tb_categoria_id_Categoria=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_producto` (IN `id` INT)  NO SQL
select p.id_Producto id,p.nombre,p.stockMinimo stock,p.precio,p.estado_producto estado,p.cantidad,c.nom_categoria,sc.nombre nom_sub,m.nom_marca,t.nombre nom_talla from tb_producto p join tb_categoria_has_tb_tallas ct on P.tb_categoria_has_tb_tallas_id_cat_tall=ct.id_cat_tall join tb_tallas t on t.idtallas=ct.tb_tallas_idtallas join tb_categoria c on ct.tb_categoria_id_Categoria=c.id_Categoria join tb_sub_cate sc on sc.id_sub=c.tb_sub_cate_id_sub join tb_categoria_has_tb_marca cm on cm.tb_categoria_id_Categoria=c.id_Categoria join tb_marca m on m.id_Marca=cm.tb_marca_id_Marca where p.id_Producto = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_producto_todo` ()  NO SQL
select p.id_Producto id,p.nombre,p.stockMinimo stock,p.precio,p.estado_producto estado,p.cantidad,c.nom_categoria,sc.nombre nom_sub,m.nom_marca,t.nombre nom_talla from tb_producto p join tb_categoria_has_tb_tallas ct on P.tb_categoria_has_tb_tallas_id_cat_tall=ct.id_cat_tall join tb_tallas t on t.idtallas=ct.tb_tallas_idtallas join tb_categoria c on ct.tb_categoria_id_Categoria=c.id_Categoria join tb_sub_cate sc on sc.id_sub=c.tb_sub_cate_id_sub join tb_categoria_has_tb_marca cm on cm.tb_categoria_id_Categoria=c.id_Categoria join tb_marca m on m.id_Marca=cm.tb_marca_id_Marca$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_talla` (IN `id` INT)  NO SQL
SELECT ct.tb_tallas_idtallas id_talla,t.nombre nom_talla FROM tb_categoria_has_tb_tallas ct join tb_categoria c on c.id_Categoria=ct.tb_categoria_id_Categoria join tb_tallas t on t.idtallas=ct.tb_tallas_idtallas where ct.tb_categoria_id_Categoria=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_usuario` (IN `id` INT)  NO SQL
SELECT u.documento,tp.nom_TipoDocumento nom_tipo,u.nombres,u.apellido_1 apellidos,u.email,u.contrasena,u.telefonoFijo,u.telefonoMovil,u.direccion,u.estado,r.nom_rol rol FROM tb_usuario u JOIN tb_tipodocumento tp on tp.id_TipoDocumento = u.tb_TipoDocumento_id_TipoDocumento JOIN tb_rol r on r.id_rol=u.tb_Rol_id_rol where u.documento=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `con_usuario_todo` ()  NO SQL
SELECT u.documento,tp.nom_TipoDocumento nom_tipo,u.nombres,u.apellido_1 apellidos,u.email,u.contrasena,u.telefonoFijo,u.telefonoMovil,u.direccion,u.estado,r.nom_rol rol FROM tb_usuario u JOIN tb_tipodocumento tp on tp.id_TipoDocumento = u.tb_TipoDocumento_id_TipoDocumento JOIN tb_rol r on r.id_rol=u.tb_Rol_id_rol$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_cant` (IN `id` INT, IN `cant` INT)  NO SQL
update tb_producto set cantidad=cantidad + cant where id_Producto = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mod_estado_producto` (IN `id` INT, IN `estado` BOOLEAN)  NO SQL
UPDATE tb_producto p SET p.estado_producto=estado where p.id_Producto=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mod_estado_usuario` (IN `doc` VARCHAR(20), IN `estado` BOOLEAN)  NO SQL
UPDATE tb_usuario u SET u.estado=estado where u.documento=doc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mod_producto` (IN `id` INT, IN `nombre` VARCHAR(25), IN `stock` INT, IN `precio` INT, IN `estado` BOOLEAN, IN `cantidad` INT, IN `categoria` INT, IN `img` VARCHAR(100))  NO SQL
UPDATE tb_producto p SET nombre = nombre, stockMinimo = stock, precio = precio, estado_producto = estado, cantidad = cantidad,p.tb_categoria_has_tb_tallas_id_cat_tall = categoria, imagen = img WHERE id_Producto = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mod_usuario` (IN `doc` VARCHAR(20), IN `tipdoc` INT, IN `nom` VARCHAR(45), IN `apell` VARCHAR(45), IN `email` VARCHAR(45), IN `pass` VARCHAR(45), IN `telF` VARCHAR(20), IN `telM` VARCHAR(20), IN `direcc` VARCHAR(20), IN `rol` INT)  NO SQL
update tb_usuario set tb_TipoDocumento_id_TipoDocumento=tipdoc, nombres=nom,apellido_1=apell,email=email, contrasena=pass, telefonoFijo=telF,telefonoMovil=telM,direccion=direcc,tb_Rol_id_rol=rol where documento=doc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reg_entrada` (IN `cant` INT, IN `id_prod` INT, IN `id_proveedor` INT)  NO SQL
insert into tb_entrada
values(null,cant,CURRENT_TIMESTAMP,id_prod, id_proveedor)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reg_producto` (IN `nombre` VARCHAR(25), IN `precio` INT, IN `img` VARCHAR(100), IN `id_cat_tal_mar` INT)  NO SQL
INSERT INTO tb_producto (nombre,precio,imagen,tb_categoria_has_tb_tallas_id_cat_tall) VALUES (nombre, precio, img, id_cat_tal_mar)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reg_usuario` (IN `id` VARCHAR(20), IN `tipo` INT, IN `nomb` VARCHAR(45) CHARSET utf8, IN `ape` VARCHAR(45) CHARSET utf8, IN `email` VARCHAR(45) CHARSET utf8, IN `pass` VARCHAR(45) CHARSET utf8, IN `telf` VARCHAR(45) CHARSET utf8, IN `telm` VARCHAR(45) CHARSET utf8, IN `dir` VARCHAR(45) CHARSET utf8, IN `rol` INT)  NO SQL
INSERT into tb_usuario (documento,tb_TipoDocumento_id_TipoDocumento,nombres,apellido_1,email,contrasena,telefonoFijo,telefonoMovil,direccion,tb_Rol_id_rol) values (id,tipo,nomb,ape,email,pass,telf,telm,dir,rol)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `val_cat_mar_tal` (IN `id_cat` INT, IN `id_talla` INT, IN `id_mar` INT)  NO SQL
SELECT ct.id_cat_tall id FROM tb_categoria_has_tb_tallas ct
JOIN tb_categoria c on ct.tb_categoria_id_Categoria=c.id_Categoria
JOIN tb_categoria_has_tb_marca cm on c.id_Categoria=cm.tb_categoria_id_Categoria
where c.id_Categoria=id_cat and ct.tb_tallas_idtallas=id_talla and cm.tb_marca_id_Marca=id_mar$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id_Categoria` int(11) NOT NULL,
  `nom_categoria` varchar(45) NOT NULL,
  `tb_sub_cate_id_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='	';

--
-- Volcado de datos para la tabla `tb_categoria`
--

INSERT INTO `tb_categoria` (`id_Categoria`, `nom_categoria`, `tb_sub_cate_id_sub`) VALUES
(1, 'Trucks Skateboard', 1),
(2, 'Trucks Longboard', 2),
(3, 'Camisas', 3),
(4, 'Pantalones', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categoria_has_tb_marca`
--

CREATE TABLE `tb_categoria_has_tb_marca` (
  `id_cat+mar` int(11) NOT NULL,
  `tb_categoria_id_Categoria` int(11) NOT NULL,
  `tb_marca_id_Marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_categoria_has_tb_marca`
--

INSERT INTO `tb_categoria_has_tb_marca` (`id_cat+mar`, `tb_categoria_id_Categoria`, `tb_marca_id_Marca`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categoria_has_tb_tallas`
--

CREATE TABLE `tb_categoria_has_tb_tallas` (
  `id_cat_tall` int(11) NOT NULL,
  `tb_categoria_id_Categoria` int(11) NOT NULL,
  `tb_tallas_idtallas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_categoria_has_tb_tallas`
--

INSERT INTO `tb_categoria_has_tb_tallas` (`id_cat_tall`, `tb_categoria_id_Categoria`, `tb_tallas_idtallas`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_chat`
--

CREATE TABLE `tb_chat` (
  `idchat` int(11) NOT NULL,
  `fecha_hora_E` datetime NOT NULL,
  `mensaje` longtext NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fk_usuariodocumento` varchar(20) NOT NULL,
  `fk_usuariodocumento1` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ciudad`
--

CREATE TABLE `tb_ciudad` (
  `id_Ciudad` int(11) NOT NULL,
  `nom_Ciudad` varchar(45) DEFAULT NULL,
  `tb_Departamento_id_Departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_departamento`
--

CREATE TABLE `tb_departamento` (
  `id_Departamento` int(11) NOT NULL,
  `nom_departamento` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalle`
--

CREATE TABLE `tb_detalle` (
  `id_Detalle` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `tb_Producto_id_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalleplantilla`
--

CREATE TABLE `tb_detalleplantilla` (
  `id_detallleplant` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `fk_plantilla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detallepromocion`
--

CREATE TABLE `tb_detallepromocion` (
  `descuento` float NOT NULL,
  `preciopromocion` float NOT NULL,
  `fk_promocion` int(11) NOT NULL,
  `fk_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_entrada`
--

CREATE TABLE `tb_entrada` (
  `id_entradas` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_entrada` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fk_producto` int(11) NOT NULL,
  `fk_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_entrada`
--

INSERT INTO `tb_entrada` (`id_entradas`, `cantidad`, `fecha_entrada`, `fk_producto`, `fk_proveedor`) VALUES
(1, 12, '2017-04-05 10:59:37', 1, 1),
(2, 3, '2017-04-05 11:01:23', 2, 2),
(3, 10, '2017-04-05 11:10:21', 2, 1);

--
-- Disparadores `tb_entrada`
--
DELIMITER $$
CREATE TRIGGER `EntradaCantidad` AFTER INSERT ON `tb_entrada` FOR EACH ROW update tb_producto  set cantidad=cantidad + new.cantidad
where id_Producto = new.fk_producto
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_pedido`
--

CREATE TABLE `tb_estado_pedido` (
  `id_estado_Pedido` int(11) NOT NULL,
  `nom_estado` varchar(45) DEFAULT NULL,
  `descripcion_pedido` varchar(45) DEFAULT NULL,
  `tb_Pedido_id_Pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_marca`
--

CREATE TABLE `tb_marca` (
  `id_Marca` int(11) NOT NULL,
  `nom_marca` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_marca`
--

INSERT INTO `tb_marca` (`id_Marca`, `nom_marca`) VALUES
(1, 'Indepedent'),
(2, 'Nike'),
(3, 'DC Shoes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pedido`
--

CREATE TABLE `tb_pedido` (
  `id_Pedido` int(11) NOT NULL,
  `fecha_pedido` datetime DEFAULT NULL,
  `estadoventa` varchar(45) DEFAULT NULL,
  `Subtotal` double NOT NULL,
  `Total` double NOT NULL,
  `tb_Ciudad_id_Ciudad` int(11) NOT NULL,
  `tb_Usuario_documento` varchar(20) NOT NULL,
  `fk_detallep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_plantilla`
--

CREATE TABLE `tb_plantilla` (
  `id_plantilla` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `caracterizacion` varchar(45) NOT NULL,
  `total` int(11) NOT NULL,
  `fk_detalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_producto`
--

CREATE TABLE `tb_producto` (
  `id_Producto` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `stockMinimo` int(11) NOT NULL DEFAULT '4',
  `precio` int(11) NOT NULL,
  `estado_producto` tinyint(1) NOT NULL DEFAULT '1',
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `imagen` varchar(200) DEFAULT NULL,
  `tb_categoria_has_tb_tallas_id_cat_tall` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_producto`
--

INSERT INTO `tb_producto` (`id_Producto`, `nombre`, `stockMinimo`, `precio`, `estado_producto`, `cantidad`, `imagen`, `tb_categoria_has_tb_tallas_id_cat_tall`) VALUES
(1, 'Trucks Indy', 4, 120000, 1, 12, 'imgres.jpg', 1),
(2, 'Camisa Negra', 4, 40000, 1, 13, 'imgres.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_promocion`
--

CREATE TABLE `tb_promocion` (
  `id_Promocion` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_proovedor`
--

CREATE TABLE `tb_proovedor` (
  `id_Proovedor` int(11) NOT NULL,
  `nom_proveedor` varchar(45) DEFAULT NULL,
  `nom_contacto` varchar(45) DEFAULT NULL,
  `tel_contacto` varchar(45) DEFAULT NULL,
  `estado_proveedor` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_proovedor`
--

INSERT INTO `tb_proovedor` (`id_Proovedor`, `nom_proveedor`, `nom_contacto`, `tel_contacto`, `estado_proveedor`) VALUES
(1, 'Soulfish', 'Andres', '3455555', 1),
(2, 'Amateur', 'Carlos', '13344', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_publicacion`
--

CREATE TABLE `tb_publicacion` (
  `id_publicacion` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` longtext NOT NULL,
  `fechacreacion` date NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `imagen` varchar(20) NOT NULL,
  `lugarevento` varchar(20) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fk_usuarios` varchar(20) NOT NULL,
  `fk_tipopubli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rol`
--

CREATE TABLE `tb_rol` (
  `id_rol` int(11) NOT NULL,
  `nom_rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_rol`
--

INSERT INTO `tb_rol` (`id_rol`, `nom_rol`) VALUES
(1, 'Cliente'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_sub_cate`
--

CREATE TABLE `tb_sub_cate` (
  `id_sub` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_sub_cate`
--

INSERT INTO `tb_sub_cate` (`id_sub`, `nombre`) VALUES
(1, 'Skateboard'),
(2, 'Longboard'),
(3, 'Ropa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tallas`
--

CREATE TABLE `tb_tallas` (
  `idtallas` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_tallas`
--

INSERT INTO `tb_tallas` (`idtallas`, `nombre`) VALUES
(1, '129 mm'),
(2, 'XL'),
(3, '30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipodocumento`
--

CREATE TABLE `tb_tipodocumento` (
  `id_TipoDocumento` int(11) NOT NULL,
  `nom_TipoDocumento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_tipodocumento`
--

INSERT INTO `tb_tipodocumento` (`id_TipoDocumento`, `nom_TipoDocumento`) VALUES
(1, 'Cedula (C.C)'),
(2, 'Tarjeta de Identidad (T.I)'),
(3, 'Cedula de Extranjeria.'),
(4, 'NIT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_publicacion`
--

CREATE TABLE `tb_tipo_publicacion` (
  `id_Tipo_Publicacion` int(11) NOT NULL,
  `nom_Tipo_Publicacion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `documento` varchar(20) NOT NULL,
  `tb_TipoDocumento_id_TipoDocumento` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellido_1` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `telefonoFijo` varchar(20) DEFAULT NULL,
  `telefonoMovil` varchar(20) DEFAULT NULL,
  `direccion` varchar(20) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `tb_Rol_id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_usuario`
--

INSERT INTO `tb_usuario` (`documento`, `tb_TipoDocumento_id_TipoDocumento`, `nombres`, `apellido_1`, `email`, `contrasena`, `telefonoFijo`, `telefonoMovil`, `direccion`, `estado`, `tb_Rol_id_rol`) VALUES
('1064657722', 1, 'Amanda', 'Barrios', 'avelez90@misena.edu.co', '123', '7987988', '89789889', 'Barrio Triste', 1, 1),
('345345', 2, 'Diego', 'Marin', 'diego@gmail.com', '123', '4353453', '35345345', 'Alpes', 1, 2),
('45645645', 4, 'Daniel', 'Agudelo', 'daniel@gmail.com', '123', '42323423', '2342534', 'Pikachu', 1, 2),
('546789234', 1, 'Adraw', 'Velez', 'adraw@gmail.com', '123', '324444', '5444444', 'Itagui', 1, 1),
('99042810866', 2, 'Juan David', 'Cardenas', 'cardenas@gmail.com', '123', '3178200389', '5885203', 'Rodeo Verde', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id_Categoria`,`tb_sub_cate_id_sub`),
  ADD KEY `fk_tb_categoria_tb_sub_cate1_idx` (`tb_sub_cate_id_sub`);

--
-- Indices de la tabla `tb_categoria_has_tb_marca`
--
ALTER TABLE `tb_categoria_has_tb_marca`
  ADD PRIMARY KEY (`id_cat+mar`),
  ADD KEY `fk_tb_categoria_has_tb_marca_tb_marca1_idx` (`tb_marca_id_Marca`),
  ADD KEY `fk_tb_categoria_has_tb_marca_tb_categoria1_idx` (`tb_categoria_id_Categoria`);

--
-- Indices de la tabla `tb_categoria_has_tb_tallas`
--
ALTER TABLE `tb_categoria_has_tb_tallas`
  ADD PRIMARY KEY (`id_cat_tall`),
  ADD KEY `fk_tb_categoria_has_tb_tallas_tb_tallas1_idx` (`tb_tallas_idtallas`),
  ADD KEY `fk_tb_categoria_has_tb_tallas_tb_categoria1_idx` (`tb_categoria_id_Categoria`);

--
-- Indices de la tabla `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`idchat`),
  ADD KEY `fk_usuariodocumento` (`fk_usuariodocumento`);

--
-- Indices de la tabla `tb_ciudad`
--
ALTER TABLE `tb_ciudad`
  ADD PRIMARY KEY (`id_Ciudad`,`tb_Departamento_id_Departamento`),
  ADD KEY `fk_tb_Ciudad_tb_Departamento1_idx` (`tb_Departamento_id_Departamento`);

--
-- Indices de la tabla `tb_departamento`
--
ALTER TABLE `tb_departamento`
  ADD PRIMARY KEY (`id_Departamento`);

--
-- Indices de la tabla `tb_detalle`
--
ALTER TABLE `tb_detalle`
  ADD PRIMARY KEY (`id_Detalle`,`tb_Producto_id_Producto`),
  ADD KEY `fk_tb_Detalle_tb_Producto1_idx` (`tb_Producto_id_Producto`);

--
-- Indices de la tabla `tb_detalleplantilla`
--
ALTER TABLE `tb_detalleplantilla`
  ADD PRIMARY KEY (`id_detallleplant`);

--
-- Indices de la tabla `tb_detallepromocion`
--
ALTER TABLE `tb_detallepromocion`
  ADD KEY `fk_promocion` (`fk_promocion`),
  ADD KEY `fk_producto` (`fk_producto`);

--
-- Indices de la tabla `tb_entrada`
--
ALTER TABLE `tb_entrada`
  ADD PRIMARY KEY (`id_entradas`),
  ADD KEY `id_entradas` (`id_entradas`),
  ADD KEY `fk_proveedor` (`fk_proveedor`),
  ADD KEY `fk_proveedor_2` (`fk_proveedor`),
  ADD KEY `fk_producto` (`fk_producto`);

--
-- Indices de la tabla `tb_estado_pedido`
--
ALTER TABLE `tb_estado_pedido`
  ADD PRIMARY KEY (`id_estado_Pedido`,`tb_Pedido_id_Pedido`),
  ADD KEY `fk_tb_estado_Pedido_tb_Pedido1_idx` (`tb_Pedido_id_Pedido`);

--
-- Indices de la tabla `tb_marca`
--
ALTER TABLE `tb_marca`
  ADD PRIMARY KEY (`id_Marca`);

--
-- Indices de la tabla `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD PRIMARY KEY (`id_Pedido`,`tb_Ciudad_id_Ciudad`,`tb_Usuario_documento`),
  ADD KEY `fk_tb_Pedido_tb_Ciudad1_idx` (`tb_Ciudad_id_Ciudad`),
  ADD KEY `fk_tb_Pedido_tb_Usuario1_idx` (`tb_Usuario_documento`),
  ADD KEY `fk_detallep` (`fk_detallep`);

--
-- Indices de la tabla `tb_plantilla`
--
ALTER TABLE `tb_plantilla`
  ADD PRIMARY KEY (`id_plantilla`),
  ADD KEY `fk_detalle` (`fk_detalle`);

--
-- Indices de la tabla `tb_producto`
--
ALTER TABLE `tb_producto`
  ADD PRIMARY KEY (`id_Producto`,`tb_categoria_has_tb_tallas_id_cat_tall`),
  ADD UNIQUE KEY `id_Producto` (`id_Producto`),
  ADD KEY `fk_tb_producto_tb_categoria_has_tb_tallas1_idx` (`tb_categoria_has_tb_tallas_id_cat_tall`);

--
-- Indices de la tabla `tb_promocion`
--
ALTER TABLE `tb_promocion`
  ADD PRIMARY KEY (`id_Promocion`);

--
-- Indices de la tabla `tb_proovedor`
--
ALTER TABLE `tb_proovedor`
  ADD PRIMARY KEY (`id_Proovedor`),
  ADD KEY `id_Proovedor` (`id_Proovedor`);

--
-- Indices de la tabla `tb_publicacion`
--
ALTER TABLE `tb_publicacion`
  ADD PRIMARY KEY (`id_publicacion`),
  ADD KEY `fk_usuarios` (`fk_usuarios`),
  ADD KEY `fk_tipopubli` (`fk_tipopubli`),
  ADD KEY `fk_usuarios_2` (`fk_usuarios`);

--
-- Indices de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tb_sub_cate`
--
ALTER TABLE `tb_sub_cate`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indices de la tabla `tb_tallas`
--
ALTER TABLE `tb_tallas`
  ADD PRIMARY KEY (`idtallas`);

--
-- Indices de la tabla `tb_tipodocumento`
--
ALTER TABLE `tb_tipodocumento`
  ADD PRIMARY KEY (`id_TipoDocumento`);

--
-- Indices de la tabla `tb_tipo_publicacion`
--
ALTER TABLE `tb_tipo_publicacion`
  ADD PRIMARY KEY (`id_Tipo_Publicacion`);

--
-- Indices de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`documento`,`tb_TipoDocumento_id_TipoDocumento`,`tb_Rol_id_rol`),
  ADD UNIQUE KEY `documento` (`documento`),
  ADD KEY `fk_tb_Usuario_tb_TipoDocumento_idx` (`tb_TipoDocumento_id_TipoDocumento`),
  ADD KEY `fk_tb_Usuario_tb_Rol1_idx` (`tb_Rol_id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_categoria_has_tb_marca`
--
ALTER TABLE `tb_categoria_has_tb_marca`
  MODIFY `id_cat+mar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_categoria_has_tb_tallas`
--
ALTER TABLE `tb_categoria_has_tb_tallas`
  MODIFY `id_cat_tall` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_departamento`
--
ALTER TABLE `tb_departamento`
  MODIFY `id_Departamento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_detalle`
--
ALTER TABLE `tb_detalle`
  MODIFY `id_Detalle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_entrada`
--
ALTER TABLE `tb_entrada`
  MODIFY `id_entradas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_marca`
--
ALTER TABLE `tb_marca`
  MODIFY `id_Marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_pedido`
--
ALTER TABLE `tb_pedido`
  MODIFY `id_Pedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_plantilla`
--
ALTER TABLE `tb_plantilla`
  MODIFY `id_plantilla` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_producto`
--
ALTER TABLE `tb_producto`
  MODIFY `id_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb_promocion`
--
ALTER TABLE `tb_promocion`
  MODIFY `id_Promocion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_publicacion`
--
ALTER TABLE `tb_publicacion`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb_sub_cate`
--
ALTER TABLE `tb_sub_cate`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_tallas`
--
ALTER TABLE `tb_tallas`
  MODIFY `idtallas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_tipodocumento`
--
ALTER TABLE `tb_tipodocumento`
  MODIFY `id_TipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD CONSTRAINT `fk_tb_categoria_tb_sub_cate1` FOREIGN KEY (`tb_sub_cate_id_sub`) REFERENCES `tb_sub_cate` (`id_sub`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_categoria_has_tb_marca`
--
ALTER TABLE `tb_categoria_has_tb_marca`
  ADD CONSTRAINT `fk_tb_categoria_has_tb_marca_tb_categoria1` FOREIGN KEY (`tb_categoria_id_Categoria`) REFERENCES `tb_categoria` (`id_Categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_categoria_has_tb_marca_tb_marca1` FOREIGN KEY (`tb_marca_id_Marca`) REFERENCES `tb_marca` (`id_Marca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_categoria_has_tb_tallas`
--
ALTER TABLE `tb_categoria_has_tb_tallas`
  ADD CONSTRAINT `fk_tb_categoria_has_tb_tallas_tb_categoria1` FOREIGN KEY (`tb_categoria_id_Categoria`) REFERENCES `tb_categoria` (`id_Categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_categoria_has_tb_tallas_tb_tallas1` FOREIGN KEY (`tb_tallas_idtallas`) REFERENCES `tb_tallas` (`idtallas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD CONSTRAINT `tb_chat_ibfk_1` FOREIGN KEY (`fk_usuariodocumento`) REFERENCES `tb_usuario` (`documento`);

--
-- Filtros para la tabla `tb_ciudad`
--
ALTER TABLE `tb_ciudad`
  ADD CONSTRAINT `fk_tb_Ciudad_tb_Departamento1` FOREIGN KEY (`tb_Departamento_id_Departamento`) REFERENCES `tb_departamento` (`id_Departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_detalle`
--
ALTER TABLE `tb_detalle`
  ADD CONSTRAINT `fk_tb_Detalle_tb_Producto1` FOREIGN KEY (`tb_Producto_id_Producto`) REFERENCES `tb_producto` (`id_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_detalleplantilla`
--
ALTER TABLE `tb_detalleplantilla`
  ADD CONSTRAINT `tb_detalleplantilla_ibfk_1` FOREIGN KEY (`id_detallleplant`) REFERENCES `tb_plantilla` (`id_plantilla`);

--
-- Filtros para la tabla `tb_detallepromocion`
--
ALTER TABLE `tb_detallepromocion`
  ADD CONSTRAINT `tb_detallepromocion_ibfk_1` FOREIGN KEY (`fk_producto`) REFERENCES `tb_producto` (`id_Producto`),
  ADD CONSTRAINT `tb_detallepromocion_ibfk_2` FOREIGN KEY (`fk_promocion`) REFERENCES `tb_promocion` (`id_Promocion`);

--
-- Filtros para la tabla `tb_entrada`
--
ALTER TABLE `tb_entrada`
  ADD CONSTRAINT `tb_entrada_ibfk_2` FOREIGN KEY (`fk_proveedor`) REFERENCES `tb_proovedor` (`id_Proovedor`),
  ADD CONSTRAINT `tb_entrada_ibfk_3` FOREIGN KEY (`fk_producto`) REFERENCES `tb_producto` (`id_Producto`);

--
-- Filtros para la tabla `tb_estado_pedido`
--
ALTER TABLE `tb_estado_pedido`
  ADD CONSTRAINT `fk_tb_estado_Pedido_tb_Pedido1` FOREIGN KEY (`tb_Pedido_id_Pedido`) REFERENCES `tb_pedido` (`id_Pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD CONSTRAINT `fk_tb_Pedido_tb_Ciudad1` FOREIGN KEY (`tb_Ciudad_id_Ciudad`) REFERENCES `tb_ciudad` (`id_Ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_Pedido_tb_Usuario1` FOREIGN KEY (`tb_Usuario_documento`) REFERENCES `tb_usuario` (`documento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_pedido_ibfk_1` FOREIGN KEY (`fk_detallep`) REFERENCES `tb_detalle` (`id_Detalle`);

--
-- Filtros para la tabla `tb_plantilla`
--
ALTER TABLE `tb_plantilla`
  ADD CONSTRAINT `tb_plantilla_ibfk_1` FOREIGN KEY (`fk_detalle`) REFERENCES `tb_detalle` (`id_Detalle`);

--
-- Filtros para la tabla `tb_producto`
--
ALTER TABLE `tb_producto`
  ADD CONSTRAINT `fk_tb_producto_tb_categoria_has_tb_tallas1` FOREIGN KEY (`tb_categoria_has_tb_tallas_id_cat_tall`) REFERENCES `tb_categoria_has_tb_tallas` (`id_cat_tall`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_publicacion`
--
ALTER TABLE `tb_publicacion`
  ADD CONSTRAINT `tb_publicacion_ibfk_1` FOREIGN KEY (`fk_usuarios`) REFERENCES `tb_usuario` (`documento`),
  ADD CONSTRAINT `tb_publicacion_ibfk_2` FOREIGN KEY (`fk_tipopubli`) REFERENCES `tb_tipo_publicacion` (`id_Tipo_Publicacion`);

--
-- Filtros para la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_tb_Usuario_tb_Rol1` FOREIGN KEY (`tb_Rol_id_rol`) REFERENCES `tb_rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_Usuario_tb_TipoDocumento` FOREIGN KEY (`tb_TipoDocumento_id_TipoDocumento`) REFERENCES `tb_tipodocumento` (`id_TipoDocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
