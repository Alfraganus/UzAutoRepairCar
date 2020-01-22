-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2019 at 08:46 AM
-- Server version: 10.3.13-MariaDB
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itrepair`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Paint'),
(2, 'Welding 1'),
(3, 'Welding 2'),
(4, 'GA'),
(5, 'Press 1'),
(6, 'Press 2'),
(7, 'SQ 1'),
(8, 'SQ 2');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `problem_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`problem_id`, `name`) VALUES
(1, 'Зазор'),
(2, 'Задевание'),
(3, 'Зацепление'),
(4, 'Отсутствие деталей'),
(5, 'Волнистность'),
(6, 'Загиб'),
(7, 'Неполное зацепление'),
(8, 'Ненатянутый'),
(9, 'Неплосткостность'),
(10, 'Брак закрывание'),
(11, 'Неполное закрепление'),
(12, 'Отсутствует отметка'),
(13, 'Выпучивание(опухан)'),
(14, 'Отклеивание'),
(15, 'Неполное заливание'),
(16, 'Заусенец (BURR)'),
(17, 'Брак возвращ.устрой'),
(18, 'Брак детали'),
(19, 'Перекручивание'),
(20, 'Брак установки'),
(21, 'Несоответ.дтали'),
(22, 'Утечка воды/масло'),
(23, 'Шум'),
(24, 'Повреждение отделки'),
(25, 'Сварочные брызги'),
(26, 'Загрязнения'),
(27, 'Выемка'),
(28, 'Брак расположения'),
(29, 'Свободный ход'),
(30, 'Тресение'),
(31, 'Инородный звук'),
(32, 'Брак функции'),
(33, 'Брак работоспособности'),
(34, 'Усилие управления'),
(35, 'Брак регулировки'),
(36, 'Неправ.показ.стрелки'),
(37, 'Вибрация/дрожь'),
(38, 'Поломка'),
(39, 'Стирание маркировки'),
(40, 'Пасмурный вид'),
(41, 'Свободный'),
(42, 'Сварочный брак'),
(43, 'Пропуск болта/винта'),
(44, 'Неполн закреп.болтов'),
(45, 'Поврежд.болта/винта'),
(46, 'Неустановка детали'),
(47, 'Неувелечен скорости'),
(48, 'Перезаливка'),
(49, 'Задержка движения'),
(50, 'Твёрдость'),
(51, 'Задержка'),
(52, 'Увелич.тормозн пути'),
(53, 'Несоотв.болта и винта'),
(54, 'Брак зажигания'),
(55, 'Боковой снос'),
(56, 'Брак STUD болтов'),
(57, 'Дрожь двигателя'),
(58, 'Ошибка при установке'),
(59, 'Кривое установление'),
(60, 'Брак закрепления'),
(61, 'Не устан.CAP/Gromm'),
(62, 'Брак устан.CAP/Gromm'),
(63, 'Не устан.Clip/Clamp'),
(64, 'Б/закреп.Clip/Clamp'),
(65, 'Брак отверствия'),
(66, 'Мягк-ть педал.торм'),
(67, 'Твёрдость педал торм'),
(68, 'Не совпад.пресс линии'),
(69, 'Ржавчина'),
(70, 'Царапина'),
(71, 'Пузырь'),
(72, 'Брак сушки покраски'),
(73, 'След шлифовки'),
(74, 'Сварочная стружка'),
(75, 'Брак гермитизации'),
(76, 'Апельсиновая корка'),
(77, 'Инородное тело'),
(78, 'Другой цвет'),
(79, 'Распыление краски'),
(80, 'Повреждение краски'),
(81, 'Недостаток краски'),
(82, 'Кратери'),
(83, 'Трещина покрытия'),
(84, 'След полировки'),
(85, 'Ямочки'),
(86, 'Подтёк краски  лака'),
(87, 'Недосушка покраски'),
(88, 'Прочие дефекты'),
(89, 'След маскир. слоя'),
(90, 'Брак при лакировке'),
(91, 'Теч краски  лака'),
(92, 'Нет смазка'),
(93, 'Разборка для ремонта'),
(94, 'Недостатка'),
(95, 'Брак Deadaner'),
(96, 'Повреждения CAP');

-- --------------------------------------------------------

--
-- Table structure for table `problem_monitorings`
--

