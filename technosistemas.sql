-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2021 a las 20:56:06
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `technosistemas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombre`) VALUES
(1, 'Laptops'),
(2, 'Monitores'),
(3, 'Computadoras'),
(4, 'Impresoras'),
(5, 'Audifonos'),
(6, 'Proyectores'),
(7, 'Tablets');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombres` varchar(25) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `dpi` varchar(16) NOT NULL,
  `fecha_nac` date NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `genero` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombres`, `apellidos`, `dpi`, `fecha_nac`, `direccion`, `genero`) VALUES
(1, 'Josue David', 'Miranda Miranda', '1234 45678 8912', '1995-01-22', 'Metropolis I', 'Masculino'),
(2, 'Diana Maria', 'Lopez Herrera', '3214 45655 7788', '1999-12-12', 'San Juan', 'Femenino'),
(3, 'Lucas Antonio', 'Sanchez Lopez', '1122 33455 7788', '2001-11-03', 'San Jose', 'Masculino'),
(4, 'Lina Daniela', 'Cifuentes de Leon', '1212 20011 5545', '2000-08-23', 'Calle Bermudes', 'Femenino'),
(5, 'Damaris Sarai', 'Lopez Juarez', '3214 78945 2011', '1998-05-29', 'El Prado', 'Femenino'),
(6, 'Claudia Daniela', 'Miranda Hurtado', '1232 19789 1109', '1999-12-23', 'Santa Rita', 'Femenino'),
(7, 'Diana Fabiola', 'Monserrat Brawn', '1112 32232 5484', '1998-11-12', 'San Hareth de Grawm', 'Femenino'),
(8, 'Dalila Adriana', 'Filliphson Grawas', '1212 32151 1001', '1988-03-12', 'Metropolis II', 'Femenino'),
(9, 'Alfredo Manuel', 'Sanchez Hurtado', '3212 32141 3214', '1999-11-30', 'Calle Bermudes', 'Masculino'),
(89, 'Otto Clay', 'Connor Johnston', '1122 45655 3211', '2000-02-12', 'Ap #897-1459 Quam Avenue', 'Masculino'),
(90, 'Connor Johnston', 'Lacey Hess', '3211 57956 1020', '1988-10-14', 'Ap #370-4647 Dis Av.', 'Masculino'),
(91, 'Timothy Henson', 'Benton Benton', '4564 13211 6544', '2000-03-22', 'Ap #614-689 Vehicula Street', 'Femenino'),
(92, 'Ramona Ezra', 'Tillman Carter', '4564 32132 4654', '1999-01-10', 'P.O. Box 976, 6316 Lorem, St.', 'Femenino'),
(93, 'Herman Rosa', 'Wilkerson Shepard', '1231 32132 1234', '1987-02-12', 'Ap #303-6974 Proin Street', 'Femenino'),
(94, 'Keely Silva', 'Hunter Pate', '4577 45644 4651', '1999-12-12', 'P.O. Box 771, 7599 Ante, Road', 'Femenino'),
(95, 'Wallace Christian', 'Whilemina Frank', '4564 45465 4511', '2001-02-02', '108-282 Nonummy Ave', 'Masculino'),
(96, 'Jeanette Pate', 'Kaden Hernandez', '1212 32323 3232', '1998-03-02', '366 Ut St.', 'Femenino'),
(97, 'Keaton Oconnor', 'Bree Johnston', '9898 46465 5456', '1998-01-31', '108-282 Nonummy Ave', 'Masculino'),
(98, 'Alexis Clements', 'Akeem Conrad', '9898 12321 4654', '1987-05-23', 'P.O. Box 120, 9766 Consectetuer St.', 'Masculino'),
(99, 'Illiana Kirby', 'Wade Fernandez', '1212 64555 9898', '2002-03-12', 'Ap #510-8903 Mauris. Av.', 'Femenino'),
(100, 'Dominic Raymond', 'Desiree Hughes', '9898 54564 5475', '1999-09-20', '605-6645 Fermentum Avenue', 'Masculino'),
(101, 'Charity Holcomb', 'Kyra Cummings', '9182 64922 3211', '1977-02-12', '383-3675 Ultrices, St.', 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `idCategoria`, `nombre`, `precio`) VALUES
(1, 1, 'Laptop Dell Gaming', 9194),
(2, 1, 'Laptop Dell Inspiron', 8986),
(3, 1, 'Laptop Dell Inspiron', 8516),
(4, 1, 'Laptop Dell Latitude', 8516),
(5, 1, 'Laptop Dell Latitude Onsite Service', 7589),
(6, 1, 'Laptop Dell Latitude W10 Pro', 9950),
(7, 2, 'Monitor 18.5 In', 950),
(8, 2, 'Monitor 19.5 In', 945),
(9, 2, 'Monitor 21.5 In', 1125),
(10, 2, 'Monitor 22 In ', 1599),
(11, 2, 'Monitor 22 In', 1199),
(12, 2, 'Monitor 23.8 In', 1425),
(13, 3, 'Computadora AIO Dell Inspiron', 12999),
(14, 3, 'Computadora Dell OptiPlex', 7093),
(15, 3, 'Computadora Dell OptiPlex', 5785),
(16, 3, 'Computadora Dell OptiPlex', 7264),
(17, 3, 'Desktop MyPowerPC i5 S', 6999),
(18, 3, 'Desktop MyPowerPC Gold S', 4999),
(19, 4, 'Impresora Epson Matricial', 2899),
(20, 4, 'Impresora Epson Matricial', 3849),
(21, 4, 'Impresora Multifuncional HP', 4899),
(22, 4, 'Impresora Epson Matricial LQ 590 II', 3587),
(23, 4, 'Impresora Canon Inyeccion Multifuncional ', 1799),
(24, 4, 'Fuente para Impresora Epson', 452),
(25, 5, 'Audifonos Klip Xtreme Bluetooth SportX', 244),
(26, 5, 'Audifonos Bluetooth Argom SkeiPods', 249),
(27, 5, 'Audifonos Klip Xtreme KolorBudz verde', 51),
(28, 5, 'Audifonos Klip Xtreme KolorBudz amarillo', 51),
(29, 5, 'Audifonos Klip Xtreme Bluetooth tipo Headset Fury', 175),
(30, 5, 'Audifonos Klip Xtreme KolorBudz azul', 51),
(31, 5, 'Audifonos Klip Xtreme KolorBudz rojo', 51),
(32, 5, 'Audifonos Klip Xtreme Bluetooth tipo Headset', 175),
(33, 6, 'Proyector BenQ EW800ST', 10458),
(34, 6, 'Proyector BenQ W1110', 8024),
(35, 6, 'Proyector BenQ MX631ST', 7190),
(36, 6, 'Cable HDMI', 445),
(37, 7, 'Tablet Amazon Fire Ciruela', 1190),
(38, 7, 'Tablet Amazon Fire Gris', 1190),
(39, 7, 'Tablet Amazon Fire Blanca', 1188),
(40, 7, 'Tablet Amazon Fire Negra', 850),
(41, 7, 'Tablet Amazon Fire Azul', 850),
(42, 7, 'Tablet Amazon Fire Blanca II', 850);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(5) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `tipo` varchar(2) NOT NULL,
  `activo` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `pass`, `tipo`, `activo`) VALUES
