/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 10.1.38-MariaDB : Database - cp1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(225) NOT NULL,
  `slug_admin` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admins` */

insert  into `admins`(`admin_id`,`username`,`slug_admin`,`password`,`email`) values 
(1,'admin','','d033e22ae348aeb5660fc2140aec35850c4da997','contact@compose.com');

/*Table structure for table `blogs` */

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `slug_blog` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `blogs` */

insert  into `blogs`(`blog_id`,`user_id`,`category_id`,`title`,`slug_blog`,`content`,`image`,`date_post`,`status`,`keywords`) values 
(2,1,2,'Long News Title Dummy','10-test111','<p>testing</p>','29006-art_alphacoders_com2.jpg','2019-08-23 11:38:00','publish','testing'),
(3,1,2,'Long News Title Dummy','cara-membuat-anak','<p>awdawd</p>','8645-c-programming-1366x768-computer-wallpaper.jpg','2019-08-23 11:38:01','publish','Cara membuat anak'),
(5,1,2,'Long News Title Dummy','5-sfsefsef1','<p>dsdfsdf</p>','1385096_445510758888115_1423375145_n.jpg','2019-08-23 11:38:02','draft','ssdvsfs'),
(6,1,2,'Long News Title Dummy','apakah-ahok-akan-menang','<p>Lorem Ipsum IdoorLorem Ipsum IdoorLorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum IdoorLorem Ipsum IdoorLorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum IdoorLorem Ipsum IdoorLorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum IdoorLorem Ipsum IdoorLorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum IdoorLorem Ipsum IdoorLorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor&nbsp;Lorem Ipsum Idoor</p>','3D-Scenery-HD-Macbook-Wallpaper4.jpg','2019-08-23 11:38:03','publish','ahok kalah'),
(7,1,3,'Long News Title Dummy','testing','<p>test</p>','114845.jpg','2019-08-23 11:38:04','publish','test'),
(8,1,3,'Long News Title Dummy','adawda','<p>awdawd</p>','114846.jpg','2019-08-23 11:38:05','publish','awdawd'),
(9,1,2,'Long News Title Dummy','dawdawd','<p>awdawd</p>','29006-art_alphacoders_com8.jpg','2019-08-23 11:38:06','publish','awdaw'),
(10,1,2,'Long News Title Dummy','awdawd','<p>awdawd</p>','29006-art_alphacoders_com9.jpg','2019-08-23 11:38:07','publish','awdawd');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(225) NOT NULL,
  `slug_category` varchar(225) NOT NULL,
  `order_category` int(11) NOT NULL,
  `category_description` text NOT NULL,
  `date_category` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`category_id`,`user_id`,`category_name`,`slug_category`,`order_category`,`category_description`,`date_category`) values 
(2,1,'News','2-news',1,'News Update','2017-02-15 21:31:39'),
(3,1,'Politik','politik',2,'Seputar Politik','2017-02-23 12:47:26');

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `client_name` varchar(225) NOT NULL,
  `slug_client` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `website` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `clients` */

insert  into `clients`(`client_id`,`user_id`,`client_name`,`slug_client`,`image`,`website`,`date`,`status`) values 
(2,1,'KAI','3-kai','Logo_PT_KAI_(Persero)_(New_version_2016)_svg.png','','2019-09-02 13:42:23','publish'),
(3,1,'PPK','3-ppk','ppklogo.png','','2019-09-02 13:41:55','publish');

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `website` varchar(225) NOT NULL,
  `message` text NOT NULL,
  `date_comment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `comments` */

insert  into `comments`(`comment_id`,`blog_id`,`name`,`email`,`website`,`message`,`date_comment`) values 
(1,0,'Indra','indrkmna@gmail.com','http://indrarukmana.com','testing','2017-02-20 10:54:40'),
(2,0,'awda','wdqdq@gmail.com','http://indrarukmana.com','qwdq','2017-02-20 10:55:42'),
(3,2,'rats','rats123@gmail.com','http://indrarukmana.com','rats','2017-02-20 10:56:37'),
(4,2,'xaxsa','scascasc@gmail.com','http://indrarukmana.com','ascasc','2017-02-20 11:07:27'),
(5,2,'adwd','awda@gmail.com','http://indrarukmana.com','dawd','2017-02-20 11:20:42'),
(6,3,'awd','apoyaja@gmail.com','http://indrarukmana.com','qwdqwd','2017-02-24 14:22:53');