CREATE TABLE `problem_monitorings` (
  `id` int(11) NOT NULL,
  `sector` int(11) DEFAULT NULL,
  `shift` char(10) NOT NULL,
  `date` date DEFAULT NULL,
  `model` varchar(150) DEFAULT NULL,
  `res_person_tabel` varchar(25) DEFAULT NULL,
  `department` int(11) NOT NULL,
  `PO` varchar(100) DEFAULT NULL,
  `problem` text DEFAULT NULL,
  `spent_on` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `winno` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `repair_case` smallint(6) DEFAULT NULL,
  `money_spent` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `problem_monitorings`
--

INSERT INTO `problem_monitorings` (`id`, `sector`, `shift`, `date`, `model`, `res_person_tabel`, `department`, `PO`, `problem`, `spent_on`, `comment`, `winno`, `user_id`, `created_at`, `repair_case`, `money_spent`) VALUES
(18, 1, 'A', NULL, '1JX69', NULL, 1, 'W376159D', '', 10, '', 'XWBJF69VEKA149649', 1, '2019-11-21 01:56:15', NULL, NULL),
(19, 6, 'A', '2019-11-21', '1JX69', NULL, 1, 'W376159D', '', 15, '', 'XWBJF69VEKA149649', 1, '2019-11-21 02:15:59', NULL, NULL),
(23, 1, 'D', '2019-11-22', NULL, NULL, 4, 'F09359', '', 20, '', NULL, 1, '2019-11-22 01:08:43', NULL, NULL),
(24, 1, 'D', '2019-11-22', NULL, NULL, 4, 'F09359', 'No test', 20, 'OMG ANTENA Suqulmagan', NULL, 1, '2019-11-22 01:09:16', NULL, NULL),
(25, 1, 'D', '2019-11-22', '1JX69', NULL, 4, 'F093250E', 'BRAK PIDAL', 20, 'APARATGA QO\'YILDI', 'XWBJA69V9LA010044', 1, '2019-11-22 01:12:29', NULL, NULL),
(27, 1, 'D', '2019-11-22', '1JX69', NULL, 4, 'F094220E', 'NO TEST', 20, 'BSM SHTEKER SUQULMAGAN', 'XWBJA69V9LA010057', 1, '2019-11-22 01:14:28', NULL, NULL),
(28, 1, 'D', '2019-11-22', '1JX69', NULL, 4, 'F092960E', 'NO TEST', 15, 'PAFTOR SKAYNER', 'XWBJA69V9LA010040', 1, '2019-11-22 01:16:23', NULL, NULL),
(29, 1, 'D', '2019-11-22', NULL, NULL, 4, 'D03244', 'NO TEST', 5, 'QAYTA SKAYNER', NULL, 1, '2019-11-22 01:17:16', NULL, NULL),
(30, 1, 'D', '2019-11-22', NULL, NULL, 4, 'F09339', 'NO TEST', 10, 'QAYTA SKAYNER', NULL, 1, '2019-11-22 01:20:08', NULL, NULL),
(31, 1, 'А', '2019-12-13', '1TH69', NULL, 4, 'D053882E', 'NO TEST', 15, 'QAYTA O\'QITILMAGAN', 'XWB3K32EDCA219865', 1, '2019-11-22 01:22:33', NULL, NULL),
(32, 1, 'D', '2019-11-22', '1TH69', NULL, 4, 'D045232E', 'NO TEST', 10, 'QAYTA SKAYNER', 'XWB3L32EDCA218468', 1, '2019-11-22 01:23:53', NULL, NULL),
(33, 1, 'D', '2019-11-22', NULL, NULL, 4, 'D04528', 'NO TEST', 20, 'IN TAKE SHTEKER YAXSHI O\'RNATILMAGAN', NULL, 1, '2019-11-22 01:24:52', NULL, NULL),
(34, 1, 'D', '2019-11-22', '1TF69', NULL, 4, 'D060810D', 'NO TEST', 10, 'QAYTA SKANER', 'XWBTF69V1LA010366', 1, '2019-11-22 01:27:02', NULL, NULL),
(35, 1, 'D', '2019-11-22', '13U19', NULL, 8, 'W295289D', 'A/C 32', 40, 'EVP BRAK', 'XWB5V31BDKA587799', 1, '2019-11-22 01:27:49', NULL, NULL),
(36, 1, 'D', '2019-11-22', '13U19', NULL, 4, 'W372779D', 'HAZARD LAMP TURN SIGNAL LAM', 20, 'TUTASHUV SHTEYKR MASSA TEGIB QOLGAN', 'XWB5V31BDKA587714', 1, '2019-11-22 01:29:49', NULL, NULL),
(37, 1, 'D', '2019-11-22', '1TH69', NULL, 4, 'D058132E', 'NO TEST', 20, 'KALIT O\'QILMAGAN', 'XWB3K32EDCA219766', 1, '2019-11-22 01:31:12', NULL, NULL),
(38, 1, 'D', '2019-11-22', '13U19', NULL, 4, 'W368549D', 'NO TEST', 20, 'KALIT O\'QITILMAGAN', 'XWB5V312DKA587845', 1, '2019-11-22 01:32:17', NULL, NULL),
(39, 1, 'D', '2019-11-22', '1JX69', NULL, 4, 'F094160E', 'NO TEST', 20, 'I/P SHTEKIR QOSHIB QATIRILGAN', 'XWBJA69V9LA010093', 1, '2019-11-22 01:33:15', NULL, NULL),
(40, 1, 'D', '2019-11-22', '1TH69', NULL, 4, 'F093313E', 'NO TEST', 30, 'RH IN PANEL CAP 21', 'XWB3L32EDDA009678', 1, '2019-11-22 01:34:21', NULL, NULL),
(41, 1, 'D', '2019-11-22', '1TH69', NULL, 4, 'D041682E', 'NO TEST', 25, 'ABS MODEL SHTEKER YAXSHI TUSHMAGAN', 'XWB3L32EDCA217597', 1, '2019-11-22 01:35:55', NULL, NULL),
(42, 1, 'D', '2019-11-22', '13U19', NULL, 4, 'W289459D', 'NO TEST', 10, 'QAYTA SKAYNER', 'XWB5V31BDKA587852', 1, '2019-11-22 01:36:42', NULL, NULL),
(43, 1, 'D', '2019-11-22', '1CQ48', NULL, 4, 'D035030D', 'NO TEST', 20, 'QAYTA SKAYNER', 'XWBMF48NELA502169', 1, '2019-11-22 02:39:55', NULL, NULL),
(44, 1, 'D', '2019-11-22', '13U19', NULL, 4, 'W371889D', 'no test', 20, 'qayta skayner', 'XWB5V31BDKA587624', 1, '2019-11-22 02:45:05', NULL, NULL),
(45, 1, 'D', '2019-11-22', '1CQ48', NULL, 4, 'D036870D', 'unable bus prep', 20, 'injektor', 'XWBMF48NELA502163', 1, '2019-11-22 02:45:38', NULL, NULL),
(46, 1, 'D', '2019-11-22', '1CQ48', NULL, 4, 'D036870D', 'unable bus prep', 20, 'injektor', 'XWBMF48NELA502163', 1, '2019-11-22 02:45:40', NULL, NULL),
(47, 2, 'B', '2019-11-22', '13U19', NULL, 4, 'W371629D', 'A/C KONDISANER', 20, '', 'XWB5V31BDKA587225', 1, '2019-11-22 02:47:22', NULL, NULL),
(48, 1, 'B', '2019-11-22', NULL, NULL, 8, 'D57444', 'BUGGER SEAT BT', 30, '', NULL, 1, '2019-11-22 02:49:27', NULL, NULL),
(49, 1, 'B', '2019-11-22', '1TF69', NULL, 7, 'D060060D', 'back up lamp', 30, '', 'XWBTF69V1LA010209', 1, '2019-11-22 02:52:10', NULL, NULL),
(50, 2, 'B', '2019-11-22', '1MW48', NULL, 4, 'D000182E', 'rr bumper side body 01', 15, 'kuzovda muammo', 'XWB4A11EDCA008859', 1, '2019-11-22 02:54:27', NULL, NULL),
(51, 1, 'B', '2019-11-22', '13U19', NULL, 4, 'W372209D', 'fuiled side body 01-09', 16, '', 'XWB5V31BDKA587611', 1, '2019-11-22 02:56:51', NULL, NULL),
(52, 2, 'B', '2019-11-22', '1MW48', NULL, 4, 'D029526D', 'n panel 28', 20, '70 qoyilganda sinib qolgan ', 'XWB4A11ADGA507643', 1, '2019-11-22 03:02:24', NULL, NULL),
(53, 2, 'B', '2019-11-22', '13U19', NULL, 4, 'W372849D', 'spaker harness', 20, 'uz koram', 'XWB5V31BDKA587570', 1, '2019-11-22 03:04:20', NULL, NULL),
(54, 2, 'B', '2019-11-22', '1TF69', NULL, 4, 'D043090D', 'STERING WHEEL', 10, 'DETAL ALMASHGAN', 'XWBTF69V1LA009695', 1, '2019-11-22 03:05:38', NULL, NULL),
(55, 1, 'D', '2019-11-22', '1JX69', NULL, 4, 'F093340E', 'gear sh.gev cover', 20, 'svarka 01 ong. tomon', 'XWBJA69V9LA009992', 1, '2019-11-22 04:39:11', NULL, NULL),
(57, 1, 'A', '2019-11-29', '13U19', NULL, 2, 'W391059D', '', 10, '', 'XWB5V31BDKA588191', 1, '2019-11-29 01:01:41', 2, 218400),
(58, 3, 'B', '2019-12-03', '1CQ48', NULL, 4, 'D032660D', 'Frt door wind siw', 20, '', 'XWBMF48NELA502460', 3, '2019-12-03 05:41:16', 1, 19240),
(59, 3, 'B', '2019-12-03', '1TH69', NULL, 4, 'D058542E', 'Par brak ind lamp', 10, 'Par brak ind lamp', 'XWB3K32EDCA218715', 3, '2019-12-03 05:42:23', 2, 0),
(60, 3, 'B', '2019-12-03', '1CQ48', NULL, 4, 'D034190D', 'no test default', 5, 'linya sifat skoyner qilmagan', 'XWBMF48NELA501951', 3, '2019-12-03 05:44:13', 2, 9625),
(90, 3, 'B', '2019-12-05', '1CQ48', NULL, 4, 'D034190D', 'no test default', 5, 'linya sifat skoyner qilmagan', 'XWBMF48NELA501951', 3, '2019-12-03 05:44:13', 2, 9625),
(93, 6, 'A', '2019-12-09', '1JX69', NULL, 1, 'A000013C', '', 12, '', 'XWBJF69VJDA000105', 1, '2019-12-09 05:07:39', 2, 34800),
(94, 3, 'A', '2019-12-09', '13U19', NULL, 1, 'A000014D', '', 12, '', 'XWB5V312DEA500001', 1, '2019-12-09 05:15:26', 2, 29112),
(95, 1, 'A', '2019-12-09', '1JX69', NULL, 1, 'F052880E', '', 10, '', 'XWBJA69V9LA003136', 1, '2019-12-09 06:13:09', 1, 15820),
(96, 1, 'A', '2019-12-09', '1CR48', NULL, 1, 'A00001', '', 5, '', 'XWBMF48DEDA500001', 1, '2019-12-09 06:35:51', 1, 4330),
(97, 1, 'A', '2019-12-09', '1JX69', NULL, 1, 'F093390E', '', 5, '', 'XWBJA69V9LA010043', 1, '2019-12-09 06:36:36', 1, 7910),
(102, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 23, '', NULL, NULL, '2019-12-11 08:55:44', 1, NULL),
(103, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 23, '', NULL, NULL, '2019-12-11 08:56:01', 1, NULL),
(104, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 23, '', NULL, NULL, '2019-12-11 08:56:18', 1, NULL),
(105, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 23, '', NULL, NULL, '2019-12-11 08:56:28', 1, NULL),
(106, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 23, '', NULL, NULL, '2019-12-11 08:57:18', 1, NULL),
(107, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 23, '', NULL, NULL, '2019-12-11 08:57:33', 1, NULL),
(108, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 23, '', NULL, NULL, '2019-12-11 08:58:27', 1, NULL),
(109, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 23, '', NULL, NULL, '2019-12-11 08:58:36', 1, NULL),
(110, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 23, '', NULL, NULL, '2019-12-11 08:58:57', 1, NULL),
(111, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 23, '', NULL, NULL, '2019-12-11 08:58:58', 1, NULL),
(112, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 23, '', NULL, NULL, '2019-12-11 08:59:12', 1, NULL),
(113, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 23, '', NULL, NULL, '2019-12-11 09:00:00', 1, NULL),
(114, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 23, '', NULL, NULL, '2019-12-11 09:00:54', 1, NULL),
(115, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 2, '', NULL, NULL, '2019-12-11 09:02:41', 1, NULL),
(116, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 2, '', NULL, NULL, '2019-12-11 09:02:52', 1, NULL),
(117, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 6, '', NULL, NULL, '2019-12-11 09:03:22', 1, NULL),
(118, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 6, '', NULL, NULL, '2019-12-11 09:05:51', 1, NULL),
(119, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 6, '', NULL, NULL, '2019-12-11 09:05:58', 1, NULL),
(120, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 6, '', NULL, NULL, '2019-12-11 09:06:04', 1, NULL),
(121, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 6, '', NULL, NULL, '2019-12-11 09:06:23', 1, NULL),
(122, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 6, '', NULL, NULL, '2019-12-11 09:06:29', 1, NULL),
(123, 1, 'A', '2019-12-11', NULL, NULL, 1, NULL, '', 6, '', NULL, NULL, '2019-12-11 09:06:32', 1, NULL),
(124, 1, 'A', NULL, NULL, '', 1, NULL, '', 3, '', NULL, NULL, '2019-12-13 04:45:12', 1, NULL),
(125, 1, 'A', NULL, NULL, '', 1, NULL, '', 3, '', NULL, NULL, '2019-12-13 04:45:30', 1, NULL),
(126, 1, 'A', NULL, NULL, '', 1, NULL, '', 3, '', NULL, NULL, '2019-12-13 04:45:38', 1, NULL),
(127, 1, 'A', NULL, NULL, '', 1, NULL, '', 3, '', NULL, NULL, '2019-12-13 04:46:18', 1, NULL),
(128, 1, 'A', NULL, NULL, '', 1, NULL, '', 3, '', NULL, NULL, '2019-12-13 04:46:44', 1, NULL),
(129, 1, 'A', NULL, NULL, '', 1, NULL, '', 3, '', NULL, NULL, '2019-12-13 04:47:04', 1, NULL),
(130, 1, 'A', NULL, NULL, '', 1, NULL, '', 3, '', NULL, NULL, '2019-12-13 04:48:27', 1, NULL),
(131, 1, 'A', NULL, NULL, '', 1, NULL, '', 3, '', NULL, NULL, '2019-12-13 04:48:36', 1, NULL),
(132, 1, 'A', NULL, NULL, '', 1, NULL, '', 3, '', NULL, NULL, '2019-12-13 04:50:44', 1, NULL),
(133, 1, 'A', NULL, NULL, '', 1, NULL, '', 3, '', NULL, NULL, '2019-12-13 04:50:57', 1, NULL),
(134, 1, 'A', NULL, NULL, '', 1, NULL, '', 3, '', NULL, NULL, '2019-12-13 04:51:09', 1, NULL),
(135, 1, 'A', NULL, NULL, '', 1, NULL, '', 3, '', NULL, NULL, '2019-12-13 04:55:37', 1, NULL),
(136, 1, 'A', NULL, NULL, '', 1, NULL, '', 3, '', NULL, NULL, '2019-12-13 04:55:55', 1, NULL),
(137, 1, 'A', NULL, NULL, '', 1, NULL, '', 3, '', NULL, NULL, '2019-12-13 04:56:17', 1, NULL),
(138, 1, 'A', NULL, '1CR48', '', 1, 'A00001', '', 3, '', 'XWBMF48DEDA500001', 1, '2019-12-13 05:03:43', 1, 2598),
(139, 1, 'A', NULL, '1CR48', '', 1, 'A00001', '', 3, '', 'XWBMF48DEDA500001', 1, '2019-12-13 05:10:10', 1, 2598),
(140, 1, 'A', NULL, '1CR48', '', 1, 'A00001', '', 2, '', 'XWBMF48DEDA500001', 1, '2019-12-13 05:40:02', 1, 1732),
(141, 1, 'A', NULL, '13U19', '', 1, 'W201459D', '', 2, '', 'XWB5V31BVKA580760', 1, '2019-12-13 05:41:18', 1, 2184);

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `name`) VALUES
(1, 'FUNCTION REPAIR'),
(2, 'ENGINE REPAIR'),
(3, 'Line off'),
(4, 'GA'),
(5, 'Welding'),
(6, 'Paint'),
(7, 'SHOWER TEST'),
(8, 'Press');

