-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Bulan Mei 2023 pada 13.25
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `equally_forum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `equally_admin`
--

CREATE TABLE `equally_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `nick_admin` varchar(225) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `active` varchar(5) NOT NULL DEFAULT 'YES',
  `username` varchar(125) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `equally_admin`
--

INSERT INTO `equally_admin` (`id`, `name`, `nick_admin`, `email`, `mobile_no`, `address`, `active`, `username`, `password`, `role`) VALUES
(4, 'Administrator', 'Equally', 'equally_admin@dicoding.org', '01234567891212', NULL, 'YES', 'admin', '3d625805ddecfccb12e53030aa0d4ebd1c531d5499fa9500329d36ba24ec2a4c064c77e5b9c24e9d9e1dd6e50ff793622022e3843d2ef3e2fb732b7a130a39f2n5mFLZh5gTIi8LxzCubBX7Sxu2b3Pbr0bftqV5mjwBA=', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `equally_category`
--

CREATE TABLE `equally_category` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `url` varchar(225) NOT NULL,
  `active` varchar(5) DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `equally_category`
--

INSERT INTO `equally_category` (`id`, `name`, `url`, `active`) VALUES
(1, 'Campaign', 'campaign', 'YES'),
(2, 'Story', 'story', 'YES'),
(3, 'Worklife', 'worklife', 'YES'),
(4, 'Violence', 'violence', 'YES'),
(5, 'Figure', 'figure', 'YES'),
(6, 'Fashion', 'fashion', 'YES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `equally_notification`
--

CREATE TABLE `equally_notification` (
  `id` int(11) NOT NULL,
  `user_ref` int(11) DEFAULT NULL,
  `icon` varchar(35) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `active` varchar(5) NOT NULL DEFAULT 'YES',
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `equally_notification`
--

INSERT INTO `equally_notification` (`id`, `user_ref`, `icon`, `text`, `active`, `created_on`) VALUES
(171, 63, '<i class=\"far fa-heart\"></i>', 'tes like your replay', 'YES', '2023-05-27 16:51:24'),
(173, 63, '<i class=\"far fa-heart\"></i>', 'tes like your replay', 'YES', '2023-05-27 16:51:37'),
(174, 63, '<i class=\"far fa-heart\"></i>', 'tes like your replay', 'YES', '2023-05-27 16:52:56'),
(176, 63, '<i class=\"far fa-heart\"></i>', 'tes like your replay', 'YES', '2023-05-27 17:06:25'),
(178, 64, '<i class=\"far fa-heart\"></i>', 'tes1 like your replay', 'YES', '2023-05-27 18:50:05'),
(179, 64, '<i class=\"far fa-heart\"></i>', 'tes1 like your replay', 'YES', '2023-05-27 18:50:09'),
(180, 63, '<i class=\"far fa-heart\"></i>', 'equally like your replay', 'YES', '2023-05-27 21:09:13'),
(182, 63, '<i class=\"far fa-heart\"></i>', 'equally like your replay', 'YES', '2023-05-27 21:51:36'),
(184, 59, '<i class=\"far fa-heart\"></i>', 'equally like your replay', 'YES', '2023-05-27 21:52:01'),
(185, 63, '<i class=\"far fa-heart\"></i>', 'equally like your replay', 'YES', '2023-05-27 21:58:14'),
(186, 63, '<i class=\"far fa-heart\"></i>', 'equally like your replay', 'YES', '2023-05-27 21:58:15'),
(187, 59, '<i class=\"far fa-heart\"></i>', 'equally like your replay', 'YES', '2023-05-27 21:58:18'),
(188, 59, '<i class=\"fas fa-retweet\"></i>', 'tes1 add reply to your post', 'YES', '2023-05-27 22:17:48'),
(189, 59, '<i class=\"fas fa-retweet\"></i>', 'Dico Indo add reply to your post', 'YES', '2023-05-28 13:51:22'),
(190, 59, '<i class=\"fas fa-retweet\"></i>', 'Dico Indo add reply to your post', 'YES', '2023-05-28 14:00:21'),
(191, 63, '<i class=\"far fa-heart\"></i>', 'Dico Indo like your replay', 'YES', '2023-05-28 14:26:41'),
(192, 85, '<i class=\"far fa-heart\"></i>', 'Dico Indo like your replay', 'YES', '2023-05-28 14:27:03'),
(193, 64, '<i class=\"fas fa-retweet\"></i>', 'tes1 add reply to your post', 'YES', '2023-05-28 18:13:51'),
(194, 64, '<i class=\"far fa-heart\"></i>', 'tes1 like your replay', 'YES', '2023-05-28 18:13:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `equally_posts`
--

CREATE TABLE `equally_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(155) DEFAULT NULL,
  `url` varchar(225) NOT NULL,
  `user_ref` int(11) DEFAULT NULL,
  `cat_ref` int(11) NOT NULL,
  `created_on` datetime DEFAULT current_timestamp(),
  `count` int(11) NOT NULL,
  `active` varchar(5) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `equally_posts`
--

INSERT INTO `equally_posts` (`id`, `title`, `description`, `image`, `url`, `user_ref`, `cat_ref`, `created_on`, `count`, `active`) VALUES
(35, 'Literasi Digital Kesetaraan Gender', '<ol style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style-type: decimal; margin-top: 1.25em; margin-bottom: 1.25em; padding-left: 1rem; counter-reset: item 0; display: flex; flex-direction: column;\"><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding-left: 0.375em;\"></li></ol><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding-left: 0.375em;\"><ul></ul></p><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px;\">Bagaimana mengembangkan literasi digital yang kuat dan kritis dapat membantu individu, terutama perempuan, melindungi diri mereka sendiri dan menghadapi pelecehan online dengan lebih percaya diri?</p>', NULL, 'bagaiman-membuat-tahun-di-copyright-secara-otomatis', 59, 1, '2023-05-26 02:53:54', 18, 'YES'),
(36, 'Hentikan Pembenaran Kekerasan', '<ul><li style=\"text-align: justify; \">Kita harus bersama-sama menghentikan pembenaran terhadap kekerasan terhadap perempuan dan membangun masyarakat yang bebas dari segala bentuk kekerasan berbasis gender.&nbsp;<br></li><ul><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding-left: 0.375em;\"><ul><li style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px;\">Pada akar masalahnya, pencegahan kekerasan terhadap perempuan memerlukan perubahan pola pikir yang mendasar, mengatasi budaya pembenaran kekerasan, dan mempromosikan budaya yang menghormati perempuan sebagai subjek yang setara dengan hak-hak yang sama.</li></ul></li></ul></ul>', NULL, 'bagaimana-mengatur-warna-ukuran-dan-jenis-huruf-di-html', 59, 1, '2023-05-26 02:53:54', 28, 'YES'),
(37, 'Mengatasi Kesenjangan Upah: Langkah-langkah Menuju Kesetaraan Gender dalam Dunia Kerja', '<ol style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style-type: decimal; margin-top: 1.25em; margin-bottom: 0px; padding-left: 1rem; counter-reset: item 0; display: flex; flex-direction: column;\"><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding-left: 0.375em;\"></li></ol><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding-left: 0.375em;\"><ul></ul></p><p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px;\">Kesenjangan upah antara pria dan wanita masih menjadi isu yang perlu diatasi dalam dunia kerja saat ini. Dalam beberapa industri, perempuan masih mendapatkan upah yang lebih rendah dibandingkan dengan rekan pria mereka yang memiliki kualifikasi dan pengalaman yang sama. Menurut kalian gimana sih caranya mengatasi kesenjangan tersebut?</p>', NULL, 'rekomendasi-framework-yang-cocok-untuk-project-besar', 59, 3, '2023-05-26 02:53:54', 13, 'YES'),
(38, 'Mencegah Kekerasan terhadap Perempuan: Merangkul Perubahan dan Membangun Kesadaran', '<ol style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style-type: decimal; margin-top: 1.25em; margin-bottom: 0px; padding-left: 1rem; counter-reset: item 0; display: flex; flex-direction: column;\"><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding-left: 0.375em;\"></li></ol><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding-left: 0.375em;\"><ol></ol></p><p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px;\">Mencegah kekerasan terhadap perempuan adalah tugas bersama yang memerlukan perubahan sosial dan kesadaran yang lebih luas. Hal ini melibatkan pengenalan dan penghapusan norma yang mendukung kekerasan serta pendidikan yang lebih baik tentang hak-hak perempuan dan pentingnya menghormati kehidupan dan integritas mereka. Menurut kalian gimana sih caranya mencegah kekerasan terhadap perempuan yang kini marak terjadi di Indonesia?</p>', NULL, 'framework-javascript-yang-mudah-untuk-pemula', 59, 4, '2023-05-26 02:53:54', 8, 'YES'),
(39, 'Kartini dan Kesetaraan Gender, No One Left Behind', '<p style=\"text-align: justify; \"><img src=\"https://www.djkn.kemenkeu.go.id/files/images/2021/04/0541552COLLECTIE-TROPENMUSEUM-Gesigneerd-portret-van-Raden-Ajeng-Kartini-TMnr-10018775780x390.jpg\" style=\"font-size: 1rem; width: 750px;\"><br></p><p style=\"text-align: justify; \">Kartini sangat erat kaitannya dengan isu gender di masa kini. Konsep gender menurut&nbsp;KMK 807 Tahun 2018 merupakan peran dan status yang melekat pada laki-laki atau perempuan berdasarkan konstruksi sosial budaya yang dipengaruhi oleh struktur masyarakat yang lebih luas dan dapat berubah sesuai perkembangan zaman, bukan berdasarkan perbedaan biologis.&nbsp;Keadilan dan kesetaraan gender di Indonesia dipelopori oleh&nbsp;RA Kartini&nbsp;sejak tahun 1908. Perjuangan persamaan hak antara laki-laki dan perempuan khususnya dalam bidang pendidikan dimulai oleh RA Kartini sebagai wujud perlawanan atas ketidak adilan terhadap kaum perempuan pada masa itu.&nbsp;Ibu&nbsp;</p>', NULL, 'informasi-event-dan-komunitas-belajar', 59, 5, '2023-05-26 02:53:54', 15, 'YES'),
(40, 'Rekomendasi Brand Fashion yang Mendukung Kesetaraan Gender', '<p>Rekomendasi Brand Fashion lokal yang mendukung kesetaraan gender di Indonesia tercinta ini dong masbro dan mbaksis :D</p>', NULL, 'web-hosting-murah-2022', 59, 6, '2023-05-26 02:53:54', 30, 'YES'),
(41, 'Berani Sama-sama: Kampanye Kesetaraan Gender untuk Membangun Masyarakat yang Adil dan Inklusif', '<ol style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style-type: decimal; margin-top: 1.25em; margin-bottom: 0px; padding-left: 1rem; counter-reset: item 0; display: flex; flex-direction: column;\"><li style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding-left: 0.375em;\"></li></ol><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding-left: 0.375em;\"><ul></ul></p><p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px;\">\"Hentikan Pembenaran Kekerasan\": Kita harus bersama-sama menghentikan pembenaran terhadap kekerasan terhadap perempuan dan membangun masyarakat yang bebas dari segala bentuk kekerasan berbasis gender.</p>', NULL, 'adakah-rekomendasi-vps-server-indo-terbaik', 59, 1, '2023-05-26 02:53:54', 13, 'YES'),
(42, 'Cerita Nyata Mewujudkan Kesetaraan Gender', '<p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 1.25em;\">Saya ingin berbagi cerita nyata tentang perjalanan saya dalam mewujudkan kesetaraan gender. Sebagai seorang pria, saya menyadari bahwa keadilan dan kesetaraan tidak hanya menjadi tanggung jawab perempuan, tetapi juga merupakan tanggung jawab saya sebagai individu yang peduli dengan keadilan sosial.</p><p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-top: 1.25em; margin-bottom: 1.25em;\">Saya memulai perubahan ini dengan merenungkan priviledge yang saya miliki sebagai pria dan menyadari bahwa ada banyak hambatan dan diskriminasi yang dihadapi oleh perempuan di masyarakat. Saya bertekad untuk menjadi sekutu yang aktif dan mendukung perempuan dalam perjuangan mereka untuk mendapatkan hak-hak yang setara.</p><p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-top: 1.25em; margin-bottom: 1.25em;\">Saya mulai dengan mendengarkan perempuan di sekitar saya dan belajar dari pengalaman mereka. Saya menyadari bahwa penting untuk tidak hanya mendengarkan, tetapi juga untuk memperhatikan dan bertindak. Saya mendukung aspirasi dan impian perempuan di lingkungan kerja dan berusaha menciptakan lingkungan yang inklusif, di mana mereka dapat berkembang dan mencapai kesuksesan yang sama dengan pria.</p><p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-top: 1.25em; margin-bottom: 1.25em;\">Saya juga terlibat dalam kegiatan sosial yang berkaitan dengan kesetaraan gender. Saya berpartisipasi dalam kampanye dan acara yang mempromosikan kesadaran akan kekerasan terhadap perempuan dan pentingnya mengubah pola pikir yang merugikan. Saya merangkul peran sebagai pria yang membantu memperjuangkan keadilan sosial.</p><p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-top: 1.25em; margin-bottom: 1.25em;\">Di dalam keluarga, saya mempraktikkan keseimbangan tugas dan tanggung jawab dengan pasangan saya. Saya terlibat secara aktif dalam tugas rumah tangga dan perawatan anak, menunjukkan bahwa peran dalam keluarga tidak terikat pada jenis kelamin.</p><p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-top: 1.25em; margin-bottom: 0px;\">Melalui langkah-langkah kecil ini, saya berharap dapat menjadi bagian dari gerakan yang lebih besar untuk mewujudkan kesetaraan gender. Saya berkomitmen untuk terus belajar, tumbuh, dan berkontribusi dalam menciptakan dunia yang adil dan inklusif bagi semua individu, tanpa memandang jenis kelamin.</p>', NULL, 'programmer-di-indonesia-saat-ini-gaji-berapa', 59, 2, '2023-05-26 02:53:54', 21, 'YES'),
(43, 'Representasi Media dan Budaya: Mengatasi Stereotip Gender dalam Industri Fashion', '<p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding-left: 0.375em;\"></p><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding-left: 0.375em;\"></p><ul style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style-type: decimal; margin-top: 1.25em; padding-left: 1rem; counter-reset: item 0; display: flex; flex-direction: column;\"><ul></ul></ul><p></p><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding-left: 0.375em;\"></p><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding-left: 0.375em;\"></p><ul style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style-type: decimal; margin-top: 1.25em; padding-left: 1rem; counter-reset: item 0; display: flex; flex-direction: column;\"><ul></ul></ul><p></p><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding-left: 0.375em;\"></p><ul></ul><p></p><p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px;\">Penting bagi industri fashion untuk secara aktif menciptakan kesadaran akan pentingnya representasi gender yang akurat dan positif. Ini dapat dilakukan melalui kampanye pemasaran yang mempromosikan keberagaman, penempatan model yang mewakili berbagai identitas gender, dan kolaborasi dengan desainer yang memperhatikan inklusivitas.</p><p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px;\">Pendidikan dan pelatihan dalam industri fashion dapat memainkan peran penting dalam mengubah paradigma dan menekankan pentingnya menghormati identitas gender yang beragam. Institusi pendidikan dapat mengintegrasikan materi yang mempromosikan kesetaraan gender dalam kurikulum mereka, serta memberikan kesempatan bagi mahasiswa untuk berkolaborasi dan belajar dari desainer dan profesional yang berdedikasi untuk inklusivitas di Indonesia.</p><p style=\"border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; padding-left: 0.375em;\"></p><ul></ul><p></p><p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px;\">Secara keseluruhan, dengan mengatasi stereotip gender dalam industri fashion, kita dapat menciptakan lingkungan yang lebih inklusif dan menginspirasi individu untuk merayakan identitas mereka tanpa takut akan diskriminasi. Industri fashion memiliki kekuatan untuk menjadi agen perubahan dalam memperjuangkan kesetaraan gender dan merangkul keberagaman yang sejati.</p>', NULL, 'framework-css-terbaik-untuk-project-laravel', 59, 6, '2023-05-26 02:53:54', 130, 'YES');
INSERT INTO `equally_posts` (`id`, `title`, `description`, `image`, `url`, `user_ref`, `cat_ref`, `created_on`, `count`, `active`) VALUES
(44, 'TES POSTING YGY', '<p>TESTTSTSTSTSTSTSTSTAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</p><p>AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</p>', NULL, 'tes-posting-ygy', 64, 1, '2023-05-28 18:13:33', 3, 'NO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `equally_reply`
--

CREATE TABLE `equally_reply` (
  `id` int(11) NOT NULL,
  `user_ref` int(11) DEFAULT NULL,
  `post_ref` int(11) DEFAULT NULL,
  `replay` text DEFAULT NULL,
  `image` varchar(155) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` varchar(5) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `equally_reply`
--

INSERT INTO `equally_reply` (`id`, `user_ref`, `post_ref`, `replay`, `image`, `time`, `active`) VALUES
(83, 63, 43, 'Setuju!', NULL, '2023-05-27 09:17:13', 'YES'),
(84, 63, 43, 'Setuju', NULL, '2023-05-27 09:17:20', 'NO'),
(85, 63, 43, 'Setuju', NULL, '2023-05-27 09:17:21', 'NO'),
(86, 63, 43, 'Setuju', NULL, '2023-05-27 09:17:21', 'NO'),
(87, 63, 43, 'Setuju', NULL, '2023-05-27 09:17:21', 'NO'),
(88, 63, 43, 'Setuju', NULL, '2023-05-27 09:17:22', 'NO'),
(89, 63, 43, 'Setuju', NULL, '2023-05-27 09:17:22', 'NO'),
(90, 63, 43, '<p>Setuju</p>', NULL, '2023-05-27 09:17:42', 'YES'),
(91, 63, 43, '<p>Benar sekali</p>', NULL, '2023-05-27 09:25:53', 'YES'),
(92, 63, 43, '<p>aa</p>', NULL, '2023-05-27 09:30:21', 'YES'),
(93, 63, 43, '<p>aaa</p>', NULL, '2023-05-27 09:33:08', 'YES'),
(94, 63, 43, '<p>mantap</p>', NULL, '2023-05-27 09:51:12', 'YES'),
(95, 63, 43, '<p>mantap</p>', NULL, '2023-05-27 09:51:34', 'YES'),
(96, 63, 43, '<p>setuju</p>', NULL, '2023-05-27 09:53:36', 'YES'),
(97, 64, 40, '<p>yap</p>', NULL, '2023-05-27 11:50:01', 'YES'),
(98, 59, 43, '<p>setuju</p>', NULL, '2023-05-27 14:47:39', 'YES'),
(99, 64, 43, '<p>testing ges</p>', NULL, '2023-05-27 15:17:48', 'YES'),
(100, 85, 36, '<p>Hentikan!</p>', NULL, '2023-05-28 06:51:22', 'YES'),
(101, 85, 37, '<p>Kita harus menegakkan keadilan :D</p>', NULL, '2023-05-28 07:00:21', 'YES'),
(102, 64, 44, '<p>aaaaa</p>', NULL, '2023-05-28 11:13:51', 'NO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `equally_reply_like`
--

CREATE TABLE `equally_reply_like` (
  `id` int(11) NOT NULL,
  `user_ref` int(11) DEFAULT NULL,
  `replay_ref` int(11) DEFAULT NULL,
  `post_ref` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `equally_reply_like`
--

INSERT INTO `equally_reply_like` (`id`, `user_ref`, `replay_ref`, `post_ref`) VALUES
(54, 63, 83, 43),
(67, 63, 93, 43),
(68, 63, 92, 43),
(69, 63, 91, 43),
(71, 63, 94, 43),
(73, 63, 95, 43),
(74, 63, 90, 43),
(76, 64, 97, 40),
(83, 59, 98, 43),
(85, 85, 100, 36),
(86, 64, 102, 44);

-- --------------------------------------------------------

--
-- Struktur dari tabel `equally_users`
--

CREATE TABLE `equally_users` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `email_address` varchar(125) DEFAULT NULL,
  `nickname` varchar(125) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(225) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `active` varchar(5) DEFAULT 'YES',
  `verify` int(11) NOT NULL DEFAULT 0,
  `url` varchar(225) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `equally_users`
--

INSERT INTO `equally_users` (`id`, `name`, `mobile_number`, `email_address`, `nickname`, `address`, `image`, `password`, `active`, `verify`, `url`, `role`) VALUES
(59, 'equally', '', 'equally@dicoding.org', 'equally', NULL, 'dummy.png', '5e2fe5d765545e770b01a5a2a45b01ce9e26d8c91c2fb38353fbbd7ddeb126a24f437408ec0201ae8e9d0dcc8b8eba9904661471b63f763a992eaf06754b24ecx0CJduD7WG7ntnKjVoHGtfVJSUPB4xDV+/RDwMafSuA=', 'YES', 1, 'equally', 'user'),
(60, 'Muhammad Rizky Prayoga', NULL, 'rizky@dicoding.org', 'rizky', NULL, '', '5c270b6911de8ba1b675811232878acf52876ee613a5283c45ec52244d956cb92207224c0f0d97774e6975919779c30537f68d71fcb35cd0b810b6c9e112ef17J7gaiciK8sSSDfhWmoPIb2mKB30MLFLkh0+36fhGoPc=', 'YES', 0, 'muhammad-rizky-prayoga', 'user'),
(63, 'tes', NULL, 'tes@dicoding.org', 'tes', NULL, '', '9765fede031691a3fbfa85f9fc05abcda20bfb93afed56cf6204712ddd0e89ad4c0d6c6541fbf333a22a99da1af165b9f643ab41ca46f27a1d0a6abef1397176VrUCMd6JuFvsZ9kcSi6I/mRcPG2BBrl5RhJRzxjcmf4=', 'YES', 1, 'tes', 'user'),
(64, 'tes1', '0821', 'tes1@dicoding.org', 'tes1', 'aaaa', '', '0844649d9c2bd925303d0f1e49d2c29c5cdbcd0ffab7c4295ab6efd7d484e65ad4794e7cb64d286c099bb6f0f5bee9f7b324d753fd3301524333e03ed4a5b2cc7C6PBxH9P3IsB5FyVDP/mNXn14JvnI7qjywQVrnMCq4=', 'NO', 1, 'tes1', 'user'),
(65, 'tes11', NULL, 'tes11@dicoding.org', 'rizky', NULL, '', '71ea97d96b8b1a1a6b3f24212ce19621fced5e22c30067f66e450a79d264698b8a85f72aacf15af4c0102578dda3c7987c9670a90de1774e68e21a28199e214coiYVml7grRRyi9DPm2ui84IDxatPJFVjV2o6ubIIyXg=', 'NO', 0, 'tes11', 'user'),
(85, 'Dico Indo', '0812345678', 'dicoding@dicoding.org', 'Dicoding', 'Jawa Barat', '', 'd550c28822610bc04013d2380b0fe3c17782bc819372767969bf47713644bbc6d1d679eda6a1db1f6330461b68430d0e03da8efeed2f31443cbf7fcc57a94f2cnVx1fpU8SmVjJ6Fl685f/Cz0Z3Px5KTCtggyhdbsP44=', 'YES', 0, 'dico-indo', 'user'),
(86, 'test123', NULL, 'test123@dicoding.org', 'testing', NULL, '', '7449999c4cc0cab1e7d948b40e2fec7524cf9c73c5738a64ccdaa2d2274e4b4d1eb22e136a8df86b757b33904b98e51aa5a44c2ee22adc70b562d31bfdd9b456vvnhgU9ERHW8r1a4j5wyYAbUqJyvgLAvMlYo5EOMkmk=', 'YES', 0, 'test123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `equally_admin`
--
ALTER TABLE `equally_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `equally_category`
--
ALTER TABLE `equally_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `equally_notification`
--
ALTER TABLE `equally_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `equally_posts`
--
ALTER TABLE `equally_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ref` (`user_ref`);

--
-- Indeks untuk tabel `equally_reply`
--
ALTER TABLE `equally_reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ref` (`user_ref`),
  ADD KEY `post_ref` (`post_ref`);

--
-- Indeks untuk tabel `equally_reply_like`
--
ALTER TABLE `equally_reply_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ref` (`user_ref`),
  ADD KEY `replay_ref` (`replay_ref`);

--
-- Indeks untuk tabel `equally_users`
--
ALTER TABLE `equally_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `equally_admin`
--
ALTER TABLE `equally_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `equally_category`
--
ALTER TABLE `equally_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `equally_notification`
--
ALTER TABLE `equally_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT untuk tabel `equally_posts`
--
ALTER TABLE `equally_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `equally_reply`
--
ALTER TABLE `equally_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `equally_reply_like`
--
ALTER TABLE `equally_reply_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `equally_users`
--
ALTER TABLE `equally_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `equally_posts`
--
ALTER TABLE `equally_posts`
  ADD CONSTRAINT `equally_posts_ibfk_1` FOREIGN KEY (`user_ref`) REFERENCES `equally_users` (`id`);

--
-- Ketidakleluasaan untuk tabel `equally_reply`
--
ALTER TABLE `equally_reply`
  ADD CONSTRAINT `equally_reply_ibfk_1` FOREIGN KEY (`user_ref`) REFERENCES `equally_users` (`id`),
  ADD CONSTRAINT `equally_reply_ibfk_2` FOREIGN KEY (`post_ref`) REFERENCES `equally_posts` (`id`);

--
-- Ketidakleluasaan untuk tabel `equally_reply_like`
--
ALTER TABLE `equally_reply_like`
  ADD CONSTRAINT `equally_reply_like_ibfk_1` FOREIGN KEY (`user_ref`) REFERENCES `equally_users` (`id`),
  ADD CONSTRAINT `equally_reply_like_ibfk_2` FOREIGN KEY (`replay_ref`) REFERENCES `equally_reply` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
