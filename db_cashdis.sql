-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2014 at 02:26 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_cashdis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` tinytext NOT NULL,
  `s_img` tinytext NOT NULL,
  `i_hide` int(11) NOT NULL DEFAULT '0',
  `i_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`pk_id`, `s_name`, `s_img`, `i_hide`, `i_status`) VALUES
(6, 'Books', '14037824217638.jpg', 0, 0),
(7, 'FASHION', '14037825319944.jpg', 0, 0),
(8, 'Foods', '14037825955395.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_state` int(11) NOT NULL,
  `s_name` tinytext NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`pk_id`, `fk_state`, `s_name`) VALUES
(7, 9, 'cochin'),
(8, 9, 'Trivandrum');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` tinytext NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`pk_id`, `s_name`) VALUES
(12, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback_bill`
--

CREATE TABLE IF NOT EXISTS `tbl_feedback_bill` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_i_uid` int(11) NOT NULL COMMENT 'User Id from User table',
  `fk_i_shop` int(11) NOT NULL,
  `s_bill_id` tinytext NOT NULL,
  `f_bill_amnt` float NOT NULL,
  `i_bonus` int(11) NOT NULL,
  `s_attachment` tinytext NOT NULL,
  `i_verify` int(11) NOT NULL DEFAULT '0',
  `i_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_feedback_bill`
--

INSERT INTO `tbl_feedback_bill` (`pk_id`, `fk_i_uid`, `fk_i_shop`, `s_bill_id`, `f_bill_amnt`, `i_bonus`, `s_attachment`, `i_verify`, `i_status`) VALUES
(3, 3, 12, '4324342', 1000, 20, 'Bill-Receipt-Template.jpg', 1, 0),
(4, 3, 13, '234324', 500, 10, 'Bill-Receipt-Template.jpg', 1, 0),
(5, 4, 10, '3453423', 650, 13, 'Bill-Receipt-Template.jpg', 0, 0),
(6, 5, 14, '23432423', 300, 6, 'Bill-Receipt-Template.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE IF NOT EXISTS `tbl_location` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_city` int(11) NOT NULL,
  `s_name` tinytext NOT NULL,
  `dec_lat` decimal(10,8) NOT NULL,
  `dec_lng` decimal(11,8) NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`pk_id`, `fk_city`, `s_name`, `dec_lat`, `dec_lng`) VALUES
