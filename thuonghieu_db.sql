-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2018 at 05:15 AM
-- Server version: 5.6.34
-- PHP Version: 5.5.38

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thuonghieu_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `nhom`
--

CREATE TABLE IF NOT EXISTS `nhom` (
  `ma` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duongdan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci,
  `hinhdaidien` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `danhmuccha` int(11) DEFAULT '0',
  `ngaytao` datetime DEFAULT NULL,
  `ngaycapnhat` datetime DEFAULT NULL,
  `kichhoat` int(1) DEFAULT '0',
  `h1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tukhoa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motatukhoa` text COLLATE utf8_unicode_ci,
  `tieude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thutu` int(11) DEFAULT NULL,
  PRIMARY KEY (`ma`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `nhom`
--

INSERT INTO `nhom` (`ma`, `ten`, `duongdan`, `mota`, `hinhdaidien`, `danhmuccha`, `ngaytao`, `ngaycapnhat`, `kichhoat`, `h1`, `tukhoa`, `motatukhoa`, `tieude`, `thutu`) VALUES
(1, 'Quà tặng kèm sản phẩm', 'danh-muc-1', '', '', 0, '2018-01-08 00:00:00', '2018-01-08 00:00:00', 1, NULL, 'danh mục 1', 'danh mục 1', 'danh mục 1', 1),
(2, 'Quà tặng tổ chức sự kiện', 'danh-muc-2', '', '', 0, '2018-01-08 00:00:00', '2018-01-08 00:00:00', 1, NULL, '', '', '', 1),
(3, 'Quà tặng trường học ', 'qua-tang-3', '', '', 0, '2018-01-09 00:00:00', '2018-01-09 00:00:00', 1, NULL, '', '', '', 1),
(4, 'Quà tặng du lịch', 'qua-tang-du-lich', '', '', 0, '2018-01-09 00:00:00', '2018-01-09 00:00:00', 1, NULL, '', '', '', 1),
(5, 'Quà tặng điện tử', 'qua-tang-dien-tu', '', '', 0, '2018-01-09 00:00:00', '2018-01-09 00:00:00', 1, NULL, '', '', '', 1),
(6, 'Quà tặng câu lạc bộ', 'qua-tang-5', '', '', 0, '2018-01-09 00:00:00', '2018-01-09 00:00:00', 1, NULL, '', '', '', 1),
(7, 'Quà tặng công ty quảng cáo', 'qua-tang-6', '', '', 0, '2018-01-09 00:00:00', '2018-01-09 00:00:00', 1, NULL, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE IF NOT EXISTS `parameter` (
  `ma` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatri` text COLLATE utf8_unicode_ci,
  `ngaytao` datetime DEFAULT NULL,
  `ngaycapnhat` datetime DEFAULT NULL,
  PRIMARY KEY (`ma`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=48 ;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`ma`, `ten`, `giatri`, `ngaytao`, `ngaycapnhat`) VALUES
(1, 'logo', 'http://chamsocthuonghieu.vn/images/logotop.png', '2016-06-01 11:36:22', '2018-01-09 00:00:00'),
(2, 'banner', 'http://chamsocthuonghieu.vn/images/BANNER1.jpg', '2016-06-01 11:36:22', '2018-01-09 00:00:00'),
(3, 'tieude', 'Shop', '2016-06-01 11:36:22', '2016-08-13 00:00:00'),
(4, 'motatukhoa', 'Shop', '2016-06-01 11:36:22', '2016-08-13 00:00:00'),
(5, 'tukhoa', 'Shop', '2016-06-01 11:36:22', '2016-08-13 00:00:00'),
(6, 'h1', 'Shop', '2016-06-01 11:36:22', '2016-08-13 00:00:00'),
(7, 'soluongdong', '20', '2016-06-01 11:36:22', '2016-07-08 00:00:00'),
(47, 'logo2', 'http://chamsocthuonghieu.vn/images/logobottom.png', NULL, '2018-01-09 00:00:00'),
(9, 'dienthoai', '0903 909 777', '2016-06-01 11:36:22', '2018-01-09 00:00:00'),
(10, 'email', 'dannyhuynh@tanmya.com.vn', '2016-06-01 11:36:22', '2018-01-09 00:00:00'),
(13, 'noidung404', '<div style="text-align: center;"><input alt="" src="http://dungcubuffet.com/images/404.png" style="width: 346px; height: 298px;" type="image" />\r\n<div><span style="font-size:16px;">Quay về <a href="#">trang chủ</a></span></div>\r\n</div>\r\n', '2016-06-01 11:36:22', '2018-01-08 00:00:00'),
(14, 'baotri', '0', '2016-06-01 11:36:22', '2016-08-13 00:00:00'),
(15, 'themeta', '', '2016-06-01 11:36:22', '2018-01-09 00:00:00'),
(16, 'scriptgoogle', '<script>\r\n  (function(i,s,o,g,r,a,m){i[''GoogleAnalyticsObject'']=r;i[r]=i[r]||function(){\r\n  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\r\n  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\r\n  })(window,document,''script'',''https://www.google-analytics.com/analytics.js'',''ga'');\r\n\r\n  ga(''create'', ''UA-80060114-1'', ''auto'');\r\n  ga(''send'', ''pageview'');\r\n</script>', '2016-06-01 11:36:22', '2016-07-02 00:00:00'),
(24, 'seo', '1', NULL, '2016-08-13 00:00:00'),
(20, 'facebook', 'http://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fmaybe.com.vn&width=245&height=258&colorscheme=light&show_faces=true&header=false&stream=false&show_border=true', NULL, '2016-06-21 00:00:00'),
(42, 'gioithieutieude', 'Về chúng tôi', NULL, '2016-07-07 00:00:00'),
(43, 'gioithieunoidung1', 'là công ty hàng đầu về tư vấn và đưa ra giải pháp về quà tặng dành cho doanh nghiệp, công ty tổ chức sự kiện cũng như các lĩnh vực khác. Với phương châm đem khách hàng đến với sản phẩm thông qua quà tặng đi kèm, chúng tôi cung ứng những món quà tặng thông minh, phù hợp với đối tượng khách hàng mà doanh nghiệp hướng tới. Với tiêu chí là giá cả phù hợp với nhu cầu của khách hàng và thực dụng cho người tiêu dùng, chúng tôi cam kết đưa ra những sản phẩm tối ưu nhất cho khách hàng và người tiêu dùng', NULL, '2016-07-07 00:00:00'),
(31, 'noidungbaotri', 'Website đang tiến hành nâng cấp, vui lòng quay lại sau!!!', NULL, '2016-08-13 00:00:00'),
(32, 'favicon', 'http://chamsocthuonghieu.vn/images/faicon.png', NULL, '2018-01-09 00:00:00'),
(33, 'diachi', 'Số 20 Nguyễn Thị Nhỏ, Phường 6, Quận 5, thành phố Hồ Chí Minh', NULL, '2018-01-09 00:00:00'),
(37, 'bando', '', NULL, '2018-01-09 00:00:00'),
(46, 'tenlienhe', 'Mr Đông', NULL, '2018-01-09 00:00:00'),
(38, 'imagetrangchu', 'http://chamsocthuonghieu.vn/images/hinh2.png', NULL, '2018-01-09 00:00:00'),
(44, 'gioithieunoidung2', 'là công ty đại diện của Vogue HK. Một trong những tập đoàn lớn nhất của Hongkong về quà tặng kèm và đã có những bản hợp đồng có giá trị với các doanh nghiệp lớn của Trung Quốc trong những năm vừa qua. Vì lẽ đó mà công ty chúng tôi luôn đảm bảo khách hàng luôn nhận được sản phẩm với chất lượng tốt nhất đi kèm với sự chuyên nghiệp của công ty', NULL, NULL),
(45, 'gioithieunoidung3', '“ Cùng với việc kí kết bản quyền của các nhãn hàng nổi tiếng trên thế giới, sản phẩm của chúng tôi không chỉ đơn thuần mang dấu ấn của doanh nghiệp khách hàng, chúng tôi có thể làm cho người tiêu dùng hài lòng với sản phẩm mang thương hiệu của các nhãn hàng nổi tiếng. Làm cho người tiêu dùng cảm thấy doanh nghiệp hoặc các công ty tổ chức sự kiện quan tâm hơn về khách hàng và tạo một sự trung thành nhất định đối với doanh nghiệp và các sự kiện sau này”', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quantri`
--

CREATE TABLE IF NOT EXISTS `quantri` (
  `ma` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendangnhap` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matkhau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dienthoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaytao` datetime DEFAULT NULL,
  `ngaycapnhat` datetime DEFAULT NULL,
  `kichhoat` int(11) DEFAULT NULL,
  `quyen` int(11) DEFAULT NULL,
  PRIMARY KEY (`ma`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `quantri`
--

INSERT INTO `quantri` (`ma`, `ten`, `tendangnhap`, `matkhau`, `email`, `dienthoai`, `ngaytao`, `ngaycapnhat`, `kichhoat`, `quyen`) VALUES
(1, 'admin', 'admin', 'c216319b3d647d15f366219f839997f0', 'dannyhuynh@tanmya.com.vn', '0903909777', '2016-06-07 08:53:18', '2018-01-09 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `ma` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duongdan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhomtin` int(11) DEFAULT NULL,
  `chitiet` text COLLATE utf8_unicode_ci,
  `tomtat` text COLLATE utf8_unicode_ci NOT NULL,
  `h1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tukhoa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motatukhoa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tieude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kichhoat` int(11) NOT NULL DEFAULT '0',
  `ngaytao` datetime NOT NULL,
  `ngaycapnhat` datetime DEFAULT NULL,
  `hinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhs` text COLLATE utf8_unicode_ci NOT NULL,
  `noibat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ma`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`ma`, `ten`, `duongdan`, `manhomtin`, `chitiet`, `tomtat`, `h1`, `tukhoa`, `motatukhoa`, `tieude`, `kichhoat`, `ngaytao`, `ngaycapnhat`, `hinh`, `hinhs`, `noibat`) VALUES
(1, 'sản phẩm 1', 'san-pham-1', 1, '<ul>\r\n	<li>Xuất xứ: Pháp</li>\r\n	<li>Chất liệu: Da thật 100%</li>\r\n</ul>\r\n', 'sản phẩm 1', NULL, 'sản phẩm 1', 'sản phẩm 1', 'sản phẩm 1', 1, '2018-01-08 00:00:00', '2018-01-08 00:00:00', 'http://chamsocthuonghieu.vn/images/hinh1.png', '', 1),
(2, 'sản phẩm 1', 'san-pham-2', 1, '<ul>\r\n	<li>Xuất xứ: Pháp</li>\r\n	<li>Chất liệu: Da thật 100%</li>\r\n</ul>\r\n', 'sản phẩm 1', '', 'sản phẩm 1', 'sản phẩm 1', 'sản phẩm 1', 1, '2018-01-08 00:00:00', '2018-01-08 00:00:00', 'http://chamsocthuonghieu.vn/images/hinh2.png', '', 1),
(3, 'sản phẩm 1', 'san-pham-3', 2, '<ul>\r\n	<li>Xuất xứ: Pháp</li>\r\n	<li>Chất liệu: Da thật 100%</li>\r\n</ul>\r\n', 'sản phẩm 1', '', 'sản phẩm 1', 'sản phẩm 1', 'sản phẩm 1', 1, '2018-01-08 00:00:00', '2018-01-08 00:00:00', 'http://chamsocthuonghieu.vn/images/sl1.png', '', 1),
(4, 'sản phẩm 1', 'san-pham-4', 1, '<ul>\r\n	<li>Xuất xứ: Pháp</li>\r\n	<li>Chất liệu: Da thật 100%</li>\r\n</ul>\r\n', 'sản phẩm 1', '', 'sản phẩm 1', 'sản phẩm 1', 'sản phẩm 1', 1, '2018-01-08 00:00:00', '2018-01-08 00:00:00', 'http://chamsocthuonghieu.vn/images/hinh4.png', '', 1),
(5, 'sản phẩm 1', 'san-pham-5', 2, '<ul>\r\n	<li>Xuất xứ: Pháp</li>\r\n	<li>Chất liệu: Da thật 100%</li>\r\n</ul>\r\n', 'sản phẩm 1', '', 'sản phẩm 1', 'sản phẩm 1', 'sản phẩm 1', 1, '2018-01-08 00:00:00', '2018-01-08 00:00:00', 'http://chamsocthuonghieu.vn/images/sl1.png', '', 0),
(6, 'sản phẩm 1', 'san-pham-6', 2, '<ul>\r\n	<li>Xuất xứ: Pháp</li>\r\n	<li>Chất liệu: Da thật 100%</li>\r\n</ul>\r\n', 'sản phẩm 1', '', 'sản phẩm 1', 'sản phẩm 1', 'sản phẩm 1', 1, '2018-01-08 00:00:00', '2018-01-08 00:00:00', 'http://chamsocthuonghieu.vn/images/sl1.png', '', 0),
(7, 'sản phẩm 1', 'san-pham-7', 1, '<ul>\r\n	<li>Xuất xứ: Pháp</li>\r\n	<li>Chất liệu: Da thật 100%</li>\r\n</ul>\r\n', 'sản phẩm 1', '', 'sản phẩm 1', 'sản phẩm 1', 'sản phẩm 1', 1, '2018-01-08 00:00:00', '2018-01-08 00:00:00', 'http://chamsocthuonghieu.vn/images/sl1.png', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
