-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-07-2024 a las 05:17:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pichi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `idActividades` int(11) NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  `ContenidoAcitividad` text NOT NULL,
  `archivosPrincipal` varchar(255) NOT NULL,
  `fechaInicio` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `fechaCulminacion` timestamp(6) NULL DEFAULT NULL,
  `fechaNotificacion` timestamp(6) NULL DEFAULT NULL,
  `pesoArchivo` float NOT NULL,
  `notaMaxima` float NOT NULL,
  `notaMinima` float NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `activarPorcentaje` tinyint(1) NOT NULL,
  `Porcentaje` int(3) DEFAULT NULL,
  `archivosAdicional` varchar(255) DEFAULT NULL,
  `idCurso_id_cur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`idActividades`, `Titulo`, `ContenidoAcitividad`, `archivosPrincipal`, `fechaInicio`, `fechaCulminacion`, `fechaNotificacion`, `pesoArchivo`, `notaMaxima`, `notaMinima`, `visible`, `activarPorcentaje`, `Porcentaje`, `archivosAdicional`, `idCurso_id_cur`) VALUES
(6, 'Ingles I documentos para Evaluativo', '<p>Aqui cualquier descripción </p>', 'finales (FINAL).docx', '2024-05-24 04:00:00.000000', '2024-05-31 04:00:00.000000', '2024-05-30 04:00:00.000000', 20, 20, 10, 0, 0, 10, NULL, 'Cur_URBE_01'),
(7, 'Verbo To-Be', '<p>Ver el archivo incluido en la actividad.</p>', 'InformePasantia-Cap-III.pdf', '2024-06-23 17:39:19.598955', '2024-07-31 04:00:00.000000', '2024-06-17 04:00:00.000000', 10, 20, 1, 0, 1, 0, NULL, 'Cur_URBE_01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id_calificacion` int(11) NOT NULL,
  `calificacion_user` float NOT NULL,
  `usuario_identificacion_user` varchar(11) NOT NULL,
  `cursos_id_cur` varchar(100) NOT NULL,
  `periodo_id_peri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_cur` varchar(100) NOT NULL,
  `nombre_cur` varchar(45) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `cupos_cur_min` int(11) NOT NULL,
  `cupos_cur_max` int(11) NOT NULL,
  `Empresa_id_empresa` int(11) NOT NULL,
  `fecha_fin` date NOT NULL,
  `visibilidad_curso` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_cur`, `nombre_cur`, `fecha_inicio`, `cupos_cur_min`, `cupos_cur_max`, `Empresa_id_empresa`, `fecha_fin`, `visibilidad_curso`) VALUES
('Cur_URBE_01', 'Ingles I', '2024-05-15', 10, 40, 1, '2024-11-21', 'Visible'),
('Cur_URBE_02', 'Ingles II', '2024-05-04', 11, 40, 1, '2024-11-13', 'Visible'),
('Cur_URBE_03', 'Ingles III', '2024-05-10', 10, 40, 1, '2024-11-21', 'Invisible'),
('Cur_URBE_04', 'Programación I', '2024-06-17', 5, 15, 1, '2024-07-31', 'Visible'),
('Cur_URBE_05', 'Programacion Web', '2024-06-23', 5, 17, 1, '2024-07-29', 'Visible'),
('Cur_URBE_06', 'Inteligencia Artificial', '2024-07-07', 30, 50, 1, '2024-07-30', 'Visible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre_empresa`) VALUES
(1, 'URBE'),
(2, 'Centro Electronico de idiomas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas`
--

CREATE TABLE `entregas` (
  `id_entregas` int(11) NOT NULL,
  `texto_entrega` text DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `archivoAdicional` varchar(255) DEFAULT NULL,
  `fecha_modificacion` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entregas`
--

INSERT INTO `entregas` (`id_entregas`, `texto_entrega`, `archivo`, `archivoAdicional`, `fecha_modificacion`, `id_user`, `id_actividad`) VALUES
(5, '<p>Prueba</p>', 'InformePasantia-Cap-I.pdf', 'InformePasantia-Cap-II.pdf', '2024-06-11', 3, 6),
(7, '<p>Aqui esta mi entrega profe.</p>', 'tarea-verbo-to-be.docx', NULL, '2024-06-23', 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_curso`
--

CREATE TABLE `foro_curso` (
  `id_foro_cur` int(11) NOT NULL,
  `mensaje` longtext NOT NULL,
  `modif_fecha` datetime NOT NULL,
  `modificacion` datetime DEFAULT NULL,
  `usuario_id_user` int(11) NOT NULL,
  `curso_id_curso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `foro_curso`
--

INSERT INTO `foro_curso` (`id_foro_cur`, `mensaje`, `modif_fecha`, `modificacion`, `usuario_id_user`, `curso_id_curso`) VALUES
(1, 'Hola profe', '2024-06-05 13:27:00', NULL, 4, 'Cur_URBE_01'),
(4, 'Hola Lenin', '2024-06-06 10:13:00', NULL, 5, 'Cur_URBE_01'),
(6, 'jose oropeza', '2024-06-07 18:44:00', NULL, 4, 'Cur_URBE_01'),
(7, 'hola como estan todos?\r\n', '2024-06-07 19:36:00', '2024-06-22 23:31:00', 4, 'Cur_URBE_01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id_inscripcion` int(11) NOT NULL,
  `solvencia_estu` tinyint(4) DEFAULT NULL,
  `fecha_incripcion` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `Usuario_id_user` int(11) NOT NULL,
  `Periodo_id_peri` int(11) NOT NULL,
  `Cursos_id_cur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id_inscripcion`, `solvencia_estu`, `fecha_incripcion`, `Usuario_id_user`, `Periodo_id_peri`, `Cursos_id_cur`) VALUES
(2, NULL, '2024-06-27 03:06:25.000000', 5, 3, 'Cur_URBE_02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id_mensaje` int(11) NOT NULL,
  `contenido` longtext NOT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `fecha_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id_mensaje`, `contenido`, `fecha_hora`, `id_user`, `id_sala`, `fecha_envio`) VALUES
(81, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>Lenin Martinez</strong></span>\n                <span>14:32</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                Hola como estan??\n            </div>\n        </li>\n    ', NULL, 4, 1, '2024-07-08 00:32:17'),
(82, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>Lenin Martinez</strong></span>\n                <span>14:32</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                \n            </div>\n        </li>\n    ', NULL, 4, 1, '2024-07-08 00:32:31'),
(83, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>Lenin Martinez</strong></span>\n                <span>14:32</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                bien bien \n            </div>\n        </li>\n    ', NULL, 4, 1, '2024-07-08 00:32:49'),
(84, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>Lenin Martinez</strong></span>\n                <span>14:33</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                que bueno XD\n            </div>\n        </li>\n    ', NULL, 4, 1, '2024-07-08 00:33:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `idNotas` int(11) NOT NULL,
  `NotaAlumno` float NOT NULL,
  `retroalimentacion` text DEFAULT NULL,
  `Usuario_id_user` int(11) NOT NULL,
  `Cursos_id_cur` varchar(100) NOT NULL,
  `Actividad_id_act` int(11) NOT NULL,
  `Entregas_id_entregas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idNotas`, `NotaAlumno`, `retroalimentacion`, `Usuario_id_user`, `Cursos_id_cur`, `Actividad_id_act`, `Entregas_id_entregas`) VALUES
(1, 20, 'Excelente!!!', 3, 'Cur_URBE_01', 6, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `id_peri` int(11) NOT NULL,
  `nombre_peri` varchar(45) NOT NULL,
  `fecha_ini_peri` date NOT NULL,
  `fecha_fin_peri` date NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `periodo_id_cur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`id_peri`, `nombre_peri`, `fecha_ini_peri`, `fecha_fin_peri`, `id_empresa`, `periodo_id_cur`) VALUES
(3, 'Periodo Mayo-Septiembre_2024', '2024-06-12', '2024-06-28', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id_recursos` int(11) NOT NULL,
  `nombre_recurso` varchar(45) NOT NULL,
  `tipo_recurso` varchar(45) DEFAULT NULL,
  `ubicacion_recurso` varchar(45) DEFAULT NULL,
  `descripcion_recurso` text NOT NULL,
  `tipo_archivo` varchar(45) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `archivoAdicional` varchar(255) DEFAULT NULL,
  `id_cur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id_recursos`, `nombre_recurso`, `tipo_recurso`, `ubicacion_recurso`, `descripcion_recurso`, `tipo_archivo`, `archivo`, `archivoAdicional`, `id_cur`) VALUES
(15, 'Sala Big Blue Button', NULL, NULL, '<p><a href=\"https://demo.bigbluebutton.org/rooms/zj0-lzr-o5i-uoo/join\" target=\"_blank\">Sala</a></p>', NULL, NULL, NULL, 'Cur_URBE_02'),
(16, 'Introduccion al Ingles', NULL, NULL, '<p>Miren el video que se esta enviando:</p><p><br></p><ul><li><a href=\"https://www.youtube.com/watch?v=AkF3ZNcZUHc\" target=\"_blank\"><u>https://www.youtube.com/watch?v=AkF3ZNcZUHc</u></a></li></ul>', NULL, NULL, NULL, 'Cur_URBE_01'),
(17, 'Verbo pasado y futuro', NULL, NULL, '<p>Algun texto</p>', NULL, NULL, NULL, 'Cur_URBE_01'),
(18, 'Aula Virtual', NULL, NULL, '<p><a href=\"https://www.youtube.com/watch?v=4yP__KR-Hk4\" target=\"_blank\">Sala aula virtual</a></p>', NULL, 'Distrubiccion de evaluacion_2.docx', 'Reglas del examen_1.docx', 'Cur_URBE_05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id_sala` int(11) NOT NULL,
  `nombre_sala` varchar(45) NOT NULL,
  `id_curso` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id_sala`, `nombre_sala`, `id_curso`) VALUES
(1, 'Cur_URBE_01', 'Cur_URBE_01'),
(2, 'Cur_URBE_06', 'Cur_URBE_06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccionhistorial`
--

CREATE TABLE `seccionhistorial` (
  `fecha_apertura` datetime NOT NULL,
  `fecha_cierre` datetime DEFAULT NULL,
  `id_sala` int(11) NOT NULL,
  `mensaje` longtext DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `seccionhistorial`
--

INSERT INTO `seccionhistorial` (`fecha_apertura`, `fecha_cierre`, `id_sala`, `mensaje`, `id_user`) VALUES
('2024-07-07 20:30:55', NULL, 1, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>Lenin Martinez</strong></span>\n                <span>14:30</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                hola bb\n            </div>\n        </li>\n    ', 4),
('2024-07-07 20:32:17', NULL, 1, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>Lenin Martinez</strong></span>\n                <span>14:32</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                Hola como estan??\n            </div>\n        </li>\n    ', 4),
('2024-07-07 20:32:31', NULL, 1, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>Lenin Martinez</strong></span>\n                <span>14:32</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                \n            </div>\n        </li>\n    ', 4),
('2024-07-07 20:32:49', NULL, 1, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>Lenin Martinez</strong></span>\n                <span>14:32</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                bien bien \n            </div>\n        </li>\n    ', 4),
('2024-07-07 20:33:02', NULL, 1, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>Lenin Martinez</strong></span>\n                <span>14:33</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                que bueno XD\n            </div>\n        </li>\n    ', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `identificacion_user` varchar(11) NOT NULL,
  `nombre_user` varchar(25) NOT NULL,
  `apellido_user` varchar(25) NOT NULL,
  `correo_user` varchar(45) NOT NULL,
  `contrasena_user` varchar(16) NOT NULL,
  `direccion_user` varchar(80) NOT NULL,
  `numero_user` varchar(15) NOT NULL,
  `fecha_nacimiento_user` datetime NOT NULL,
  `Active_online` tinyint(1) NOT NULL,
  `sexo_user` varchar(15) NOT NULL,
  `Empresa_id_empresa` int(11) DEFAULT NULL,
  `rol` tinyint(1) NOT NULL,
  `img_perfil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `identificacion_user`, `nombre_user`, `apellido_user`, `correo_user`, `contrasena_user`, `direccion_user`, `numero_user`, `fecha_nacimiento_user`, `Active_online`, `sexo_user`, `Empresa_id_empresa`, `rol`, `img_perfil`) VALUES
(3, '28467144', 'Pichi', 'Duarte', 'dsjoseale@gmail.com', '12345', 'URB. La paz', '04146119988', '2003-09-12 00:00:00', 0, 'Masculino', 1, 0, ''),
(4, '30251284', 'Lenin', 'Martinez', 'martinezlenin04@gmail.com', '12345', 'La paz', '04146119988', '2003-09-12 00:00:00', 1, 'Masculino', 1, 2, ''),
(5, '30423882', 'SantiaGO', 'viloria', 'santi@gmail.com', '12345', 'la paz', '04246027064', '2004-06-23 00:00:00', 0, 'Masculino', 1, 1, ''),
(7, '28009474', 'Arianna', 'Martinez', 'ari.luz.martinez@gmail.com', '12345', 'Urb San Miguel', '04246418343', '1999-05-12 20:13:12', 0, 'Femenino', NULL, 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosala`
--

CREATE TABLE `usuariosala` (
  `id_user` int(11) DEFAULT NULL,
  `id_sala` int(11) DEFAULT NULL,
  `id_curso` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idActividades`),
  ADD KEY `idCurso_id_cur` (`idCurso_id_cur`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `usuario_cedula_user` (`usuario_identificacion_user`,`cursos_id_cur`,`periodo_id_peri`),
  ADD KEY `usuario_identificacion_user` (`usuario_identificacion_user`),
  ADD KEY `cursos_id_cur` (`cursos_id_cur`),
  ADD KEY `periodo_id_peri` (`periodo_id_peri`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_cur`),
  ADD KEY `Empresa_id_empresa` (`Empresa_id_empresa`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`id_entregas`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `foro_curso`
--
ALTER TABLE `foro_curso`
  ADD PRIMARY KEY (`id_foro_cur`),
  ADD KEY `usuario_id_user` (`usuario_id_user`,`curso_id_curso`),
  ADD KEY `curso_id_curso` (`curso_id_curso`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id_inscripcion`),
  ADD KEY `Usuario_id_user` (`Usuario_id_user`,`Periodo_id_peri`,`Cursos_id_cur`),
  ADD KEY `Periodo_id_peri` (`Periodo_id_peri`),
  ADD KEY `Cursos_id_cur` (`Cursos_id_cur`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `id_sala` (`id_sala`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`idNotas`),
  ADD KEY `Cursos_id_cur` (`Cursos_id_cur`),
  ADD KEY `Usuario_id_user` (`Usuario_id_user`),
  ADD KEY `Actividad_id_act` (`Actividad_id_act`),
  ADD KEY `entregas_id_entregas` (`Entregas_id_entregas`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`id_peri`),
  ADD KEY `ibk_1_id_empresa` (`id_empresa`),
  ADD KEY `periodo_id_cur` (`periodo_id_cur`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_recursos`),
  ADD KEY `id_cur` (`id_cur`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`),
  ADD KEY `ibk_1` (`id_curso`);

--
-- Indices de la tabla `seccionhistorial`
--
ALTER TABLE `seccionhistorial`
  ADD KEY `id_sala` (`id_sala`),
  ADD KEY `seccionhistorial_ibfk_2` (`id_user`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `identificacion_user` (`identificacion_user`),
  ADD KEY `Empresa_id_empresa` (`Empresa_id_empresa`);

--
-- Indices de la tabla `usuariosala`
--
ALTER TABLE `usuariosala`
  ADD KEY `id_user` (`id_user`,`id_sala`),
  ADD KEY `id_sala` (`id_sala`),
  ADD KEY `usuariossala_ibkf_4` (`id_curso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `idActividades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `entregas`
--
ALTER TABLE `entregas`
  MODIFY `id_entregas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `foro_curso`
--
ALTER TABLE `foro_curso`
  MODIFY `id_foro_cur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `idNotas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `id_peri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id_recursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`idCurso_id_cur`) REFERENCES `cursos` (`id_cur`);

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`usuario_identificacion_user`) REFERENCES `usuario` (`identificacion_user`),
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`cursos_id_cur`) REFERENCES `cursos` (`id_cur`),
  ADD CONSTRAINT `calificaciones_ibfk_3` FOREIGN KEY (`periodo_id_peri`) REFERENCES `periodo` (`id_peri`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`Empresa_id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD CONSTRAINT `entregas_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`idActividades`),
  ADD CONSTRAINT `entregas_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);

--
-- Filtros para la tabla `foro_curso`
--
ALTER TABLE `foro_curso`
  ADD CONSTRAINT `foro_curso_ibfk_1` FOREIGN KEY (`usuario_id_user`) REFERENCES `usuario` (`id_user`),
  ADD CONSTRAINT `foro_curso_ibfk_2` FOREIGN KEY (`curso_id_curso`) REFERENCES `cursos` (`id_cur`);

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_3` FOREIGN KEY (`Cursos_id_cur`) REFERENCES `cursos` (`id_cur`),
  ADD CONSTRAINT `inscripcion_ibfk_4` FOREIGN KEY (`Usuario_id_user`) REFERENCES `usuario` (`id_user`),
  ADD CONSTRAINT `inscripcion_ibfk_5` FOREIGN KEY (`Periodo_id_peri`) REFERENCES `periodo` (`id_peri`);

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `id_sala` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`),
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`Cursos_id_cur`) REFERENCES `cursos` (`id_cur`),
  ADD CONSTRAINT `notas_ibfk_3` FOREIGN KEY (`Usuario_id_user`) REFERENCES `usuario` (`id_user`),
  ADD CONSTRAINT `notas_ibfk_4` FOREIGN KEY (`Actividad_id_act`) REFERENCES `actividades` (`idActividades`),
  ADD CONSTRAINT `notas_ibfk_5` FOREIGN KEY (`Entregas_id_entregas`) REFERENCES `entregas` (`id_entregas`);

--
-- Filtros para la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD CONSTRAINT `ibk_1_id_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `ibk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_cur`);

--
-- Filtros para la tabla `seccionhistorial`
--
ALTER TABLE `seccionhistorial`
  ADD CONSTRAINT `seccionhistorial_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`),
  ADD CONSTRAINT `seccionhistorial_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `Empresa_id_empresa` FOREIGN KEY (`Empresa_id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `usuariosala`
--
ALTER TABLE `usuariosala`
  ADD CONSTRAINT `usuariosala_ibfk_2` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`),
  ADD CONSTRAINT `usuariosala_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`),
  ADD CONSTRAINT `usuariossala_ibkf_4` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_cur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
