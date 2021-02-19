-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th2 04, 2021 lúc 08:53 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `movies`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `actor`
--

INSERT INTO `actor` (`id`, `name`) VALUES
(1, 'Ronaldo'),
(2, 'Rooney'),
(3, 'Messi'),
(4, 'Neymar');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Hài hước', 'Đây là thể loại hài hước'),
(2, 'Kinh dị', 'Đây là thể loại kinh dị'),
(3, 'Hành động', 'Đây là thể loại hành động'),
(4, 'Phiêu lưu', 'Đây là thể loại phiêu lưu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(15) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `item`
--

INSERT INTO `item` (`id`, `title`, `description`, `status`, `image`, `category_id`, `actor_id`) VALUES
(2, 'Vũ Khí Tối Thượng', '17/03/2020', 'active', 'vukhitoithuong.jpg', 3, 1),
(3, 'Lật Mặt: 3 Chàng Khuyết', '19/01/2021', 'active', '3.jpg', 1, 4),
(4, 'Thương Mến, Simon', '20/01/2021', 'active', '4.jpg', 1, 3),
(5, 'Ngỗng Vịt Phiêu Lưu Ký', '22/01/2021', 'active', '5.jpg', 4, 2),
(6, 'Vùng Đất Câm Lặng', '03/01/2021', 'active', '6.jpg', 2, 4),
(7, '100 Ngày Bên Em', '17/01/2021', 'active', '7.jpg', 3, 1),
(8, 'Hoàng Tử Hào Hoa', '11/01/2021', 'active', '8.jpg', 4, 3),
(9, 'Avengers: Cuộc Chiến Vô Cực', '25/01/2021', 'active', '1.jpg', 3, 1),
(10, 'Thần Chết', '21/01/2021', 'active', '2.jpg', 2, 2),
(11, 'Hợp Đồng Bắt Ma', '20/04/2020', 'active', 'hopdongbatma.jpg', 1, 3),
(12, 'Lôi Báo', '03/04/2020', 'active', 'loibao.jpg', 2, 4),
(13, 'Quả Tim Máu ', '22/04/2021', 'active', 'quatimmau.jpg', 4, 2),
(17, 'Mắt Biếc', '1/04/2020', 'active', 'mat-biec.jpg', 4, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
