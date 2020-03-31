

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Employee` (
  `Employee_ID` INT NOT NULL,
  `Employee_UserName` VARCHAR(45) NULL,
  `Employee_Password` VARCHAR(45) NULL,
  `Employee_FName` VARCHAR(45) NULL,
  `Employee_LName` VARCHAR(45) NULL,
  `Employee_Type` VARCHAR(45) NULL,
  `Employee_Email` VARCHAR(45) NULL,
  PRIMARY KEY (`Employee_ID`),
  UNIQUE INDEX `Employee_ID_UNIQUE` (`Employee_ID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Consumer_Submission`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Consumer_Submission` (
  `Submission_ID` INT NOT NULL,
  `Consumer_Email` VARCHAR(45) NULL,
  `Date_Submitted` DATETIME NULL,
  `Listing_URL` VARCHAR(2000) NULL,
  PRIMARY KEY (`Submission_ID`),
  UNIQUE INDEX `Submission_ID_UNIQUE` (`Submission_ID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Listing`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Listing` (
  `Listing_ID` INT NOT NULL,
  `Listing_Posted_Date` DATETIME NULL,
  `Listing_URL` VARCHAR(2000) NULL,
  `Submission_ID` INT NULL,
  `Consumer_Submission` TINYINT NULL,
  PRIMARY KEY (`Listing_ID`),
  INDEX `Submission_ID_idx` (`Submission_ID` ASC),
  UNIQUE INDEX `Listing_ID_UNIQUE` (`Listing_ID` ASC),
  CONSTRAINT `Submission_ID`
    FOREIGN KEY (`Submission_ID`)
    REFERENCES `mydb`.`Consumer_Submission` (`Submission_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Products` (
  `Product_ID` INT NOT NULL,
  `Manufacturer` VARCHAR(100) NULL,
  `Product_Name` VARCHAR(45) NULL,
  `Product_Category` VARCHAR(45) NULL,
  PRIMARY KEY (`Product_ID`),
  UNIQUE INDEX `Product_ID_UNIQUE` (`Product_ID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Recalls`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Recalls` (
  `Recall_ID` INT NOT NULL,
  `Date_Recalled` DATETIME NULL,
  `Reason` VARCHAR(2000) NULL,
  `Product_ID` INT NULL,
  PRIMARY KEY (`Recall_ID`),
  UNIQUE INDEX `Recall_ID_UNIQUE` (`Recall_ID` ASC),
  INDEX `Product_ID_idx` (`Product_ID` ASC),
  CONSTRAINT `ProductID`
    FOREIGN KEY (`Product_ID`)
    REFERENCES `mydb`.`Products` (`Product_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Reviewed_Listing`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Reviewed_Listing` (
  `Review_ID` INT NOT NULL,
  `Review_Date` DATETIME NULL,
  `Listing_ID` INT NULL,
  `Recall_ID` INT NULL,
  `Employee_ID` INT NULL,
  PRIMARY KEY (`Review_ID`),
  UNIQUE INDEX `Submission_ID_UNIQUE` (`Review_ID` ASC),
  INDEX `Listing_ID_idx` (`Listing_ID` ASC),
  INDEX `Recall_ID_idx` (`Recall_ID` ASC),
  INDEX `Employee_ID_idx` (`Employee_ID` ASC),
  CONSTRAINT `Listing_ID`
    FOREIGN KEY (`Listing_ID`)
    REFERENCES `mydb`.`Listing` (`Listing_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Recall_ID`
    FOREIGN KEY (`Recall_ID`)
    REFERENCES `mydb`.`Recalls` (`Recall_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Employee_ID`
    FOREIGN KEY (`Employee_ID`)
    REFERENCES `mydb`.`Employee` (`Employee_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Sent_Email`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Sent_Email` (
  `Email_ID` INT NOT NULL,
  `Date_Sent` DATETIME NULL,
  `Review_ID` INT NULL,
  `Recall_ID` INT NULL,
  `Product_ID` INT NULL,
  `Merchant_Email` VARCHAR(45) NULL,
  `Email_Subject` VARCHAR(200) NULL,
  `Email_Body` VARCHAR(2000) NULL,
  PRIMARY KEY (`Email_ID`),
  INDEX `Review_ID_idx` (`Review_ID` ASC),
  UNIQUE INDEX `Email_ID_UNIQUE` (`Email_ID` ASC),
  CONSTRAINT `Review_ID`
    FOREIGN KEY (`Review_ID`)
    REFERENCES `mydb`.`Reviewed_Listing` (`Review_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Merchant_Response`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Merchant_Response` (
  `Response_ID` INT NOT NULL,
  `Response_Date` DATETIME NULL,
  `Response_From_Merchant` VARCHAR(2000) NULL,
  `Email_ID` INT NULL,
  PRIMARY KEY (`Response_ID`),
  INDEX `Email_ID_idx` (`Email_ID` ASC),
  UNIQUE INDEX `Response_ID_UNIQUE` (`Response_ID` ASC),
  CONSTRAINT `Email_ID`
    FOREIGN KEY (`Email_ID`)
    REFERENCES `mydb`.`Sent_Email` (`Email_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Listing_Resolution`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Listing_Resolution` (
  `Resolution_ID` INT NOT NULL,
  `Resolution_Details` VARCHAR(45) NULL,
  `Listing_Removed` VARCHAR(45) NULL,
  `Listing_ID` INT NULL,
  PRIMARY KEY (`Resolution_ID`),
  INDEX `Listing_ID_idx` (`Listing_ID` ASC),
  UNIQUE INDEX `Resolution_ID_UNIQUE` (`Resolution_ID` ASC),
  CONSTRAINT `OrigListing_ID`
    FOREIGN KEY (`Listing_ID`)
    REFERENCES `mydb`.`Listing` (`Listing_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = DEFAULT;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