/*Table structure for table `config` */

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `metatext` text NOT NULL,
  `fax` text NOT NULL,
  `facebook` varchar(225) NOT NULL,
  `twitter` varchar(225) NOT NULL,
  `instagram` varchar(225) NOT NULL,
  `google_plus` varchar(225) NOT NULL,
  `pinterest` varchar(225) NOT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `config` */

insert  into `config`(`config_id`,`nameweb`,`email`,`keywords`,`google_maps`,`logo`,`icon`,`about`,`address`,`city`,`zip_code`,`phone_number`,`metatext`,`fax`,`facebook`,`twitter`,`instagram`,`google_plus`,`pinterest`) values 
(1,'PT. Karya Putra Yasa','karyaputrayasa@ymail.com','PT. KARYA PUTRA YASA, konstruksi, sewa alat berat, profile, 081999000395, ','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.5700690612443!2d110.38778381466363!3d-7.835242980010763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5702b1a360cb%3A0xd68dd42971c4526b!2sPT.%20KARYA%20PUTRA%20YASA!5e0!3m2!1sen!2sid!4v1567396932927!5m2!1sen!2sid','logo-excavator1.png','logo-excavator.png','<div class=\"\">\r\n<div class=\"\">\r\n<h2>About Us</h2>\r\n<p><strong>PT. KARYA PUTRA YASA</strong> sebagai perusahaan yang bergerak di bidang kontraktor dan persewaan alat berat di tangani oleh tenaga-tenaga yang profesioanal di bidangnya, selalu berusaha untuk mengembangkan diri, agar mampu menjadi mitra kerja yang baik dalam menangani tugas-tugas pembangunan di negeri ini, sesuai bidang dan lingkup kerja kami.</p>\r\n<p><strong>PT. KARYA PUTRA YASA</strong> berusaha keras dengan motivasi yang kuat berharap dapat dipercaya dan diberi kesempatan oleh berbagai pihak untuk dapat menangani pekerjaan sesuai dengan kemampuan yang kami miliki sehingga mempunyai peluang untuk terus dapat berkembang membangun negara ini.</p>\r\n<p><strong>PT. KARYA PUTRA &nbsp;YASA &nbsp;</strong>dirintis &nbsp;dan &nbsp;didirikan &nbsp;oleh &nbsp;sekelompok &nbsp;Tenaga &nbsp;Teknik &nbsp;Profesional &nbsp;dan berpengalaman pada tahun 2001, melalui Akte Pendirian oleh Notaris Daliso Rudianto, SH. Alamat kantor PT. KARYA PUTRA YASA di Malangan 037/013 Giwangan Umbulharjo Yogyakarta</p>\r\n</div>\r\n<div class=\"container\">\r\n<div class=\"col-md-6\">\r\n<h3>Visi</h3>\r\n<ul>\r\n<li>Untuk menjadi perusahaan konstruksi dan persewaan alat berat yang mampu bersaing dalam skala nasional dan berkomitmen secara penuh untuk memenuhi kepuasan pelanggan</li>\r\n</ul>\r\n<h3>Misi</h3>\r\n<ul>\r\n<li>\r\n<p>Berperan serta secara aktif dalam pembangunan, perawatan atau pemeliharaan sarana dan prasarana kereta Api.</p>\r\n</li>\r\n<li>\r\n<p>Berperan serta dalam peningkatan dan pelayanan kepada masyarakat pengguna jasa Kereta Api.</p>\r\n</li>\r\n<li>\r\n<p>Mengikuti &nbsp;dan &nbsp;memenuhi &nbsp;setiap &nbsp;regulasi &nbsp;jasa &nbsp;konstruksi &nbsp;baik &nbsp;yang &nbsp;di &nbsp;tetapkan &nbsp;oleh pemerintah atau organisasi profesi terkait khususnya yang di tetapkan oleh pemberi pekerjaan atau pemberi tugas.</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h3>Kebijakan Mutu</h3>\r\n<p>&ldquo;Sementara melakukan aktifitas pekerjaan sesuai dengan standart mutu yang ditetapkan melalui penerapan Sistem Manajemen Mutu yang efektif serta kepatuhan kepada peraturan yang ada dan secara terus menerus melakuakan peningkatan untuk mencapai keputusan pelanggan &ldquo; melalui :</p>\r\n<ul>\r\n<li>Penyediaan SDM yang kompeten dibidangnya</li>\r\n<li>Memastikan&nbsp; karyawan &nbsp;mengerti atas &nbsp;relevansi dan&nbsp; tujuan&nbsp; pekerjaannya &nbsp;sesrta &nbsp;bagaimana sumbangannya pada pencapaian sasaran mutu</li>\r\n<li>Penyedian&nbsp; &nbsp;Teknologi,&nbsp; &nbsp;Infrastruktur&nbsp; &nbsp;dan&nbsp; &nbsp;lingkungan&nbsp; &nbsp;kerja&nbsp; &nbsp;yang&nbsp; &nbsp;mampu&nbsp; &nbsp;menunjang pelaksanaan pekerjaan secara efektif dan efisien</li>\r\n<li>Penyediaan alat berat yang layak pakai</li>\r\n</ul>\r\n<p><strong><br /> </strong></p>\r\n</div>\r\n</div>\r\n</div>','Malangan RT.037 RW. 013 Giwangan Umbulharjo Yogyakarta 55165','Bandung','18923','081999000395','PT. KARYA PUTRA YASA sebagai perusahaan yang bergerak di bidang kontraktor dan persewaan alat berat di tangani oleh tenaga-tenaga yang profesioanal di bidangnya, selalu berusaha untuk mengembangkan diri, agar mampu menjadi mitra kerja yang baik dalam menangani tugas-tugas pembangunan di negeri ini, sesuai bidang dan lingkup kerja kami.\r\nPT. KARYA PUTRA YASA berusaha keras dengan motivasi yang kuat berharap dapat dipercaya dan diberi kesempatan oleh berbagai pihak untuk dapat menangani pekerjaan sesuai dengan kemampuan yang kami miliki sehingga mempunyai peluang untuk terus dapat berkembang membangun negara ini.\r\nProfil perusahaan ini menampilkan data perusahaan   PT. KARYA PUTRA YASA yang bergerak dalam bidang jasa konstruksi dan persewaan alat berat, sub bidang Jalan Jembatan Kereta Api serta Perumahan dan  Pemukiman  disusun  dengan  tujuan  memberikan  gambaran  singkat  tentang  perusahaan  meliputi Lingkup Kerja, Personal, Peralatan dan Pengalaman Perusahaan.\r\nDengan rendah hati kami berharap berbagai pihak bersedia bekerjasama dengankami.\r\nAtas perhatian dan kerjasamanya dari semua pihak, pimpinan dan staf menyampaikan terima kasih. ','-','https://www.facebook.com/roznack/','https://twitter.com/roznack','https://www.instagram.com/roznack/','','');

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `messages` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `contacts` */

