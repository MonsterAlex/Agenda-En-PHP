-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-01-2018 a las 01:09:42
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL,
  `fk_usuario` int(11) NOT NULL,
  `allDay` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_evento` (`fk_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(70) NOT NULL,
  `fecnac` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `username`, `password`, `fecnac`) VALUES
(1, 'Alejandro', 'Reyes', 'MonsterAlex@gmail.com', '123456', '1994-08-21'),
(2, 'Asuna', 'Yuki', 'yukiA@gmail.com', '1234', '1995-11-22'),
(3, 'Angela', 'Ziegler', 'Mercy@gmail.com', '12345', '1980-08-21'),
(4, 'Diego', 'Gil', 'Ale@gmail.com', '123456789', '1999-02-12'),
(18, 'Esme', 'Gonzales', 'esme@gmail.com', '123', '1995-11-22'),
(19, 'Lena', 'Oxton', 'Tracer53@gmail.com', '$2y$10$kTpk1oANErmdu6mS9CFi0ulTe3pklxFoBU4jxtL6bmyzP5VnYb6xa', '1991-05-07'),
(20, 'Peter', 'Parker', 'siper_21@gmail', '$2y$10$i2l4l9EkzDGToTrzIsmNlOHHhTtDPApExqHYrlGbZMacVEwl6j0h2', '1996-02-10'),
(21, 'Jeff', 'Hardy', 'destino9@gmail.com', '$2y$10$0mj4gIUmojW3wOlh/9sEL.aXPJ3dATlRTOyTMlcoBJTTSNDguOS5W', '1986-10-05'),
(22, 'Anabella', 'Thorne', 'Bella@gmail.com', '$2y$10$6hcw..NyIh66i2GLi7qOS.Mi8KOSBnxBPWiH.H1/olNqfHxfC6C3e', '1997-10-08'),
(23, 'Miranda', 'Reyes', 'MirandaR@gmail.com', '$2y$10$TZs/lhc0pItQQ030LuoJa.n420W5SxilWeSXftvhykfbCsgczlL62', '1995-11-07'),
(24, 'Luck', 'Skywalker', 'SkyLu@gmail.com', '$2y$10$ghGGG2ntq6mnHj1rSsTq/eGMHoEN39bIr506oVgpw4oQx.unFxVoy', '1977-01-12'),
(25, 'Mariano', 'Matamoros', 'MataMo@gmail', '$2y$10$tU9p0nD1t.Lp31TFB17J2eFtp4xFsimDNEpDIjtYxAHNfcW7Zd73q', '1990-12-12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
