-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2019 年 12 月 15 日 20:35
-- 伺服器版本： 10.4.10-MariaDB
-- PHP 版本： 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `bank`
--

-- --------------------------------------------------------

--
-- 資料表結構 `Bank`
--

CREATE TABLE `Bank` (
  `Branch_code` int(11) UNSIGNED NOT NULL,
  `Address` varchar(40) DEFAULT NULL,
  `Name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `Bank`
--

INSERT INTO `Bank` (`Branch_code`, `Address`, `Name`) VALUES
(1, 'taipei', 'A'),
(2, 'yunlin', 'B'),
(3, 'taichung', 'C');

-- --------------------------------------------------------

--
-- 資料表結構 `Customers`
--

CREATE TABLE `Customers` (
  `cID` int(11) UNSIGNED NOT NULL,
  `cName` varchar(30) DEFAULT NULL,
  `cBirthday` date DEFAULT NULL,
  `cAddress` varchar(50) DEFAULT NULL,
  `cPassword` varchar(60) DEFAULT NULL,
  `cPhone` varchar(10) DEFAULT NULL,
  `cSex` char(1) DEFAULT NULL,
  `cBcode` int(11) UNSIGNED DEFAULT NULL,
  `cSsn` varchar(10) DEFAULT NULL,
  `cUName` varchar(12) DEFAULT NULL,
  `cBalance` int(20) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `Customers`
--

INSERT INTO `Customers` (`cID`, `cName`, `cBirthday`, `cAddress`, `cPassword`, `cPhone`, `cSex`, `cBcode`, `cSsn`, `cUName`, `cBalance`) VALUES
(1, 'jeff', '2017-12-13', 'yunlin no.23', NULL, '09234', 'F', 2, NULL, 'qwe', 100100),
(2, ' rick', '1999-07-02', 'taichung no.35', NULL, '09123', 'M', 3, NULL, 'zxczxc', 7000),
(9, 'Li', '2009-02-03', 'yunlin xx road no.65', '$2y$10$fpo/NtK3eWUOfxfDfQ8HruCvGHl3bjYiYItiDLwyqBZUPynUrChkm', '09844', NULL, NULL, NULL, 'd0909', 3453),
(10, 'ken', '2019-12-03', ' Commonwealth Ave no.345', '$2y$10$LZvcw./.nn/AJRdw2Y3OIeQ11Ofppo.CVkaZP6iZYusACg65kCOxa', '094434', NULL, NULL, NULL, 'd98433', 0),
(11, 'Chang Yi', '2005-02-12', '台中逢甲大學', '$2y$10$bdzx/vS8ikm6nXK/P6uwEeZhdAVvokpE.NWoecNpPjFJSo3hIDiDS', '098344', NULL, NULL, NULL, 'd0687534', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `Record`
--

CREATE TABLE `Record` (
  `Tcode` int(11) UNSIGNED NOT NULL,
  `Deposit` int(20) DEFAULT NULL,
  `Withdraw` int(20) DEFAULT NULL,
  `Rbcode` int(11) UNSIGNED DEFAULT NULL,
  `RAno` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `Record`
--

INSERT INTO `Record` (`Tcode`, `Deposit`, `Withdraw`, `Rbcode`, `RAno`) VALUES
(123, 10000, NULL, 2, 1),
(234, NULL, 10000, 3, 2);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `Bank`
--
ALTER TABLE `Bank`
  ADD PRIMARY KEY (`Branch_code`);

--
-- 資料表索引 `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`cID`),
  ADD KEY `register` (`cBcode`);

--
-- 資料表索引 `Record`
--
ALTER TABLE `Record`
  ADD PRIMARY KEY (`Tcode`),
  ADD UNIQUE KEY `RAno` (`RAno`),
  ADD KEY `return` (`Rbcode`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Customers`
--
ALTER TABLE `Customers`
  MODIFY `cID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Record`
--
ALTER TABLE `Record`
  MODIFY `RAno` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `Customers`
--
ALTER TABLE `Customers`
  ADD CONSTRAINT `register` FOREIGN KEY (`cBcode`) REFERENCES `Bank` (`Branch_code`);

--
-- 資料表的限制式 `Record`
--
ALTER TABLE `Record`
  ADD CONSTRAINT `return` FOREIGN KEY (`Rbcode`) REFERENCES `Bank` (`Branch_code`),
  ADD CONSTRAINT `transact` FOREIGN KEY (`RAno`) REFERENCES `Customers` (`cID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
