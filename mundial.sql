-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2022 a las 08:44:51
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
('Catar', 'A'),
('Ecuador', 'A'),
('Paises Bajos', 'A'),
('Inglaterra', 'B'),
('Irán', 'B'),
('Estados Unidos', 'B'),
('Gales', 'B'),
('Senegal', 'A'),
('Argentina', 'C'),
('Arabia Saudí', 'C'),
('Mexico', 'C'),
('Polonia', 'C'),
('Francia', 'D'),
('Australia', 'D'),
('Dinamarca', 'D'),
('Túnez', 'D'),
('España', 'E'),
('Costa Rica', 'E'),
('Alemania', 'E'),
('Japón', 'E'),
('Bélgica', 'F'),
('Canadá', 'F'),
('Marruecos', 'F'),
('Croacia', 'F'),
('Brasil', 'G'),
('Serbia', 'G'),
('Suiza', 'G'),
('Camerún', 'G'),
('Portugal', 'H'),
('Ghana', 'H'),
('Uruguay', 'H'),
('Corea del Sur', 'H');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
