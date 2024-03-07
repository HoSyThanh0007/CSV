-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 07, 2024 lúc 02:21 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nckh1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cbvanphong`
--

CREATE TABLE `cbvanphong` (
  `id` int(10) NOT NULL,
  `tenNhanVien` varchar(100) NOT NULL,
  `tenDangNhap` varchar(255) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `loaiTK` int(5) NOT NULL,
  `nganhDaoTao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cbvanphong`
--

INSERT INTO `cbvanphong` (`id`, `tenNhanVien`, `tenDangNhap`, `matKhau`, `loaiTK`, `nganhDaoTao`) VALUES
(1, 'Trang', 'trang@gmail.com', '1234', 0, 17),
(6, 'Phung Van On', 'OnPV@gmail.com', '1', 1, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `csv`
--

CREATE TABLE `csv` (
  `msv` int(11) NOT NULL,
  `tenSV` varchar(100) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `vien` int(11) NOT NULL,
  `nganh` int(11) NOT NULL,
  `lop` int(11) NOT NULL,
  `nienKhoa` int(11) NOT NULL,
  `tenDN` varchar(255) NOT NULL,
  `loaiDN` int(11) NOT NULL,
  `diaChiDN` int(11) NOT NULL,
  `queQuan` int(11) NOT NULL,
  `viTri` varchar(255) NOT NULL,
  `thuNhap` int(20) NOT NULL,
  `ngay_nhap` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `csv`
--

INSERT INTO `csv` (`msv`, `tenSV`, `sdt`, `email`, `vien`, `nganh`, `lop`, `nienKhoa`, `tenDN`, `loaiDN`, `diaChiDN`, `queQuan`, `viTri`, `thuNhap`, `ngay_nhap`) VALUES
(1, 'aaaaa', '1111', '3i@gmail.com', 25, 17, 1, 1, 'VIETTEL', 1, 2, 31, 'Support', 11000000, '05-03-2024'),
(2, 'bbbbb', '2222', '4@gmail.com', 26, 18, 1, 3, 'HTML', 2, 1, 19, 'front', 12000000, '05-03-2024'),
(3, 'cccc', '3333', '5@gmail.com', 27, 17, 1, 1, 'CSS', 2, 2, 30, 'server', 13000000, '05-03-2024'),
(4, 'dd', '4444', '6@gmail.com', 28, 18, 1, 3, 'JAVASCRIPT', 1, 1, 20, 'administrator', 14000000, '05-03-2024'),
(5, 'aaaaa', '1111', '3i@gmail.com', 25, 17, 1, 1, 'VIETTEL', 1, 2, 31, 'Support', 11000000, '06-03-2024'),
(6, 'bbbbb', '2222', '4@gmail.com', 26, 18, 1, 3, 'HTML', 2, 1, 19, 'front', 12000000, '06-03-2024'),
(7, 'cccc', '3333', '5@gmail.com', 27, 17, 1, 1, 'CSS', 2, 2, 30, 'server', 13000000, '06-03-2024'),
(8, 'dd', '4444', '6@gmail.com', 28, 18, 1, 3, 'JAVASCRIPT', 1, 1, 20, 'administrator', 14000000, '06-03-2024'),
(11, 'eeee', '3333', '3i@gmail.com', 24, 17, 1, 1, 'FPT Telecom', 2, 2, 31, 'AI Engineer', 15000777, '05-03-2024'),
(12, 'gggg', '4444', '4@gmail.com', 25, 18, 1, 3, 'ACB', 1, 1, 19, 'take care', 10000000, '05-03-2024'),
(13, 'hhhh', '5555', '5@gmail.com', 26, 17, 1, 1, 'SCSS', 2, 2, 30, 'back', 16000777, '05-03-2024'),
(14, 'iiii', '6666', '6@gmail.com', 27, 18, 1, 3, 'PHP', 1, 1, 20, 'java', 12000000, '05-03-2024'),
(44, 'aaaaa', '1111', '3i@gmail.com', 25, 17, 1, 1, 'VIETTEL', 1, 2, 31, 'Support', 11000000, '06-03-2024'),
(45, 'aaaaa', '1111', '3i@gmail.com', 25, 17, 1, 1, 'VIETTEL', 1, 2, 31, 'Support', 11000000, '06-03-2024'),
(46, 'bbbbb', '2222', '4@gmail.com', 26, 18, 1, 3, 'HTML', 2, 1, 19, 'front', 12000000, '06-03-2024'),
(47, 'cccc', '3333', '5@gmail.com', 27, 17, 1, 1, 'CSS', 2, 2, 30, 'server', 13000000, '06-03-2024'),
(48, 'dd', '4444', '6@gmail.com', 28, 18, 1, 3, 'JAVASCRIPT', 1, 1, 20, 'administrator', 14000000, '06-03-2024'),
(60, 'aaaaa', '1111', '3i@gmail.com', 25, 17, 1, 1, 'VIETTEL', 1, 2, 31, 'Support', 11000000, '06-03-2024'),
(61, 'bbbbb', '2222', '4@gmail.com', 26, 18, 1, 3, 'HTML', 2, 1, 19, 'front', 12000000, '06-03-2024'),
(62, 'cccc', '3333', '5@gmail.com', 27, 17, 1, 1, 'CSS', 2, 2, 30, 'server', 13000000, '06-03-2024'),
(63, 'dd', '4444', '6@gmail.com', 28, 18, 1, 3, 'JAVASCRIPT', 1, 1, 20, 'administrator', 14000000, '06-03-2024'),
(64, 'Hồ Sỹ Thanh', '5555', '7@gmail.com', 28, 17, 2, 3, 'HTDox', 2, 3, 20, 'fullstack', 10000000, '06-03-2024'),
(2054800087, 'Phùng Văn Thái', '0967721298', 'PhungVanThai@gmail.com', 24, 17, 1, 1, 'AI Academy VN', 1, 2, 31, 'AI Engineer', 21000000, '05-03-2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachi`
--

