SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `sensorhouse` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci ;
USE `sensorhouse` ;

-- -----------------------------------------------------
-- Table `sensorhouse`.`cliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sensorhouse`.`cliente` (
  `idcliente` MEDIUMINT NOT NULL AUTO_INCREMENT COMMENT 'id del client que factura' ,
  `rfc` VARCHAR(13) NOT NULL COMMENT 'rfc de facturacion' ,
  `razon` VARCHAR(45) NOT NULL COMMENT 'razón social' ,
  `inscripcion` DATETIME NOT NULL COMMENT 'fecha de alta' ,
  PRIMARY KEY (`idcliente`) ,
  UNIQUE INDEX `rfc_UNIQUE` (`rfc` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sensorhouse`.`material`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sensorhouse`.`material` (
  `idmaterial` TINYINT NOT NULL AUTO_INCREMENT COMMENT 'id del producto' ,
  `modelo` VARCHAR(45) NOT NULL COMMENT 'nombre o modelo del producto' ,
  `descripcion` VARCHAR(255) NOT NULL COMMENT 'Descripcion de producto' ,
  `foto` VARCHAR(45) NULL ,
  PRIMARY KEY (`idmaterial`) ,
  UNIQUE INDEX `modelo_UNIQUE` (`modelo` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sensorhouse`.`pago`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sensorhouse`.`pago` (
  `idpago` TINYINT NOT NULL AUTO_INCREMENT COMMENT 'id del tipo de pago' ,
  `descripcion` VARCHAR(20) NOT NULL COMMENT 'Tipo de pago' ,
  PRIMARY KEY (`idpago`) ,
  UNIQUE INDEX `descripcion_UNIQUE` (`descripcion` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sensorhouse`.`plan`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sensorhouse`.`plan` (
  `idplan` TINYINT NOT NULL AUTO_INCREMENT COMMENT 'id del plan' ,
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre del plan' ,
  `precio` FLOAT NOT NULL COMMENT 'Precio del plan' ,
  `storage` DECIMAL(1,0) NOT NULL COMMENT 'Capacidad de almacenamiento' ,
  PRIMARY KEY (`idplan`) ,
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sensorhouse`.`cliente_contacto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sensorhouse`.`cliente_contacto` (
  `idcliente_contacto` MEDIUMINT NOT NULL AUTO_INCREMENT COMMENT 'id del contacto' ,
  `id_cliente` MEDIUMINT NOT NULL COMMENT 'id del cliente' ,
  `nombre` VARCHAR(45) NOT NULL ,
  `paterno` VARCHAR(45) NOT NULL ,
  `materno` VARCHAR(45) NOT NULL ,
  `descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idcliente_contacto`) ,
  INDEX `fk_cliente_contacto_cliente_idx` (`id_cliente` ASC) ,
  CONSTRAINT `fk_cliente_contacto_cliente`
    FOREIGN KEY (`id_cliente` )
    REFERENCES `sensorhouse`.`cliente` (`idcliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sensorhouse`.`cliente_plan`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sensorhouse`.`cliente_plan` (
  `idcliente_plan` MEDIUMINT NOT NULL AUTO_INCREMENT COMMENT 'Id del plan del  cliente' ,
  `id_cliente` MEDIUMINT NOT NULL COMMENT 'Id del cliente' ,
  `id_plan` TINYINT NOT NULL COMMENT 'Id del plan' ,
  `id_pago` TINYINT NOT NULL COMMENT 'Id del tipo de pago' ,
  PRIMARY KEY (`idcliente_plan`) ,
  INDEX `fk_cliente_plan_cliente1_idx` (`id_cliente` ASC) ,
  INDEX `fk_cliente_plan_pago1_idx` (`id_pago` ASC) ,
  INDEX `fk_cliente_plan_plan1_idx` (`id_plan` ASC) ,
  CONSTRAINT `fk_cliente_plan_cliente1`
    FOREIGN KEY (`id_cliente` )
    REFERENCES `sensorhouse`.`cliente` (`idcliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_plan_pago1`
    FOREIGN KEY (`id_pago` )
    REFERENCES `sensorhouse`.`pago` (`idpago` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_plan_plan1`
    FOREIGN KEY (`id_plan` )
    REFERENCES `sensorhouse`.`plan` (`idplan` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sensorhouse`.`cliente_instalacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sensorhouse`.`cliente_instalacion` (
  `idcliente_instalacion` MEDIUMINT NOT NULL AUTO_INCREMENT COMMENT 'Id de la instalacion' ,
  `id_cliente_plan` MEDIUMINT NOT NULL COMMENT 'Id del plan del cliente que se instalo' ,
  `fecha` DATETIME NOT NULL COMMENT 'Fecha de la instalacion' ,
  `direccion` VARCHAR(45) NOT NULL ,
  `ciudad` VARCHAR(45) NOT NULL ,
  `estado` VARCHAR(45) NOT NULL ,
  `pais` VARCHAR(45) NOT NULL DEFAULT 'Mexico' ,
  PRIMARY KEY (`idcliente_instalacion`) ,
  INDEX `fk_cliente_instalacion_cliente_plan1_idx` (`id_cliente_plan` ASC) ,
  UNIQUE INDEX `id_plan_UNIQUE` (`id_cliente_plan` ASC) ,
  CONSTRAINT `fk_cliente_instalacion_cliente_plan1`
    FOREIGN KEY (`id_cliente_plan` )
    REFERENCES `sensorhouse`.`cliente_plan` (`idcliente_plan` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sensorhouse`.`cliente_contacto_email`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sensorhouse`.`cliente_contacto_email` (
  `idcliente_email` MEDIUMINT NOT NULL AUTO_INCREMENT COMMENT 'Id del email' ,
  `id_cliente_contato` MEDIUMINT NOT NULL COMMENT 'Id del contacto' ,
  `email` VARCHAR(45) NOT NULL ,
  `descripcion` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idcliente_email`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  INDEX `fk_cliente_contacto_email_cliente_contacto1_idx` (`id_cliente_contato` ASC) ,
  CONSTRAINT `fk_cliente_contacto_email_cliente_contacto1`
    FOREIGN KEY (`id_cliente_contato` )
    REFERENCES `sensorhouse`.`cliente_contacto` (`idcliente_contacto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sensorhouse`.`cliente_contacto_telefono`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sensorhouse`.`cliente_contacto_telefono` (
  `idcliente_contacto_telefono` MEDIUMINT NOT NULL AUTO_INCREMENT COMMENT 'Id del telefono' ,
  `id_cliente_contacto` MEDIUMINT NOT NULL ,
  `numero` VARCHAR(25) NOT NULL ,
  `tipo` VARCHAR(25) NOT NULL ,
  PRIMARY KEY (`idcliente_contacto_telefono`) ,
  UNIQUE INDEX `numero_UNIQUE` (`numero` ASC) ,
  INDEX `fk_cliente_contacto_telefono_cliente_contacto1_idx` (`id_cliente_contacto` ASC) ,
  CONSTRAINT `fk_cliente_contacto_telefono_cliente_contacto1`
    FOREIGN KEY (`id_cliente_contacto` )
    REFERENCES `sensorhouse`.`cliente_contacto` (`idcliente_contacto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sensorhouse`.`plan_materiales`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sensorhouse`.`plan_materiales` (
  `idplan_material` MEDIUMINT NOT NULL AUTO_INCREMENT COMMENT 'Id de un producto en un plan' ,
  `id_plan` TINYINT NOT NULL COMMENT 'Id del plan' ,
  `id_material` TINYINT NOT NULL COMMENT 'ID el material' ,
  `cantidad` TINYINT NOT NULL COMMENT 'Cantdad de materiales en el plan' ,
  PRIMARY KEY (`idplan_material`) ,
  UNIQUE INDEX `id_material_UNIQUE` (`id_material` ASC) ,
  INDEX `fk_plan_material_plan1_idx` (`id_plan` ASC) ,
  CONSTRAINT `fk_plan_material_plan1`
    FOREIGN KEY (`id_plan` )
    REFERENCES `sensorhouse`.`plan` (`idplan` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plan_material_material1`
    FOREIGN KEY (`id_material` )
    REFERENCES `sensorhouse`.`material` (`idmaterial` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sensorhouse`.`cliente_videos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sensorhouse`.`cliente_videos` (
  `idcliente_videos` MEDIUMINT NOT NULL AUTO_INCREMENT COMMENT 'Id del video' ,
  `id_cliente` MEDIUMINT NOT NULL COMMENT 'Id del cliente' ,
  `fecha` DATETIME NOT NULL ,
  `descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idcliente_videos`) ,
  INDEX `fk_cliente_videos_cliente1_idx` (`id_cliente` ASC) ,
  CONSTRAINT `fk_cliente_videos_cliente1`
    FOREIGN KEY (`id_cliente` )
    REFERENCES `sensorhouse`.`cliente` (`idcliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sensorhouse`.`cliente_fotos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sensorhouse`.`cliente_fotos` (
  `idcliente_fotos` MEDIUMINT NOT NULL AUTO_INCREMENT COMMENT 'Id de la foto' ,
  `id_cliente` MEDIUMINT NOT NULL ,
  `fecha` DATETIME NOT NULL ,
  `descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idcliente_fotos`) ,
  INDEX `fk_cliente_fotos_cliente1_idx` (`id_cliente` ASC) ,
  CONSTRAINT `fk_cliente_fotos_cliente1`
    FOREIGN KEY (`id_cliente` )
    REFERENCES `sensorhouse`.`cliente` (`idcliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sensorhouse`.`acceso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sensorhouse`.`acceso` (
  `idcliente_usuario` MEDIUMINT NOT NULL AUTO_INCREMENT COMMENT 'Id del username' ,
  `id_cliente` MEDIUMINT NOT NULL COMMENT 'Id del cliente' ,
  `username` VARCHAR(45) NOT NULL COMMENT 'Un usuario por cliente' ,
  `password` VARCHAR(60) NOT NULL ,
  `admin` ENUM('no','si') NOT NULL DEFAULT 'no' COMMENT 'Es administrador' ,
  PRIMARY KEY (`idcliente_usuario`) ,
  UNIQUE INDEX `usuario_UNIQUE` (`username` ASC) ,
  UNIQUE INDEX `id_cliente_UNIQUE` (`id_cliente` ASC) ,
  CONSTRAINT `fk_cliente_usuario_cliente1`
    FOREIGN KEY (`id_cliente` )
    REFERENCES `sensorhouse`.`cliente` (`idcliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `sensorhouse` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

