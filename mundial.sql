-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2022 a las 10:19:18
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mundial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autenticacion`
--

CREATE TABLE `autenticacion` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autenticacion`
--

INSERT INTO `autenticacion` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ganador`
--

CREATE TABLE `ganador` (
  `username` varchar(20) NOT NULL,
  `seleccion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `selecciones`
--

CREATE TABLE `selecciones` (
  `nombre` varchar(20) NOT NULL,
  `grupo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `selecciones`
--

INSERT INTO `selecciones` (`nombre`, `grupo`) VALUES
('Alemania', 'E'),
('Arabia Saudí', 'C'),
('Argentina', 'C'),
('Australia', 'D'),
('Bélgica', 'F'),
('Brasil', 'G'),
('Camerún', 'G'),
('Canadá', 'F'),
('Catar', 'A'),
('Corea del Sur', 'H'),
('Costa Rica', 'E'),
('Croacia', 'F'),
('Dinamarca', 'D'),
('Ecuador', 'A'),
('EEUU', 'B'),
('España', 'E'),
('Francia', 'D'),
('Gales', 'B'),
('Ghana', 'H'),
('Holanda', 'A'),
('Inglaterra', 'B'),
('Irán', 'B'),
('Japón', 'E'),
('Marruecos', 'F'),
('Mexico', 'C'),
('Polonia', 'C'),
('Portugal', 'H'),
('Senegal', 'A'),
('Serbia', 'G'),
('Suiza', 'G'),
('Túnez', 'D'),
('Uruguay', 'H');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autenticacion`
--
ALTER TABLE `autenticacion`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `ganador`
--
ALTER TABLE `ganador`
  ADD KEY `username` (`username`),
  ADD KEY `seleccion` (`seleccion`);

--
-- Indices de la tabla `selecciones`
--
ALTER TABLE `selecciones`
  ADD PRIMARY KEY (`nombre`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ganador`
--
ALTER TABLE `ganador`
  ADD CONSTRAINT `ganador_ibfk_1` FOREIGN KEY (`username`) REFERENCES `autenticacion` (`username`) ON DELETE CASCADE,
  ADD CONSTRAINT `ganador_ibfk_2` FOREIGN KEY (`seleccion`) REFERENCES `selecciones` (`nombre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
