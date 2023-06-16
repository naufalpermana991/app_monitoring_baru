/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - kalibrasi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kalibrasi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kalibrasi`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `bagian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`nama`,`username`,`password`,`bagian`) values 
(1,'admin','admin','admin','admin');

/*Table structure for table `atasan` */

DROP TABLE IF EXISTS `atasan`;

CREATE TABLE `atasan` (
  `id_atasan` int(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `bagian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `atasan` */

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id_barang` int(25) NOT NULL AUTO_INCREMENT,
  `nomer_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `jumlah` int(25) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `harga` int(25) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang` */

insert  into `barang`(`id_barang`,`nomer_barang`,`nama_barang`,`merk`,`tipe`,`jumlah`,`keterangan`,`harga`) values 
(1,'011/V/2021','Total Station','Topcon','GM-101',3,'Alat Ukur Sudut dan Jarak',152000000),
(2,'026/V/2021','Theodolite','Topcon','DT305l',5,'Alat Ukur Sudut Datar (Horizontal) dan Sudut Tegak (Vertikal)',53000000),
(3,'009/V/2021','GPS','Garmin','Etrex 10',15,'Alat untuk Informasi Koordinat',2000000);

/*Table structure for table `kalibrasi` */

DROP TABLE IF EXISTS `kalibrasi`;

CREATE TABLE `kalibrasi` (
  `id_kalibrasi` int(11) NOT NULL AUTO_INCREMENT,
  `no_kalibrasi` char(100) NOT NULL,
  `id_barang` int(20) NOT NULL,
  `tanggal_kalibrasi` date NOT NULL,
  `petugas_penerima` varchar(100) NOT NULL,
  `petugas_menyerahkan` varchar(100) NOT NULL,
  `tgl_exp` date NOT NULL,
  `pihak_kalibrasi` varchar(100) NOT NULL,
  `keterangan_kalibrasi` varchar(100) NOT NULL,
  `keterangan_notifikasi` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kalibrasi`),
  KEY `id_barang` (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kalibrasi` */

insert  into `kalibrasi`(`id_kalibrasi`,`no_kalibrasi`,`id_barang`,`tanggal_kalibrasi`,`petugas_penerima`,`petugas_menyerahkan`,`tgl_exp`,`pihak_kalibrasi`,`keterangan_kalibrasi`,`keterangan_notifikasi`,`foto`) values 
(1,'014/KB/I/2021',1,'2020-01-01','Admin','Admin','2021-01-01','PT Kalibrasi','Kondisi Baik','Kondisi Baik',''),
(2,'027/KB/II/2022',3,'2021-08-11','Admin','Admin','2022-08-11','PT Kalibrasi','Kondisi Baik','Kondisi Baik','');

/*Table structure for table `kepala_divisi` */

DROP TABLE IF EXISTS `kepala_divisi`;

CREATE TABLE `kepala_divisi` (
  `id_kepala_divisi` int(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kepala_divisi` */

/*Table structure for table `koordinator` */

DROP TABLE IF EXISTS `koordinator`;

CREATE TABLE `koordinator` (
  `id_koordinator` int(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `bagian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `koordinator` */

/*Table structure for table `lap_kalibrasi` */

DROP TABLE IF EXISTS `lap_kalibrasi`;

CREATE TABLE `lap_kalibrasi` (
  `id_lap_kalirasi` int(11) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `tag_number` varchar(30) DEFAULT NULL,
  `spek_merk_type` varchar(50) DEFAULT NULL,
  `spek_serial_number` varchar(200) DEFAULT NULL,
  `spek_warna` varchar(30) DEFAULT NULL,
  `spek_ukuran` varchar(30) DEFAULT NULL,
  `kondisi_barang` varchar(50) DEFAULT NULL,
  `status_barang` varchar(10) DEFAULT NULL,
  `no_sertifikat_kalibrasiPerijinan` varchar(100) DEFAULT NULL,
  `interval_kalibrasi` char(10) DEFAULT NULL,
  `tgl_kalibrasi` varchar(20) DEFAULT NULL,
  `tgl_berakhirnya_masa_kalibrasi` varchar(20) DEFAULT NULL,
  `unit_kerja_pemilik` varchar(100) DEFAULT NULL,
  `lembaga_kalibrasi` varchar(60) DEFAULT NULL,
  `jns_kalibrasi_int` char(1) DEFAULT NULL,
  `jns_kalibrasi_eks` char(1) DEFAULT NULL,
  `range_kapasitas` varchar(25) DEFAULT NULL,
  `faktor_koreksi` varchar(30) DEFAULT NULL,
  `signifikan_ya` char(1) DEFAULT NULL,
  `signifikan_tidak` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_lap_kalirasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `lap_kalibrasi` */

insert  into `lap_kalibrasi`(`id_lap_kalirasi`,`nama_barang`,`tag_number`,`spek_merk_type`,`spek_serial_number`,`spek_warna`,`spek_ukuran`,`kondisi_barang`,`status_barang`,`no_sertifikat_kalibrasiPerijinan`,`interval_kalibrasi`,`tgl_kalibrasi`,`tgl_berakhirnya_masa_kalibrasi`,`unit_kerja_pemilik`,`lembaga_kalibrasi`,`jns_kalibrasi_int`,`jns_kalibrasi_eks`,`range_kapasitas`,`faktor_koreksi`,`signifikan_ya`,`signifikan_tidak`) values 
(1,'AUTOMATIC Level','SBA3707-10001','TOPCON','JZ28943','Kuning',NULL,'Baik','Dipakai','3164/BNT/LET/IX/2022','1 Tahun','16-Sep-22','16-Sep-23','Bidang Inspeksi Teknik','CV.BNT BANDUNG','-','V',NULL,NULL,'-','V'),
(2,'Bejana Ukur','SBA1409-20001','DB/EX','-','Stainless','20Liter/1 ML','Baik','Dipakai','1645/-1,821,,1,509 , 07 Februari 2022','1 Tahun','07 Februari 2022','07 Agustus 2022','Bidang Inspeksi Umum','UPTD METEOROLOGI PROVINSI IBUKOTA JAKARTA','-','V','0-30M','1 mm','-','V'),
(3,'Bejana Ukur','SBA1409-20001','DB/EX','-','Stainless','20Liter/1 ML','Baik','Dipakai','1645/-1,821,,1,509 , 07 Februari 2022','1 Tahun','07 Februari 2022','04 Februari 2023','Bidang Inspeksi Umum','PT CALTESYS INDONESIA, LK-053--IDN','-','V','0-30M','1 mm','-','V'),
(4,'Concrete Test Hammer','SBA3212-10001','SH01-011-0074','SH01-011-0074','Silver Schmidt PC','27 2 40%','Baik','Dipakai','S,2208-0041, Tgl. 05 Agustus 2022','1 Tahun','04 Agustus 2022','04 Agustus 2023','Bidang Inspeksi Teknik','PT. BINA BARUTAMA SEJAHTERA','-','V','90,5-91,0','-','-','V'),
(5,'Detector Gas','SBA0600-10014','RIKEN/KEIKI GD-202F','5X0030032RN','Hitam','200 ppm','Baik','Dipakai','A, Tgl. 05 April 2021','1 Tahun','13 Oktober 2022','13 Oktober 2023','Bidang Inspeksi Umum','Pratama Graha Semesta, PT','-','V','200 ppm','20.00ppm','-','V'),
(6,'Detector Gas','SBA0600-10015','RIKEN/F1-21','479010031','Hitam','200 mg/l','Baik','Dipakai','A, Tgl. 28 Maret 2022','1 Tahun','28 Maret 2022','28 Maret 2023','Bidang Inspeksi Umum','Pratama Graha Semesta, PT','-','V','200 mg/l','0-5%vol','-','V'),
(7,'Digital Caliper','SBA0363-20005','Mitutoyo/CD-12\"CSX','7414670','Stainless','300 mm','Baik','Dipakai','L12210773, Tgl 21 DESEMBER 2021','1 Tahun','21 DESEMBER 2021','21 DESEMBER 2022','BIU UP Gresik','PT CALTESYS INDONESIA, LK-280-IDN','-','V','300 mm','0.02 mm','-','V'),
(8,'Digital Clamp Meter','SBA0911-20004','Constant/ADC1000','3146640','Hitam','24.6\'C','Baik','Dipakai','B07220850, Tgl. 15 Juli 2022','1 Tahun','12 Juli 2022','12 Juli 2023','Bidang Inspeksi Teknik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','23,8.1,1\'C','0.58%','-','V'),
(9,'Digital Earth Tester','SBA0024-20003','Kyoritsu/4105A','W8237547','Hitam','20-2000 ?','Baik','Dipakai','B07220165, Tgl. 14 juni 2022','1 Tahun','02 Juli 2022','02 Juli 2023','Bidang Inspeksi Teknik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','20-2000 ?',NULL,'-','V'),
(10,'Digital Gas Detector','SBA0600-10011','Uniphos/250 PH3','A2371','Kuning','0-2000 ppm','Baik','Dipakai','NPCA/Tech/Cal/AW/20220616, Tgl. \'16 Juni 2022','6 Bulan','16 Juni 2022','16 Desember 2022','Bidang Inspeksi Umum','PT. Nugraha Pratama Chemical Asia','-','V','0-200 ppm','867 ppm','-','V'),
(11,'Digital Gas Detector','SBA0600-10012','Uniphos/350 PH3','B7053','Kuning','0-20 ppm','Baik','Dipakai','NPCA/Tech/Cal/AW/20220616, Tgl. \'16 Juni 2022','6 Bulan','16 Juni 2022','16 Desember 2022','Bidang Inspeksi Umum','PT. Nugraha Pratama Chemical Asia','-','V','0-20 ppm','9.4 ppm','-','V'),
(12,'Digital Gas Detector','SBA0600-10012','UNIPHOS 251 (PM)/MBr LEAK DETECTOR','A-3069 PM','MERAH KUNING','0-200 ppm','Baik','Dipakai','NPCA/Tech/Cal/AW/20210219, Tgl. \'19 Februari 2021','6 Bulan','21-Sep-22','21 Maret 2023','Bidang Inspeksi Umum','PT. Nugraha Pratama Chemical Asia','-','V','0-200 ppm','81 ppm','-','V'),
(13,'Digital Gas Detector','SBA0600-10007','Dragger/XAM7000 PH3','AREC-0275','Hitam','1000.00 ppm','Baik','Dipakai','392/TC/S/DSI/III/2021,Tgl. \'16 Maret 2021','6 Bulan','29-Sep-22','29 Maret 2023','Bidang Inspeksi Umum','Drager Safety Indonesia','-','V','1000.00 ppm','20.00ppm','-','V'),
(14,'Digital Lux Meter','SBA0152-10001','Lutron/LX-103','Q009679','Hitam','2000 lux','Baik','Dipakai','B07220743, Tgl. 29 Juni 2022','1 Tahun','11 Juli 2022','11 Juli 2023','Bidang Inspeksi Teknik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','2000 lux','39 lux','-','V'),
(15,'Digital Sound Level Meter','SBA0323-20004','Mastech/MS6700','10020035842','Hitam','63-8000 hz','Baik','Dipakai','S.2208-0042, Tgl. 05 Agustus 2022.','1 Tahun','05 Agustus 2022','05 Agustus 2023','Bidang Inspeksi Teknik','PT. HEKSA INSTRUMEN SINERGI','-','V','63-8000 hz','0.4-0.5(dB)','-','V'),
(16,'Digital Tachometer','SBA0333-20003','Constant/RPM78','L1106180','Hitam','5 - 99999 rpm','Baik','Dipakai','B06220542, Tgl. 17 Mei 2022','1 Tahun','09 Juni 2022','09 Juni 2023','Bidang Inspeksi Teknik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','5 - 99999 rpm','0.0 - (-2) rpm','-','V'),
(17,'Digital Thermometer Infrared','SBA0344-20026','Smart Sensor/AS852B','4480371','Kuning','-50-750\'C','Baik','Dipakai','L07220488, Tgl. 29 Juni 2022','1 Tahun','15 Juli 2022','15 Juli 2023','BIU UP Gresik','PT CALTESYS INDONESIA, L07220488','-','V','-50-500\'C','3.4-5.1\'C','-','V'),
(18,'Digital Thermometer Infrared','SBA0344-20028','IRTEK/IR60i','IR60i07171380','Merah','0-400\'C','Baik','Dipakai','L07220396 Tgl. 14 September 2022','1 Tahun','10-Sep-22','10-Sep-23','Bidang Inspeksi Teknik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','0-400\'C','1.0-5.4\'C','-','V'),
(19,'Digital Thermometer Infrared','SBA0344-20028','IRTEK/IR60i','IR60i07171380','Merah','0-400\'C','Baik','Dipakai','-','1 Tahun','7-Sep-22','7-Sep-23','Bidang Inspeksi Teknik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','0-400\'C','1.0-5.4\'C','-','V'),
(20,'Digital Thermometer Infrared','SBA0026-10001','Fluke/VT04','18050234','Kuning','250\'C','Baik','Dipakai','20.09.1215, Tgl. 29 September 2020','1 Tahun','29-Sep-20','29-Sep-22','Bidang Inspeksi Teknik','UPTD Metrologi Legal Jatim, LK-277 IDN','-','V','250\'C','3.4-5.1\'C','-','V'),
(21,'Digital Vibration Meter','SBA0364-20001','Lutron/VB-8201 HA','Q138047','Kream','20-1000Hz','Baik','Dipakai','S,2208-0041, Tgl. 05 Agustus 2022','1 Tahun','05 Agustus 2022','05 Agustus 2023','Bidang Inspeksi Teknik','PT. HEKSA INSTRUMEN SINERGI','-','V','20-1000Hz','1.50%','-','V'),
(22,'Digit-X Densitometer','SBA0230-20001','RADIX','-','-','0.05','Baik','Dipakai','-','1 Tahun','23 Desember 2022','23 Desember 2023','Bidang Inspeksi Teknik','PT SUCOFINDO Cab. Surabaya','-','V','0.05','0.05','-','V'),
(23,'Dosimeter Sauku Gamma','SBA0373-10003','Arrow Tech','147421','-','-','Baik','Dipakai','52904-3/LT/KAUR/08/2022, 09 Agustus 2022','1 Tahun','29 Agustus 2022','29 Agustus 2023','Bidang Inspeksi Teknik','LAB. TEKNOLOGI KESELAMATAN DAN METROLOGI RADIASI','-','V','1.02','9.40%','-','V'),
(24,'Dosimeter Sauku Gamma','SBA0373-10001','Arrow Tech','204151','-','-','Baik','Dipakai','52904-1/LT/KAUR/08/2022, 09 Agustus 2023','1 Tahun','29 Agustus 2022','29 Agustus 2023','Bidang Inspeksi Teknik','LAB. TEKNOLOGI KESELAMATAN DAN METROLOGI RADIASI','-','V','0.97','9.40%','-','V'),
(25,'Dosimeter Sauku Gamma','SBA0373-10002','Arrow Tech','204153','-','-','Baik','Dipakai','52904-2/LT/KAUR/08/2022, 09 Agustus 2024','1 Tahun','29 Agustus 2022','29 Agustus 2023','Bidang Inspeksi Teknik','LAB. TEKNOLOGI KESELAMATAN DAN METROLOGI RADIASI','-','V','0.97','9.40%','-','V'),
(26,'Hydrometer','SBA0432-20003','ZEAL/\'-','17/283018','Glass','0.990-1040 kg/l / 0.0005 kg/l','Baik','Dipakai','B11201674','1 Tahun','30 Desember 2022','30 Desember 2023','BIU UP Gresik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','0.999-1.040 kg/l','0.0022 kg/l','-','V'),
(27,'Hydrometer','SBA0432-20004','ZEAL/\'-','17/283036','Glass','0.990-1040 kg/l / 0.0005 kg/l','Baik','Dipakai','B12201560, TGL. \'28 Desember 2020','1 Tahun','05 Juli 2022','05 Juli 2023','BIU UP Gresik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','0.999-1.040 kg/l','0.0023 kg/l','-','V'),
(28,'Hydrometer','SBA0432-20006','Precesion','05/GRS/OPI/HM','Glass','1.000-1.100 g/cm3','Baik','Dipakai','06210339, Tgl. 09 Juni 2021','1 Tahun','31 Januari 2022','31 Januari 2023','BIU UP Gresik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','1.000-1.100 g/m3','0.0024 g/m3','-','V'),
(29,'Load Cell','SBA0025-10001','LCM','1000464488','Hitam','0-55 tf','Baik','Dipakai','3-09-22-00450, Tgl. 05 Juli 2022.','1 Tahun','04 Juli 2022','04 Juli 2023','Bidang Inspeksi Teknik','B4T,LK-022-IDN','-','V','0-50 tf','0.15%','-','V'),
(30,'Micrometer','SBA0282-20001','Mitutoyo/M110-25, 103-137','66106217','Silver','0 - 25 mm / 0.01 mm','Baik','Dipakai','L02220293, 07 Februari 2022','1 Tahun','11 Februari 2022','11 Februari 2023','Bidang Inspeksi Umum','PT CALTESYS INDONESIA, LK-053--IDN','-','V','0 - 25 mm / 0.01 mm','5.8','-','V'),
(31,'Permanent Magnetic Yoke','SBA3219-20001','Magnaflux/Y-1','43560','Hijau','10.1 Lb','Baik','Dipakai','ATPL/2122/MPI/2187, Tgl. 03 September 2022','1 Tahun','3-Sep-22','3-Sep-23','Bidang Inspeksi Teknik','Arora Technologies (P) Limited','-','V','-','-','-','V'),
(32,'Pressure Gauge','SBA4506-20003','Tecsis','1104913820','-','-','Baik','Dipakai','S.P.0239,22','1 Tahun','28 Juni 2022','28 Juni 2023','Bidang Inspeksi Teknik','PT.MANDIRI TRANSFORMASI GLOBAL','-','V','16Kg','-','-','V'),
(33,'Pressure Gauge','SBA4506-20004','Ashroft','-','-','-','Baik','Dipakai','S.P.0237,22','1 Tahun','28 Juni 2022','28 Juni 2023','Bidang Inspeksi Teknik','PT.MANDIRI TRANSFORMASI GLOBAL','-','V','100Kg','-','-','V'),
(34,'Pressure Gauge','SBA4506-20005','Wika','810001GE','-','-','Baik','Dipakai','S.P.0240,22','1 Tahun','05 Juli 2022','05 Juli 2023','Bidang Inspeksi Teknik','PT.MANDIRI TRANSFORMASI GLOBAL','-','V','1000Psi','-','-','V'),
(35,'Pressure Gauge','SBA4506-20006','Ashroft','EN 837-1','-','-','Baik','Dipakai','S.P.0238,22','1 Tahun','28 Juni 2022','28 Juni 2023','Bidang Inspeksi Teknik','PT.MANDIRI TRANSFORMASI GLOBAL','-','V','42Kg','-','-','V'),
(36,'Pressure Gauge','SBA4506-20007','Schuh Technology','EN 837-1','-','-','Baik','Dipakai','L07220060, 06 July 2022','1 Tahun','02 Juli 2022','02 Juli 2023','Bidang Inspeksi Teknik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','42Kg','-','-','V'),
(37,'Sounding Tape','SBA0159-20004','RICHTER/\'-','-','Stainless','0-3000 mm/1 mm','Baik','Dipakai','L05220473, 17 Mei 2022','1 Tahun','23 Mei 2022','23 Mei 2023','Bidang Inspeksi Umum','PT CALTESYS INDONESIA, LK-053--IDN','-','V','0-30M','1 mm','-','V'),
(38,'Sounding Tape','SBA0159-20027','RICHTER/\'-','-','Stainless','30 Meter','Baik','Dipakai','S.19006656, Tgl. 21 Juni 2019','1 Tahun','7-Sep-22','7-Sep-23','Bidang Inspeksi Teknik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','0-30M','0.3MM','-','V'),
(39,'Sounding Tape','SBA0159-20004','RICHTER/\'-','-','Stainless','0-3000 mm/1 mm','Baik','Dipakai','L05220473, 17 Mei 2022','1 Tahun','23 Mei 2022','04 Februari 2023','Bidang Inspeksi Umum','PT CALTESYS INDONESIA, LK-053--IDN','-','V','0-30M','1 mm','-','V'),
(40,'Sounding Tape','SBA0159-20005','Yamayo','-','Stainless','0-3000 mm/1 mm','Baik','Dipakai','B022220070, 20 Januari 2022','1 Tahun','20 Januari 2022','20 Januari 2023','Bidang Inspeksi Umum','PT CALTESYS INDONESIA, LK-053--IDN','-','V','0-30M','1 mm','-','V'),
(41,'Sounding Tape','SBA0159-20004','Yamayo','#NAME?','Stainless','20 Meter','Baik','Dipakai','B01221400, \'27 Januari 2022','1 Tahun','\'27 Januari 2022','\'27 Januari 2023','BIU UP Gresik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','0-20M','1MM','-','V'),
(42,'Sounding Tape','SBA0159-20005','Yamayo','-','Stainless','20 Meter','Baik','Dipakai','B01221400, \'27 Januari 2022','1 Tahun','\'27 Januari 2022','\'27 Januari 2023','BIU UP Gresik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','0-20M','1MM','-','V'),
(43,'Surveimeter Gamma','SBA0332-10007','NDS Products','24383','-','-','Baik','Dipakai','54057-2/LT/KAUR/08/2022, 09 Agustus 2024','1 Tahun','18 Agustus 2022','18 Agustus 2023','Bidang Inspeksi Teknik','LAB. TEKNOLOGI KESELAMATAN DAN METROLOGI RADIASI','-','V','0.97','9.40%','-','V'),
(44,'Test Gauge','SBA4506-20001','WIKA','81000IEF','-','-','Baik','Dipakai','-','1 Tahun','16-Sep-22','16-Sep-23','Bidang Inspeksi Teknik','PT.MANDIRI TRANSFORMASI GLOBAL','-','V','-','-','-','V'),
(45,'Test Gauge','SBA4506-20002','WIKA','81000IED','-','-','Baik','Dipakai','-','1 Tahun','16-Sep-22','16-Sep-23','Bidang Inspeksi Teknik','PT.MANDIRI TRANSFORMASI GLOBAL','-','V','-','-','-','V'),
(46,'Thermometer Glass','01/GRS/OP1/TRM','AA Precision','-','Glass','-10-100\'C','Baik','Dipakai','L12211119, Tgl 04 JANUARI 2022','1 Tahun','04 JANUARI 2022','04 JANUARI 2023','BIU UP Gresik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','-10-110\'C','0.59\'C','-','V'),
(47,'Thermometer Glass','02/GRS/OP1/TRM','MTB','-','Glass','-20-122\'C','Baik','Dipakai','L12210978, Tgl 28 DESEMBER 2021','1 Tahun','28 DESEMBER 2021','28 DESEMBER 2022','BIU UP Gresik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','-10-110\'C','0.59\'C','-','V'),
(48,'Thermometer Glass','-','AA Precision','-','Glass','-10-100\'C','Baik','Dipakai','L05210655, Tgl 03 Juni 2022','1 Tahun','28 Mei 2022','28 Mei 2023','BIU UP Gresik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','-10-110\'C','0.59\'C','-','V'),
(49,'Thermoprobe','PST0342-20168','TP-5/','May-84','Hitam','0-200\'C','Baik','Dipakai','L05220471, Tgl. 28 Mei 2022','1 Tahun','23 Mei 2022','23 Mei 2023','Bidang Inspeksi Teknik','PT KALIMAN, LK-032--IDN','-','V','0-200\'C','0.5\'C','-','V'),
(50,'Timbangan Crane Digital','SBA0106-20001','Excellent/Crane Scale XZ-GSE','16362','Glass','150Kg/50g','Baik','Dipakai','-','1 Tahun','10-Nov-21','10-Nov-22','Bidang Inspeksi Umum','PT.SAKTI PRESISI INDONESIA','-','V','150Kg/50g','-','-','V'),
(51,'Timbangan Crane Digital','SBA0106-20002','Excellent/Crane Scale XZ-GSE','N 200','Glass','150Kg/50g','Baik','Dipakai','-','1 Tahun','10-Nov-21','10-Nov-22','Bidang Inspeksi Umum','PT.SAKTI PRESISI INDONESIA','-','V','150Kg/50g','-','-','V'),
(52,'Timbangan Crane Digital','SBA0106-20003','Excellent/Crane Scale XZ-GSE','N 200','Glass','150Kg/50g','Baik','Dipakai','-','1 Tahun','10-Nov-21','10-Nov-22','Bidang Inspeksi Umum','PT.MANDIRI TRANSFORMASI GLOBAL','-','V','150Kg/50g','-','-','V'),
(53,'Timbangan Crane Digital','SBA0106-20004','Excellent/Crane Scale XZ-GSE','N 200','Glass','150Kg/50g','Baik','Dipakai','-','1 Tahun','10-Nov-21','10-Nov-22','Bidang Inspeksi Umum','PT.MANDIRI TRANSFORMASI GLOBAL','-','V','150Kg/50g','-','-','V'),
(54,'Timbangan Crane Digital','SBA0106-20005','Excellent/Crane Scale XZ-GSE','N 200','Glass','150Kg/50g','Baik','Dipakai','-','1 Tahun','10-Nov-21','10-Nov-22','Bidang Inspeksi Umum','PT.MANDIRI TRANSFORMASI GLOBAL','-','V','150Kg/50g','-','-','V'),
(55,'Timbangan Crane Digital','SBA0106-20006','DLE Hanging Scale','N 200','Glass','150Kg/50g','Baik','Dipakai','-','1 Tahun','10-Nov-21','10-Nov-22','Bidang Inspeksi Umum','PT.MANDIRI TRANSFORMASI GLOBAL','-','V','150Kg/50g','-','-','V'),
(56,'Timbangan Crane Digital','SBA0102-20001','Excellent/Crane Scale XZ-GSE','16362','Silver','150 Kg nett','Baik','Dipakai','-','1 Tahun','10-Nov-21','10-Nov-22','Bidang Inspeksi Umum','PT. SAKTI PRESISI INDONESIA','-','V','150 Kg nett','0 Kg','-','V'),
(57,'Timbangan Crane Digital','SBA0102-20002','Excellent/Crane Scale XZ-GSE','N 200','Silver','150 Kg nett','Baik','Dipakai','-','1 Tahun','10-Nov-21','11-Nov-22','Bidang Inspeksi Umum','PT. SAKTI PRESISI INDONESIA','-','V','150 Kg nett','0 Kg','-','V'),
(58,'Total Station','SBA0256-10001','Sokkia/FX201','SB000781','Silver',NULL,'Baik','Dipakai','003/ASB/05/2022, Tgl. 07 Mei 2022','1 Tahun','07 Mei 2022','07 Mei 2023','Bidang Inspeksi Teknik','CV.BNT BANDUNG','-','V',NULL,NULL,'-','V'),
(59,'Total Station','SBA0493-10005','Sokkia/IM52','1z016160','Abu-abu',NULL,'Baik','Dipakai','3163/BNT/LET/IX/2022, Tgl. 16 September 2022','1 Tahun','16-Sep-22','16-Sep-23','Bidang Inspeksi Teknik','CV.BNT BANDUNG','-','V',NULL,NULL,'-','V'),
(60,'Ultrasonic Flaw Detector','SBA3604-10005','GE/YSM 36','18107609','Hitam','200.00 mm','Baik','Dipakai','002/LC/UFD/PPN/IV/22, Tgl. 07 April 2022','1 Tahun','6-Apr-22','07 Maret 2023','Bidang Inspeksi Teknik','PT. Pratita Prama Nugraha','-','V','200.00 mm','0.30 mm','-','V'),
(61,'Ultrasonic Flaw Detector','SBA3604-10004','Sonatest/250s','1003062','Hitam','1-9999 mm','Baik','Dipakai','001/LC/UFD/PPN/IV/22, Tgl. 05 April 2022','1 Tahun','5-Apr-22','6-Apr-23','Bidang Inspeksi Teknik','PT. Pratita Prama Nugraha','-','V','1-9999 mm','1.25-1257 mm','-','V'),
(62,'Ultrasonic Thickness Gauge','SBA0360-10005','Olympus / 38 DL Plus','100071510','Biru','0.1-999 mm','Baik','Dipakai','006/LC/UTG/PPN/IV/22, Tgl. 05 April 2022','1 Tahun','5-Apr-22','6-Apr-23','Bidang Inspeksi Teknik','PT. Pratita Prama Nugraha','-','V','0.1-999 mm','0.03 mm','-','V'),
(63,'Vernier Caliper','SBA0158-20025','Mitutoyo','15181030','Silver','6 Inch','Baik','Dipakai','S.D.0245.20, Tgl. 06 November 2020','2 Tahun','6-Nov-20','2-Nov-22','VEPIK-PRAJA','AEQUUS, LK 054-IDN','-','V','6 Inch','+ 0.002 mm','-','V'),
(64,'Vernier Caliper','SBA0158-20026','Mitutoyo','14224831','Silver','6 Inch','Baik','Dipakai','S.D.0241.20, Tgl. 27 Oktober 2020','2 Tahun','27 Oktober 2020','27 Oktober 2022','VEPIK-ARIEF','AEQUUS, LK 054-IDN','-','V','6 Inch','+ 0.002 mm','-','V'),
(65,'Vernier Caliper','SBA0158-20027','Mitutoyo','14161493','Silver','6 Inch','Baik','Dipakai','S.D.0241.20, Tgl. 27 Oktober 2020','2 Tahun','27 Oktober 2020','27 Oktober 2022','VEPIK-GILANG','AEQUUS, LK 054-IDN','-','V','6 Inch','+ 0.002 mm','-','V'),
(66,'Vernier Caliper','SBA0158-20028','Mitutoyo','14134999','Silver','6 Inch','Baik','Dipakai','S.D.0241.20, Tgl. 27 Oktober 2020','2 Tahun','27 Oktober 2020','27 Oktober 2022','VEPIK-WARIS','AEQUUS, LK 054-IDN','-','V','6 Inch','+ 0.002 mm','-','V'),
(67,'Vernier Caliper','SBA0158-20029','Mitutoyo','14057384','Silver','6 Inch','Baik','Dipakai','S.D.0241.20, Tgl. 27 Oktober 2020','2 Tahun','27 Oktober 2020','27 Oktober 2022','VEPIK-PERDANA','AEQUUS, LK 054-IDN','-','V','6 Inch','+ 0.002 mm','-','V'),
(68,'Vernier Caliper','SBA0158-20030','Mitutoyo','14244542','Silver','6 Inch','Baik','Dipakai','S.D.0241.20, Tgl. 27 Oktober 2020','2 Tahun','27 Oktober 2020','27 Oktober 2022','VEPIK-BAHRUS','AEQUUS, LK 054-IDN','-','V','6 Inch','+ 0.002 mm','-','V'),
(69,'Vernier Caliper','SBA0158-20031','Mitutoyo','14244544','Silver','6 Inch','Baik','Dipakai','S.D.0241.20, Tgl. 27 Oktober 2020','2 Tahun','27 Oktober 2020','27 Oktober 2022','VEPIK- ARY T','AEQUUS, LK 054-IDN','-','V','6 Inch','+ 0.002 mm','-','V'),
(70,'Vernier Caliper','SBA0158-20032','Mitutoyo','14224823','Silver','6 Inch','Baik','Dipakai','S.D.0241.20, Tgl. 27 Oktober 2020','2 Tahun','27 Oktober 2020','27 Oktober 2022','VEPIK-NUR','AEQUUS, LK 054-IDN','-','V','6 Inch','+ 0.002 mm','-','V'),
(71,'Vernier Caliper','SBA0158-20033','Mitutoyo','14244540','Silver','6 Inch','Baik','Dipakai','S.D.0241.20, Tgl. 27 Oktober 2020','2 Tahun','27 Oktober 2020','27 Oktober 2022','VEPIK-YAHYA','AEQUUS, LK 054-IDN','-','V','6 Inch','+ 0.002 mm','-','V'),
(72,'Vernier Caliper','SBA0158-20034','Mitutoyo','13106372','Silver','6 Inch','Baik','Dipakai','S.D.0241.20, Tgl. 27 Oktober 2020','2 Tahun','27 Oktober 2020','27 Oktober 2022','VEPIK-DOYS','AEQUUS, LK 054-IDN','-','V','6 Inch','+ 0.002 mm','-','V'),
(73,'Welding Gauge','SBA0160-10001','Nigata Seiki','WGU-7M / 1612','Silver','-','Baik','Dipakai','B06220695 Tgl. 16 June 2022','1 Tahun','10 Juni 2022','10 Juni 2023','Bidang Inspeksi Teknik','PT CALTESYS INDONESIA, LK-053--IDN','-','V','90,5-91,0','-','-','V'),
(74,'Yoke AC','SBA0026-10002','Magnaflux/Y-6',NULL,'Hijau','10.1 Lb','Baik','Dipakai','005/LC/YK//PPN/VI/22, Tgl. 29 Juni 2022','1 Tahun','29 Juni 2022','29 Juni 2023','Bidang Inspeksi Teknik','PT. Pratita Prama Nugraha','-','V','10.1 Lb','0.13 Lb','-','V');

/*Table structure for table `pesan` */

DROP TABLE IF EXISTS `pesan`;

CREATE TABLE `pesan` (
  `no_kalibrasi` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `pesan_koordinator` text NOT NULL,
  `pesan_atasan` text NOT NULL,
  `pesan_kepala_divisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pesan` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
