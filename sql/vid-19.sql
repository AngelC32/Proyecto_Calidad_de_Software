-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-08-2021 a las 21:38:38
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `vid-19`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente` varchar(200) DEFAULT NULL,
  `number` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sintomas` varchar(500) NOT NULL,
  `saturacion` varchar(10) NOT NULL,
  `doctor` varchar(500) DEFAULT NULL,
  `fecha` text,
  `hora` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `paciente`, `number`, `email`, `sintomas`, `saturacion`, `doctor`, `fecha`, `hora`) VALUES
(7, 'maria guevara', '9875673261', 'GreenMachiine2020@gmail.com', 'https://meet.google.com/dtp-kgfz-uie', '92', 'Doctor(a) juan carrasco', '08-09-2021', '3 : 27 PM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE IF NOT EXISTS `receta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `meet` varchar(500) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`id`, `title`, `meet`, `url`, `type`) VALUES
(8, 'maria guevara', 'receta medica para los malestares', 'files/recetapdf.pdf', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('paciente','doctor','admin') NOT NULL,
  `photo` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `photo`) VALUES
(1, 'moises ventura', 'cristhofer.ventura@unmsm.edu.pe', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', ''),
(11, 'maria guevara', 'GreenMachiine2020@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'paciente', ''),
(13, 'angel fernandez', 'fcmacx0806@gmelk.com', '827ccb0eea8a706c4c34a16891f84e7b', 'paciente', ''),
(14, 'Dani uwu', 'mamuteo322@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'paciente', ''),
(15, 'maicol gonzales', 'www@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'paciente', ''),
(17, 'ana maria', 'anaavellana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'paciente', ''),
(18, 'pepe marcelo', 'maishet.ventura@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'doctor', ''),
(19, 'juana larco', 'juanalarco@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'doctor', ''),
(22, 'rosa margarita', 'rosa@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'doctor', ''),
(23, 'juan carrasco', 'juanca@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'doctor', ''),
(24, 'abigail arce', 'abi23@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'paciente', ''),
(25, 'paolo coronado', 'paolo@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'paciente', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