/*Table structure for table `downloads` */

DROP TABLE IF EXISTS `downloads`;

CREATE TABLE `downloads` (
  `download_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(225) NOT NULL,
  `slug_download` varchar(225) NOT NULL,
  `file` varchar(225) NOT NULL,
  `date_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file_description` text NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`download_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `downloads` */

insert  into `downloads`(`download_id`,`user_id`,`file_name`,`slug_download`,`file`,`date_upload`,`file_description`,`status`) values 
(3,1,'Template','3-template','153-P101.pdf','2017-02-16 20:19:05','asas','publish'),
(4,1,'PDF 1','4-pdf-1','153-P09.pdf','2017-02-17 15:03:08','test','draft'),
(5,1,'Matematika (Matrix)','matematika-matrix','153-P091.pdf','2017-03-06 19:29:22','Silahkan download materi ini untuk di pelajari','publish');

/*Table structure for table `galleries` */

DROP TABLE IF EXISTS `galleries`;

CREATE TABLE `galleries` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `gallery_name` varchar(225) NOT NULL,
  `slug_gallery` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `gallery_description` text NOT NULL,
  `position` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `galleries` */

insert  into `galleries`(`gallery_id`,`user_id`,`gallery_name`,`slug_gallery`,`image`,`gallery_description`,`position`,`date`,`status`) values 
(8,1,'Hi Welcome to Nirasoft','hi-welcome-to-nirasoft','slide-1.jpg','Welcome to Nirasoft','slider','2017-02-17 20:53:06','publish'),
(9,1,'Cantik ya hehe','cantik-ya-hehe','slide-2.jpg','cantik banget sih neng wkwk','slider','2017-02-17 20:55:53','publish'),
(10,1,'Ngops gan','ngops-gan','slide-4.jpg','Ngops dulu','slider','2017-02-17 20:56:35','publish'),
(12,1,'We Are Anon!!!','we-are-anon','1385096_445510758888115_1423375145_n2.jpg','Testing','profil','2017-02-17 20:58:14','publish'),
(13,1,'Hutan','14-hutan','29006-art_alphacoders_com7.jpg','hutan','harga','2017-03-07 15:51:02','publish'),
(14,1,'Adaw','adaw','361783.jpg','awdawd','footer','2017-02-24 13:36:05','publish');

/*Table structure for table `konstruksi_item` */

DROP TABLE IF EXISTS `konstruksi_item`;

CREATE TABLE `konstruksi_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bidang` text,
  `kode` varchar(20) DEFAULT NULL,
  `kualifikasi` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `konstruksi_item` */

insert  into `konstruksi_item`(`id`,`bidang`,`kode`,`kualifikasi`) values 
(1,'Jalan kereta api, termasuk perawatannya','	22002','Gred-5'),
(2,'Jembatan, termasuk perawatannya','22004','Gred-5'),
(3,'Irigasi dan Drainase, termasuk perawatannya','22011','Gred-5'),
(4,'Pengerukan dan Pengurukan, termasuk perawatannya','22014','Gred-5');

/*Table structure for table `konstruksi_text` */

DROP TABLE IF EXISTS `konstruksi_text`;

CREATE TABLE `konstruksi_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `mini_desc` text,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `konstruksi_text` */

insert  into `konstruksi_text`(`id`,`title`,`mini_desc`,`content`) values 
(1,'Pelaksanaan Konstruksi','PT. KARYA PUTRA YASA sebagai perusahaan yang bergerak dalam bidang jasa pemborongan teknik meliputi pelaksanaan konstruksi ','<p><strong>PT. KARYA PUTRA YASA</strong> sebagai perusahaan yang bergerak dalam bidang jasa pemborongan teknik meliputi pelaksanaan konstruksi dan persewaan alat berat mencakup bidang antara lain</p>');

/*Table structure for table `price` */

DROP TABLE IF EXISTS `price`;

CREATE TABLE `price` (
  `price_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `price_name` varchar(225) NOT NULL,
  `price` varchar(225) NOT NULL,
  `headline` text NOT NULL,
  `description` text NOT NULL,
  `with_service` varchar(100) NOT NULL,
  `no_with_service` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`price_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `price` */

insert  into `price`(`price_id`,`user_id`,`price_name`,`price`,`headline`,`description`,`with_service`,`no_with_service`,`status`,`date`) values 
(4,1,'Industri Setup Awal','90.000/3 Bulan/ Unit','','','Free','90.000/3 Bulan/ Unit','publish','2017-03-07 07:50:38'),
(5,1,'Industri Kecil','500.000/ Unit','','','Free','270.000/3 Bulan/ Unit','publish','2017-03-07 07:33:55'),
(6,1,'Industri Menengah','750.000/ Unit','','','270.000/3 Bulan/ Unit','Call','publish','2017-03-07 07:34:29'),
(7,1,'Industri Besar','Call','','','Call','Call','publish','2017-03-07 07:34:49'),
(8,1,'Pemerintah','Call','','','Call','Call','publish','2017-03-07 07:35:01'),
(9,0,'','','awdawd','','','','','2017-03-07 15:41:35');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `slug_product` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `product_description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`product_id`,`user_id`,`product_name`,`slug_product`,`image`,`product_description`,`date`,`status`) values 
(2,1,'Anonymous1','5-anonymous1','29006-art_alphacoders_com4.jpg','test','2017-02-24 14:00:28','publish'),
(4,1,'tefesefs','tefesefs','361782.jpg','sefsef','2017-02-16 16:34:49','publish'),
(5,1,'Product 1','product-1','3D-Scenery-HD-Macbook-Wallpaper5.jpg','Product 1 Product 1 Product 1 Product 1 Product 1 Product 1 Product 1 Product 1 Product 1 Product 1 Product 1 Product 1 Product 1 Product 1 Product 1 Product 1 Product 1 Product 1 Product 1 Product 1 ','2017-02-17 16:27:40','publish');

