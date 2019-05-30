-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 24, 2019 lúc 04:35 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phonestores`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `phone`, `avatar`, `name`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'letaitu57a@gmail.com', '342127744', '', 'Lê Tài Tú');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id_cate` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id_cate`, `name`, `logo`) VALUES
(1, 'SAMSUNG', '1557565937-57253355_2025271540914545_8246845461864906752_n.jpg'),
(9, 'IPHONE', '1557565247-FB_IMG_1551374675931.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(255) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `create_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `sex`, `email`, `birthday`, `address`, `phone`, `password`, `create_time`) VALUES
(1, 'Hùng', 0, 'hung97@gmail.com', '1994-08-15', 'Hà Nội', '0918273645', '123456', '0000-00-00 00:00:00'),
(2, 'Long', 0, 'longtran@gmail.com', '1997-12-12', 'Hà Nội', '0342127744', '123456', '0000-00-00 00:00:00'),
(3, 'Linh Trần', 1, 'Linh@gmail.com', '1997-12-26', 'Hà Nội', '0342127744', '123456', '2019-05-06 16:07:44'),
(4, 'Trang Nguyễn', 1, 'trang@gmail.com', '1996-12-20', 'Hà Nội', '0123456789', '123456', '2019-05-14 16:56:27'),
(5, 'Lê Văn Hưng', 0, 'hung456@gmail.com', '1995-03-12', 'Hà Nội', '0342127744', '123456', '2019-05-14 22:24:18'),
(6, 'Hạnh Lê', 0, 'hnhacb@gmail.com', '1992-08-25', 'Hà Nội ', '0123456789', '123456', '2019-05-14 22:34:29'),
(7, 'Linh Lê', 0, 'linh123@gmail.com', '1994-12-03', 'Hà Nội', '0123456789', '123456', '2019-05-14 22:47:20'),
(8, 'Văn Hùng', 0, 'hung123@gmail.com', '1996-02-22', 'Hà Nội', '342127744', '123456', '2019-05-14 22:59:37'),
(10, 'Lan Anh', 0, 'anh1997@gmail.com', '1998-10-25', 'Hà Nội', '0123654789', '123456', '2019-05-14 23:06:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id_feed` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `content` text,
  `create_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `footer` varchar(255) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `logo`, `header`, `footer`, `update_time`) VALUES
(1, '1557394518-logo.png', '1557394518-mbrace-orthodontics-falmouth-me-logo-white.png', '1557394518-mbrace-orthodontics-falmouth-me-logo-white.png', '2019-05-09 16:18:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id_odt` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`id_odt`, `id_order`, `amount`, `create_time`) VALUES
(3, 15, '20000000.00', '2019-05-19 10:50:34'),
(4, 16, '13900000.00', '2019-05-21 16:27:45'),
(5, 17, '8290000.00', '2019-05-21 23:18:15'),
(6, 18, '15280000.00', '2019-05-21 23:18:46'),
(7, 19, '22270000.00', '2019-05-21 23:28:36'),
(8, 20, '17990000.00', '2019-05-22 03:11:57'),
(9, 21, '24980000.00', '2019-05-22 03:19:10'),
(10, 22, '17990000.00', '2019-05-22 03:37:51'),
(11, 23, '6990000.00', '2019-05-22 03:53:54'),
(12, 24, '17990000.00', '2019-05-23 16:27:40'),
(13, 25, '0.00', '2019-05-23 16:29:04'),
(14, 26, '35980000.00', '2019-05-23 16:54:46'),
(15, 27, '18990000.00', '2019-05-24 15:39:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `name_customer` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `id_product` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `name_product` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(513) CHARACTER SET utf8 DEFAULT NULL,
  `quantity` varchar(11) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_customer`, `name_customer`, `id_product`, `name_product`, `address`, `quantity`, `price`, `amount`, `order_status`, `create_time`) VALUES
(15, 2, 'Long', '3-4', 'IPHONE 6 Plus-SAMSUNG J5 Prime', '0342127744 - Hà Nội (  )', '1-1', '15000000.00-5000000.00', '20000000.00', 3, '2019-05-19 10:50:34'),
(16, 2, 'Lê Tài Tú', '4-2', 'SAMSUNG J5 Prime-Samsung S7 +', '0342127744 - Hà Nội ( samsung )', '1-1', '5000000.00-8900000.00', '13900000.00', 3, '2019-05-21 16:27:45'),
(17, 2, 'Long', '7', '?i?n tho?i Samsung Galaxy A9 (2018)', '0342127744 - Hà Nội (  )', '1', '8290000.00', '8290000.00', 1, '2019-05-21 23:18:15'),
(18, 5, 'Lê Văn Hưng', '6-7', '?i?n tho?i Samsung Galaxy A50 64GB-?i?n tho?i Samsung Galaxy A9 (2018)', '0342127744 - Hà Nội (  )', '1-1', '6990000.00-8290000.00', '15280000.00', 2, '2019-05-21 23:18:46'),
(19, 5, 'Lê Văn Hưng', '6-7', '?i?n tho?i Samsung Galaxy A50 64GB-?i?n tho?i Samsung Galaxy A9 (2018)', '0342127744 - Hà Nội (  )', '2-1', '6990000.00-8290000.00', '22270000.00', 0, '2019-05-21 23:28:35'),
(20, 3, 'Linh Trần', '8', '?i?n tho?i Samsung Galaxy S10', '0342127744 - Hà Nội (  )', '1', '17990000.00', '17990000.00', 0, '2019-05-22 03:11:57'),
(21, 5, 'Lê Văn Hưng', '6-8', '?i?n tho?i Samsung Galaxy A50 64GB-?i?n tho?i Samsung Galaxy S10', '0342127744 - Hà Nội (  )', '1-1', '6990000.00-17990000.00', '24980000.00', 3, '2019-05-22 03:19:10'),
(22, 10, 'Lan Anh', '8', '?i?n tho?i Samsung Galaxy S10', '0123654789 - Hà Nội (  )', '1', '17990000.00', '17990000.00', 0, '2019-05-22 03:37:51'),
(23, 10, 'Lan Anh', '6', '?i?n tho?i Samsung Galaxy A50 64GB', '0123654789 - Hà Nội (  )', '1', '6990000.00', '6990000.00', 0, '2019-05-22 03:53:54'),
(24, 3, 'Linh Trần', '8', '?i?n tho?i Samsung Galaxy S10', '0342127744 - Hà Nội (  )', '1', '17990000.00', '17990000.00', 0, '2019-05-23 16:27:40'),
(25, 3, 'Linh Trần', '', '', '0342127744 - Hà Nội (  )', '', '', '0.00', 0, '2019-05-23 16:29:04'),
(26, 3, 'Linh Trần', '8', 'Điện thoại Samsung Galaxy S10', '0342127744 - Hà Nội (  )', '2', '17990000.00', '35980000.00', 0, '2019-05-23 16:54:46'),
(27, 4, 'Trang Nguyễn', '23', 'Điện thoại Samsung Galaxy Note 9', '0123456789 - Hà Nội (  )', '1', '18990000.00', '18990000.00', 0, '2019-05-24 15:39:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_pro` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `name_pro` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  `view` int(15) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_pro`, `id_category`, `id_type`, `image`, `name_pro`, `price`, `content`, `view`, `create_time`) VALUES
(6, 1, 2, '1558472927-samsung-galaxy-a50-black-1-400x460.png', 'Điện thoại Samsung Galaxy A50 64GB', '6990000.00', 'Màn hình-\r\nCông nghệ màn hình	Super AMOLED-\r\nĐộ phân giải	Full HD+ (1080 x 2340 Pixels)-\r\nMàn hình rộng	6.4\"-\r\nMặt kính cảm ứng	Kính cường lực Gorilla Glass 3-\r\nCamera sau-\r\nĐộ phân giải	Chính 25 MP & Phụ 8 MP, 5 MP-\r\nQuay phim	Quay phim FullHD 1080p@30fps-\r\nĐèn Flash	Có-\r\nChụp ảnh nâng cao	Chụp ảnh xóa phông, Chế độ Slow Motion, Chế độ Time-Lapse, A.I Camera, Super Slow Motion (quay siêu chậm), Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Làm đẹp (Beautify)-\r\nCamera trước-\r\nĐộ phân giải	25 MP-\r\nVideocall	Hỗ trợ VideoCall thông qua ứng dụng-\r\nThông tin khác	Selfie ngược sáng HDR, Tự động lấy nét, Quay video Full HD, Chế độ làm đẹp, Nhận diện khuôn mặt, Sticker AR (biểu tượng thực tế ảo), Quay video HD-\r\nHệ điều hành - CPU-\r\nHệ điều hành	Android 9.0 (Pie)-\r\nChipset (hãng SX CPU)	Exynos 9610 8 nhân 64-bit-\r\nTốc độ CPU	2.3 GHz-\r\nChip đồ họa (GPU)	Mali-G72 MP3-\r\nBộ nhớ & Lưu trữ-\r\nRAM	4 GB-\r\nBộ nhớ trong	64 GB-\r\nBộ nhớ còn lại (khả dụng)	Đang cập nhật-\r\nThẻ nhớ ngoài	MicroSD, hỗ trợ tối đa 512 GB-\r\nKết nối-\r\nMạng di động	3G, 4G LTE Cat 6-\r\nSIM	2 Nano SIM-\r\nWifi	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi Direct, Wi-Fi hotspot-\r\nGPS	BDS, A-GPS, GLONASS-\r\nBluetooth	LE, A2DP, v5.0-\r\nCổng kết nối/sạc	USB Type-C-\r\nJack tai nghe	3.5 mm-\r\nKết nối khác	Không-\r\nThiết kế & Trọng lượng-\r\nThiết kế	Nguyên khối-\r\nChất liệu	Nhựa-\r\nKích thước	Dài 158.5 mm - Ngang 74.7 mm - Dày 7.7 mm-\r\nTrọng lượng	166 g-\r\nThông tin pin & Sạc-\r\nDung lượng pin	4000 mAh-\r\nLoại pin	Pin chuẩn Li-Po-\r\nCông nghệ pin	Tiết kiệm pin, Siêu tiết kiệm pin, Sạc pin nhanh-\r\nTiện ích-\r\nBảo mật nâng cao	Mở khóa bằng khuôn mặt, Mở khoá vân tay dưới màn hình-\r\nTính năng đặc biệt	Nhân bản ứng dụng-\r\nDolby Audio™-\r\nĐèn pin-\r\nSạc pin nhanh-\r\nChặn cuộc gọi-\r\nChặn tin nhắn-\r\nMặt kính 2.5D-\r\nTrợ lý ảo Samsung Bixby-\r\nMàn hình luôn hiển thị AOD-\r\nGhi âm	Có, microphone chuyên dụng chống ồn-\r\nRadio	Có-\r\nXem phim	3GP, MP4, AVI, WMV-\r\nNghe nhạc	Midi, AMR, MP3, WAV, WMA, AAC, OGG, FLAC-\r\nThông tin khác-\r\nThời điểm ra mắt	03/2019-', 4, '2019-05-22 04:08:47'),
(7, 1, 2, '1558473044-samsung-galaxy-a9-2018-blue-400x460.png', 'Điện thoại Samsung Galaxy A9 (2018)', '8290000.00', 'Màn hình:	Super AMOLED, 6.3\", Full HD+-\r\nHệ điều hành:	Android 8.0 (Oreo)-\r\nCamera sau:	Chính 24 MP & Phụ 10 MP, 8 MP, 5 MP-\r\nCamera trước:	24 MP-\r\nCPU:	Qualcomm Snapdragon 660 8 nhân-\r\nRAM:	6 GB-\r\nBộ nhớ trong:	128 GB-\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 512 GB-\r\nThẻ SIM:\r\n2 Nano SIM, Hỗ trợ 4G-\r\nHOTSIM VIETTEL GÔGÔ 4G (3GB data/ tháng). Giá từ 150.000đ-\r\nDung lượng pin:	3800 mAh, có sạc nhanh-', 2, '2019-05-22 04:10:44'),
(8, 1, 2, '1558473103-samsung-galaxy-s10-white-400x460.png', 'Điện thoại Samsung Galaxy S10', '17990000.00', 'Màn hình:	Dynamic AMOLED, 6.1\", Quad HD+ (2K+)-\r\nHệ điều hành:	Android 9.0 (Pie)-\r\nCamera sau:	Chính 12 MP & Phụ 12 MP, 16 MP-\r\nCamera trước:	10 MP-\r\nCPU:	Exynos 9820 8 nhân 64-bit-\r\nRAM:	8 GB-\r\nBộ nhớ trong:	128 GB-\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 512 GB-\r\nThẻ SIM:\r\n2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G-\r\nHOTSIM VIETTEL GÔGÔ 4G (3GB data/ tháng). Giá từ 150.000đ-\r\nDung lượng pin:	3400 mAh, có sạc nhanh-', 3, '2019-05-22 04:11:43'),
(10, 1, 3, '1558624407-tai-nghe-bluetooth-samsung-mg900e-avatar-1-600x600.jpg', 'Tai nghe Bluetooth Samsung MG900E', '900000.00', 'Công nghệ chống ồn cho âm thanh trong trẻo và chất lượng.-\r\nĐệm tai nghe êm ái, dễ chịu khi sử dụng thời gian dài.-\r\nThời gian thoại lên đến 9 giờ, thời gian chờ lên đến 300 giờ.-\r\nThời gian sạc khoảng 2 giờ. Thời gian nghe nhạc có thể lên đến 8 giờ.-', 0, '2019-05-23 22:13:27'),
(11, 1, 3, '1558625248-tai-nghe-nhet-trong-samsung-eg920b-2-1-600x600.jpg', 'Tai nghe nhét trong Samsung EG920B', '300000.00', 'Các phím chức năng được tích hợp trên dây, thuận lợi cho người dùng.-\r\nMicro tích hợp có khả năng lọc tiếng ồn.-\r\nĐệm tai nghe êm ái, dễ chịu khi sử dụng thời gian dài.-\r\nDây dài 120 cm thoải mái để vừa dùng máy vừa nghe nhạc.-\r\nSản phẩm chính hãng Samsung.-\r\nSản phẩm chính hãng nguyên seal 100%.-', 1, '2019-05-23 22:27:28'),
(12, 1, 3, '1558625334-tai-nghe-bluetooth-samsung-level-u-pro-bn920c-avatar-1-600x600.jpg', 'Tai nghe Bluetooth Samsung Level U Pro BN920C', '1400000.00', 'Đệm tai được thiết kế mềm mại, linh hoạt.-\r\nCung cấp hơn 9 giờ nghe nhạc, 9 giờ đàm thoại và 300 giờ cho thời gian chờ.-\r\nChất lượng âm thanh tuyệt hảo nhờ công nghệ giảm tiếng ồn NR và EC.-\r\nKết nối nam châm giữa hai đầu tai nghe của Level U sẽ giữ tai nghe khi không sử dụng.-\r\nDung lượng pin 200mAh (lõi pin Li-ion). Thời gian sạc trung bình khoảng 2 giờ.-\r\nSản phẩm chính hãng Samsung.-', 1, '2019-05-23 22:28:54'),
(13, 9, 3, '1558625449-cap-lightning-2m-apple-md819-trang-1-1-600x600.jpg', 'Dây cáp Lightning 2 m Apple MD819', '690000.00', 'Dây dài lên đến 2 m thoải mái vừa sạc vừa dùng máy lúc cần thiết.-\r\nCổng lightning dùng cho dòng iPhone 5, iPad 4 trở lên.-\r\nDùng để chép dữ liệu hay sạc pin (dùng với adapter riêng).-\r\nSản phẩm chính hãng nguyên seal 100%.-\r\nLưu ý: Thanh toán trước khi mở seal.-', 0, '2019-05-23 22:30:49'),
(14, 9, 3, '1558625709-cap-lightning-2m-evalu-ltl-04-xanh-navi-avatar-1-600x600.jpg', 'Dây cáp Lightning 2 m eValu LTL-04', '150000.00', 'Dây dài lên đến 2 m thuận tiện khi sạc và dùng máy cách xa ổ điện.-\r\nCổng lightning dùng cho dòng iPhone 5, iPad 4 trở lên.-\r\nChất lượng tương đương với hàng chính hãng.-\r\nDùng để chép dữ liệu hay sạc pin (dùng với adapter riêng).-\r\nThân dây được bảo vệ bằng sợi nilon hạn chế đứt gãy, màu xanh đẹp mắt.-', 0, '2019-05-23 22:35:09'),
(15, 9, 2, '1558692596-iphone-xs-max-512gb-gold-400x460.png', 'Điện thoại iPhone Xs Max 512GB', '35000000.00', 'Màn hình-\r\nCông nghệ màn hình	OLED-\r\nĐộ phân giải	1242 x 2688 Pixels-\r\nMàn hình rộng	6.5\"-\r\nMặt kính cảm ứng	Kính oleophobic (ion cường lực)-\r\nCamera sau-\r\nĐộ phân giải	Chính 12 MP & Phụ 12 MP-\r\nQuay phim	Quay phim FullHD 1080p@30fps, Quay phim FullHD 1080p@60fps, Quay phim FullHD 1080p@120fps, Quay phim FullHD 1080p@240fps, Quay phim 4K 2160p@24fps, Quay phim 4K 2160p@30fps, Quay phim 4K 2160p@60fps\r\nĐèn Flash	4 đèn LED (2 tông màu)--\r\nChụp ảnh nâng cao	Chụp ảnh xóa phông, Chế độ Slow Motion, Điều chỉnh khẩu độ, Zoom quang học, Chế độ chụp ban đêm (ánh sáng yếu), A.I Camera, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS)-\r\nCamera trước-\r\nĐộ phân giải	7 MP-\r\nVideocall	Có-\r\nThông tin khác	Nhận diện khuôn mặt, Quay video Full HD, Camera góc rộng, Selfie ngược sáng HDR-\r\nHệ điều hành - CPU-\r\nHệ điều hành	iOS 12-\r\nChipset (hãng SX CPU)	Apple A12 Bionic 6 nhân-\r\nTốc độ CPU	2 nhân 2.5 GHz Vortex & 4 nhân 1.6 GHz Tempest-\r\nChip đồ họa (GPU)	Apple GPU 4 nhân-\r\nBộ nhớ & Lưu trữ-\r\nRAM	4 GB-\r\nBộ nhớ trong	512 GB-\r\nBộ nhớ còn lại (khả dụng)	Khoảng 505 GB-\r\nThẻ nhớ ngoài	Không-\r\nKết nối-\r\nMạng di động	Hỗ trợ 4G-\r\nSIM	Nano SIM & eSIM-\r\nWifi	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi hotspot-\r\nGPS	A-GPS, GLONASS-\r\nBluetooth	LE, A2DP, v5.0-\r\nCổng kết nối/sạc	Lightning-\r\nJack tai nghe	Lightning-\r\nKết nối khác	NFC, OTG-\r\nThiết kế & Trọng lượng-\r\nThiết kế	Nguyên khối-\r\nChất liệu	Khung thép không gỉ + mặt kính cường lực-\r\nKích thước	Dài 157.5 mm - Ngang 77.4 mm - Dày 7.7 mm-\r\nTrọng lượng	208 g-\r\nThông tin pin & Sạc-\r\nDung lượng pin	3174 mAh-\r\nLoại pin	Pin chuẩn Li-Ion-\r\nCông nghệ pin	Tiết kiệm pin, Sạc pin nhanh, Sạc pin không dây-\r\nTiện ích-\r\nBảo mật nâng cao	Nhận diện khuôn mặt Face ID-\r\nTính năng đặc biệt	3D Touch-\r\nChuẩn Kháng nước, Chuẩn kháng bụi-\r\nSạc pin nhanh-\r\nApple Pay-\r\nGhi âm	Có, microphone chuyên dụng chống ồn-\r\nRadio	Không-\r\nXem phim	H.265, 3GP, MP4, AVI, WMV, H.263, H.264(MPEG4-AVC)-\r\nNghe nhạc	Lossless, Midi, MP3, WAV, WMA9, WMA, AAC, AAC+, AAC++, eAAC+-\r\nThông tin khác-\r\nThời điểm ra mắt	11/2018-', 2, '2019-05-24 17:09:56'),
(16, 9, 2, '1558694208-iphone-x-256gb-h2-400x460.png', 'Điện thoại iPhone X 256GB', '20990000.00', 'Màn hình-\r\nCông nghệ màn hình	OLED-\r\nĐộ phân giải	1125 x 2436 Pixels-\r\nMàn hình rộng	5.8\"-\r\nMặt kính cảm ứng	Kính oleophobic (ion cường lực)-\r\nCamera sau-\r\nĐộ phân giải	Chính 12 MP & Phụ 12 MP-\r\nQuay phim	Quay phim 4K 2160p@60fps-\r\nĐèn Flash	4 đèn LED (2 tông màu)-\r\nChụp ảnh nâng cao	Lấy nét dự đoán, Chụp- ảnh xóa phông, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS)-\r\nCamera trước-\r\nĐộ phân giải	7 MP-\r\nVideocall	Có-\r\nThông tin khác	Selfie ngược sáng HDR, Camera góc rộng, Nhận diện khuôn mặt, Quay video Full HD-\r\nHệ điều hành - CPU-\r\nHệ điều hành	iOS 12-\r\nChipset (hãng SX CPU)	Apple A11 Bionic 6 nhân-\r\nTốc độ CPU	2.39 GHz-\r\nChip đồ họa (GPU)	Apple GPU 3 nhân-\r\nBộ nhớ & Lưu trữ-\r\nRAM	3 GB-\r\nBộ nhớ trong	256 GB-\r\nBộ nhớ còn lại (khả dụng)	Khoảng 249 GB-\r\nThẻ nhớ ngoài	Không-', 0, '2019-05-24 17:36:48'),
(17, 9, 2, '1558694296-iphone-xr-128gb-red-400x460.png', 'Điện thoại iPhone Xr 128GB', '17990000.00', 'Màn hình-\r\nCông nghệ màn hình	IPS LCD-\r\nĐộ phân giải	828 x 1792 Pixels-\r\nMàn hình rộng	6.1\"-\r\nMặt kính cảm ứng	Kính oleophobic (ion cường lực)-\r\nCamera sau-\r\nĐộ phân giải	12 MP-\r\nQuay phim	Quay phim FullHD 1080p@30fps, Quay phim FullHD 1080p@60fps, Quay phim FullHD 1080p@120fps, Quay phim FullHD 1080p@240fps, Quay phim 4K 2160p@24fps, Quay phim 4K 2160p@30fps, Quay phim 4K 2160p@60fps-\r\nĐèn Flash	4 đèn LED (2 tông màu)-\r\nChụp ảnh nâng cao	Chế độ Slow Motion, Chế độ chụp ban đêm (ánh sáng yếu), A.I Camera, Điều chỉnh khẩu độ, Lấy nét dự đoán, Chụp ảnh xóa phông, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS)-\r\nCamera trước-\r\nĐộ phân giải	7 MP-\r\nVideocall	Có-\r\nThông tin khác	Selfie ngược sáng HDR, Camera góc rộng, Quay video Full HD, Nhận diện khuôn mặt-', 1, '2019-05-24 17:38:16'),
(18, 1, 2, '1558694414-samsung-galaxy-note8-black-400x460.png', 'Điện thoại Samsung Galaxy Note 8', '11990000.00', 'Màn hình-\r\nCông nghệ màn hình	Super AMOLED-\r\nĐộ phân giải	2K+ (1440 x 2960 Pixels)-\r\nMàn hình rộng	6.3\"-\r\nMặt kính cảm ứng	Corning Gorilla Glass 5-\r\nCamera sau-\r\nĐộ phân giải	Chính 12 MP & Phụ 12 MP-\r\nQuay phim	Quay phim 4K 2160p@30fps-\r\nĐèn Flash	Có-\r\nChụp ảnh nâng cao	Chụp ảnh xóa phông, Zoom quang học, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS), Chế độ chụp chuyên nghiệp (Pro)-\r\nCamera trước-\r\nĐộ phân giải	8 MP-\r\nVideocall	Có-\r\nThông tin khác	Selfie ngược sáng HDR, Camera góc rộng, Chế độ làm đẹp, Nhận diện khuôn mặt, Chụp bằng giọng nói, Selfie bằng cử chỉ-\r\nHệ điều hành - CPU-\r\nHệ điều hành	Android 7.1 (Nougat)-\r\nChipset (hãng SX CPU)	Exynos 8895 8 nhân 64-bit-\r\nTốc độ CPU	4 nhân 2.3 GHz và 4 nhân 1.7 GHz-\r\nChip đồ họa (GPU)	Mali-G71 MP20-\r\nBộ nhớ & Lưu trữ-\r\nRAM	6 GB-\r\nBộ nhớ trong	64 GB-\r\nBộ nhớ còn lại (khả dụng)	Khoảng 50 GB-\r\nThẻ nhớ ngoài	MicroSD, hỗ trợ tối đa 256 GB-', 1, '2019-05-24 17:40:14'),
(19, 1, 4, '1558702699-bo-vo-Galaxy-C9-C9-Pro-N).png', ' Bộ vỏ Galaxy C9/C9 Pro màu đen, vàng, hồng', '400000.00', 'Bộ vỏ Galaxy C9/C9 Pro Chiếm Tài Mobile cung cấp bao gồm các màu đen, vàng, hồng đáp ứng được đa dạng dòng máy của khách hàng. Bộ vỏ thay thế Samsung Galaxy C9 và C9 Pro bao gồm các phần như nắp lưng, kính camera sau, nút nguồn, nút volume, cụm chuông. Chính vì vậy sau khi mua về khách hàng có thể lắp máy và sử dụng được ngay.', 0, '2019-05-24 19:58:19'),
(20, 1, 4, '1558702762-main-zin-thao-may-Galaxy-S8-N.png', ' Main bản Hàn Quốc Samsung Galaxy S8 / G950N', '2500000.00', '', 0, '2019-05-24 19:59:22'),
(21, 1, 4, '1558702835-pin-Samsung-EB-BC900ABE-N.png', ' Pin Samsung C9/C9 Pro EB-BC900ABE 4000mAh', '250000.00', 'Pin Samsung C9/C9 Pro EB-BC900ABE 4000mAh do Chiếm Tài Mobile cung cấp là một trong những linh kiện chất lượng nhất, nhập trực tiếp từ nhà sản xuất linh kiện uy tín nhất. Với dung lượng pin 4000mAh, khi thay lắp pin vào máy sẽ đảm bảo hoạt động tốt ổn định.', 0, '2019-05-24 20:00:35'),
(22, 9, 4, '1558703106-man-zin-may-apple-watch-series-1-38mm-(2)-N_x202-ft.jpg', ' Màn hình Apple Watch series 2 38mm full nguyên bộ', '2500000.00', 'Màn hình zin Apple Watch series 2 38mm là màn hình full nguyên bộ tháo máy chất lượng.', 0, '2019-05-24 20:05:06'),
(23, 1, 2, '1558703307-samsung-galaxy-note-9-black-400x460-400x460.png', 'Điện thoại Samsung Galaxy Note 9', '18990000.00', 'Màn hình-\r\nCông nghệ màn hình	Super AMOLED-\r\nĐộ phân giải	2K+ (1440 x 2960 Pixels)-\r\nMàn hình rộng	6.4\"-\r\nMặt kính cảm ứng	Corning Gorilla Glass 5-\r\nCamera sau-\r\nĐộ phân giải	Chính 12 MP & Phụ 12 MP-\r\nQuay phim	Quay phim siêu chậm 960 fps, Quay phim FullHD 1080p@240fps, Quay phim 4K 2160p@60fps-\r\nĐèn Flash	Có-\r\nChụp ảnh nâng cao	Zoom quang học, Chụp ảnh xóa phông, Chế độ Slow Motion, A.I Camera, Điều chỉnh khẩu độ, Super Slow Motion (quay siêu chậm), Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS), Làm đẹp (Beautify), Chế độ chụp chuyên nghiệp (Pro)-\r\nCamera trước-\r\nĐộ phân giải	8 MP-\r\nVideocall	Hỗ trợ VideoCall thông qua ứng dụng-\r\nThông tin khác	Camera góc rộng, Tự động lấy nét, Quay video Full HD, Chế độ làm đẹp, Nhận diện khuôn mặt-\r\nHệ điều hành - CPU-\r\nHệ điều hành	Android 8.1 (Oreo)\r\nChipset (hãng SX CPU)	Exynos 9810 8 nhâ-n 64-bit-\r\nTốc độ CPU	4 nhân 2.7 GHz và 4 nhân 1.7 GHz-\r\nChip đồ họa (GPU)	Mali-G72 MP18-\r\nBộ nhớ & Lưu trữ-\r\nRAM	6 GB-\r\nBộ nhớ trong	128 GB-\r\nBộ nhớ còn lại (khả dụng)	Khoảng 109 GB-\r\nThẻ nhớ ngoài	MicroSD, hỗ trợ tối đa 512 GB-', 1, '2019-05-24 20:08:27'),
(24, 1, 2, '1558703440-samsung-galaxy-s9-plus-64gb-vang-do-400x460.png', 'Điện thoại Samsung Galaxy S9+ 64GB Vang Đỏ', '17990000.00', 'Màn hình-\r\nCông nghệ màn hình	Super AMOLED-\r\nĐộ phân giải	2K+ (1440 x 2960 Pixels)-\r\nMàn hình rộng	6.2\"-\r\nMặt kính cảm ứng	Corning Gorilla Glass 5-\r\nCamera sau-\r\nĐộ phân giải	Chính 12 MP & Phụ 12 MP-\r\nQuay phim	Quay phim siêu chậm 960 fps, Quay phim FullHD 1080p@60fps, Quay phim 4K 2160p@60fps-\r\nĐèn Flash	Có-\r\nChụp ảnh nâng cao	Zoom quang học, Chế độ chụp ban đêm (ánh sáng yếu), Super Slow Motion (quay siêu chậm), Điều chỉnh khẩu độ, Chụp ảnh xóa phông, Tự động lấy nét, Chạm lấy nét, HDR, Panorama, Chống rung quang học (OIS), Ảnh GIF-\r\nCamera trước-\r\nĐộ phân giải	8 MP-\r\nVideocall	Có-\r\nThông tin khác	Selfie ngược sáng HDR, Camera góc rộng, Tự động lấy nét, Quay video Full HD, Chế độ làm đẹp, Nhận diện khuôn mặt, Chụp bằng giọng nói, Selfie bằng cử chỉ, Tự động chụp khi nhận diện nụ cười-', 0, '2019-05-24 20:10:40'),
(25, 9, 2, '1558703741-iphone-7-plus-gold-400x460.png', 'Điện thoại iPhone 7 Plus 32GB', '12990000.00', 'Màn hình-\r\nCông nghệ màn hình	LED-backlit IPS LCD-\r\nĐộ phân giải	Full HD (1080 x 1920 Pixels)-\r\nMàn hình rộng	5.5\"-\r\nMặt kính cảm ứng	Kính oleophobic (ion cường lực)-\r\nCamera sau-\r\nĐộ phân giải	Chính 12 MP & Phụ 12 MP-\r\nQuay phim	Quay phim 4K 2160p@30fps-\r\nĐèn Flash	4 đèn LED (2 tông màu)-\r\nChụp ảnh nâng cao	Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS)-\r\nCamera trước-\r\nĐộ phân giải	7 MP-\r\nVideocall	Hỗ trợ VideoCall thông qua ứng dụng-\r\nThông tin khác	Selfie ngược sáng HDR, Tự động lấy nét, Quay video Full HD, Retina Flash, Nhận diện khuôn mặt-', 0, '2019-05-24 20:15:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id_slide` int(11) NOT NULL,
  `id_type` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id_slide`, `id_type`, `image`, `create_time`) VALUES
(5, 2, '1558283952-aaaaa.png', '2019-05-19 23:39:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `nametype` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `types`
--

INSERT INTO `types` (`id`, `nametype`) VALUES
(2, 'ĐIỆN THOẠI'),
(3, 'PHỤ KIỆN'),
(4, 'LINH KIỆN');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cate`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id_feed`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_product` (`id_product`) USING BTREE;

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id_odt`),
  ADD KEY `id_order` (`id_order`) USING BTREE;

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_type` (`id_type`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id_slide`),
  ADD KEY `id_type` (`id_type`);

--
-- Chỉ mục cho bảng `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id_feed` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id_odt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_pro`),
  ADD CONSTRAINT `feedbacks_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `id_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_cate`),
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `types` (`id`);

--
-- Các ràng buộc cho bảng `slides`
--
ALTER TABLE `slides`
  ADD CONSTRAINT `id_type` FOREIGN KEY (`id_type`) REFERENCES `types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
