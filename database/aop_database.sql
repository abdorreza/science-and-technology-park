-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 10:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aop`
--

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `code` int(11) NOT NULL,
  `state_code` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`code`, `state_code`, `name`, `logo`) VALUES
(236, 23, 'گناباد', 'no-image.jpg'),
(235, 23, 'مشهد 1', 'no-image.jpg'),
(233, 22, 'انزلی', 'no-image.jpg'),
(232, 22, 'آستانه', 'no-image.jpg'),
(234, 23, 'مشهد', 'no-image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `corps`
--

CREATE TABLE `corps` (
  `code` int(11) NOT NULL,
  `code_state` int(11) NOT NULL,
  `code_center` int(11) NOT NULL,
  `code_user` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `shomare_sabt` varchar(12) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `date_sabt` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `type` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `shenase_melli` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `code_eghtesadi` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `tel` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `fax` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `website` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mobile` text COLLATE utf8_persian_ci NOT NULL,
  `pic` text COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `semat1` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `semat2` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `semat3` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `semat4` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `semat5` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `semat6` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `semat7` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `semat8` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `semat9` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `semat10` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `semat11` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `semat12` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `sex1` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `sex2` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `sex3` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `sex4` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `sex5` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `sex6` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `sex7` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `sex8` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `sex9` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `sex10` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `sex11` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `sex12` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `name1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `name2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `name3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `name4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `name5` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `name6` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `name7` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `name8` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `name9` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `name10` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `name11` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `name12` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `father1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `father2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `father3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `father4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `father5` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `father6` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `father7` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `father8` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `father9` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `father10` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `father11` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `father12` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `bdate1` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `bdate2` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `bdate3` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `bdate4` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `bdate5` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `bdate6` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `bdate7` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `bdate8` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `bdate9` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `bdate10` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `bdate11` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `bdate12` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `code_melli1` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `code_melli2` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `code_melli3` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `code_melli4` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `code_melli5` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `code_melli6` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `code_melli7` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `code_melli8` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `code_melli9` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `code_melli10` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `code_melli11` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `code_melli12` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `madrak1` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `madrak2` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `madrak3` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `madrak4` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `madrak5` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `madrak6` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `madrak7` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `madrak8` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `madrak9` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `madrak10` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `madrak11` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `madrak12` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `gerayesh1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `gerayesh2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `gerayesh3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `gerayesh4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `gerayesh5` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `gerayesh6` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `gerayesh7` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `gerayesh8` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `gerayesh9` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `gerayesh10` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `gerayesh11` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `gerayesh12` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `takhasos1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `takhasos2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `takhasos3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `takhasos4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `takhasos5` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `takhasos6` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `takhasos7` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `takhasos8` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `takhasos9` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `takhasos10` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `takhasos11` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `takhasos12` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `nezam1` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nezam2` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nezam3` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nezam4` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nezam5` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nezam6` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nezam7` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nezam8` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nezam9` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nezam10` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nezam11` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nezam12` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `note1` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `note2` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `note3` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `note4` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `note5` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `note6` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `note7` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `note8` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `note9` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `note10` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `note11` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `note12` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `hamkari1` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `hamkari2` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `hamkari3` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `hamkari4` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `hamkari5` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `hamkari6` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `hamkari7` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `hamkari8` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `hamkari9` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `hamkari10` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `hamkari11` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `hamkari12` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `logo` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `hoze` int(11) NOT NULL,
  `zamine` int(11) NOT NULL,
  `idea` text COLLATE utf8_persian_ci NOT NULL,
  `product1` text COLLATE utf8_persian_ci NOT NULL,
  `product2` text COLLATE utf8_persian_ci NOT NULL,
  `product3` text COLLATE utf8_persian_ci NOT NULL,
  `product4` text COLLATE utf8_persian_ci NOT NULL,
  `product5` text COLLATE utf8_persian_ci NOT NULL,
  `product6` text COLLATE utf8_persian_ci NOT NULL,
  `product_img1` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `product_img2` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `product_img3` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `product_img4` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `product_img5` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `product_img6` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `faaliat1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `faaliat2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `faaliat3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `faaliat4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `vaziat1` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `vaziat2` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `vaziat3` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `vaziat4` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `zaman1` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `zaman2` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `zaman3` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `zaman4` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `et1` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `et2` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `et3` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `et4` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `karfarma1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `karfarma2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `karfarma3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `karfarma4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `dastavard1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `dastavard2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `dastavard3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `dastavard4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mojri1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mojri2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mojri3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mojri4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `note_faaliat1` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `note_faaliat2` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `note_faaliat3` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `note_faaliat4` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `nasher1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `nasher2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `nasher3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `nasher4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `onvan1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `onvan2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `onvan3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `onvan4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `writer1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `writer2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `writer3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `writer4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date1` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `date2` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `date3` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `date4` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `note_enteshar1` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `note_enteshar2` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `note_enteshar3` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `note_enteshar4` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `date_esteghrar` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `date_end` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `esteghrar1` varchar(90) COLLATE utf8_persian_ci NOT NULL,
  `esteghrar2` varchar(90) COLLATE utf8_persian_ci NOT NULL,
  `esteghrar3` varchar(90) COLLATE utf8_persian_ci NOT NULL,
  `esteghrar4` varchar(90) COLLATE utf8_persian_ci NOT NULL,
  `room1` varchar(6) COLLATE utf8_persian_ci NOT NULL,
  `room2` varchar(6) COLLATE utf8_persian_ci NOT NULL,
  `room3` varchar(6) COLLATE utf8_persian_ci NOT NULL,
  `room4` varchar(6) COLLATE utf8_persian_ci NOT NULL,
  `nazer` int(11) NOT NULL,
  `etebar` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `date_etebar` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `note_etebar` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `etebar1` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `date_etebar1` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `note_etebar1` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `etebar2` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `date_etebar2` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `note_etebar2` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `etebar3` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `date_etebar3` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `note_etebar3` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `bedehi` int(20) NOT NULL,
  `note_bedehi` text COLLATE utf8_persian_ci NOT NULL,
  `moshavere` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `corps`
--