CREATE TABLE `diachi` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `_code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diachi`
--

INSERT INTO `diachi` (`id`, `name`, `_code`) VALUES
(1, 'Hồ Chí Minh', 'SG'),
(2, 'Hà Nội', 'HN'),
(3, 'Đà Nẵng', 'DDN'),
(4, 'Bình Dương', 'BD'),
(5, 'Đồng Nai', 'DNA'),
(6, 'Khánh Hòa', 'KH'),
(7, 'Hải Phòng', 'HP'),
(8, 'Long An', 'LA'),
(9, 'Quảng Nam', 'QNA'),
(10, 'Bà Rịa Vũng Tàu', 'VT'),
(11, 'Đắk Lắk', 'DDL'),
(12, 'Cần Thơ', 'CT'),
(13, 'Bình Thuận  ', 'BTH'),
(14, 'Lâm Đồng', 'LDD'),
(15, 'Thừa Thiên Huế', 'TTH'),
(16, 'Kiên Giang', 'KG'),
(17, 'Bắc Ninh', 'BN'),
(18, 'Quảng Ninh', 'QNI'),
(19, 'Thanh Hóa', 'TH'),
(20, 'Nghệ An', 'NA'),
(21, 'Hải Dương', 'HD'),
(22, 'Gia Lai', 'GL'),
(23, 'Bình Phước', 'BP'),
(24, 'Hưng Yên', 'HY'),
(25, 'Bình Định', 'BDD'),
(26, 'Tiền Giang', 'TG'),
(27, 'Thái Bình', 'TB'),
(28, 'Bắc Giang', 'BG'),
(29, 'Hòa Bình', 'HB'),
(30, 'An Giang', 'AG'),
(31, 'Vĩnh Phúc', 'VP'),
(32, 'Tây Ninh', 'TNI'),
(33, 'Thái Nguyên', 'TN'),
(34, 'Lào Cai', 'LCA'),
(35, 'Nam Định', 'NDD'),
(36, 'Quảng Ngãi', 'QNG'),
(37, 'Bến Tre', 'BTR'),
(38, 'Đắk Nông', 'DNO'),
(39, 'Cà Mau', 'CM'),
(40, 'Vĩnh Long', 'VL'),
(41, 'Ninh Bình', 'NB'),
(42, 'Phú Thọ', 'PT'),
(43, 'Ninh Thuận', 'NT'),
(44, 'Phú Yên', 'PY'),
(45, 'Hà Nam', 'HNA'),
(46, 'Hà Tĩnh', 'HT'),
(47, 'Đồng Tháp', 'DDT'),
(48, 'Sóc Trăng', 'ST'),
(49, 'Kon Tum', 'KT'),
(50, 'Quảng Bình', 'QB'),
(51, 'Quảng Trị', 'QT'),
(52, 'Trà Vinh', 'TV'),
(53, 'Hậu Giang', 'HGI'),
(54, 'Sơn La', 'SL'),
(55, 'Bạc Liêu', 'BL'),
(56, 'Yên Bái', 'YB'),
(57, 'Tuyên Quang', 'TQ'),
(58, 'Điện Biên', 'DDB'),
(59, 'Lai Châu', 'LCH'),
(60, 'Lạng Sơn', 'LS'),
(61, 'Hà Giang', 'HG'),
(62, 'Bắc Kạn', 'BK'),
(63, 'Cao Bằng', 'CB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doanhnghiep`
--

CREATE TABLE `doanhnghiep` (
  `id` int(11) NOT NULL,
  `loaiDN` varchar(255) NOT NULL,
  `moTa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `doanhnghiep`
--

INSERT INTO `doanhnghiep` (`id`, `loaiDN`, `moTa`) VALUES
(1, 'Vốn nhà nước', ''),
(2, '100% vốn tư nhân', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id` int(255) NOT NULL,
  `tenLop` varchar(50) NOT NULL,
  `sl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id`, `tenLop`, `sl`) VALUES
(1, 'D09.48.01', 0),
(2, 'D09.48.02', 0),
(5, 'D09.48.03', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganhdaotao`
--

CREATE TABLE `nganhdaotao` (
  `id` int(11) NOT NULL,
  `tenNganh` varchar(255) NOT NULL,
  `vien` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nganhdaotao`
--

INSERT INTO `nganhdaotao` (`id`, `tenNganh`, `vien`) VALUES
(17, 'Tin ứng dụng', 24),
(18, 'Tài chính doanh nghiệp', 25),
(19, 'Ngân hàng ', 25),
(20, 'kiểm toán', 27),
(21, 'Kể toán', 27),
(22, 'Quản trị kinh doanh', 29),
(23, 'Kinh doanh thương mại', 29),
(24, 'luật kinh tế ', 26),
(25, 'Ngôn Ngữ anh ', 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nienkhoa`
--

CREATE TABLE `nienkhoa` (
  `id` int(11) NOT NULL,
  `nienKhoa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nienkhoa`
--

INSERT INTO `nienkhoa` (`id`, `nienKhoa`) VALUES
(1, '2020-2024'),
(3, '2019-2023'),
(4, '2018-2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vien`
--

CREATE TABLE `vien` (
  `id` int(100) NOT NULL,
  `tenVien` varchar(100) NOT NULL,
  `nganhDaoTao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vien`
--

INSERT INTO `vien` (`id`, `tenVien`, `nganhDaoTao`) VALUES
(24, 'Công nghệ thông tin', 0),
(25, 'Tài chính ngân hàng', 0),
(26, 'Viện pháp luật kinh tế ', 0),
(27, 'Kế Toán Kiểm Toán', 0),
(28, 'Ngôn ngữ anh', 0),
(29, 'Quản trị kinh doanh ', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cbvanphong`
--
ALTER TABLE `cbvanphong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nganhDaoTao` (`nganhDaoTao`);

--
-- Chỉ mục cho bảng `csv`
--
ALTER TABLE `csv`
  ADD PRIMARY KEY (`msv`),
  ADD KEY `diaChiDN` (`diaChiDN`),
  ADD KEY `queQuan` (`queQuan`),
  ADD KEY `khoa` (`vien`),
  ADD KEY `lop` (`lop`),
  ADD KEY `nienKhoa` (`nienKhoa`),
  ADD KEY `nganh` (`nganh`),
  ADD KEY `loaiDN` (`loaiDN`);

--
-- Chỉ mục cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `doanhnghiep`
--
ALTER TABLE `doanhnghiep`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nganhdaotao`
--
ALTER TABLE `nganhdaotao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vien` (`vien`);

--
-- Chỉ mục cho bảng `nienkhoa`
--
ALTER TABLE `nienkhoa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vien`
--
ALTER TABLE `vien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nganhDaoTao` (`nganhDaoTao`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cbvanphong`
--
ALTER TABLE `cbvanphong`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `diachi`
--
ALTER TABLE `diachi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `doanhnghiep`
--
ALTER TABLE `doanhnghiep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nganhdaotao`
--
ALTER TABLE `nganhdaotao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `nienkhoa`
--
ALTER TABLE `nienkhoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `vien`
--
ALTER TABLE `vien`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cbvanphong`
--
ALTER TABLE `cbvanphong`
  ADD CONSTRAINT `cbvanphong_ibfk_1` FOREIGN KEY (`nganhDaoTao`) REFERENCES `nganhdaotao` (`id`);

--
-- Các ràng buộc cho bảng `csv`
--
ALTER TABLE `csv`
  ADD CONSTRAINT `csv_ibfk_1` FOREIGN KEY (`diaChiDN`) REFERENCES `diachi` (`id`),
  ADD CONSTRAINT `csv_ibfk_2` FOREIGN KEY (`queQuan`) REFERENCES `diachi` (`id`),
  ADD CONSTRAINT `csv_ibfk_3` FOREIGN KEY (`vien`) REFERENCES `vien` (`id`),
  ADD CONSTRAINT `csv_ibfk_4` FOREIGN KEY (`lop`) REFERENCES `lop` (`id`),
  ADD CONSTRAINT `csv_ibfk_6` FOREIGN KEY (`nienKhoa`) REFERENCES `nienkhoa` (`id`),
  ADD CONSTRAINT `csv_ibfk_7` FOREIGN KEY (`nganh`) REFERENCES `nganhdaotao` (`id`),
  ADD CONSTRAINT `csv_ibfk_8` FOREIGN KEY (`loaiDN`) REFERENCES `doanhnghiep` (`id`);

--
-- Các ràng buộc cho bảng `nganhdaotao`
--
ALTER TABLE `nganhdaotao`
  ADD CONSTRAINT `nganhdaotao_ibfk_1` FOREIGN KEY (`vien`) REFERENCES `vien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