/*Table structure for table `project` */

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` text,
  `field` text,
  `location` varchar(50) DEFAULT NULL,
  `owner` text,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `contract_value` bigint(20) DEFAULT NULL,
  `image` text,
  `desc` text,
  `status` enum('ongoing','finished','canceled') DEFAULT NULL,
  PRIMARY KEY (`id_project`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `project` */

insert  into `project`(`id_project`,`project_name`,`field`,`location`,`owner`,`start_date`,`end_date`,`contract_value`,`image`,`desc`,`status`) values 
(1,'Pembangunan Jalan KA Untuk Jalur Ganda','JaIan Kereta Api','Kuripan - Pelabuhan','Satker Pembangunan Pekalongan - Semarang','2013-11-01','2013-12-18',73063300000,NULL,'','finished'),
(3,'Pembangunan Jalan KA Untuk Jalur Ganda','JaIan Kereta Api','Tanjung Cirebon','Satker Peningkatan Jalan KA Lintas Utara Jawa','2013-11-05','2013-12-13',18070510000,NULL,'','finished'),
(4,'Pembangunan JaIur KA ','JaIan Kereta Api','Luwung - Karang Suwung','Satker Pembangunan Jalur Ganda Cirebon - Kroya','2014-12-13','2014-12-28',13411139000,NULL,'<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>','finished'),
(5,'Peningkatan Jalur KA','JaIan Kereta Api','Goprak - Sumberlawang','Satker Pembangunan Jalur Ganda Cirebon - Krova','2014-12-12','2014-12-31',9288729000,NULL,'','finished'),
(6,'Pembangunan Jalan KA Untuk Jalur Ganda','JaIan Kereta Api','Jakarta Kota - Tanjung Priuk','Satker Prasarana KA Jabotabek','2014-12-14','2014-12-24',9263184000,NULL,'','finished'),
(7,'Pembuatan Badan Jalan KA','JaIan Kereta Api','Soka - Kebumen','Satker Peningkatan Jalan KA','2016-04-25','2017-02-12',25545000000,'Pembangunan-Jalur-Kereta-Api-Kalimantan.jpg','','finished'),
(8,' Pembangunan Jalur Ganda Dan Jembatan','JaIan dan Jembatan','Kebumen','PPK Kegiatan Peningkatan Jalan Kereta Api Lintas SeIatan Jasa I Balai Teknik Perkeretaapian Kelas I Wilayah Jawa Bagian Tengah','2017-06-22','1970-01-01',78670204000,NULL,'','ongoing'),
(9,'Pembangunan Jalan KA ','JaIan dan Jembatan','Langsa Aceh','PPK Wilayah I Bagian Utara Sumatera Utara','2017-09-04','1970-01-01',46058007600,NULL,'','ongoing');

/*Table structure for table `sewaalat_item` */

DROP TABLE IF EXISTS `sewaalat_item`;

CREATE TABLE `sewaalat_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `image` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `sewaalat_item` */

