-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 10:19 PM
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
(1, 'PT. Azka Biru Jaya Abadi', 'dummy.email@fakemail.com', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.48942589396!2d110.36606765755958!3d-7.737795504490272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a58e89bccbfa3%3A0xeb8327a3f362bdd3!2sZiemotion%20Animation%20Studio!5e0!3m2!1sen!2sid!4v1613289414917!5m2!1sen!2sid', '30ad3f27eebf19a38eba19681780e530.png', 'Logo-70x70.png', '<p>&nbsp;</p>\r\n<div class=\"\">\r\n<div class=\"\">\r\n<h3 style=\"text-align: center;\"><strong>Tentang Kami</strong></h3>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>\r\n<div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<p>&nbsp;</p>', 'Perumahan Pesona Sendangadi Estate 1, Blok C 1-2, Jl. Jongke Kidul, Sleman,\r\nYogyakarta, Indonesia', 'Bandung', '18923', '(0287) 385504', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', '-', 1, 'https://www.facebook.com/Ziemotion-Animation-Studio-358216174662809', '', 'https://www.instagram.com/ziemotion.studio/', '', '', '', 'https://www.youtube.com/channel/UCxTRPlaitifbKKmKKLrK8MQ');

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
(1, 'e2ef80e7d2de710bcf9e6346224e3b96.jpg', 'Mitra Terpercaya Untuk Kebutuhan Alat Berat Anda', ''),
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
(20230302200800);

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
(115, 'TANAH KAVLING SIAP BANGUN DESA API-API', '<p>LOKASI DATAR SIAP BANGUN DESA API-API RT. 04 BERADA DI TENGAH PEMUKIMAN WARGA HANYA 50 METER DARI JALAN PROPINSI LEBAR JALAN 5 METER HARGA 22 JT CASH DAN KREDIT HARGA SAMA TANPA BUNGA TANPA DENDA UKURAN 10 X 15 METER SURAT SKT KECAMATAN ATAS NAMA PEMBELI</p>\r\n', '', '22000000', '', '1677805394', '2af4220619951ae1b63ba1c7f0f1ab92.png', '', 1677806368, 0, 1, 12, 1, 0, 0, 'tanah-kavling-siap-bangun-desa-api-api_115', NULL, NULL, 0, 0),
(116, 'Tanah Kavling Labangka 1', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>\r\n\r\n<p>LOKASI DESA LABANGKA RT 001 KECAMATAN BABULU</p>\r\n\r\n<p>LEGALITAS SKT KECAMATAN ATAS NAMA PEMBELI</p>\r\n\r\n<p>JALAN UTAMA 6 M JALAN GANG 5 M</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ukuran ( 10 x 15 ) 15 Juta</p>\r\n\r\n<p>Ukuran ( 10 x 15 ) 7 Juta</p>\r\n', '', '7000000', '', '1677913847', '2d99873e86b9038fbce12de7d88a0848.png', NULL, 1677913987, 1678019953, 1, 12, 1, 0, 0, 'tanah-kavling-labangka-1_116', NULL, NULL, 0, 0),
(117, 'Tanah Kavling Alvin Kuaro', '<p>Kavling Murah Ukuran 10x15</p>\r\n', '', '0', '', '1677914050', 'b064f6a0938edf0ae92891be28a41ecd.png', '', 1677914171, 0, 1, 12, 1, 0, 0, 'tanah-kavling-alvin-kuaro_117', NULL, NULL, 0, 0),
(118, 'Tanah Kavling Labangka 2', '<p>AREA DATAR SIAP BANGUN DESA LABANGKA RT.01</p>\r\n\r\n<p>INVESTASI MENGUNTUNGKAN</p>\r\n\r\n<p>LEBAR JALAN 5 M</p>\r\n\r\n<p>Harga 5 Juta</p>\r\n\r\n<p>HARGA SAMA TANPA BUNGA TANPA DENDA</p>\r\n\r\n<p>Ukuran 10x15 Meter</p>\r\n\r\n<p>SURAT SKT KECAMATAN ATAS NAMA PEMBELI</p>\r\n', '', '5000000', '', '1677914206', '9df94702e8938944208c2a30416239c3.png', '', 1677914331, 0, 1, 12, 1, 0, 0, 'tanah-kavling-labangka-2_118', NULL, NULL, 0, 0),
(119, 'Tanah Kavling Labangka 3', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>\r\n\r\n<p>Lokasi Desa Labangka RT 001 Kecamatan Babulu</p>\r\n\r\n<p>Ukuran Tanah 10 M x 15 M (150m2)</p>\r\n\r\n<p>Legalitas SKT Kecamatan Atas Nama Pembeli</p>\r\n\r\n<p>Jalan Utama 6 M, Jalan gang 5 M</p>\r\n', '', '5000000', '', '1677914373', 'ba9323696868c353f0d64b69dab899e2.jpeg', NULL, 1677914540, 1678019961, 1, 12, 1, 0, 0, 'tanah-kavling-labangka-3_119', NULL, NULL, 0, 0),
(120, 'Tanah Kavling Labangka 4', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>\r\n\r\n<p>Lokasi Siap Bangun Tanah Datar</p>\r\n\r\n<p>Lokasi Desa Labangka RT 001 Kecamatan Babulu Penajam</p>\r\n\r\n<p>Ukuran Tanah 10 M x 15 M (150m2)</p>\r\n\r\n<p>Legalitas SKT Kecamatan Atas Nama Pembeli</p>\r\n', '', '5000000', '', '1677914750', '19ab9a6e2c7df3ed0c1a8bb1ac280b77.jpeg', NULL, 1677914825, 1678019817, 1, 12, 1, 0, 0, 'tanah-kavling-labangka-4_120', NULL, NULL, 0, 0),
(121, 'Tanah Kavling Labangka 5', '<p>Ukuran Tanah 10x15</p>\r\n\r\n<p>Harga 15jt</p>\r\n\r\n<p>Kredit dp 5jt</p>\r\n\r\n<p>1jtx10 bulan</p>\r\n\r\n<p>Legalitas SKT Atas Nama Pembeli</p>\r\n\r\n<p>Hanya 100 meter dari jalan provinsi</p>\r\n', '', '5000000', '', '1677914955', 'd6d99a059c1dfa5a0bc48f60b574309f.jpeg', NULL, 1677915059, 1677993963, 1, 12, 1, 0, 0, 'tanah-kavling-labangka-5_121', NULL, NULL, 0, 0),
(122, 'Tanah Kavling Desa Gunung Intan', '<p>Desa Gunung Intan RT 05 Kecamatan Babulu Kab. PPU</p>\r\n\r\n<p>No 1-7 Ukuran 10x20 Rp 20.000.000</p>\r\n\r\n<p>No 8-17 Ukuran 10x15 Rp. 12.000.000</p>\r\n\r\n<p>No 18-27 Ukuran 10x15 Rp.15.000.000</p>\r\n', '', '12000000', '', '1677915118', 'a1df3a434235ec11c93cdde7d4148062.jpeg', NULL, 1677915312, 1677993895, 1, 12, 1, 0, 0, 'tanah-kavling-desa-gunung-intan_122', NULL, NULL, 0, 0),
(123, 'Tanah Kavling Desa Gunung Makmur Babulu', '<p>Ukuran Tanah Kaving 10x20&nbsp;</p>\r\n\r\n<p>Harga 10.000.000</p>\r\n', '', '10000000', '', '1677915316', '87495d26a40448dae9bb961c3bb99055.jpg', NULL, 1677915392, 1677993873, 1, 12, 1, 0, 0, 'tanah-kavling-desa-gunung-makmur-babulu_123', NULL, NULL, 0, 0),
(124, 'Tanah Kavling Labangka 6', '<p>RT 6 Desa Labangka Kec.Babuu PPU</p>\r\n\r\n<p>Ukuran 10x20 / 200m</p>\r\n\r\n<p>NO 1-3 25,000,000</p>\r\n\r\n<p>NO 4-16 20.000.000</p>\r\n', '', '20000000', '', '1677915500', '636b465a46fa234af2e42ba94bc23676.jpeg', NULL, 1677915605, 1677993839, 1, 12, 1, 0, 0, 'tanah-kavling-labangka-6_124', NULL, NULL, 0, 0),
(125, 'Tanah Kavling Desa Selusu', '<p>Ukuran 10x20m (200m)</p>\r\n\r\n<p>Lokasi dekat perkampungan</p>\r\n\r\n<p>Tersedia jaringan listrik</p>\r\n\r\n<p>Surat induk sertifikat</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>no 1-14 harga 17.000.000</p>\r\n\r\n<p>no 15-32 harga 15.000.000</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>kredit DP Min. 3,000.000</p>\r\n\r\n<p>syarat fotokopi ktp/kk</p>\r\n', '', '15000000', '', '1677915647', '1282dc611ebbf6f0c0c9559ceac02426.jpg', NULL, 1677915791, 1677993744, 1, 12, 1, 0, 0, 'tanah-kavling-desa-selusu_125', NULL, NULL, 0, 0),
(126, 'Tanah Kavling Waru RT.11', '<p>Ukuran</p>\r\n\r\n<p>No 1-15 Ukuran 10x20</p>\r\n\r\n<p>No 16-29 Ukuran 10x15</p>\r\n\r\n<p>Harga</p>\r\n\r\n<p>No 1-7 17.000.000</p>\r\n\r\n<p>No 8-15 14.000.000</p>\r\n\r\n<p>No 16-29 12.000.000</p>\r\n\r\n<p>No 30-34 14.000.000</p>\r\n', '', '12000000', '', '1677915828', '7cae83c12b898808e46563857f66c012.webp', NULL, 1677915975, 1677993699, 1, 12, 1, 0, 0, 'tanah-kavling-waru-rt-11_126', NULL, NULL, 0, 0),
(127, 'Tanah Kavling Desa Sesulu', '<p>Ukuran</p>\r\n\r\n<p>1-25 10x20&nbsp;(200m)</p>\r\n\r\n<p>26-55 10x15 (150m)</p>\r\n\r\n<p>Harga&nbsp;</p>\r\n\r\n<p>1-25 22.000.000</p>\r\n\r\n<p>26-55 17.000.000</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cash / kredit harga sama</p>\r\n\r\n<p>Legalitas SKT Atas nama pembeli</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '17000000', '', '1677915978', '67020155d281dfa3088761af6b5552df.webp', NULL, 1677916114, 1677993675, 1, 12, 1, 0, 0, 'tanah-kavling-desa-sesulu_127', NULL, NULL, 0, 0),
(128, 'Tanah Kavling Desa Babulu RT 008', '<p>Cash dan Kredit harga tetap</p>\r\n\r\n<p>Harga</p>\r\n\r\n<p>1-8 = 15.000.000</p>\r\n\r\n<p>9-33 = 13.000.000</p>\r\n\r\n<p>DP minimal 2.000.000</p>\r\n', '', '13000000', '', '1677916131', '6b2ae6d02d658149cf560f3340dad9a0.jpeg', NULL, 1677916221, 1677993394, 1, 12, 1, 0, 0, 'tanah-kavling-desa-babulu-rt-008_128', NULL, NULL, 0, 0),
(129, 'Tanah Kavling Labangka 7', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>\r\n\r\n<p>Harga Cash 7.500.000</p>\r\n\r\n<p>Ukuran 10x15</p>\r\n\r\n<p>Surat Segel</p>\r\n', '', '7500000', '', '1677916232', '07f342a4646594df07ad3379f31f6dd7.jpeg', NULL, 1677916286, 1678019474, 1, 12, 1, 0, 0, 'tanah-kavling-labangka-7_129', NULL, NULL, 0, 0);

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
  `position` int(10) UNSIGNED NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `sub_for`, `name`, `slug`, `category_description`, `position`, `active`) VALUES
(12, 0, 'Tanah Kavling', 'tanah-kavling', 'Tanah kavling adalah bagian tanah yang telah di petak-petak dengan ukuran tertentu untuk dijadikan bangunan atau rumah. Dalam bahasa inggris, kavling disebut dengan lot karena mengacu pada sebidang kecil tanah di perumahan atau pedesaan.', 1, 1),
(20, 0, 'Tanah', 'tanah', 'Miliki lahan yang berpotensi menguntungkan untuk anda', 0, 1),
(21, 0, 'Rumah', 'rumah', 'RUmah hunian yang penuh dengan nilai tambah, membuat anda dan keluarga nyaman dan sejahtera', 0, 1);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_category_specification`
--
ALTER TABLE `product_category_specification`
  MODIFY `specification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_specification`
--
ALTER TABLE `product_specification`
  MODIFY `product_specification_id` int(11) NOT NULL AUTO_INCREMENT;

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