(1, 'berna', '12345', 'A', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVenta`, `idCliente`, `idProducto`, `fecha_venta`, `cantidad`, `precio`, `total`) VALUES
(6, 89, 1, '2021-04-22', 2, 9194, 18388),
(7, 90, 2, '2021-04-22', 3, 8986, 26958),
(8, 91, 7, '2021-04-22', 1, 950, 950),
(9, 92, 10, '2021-04-22', 1, 1599, 1599),
(10, 93, 12, '2021-04-22', 6, 1425, 8550),
(11, 94, 13, '2021-04-22', 2, 12999, 25998),
(12, 95, 16, '2021-04-22', 3, 7264, 21792),
(13, 96, 18, '2021-04-22', 3, 4999, 14997),
(14, 97, 19, '2021-04-22', 3, 2899, 8697),
(15, 98, 26, '2021-04-22', 1, 249, 249),
(16, 99, 29, '2021-04-22', 1, 175, 175),
(17, 100, 33, '2021-04-22', 4, 10458, 41832),
(18, 101, 41, '2021-04-22', 3, 850, 2550);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idCategoria_fk_idx` (`idCategoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `idCliente_fk_idx` (`idCliente`),
  ADD KEY `idProducto_fk_idx` (`idProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `idCategoria_fk` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `idCliente_fk` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idProducto_fk` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
