-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2022 a las 15:12:18
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_rndblo_2021`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdocente_rndblo`
--

CREATE TABLE `tdocente_rndblo` (
  `Id` varchar(10) NOT NULL,
  `TipoDoc` varchar(10) NOT NULL,
  `NroDoc` varchar(8) NOT NULL,
  `APaterno` varchar(50) NOT NULL,
  `AMaterno` varchar(50) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `AnioIngresoRNDBLO` varchar(4) NOT NULL,
  `NroLenguas` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlenguaoriginaria`
--

CREATE TABLE `tlenguaoriginaria` (
  `Id` varchar(10) NOT NULL,
  `AnioEvaluacion` varchar(4) NOT NULL,
  `AnioVencimiento` varchar(4) NOT NULL,
  `LenguaOriginaria` varchar(100) NOT NULL,
  `LenguaOriginariaSinVariante` varchar(50) NOT NULL,
  `DRE_EvalOral` varchar(100) NOT NULL,
  `UGEL_EvalOral` varchar(100) NOT NULL,
  `Oral` varchar(30) NOT NULL,
  `Escrito` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
