SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `stmargaretmarycatholicchurch` DEFAULT CHARACTER SET utf8 ;
USE `stmargaretmarycatholicchurch` ;

-- -----------------------------------------------------
-- Table `stmargaretmarycatholicchurch`.`householdtype`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stmargaretmarycatholicchurch`.`householdtype` (
  `idhouseholdtype` INT(11) NOT NULL,
  `householdtypename` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idhouseholdtype`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `stmargaretmarycatholicchurch`.`language`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stmargaretmarycatholicchurch`.`language` (
  `idlanguage` INT(11) NOT NULL,
  `languagename` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idlanguage`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `stmargaretmarycatholicchurch`.`phonetype`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stmargaretmarycatholicchurch`.`phonetype` (
  `idphonetype` INT(11) NOT NULL,
  `phonetypename` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idphonetype`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `stmargaretmarycatholicchurch`.`household`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stmargaretmarycatholicchurch`.`household` (
  `idhousehold` INT(11) NOT NULL AUTO_INCREMENT,
  `residenceverification` BIT(1) NULL DEFAULT NULL,
  `residenceverificationnote` VARCHAR(75) NULL DEFAULT NULL,
  `idhouseholdtype` INT(11) NULL DEFAULT NULL,
  `address1` VARCHAR(45) NOT NULL,
  `address2` VARCHAR(45) NULL DEFAULT NULL,
  `city` VARCHAR(45) NOT NULL,
  `state` VARCHAR(45) NOT NULL,
  `zipcode` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `idphonetypeprimary` INT(11) NOT NULL,
  `phonetypeotherprimary` VARCHAR(45) NULL DEFAULT NULL,
  `phonenumberprimary` VARCHAR(15) NOT NULL,
  `idphonetypesecondary` INT(11) NULL DEFAULT NULL,
  `phonetypeothersecondary` VARCHAR(45) NULL DEFAULT NULL,
  `phonenumbersecondary` VARCHAR(15) NULL DEFAULT NULL,
  `numberoffamilymembers` INT(11) NOT NULL,
  `idlanguage` INT(11) NOT NULL,
  `languageother` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idhousehold`),
  INDEX `household_householdtype_idx` (`idhouseholdtype` ASC),
  INDEX `household_phonetype_primary_idx` (`idphonetypeprimary` ASC),
  INDEX `household_phonetype_secondary_idx` (`idphonetypesecondary` ASC),
  INDEX `household_language_idx` (`idlanguage` ASC),
  CONSTRAINT `household_householdtype`
    FOREIGN KEY (`idhouseholdtype`)
    REFERENCES `stmargaretmarycatholicchurch`.`householdtype` (`idhouseholdtype`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `household_language`
    FOREIGN KEY (`idlanguage`)
    REFERENCES `stmargaretmarycatholicchurch`.`language` (`idlanguage`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `household_phonetype_primary`
    FOREIGN KEY (`idphonetypeprimary`)
    REFERENCES `stmargaretmarycatholicchurch`.`phonetype` (`idphonetype`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `household_phonetype_secondary`
    FOREIGN KEY (`idphonetypesecondary`)
    REFERENCES `stmargaretmarycatholicchurch`.`phonetype` (`idphonetype`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `stmargaretmarycatholicchurch`.`family`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stmargaretmarycatholicchurch`.`family` (
  `idfamily` INT(11) NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `idhousehold` INT(11) NOT NULL,
  `headofhousehold` BIT(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`idfamily`),
  INDEX `family_household_idx` (`idhousehold` ASC),
  CONSTRAINT `family_household`
    FOREIGN KEY (`idhousehold`)
    REFERENCES `stmargaretmarycatholicchurch`.`household` (`idhousehold`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = '		';


-- -----------------------------------------------------
-- Table `stmargaretmarycatholicchurch`.`gender`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stmargaretmarycatholicchurch`.`gender` (
  `idgender` INT(11) NOT NULL,
  `gendername` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idgender`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `stmargaretmarycatholicchurch`.`child`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stmargaretmarycatholicchurch`.`child` (
  `idchild` INT(11) NOT NULL AUTO_INCREMENT,
  `idfamily` INT(11) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `childidentification` BIT(1) NOT NULL,
  `childidentificationnote` VARCHAR(75) NULL DEFAULT NULL,
  `idgender` INT(11) NOT NULL,
  `dateofbirth` DATE NOT NULL,
  PRIMARY KEY (`idchild`),
  INDEX `child_gender_idx` (`idgender` ASC),
  INDEX `child_family_idx` (`idfamily` ASC),
  CONSTRAINT `child_family`
    FOREIGN KEY (`idfamily`)
    REFERENCES `stmargaretmarycatholicchurch`.`family` (`idfamily`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `child_gender`
    FOREIGN KEY (`idgender`)
    REFERENCES `stmargaretmarycatholicchurch`.`gender` (`idgender`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `stmargaretmarycatholicchurch`.`clothingtype`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stmargaretmarycatholicchurch`.`clothingtype` (
  `idclothingtype` INT(11) NOT NULL,
  `clothingtypename` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idclothingtype`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `stmargaretmarycatholicchurch`.`clothingitem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stmargaretmarycatholicchurch`.`clothingitem` (
  `idclothingitem` INT(11) NOT NULL,
  `clothingitemcode` VARCHAR(3) NOT NULL,
  `clothingitemname` VARCHAR(45) NOT NULL,
  `idgender` INT(11) NOT NULL,
  `idclothingtype` INT(11) NOT NULL,
  PRIMARY KEY (`idclothingitem`),
  INDEX `clothingitems_gender_idx` (`idgender` ASC),
  INDEX `clothingitems_clothingtype_idx` (`idclothingtype` ASC),
  CONSTRAINT `clothingitem_clothingtype`
    FOREIGN KEY (`idclothingtype`)
    REFERENCES `stmargaretmarycatholicchurch`.`clothingtype` (`idclothingtype`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `clothingitem_gender`
    FOREIGN KEY (`idgender`)
    REFERENCES `stmargaretmarycatholicchurch`.`gender` (`idgender`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `stmargaretmarycatholicchurch`.`childclothingform`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stmargaretmarycatholicchurch`.`childclothingform` (
  `idchildclothingform` INT(11) NOT NULL AUTO_INCREMENT,
  `idregistration` INT(11) NOT NULL,
  `idchild` INT(11) NOT NULL,
  `idclothingitem_infantoutfit` INT(11) NULL DEFAULT NULL,
  `idclothingitem_jeans` INT(11) NULL DEFAULT NULL,
  `idclothingitem_shirt` INT(11) NULL DEFAULT NULL,
  `idclothingitem_socks` INT(11) NULL DEFAULT NULL,
  `idclothingitem_underwear` INT(11) NULL DEFAULT NULL,
  `idclothingitem_diapersorpullups` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idchildclothingform`),
  INDEX `childclothingform_clothingitem_infantoutfit_idx` (`idclothingitem_infantoutfit` ASC),
  INDEX `childclothingform_clothingitem_jeans_idx` (`idclothingitem_jeans` ASC),
  INDEX `childclothingform_clothingitem_shirt_idx` (`idclothingitem_shirt` ASC),
  INDEX `childclothingform_clothingitem_socks_idx` (`idclothingitem_socks` ASC),
  INDEX `childclothingform_clothingitem_underwear_idx` (`idclothingitem_underwear` ASC),
  INDEX `childclothingform_clothingitem_diapersorpullups` (`idclothingitem_diapersorpullups` ASC),
  CONSTRAINT `childclothingform_clothingitem_diapersorpullups`
    FOREIGN KEY (`idclothingitem_diapersorpullups`)
    REFERENCES `stmargaretmarycatholicchurch`.`clothingitem` (`idclothingitem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `childclothingform_clothingitem_infantoutfit`
    FOREIGN KEY (`idclothingitem_infantoutfit`)
    REFERENCES `stmargaretmarycatholicchurch`.`clothingitem` (`idclothingitem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `childclothingform_clothingitem_jeans`
    FOREIGN KEY (`idclothingitem_jeans`)
    REFERENCES `stmargaretmarycatholicchurch`.`clothingitem` (`idclothingitem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `childclothingform_clothingitem_shirt`
    FOREIGN KEY (`idclothingitem_shirt`)
    REFERENCES `stmargaretmarycatholicchurch`.`clothingitem` (`idclothingitem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `childclothingform_clothingitem_socks`
    FOREIGN KEY (`idclothingitem_socks`)
    REFERENCES `stmargaretmarycatholicchurch`.`clothingitem` (`idclothingitem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `childclothingform_clothingitem_underwear`
    FOREIGN KEY (`idclothingitem_underwear`)
    REFERENCES `stmargaretmarycatholicchurch`.`clothingitem` (`idclothingitem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = '	';


-- -----------------------------------------------------
-- Table `stmargaretmarycatholicchurch`.`learnaboutstore`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stmargaretmarycatholicchurch`.`learnaboutstore` (
  `idlearnaboutstore` INT(11) NOT NULL,
  `learnaboutstorename` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idlearnaboutstore`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `stmargaretmarycatholicchurch`.`yearofoperation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stmargaretmarycatholicchurch`.`yearofoperation` (
  `idyearofoperation` INT(11) NOT NULL,
  PRIMARY KEY (`idyearofoperation`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `stmargaretmarycatholicchurch`.`registration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stmargaretmarycatholicchurch`.`registration` (
  `idregistration` INT(11) NOT NULL AUTO_INCREMENT,
  `idyearofoperation` INT(11) NOT NULL,
  `idhousehold` INT(11) NOT NULL,
  `earlyshopper` BIT(1) NOT NULL,
  `delivery` BIT(1) NOT NULL DEFAULT b'0',
  `christmasclothingandtoys` BIT(1) NOT NULL DEFAULT b'0',
  `idlearnaboutstore` INT(11) NOT NULL,
  `learnaboutstoreother` VARCHAR(45) NULL DEFAULT NULL,
  `cancontact` BIT(1) NOT NULL,
  `notes` VARCHAR(500) NULL DEFAULT NULL,
  `completedby` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`idregistration`),
  UNIQUE INDEX `registration_yearofoperation_household_unique` (`idyearofoperation` ASC, `idhousehold` ASC),
  INDEX `registration_household_idx` (`idhousehold` ASC),
  INDEX `registration_learnaboutstore_idx` (`idlearnaboutstore` ASC),
  INDEX `registration_yearofoperation_idx` (`idyearofoperation` ASC),
  CONSTRAINT `registartion_yearofoperation`
    FOREIGN KEY (`idyearofoperation`)
    REFERENCES `stmargaretmarycatholicchurch`.`yearofoperation` (`idyearofoperation`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `registration_household`
    FOREIGN KEY (`idhousehold`)
    REFERENCES `stmargaretmarycatholicchurch`.`household` (`idhousehold`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `registration_learnaboutstore`
    FOREIGN KEY (`idlearnaboutstore`)
    REFERENCES `stmargaretmarycatholicchurch`.`learnaboutstore` (`idlearnaboutstore`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
