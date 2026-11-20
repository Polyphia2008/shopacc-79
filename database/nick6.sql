-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 16, 2026 lúc 07:55 PM
-- Phiên bản máy phục vụ: 10.11.14-MariaDB-cll-lve
-- Phiên bản PHP: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `randomsieuxin_test11`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `groups` varchar(255) DEFAULT NULL,
  `account` text DEFAULT NULL,
  `chitiet` text DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `listimg` longtext DEFAULT NULL,
  `sale` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `groups`, `account`, `chitiet`, `createdate`, `updatedate`, `username`, `receiver`, `time`, `title`, `img`, `money`, `listimg`, `sale`) VALUES
(14, '71', 'ádasđa', 'ádadsd', '2025-11-23 10:21:22', NULL, NULL, NULL, NULL, NULL, '/assets/storage/images/Accounts_Z70CX6F3ARLT.png', 1142442, '/assets/storage/images/account_C7JLG4.png', 'SHOW'),
(15, '66', 's', 's', '2026-01-16 18:15:45', '2026-01-16 18:16:48', 'admin', 'admin', '1768562208', NULL, 's', 22, 's', NULL),
(16, '66', 'qưedqda', 'ăddaa', '2026-01-16 18:23:48', NULL, NULL, NULL, NULL, NULL, '', 111, '\nassets/storage/images/account_WTU8ID.png', 'SHOW');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bank_auto`
--

CREATE TABLE `bank_auto` (
  `id` int(11) NOT NULL,
  `tid` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `amount` int(11) DEFAULT 0,
  `cusum_balance` int(11) DEFAULT 0,
  `time` datetime DEFAULT NULL,
  `bank_sub_acc_id` varchar(64) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `bank_auto`
--

INSERT INTO `bank_auto` (`id`, `tid`, `description`, `amount`, `cusum_balance`, `time`, `bank_sub_acc_id`, `username`) VALUES
(1, '13062025202357', '', 10000, 0, '2025-06-13 20:29:04', NULL, 'Admin'),
(2, '13062025203648', '', 10000, 0, '2025-06-13 20:36:50', NULL, 'Admin'),
(3, '13062025224828', '', 10100, 0, '2025-06-13 22:48:47', NULL, 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `thoigian` varchar(255) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `time`, `thoigian`, `view`, `img`, `display`) VALUES
(5, 'SCAMsad', '<p>&aacute;dadsasd&aacute;d</p>\r\n', '2025-11-17 20:41:45', '1763386905', 19, 'https://localhost/assets/storage/images/SCAM_47.png', 'SHOW'),
(7, 'SCAMsad', '<p>&aacute;dadsasd&aacute;d</p>\r\n', '2025-11-17 20:41:45', '1763386905', 23, 'https://localhost/assets/storage/images/SCAM_47.png', 'SHOW');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `boxtype`
--

CREATE TABLE `boxtype` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `boxtype`
--

INSERT INTO `boxtype` (`id`, `link`, `image_url`, `description`) VALUES
(23, 'https://zalo.me/0355861031', 'https://i.imgur.com/TGl4IIV.png', 'TOPIE.NET'),
(24, 'https://zalo.me/0355861031', 'https://i.imgur.com/TGl4IIV.png', 'TOPIE.NET'),
(25, 'https://zalo.me/0355861031', 'https://i.imgur.com/TGl4IIV.png', 'TOPIE.NET'),
(26, 'https://zalo.me/0355861031', 'https://i.imgur.com/TGl4IIV.png', 'TOPIE.NET'),
(27, 'https://zalo.me/0355861031', 'https://i.imgur.com/TGl4IIV.png', 'TOPIE.NET'),
(28, 'https://zalo.me/0355861031', 'https://i.imgur.com/TGl4IIV.png', 'TOPIE.NET'),
(29, 'https://zalo.me/0355861031', 'https://i.imgur.com/TGl4IIV.png', 'TOPIE.NET'),
(30, 'https://zalo.me/0355861031', 'https://i.imgur.com/TGl4IIV.png', 'TOPIE.NET'),
(48, 'https://zalo.me/0355861031', 'https://i.imgur.com/TGl4IIV.png', 'TOPIE.NET'),
(49, 'https://zalo.me/0355861031', 'https://i.imgur.com/TGl4IIV.png', 'TOPIE.NET'),
(50, 'https://zalo.me/0355861031', 'https://i.imgur.com/TGl4IIV.png', 'TOPIE.NET'),
(51, 'https://zalo.me/0355861031', 'https://i.imgur.com/TGl4IIV.png', 'TOPIE.NET'),
(52, 'https://zalo.me/0355861031', 'https://i.imgur.com/bvMZtq7.png', 'Steal A Brainrot'),
(53, 'https://zalo.me/0355861031', 'https://cdn3.upanh.info/upload/server-sw3/images/brainrot.png', 'Plants Vs Brainrots'),
(54, 'https://zalo.me/0355861031', 'https://i.imgur.com/TGl4IIV.png', 'TOPIE.NET'),
(55, 'https://zalo.me/0355861031', 'https://i.imgur.com/TGl4IIV.png', 'TOPIE.NET');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `code` varchar(32) DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `loaithe` varchar(32) NOT NULL,
  `menhgia` int(11) NOT NULL,
  `thucnhan` int(11) DEFAULT 0,
  `seri` text NOT NULL,
  `pin` text NOT NULL,
  `createdate` datetime NOT NULL,
  `status` varchar(32) NOT NULL,
  `note` text NOT NULL,
  `deletedate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `cards`
--

