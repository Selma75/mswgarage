-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mswgarage
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mswgarage
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mswgarage` DEFAULT CHARACTER SET utf8 ;
USE `mswgarage` ;

-- -----------------------------------------------------
-- Table `mswgarage`.`customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mswgarage`.`customer` (
  `EMAIL` VARCHAR(30) NOT NULL,
  `NAME` VARCHAR(45) NULL DEFAULT NULL,
  `SURNAME` VARCHAR(45) NULL DEFAULT NULL,
  `PHONE` INT(11) NULL DEFAULT NULL,
  `PASSWORD` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`EMAIL`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mswgarage`.`vehicle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mswgarage`.`vehicle` (
  `LICENSE` VARCHAR(15) NOT NULL,
  `TYPE` VARCHAR(45) NULL DEFAULT NULL,
  `ENGINE_TYPE` VARCHAR(45) NULL DEFAULT NULL,
  `MAKE` VARCHAR(45) NULL DEFAULT NULL,
  `CUSTOMER_EMAIL` VARCHAR(30) NULL DEFAULT NULL,
  PRIMARY KEY (`LICENSE`),
  INDEX `fk_Vehicle_Customer_idx` (`CUSTOMER_EMAIL` ASC),
  CONSTRAINT `fk_Vehicle_Customer`
    FOREIGN KEY (`CUSTOMER_EMAIL`)
    REFERENCES `mswgarage`.`customer` (`EMAIL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mswgarage`.`mechanic`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mswgarage`.`mechanic` (
  `MECHANIC_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `NAME` VARCHAR(45) NULL DEFAULT NULL,
  `SURNAME` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`MECHANIC_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mswgarage`.`booking`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mswgarage`.`booking` (
  `BOOKING_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `SERVICE_TYPE` VARCHAR(45) NULL DEFAULT NULL,
  `COMMENT` VARCHAR(150) NULL DEFAULT NULL,
  `DATE` DATE NULL DEFAULT NULL,
  `STATUS` VARCHAR(45) NULL DEFAULT NULL,
  `CUSTOMER_EMAIL` VARCHAR(30) NULL DEFAULT NULL,
  `VEHICLE_LICENSE` VARCHAR(15) NULL DEFAULT NULL,
  `MECHANIC_MECHANIC_ID` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`BOOKING_ID`),
  INDEX `fk_Booking_Customer1_idx` (`CUSTOMER_EMAIL` ASC) ,
  INDEX `fk_BOOKING_Vehicle1_idx` (`VEHICLE_LICENSE` ASC) ,
  INDEX `fk_BOOKING_MECHANIC1_idx` (`MECHANIC_MECHANIC_ID` ASC) ,
  CONSTRAINT `fk_Booking_Customer1`
    FOREIGN KEY (`CUSTOMER_EMAIL`)
    REFERENCES `mswgarage`.`customer` (`EMAIL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_BOOKING_Vehicle1`
    FOREIGN KEY (`VEHICLE_LICENSE`)
    REFERENCES `mswgarage`.`vehicle` (`LICENSE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_BOOKING_MECHANIC1`
    FOREIGN KEY (`MECHANIC_MECHANIC_ID`)
    REFERENCES `mswgarage`.`mechanic` (`MECHANIC_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mswgarage`.`invoice`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mswgarage`.`invoice` (
  `INVOICE_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `DATE` DATE NULL DEFAULT NULL,
  `TOTAL_PRICE` DOUBLE NULL DEFAULT NULL,
  `BOOKING_BOOKING_ID` INT(11) NOT NULL,
  `VEHICLE_LICENSE` VARCHAR(15) NOT NULL,
  `CUSTOMER_EMAIL` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`INVOICE_ID`),
  INDEX `fk_INVOICE_BOOKING1_idx` (`BOOKING_BOOKING_ID` ASC),
  INDEX `fk_INVOICE_VEHICLE1_idx` (`VEHICLE_LICENSE` ASC) ,
  INDEX `fk_INVOICE_CUSTOMER1_idx` (`CUSTOMER_EMAIL` ASC) ,
  CONSTRAINT `fk_INVOICE_BOOKING1`
    FOREIGN KEY (`BOOKING_BOOKING_ID`)
    REFERENCES `mswgarage`.`booking` (`BOOKING_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_INVOICE_VEHICLE1`
    FOREIGN KEY (`VEHICLE_LICENSE`)
    REFERENCES `mswgarage`.`vehicle` (`LICENSE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_INVOICE_CUSTOMER1`
    FOREIGN KEY (`CUSTOMER_EMAIL`)
    REFERENCES `mswgarage`.`customer` (`EMAIL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mswgarage`.`services`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mswgarage`.`services` (
  `SERVICE_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `SERVICE_NAME` VARCHAR(45) NULL DEFAULT NULL,
  `SERVICE_PRICE` DOUBLE NULL DEFAULT NULL,
  `INVOICE_INVOICE_ID` INT(11) NOT NULL,
  PRIMARY KEY (`SERVICE_ID`, `INVOICE_INVOICE_ID`),
  INDEX `fk_SERVICES_INVOICE1_idx` (`INVOICE_INVOICE_ID` ASC),
  CONSTRAINT `fk_SERVICES_INVOICE1`
    FOREIGN KEY (`INVOICE_INVOICE_ID`)
    REFERENCES `mswgarage`.`invoice` (`INVOICE_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mswgarage`.`user_admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mswgarage`.`user_admin` (
  `EMAIL` VARCHAR(45) NOT NULL,
  `NAME` VARCHAR(45) NULL DEFAULT NULL,
  `SURNAME` VARCHAR(45) NULL DEFAULT NULL,
  `PASSWORD` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`EMAIL`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
