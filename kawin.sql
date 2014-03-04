-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2014 at 09:39 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kawin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `USERNAME_ADMIN` varchar(30) DEFAULT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_ADMIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `USERNAME_ADMIN`, `PASSWORD`) VALUES
(123, 'guntur', 'guntur');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE IF NOT EXISTS `buku_tamu` (
  `ID_TAMU` int(11) NOT NULL,
  `ID_KONSUMEN` int(11) DEFAULT NULL,
  `ISI` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ID_TAMU`),
  KEY `FK_MENGISI` (`ID_KONSUMEN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id_config`, `config_name`, `content`) VALUES
(1, 'about_us_title', 'Mutiara Wedding Organizer'),
(2, 'about_us_tagline', 'Mutiara Wedding Organizer Luxury Wedding Planning & Event Design.'),
(3, 'about_us_content', '<p>\r\n	We plan elegant, stylish, glamorous and fun celebrations and are the Luxury Wedding Planners for savvy, sophisticated couples who demand first class service and a world-class event.</p>\r\n<p>\r\n	When you are to be united in the name of love, when you want to celebrate the greatest moment of your life, when you wish to treasure every moment in perfection.</p>\r\n<p>\r\n	Mutiara weddings here for you, in every step of way to bring your wedding dream come to life and let you nothing but to cherish &amp; share every second of it with your love ones.</p>\r\n<p>\r\n	Mutiara wedding planner organizer is professional in surabaya Indonesia for an unforgetable dream wedding events organizer in surabaya, we are professional organizer wedding planner with low price cheap in surabaya - Indonwsia.</p>\r\n'),
(4, 'service_title', 'Wedding Planning and Design'),
(5, 'service_content', '<p>\r\n	Perencanaan pernikahan , desain dan manajemen layanan kami disesuaikan dengan anda dan kami bekerja dengan cara apapun yang sesuai dengan Anda, dengan gaya hidup Anda. Pendekatan kami untuk perencanaan pernikahan adalah dipesan lebih dahulu. Kami akan memastikan kami menawarkan tempat dan pemasok yang mencerminkan jenis perayaan yang Anda butuhkan dan sesuai dengan anggaran Anda. Kadang-kadang kita berkoordinasi dan merancang acara Anda sepenuhnya di rumah, atau kita mungkin bekerja dengan desainer acara berdedikasi dan fokus pada koordinasi . Setelah tempat ini dijamin, kita akan bersama-sama mengisi rincian dari upacara dan resepsi desain , bunga , alat tulis , dekorasi dan fotografi.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `desc` text,
  `link` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `title`, `desc`, `link`) VALUES
(1, 'tes', 'Ini adalah hasil uji coba', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38209/Wedding-Gallery-Inspiration-SarahHaywood.com - 04.jpg'),
(2, 'Title #02', 'Description', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38214/Wedding-Gallery-Inspiration-SarahHaywood.com - 05.jpg'),
(3, 'Title #03', 'Description', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38219/Wedding-Gallery-Inspiration-SarahHaywood.com - 06.jpg'),
(4, 'Title #04', 'Description', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38224/Wedding-Gallery-Inspiration-SarahHaywood.com - 07.jpg'),
(5, 'Title #05', 'Description', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38229/Wedding-Gallery-Inspiration-SarahHaywood.com - 08.jpg'),
(6, 'Title #06', 'Description', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38234/Wedding-Gallery-Inspiration-SarahHaywood.com - 09.jpg'),
(7, 'Title #07', 'Description', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38239/Wedding-Gallery-Inspiration-SarahHaywood.com - 10.jpg'),
(8, 'Title #08', 'Description', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38244/Wedding-Gallery-Inspiration-SarahHaywood.com - 11.jpg'),
(9, 'Title #09', 'Description', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38249/Wedding-Gallery-Inspiration-SarahHaywood.com - 12.jpg'),
(10, 'Title #10', 'Description', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38254/Wedding-Gallery-Inspiration-SarahHaywood.com - 13.jpg'),
(11, 'Title #11', 'Description', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38259/Wedding-Gallery-Inspiration-SarahHaywood.com - 14.jpg'),
(12, 'Title #12', 'Description', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38264/Wedding-Gallery-Inspiration-SarahHaywood.com - 15.jpg'),
(13, 'Title #13', 'Description', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38269/Wedding-Gallery-Inspiration-SarahHaywood.com - 16.jpg'),
(14, 'Title #14', 'Description', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38274/Wedding-Gallery-Inspiration-SarahHaywood.com - 17.jpg'),
(15, 'Title #15', 'Description', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38284/Wedding-Gallery-Inspiration-SarahHaywood.com - 19.jpg'),
(16, 'Title #16', 'Description', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38289/Wedding-Gallery-Inspiration-SarahHaywood.com - 20.jpg'),
(18, 'ade', 'adadwdawdawda', 'http://www.sarahhaywood.com/CropUp/715x450M/media/38229/Wedding-Gallery-Inspiration-SarahHaywood.com%20-%2008.jpg'),
(20, 'sadasda', 'sadasdasdasda', '19_gallery.png');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE IF NOT EXISTS `konsumen` (
  `ID_KONSUMEN` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_KONSUMEN` varchar(30) DEFAULT NULL,
  `JENIS_KELAMIN` int(11) DEFAULT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL,
  `KOTA` int(11) DEFAULT NULL,
  `PROP` int(11) DEFAULT NULL,
  `KODE_POS` varchar(5) DEFAULT NULL,
  `NO_TELP` varchar(14) DEFAULT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_KONSUMEN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`ID_KONSUMEN`, `NAMA_KONSUMEN`, `JENIS_KELAMIN`, `ALAMAT`, `KOTA`, `PROP`, `KODE_POS`, `NO_TELP`, `EMAIL`) VALUES
