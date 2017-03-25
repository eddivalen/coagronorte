-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: coagronorte
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actividades`
--

DROP TABLE IF EXISTS `actividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividades` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `descripcion` varchar(50) NOT NULL COMMENT 'contenido ',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Dominio para guardar las diferentes actividades que pueden realizarse';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividades`
--

LOCK TABLES `actividades` WRITE;
/*!40000 ALTER TABLE `actividades` DISABLE KEYS */;
INSERT INTO `actividades` VALUES (1,'sembrar'),(2,'recolectar');
/*!40000 ALTER TABLE `actividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudades`
--

DROP TABLE IF EXISTS `ciudades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudades` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `descripcion` varchar(50) NOT NULL COMMENT 'nombre ciudad',
  `codigo_municipio` int(11) NOT NULL COMMENT 'clave foranea con tabla municipio',
  PRIMARY KEY (`codigo`),
  KEY `ciudades_fk0` (`codigo_municipio`),
  CONSTRAINT `ciudades_fk0` FOREIGN KEY (`codigo_municipio`) REFERENCES `municipios` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Dominio de ciudades';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudades`
--

LOCK TABLES `ciudades` WRITE;
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
INSERT INTO `ciudades` VALUES (1,'Cucuta',1);
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `descripcion` varchar(50) NOT NULL COMMENT 'nombre del departamento',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Dominio con información de departamentos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'uno');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_implementos`
--

DROP TABLE IF EXISTS `detalle_implementos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_implementos` (
  `codigo_implementos` int(11) NOT NULL COMMENT 'clave foranea con tabla implementos',
  `cedula_usuarios` varchar(50) NOT NULL COMMENT 'clave foranea con tabla usuarios',
  `cantidad` int(11) NOT NULL COMMENT 'cantidad de implementos que posee',
  `codigo` int(11) NOT NULL COMMENT 'identificador de la tabla',
  PRIMARY KEY (`codigo`),
  KEY `detalle_implementos_fk0` (`codigo_implementos`),
  KEY `detalle_implementos_fk1` (`cedula_usuarios`),
  CONSTRAINT `detalle_implementos_fk0` FOREIGN KEY (`codigo_implementos`) REFERENCES `implementos` (`cod`),
  CONSTRAINT `detalle_implementos_fk1` FOREIGN KEY (`cedula_usuarios`) REFERENCES `usuarios` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla asociativa con la información de los implemento con ue cuenta el agricultor';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_implementos`
--

LOCK TABLES `detalle_implementos` WRITE;
/*!40000 ALTER TABLE `detalle_implementos` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_implementos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_plantilla`
--

DROP TABLE IF EXISTS `detalle_plantilla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_plantilla` (
  `codigo_plantilla` int(11) NOT NULL COMMENT 'clave foranea con tabla plantilla',
  `cedula_usuario` varchar(50) NOT NULL COMMENT 'clave foranea con tabla usuarios',
  `cumplimiento` binary(1) NOT NULL COMMENT 'variable booleana que denota el cumplimiento o no de la actividad',
  `fecha_inicio` datetime NOT NULL COMMENT 'fecha de inicio asignada al usuario para el cumplimiento de la actividad',
  PRIMARY KEY (`codigo_plantilla`,`cedula_usuario`),
  KEY `detalle_plantilla_fk1` (`cedula_usuario`),
  CONSTRAINT `detalle_plantilla_fk0` FOREIGN KEY (`codigo_plantilla`) REFERENCES `plantillas` (`codigo`),
  CONSTRAINT `detalle_plantilla_fk1` FOREIGN KEY (`cedula_usuario`) REFERENCES `usuarios` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla asociativa entre la plantilla de actividades que debe cubrir un usuario determinado';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_plantilla`
--

LOCK TABLES `detalle_plantilla` WRITE;
/*!40000 ALTER TABLE `detalle_plantilla` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_plantilla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_siembras`
--

DROP TABLE IF EXISTS `estado_siembras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_siembras` (
  `numero` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `archivo` varchar(50) DEFAULT NULL COMMENT 'almacena la ruta del archivo de voz o imagen',
  `descripcion` text NOT NULL COMMENT 'texto de la nota de voz',
  `fecha` datetime NOT NULL COMMENT 'fecha y hora de la nota de voz o foto',
  `duracion` decimal(10,2) DEFAULT NULL COMMENT 'duracion de la nota de voz',
  `tamano` decimal(10,2) DEFAULT NULL COMMENT 'tamano de la imagen adjuntada',
  `tipo` enum('imagen','voz') NOT NULL COMMENT 'imagen, voz ',
  `codigo_visitas` int(11) NOT NULL COMMENT 'clave foranea con tabla visitas',
  PRIMARY KEY (`numero`),
  KEY `estado_siembras_fk0` (`codigo_visitas`),
  CONSTRAINT `estado_siembras_fk0` FOREIGN KEY (`codigo_visitas`) REFERENCES `visitas` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Almacena el estado de una siembra determinada cuando se realiza una visita. Mecanismo para almacenar fotos, texto y notas de voz';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_siembras`
--

LOCK TABLES `estado_siembras` WRITE;
/*!40000 ALTER TABLE `estado_siembras` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado_siembras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `implementos`
--

DROP TABLE IF EXISTS `implementos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `implementos` (
  `cod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de tabla',
  `descripcion` varchar(50) NOT NULL COMMENT 'nombre del iimplemento',
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Tabla maestra de implementos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `implementos`
--

LOCK TABLES `implementos` WRITE;
/*!40000 ALTER TABLE `implementos` DISABLE KEYS */;
INSERT INTO `implementos` VALUES (1,'prueba');
/*!40000 ALTER TABLE `implementos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_reserved_at_index` (`queue`,`reserved`,`reserved_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lotes`
--

DROP TABLE IF EXISTS `lotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lotes` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de tabla',
  `vereda` varchar(50) NOT NULL COMMENT 'vereda de ubicacion',
  `codigo_zona` int(11) NOT NULL COMMENT 'clave fornea con tabla zona. indica la zona  a la que pertenece',
  `area` decimal(10,0) NOT NULL COMMENT 'metros cuadrados que posee el lote',
  `propietario` varchar(50) NOT NULL COMMENT 'clave foranea tabla usuarios para saber de quue agricultor es el lote',
  `tenencia` enum('propio','arriendo','vencimiento') NOT NULL COMMENT 'indicador: propio,arriendo, vencimiento',
  `analisis_suelo` binary(1) NOT NULL COMMENT '1:Si, 0:No',
  `fecha_analisis_suelo` datetime DEFAULT NULL COMMENT 'cuando se realizo el analisis de suelo',
  `PINSAT` binary(1) NOT NULL COMMENT '1:Si, 0:No ',
  `planos` binary(1) NOT NULL COMMENT '1:Si, 0:No',
  `archivo_planos` varchar(50) NOT NULL COMMENT 'direccion archivo de planos',
  `venta` binary(1) NOT NULL COMMENT 'solo inscrito para venta 1:Si, 0:No',
  `asistencia_tecnica` binary(1) NOT NULL COMMENT 'servicio de asistencia tecnica de coagronorte 1:Si, 0:No',
  `codigo_riego` int(11) NOT NULL COMMENT 'clave foranea tabla riego',
  `longitud` int(11) NOT NULL COMMENT 'ubicacion',
  `latitud` int(11) NOT NULL COMMENT 'ubicacion',
  PRIMARY KEY (`codigo`),
  KEY `lotes_fk0` (`codigo_zona`),
  KEY `lotes_fk1` (`propietario`),
  KEY `lotes_fk2` (`codigo_riego`),
  CONSTRAINT `lotes_fk0` FOREIGN KEY (`codigo_zona`) REFERENCES `zonas` (`codigo`),
  CONSTRAINT `lotes_fk1` FOREIGN KEY (`propietario`) REFERENCES `usuarios` (`cedula`),
  CONSTRAINT `lotes_fk2` FOREIGN KEY (`codigo_riego`) REFERENCES `tipo_riegos` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='información de los lotes que maneja el agricultor';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lotes`
--

LOCK TABLES `lotes` WRITE;
/*!40000 ALTER TABLE `lotes` DISABLE KEYS */;
INSERT INTO `lotes` VALUES (1,'Marcelino Stravenue',1,1121,'21417201','vencimiento','0','1989-04-10 00:00:00','1','0','http://lorempixel.com/640/480/?55180','0','0',1,-76,-1),(2,'Jayda Lake',1,1684,'21417201','propio','1','2002-12-11 00:00:00','0','1','http://lorempixel.com/640/480/?74860','0','0',1,-69,9);
/*!40000 ALTER TABLE `lotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_02_17_124624_create_jobs_table',2),(4,'2017_02_17_124716_create_failed_jobs',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipios`
--

DROP TABLE IF EXISTS `municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipios` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de tabla',
  `descripcion` varchar(50) NOT NULL COMMENT 'nombre del municipio',
  `codigo_departamento` int(11) NOT NULL COMMENT 'clave foranea con tabla departamento',
  PRIMARY KEY (`codigo`),
  KEY `municipios_fk0` (`codigo_departamento`),
  CONSTRAINT `municipios_fk0` FOREIGN KEY (`codigo_departamento`) REFERENCES `departamentos` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='tabla maestra con la información de los municipios';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipios`
--

LOCK TABLES `municipios` WRITE;
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
INSERT INTO `municipios` VALUES (1,'uno',1);
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plantillas`
--

DROP TABLE IF EXISTS `plantillas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plantillas` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `codigo_actividad` int(11) NOT NULL COMMENT 'clave foranea con tabla actividad',
  `ciclo_dias_conteo` int(11) NOT NULL COMMENT 'cuantos dias debe contar para el desarrollo de la actividad',
  `dias_alerta` int(11) NOT NULL COMMENT 'con cuantos dias de alerta deben emitirse las notificaciones',
  PRIMARY KEY (`codigo`),
  KEY `plantillas_fk0` (`codigo_actividad`),
  CONSTRAINT `plantillas_fk0` FOREIGN KEY (`codigo_actividad`) REFERENCES `actividades` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='permite almacenar y configurar diferentes actividades a desarrollar por los usuarios';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plantillas`
--

LOCK TABLES `plantillas` WRITE;
/*!40000 ALTER TABLE `plantillas` DISABLE KEYS */;
INSERT INTO `plantillas` VALUES (2,1,1,1);
/*!40000 ALTER TABLE `plantillas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_recomendaciones`
--

DROP TABLE IF EXISTS `producto_recomendaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto_recomendaciones` (
  `codigo_producto` int(11) NOT NULL COMMENT 'clave foranea tabla producto',
  `codigo_visita` int(11) NOT NULL COMMENT 'clave foranea tabla visita',
  `cantidad` decimal(10,0) NOT NULL COMMENT 'cantidad a ser suminastrada',
  `dosis` decimal(10,0) NOT NULL COMMENT 'dosis que debe suministrase',
  `recomendaciones` text NOT NULL COMMENT 'texto con las recomendaciones para la administracion del producto',
  `aplicacion` binary(1) NOT NULL COMMENT 'se administro?: 1: Si, 0:No',
  `observaciones` text NOT NULL COMMENT 'observaciones adicionales',
  `archivo` varchar(50) DEFAULT NULL COMMENT 'ruta del archivo de voz realizado para emitir las recomendaciones',
  PRIMARY KEY (`codigo_producto`,`codigo_visita`),
  KEY `producto_recomendaciones_fk1` (`codigo_visita`),
  CONSTRAINT `producto_recomendaciones_fk0` FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo`),
  CONSTRAINT `producto_recomendaciones_fk1` FOREIGN KEY (`codigo_visita`) REFERENCES `visitas` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla asociativa que almacena la información acerca de los productos recomendados y en que visita se recomendaron. Cuando son suministros para comenzar a sembrar el codigo de la visita será el 1';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_recomendaciones`
--

LOCK TABLES `producto_recomendaciones` WRITE;
/*!40000 ALTER TABLE `producto_recomendaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto_recomendaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `nombre` varchar(50) NOT NULL COMMENT 'nombre descripcion del producto',
  `codigo_unidad` int(11) NOT NULL COMMENT 'clave fornaea con la tabla unidad para conocer la unidad en la que se expresa el producto',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='tabla maestra que almacena la información de los productos que pueden suministrarse y/o recomendarse';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (2,'maiz',2);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recorridos`
--

DROP TABLE IF EXISTS `recorridos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recorridos` (
  `punto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'consecutivo de puntos almacenados',
  `latitud` decimal(10,0) NOT NULL COMMENT 'ubicacion',
  `longitud` decimal(10,0) NOT NULL COMMENT 'ubicacion',
  `codigo_visita` int(11) NOT NULL COMMENT 'clave foranea para identificar en que visita se guardo el punto estudiado',
  PRIMARY KEY (`punto`,`codigo_visita`),
  KEY `recorridos_fk0` (`codigo_visita`),
  CONSTRAINT `recorridos_fk0` FOREIGN KEY (`codigo_visita`) REFERENCES `visitas` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='almacena el recorrido realizado por el usuario al realizarse la visita';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recorridos`
--

LOCK TABLES `recorridos` WRITE;
/*!40000 ALTER TABLE `recorridos` DISABLE KEYS */;
/*!40000 ALTER TABLE `recorridos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siembras`
--

DROP TABLE IF EXISTS `siembras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siembras` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `fecha_siembra` datetime NOT NULL COMMENT 'fecha en la que se efectuo la siembra',
  `fecha_siembra_estimada` datetime NOT NULL COMMENT 'fecha en la que se estimo se debia sembrar',
  `fecha_estimada_corta` datetime NOT NULL COMMENT 'fecha en la que se estima que se haga el corte',
  `fecha_real_corta` datetime NOT NULL COMMENT 'fecha en la que se realizo el corte',
  `codigo_lote` int(11) NOT NULL COMMENT 'clave foranea tabla lote indica el lote en el que se esta desarrollando la siembra',
  `dias_germinado` int(11) NOT NULL COMMENT 'numero de dias para la germinacion',
  `hectareas` decimal(10,0) NOT NULL COMMENT 'numero de hectareas',
  `punto_referencia` varchar(50) NOT NULL COMMENT 'punto de referencia de la siembra',
  `sistema_preparacion` varchar(50) NOT NULL COMMENT 'sistema de preparacion utilizado',
  `codigo_tipo_semilla` int(11) NOT NULL COMMENT 'clave foranea tabla tipo_semilla',
  `codigo_variedad` int(11) NOT NULL COMMENT 'clave foranea tabla variedad',
  `codigo_tipo_siembra` int(11) NOT NULL COMMENT 'clave foranea tabla tipo de siembra',
  `arroz_rojo` enum('alto','medio','bajo') DEFAULT NULL COMMENT 'para el informe de finalizacion. alto, medio bajo',
  `semilla_objetable` binary(1) DEFAULT NULL COMMENT '1: Si 0:No',
  `rendimiento_ha` decimal(10,0) DEFAULT NULL COMMENT 'rendimiento en hectareas sembradas',
  `observaciones` text COMMENT 'observaciones adicionales',
  PRIMARY KEY (`codigo`),
  KEY `siembras_fk0` (`codigo_lote`),
  KEY `siembras_fk1` (`codigo_tipo_semilla`),
  KEY `siembras_fk2` (`codigo_variedad`),
  KEY `siembras_fk3` (`codigo_tipo_siembra`),
  CONSTRAINT `siembras_fk0` FOREIGN KEY (`codigo_lote`) REFERENCES `lotes` (`codigo`),
  CONSTRAINT `siembras_fk1` FOREIGN KEY (`codigo_tipo_semilla`) REFERENCES `tipo_semilla` (`codigo`),
  CONSTRAINT `siembras_fk2` FOREIGN KEY (`codigo_variedad`) REFERENCES `variedad` (`codigo`),
  CONSTRAINT `siembras_fk3` FOREIGN KEY (`codigo_tipo_siembra`) REFERENCES `tipo_siembra` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='informacion sobre la siembra desarrollada';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siembras`
--

LOCK TABLES `siembras` WRITE;
/*!40000 ALTER TABLE `siembras` DISABLE KEYS */;
INSERT INTO `siembras` VALUES (1,'1977-04-16 00:00:00','1994-07-18 00:00:00','2003-10-17 00:00:00','1993-03-01 00:00:00',1,15,1407,'Haag Lock','velit',2,1,1,'medio','0',354,'Officiis assumenda ut sit fugit aut iusto corrupti cum.'),(2,'2001-07-27 00:00:00','1970-10-08 00:00:00','1988-03-16 00:00:00','1995-12-08 00:00:00',1,15,1782,'Garnet Spur','aliquid',2,1,1,'bajo','1',940,'Minima laborum quis labore reiciendis id.');
/*!40000 ALTER TABLE `siembras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_riegos`
--

DROP TABLE IF EXISTS `tipo_riegos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_riegos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `descripcion` varchar(50) NOT NULL COMMENT 'nombre del tipo de riego',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='tabla maestra para indicar tipos de riegos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_riegos`
--

LOCK TABLES `tipo_riegos` WRITE;
/*!40000 ALTER TABLE `tipo_riegos` DISABLE KEYS */;
INSERT INTO `tipo_riegos` VALUES (1,'uno');
/*!40000 ALTER TABLE `tipo_riegos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_semilla`
--

DROP TABLE IF EXISTS `tipo_semilla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_semilla` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `descripcion` varchar(50) NOT NULL COMMENT 'nombre del tipo de semilla ',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='tabla maestra para indicar el tipo de semilla sembrada';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_semilla`
--

LOCK TABLES `tipo_semilla` WRITE;
/*!40000 ALTER TABLE `tipo_semilla` DISABLE KEYS */;
INSERT INTO `tipo_semilla` VALUES (2,'Agronomo');
/*!40000 ALTER TABLE `tipo_semilla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_siembra`
--

DROP TABLE IF EXISTS `tipo_siembra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_siembra` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `descripcion` varchar(50) NOT NULL COMMENT 'nombre del tipo de semilla',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='tabla maestra que indica el tipo de semilla';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_siembra`
--

LOCK TABLES `tipo_siembra` WRITE;
/*!40000 ALTER TABLE `tipo_siembra` DISABLE KEYS */;
INSERT INTO `tipo_siembra` VALUES (1,'prueba');
/*!40000 ALTER TABLE `tipo_siembra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuarios`
--

DROP TABLE IF EXISTS `tipo_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuarios` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `descripcion` varchar(50) NOT NULL COMMENT 'nombre del tipo de usuario',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='tabla maestra para indicar tipo de usuarios: agricultor, agronomo...';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuarios`
--

LOCK TABLES `tipo_usuarios` WRITE;
/*!40000 ALTER TABLE `tipo_usuarios` DISABLE KEYS */;
INSERT INTO `tipo_usuarios` VALUES (1,'Admin'),(2,'Agricultor'),(3,'Agronomo');
/*!40000 ALTER TABLE `tipo_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidades`
--

DROP TABLE IF EXISTS `unidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidades` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `descripcion` varchar(50) NOT NULL COMMENT 'nombre de la unidad',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='tabla maestra para guardar informacion de las unidades en las que pueden presentarse los productos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidades`
--

LOCK TABLES `unidades` WRITE;
/*!40000 ALTER TABLE `unidades` DISABLE KEYS */;
INSERT INTO `unidades` VALUES (1,'litros'),(2,'gramos');
/*!40000 ALTER TABLE `unidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `cedula` varchar(50) NOT NULL COMMENT 'identificador de la tabla',
  `nombre_usuario` varchar(50) NOT NULL COMMENT 'nombre',
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `password` blob NOT NULL COMMENT 'credencial de acceso',
  `correo_electronico` varchar(50) NOT NULL COMMENT 'correo electronico',
  `telefono` varchar(50) NOT NULL COMMENT 'telefono',
  `fecha_inscripcion` datetime DEFAULT NULL COMMENT 'fecha de inscripcion del agricultor',
  `codigo_tipo_usuario` int(11) NOT NULL COMMENT 'clave foranea que indica que tipo de usuario es agricultor, agronomo ...',
  `reset_password_token` blob,
  `timestamp` timestamp NULL DEFAULT NULL,
  `confirmacion` int(11) DEFAULT '0',
  `confirmation_token` longtext,
  PRIMARY KEY (`cedula`),
  KEY `usuarios_fk0` (`codigo_tipo_usuario`),
  CONSTRAINT `usuarios_fk0` FOREIGN KEY (`codigo_tipo_usuario`) REFERENCES `tipo_usuarios` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='almacena la informacion de los usuarios de la aplicacion';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('20230837','Josiah','Eliezer','Kling','$2y$10$yQ0bNtvvBd0fTjX4PGVxqOXXYxqISnRhU.DBBMzcQ9u6Xc2YhQrMm','sydnie.mclaughlin@example.com','(237) 242-5301','2016-06-19 04:59:01',1,NULL,NULL,1,'ef8227f2-856e-3589-98fa-62c9d77d1c5e'),('21417201','eddivalen','Eddy','Valencia','$2y$10$ATY5QcOdCPdTsd3EOna7GuhPhKd1vXW31fPQudFcUS8HSI5lsDupO','eddyvalencia8@gmail.com','0276-3411601','2017-02-17 00:00:00',1,NULL,NULL,1,NULL),('4307720','Alexys','Cooper','Cassin','$2y$10$5FwWHA5KRQX8zi0BksO5veydrFN9fYKt1l/TsT0ACp7y50Kgm0Sha','pfannerstill.nyah@example.org','1-573-647-3365 x93788','2017-02-20 00:00:00',3,NULL,NULL,1,'4421e38f-6129-3d55-aa0e-3f0c371e44d8');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variedad`
--

DROP TABLE IF EXISTS `variedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `variedad` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `descripcion` varchar(50) NOT NULL COMMENT 'nombre de la variedad',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='tabla maestra que almacena informacion acerca de la variedad sembrada';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `variedad`
--

LOCK TABLES `variedad` WRITE;
/*!40000 ALTER TABLE `variedad` DISABLE KEYS */;
INSERT INTO `variedad` VALUES (1,'prueba');
/*!40000 ALTER TABLE `variedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitas`
--

DROP TABLE IF EXISTS `visitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitas` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo de la visita',
  `codigo_siembra` int(11) NOT NULL COMMENT 'clave foranea con codigo de la siembra que se visita',
  `fecha` datetime NOT NULL COMMENT 'fecha en la que se realiza la visita',
  `presencia_agricultor` binary(1) DEFAULT NULL COMMENT 'hubo presencia del agricultor en la visita 1:Si 0:No',
  `registro_ausencia` text COMMENT 'justificacion de la ausencia del agricultor',
  `validado` binary(1) DEFAULT NULL COMMENT 'indica si el agricultor ya valido el informe de la visita 1:Si 0:No',
  `valoracion` int(11) DEFAULT NULL COMMENT 'valoracion otorgada por agricultor al agronomo durante la visita 1 - 5',
  `opinion` text COMMENT 'opinion emitida por agricultor a la visita',
  `agronomo` varchar(50) DEFAULT NULL COMMENT 'clave foranea con tabla usuarios para identificar que agronomo realizo la visita',
  `archivo` varchar(50) DEFAULT NULL COMMENT 'ruta del archivo de voz utilizado para registrar la ausencia del agricultor',
  PRIMARY KEY (`codigo`,`codigo_siembra`),
  KEY `visitas_fk0` (`codigo_siembra`),
  KEY `visitas_fk1` (`agronomo`),
  CONSTRAINT `visitas_fk0` FOREIGN KEY (`codigo_siembra`) REFERENCES `siembras` (`codigo`),
  CONSTRAINT `visitas_fk1` FOREIGN KEY (`agronomo`) REFERENCES `usuarios` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1 COMMENT='tabla que almacena las visitas realizadas a una siembra';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitas`
--

LOCK TABLES `visitas` WRITE;
/*!40000 ALTER TABLE `visitas` DISABLE KEYS */;
INSERT INTO `visitas` VALUES (1,1,'1990-04-10 00:00:00','1','Rerum et et rem fuga.','1',1,'Eum et inventore tempora repudiandae nobis ipsa unde.','21417201','http://lorempixel.com/640/480/?84561'),(37,1,'2017-03-14 00:00:00','1','Iure quis reiciendis blanditiis facilis consectetur quasi aspernatur.','0',2,'Rerum ea et fugit ut.','21417201','http://lorempixel.com/640/480/?15734'),(38,1,'2017-03-16 00:00:00','1','Necessitatibus veniam aliquid autem aliquam.','1',4,'Magnam distinctio et corporis dolor.','21417201','http://lorempixel.com/640/480/?55403'),(39,1,'2017-03-18 00:00:00','0','Et dolor nihil ut et.','0',1,'Quos ducimus id mollitia eius omnis similique modi.','21417201','http://lorempixel.com/640/480/?56147'),(40,1,'2017-03-17 00:00:00','1','Magnam dolorem voluptatem deserunt sit praesentium.','1',3,'Enim in animi et et officiis molestiae.','21417201','http://lorempixel.com/640/480/?17551'),(41,1,'2017-03-17 00:00:00','1','Et ducimus at sit consequatur cumque.','1',3,'Recusandae placeat dolores numquam corrupti aut.','21417201','http://lorempixel.com/640/480/?27341'),(42,1,'2017-03-20 00:00:00','0','Numquam quaerat neque quos voluptatem nemo et.','1',3,'Ipsum ut velit numquam.','21417201','http://lorempixel.com/640/480/?42104'),(43,2,'2017-03-18 00:00:00',NULL,NULL,NULL,NULL,NULL,'21417201',NULL);
/*!40000 ALTER TABLE `visitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zonas`
--

DROP TABLE IF EXISTS `zonas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zonas` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `descripcion` varchar(50) NOT NULL COMMENT 'nombre de la zona',
  `codigo_ciudad` int(11) NOT NULL COMMENT 'clave foranea con la tabla ciudad ',
  PRIMARY KEY (`codigo`),
  KEY `zonas_fk0` (`codigo_ciudad`),
  CONSTRAINT `zonas_fk0` FOREIGN KEY (`codigo_ciudad`) REFERENCES `ciudades` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='tabla para almacenar las zonas ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zonas`
--

LOCK TABLES `zonas` WRITE;
/*!40000 ALTER TABLE `zonas` DISABLE KEYS */;
INSERT INTO `zonas` VALUES (1,'Norte de Santander',1);
/*!40000 ALTER TABLE `zonas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-23 22:12:34
