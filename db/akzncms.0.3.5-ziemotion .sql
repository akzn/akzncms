-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 02:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ziemotion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `slug_admin` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `level` enum('administrator','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `slug_admin`, `password`, `email`, `level`) VALUES
(1, 'admin', '', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'contact@compose.com', 'user'),
(2, 'akozan', '', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `slug_blog` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  `keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `user_id`, `category_id`, `title`, `slug_blog`, `content`, `image`, `date_post`, `status`, `keywords`) VALUES
(2, 1, 2, 'Long News Title Dummy', '10-test111', '<p>testing</p>', '29006-art_alphacoders_com2.jpg', '2019-08-23 04:38:00', 'publish', 'testing'),
(3, 1, 2, 'Long News Title Dummy', 'cara-membuat-anak', '<p>awdawd</p>', '8645-c-programming-1366x768-computer-wallpaper.jpg', '2019-08-23 04:38:01', 'publish', 'Cara membuat anak'),
(5, 1, 2, 'Long News Title Dummy', '5-sfsefsef1', '<p>dsdfsdf</p>', '1385096_445510758888115_1423375145_n.jpg', '2019-08-23 04:38:02', 'draft', 'ssdvsfs'),
(6, 1, 2, 'Long News Title Dummy', 'apakah-ahok-akan-menang', '<p>Lorem Ipsum IdoorLorem Ipsum IdoorLorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum IdoorLorem Ipsum IdoorLorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum IdoorLorem Ipsum IdoorLorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum IdoorLorem Ipsum IdoorLorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum IdoorLorem Ipsum IdoorLorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor</p>', '3D-Scenery-HD-Macbook-Wallpaper4.jpg', '2019-08-23 04:38:03', 'publish', 'ahok kalah'),
(7, 1, 3, 'Long News Title Dummy', 'testing', '<p>test</p>', '114845.jpg', '2019-08-23 04:38:04', 'publish', 'test'),
(8, 1, 3, 'Long News Title Dummy', 'adawda', '<p>awdawd</p>', '114846.jpg', '2019-08-23 04:38:05', 'publish', 'awdawd'),
(9, 1, 2, 'Long News Title Dummy', 'dawdawd', '<p>awdawd</p>', '29006-art_alphacoders_com8.jpg', '2019-08-23 04:38:06', 'publish', 'awdaw'),
(10, 1, 2, 'Long News Title Dummy', 'awdawd', '<p>awdawd</p>', '29006-art_alphacoders_com9.jpg', '2019-08-23 04:38:07', 'publish', 'awdawd');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(225) NOT NULL,
  `slug_category` varchar(225) NOT NULL,
  `order_category` int(11) NOT NULL,
  `category_description` text NOT NULL,
  `date_category` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `user_id`, `category_name`, `slug_category`, `order_category`, `category_description`, `date_category`) VALUES
(2, 1, 'News', '2-news', 1, 'News Update', '2017-02-15 14:31:39'),
(3, 1, 'Politik', 'politik', 2, 'Seputar Politik', '2017-02-23 05:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_name` varchar(225) NOT NULL,
  `slug_client` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `website` varchar(225) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `user_id`, `client_name`, `slug_client`, `image`, `website`, `date_created`, `date_updated`, `status`) VALUES
(2, 1, 'KAI', '3-kai', 'Logo_PT_KAI_(Persero)_(New_version_2016)_svg.png', '', '2019-09-02 06:42:23', '2020-08-09 20:21:07', 'publish'),
(3, 2, 'Typy', '3-typy', 'imgclient_Typy_1597005244.png', NULL, '2020-10-20 08:29:32', '2020-10-19 17:00:00', 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `website` varchar(225) NOT NULL,
  `message` text NOT NULL,
  `date_comment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `blog_id`, `name`, `email`, `website`, `message`, `date_comment`) VALUES
(1, 0, 'Indra', 'indrkmna@gmail.com', 'http://indrarukmana.com', 'testing', '2017-02-20 03:54:40'),
(2, 0, 'awda', 'wdqdq@gmail.com', 'http://indrarukmana.com', 'qwdq', '2017-02-20 03:55:42'),
(3, 2, 'rats', 'rats123@gmail.com', 'http://indrarukmana.com', 'rats', '2017-02-20 03:56:37'),
(4, 2, 'xaxsa', 'scascasc@gmail.com', 'http://indrarukmana.com', 'ascasc', '2017-02-20 04:07:27'),
(5, 2, 'adwd', 'awda@gmail.com', 'http://indrarukmana.com', 'dawd', '2017-02-20 04:20:42'),
(6, 3, 'awd', 'apoyaja@gmail.com', 'http://indrarukmana.com', 'qwdqwd', '2017-02-24 07:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `config_id` int(11) NOT NULL,
  `nameweb` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `keywords` text NOT NULL,
  `google_maps` text NOT NULL,
  `logo` varchar(225) NOT NULL,
  `icon` varchar(225) NOT NULL,
  `about` text NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` varchar(100) NOT NULL,
  `phone_number` varchar(225) NOT NULL,
  `metatitle` text,
  `metatext` text NOT NULL,
  `fax` text NOT NULL,
  `admin_show_link` int(11) NOT NULL DEFAULT '0',
  `facebook` varchar(225) NOT NULL,
  `twitter` varchar(225) NOT NULL,
  `instagram` varchar(225) NOT NULL,
  `google_plus` varchar(225) NOT NULL,
  `pinterest` varchar(225) NOT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`config_id`, `nameweb`, `email`, `keywords`, `google_maps`, `logo`, `icon`, `about`, `address`, `city`, `zip_code`, `phone_number`, `metatitle`, `metatext`, `fax`, `admin_show_link`, `facebook`, `twitter`, `instagram`, `google_plus`, `pinterest`, `linkedin`, `youtube`) VALUES
(1, 'Azka Biru Jaya Abadi', 'ziemotion.official@gmail.com', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.48942589396!2d110.36606765755958!3d-7.737795504490272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a58e89bccbfa3%3A0xeb8327a3f362bdd3!2sZiemotion%20Animation%20Studio!5e0!3m2!1sen!2sid!4v1613289414917!5m2!1sen!2sid', '2157b723370612869cab27476890856a.png', 'Logo-70x70.png', '<p>[en]</p>\r\n<div class=\"\">\r\n<div class=\"\">\r\n<h3 style=\"text-align: center;\"><strong>ABOUT US</strong></h3>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;</p>\r\n</div>\r\n</div>\r\n<p>[/en]</p>\r\n<p>[id]</p>\r\n<h3 style=\"text-align: center;\"><strong>Tentang Kami</strong></h3>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;</p>\r\n<h3 style=\"text-align: center;\">&nbsp;</h3>\r\n<p>[/id]</p>', 'Perumahan Pesona Sendangadi Estate 1, Blok C 1-2, Jl. Jongke Kidul, Sleman,\r\nYogyakarta, Indonesia', 'Bandung', '18923', '(0274) 2882370', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', '-', 1, 'https://www.facebook.com/Ziemotion-Animation-Studio-358216174662809', '', 'https://www.instagram.com/ziemotion.studio/', '', '', '', 'https://www.youtube.com/channel/UCxTRPlaitifbKKmKKLrK8MQ');

-- --------------------------------------------------------

--
-- Table structure for table `config_slider`
--

CREATE TABLE `config_slider` (
  `slider_id` int(5) UNSIGNED NOT NULL,
  `slider_image` text,
  `slider_title` text,
  `slider_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config_slider`
--

INSERT INTO `config_slider` (`slider_id`, `slider_image`, `slider_title`, `slider_description`) VALUES
(1, '48589982e4b00824fa0ad39b8ef4b1c0.png', 'Mitra Terpercaya Untuk Kebutuhan Alat Berat Anda', ''),
(2, 'f73c5dbf61034a97de70040f3599d554.png', 'Berbagai Pilihan', 'menyediakan berbagai jenis alat berat untuk berbagai macam keperluan konstruksi, pembangunan, penambangan, dan lain-lain.'),
(3, '590e68953073c8f12978820d56360e7e.png', 'Kualitas Terjamin', 'unit yang kami jual sudah melalui uji kelayakan yang memadai');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `message_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `messages` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `download_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(225) NOT NULL,
  `slug_download` varchar(225) NOT NULL,
  `file` varchar(225) NOT NULL,
  `date_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file_description` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`download_id`, `user_id`, `file_name`, `slug_download`, `file`, `date_upload`, `file_description`, `status`) VALUES
(3, 1, 'Template', '3-template', '153-P101.pdf', '2017-02-16 13:19:05', 'asas', 'publish'),
(4, 1, 'PDF 1', '4-pdf-1', '153-P09.pdf', '2017-02-17 08:03:08', 'test', 'draft'),
(5, 1, 'Matematika (Matrix)', 'matematika-matrix', '153-P091.pdf', '2017-03-06 12:29:22', 'Silahkan download materi ini untuk di pelajari', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `gallery_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gallery_name` varchar(225) NOT NULL,
  `slug_gallery` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `gallery_description` text NOT NULL,
  `position` varchar(100) NOT NULL,
  `type` varchar(25) DEFAULT NULL,
  `video_url` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`gallery_id`, `user_id`, `gallery_name`, `slug_gallery`, `image`, `gallery_description`, `position`, `type`, `video_url`, `date`, `status`) VALUES
(4, 1, 'Edukasi Interaktif Belajar Fisika', '26-edukasi-interaktif-belajar-fisika', 'ebe323c494c6c5f55212b308d2e61189.jpg', '[course-education]Ziemotion is a professional animation service and content creation company. We create products with great quality from fresh idea to reality. Our team is composed of creative individuals who has years of experience producing many animation product like TVCs, short movies, IP (Intellectual Property), toys, game assets and many more', 'project', 'youtube', 'https://www.youtube.com/embed/uI3wRntuo6I', '2021-02-14 05:45:33', 'publish'),
(5, 1, 'Edukasi Interaktif Belajar Matematika', '26-edukasi-interaktif-belajar-matematika', '1bfa1015495dba32195fd6b53e2a28d9.png', '[course-education]Ziemotion is a professional animation service and content creation company. We create products with great quality from fresh idea to reality. Our team is composed of creative individuals who has years of experience producing many animation product like TVCs, short movies, IP (Intellectual Property), toys, game assets and many more', 'project', 'youtube', 'https://www.youtube.com/embed/168DpxdZxf0', '2021-02-14 05:46:26', 'publish'),
(6, 1, 'Penyakit Tidak Menular (PTM)', '26-penyakit-tidak-menular-ptm', 'e8dd2be657404f750d9595def0268e0f.png', '[2d-3d-animation]Ziemotion is a professional animation service and content creation company. We create products with great quality from fresh idea to reality. Our team is composed of creative individuals who has years of experience producing many animation product like TVCs, short movies, IP (Intellectual Property), toys, game assets and many more', 'project', 'youtube', 'https://www.youtube.com/embed/Ei22FQ7m730', '2021-02-14 05:50:20', 'publish'),
(7, 1, 'Pembelajaran Video Animasi Marka Jalan 3', '26-pembelajaran-video-animasi-marka-jalan-3', '960d549ae0d78d02b32002f4da005cda.png', '[2d-3d-animation]Ziemotion is a professional animation service and content creation company. We create products with great quality from fresh idea to reality. Our team is composed of creative individuals who has years of experience producing many animation product like TVCs, short movies, IP (Intellectual Property), toys, game assets and many more', 'project', 'youtube', 'https://www.youtube.com/embed/MOJd1uKUkOY', '2021-02-14 07:48:45', 'publish'),
(8, 1, 'Pembelajaran Video Animasi Marka Jalan 2', '26-pembelajaran-video-animasi-marka-jalan-2', '92c957db5ffb6c5f51a58cf5a552f55e.png', '[2d-3d-animation]Ziemotion is a professional animation service and content creation company. We create products with great quality from fresh idea to reality. Our team is composed of creative individuals who has years of experience producing many animation product like TVCs, short movies, IP (Intellectual Property), toys, game assets and many more', 'project', 'youtube', 'https://www.youtube.com/embed/cHIwKc1Lst0', '2021-02-14 07:51:09', 'publish'),
(9, 1, 'Sampah Plastik', '26-sampah-plastik', '0cd0ae825f561ffc3f043d102ad38b0d.png', '[2d-3d-animation]Ziemotion is a professional animation service and content creation company. We create products with great quality from fresh idea to reality. Our team is composed of creative individuals who has years of experience producing many animation product like TVCs, short movies, IP (Intellectual Property), toys, game assets and many more', 'project', 'youtube', 'https://www.youtube.com/embed/nBnv1HYrWBc', '2021-02-14 07:53:13', 'publish'),
(10, 1, 'GOOD MORNING JOGJA', '13-good-morning-jogja', 'e0f9625a72545e6c1fe824459eed1d6b.png', '[audio-visual]Ziemotion is a professional animation service and content creation company. We create products with great quality from fresh idea to reality. Our team is composed of creative individuals who has years of experience producing many animation product like TVCs, short movies, IP (Intellectual Property), toys, game assets and many more', 'project', 'youtube', 'https://www.youtube.com/embed/mjp5gHIi55s', '2021-02-14 04:35:48', 'publish'),
(11, 1, 'Pembelajaran Video Animasi Marka Jalan 1', '13-pembelajaran-video-animasi-marka-jalan-1', '6742173f3f1313621987d18878c2aa37.png', '[2d-3d-animation]Ziemotion is a professional animation service and content creation company. We create products with great quality from fresh idea to reality. Our team is composed of creative individuals who has years of experience producing many animation product like TVCs, short movies, IP (Intellectual Property), toys, game assets and many more', 'project', 'youtube', 'https://www.youtube.com/embed/MOJd1uKUkOY', '2021-02-14 04:36:41', 'publish'),
(12, 1, 'Covid 19', '13-covid-19', 'a9c04d1a7ac0d3396d4b46a9b87b6a84.png', '[2d-3d-animation]Ziemotion is a professional animation service and content creation company. We create products with great quality from fresh idea to reality. Our team is composed of creative individuals who has years of experience producing many animation product like TVCs, short movies, IP (Intellectual Property), toys, game assets and many more', 'project', 'youtube', 'https://www.youtube.com/embed/iAlMVsvGQNA', '2021-02-14 04:51:36', 'publish'),
(13, 1, 'Happy Christmas Eve Everyone', '13-happy-christmas-eve-everyone', 'c849792679b4a1c754c4898d9dd8df7e.png', '[audio-visual]Ziemotion is a professional animation service and content creation company. We create products with great quality from fresh idea to reality. Our team is composed of creative individuals who has years of experience producing many animation product like TVCs, short movies, IP (Intellectual Property), toys, game assets and many more', 'project', 'youtube', 'https://www.youtube.com/embed/B_JrO48-gts', '2021-02-14 04:35:22', 'publish'),
(14, 1, 'Design Graphic', '16-untitled', '2739d3f26195c119eb8a616f407ce625.jpg', '[design-graphic]', 'project', 'image', '', '2021-02-14 05:28:20', 'publish'),
(15, 1, 'Design Graphic', 'untitled', 'bb08ab5b58f65a3aa04cfab864f30486.JPG', '[design-graphic]', 'project', 'image', '', '2021-02-14 05:28:20', 'publish'),
(16, 1, 'Design Graphic', '16-untitled', '7dacd1cefa64ead14e7075a642026eb0.jpg', '[design-graphic]', 'project', 'image', '', '2021-02-14 05:28:20', 'publish'),
(17, 1, 'FOTO PRODUK COOKIES', '30-foto-produk-cookies', 'f49ffde44607a28aaef098ef0c11de12.jpg', '[audio-visual]', 'project', 'image', '', '2021-02-17 14:38:01', 'publish'),
(18, 1, '3D INTERIOR', '30-3d-interior', '51c6cf495bf72869fc119584bd9ab51b.JPG', '[design-graphic]', 'project', 'image', '', '2021-02-17 14:38:44', 'publish'),
(19, 1, '3D INTERIOR', '30-3d-interior', '75c9c49f553e1891b36c67c49794d93c.JPG', '[design-graphic]', 'project', 'image', '', '2021-02-17 14:38:56', 'publish'),
(20, 1, 'FOTO PRODUK BAKPIA', '30-foto-produk-bakpia', '1fd67da7bcba82734df5f9fd93150ca8.jpg', '[audio-visual]', 'project', 'image', '', '2021-02-17 14:37:21', 'publish'),
(21, 1, 'Audio Visual', 'audio-visual', '5848ab97ba229656a568f6e0dc0e6530.jpg', '[audio-visual]', 'project', 'image', '', '2021-02-14 05:31:21', 'publish'),
(22, 1, 'IKLAN HOTEL', '30-iklan-hotel', '9b562592ff67f5b9e25304467454a955.jpg', '[audio-visual]', 'project', 'image', '', '2021-02-17 14:38:24', 'publish'),
(23, 1, 'Audio Visual', '26-audio-visual', 'd31202c533885426b817c3e31859b60c.jpg', '[audio-visual]', 'project', 'image', '', '2021-02-14 05:40:46', 'publish'),
(24, 1, 'Audio Visual', '26-audio-visual', 'd1c70bb8b3bb1491b9c0622dc26c7fa8.png', '[audio-visual]', 'project', 'image', '', '2021-02-14 05:40:41', 'publish'),
(25, 1, 'Penyakit Tidak Menular (PTM)', '30-penyakit-tidak-menular-ptm', '4d61a0c4f01cd2a7ca19d7e79668ee72.png', '[audio-visual]', 'project', 'youtube', 'https://www.youtube.com/embed/Ei22FQ7m730', '2021-02-17 14:40:34', 'publish'),
(26, 1, 'Audio Visual', 'audio-visual', '182d8ae313d59d6b2816029242f41aa3.png', '[audio-visual]', 'project', 'image', '', '2021-02-14 05:40:35', 'publish'),
(27, 1, 'NGEBIS', 'ngebis', 'c626618d47fe521d1c7a047b2f26655d.png', '[2d-3d-animation]', 'project', 'image', '', '2021-02-17 14:26:28', 'publish'),
(28, 1, 'GREBEK GUNUNGAN', 'grebek-gunungan', '161b797c04d6a319d1112e6999c20483.jpg', '[2d-3d-animation]', 'project', 'image', '', '2021-02-17 14:33:30', 'publish'),
(29, 1, 'MEERY CHRISTMAS', 'meery-christmas', '5293948cf84ecee402ba907bc8bcc6c4.jpg', '[2d-3d-animation]', 'project', 'image', '', '2021-02-17 14:35:10', 'publish'),
(30, 1, 'SAMPAH', 'sampah', '7e84e851d5653b54ddc38644a5ece6e4.jpg', '[2d-3d-animation]', 'project', 'image', '', '2021-02-17 14:36:27', 'publish'),
(31, 1, 'PACKAGING SKINCARE', 'packaging-skincare', 'e7c6e4b2d5adcc127b07d51fc1dac25d.jpg', '[design-graphic]', 'project', 'image', '', '2021-02-17 14:50:15', 'publish'),
(32, 1, 'PACKAGING SKINCARE', 'packaging-skincare', '9a141e193bf127e54a5d24001363375f.jpg', '[design-graphic]', 'project', 'image', '', '2021-02-17 14:50:52', 'publish'),
(33, 1, 'PACKAGING SKINCARE', 'packaging-skincare', '8745b91524b0cc226907689b3ba419b6.jpg', '[design-graphic]', 'project', 'image', '', '2021-02-17 14:51:05', 'publish'),
(34, 1, 'PACKAGING SNACK', '40-packaging-snack', '1801d6aaa27c6613ded19ce1c2877f1e.jpg', '[design-graphic]', 'project', 'image', '', '2021-02-17 14:56:56', 'publish'),
(35, 1, 'LABEL DRINK', '40-label-drink', '4f963e41a70532f277fb2241d7d6fa43.jpg', '[design-graphic]', 'project', 'image', '', '2021-02-17 14:56:45', 'publish'),
(36, 1, 'PACKAGING SKINCARE', 'packaging-skincare', '50e8006629d86269f2aba9f737f52ea4.jpg', '[design-graphic]', 'project', 'image', '', '2021-02-17 14:52:08', 'publish'),
(37, 1, 'PACKAGING DRINK', '40-packaging-drink', '523314d28fff9d1c70a2f2a09dfdc3a2.jpg', '[design-graphic]', 'project', 'image', '', '2021-02-17 14:56:30', 'publish'),
(38, 1, 'SERUM LABEL (DESIGN GRAP)', '40-serum-label-design-grap', '55cb5edb204ef45ee86e62eaca641afe.jpg', '[design-graphic]', 'project', 'image', '', '2021-02-17 14:56:17', 'publish'),
(39, 1, 'ROSE MOCKUP', '40-rose-mockup', '583c837939311f99b029c79b34ffc1b8.jpg', '[design-graphic]', 'project', 'image', '', '2021-02-17 14:56:09', 'publish'),
(40, 1, 'BABY SOAP MOCKUP', 'baby-soap-mockup', '5810801d2f109d3785096f8e167b6d65.jpg', '[design-graphic]', 'project', 'image', '', '2021-02-17 14:56:00', 'publish'),
(41, 1, 'CHINESE NEW YEAR', '41-chinese-new-year', '306b474bf11add9a79322706d3442bed.jpg', '[2d-3d-animation]', 'project', 'video', 'https://serv1.javalatte.xyz/ziemotion/video/gallery/imlek.mp4', '2021-02-17 16:18:22', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(20210316173800);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pages_id` int(5) UNSIGNED NOT NULL,
  `page_name` varchar(50) NOT NULL,
  `slug` text,
  `metatitle` text,
  `metatext` text,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pages_id`, `page_name`, `slug`, `metatitle`, `metatext`, `content`) VALUES
(1, 'about', NULL, 'Check out Who We Are', 'PT Zie Nich Digital (also popularly known as Ziemotion Studio) is a digital creative company in Yogyakarta. We specialize in creating Animated videos, Graphic Design, and Training.  We have a good studio to produce high-quality animated contents or videos. Today, animated content is the most powerful way to reach customer\'s heart.', ''),
(2, 'projects', NULL, 'Our Previous Projects', 'Below here are some of our previous works. Our team is composed of creative individuals who has years of experience producing many animation product like TVCs, short movies, IP (Intellectual Property), toys, game assets and many more.', '[en]\r\nZiemotion is a professional animation service and content creation company. We create products with great quality from fresh idea to reality. Our team is composed of creative individuals who has years of experience producing animation product like TVCs, short movies, IP (Intellectual Property), toys, game assets and many more.\r\n[/en]\r\n\r\n[id]\r\nZiemotion adalah perusahaan layanan animasi dan pembuatan konten profesional. Kami menciptakan produk dengan kualitas hebat dari ide segar hingga kenyataan. Tim kami terdiri dari individu-individu kreatif yang memiliki pengalaman bertahun-tahun memproduksi banyak produk animasi seperti TVC, film pendek, IP (Kekayaan Intelektual), mainan, aset game, dan banyak lagi.\r\n[/id]'),
(3, 'contact', NULL, 'How can we help you?', 'Ziemotion Animation Studio\r\nPerum. Pesona Sendangadi Estate 1, Blok C 1-2, Jl. Jongke Kidul, Jongke Tengah, Sumberadi, Mlati, Sleman Regency, Special Region of Yogyakarta 55285', ''),
(4, '2d-3d-animation', NULL, 'Ziemotion studio - Create awesome 2D and 3D animated films with us', 'We create 2D and 3D animated films, starting from making assets to rendering, which can be used for various purposes.', ''),
(5, 'audio-visual', NULL, 'Ziemotion Studio - Audio Visual  for vlogs, advertisements, presentations and others.', 'We create content creation that consists of audio and visual aspects, including video and audio editing for vlogs, advertisements, presentations and others.', ''),
(6, 'design-graphic', NULL, 'Ziemotion Studio - creating designs for posters, banners, packaging designs and others.', 'With us you can create designs for posters, banners, packaging designs and others. Ziemotion has been working on many design for various clients.', ''),
(7, 'course-education', NULL, ' Ziemotion Studio offer training services and courses on digital art', 'We also offer training services and courses on digital art, including 2d & 3d animation, audio visual, graphic design, and collaboration with educational institutions.', ''),
(8, 'home', NULL, 'Professional Animation Service and Content Creation', 'Ziemotion Studio is a professional animation service and content creation company. We are passionate to bring great ideas to life. Through uncompromising detail, and a passion for quality. We are producing animation product like TVCs, short movies, IP (Intellectual Property), toys, game assets and many more.', '');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `price_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price_name` varchar(225) NOT NULL,
  `price` varchar(225) NOT NULL,
  `headline` text NOT NULL,
  `description` text NOT NULL,
  `with_service` varchar(100) NOT NULL,
  `no_with_service` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`price_id`, `user_id`, `price_name`, `price`, `headline`, `description`, `with_service`, `no_with_service`, `status`, `date`) VALUES
(4, 1, 'Industri Setup Awal', '90.000/3 Bulan/ Unit', '', '', 'Free', '90.000/3 Bulan/ Unit', 'publish', '2017-03-07 00:50:38'),
(5, 1, 'Industri Kecil', '500.000/ Unit', '', '', 'Free', '270.000/3 Bulan/ Unit', 'publish', '2017-03-07 00:33:55'),
(6, 1, 'Industri Menengah', '750.000/ Unit', '', '', '270.000/3 Bulan/ Unit', 'Call', 'publish', '2017-03-07 00:34:29'),
(7, 1, 'Industri Besar', 'Call', '', '', 'Call', 'Call', 'publish', '2017-03-07 00:34:49'),
(8, 1, 'Pemerintah', 'Call', '', '', 'Call', 'Call', 'publish', '2017-03-07 00:35:01'),
(9, 0, '', '', 'awdawd', '', '', '', '', '2017-03-07 08:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `basic_description` text,
  `price` varchar(20) DEFAULT NULL,
  `old_price` varchar(20) DEFAULT NULL,
  `folder` varchar(15) DEFAULT NULL COMMENT 'folder with images',
  `image` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `time` int(10) UNSIGNED NOT NULL COMMENT 'time created',
  `time_update` int(10) UNSIGNED NOT NULL COMMENT 'time updated',
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `shop_categorie` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `procurement` int(10) UNSIGNED NOT NULL,
  `in_slider` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL,
  `virtual_products` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_id` int(5) DEFAULT NULL,
  `position` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `basic_description`, `price`, `old_price`, `folder`, `image`, `video`, `time`, `time_update`, `visibility`, `shop_categorie`, `quantity`, `procurement`, `in_slider`, `url`, `virtual_products`, `brand_id`, `position`, `vendor_id`) VALUES
(1, 'YB 40', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '3461597265439', 'yb-40.jpeg', NULL, 1597265439, 0, 1, 12, 1, 0, 0, 'yb-40_1', NULL, NULL, 0, 0),
(2, 'YB 43', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '6541597265439', 'yb-43.jpeg', NULL, 1597265439, 0, 1, 12, 1, 0, 0, 'yb-43_2', NULL, NULL, 0, 0),
(3, 'YB 50', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '4481597265439', 'yb-50.jpeg', NULL, 1597265439, 0, 1, 12, 1, 0, 0, 'yb-50_3', NULL, NULL, 0, 0),
(4, 'YB 81 (Open Type)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '6871597265439', 'yb-81-open.jpeg', NULL, 1597265439, 0, 1, 12, 1, 0, 0, 'yb-81-open-type_4', NULL, NULL, 0, 0),
(5, 'YB 81 (Side Type)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '6561597265439', 'yb-81-side.jpeg', NULL, 1597265439, 0, 1, 12, 1, 0, 0, 'yb-81-side-type_5', NULL, NULL, 0, 0),
(6, 'YB 81Y ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '5071597265439', 'yb-81y.jpeg', NULL, 1597265439, 0, 1, 12, 1, 0, 0, 'yb-81y_6', NULL, NULL, 0, 0),
(7, 'YB 121', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '8121597265439', 'yb-121y.jpeg', NULL, 1597265439, 0, 1, 12, 1, 0, 0, 'yb-121_7', NULL, NULL, 0, 0),
(8, 'YB 131', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '3731597265439', 'yb-131y.jpeg', NULL, 1597265439, 0, 1, 12, 1, 0, 0, 'yb-131_8', NULL, NULL, 0, 0),
(9, 'Accumulator SB 81', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n', '', '0', '0', '3391597268347', 'Accumulator.jpg', NULL, 1597268347, 1607693339, 1, 15, 1, 0, 0, 'accumulator-sb-81_9', NULL, NULL, 0, 0),
(10, 'Baut Accumulator M12', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n', '', '0', '0', '8191597268347', 'Baut Accumulator 1.jpeg', NULL, 1597268347, 1607693359, 1, 15, 1, 0, 0, 'baut-accumulator-m12_10', NULL, NULL, 0, 0),
(11, 'Baut Accumulator M20', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '5241597268347', 'Baut Accumulator.JPG', NULL, 1597268347, 1598054957, 1, 15, 1, 0, 0, 'baut-accumulator-m20_11', NULL, NULL, 0, 0),
(12, 'Bracket Piping Kits YB81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '9771597268347', 'unnamed', NULL, 1597268347, 0, 1, 15, 1, 0, 0, 'bracket-piping-kits-yb81_12', NULL, NULL, 0, 0),
(13, 'Bracket YB-81 (Box Type)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '4761597268347', 'unnamed', NULL, 1597268347, 0, 1, 15, 1, 0, 0, 'bracket-yb-81-box-type_13', NULL, NULL, 0, 0),
(14, 'Bush Pin SB121', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '8021597268347', 'Bush Pin 1.jpeg', NULL, 1597268347, 1598054957, 1, 15, 1, 0, 0, 'bush-pin-sb121_14', NULL, NULL, 0, 0),
(15, 'Bush Pin SB81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '8301597268347', 'Bush Pin 2.jpeg', NULL, 1597268347, 1598054957, 1, 15, 1, 0, 0, 'bush-pin-sb81_15', NULL, NULL, 0, 0),
(16, 'Charging Valve', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '8331597268347', 'Tanpa Foto', NULL, 1597268347, 1598054957, 1, 15, 1, 0, 0, 'charging-valve_16', NULL, NULL, 0, 0),
(17, 'Chisel SB 121', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '5321597268348', 'Chisel -.jpg', NULL, 1597268348, 1598054957, 1, 15, 1, 0, 0, 'chisel-sb-121_17', NULL, NULL, 0, 0),
(18, 'Chisel SB 131', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '9211597268348', 'Chisel -.jpg', NULL, 1597268348, 1598054957, 1, 15, 1, 0, 0, 'chisel-sb-131_18', NULL, NULL, 0, 0),
(19, 'Chisel SB 43', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '9751597268348', 'Chisel -.jpg', NULL, 1597268348, 1598054957, 1, 15, 1, 0, 0, 'chisel-sb-43_19', NULL, NULL, 0, 0),
(20, 'Chisel SB 50', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '2751597268348', 'Chisel -.jpg', NULL, 1597268348, 1598054957, 1, 15, 1, 0, 0, 'chisel-sb-50_20', NULL, NULL, 0, 0),
(21, 'Chisel SB 81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '7151597268348', 'Chisel -.jpg', NULL, 1597268348, 1598054957, 1, 15, 1, 0, 0, 'chisel-sb-81_21', NULL, NULL, 0, 0),
(22, 'CHISEL SB70', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '1151597268348', 'Chisel -.jpg', NULL, 1597268348, 1598054957, 1, 15, 1, 0, 0, 'chisel-sb70_22', NULL, NULL, 0, 0),
(23, 'Chisel TOR 23', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '9581597268348', 'Chisel -.jpg', NULL, 1597268348, 1598054957, 1, 15, 1, 0, 0, 'chisel-tor-23_23', NULL, NULL, 0, 0),
(24, 'Control Valve YB 43', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '8251597268348', 'Tanpa Foto', NULL, 1597268348, 1598054957, 1, 15, 1, 0, 0, 'control-valve-yb-43_24', NULL, NULL, 0, 0),
(25, 'Control Valve YB 81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '3791597268348', 'Tanpa Foto', NULL, 1597268348, 1598054957, 1, 15, 1, 0, 0, 'control-valve-yb-81_25', NULL, NULL, 0, 0),
(26, 'Cylinder Assy SB 121', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '7291597268348', 'Cylinder 1.jpeg', NULL, 1597268348, 1598054957, 1, 15, 1, 0, 0, 'cylinder-assy-sb-121_26', NULL, NULL, 0, 0),
(27, 'Cylinder Assy SB 81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '4221597268348', 'Cylinder 2.jpeg', NULL, 1597268348, 1598054957, 1, 15, 1, 0, 0, 'cylinder-assy-sb-81_27', NULL, NULL, 0, 0),
(28, 'Cylinder Assy SB 81 Acc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '7611597268348', 'Cylinder Assy SB 81 Acc.JPG', NULL, 1597268348, 1598054957, 1, 15, 1, 0, 0, 'cylinder-assy-sb-81-acc_28', NULL, NULL, 0, 0),
(29, 'Damper Set SB-121', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '8881597268348', 'DUMPER SET SB81 1.jpeg', NULL, 1597268348, 1598054958, 1, 15, 1, 0, 0, 'damper-set-sb-121_29', NULL, NULL, 0, 0),
(30, 'Damper set SB-81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '4011597268348', 'DUMPER SET SB81 1.jpeg', NULL, 1597268348, 1598054958, 1, 15, 1, 0, 0, 'damper-set-sb-81_30', NULL, NULL, 0, 0),
(31, 'Diaphgram SB 121', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '9931597268348', 'Diagfram.JPG', NULL, 1597268348, 1598054958, 1, 15, 1, 0, 0, 'diaphgram-sb-121_31', NULL, NULL, 0, 0),
(32, 'Diaphgram SB 131', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '3861597268348', 'Diagfram.JPG', NULL, 1597268348, 1598054958, 1, 15, 1, 0, 0, 'diaphgram-sb-131_32', NULL, NULL, 0, 0),
(33, 'Diaphgram SB 81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '4881597268348', 'Diagfram.JPG', NULL, 1597268348, 1598054958, 1, 15, 1, 0, 0, 'diaphgram-sb-81_33', NULL, NULL, 0, 0),
(34, 'Dry Ice 20kg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '8831597268348', 'Tanpa Foto', NULL, 1597268348, 1598054958, 1, 15, 1, 0, 0, 'dry-ice-20kg_34', NULL, NULL, 0, 0),
(35, 'Extra Valve PC200-8', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '2801597268348', 'Extra Value PC.jpeg', NULL, 1597268348, 1598054958, 1, 15, 1, 0, 0, 'extra-valve-pc200-8_35', NULL, NULL, 0, 0),
(36, 'Extra Valve SK-200', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '9471597268349', 'Extra Value SK.jpeg', NULL, 1597268349, 1598054958, 1, 15, 1, 0, 0, 'extra-valve-sk-200_36', NULL, NULL, 0, 0),
(37, 'Front Cover  YB 81 (Open Type)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '7901597268349', 'FRONT COVER YB81 OPEN.JPG', NULL, 1597268349, 1598054958, 1, 15, 1, 0, 0, 'front-cover-yb-81-open-type_37', NULL, NULL, 0, 0),
(38, 'Front Cover  YB 81Y (Box Type)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '5631597268349', 'FRONT COVER YB81X BT.jpeg', NULL, 1597268349, 1598054958, 1, 15, 1, 0, 0, 'front-cover-yb-81y-box-type_38', NULL, NULL, 0, 0),
(39, 'Front Cover TOR 23', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '3881597268349', 'Front Cover 131.jpeg', NULL, 1597268349, 1598054958, 1, 15, 1, 0, 0, 'front-cover-tor-23_39', NULL, NULL, 0, 0),
(40, 'Front Cover YB 121 (Box Type)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '9831597268349', 'Front Cover 121 Box.jpeg', NULL, 1597268349, 1598054958, 1, 15, 1, 0, 0, 'front-cover-yb-121-box-type_40', NULL, NULL, 0, 0),
(41, 'Front Cover YB 121 (Open Type)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '9571597268349', 'Front Cover 121 Box.jpeg', NULL, 1597268349, 1598054958, 1, 15, 1, 0, 0, 'front-cover-yb-121-open-type_41', NULL, NULL, 0, 0),
(42, 'Front Cover YB 131', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '2081597268349', 'Front Cover 131.jpeg', NULL, 1597268349, 1598054958, 1, 15, 1, 0, 0, 'front-cover-yb-131_42', NULL, NULL, 0, 0),
(43, 'Front Cover YB 81 (TRFS)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '4171597268349', 'FRONT COVER YB81 TFRS.jpeg', NULL, 1597268349, 1598054958, 1, 15, 1, 0, 0, 'front-cover-yb-81-trfs_43', NULL, NULL, 0, 0),
(44, 'Front Cover YB-43', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '1331597268349', 'Front Cover 131.jpeg', NULL, 1597268349, 1598054958, 1, 15, 1, 0, 0, 'front-cover-yb-43_44', NULL, NULL, 0, 0),
(45, 'Front Head Assy YB 121', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '2131597268349', 'FRONT HEAD 1.jpeg', NULL, 1597268349, 1598054958, 1, 15, 1, 0, 0, 'front-head-assy-yb-121_45', NULL, NULL, 0, 0),
(46, 'Front Head Assy YB 81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '1681597268349', 'FRONT HEAD 2.jpeg', NULL, 1597268349, 1598054958, 1, 15, 1, 0, 0, 'front-head-assy-yb-81_46', NULL, NULL, 0, 0),
(47, 'Harness Wire', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '5011597268349', 'Tanpa Foto', NULL, 1597268349, 1598054958, 1, 15, 1, 0, 0, 'harness-wire_47', NULL, NULL, 0, 0),
(48, 'Main Frame Assy YB-81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '6121597268349', 'Tanpa Foto', NULL, 1597268349, 1598054958, 1, 15, 1, 0, 0, 'main-frame-assy-yb-81_48', NULL, NULL, 0, 0),
(49, 'Mur Throught Bolt SB 81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '6831597268349', 'MUR THROUGH BOLT SB81 1.jpeg', NULL, 1597268349, 1598054958, 1, 15, 1, 0, 0, 'mur-throught-bolt-sb-81_49', NULL, NULL, 0, 0),
(50, 'N2 Charging Kits (3Way-Valve)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '7691597268349', 'Tanpa Foto', NULL, 1597268349, 1598054958, 1, 15, 1, 0, 0, 'n2-charging-kits-3way-valve_50', NULL, NULL, 0, 0),
(51, 'Nepel Griss', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '4031597268349', 'NIPEL.jpeg', NULL, 1597268349, 1598054958, 1, 15, 1, 0, 0, 'nepel-griss_51', NULL, NULL, 0, 0),
(52, 'Pedal Manual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '7171597268349', 'PEDAL 1.jpeg', NULL, 1597268349, 1598054959, 1, 15, 1, 0, 0, 'pedal-manual_52', NULL, NULL, 0, 0),
(53, 'Pipa Kobelco SK200', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '2221597268349', 'Tanpa Foto', NULL, 1597268349, 1598054959, 1, 15, 1, 0, 0, 'pipa-kobelco-sk200_53', NULL, NULL, 0, 0),
(54, 'Piping Kit SB-121', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '2241597268349', 'PIPING KIT .jpeg', NULL, 1597268349, 1598054959, 1, 15, 1, 0, 0, 'piping-kit-sb-121_54', NULL, NULL, 0, 0),
(55, 'Piping Kit SB-131', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '2361597268350', 'PIPING KIT .jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'piping-kit-sb-131_55', NULL, NULL, 0, 0),
(56, 'Piping Kit SB-81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '1061597268350', 'PIPING KIT .jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'piping-kit-sb-81_56', NULL, NULL, 0, 0),
(57, 'Piston SB 121', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '4551597268350', 'PISTON 1.jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'piston-sb-121_57', NULL, NULL, 0, 0),
(58, 'Piston SB 131', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '8891597268350', 'PISTON 2.jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'piston-sb-131_58', NULL, NULL, 0, 0),
(59, 'Piston SB 81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '5261597268350', 'PISTON 2.jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'piston-sb-81_59', NULL, NULL, 0, 0),
(60, 'Plug Sets YB-81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '8531597268350', 'PLUG SET YB81.jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'plug-sets-yb-81_60', NULL, NULL, 0, 0),
(61, 'Ring Bush SB 121', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '5021597268350', 'RING BUSH 121 1.jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'ring-bush-sb-121_61', NULL, NULL, 0, 0),
(62, 'Ring Bush SB 131', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '9021597268350', 'RING BUSH SB131.JPG', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'ring-bush-sb-131_62', NULL, NULL, 0, 0),
(63, 'Ring Bush SB 81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '3161597268350', 'RING BUSH SB131.JPG', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'ring-bush-sb-81_63', NULL, NULL, 0, 0),
(64, 'Ring Bush TOR23', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '9891597268350', 'RING BUSH TOR 23.jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'ring-bush-tor23_64', NULL, NULL, 0, 0),
(65, 'Rod Pin SB43', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '3761597268350', 'ROD PIN 50.jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'rod-pin-sb43_65', NULL, NULL, 0, 0),
(66, 'Rod Pin SB50', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '2431597268350', 'ROD PIN 50.jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'rod-pin-sb50_66', NULL, NULL, 0, 0),
(67, 'Rod Pin SU 85 SOOSAN', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '3881597268350', 'ROD PIN YB81 1.jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'rod-pin-su-85-soosan_67', NULL, NULL, 0, 0),
(68, 'Rod Pin TOR 23', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '1921597268350', 'ROD PIN YB81 1.jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'rod-pin-tor-23_68', NULL, NULL, 0, 0),
(69, 'Rod Pin YB 121', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '1331597268350', 'ROD PIN YB81 1.jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'rod-pin-yb-121_69', NULL, NULL, 0, 0),
(70, 'Rod Pin YB 131', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '4811597268350', 'ROD PIN YB81 1.jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'rod-pin-yb-131_70', NULL, NULL, 0, 0),
(71, 'Rod Pin YB 81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '7381597268350', 'ROD PIN YB81 1.jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'rod-pin-yb-81_71', NULL, NULL, 0, 0),
(72, 'Rubber Plug Besar', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '1581597268350', 'RUBER KECIL, BESAR BACKHEAD 1.jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'rubber-plug-besar_72', NULL, NULL, 0, 0),
(73, 'Rubber Plug Kecil', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '3651597268350', 'RUBER KECIL, BESAR BACKHEAD 2.jpeg', NULL, 1597268350, 1598054959, 1, 15, 1, 0, 0, 'rubber-plug-kecil_73', NULL, NULL, 0, 0),
(74, 'Seal Kit SB 121', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '6751597268351', 'SEAL KIT 2.jpeg', NULL, 1597268351, 1598054960, 1, 15, 1, 0, 0, 'seal-kit-sb-121_74', NULL, NULL, 0, 0),
(75, 'Seal Kit SB 131', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '1171597268351', 'SEAL KIT 2.jpeg', NULL, 1597268351, 1598054960, 1, 15, 1, 0, 0, 'seal-kit-sb-131_75', NULL, NULL, 0, 0),
(76, 'Seal Kit SB 43', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '1841597268351', 'SEAL KIT 2.jpeg', NULL, 1597268351, 1598054960, 1, 15, 1, 0, 0, 'seal-kit-sb-43_76', NULL, NULL, 0, 0),
(77, 'Seal Kit SB 50', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '6951597268351', 'SEAL KIT 2.jpeg', NULL, 1597268351, 1598054960, 1, 15, 1, 0, 0, 'seal-kit-sb-50_77', NULL, NULL, 0, 0),
(78, 'Seal Kit SB 81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '9311597268351', 'SEAL KIT 2.jpeg', NULL, 1597268351, 1598054960, 1, 15, 1, 0, 0, 'seal-kit-sb-81_78', NULL, NULL, 0, 0),
(79, 'Seal Kit SB 85', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '6721597268351', 'SEAL KIT 2.jpeg', NULL, 1597268351, 1598054960, 1, 15, 1, 0, 0, 'seal-kit-sb-85_79', NULL, NULL, 0, 0),
(80, 'Seal Kit TOR 23', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '4981597268351', 'SEAL KIT 2.jpeg', NULL, 1597268351, 1598054960, 1, 15, 1, 0, 0, 'seal-kit-tor-23_80', NULL, NULL, 0, 0),
(81, 'Seal Retainer SB81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '1591597268351', 'SEAL RETAINER SB81 1.jpeg', NULL, 1597268351, 1598054960, 1, 15, 1, 0, 0, 'seal-retainer-sb81_81', NULL, NULL, 0, 0),
(82, 'Sensor Pressure', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '7751597268351', 'Tanpa Foto', NULL, 1597268351, 1598054960, 1, 15, 1, 0, 0, 'sensor-pressure_82', NULL, NULL, 0, 0),
(83, 'Service Breaker', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '9461597268351', 'Tanpa Foto', NULL, 1597268351, 1598054960, 1, 15, 1, 0, 0, 'service-breaker_83', NULL, NULL, 0, 0),
(84, 'Side Bolt YB-81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '4501597268351', 'SIDE BOLT YB81 1.jpeg', NULL, 1597268351, 1598054960, 1, 15, 1, 0, 0, 'side-bolt-yb-81_84', NULL, NULL, 0, 0),
(85, 'Side Bolts YB-121', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '7151597268351', 'SIDE BOLT YB81 1.jpeg', NULL, 1597268351, 1598054960, 1, 15, 1, 0, 0, 'side-bolts-yb-121_85', NULL, NULL, 0, 0),
(86, 'Side Bolts YB-43', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '7541597268351', 'SIDE BOLT YB43 1.jpeg', NULL, 1597268351, 1598054960, 1, 15, 1, 0, 0, 'side-bolts-yb-43_86', NULL, NULL, 0, 0),
(87, 'Snap Ring', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '3281597268352', 'SNAP RING.jpeg', NULL, 1597268352, 1598054960, 1, 15, 1, 0, 0, 'snap-ring_87', NULL, NULL, 0, 0),
(88, 'Stop Pin SB 121', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '3241597268352', 'STOP PIN 121 1.jpeg', NULL, 1597268352, 1598054960, 1, 15, 1, 0, 0, 'stop-pin-sb-121_88', NULL, NULL, 0, 0),
(89, 'Stop Pin SB 43', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '3241597268352', 'STOP PIN 121 1.jpeg', NULL, 1597268352, 1598054960, 1, 15, 1, 0, 0, 'stop-pin-sb-43_89', NULL, NULL, 0, 0),
(90, 'Stop Pin SB 50', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '8421597268352', 'STOP PIN 121 1.jpeg', NULL, 1597268352, 1598054961, 1, 15, 1, 0, 0, 'stop-pin-sb-50_90', NULL, NULL, 0, 0),
(91, 'Stop Pin SB 81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '2881597268352', 'STOP PIN 121 1.jpeg', NULL, 1597268352, 1598054961, 1, 15, 1, 0, 0, 'stop-pin-sb-81_91', NULL, NULL, 0, 0),
(92, 'Stop Pin SB 85', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '9001597268352', 'STOP PIN 121 1.jpeg', NULL, 1597268352, 1598054961, 1, 15, 1, 0, 0, 'stop-pin-sb-85_92', NULL, NULL, 0, 0),
(93, 'Stop Pin TOR23', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '3981597268352', 'STOP PIN 121 1.jpeg', NULL, 1597268352, 1598054961, 1, 15, 1, 0, 0, 'stop-pin-tor23_93', NULL, NULL, 0, 0);
INSERT INTO `products` (`id`, `title`, `description`, `basic_description`, `price`, `old_price`, `folder`, `image`, `video`, `time`, `time_update`, `visibility`, `shop_categorie`, `quantity`, `procurement`, `in_slider`, `url`, `virtual_products`, `brand_id`, `position`, `vendor_id`) VALUES
(94, 'Through Bold SB 121', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '9691597268352', 'THROUGH BOLD SB121 1.jpeg', NULL, 1597268352, 1598054961, 1, 15, 1, 0, 0, 'through-bold-sb-121_94', NULL, NULL, 0, 0),
(95, 'Through Bold SB 131', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '7501597268352', 'THROUGH BOLD SB121 1.jpeg', NULL, 1597268352, 1598054961, 1, 15, 1, 0, 0, 'through-bold-sb-131_95', NULL, NULL, 0, 0),
(96, 'Through Bold SB 81', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '8361597268352', 'THROUGH BOLD SB121 1.jpeg', NULL, 1597268352, 1598054961, 1, 15, 1, 0, 0, 'through-bold-sb-81_96', NULL, NULL, 0, 0),
(97, 'Through Bold TOR23', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '5571597268352', 'THROUGH BOLD TOR 23 1.jpeg', NULL, 1597268352, 1598054961, 1, 15, 1, 0, 0, 'through-bold-tor23_97', NULL, NULL, 0, 0),
(98, 'Through Bolts YB-43', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '2451597268352', 'THROUGH BOLD SB121 1.jpeg', NULL, 1597268352, 1598054961, 1, 15, 1, 0, 0, 'through-bolts-yb-43_98', NULL, NULL, 0, 0),
(99, 'Top Bracket Montabert M900', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n', '', '0', '0', '1591597268352', 'Tanpa Foto', NULL, 1597268352, 1607693259, 1, 15, 1, 0, 0, 'top-bracket-montabert-m900_99', NULL, NULL, 0, 0),
(100, 'Valve Adjuster', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n', '', '0', '0', '4281597268353', 'Tanpa Foto', NULL, 1597268353, 1607850359, 1, 15, 1, 0, 0, 'valve-adjuster_100', NULL, NULL, 0, 0),
(101, 'Attachment', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '9971598087652', 'no-image', NULL, 1598087652, 0, 1, 16, 1, 0, 0, 'attachment_101', NULL, NULL, 0, 0),
(102, 'Engine ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '9091598087652', 'no-image', NULL, 1598087652, 0, 1, 16, 1, 0, 0, 'engine_102', NULL, NULL, 0, 0),
(103, 'Injector ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '3021598087652', 'no-image', NULL, 1598087652, 0, 1, 16, 1, 0, 0, 'injector_103', NULL, NULL, 0, 0),
(104, 'Electrical ', '[id]Melakukan perawatan untuk pencegahan sebelum terjadi kerusakan, \r\nmemperbaiki atau merubah untuk fungsi yang lebih handal, \r\nperbaikan yang dilakukan pada saat mesin mengalami kegagalan atau kerusakan saat dioperasikan[/id]\r\n\r\n[en]Melakukan perawatan untuk pencegahan sebelum terjadi kerusakan, \r\nmemperbaiki atau merubah untuk fungsi yang lebih handal, \r\nperbaikan yang dilakukan pada saat mesin mengalami kegagalan atau kerusakan saat dioperasikan[/en]\r\n', NULL, '0', '0', '4571598087653', 'no-image', NULL, 1598087653, 0, 1, 16, 1, 0, 0, 'electrical_104', NULL, NULL, 0, 0),
(105, 'Exavator Bucket ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '8461598087813', 'no-image', NULL, 1598087813, 0, 1, 17, 1, 0, 0, 'exavator-bucket_105', NULL, NULL, 0, 0),
(106, 'Exavator Breaker ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '4781598087813', 'no-image', NULL, 1598087813, 0, 1, 17, 1, 0, 0, 'exavator-breaker_106', NULL, NULL, 0, 0),
(107, 'Vibro Roller ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '3661598087813', 'no-image', NULL, 1598087813, 0, 1, 17, 1, 0, 0, 'vibro-roller_107', NULL, NULL, 0, 0),
(108, 'Dozer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', NULL, '0', '0', '4721598087813', 'no-image', NULL, 1598087813, 0, 1, 17, 1, 0, 0, 'dozer_108', NULL, NULL, 0, 0),
(109, 'Borpile ', NULL, NULL, '0', '', '5241598087813', 'no-image', NULL, 1598087813, 0, 1, 17, 1, 0, 0, 'borpile_109', NULL, NULL, 0, 0),
(110, 'Crane ', NULL, NULL, '0', '', '4131598087813', 'no-image', NULL, 1598087813, 0, 1, 17, 1, 0, 0, 'crane_110', NULL, NULL, 0, 0),
(111, 'Vibro Hammer', NULL, NULL, '0', '', '8561598087813', 'no-image', NULL, 1598087813, 0, 1, 17, 1, 0, 0, 'vibro-hammer_111', NULL, NULL, 0, 0),
(112, 'Forklift', NULL, NULL, '0', '', '8041598087813', 'no-image', NULL, 1598087813, 0, 1, 17, 1, 0, 0, 'forklift_112', NULL, NULL, 0, 0),
(113, 'Trailer', NULL, NULL, '0', '', '6471598087813', 'no-image', NULL, 1598087813, 0, 1, 17, 1, 0, 0, 'trailer_113', NULL, NULL, 0, 0),
(114, 'Truck', '', '', '20000', '', '3361598087813', 'no-image', NULL, 1598087813, 1677683878, 1, 17, 1, 0, 0, 'truck_114', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_for` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT 'untitled',
  `category_description` text,
  `position` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `sub_for`, `name`, `slug`, `category_description`, `position`) VALUES
(1, 0, 'Driller', 'untitled', NULL, 0),
(11, 0, 'Attatchments', 'untitled', '[id]Produk Attachment dari Yukimura[/id]\r\n', 0),
(12, 11, 'Breakers', 'untitled', 'Breaker merupakan attachment / alat yang dipasang pada alat berat biasanya pada Excavator. Breaker digunakan untuk pemecah dan penghancur material. Hydraulic Breaker yang di pasang pada alat berat lain harus disesuaikan dengan memperhatikan kapasitas dan tipe  alat berat itu sendiri. Ada beberapa jenis Hydraulic Breaker dengan kapasitas,tenaga kecil, menengah dan berat. Yukimura Hydraulic Breaker adalah pilihannya.', 1),
(13, 11, 'Rotary Graple', 'untitled', NULL, 2),
(14, 11, 'Vibro Ripper', 'untitled', NULL, 3),
(15, 0, 'Sparepart Breakers', 'untitled', NULL, 1),
(16, 0, 'Repairs', 'untitled', NULL, 2),
(17, 0, 'Rental', 'untitled', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_category_specification`
--

CREATE TABLE `product_category_specification` (
  `specification_id` int(11) NOT NULL,
  `spec_name` varchar(50) DEFAULT NULL,
  `unit` varchar(10) DEFAULT NULL,
  `product_categories_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT '1',
  `spec_type` varchar(50) DEFAULT '0',
  `sub_for` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category_specification`
--

INSERT INTO `product_category_specification` (`specification_id`, `spec_name`, `unit`, `product_categories_id`, `position`, `spec_type`, `sub_for`) VALUES
(1, 'Suitable Excavator (ton)', 'ton', 12, 1, '0', 34),
(2, 'Suitable Excavator (lb)', 'lb', 12, 1, '0', 34),
(3, 'Operating Weight (kg)', 'kg', 12, 1, '0', 35),
(4, 'Operating Weight (lb)', 'lb', 12, 1, '0', 35),
(5, 'Required Oil Flow (l/min)', 'l/min', 12, 1, '0', 36),
(6, 'Required Oil Flow (gal/min)', 'gal/min', 12, 1, '0', 36),
(7, 'Setting Pressure (bar)', 'bar', 12, 1, '0', 37),
(8, 'Setting Pressure (psi)', 'psi', 12, 1, '0', 37),
(9, 'Operating Pressure (bar)', 'bar', 12, 1, '0', 38),
(10, 'Operating Pressure (psi)', 'psi', 12, 1, '0', 38),
(11, 'Impact Energy (joule)', 'joule', 12, 1, '0', 39),
(12, 'Impact Energy (ft.lbs)', 'ft.lbs', 12, 1, '0', 39),
(13, 'Impact Energy (kg.m)', 'kg.m', 12, 1, '0', 39),
(14, 'Impact Rate (bpm)', 'bpm', 12, 1, '0', 40),
(15, 'Hose Diameter (inch)', 'inch', 12, 1, '0', 41),
(16, 'Noise Level (db)', 'db', 12, 1, '0', 42),
(17, 'Tool Diameter (mm)', 'mm', 12, 1, '0', 43),
(18, 'Tool Diameter (inch)', 'inch', 12, 1, '0', 43),
(19, 'Type', NULL, 12, 0, '0', 0),
(20, 'DOOSAN DAEWOO', NULL, 12, 1, 'excavator', 0),
(21, 'HYUNDAI', NULL, 12, 1, 'excavator', 0),
(22, 'VOLVO', NULL, 12, 1, 'excavator', 0),
(23, 'CATERPILLAR', NULL, 12, 1, 'excavator', 0),
(24, 'KOMATSU', NULL, 12, 1, 'excavator', 0),
(25, 'HITACHI', NULL, 12, 1, 'excavator', 0),
(26, 'KOBELCO', NULL, 12, 1, 'excavator', 0),
(27, 'CASE', NULL, 12, 1, 'excavator', 0),
(28, 'NEW HOLAND', NULL, 12, 1, 'excavator', 0),
(29, 'JCB', NULL, 12, 1, 'excavator', 0),
(30, 'KUBOTA / HIDROMEK', NULL, 12, 1, 'excavator', 0),
(31, 'YANMAR / SUMIMOTO', NULL, 12, 1, 'excavator', 0),
(32, 'JOHN DEERE', NULL, 12, 1, 'excavator', 0),
(33, 'IHI / LIEBHERR', NULL, 12, 1, 'excavator', 0),
(34, 'Suitable Excavator', NULL, 12, 1, '0', 0),
(35, 'Operating Weight', NULL, 12, 1, '0', 0),
(36, 'Required Oil Flow ', NULL, 12, 1, '0', 0),
(37, 'Setting Pressure ', NULL, 12, 1, '0', 0),
(38, 'Operating Pressure ', NULL, 12, 1, '0', 0),
(39, 'Impact Energy', NULL, 12, 1, '0', 0),
(40, 'Impact Rate', NULL, 12, 1, '0', 0),
(41, 'Hose Diameter', NULL, 12, 1, '0', 0),
(42, 'Noise Level', NULL, 12, 1, '0', 0),
(43, 'Tool Diameter', NULL, 12, 1, '0', 0),
(48, 'Product Type', NULL, 15, 1, 'product-type', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_specification`
--

CREATE TABLE `product_specification` (
  `product_specification_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_category_specification_id` int(11) DEFAULT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_specification`
--

INSERT INTO `product_specification` (`product_specification_id`, `product_id`, `product_category_specification_id`, `value`) VALUES
(1, 57, 19, '(Open Typssse)'),
(2, 57, 1, '4-7'),
(3, 57, 2, '8962-15432'),
(4, 57, 3, '321'),
(5, 57, 4, '706'),
(6, 57, 5, '40-70'),
(7, 57, 6, '10.6-18.5'),
(8, 57, 7, '170'),
(9, 57, 8, '2418'),
(10, 57, 9, '110-140'),
(11, 57, 10, '1565-1991'),
(12, 57, 11, '677'),
(13, 57, 12, '500'),
(14, 57, 13, '70'),
(15, 57, 14, '500-900'),
(16, 57, 15, '1/2'),
(17, 57, 16, '109'),
(18, 57, 17, '68'),
(19, 57, 18, '2.7'),
(20, 57, 20, 'DX50 / DX55 / DX60'),
(21, 57, 21, 'R45 / R50 / R55'),
(22, 57, 22, 'EC35 / EC38 / EC45 / EC55 / ECR58 / EW60'),
(23, 57, 23, '304C / 305C / 424'),
(24, 57, 24, 'PC40 / PC45 / PC55 / PC 60'),
(25, 57, 25, 'EX40 / ZX50 / ZX55 / ZX60'),
(26, 57, 26, 'SK45 / SK50 / SK55'),
(27, 57, 27, 'CX40 / CX50'),
(28, 57, 28, 'E40 / E50'),
(29, 57, 29, 'ECX / ECD /4CX / 8040 / 8045 / 8052 / JZ70 / 8080'),
(30, 57, 30, 'U-30 / KX161-3'),
(31, 57, 31, 'VI030 / VI035 / VI055'),
(32, 57, 32, 'JD315 / JD41'),
(33, 57, 33, 'AICHI D600 / 30NX2 / 35NX2'),
(34, 58, 19, '(Open Type)'),
(35, 58, 1, '6-9'),
(36, 58, 2, '13228-19841'),
(37, 58, 3, '407'),
(38, 58, 4, '895'),
(39, 58, 5, '50-90'),
(40, 58, 6, '13.2-23.8'),
(41, 58, 7, '180'),
(42, 58, 8, '2560'),
(43, 58, 9, '120-150'),
(44, 58, 10, '1707-2134'),
(45, 58, 11, '1017'),
(46, 58, 12, '750'),
(47, 58, 13, '104'),
(48, 58, 14, '400-800'),
(49, 58, 15, '1/2'),
(50, 58, 16, '115'),
(51, 58, 17, '75'),
(52, 58, 18, '3.0'),
(53, 58, 20, 'DX70 X DX75'),
(54, 58, 21, 'R75 / R80'),
(55, 58, 22, 'ECR88'),
(56, 58, 23, '424 / 307D / 308D'),
(57, 58, 24, 'PC60 / PC75 / PC78'),
(58, 58, 25, 'EX60 / EX70 /ZX80 / ZX80 / ZX85'),
(59, 58, 26, 'SK70 / SK80'),
(60, 58, 27, 'CX75'),
(61, 58, 28, 'E70 / E75 / E80'),
(62, 58, 29, '3CX / ECD / 4CX / JZ70 / 8080'),
(63, 58, 30, 'HMK102'),
(64, 58, 31, 'VI055'),
(65, 58, 32, '75D. 80D'),
(66, 58, 33, NULL),
(67, 59, 19, '(Open Type)'),
(68, 59, 1, '11-16'),
(69, 59, 2, '24251-35274'),
(70, 59, 3, '979'),
(71, 59, 4, '2154'),
(72, 59, 5, '80-110'),
(73, 59, 6, '21.1-29.1'),
(74, 59, 7, '200'),
(75, 59, 8, '2845'),
(76, 59, 9, '150-170'),
(77, 59, 10, '2134-2418'),
(78, 59, 11, '2033'),
(79, 59, 12, '1500'),
(80, 59, 13, '208'),
(81, 59, 14, '350-700'),
(82, 59, 15, '3/4'),
(83, 59, 16, '114'),
(84, 59, 17, '100'),
(85, 59, 18, '4.0'),
(86, 59, 20, 'DX130 / DX140 / DX155'),
(87, 59, 21, 'R110 / R130 / R140 / R150'),
(88, 59, 22, 'EC130 / EC140 / EW145'),
(89, 59, 23, '311C / 312D / 313D / 314D / 315D'),
(90, 59, 24, 'PC110 /PC120 / PC130'),
(91, 59, 25, 'EX100 / ZX110 / EX120 / ZX130 / ZX135'),
(92, 59, 26, 'SK100 / SK115 / SK135 / SK140'),
(93, 59, 27, 'WX125 / CX130 / CX135 / WX145'),
(94, 59, 28, 'E115 / E135 / E145'),
(95, 59, 29, 'JS115 / JS130 / JS140 / JS145'),
(96, 59, 30, 'HMK140'),
(97, 59, 31, NULL),
(98, 59, 32, '120C / 135D'),
(99, 59, 33, 'A312 / A314'),
(100, 60, 19, '(Open Type)'),
(101, 60, 1, '18-26'),
(102, 60, 2, '39683-57320'),
(103, 60, 3, '2050'),
(104, 60, 4, '4510'),
(105, 60, 5, '120-180'),
(106, 60, 6, '31.7-47.6'),
(107, 60, 7, '210'),
(108, 60, 8, '2987'),
(109, 60, 9, '160-180'),
(110, 60, 10, '2276-2560'),
(111, 60, 11, '4067'),
(112, 60, 12, '3000'),
(113, 60, 13, '415'),
(114, 60, 14, '350-500'),
(115, 60, 15, '1'),
(116, 60, 16, '118'),
(117, 60, 17, '140'),
(118, 60, 18, '5.5'),
(119, 60, 20, 'DX200 / DX210 / DX220 / DX225 / DX250'),
(120, 60, 21, 'R200 / R210 / R220 / R250'),
(121, 60, 22, 'EW200 / EC210 / ECR235'),
(122, 60, 23, '320D / 321C / 322D / 323D / 324D / 200B'),
(123, 60, 24, 'PC200 / PC220 / PC228'),
(124, 60, 25, 'ZX200 / ZX280 / ZX300'),
(125, 60, 26, 'SK200 / SK210 / SK210 / SK220 / SK230 / SK295'),
(126, 60, 27, 'CX210 / CX225 / CX230 / WX240'),
(127, 60, 28, 'E215 / E220 / E225 / E235 / E245'),
(128, 60, 29, 'JS230 / JS235 / JS240 / JS255'),
(129, 60, 30, NULL),
(130, 60, 31, NULL),
(131, 60, 32, '210C / 225C / 230C'),
(132, 60, 33, 'A904 / A914'),
(133, 61, 19, '(Side Type)'),
(134, 61, 1, '18-26'),
(135, 61, 2, '39683-57320'),
(136, 61, 3, '1950'),
(137, 61, 4, '4290'),
(138, 61, 5, '120-180'),
(139, 61, 6, '31.7-47.6'),
(140, 61, 7, '210'),
(141, 61, 8, '2987'),
(142, 61, 9, '160-180'),
(143, 61, 10, '2276-2560'),
(144, 61, 11, '4067'),
(145, 61, 12, '3000'),
(146, 61, 13, '415'),
(147, 61, 14, '350-500'),
(148, 61, 15, '1'),
(149, 61, 16, '118'),
(150, 61, 17, '140'),
(151, 61, 18, '5.5'),
(152, 61, 20, 'DX200 / DX210 / DX220 / DX225 / DX251'),
(153, 61, 21, 'R200 / R210 / R220 / R251'),
(154, 61, 22, 'EW200 / EC210 / ECR236'),
(155, 61, 23, '320D / 321C / 322D / 323D / 324D / 200B'),
(156, 61, 24, 'PC200 / PC220 / PC229'),
(157, 61, 25, 'ZX200 / ZX280 / ZX301'),
(158, 61, 26, 'SK200 / SK210 / SK210 / SK220 / SK230 / SK296'),
(159, 61, 27, 'CX210 / CX225 / CX230 / WX241'),
(160, 61, 28, 'E215 / E220 / E225 / E235 / E246'),
(161, 61, 29, 'JS230 / JS235 / JS240 / JS256'),
(162, 61, 30, NULL),
(163, 61, 31, NULL),
(164, 61, 32, '210C / 225C / 230C'),
(165, 61, 33, 'A904 / A915'),
(166, 62, 19, '(Box Type)'),
(167, 62, 1, '18-26'),
(168, 62, 2, '39683-57320'),
(169, 62, 3, '1978'),
(170, 62, 4, '4352'),
(171, 62, 5, '120-180'),
(172, 62, 6, '31.7-47.6'),
(173, 62, 7, '210'),
(174, 62, 8, '2987'),
(175, 62, 9, '160-180'),
(176, 62, 10, '2276-2560'),
(177, 62, 11, '4067'),
(178, 62, 12, '3000'),
(179, 62, 13, '415'),
(180, 62, 14, '350-500'),
(181, 62, 15, '1'),
(182, 62, 16, '118'),
(183, 62, 17, '140'),
(184, 62, 18, '5.5'),
(185, 62, 20, 'DX200 / DX210 / DX220 / DX225 / DX252'),
(186, 62, 21, 'R200 / R210 / R220 / R252'),
(187, 62, 22, 'EW200 / EC210 / ECR237'),
(188, 62, 23, '320D / 321C / 322D / 323D / 324D / 200B'),
(189, 62, 24, 'PC200 / PC220 / PC230'),
(190, 62, 25, 'ZX200 / ZX280 / ZX302'),
(191, 62, 26, 'SK200 / SK210 / SK210 / SK220 / SK230 / SK297'),
(192, 62, 27, 'CX210 / CX225 / CX230 / WX242'),
(193, 62, 28, 'E215 / E220 / E225 / E235 / E247'),
(194, 62, 29, 'JS230 / JS235 / JS240 / JS257'),
(195, 62, 30, NULL),
(196, 62, 31, NULL),
(197, 62, 32, '210C / 225C / 230C'),
(198, 62, 33, 'A904 / A916'),
(199, 63, 19, '(Box Type)'),
(200, 63, 1, '28-35'),
(201, 63, 2, '61729-77140'),
(202, 63, 3, '2896'),
(203, 63, 4, '6371'),
(204, 63, 5, '180-240'),
(205, 63, 6, '47.6-63.4'),
(206, 63, 7, '210'),
(207, 63, 8, '2987'),
(208, 63, 9, '160-180'),
(209, 63, 10, '2276-2560'),
(210, 63, 11, '6779'),
(211, 63, 12, '5000'),
(212, 63, 13, '692'),
(213, 63, 14, '300-450'),
(214, 63, 15, '1.25'),
(215, 63, 16, '123'),
(216, 63, 17, '155'),
(217, 63, 18, '6.1'),
(218, 63, 20, 'DX290 /DX300 /DX320 / DX330 / DX340'),
(219, 63, 21, 'R280 / R290 / R300 / R305 / R320 / R360'),
(220, 63, 22, 'EC290 / EC305 / EC330'),
(221, 63, 23, '325D / 328D / 329D / 330D / 235D'),
(222, 63, 24, 'PC290 / PC300 /PC308 / PC2330 / PC340 / PC350'),
(223, 63, 25, 'ZX280 / EX300 / ZX330'),
(224, 63, 26, 'SK295 / SK330 / SK400 / SK480'),
(225, 63, 27, 'CX290 / CX330 / CX350'),
(226, 63, 28, 'E305 / E355'),
(227, 63, 29, 'JS290 / JS330'),
(228, 63, 30, 'HMK300'),
(229, 63, 31, 'SH300 / SH330 / SH35'),
(230, 63, 32, '330C / 350D'),
(231, 63, 33, 'A934 / R944'),
(232, 64, 19, '(Box Type)'),
(233, 64, 1, '30-45'),
(234, 64, 2, '66138-99207'),
(235, 64, 3, '3399'),
(236, 64, 4, '7474'),
(237, 64, 5, '200-260'),
(238, 64, 6, '50.8-68.7'),
(239, 64, 7, '210'),
(240, 64, 8, '2987'),
(241, 64, 9, '10-180'),
(242, 64, 10, '2276-2560'),
(243, 64, 11, '10846'),
(244, 64, 12, '8000'),
(245, 64, 13, '1107'),
(246, 64, 14, '250-350'),
(247, 64, 15, '1.25'),
(248, 64, 16, '125'),
(249, 64, 17, '175'),
(250, 64, 18, '7.0'),
(251, 64, 20, 'DX320 / DX330 / DX340 / DX360 / DX370 / DX400 / DX'),
(252, 64, 21, 'R300 / R320 / R360 / R380 / R450'),
(253, 64, 22, 'EC330 / EC360 / EC460'),
(254, 64, 23, '330C / 336D / 345D'),
(255, 64, 24, 'PC300 / PC308 / PC330 / PC340 / PC350 / PC400 / PC'),
(256, 64, 25, 'EX300 / ZX330 / ZX350 / EX400 / ZX450'),
(257, 64, 26, 'SK300 / SK350 / SK400 / SK480'),
(258, 64, 27, 'CX330 / CX350'),
(259, 64, 28, 'E335 / E385'),
(260, 64, 29, 'JS330 / JS460'),
(261, 64, 30, 'HMK370'),
(262, 64, 31, 'SH350 / SH450 / SH460'),
(263, 64, 32, '330C / 350D / 370C'),
(264, 64, 33, 'A934 / R944'),
(265, 1, 19, '(Open Type)'),
(266, 1, 1, '4-7'),
(267, 1, 2, '8962-15432'),
(268, 1, 3, '321'),
(269, 1, 4, '706'),
(270, 1, 5, '40-70'),
(271, 1, 6, '10.6-18.5'),
(272, 1, 7, '170'),
(273, 1, 8, '2418'),
(274, 1, 9, '110-140'),
(275, 1, 10, '1565-1991'),
(276, 1, 11, '677'),
(277, 1, 12, '500'),
(278, 1, 13, '70'),
(279, 1, 14, '500-900'),
(280, 1, 15, '1/2'),
(281, 1, 16, '109'),
(282, 1, 17, '68'),
(283, 1, 18, '2.7'),
(284, 1, 20, 'DX50 / DX55 / DX60'),
(285, 1, 21, 'R45 / R50 / R55'),
(286, 1, 22, 'EC35 / EC38 / EC45 / EC55 / ECR58 / EW60'),
(287, 1, 23, '304C / 305C / 424'),
(288, 1, 24, 'PC40 / PC45 / PC55 / PC 60'),
(289, 1, 25, 'EX40 / ZX50 / ZX55 / ZX60'),
(290, 1, 26, 'SK45 / SK50 / SK55'),
(291, 1, 27, 'CX40 / CX50'),
(292, 1, 28, 'E40 / E50'),
(293, 1, 29, 'ECX / ECD /4CX / 8040 / 8045 / 8052 / JZ70 / 8080'),
(294, 1, 30, 'U-30 / KX161-3'),
(295, 1, 31, 'VI030 / VI035 / VI055'),
(296, 1, 32, 'JD315 / JD41'),
(297, 1, 33, 'AICHI D600 / 30NX2 / 35NX2'),
(298, 2, 19, '(Open Type)'),
(299, 2, 1, '6-9'),
(300, 2, 2, '13228-19841'),
(301, 2, 3, '407'),
(302, 2, 4, '895'),
(303, 2, 5, '50-90'),
(304, 2, 6, '13.2-23.8'),
(305, 2, 7, '180'),
(306, 2, 8, '2560'),
(307, 2, 9, '120-150'),
(308, 2, 10, '1707-2134'),
(309, 2, 11, '1017'),
(310, 2, 12, '750'),
(311, 2, 13, '104'),
(312, 2, 14, '400-800'),
(313, 2, 15, '1/2'),
(314, 2, 16, '115'),
(315, 2, 17, '75'),
(316, 2, 18, '3.0'),
(317, 2, 20, 'DX70 X DX75'),
(318, 2, 21, 'R75 / R80'),
(319, 2, 22, 'ECR88'),
(320, 2, 23, '424 / 307D / 308D'),
(321, 2, 24, 'PC60 / PC75 / PC78'),
(322, 2, 25, 'EX60 / EX70 /ZX80 / ZX80 / ZX85'),
(323, 2, 26, 'SK70 / SK80'),
(324, 2, 27, 'CX75'),
(325, 2, 28, 'E70 / E75 / E80'),
(326, 2, 29, '3CX / ECD / 4CX / JZ70 / 8080'),
(327, 2, 30, 'HMK102'),
(328, 2, 31, 'VI055'),
(329, 2, 32, '75D. 80D'),
(330, 2, 33, NULL),
(331, 3, 19, '(Open Type)'),
(332, 3, 1, '11-16'),
(333, 3, 2, '24251-35274'),
(334, 3, 3, '979'),
(335, 3, 4, '2154'),
(336, 3, 5, '80-110'),
(337, 3, 6, '21.1-29.1'),
(338, 3, 7, '200'),
(339, 3, 8, '2845'),
(340, 3, 9, '150-170'),
(341, 3, 10, '2134-2418'),
(342, 3, 11, '2033'),
(343, 3, 12, '1500'),
(344, 3, 13, '208'),
(345, 3, 14, '350-700'),
(346, 3, 15, '3/4'),
(347, 3, 16, '114'),
(348, 3, 17, '100'),
(349, 3, 18, '4.0'),
(350, 3, 20, 'DX130 / DX140 / DX155'),
(351, 3, 21, 'R110 / R130 / R140 / R150'),
(352, 3, 22, 'EC130 / EC140 / EW145'),
(353, 3, 23, '311C / 312D / 313D / 314D / 315D'),
(354, 3, 24, 'PC110 /PC120 / PC130'),
(355, 3, 25, 'EX100 / ZX110 / EX120 / ZX130 / ZX135'),
(356, 3, 26, 'SK100 / SK115 / SK135 / SK140'),
(357, 3, 27, 'WX125 / CX130 / CX135 / WX145'),
(358, 3, 28, 'E115 / E135 / E145'),
(359, 3, 29, 'JS115 / JS130 / JS140 / JS145'),
(360, 3, 30, 'HMK140'),
(361, 3, 31, NULL),
(362, 3, 32, '120C / 135D'),
(363, 3, 33, 'A312 / A314'),
(364, 4, 19, '(Open Type)'),
(365, 4, 1, '18-26'),
(366, 4, 2, '39683-57320'),
(367, 4, 3, '2050'),
(368, 4, 4, '4510'),
(369, 4, 5, '120-180'),
(370, 4, 6, '31.7-47.6'),
(371, 4, 7, '210'),
(372, 4, 8, '2987'),
(373, 4, 9, '160-180'),
(374, 4, 10, '2276-2560'),
(375, 4, 11, '4067'),
(376, 4, 12, '3000'),
(377, 4, 13, '415'),
(378, 4, 14, '350-500'),
(379, 4, 15, '1'),
(380, 4, 16, '118'),
(381, 4, 17, '140'),
(382, 4, 18, '5.5'),
(383, 4, 20, 'DX200 / DX210 / DX220 / DX225 / DX250'),
(384, 4, 21, 'R200 / R210 / R220 / R250'),
(385, 4, 22, 'EW200 / EC210 / ECR235'),
(386, 4, 23, '320D / 321C / 322D / 323D / 324D / 200B'),
(387, 4, 24, 'PC200 / PC220 / PC228'),
(388, 4, 25, 'ZX200 / ZX280 / ZX300'),
(389, 4, 26, 'SK200 / SK210 / SK210 / SK220 / SK230 / SK295'),
(390, 4, 27, 'CX210 / CX225 / CX230 / WX240'),
(391, 4, 28, 'E215 / E220 / E225 / E235 / E245'),
(392, 4, 29, 'JS230 / JS235 / JS240 / JS255'),
(393, 4, 30, NULL),
(394, 4, 31, NULL),
(395, 4, 32, '210C / 225C / 230C'),
(396, 4, 33, 'A904 / A914'),
(397, 5, 19, '(Side Type)'),
(398, 5, 1, '18-26'),
(399, 5, 2, '39683-57320'),
(400, 5, 3, '1950'),
(401, 5, 4, '4290'),
(402, 5, 5, '120-180'),
(403, 5, 6, '31.7-47.6'),
(404, 5, 7, '210'),
(405, 5, 8, '2987'),
(406, 5, 9, '160-180'),
(407, 5, 10, '2276-2560'),
(408, 5, 11, '4067'),
(409, 5, 12, '3000'),
(410, 5, 13, '415'),
(411, 5, 14, '350-500'),
(412, 5, 15, '1'),
(413, 5, 16, '118'),
(414, 5, 17, '140'),
(415, 5, 18, '5.5'),
(416, 5, 20, 'DX200 / DX210 / DX220 / DX225 / DX251'),
(417, 5, 21, 'R200 / R210 / R220 / R251'),
(418, 5, 22, 'EW200 / EC210 / ECR236'),
(419, 5, 23, '320D / 321C / 322D / 323D / 324D / 200B'),
(420, 5, 24, 'PC200 / PC220 / PC229'),
(421, 5, 25, 'ZX200 / ZX280 / ZX301'),
(422, 5, 26, 'SK200 / SK210 / SK210 / SK220 / SK230 / SK296'),
(423, 5, 27, 'CX210 / CX225 / CX230 / WX241'),
(424, 5, 28, 'E215 / E220 / E225 / E235 / E246'),
(425, 5, 29, 'JS230 / JS235 / JS240 / JS256'),
(426, 5, 30, NULL),
(427, 5, 31, NULL),
(428, 5, 32, '210C / 225C / 230C'),
(429, 5, 33, 'A904 / A915'),
(430, 6, 19, '(Box Type)'),
(431, 6, 1, '18-26'),
(432, 6, 2, '39683-57320'),
(433, 6, 3, '1978'),
(434, 6, 4, '4352'),
(435, 6, 5, '120-180'),
(436, 6, 6, '31.7-47.6'),
(437, 6, 7, '210'),
(438, 6, 8, '2987'),
(439, 6, 9, '160-180'),
(440, 6, 10, '2276-2560'),
(441, 6, 11, '4067'),
(442, 6, 12, '3000'),
(443, 6, 13, '415'),
(444, 6, 14, '350-500'),
(445, 6, 15, '1'),
(446, 6, 16, '118'),
(447, 6, 17, '140'),
(448, 6, 18, '5.5'),
(449, 6, 20, 'DX200 / DX210 / DX220 / DX225 / DX252'),
(450, 6, 21, 'R200 / R210 / R220 / R252'),
(451, 6, 22, 'EW200 / EC210 / ECR237'),
(452, 6, 23, '320D / 321C / 322D / 323D / 324D / 200B'),
(453, 6, 24, 'PC200 / PC220 / PC230'),
(454, 6, 25, 'ZX200 / ZX280 / ZX302'),
(455, 6, 26, 'SK200 / SK210 / SK210 / SK220 / SK230 / SK297'),
(456, 6, 27, 'CX210 / CX225 / CX230 / WX242'),
(457, 6, 28, 'E215 / E220 / E225 / E235 / E247'),
(458, 6, 29, 'JS230 / JS235 / JS240 / JS257'),
(459, 6, 30, NULL),
(460, 6, 31, NULL),
(461, 6, 32, '210C / 225C / 230C'),
(462, 6, 33, 'A904 / A916'),
(463, 7, 19, '(Box Type)'),
(464, 7, 1, '28-35'),
(465, 7, 2, '61729-77140'),
(466, 7, 3, '2896'),
(467, 7, 4, '6371'),
(468, 7, 5, '180-240'),
(469, 7, 6, '47.6-63.4'),
(470, 7, 7, '210'),
(471, 7, 8, '2987'),
(472, 7, 9, '160-180'),
(473, 7, 10, '2276-2560'),
(474, 7, 11, '6779'),
(475, 7, 12, '5000'),
(476, 7, 13, '692'),
(477, 7, 14, '300-450'),
(478, 7, 15, '1.25'),
(479, 7, 16, '123'),
(480, 7, 17, '155'),
(481, 7, 18, '6.1'),
(482, 7, 20, 'DX290 /DX300 /DX320 / DX330 / DX340'),
(483, 7, 21, 'R280 / R290 / R300 / R305 / R320 / R360'),
(484, 7, 22, 'EC290 / EC305 / EC330'),
(485, 7, 23, '325D / 328D / 329D / 330D / 235D'),
(486, 7, 24, 'PC290 / PC300 /PC308 / PC2330 / PC340 / PC350'),
(487, 7, 25, 'ZX280 / EX300 / ZX330'),
(488, 7, 26, 'SK295 / SK330 / SK400 / SK480'),
(489, 7, 27, 'CX290 / CX330 / CX350'),
(490, 7, 28, 'E305 / E355'),
(491, 7, 29, 'JS290 / JS330'),
(492, 7, 30, 'HMK300'),
(493, 7, 31, 'SH300 / SH330 / SH35'),
(494, 7, 32, '330C / 350D'),
(495, 7, 33, 'A934 / R944'),
(496, 8, 19, '(Box Type)'),
(497, 8, 1, '30-45'),
(498, 8, 2, '66138-99207'),
(499, 8, 3, '3399'),
(500, 8, 4, '7474'),
(501, 8, 5, '200-260'),
(502, 8, 6, '50.8-68.7'),
(503, 8, 7, '210'),
(504, 8, 8, '2987'),
(505, 8, 9, '10-180'),
(506, 8, 10, '2276-2560'),
(507, 8, 11, '10846'),
(508, 8, 12, '8000'),
(509, 8, 13, '1107'),
(510, 8, 14, '250-350'),
(511, 8, 15, '1.25'),
(512, 8, 16, '125'),
(513, 8, 17, '175'),
(514, 8, 18, '7.0'),
(515, 8, 20, 'DX320 / DX330 / DX340 / DX360 / DX370 / DX400 / DX420 / DX450 / DX470'),
(516, 8, 21, 'R300 / R320 / R360 / R380 / R450'),
(517, 8, 22, 'EC330 / EC360 / EC460'),
(518, 8, 23, '330C / 336D / 345D'),
(519, 8, 24, 'PC300 / PC308 / PC330 / PC340 / PC350 / PC400 / PC450'),
(520, 8, 25, 'EX300 / ZX330 / ZX350 / EX400 / ZX450'),
(521, 8, 26, 'SK300 / SK350 / SK400 / SK480'),
(522, 8, 27, 'CX330 / CX350'),
(523, 8, 28, 'E335 / E385'),
(524, 8, 29, 'JS330 / JS460'),
(525, 8, 30, 'HMK370'),
(526, 8, 31, 'SH350 / SH450 / SH460'),
(527, 8, 32, '330C / 350D / 370C'),
(528, 8, 33, 'A934 / R944'),
(529, 100, 48, 'asd,asd'),
(530, 99, 48, 'dadada'),
(531, 9, 48, 'YB81'),
(532, 10, 48, 'M12 / M20');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `project_name` text,
  `field` text,
  `location` varchar(50) DEFAULT NULL,
  `owner` text,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `contract_value` bigint(20) DEFAULT NULL,
  `image` text,
  `desc` text,
  `status` enum('ongoing','finished','canceled') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `project_name`, `field`, `location`, `owner`, `start_date`, `end_date`, `contract_value`, `image`, `desc`, `status`) VALUES
(1, 'Pembangunan Jalan KA Untuk Jalur Ganda', 'JaIan Kereta Api', 'Kuripan - Pelabuhan', 'Satker Pembangunan Pekalongan - Semarang', '2013-11-01', '2013-12-18', 73063300000, NULL, '', 'finished'),
(3, 'Pembangunan Jalan KA Untuk Jalur Ganda', 'JaIan Kereta Api', 'Tanjung Cirebon', 'Satker Peningkatan Jalan KA Lintas Utara Jawa', '2013-11-05', '2013-12-13', 18070510000, NULL, '', 'finished'),
(4, 'Pembangunan JaIur KA ', 'JaIan Kereta Api', 'Luwung - Karang Suwung', 'Satker Pembangunan Jalur Ganda Cirebon - Kroya', '2014-12-13', '2014-12-28', 13411139000, NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'finished'),
(5, 'Peningkatan Jalur KA', 'JaIan Kereta Api', 'Goprak - Sumberlawang', 'Satker Pembangunan Jalur Ganda Cirebon - Krova', '2014-12-12', '2014-12-31', 9288729000, NULL, '', 'finished'),
(6, 'Pembangunan Jalan KA Untuk Jalur Ganda', 'JaIan Kereta Api', 'Jakarta Kota - Tanjung Priuk', 'Satker Prasarana KA Jabotabek', '2014-12-14', '2014-12-24', 9263184000, NULL, '', 'finished'),
(7, 'Pembuatan Badan Jalan KA', 'JaIan Kereta Api', 'Soka - Kebumen', 'Satker Peningkatan Jalan KA', '2016-04-25', '2017-02-12', 25545000000, 'Pembangunan-Jalur-Kereta-Api-Kalimantan.jpg', '', 'finished'),
(8, ' Pembangunan Jalur Ganda Dan Jembatan', 'JaIan dan Jembatan', 'Kebumen', 'PPK Kegiatan Peningkatan Jalan Kereta Api Lintas SeIatan Jasa I Balai Teknik Perkeretaapian Kelas I Wilayah Jawa Bagian Tengah', '2017-06-22', '1970-01-01', 78670204000, NULL, '', 'ongoing'),
(9, 'Pembangunan Jalan KA ', 'JaIan dan Jembatan', 'Langsa Aceh', 'PPK Wilayah I Bagian Utara Sumatera Utara', '2017-09-04', '1970-01-01', 46058007600, NULL, '', 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testimonial_id` int(5) UNSIGNED NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `testimony` text,
  `image` text,
  `slug_testimonial` text,
  `date_created` text,
  `date_updated` text,
  `status` enum('publish','draft') NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonial_id`, `client_name`, `occupation`, `company`, `testimony`, `image`, `slug_testimonial`, `date_created`, `date_updated`, `status`) VALUES
(1, 'Asa Fadila', 'Marketing Manager', 'KPY', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'imgtestimonial_Asa_Fadila_1606333239.jpg', '2-asa-fadila', '2020-11-25', '2020-11-25', 'publish'),
(2, 'Pikachu', 'Pokemon Tamer', 'Pokemon Foundation', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n', 'imgtestimonial_Pikachu_1606333332.png', '2-pikachu', '2020-11-25', '2020-11-25', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_name` varchar(225) NOT NULL,
  `slug_type` varchar(225) NOT NULL,
  `order_type` int(11) NOT NULL,
  `type_description` text NOT NULL,
  `date_type` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `user_id`, `type_name`, `slug_type`, `order_type`, `type_description`, `date_type`) VALUES
(4, 1, 'testing', '', 1, 'testing type', '2017-02-16 13:56:38'),
(5, 1, 'Odol', 'odol', 2, 'odol', '2017-02-16 13:57:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `config_slider`
--
ALTER TABLE `config_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`download_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pages_id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category_specification`
--
ALTER TABLE `product_category_specification`
  ADD PRIMARY KEY (`specification_id`);

--
-- Indexes for table `product_specification`
--
ALTER TABLE `product_specification`
  ADD PRIMARY KEY (`product_specification_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `config_slider`
--
ALTER TABLE `config_slider`
  MODIFY `slider_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `download_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pages_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_category_specification`
--
ALTER TABLE `product_category_specification`
  MODIFY `specification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `product_specification`
--
ALTER TABLE `product_specification`
  MODIFY `product_specification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=533;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimonial_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