(6, 7, 'Kakkanadu', 0.00000000, 0.00000000),
(7, 7, 'Palarivattom', 0.00000000, 0.00000000),
(8, 7, 'Vytila', 0.00000000, 0.00000000),
(9, 8, 'Chirayinkeezhu', 0.00000000, 0.00000000),
(10, 8, 'Vizhinjam', 0.00000000, 0.00000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loyality`
--

CREATE TABLE IF NOT EXISTS `tbl_loyality` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` tinytext NOT NULL,
  `s_img` tinytext NOT NULL,
  `i_point` int(11) NOT NULL,
  `i_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_loyality`
--

INSERT INTO `tbl_loyality` (`pk_id`, `s_name`, `s_img`, `i_point`, `i_status`) VALUES
(14, 'Titan watch', '14037844120863.jpg', 200, 0),
(15, 'Teddy bear', '14037844538684.jpg', 100, 0),
(16, 'Glasses', '14037845050151.jpg', 20, 0),
(17, 'Clock', '14037845754513.jpg', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE IF NOT EXISTS `tbl_notifications` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_i_sid` int(11) NOT NULL COMMENT 'shop id from tbl_shop',
  `s_description` tinytext NOT NULL,
  `d_date` date NOT NULL,
  `i_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_notifications`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer`
--

CREATE TABLE IF NOT EXISTS `tbl_offer` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_i_shop` int(11) NOT NULL,
  `f_precentage` float NOT NULL,
  `d_from` date NOT NULL,
  `d_to` date NOT NULL,
  `i_hide` int(11) NOT NULL DEFAULT '0',
  `i_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_offer`
--

INSERT INTO `tbl_offer` (`pk_id`, `fk_i_shop`, `f_precentage`, `d_from`, `d_to`, `i_hide`, `i_status`) VALUES
(16, 12, 10, '2014-06-26', '2014-07-26', 0, 0),
(17, 10, 15, '2015-06-26', '2015-08-16', 0, 0),
(18, 11, 10, '2014-06-26', '2014-09-19', 0, 0),
(19, 13, 35, '2014-06-28', '2014-08-02', 0, 0),
(20, 14, 20, '2014-06-30', '2014-07-24', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_redeem`
--

CREATE TABLE IF NOT EXISTS `tbl_redeem` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_i_uid` int(11) NOT NULL,
  `fk_i_loyality` int(11) NOT NULL,
  `d_date` date NOT NULL,
  `i_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_redeem`
--

INSERT INTO `tbl_redeem` (`pk_id`, `fk_i_uid`, `fk_i_loyality`, `d_date`, `i_status`) VALUES
(3, 3, 16, '2014-06-26', 0),
(4, 3, 17, '2014-06-26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE IF NOT EXISTS `tbl_setting` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` tinytext NOT NULL,
  `s_value` tinytext NOT NULL,
  `e_type` tinytext NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`pk_id`, `s_name`, `s_value`, `e_type`) VALUES
(1, 'bonus_point', '50', 'INTEGER,RUPEES'),
(2, 'coupon_expiry', '6', 'INTEGER,HOURS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE IF NOT EXISTS `tbl_shop` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` tinytext NOT NULL,
  `s_decription` tinytext NOT NULL,
  `s_logo` tinytext NOT NULL,
  `fk_i_category` int(11) NOT NULL,
  `fk_i_location` int(11) NOT NULL,
  `dec_lat` decimal(10,8) NOT NULL,
  `dec_lng` decimal(11,8) NOT NULL,
  `s_cname` tinytext NOT NULL COMMENT 'contact name',
  `s_email` tinytext NOT NULL,
  `s_phone` tinytext NOT NULL,
  `s_image` tinytext NOT NULL,
  `s_video` tinytext NOT NULL,
  `s_notification1` varchar(500) NOT NULL,
  `s_notification2` varchar(500) NOT NULL,
  `d_from` date NOT NULL,
  `d_to` date NOT NULL,
  `i_hide` int(11) NOT NULL DEFAULT '0',
  `i_status` int(11) NOT NULL DEFAULT '0',
  `d_date` datetime NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`pk_id`, `s_name`, `s_decription`, `s_logo`, `fk_i_category`, `fk_i_location`, `dec_lat`, `dec_lng`, `s_cname`, `s_email`, `s_phone`, `s_image`, `s_video`, `s_notification1`, `s_notification2`, `d_from`, `d_to`, `i_hide`, `i_status`, `d_date`) VALUES
(10, 'SN BOOKSTALL & OFFICE STATIONERY ', '', '140378303333831.jpg', 6, 7, 10.01291140, 76.32906854, 'Raman Devasya', 'snbooks@gmail.com', '+(91)-9497187232', '14037830333383.jpg', 'http://', '', '', '2014-06-26', '2015-06-26', 0, 0, '2014-06-26 13:43:53'),
(11, 'Infosys', '', '14037835136472.gif', 7, 10, 8.39256365, 77.00221539, 'Aleena Joy', 'infosys@gmail.com', '+(91)-9497674563', '14037835136472.jpg', 'http://', '', '', '2014-06-27', '2015-06-27', 0, 0, '2014-06-26 13:51:53'),
(12, 'Cafe Pappaya', '', '140378365634341.jpg', 8, 7, 10.00300088, 76.30926848, 'Jacob', 'cafepappaya@gmail.com', '+(91)-9497245232', '14037836563434.jpg', 'http://', '', '', '2014-06-26', '2015-06-26', 0, 0, '2014-06-26 13:54:16'),
(13, 'Dhe Puttu', '', '140378379040321.jpg', 8, 8, 9.96855474, 76.31890655, 'Anwar', 'dheputtu@gmail.com', '+(91)-9797234232', '14037837904032.jpg', 'http://', '', '', '2014-06-26', '2015-06-26', 0, 0, '2014-06-26 13:56:30'),
(14, 'The Ambrosia', 'Mansoon Sale Offer 12%..', '140378412621231.jpg', 8, 9, 8.45675147, 77.04946518, 'Hareesh menon', 'ambrosia@gmail.com', '+(91)-9645675232', '14037841262123.jpg', 'http://', '', '', '2014-06-26', '2015-06-26', 0, 0, '2014-06-26 14:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE IF NOT EXISTS `tbl_state` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_country` int(11) NOT NULL,
  `s_name` tinytext NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`pk_id`, `fk_country`, `s_name`) VALUES
(9, 12, 'Kereala');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE IF NOT EXISTS `tbl_status` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_status` int(11) NOT NULL,
  `s_description` tinytext NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`pk_id`, `i_status`, `s_description`) VALUES
(1, 0, 'Active/Not deleted'),
(2, 1, 'Deleted'),
(3, 2, 'Blocked'),
(4, 3, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_i_type` int(11) NOT NULL,
  `s_uname` tinytext NOT NULL,
  `s_password` tinytext NOT NULL,
  `s_name` tinytext NOT NULL,
  `s_email` tinytext NOT NULL,
  `s_phone` tinytext NOT NULL,
  `f_credit` float NOT NULL DEFAULT '0',
  `f_redeemed` float NOT NULL DEFAULT '0',
  `i_hide` int(11) NOT NULL DEFAULT '0',
  `i_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`pk_id`, `fk_i_type`, `s_uname`, `s_password`, `s_name`, `s_email`, `s_phone`, `f_credit`, `f_redeemed`, `i_hide`, `i_status`) VALUES
(3, 1, '2323324342', '', 'Anoop G', '', '', 0, 30, 0, 0),
(4, 3, 'bimalmdev@gmail.com', 'missioncashdis', 'Bimal Dev M', '', '', 100, 0, 0, 0),
(5, 2, '456364432', '', 'Hareesh Menon', 'hareesh,zybo@gmail.com', '9846564563', 10, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE IF NOT EXISTS `tbl_user_type` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_type` tinytext NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`pk_id`, `s_type`) VALUES
(1, 'facebook'),
(2, 'google'),
(3, 'email');
