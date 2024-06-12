-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2024 a las 22:22:00
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
(1, 'eferwtretertertertfetfe', '', 'finales.docx', '2024-05-11 04:00:00.000000', '2024-05-30 04:00:00.000000', '2024-05-29 04:00:00.000000', 5, 20, 10, 0, 1, 0, '', 'Cur_URBE_01'),
(2, 'Portugues II INSTRUCCIONES', '', 'finales (FINAL).docx', '2024-05-18 04:00:00.000000', '2024-05-18 04:00:00.000000', '2024-05-17 04:00:00.000000', 5, 20, 5, 0, 1, 0, 'finales.docx', 'Cur_URBE_01'),
(3, 'Portugues II INSTRUCCIONES II', '', 'Tipos de modelos de negocio.pdf', '2024-05-17 04:00:00.000000', '2024-05-31 04:00:00.000000', '2024-05-31 04:00:00.000000', 5, 20, 10, 0, 1, 0, NULL, 'Cur_URBE_01'),
(4, 'Portugues II INSTRUCCIONES III', '<p>Hola estas son las instrucciones necesarias</p>', 'Informe Simulacion de sistemas.docx', '2024-05-18 04:00:00.000000', '2024-05-24 04:00:00.000000', '2024-05-31 04:00:00.000000', 5, 20, 10, 0, 1, 0, NULL, 'Cur_URBE_01'),
(5, 'Portugues II INSTRUCCIONES IV', '<p>pRUEBAS XD</p>', 'Informe Simulacion de sistemas.docx', '2024-05-24 04:00:00.000000', '2024-05-24 04:00:00.000000', '2024-05-31 04:00:00.000000', 20, 20, 10, 0, 1, 0, 'finales (FINAL).docx', 'Cur_URBE_01'),
(6, 'Ingles I documentos para Evaluativo', '<p>Aqui cualquier descripción </p>', 'finales (FINAL).docx', '2024-05-24 04:00:00.000000', '2024-05-31 04:00:00.000000', '2024-05-30 04:00:00.000000', 20, 20, 10, 0, 0, 10, NULL, 'Cur_URBE_01'),
(7, 'Verbo To-Be', '<p>Ver el archivo incluido en la actividad.</p>', 'InformePasantia-Cap-III.pdf', '2024-06-11 04:00:00.000000', '2024-06-19 04:00:00.000000', '2024-06-17 04:00:00.000000', 10, 20, 1, 0, 1, 0, NULL, 'Cur_URBE_01');

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
('Cur_URBE_03', 'Ingles III', '2024-05-10', 10, 40, 1, '2024-11-21', 'Invisible');

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
(6, '<p>asasas</p>', NULL, NULL, '2024-06-11', 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_curso`
--

CREATE TABLE `foro_curso` (
  `id_foro_cur` int(11) NOT NULL,
  `mensaje` longtext NOT NULL,
  `modif_fecha` datetime NOT NULL,
  `usuario_id_user` int(11) NOT NULL,
  `curso_id_curso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `foro_curso`
--

INSERT INTO `foro_curso` (`id_foro_cur`, `mensaje`, `modif_fecha`, `usuario_id_user`, `curso_id_curso`) VALUES
(1, 'Hola profe', '2024-06-05 13:27:00', 4, 'Cur_URBE_01'),
(4, 'Hola Lenin', '2024-06-06 10:13:00', 5, 'Cur_URBE_01'),
(6, 'jose oropeza', '2024-06-07 18:44:00', 4, 'Cur_URBE_01'),
(7, 'hola', '2024-06-07 19:36:00', 4, 'Cur_URBE_01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id_inscripcion` varchar(8) NOT NULL,
  `solvencia_estu` tinyint(4) NOT NULL,
  `fecha_incripcion` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `Usuario_id_user` int(11) NOT NULL,
  `Periodo_id_peri` int(11) NOT NULL,
  `Cursos_id_cur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id_mensaje` int(11) NOT NULL,
  `contenido` longtext NOT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id_mensaje`, `contenido`, `fecha_hora`, `id_user`, `id_sala`) VALUES
(24, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>Lenin Martinez</strong></span>\n                <span>17:21</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                Hola mi gente de puerto rico\n            </div>\n        </li>\n    ', NULL, 4, 1),
(25, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>Lenin Martinez</strong></span>\n                <span>17:22</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                Como esta todo el mundo en esta monda??\n            </div>\n        </li>\n    ', NULL, 4, 1),
(26, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>SantiaGO viloria</strong></span>\n                <span>11:59</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                Todo Bien profe.\n            </div>\n        </li>\n    ', NULL, 5, 1),
(27, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>Lenin Martinez</strong></span>\n                <span>18:26</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                Como estan?\n            </div>\n        </li>\n    ', NULL, 4, 1),
(28, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>Pichi Duarte</strong></span>\n                <span>18:27</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                Todo chikiluki\n            </div>\n        </li>\n    ', NULL, 3, 1),
(29, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>Pichi Duarte</strong></span>\n                <span>18:46</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                hola\n            </div>\n        </li>\n    ', NULL, 3, 1),
(30, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>Lenin Martinez</strong></span>\n                <span>19:37</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                pichi\n            </div>\n        </li>\n    ', NULL, 4, 1),
(31, '\n          <li class=\"list-group-item bg-white p-1 my-1 rounded\">\n            <div id=\"userName\" class=\"ms-2 text-break\">\n                <span><strong>Lenin Martinez</strong></span>\n                <span>19:38</span>\n            </div>\n            <div id=\"mensaje\" class=\"ms-2 text-break\">\n                pichi2\n            </div>\n        </li>\n    ', NULL, 4, 1);

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
  `Actividad_id_act` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(3, 'Prueba', NULL, NULL, '<p>prueba</p>', NULL, 'InformePasantia-Cap-I.docx', 'InformePasantia-Cap-II.docx', 'Cur_URBE_01'),
(4, 'prueba 2', NULL, NULL, '<p>prueba</p>', NULL, 'InformePasantia-Cap-III.docx', NULL, 'Cur_URBE_01'),
(14, 'Prueba 3', NULL, NULL, '<p>Recurso puro texto</p>', NULL, NULL, NULL, 'Cur_URBE_01');

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
(1, 'Cur_URBE_01', 'Cur_URBE_01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccionhistorial`
--

CREATE TABLE `seccionhistorial` (
  `id_seccion_historial` int(11) NOT NULL,
  `fecha_apertura` datetime NOT NULL,
  `fecha_cierre` datetime NOT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(3, '28467144', 'Pichi', 'Duarte', 'dsjoseale@gmail.com', '12345', 'URB. La paz', '04146119988', '2003-09-12 00:00:00', 0, 'Femenino', 1, 0, ''),
(4, '30251284', 'Lenin', 'Martinez', 'martinezlenin@gmail.com', '12345', 'La paz', '04146119988', '2003-09-12 00:00:00', 1, 'Masculino', 1, 2, ''),
(5, '30423882', 'SantiaGO', 'viloria', 'santi@gmail.com', '12345', 'la paz', '04246027064', '2004-06-23 00:00:00', 0, 'Femenino', 1, 1, ''),
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
-- Volcado de datos para la tabla `usuariosala`
--

INSERT INTO `usuariosala` (`id_user`, `id_sala`, `id_curso`) VALUES
(5, 1, 'Cur_URBE_01'),
(3, 1, 'Cur_URBE_01'),
(4, 1, 'Cur_URBE_01');

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
  ADD KEY `Actividad_id_act` (`Actividad_id_act`);

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
  ADD PRIMARY KEY (`id_seccion_historial`),
  ADD KEY `id_sala` (`id_sala`);

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
  MODIFY `idActividades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `entregas`
--
ALTER TABLE `entregas`
  MODIFY `id_entregas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `foro_curso`
--
ALTER TABLE `foro_curso`
  MODIFY `id_foro_cur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `id_peri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id_recursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `notas_ibfk_3` FOREIGN KEY (`Usuario_id_user`) REFERENCES `usuario` (`id_user`);

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
  ADD CONSTRAINT `seccionhistorial_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`);

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
