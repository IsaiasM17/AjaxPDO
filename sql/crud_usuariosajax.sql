-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2023 a las 07:46:52
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud_usuariosajax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `imagen`, `telefono`, `email`, `fecha_creacion`) VALUES
(6, 'Isaias', 'Martinez', '47746798.jpg', 'aaa', 'isaias@itred.cl', '2023-09-15'),
(7, 'ultimo', 'si', '1520343975.png', '11', 'isaias@itred.cl', '2023-09-15'),
(8, 'Nicolas', 'Olmedo', '2066600519.png', '+56997064893', 'nikoolmedo23@gmail.com', '2023-09-15'),
(10, 'Isaias', 'Martinez', '1678360896.jpg', '+560933091413', 'isaias.m.soto@gmail.com', '2023-09-15'),
(13, 'Isaias', 'Martinez', '1451708418.png', '+560933091413', 'isaias.m.soto@gmail.com', '2023-09-15'),
(14, 'Isaias', 'Martinez', '1757454474.png', '+560933091413', 'isaias.m.soto@gmail.com', '2023-09-15'),
(15, 'Isaias', 'Martinez', '1754915762.png', '+560933091413', 'isaias.m.soto@gmail.com', '2023-09-15'),
(17, 'Isaias', 'Martinez', '1386840720.jpg', '+560933091413', 'isaias.m.soto@gmail.com', '2023-09-15'),
(18, 'Isaias', 'Martinez', '1923290552.jpg', 'aaa', 'isaias@itred.cl', '2023-09-15'),
(19, 'Isaias', 'Martinez', '938404424.png', '+560933091413', 'isaias.m.soto@gmail.com', '2023-09-21'),
(21, 'Isaias', 'Martinez', '1548339942.png', '+560933091413', 'isaias.m.soto@gmail.com', '2023-09-21'),
(24, 'Isaias', 'Martinez', '1955222675.png', '+560933091413', 'isaias.m.soto@gmail.com', '2023-09-21'),
(25, 'Isaias', 'Martinez', '1505420154.png', '+560933091413', 'isaias.m.soto@gmail.com', '2023-09-21'),
(27, 'Isaias', 'Martinez', '1165717106.png', '+560933091413', 'isaias.m.soto@gmail.com', '2023-09-21'),
(28, 'Daniela', 'Cuevas', '64076732.png', '+56937387796', 'nanita.quilaquir@gmail.com', '2023-09-21'),
(30, 'Daniela', 'Cuevas', '152288739.png', '+56937387796', 'nanita.quilaquir@gmail.com', '2023-09-21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