insert  into `sewaalat_item`(`id`,`nama`,`merk`,`tahun`,`jml`,`image`) values 
(1,'Excavator','Caterpillar 300B',1995,1,'300x4001.png'),
(2,'Excavator','Volvo EC210BLC',1995,2,'300x4002.png'),
(6,'Excavator','Komatsu PC200-6',1998,2,'komatsu_ex1.jpg'),
(8,'Excavator','Komatsu PC210-6',1998,1,'komatsu_ex.jpg'),
(9,'Excavator','Hyundai Robex 220',2017,2,'WhatsApp_Image_2019-08-20_at_8_06_10_PM_(1).jpeg'),
(10,'Bull Dozer','Komatsu D31P',1998,1,'komatsu_bull.jpg'),
(11,'Bull Dozer','Mitsubishi BD2F',1995,1,NULL),
(12,'Vibrator Roller','Hamm 3410',2011,2,NULL),
(13,'Vibrator Roller','Dynapac CA-250',2017,1,'WhatsApp_Image_2019-08-20_at_8_06_11_PM.jpeg'),
(14,'Boor Phile','CMG 150D',2017,2,NULL),
(15,'Boor Phile','XCMG 180',2018,1,'cmg_180.jpg'),
(16,'Boor Phile','SANY 285',2018,1,'WhatsApp_Image_2019-08-20_at_8_06_10_PM2.jpeg'),
(17,'Boor Phile','SANY 150',2016,2,NULL);

/*Table structure for table `sewaalat_text` */

DROP TABLE IF EXISTS `sewaalat_text`;

CREATE TABLE `sewaalat_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `mini_desc` text,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `sewaalat_text` */

insert  into `sewaalat_text`(`id`,`title`,`mini_desc`,`content`) values 
(1,'Persewaan Alat Berat','PT. KARYA PUTRA YASA sebagai perusahaan juga bergerak dalam persewaan alat berat','<p>PT. KARYA PUTRA YASA sebagai perusahaan yang juga bergerak dalam persewaan alat berat, menyewakan<br />antara lain :</p>');

/*Table structure for table `types` */

DROP TABLE IF EXISTS `types`;

CREATE TABLE `types` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type_name` varchar(225) NOT NULL,
  `slug_type` varchar(225) NOT NULL,
  `order_type` int(11) NOT NULL,
  `type_description` text NOT NULL,
  `date_type` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `types` */

insert  into `types`(`type_id`,`user_id`,`type_name`,`slug_type`,`order_type`,`type_description`,`date_type`) values 
(4,1,'testing','',1,'testing type','2017-02-16 20:56:38'),
(5,1,'Odol','odol',2,'odol','2017-02-16 20:57:21');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