INSERT INTO `cards` (`id`, `code`, `username`, `loaithe`, `menhgia`, `thucnhan`, `seri`, `pin`, `createdate`, `status`, `note`, `deletedate`) VALUES
(1, 'V123', 'admin', 'Viettel', 100000, 90000, 'SERI001', 'PIN001', '2025-11-22 10:00:00', 'thanhcong', '', NULL),
(2, 'M456', 'test1', 'Mobifone', 200000, 180000, 'SERI002', 'PIN002', '2025-11-02 11:00:00', 'thanhcong', '', NULL),
(3, 'V789', 'test1', 'VinaPhone', 50000, 45000, 'SERI003', 'PIN003', '2025-11-03 12:00:00', 'xuly', '', NULL),
(4, 'G101', 'user4', 'Garena', 100000, 95000, 'SERI004', 'PIN004', '2025-11-04 13:00:00', 'thatbai', 'Th? l?i', NULL),
(5, 'V102', 'user5', 'Viettel', 50000, 45000, 'SERI005', 'PIN005', '2025-11-05 14:00:00', 'thanhcong', '', NULL),
(6, 'M103', 'user6', 'Mobifone', 100000, 90000, 'SERI006', 'PIN006', '2025-11-06 15:00:00', 'thanhcong', '', NULL),
(7, 'G104', 'user7', 'Garena', 200000, 190000, 'SERI007', 'PIN007', '2025-11-07 16:00:00', 'thanhcong', '', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_caythue`
--

CREATE TABLE `category_caythue` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `luuy` longtext DEFAULT NULL,
  `danhmuc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `category_caythue`
--

INSERT INTO `category_caythue` (`id`, `title`, `display`, `img`, `luuy`, `danhmuc`) VALUES
(8, 'CÀY THUÊ GIÁ RẺ', 'SHOW', 'https://i.imgur.com/W1lvlwi.gif', '<p>s</p>\r\n', '36'),
(9, 'CÀY THUÊ GIÁ RẺ', 'SHOW', 'https://i.imgur.com/W1lvlwi.gif', '<p>s</p>\r\n', '36'),
(11, 'CÀY THUÊ GIÁ RẺ', 'SHOW', 'https://i.imgur.com/W1lvlwi.gif', '<p>s</p>\r\n', '36'),
(12, 'CÀY THUÊ GIÁ RẺ', 'SHOW', 'https://i.imgur.com/W1lvlwi.gif', '<p>s</p>\r\n', '36'),
(13, 'CÀY THUÊ GIÁ RẺ', 'SHOW', 'https://i.imgur.com/W1lvlwi.gif', '<p>s</p>\r\n', '36'),
(14, 'CÀY THUÊ GIÁ RẺ', 'SHOW', 'https://i.imgur.com/W1lvlwi.gif', '<p>s</p>\r\n', '36'),
(15, 'CÀY THUÊ GIÁ RẺ', 'SHOW', 'https://i.imgur.com/W1lvlwi.gif', '<p>s</p>\r\n', '36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_gamepass`
--

CREATE TABLE `category_gamepass` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `luuy` longtext DEFAULT NULL,
  `danhmuc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `category_gamepass`
--

INSERT INTO `category_gamepass` (`id`, `title`, `display`, `img`, `luuy`, `danhmuc`) VALUES
(14, 'ádad', 'SHOW', 'https://i.imgur.com/ngMceGs.jpeg', '<p>ưdad</p>\r\n', '37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_robux`
--

CREATE TABLE `category_robux` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `luuy` longtext DEFAULT NULL,
  `danhmuc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `category_robux`
--

INSERT INTO `category_robux` (`id`, `title`, `display`, `img`, `luuy`, `danhmuc`) VALUES
(10, 'ROBUX 120H', 'SHOW', 'https://i.imgur.com/DwK3aUG.png', '<h3><strong><em><u><strong>*ROBUX RẺ HƠN ROBUX CH&Iacute;NH H&Atilde;NG, DUYỆT SI&Ecirc;U TỐC*</strong></u></em></strong></h3>\r\n\r\n<p><strong><strong>_C&Oacute;&nbsp;BOT&nbsp;DUYỆT AUTO&nbsp;ĐƠN ROBUX 120H, AUTO&nbsp;TẠO GAMEPASS, ANH EM CHỈ CẦN CHỌN MUA C&Ograve;N LẠI SHOP LO.</strong></strong></p>\r\n\r\n<p><strong><strong>_ANH EM LƯU &Yacute; NHẬP Đ&Uacute;NG&nbsp;T&Agrave;I KHOẢN V&Agrave; MẬT KHẨU, TẮT&nbsp;C&Aacute;C BIỆN PH&Aacute;P BẢO MẬT 2 BƯỚC&nbsp;ĐỂ BOT L&Agrave;M KH&Ocirc;NG BỊ LỖI</strong></strong></p>\r\n\r\n<p><strong><strong>_ROBUX 120H&nbsp;C&Oacute; NGHĨA L&Agrave;&nbsp;ROBUX&nbsp;SẼ VỀ ACC SAU&nbsp;120H TỨC L&Agrave; 5 NG&Agrave;Y!!!</strong></strong></p>\r\n\r\n<p><strong><strong>_DUYỆT&nbsp;SI&Ecirc;U TỐC, BOT&nbsp;<u><em>ĐỘC QUYỀN</em></u>&nbsp;CỦA SHOP, ANH EM Y&Ecirc;N T&Acirc;M !!!</strong></strong></p>\r\n\r\n<p><strong><strong>_ANH EM ĐỂ PHẦN LINK L&Agrave; &quot;BOT120HDUYETAUTO&quot;, ĐỂ TK MK Ở PHẦN GHI CH&Uacute; THEO ĐỊNH DẠNG : TK:MK</strong></strong></p>\r\n\r\n<p><strong><strong>_GI&Aacute; ROBUX HIỂN THỊ L&Agrave; Đ&Atilde; TRỪ THUẾ, ĐẶT BAO NHI&Ecirc;U NHẬN BẤY NHI&Ecirc;U NHA ANH EM!!!</strong></strong></p>\r\n\r\n<p><strong><strong>_KHI ĐƠN ĐỂ&nbsp;TH&Agrave;NH C&Ocirc;NG&nbsp;C&Oacute; NGHĨA L&Agrave;&nbsp;5 NG&Agrave;Y&nbsp;SAU&nbsp;ROBUX SẼ VỀ ACC&nbsp;NH&Eacute; ANH EM</strong></strong></p>\r\n', '38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_robux120h`
--

CREATE TABLE `category_robux120h` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `luuy` longtext NOT NULL,
  `loai` varchar(255) DEFAULT NULL,
  `danhmuc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc_tai_khoan`
--

CREATE TABLE `danh_muc_tai_khoan` (
  `id` int(11) NOT NULL,
  `danhmuc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `noidung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc_tai_khoan`
--

INSERT INTO `danh_muc_tai_khoan` (`id`, `danhmuc`, `name`, `noidung`, `status`) VALUES
(35, 'account', 'Account Blox Fruits', 'd', 'ON'),
(36, 'dichvu', 'Robux Giá Rẻ', 'ădad', 'ON'),
(37, 'vatpham', 'Săn Vật Phẩm Cực Hot', 'ădawd', 'ON'),
(38, 'robux', 'Dịch Vụ Roblox Khác', '', 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dongtien`
--

CREATE TABLE `dongtien` (
  `id` int(11) NOT NULL,
  `sotientruoc` int(11) DEFAULT NULL,
  `sotienthaydoi` int(11) DEFAULT NULL,
  `sotiensau` int(11) DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `dongtien`
--

INSERT INTO `dongtien` (`id`, `sotientruoc`, `sotienthaydoi`, `sotiensau`, `thoigian`, `noidung`, `username`) VALUES
(17, 10020000, 20000, 10000000, '2025-11-09 08:22:54', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(18, 10000000, 20000, 9980000, '2025-11-09 08:30:19', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(19, 9980000, 20000, 9960000, '2025-11-09 08:30:20', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(20, 9960000, 20000, 9940000, '2025-11-09 08:33:43', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(21, 9940000, 20000, 9920000, '2025-11-09 08:34:29', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(22, 9920000, 20000, 9900000, '2025-11-09 08:34:49', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(23, 9900000, 20000, 9880000, '2025-11-09 08:41:02', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(24, 9880000, 20000, 9860000, '2025-11-09 08:41:15', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(25, 9860000, 20000, 9840000, '2025-11-09 08:41:52', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(26, 9820000, 20000, 9800000, '2025-11-09 10:18:33', 'Chơi MiniGame Lật Thẻ', 'admin'),
(27, 9800000, 20000, 9780000, '2025-11-09 10:24:02', 'Chơi MiniGame Lật Thẻ', 'admin'),
(28, 9780000, 0, 9780000, '2025-11-09 10:28:05', 'Chơi MiniGame Lật Thẻ', 'admin'),
(29, 9780000, 0, 9780000, '2025-11-09 10:29:05', 'Chơi MiniGame Lật Thẻ', 'admin'),
(30, 9780000, 0, 9780000, '2025-11-09 10:29:28', 'Chơi MiniGame Lật Thẻ', 'admin'),
(31, 9780000, 0, 9780000, '2025-11-09 10:29:49', 'Chơi MiniGame Lật Thẻ', 'admin'),
(32, 9780000, 0, 9780000, '2025-11-09 10:29:53', 'Chơi MiniGame Lật Thẻ', 'admin'),
(33, 9780000, 0, 9780000, '2025-11-09 10:31:06', 'Chơi MiniGame Lật Thẻ', 'admin'),
(34, 9780000, 0, 9780000, '2025-11-09 10:31:32', 'Chơi MiniGame Lật Thẻ', 'admin'),
(35, 9780000, 20000, 9760000, '2025-11-09 10:38:43', 'Chơi MiniGame Lật Thẻ', 'admin'),
(36, 9760000, 20000, 9740000, '2025-11-09 10:40:48', 'Chơi MiniGame Lật Thẻ', 'admin'),
(37, 9740000, 20000, 9720000, '2025-11-09 12:55:51', 'Chơi MiniGame Lật Thẻ', 'admin'),
(38, 9720000, 20000, 9700000, '2025-11-09 12:57:44', 'Chơi MiniGame Lật Thẻ', 'admin'),
(39, 9700000, 20000, 9680000, '2025-11-09 12:58:07', 'Chơi MiniGame Lật Thẻ', 'admin'),
(40, 9680000, 20000, 9660000, '2025-11-09 13:03:52', 'Chơi MiniGame Lật Thẻ', 'admin'),
(41, 9660000, 20000, 9640000, '2025-11-09 13:03:52', 'Chơi MiniGame Lật Thẻ', 'admin'),
(42, 9640000, 20000, 9620000, '2025-11-09 13:05:00', 'Chơi MiniGame Lật Thẻ', 'admin'),
(43, 9620000, 20000, 9600000, '2025-11-09 13:05:00', 'Chơi MiniGame Lật Thẻ', 'admin'),
(44, 9600000, 20000, 9580000, '2025-11-09 13:07:33', 'Chơi MiniGame Lật Thẻ', 'admin'),
(45, 9580000, 20000, 9560000, '2025-11-09 13:07:37', 'Chơi MiniGame Lật Thẻ', 'admin'),
(46, 9560000, 20000, 9540000, '2025-11-09 13:07:39', 'Chơi MiniGame Lật Thẻ', 'admin'),
(47, 9540000, 20000, 9520000, '2025-11-09 13:08:00', 'Chơi MiniGame Lật Thẻ', 'admin'),
(48, 9520000, 20000, 9500000, '2025-11-09 13:08:01', 'Chơi MiniGame Lật Thẻ', 'admin'),
(49, 9500000, 20000, 9480000, '2025-11-09 13:09:48', 'Chơi MiniGame Lật Thẻ', 'admin'),
(50, 9480000, 20000, 9460000, '2025-11-09 13:10:02', 'Chơi MiniGame Lật Thẻ', 'admin'),
(51, 9460000, 20000, 9440000, '2025-11-09 13:12:04', 'Chơi MiniGame Lật Thẻ', 'admin'),
(52, 9440000, 20000, 9420000, '2025-11-09 13:12:05', 'Chơi MiniGame Lật Thẻ', 'admin'),
(53, 9420000, 20000, 9400000, '2025-11-09 13:12:07', 'Chơi MiniGame Lật Thẻ', 'admin'),
(54, 9400000, 20000, 9380000, '2025-11-09 13:12:09', 'Chơi MiniGame Lật Thẻ', 'admin'),
(55, 9380000, 20000, 9360000, '2025-11-09 13:12:18', 'Chơi MiniGame Lật Thẻ', 'admin'),
(56, 9360000, 20000, 9340000, '2025-11-09 13:13:48', 'Chơi MiniGame Lật Thẻ', 'admin'),
(57, 9340000, 20000, 9320000, '2025-11-09 13:21:26', 'Chơi MiniGame Lật Thẻ', 'admin'),
(58, 9320000, 20000, 9300000, '2025-11-09 13:21:35', 'Chơi MiniGame Lật Thẻ', 'admin'),
(59, 9300000, 20000, 9280000, '2025-11-09 13:22:35', 'Chơi MiniGame Lật Thẻ', 'admin'),
(60, 9280000, 20000, 9260000, '2025-11-09 13:23:09', 'Chơi MiniGame Lật Thẻ', 'admin'),
(61, 9260000, 20000, 9240000, '2025-11-09 13:28:54', 'Chơi MiniGame Lật Thẻ', 'admin'),
(62, 9240000, 20000, 9220000, '2025-11-09 13:31:23', 'Chơi MiniGame Lật Thẻ', 'admin'),
(63, 9220000, 20000, 9200000, '2025-11-09 13:31:56', 'Chơi MiniGame Lật Thẻ', 'admin'),
(64, 9200000, 20000, 9180000, '2025-11-09 13:33:31', 'Chơi MiniGame Lật Thẻ', 'admin'),
(65, 9180000, 20000, 9160000, '2025-11-09 13:34:43', 'Chơi MiniGame Lật Thẻ', 'admin'),
(66, 9160000, 20000, 9140000, '2025-11-09 13:35:55', 'Chơi MiniGame Lật Thẻ', 'admin'),
(67, 9140000, 20000, 9120000, '2025-11-09 13:36:37', 'Chơi MiniGame Lật Thẻ', 'admin'),
(68, 9120000, 20000, 9100000, '2025-11-09 13:37:17', 'Chơi MiniGame Lật Thẻ', 'admin'),
(69, 9100000, 20000, 9080000, '2025-11-09 13:37:41', 'Chơi MiniGame Lật Thẻ', 'admin'),
(70, 9080000, 20000, 9060000, '2025-11-09 13:38:46', 'Chơi MiniGame Lật Thẻ', 'admin'),
(71, 9060000, 20000, 9040000, '2025-11-09 13:43:44', 'Chơi MiniGame Lật Thẻ', 'admin'),
(72, 9040000, 20000, 9020000, '2025-11-09 13:53:35', 'Chơi MiniGame Lật Thẻ', 'admin'),
(73, 9020000, 20000, 9000000, '2025-11-09 13:54:32', 'Chơi MiniGame Lật Thẻ', 'admin'),
(74, 9000000, 20000, 8980000, '2025-11-09 13:54:53', 'Chơi MiniGame Lật Thẻ', 'admin'),
(75, 9000000, 20000, 8980000, '2025-11-09 13:57:36', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(76, 8980000, 20000, 8960000, '2025-11-09 13:57:36', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(77, 8960000, 20000, 8940000, '2025-11-09 13:57:53', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(78, 8940000, 20000, 8920000, '2025-11-09 13:57:53', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(79, 8920000, 20000, 8900000, '2025-11-09 13:58:17', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(80, 8900000, 20000, 8880000, '2025-11-09 13:58:18', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(81, 8880000, 20000, 8860000, '2025-11-09 13:58:36', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(82, 8860000, 20000, 8840000, '2025-11-09 13:58:36', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(83, 8840000, 20000, 8820000, '2025-11-09 13:58:44', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(84, 8820000, 20000, 8800000, '2025-11-09 13:58:44', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(85, 8800000, 20000, 8780000, '2025-11-09 13:58:53', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(86, 8780000, 20000, 8760000, '2025-11-09 13:58:53', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(87, 8740000, 20000, 8720000, '2025-11-09 13:59:18', 'Chơi MiniGame Lật Thẻ', 'admin'),
(88, 8720000, 20000, 8700000, '2025-11-09 14:04:46', 'Chơi MiniGame Lật Thẻ', 'admin'),
(89, 8700000, 20000, 8680000, '2025-11-09 14:17:47', 'Chơi MiniGame Lật Thẻ', 'admin'),
(90, 8680000, 20000, 8660000, '2025-11-09 14:18:00', 'Chơi MiniGame Lật Thẻ', 'admin'),
(91, 8660000, 20000, 8640000, '2025-11-09 14:18:19', 'Chơi MiniGame Lật Thẻ', 'admin'),
(92, 8640000, 20000, 8620000, '2025-11-09 14:18:51', 'Chơi MiniGame Lật Thẻ', 'admin'),
(93, 8620000, 20000, 8600000, '2025-11-09 14:19:11', 'Chơi MiniGame Lật Thẻ', 'admin'),
(94, 8600000, 20000, 8580000, '2025-11-09 14:35:44', 'Chơi MiniGame Lật Thẻ', 'admin'),
(95, 8580000, 20000, 8560000, '2025-11-09 14:36:26', 'Chơi MiniGame Lật Thẻ', 'admin'),
(96, 8560000, 20000, 8540000, '2025-11-09 14:36:41', 'Chơi MiniGame Lật Thẻ', 'admin'),
(97, 8540000, 20000, 8520000, '2025-11-09 14:37:57', 'Chơi MiniGame Lật Thẻ', 'admin'),
(98, 8520000, 20000, 8500000, '2025-11-09 14:42:26', 'Chơi MiniGame Lật Thẻ', 'admin'),
(99, 8500000, 20000, 8480000, '2025-11-09 14:46:19', 'Chơi MiniGame Lật Thẻ', 'admin'),
(100, 8480000, 20000, 8460000, '2025-11-09 14:46:52', 'Chơi MiniGame Lật Thẻ', 'admin'),
(101, 8460000, 20000, 8440000, '2025-11-09 14:48:29', 'Chơi MiniGame Lật Thẻ', 'admin'),
(102, 8440000, 20000, 8420000, '2025-11-09 14:49:28', 'Chơi MiniGame Lật Thẻ', 'admin'),
(103, 8420000, 20000, 8400000, '2025-11-09 14:52:49', 'Chơi MiniGame Lật Thẻ', 'admin'),
(104, 8400000, 20000, 8380000, '2025-11-09 14:55:31', 'Chơi MiniGame Lật Thẻ', 'admin'),
(105, 8380000, 20000, 8360000, '2025-11-09 14:55:41', 'Chơi MiniGame Lật Thẻ', 'admin'),
(106, 8360000, 20000, 8340000, '2025-11-09 14:57:01', 'Chơi MiniGame Lật Thẻ', 'admin'),
(107, 8340000, 20000, 8320000, '2025-11-09 14:57:50', 'Chơi MiniGame Lật Thẻ', 'admin'),
(108, 8320000, 20000, 8300000, '2025-11-09 14:59:58', 'Chơi MiniGame Lật Thẻ', 'admin'),
(109, 8300000, 20000, 8280000, '2025-11-09 15:00:41', 'Chơi MiniGame Lật Thẻ', 'admin'),
(110, 8280000, 20000, 8260000, '2025-11-09 15:03:30', 'Chơi MiniGame Lật Thẻ', 'admin'),
(111, 8260000, 20000, 8240000, '2025-11-09 15:16:59', 'Chơi MiniGame Lật Thẻ', 'admin'),
(112, 8240000, 20000, 8220000, '2025-11-09 15:18:42', 'Chơi MiniGame Lật Thẻ', 'admin'),
(113, 8220000, 20000, 8200000, '2025-11-09 15:19:54', 'Chơi MiniGame Lật Thẻ', 'admin'),
(114, 8200000, 20000, 8180000, '2025-11-09 15:20:56', 'Chơi MiniGame Lật Thẻ', 'admin'),
(115, 8180000, 20000, 8160000, '2025-11-09 15:21:47', 'Chơi MiniGame Lật Thẻ', 'admin'),
(116, 8160000, 20000, 8140000, '2025-11-09 15:23:44', 'Chơi MiniGame Lật Thẻ', 'admin'),
(117, 8140000, 20000, 8120000, '2025-11-09 15:25:18', 'Chơi MiniGame Lật Thẻ', 'admin'),
(118, 8120000, 20000, 8100000, '2025-11-09 15:29:56', 'Chơi MiniGame Lật Thẻ', 'admin'),
(119, 8100000, 20000, 8080000, '2025-11-09 15:30:06', 'Chơi MiniGame Lật Thẻ', 'admin'),
(120, 8080000, 20000, 8060000, '2025-11-09 15:30:24', 'Chơi MiniGame Lật Thẻ', 'admin'),
(121, 8060000, 20000, 8040000, '2025-11-09 15:30:34', 'Chơi MiniGame Lật Thẻ', 'admin'),
(122, 8040000, 20000, 8020000, '2025-11-09 15:31:24', 'Chơi MiniGame Lật Thẻ', 'admin'),
(123, 8020000, 20000, 8000000, '2025-11-09 15:31:27', 'Chơi MiniGame Lật Thẻ', 'admin'),
(124, 8000000, 20000, 7980000, '2025-11-09 15:31:37', 'Chơi MiniGame Lật Thẻ', 'admin'),
(125, 7980000, 20000, 7960000, '2025-11-09 15:32:18', 'Chơi MiniGame Lật Thẻ', 'admin'),
(126, 7960000, 20000, 7940000, '2025-11-09 15:32:26', 'Chơi MiniGame Lật Thẻ', 'admin'),
(127, 7940000, 20000, 7920000, '2025-11-09 15:35:16', 'Chơi MiniGame Lật Thẻ', 'admin'),
(128, 7920000, 20000, 7900000, '2025-11-09 15:35:55', 'Chơi MiniGame Lật Thẻ', 'admin'),
(129, 7900000, 20000, 7880000, '2025-11-09 15:41:52', 'Chơi MiniGame Lật Thẻ', 'admin'),
(130, 7880000, 20000, 7860000, '2025-11-09 15:42:21', 'Chơi MiniGame Lật Thẻ', 'admin'),
(131, 7860000, 20000, 7840000, '2025-11-09 15:43:25', 'Chơi MiniGame Lật Thẻ', 'admin'),
(132, 7860000, 20000, 7840000, '2025-11-09 15:43:41', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(133, 7840000, 20000, 7820000, '2025-11-09 15:43:41', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(134, 7820000, 20000, 7800000, '2025-11-09 15:43:53', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(135, 7800000, 20000, 7780000, '2025-11-09 15:43:53', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(136, 7760000, 20000, 7740000, '2025-11-09 15:44:05', 'Chơi MiniGame Lật Thẻ', 'admin'),
(137, 7740000, 20000, 7720000, '2025-11-09 15:45:08', 'Chơi MiniGame Lật Thẻ', 'admin'),
(138, 7720000, 20000, 7700000, '2025-11-09 15:45:14', 'Chơi MiniGame Lật Thẻ', 'admin'),
(139, 7720000, 20000, 7700000, '2025-11-09 15:46:04', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(140, 7700000, 20000, 7680000, '2025-11-09 15:46:05', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(141, 7680000, 20000, 7660000, '2025-11-09 15:46:13', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(142, 7660000, 20000, 7640000, '2025-11-09 15:46:13', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(143, 7640000, 20000, 7620000, '2025-11-09 15:48:47', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(144, 7620000, 20000, 7600000, '2025-11-09 15:48:47', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(145, 7580000, 20000, 7560000, '2025-11-09 15:49:27', 'Chơi MiniGame Lật Thẻ', 'admin'),
(146, 7560000, 20000, 7540000, '2025-11-09 15:52:01', 'Chơi MiniGame Lật Thẻ', 'admin'),
(147, 7540000, 20000, 7520000, '2025-11-09 15:52:10', 'Chơi MiniGame Lật Thẻ', 'admin'),
(148, 7520000, 20000, 7500000, '2025-11-09 15:53:18', 'Chơi MiniGame Lật Thẻ', 'admin'),
(149, 7520000, 20000, 7500000, '2025-11-09 15:53:30', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(150, 7500000, 20000, 7480000, '2025-11-09 15:53:30', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(151, 7460000, 20000, 7440000, '2025-11-09 16:40:12', 'Chơi MiniGame Lật Thẻ', 'admin'),
(152, 7440000, 20000, 7420000, '2025-11-10 20:49:14', 'Mua tài khoản (#5)', 'admin'),
(153, 0, 20000, 0, '2025-11-10 20:49:14', 'Bán tài khoản (#5)', ''),
(154, 7420000, 2, 7419998, '2025-11-10 20:51:19', 'Mua tài khoản (#6)', 'admin'),
(155, 0, 2, 0, '2025-11-10 20:51:19', 'Bán tài khoản (#6)', ''),
(156, 7419998, 1111, 7418887, '2025-11-10 20:55:46', 'Mua tài khoản (#7)', 'admin'),
(157, 0, 1111, 0, '2025-11-10 20:55:46', 'Bán tài khoản (#7)', ''),
(158, 7418887, 1, 7418886, '2025-11-10 20:56:17', 'Mua tài khoản (#8)', 'admin'),
(159, 0, 1, 0, '2025-11-10 20:56:17', 'Bán tài khoản (#8)', ''),
(160, 7418886, 2, 7418884, '2025-11-10 20:56:59', 'Mua tài khoản (#10)', 'admin'),
(161, 0, 2, 0, '2025-11-10 20:56:59', 'Bán tài khoản (#10)', ''),
(162, 7418884, 2, 7418882, '2025-11-10 20:59:03', 'Mua tài khoản (#9)', 'admin'),
(163, 0, 2, 0, '2025-11-10 20:59:03', 'Bán tài khoản (#9)', ''),
(164, 7418882, 3, 7418879, '2025-11-20 19:36:30', 'Mua tài khoản (#12)', 'admin'),
(165, 0, 3, 0, '2025-11-20 19:36:30', 'Bán tài khoản (#12)', ''),
(166, 7438879, 20000, 7418879, '2025-12-09 18:05:09', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(167, 7418879, 20000, 7398879, '2025-12-09 18:05:09', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(168, 7398879, 20000, 7378879, '2025-12-09 18:05:16', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(169, 7378879, 20000, 7358879, '2025-12-09 18:06:01', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(170, 7358879, 20000, 7338879, '2025-12-09 18:06:01', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(171, 7338879, 20000, 7318879, '2025-12-09 18:06:20', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(172, 7318879, 20000, 7298879, '2025-12-09 18:06:20', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(173, 7298879, 20000, 7278879, '2025-12-09 18:06:33', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(174, 7278879, 20000, 7258879, '2025-12-09 18:06:33', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(175, 7258879, 20000, 7238879, '2025-12-09 18:07:34', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(176, 7238879, 20000, 7218879, '2025-12-09 18:07:43', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(177, 7218879, 20000, 7198879, '2025-12-09 18:07:59', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(178, 7198879, 20000, 7178879, '2025-12-09 18:07:59', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(179, 7178879, 20000, 7158879, '2025-12-09 18:10:10', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(180, 7158879, 20000, 7138879, '2025-12-09 18:10:23', 'Thực hiện (VÒNG QUAY CÁ CHÉP)', 'admin'),
(181, 7118879, 20000, 7098879, '2025-12-09 18:10:48', 'Chơi MiniGame Lật Thẻ', 'admin'),
(182, 15409, 50, 15359, '2026-01-16 14:53:17', 'Đặt hàng gói (143) R$', 'admin'),
(183, 7098879, 22, 7098857, '2026-01-16 18:16:48', 'Mua tài khoản (#15)', 'admin'),
(184, 7098879, 22, 7098879, '2026-01-16 18:16:48', 'Bán tài khoản (#15)', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giftcode`
--

CREATE TABLE `giftcode` (
  `id` int(11) NOT NULL,
  `code` varchar(64) DEFAULT NULL,
  `dieukien` int(11) DEFAULT 0,
  `soluong` int(11) DEFAULT 0,
  `sudung` int(11) DEFAULT 0,
  `createdate` datetime DEFAULT NULL,
  `sovatpham` float DEFAULT 0,
  `loai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `giftcode`
--

INSERT INTO `giftcode` (`id`, `code`, `dieukien`, `soluong`, `sudung`, `createdate`, `sovatpham`, `loai`) VALUES
(13, '43351', 0, 0, 0, '2025-11-07 16:27:18', 50, 'money');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giosale`
--

CREATE TABLE `giosale` (
  `id` int(11) NOT NULL,
  `gio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giosale`
--

INSERT INTO `giosale` (`id`, `gio`, `status`) VALUES
(41, '20', 'ON'),
(42, '21', 'ON'),
(43, '6', 'ON'),
(44, '7', 'ON'),
(46, '18', 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `chitiet` longtext DEFAULT NULL,
  `loai` text DEFAULT NULL,
  `giamgia` text DEFAULT NULL,
  `giatiengoc` text DEFAULT NULL,
  `danhmuc` int(11) DEFAULT NULL,
  `view` text DEFAULT NULL,
  `luotxem` text DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`id`, `title`, `display`, `img`, `chitiet`, `loai`, `giamgia`, `giatiengoc`, `danhmuc`, `view`, `luotxem`) VALUES
(66, 'ACC GOD CDK SGT', 'SHOW', '/assets/storage/images/categories_OHY4C10FJWU2.png', '', NULL, '20000', '00005', 35, NULL, '115'),
(68, 's', 'SHOW', 'https://localhost/assets/storage/images/groups_BF30PN27AOX8.png', 'PHA+czwvcD4NCg==', NULL, '2', '2', 35, NULL, '16'),
(71, 'd', 'SHOW', '', 'PHA+ZDwvcD4NCg==', NULL, '2', '2', 35, NULL, '27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups_caythue`
--

CREATE TABLE `groups_caythue` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  `money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups_gamepass`
--

CREATE TABLE `groups_gamepass` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `linkanh` text DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `robux` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `groups_gamepass`
--

INSERT INTO `groups_gamepass` (`id`, `category`, `title`, `linkanh`, `money`, `robux`) VALUES
(367, 14, 'ădawd', 'https://i.imgur.com/Rqyfr0g.jpeg', 3, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups_robux`
--

CREATE TABLE `groups_robux` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `robux` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `groups_robux`
--

INSERT INTO `groups_robux` (`id`, `category`, `title`, `display`, `money`, `robux`) VALUES
(4, 10, 'fafafdaw', NULL, 1142442, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsuvongquay`
--

CREATE TABLE `lichsuvongquay` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `soluong` int(11) DEFAULT 0,
  `NA_trathuong` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsuvongquay`
--

INSERT INTO `lichsuvongquay` (`id`, `username`, `soluong`, `NA_trathuong`, `time`) VALUES
(36, 'admin', 22, NULL, 1762509355),
(37, 'admin', 44, NULL, 1762509481),
(38, 'admin', 55, NULL, 1762516761),
(39, 'admin', 55, NULL, 1762517742),
(40, 'admin', 55, NULL, 1762519798),
(41, 'admin', 44, NULL, 1762519833),
(42, 'admin', 22, NULL, 1762651351),
(43, 'admin', 55, NULL, 1762651374),
(44, 'admin', 567, NULL, 1762652023),
(45, 'admin', 22, NULL, 1762652069),
(46, 'admin', 22, NULL, 1762652089),
(47, 'admin', 55, NULL, 1762652462),
(48, 'admin', 22, NULL, 1762652475),
(49, 'admin', 22, NULL, 1762652512),
(50, 'admin', 55, NULL, 1762671456),
(51, 'admin', 55, NULL, 1762671456),
(52, 'admin', 44, NULL, 1762671473),
(53, 'admin', 22, NULL, 1762671473),
(54, 'admin', 567, NULL, 1762671497),
(55, 'admin', 22, NULL, 1762671498),
(56, 'admin', 22, NULL, 1762671516),
(57, 'admin', 567, NULL, 1762671516),
(58, 'admin', 55, NULL, 1762671524),
(59, 'admin', 567, NULL, 1762671524),
(60, 'admin', 567, NULL, 1762671533),
(61, 'admin', 567, NULL, 1762671533),
(62, 'admin', 22, NULL, 1762677821),
(63, 'admin', 22, NULL, 1762677822),
(64, 'admin', 22, NULL, 1762677833),
(65, 'admin', 567, NULL, 1762677833),
(66, 'admin', 555, NULL, 1762677964),
(67, 'admin', 22, NULL, 1762677965),
(68, 'admin', 567, NULL, 1762677973),
(69, 'admin', 567, NULL, 1762677973),
(70, 'admin', 567, NULL, 1762678127),
(71, 'admin', 567, NULL, 1762678127),
(72, 'admin', 22, NULL, 1762678410),
(73, 'admin', 567, NULL, 1762678410),
(74, '', 567, NULL, 1765192171),
(75, 'admin', 567, NULL, 1765278309),
(76, 'admin', 567, NULL, 1765278309),
(77, 'admin', 567, NULL, 1765278316),
(78, 'admin', 555, NULL, 1765278361),
(79, 'admin', 567, NULL, 1765278361),
(80, 'admin', 567, NULL, 1765278380),
(81, 'admin', 567, NULL, 1765278380),
(82, 'admin', 22, NULL, 1765278393),
(83, 'admin', 567, NULL, 1765278393),
(84, 'admin', 22, NULL, 1765278454),
(85, 'admin', 567, NULL, 1765278463),
(86, 'admin', 567, NULL, 1765278479),
(87, 'admin', 567, NULL, 1765278479),
(88, 'admin', 44, NULL, 1765278610),
(89, 'admin', 567, NULL, 1765278623),
(90, '', 1, NULL, 1768546039),
(91, '', 1, NULL, 1768546040);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsu_nhanqua`
--

CREATE TABLE `lichsu_nhanqua` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `soluong` int(11) DEFAULT 0,
  `NA_trathuong` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsu_nhanqua`
--

INSERT INTO `lichsu_nhanqua` (`id`, `username`, `soluong`, `NA_trathuong`, `time`) VALUES
(2, 'admin', 5, '1', 1763643568),
(3, 'test1', 7, '1', 1763645463),
(4, 'Ggfff', 5, '1', 1764321616),
(5, 'demo1', 6, '1', 1765192210);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `listbank`
--

CREATE TABLE `listbank` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `sotaikhoan` varchar(255) DEFAULT NULL,
  `chutaikhoan` varchar(255) DEFAULT NULL,
  `nganhang` varchar(255) DEFAULT NULL,
  `chinhanh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(45) NOT NULL,
  `device` text NOT NULL,
  `create_date` datetime NOT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `ip`, `device`, `create_date`, `action`) VALUES
(11, 13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-22 18:40:55', 'Đăng nhập thành công vào hệ thống'),
(12, 11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-23 09:06:06', 'Đăng nhập thành công vào hệ thống'),
(13, 11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-23 09:06:08', 'Đăng nhập thành công vào hệ thống'),
(14, 11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-23 17:04:02', 'Đăng nhập thành công vào hệ thống'),
(15, 11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-23 17:04:04', 'Đăng nhập thành công vào hệ thống'),
(16, 11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-24 18:00:11', 'Đăng nhập thành công vào hệ thống'),
(17, 11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-25 18:08:50', 'Đăng nhập thành công vào hệ thống'),
(18, 11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-26 17:49:18', 'Đăng nhập thành công vào hệ thống'),
(19, 11, '113.172.68.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-27 18:42:30', 'Đăng nhập thành công vào hệ thống'),
(20, 0, '14.191.93.68', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', '2025-11-28 16:20:11', 'Đăng ký tài khoản thành công'),
(21, 11, '113.172.68.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-29 17:08:09', 'Đăng nhập thành công vào hệ thống'),
(22, 11, '113.172.68.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-12-03 18:01:12', 'Đăng nhập thành công vào hệ thống'),
(23, 11, '113.172.68.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-12-03 18:12:33', 'Đăng nhập thành công vào hệ thống'),
(24, 11, '113.172.68.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-12-03 18:27:51', 'Đăng nhập thành công vào hệ thống'),
(25, 11, '113.172.68.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-12-03 19:38:08', 'Đăng nhập thành công vào hệ thống'),
(26, 11, '113.172.68.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-12-03 20:33:08', 'Đăng nhập thành công vào hệ thống'),
(27, 11, '113.172.68.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-12-04 13:26:44', 'Đăng nhập thành công vào hệ thống'),
(28, 12, '113.172.68.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-12-04 14:24:54', 'Đăng nhập thành công vào hệ thống'),
(29, 12, '113.172.68.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-12-04 14:42:50', 'Đăng nhập thành công vào hệ thống'),
(30, 11, '113.172.68.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-12-04 19:10:54', 'Đăng nhập thành công vào hệ thống'),
(31, 11, '113.172.68.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-12-07 08:11:43', 'Đăng nhập thành công vào hệ thống'),
(32, 11, '113.172.68.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-12-09 18:05:00', 'Đăng nhập thành công vào hệ thống'),
(33, 11, '113.172.68.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-12-09 18:05:52', 'Đăng nhập thành công vào hệ thống'),
(34, 11, '113.172.6.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-16 13:35:09', 'Đăng nhập thành công vào hệ thống'),
(35, 0, '14.168.249.78', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-16 13:36:47', 'Đăng ký tài khoản thành công'),
(36, 11, '14.168.249.78', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', '2026-01-16 13:37:47', 'Đăng nhập thành công vào hệ thống'),
(37, 11, '113.172.6.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-16 13:53:09', 'Đăng nhập thành công vào hệ thống'),
(38, 11, '113.172.6.5', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', '2026-01-16 14:14:15', 'Đăng nhập thành công vào hệ thống'),
(39, 11, '113.172.6.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-16 15:37:40', 'Đăng nhập thành công vào hệ thống'),
(40, 11, '113.172.6.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-16 16:19:34', 'Đăng nhập thành công vào hệ thống'),
(41, 11, '113.172.6.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-16 17:07:36', 'Đăng nhập thành công vào hệ thống'),
(42, 11, '14.168.249.78', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-16 17:31:07', 'Đăng nhập thành công vào hệ thống'),
(43, 11, '113.172.6.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-16 17:31:59', 'Đăng nhập thành công vào hệ thống'),
(44, 11, '113.172.6.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-16 17:52:08', 'Đăng nhập thành công vào hệ thống'),
(45, 11, '123.21.199.117', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Zalo iOS/692 ZaloTheme/light ZaloLanguage/vn', '2026-01-16 19:12:52', 'Đăng nhập thành công vào hệ thống'),
(46, 11, '123.21.199.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-16 19:30:26', 'Đăng nhập thành công vào hệ thống'),
(47, 11, '113.172.6.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-16 19:33:09', 'Đăng nhập thành công vào hệ thống'),
(48, 11, '14.168.249.78', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-16 19:33:50', 'Đăng nhập thành công vào hệ thống'),
(49, 11, '116.98.255.73', 'Mozilla/5.0 (Linux; Android 14; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.7499.192 Mobile Safari/537.36', '2026-01-16 19:34:26', 'Đăng nhập thành công vào hệ thống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log_giftcode`
--

CREATE TABLE `log_giftcode` (
  `id` int(11) NOT NULL,
  `username` varchar(64) DEFAULT NULL,
  `code` varchar(64) DEFAULT '0',
  `sovatpham` int(11) DEFAULT 0,
  `createdate` datetime DEFAULT NULL,
  `loai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `magiamgia`
--

CREATE TABLE `magiamgia` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `solan` varchar(255) NOT NULL,
  `giam` varchar(255) NOT NULL,
  `dichvu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `magiamgia`
--

INSERT INTO `magiamgia` (`id`, `code`, `solan`, `giam`, `dichvu`) VALUES
(9, '43351', '8', '100', 'caythue');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mini_game`
--

CREATE TABLE `mini_game` (
  `id` int(255) NOT NULL,
  `name` varchar(999) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(999) NOT NULL DEFAULT '0',
  `sudung` varchar(999) NOT NULL DEFAULT '0',
  `thumb` varchar(999) NOT NULL DEFAULT '0',
  `image` varchar(999) NOT NULL DEFAULT '0',
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'true',
  `time` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mini_game`
--

INSERT INTO `mini_game` (`id`, `name`, `slug`, `price`, `sudung`, `thumb`, `image`, `status`, `time`) VALUES
(3, 'VÒNG QUAY CÁ CHÉP', '', '20000', '33', '/assets/storage/images/cmsnav8RWBQ593NKUF.png', 'https://i.imgur.com/s1lzjuh.jpeg', 'true', 1762671514),
(4, 'VÒNG QUAY CÁ CHÉP', '', '20000', '18', '/assets/storage/images/cmsnav8RWBQ593NKUF.png', 'https://i.imgur.com/s1lzjuh.jpeg', 'true', 1762671514),
(5, 'Vòng quay Free Fire thẻ đổi tên', 'vong-quay-free-fire-the-doi-ten', '20000', '0', '/assets/storage/images/vongquaySV6DQ82WURLF.png', '/assets/storage/images/vongquayTOAS4XKCYW1V.png', 'true', 1765279305);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mini_game_gift`
--

CREATE TABLE `mini_game_gift` (
  `id` int(255) NOT NULL,
  `id_vongquay` int(255) NOT NULL,
  `item_1` varchar(999) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `item_2` varchar(999) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `item_3` varchar(999) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `item_4` varchar(999) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `item_5` varchar(999) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `item_6` varchar(999) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `item_7` varchar(999) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `item_8` varchar(999) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mini_game_gift`
--

INSERT INTO `mini_game_gift` (`id`, `id_vongquay`, `item_1`, `item_2`, `item_3`, `item_4`, `item_5`, `item_6`, `item_7`, `item_8`) VALUES
(3, 3, '{\"text\":\"tr\\u00fan acc roblox\",\"kimcuong\":\"567\",\"tyle\":\"100\"}', '{\"text\":\"Tr\\u00fang 19 Robux\",\"kimcuong\":\"555\",\"tyle\":\"1\"}', '{\"text\":\"Tr\\u00fang 79 Robux\",\"kimcuong\":\"555\",\"tyle\":\"1\"}', '{\"text\":\"Tr\\u00fang 29 Robux\",\"kimcuong\":\"55\",\"tyle\":\"1\"}', '{\"text\":\"Tr\\u00fang 59 Robux\",\"kimcuong\":\"55\",\"tyle\":\"1\"}', '{\"text\":\"Tr\\u00fang 399 Robux\",\"kimcuong\":\"44\",\"tyle\":\"1\"}', '{\"text\":\"Tr\\u00fang 1233Robux\",\"kimcuong\":\"33\",\"tyle\":\"1\"}', '{\"text\":\"Tr\\u00fang 21334000 Robux\",\"kimcuong\":\"22\",\"tyle\":\"44\"}'),
(4, 5, '{\"text\":\"1\",\"kimcuong\":\"1\",\"tyle\":\"1\"}', '{\"text\":\"1\",\"kimcuong\":\"1\",\"tyle\":\"1\"}', '{\"text\":\"1\",\"kimcuong\":\"1\",\"tyle\":\"1\"}', '{\"text\":\"1\",\"kimcuong\":\"1\",\"tyle\":\"1\"}', '{\"text\":\"1\",\"kimcuong\":\"1\",\"tyle\":\"1\"}', '{\"text\":\"1\",\"kimcuong\":\"1\",\"tyle\":\"1\"}', '{\"text\":\"1\",\"kimcuong\":\"1\",\"tyle\":\"1\"}', '{\"text\":\"1\",\"kimcuong\":\"1\",\"tyle\":\"1\"}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `options`
--

INSERT INTO `options` (`id`, `name`, `value`) VALUES
(1, 'tenweb', 'TOPIE.NET '),
(2, 'mota', 'Shop Roblox Uy Tín - Chất Lượng - Giá rẻ Được Đảm Bảo Uy Tín'),
(3, 'tukhoa', 'TOPIE.NET HỆ THỐNG BÁN ACC TỰ ĐỘNG'),
(4, 'logo', 'assets/storage/theme//logo_7KE.png'),
(11, 'noidung_naptien', 'fasadasdasd'),
(12, 'notification', '<p>s</p>\r\n'),
(13, 'anhbia', 'assets/storage/theme//anhbia_RI6.png'),
(14, 'favicon', 'assets/storage/theme//favicon_V3J.png'),
(17, 'baotri', 'ON'),
(30, 'status_chuyentien', 'ON'),
(31, 'hotline', '0355861031'),
(32, 'facebook', 'https://www.facebook.com/thaánhangtopie'),
(33, 'theme_color', '#34F2C2'),
(34, 'modal_thongbao', ''),
(42, 'api_bank', ''),
(43, 'status_napbank', 'OFF'),
(44, 'status_demo', 'OFF'),
(45, 'api_card', NULL),
(46, 'luuy_naptien', NULL),
(48, 'ck_bank', '0'),
(49, 'luuy_napbank', NULL),
(50, 'check_time_cron', '1684499942'),
(51, 'api_momo', NULL),
(52, 'stk_bank', '112203344'),
(53, 'mk_bank', ''),
(54, 'check_time_cron_bank', '1723226386'),
(55, 'html_footer', ''),
(56, 'text_left_footer', ''),
(57, 'text_center_footer', ''),
(58, 'email_admin', ''),
(59, 'button_buy', '1'),
(60, 'block_f12', 'OFF'),
(63, 'ck_the', '0'),
(64, 'logo_dark', 'assets/storage/theme//logo_dark_KUQ.png'),
(65, 'background', 'assets/storage/theme//background_9DK.png'),
(66, 'discord', ''),
(67, 'partner_id', '5468888330'),
(68, 'partner_key', '9ad47d9a365bfb84c534acda21defb4d'),
(72, 'status_napthe', 'ON'),
(78, 'token_tsr', ''),
(79, 'motatopnap', '<p><strong><span style=\"color:#ce0000\">TOP 1 : 500</span><span style=\"color:#ce0000\">K TIỀN SHOP + 1.000.000 GEM ANIME DEFDENDER</span></strong></p>\r\n\r\n<p><strong><span style=\"color:#ce0000\">TOP 2 :</span><span style=\"color:#00ffff\">&nbsp;</span><span style=\"color:#ce0000\">300</span><span style=\"color:#ce0000\">K TIỀN SHOP + 300.000 GEM ANIME DEFENDER</span><span style=\"color:#ce0000\">&nbsp; &nbsp; &nbsp;</span></strong></p>\r\n\r\n<p><strong><span style=\"color:#ce0000\">TOP 3 :&nbsp;100K TIỀN SHOP + 200.000 GEM ANIME DEFENDER</span></strong></p>\r\n\r\n<p><span style=\"color:#ff0000\"><strong>TOP 4,5 : 50K TIỀN SHOP</strong></span></p>\r\n\r\n<p><strong><span style=\"color:#ff0000\">&Aacute;P DỤNG CHO KH&Aacute;CH H&Agrave;NG NẠP TỔNG TR&Ecirc;N 2</span></strong><strong><span style=\"color:#ff0000\">.000.000Đ</span></strong></p>\r\n'),
(81, 'nutvongquay', 'https://hungakiraroblox.vn/images/minigames/images_button_play202211210435image-8a5e9624-8618-4a5f-9d37-20b6db11ddb4.png'),
(84, 'giamgia', 'Đang Giảm Giá 30%'),
(94, 'linkthongbao', NULL),
(95, 'textthongbao', NULL),
(97, 'status_api', 'CARDV3'),
(98, 'minigame', 'ON'),
(99, 'accounts', 'ON'),
(100, 'caythue', 'ON'),
(101, 'robux', 'ON'),
(102, 'gamepass', 'ON'),
(103, 'qrcodebank', NULL),
(104, 'qrcodemomo', ''),
(105, 'stk_momo', NULL),
(106, 'mk_momo', ''),
(107, 'token_momo', ''),
(108, 'ctkmomoo', NULL),
(109, 'namebank', NULL),
(110, 'ctkbank', NULL),
(111, 'status_notification', 'ON'),
(113, 'Webgachthe', 'vuathe.vn'),
(115, 'img_bonus', 'https://i.imgur.com/omomWYO.gif'),
(116, 'nhanqua', 'ON'),
(117, 'nhangiatien', '6'),
(118, 'thongtinfake', 'OFF'),
(119, 'noidungthongbao', '<p></p><div class=\"tw-mb-4 tw-text-red-500 tw-font-bold tw-px-2 tw-bg-white tw-rounded tw-py-2 tw-relative\" style=\"box-sizing: border-box; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; margin: 0px 0px 1rem; position: relative; border-radius: 0.25rem; --tw-bg-opacity: 1; background-color: rgba(255,255,255,var(--tw-bg-opacity)); padding: 0.5rem; font-weight: 700; --tw-text-opacity: 1; color: rgba(68,152,239,var(--tw-text-opacity)); font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" font-size:=\"\" 16px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" widows:=\"\" word-spacing:=\"\" 1px;=\"\" -webkit-text-stroke-width:=\"\" white-space:=\"\" text-decoration-thickness:=\"\" initial;=\"\" text-decoration-style:=\"\" text-decoration-color:=\"\" initial;\"=\"\"><span class=\" tw-absolute tw-flex tw-items-center tw-justify-center tw-text-xl tw-h-10 tw-w-10 tw-bg-white tw-rounded \" style=\"box-sizing: border-box; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; margin: 0px; position: absolute; display: flex; height: 2.5rem; width: 2.5rem; align-items: center; justify-content: center; border-radius: 0.25rem; --tw-bg-opacity: 1; background-color: rgba(255,255,255,var(--tw-bg-opacity)); font-size: 1.25rem; line-height: 1.75rem; top: 0px; left: 0px; z-index: 5;\"><div class=\"tw-mb-4 tw-text-red-500 tw-font-bold tw-px-2 tw-bg-white tw-rounded tw-py-2 tw-relative\" style=\"box-sizing: border-box; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; margin: 0px 0px 1rem; position: relative; border-radius: 0.25rem; --tw-bg-opacity: 1; background-color: rgba(255,255,255,var(--tw-bg-opacity)); padding: 0.5rem; font-weight: 700; --tw-text-opacity: 1; color: rgba(68,152,239,var(--tw-text-opacity)); font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" font-size:=\"\" 16px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" widows:=\"\" word-spacing:=\"\" 1px;=\"\" -webkit-text-stroke-width:=\"\" white-space:=\"\" text-decoration-thickness:=\"\" initial;=\"\" text-decoration-style:=\"\" text-decoration-color:=\"\" initial;\"=\"\"><span class=\" tw-absolute tw-flex tw-items-center tw-justify-center tw-text-xl tw-h-10 tw-w-10 tw-bg-white tw-rounded \" style=\"box-sizing: border-box; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; margin: 0px; position: absolute; display: flex; height: 2.5rem; width: 2.5rem; align-items: center; justify-content: center; border-radius: 0.25rem; --tw-bg-opacity: 1; background-color: rgba(255,255,255,var(--tw-bg-opacity)); font-size: 1.25rem; line-height: 1.75rem; top: 0px; left: 0px; z-index: 5;\"><a style=\"border: 0px solid rgb(229, 231, 235); --tw-border-opacity: 1; --tw-shadow: 0 0 #0000; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; margin: 0px; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; color: rgb(239, 68, 68); text-decoration-line: inherit; font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" font-size:=\"\" 16px;=\"\" word-spacing:=\"\" 1px;=\"\" text-wrap:=\"\" nowrap;=\"\" text-align:=\"\" center;\"=\"\"><br></a><a style=\"border: 0px solid rgb(229, 231, 235); --tw-border-opacity: 1; --tw-shadow: 0 0 #0000; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; margin: 0px; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; color: rgb(239, 68, 68); text-decoration-line: inherit; font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"noto=\"\" sans\",=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" font-size:=\"\" 16px;=\"\" word-spacing:=\"\" 1px;=\"\" text-wrap:=\"\" nowrap;=\"\" text-align:=\"\" center;\"=\"\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(31, 45, 61); font-size: 16px; font-weight: 400; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent;\"><span style=\"border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; margin: 0px; background-color: transparent;\"><span style=\"font-weight: bolder; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; margin: 0px;\">ĐUA TOP NẠP THẺ HÀNG THÁNG</span></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(31, 45, 61); font-size: 16px; font-weight: 400; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent;\"><span style=\"font-weight: bolder; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; margin: 0px;\">NHẬN NGAY QUÀ CỰC KHỦNG</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(31, 45, 61); font-size: 16px; font-weight: 400; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent;\"><span style=\"font-weight: bolder; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; margin: 0px;\">TOP 1: Nick Blox Fruits Tộc V4 Ngẫu Nhiên Full LV2450 Có MOCHI V2, LEOPARD, GOD GUMAN ...</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(31, 45, 61); font-size: 16px; font-weight: 400; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent;\"><span style=\"font-weight: bolder; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; margin: 0px;\">TOP 2: 500.000 VNĐ Hoặc 5.000 ROBUX</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(31, 45, 61); font-size: 16px; font-weight: 400; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent;\"><span style=\"font-weight: bolder; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; margin: 0px;\">TOP 3: 200.000 VNĐ Hoặc 2.000 ROBUX</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(31, 45, 61); font-size: 16px; font-weight: 400; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent;\"><span style=\"font-weight: bolder; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; margin: 0px;\">TOP 4: 100.000 VNĐ</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(31, 45, 61); font-size: 16px; font-weight: 400; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent;\"><span style=\"font-weight: bolder; border-width: 0px; border-style: solid; border-color: rgba(229,229,229,var(--tw-border-opacity)); border-image: initial; --tw-border-opacity: 1; --tw-shadow: 0 0 transparent; --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/); --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,0.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; margin: 0px;\">TOP 5: 50.000 VNĐ</span></p></a></span></div></span></div><p></p>'),
(120, 'loaicanhnapthe', 'youtube'),
(121, 'banner1', 'https://i.imgur.com/H5HHsm6.gif'),
(123, 'ck_ref', '5'),
(124, 'btnSaveOption', ''),
(127, 'webhookautorb', NULL),
(128, 'note_admin', 'Cảm ơn bạn đã đặt hàng đơn hàng của bạn sẽ được shop duyệt sớm nhất có thể nha <3'),
(129, 'id_video_youtube_ruttb', ''),
(130, 'thongbaoquantrong', ''),
(131, 'status_ruttien', 'ON'),
(132, 'max_ruttien', '10000000000'),
(133, 'min_ruttien', '20000'),
(134, 'loaicanhnapthe', 'youtube'),
(135, 'phi_rut_tien_ck', '0,5'),
(136, 'giftcode', 'OFF'),
(137, 'timezone', 'Asia/Ho_Chi_Minh'),
(139, 'id_video_youtube', '70DyZbjFQ_o'),
(144, 'type_bank', 'ACB'),
(145, 'status_cron_bank', 'OFF'),
(146, 'recharge_min', '10000'),
(154, 'name_bank', 'NGUYEN THANH SANG'),
(155, 'banner2', 'https://i.imgur.com/H5HHsm6.gif'),
(157, 'zalo', '0355861031'),
(158, 'api_bank_tsr', ''),
(159, 'stk_bank_tsr', '0356861031'),
(160, 'mk_bank_tsr', ''),
(162, 'status_naptsr', 'ON'),
(163, 'name_bank_tsr', 'Tobine;-;'),
(164, 'status_sale', 'ON'),
(168, 'status_google', 'ON'),
(169, 'loader', 'https://i.pinimg.com/originals/71/3a/32/713a3272124cc57ba9e9fb7f59e9ab3b.gif'),
(170, 'client_id_gg', ''),
(171, 'client_secret_gg', ''),
(172, 'status_boxtype', 'ON'),
(173, 'status_recapcha', 'OFF'),
(174, 'recaptcha_sitekey', NULL),
(175, 'recaptcha_secretkey', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `trans_id` varchar(50) DEFAULT NULL,
  `name` blob DEFAULT NULL,
  `api_trans_id` varchar(255) DEFAULT NULL,
  `id_connect_api` int(11) DEFAULT 0,
  `seller` int(11) DEFAULT 0,
  `buyer` int(11) DEFAULT 0,
  `product_id` int(11) DEFAULT 0,
  `document_id` int(11) DEFAULT 0,
  `store_fanpage_id` int(11) DEFAULT 0,
  `amount` int(11) DEFAULT 0,
  `pay` int(11) DEFAULT 0,
  `cost` float DEFAULT 0,
  `create_date` datetime DEFAULT NULL,
  `create_time` int(11) DEFAULT 0,
  `display` int(11) DEFAULT 1,
  `fake` int(11) DEFAULT 0,
  `refund` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_caythue`
--

CREATE TABLE `orders_caythue` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `dichvu` varchar(255) NOT NULL,
  `money` int(11) NOT NULL,
  `tk` varchar(255) NOT NULL,
  `mk` varchar(255) NOT NULL,
  `createdate` datetime NOT NULL,
  `updatedate` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `ghichu` text NOT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_gamepass`
--

CREATE TABLE `orders_gamepass` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `dichvu` varchar(255) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `robux` int(11) DEFAULT NULL,
  `tk` varchar(255) DEFAULT NULL,
  `mk` varchar(255) DEFAULT NULL,
  `createdate` datetime NOT NULL,
  `updatedate` datetime NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `ghichu` text DEFAULT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_robux`
--

CREATE TABLE `orders_robux` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `dichvu` varchar(255) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `robux` int(11) DEFAULT NULL,
  `tk` varchar(255) DEFAULT NULL,
  `mk` varchar(255) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `ghichu` text DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_withdraw`
--

CREATE TABLE `orders_withdraw` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `dichvu` varchar(255) DEFAULT NULL,
  `robux` int(11) DEFAULT NULL,
  `tk` varchar(255) DEFAULT NULL,
  `mk` varchar(255) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `ghichu` text DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `orders_withdraw`
--

INSERT INTO `orders_withdraw` (`id`, `username`, `receiver`, `dichvu`, `robux`, `tk`, `mk`, `createdate`, `updatedate`, `status`, `ghichu`, `reason`) VALUES
(1, 'admin', NULL, '100R$', 50, 'tttrẻtgeg', '.', '2026-01-16 14:53:17', '2026-01-16 14:53:17', 'xuly', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `stt` int(11) DEFAULT 0,
  `user_id` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT 0,
  `name` text DEFAULT NULL,
  `flag` text DEFAULT NULL,
  `price` float DEFAULT 0,
  `cost` float DEFAULT 0,
  `checklive` int(11) DEFAULT 0,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `preview` text DEFAULT NULL,
  `time_delete_account` int(11) DEFAULT 0,
  `minimum` int(11) DEFAULT 1,
  `maximum` int(11) DEFAULT 10000,
  `badge` varchar(255) DEFAULT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `id_api` varchar(50) DEFAULT '0',
  `id_connect_api` int(11) DEFAULT 0,
  `api_stock` float DEFAULT 0,
  `name_api` blob DEFAULT NULL,
  `update_api` int(11) DEFAULT 0,
  `sold` int(11) DEFAULT 0,
  `filter_time_checklive` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `raterobux`
--

CREATE TABLE `raterobux` (
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `raterobux`
--

INSERT INTO `raterobux` (`rate`) VALUES
(200);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ruttien`
--

CREATE TABLE `ruttien` (
  `id` int(11) NOT NULL,
  `magd` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `sotien` int(11) DEFAULT NULL,
  `thanhtoan` int(11) NOT NULL DEFAULT 0,
  `nganhang` varchar(255) DEFAULT NULL,
  `sotaikhoan` varchar(255) DEFAULT NULL,
  `chutaikhoan` varchar(255) DEFAULT NULL,
  `chinhanh` varchar(255) DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL,
  `trangthai` varchar(255) DEFAULT NULL,
  `capnhat` datetime DEFAULT NULL,
  `ghichu` text DEFAULT NULL,
  `response` text DEFAULT NULL,
  `noidung` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting_bingo`
--

CREATE TABLE `setting_bingo` (
  `item_1` int(11) NOT NULL,
  `item_2` int(11) NOT NULL,
  `item_3` int(11) NOT NULL,
  `item_4` int(11) NOT NULL,
  `item_5` int(11) NOT NULL,
  `item_6` int(11) NOT NULL,
  `item_7` int(11) NOT NULL,
  `item_8` int(11) NOT NULL,
  `giatien` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `sudung` int(255) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting_latthe`
--

CREATE TABLE `setting_latthe` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `item_1` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_2` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_3` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_4` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_5` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_6` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_7` varchar(999) DEFAULT NULL,
  `item_8` varchar(999) DEFAULT NULL,
  `item_9` varchar(999) DEFAULT NULL,
  `item_10` varchar(255) DEFAULT NULL,
  `item_11` varchar(255) DEFAULT NULL,
  `item_12` varchar(255) DEFAULT NULL,
  `item_13` varchar(255) DEFAULT NULL,
  `item_14` varchar(255) DEFAULT NULL,
  `giatien` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `luotdaquay` int(11) DEFAULT 0,
  `NA_trathuong` varchar(255) DEFAULT NULL,
  `display` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imglatthe_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imglatthe_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imglatthe_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imglatthe_4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imglatthe_5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imglatthe_6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imglatthe_7` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imglatthe_8` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imglatthe_9` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imglatthe_10` varchar(255) DEFAULT NULL,
  `imglatthe_11` varchar(255) DEFAULT NULL,
  `imglatthe_12` varchar(255) DEFAULT NULL,
  `imglatthe_13` varchar(255) DEFAULT NULL,
  `imglatthe_14` varchar(255) DEFAULT NULL,
  `imglatthe_thumb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imglatthe_upthe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imglatthe_button` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `textlatthe_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `textlatthe_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `textlatthe_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `textlatthe_4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `textlatthe_5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `textlatthe_6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `textlatthe_7` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `textlatthe_8` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `textlatthe_9` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `textlatthe_10` varchar(255) DEFAULT NULL,
  `textlatthe_11` varchar(255) DEFAULT NULL,
  `textlatthe_12` varchar(255) DEFAULT NULL,
  `textlatthe_13` varchar(255) DEFAULT NULL,
  `textlatthe_14` varchar(255) DEFAULT NULL,
  `robuxlatthe_1` int(11) DEFAULT NULL,
  `robuxlatthe_2` int(11) DEFAULT NULL,
  `robuxlatthe_3` int(11) DEFAULT NULL,
  `robuxlatthe_4` int(11) DEFAULT NULL,
  `robuxlatthe_5` int(11) DEFAULT NULL,
  `robuxlatthe_6` int(11) DEFAULT NULL,
  `robuxlatthe_7` int(11) DEFAULT NULL,
  `robuxlatthe_8` int(11) DEFAULT NULL,
  `robuxlatthe_9` int(11) DEFAULT NULL,
  `robuxlatthe_10` int(11) DEFAULT 0,
  `robuxlatthe_11` int(11) DEFAULT 0,
  `robuxlatthe_12` int(11) DEFAULT 0,
  `robuxlatthe_13` int(11) DEFAULT 0,
  `robuxlatthe_14` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `setting_latthe`
--

INSERT INTO `setting_latthe` (`id`, `title`, `slug`, `item_1`, `item_2`, `item_3`, `item_4`, `item_5`, `item_6`, `item_7`, `item_8`, `item_9`, `item_10`, `item_11`, `item_12`, `item_13`, `item_14`, `giatien`, `luotdaquay`, `NA_trathuong`, `display`, `imglatthe_1`, `imglatthe_2`, `imglatthe_3`, `imglatthe_4`, `imglatthe_5`, `imglatthe_6`, `imglatthe_7`, `imglatthe_8`, `imglatthe_9`, `imglatthe_10`, `imglatthe_11`, `imglatthe_12`, `imglatthe_13`, `imglatthe_14`, `imglatthe_thumb`, `imglatthe_upthe`, `imglatthe_button`, `textlatthe_1`, `textlatthe_2`, `textlatthe_3`, `textlatthe_4`, `textlatthe_5`, `textlatthe_6`, `textlatthe_7`, `textlatthe_8`, `textlatthe_9`, `textlatthe_10`, `textlatthe_11`, `textlatthe_12`, `textlatthe_13`, `textlatthe_14`, `robuxlatthe_1`, `robuxlatthe_2`, `robuxlatthe_3`, `robuxlatthe_4`, `robuxlatthe_5`, `robuxlatthe_6`, `robuxlatthe_7`, `robuxlatthe_8`, `robuxlatthe_9`, `robuxlatthe_10`, `robuxlatthe_11`, `robuxlatthe_12`, `robuxlatthe_13`, `robuxlatthe_14`) VALUES
(3, 'LẬT THẺ VIP', '', '7', '6', '6', '5', '100', '3', '2', '1', '5', '6', '50', '35', '35', '36', '20000', 96, NULL, 'SHOW', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://localhost/assets/storage/images/cmsnav8RWBQ593NKUF.png', 'https://i.imgur.com/ngMceGs.jpeg', 'https://i.imgur.com/ngMceGs.jpe', '1', '2', '3', '4', '19', '5', '7', '8', '9', '10', '11', '12', '13', '14', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14),
(4, 'LẬT THẺ VIP siêu ngon', 'lat-the-vip-sieu-ngon', '7', '6', '6', '5', '100', '3', '2', '1', '5', '6', '50', '35', '35', '36', '20000', 95, NULL, 'SHOW', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://localhost/assets/storage/images/cmsnav8RWBQ593NKUF.png', 'https://i.imgur.com/ngMceGs.jpeg', 'https://i.imgur.com/ngMceGs.jpe', '1', '2', '3', '4', '19', '5', '7', '8', '9', '10', '11', '12', '13', '14', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL COMMENT 'Tên đăng nhập',
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT 'Mật khẩu đăng nhập',
  `token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci DEFAULT NULL,
  `money` int(11) NOT NULL DEFAULT 0 COMMENT 'số tiền của khách',
  `robux` int(11) NOT NULL DEFAULT 0 COMMENT 'robux của khách',
  `level` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci DEFAULT NULL COMMENT 'Cấp bậc thành viên',
  `banned` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci DEFAULT NULL COMMENT 'Email để lấy lại mật khẩu khi quên',
  `otp` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL COMMENT 'Mã otp khi lấy lại mật khẩu được gửi về email',
  `ip` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci DEFAULT NULL,
  `time` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci DEFAULT NULL,
  `total_money` int(11) NOT NULL DEFAULT 0,
  `money_hoahong` int(11) NOT NULL COMMENT 'số tiền nhận được từ link giới thiệu',
  `createdate` datetime DEFAULT NULL COMMENT 'thời gian tạo tài khoản',
  `ref_click` int(11) DEFAULT 0,
  `ref` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `ctv` int(11) DEFAULT 0,
  `ctvrobux` int(11) DEFAULT 0,
  `ctvacc` int(11) DEFAULT 0,
  `ctvgpass` int(11) DEFAULT 0,
  `hopqua` text CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `token`, `money`, `robux`, `level`, `banned`, `email`, `otp`, `ip`, `time`, `total_money`, `money_hoahong`, `createdate`, `ref_click`, `ref`, `ctv`, `ctvrobux`, `ctvacc`, `ctvgpass`, `hopqua`) VALUES
(11, 'admin', 'admin', 'oxPjiucOCzgQWkYsEDdKNfLXUprTeFMwJhnylRIvHGZAVbtmaqSB', 7098879, 15309, 'admin', 0, NULL, '', '::1', '1762603444', 0, 0, '2025-11-08 19:04:04', 0, '', 0, 0, 1, 0, NULL),
(12, 'test1', 'test', 'kiYMpyvnKORDHVmXFxoBPfQLaTbjZwGhdWCUASEecIqtsJuNlgrz', 0, 7, 'thanhvien', 0, NULL, '', '::1', '1763645460', 0, 0, '2025-11-20 20:31:00', 0, '', 0, 0, 0, 0, NULL),
(13, 'admin1', '112233', 'CFoBZVJsHYRMQGUTqrLeyxAmnXkKbIgvOEpiWhjcaDfPltSdwzNu', 0, 0, 'thanhvien', 0, NULL, '', '::1', '1763809080', 0, 0, '2025-11-22 17:58:00', 0, '', 0, 0, 0, 0, NULL),
(14, 'Ggfff', 'furbi5-muvpUj-gahtih', 'SqRIHmhJQiazgfvCYTrcxAwONtjMnsZePbXUGoWVKFBDkEyluLpd', 0, 5, 'thanhvien', 0, NULL, '0', '14.191.93.68', '1764321611', 0, 0, '2025-11-28 16:20:11', 0, '', 0, 0, 0, 0, NULL),
(15, 'demo1', 'demo', 'iAQtgphlCDjIGHNSbfLJVoYPudKzETXBOvqsMZnWakcmrURxwFey', 0, 6, 'thanhvien', 0, NULL, '0', '113.184.92.141', '1765192197', 0, 0, '2025-12-08 18:09:57', 0, '', 0, 0, 0, 0, NULL),
(16, 'monpro', 'nobita44', 'rJmBxuiCOpwlLTNQkdftDUvXZEAaoWgVScFjzKMYsRnIbyqGHhPe', 0, 0, 'thanhvien', 0, NULL, '0', '14.168.249.78', '1768545407', 0, 0, '2026-01-16 13:36:47', 0, '', 0, 0, 0, 0, NULL),
(17, 'rubuhehe', 'baodv1w34', 'ONrRHaDtIEGiWgPpxjAYFmMByvhXwfusZLncCokJVSTUbeqQdzlK', 0, 0, 'thanhvien', 0, NULL, '0', '123.21.199.117', '1768566528', 0, 0, '2026-01-16 19:28:48', 0, '', 0, 0, 0, 0, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bank_auto`
--
ALTER TABLE `bank_auto`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `boxtype`
--
ALTER TABLE `boxtype`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `category_caythue`
--
ALTER TABLE `category_caythue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `category_gamepass`
--
ALTER TABLE `category_gamepass`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `category_robux`
--
ALTER TABLE `category_robux`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `category_robux120h`
--
ALTER TABLE `category_robux120h`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `danh_muc_tai_khoan`
--
ALTER TABLE `danh_muc_tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dongtien`
--
ALTER TABLE `dongtien`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `giftcode`
--
ALTER TABLE `giftcode`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `giosale`
--
ALTER TABLE `giosale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`(768)),
  ADD KEY `status_2` (`status`(768)),
  ADD KEY `status_3` (`status`(768)),
  ADD KEY `status_4` (`status`(768));

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `groups_caythue`
--
ALTER TABLE `groups_caythue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `groups_gamepass`
--
ALTER TABLE `groups_gamepass`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `groups_robux`
--
ALTER TABLE `groups_robux`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichsuvongquay`
--
ALTER TABLE `lichsuvongquay`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichsu_nhanqua`
--
ALTER TABLE `lichsu_nhanqua`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `listbank`
--
ALTER TABLE `listbank`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `log_giftcode`
--
ALTER TABLE `log_giftcode`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mini_game`
--
ALTER TABLE `mini_game`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mini_game_gift`
--
ALTER TABLE `mini_game_gift`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trans_id` (`trans_id`);

--
-- Chỉ mục cho bảng `orders_caythue`
--
ALTER TABLE `orders_caythue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `orders_gamepass`
--
ALTER TABLE `orders_gamepass`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `orders_robux`
--
ALTER TABLE `orders_robux`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `orders_withdraw`
--
ALTER TABLE `orders_withdraw`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `raterobux`
--
ALTER TABLE `raterobux`
  ADD PRIMARY KEY (`rate`);

--
-- Chỉ mục cho bảng `ruttien`
--
ALTER TABLE `ruttien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `setting_latthe`
--
ALTER TABLE `setting_latthe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `bank_auto`
--
ALTER TABLE `bank_auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `boxtype`
--
ALTER TABLE `boxtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category_caythue`
--
ALTER TABLE `category_caythue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `category_gamepass`
--
ALTER TABLE `category_gamepass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `category_robux`
--
ALTER TABLE `category_robux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `category_robux120h`
--
ALTER TABLE `category_robux120h`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `danh_muc_tai_khoan`
--
ALTER TABLE `danh_muc_tai_khoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `dongtien`
--
ALTER TABLE `dongtien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT cho bảng `giftcode`
--
ALTER TABLE `giftcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `giosale`
--
ALTER TABLE `giosale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `groups_caythue`
--
ALTER TABLE `groups_caythue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `groups_gamepass`
--
ALTER TABLE `groups_gamepass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT cho bảng `groups_robux`
--
ALTER TABLE `groups_robux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lichsuvongquay`
--
ALTER TABLE `lichsuvongquay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `lichsu_nhanqua`
--
ALTER TABLE `lichsu_nhanqua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `listbank`
--
ALTER TABLE `listbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `log_giftcode`
--
ALTER TABLE `log_giftcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `mini_game`
--
ALTER TABLE `mini_game`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `mini_game_gift`
--
ALTER TABLE `mini_game_gift`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders_caythue`
--
ALTER TABLE `orders_caythue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders_gamepass`
--
ALTER TABLE `orders_gamepass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders_robux`
--
ALTER TABLE `orders_robux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders_withdraw`
--
ALTER TABLE `orders_withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ruttien`
--
ALTER TABLE `ruttien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `setting_latthe`
--
ALTER TABLE `setting_latthe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
