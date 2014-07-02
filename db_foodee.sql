-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2014 at 09:21 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_foodee`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`pk_id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` tinytext NOT NULL,
  `s_img` tinytext NOT NULL,
  `i_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_category`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`pk_id`, `s_name`) VALUES
(12, 'India'),
(13, 'UAE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deals`
--

CREATE TABLE IF NOT EXISTS `tbl_deals` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_title` tinytext NOT NULL,
  `s_description` tinytext NOT NULL,
  `s_detail_description` text NOT NULL,
  `d_end_time` datetime NOT NULL,
  `i_total` int(11) NOT NULL,
  `s_terms` text NOT NULL,
  `s_c_name` tinytext NOT NULL COMMENT 'contact name',
  `s_c_number` tinytext NOT NULL COMMENT 'Contact Number',
  `s_address` tinytext NOT NULL,
  `i_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_deals`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE IF NOT EXISTS `tbl_item` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_cid` int(11) NOT NULL COMMENT 'Id from tbl_category',
  `s_name` tinytext NOT NULL,
  `f_price` float NOT NULL,
  `i_item_type` int(11) NOT NULL,
  `s_img` tinytext NOT NULL,
  `i_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_item`
--


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
  `s_item` tinytext NOT NULL,
  `s_img` tinytext NOT NULL,
  `s_description` tinytext NOT NULL,
  `i_point` int(11) NOT NULL,
  `i_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_loyality`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_order_no` int(11) NOT NULL,
  `s_cust_name` tinytext NOT NULL,
  `s_cust_address` tinytext NOT NULL,
  `s_cust_phone` tinytext NOT NULL,
  `d_order_time` datetime NOT NULL,
  `fk_shop_id` int(11) NOT NULL,
  `d_delivery_time` datetime NOT NULL,
  `i_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_order`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE IF NOT EXISTS `tbl_setting` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_type` tinytext NOT NULL,
  `s_value` tinytext NOT NULL COMMENT 'value in string',
  `e_type` tinytext NOT NULL COMMENT 'Actual data type in String',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_setting`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE IF NOT EXISTS `tbl_shop` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` tinytext NOT NULL,
  `s_description` tinytext NOT NULL,
  `s_detail_description` text NOT NULL,
  `s_logo` tinytext NOT NULL,
  `f_min_order_quantity` float NOT NULL,
  `i_min_delivery_time` int(11) NOT NULL,
  `fk_i_location` int(11) NOT NULL,
  `s_address` tinytext NOT NULL,
  `s_delivery_areas` tinytext NOT NULL COMMENT 'Locations from location table seprated by commas',
  `dec_lat` decimal(10,8) NOT NULL,
  `dec_lng` decimal(11,8) NOT NULL,
  `s_conatct_name_1` tinytext NOT NULL,
  `s_conatct_name_2` tinytext NOT NULL,
  `s_contact_num_1` tinytext NOT NULL COMMENT 'first land line number',
  `s_contact_num_2` tinytext NOT NULL COMMENT 'second land line number',
  `s_contact_num_3` tinytext NOT NULL COMMENT 'first mobile number',
  `s_contact_num_4` tinytext NOT NULL COMMENT 'second mobile number',
  `s_contact_num_5` tinytext NOT NULL COMMENT 'third mobile number',
  `d_date` datetime NOT NULL,
  `i_hide` int(11) NOT NULL DEFAULT '0',
  `i_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`pk_id`, `s_name`, `s_description`, `s_detail_description`, `s_logo`, `f_min_order_quantity`, `i_min_delivery_time`, `fk_i_location`, `s_address`, `s_delivery_areas`, `dec_lat`, `dec_lng`, `s_conatct_name_1`, `s_conatct_name_2`, `s_contact_num_1`, `s_contact_num_2`, `s_contact_num_3`, `s_contact_num_4`, `s_contact_num_5`, `d_date`, `i_hide`, `i_status`) VALUES
(3, 'Shop Name1', 'Mansoon Sale Offer 12%..', 'some detailed', '14042776790236.png', 3, 10, 6, 'asdfdfdsfds', '9', 30.75127778, 81.04687214, 'Contact Person', 'Contact Person2', '2435243', '235453452435', '34251435324', '4325436534', '34252435234', '2014-07-02 07:07:59', 2, 0),
(4, 'edited shop', 'sdsd', 'sadasd', '14042796287569.png', 2, 2, 6, 'asfdafs', '7,10', 0.00000000, 0.00000000, 'Contact Person', '', '2435243', '', '34251435324', '4325436534', '', '2014-07-02 07:40:28', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE IF NOT EXISTS `tbl_state` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_country` int(11) NOT NULL,
  `s_name` tinytext NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`pk_id`, `fk_country`, `s_name`) VALUES
(9, 12, 'Kereala'),
(11, 13, 'Sharjah');

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
