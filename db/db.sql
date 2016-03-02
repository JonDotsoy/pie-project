-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: pie
-- ------------------------------------------------------
-- Server version	5.7.9

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
-- Table structure for table `actividad`
--

use pie;

DROP TABLE IF EXISTS `actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividad` (
  `ACT_ID` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `ACT_DESCRIP` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `ACT_PROF_RUN` int(11) NOT NULL,
  `ACT_ALU_RUN` int(11) NOT NULL,
  `ACT_TAC_ID` varchar(1) COLLATE latin1_spanish_ci NOT NULL,
  `ACT_CAL_ID` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`ACT_ID`),
  UNIQUE KEY `ACT_ID_UNIQUE` (`ACT_ID`),
  KEY `ACT_PROF_idx` (`ACT_PROF_RUN`),
  KEY `ACT_ALU_idx` (`ACT_ALU_RUN`),
  KEY `ACT_TAC_idx` (`ACT_TAC_ID`),
  KEY `ACT_CAL_idx` (`ACT_CAL_ID`),
  CONSTRAINT `ACT_ALU` FOREIGN KEY (`ACT_ALU_RUN`) REFERENCES `alumno` (`ALU_RUN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ACT_CAL` FOREIGN KEY (`ACT_CAL_ID`) REFERENCES `calificacion` (`CAL_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ACT_PROF` FOREIGN KEY (`ACT_PROF_RUN`) REFERENCES `profesor` (`PROF_RUN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ACT_TAC` FOREIGN KEY (`ACT_TAC_ID`) REFERENCES `tipo_actividad` (`TAC_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad`
--

LOCK TABLES `actividad` WRITE;
/*!40000 ALTER TABLE `actividad` DISABLE KEYS */;
INSERT INTO `actividad` VALUES ('01','Actividad 01',13814960,24058636,'E','APRO'),('02','Actividad 02',12660871,24949650,'P','REPR'),('03','Actividad 03',14422405,24782863,'L','REEV'),('04','Actividad 04',11364240,24695095,'E','APRO'),('05','Actividad 05',12445411,23203468,'P','REPR'),('06','Actividad 06',11358316,23313061,'L','REEV'),('07','Actividad 07',13320158,25160161,'E','APRO'),('08','Actividad 08',11386633,25095770,'P','REPR'),('09','Actividad 09',13814960,25265949,'L','REEV'),('10','Actividad 10',12660871,24075853,'E','APRO'),('11','Actividad 11',14422405,23714594,'P','REPR'),('12','Actividad 12',11364240,23672098,'L','REEV'),('13','Actividad 13',12445411,25530722,'E','APRO'),('14','Actividad 14',11358316,24029506,'P','REPR'),('15','Actividad 15',13320158,24270019,'L','REEV'),('16','Actividad 16',11386633,24963120,'E','APRO'),('17','Actividad 17',13814960,25869175,'P','REPR'),('18','Actividad 18',12660871,25648006,'L','REEV'),('19','Actividad 19',14422405,22276722,'E','APRO'),('20','Actividad 20',11364240,25903065,'P','REPR'),('21','Actividad 21',12445411,22470261,'L','REEV'),('22','Actividad 22',11358316,23111317,'E','APRO'),('23','Actividad 23',13320158,23592353,'P','REPR'),('24','Actividad 24',11386633,24327948,'L','REEV'),('25','Actividad 25',13814960,25013163,'E','APRO'),('26','Actividad 26',12660871,23345102,'P','REPR'),('27','Actividad 27',14422405,25054575,'L','REEV'),('28','Actividad 28',11364240,24564215,'E','APRO'),('29','Actividad 29',12445411,25009143,'P','REPR'),('30','Actividad 30',11358316,25857771,'L','REEV'),('31','Actividad 31',13320158,24086496,'E','APRO'),('99','99',18083386,25013163,'E','APRO'),('9999','9999',18083386,25013163,'L','REPR');
/*!40000 ALTER TABLE `actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `ALU_RUN` int(11) NOT NULL,
  `ALU_NOMBRE` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `ALU_AP_PAT` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `ALU_AP_MAT` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `ALU_DIRECCION` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `ALU_GEN_ID` varchar(1) COLLATE latin1_spanish_ci NOT NULL,
  `ALU_CURSO_ID` varchar(4) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`ALU_RUN`),
  KEY `GEN_ALU_idx` (`ALU_GEN_ID`),
  KEY `CUR_ALU_idx` (`ALU_CURSO_ID`),
  CONSTRAINT `CUR_ALU` FOREIGN KEY (`ALU_CURSO_ID`) REFERENCES `curso` (`CUR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `GEN_ALU` FOREIGN KEY (`ALU_GEN_ID`) REFERENCES `genero` (`GEN_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES (22276722,'Harlan','Mccoy','Patel','8515 Proin Ave','F','5B'),(22470261,'Marny','Sosa','Mason','P.O. Box 968. 9822 Placerat Rd.','F','6A'),(23111317,'Louis','Dillard','Burgess','7769 Aliquet St.','F','6A'),(23203468,'Cameron','Marquez','Perkins','P.O. Box 208. 525 Dolor Av.','F','2A'),(23313061,'Amber','Barnett','Williamson','P.O. Box 656. 9372 Nullam Road','F','2A'),(23345102,'Kiona','Nieves','Saunders','8982 Luctus Av.','F','7A'),(23592353,'Raymond','Lewis','Dean','5502 Venenatis Ave','M','6B'),(23672098,'Joseph','Kent','West','P.O. Box 957. 8199 Imperdiet Rd.','M','3B'),(23714594,'Stuart','Bright','Hansen','6639 Dictum St.','M','3B'),(24029506,'Priscilla','Dillon','Massey','102 Laoreet. Road','F','4A'),(24058636,'Tatum','Hodges','Mcmillan','Ap #121-4464 Vulputate. St.','M','1A'),(24075853,'Karleigh','Gilliam','Mcclain','893-9940 Sit Road','M','3A'),(24086496,'Samson','Hoover','Williamson','Ap #337-4492 Hendrerit Road','M','8B'),(24270019,'Yasir','Rasmussen','Galloway','Ap #858-2454 Curabitur Av.','F','4B'),(24327948,'Neve','Lynn','Gallegos','Ap #665-2263 Montes. Rd.','F','6B'),(24564215,'Silas','Gilliam','Schneider','P.O. Box 343. 2347 Tellus St.','F','7B'),(24695095,'Christopher','Cantrell','Rivers','1266 Sed Street','M','1B'),(24782863,'Lilah','Obrien','Dominguez','Ap #510-1289 Ligula. Rd.','F','1B'),(24949650,'Tucker','Morin','Puckett','852 Dui. Avenue','M','1A'),(24963120,'Dieter','Horton','Craft','Ap #567-6164 Nunc Av.','F','4B'),(24988580,'Blythe','Harrell','Bailey','7313 Mauris. Avenue','M','8B'),(25009143,'Tatiana','Foreman','Whitfield','Ap #598-3388 Ornare. Ave','F','8A'),(25013163,'Alma','Fischer','Suarez','Ap #133-8120 Accumsan Ave','F','7A'),(25054575,'Alexander','Thompson','Jennings','297-451 Donec St.','M','7B'),(25095770,'Bert','Hutchinson','Velasquez','102-8889 Suspendisse St.','M','2B'),(25160161,'Jin','Chavez','Higgins','1123 Adipiscing Avenue','F','2B'),(25265949,'Cameron','Tanner','Hardin','Ap #206-6090 Metus. Road','F','3A'),(25530722,'Ryder','Carpenter','Clements','5953 Ut Ave','M','4A'),(25648006,'Ursula','Ingram','Battle','P.O. Box 866. 4909 Nam Av.','F','5A'),(25857771,'Celeste','Maxwell','Ramsey','393-6001 Sociis Ave','F','8A'),(25869175,'Cain','Grimes','Craft','187-7197 Sed St.','M','5A'),(25903065,'Stone','Navarro','Flynn','Ap #406-7711 Egestas Avenue','M','5B');
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calificacion`
--

DROP TABLE IF EXISTS `calificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calificacion` (
  `CAL_ID` varchar(4) COLLATE latin1_spanish_ci NOT NULL,
  `CAL_DESCRIP` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`CAL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificacion`
--

LOCK TABLES `calificacion` WRITE;
/*!40000 ALTER TABLE `calificacion` DISABLE KEYS */;
INSERT INTO `calificacion` VALUES ('APRO','Aprobado'),('REEV','Repetir Evaluacion'),('REPR','Reprobado');
/*!40000 ALTER TABLE `calificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `CUR_ID` varchar(4) COLLATE latin1_spanish_ci NOT NULL,
  `CUR_DESCRIP` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`CUR_ID`),
  UNIQUE KEY `CUR_ID_UNIQUE` (`CUR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES ('1A','Primero basico A'),('1B','Primero basico B'),('2A','Segundo basico A'),('2B','Segundo basico B'),('3A','Tercero basico A'),('3B','Tercero basico B'),('4A','Cuarto basico A'),('4B','Cuarto basico B'),('5A','Quinto basico A'),('5B','Quinto basico B'),('6A','Sexto basico A'),('6B','Sexto basico B'),('7A','Septimo basico A'),('7B','Septimo basico B'),('8A','Octavo basico A'),('8B','Octavo basico B');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `duracion`
--

DROP TABLE IF EXISTS `duracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `duracion` (
  `DUR_ID` varchar(1) COLLATE latin1_spanish_ci NOT NULL,
  `DUR_DESCRIP` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`DUR_ID`),
  UNIQUE KEY `DUR_ID` (`DUR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duracion`
--

LOCK TABLES `duracion` WRITE;
/*!40000 ALTER TABLE `duracion` DISABLE KEYS */;
INSERT INTO `duracion` VALUES ('2','12'),('P','Permanente'),('T','Transitorio');
/*!40000 ALTER TABLE `duracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genero` (
  `GEN_ID` varchar(1) COLLATE latin1_spanish_ci NOT NULL,
  `GEN_DESCRIP` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`GEN_ID`),
  UNIQUE KEY `GEN_ID_UNIQUE` (`GEN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES ('F','Femenino'),('M','Masculino');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nec_educativa`
--

DROP TABLE IF EXISTS `nec_educativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nec_educativa` (
  `NEDUC_ID` varchar(4) COLLATE latin1_spanish_ci NOT NULL,
  `NEDUC_DESCRIP` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `NEDUC_DUR_ID` varchar(1) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`NEDUC_ID`),
  KEY `NEDUC_DUR_idx` (`NEDUC_DUR_ID`),
  CONSTRAINT `NEDUC_DUR` FOREIGN KEY (`NEDUC_DUR_ID`) REFERENCES `duracion` (`DUR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nec_educativa`
--

LOCK TABLES `nec_educativa` WRITE;
/*!40000 ALTER TABLE `nec_educativa` DISABLE KEYS */;
INSERT INTO `nec_educativa` VALUES ('Ce','Ceguera','P'),('DdAp','Dificultades de Aprendizaje','T'),('DisI','Discapasidad Intelectual','P'),('FILi','Funcionamiento Intelectual Limitrofe','T'),('NPP','No Presenta Problemas','T'),('TdDA','Trastorno de Deficit Atencional','T'),('TdL','Trastorno del Lenguaje','T'),('TGdD','Trastorno Generalizado del Desarrollo','P'),('TrM','Trastorno Motor','P');
/*!40000 ALTER TABLE `nec_educativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `neduc_alumno`
--

DROP TABLE IF EXISTS `neduc_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `neduc_alumno` (
  `NAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAL_ALU_RUN` int(11) NOT NULL,
  `NAL_NEDUC_ID` varchar(4) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`NAL_ID`),
  KEY `ALU_NAL_idx` (`NAL_ALU_RUN`),
  KEY `NEDUC_NAL_idx` (`NAL_NEDUC_ID`),
  CONSTRAINT `ALU_NAL` FOREIGN KEY (`NAL_ALU_RUN`) REFERENCES `alumno` (`ALU_RUN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `NEDUC_NAL` FOREIGN KEY (`NAL_NEDUC_ID`) REFERENCES `nec_educativa` (`NEDUC_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `neduc_alumno`
--

LOCK TABLES `neduc_alumno` WRITE;
/*!40000 ALTER TABLE `neduc_alumno` DISABLE KEYS */;
INSERT INTO `neduc_alumno` VALUES (1,24058636,'DisI'),(2,24949650,'TGdD'),(3,24782863,'Ce'),(4,24695095,'TrM'),(5,23203468,'DdAp'),(6,23313061,'TdDA'),(7,25160161,'FILi'),(8,25095770,'TdL'),(9,25265949,'DisI'),(10,24075853,'TGdD'),(11,23714594,'Ce'),(12,23672098,'TrM'),(13,25530722,'DdAp'),(14,24029506,'TdDA'),(15,24270019,'FILi'),(16,24963120,'TdL'),(17,25869175,'DisI'),(18,25648006,'TGdD'),(19,22276722,'Ce'),(20,25903065,'TrM'),(21,22470261,'DdAp'),(22,23111317,'TdDA'),(23,23592353,'FILi'),(24,24327948,'TdL'),(25,25013163,'DisI'),(26,23345102,'TGdD'),(27,25054575,'Ce'),(28,24564215,'TrM'),(29,25009143,'DdAp'),(30,25857771,'TdDA'),(31,24086496,'FILi'),(32,24988580,'TdL');
/*!40000 ALTER TABLE `neduc_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesor` (
  `PROF_RUN` int(11) NOT NULL,
  `PROF_PASS` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `PROF_NOMBRE` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `PROF_AP_PAT` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `PROF_AP_MAT` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `PROF_TELEFONO` int(11) NOT NULL,
  `PROF_DIRECCION` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `PROF_EMAIL` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `PROF_GEN_ID` varchar(1) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`PROF_RUN`),
  UNIQUE KEY `PROF_RUN_UNIQUE` (`PROF_RUN`),
  KEY `PROF_GEN_idx` (`PROF_GEN_ID`),
  CONSTRAINT `PROF_GEN` FOREIGN KEY (`PROF_GEN_ID`) REFERENCES `genero` (`GEN_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
INSERT INTO `profesor` VALUES (19,'12','12','12','12',545,'QWE','QW','M'),(11358316,'LXP61LDO9FO','Whoopi','Sanders','Chavez',51075776,'482-8141 Leo. Rd.','nulla.ante.iaculis@Curae.edu','F'),(11364240,'HDQ38FKE4VR','Noah','Craft','Terry',65091598,'Ap #629-4588 Nulla St.','Aliquam@sitamet.net','F'),(11386633,'AUN22BSY9SK','Emi','Short','Foster',59063738,'882 Mi. Rd.','risus@tincidunt.ca','F'),(12445411,'GMZ34NBB8PI','Heather','Golden','Mendoza',53722763,'5160 In Rd.','mi.ac@orci.com','M'),(12660871,'WNR62ORE6XS','Igor','Payne','Barnett',50447396,'740-3054 Nunc Av.','et.risus.Quisque@rhoncus.org','M'),(13320158,'KLZ20RUC9SO','Daphne','Conrad','Mcguire',66611045,'163-7426 Eu Rd.','porttitor@enim.edu','F'),(13814960,'JHY21VPH3BP','Reagan','Rivers','Stuart',68738066,'P.O. Box 394. 7344 Vitae Rd.','dignissim@dui.org','M'),(14422405,'OTC17ZVK0OR','Molly','Henry','Cruz',76733602,'Ap #843-8054 Amet. Rd.','at@Suspendissesagittis.ca','F'),(18083386,'123456','Erick','Villalobos','Leiva',56826274,'calle falsa #123','erick.vl@pie.cl','M');
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_actividad`
--

DROP TABLE IF EXISTS `tipo_actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_actividad` (
  `TAC_ID` varchar(1) COLLATE latin1_spanish_ci NOT NULL,
  `TAC_DESCRIP` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`TAC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_actividad`
--

LOCK TABLES `tipo_actividad` WRITE;
/*!40000 ALTER TABLE `tipo_actividad` DISABLE KEYS */;
INSERT INTO `tipo_actividad` VALUES ('E','Ejercicio'),('L','Lectura'),('P','Practico');
/*!40000 ALTER TABLE `tipo_actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'pie'
--

--
-- Dumping routines for database 'pie'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-01  4:45:36
