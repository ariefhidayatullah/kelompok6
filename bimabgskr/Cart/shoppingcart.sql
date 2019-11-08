SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
 
CREATE SCHEMA IF NOT EXISTS `shoppingcart` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
 
USE `shoppingcart`;
 
CREATE  TABLE IF NOT EXISTS `shoppingcart`.`barang` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nama` VARCHAR(255) NULL DEFAULT NULL ,
  `deskripsi` TEXT NULL DEFAULT NULL ,
  `gambar` VARCHAR(60) NULL DEFAULT NULL ,
  `hpp` DECIMAL(22,2) NULL DEFAULT NULL ,
  `harga` DECIMAL(22,2) NULL DEFAULT NULL ,
  `waktu_masuk` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;
 
CREATE  TABLE IF NOT EXISTS `shoppingcart`.`pelanggan` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nama` VARCHAR(60) NULL DEFAULT NULL ,
  `alamat` VARCHAR(255) NULL DEFAULT NULL ,
  `telepon` VARCHAR(20) NULL DEFAULT NULL ,
  `email` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;
 
CREATE  TABLE IF NOT EXISTS `shoppingcart`.`penjualan` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `tanggal` DATE NULL DEFAULT NULL ,
  `pelanggan_id` INT(11) NOT NULL ,
  `total` DECIMAL(22,2) NULL DEFAULT NULL ,
  `biaya_pengiriman` DECIMAL(22,2) NULL DEFAULT NULL ,
  `jumlah_total` DECIMAL(22,2) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_penjualan_pelanggan1_idx` (`pelanggan_id` ASC) ,
  CONSTRAINT `fk_penjualan_pelanggan1`
    FOREIGN KEY (`pelanggan_id` )
    REFERENCES `shoppingcart`.`pelanggan` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;
 
CREATE  TABLE IF NOT EXISTS `shoppingcart`.`item_penjualan` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `penjualan_id` INT(11) NOT NULL ,
  `barang_id` INT(11) NOT NULL ,
  `harga` DECIMAL(22,2) NULL DEFAULT NULL ,
  `kuantitas` DECIMAL(22,2) NULL DEFAULT NULL ,
  `jumlah_harga` DECIMAL(22,2) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_item_pembelian_barang1_idx` (`barang_id` ASC) ,
  INDEX `fk_item_penjualan_penjualan1_idx` (`penjualan_id` ASC) ,
  CONSTRAINT `fk_item_pembelian_barang10`
    FOREIGN KEY (`barang_id` )
    REFERENCES `shoppingcart`.`barang` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_item_penjualan_penjualan1`
    FOREIGN KEY (`penjualan_id` )
    REFERENCES `shoppingcart`.`penjualan` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;
 
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;