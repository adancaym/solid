-- MySQL dump 10.17  Distrib 10.3.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: examen
-- ------------------------------------------------------
-- Server version	10.3.14-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `idaccount` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) DEFAULT NULL,
  `idaccount_type` int(11) DEFAULT NULL,
  `account` varchar(10) DEFAULT NULL,
  `limit_money` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idaccount`),
  KEY `fk_account_user_idx` (`iduser`),
  KEY `fk_account_account_type_idx` (`idaccount_type`),
  CONSTRAINT `fk_account_ccount_type` FOREIGN KEY (`idaccount_type`) REFERENCES `account_type` (`idaccount_type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_account_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,1,1,'1234',900.00),(2,1,2,'1235',1000.00);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_type`
--

DROP TABLE IF EXISTS `account_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_type` (
  `idaccount_type` int(11) NOT NULL AUTO_INCREMENT,
  `account_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idaccount_type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_type`
--

LOCK TABLES `account_type` WRITE;
/*!40000 ALTER TABLE `account_type` DISABLE KEYS */;
INSERT INTO `account_type` VALUES (1,'debito'),(2,'credito');
/*!40000 ALTER TABLE `account_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movement`
--

DROP TABLE IF EXISTS `movement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movement` (
  `idmovement` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) DEFAULT NULL,
  `idaccount` int(11) DEFAULT NULL,
  `movement` decimal(12,2) DEFAULT NULL,
  `idmovement_type` int(11) DEFAULT NULL,
  `motivo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idmovement`),
  KEY `fk_movement_user_idx` (`iduser`),
  KEY `fk_movement_acount_idx` (`idaccount`),
  KEY `fk_movement_movement_type_idx` (`idmovement_type`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movement`
--

LOCK TABLES `movement` WRITE;
/*!40000 ALTER TABLE `movement` DISABLE KEYS */;
INSERT INTO `movement` VALUES (1,1,1,100.00,1,'Deposito cuenta debito'),(2,1,1,100.00,2,'Retiro cuenta debito'),(3,1,2,100.00,2,'Retiro cuenta credito'),(4,1,2,10.00,2,'Comision retiro cuenta credito'),(5,1,1,1000.00,1,'Deposito cuenta debito'),(6,1,1,100.00,2,'Retiro cuenta debito'),(7,1,2,100.00,2,'Retiro cuenta credito'),(8,1,2,10.00,2,'Comision retiro cuenta credito'),(9,1,2,100.00,2,'Retiro cuenta credito'),(10,1,2,10.00,2,'Comision retiro cuenta credito');
/*!40000 ALTER TABLE `movement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movement_type`
--

DROP TABLE IF EXISTS `movement_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movement_type` (
  `idmovement_type` int(11) NOT NULL AUTO_INCREMENT,
  `movement_type` varchar(45) DEFAULT NULL,
  `operator` char(1) DEFAULT NULL,
  PRIMARY KEY (`idmovement_type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movement_type`
--

LOCK TABLES `movement_type` WRITE;
/*!40000 ALTER TABLE `movement_type` DISABLE KEYS */;
INSERT INTO `movement_type` VALUES (1,'Deposito','+'),(2,'Retiro','-');
/*!40000 ALTER TABLE `movement_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `login` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'caym','1234',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'examen'
--
/*!50003 DROP FUNCTION IF EXISTS `sum_arit_by_idaccount` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `sum_arit_by_idaccount`(par_idaccount int(11)) RETURNS decimal(20,2)
BEGIN
 RETURN (
     select ifnull( sum(movement * concat(operator,1) ) , 0 ) From account 
		inner join movement on movement.idaccount = account.idaccount
		inner join movement_type on movement_type.idmovement_type = movement.idmovement_type
		where account.idaccount = par_idaccount
 );
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deposito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deposito`(in par_id_account int(11) ,in par_id_user int(11) , in par_movement decimal(10,2),out valid bool)
BEGIN
	insert into movement(iduser,idaccount,movement,idmovement_type,motivo) values (par_id_user,par_id_account,par_movement,1,'Deposito cuenta debito');
    
    if((select idaccount_type from account where idaccount = par_id_account and iduser = par_id_user) = 1)
    then
            update account set limit_money = (select sum_arit_by_idaccount(par_id_account)) where account.idaccount = par_id_account;
	end if;
    select true into valid;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `retiro` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retiro`(in par_id_account int(11) ,in par_id_user int(11) , in par_movement decimal(10,2), out valid bool)
BEGIN
	if ( (select limit_money from account where idaccount = par_id_account and iduser = par_id_user) >= par_movement ) THEN
        insert into movement(iduser,idaccount,movement,idmovement_type,motivo) values (par_id_user,par_id_account,par_movement,2,'Retiro cuenta debito');
        update account set limit_money = (select sum_arit_by_idaccount(par_id_account)) where account.idaccount = par_id_account;
        select true into valid;
	else
		select false into valid;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `retiro_credito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retiro_credito`(in par_id_account int(11) ,in par_id_user int(11) , in par_movement decimal(10,2),out valid bool)
BEGIN
		declare limite decimal(10,2) default 0;
		declare credito_usado decimal(20,2) default 0;
		declare monto_total_retiro decimal(10,2) default 0;
        
        select (limit_money)  into limite from account where account.iduser = par_id_user and account.idaccount = par_id_account;
        select (sum_arit_by_idaccount(par_id_account)) into credito_usado;
        select (par_movement + (par_movement*.10)) into monto_total_retiro;
        
	if( (monto_total_retiro + abs(credito_usado))  <= limite)	 then
		insert into movement(iduser,idaccount,movement,idmovement_type,motivo) values (par_id_user,par_id_account,par_movement,2,'Retiro cuenta credito');
		insert into movement(iduser,idaccount,movement,idmovement_type,motivo) values (par_id_user,par_id_account,(par_movement*.10),2,'Comision retiro cuenta credito'); 
		select true into valid;
    else 
		select false into valid;
	end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-15 22:19:56
