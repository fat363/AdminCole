-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-10-2024 a las 22:40:40
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `preceptoria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Docentes`
--

CREATE TABLE `Docentes` (
  `id_docente` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `id_preceptor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Docentes`
--

INSERT INTO `Docentes` (`id_docente`, `nombre_usuario`, `contraseña`, `id_preceptor`) VALUES
(1, 'directivo', 'ipet363', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estudiantes`
--

CREATE TABLE `Estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `padre` varchar(255) NOT NULL,
  `dni` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `turno` varchar(255) NOT NULL,
  `usr_baja` varchar(255) DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `año` int(11) NOT NULL,
  `id_tutor` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Estudiantes`
--

INSERT INTO `Estudiantes` (`id_estudiante`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`, `telefono`, `email`, `padre`, `dni`, `curso`, `turno`, `usr_baja`, `fecha_baja`, `año`, `id_tutor`, `id`) VALUES
(3, 'luciana', 'nieva', '2005-07-03', 'carlos pellegrini', '3512398057', 'luciananicollenieva@gmail.com', 'soledad gomez', 12345, 1, 'tarde', '0', NULL, 2024, 0, 0),
(8, 'nicolas jose', 'rojas', '2024-09-17', 'jhdjsjksdksksd', '1234243', 'gdwh@gmail.com', 'ewteers', 23434, 2, 'mañana', '0', NULL, 2024, 0, 0),
(9, 'laura', 'lopez', '2006-09-03', 'bnlkjbhjkb', '123345454', 'kkkkk@jsh.cjc', 'fvhgfjh', 12365478, 3, 'mkhi', NULL, NULL, 2024, 0, 0),
(11, 'julieta belen', 'ribero turus', '2024-09-26', 'intendente nemirovsky 268', '3513028138', 'julietaart2006@gmail.com', 'marina ', 21434324, 7, 'tarde', '0', NULL, 2024, 0, 0),
(15, 'claudia', 'gonzalez', '2024-09-14', 'eqwqw', '1232', 'claudia@gmail.com', 'wdddfsafs', 23454, 5, 'tarde', '0', NULL, 2024, 0, 0),
(16, 'hola<', 'fuyk', '2024-09-03', 'dghjrtyiry234', '67777777', 'iytuiuy@gbe.cvb', 'stgdfdf', 789863535, 6, 'mañana', '1', '2024-09-09 14:31:59', 2024, 0, 0),
(18, 'lolaaa', 'fff', '2005-08-31', 'htrth', '3456789', 'hswhdjf@hsd.cvb', 'lgkvkvkfc,', 878656343, 7, 'mañana', '1', '2024-09-27 15:26:35', 2024, 0, 0),
(23, 'laura', 'ffff', '2024-09-05', 'frwsdfvdsvgefb', '123', 'tyuquq@ttg.ggh', 't6r5uy6r', 2354565, 1, 'tarde', NULL, NULL, 2024, NULL, NULL),
(24, 'looooo', 'loooo', '2024-09-06', 'fuhyjjhujuymyh', '86354', 'fdgjht@ghsh.bcx', 'htrtnfg', 34567912, 2, 'tarde', NULL, NULL, 2024, NULL, NULL),
(25, 'claudia', 'ggggg', '2024-09-20', 'gvffeagegerggg', '679898', 'rtyrty@hfbh.coh', 'htrtnfg', 567678, 4, 'mañana', NULL, NULL, 2024, NULL, NULL),
(26, 'kiara', 'ffff', '2024-09-17', 'fff', '444444', 'ttttttt@hhh.hhh', 'tyte', 45756, 5, 'mañana', NULL, NULL, 2024, NULL, NULL),
(27, 'laura', 'ffff', '2024-09-05', 'frwsdfvdsvgefb', '123', 'tyuquq@ttg.ggh', 't6r5uy6r', 2354565, 6, 'tarde', NULL, NULL, 2024, NULL, NULL),
(28, 'federico', 'ghjfh', '2024-09-05', 'fgjhhjuty', '567658', 'yiuyiu@gdd.con', 'gfgffg', 67878, 7, 'tarde', NULL, NULL, 2024, NULL, NULL),
(29, 'lalala', 'looo', '2024-10-16', 'yttr', '565667', 'yuuy@gmail.com', 'fff', 132321, 5, 'mañana', NULL, NULL, 2024, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Materias`
--

CREATE TABLE `Materias` (
  `id_materia` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `año` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Materias`
--

INSERT INTO `Materias` (`id_materia`, `nombre`, `descripcion`, `año`) VALUES
(1, 'matematicas ', NULL, 0),
(2, 'lengua', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Materias_Estudiantes`
--

CREATE TABLE `Materias_Estudiantes` (
  `id` int(11) NOT NULL,
  `id_estudiante` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `estado` varchar(50) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `materia` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Materias_Estudiantes`
--

INSERT INTO `Materias_Estudiantes` (`id`, `id_estudiante`, `id_materia`, `estado`, `nombre`, `apellido`, `materia`, `descripcion`) VALUES
(3, NULL, NULL, 'aprobado', 'hdshd', 'dfsfdds', 'sddfsd', 's'),
(4, 11, 2, '', 'julieta belen', 'ribero turus ', '', '.'),
(14, NULL, 2, 'Pendiente', 'Luciana nicolle', 'nieva', 'lengua', '.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preceptores`
--

CREATE TABLE `preceptores` (
  `id_preceptor` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `id_profesor` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preceptores`
--

INSERT INTO `preceptores` (`id_preceptor`, `nombre_usuario`, `contraseña`, `id_profesor`, `activo`) VALUES
(2, 'mariela', '123', NULL, 1),
(3, 'ana', '456\r\n', NULL, 1),
(4, 'looo', '789', NULL, 1),
(5, 'looo', '789', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id_profesor` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_profesor`, `nombre_usuario`, `contraseña`, `activo`) VALUES
(4, 'lauraperez', '1234', 1),
(5, 'andreachiappori', '1234', 1),
(6, 'lola', '789', 1),
(7, 'mauro', '567', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tutores`
--

CREATE TABLE `Tutores` (
  `id_tutor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `relacion` varchar(50) NOT NULL,
  `id_estudiante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Tutores`
--

INSERT INTO `Tutores` (`id_tutor`, `nombre`, `apellido`, `telefono`, `email`, `direccion`, `relacion`, `id_estudiante`) VALUES
(19, 'prueba', 'prueba123', '3517545125', 'prueba@prueba.com', 'ddd', 'dddd', 25),
(20, 'yhtg', 'ereregte', '4353445223', 'gbhdghb@gwh', 'ysyt3wsy3e', 'exthgef3hgf3hews', 26),
(21, 'jhkkhjkjh', 'jkkjlhljkh', '0897098', 'haha@gmail.com', 'yuiyt', 'tuyit', 15),
(22, 'yturuyt', 'uytuyt', '48765877', 'iyuyuit@gmail.com', 'iyutuytuytu', 'uytuty', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Viajes`
--

CREATE TABLE `Viajes` (
  `id_viaje` int(11) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_regreso` date NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Viajes`
--

INSERT INTO `Viajes` (`id_viaje`, `destino`, `fecha_salida`, `fecha_regreso`, `descripcion`) VALUES
(3, 'cordoba', '2024-09-02', '2024-09-05', 'viaje con fines de aprender sobre nuestra fauna '),
(4, 'mina clavero', '2024-09-18', '2024-09-26', 'con fin educativo \r\n'),
(6, 'carlos paz', '2024-10-02', '2024-10-02', 'con fines educativos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Viajes_Estudiantes`
--

CREATE TABLE `Viajes_Estudiantes` (
  `id` int(11) NOT NULL,
  `id_estudiante` int(11) DEFAULT NULL,
  `id_viaje` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Viajes_Estudiantes`
--

INSERT INTO `Viajes_Estudiantes` (`id`, `id_estudiante`, `id_viaje`) VALUES
(5, 15, 3),
(7, 25, 3),
(24, 27, 6),
(25, 27, 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Docentes`
--
ALTER TABLE `Docentes`
  ADD PRIMARY KEY (`id_docente`),
  ADD KEY `id_preceptor` (`id_preceptor`);

--
-- Indices de la tabla `Estudiantes`
--
ALTER TABLE `Estudiantes`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD KEY `id_mateestu` (`id`);

--
-- Indices de la tabla `Materias`
--
ALTER TABLE `Materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `Materias_Estudiantes`
--
ALTER TABLE `Materias_Estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `preceptores`
--
ALTER TABLE `preceptores`
  ADD PRIMARY KEY (`id_preceptor`),
  ADD KEY `id_profesor` (`id_profesor`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `Tutores`
--
ALTER TABLE `Tutores`
  ADD PRIMARY KEY (`id_tutor`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `Viajes`
--
ALTER TABLE `Viajes`
  ADD PRIMARY KEY (`id_viaje`);

--
-- Indices de la tabla `Viajes_Estudiantes`
--
ALTER TABLE `Viajes_Estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_viaje` (`id_viaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Docentes`
--
ALTER TABLE `Docentes`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Estudiantes`
--
ALTER TABLE `Estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `Materias`
--
ALTER TABLE `Materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Materias_Estudiantes`
--
ALTER TABLE `Materias_Estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `preceptores`
--
ALTER TABLE `preceptores`
  MODIFY `id_preceptor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `Tutores`
--
ALTER TABLE `Tutores`
  MODIFY `id_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `Viajes`
--
ALTER TABLE `Viajes`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `Viajes_Estudiantes`
--
ALTER TABLE `Viajes_Estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Docentes`
--
ALTER TABLE `Docentes`
  ADD CONSTRAINT `Docentes_ibfk_1` FOREIGN KEY (`id_preceptor`) REFERENCES `preceptores` (`id_preceptor`);

--
-- Filtros para la tabla `Materias_Estudiantes`
--
ALTER TABLE `Materias_Estudiantes`
  ADD CONSTRAINT `Materias_Estudiantes_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `Estudiantes` (`id_estudiante`),
  ADD CONSTRAINT `Materias_Estudiantes_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `Materias` (`id_materia`);

--
-- Filtros para la tabla `preceptores`
--
ALTER TABLE `preceptores`
  ADD CONSTRAINT `preceptores_ibfk_1` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`);

--
-- Filtros para la tabla `Viajes_Estudiantes`
--
ALTER TABLE `Viajes_Estudiantes`
  ADD CONSTRAINT `Viajes_Estudiantes_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `Estudiantes` (`id_estudiante`),
  ADD CONSTRAINT `Viajes_Estudiantes_ibfk_2` FOREIGN KEY (`id_viaje`) REFERENCES `Viajes` (`id_viaje`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
