-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th7 10, 2024 lúc 06:10 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sanpham`
--
CREATE DATABASE IF NOT EXISTS `sanpham` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `sanpham`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `photo`, `description`) VALUES
(1, 'Laptop', 'tivi.jpg', 'Tivi category'),
(2, 'Điện Thoại', 'ac.jpg', 'Air conditoner category'),
(3, 'Máy Tính', 'laptop.jpg', 'laptop category'),
(4, 'Phụ Kiện', '720x1480-Wallpapers.jpg', 'Washing machine category');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `photo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `photo`, `category_id`) VALUES
(3, 'phím Dell 2098', 45000, 'banphim2.PNG', 4),
(4, 'Laptop Sony 1123', 40000, 'laptop.jpg', 3),
(5, 'Laptop IBM 3324', 25000, 'laptop.jpg', 3),
(6, 'Laptop Asus 5674', 26000, 'laptop.jpg', 3),
(27, 'Laptop IBM 3324', 25000, 'image(1).jpg', 1),
(29, 'Laptop Sony 1123', 40000, 'image(13).jpg', 1),
(30, 'Laptop Sony 1123', 40000, 'image(12).jpg', 1),
(32, 'Điện Thoại th5', 540000, '1.jpg', 2),
(33, 'Chuột a4', 30000, 'chuot1.jpg', 4),
(34, 'máy tính d5', 540000, 'tải xuống.jfif', 3),
(35, 'Glaxy 4D', 540000, '2.jpg', 2),
(36, 'iphone 6', 30000, '3.jpg', 2),
(37, 'samsum k3', 30000, '4.jpg', 2),
(38, 'Chuột 4b', 3333, 'chuot5.jpg', 4),
(39, 'Chuột Không Dây 5f', 30000, 'chuot6.jpg', 4),
(40, 'Bàn Phím', 560000, 'banphim1.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`email`, `name`, `password`) VALUES
('quy@gmail.com', 'quan quy', '123'),
('tam@gmail.com', 'tam ho', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