-- --------------------------------------------------------

--
-- Table structure for table `service_price`
--

CREATE TABLE `service_price` (
  `id` int(11) NOT NULL,
  `sector_id` int(10) DEFAULT NULL,
  `model` varchar(50) NOT NULL,
  `is_little` int(15) DEFAULT NULL,
  `is_medium` int(15) DEFAULT NULL,
  `is_large` int(15) DEFAULT NULL,
  `is_active` smallint(6) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `last_updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_price`
--

INSERT INTO `service_price` (`id`, `sector_id`, `model`, `is_little`, `is_medium`, `is_large`, `is_active`, `created_by`, `last_updated_by`) VALUES
(1, 3, '1TF69', 1203, 2407, 4814, 1, 1, NULL),
(2, 3, '13U19', 1213, 2426, 4853, 1, 1, NULL),
(3, 3, '1JX69', 1758, 3516, 7032, 1, 1, NULL),
(4, 3, '1CQ48', 962, 1925, 3851, 1, 1, NULL),
(5, 1, '1TF69', 1083, 2166, 4332, 1, NULL, 1),
(6, 1, '13U19', 1092, 2184, 4368, 1, NULL, 1),
(7, 1, '1JX69', 1582, 3164, 6329, 1, 1, NULL),
(8, 1, '1CQ48', 866, 1733, 3466, 1, 1, NULL),
(9, 2, '1TF69', 770, 1540, 3081, 1, 1, NULL),
(10, 2, '13U19', 698, 1397, 2795, 1, 1, NULL),
(11, 2, '1JX69', 1125, 2250, 4500, 1, 1, NULL),
(12, 2, '1CQ48', 616, 1232, 2464, 1, 1, NULL),
(13, 7, '1TF69', 963, 1926, 3851, 1, 1, NULL),
(14, 7, '13U19', 777, 1553, 3106, 1, 1, NULL),
(15, 7, '1JX69', 1407, 2813, 5626, 1, 1, NULL),
(16, 7, '1CQ48', 770, 1541, 3081, 1, 1, NULL),
(17, 6, '1TF69', 1450, 2900, 5799, 1, 1, NULL),
(18, 6, '13U19', 1619, 3239, 6477, 1, 1, NULL),
(19, 6, '1JX69', 1450, 2900, 5800, 1, 1, 1),
(20, 6, '1CQ48', 1737, 3473, 6946, 1, 1, NULL),
(21, 4, '1JX69', 1497, 2994, 5988, 1, 1, 1),
(22, 4, '13U19', 1486, 2972, 5945, 1, 1, NULL),
(23, 4, '1JX69', 1497, 2994, 5988, 1, 1, NULL),
(24, 4, '1CQ48', 1664, 3327, 6654, 1, 1, NULL),
(25, 5, '1TF69', 2046, 4091, 8183, 1, 1, NULL),
(26, 5, '13U19', 1719, 3438, 6876, 1, 1, NULL),
(27, 5, '1JX69', 2046, 4091, 8183, 1, 1, NULL),
(28, 5, '1CQ48', 1614, 3228, 6457, 1, 1, NULL),
(29, 8, '1TF69', 1807, 3615, 7229, 1, 1, NULL),
(30, 8, '13U19', 2105, 4209, 8419, 1, 1, NULL),
(31, 8, '1JX69', 1946, 3893, 7785, 1, 1, NULL),
(32, 8, '1CQ48', 1718, 3437, 6874, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `id` char(3) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `id`, `name`) VALUES
(1, '01', 'Зазор'),
(2, '02', 'Задевание'),
(3, '03', 'Зацепление'),
(4, '04', 'Отсутствие деталей'),
(5, '05', 'Волнистность'),
(6, '06', 'Загиб'),
(7, '07', 'Неполное зацепление'),
(8, '08', 'Ненатянутый'),
(9, '09', 'Неплосткостность'),
(10, '10', 'Брак закрывание'),
(11, '11', 'Неполное закрепление'),
(12, '12', 'Отсутствует отметка'),
(13, '13', 'Выпучивание(опухан)'),
(14, '14', 'Отклеивание'),
(15, '15', 'Неполное заливание'),
(16, '16', 'Заусенец (BURR)'),
(17, '17', 'Брак возвращ.устрой'),
(18, '18', 'Брак детали'),
(19, '19', 'Перекручивание'),
(20, '20', 'Брак установки'),
(21, '21', 'Несоответ.дтали'),
(22, '22', 'Утечка воды/масло'),
(23, '23', 'Шум'),
(24, '24', 'Повреждение отделки'),
(25, '25', 'Сварочные брызги'),
(26, '26', 'Загрязнения'),
(27, '27', 'Выемка'),
(28, '28', 'Брак расположения'),
(29, '29', 'Свободный ход'),
(30, '30', 'Тресение'),
(31, '31', 'Инородный звук'),
(32, '32', 'Брак функции'),
(33, '33', 'Брак работоспособности'),
(34, '34', 'Усилие управления'),
(35, '35', 'Брак регулировки'),
(36, '36', 'Неправ.показ.стрелки'),
(37, '37', 'Вибрация/дрожь'),
(38, '38', 'Поломка'),
(39, '39', 'Стирание маркировки'),
(40, '40', 'Пасмурный вид'),
(41, '41', 'Свободный'),
(42, '42', 'Сварочный брак'),
(43, '43', 'Пропуск болта/винта'),
(44, '44', 'Неполн закреп.болтов'),
(45, '45', 'Поврежд.болта/винта'),
(46, '46', 'Неустановка детали'),
(47, '47', 'Неувелечен скорости'),
(48, '48', 'Перезаливка'),
(49, '49', 'Задержка движения'),
(50, '50', 'Твёрдость'),
(51, '51', 'Задержка'),
(52, '52', 'Увелич.тормозн пути'),
(53, '53', 'Несоотв.болта и винта'),
(54, '54', 'Брак зажигания'),
(55, '55', 'Боковой снос'),
(56, '56', 'Брак STUD болтов'),
(57, '57', 'Дрожь двигателя'),
(58, '58', 'Ошибка при установке'),
(59, '59', 'Кривое установление'),
(60, '60', 'Брак закрепления'),
(61, '61', 'Не устан.CAP/Gromm'),
(62, '62', 'Брак устан.CAP/Gromm'),
(63, '63', 'Не устан.Clip/Clamp'),
(64, '64', 'Б/закреп.Clip/Clamp'),
(65, '65', 'Брак отверствия'),
(66, '66', 'Мягк-ть педал.торм'),
(67, '67', 'Твёрдость педал торм'),
(68, '68', 'Не совпад.пресс линии'),
(69, '69', 'Ржавчина'),
(70, '70', 'Царапина'),
(71, '71', 'Пузырь'),
(72, '72', 'Брак сушки покраски'),
(73, '73', 'След шлифовки'),
(74, '74', 'Сварочная стружка'),
(75, '75', 'Брак гермитизации'),
(76, '76', 'Апельсиновая корка'),
(77, '77', 'Инородное тело'),
(78, '78', 'Другой цвет'),
(79, '79', 'Распыление краски'),
(80, '80', 'Повреждение краски'),
(81, '81', 'Недостаток краски'),
(82, '82', 'Кратери'),
(83, '83', 'Трещина покрытия'),
(84, '84', 'След полировки'),
(85, '85', 'Ямочки'),
(86, '86', 'Подтёк краски  лака'),
(87, '87', 'Недосушка покраски'),
(88, '88', 'Прочие дефекты'),
(89, '89', 'След маскир. слоя'),
(90, '90', 'Брак при лакировке'),
(91, '91', 'Теч краски  лака'),
(92, '92', 'Нет смазка'),
(93, '93', 'Разборка для ремонта'),
(94, '94', 'Недостатка'),
(95, '95', 'Брак Deadaner'),
(96, '96', 'Повреждения CAP');

-- --------------------------------------------------------

--
-- Table structure for table `tag_assign`
--

CREATE TABLE `tag_assign` (
  `id` int(11) NOT NULL,
  `tag_id` char(3) DEFAULT NULL,
  `post_id` int(100) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `sector` int(11) DEFAULT NULL,
  `shift` char(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `money_spent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag_assign`
--

INSERT INTO `tag_assign` (`id`, `tag_id`, `post_id`, `model`, `sector`, `shift`, `date`, `department`, `money_spent`) VALUES
(6, '32', 19, '1TF69', 2, NULL, '2019-12-09 00:00:00', NULL, NULL),
(7, '52', 19, '1TF69', 2, NULL, '2019-12-09 00:00:00', NULL, NULL),
(8, '62', 19, '1TF69', 2, NULL, '2019-12-09 00:00:00', NULL, NULL),
(9, '72', 19, '1TF69', 3, NULL, '2019-12-09 00:00:00', NULL, NULL),
(10, '82', 19, '1JX69', 3, NULL, '2019-12-09 00:00:00', NULL, NULL),
(11, '92', 19, '1JX69', 3, NULL, '2019-12-09 00:00:00', NULL, NULL),
(12, '2', 19, '1JX69', 2, NULL, '2019-12-09 00:00:00', NULL, NULL),
(13, '12', 19, '1JX69', 2, NULL, '2019-12-09 00:00:00', NULL, NULL),
(14, '2', 19, '1JX69', 2, NULL, '2019-12-09 00:00:00', NULL, NULL),
(15, '21', 19, '1JX69', 2, NULL, '2019-12-09 00:00:00', NULL, NULL),
(16, '22', 19, '1CQ48', 4, NULL, '2019-12-09 00:00:00', NULL, NULL),
(17, '23', 19, '1CQ48', 4, NULL, '2019-12-09 00:00:00', NULL, NULL),
(18, '24', 19, '1CQ48', 4, NULL, '2019-12-09 00:00:00', NULL, NULL),
(19, '25', 19, '1CQ48', 4, NULL, '2019-12-09 00:00:00', NULL, NULL),
(20, '26', 19, '1CQ48', 5, NULL, '2019-12-09 00:00:00', NULL, NULL),
(21, '27', 19, '1CQ48', 5, NULL, '2019-12-09 00:00:00', NULL, NULL),
(22, '28', 19, '1TF69', 5, NULL, '2019-12-09 00:00:00', NULL, NULL),
(23, '22', 27, '1TF69', 6, NULL, '2019-12-09 00:00:00', NULL, NULL),
(24, '22', 28, '1TF69', 6, NULL, '2019-12-09 00:00:00', NULL, NULL),
(25, '22', 29, '1TF69', 6, NULL, '2019-12-03 00:00:00', NULL, NULL),
(26, '22', 30, '13U19', 6, NULL, '2019-12-03 00:00:00', NULL, NULL),
(28, '22', 32, '13U19', 1, NULL, '2019-12-03 00:00:00', NULL, NULL),
(29, '22', 33, '13U19', 2, NULL, '2019-12-03 00:00:00', NULL, NULL),
(30, '22', 34, '1CQ48', 3, NULL, '2019-12-03 00:00:00', NULL, NULL),
(31, '32', 35, '1CQ48', 4, NULL, '2019-12-03 00:00:00', NULL, NULL),
(32, '32', 36, '1CQ48', 5, NULL, '2019-12-03 00:00:00', NULL, NULL),
(33, '22', 37, '1CQ48', 6, NULL, '2019-12-03 00:00:00', NULL, NULL),
(34, '22', 38, '1CQ48', 1, NULL, '2019-12-03 00:00:00', NULL, NULL),
(35, '32', 43, '1CQ48', 2, NULL, '2019-12-03 00:00:00', NULL, NULL),
(36, '32', 44, '1CQ48', 3, NULL, '2019-12-03 00:00:00', NULL, NULL),
(37, '32', 45, '1TF69', 4, NULL, '2019-12-09 00:00:00', NULL, NULL),
(38, '32', 46, '1TF69', 5, NULL, '2019-12-09 00:00:00', NULL, NULL),
(39, '18', 49, '1TF69', 6, NULL, '2019-12-09 00:00:00', NULL, NULL),
(40, '38', 52, '1JX69', 1, NULL, '2019-12-09 00:00:00', NULL, NULL),
(41, '70', 52, '1JX69', 2, NULL, '2019-12-09 00:00:00', NULL, NULL),
(42, '20', 53, '1JX69', 3, NULL, '2019-12-09 00:00:00', NULL, NULL),
(43, '21', 54, '1JX69', 4, NULL, '2019-12-09 00:00:00', NULL, NULL),
(44, '1', 55, '1JX69', 5, NULL, '2019-12-09 00:00:00', NULL, NULL),
(45, '20', 55, '1JX69', 6, NULL, '2019-12-09 00:00:00', NULL, NULL),
(46, '2', 57, '1JX69', 1, NULL, '2019-12-09 00:00:00', NULL, NULL),
(47, '21', 57, '1JX69', 2, NULL, '2019-12-09 00:00:00', NULL, NULL),
(48, '32', 58, '1JX69', 3, NULL, '2019-12-10 00:00:00', NULL, NULL),
(49, '32', 59, '13U19', 4, NULL, '2019-12-10 00:00:00', NULL, NULL),
(50, '32', 60, '13U19', 5, NULL, '2019-12-10 00:00:00', NULL, NULL),
(53, '2', 93, '1JX69', 6, 'A', '2019-12-09 00:00:00', 1, 34800),
(54, '24', 93, '13U19', 6, 'A', '2019-12-09 00:00:00', 1, 34800),
(55, '50', 94, '13U19', 3, 'A', '2019-12-09 00:00:00', 1, 29112),
(56, '50', 95, '13U19', 1, 'A', '2019-12-09 00:00:00', 1, 15820),
(57, '50', 96, '13U19', 1, 'A', '2019-12-09 00:00:00', 1, 4330),
(60, '1', 138, '1CR48', 1, 'A', NULL, 1, 2598),
(61, '27', 139, '1CR48', 1, 'A', NULL, 1, 2598),
(62, '2', 140, '1CR48', 1, 'A', NULL, 1, 1732),
(63, '65', 140, '1CR48', 1, 'A', NULL, 1, 1732),
(64, '20', 140, '1CR48', 1, 'A', NULL, 1, 1732),
(65, '01', 141, '13U19', 1, 'A', NULL, 1, 2184),
(66, '02', 141, '13U19', 1, 'A', NULL, 1, 2184),
(67, '03', 141, '13U19', 1, 'A', NULL, 1, 2184),
(68, '56', 142, '13U19', 1, 'A', NULL, 1, 567840),
(69, '25', 142, '13U19', 1, 'A', NULL, 1, 567840),
(70, '51', 142, '13U19', 1, 'A', NULL, 1, 567840),
(71, '33', 31, NULL, NULL, NULL, NULL, NULL, NULL),
(72, '20', 31, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test1` int(11) NOT NULL,
  `test2` varchar(255) DEFAULT NULL,
  `test3` varchar(255) DEFAULT NULL,
  `test4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test1`, `test2`, `test3`, `test4`) VALUES
(1, '1', '1', '1'),
(2, '2', '2', '2'),
(3, 'A000013C model: 1JX69', '1', '1'),
(4, NULL, NULL, NULL),
(5, NULL, NULL, NULL),
(6, NULL, NULL, NULL),
(7, NULL, NULL, NULL),
(8, NULL, NULL, NULL),
(9, NULL, NULL, NULL),
(10, NULL, NULL, NULL),
(11, NULL, NULL, NULL),
(12, NULL, NULL, NULL),
(13, NULL, NULL, NULL),
(14, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `role`) VALUES
(1, 'Gulomjon Sulaymonov', 'gs6416', '$2y$10$0CnRVWFEiuzm1q4m63U/VOObEGA2PIZA9R1zY.x/iUjHCIn7GLlva', 'Admin'),
(3, 'Zafar aka', 'zb0966', NULL, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problem_monitorings`
--
ALTER TABLE `problem_monitorings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_price`
--
ALTER TABLE `service_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `tag_assign`
--
ALTER TABLE `tag_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test1`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `problem_monitorings`
--
ALTER TABLE `problem_monitorings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_price`
--
ALTER TABLE `service_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tag_assign`
--
ALTER TABLE `tag_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
