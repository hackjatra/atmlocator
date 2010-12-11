-- phpMyAdmin SQL Dump
-- version 3.2.2.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2010 at 09:23 PM
-- Server version: 5.1.49
-- PHP Version: 5.2.10-2ubuntu6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `hackjatra_atmlocator`
--

--
-- Dumping data for table `atm`
--

INSERT INTO `atm` (`id`, `bank_id`, `atm_network_id`, `latitude`, `longitude`, `descriptive_location`, `languages`, `card_usage`, `charges`, `one_time_withdraw_limit`, `additional_property`, `description`, `verification_description`) VALUES
(1, 1, 1, '27.680270000000', '85.315890000000', 'Pulchowk, Opposite to UN Office', '', 'swipe', NULL, NULL, NULL, NULL, NULL);

--
-- Dumping data for table `atm_network`
--

INSERT INTO `atm_network` (`id`, `name`, `accepting_countries`) VALUES
(1, 'Visa Electron', 'Nepal, India');

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `bank_name`, `identifier`, `daily_withdraw_limit`, `one_time_withdraw_limit`) VALUES
(1, 'Nepal Investment Bank Limited', 'NIBL', 50000, 20000);

--
-- Dumping data for table `rating`
--


--
-- Dumping data for table `rating_attribute`
--


--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'moderator'),
(3, 'user');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `token`, `username`, `email`, `role_id`, `is_active`, `credibility`) VALUES
(1, '1', 'admin', 'hackjatra@gmail.com', 1, 1, 0);