INSERT INTO `corps` (`code`, `code_state`, `code_center`, `code_user`, `name`, `shomare_sabt`, `date_sabt`, `type`, `shenase_melli`, `code_eghtesadi`, `tel`, `fax`, `email`, `website`, `mobile`, `pic`, `address`, `semat1`, `semat2`, `semat3`, `semat4`, `semat5`, `semat6`, `semat7`, `semat8`, `semat9`, `semat10`, `semat11`, `semat12`, `sex1`, `sex2`, `sex3`, `sex4`, `sex5`, `sex6`, `sex7`, `sex8`, `sex9`, `sex10`, `sex11`, `sex12`, `name1`, `name2`, `name3`, `name4`, `name5`, `name6`, `name7`, `name8`, `name9`, `name10`, `name11`, `name12`, `father1`, `father2`, `father3`, `father4`, `father5`, `father6`, `father7`, `father8`, `father9`, `father10`, `father11`, `father12`, `bdate1`, `bdate2`, `bdate3`, `bdate4`, `bdate5`, `bdate6`, `bdate7`, `bdate8`, `bdate9`, `bdate10`, `bdate11`, `bdate12`, `code_melli1`, `code_melli2`, `code_melli3`, `code_melli4`, `code_melli5`, `code_melli6`, `code_melli7`, `code_melli8`, `code_melli9`, `code_melli10`, `code_melli11`, `code_melli12`, `madrak1`, `madrak2`, `madrak3`, `madrak4`, `madrak5`, `madrak6`, `madrak7`, `madrak8`, `madrak9`, `madrak10`, `madrak11`, `madrak12`, `gerayesh1`, `gerayesh2`, `gerayesh3`, `gerayesh4`, `gerayesh5`, `gerayesh6`, `gerayesh7`, `gerayesh8`, `gerayesh9`, `gerayesh10`, `gerayesh11`, `gerayesh12`, `takhasos1`, `takhasos2`, `takhasos3`, `takhasos4`, `takhasos5`, `takhasos6`, `takhasos7`, `takhasos8`, `takhasos9`, `takhasos10`, `takhasos11`, `takhasos12`, `nezam1`, `nezam2`, `nezam3`, `nezam4`, `nezam5`, `nezam6`, `nezam7`, `nezam8`, `nezam9`, `nezam10`, `nezam11`, `nezam12`, `note1`, `note2`, `note3`, `note4`, `note5`, `note6`, `note7`, `note8`, `note9`, `note10`, `note11`, `note12`, `hamkari1`, `hamkari2`, `hamkari3`, `hamkari4`, `hamkari5`, `hamkari6`, `hamkari7`, `hamkari8`, `hamkari9`, `hamkari10`, `hamkari11`, `hamkari12`, `logo`, `hoze`, `zamine`, `idea`, `product1`, `product2`, `product3`, `product4`, `product5`, `product6`, `product_img1`, `product_img2`, `product_img3`, `product_img4`, `product_img5`, `product_img6`, `faaliat1`, `faaliat2`, `faaliat3`, `faaliat4`, `vaziat1`, `vaziat2`, `vaziat3`, `vaziat4`, `zaman1`, `zaman2`, `zaman3`, `zaman4`, `et1`, `et2`, `et3`, `et4`, `karfarma1`, `karfarma2`, `karfarma3`, `karfarma4`, `dastavard1`, `dastavard2`, `dastavard3`, `dastavard4`, `mojri1`, `mojri2`, `mojri3`, `mojri4`, `note_faaliat1`, `note_faaliat2`, `note_faaliat3`, `note_faaliat4`, `nasher1`, `nasher2`, `nasher3`, `nasher4`, `onvan1`, `onvan2`, `onvan3`, `onvan4`, `writer1`, `writer2`, `writer3`, `writer4`, `date1`, `date2`, `date3`, `date4`, `note_enteshar1`, `note_enteshar2`, `note_enteshar3`, `note_enteshar4`, `date_esteghrar`, `date_end`, `esteghrar1`, `esteghrar2`, `esteghrar3`, `esteghrar4`, `room1`, `room2`, `room3`, `room4`, `nazer`, `etebar`, `date_etebar`, `note_etebar`, `etebar1`, `date_etebar1`, `note_etebar1`, `etebar2`, `date_etebar2`, `note_etebar2`, `etebar3`, `date_etebar3`, `note_etebar3`, `bedehi`, `note_bedehi`, `moshavere`) VALUES
(259, 22, 233, 115, '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', ''),
(256, 23, 234, 104, 'شرکت خراسان مشهد', '', '', '', '', '', '', '', '', '', '', '5d586af24d241.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', ''),
(257, 22, 233, 105, 'شرکت انزلی 2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 'تجاری سازی'),
(258, 22, 232, 112, '5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', ''),
(260, 23, 236, 132, 'qqqq', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', ''),
(261, 23, 236, 133, 'wwww', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emtiaz`
--

CREATE TABLE `emtiaz` (
  `code` int(11) NOT NULL,
  `code_state` int(11) NOT NULL,
  `code_user` int(11) NOT NULL,
  `code_center` int(11) NOT NULL,
  `year` varchar(4) COLLATE utf8_persian_ci NOT NULL,
  `onvan_mali1_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_mali1_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `karfarma_mali1_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mablagh_mali1_1` bigint(20) NOT NULL,
  `emtiaz_mali1_1` int(11) NOT NULL,
  `onvan_mali1_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_mali1_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `karfarma_mali1_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mablagh_mali1_2` bigint(20) NOT NULL,
  `emtiaz_mali1_2` int(11) NOT NULL,
  `onvan_mali1_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_mali1_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `karfarma_mali1_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mablagh_mali1_3` bigint(20) NOT NULL,
  `emtiaz_mali1_3` int(11) NOT NULL,
  `onvan_mali1_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_mali1_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `karfarma_mali1_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mablagh_mali1_4` bigint(20) NOT NULL,
  `emtiaz_mali1_4` int(11) NOT NULL,
  `note_mali1` text COLLATE utf8_persian_ci NOT NULL,
  `files_mali1_1` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_mali1_2` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_mali1_3` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_mali1_4` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `onvan_mali2_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_mali2_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `karfarma_mali2_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mablagh_mali2_1` bigint(20) NOT NULL,
  `darsad_mali2_1` int(11) NOT NULL,
  `emtiaz_mali2_1` int(11) NOT NULL,
  `onvan_mali2_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_mali2_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `karfarma_mali2_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mablagh_mali2_2` bigint(20) NOT NULL,
  `darsad_mali2_2` int(11) NOT NULL,
  `emtiaz_mali2_2` int(11) NOT NULL,
  `onvan_mali2_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_mali2_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `karfarma_mali2_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mablagh_mali2_3` bigint(20) NOT NULL,
  `darsad_mali2_3` int(11) NOT NULL,
  `emtiaz_mali2_3` int(11) NOT NULL,
  `onvan_mali2_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_mali2_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `karfarma_mali2_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mablagh_mali2_4` bigint(20) NOT NULL,
  `darsad_mali2_4` int(11) NOT NULL,
  `emtiaz_mali2_4` int(11) NOT NULL,
  `note_mali2` text COLLATE utf8_persian_ci NOT NULL,
  `files_mali2_1` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_mali2_2` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_mali2_3` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_mali2_4` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `onvan_mali3_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_mali3_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `karfarma_mali3_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mablagh_mali3_1` bigint(20) NOT NULL,
  `darsad_mali3_1` int(11) NOT NULL,
  `emtiaz_mali3_1` int(11) NOT NULL,
  `onvan_mali3_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_mali3_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `karfarma_mali3_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mablagh_mali3_2` bigint(20) NOT NULL,
  `darsad_mali3_2` int(11) NOT NULL,
  `emtiaz_mali3_2` int(11) NOT NULL,
  `onvan_mali3_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_mali3_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `karfarma_mali3_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mablagh_mali3_3` bigint(20) NOT NULL,
  `darsad_mali3_3` int(11) NOT NULL,
  `emtiaz_mali3_3` int(11) NOT NULL,
  `onvan_mali3_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_mali3_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `karfarma_mali3_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mablagh_mali3_4` bigint(20) NOT NULL,
  `darsad_mali3_4` int(11) NOT NULL,
  `emtiaz_mali3_4` int(11) NOT NULL,
  `note_mali3` text COLLATE utf8_persian_ci NOT NULL,
  `files_mali3_1` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_mali3_2` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_mali3_3` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_mali3_4` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `onvan_mali4_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mablagh_mali4_1` bigint(20) NOT NULL,
  `emtiaz_mali4_1` int(11) NOT NULL,
  `onvan_mali4_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mablagh_mali4_2` bigint(20) NOT NULL,
  `emtiaz_mali4_2` int(11) NOT NULL,
  `onvan_mali4_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mablagh_mali4_3` bigint(20) NOT NULL,
  `emtiaz_mali4_3` int(11) NOT NULL,
  `onvan_mali4_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mablagh_mali4_4` bigint(20) NOT NULL,
  `emtiaz_mali4_4` int(11) NOT NULL,
  `note_mali4` text COLLATE utf8_persian_ci NOT NULL,
  `files_mali4_1` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_mali4_2` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_mali4_3` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_mali4_4` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast1_1` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast1_1` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast1_1` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast1_1` int(11) NOT NULL,
  `emtiazm_dast1_1` int(11) NOT NULL,
  `files_dast1_1` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast1_2` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast1_2` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast1_2` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast1_2` int(11) NOT NULL,
  `emtiazm_dast1_2` int(11) NOT NULL,
  `files_dast1_2` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast1_3` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast1_3` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast1_3` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast1_3` int(11) NOT NULL,
  `emtiazm_dast1_3` int(11) NOT NULL,
  `files_dast1_3` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast1_4` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast1_4` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast1_4` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast1_4` int(11) NOT NULL,
  `emtiazm_dast1_4` int(11) NOT NULL,
  `files_dast1_4` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast2_1` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast2_1` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast2_1` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast2_1` int(11) NOT NULL,
  `emtiazm_dast2_1` int(11) NOT NULL,
  `files_dast2_1` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast2_2` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast2_2` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast2_2` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast2_2` int(11) NOT NULL,
  `emtiazm_dast2_2` int(11) NOT NULL,
  `files_dast2_2` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast2_3` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast2_3` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast2_3` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast2_3` int(11) NOT NULL,
  `emtiazm_dast2_3` int(11) NOT NULL,
  `files_dast2_3` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast2_4` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast2_4` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast2_4` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast2_4` int(11) NOT NULL,
  `emtiazm_dast2_4` int(11) NOT NULL,
  `files_dast2_4` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast3_1` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast3_1` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast3_1` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast3_1` int(11) NOT NULL,
  `emtiazm_dast3_1` int(11) NOT NULL,
  `files_dast3_1` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast3_2` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast3_2` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast3_2` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast3_2` int(11) NOT NULL,
  `emtiazm_dast3_2` int(11) NOT NULL,
  `files_dast3_2` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast3_3` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast3_3` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast3_3` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast3_3` int(11) NOT NULL,
  `emtiazm_dast3_3` int(11) NOT NULL,
  `files_dast3_3` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast3_4` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast3_4` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast3_4` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast3_4` int(11) NOT NULL,
  `emtiazm_dast3_4` int(11) NOT NULL,
  `files_dast3_4` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast4_1` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast4_1` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast4_1` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast4_1` int(11) NOT NULL,
  `emtiazm_dast4_1` int(11) NOT NULL,
  `files_dast4_1` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast4_2` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast4_2` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast4_2` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast4_2` int(11) NOT NULL,
  `emtiazm_dast4_2` int(11) NOT NULL,
  `files_dast4_2` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast4_3` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast4_3` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast4_3` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast4_3` int(11) NOT NULL,
  `emtiazm_dast4_3` int(11) NOT NULL,
  `files_dast4_3` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast4_4` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast4_4` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast4_4` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast4_4` int(11) NOT NULL,
  `emtiazm_dast4_4` int(11) NOT NULL,
  `files_dast4_4` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast5_1` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast5_1` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast5_1` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast5_1` int(11) NOT NULL,
  `emtiazm_dast5_1` int(11) NOT NULL,
  `files_dast5_1` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast5_2` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast5_2` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast5_2` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast5_2` int(11) NOT NULL,
  `emtiazm_dast5_2` int(11) NOT NULL,
  `files_dast5_2` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast5_3` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast5_3` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast5_3` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast5_3` int(11) NOT NULL,
  `emtiazm_dast5_3` int(11) NOT NULL,
  `files_dast5_3` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast5_4` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast5_4` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast5_4` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast5_4` int(11) NOT NULL,
  `emtiazm_dast5_4` int(11) NOT NULL,
  `files_dast5_4` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast6_1` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast6_1` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast6_1` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast6_1` int(11) NOT NULL,
  `emtiazm_dast6_1` int(11) NOT NULL,
  `files_dast6_1` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast6_2` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast6_2` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast6_2` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast6_2` int(11) NOT NULL,
  `emtiazm_dast6_2` int(11) NOT NULL,
  `files_dast6_2` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast6_3` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast6_3` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast6_3` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast6_3` int(11) NOT NULL,
  `emtiazm_dast6_3` int(11) NOT NULL,
  `files_dast6_3` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_dast6_4` text COLLATE utf8_persian_ci NOT NULL,
  `marja_dast6_4` text COLLATE utf8_persian_ci NOT NULL,
  `date_dast6_4` text COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_dast6_4` int(11) NOT NULL,
  `emtiazm_dast6_4` int(11) NOT NULL,
  `files_dast6_4` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_niroo1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `tahsil_niroo1` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `hamkari_niroo1` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `sabeghe_niroo1` int(2) NOT NULL,
  `bime_niroo1` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_niroo1` int(11) NOT NULL,
  `onvan_niroo2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `tahsil_niroo2` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `hamkari_niroo2` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `sabeghe_niroo2` int(2) NOT NULL,
  `bime_niroo2` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_niroo2` int(11) NOT NULL,
  `onvan_niroo3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `tahsil_niroo3` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `hamkari_niroo3` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `sabeghe_niroo3` int(2) NOT NULL,
  `bime_niroo3` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_niroo3` int(11) NOT NULL,
  `onvan_niroo4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `tahsil_niroo4` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `hamkari_niroo4` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `sabeghe_niroo4` int(2) NOT NULL,
  `bime_niroo4` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_niroo4` int(11) NOT NULL,
  `onvan_niroo5` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `tahsil_niroo5` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `hamkari_niroo5` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `sabeghe_niroo5` int(2) NOT NULL,
  `bime_niroo5` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_niroo5` int(11) NOT NULL,
  `onvan_niroo6` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `tahsil_niroo6` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `hamkari_niroo6` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `sabeghe_niroo6` int(2) NOT NULL,
  `bime_niroo6` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_niroo6` int(11) NOT NULL,
  `onvan_niroo7` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `tahsil_niroo7` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `hamkari_niroo7` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `sabeghe_niroo7` int(2) NOT NULL,
  `bime_niroo7` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_niroo7` int(11) NOT NULL,
  `onvan_niroo8` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `tahsil_niroo8` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `hamkari_niroo8` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `sabeghe_niroo8` int(2) NOT NULL,
  `bime_niroo8` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_niroo8` int(11) NOT NULL,
  `onvan_niroo9` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `tahsil_niroo9` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `hamkari_niroo9` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `sabeghe_niroo9` int(2) NOT NULL,
  `bime_niroo9` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_niroo9` int(11) NOT NULL,
  `onvan_niroo10` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `tahsil_niroo10` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `hamkari_niroo10` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `sabeghe_niroo10` int(2) NOT NULL,
  `bime_niroo10` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_niroo10` int(11) NOT NULL,
  `files_niroo` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `onvan_bazar1_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_bazar1_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_bazar1_1` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `type_bazar1_1` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_bazar1_1` int(11) NOT NULL,
  `onvan_bazar1_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_bazar1_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_bazar1_2` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `type_bazar1_2` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_bazar1_2` int(11) NOT NULL,
  `onvan_bazar1_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_bazar1_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_bazar1_3` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `type_bazar1_3` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_bazar1_3` int(11) NOT NULL,
  `onvan_bazar1_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_bazar1_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_bazar1_4` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `type_bazar1_4` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_bazar1_4` int(11) NOT NULL,
  `note_bazar1` text COLLATE utf8_persian_ci NOT NULL,
  `onvan_bazar2` text COLLATE utf8_persian_ci NOT NULL,
  `files_bazar2` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `onvan_bazar3_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_bazar3_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `bargozar_bazar3_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_bazar3_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_bazar3_1` int(11) NOT NULL,
  `onvan_bazar3_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_bazar3_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `bargozar_bazar3_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_bazar3_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_bazar3_2` int(11) NOT NULL,
  `onvan_bazar3_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_bazar3_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `bargozar_bazar3_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_bazar3_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_bazar3_3` int(11) NOT NULL,
  `onvan_bazar3_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_bazar3_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `bargozar_bazar3_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_bazar3_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_bazar3_4` int(11) NOT NULL,
  `note_bazar3` text COLLATE utf8_persian_ci NOT NULL,
  `files_bazar3_1` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_bazar3_2` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_bazar3_3` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_bazar3_4` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `onvan_bazar4_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_bazar4_1` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `mahal_bazar4_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `naghsh_bazar4_1` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_bazar4_1` int(11) NOT NULL,
  `onvan_bazar4_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_bazar4_2` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `mahal_bazar4_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `naghsh_bazar4_2` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_bazar4_2` int(11) NOT NULL,
  `onvan_bazar4_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_bazar4_3` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `mahal_bazar4_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `naghsh_bazar4_3` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_bazar4_3` int(11) NOT NULL,
  `onvan_bazar4_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_bazar4_4` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `mahal_bazar4_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `naghsh_bazar4_4` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_bazar4_4` int(11) NOT NULL,
  `note_bazar4` text COLLATE utf8_persian_ci NOT NULL,
  `files_bazar4_1` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_bazar4_2` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_bazar4_3` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_bazar4_4` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_bazar1_1` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_bazar1_2` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_bazar1_3` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_bazar1_4` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `onvan_amoozeshi1_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_amoozeshi1_1` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `bargozar_amoozeshi1_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_amoozeshi1_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_amoozeshi1_1` int(11) NOT NULL,
  `onvan_amoozeshi1_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_amoozeshi1_2` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `bargozar_amoozeshi1_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_amoozeshi1_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_amoozeshi1_2` int(11) NOT NULL,
  `onvan_amoozeshi1_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_amoozeshi1_3` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `bargozar_amoozeshi1_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_amoozeshi1_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_amoozeshi1_3` int(11) NOT NULL,
  `onvan_amoozeshi1_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_amoozeshi1_4` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `bargozar_amoozeshi1_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `mahal_amoozeshi1_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_amoozeshi1_4` int(11) NOT NULL,
  `note_amoozeshi1` text COLLATE utf8_persian_ci NOT NULL,
  `files_amoozeshi1_1` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_amoozeshi1_2` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_amoozeshi1_3` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_amoozeshi1_4` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `onvan_amoozeshi2_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_amoozeshi2_1` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `mahal_amoozeshi2_1` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `naghsh_amoozeshi2_1` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_amoozeshi2_1` int(11) NOT NULL,
  `onvan_amoozeshi2_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_amoozeshi2_2` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `mahal_amoozeshi2_2` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `naghsh_amoozeshi2_2` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_amoozeshi2_2` int(11) NOT NULL,
  `onvan_amoozeshi2_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_amoozeshi2_3` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `mahal_amoozeshi2_3` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `naghsh_amoozeshi2_3` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_amoozeshi2_3` int(11) NOT NULL,
  `onvan_amoozeshi2_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date_amoozeshi2_4` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `mahal_amoozeshi2_4` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `naghsh_amoozeshi2_4` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_amoozeshi2_4` int(11) NOT NULL,
  `note_amoozeshi2` text COLLATE utf8_persian_ci NOT NULL,
  `files_amoozeshi2_1` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_amoozeshi2_2` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_amoozeshi2_3` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `files_amoozeshi2_4` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz_taamolp1` int(11) NOT NULL,
  `emtiaz_taamolp2` int(11) NOT NULL,
  `emtiaz_taamolp3` int(11) NOT NULL,
  `emtiaz_taamolp4` int(11) NOT NULL,
  `emtiaz_taamolp5` int(11) NOT NULL,
  `emtiaz_taamols1` int(11) NOT NULL,
  `emtiaz_taamols2` int(11) NOT NULL,
  `nazar_sanji1` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nazar_sanji2` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nazar_sanji3` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nazar_sanji4` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nazar_sanji5` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nazar_sanji6` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nazar_sanji7` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nazar_sanji8` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nazar_sanji9` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nazar_sanji10` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nazar_sanji11` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nazar_sanji12` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nazar_sanji13` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `nazar_sanji14` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `report` text COLLATE utf8_persian_ci NOT NULL,
  `emtiazm_mali1_1` int(11) NOT NULL,
  `emtiazm_mali1_2` int(11) NOT NULL,
  `emtiazm_mali1_3` int(11) NOT NULL,
  `emtiazm_mali1_4` int(11) NOT NULL,
  `emtiazm_mali2_1` int(11) NOT NULL,
  `emtiazm_mali2_2` int(11) NOT NULL,
  `emtiazm_mali2_3` int(11) NOT NULL,
  `emtiazm_mali2_4` int(11) NOT NULL,
  `emtiazm_mali3_1` int(11) NOT NULL,
  `emtiazm_mali3_2` int(11) NOT NULL,
  `emtiazm_mali3_3` int(11) NOT NULL,
  `emtiazm_mali3_4` int(11) NOT NULL,
  `emtiazm_mali4_1` int(11) NOT NULL,
  `emtiazm_mali4_2` int(11) NOT NULL,
  `emtiazm_mali4_3` int(11) NOT NULL,
  `emtiazm_mali4_4` int(11) NOT NULL,
  `emtiazm_niroo1` int(11) NOT NULL,
  `emtiazm_niroo2` int(11) NOT NULL,
  `emtiazm_niroo3` int(11) NOT NULL,
  `emtiazm_niroo4` int(11) NOT NULL,
  `emtiazm_niroo5` int(11) NOT NULL,
  `emtiazm_niroo6` int(11) NOT NULL,
  `emtiazm_niroo7` int(11) NOT NULL,
  `emtiazm_niroo8` int(11) NOT NULL,
  `emtiazm_niroo9` int(11) NOT NULL,
  `emtiazm_niroo10` int(11) NOT NULL,
  `emtiazm_bazar1_1` int(11) NOT NULL,
  `emtiazm_bazar1_2` int(11) NOT NULL,
  `emtiazm_bazar1_3` int(11) NOT NULL,
  `emtiazm_bazar1_4` int(11) NOT NULL,
  `emtiazm_bazar3_1` int(11) NOT NULL,
  `emtiazm_bazar3_2` int(11) NOT NULL,
  `emtiazm_bazar3_3` int(11) NOT NULL,
  `emtiazm_bazar3_4` int(11) NOT NULL,
  `emtiazm_bazar4_1` int(11) NOT NULL,
  `emtiazm_bazar4_2` int(11) NOT NULL,
  `emtiazm_bazar4_3` int(11) NOT NULL,
  `emtiazm_bazar4_4` int(11) NOT NULL,
  `emtiazm_amoozeshi1_1` int(11) NOT NULL,
  `emtiazm_amoozeshi1_2` int(11) NOT NULL,
  `emtiazm_amoozeshi1_3` int(11) NOT NULL,
  `emtiazm_amoozeshi1_4` int(11) NOT NULL,
  `emtiazm_amoozeshi2_1` int(11) NOT NULL,
  `emtiazm_amoozeshi2_2` int(11) NOT NULL,
  `emtiazm_amoozeshi2_3` int(11) NOT NULL,
  `emtiazm_amoozeshi2_4` int(11) NOT NULL,
  `emtiazm_taamolp1` int(11) NOT NULL,
  `emtiazm_taamolp2` int(11) NOT NULL,
  `emtiazm_taamolp3` int(11) NOT NULL,
  `emtiazm_taamolp4` int(11) NOT NULL,
  `emtiazm_taamolp5` int(11) NOT NULL,
  `emtiazm_taamols1` int(11) NOT NULL,
  `emtiazm_taamols2` int(11) NOT NULL,
  `emtiaz_bazar2` int(11) NOT NULL,
  `emtiazm_bazar2` int(11) NOT NULL,
  `send` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `emtiaz`
--

INSERT INTO `emtiaz` (`code`, `code_state`, `code_user`, `code_center`, `year`, `onvan_mali1_1`, `mahal_mali1_1`, `karfarma_mali1_1`, `mablagh_mali1_1`, `emtiaz_mali1_1`, `onvan_mali1_2`, `mahal_mali1_2`, `karfarma_mali1_2`, `mablagh_mali1_2`, `emtiaz_mali1_2`, `onvan_mali1_3`, `mahal_mali1_3`, `karfarma_mali1_3`, `mablagh_mali1_3`, `emtiaz_mali1_3`, `onvan_mali1_4`, `mahal_mali1_4`, `karfarma_mali1_4`, `mablagh_mali1_4`, `emtiaz_mali1_4`, `note_mali1`, `files_mali1_1`, `files_mali1_2`, `files_mali1_3`, `files_mali1_4`, `onvan_mali2_1`, `mahal_mali2_1`, `karfarma_mali2_1`, `mablagh_mali2_1`, `darsad_mali2_1`, `emtiaz_mali2_1`, `onvan_mali2_2`, `mahal_mali2_2`, `karfarma_mali2_2`, `mablagh_mali2_2`, `darsad_mali2_2`, `emtiaz_mali2_2`, `onvan_mali2_3`, `mahal_mali2_3`, `karfarma_mali2_3`, `mablagh_mali2_3`, `darsad_mali2_3`, `emtiaz_mali2_3`, `onvan_mali2_4`, `mahal_mali2_4`, `karfarma_mali2_4`, `mablagh_mali2_4`, `darsad_mali2_4`, `emtiaz_mali2_4`, `note_mali2`, `files_mali2_1`, `files_mali2_2`, `files_mali2_3`, `files_mali2_4`, `onvan_mali3_1`, `mahal_mali3_1`, `karfarma_mali3_1`, `mablagh_mali3_1`, `darsad_mali3_1`, `emtiaz_mali3_1`, `onvan_mali3_2`, `mahal_mali3_2`, `karfarma_mali3_2`, `mablagh_mali3_2`, `darsad_mali3_2`, `emtiaz_mali3_2`, `onvan_mali3_3`, `mahal_mali3_3`, `karfarma_mali3_3`, `mablagh_mali3_3`, `darsad_mali3_3`, `emtiaz_mali3_3`, `onvan_mali3_4`, `mahal_mali3_4`, `karfarma_mali3_4`, `mablagh_mali3_4`, `darsad_mali3_4`, `emtiaz_mali3_4`, `note_mali3`, `files_mali3_1`, `files_mali3_2`, `files_mali3_3`, `files_mali3_4`, `onvan_mali4_1`, `mablagh_mali4_1`, `emtiaz_mali4_1`, `onvan_mali4_2`, `mablagh_mali4_2`, `emtiaz_mali4_2`, `onvan_mali4_3`, `mablagh_mali4_3`, `emtiaz_mali4_3`, `onvan_mali4_4`, `mablagh_mali4_4`, `emtiaz_mali4_4`, `note_mali4`, `files_mali4_1`, `files_mali4_2`, `files_mali4_3`, `files_mali4_4`, `onvan_dast1_1`, `marja_dast1_1`, `date_dast1_1`, `emtiaz_dast1_1`, `emtiazm_dast1_1`, `files_dast1_1`, `onvan_dast1_2`, `marja_dast1_2`, `date_dast1_2`, `emtiaz_dast1_2`, `emtiazm_dast1_2`, `files_dast1_2`, `onvan_dast1_3`, `marja_dast1_3`, `date_dast1_3`, `emtiaz_dast1_3`, `emtiazm_dast1_3`, `files_dast1_3`, `onvan_dast1_4`, `marja_dast1_4`, `date_dast1_4`, `emtiaz_dast1_4`, `emtiazm_dast1_4`, `files_dast1_4`, `onvan_dast2_1`, `marja_dast2_1`, `date_dast2_1`, `emtiaz_dast2_1`, `emtiazm_dast2_1`, `files_dast2_1`, `onvan_dast2_2`, `marja_dast2_2`, `date_dast2_2`, `emtiaz_dast2_2`, `emtiazm_dast2_2`, `files_dast2_2`, `onvan_dast2_3`, `marja_dast2_3`, `date_dast2_3`, `emtiaz_dast2_3`, `emtiazm_dast2_3`, `files_dast2_3`, `onvan_dast2_4`, `marja_dast2_4`, `date_dast2_4`, `emtiaz_dast2_4`, `emtiazm_dast2_4`, `files_dast2_4`, `onvan_dast3_1`, `marja_dast3_1`, `date_dast3_1`, `emtiaz_dast3_1`, `emtiazm_dast3_1`, `files_dast3_1`, `onvan_dast3_2`, `marja_dast3_2`, `date_dast3_2`, `emtiaz_dast3_2`, `emtiazm_dast3_2`, `files_dast3_2`, `onvan_dast3_3`, `marja_dast3_3`, `date_dast3_3`, `emtiaz_dast3_3`, `emtiazm_dast3_3`, `files_dast3_3`, `onvan_dast3_4`, `marja_dast3_4`, `date_dast3_4`, `emtiaz_dast3_4`, `emtiazm_dast3_4`, `files_dast3_4`, `onvan_dast4_1`, `marja_dast4_1`, `date_dast4_1`, `emtiaz_dast4_1`, `emtiazm_dast4_1`, `files_dast4_1`, `onvan_dast4_2`, `marja_dast4_2`, `date_dast4_2`, `emtiaz_dast4_2`, `emtiazm_dast4_2`, `files_dast4_2`, `onvan_dast4_3`, `marja_dast4_3`, `date_dast4_3`, `emtiaz_dast4_3`, `emtiazm_dast4_3`, `files_dast4_3`, `onvan_dast4_4`, `marja_dast4_4`, `date_dast4_4`, `emtiaz_dast4_4`, `emtiazm_dast4_4`, `files_dast4_4`, `onvan_dast5_1`, `marja_dast5_1`, `date_dast5_1`, `emtiaz_dast5_1`, `emtiazm_dast5_1`, `files_dast5_1`, `onvan_dast5_2`, `marja_dast5_2`, `date_dast5_2`, `emtiaz_dast5_2`, `emtiazm_dast5_2`, `files_dast5_2`, `onvan_dast5_3`, `marja_dast5_3`, `date_dast5_3`, `emtiaz_dast5_3`, `emtiazm_dast5_3`, `files_dast5_3`, `onvan_dast5_4`, `marja_dast5_4`, `date_dast5_4`, `emtiaz_dast5_4`, `emtiazm_dast5_4`, `files_dast5_4`, `onvan_dast6_1`, `marja_dast6_1`, `date_dast6_1`, `emtiaz_dast6_1`, `emtiazm_dast6_1`, `files_dast6_1`, `onvan_dast6_2`, `marja_dast6_2`, `date_dast6_2`, `emtiaz_dast6_2`, `emtiazm_dast6_2`, `files_dast6_2`, `onvan_dast6_3`, `marja_dast6_3`, `date_dast6_3`, `emtiaz_dast6_3`, `emtiazm_dast6_3`, `files_dast6_3`, `onvan_dast6_4`, `marja_dast6_4`, `date_dast6_4`, `emtiaz_dast6_4`, `emtiazm_dast6_4`, `files_dast6_4`, `onvan_niroo1`, `tahsil_niroo1`, `hamkari_niroo1`, `sabeghe_niroo1`, `bime_niroo1`, `emtiaz_niroo1`, `onvan_niroo2`, `tahsil_niroo2`, `hamkari_niroo2`, `sabeghe_niroo2`, `bime_niroo2`, `emtiaz_niroo2`, `onvan_niroo3`, `tahsil_niroo3`, `hamkari_niroo3`, `sabeghe_niroo3`, `bime_niroo3`, `emtiaz_niroo3`, `onvan_niroo4`, `tahsil_niroo4`, `hamkari_niroo4`, `sabeghe_niroo4`, `bime_niroo4`, `emtiaz_niroo4`, `onvan_niroo5`, `tahsil_niroo5`, `hamkari_niroo5`, `sabeghe_niroo5`, `bime_niroo5`, `emtiaz_niroo5`, `onvan_niroo6`, `tahsil_niroo6`, `hamkari_niroo6`, `sabeghe_niroo6`, `bime_niroo6`, `emtiaz_niroo6`, `onvan_niroo7`, `tahsil_niroo7`, `hamkari_niroo7`, `sabeghe_niroo7`, `bime_niroo7`, `emtiaz_niroo7`, `onvan_niroo8`, `tahsil_niroo8`, `hamkari_niroo8`, `sabeghe_niroo8`, `bime_niroo8`, `emtiaz_niroo8`, `onvan_niroo9`, `tahsil_niroo9`, `hamkari_niroo9`, `sabeghe_niroo9`, `bime_niroo9`, `emtiaz_niroo9`, `onvan_niroo10`, `tahsil_niroo10`, `hamkari_niroo10`, `sabeghe_niroo10`, `bime_niroo10`, `emtiaz_niroo10`, `files_niroo`, `onvan_bazar1_1`, `mahal_bazar1_1`, `date_bazar1_1`, `type_bazar1_1`, `emtiaz_bazar1_1`, `onvan_bazar1_2`, `mahal_bazar1_2`, `date_bazar1_2`, `type_bazar1_2`, `emtiaz_bazar1_2`, `onvan_bazar1_3`, `mahal_bazar1_3`, `date_bazar1_3`, `type_bazar1_3`, `emtiaz_bazar1_3`, `onvan_bazar1_4`, `mahal_bazar1_4`, `date_bazar1_4`, `type_bazar1_4`, `emtiaz_bazar1_4`, `note_bazar1`, `onvan_bazar2`, `files_bazar2`, `onvan_bazar3_1`, `date_bazar3_1`, `bargozar_bazar3_1`, `mahal_bazar3_1`, `emtiaz_bazar3_1`, `onvan_bazar3_2`, `date_bazar3_2`, `bargozar_bazar3_2`, `mahal_bazar3_2`, `emtiaz_bazar3_2`, `onvan_bazar3_3`, `date_bazar3_3`, `bargozar_bazar3_3`, `mahal_bazar3_3`, `emtiaz_bazar3_3`, `onvan_bazar3_4`, `date_bazar3_4`, `bargozar_bazar3_4`, `mahal_bazar3_4`, `emtiaz_bazar3_4`, `note_bazar3`, `files_bazar3_1`, `files_bazar3_2`, `files_bazar3_3`, `files_bazar3_4`, `onvan_bazar4_1`, `date_bazar4_1`, `mahal_bazar4_1`, `naghsh_bazar4_1`, `emtiaz_bazar4_1`, `onvan_bazar4_2`, `date_bazar4_2`, `mahal_bazar4_2`, `naghsh_bazar4_2`, `emtiaz_bazar4_2`, `onvan_bazar4_3`, `date_bazar4_3`, `mahal_bazar4_3`, `naghsh_bazar4_3`, `emtiaz_bazar4_3`, `onvan_bazar4_4`, `date_bazar4_4`, `mahal_bazar4_4`, `naghsh_bazar4_4`, `emtiaz_bazar4_4`, `note_bazar4`, `files_bazar4_1`, `files_bazar4_2`, `files_bazar4_3`, `files_bazar4_4`, `files_bazar1_1`, `files_bazar1_2`, `files_bazar1_3`, `files_bazar1_4`, `onvan_amoozeshi1_1`, `date_amoozeshi1_1`, `bargozar_amoozeshi1_1`, `mahal_amoozeshi1_1`, `emtiaz_amoozeshi1_1`, `onvan_amoozeshi1_2`, `date_amoozeshi1_2`, `bargozar_amoozeshi1_2`, `mahal_amoozeshi1_2`, `emtiaz_amoozeshi1_2`, `onvan_amoozeshi1_3`, `date_amoozeshi1_3`, `bargozar_amoozeshi1_3`, `mahal_amoozeshi1_3`, `emtiaz_amoozeshi1_3`, `onvan_amoozeshi1_4`, `date_amoozeshi1_4`, `bargozar_amoozeshi1_4`, `mahal_amoozeshi1_4`, `emtiaz_amoozeshi1_4`, `note_amoozeshi1`, `files_amoozeshi1_1`, `files_amoozeshi1_2`, `files_amoozeshi1_3`, `files_amoozeshi1_4`, `onvan_amoozeshi2_1`, `date_amoozeshi2_1`, `mahal_amoozeshi2_1`, `naghsh_amoozeshi2_1`, `emtiaz_amoozeshi2_1`, `onvan_amoozeshi2_2`, `date_amoozeshi2_2`, `mahal_amoozeshi2_2`, `naghsh_amoozeshi2_2`, `emtiaz_amoozeshi2_2`, `onvan_amoozeshi2_3`, `date_amoozeshi2_3`, `mahal_amoozeshi2_3`, `naghsh_amoozeshi2_3`, `emtiaz_amoozeshi2_3`, `onvan_amoozeshi2_4`, `date_amoozeshi2_4`, `mahal_amoozeshi2_4`, `naghsh_amoozeshi2_4`, `emtiaz_amoozeshi2_4`, `note_amoozeshi2`, `files_amoozeshi2_1`, `files_amoozeshi2_2`, `files_amoozeshi2_3`, `files_amoozeshi2_4`, `emtiaz_taamolp1`, `emtiaz_taamolp2`, `emtiaz_taamolp3`, `emtiaz_taamolp4`, `emtiaz_taamolp5`, `emtiaz_taamols1`, `emtiaz_taamols2`, `nazar_sanji1`, `nazar_sanji2`, `nazar_sanji3`, `nazar_sanji4`, `nazar_sanji5`, `nazar_sanji6`, `nazar_sanji7`, `nazar_sanji8`, `nazar_sanji9`, `nazar_sanji10`, `nazar_sanji11`, `nazar_sanji12`, `nazar_sanji13`, `nazar_sanji14`, `report`, `emtiazm_mali1_1`, `emtiazm_mali1_2`, `emtiazm_mali1_3`, `emtiazm_mali1_4`, `emtiazm_mali2_1`, `emtiazm_mali2_2`, `emtiazm_mali2_3`, `emtiazm_mali2_4`, `emtiazm_mali3_1`, `emtiazm_mali3_2`, `emtiazm_mali3_3`, `emtiazm_mali3_4`, `emtiazm_mali4_1`, `emtiazm_mali4_2`, `emtiazm_mali4_3`, `emtiazm_mali4_4`, `emtiazm_niroo1`, `emtiazm_niroo2`, `emtiazm_niroo3`, `emtiazm_niroo4`, `emtiazm_niroo5`, `emtiazm_niroo6`, `emtiazm_niroo7`, `emtiazm_niroo8`, `emtiazm_niroo9`, `emtiazm_niroo10`, `emtiazm_bazar1_1`, `emtiazm_bazar1_2`, `emtiazm_bazar1_3`, `emtiazm_bazar1_4`, `emtiazm_bazar3_1`, `emtiazm_bazar3_2`, `emtiazm_bazar3_3`, `emtiazm_bazar3_4`, `emtiazm_bazar4_1`, `emtiazm_bazar4_2`, `emtiazm_bazar4_3`, `emtiazm_bazar4_4`, `emtiazm_amoozeshi1_1`, `emtiazm_amoozeshi1_2`, `emtiazm_amoozeshi1_3`, `emtiazm_amoozeshi1_4`, `emtiazm_amoozeshi2_1`, `emtiazm_amoozeshi2_2`, `emtiazm_amoozeshi2_3`, `emtiazm_amoozeshi2_4`, `emtiazm_taamolp1`, `emtiazm_taamolp2`, `emtiazm_taamolp3`, `emtiazm_taamolp4`, `emtiazm_taamolp5`, `emtiazm_taamols1`, `emtiazm_taamols2`, `emtiaz_bazar2`, `emtiazm_bazar2`, `send`) VALUES
(90, 22, 103, 233, '1398', 'تینتسیت یس', '', '', 13123323, 0, '', '', '', 0, 0, '', '', '', 0, 0, '', '', '', 0, 0, '', '5cd3213190e86.jpg,5cd32133b7bf2.pdf', '', '', '', '', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, 0, '', '', '', '', 0, '', 0, '', '', '', 0, '', 0, '', '', '', 0, '', 0, '', '', '', 0, '', 0, '', '', '', 0, '', 0, '', '', '', 0, '', 0, '', '', '', 0, '', 0, '', '', '', 0, '', 0, '', '', '', 0, '', 0, '', '', '', 0, '', 0, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hoze`
--

CREATE TABLE `hoze` (
  `code` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `hoze`
--

INSERT INTO `hoze` (`code`, `name`) VALUES
(1, 'کامپیوتر'),
(3, 'الکترونیک'),
(4, 'کشاورزی'),
(5, 'شیلات'),
(7, 'ساخت و تولید'),
(8, 'صنایع غذایی'),
(9, 'صنایع شیمیایی'),
(10, 'فناوری اطلاعات و ارتباطات'),
(11, 'خدمات غیر مهندسی'),
(12, 'صنایغ جانبی فرآوری گیاهان دارویی'),
(13, 'صنایع مرتبط با حوزه آبزی پروری'),
(14, 'خدمات مهندسی'),
(15, 'بیوتکنولوژی غذایی'),
(16, 'صنایع جانبی کشاورزی'),
(17, 'مکانیک'),
(18, 'صنایع پلیمر'),
(19, 'بیوتکنولوژی'),
(20, 'بیوتکنولوژی پزشکی'),
(21, 'خدمات آزمایشگاهی'),
(22, 'صنایع دستی'),
(23, 'صنایع جانبی چوب و کاغذ'),
(24, 'صنایع جانبی حوزه سلامت'),
(25, 'فناوری نانو'),
(26, 'خدمات مهندسی حوزه آب');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `code` int(11) NOT NULL,
  `code_from` int(11) NOT NULL,
  `code_to` int(11) NOT NULL,
  `date` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `time` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `msg` text COLLATE utf8_persian_ci NOT NULL,
  `visit` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`code`, `code_from`, `code_to`, `date`, `time`, `msg`, `visit`) VALUES
(98, 14, 115, '1398/5/1', '6:11:12', 'سلام به همه', 0),
(92, 14, 14, '1', '2', 'سلام. چطوری ؟', 1),
(91, 14, 14, '1', '2', 'سلام. چطوری ؟', 1),
(94, 103, 14, '1', '2', 'سلام. چطوری ؟', 1),
(95, 103, 14, '1', '2', 'سلام. چطوری ؟', 1),
(96, 103, 14, '1', '2', 'سلام. چطوری ؟', 1),
(97, 103, 14, '1', '2', 'سلام. چطوری ؟', 1),
(99, 14, 104, '1398/5/1', '6:11:12', 'سلام به همه', 0),
(100, 14, 105, '1398/5/1', '6:11:12', 'سلام به همه', 0),
(101, 14, 112, '1398/5/1', '6:11:12', 'سلام به همه', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nazerin`
--

CREATE TABLE `nazerin` (
  `code` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `center_code` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `nazerin`
--

INSERT INTO `nazerin` (`code`, `name`, `logo`, `center_code`) VALUES
(1, 'علی احمدی', '5c666d2dd6f84.jpg', 1),
(3, 'سعید سعیدی', '5c6671e0d1654.png', 1),
(4, 'رضا ابراهیمی', '5c6671eaf2b5e.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `code` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`code`, `name`, `logo`) VALUES
(29, '5', '5d56a105b2bec.jpg'),
(28, '4', 'no-image.jpg'),
(27, '3', 'no-image.jpg'),
(26, '2', 'no-image.jpg'),
(1, 'گیلان', 'no-image.jpg'),
(23, 'خراسان رضوی', 'no-image.jpg'),
(25, '1', 'no-image.jpg'),
(30, '6', 'no-image.jpg'),
(31, '7', 'no-image.jpg'),
(32, '8', 'no-image.jpg'),
(33, '9', 'no-image.jpg'),
(34, '10', 'no-image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `code` int(11) NOT NULL,
  `state_code` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_type` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `center_code` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `tel` text COLLATE utf8_persian_ci NOT NULL,
  `email` text COLLATE utf8_persian_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`code`, `state_code`, `username`, `password`, `user_type`, `center_code`, `name`, `tel`, `email`, `logo`) VALUES
(14, 0, 'admin_all', '202cb962ac59075b964b07152d234b70', 'admin_all', 0, 'عبدالرضا جوافشانی', '', 'joe.afshany@gmail.com', '5d568547f149b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `zamine`
--

CREATE TABLE `zamine` (
  `code` int(11) NOT NULL,
  `code_hoze` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `zamine`
--

INSERT INTO `zamine` (`code`, `code_hoze`, `name`) VALUES
(1, 1, 'برنامه نویسی'),
(2, 1, 'سخت افزار'),
(3, 4, 'گیاهان دارویی'),
(4, 4, 'گیاهای زینتی'),
(5, 4, 'گیاهان آپارتمانی');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `corps`
--
ALTER TABLE `corps`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `emtiaz`
--
ALTER TABLE `emtiaz`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `hoze`
--
ALTER TABLE `hoze`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `nazerin`
--
ALTER TABLE `nazerin`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `zamine`
--
ALTER TABLE `zamine`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `corps`
--
ALTER TABLE `corps`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `emtiaz`
--
ALTER TABLE `emtiaz`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `hoze`
--
ALTER TABLE `hoze`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `nazerin`
--
ALTER TABLE `nazerin`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `zamine`
--
ALTER TABLE `zamine`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
