-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `detalle_cat` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `categoria`;
INSERT INTO `categoria` (`id_categoria`, `detalle_cat`) VALUES
(1,	'Verano'),
(2,	'Otoño'),
(5,	'Invierno'),
(6,	'Primavera');

DROP TABLE IF EXISTS `categoria_producto`;
CREATE TABLE `categoria_producto` (
  `id_catprod` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_catprod` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_subcat` int(11) NOT NULL,
  PRIMARY KEY (`id_catprod`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_subcat` (`id_subcat`),
  CONSTRAINT `categoria_producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  CONSTRAINT `categoria_producto_ibfk_2` FOREIGN KEY (`id_subcat`) REFERENCES `subcat` (`id_subcat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `categoria_producto`;
INSERT INTO `categoria_producto` (`id_catprod`, `titulo_catprod`, `id_categoria`, `id_subcat`) VALUES
(1,	'Manga Corta',	1,	10),
(2,	'Manga Larga',	1,	10),
(3,	'Tiro Corto',	1,	4),
(4,	'Demontables',	2,	5),
(9,	'Tiro Largo',	5,	8),
(10,	'Impermeables',	5,	2),
(12,	'Reversibles',	6,	9),
(13,	'Pelusas',	1,	2),
(14,	'Sin capucha',	5,	3),
(15,	'Ojotas',	1,	13);

DROP TABLE IF EXISTS `color`;
CREATE TABLE `color` (
  `id_color` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `color`;
INSERT INTO `color` (`id_color`, `descripcion`) VALUES
(1,	'Negro'),
(2,	'Rojo'),
(3,	'Dorado'),
(4,	'Amarillo'),
(5,	'Blanco');

DROP TABLE IF EXISTS `genero`;
CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `genero`;
INSERT INTO `genero` (`id_genero`, `descripcion`) VALUES
(1,	'Mujer'),
(2,	'Hombre'),
(3,	'Niño'),
(4,	'Niña'),
(5,	'Sin especificar');

DROP TABLE IF EXISTS `imagen_producto`;
CREATE TABLE `imagen_producto` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `imagen_filesystem` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_imagen`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `imagen_producto_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `imagen_producto`;
INSERT INTO `imagen_producto` (`id_imagen`, `id_producto`, `orden`, `imagen_filesystem`) VALUES
(1,	1,	1,	'camperalewis1.jpg'),
(3,	2,	1,	'airforce1nike1.jpg'),
(5,	3,	1,	'bfaopadidas1.jpg'),
(7,	4,	1,	'havaianasojotas.jpg'),
(9,	9,	1,	'gladiator1.jpg'),
(11,	10,	1,	'pr27.jpg'),
(14,	5,	1,	'flamestrikeadidas.jpg'),
(15,	7,	1,	'remerabross1.jpg'),
(16,	11,	1,	'pr27.jpg'),
(17,	12,	1,	'pr27.jpg'),
(18,	6,	1,	'underarmour1.jpg'),
(19,	8,	1,	'remerabross1.jpg');

DROP TABLE IF EXISTS `marca_producto`;
CREATE TABLE `marca_producto` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `marca_producto`;
INSERT INTO `marca_producto` (`id_marca`, `descripcion`) VALUES
(1,	'Adidas'),
(2,	'Nike'),
(3,	'Levis'),
(4,	'Casio'),
(5,	'Ray Ban'),
(6,	'dolce gabbana'),
(7,	'Lady Stork'),
(8,	'Havaianas'),
(9,	'Bross'),
(10,	'Under Armour');

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `descripcion_detallada` varchar(600) NOT NULL,
  `precio` double NOT NULL,
  `marca_producto` int(11) NOT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  `isactivo` tinyint(1) NOT NULL,
  `destacado` tinyint(1) NOT NULL,
  `catprod` int(11) NOT NULL,
  `id_tamanho` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `tipo_producto` (`marca_producto`),
  KEY `id_genero` (`id_genero`),
  KEY `catprod` (`catprod`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`marca_producto`) REFERENCES `marca_producto` (`id_marca`),
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`),
  CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`catprod`) REFERENCES `categoria_producto` (`id_catprod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `producto`;
INSERT INTO `producto` (`id_producto`, `titulo`, `descripcion`, `descripcion_detallada`, `precio`, `marca_producto`, `id_genero`, `puntaje`, `isactivo`, `destacado`, `catprod`, `id_tamanho`) VALUES
(1,	'Campera Parka Levi\'s ',	'Campera de gabardina',	'Campera Parka Levi\'s De Hombre Militar Jacket.',	2500,	3,	2,	8,	1,	0,	13,	NULL),
(2,	'Nike Air Force 1',	'Remera Nike',	'Remera 100% de algodón de estilo liso',	1200,	3,	2,	2,	1,	0,	1,	NULL),
(3,	'Remera Bf Aop',	'Remera Adidas',	'Esta remera estampada adidas BF AOP luce el logotipo del trébol repetido en toda la prenda. Su tejido de algodón suave te ofrece toda la comodidad que buscas.',	800,	1,	2,	10,	1,	0,	1,	NULL),
(4,	'Havaianas Ojotas',	'Ojotas de Caucho',	'Modelo consagrado como opción a un precio accesible para aquellos que buscan comodidad, calidad y variedad de colores.',	750,	8,	2,	0,	1,	0,	15,	NULL),
(5,	'Campera Flamestrike',	'Campera de adidas',	'El estilo de las prendas de entrenamiento del fútbol de finales de los 90 inspira el look de esta campera. Luce un estampado Flamestrike que se inspira en el diseño retro de los años 90 y 2000. Está confeccionada en un tejido entrelazado suave y liso y luce las 3 Tiras deconstruidas en las mangas.',	2800,	1,	2,	6,	1,	0,	14,	NULL),
(6,	'Remera Manga Larga Compress',	'Remera Manga Larga Compress Under Armour Heatgear Azul',	'Marca: Under Armour. Modelo: 932-5008. Diseño de la tela: Lisa',	7.49,	3,	2,	0,	1,	0,	1,	NULL),
(7,	'Remera Doble Manga Calaveras',	'Remera Bross Manga Larga Doble Manga Calaveras Urb',	'Remera Manga Larga. Corte Regular. Cuello Redondo. Estampa al Frente y Espalda.',	125,	3,	2,	0,	1,	0,	2,	NULL),
(8,	'Pantalón Gladiador',	'Pantalón Largo Deportivo Hombre Joma Gladiador',	'Pantalón deportivo Joma Gladiador, confeccionado en 100% poliéster. Cintura con cordón de ajuste. Bolsillos laterales. Aplicación de marca Joma en delantero.',	7.49,	3,	2,	8,	1,	0,	9,	NULL),
(9,	'nueve',	'Campera de gabardina',	'Campera Parka Levi\'s De Hombre Militar Jacket.',	7.49,	3,	2,	0,	1,	0,	12,	NULL),
(10,	'diez',	'Campera de gabardina',	'Campera Parka Levi\'s De Hombre Militar Jacket.',	7.49,	3,	2,	5,	1,	0,	10,	NULL),
(11,	'Otro para ver',	'Campera de gabardina',	'Campera Parka Levi\'s De Hombre Militar Jacket.',	7.49,	3,	2,	0,	1,	0,	2,	NULL),
(12,	'heeee',	'Campera de gabardina',	'Campera Parka Levi\'s De Hombre Militar Jacket.',	7.49,	3,	2,	5,	1,	0,	10,	1);

DROP TABLE IF EXISTS `producto_color`;
CREATE TABLE `producto_color` (
  `id_prco_prco` int(11) NOT NULL AUTO_INCREMENT,
  `id_colo_prco` int(11) NOT NULL,
  `id_prod_prco` int(11) NOT NULL,
  PRIMARY KEY (`id_colo_prco`,`id_prod_prco`),
  UNIQUE KEY `id_prco_prco` (`id_prco_prco`),
  KEY `id_color` (`id_colo_prco`),
  KEY `id_producto` (`id_prod_prco`),
  CONSTRAINT `producto_color_ibfk_3` FOREIGN KEY (`id_colo_prco`) REFERENCES `color` (`id_color`) ON UPDATE CASCADE,
  CONSTRAINT `producto_color_ibfk_4` FOREIGN KEY (`id_prod_prco`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `producto_color`;
INSERT INTO `producto_color` (`id_prco_prco`, `id_colo_prco`, `id_prod_prco`) VALUES
(1,	1,	1),
(2,	2,	1),
(3,	4,	2),
(4,	2,	2);

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `review` varchar(600) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  PRIMARY KEY (`id_review`),
  KEY `id_producto` (`id_producto`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `review`;
INSERT INTO `review` (`id_review`, `id_producto`, `id_usuario`, `review`, `fecha_hora`) VALUES
(1,	1,	1,	'excelente campera, muy abrigada',	'2019-09-28 20:51:16'),
(2,	1,	1,	'Mas caro que no se que',	'2019-09-28 20:51:16');

DROP TABLE IF EXISTS `subcat`;
CREATE TABLE `subcat` (
  `id_subcat` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `detalle_subcat` char(50) NOT NULL,
  PRIMARY KEY (`id_subcat`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `subcat_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `subcat`;
INSERT INTO `subcat` (`id_subcat`, `id_categoria`, `detalle_subcat`) VALUES
(2,	5,	'Camperas'),
(3,	5,	'Buzos'),
(4,	5,	'Montgomery'),
(5,	2,	'Camisa'),
(8,	5,	'Gorros'),
(9,	6,	'Shorts'),
(10,	1,	'Remeras'),
(13,	1,	'Sandalias y Ojotas');

DROP TABLE IF EXISTS `tamanio`;
CREATE TABLE `tamanio` (
  `id_tamanio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tamanio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tamanio`;
INSERT INTO `tamanio` (`id_tamanio`, `descripcion`) VALUES
(1,	'S'),
(2,	'M'),
(3,	'L'),
(4,	'XL'),
(5,	'XXL');

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nombre` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario_nombre` (`usuario_nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `usuario`;
INSERT INTO `usuario` (`id_usuario`, `usuario_nombre`, `password`) VALUES
(1,	'juan.perez@gmail.com',	''),
(2,	'adm@adm.com',	'123'),
(3,	'uno',	'1'),
(5,	'asdavinc_pw_n026',	'esmr63c3txaf5k4r');

-- 2019-11-20 00:28:01