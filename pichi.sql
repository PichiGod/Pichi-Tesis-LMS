-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 03:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pichi`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividades`
--

CREATE TABLE `actividades` (
  `idActividades` int(11) NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  `ContenidoAcitividad` varchar(45) NOT NULL,
  `instrucciones` varchar(45) DEFAULT NULL,
  `archivosAdicional` text NOT NULL,
  `fechaInicio` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `fechaCulminacion` timestamp(6) NULL DEFAULT NULL,
  `fechaCierre` timestamp(6) NULL DEFAULT NULL,
  `fechaNotificacion` timestamp(6) NULL DEFAULT NULL,
  `numeroArchivos` int(11) NOT NULL,
  `pesoArchivo` float NOT NULL,
  `tipoArchivo` varchar(15) NOT NULL,
  `notaMaxima` float NOT NULL,
  `notaMinima` float NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `activarPorcentaje` tinyint(1) NOT NULL,
  `Porcentaje` int(3) DEFAULT NULL,
  `Notas_idNotas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id_calificacion` int(11) NOT NULL,
  `calificacion_user` float NOT NULL,
  `usuario_identificacion_user` varchar(11) NOT NULL,
  `cursos_id_cur` varchar(8) NOT NULL,
  `periodo_id_peri` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
--

CREATE TABLE `cursos` (
  `id_cur` varchar(8) NOT NULL,
  `nombre_cur` varchar(45) NOT NULL,
  `hora_cur` datetime NOT NULL,
  `cupos_cur_min` int(11) NOT NULL,
  `cupos_cur_max` int(11) NOT NULL,
  `Empresa_id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(80) NOT NULL,
  `bdd_empresa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `foro_curso`
--

CREATE TABLE `foro_curso` (
  `id_foro_cur` varchar(8) NOT NULL,
  `mensaje` varchar(50) NOT NULL,
  `id_mensaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id_inscripcion` varchar(8) NOT NULL,
  `solvencia_estu` tinyint(4) NOT NULL,
  `fecha_incripcion` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `Usuario_id_user` int(11) NOT NULL,
  `Periodo_id_peri` varchar(8) NOT NULL,
  `Cursos_id_cur` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mensaje`
--

CREATE TABLE `mensaje` (
  `id_mensaje` int(11) NOT NULL,
  `contenido` longtext NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

CREATE TABLE `notas` (
  `idNotas` int(11) NOT NULL,
  `NotaAlumno` float NOT NULL,
  `Usuario_id_user` int(11) NOT NULL,
  `Cursos_id_cur` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `periodo`
--

CREATE TABLE `periodo` (
  `id_peri` varchar(8) NOT NULL,
  `nombre_peri` varchar(45) NOT NULL,
  `fecha_ini_peri` date NOT NULL,
  `fecha_fin_peri` date NOT NULL,
  `periodo_id_cur` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recursos`
--

CREATE TABLE `recursos` (
  `id_recursos` varchar(8) NOT NULL,
  `nombre_recurso` varchar(45) NOT NULL,
  `tipo_recurso` varchar(45) NOT NULL,
  `ubicacion_recurso` varchar(45) NOT NULL,
  `descripcion_recurso` varchar(45) NOT NULL,
  `tipo_archivo` varchar(45) NOT NULL,
  `archivo` varchar(45) NOT NULL,
  `id_cur` varchar(8) NOT NULL,
  `Actividades_idActividades` int(11) NOT NULL,
  `Foro_curso_id_foro_cur` varchar(8) NOT NULL,
  `Sala_id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sala`
--

CREATE TABLE `sala` (
  `id_sala` int(11) NOT NULL,
  `nombre_sala` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `seccionhistorial`
--

CREATE TABLE `seccionhistorial` (
  `id_seccion_historial` int(11) NOT NULL,
  `fecha_apertura` datetime NOT NULL,
  `fecha_cierre` datetime NOT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
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
  `rol_user` tinyint(4) NOT NULL,
  `sexo_user` enum('M','F') NOT NULL,
  `Empresa_id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuariosala`
--

CREATE TABLE `usuariosala` (
  `id_user` int(11) DEFAULT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idActividades`,`Notas_idNotas`),
  ADD KEY `Notas_idNotas` (`Notas_idNotas`);

--
-- Indexes for table `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `usuario_cedula_user` (`usuario_identificacion_user`,`cursos_id_cur`,`periodo_id_peri`),
  ADD KEY `usuario_identificacion_user` (`usuario_identificacion_user`),
  ADD KEY `cursos_id_cur` (`cursos_id_cur`),
  ADD KEY `periodo_id_peri` (`periodo_id_peri`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_cur`),
  ADD KEY `Empresa_id_empresa` (`Empresa_id_empresa`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `foro_curso`
--
ALTER TABLE `foro_curso`
  ADD PRIMARY KEY (`id_foro_cur`),
  ADD KEY `id_mensaje` (`id_mensaje`);

--
-- Indexes for table `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id_inscripcion`),
  ADD KEY `Usuario_id_user` (`Usuario_id_user`,`Periodo_id_peri`,`Cursos_id_cur`),
  ADD KEY `Periodo_id_peri` (`Periodo_id_peri`),
  ADD KEY `Cursos_id_cur` (`Cursos_id_cur`);

--
-- Indexes for table `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `id_sala` (`id_sala`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`idNotas`),
  ADD KEY `Cursos_id_cur` (`Cursos_id_cur`),
  ADD KEY `Usuario_id_user` (`Usuario_id_user`);

--
-- Indexes for table `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`id_peri`),
  ADD KEY `periodo_id_cur` (`periodo_id_cur`);

--
-- Indexes for table `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_recursos`),
  ADD KEY `id_cur` (`id_cur`,`Actividades_idActividades`,`Foro_curso_id_foro_cur`,`Sala_id_sala`),
  ADD KEY `Foro_curso_id_foro_cur` (`Foro_curso_id_foro_cur`),
  ADD KEY `Actividades_idActividades` (`Actividades_idActividades`),
  ADD KEY `Sala_id_sala` (`Sala_id_sala`);

--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indexes for table `seccionhistorial`
--
ALTER TABLE `seccionhistorial`
  ADD PRIMARY KEY (`id_seccion_historial`),
  ADD KEY `id_sala` (`id_sala`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `identificacion_user` (`identificacion_user`),
  ADD KEY `Empresa_id_empresa` (`Empresa_id_empresa`);

--
-- Indexes for table `usuariosala`
--
ALTER TABLE `usuariosala`
  ADD KEY `id_user` (`id_user`,`id_sala`),
  ADD KEY `id_sala` (`id_sala`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`Notas_idNotas`) REFERENCES `notas` (`idNotas`);

--
-- Constraints for table `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`usuario_identificacion_user`) REFERENCES `usuario` (`identificacion_user`),
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`cursos_id_cur`) REFERENCES `cursos` (`id_cur`),
  ADD CONSTRAINT `calificaciones_ibfk_3` FOREIGN KEY (`periodo_id_peri`) REFERENCES `periodo` (`id_peri`);

--
-- Constraints for table `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`Empresa_id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Constraints for table `foro_curso`
--
ALTER TABLE `foro_curso`
  ADD CONSTRAINT `foro_curso_ibfk_1` FOREIGN KEY (`id_mensaje`) REFERENCES `mensaje` (`id_mensaje`);

--
-- Constraints for table `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_2` FOREIGN KEY (`Periodo_id_peri`) REFERENCES `periodo` (`id_peri`),
  ADD CONSTRAINT `inscripcion_ibfk_3` FOREIGN KEY (`Cursos_id_cur`) REFERENCES `cursos` (`id_cur`),
  ADD CONSTRAINT `inscripcion_ibfk_4` FOREIGN KEY (`Usuario_id_user`) REFERENCES `usuario` (`id_user`);

--
-- Constraints for table `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `id_sala` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`),
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);

--
-- Constraints for table `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`Cursos_id_cur`) REFERENCES `cursos` (`id_cur`),
  ADD CONSTRAINT `notas_ibfk_3` FOREIGN KEY (`Usuario_id_user`) REFERENCES `usuario` (`id_user`);

--
-- Constraints for table `periodo`
--
ALTER TABLE `periodo`
  ADD CONSTRAINT `periodo_ibfk_1` FOREIGN KEY (`periodo_id_cur`) REFERENCES `cursos` (`id_cur`);

--
-- Constraints for table `recursos`
--
ALTER TABLE `recursos`
  ADD CONSTRAINT `recursos_ibfk_1` FOREIGN KEY (`Foro_curso_id_foro_cur`) REFERENCES `foro_curso` (`id_foro_cur`),
  ADD CONSTRAINT `recursos_ibfk_2` FOREIGN KEY (`Actividades_idActividades`) REFERENCES `actividades` (`idActividades`),
  ADD CONSTRAINT `recursos_ibfk_3` FOREIGN KEY (`Sala_id_sala`) REFERENCES `sala` (`id_sala`);

--
-- Constraints for table `seccionhistorial`
--
ALTER TABLE `seccionhistorial`
  ADD CONSTRAINT `seccionhistorial_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `Empresa_id_empresa` FOREIGN KEY (`Empresa_id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Constraints for table `usuariosala`
--
ALTER TABLE `usuariosala`
  ADD CONSTRAINT `usuariosala_ibfk_2` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`),
  ADD CONSTRAINT `usuariosala_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
