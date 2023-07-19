-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2020 a las 19:55:47
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `final2020`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assignment`
--

CREATE TABLE `assignment` (
  `id_a` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `assignment`
--

INSERT INTO `assignment` (`id_a`, `user_id`, `project_id`) VALUES
(1, 4, 1),
(45, 9, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_u` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(16) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_u`, `name`, `email`, `password`, `role`) VALUES
(1, 'Hernán Pereira', 'hernan7dp@gmail.com', 'her12', 1),
(4, 'Juan Perez', 'juani@asdf.com', '567', 0),
(9, 'Jonhi Lin', 'jonhi12@asdf.com', '1234', 0),
(10, 'Marcos Tello', 'marcos@tello.com', '1234', 0),
(11, 'Juan Maza', 'maza@asdf.com', '1234', 0),
(12, 'Pedro Cumpa', 'pedro@adf.com', '1234', 0),
(13, 'Carlos Merkel', 'carlos@adf.com', '1234', 0),
(14, 'Marquitos', 'marqui@asdf.com', '1234', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id_p` int(11) NOT NULL,
  `project` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `deadline` date NOT NULL DEFAULT current_timestamp(),
  `works` varchar(255) NOT NULL,
  `fulfillment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id_p`, `project`, `title`, `deadline`, `works`, `fulfillment`) VALUES
(1, 'Proyecto Inicial', 'Base HTML-CSS3', '2020-12-31', 'Maquetar con HTML5 y dar estilos con CSS3', 0),
(2, 'Maquetación', 'Maquetación con Javascript', '2020-10-31', 'Completar maquetado con Javascript. Funcionalizar.', 0),
(3, 'Dinamizar', 'Crear aspectos dinámicos con PHP', '2020-11-30', 'Añadir dinamismo con módulos PHP', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `id_t` int(11) NOT NULL,
  `usert_id` int(11) NOT NULL,
  `projectt_id` int(11) NOT NULL,
  `task_1` text DEFAULT NULL,
  `task_2` text DEFAULT NULL,
  `task_3` text DEFAULT NULL,
  `task_4` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`id_t`, `usert_id`, `projectt_id`, `task_1`, `task_2`, `task_3`, `task_4`) VALUES
(2, 1, 1, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', '', '', ''),
(3, 10, 1, 'PRUEBA TAREA 2', '', '', ''),
(5, 11, 3, 'asfdasdfas asdfasdfasdf asdfasdf', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id_a`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_project_id` (`project_id`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_u`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id_p`);

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_t`),
  ADD KEY `fk_usert_id` (`usert_id`),
  ADD KEY `fk_projectt_id` (`projectt_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `fk_project_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id_p`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `login` (`id_u`);

--
-- Filtros para la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_projectt_id` FOREIGN KEY (`projectt_id`) REFERENCES `projects` (`id_p`),
  ADD CONSTRAINT `fk_usert_id` FOREIGN KEY (`usert_id`) REFERENCES `login` (`id_u`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