(22, 'Ardhiansyah Baskara', 1, 'kepanjen', 343, 10, '65163', '085646743945', 'ardhiansyah.baskara@live.com'),
(27, 'ade', 1, 'kepanjen', 217, 1, '128', '12122121', 'ade@lalal.com'),
(28, 'hehe', 1, 'asdsadasdasd', 216, 1, '12123', '12122231421312', 'ardhiansyah.baskara@live.com'),
(29, 'sadasdasd', 1, 'dashdasjdvjasvd', 216, 1, '123', '1212', 'ade@hehe.com'),
(30, 'asdsadasd', 1, 'sdadasd', 421, 14, '12131', '213123123123', 'ardhiansyah.baskara@live.com');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=699 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_provinsi`, `nama_kota`) VALUES
(216, 1, 'Kab. Badung'),
(217, 1, 'Kab. Bangli'),
(218, 1, 'Kab. Buleleng'),
(219, 1, 'Kab. Gianyar'),
(220, 1, 'Kab. Jembrana'),
(221, 1, 'Kab. Karang Asem'),
(222, 1, 'Kab. Klungkung'),
(223, 1, 'Kab. Tabanan'),
(224, 1, 'Kota Denpasar'),
(225, 2, 'Kab. Lebak'),
(226, 2, 'Kab. Pandeglang'),
(227, 2, 'Kab. Serang'),
(228, 2, 'Kab. Tangerang'),
(229, 2, 'Kota Cilegon'),
(230, 2, 'Kota Serang'),
(231, 2, 'Kota Tangerang'),
(232, 3, 'Kab. Bengkulu Selatan'),
(233, 3, 'Kab. Bengkulu Tengah'),
(234, 3, 'Kab. Bengkulu Utara'),
(235, 3, 'Kab. Kaur'),
(236, 3, 'Kab. Kepahiang'),
(237, 3, 'Kab. Lebong'),
(238, 3, 'Kab. Muko-Muko'),
(239, 3, 'Kab. Rejang Lebong'),
(240, 3, 'Kab. Seluma'),
(241, 3, 'Kota Bengkulu'),
(242, 4, 'Kab. Bantul'),
(243, 4, 'Kab. Gunung Kidul'),
(244, 4, 'Kab. Kulonprogo'),
(245, 4, 'Kab. Sleman'),
(246, 4, 'Kota Yogyakarta'),
(247, 5, 'Kab. Kepulauan Seribu'),
(248, 5, 'Kota Jakarta Barat'),
(249, 5, 'Kota Jakarta Pusat'),
(250, 5, 'Kota Jakarta Selatan'),
(251, 5, 'Kota Jakarta Timur'),
(252, 5, 'Kota Jakarta Utara'),
(253, 6, 'Kab. Boalemo'),
(254, 6, 'Kab. Bonebolango'),
(255, 6, 'Kab. Gorontalo'),
(256, 6, 'Kab. Gorontalo Utara'),
(257, 6, 'Kab. Pohuwato'),
(258, 6, 'Kota Gorontalo'),
(259, 7, 'Kab. Batanghari'),
(260, 7, 'Kab. Bungo'),
(261, 7, 'Kab. Kerinci'),
(262, 7, 'Kab. Merangin'),
(263, 7, 'Kab. Muara Jambi'),
(264, 7, 'Kab. Sarolangun'),
(265, 7, 'Kab. Tanjung Jabung Barat'),
(266, 7, 'Kab. Tanjung Jabung Timur'),
(267, 7, 'Kab. Tebo'),
(268, 7, 'Kota Jambi'),
(269, 8, 'Kab. Bandung'),
(270, 8, 'Kab. Bandung Barat'),
(271, 8, 'Kab. Bekasi'),
(272, 8, 'Kab. Bogor'),
(273, 8, 'Kab. Ciamis'),
(274, 8, 'Kab. Cianjur'),
(275, 8, 'Kab. Cirebon'),
(276, 8, 'Kab. Garut'),
(277, 8, 'Kab. Indramayu'),
(278, 8, 'Kab. Kerawang'),
(279, 8, 'Kab. Kuningan'),
(280, 8, 'Kab. Majalengka'),
(281, 8, 'Kab. Purwakarta'),
(282, 8, 'Kab. Subang'),
(283, 8, 'Kab. Sukabumi'),
(284, 8, 'Kab. Sumedang'),
(285, 8, 'Kab. Tasikmalaya'),
(286, 8, 'Kota Bandung'),
(287, 8, 'Kota Banjar'),
(288, 8, 'Kota Bekasi'),
(289, 8, 'Kota Bogor'),
(290, 8, 'Kota Cimahi'),
(291, 8, 'Kota Cirebon'),
(292, 8, 'Kota Depok'),
(293, 8, 'Kota Sukabumi'),
(294, 8, 'Kota Tasikmalaya'),
(295, 9, 'Kab. Banjarnegara'),
(296, 9, 'Kab. Banyumas'),
(297, 9, 'Kab. Batang'),
(298, 9, 'Kab. Blora'),
(299, 9, 'Kab. Boyolali'),
(300, 9, 'Kab. Brebes'),
(301, 9, 'Kab. Cilacap'),
(302, 9, 'Kab. Demak'),
(303, 9, 'Kab. Grobogan'),
(304, 9, 'Kab. Jepara'),
(305, 9, 'Kab. Karanganyar'),
(306, 9, 'Kab. Kebumen'),
(307, 9, 'Kab. Kendal'),
(308, 9, 'Kab. Klaten'),
(309, 9, 'Kab. Kudus'),
(310, 9, 'Kab. Magelang'),
(311, 9, 'Kab. Pati'),
(312, 9, 'Kab. Pekalongan'),
(313, 9, 'Kab. Pemalang'),
(314, 9, 'Kab. Purbalingga'),
(315, 9, 'Kab. Purworejo'),
(316, 9, 'Kab. Rembang'),
(317, 9, 'Kab. Semarang'),
(318, 9, 'Kab. Sragen'),
(319, 9, 'Kab. Sukoharjo'),
(320, 9, 'Kab. Tegal'),
(321, 9, 'Kab. Temanggung'),
(322, 9, 'Kab. Wonogiri'),
(323, 9, 'Kab. Wonosobo'),
(324, 9, 'Kota Magelang'),
(325, 9, 'Kota Pekalongan'),
(326, 9, 'Kota Salatiga'),
(327, 9, 'Kota Semarang'),
(328, 9, 'Kota Surakarta'),
(329, 9, 'Kota Tegal'),
(330, 10, 'Kab. Bangkalan'),
(331, 10, 'Kab. Banyuwangi'),
(332, 10, 'Kab. Blitar'),
(333, 10, 'Kab. Bojonegoro'),
(334, 10, 'Kab. Bondowoso'),
(335, 10, 'Kab. Gresik'),
(336, 10, 'Kab. Jember'),
(337, 10, 'Kab. Jombang'),
(338, 10, 'Kab. Kediri'),
(339, 10, 'Kab. Lamongan'),
(340, 10, 'Kab. Lumajang'),
(341, 10, 'Kab. Madiun'),
(342, 10, 'Kab. Magetan'),
(343, 10, 'Kab. Malang'),
(344, 10, 'Kab. Mojokerto'),
(345, 10, 'Kab. Nganjuk'),
(346, 10, 'Kab. Ngawi'),
(347, 10, 'Kab. Pacitan'),
(348, 10, 'Kab. Pamekasan'),
(349, 10, 'Kab. Pasuruan'),
(350, 10, 'Kab. Ponorogo'),
(351, 10, 'Kab. Probolinggo'),
(352, 10, 'Kab. Sampang'),
(353, 10, 'Kab. Sidoarjo'),
(354, 10, 'Kab. Situbondo'),
(355, 10, 'Kab. Sumenep'),
(356, 10, 'Kab. Trenggalek'),
(357, 10, 'Kab. Tuban'),
(358, 10, 'Kab. Tulungagung'),
(359, 10, 'Kota Batu'),
(360, 10, 'Kota Blitar'),
(361, 10, 'Kota Kediri'),
(362, 10, 'Kota Madiun'),
(363, 10, 'Kota Malang'),
(364, 10, 'Kota Mojokerto'),
(365, 10, 'Kota Pasuruan'),
(366, 10, 'Kota Probolinggo'),
(367, 10, 'Kota Surabaya'),
(368, 11, 'Kab. Bengkayang'),
(369, 11, 'Kab. Kapuas Hulu'),
(370, 11, 'Kab. Kayong Utara'),
(371, 11, 'Kab. Ketapang'),
(372, 11, 'Kab. Kubu Raya'),
(373, 11, 'Kab. Landak'),
(374, 11, 'Kab. Malawi'),
(375, 11, 'Kab. Pontianak'),
(376, 11, 'Kab. Sambas'),
(377, 11, 'Kab. Sanggau'),
(378, 11, 'Kab. Sekadau'),
(379, 11, 'Kab. Sintang'),
(380, 11, 'Kota Pontianak'),
(381, 11, 'Kota Singkawang'),
(382, 12, 'Kab. Balangan'),
(383, 12, 'Kab. Banjar'),
(384, 12, 'Kab. Barito Kuala'),
(385, 12, 'Kab. Hulu Sungai Selatan'),
(386, 12, 'Kab. Hulu Sungai Tengah'),
(387, 12, 'Kab. Hulu Sungai Utara'),
(388, 12, 'Kab. Kotabaru'),
(389, 12, 'Kab. Tabalong'),
(390, 12, 'Kab. Tanah Bumbu'),
(391, 12, 'Kab. Tanah Laut'),
(392, 12, 'Kab. Tapin'),
(393, 12, 'Kota Banjarbaru'),
(394, 12, 'Kota Banjarmasin'),
(395, 13, 'Kab. Barito Selatan'),
(396, 13, 'Kab. Barito Timur'),
(397, 13, 'Kab. Barito Utara'),
(398, 13, 'Kab. Gunung Mas'),
(399, 13, 'Kab. Kapuas'),
(400, 13, 'Kab. Katingan'),
(401, 13, 'Kab. Kotawaringin Barat'),
(402, 13, 'Kab. Kotawaringin Timur'),
(403, 13, 'Kab. Lamandau'),
(404, 13, 'Kab. Murung Raya'),
(405, 13, 'Kab. Pulang Pisau'),
(406, 13, 'Kab. Seruyan'),
(407, 13, 'Kab. Sukamara'),
(408, 13, 'Kota Palangkaraya'),
(409, 14, 'Kab. Berau'),
(410, 14, 'Kab. Bulungan'),
(411, 14, 'Kab. Kutai Barat'),
(412, 14, 'Kab. Kutai Kartanegara'),
(413, 14, 'Kab. Kutai Timur'),
(414, 14, 'Kab. Malinau'),
(415, 14, 'Kab. Nunukan'),
(416, 14, 'Kab. Paser'),
(417, 14, 'Kab. Penajam Paser Utara'),
(418, 14, 'Kab. Tana Tidung'),
(419, 14, 'Kota Balikpapan'),
(420, 14, 'Kota Bontang'),
(421, 14, 'Kota Samarinda'),
(422, 14, 'Kota Tarakan'),
(423, 15, 'Kab. Bangka'),
(424, 15, 'Kab. Bangka Barat'),
(425, 15, 'Kab. Bangka Selatan'),
(426, 15, 'Kab. Bangka Tengah'),
(427, 15, 'Kab. Belitung'),
(428, 15, 'Kab. Belitung Timur'),
(429, 15, 'Kota Pangkal Pinang'),
(430, 16, 'Kab. Bintan'),
(431, 16, 'Kab. Karimun'),
(432, 16, 'Kab. Kepulauan Anambas'),
(433, 16, 'Kab. Lingga'),
(434, 16, 'Kab. Natuna'),
(435, 16, 'Kota Batam'),
(436, 16, 'Kota Tanjung Pinang'),
(437, 17, 'Kab. Lampung Barat'),
(438, 17, 'Kab. Lampung Selatan'),
(439, 17, 'Kab. Lampung Tengah'),
(440, 17, 'Kab. Lampung Timur'),
(441, 17, 'Kab. Lampung Utara'),
(442, 17, 'Kab. Pesawaran'),
(443, 17, 'Kab. Pringsewu'),
(444, 17, 'Kab. Tanggamus'),
(445, 17, 'Kab. Tulang Bawang'),
(446, 17, 'Kab. Way Kanan'),
(447, 17, 'Kota Bandar Lampung'),
(448, 17, 'Kota Metro'),
(449, 18, 'Kab. Buru'),
(450, 18, 'Kab. Kepulauan Aru'),
(451, 18, 'Kab. Maluku Tengah'),
(452, 18, 'Kab. Maluku Tenggara'),
(453, 18, 'Kab. Maluku Tenggara Barat'),
(454, 18, 'Kab. Seram Bagian Barat'),
(455, 18, 'Kab. Seram Bagian Timur'),
(456, 18, 'Kota Ambon'),
(457, 18, 'Kota Tual'),
(458, 19, 'Kab. Halmahera Barat'),
(459, 19, 'Kab. Halmahera Selatan'),
(460, 19, 'Kab. Halmahera Tengah'),
(461, 19, 'Kab. Halmahera Timur'),
(462, 19, 'Kab. Halmahera Utara'),
(463, 19, 'Kab. Kepulauan Sula'),
(464, 19, 'Kab. Pulau Morotai'),
(465, 19, 'Kota Ternate'),
(466, 19, 'Kota Tidore Kepulauan'),
(467, 20, 'Kab. Aceh Barat'),
(468, 20, 'Kab. Aceh Barat Daya'),
(469, 20, 'Kab. Aceh Besar'),
(470, 20, 'Kab. Aceh Jaya'),
(471, 20, 'Kab. Aceh Nagan Raya'),
(472, 20, 'Kab. Aceh Selatan'),
(473, 20, 'Kab. Aceh Singkil'),
(474, 20, 'Kab. Aceh Tamiang'),
(475, 20, 'Kab. Aceh Tengah'),
(476, 20, 'Kab. Aceh Tenggara'),
(477, 20, 'Kab. Aceh Timur'),
(478, 20, 'Kab. Aceh Utara'),
(479, 20, 'Kab. Bener Meriah'),
(480, 20, 'Kab. Bireuen'),
(481, 20, 'Kab. Gayo Luas'),
(482, 20, 'Kab. Pidie'),
(483, 20, 'Kab. Pidie Jaya'),
(484, 20, 'Kab. Simeulue'),
(485, 20, 'Kota Banda Aceh'),
(486, 20, 'Kota Langsa'),
(487, 20, 'Kota Lhokseumawe'),
(488, 20, 'Kota Sabang'),
(489, 20, 'Kota Subulussalam'),
(490, 21, 'Kab. Bima'),
(491, 21, 'Kab. Dompu'),
(492, 21, 'Kab. Lombok Barat'),
(493, 21, 'Kab. Lombok Tengah'),
(494, 21, 'Kab. Lombok Timur'),
(495, 21, 'Kab. Sumbawa'),
(496, 21, 'Kab. Sumbawa Barat'),
(497, 21, 'Kota Bima'),
(498, 21, 'Kota Mataram'),
(499, 22, 'Kab. Alor'),
(500, 22, 'Kab. Belu'),
(501, 22, 'Kab. Ende'),
(502, 22, 'Kab. Flores Timur'),
(503, 22, 'Kab. Kupang'),
(504, 22, 'Kab. Lembata'),
(505, 22, 'Kab. Manggarai'),
(506, 22, 'Kab. Manggarai Barat'),
(507, 22, 'Kab. Manggarai Timur'),
(508, 22, 'Kab. Nagekeo'),
(509, 22, 'Kab. Ngada'),
(510, 22, 'Kab. Rote Ndao'),
(511, 22, 'Kab. Sikka'),
(512, 22, 'Kab. Sumba Barat'),
(513, 22, 'Kab. Sumba Tengah'),
(514, 22, 'Kab. Sumba Timur'),
(515, 22, 'Kab. Timor Tengah Selatan'),
(516, 22, 'Kab. Timor Tengah Utara'),
(517, 22, 'Kota Kupang'),
(518, 23, 'Kab. Asmat'),
(519, 23, 'Kab. Biak Numfor'),
(520, 23, 'Kab. Boven Digul'),
(521, 23, 'Kab. Dogiyai'),
(522, 23, 'Kab. Intan Jaya'),
(523, 23, 'Kab. Jaya Pura'),
(524, 23, 'Kab. Jayawijaya'),
(525, 23, 'Kab. Keerom'),
(526, 23, 'Kab. Kepulauan Yapen'),
(527, 23, 'Kab. Lanny Jaya'),
(528, 23, 'Kab. Mamberamo Raya'),
(529, 23, 'Kab. Mamberamo Tengah'),
(530, 23, 'Kab. Mappi'),
(531, 23, 'Kab. Marauke'),
(532, 23, 'Kab. Mimika'),
(533, 23, 'Kab. Nabire'),
(534, 23, 'Kab. Nduga'),
(535, 23, 'Kab. Paniai'),
(536, 23, 'Kab. Pegunungan Bintang'),
(537, 23, 'Kab. Puncak'),
(538, 23, 'Kab. Puncak Jaya'),
(539, 23, 'Kab. Sarmi'),
(540, 23, 'Kab. Supiori'),
(541, 23, 'Kab. Tolikara'),
(542, 23, 'Kab. Waropen'),
(543, 23, 'Kab. Yahukimo'),
(544, 23, 'Kab. Yalimo'),
(545, 23, 'Kota Jayapura'),
(546, 24, 'Kab. Fak-Fak'),
(547, 24, 'Kab. Kaimana'),
(548, 24, 'Kab. Manokwari'),
(549, 24, 'Kab. Maybrat'),
(550, 24, 'Kab. Raja Ampat'),
(551, 24, 'Kab. Sorong'),
(552, 24, 'Kab. Sorong Selatan'),
(553, 24, 'Kab. Teluk Bintuni'),
(554, 24, 'Kab. Teluk Wondama'),
(555, 24, 'Kota Sorong'),
(556, 25, 'Kab. Bengkalis'),
(557, 25, 'Kab. Indragiri Hilir'),
(558, 25, 'Kab. Indragiri Hulu'),
(559, 25, 'Kab. Kampar'),
(560, 25, 'Kab. Kepulauan Meranti'),
(561, 25, 'Kab. Kuantan Singing'),
(562, 25, 'Kab. Pelalawan'),
(563, 25, 'Kab. Rokan Hilir'),
(564, 25, 'Kab. Rokan Hulu'),
(565, 25, 'Kab. Siak'),
(566, 25, 'Kota Dumai'),
(567, 25, 'Kota Pekanbaru'),
(568, 26, 'Kab. Majene'),
(569, 26, 'Kab. Mamasa'),
(570, 26, 'Kab. Mamuju'),
(571, 26, 'Kab. Mamuju Utara'),
(572, 26, 'Kab. Polewali'),
(573, 27, 'Kab. Bantaeng'),
(574, 27, 'Kab. Barru'),
(575, 27, 'Kab. Bone'),
(576, 27, 'Kab. Bulukumba'),
(577, 27, 'Kab. Enrekang'),
(578, 27, 'Kab. Gowa'),
(579, 27, 'Kab. Jeneponto'),
(580, 27, 'Kab. Luwu'),
(581, 27, 'Kab. Luwu Timur'),
(582, 27, 'Kab. Luwu Utara'),
(583, 27, 'Kab. Maros'),
(584, 27, 'Kab. Pangkajene Kepulauan'),
(585, 27, 'Kab. Pinrang'),
(586, 27, 'Kab. Selayar'),
(587, 27, 'Kab. Sidenreng Rappang'),
(588, 27, 'Kab. Sinjai'),
(589, 27, 'Kab. Soppeng'),
(590, 27, 'Kab. Takalar'),
(591, 27, 'Kab. Tana Toraja'),
(592, 27, 'Kab. Toraja Utara'),
(593, 27, 'Kab. Wajo'),
(594, 27, 'Kota Makasar'),
(595, 27, 'Kota Palopo'),
(596, 27, 'Kota Pare Pare'),
(597, 28, 'Kab. Banggai'),
(598, 28, 'Kab. Banggai Kepulauan'),
(599, 28, 'Kab. Buol'),
(600, 28, 'Kab. Donggala'),
(601, 28, 'Kab. Morowali'),
(602, 28, 'Kab. Parigi Muotong'),
(603, 28, 'Kab. Poso'),
(604, 28, 'Kab. Sigi'),
(605, 28, 'Kab. Tojo Una-Una'),
(606, 28, 'Kab. Toli Toli'),
(607, 28, 'Kota Palu'),
(608, 29, 'Kab. Bombana'),
(609, 29, 'Kab. Buton'),
(610, 29, 'Kab. Buton Utara'),
(611, 29, 'Kab. Kolaka'),
(612, 29, 'Kab. Kolaka Utara'),
(613, 29, 'Kab. Konawe'),
(614, 29, 'Kab. Konawe Selatan'),
(615, 29, 'Kab. Konawe Utara'),
(616, 29, 'Kab. Muna'),
(617, 29, 'Kab. Wakatobi'),
(618, 29, 'Kota Bau-Bau'),
(619, 29, 'Kota Kendari'),
(620, 30, 'Kab. Bolaang Mongondow'),
(621, 30, 'Kab. Bolaang Mongondow Utara'),
(622, 30, 'Kab. Kepl. Sitaro'),
(623, 30, 'Kab. Kepl. Talaud'),
(624, 30, 'Kab. Minahasa'),
(625, 30, 'Kab. Minahasa Selatan'),
(626, 30, 'Kab. Minahasa Tenggara'),
(627, 30, 'Kab. Minahasa Utara'),
(628, 30, 'Kab. Sangihe'),
(629, 30, 'Kota Bitung'),
(630, 30, 'Kota Kotamobagu'),
(631, 30, 'Kota Manado'),
(632, 30, 'Kota Tomohon'),
(633, 31, 'Kab. Agam'),
(634, 31, 'Kab. Dharmasraya'),
(635, 31, 'Kab. Kepulauan Mentawai'),
(636, 31, 'Kab. Lima Puluh Kota'),
(637, 31, 'Kab. Padang Pariaman'),
(638, 31, 'Kab. Pasaman'),
(639, 31, 'Kab. Pasaman Barat'),
(640, 31, 'Kab. Pesisir Selatan'),
(641, 31, 'Kab. Sijunjung'),
(642, 31, 'Kab. Solok'),
(643, 31, 'Kab. Solok Selatan'),
(644, 31, 'Kab. Tanah Datar'),
(645, 31, 'Kota Bukittinggi'),
(646, 31, 'Kota Padang'),
(647, 31, 'Kota Padang Panjang'),
(648, 31, 'Kota Pariaman'),
(649, 31, 'Kota Payakumbuh'),
(650, 31, 'Kota Sawahlunto'),
(651, 31, 'Kota Solok'),
(652, 32, 'Kab. Banyuasin'),
(653, 32, 'Kab. Empat Lawang'),
(654, 32, 'Kab. Lahat'),
(655, 32, 'Kab. Muara Enim'),
(656, 32, 'Kab. Musi Banyuasin'),
(657, 32, 'Kab. Musi Rawas'),
(658, 32, 'Kab. Ogan Ilir'),
(659, 32, 'Kab. Ogan Komering Ilir'),
(660, 32, 'Kab. Ogan Komering Ulu'),
(661, 32, 'Kab. Oku Selatan'),
(662, 32, 'Kab. Oku Timur'),
(663, 32, 'Kota Lubuk Linggau'),
(664, 32, 'Kota Pagar Alam'),
(665, 32, 'Kota Palembang'),
(666, 32, 'Kota Prabumulih'),
(667, 33, 'Kab. Asahan'),
(668, 33, 'Kab. Batubara'),
(669, 33, 'Kab. Dairi'),
(670, 33, 'Kab. Deli Serdang'),
(671, 33, 'Kab. Humbang Hasundutan'),
(672, 33, 'Kab. Karo'),
(673, 33, 'Kab. Labuhanbatu'),
(674, 33, 'Kab. Labuhanbatu Selatan'),
(675, 33, 'Kab. Labuhanbatu Utara'),
(676, 33, 'Kab. Langkat'),
(677, 33, 'Kab. Mandailing Natal'),
(678, 33, 'Kab. Nias'),
(679, 33, 'Kab. Nias Selatan'),
(680, 33, 'Kab. Nias Utara'),
(681, 33, 'Kab. Padang Lawas'),
(682, 33, 'Kab. Padang Lawas Utara'),
(683, 33, 'Kab. Pakpak Bharat'),
(684, 33, 'Kab. Samosir'),
(685, 33, 'Kab. Serdang Bedagai'),
(686, 33, 'Kab. Simalungun'),
(687, 33, 'Kab. Tapanuli Selatan'),
(688, 33, 'Kab. Tapanuli Tengah'),
(689, 33, 'Kab. Tapanuli Utara'),
(690, 33, 'Kab. Toba Samosir'),
(691, 33, 'Kota Binjai'),
(692, 33, 'Kota Gunung Sitoli'),
(693, 33, 'Kota Medan'),
(694, 33, 'Kota Padang Sidempuan'),
(695, 33, 'Kota Pematang Siantar'),
(696, 33, 'Kota Sibolga'),
(697, 33, 'Kota Tanjung Balai'),
(698, 33, 'Kota Tebing Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE IF NOT EXISTS `map` (
  `id_map` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  PRIMARY KEY (`id_map`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`id_map`, `title`, `latitude`, `longitude`) VALUES
(1, 'UPN Veteran Surabaya', -7.331822, 112.789322),
(2, 'Kantor kami', -7.336844, 112.77885),
(3, 'STIKOM Surabaya', -7.308666, 112.782284);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id_pemesanan_element` int(11) NOT NULL AUTO_INCREMENT,
  `elements` text,
  PRIMARY KEY (`id_pemesanan_element`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id_pemesanan_element`, `elements`) VALUES
(32, 'vvghvhvhvh');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE IF NOT EXISTS `paket` (
  `id_paket` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `elemen` text NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama`, `harga`, `elemen`) VALUES
