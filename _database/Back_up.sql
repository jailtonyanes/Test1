/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.26 : Database - prog_vi2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`prog_vi2` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `prog_vi2`;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `cliente_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_nit` varchar(45) NOT NULL,
  `cliente_nombre` varchar(45) NOT NULL,
  `cliente_direccion` varchar(45) NOT NULL,
  `cliente_telefono` varchar(45) NOT NULL,
  `cliente_email` varchar(200) NOT NULL,
  `cliente_web` text NOT NULL,
  `contacto_nombre` varchar(100) NOT NULL,
  `contacto_telefono` varchar(30) NOT NULL,
  `contacto_email` varchar(200) NOT NULL,
  `cliente_activo` int(1) DEFAULT NULL,
  PRIMARY KEY (`cliente_id`),
  UNIQUE KEY `cliente_nit` (`cliente_nit`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Table structure for table `departamento` */

DROP TABLE IF EXISTS `departamento`;

CREATE TABLE `departamento` (
  `departamento_id` int(11) NOT NULL AUTO_INCREMENT,
  `departamento_nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`departamento_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Table structure for table `empleado` */

DROP TABLE IF EXISTS `empleado`;

CREATE TABLE `empleado` (
  `empleado_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apellido1` text COMMENT 'info_personal',
  `apellido2` varchar(45) DEFAULT NULL COMMENT 'info_personal',
  `nombre1` varchar(45) DEFAULT NULL COMMENT 'info_personal',
  `nombre2` varchar(45) DEFAULT NULL COMMENT 'info_personal',
  `cedula` int(11) DEFAULT NULL COMMENT 'info_personal',
  `direccion` varchar(200) DEFAULT NULL COMMENT 'info_personal',
  `telefono_fijo` varchar(30) DEFAULT NULL COMMENT 'info_personal',
  `celular` varchar(30) DEFAULT NULL COMMENT 'info_personal',
  `email` varchar(300) DEFAULT NULL COMMENT 'info_personal',
  `cargo` int(11) DEFAULT NULL COMMENT 'info_personal',
  `tipo_sangre` varchar(30) DEFAULT NULL COMMENT 'info_personal',
  `departamento_id` int(11) DEFAULT NULL COMMENT 'info_personal',
  `municipio_id` int(11) DEFAULT NULL COMMENT 'info_personal',
  `barrio` varchar(200) DEFAULT NULL COMMENT 'info_personal',
  PRIMARY KEY (`empleado_id`),
  UNIQUE KEY `unique_empleado` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

/*Table structure for table `festivo` */

DROP TABLE IF EXISTS `festivo`;

CREATE TABLE `festivo` (
  `fecha_id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_festiva` date DEFAULT NULL,
  PRIMARY KEY (`fecha_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

/*Table structure for table `horario` */

DROP TABLE IF EXISTS `horario`;

CREATE TABLE `horario` (
  `horario_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hora_inicio_lunes` time NOT NULL,
  `hora_fin_lunes` time NOT NULL,
  `turno_id` int(10) unsigned NOT NULL,
  `hora_inicio_martes` time NOT NULL,
  `hora_fin_martes` time NOT NULL,
  `hora_inicio_miercoles` time NOT NULL,
  `hora_fin_miercoles` time NOT NULL,
  `hora_inicio_jueves` time NOT NULL,
  `hora_fin_jueves` time NOT NULL,
  `hoa_inicio_viernes` time NOT NULL,
  `hora_fin_viernes` time NOT NULL,
  `hora_inicio_sabado` time NOT NULL,
  `hora_fin_sabado` time NOT NULL,
  `hora_inicio_domingo` time NOT NULL,
  `hora_fin_domingo` time NOT NULL,
  `hora_inicio_festivos` time NOT NULL,
  `hora_fin_festivos` time NOT NULL,
  PRIMARY KEY (`horario_id`),
  KEY `FK_horario_1` (`turno_id`),
  CONSTRAINT `FK_horario_1` FOREIGN KEY (`turno_id`) REFERENCES `turno` (`turno_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `id_prog` */

DROP TABLE IF EXISTS `id_prog`;

CREATE TABLE `id_prog` (
  `prog_id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_ini` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `guarda_id` varchar(20) DEFAULT NULL,
  `tipo_prog` int(1) DEFAULT NULL COMMENT '1 fijo, 2 relevo',
  `programacion_nombre` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`prog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;

/*Table structure for table `minimo` */

DROP TABLE IF EXISTS `minimo`;

CREATE TABLE `minimo` (
  `minimo_id` int(11) NOT NULL AUTO_INCREMENT,
  `minimo_monto` int(11) NOT NULL,
  `fecha` year(4) NOT NULL,
  PRIMARY KEY (`minimo_id`),
  UNIQUE KEY `new_index` (`fecha`,`minimo_monto`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Table structure for table `municipio` */

DROP TABLE IF EXISTS `municipio`;

CREATE TABLE `municipio` (
  `municipio_id` int(11) NOT NULL AUTO_INCREMENT,
  `departamento_id` int(11) DEFAULT NULL,
  `municipio_nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`municipio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Table structure for table `novedad` */

DROP TABLE IF EXISTS `novedad`;

CREATE TABLE `novedad` (
  `novedad_id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL COMMENT '1 ,aumenta, 2 decrementa',
  `nombre` varchar(30) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL COMMENT '1 para activo, 0 para inactivo',
  PRIMARY KEY (`novedad_id`),
  UNIQUE KEY `UNIQUE` (`codigo`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Table structure for table `prog_guar` */

DROP TABLE IF EXISTS `prog_guar`;

CREATE TABLE `prog_guar` (
  `id_prog` int(11) NOT NULL,
  `guarda_id` int(11) NOT NULL,
  `fecha_ini` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`id_prog`,`guarda_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `programacion` */

DROP TABLE IF EXISTS `programacion`;

CREATE TABLE `programacion` (
  `prog_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) DEFAULT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `guarda_id` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `turno_id` int(11) DEFAULT NULL,
  `novedad_id` int(11) DEFAULT NULL,
  `tipo_turno` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `remplazo_guarda_id` int(11) DEFAULT NULL,
  `tipo_programacion` varchar(11) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT '1, para programacion fija, 2 para relevo.',
  `dia_sem` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `id_prog` int(11) DEFAULT NULL COMMENT 'para saber a que programacion pertence la asignacion',
  `r_ini_d` time NOT NULL,
  `r_fin_d` time NOT NULL,
  `r_ini_n` time NOT NULL,
  `r_fin_n` time NOT NULL,
  `novedad_horas` int(11) DEFAULT '0',
  `puesto` int(11) DEFAULT NULL,
  PRIMARY KEY (`prog_id`),
  UNIQUE KEY `u` (`cliente_id`,`departamento_id`,`municipio_id`,`sucursal_id`,`guarda_id`,`turno_id`,`novedad_id`,`tipo_turno`,`fecha`,`remplazo_guarda_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1809 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Table structure for table `puesto` */

DROP TABLE IF EXISTS `puesto`;

CREATE TABLE `puesto` (
  `puesto_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `puesto_nombre` varchar(150) NOT NULL,
  `sucursal_id` int(10) unsigned NOT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`puesto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Table structure for table `puesto_servicio` */

DROP TABLE IF EXISTS `puesto_servicio`;

CREATE TABLE `puesto_servicio` (
  `puesto_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `servicio_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`puesto_id`,`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `salario` */

DROP TABLE IF EXISTS `salario`;

CREATE TABLE `salario` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` int(11) NOT NULL,
  `cargo` varchar(25) NOT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `servicio` */

DROP TABLE IF EXISTS `servicio`;

CREATE TABLE `servicio` (
  `servicio_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empleado_id` int(10) unsigned NOT NULL,
  `turno_id` int(10) unsigned NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `dia_de_turno` int(10) unsigned NOT NULL,
  PRIMARY KEY (`servicio_id`),
  KEY `FK_servicio_1` (`empleado_id`),
  KEY `FK_servicio_2` (`turno_id`),
  CONSTRAINT `FK_servicio_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`empleado_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_servicio_2` FOREIGN KEY (`turno_id`) REFERENCES `turno` (`turno_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `sub_transp` */

DROP TABLE IF EXISTS `sub_transp`;

CREATE TABLE `sub_transp` (
  `idsub_transp` int(11) NOT NULL AUTO_INCREMENT,
  `monto` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsub_transp`),
  UNIQUE KEY `index2` (`monto`,`year`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `sucursal` */

DROP TABLE IF EXISTS `sucursal`;

CREATE TABLE `sucursal` (
  `sucursal_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sucursal_nombre` varchar(45) NOT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  `sucursal_direccion` varchar(45) NOT NULL,
  `sucursal_contacto_telefono` varchar(45) NOT NULL,
  `sucursal_contacto_nombre` varchar(45) NOT NULL,
  `sucursal_contacto_email` varchar(45) NOT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `sucursal_telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sucursal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

/*Table structure for table `turno` */

DROP TABLE IF EXISTS `turno`;

CREATE TABLE `turno` (
  `turno_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `turno_nombre` varchar(45) CHARACTER SET utf8 NOT NULL,
  `turno_descripcion` varchar(200) CHARACTER SET utf8 NOT NULL,
  `dias_laborales` int(10) unsigned NOT NULL,
  `dias_descanso` int(10) unsigned NOT NULL,
  `dtd` int(11) DEFAULT NULL,
  `r_ini_d` time NOT NULL,
  `r_fin_d` time NOT NULL,
  `dtn` int(11) DEFAULT NULL,
  `r_ini_n` time NOT NULL,
  `r_fin_n` time NOT NULL,
  `tp_jornada` int(11) NOT NULL,
  `inicio_turno` int(11) DEFAULT NULL,
  `des_lunes` int(11) DEFAULT NULL,
  `des_martes` int(11) DEFAULT NULL,
  `des_miercoles` int(11) DEFAULT NULL,
  `des_jueves` int(11) DEFAULT NULL,
  `des_viernes` int(11) DEFAULT NULL,
  `des_sabado` int(11) DEFAULT NULL,
  `des_domingo` int(11) DEFAULT NULL,
  `des_festivos` int(11) DEFAULT NULL,
  PRIMARY KEY (`turno_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Table structure for table `turno_relevo` */

DROP TABLE IF EXISTS `turno_relevo`;

CREATE TABLE `turno_relevo` (
  `relevo_id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `guarda_id` varchar(20) DEFAULT NULL,
  `id_prog` int(11) DEFAULT NULL,
  PRIMARY KEY (`relevo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nombre` varchar(45) DEFAULT NULL,
  `usuario_apellido` varchar(45) DEFAULT NULL,
  `usuario_password` varchar(45) DEFAULT NULL,
  `usuario_nick` varchar(45) DEFAULT NULL,
  `usuario_tipo` int(3) DEFAULT NULL,
  `usuario_active` int(3) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `usuario_nick` (`usuario_nick`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/* Procedure structure for procedure `insert_prog` */

/*!50003 DROP PROCEDURE IF EXISTS  `insert_prog` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`%` PROCEDURE `insert_prog`(cliente_id integer, departamento_id integer, municipio_id integer, sucursal_id integer,guarda_id integer, turno_id integer,novedad_id integer,tipo_turno varchar(1),fecha datetime)
BEGIN
    
   insert into programacion  (cliente_id,departamento_id,municipio_id,sucursal_id,guarda_id,turno_id,novedad_id,tipo_turno,fecha)
   values  (cliente_id,departamento_id,municipio_id,sucursal_id,guarda_id,turno_id,novedad_id,tipo_turno,fecha);
    
    END */$$
DELIMITER ;

/*Table structure for table `calcu_nom` */

DROP TABLE IF EXISTS `calcu_nom`;

/*!50001 DROP VIEW IF EXISTS `calcu_nom` */;
/*!50001 DROP TABLE IF EXISTS `calcu_nom` */;

/*!50001 CREATE TABLE  `calcu_nom`(
 `prog_id` int(11) ,
 `guarda_id` varchar(20) ,
 `guarda` mediumtext ,
 `cliente_id` int(11) ,
 `tipo_turno` varchar(20) ,
 `fecha` date ,
 `r_ini_d` time ,
 `r_fin_d` time ,
 `r_ini_n` time ,
 `r_fin_n` time ,
 `difdia` int(11) ,
 `vlr_hora` decimal(11,0) ,
 `rec_noct` decimal(12,0) ,
 `ext_diur` decimal(12,0) ,
 `ext_noct` decimal(12,0) ,
 `ext_fest_diur` decimal(12,0) ,
 `ext_fest_noct` decimal(12,0) ,
 `hora_ord_dom_diur` decimal(12,0) ,
 `hora_rec_noct_dom` decimal(12,0) ,
 `tipo_programacion` varchar(11) ,
 `novedad_horas` int(11) ,
 `novedad_id` int(11) 
)*/;

/*Table structure for table `saca_guarda` */

DROP TABLE IF EXISTS `saca_guarda`;

/*!50001 DROP VIEW IF EXISTS `saca_guarda` */;
/*!50001 DROP TABLE IF EXISTS `saca_guarda` */;

/*!50001 CREATE TABLE  `saca_guarda`(
 `guarda` mediumtext ,
 `cedula` int(11) ,
 `departamento_id` int(11) ,
 `municipio_id` int(11) 
)*/;

/*Table structure for table `saco_prog` */

DROP TABLE IF EXISTS `saco_prog`;

/*!50001 DROP VIEW IF EXISTS `saco_prog` */;
/*!50001 DROP TABLE IF EXISTS `saco_prog` */;

/*!50001 CREATE TABLE  `saco_prog`(
 `prog_id` int(11) ,
 `cliente_nombre` varchar(45) ,
 `departamento_nombre` varchar(45) ,
 `municipio_nombre` varchar(45) ,
 `sucursal_nombre` varchar(45) ,
 `guarda` mediumtext ,
 `turno_nombre` varchar(45) ,
 `nombre` varchar(30) ,
 `tipo_turno` varchar(8) ,
 `fecha` date ,
 `r_ini_n` time ,
 `r_fin_n` time ,
 `r_ini_d` time ,
 `r_fin_d` time ,
 `tipo_programacion` varchar(11) 
)*/;

/*View structure for view calcu_nom */

/*!50001 DROP TABLE IF EXISTS `calcu_nom` */;
/*!50001 DROP VIEW IF EXISTS `calcu_nom` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `calcu_nom` AS select `programacion`.`prog_id` AS `prog_id`,`programacion`.`guarda_id` AS `guarda_id`,concat(`empleado`.`apellido1`,' ',`empleado`.`apellido2`,' ',`empleado`.`nombre1`,' ',`empleado`.`nombre2`) AS `guarda`,`programacion`.`cliente_id` AS `cliente_id`,`programacion`.`tipo_turno` AS `tipo_turno`,`programacion`.`fecha` AS `fecha`,`programacion`.`r_ini_d` AS `r_ini_d`,`programacion`.`r_fin_d` AS `r_fin_d`,`programacion`.`r_ini_n` AS `r_ini_n`,`programacion`.`r_fin_n` AS `r_fin_n`,`turno`.`tp_jornada` AS `difdia`,round((`salario`.`monto` / 240),0) AS `vlr_hora`,round(((`salario`.`monto` / 240) * 0.35),0) AS `rec_noct`,round(((`salario`.`monto` / 240) * 1.25),0) AS `ext_diur`,round(((`salario`.`monto` / 240) * 1.75),0) AS `ext_noct`,round(((`salario`.`monto` / 240) * 2),0) AS `ext_fest_diur`,round(((`salario`.`monto` / 240) * 2.5),0) AS `ext_fest_noct`,round(((`salario`.`monto` / 240) * 1.75),0) AS `hora_ord_dom_diur`,round(((`salario`.`monto` / 240) * 1.1),0) AS `hora_rec_noct_dom`,`programacion`.`tipo_programacion` AS `tipo_programacion`,`programacion`.`novedad_horas` AS `novedad_horas`,`programacion`.`novedad_id` AS `novedad_id` from (((`programacion` join `empleado` on((`empleado`.`cedula` = `programacion`.`guarda_id`))) join `salario` on((`salario`.`reg_id` = `empleado`.`cargo`))) join `turno` on((`turno`.`turno_id` = `programacion`.`turno_id`))) */;

/*View structure for view saca_guarda */

/*!50001 DROP TABLE IF EXISTS `saca_guarda` */;
/*!50001 DROP VIEW IF EXISTS `saca_guarda` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `saca_guarda` AS select concat(`prog_vi2`.`empleado`.`apellido1`,' ',`prog_vi2`.`empleado`.`apellido2`,' ',`prog_vi2`.`empleado`.`nombre1`,' ',`prog_vi2`.`empleado`.`nombre2`) AS `guarda`,`prog_vi2`.`empleado`.`cedula` AS `cedula`,`prog_vi2`.`empleado`.`departamento_id` AS `departamento_id`,`prog_vi2`.`empleado`.`municipio_id` AS `municipio_id` from `empleado` order by `prog_vi2`.`empleado`.`apellido1`,`prog_vi2`.`empleado`.`apellido2`,`prog_vi2`.`empleado`.`nombre1`,`prog_vi2`.`empleado`.`nombre2` */;

/*View structure for view saco_prog */

/*!50001 DROP TABLE IF EXISTS `saco_prog` */;
/*!50001 DROP VIEW IF EXISTS `saco_prog` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `saco_prog` AS select `programacion`.`prog_id` AS `prog_id`,`cliente`.`cliente_nombre` AS `cliente_nombre`,`departamento`.`departamento_nombre` AS `departamento_nombre`,`municipio`.`municipio_nombre` AS `municipio_nombre`,`sucursal`.`sucursal_nombre` AS `sucursal_nombre`,concat(`empleado`.`apellido1`,' ',`empleado`.`apellido2`,' ',`empleado`.`nombre1`,' ',`empleado`.`nombre2`) AS `guarda`,`turno`.`turno_nombre` AS `turno_nombre`,`novedad`.`nombre` AS `nombre`,(case `programacion`.`tipo_turno` when 'N' then 'NOCHE' when 'X' then 'DESCANSO' when 'D' then 'DIA' end) AS `tipo_turno`,cast(`programacion`.`fecha` as date) AS `fecha`,`programacion`.`r_ini_n` AS `r_ini_n`,`programacion`.`r_fin_n` AS `r_fin_n`,`programacion`.`r_ini_d` AS `r_ini_d`,`programacion`.`r_fin_d` AS `r_fin_d`,`programacion`.`tipo_programacion` AS `tipo_programacion` from (((((((`cliente` join `programacion` on((`cliente`.`cliente_id` = `programacion`.`cliente_id`))) join `departamento` on((`departamento`.`departamento_id` = `programacion`.`departamento_id`))) join `municipio` on((`municipio`.`municipio_id` = `programacion`.`municipio_id`))) join `sucursal` on((`sucursal`.`sucursal_id` = `programacion`.`sucursal_id`))) join `empleado` on((`empleado`.`cedula` = `programacion`.`guarda_id`))) join `turno` on((`turno`.`turno_id` = `programacion`.`turno_id`))) join `novedad` on((`novedad`.`novedad_id` = `programacion`.`novedad_id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
