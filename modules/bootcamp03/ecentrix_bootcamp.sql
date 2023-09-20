/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 8.0.30 : Database - ecentrix_bootcamp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ecentrix_bootcamp` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `ecentrix_bootcamp`;

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `nik` varchar(36) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` varchar(5) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `jabatan` enum('staff','supervisor','manager') NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_time` datetime NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `karyawan` */

insert  into `karyawan`(`nik`,`nama`,`tempat_lahir`,`tanggal_lahir`,`umur`,`alamat`,`telp`,`jabatan`,`created_by`,`created_time`) values 
('12345','khairin','surabaya','2023-09-01','0','sidosermo indah IV/2 surabaya','083830466466','staff','afif','2023-09-15 10:22:14'),
('67890','hendri','malang','2020-03-02','3','sigura gura','081249234567','staff','hendri','2023-09-19 11:17:34'),
('712531','amy','jakarta','2012-04-30','11','jl ikan paus no 23','081256448754','supervisor','hendri','2023-09-20 04:41:23'),
('76231','john','malang','2010-02-09','13','blimbing','081248663678','manager','hendri','2023-09-19 18:16:00'),
('918723','maxx','surabaya','2010-02-10','13','surabaya barat','081267245271','staff','hendri','2023-09-20 02:51:53');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` varchar(15) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`full_name`) values 
('afif','afif ghozali'),
('hendri','hendri narendra');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
