SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `myshop` ;
CREATE SCHEMA IF NOT EXISTS `myshop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `myshop` ;

-- -----------------------------------------------------
-- Table `myshop`.`categorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `myshop`.`categorie` ;

CREATE  TABLE IF NOT EXISTS `myshop`.`categorie` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `denumire` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `myshop`.`produs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `myshop`.`produs` ;

CREATE  TABLE IF NOT EXISTS `myshop`.`produs` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `idCategorie` INT(10) UNSIGNED NOT NULL ,
  `denumire` VARCHAR(45) NULL ,
  `descriere` TEXT NULL ,
  `cantitate` INT(10) UNSIGNED NULL ,
  `pret` DECIMAL(10,2) NULL ,
  `um` VARCHAR(10) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_idCategorie` (`idCategorie` ASC) ,
  CONSTRAINT `fk_idCategorie`
    FOREIGN KEY (`idCategorie` )
    REFERENCES `myshop`.`categorie` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
