-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-07-2020 a las 23:48:43
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `justomarket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_inout`
--

CREATE TABLE `login_inout` (
  `id` int(6) NOT NULL,
  `user` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `accion` int(2) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `navegador` varchar(250) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `fechaF` varchar(30) NOT NULL,
  `hora` varchar(30) NOT NULL,
  `td` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login_inout`
--

INSERT INTO `login_inout` (`id`, `user`, `nombre`, `accion`, `ip`, `navegador`, `fecha`, `fechaF`, `hora`, `td`) VALUES
(1, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '18:16:35', 10),
(2, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '18:17:04', 10),
(3, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '18:20:32', 10),
(4, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '18:52:06', 10),
(5, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '18:52:10', 10),
(6, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:11:59', 10),
(7, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:12:14', 10),
(8, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:21:08', 10),
(9, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:25:05', 10),
(10, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:41:30', 10),
(11, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:41:35', 10),
(12, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:41:39', 10),
(13, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:52:10', 10),
(14, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:52:14', 10),
(15, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:52:18', 10),
(16, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:52:25', 10),
(17, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:52:30', 10),
(18, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:52:38', 10),
(19, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:52:43', 10),
(20, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:52:54', 10),
(21, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:53:04', 10),
(22, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:53:13', 10),
(23, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:53:23', 10),
(24, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:53:30', 10),
(25, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:54:58', 10),
(26, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:55:08', 10),
(27, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:55:29', 10),
(28, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:55:32', 10),
(29, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:55:36', 10),
(30, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:55:40', 10),
(31, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:55:54', 10),
(32, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:56:46', 10),
(33, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:56:49', 10),
(34, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:56:57', 10),
(35, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:57:12', 10),
(36, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '19:57:16', 10),
(37, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:05:26', 10),
(38, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:05:29', 10),
(39, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:05:49', 10),
(40, '', '', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:07:17', 0),
(41, '', '', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:07:31', 0),
(42, '', '', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:07:36', 0),
(43, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:07:48', 10),
(44, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:07:56', 10),
(45, '', '', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:08:46', 0),
(46, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:08:52', 10),
(47, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:09:03', 10),
(48, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:09:15', 10),
(49, '', '', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:09:36', 0),
(50, '', '', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:09:42', 0),
(51, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:09:54', 10),
(52, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:09:59', 10),
(53, '', '', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:10:14', 0),
(54, '', '', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:10:16', 0),
(55, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:10:38', 10),
(56, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:10:46', 10),
(57, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:10:52', 10),
(58, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:12:07', 10),
(59, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:13:06', 10),
(60, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:13:14', 10),
(61, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:13:21', 10),
(62, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:13:30', 10),
(63, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:13:34', 10),
(64, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:13:40', 10),
(65, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:36:40', 10),
(66, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '20:36:53', 10),
(67, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '21:16:35', 10),
(68, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '21:16:57', 10),
(69, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '21:17:05', 10),
(70, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '21:17:12', 10),
(71, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '21:17:16', 10),
(72, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '21:17:22', 10),
(73, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '21:17:50', 10),
(74, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '21:34:56', 10),
(75, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '21:35:04', 10),
(76, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '21:35:30', 10),
(77, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '22:56:14', 10),
(78, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '22:56:33', 10),
(79, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '22:56:45', 10),
(80, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '22:57:31', 10),
(81, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '22:57:38', 10),
(82, 'Erick', 'Erick Nunez', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '23:07:04', 10),
(83, 'Erick', 'Erick Nunez', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', '09-07-2020', '1594274400', '23:07:12', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_members`
--

CREATE TABLE `login_members` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login_members`
--

INSERT INTO `login_members` (`id`, `username`, `email`, `password`, `salt`) VALUES
(1, 'Erick', 'aerick.nunez@gmail.com', '50236c59c304c8b5c2f6b5c1af94f4416d998e3ba3fd2fc5a795f740431c35e9bbd9d4439a3dad8a182173b14291a308e4716458278fc228ad7c8f9930d9547e', '5f1e8cce7a67bf3282acf41dee11c7c784b5c8b6687bc4a10b3a81e2af81f186402d4f19e545b62e474f308f9dbc142eb3c66c6033b264cd0e1ffe1209cdf57d'),
(3, 'db2625', 'abarrotes@pizto.com', 'cbe63f9a2905f07c5e7eee57a063dfb7dc375c570aa1430ea46fe534a831763c73985df3eaf7fb2dd266b106739eb74ba81c659d0fdf46fcd007394d942cf690', '8251d03b00004a87aa90fa276fab8140a6ffa84bec6ab88132fd474cc6a2eae8f42b46e517ee22d19f950553aaba774aa98f374bb9b2aa5e3645192ee4779abc'),
(4, '6f129e', 'ferreteria@pizto.com', '35c84227380b306f0c75d874316a06090c1418ea86c97ac3830d41c456759879dea31cc4d39e680215534e15438925304c2f8c5a2a8204bfad4b40321da445ec', 'f6ad1faa4e63f5b4f1cf0266db07892cb92aa63f1cb4e9a73bd3cf8507fe35d14e13cfacb7c145c7c298245afb55df23f0694218f78ca85cc2600de5c9db05a9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_sucursales`
--

CREATE TABLE `login_sucursales` (
  `id` int(5) NOT NULL,
  `user` varchar(50) NOT NULL,
  `sucursal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_userdata`
--

CREATE TABLE `login_userdata` (
  `id` int(6) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `tipo` int(2) NOT NULL COMMENT '1, root , 2 mayoreo',
  `user` varchar(100) NOT NULL,
  `tkn` varchar(200) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `td` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login_userdata`
--

INSERT INTO `login_userdata` (`id`, `nombre`, `tipo`, `user`, `tkn`, `avatar`, `td`) VALUES
(1, 'Erick Nunez', 1, 'Erick', '1', '11.png', 10),
(3, 'Abarrotes Admin', 5, 'db2625', '1', '11.png', 11),
(4, 'Admin Ferreteria', 2, '6f129e', '1', 'neagan.jpg', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login_inout`
--
ALTER TABLE `login_inout`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_members`
--
ALTER TABLE `login_members`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_sucursales`
--
ALTER TABLE `login_sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_userdata`
--
ALTER TABLE `login_userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login_inout`
--
ALTER TABLE `login_inout`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT de la tabla `login_members`
--
ALTER TABLE `login_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `login_sucursales`
--
ALTER TABLE `login_sucursales`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `login_userdata`
--
ALTER TABLE `login_userdata`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