(1, 'Gold Package', 'Rp. 39.000.000', '<p>\r\n	1. Siraman<br />\r\n	2. Dekorasi kamar pengantin<br />\r\n	3. Dekorasi akad nikah<br />\r\n	4. Dekorasi pelaminan<br />\r\n	5. Pakaian dan rias pengantin<br />\r\n	6. Pakaian &amp; rias ibu/bapak/besan<br />\r\n	7. Pakaian &amp; rias 2 pasang penerima tamu<br />\r\n	8. Pakaian &amp; rias 2 pasang pagar ayu/bagus<br />\r\n	9. MC (Siraman, Panggih, Resepsi)<br />\r\n	10. Tuwuhan<br />\r\n	11. Bunga kembar mayang<br />\r\n	12. Penjor<br />\r\n	13. Pundi<br />\r\n	14. Buku tamu<br />\r\n	15. video + foto</p>\r\n'),
(2, 'Diamond Package', 'Rp. 29.000.000', ' <p>\n                                1. Siraman<br>\n                                2. Dekorasi kamar pengantin<br>\n                                3. Dekorasi akad nikah<br>\n                                4. Dekorasi pelaminan<br>\n                                5. Pakaian dan rias pengantin<br>\n                                6. Pakaian & rias ibu/bapak/besan<br>\n                                7. Pakaian & rias 2 pasang penerima tamu<br>\n                                8. Pakaian & rias 2 pasang pagar ayu/bagus<br>\n                                9. MC (Siraman, Panggih, Resepsi)<br>\n                                10. Tuwuhan<br>\n                                11. Bunga kembar mayang<br>\n                                12. Penjor<br>\n                                13. Pundi<br>\n                                14. Buku tamu<br>\n                                15. video + foto<br>\n                                16. Catering 200pax (8 Macam)\n                                17. Band jazz\n                            </p>'),
(3, 'Silver Package', 'Rp. 10.000.000', '<p>\r\n	1. Siraman<br />\r\n	2. Dekorasi kamar pengantin<br />\r\n	3. Dekorasi akad nikah<br />\r\n	4. Dekorasi pelaminan<br />\r\n	5. Pakaian dan rias pengantin<br />\r\n	6. Pakaian &amp; rias ibu/bapak/besan<br />\r\n	7. Pakaian &amp; rias 2 pasang penerima tamu<br />\r\n	8. Pakaian &amp; rias 2 pasang pagar ayu/bagus<br />\r\n	9. MC (Siraman, Panggih, Resepsi)<br />\r\n	10. Tuwuhan<br />\r\n	11. Bunga kembar mayang<br />\r\n	12. Penjor<br />\r\n	13. Pundi<br />\r\n	14. Buku tamu<br />\r\n	15. video + foto<br />\r\n	16. Catering 200pax (8 Macam)<br />\r\n	17. Band jazz</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `ID_PEMESANAN` int(10) NOT NULL AUTO_INCREMENT,
  `ID_KONSUMEN` int(11) DEFAULT NULL,
  `KODE_PAKET` int(11) NOT NULL,
  `KONSEP_ACARA` text,
  `BUKTI_PEMBAYARAN` varchar(300) DEFAULT NULL,
  `UANG_DP` int(11) NOT NULL,
  `TANGGAL_PESAN` date DEFAULT NULL,
  `TANGGAL_ACARA` date DEFAULT NULL,
  `STATUS_VERIFIKASI` int(11) NOT NULL,
  PRIMARY KEY (`ID_PEMESANAN`),
  KEY `FK_ACARA` (`KODE_PAKET`),
  KEY `FK_PESAN` (`ID_KONSUMEN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`ID_PEMESANAN`, `ID_KONSUMEN`, `KODE_PAKET`, `KONSEP_ACARA`, `BUKTI_PEMBAYARAN`, `UANG_DP`, `TANGGAL_PESAN`, `TANGGAL_ACARA`, `STATUS_VERIFIKASI`) VALUES
(8, 22, 1, 'gitu deh', '22_buktibayar.png', 800000, '2014-02-03', '2014-02-04', 1),
(13, 27, 1, 'assdasdasd', 'ade.png', 800000, '2014-02-03', '2014-02-05', 0),
(14, NULL, 1, 'ssadasdasdsad', '7.jpeg', 800000, '2014-02-03', '2014-02-06', 0),
(15, NULL, 2, 'asddasdsad', 'ade.png', 1000000, '2014-02-03', '2014-02-07', 0),
(20, 22, 1, 'asasasa', '22_buktibayar.png', 800000, '2014-02-03', '2014-02-10', 0),
(21, 22, 2, 'jkjkjkj', '21_buktibayar.png', 1000000, '2014-02-03', '2014-02-11', 0),
(22, 27, 1, 'sdhgdajhgjhsd', '22_buktibayar.png', 800000, '2014-02-03', '2014-02-12', 0),
(23, NULL, 1, 'sdadasdasd', '23_buktibayar.', 800000, '2014-02-03', '2014-02-20', 0),
(24, NULL, 2, 'fsdfsdfsf', '24_buktibayar.png', 1000000, '2014-02-03', '2014-02-18', 0),
(25, 22, 1, 'hahahahha', '25_buktibayar.PNG', 800000, '2014-02-14', '2014-02-19', 0),
(26, 28, 1, 'ssabdjasbdhjabsdj', '', 800000, '2014-02-21', '2014-02-28', 0),
(27, 29, 1, 'sdadasdasdasda', '', 800000, '2014-02-21', '2014-02-24', 1),
(28, 30, 1, 'dasdasdasdad', '', 800000, '2014-02-22', '2014-02-26', 1),
(29, 22, 0, 'sadasdasdasd', '29_buktibayar.png', 0, '2014-02-23', '2014-02-27', 0),
(30, 22, 0, 'sadasdasdasd', '30_buktibayar.png', 0, '2014-02-23', '2014-02-27', 0),
(31, 27, 0, 'werwerwrwr', '31_buktibayar.png', 0, '2014-02-23', '2014-02-25', 0),
(32, 29, 0, 'hbhbhjbbjbjbj', '32_buktibayar.png', 0, '2014-02-23', '2014-03-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id_provinsi` int(5) NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Bali'),
(2, 'Banten'),
(3, 'Bengkulu'),
(4, 'DI Yogyakarta'),
(5, 'DKI Jakarta'),
(6, 'Gorontalo'),
(7, 'Jambi'),
(8, 'Jawa Barat'),
(9, 'Jawa Tengah'),
(10, 'Jawa Timur'),
(11, 'Kalimantan Barat'),
(12, 'Kalimantan Selatan'),
(13, 'Kalimantan Tengah'),
(14, 'Kalimantan Timur'),
(15, 'Kepulauan Bangka Belitung'),
(16, 'Kepulauan Riau'),
(17, 'Lampung'),
(18, 'Maluku'),
(19, 'Maluku Utara'),
(20, 'Nanggroe Aceh Darussalam'),
(21, 'Nusa Tenggara Barat'),
(22, 'Nusa Tenggara Timur'),
(23, 'Papua'),
(24, 'Papua Barat'),
(25, 'Riau'),
(26, 'Sulawesi Barat'),
(27, 'Sulawesi Selatan'),
(28, 'Sulawesi Tengah'),
(29, 'Sulawesi Tenggara'),
(30, 'Sulawesi Utara'),
(31, 'Sumatera Barat'),
(32, 'Sumatera Selatan'),
(33, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `wedding`
--

CREATE TABLE IF NOT EXISTS `wedding` (
  `KODE_PAKET` int(11) NOT NULL,
  `NAMA_PAKET` varchar(50) DEFAULT NULL,
  `HARGA` varchar(50) DEFAULT NULL,
  `RINCIAN` text,
  PRIMARY KEY (`KODE_PAKET`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wedding`
--

INSERT INTO `wedding` (`KODE_PAKET`, `NAMA_PAKET`, `HARGA`, `RINCIAN`) VALUES
(0, 'lain', 'hubungi contact person', 'pilihan lain'),
(1, 'klasik', '8000000', 'Jika anda ingin memiliki pernikahan menakjubkan di surabaya.Kemudian pernikahan taman terbuka adalah jawabannya. Di lokasi Anda dapat memilih dengan gaya klasik menggunakan baju adat, atau dengan gaya klasik ala eropa. '),
(2, 'adat jawa', '10000000', 'contoh pernikahan dengan menggunakan adat daerah');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD CONSTRAINT `FK_MENGISI` FOREIGN KEY (`ID_KONSUMEN`) REFERENCES `konsumen` (`ID_KONSUMEN`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`ID_KONSUMEN`) REFERENCES `konsumen` (`ID_KONSUMEN`) ON DELETE SET NULL,
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`KODE_PAKET`) REFERENCES `wedding` (`KODE_PAKET`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
