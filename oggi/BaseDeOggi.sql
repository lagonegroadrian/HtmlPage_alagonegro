-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2019 a las 00:53:43
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `oggi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_us`
--

CREATE TABLE `user_us` (
  `id_us` int(10) NOT NULL,
  `nombre_us` varchar(50) NOT NULL,
  `apellido_us` varchar(50) NOT NULL,
  `dni_us` int(10) NOT NULL,
  `user_us` varchar(30) NOT NULL,
  `pass_us` varchar(200) NOT NULL,
  `perfil_us` varchar(3) NOT NULL,
  `carga_us` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_us`
--

INSERT INTO `user_us` (`id_us`, `nombre_us`, `apellido_us`, `dni_us`, `user_us`, `pass_us`, `perfil_us`, `carga_us`) VALUES
(5, 'adrian', 'lagonegro', 35147312, 'alagonegro', '35147312', 'adm', '2019-11-01 17:49:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `user_us`
--
ALTER TABLE `user_us`
  ADD PRIMARY KEY (`id_us`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user_us`
--
ALTER TABLE `user_us`
  MODIFY `id_us` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
