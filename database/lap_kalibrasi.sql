-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2023 at 10:15 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_kalibrasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `lap_kalibrasi`
--

CREATE TABLE `lap_kalibrasi` (
  `id_lap_kalibrasi` int NOT NULL,
  `nama_alat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tag_number` varchar(30) DEFAULT NULL,
  `no_sertifikat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `interval_kalibrasi` char(10) DEFAULT NULL,
  `lembaga_kalibrasi` varchar(60) DEFAULT NULL,
  `jns_kalibrasi_int` char(1) DEFAULT NULL,
  `jns_kalibrasi_eks` char(1) DEFAULT NULL,
  `range_kapasitas` varchar(25) DEFAULT NULL,
  `faktor_koreksi` varchar(30) DEFAULT NULL,
  `signifikan_ya` char(1) DEFAULT NULL,
  `signifikan_tidak` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lap_kalibrasi`
--

INSERT INTO `lap_kalibrasi` (`id_lap_kalibrasi`, `nama_alat`, `tag_number`, `no_sertifikat`, `interval_kalibrasi`, `lembaga_kalibrasi`, `jns_kalibrasi_int`, `jns_kalibrasi_eks`, `range_kapasitas`, `faktor_koreksi`, `signifikan_ya`, `signifikan_tidak`) VALUES
(1, 'AUTOMATIC Level', 'SBA3707-10001', '3164/BNT/LET/IX/2022', '1 Tahun', 'CV.BNT BANDUNG', '-', 'V', NULL, NULL, '-', 'V'),
(2, 'Bejana Ukur', 'SBA1409-20001', '1645/-1,821,,1,509 , 07 Februari 2022', '1 Tahun', 'UPTD METEOROLOGI PROVINSI IBUKOTA JAKARTA', '-', 'V', '0-30M', '1 mm', '-', 'V'),
(3, 'Bejana Ukur', 'SBA1409-20001', '1645/-1,821,,1,509 , 07 Februari 2022', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '0-30M', '1 mm', '-', 'V'),
(4, 'Concrete Test Hammer', 'SBA3212-10001', 'S,2208-0041, Tgl. 05 Agustus 2022', '1 Tahun', 'PT. BINA BARUTAMA SEJAHTERA', '-', 'V', '90,5-91,0', '-', '-', 'V'),
(5, 'Detector Gas', 'SBA0600-10014', 'A, Tgl. 05 April 2021', '1 Tahun', 'Pratama Graha Semesta, PT', '-', 'V', '200 ppm', '20.00ppm', '-', 'V'),
(6, 'Detector Gas', 'SBA0600-10015', 'A, Tgl. 28 Maret 2022', '1 Tahun', 'Pratama Graha Semesta, PT', '-', 'V', '200 mg/l', '0-5%vol', '-', 'V'),
(7, 'Digital Caliper', 'SBA0363-20005', 'L12210773, Tgl 21 DESEMBER 2021', '1 Tahun', 'PT CALTESYS INDONESIA, LK-280-IDN', '-', 'V', '300 mm', '0.02 mm', '-', 'V'),
(8, 'Digital Clamp Meter', 'SBA0911-20004', 'B07220850, Tgl. 15 Juli 2022', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '23,8.1,1\'C', '0.58%', '-', 'V'),
(9, 'Digital Earth Tester', 'SBA0024-20003', 'B07220165, Tgl. 14 juni 2022', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '20-2000 ?', NULL, '-', 'V'),
(10, 'Digital Gas Detector', 'SBA0600-10011', 'NPCA/Tech/Cal/AW/20220616, Tgl. \'16 Juni 2022', '6 Bulan', 'PT. Nugraha Pratama Chemical Asia', '-', 'V', '0-200 ppm', '867 ppm', '-', 'V'),
(11, 'Digital Gas Detector', 'SBA0600-10012', 'NPCA/Tech/Cal/AW/20220616, Tgl. \'16 Juni 2022', '6 Bulan', 'PT. Nugraha Pratama Chemical Asia', '-', 'V', '0-20 ppm', '9.4 ppm', '-', 'V'),
(12, 'Digital Gas Detector', 'SBA0600-10012', 'NPCA/Tech/Cal/AW/20210219, Tgl. \'19 Februari 2021', '6 Bulan', 'PT. Nugraha Pratama Chemical Asia', '-', 'V', '0-200 ppm', '81 ppm', '-', 'V'),
(13, 'Digital Gas Detector', 'SBA0600-10007', '392/TC/S/DSI/III/2021,Tgl. \'16 Maret 2021', '6 Bulan', 'Drager Safety Indonesia', '-', 'V', '1000.00 ppm', '20.00ppm', '-', 'V'),
(14, 'Digital Lux Meter', 'SBA0152-10001', 'B07220743, Tgl. 29 Juni 2022', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '2000 lux', '39 lux', '-', 'V'),
(15, 'Digital Sound Level Meter', 'SBA0323-20004', 'S.2208-0042, Tgl. 05 Agustus 2022.', '1 Tahun', 'PT. HEKSA INSTRUMEN SINERGI', '-', 'V', '63-8000 hz', '0.4-0.5(dB)', '-', 'V'),
(16, 'Digital Tachometer', 'SBA0333-20003', 'B06220542, Tgl. 17 Mei 2022', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '5 - 99999 rpm', '0.0 - (-2) rpm', '-', 'V'),
(17, 'Digital Thermometer Infrared', 'SBA0344-20026', 'L07220488, Tgl. 29 Juni 2022', '1 Tahun', 'PT CALTESYS INDONESIA, L07220488', '-', 'V', '-50-500\'C', '3.4-5.1\'C', '-', 'V'),
(18, 'Digital Thermometer Infrared', 'SBA0344-20028', 'L07220396 Tgl. 14 September 2022', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '0-400\'C', '1.0-5.4\'C', '-', 'V'),
(19, 'Digital Thermometer Infrared', 'SBA0344-20028', '-', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '0-400\'C', '1.0-5.4\'C', '-', 'V'),
(20, 'Digital Thermometer Infrared', 'SBA0026-10001', '20.09.1215, Tgl. 29 September 2020', '1 Tahun', 'UPTD Metrologi Legal Jatim, LK-277 IDN', '-', 'V', '250\'C', '3.4-5.1\'C', '-', 'V'),
(21, 'Digital Vibration Meter', 'SBA0364-20001', 'S,2208-0041, Tgl. 05 Agustus 2022', '1 Tahun', 'PT. HEKSA INSTRUMEN SINERGI', '-', 'V', '20-1000Hz', '1.50%', '-', 'V'),
(22, 'Digit-X Densitometer', 'SBA0230-20001', '-', '1 Tahun', 'PT SUCOFINDO Cab. Surabaya', '-', 'V', '0.05', '0.05', '-', 'V'),
(23, 'Dosimeter Sauku Gamma', 'SBA0373-10003', '52904-3/LT/KAUR/08/2022, 09 Agustus 2022', '1 Tahun', 'LAB. TEKNOLOGI KESELAMATAN DAN METROLOGI RADIASI', '-', 'V', '1.02', '9.40%', '-', 'V'),
(24, 'Dosimeter Sauku Gamma', 'SBA0373-10001', '52904-1/LT/KAUR/08/2022, 09 Agustus 2023', '1 Tahun', 'LAB. TEKNOLOGI KESELAMATAN DAN METROLOGI RADIASI', '-', 'V', '0.97', '9.40%', '-', 'V'),
(25, 'Dosimeter Sauku Gamma', 'SBA0373-10002', '52904-2/LT/KAUR/08/2022, 09 Agustus 2024', '1 Tahun', 'LAB. TEKNOLOGI KESELAMATAN DAN METROLOGI RADIASI', '-', 'V', '0.97', '9.40%', '-', 'V'),
(26, 'Hydrometer', 'SBA0432-20003', 'B11201674', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '0.999-1.040 kg/l', '0.0022 kg/l', '-', 'V'),
(27, 'Hydrometer', 'SBA0432-20004', 'B12201560, TGL. \'28 Desember 2020', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '0.999-1.040 kg/l', '0.0023 kg/l', '-', 'V'),
(28, 'Hydrometer', 'SBA0432-20006', '06210339, Tgl. 09 Juni 2021', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '1.000-1.100 g/m3', '0.0024 g/m3', '-', 'V'),
(29, 'Load Cell', 'SBA0025-10001', '3-09-22-00450, Tgl. 05 Juli 2022.', '1 Tahun', 'B4T,LK-022-IDN', '-', 'V', '0-50 tf', '0.15%', '-', 'V'),
(30, 'Micrometer', 'SBA0282-20001', 'L02220293, 07 Februari 2022', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '0 - 25 mm / 0.01 mm', '5.8', '-', 'V'),
(31, 'Permanent Magnetic Yoke', 'SBA3219-20001', 'ATPL/2122/MPI/2187, Tgl. 03 September 2022', '1 Tahun', 'Arora Technologies (P) Limited', '-', 'V', '-', '-', '-', 'V'),
(32, 'Pressure Gauge', 'SBA4506-20003', 'S.P.0239,22', '1 Tahun', 'PT.MANDIRI TRANSFORMASI GLOBAL', '-', 'V', '16Kg', '-', '-', 'V'),
(33, 'Pressure Gauge', 'SBA4506-20004', 'S.P.0237,22', '1 Tahun', 'PT.MANDIRI TRANSFORMASI GLOBAL', '-', 'V', '100Kg', '-', '-', 'V'),
(34, 'Pressure Gauge', 'SBA4506-20005', 'S.P.0240,22', '1 Tahun', 'PT.MANDIRI TRANSFORMASI GLOBAL', '-', 'V', '1000Psi', '-', '-', 'V'),
(35, 'Pressure Gauge', 'SBA4506-20006', 'S.P.0238,22', '1 Tahun', 'PT.MANDIRI TRANSFORMASI GLOBAL', '-', 'V', '42Kg', '-', '-', 'V'),
(36, 'Pressure Gauge', 'SBA4506-20007', 'L07220060, 06 July 2022', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '42Kg', '-', '-', 'V'),
(37, 'Sounding Tape', 'SBA0159-20004', 'L05220473, 17 Mei 2022', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '0-30M', '1 mm', '-', 'V'),
(38, 'Sounding Tape', 'SBA0159-20027', 'S.19006656, Tgl. 21 Juni 2019', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '0-30M', '0.3MM', '-', 'V'),
(39, 'Sounding Tape', 'SBA0159-20004', 'L05220473, 17 Mei 2022', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '0-30M', '1 mm', '-', 'V'),
(40, 'Sounding Tape', 'SBA0159-20005', 'B022220070, 20 Januari 2022', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '0-30M', '1 mm', '-', 'V'),
(41, 'Sounding Tape', 'SBA0159-20004', 'B01221400, \'27 Januari 2022', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '0-20M', '1MM', '-', 'V'),
(42, 'Sounding Tape', 'SBA0159-20005', 'B01221400, \'27 Januari 2022', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '0-20M', '1MM', '-', 'V'),
(43, 'Surveimeter Gamma', 'SBA0332-10007', '54057-2/LT/KAUR/08/2022, 09 Agustus 2024', '1 Tahun', 'LAB. TEKNOLOGI KESELAMATAN DAN METROLOGI RADIASI', '-', 'V', '0.97', '9.40%', '-', 'V'),
(44, 'Test Gauge', 'SBA4506-20001', '-', '1 Tahun', 'PT.MANDIRI TRANSFORMASI GLOBAL', '-', 'V', '-', '-', '-', 'V'),
(45, 'Test Gauge', 'SBA4506-20002', '-', '1 Tahun', 'PT.MANDIRI TRANSFORMASI GLOBAL', '-', 'V', '-', '-', '-', 'V'),
(46, 'Thermometer Glass', '01/GRS/OP1/TRM', 'L12211119, Tgl 04 JANUARI 2022', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '-10-110\'C', '0.59\'C', '-', 'V'),
(47, 'Thermometer Glass', '02/GRS/OP1/TRM', 'L12210978, Tgl 28 DESEMBER 2021', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '-10-110\'C', '0.59\'C', '-', 'V'),
(48, 'Thermometer Glass', '-', 'L05210655, Tgl 03 Juni 2022', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '-10-110\'C', '0.59\'C', '-', 'V'),
(49, 'Thermoprobe', 'PST0342-20168', 'L05220471, Tgl. 28 Mei 2022', '1 Tahun', 'PT KALIMAN, LK-032--IDN', '-', 'V', '0-200\'C', '0.5\'C', '-', 'V'),
(50, 'Timbangan Crane Digital', 'SBA0106-20001', '-', '1 Tahun', 'PT.SAKTI PRESISI INDONESIA', '-', 'V', '150Kg/50g', '-', '-', 'V'),
(51, 'Timbangan Crane Digital', 'SBA0106-20002', '-', '1 Tahun', 'PT.SAKTI PRESISI INDONESIA', '-', 'V', '150Kg/50g', '-', '-', 'V'),
(52, 'Timbangan Crane Digital', 'SBA0106-20003', '-', '1 Tahun', 'PT.MANDIRI TRANSFORMASI GLOBAL', '-', 'V', '150Kg/50g', '-', '-', 'V'),
(53, 'Timbangan Crane Digital', 'SBA0106-20004', '-', '1 Tahun', 'PT.MANDIRI TRANSFORMASI GLOBAL', '-', 'V', '150Kg/50g', '-', '-', 'V'),
(54, 'Timbangan Crane Digital', 'SBA0106-20005', '-', '1 Tahun', 'PT.MANDIRI TRANSFORMASI GLOBAL', '-', 'V', '150Kg/50g', '-', '-', 'V'),
(55, 'Timbangan Crane Digital', 'SBA0106-20006', '-', '1 Tahun', 'PT.MANDIRI TRANSFORMASI GLOBAL', '-', 'V', '150Kg/50g', '-', '-', 'V'),
(56, 'Timbangan Crane Digital', 'SBA0102-20001', '-', '1 Tahun', 'PT. SAKTI PRESISI INDONESIA', '-', 'V', '150 Kg nett', '0 Kg', '-', 'V'),
(57, 'Timbangan Crane Digital', 'SBA0102-20002', '-', '1 Tahun', 'PT. SAKTI PRESISI INDONESIA', '-', 'V', '150 Kg nett', '0 Kg', '-', 'V'),
(58, 'Total Station', 'SBA0256-10001', '003/ASB/05/2022, Tgl. 07 Mei 2022', '1 Tahun', 'CV.BNT BANDUNG', '-', 'V', NULL, NULL, '-', 'V'),
(59, 'Total Station', 'SBA0493-10005', '3163/BNT/LET/IX/2022, Tgl. 16 September 2022', '1 Tahun', 'CV.BNT BANDUNG', '-', 'V', NULL, NULL, '-', 'V'),
(60, 'Ultrasonic Flaw Detector', 'SBA3604-10005', '002/LC/UFD/PPN/IV/22, Tgl. 07 April 2022', '1 Tahun', 'PT. Pratita Prama Nugraha', '-', 'V', '200.00 mm', '0.30 mm', '-', 'V'),
(61, 'Ultrasonic Flaw Detector', 'SBA3604-10004', '001/LC/UFD/PPN/IV/22, Tgl. 05 April 2022', '1 Tahun', 'PT. Pratita Prama Nugraha', '-', 'V', '1-9999 mm', '1.25-1257 mm', '-', 'V'),
(62, 'Ultrasonic Thickness Gauge', 'SBA0360-10005', '006/LC/UTG/PPN/IV/22, Tgl. 05 April 2022', '1 Tahun', 'PT. Pratita Prama Nugraha', '-', 'V', '0.1-999 mm', '0.03 mm', '-', 'V'),
(63, 'Vernier Caliper', 'SBA0158-20025', 'S.D.0245.20, Tgl. 06 November 2020', '2 Tahun', 'AEQUUS, LK 054-IDN', '-', 'V', '6 Inch', '+ 0.002 mm', '-', 'V'),
(64, 'Vernier Caliper', 'SBA0158-20026', 'S.D.0241.20, Tgl. 27 Oktober 2020', '2 Tahun', 'AEQUUS, LK 054-IDN', '-', 'V', '6 Inch', '+ 0.002 mm', '-', 'V'),
(65, 'Vernier Caliper', 'SBA0158-20027', 'S.D.0241.20, Tgl. 27 Oktober 2020', '2 Tahun', 'AEQUUS, LK 054-IDN', '-', 'V', '6 Inch', '+ 0.002 mm', '-', 'V'),
(66, 'Vernier Caliper', 'SBA0158-20028', 'S.D.0241.20, Tgl. 27 Oktober 2020', '2 Tahun', 'AEQUUS, LK 054-IDN', '-', 'V', '6 Inch', '+ 0.002 mm', '-', 'V'),
(67, 'Vernier Caliper', 'SBA0158-20029', 'S.D.0241.20, Tgl. 27 Oktober 2020', '2 Tahun', 'AEQUUS, LK 054-IDN', '-', 'V', '6 Inch', '+ 0.002 mm', '-', 'V'),
(68, 'Vernier Caliper', 'SBA0158-20030', 'S.D.0241.20, Tgl. 27 Oktober 2020', '2 Tahun', 'AEQUUS, LK 054-IDN', '-', 'V', '6 Inch', '+ 0.002 mm', '-', 'V'),
(69, 'Vernier Caliper', 'SBA0158-20031', 'S.D.0241.20, Tgl. 27 Oktober 2020', '2 Tahun', 'AEQUUS, LK 054-IDN', '-', 'V', '6 Inch', '+ 0.002 mm', '-', 'V'),
(70, 'Vernier Caliper', 'SBA0158-20032', 'S.D.0241.20, Tgl. 27 Oktober 2020', '2 Tahun', 'AEQUUS, LK 054-IDN', '-', 'V', '6 Inch', '+ 0.002 mm', '-', 'V'),
(71, 'Vernier Caliper', 'SBA0158-20033', 'S.D.0241.20, Tgl. 27 Oktober 2020', '2 Tahun', 'AEQUUS, LK 054-IDN', '-', 'V', '6 Inch', '+ 0.002 mm', '-', 'V'),
(72, 'Vernier Caliper', 'SBA0158-20034', 'S.D.0241.20, Tgl. 27 Oktober 2020', '2 Tahun', 'AEQUUS, LK 054-IDN', '-', 'V', '6 Inch', '+ 0.002 mm', '-', 'V'),
(73, 'Welding Gauge', 'SBA0160-10001', 'B06220695 Tgl. 16 June 2022', '1 Tahun', 'PT CALTESYS INDONESIA, LK-053--IDN', '-', 'V', '90,5-91,0', '-', '-', 'V'),
(74, 'Yoke AC', 'SBA0026-10002', '005/LC/YK//PPN/VI/22, Tgl. 29 Juni 2022', '1 Tahun', 'PT. Pratita Prama Nugraha', '-', 'V', '10.1 Lb', '0.13 Lb', '-', 'V');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lap_kalibrasi`
--
ALTER TABLE `lap_kalibrasi`
  ADD PRIMARY KEY (`id_lap_kalibrasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
