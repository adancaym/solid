create database examen;
use examen;
CREATE TABLE `examen`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
PRIMARY KEY (`iduser`));

CREATE TABLE `examen`.`account_type` (
  `idaccount_type` INT NOT NULL AUTO_INCREMENT,
  `account_type` VARCHAR(45) NULL,
  PRIMARY KEY (`idaccount_type`));

CREATE TABLE `examen`.`account` (
  `idaccount` INT NOT NULL AUTO_INCREMENT,
  `iduser` INT NULL,
  `idaccount_type` INT NULL,
  `account` VARCHAR(10) NULL,
  PRIMARY KEY (`idaccount`),
  INDEX `fk_account_user_idx` (`iduser` ) ,
  INDEX `fk_account_account_type_idx` (`idaccount_type` ) ,
  CONSTRAINT `fk_account_user`
    FOREIGN KEY (`iduser`)
    REFERENCES `examen`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_account_account_type`
    FOREIGN KEY (`idaccount_type`)
    REFERENCES `examen`.`account_type` (`idaccount_type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);