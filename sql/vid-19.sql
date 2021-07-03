-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2021 a las 02:13:31
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vid-19`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `name`, `color`) VALUES
(1, 'Oxigeno', '#DE1F59'),
(2, 'Temperatura', '#DE1FAA'),
(3, 'Sintomas', '#681FDE'),
(4, 'Recomendaciones', '#1FAADE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_medica`
--

CREATE TABLE `data_medica` (
  `id` int(20) NOT NULL,
  `title` varchar(150) NOT NULL,
  `category_id` int(5) NOT NULL,
  `dato` float(10,2) NOT NULL,
  `fecha` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `role` enum('paciente','doctor','admin') NOT NULL,
  `budget` float(10,2) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pass`, `role`, `budget`, `photo`, `name`) VALUES
(1, 'moises ventura', 'cristhofer.ventura@unmsm.edu.pe', '$2y$10$KY7JQbcDSGTaMsoi2in6r.vMZ/opnAZjIZaZcREK3lW', 'admin', 0.00, '', ''),
(11, 'botcito1', 'GreenMachiine2020@gmail.com', '$2y$10$x7F2g76wjY/jk7YoCXm9/u7Sl6DkIMVjqHxhCHP/c9x', 'paciente', 0.00, '', ''),
(13, 'botcito', 'fcmacx0806@gmelk.com', '$2y$10$ze.1I8i.8ckhw2m4q3GJSOIfJB72Jm.UkJiweXQNpUl', 'paciente', 0.00, '', ''),
(14, 'Dani uwu', 'mamuteo322@gmail.com', '$2y$10$rvvTP5G6sNQ6WfULlE4r0eWOR7c2Az4TOydD62eGOP8', 'paciente', 0.00, '', ''),
(15, 'maishet', 'www@gmail.com', '12345', 'paciente', 0.00, '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `data_medica`
--
ALTER TABLE `data_medica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_medica` (`id_user`),
  ADD KEY `id_category_medica` (`category_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `data_medica`
--
ALTER TABLE `data_medica`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `data_medica`
--
ALTER TABLE `data_medica`
  ADD CONSTRAINT `id_category_medica` FOREIGN KEY (`category_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `id_user_medica` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
