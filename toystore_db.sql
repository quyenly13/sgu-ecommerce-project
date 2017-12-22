-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2017 at 02:19 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c2c_toys_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `ct_hoa_don`
--

CREATE TABLE `ct_hoa_don` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_hd` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `id_m` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ghi_chu_BH` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ct_hoa_don`
--

INSERT INTO `ct_hoa_don` (`id`, `id_hd`, `id_sp`, `id_m`, `so_luong`, `tong_tien`, `trang_thai`, `rating`, `created_at`, `updated_at`, `ghi_chu_BH`) VALUES
(1, 1, 1, 20, 1, 12000, 2, 1, '2017-12-22 01:13:03', '2017-12-22 01:15:15', '-'),
(2, 1, 9, 17, 1, 155000, 1, 0, '2017-12-22 01:13:03', '2017-12-22 01:13:03', '-'),
(3, 2, 3, 20, 1, 120000, 0, 0, '2017-12-22 01:17:05', '2017-12-22 01:17:05', NULL),
(4, 2, 23, 14, 2, 20000, 0, 0, '2017-12-22 01:17:05', '2017-12-22 01:17:05', NULL),
(5, 2, 7, 17, 5, 550000, 3, 0, '2017-12-22 01:17:05', '2017-12-22 01:17:05', '-');

-- --------------------------------------------------------

--
-- Table structure for table `ct_phieu_thu`
--

CREATE TABLE `ct_phieu_thu` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pthu` int(11) NOT NULL,
  `id_goitin` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `thanh_tien` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_c` int(10) UNSIGNED NOT NULL,
  `ten_dang_nhap` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_dai_dien` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ho_ten` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioi_tinh` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_c`, `ten_dang_nhap`, `password`, `email`, `anh_dai_dien`, `ho_ten`, `gioi_tinh`, `sdt`, `dia_chi`, `is_active`, `created_at`, `updated_at`, `remember_token`) VALUES
(2, 'KieuQuyen', '$2y$10$iMPihcu5B2JG6qDtUFYDEu51VWJt2quapyAbeh4gdAodNNHhwEhBG', ' lykieuquyen@gmail.com', NULL, 'Lý Kiều Quyên', '0', '01698347593', '44/6 Phan Xich Long Q.11', 0, '2017-12-18 14:46:25', '2017-12-18 14:46:25', 'YQBAu0JAiZ1P8LmE3cgcPefaiYRb8klyYQdM7wXqKCUGs0pGEPoVvkTCRmzQ'),
(3, 'MinhVu', '$2y$10$iMPihcu5B2JG6qDtUFYDEu51VWJt2quapyAbeh4gdAodNNHhwEhBG', 'phantangminhvu@gmail.com', NULL, 'Tăng Vũ', '0', '01698347592', '44/6 Phan Xich Long Q.11', 1, '2017-12-18 14:46:25', '2017-12-18 14:46:25', 'OZAsn6x0u8ZEasGNpNh6VwsMIXFSo7mTJRIpfc3GuxryZhcdrKtDkuQYcufq'),
(4, 'TieuLinh', '$2y$10$iMPihcu5B2JG6qDtUFYDEu51VWJt2quapyAbeh4gdAodNNHhwEhBG', 'nhutu160296@gmail.com', NULL, 'Hoàng Tiểu Linh', '0', '0983475922', '44/6 Phan Xich Long Q.11', 1, '2017-12-18 14:46:25', '2017-12-18 14:46:25', 'YQBAu0JAiZ1P8LmE3cgcPefaiYRb8klyYQdM7wXqKCUGs0pGEPoVvkTCRmzQ'),
(5, 'TieuVu', '$2y$10$iMPihcu5B2JG6qDtUFYDEu51VWJt2quapyAbeh4gdAodNNHhwEhBG', 'arsenalvu@gmail.com', NULL, 'Trịnh Tiểu Vũ', '0', '0983475942', '44/6 Phan Xich Long Q.11', 0, '2017-12-18 14:46:25', '2017-12-18 14:46:25', 'YQBAu0JAiZ1P8LmE3cgcPefaiYRb8klyYQdM7wXqKCUGs0pGEPoVvkTCRmzQ'),
(11, 'LePhong', '$2y$10$iMPihcu5B2JG6qDtUFYDEu51VWJt2quapyAbeh4gdAodNNHhwEhBG', 'twicesangmatsanglong@gmail.com', NULL, 'Lê Phong', '1', '0906772284', '44/6 Phan Xich Long Q.11', 1, '2017-12-18 14:46:25', '2017-12-18 14:46:25', 'YQBAu0JAiZ1P8LmE3cgcPefaiYRb8klyYQdM7wXqKCUGs0pGEPoVvkTCRmzQ'),
(12, 'DaiKhau', '$2y$10$iMPihcu5B2JG6qDtUFYDEu51VWJt2quapyAbeh4gdAodNNHhwEhBG', 'lyvandong20@gmail.com', NULL, 'Đại Khâu', '0', '01698247793', '44/6 Phan Xich Long Q.11', 1, '2017-12-18 14:46:25', '2017-12-18 14:46:25', 'YQBAu0JAiZ1P8LmE3cgcPefaiYRb8klyYQdM7wXqKCUGs0pGEPoVvkTCRmzQ'),
(13, 'Lina', '$2y$10$iMPihcu5B2JG6qDtUFYDEu51VWJt2quapyAbeh4gdAodNNHhwEhBG', 'lykieuquyen96@gmail.com', NULL, 'Nguyễn Linh Đan', '0', '01698337592', '44/6 Phan Xich Long Q.11', 0, '2017-12-18 14:46:25', '2017-12-18 14:46:25', 'YQBAu0JAiZ1P8LmE3cgcPefaiYRb8klyYQdM7wXqKCUGs0pGEPoVvkTCRmzQ'),
(15, 'TieuVu', '$2y$10$iMPihcu5B2JG6qDtUFYDEu51VWJt2quapyAbeh4gdAodNNHhwEhBG', 'arsenalvu1@gmail.com', NULL, 'Trịnh Tiểu Vũ', '0', '0983475452', '44/6 Phan Xich Long Q.11', 0, '2017-12-18 14:46:25', '2017-12-18 14:46:25', 'YQBAu0JAiZ1P8LmE3cgcPefaiYRb8klyYQdM7wXqKCUGs0pGEPoVvkTCRmzQ'),
(17, 'NhuAi', '$2y$10$QfBnSZnhbKhtBuoCDbQ84.LhNj48zMHghnKHr91TWnet7e7Rummhm', 'tuainhu160296@gmail.com', NULL, 'Từ Ái Như', '0', '0906772584', '44/6 Phan Xich Long Q.11', 1, '2017-12-18 16:33:53', '2017-12-18 16:57:48', 'WAcA0FYMtyGSwN64mASKCPLlCfRXWUbnboTvLb3nrIivPIkNLoh8O42lt2ne'),
(18, 'concop', '$2y$10$S/c/joqflelgq717Jh.Ka.RfbU6a8Y3iGwDZ8cIxfPZJLJk2rg4hS', 'nhutu16021996@gmail.com', NULL, 'con cop', '1', '0903475009', '30 nguyen tri phuong', 1, '2017-12-21 04:31:18', '2017-12-21 04:32:13', 'jRIDU9x4tkQMU461u9vlZTVnQcuhisaHhGHaDnRBiV4iRkj92esTzp4usFKN'),
(19, 'customerX', '$2y$10$czpEO2DzP1Lw6n18HQByJOTpHfD.9GdfrfswKRhTkbf4GDrnxJIV2', 'lykieuquyen@gmail.com', NULL, 'Customer A', '1', '0909009099', '273 An Dương Vương', 1, '2017-12-21 14:45:56', '2017-12-21 15:05:36', 'Cf8cg9tAx2y8O0yXkcSA8ILGNt4YlzFbvI37AZSLigHNG1GUdzgnrFSF4H9S'),
(20, 'customerY', '$2y$10$RAH84JcjljX0rBbpkw8xc.uKHljHtNLS8mZdtsy0wSHINI9yJZPJS', 'testdoanc2c@gmail.com', NULL, 'Merchant B', '1', '0909876576', '12 Nguyễn Thị Thập', 1, '2017-12-21 14:56:55', '2017-12-21 15:02:54', '1sIujku1PiwcU5BLUqSQDvecFfk6xeJCRxLsZGt6murAGgvHoc9vraprIEHT');

-- --------------------------------------------------------

--
-- Table structure for table `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_m` int(11) NOT NULL,
  `id_c` int(11) NOT NULL,
  `diem_so` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_gia`
--

INSERT INTO `danh_gia` (`id`, `id_m`, `id_c`, `diem_so`, `created_at`, `updated_at`) VALUES
(1, 20, 19, 3, '2017-12-22 01:15:15', '2017-12-22 01:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_danh_muc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `anh_dai_dien` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ten_danh_muc`, `mo_ta`, `created_at`, `updated_at`, `anh_dai_dien`) VALUES
(1, 'Đồ chơi ngoài trời', 'Đồ chơi ngoài trời', '2017-12-18 06:01:14', '2017-12-18 06:01:14', 'uploads/cat_img/cat1.png'),
(3, 'Đồ chơi hóa trang', 'Đồ chơi hóa trang thành các nhân vật', '2017-12-18 06:01:14', '2017-12-18 06:01:14', 'uploads/cat_img/cat3.png'),
(4, 'Đồ chơi thú nhồi bông', 'Gấu bông các loại đủ loại kích cỡ', '2017-12-18 06:01:14', '2017-12-18 06:01:14', 'uploads/cat_img/cat4.png'),
(5, 'Đồ chơi điều khiển', 'Đồ chơi búp bê cho trẻ em', '2017-12-18 06:01:14', '2017-12-18 06:01:14', 'uploads/cat_img/cat5.png'),
(6, 'Đồ chơi búp bê', 'Đồ chơi búp bê cho trẻ em', '2017-12-18 06:01:14', '2017-12-18 06:01:14', 'uploads/cat_img/cat6.png'),
(7, 'Đồ chơi nhân vật', 'Đồ chơi búp bê cho trẻ em', '2017-12-18 06:01:14', '2017-12-18 06:01:14', 'uploads/cat_img/cat7.png'),
(8, 'Đồ chơi xếp hình', 'Đồ chơi búp bê cho trẻ em', '2017-12-18 06:01:14', '2017-12-18 06:01:14', 'uploads/cat_img/cat8.png'),
(9, 'Đồ chơi giáo dục', 'Đồ chơi búp bê cho trẻ em', '2017-12-18 06:01:14', '2017-12-18 06:01:14', 'uploads/cat_img/cat9.png'),
(10, 'Đồ chơi truyển thống', 'Đồ chơi búp bê cho trẻ em', '2017-12-18 06:01:14', '2017-12-18 06:01:14', 'uploads/cat_img/sub1.png');

-- --------------------------------------------------------

--
-- Table structure for table `goi_tin`
--

CREATE TABLE `goi_tin` (
  `id` int(10) UNSIGNED NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goi_tin`
--

INSERT INTO `goi_tin` (`id`, `so_luong`, `don_gia`, `created_at`, `updated_at`) VALUES
(4, 20, 20000, '2017-12-18 06:09:03', '2017-12-18 06:09:03'),
(5, 50, 50000, '2017-12-18 06:09:03', '2017-12-18 06:09:03'),
(6, 100, 100000, '2017-12-18 06:09:03', '2017-12-18 06:09:03'),
(7, 200, 200000, '2017-12-18 06:09:03', '2017-12-18 06:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_c` int(11) NOT NULL,
  `dia_chi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu_KH` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SDT` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ghi_chu_BH` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`id`, `id_c`, `dia_chi`, `ghi_chu_KH`, `SDT`, `trang_thai`, `tong_tien`, `created_at`, `updated_at`, `ghi_chu_BH`) VALUES
(1, 19, '273 An Dương Vương', NULL, '0909009099', 0, 167000, '2017-12-22 01:13:03', '2017-12-22 01:13:03', NULL),
(2, 20, '12 Nguyễn Thị Thập', NULL, '0909876576', 0, 690000, '2017-12-22 01:17:05', '2017-12-22 01:17:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `id_m` int(10) UNSIGNED NOT NULL,
  `ten_dang_nhap` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_dai_dien` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `so_tk` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_cmnd` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong_tin` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`id_m`, `ten_dang_nhap`, `mat_khau`, `email`, `anh_dai_dien`, `ho_ten`, `gioi_tinh`, `sdt`, `dia_chi`, `trang_thai`, `so_tk`, `so_cmnd`, `so_luong_tin`, `created_at`, `updated_at`) VALUES
(12, 'HoangPhong', '$2y$10$cxf8tPf7RwXzaxIuymSsbODzGEQ.cAiUs4crOo1t4W/j9z0KJVR2O', 'arsenalvu@gmail.com', '', 'Nguyễn Hoàng Phong', 'Nam', '0904444333', '33 Nguyễn Trí Thanh Quận 3 Phường 5', 1, '3454367567', '444433332', 0, '2017-12-18 14:26:03', '2017-12-18 14:26:03'),
(13, 'ThienLong', '$2y$10$0c2vdYyqM3xo6sHQ4R0yKetdxvmcmilBLjFk2num9PyXZ4BHJzy2e', 'twicesangmatsanglong@gmail.com', '', 'Lạc Thiên Long', 'Nam', '0903434341', '45/4 Đường Môn Quận 6 Phường 9', 1, '3454367567', '567453456', 0, '2017-12-18 14:28:12', '2017-12-18 14:28:12'),
(14, 'MinhVu', '$2y$10$x0pHiaNFpxb4zkvTl2eDd.bMpULJodxbmOpz93MWwoO1K63FX5636', 'phantangminhvu@gmail.com', '', 'Phan Tăng Minh Vũ', 'Nam', '0906378438', '456/3 Nguyễn Biểu Quận 5', 1, '3454367567', '567795789', 42, '2017-12-18 14:31:52', '2017-12-18 16:07:28'),
(15, 'NgocLinh', '$2y$10$vA6a3xv0wL9FCSDJVovewewT6ArdbIrd3xnU3pTKYxMEgS2oj.YVq', 'nhutu160296@gmail.com', '', 'Nguyễn Ngọc Linh', 'Nam', '0906322141', '372 Tùng Thiện Vương Quận 8', 1, '2312387982', '049584985', 0, '2017-12-18 14:33:47', '2017-12-18 14:33:47'),
(16, 'MyKieu', '$2y$10$dV2C.agTODzbNwEJUQaxIe/emWNCciyrSBAk1OdAzderb65Y573JC', 'nhutu16021996@gmail.com', '', 'Trương Mỹ Kiều', 'Nữ', '0937715437', '44/6 Phan Xich Long Q.PN', 1, '2312387982', '534567999', 0, '2017-12-18 14:35:08', '2017-12-18 14:36:45'),
(17, 'merchantA', '$2y$10$MFXVk4nKy/SMGOG5F2H2F.zLMUS58YiU4.t7/vHfh9lgRBRnZ85VG', 'tuainhu160296@gmail.com', '', 'Từ Ái Như', 'Nữ', '0906772584', '44/6 Phan Xich Long Q.11', 1, '2312387982', '075943685', 10, '2017-12-18 14:36:11', '2017-12-21 15:38:26'),
(18, 'VanDong', '$2y$10$aA/L/ffZpPMitkDpQ2gYQuAI/F34yvTKjk3fmyRuAlKAiCjuPdMkS', 'lyvandong20@gmail.com', '', 'Lý Văn Đồng', 'Nữ', '0955673897', '45/9 Nhiêu Tâm Quận 3', 1, '2312387982', '458867546', 0, '2017-12-18 14:38:52', '2017-12-18 14:38:52'),
(19, 'TuyetVi', '$2y$10$zlm/zngEeLfS7dAqCg5g..C/.LbTrqJhpU2Xnyip3jEIi0J7XDdEm', 'lykieuquyen96@gmail.com', '', 'Phương Tuyết Vi', 'Nữ', '01236784364', '34 Trần Hưng Đạo Quận 5', 1, '2312387982', '345907564', 0, '2017-12-18 14:42:28', '2017-12-18 14:42:28'),
(20, 'merchantB', '$2y$10$RhisgJyrQkTZgyEWBySwK.4CyjkVTYkug73QmaIf9cuJoDhEJiet2', 'lykieuquyen@gmail.com', '', 'Lý Kiều Quyên', 'Nữ', '01687490563', '56 Phạm Văn Đồng Gò Vấp', 1, '2312387982', '573896468', 0, '2017-12-18 14:45:09', '2017-12-21 15:48:56'),
(23, 'conga', '$2y$10$hpNPQBnnkItbKaQCgL8n0O2FKtBdQAbufVJJMg./NDSZOBWwQKkQe', 'kimloanpt@gmail.com', '', 'kim loan', 'Nam', '0906772581', '30 nguyen traii', 1, '090490549505', '090909930', 0, '2017-12-21 04:09:32', '2017-12-21 04:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_08_212805_create_hoa_don_table', 1),
(4, '2017_11_08_212826_create_ct_hoa_don_table', 1),
(5, '2017_11_08_212852_create_ct_phieu_thu_table', 1),
(6, '2017_11_08_212917_create_phieu_thu_table', 1),
(7, '2017_11_08_212937_create_goi_tin_table', 1),
(8, '2017_11_08_213005_create_tai_khoan_bi_khoa_table', 1),
(9, '2017_11_08_213039_create_quan_tri_vien_table', 1),
(10, '2017_11_08_213107_create_san_pham_table', 1),
(11, '2017_11_08_213126_create_danh_muc_table', 1),
(12, '2017_11_08_213202_create_danh_gia_table', 1),
(13, '2017_11_10_113625_create_customer_table', 1),
(14, '2017_11_10_113643_create_merchant_table', 1),
(15, '2017_12_07_111658_add_anhdanhmuc_to_danhmuc_table', 1),
(16, '2017_12_10_011147_add_col_ghichu_bh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tuainhu160296@gmail.com', '$2y$10$JLr6fmZe2AvkpCMkIBcyjusgtBp/PhysKEldgMMgT4EU8Gt.s6wiu', '2017-12-18 16:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `phieu_thu`
--

CREATE TABLE `phieu_thu` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_m` int(11) NOT NULL,
  `id_goitin` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phieu_thu`
--

INSERT INTO `phieu_thu` (`id`, `id_m`, `id_goitin`, `so_luong`, `tong_tien`, `created_at`, `updated_at`) VALUES
(1, 17, 4, 1, 20000, '2017-12-18 15:03:00', '2017-12-18 15:03:00'),
(2, 14, 5, 1, 50000, '2017-12-18 15:31:21', '2017-12-18 15:31:21'),
(3, 23, 4, 1, 20000, '2017-12-21 04:18:41', '2017-12-21 04:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `quan_tri_vien`
--

CREATE TABLE `quan_tri_vien` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_dang_nhap` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quan_tri_vien`
--

INSERT INTO `quan_tri_vien` (`id`, `ten_dang_nhap`, `mat_khau`, `email`, `trang_thai`, `created_at`, `updated_at`) VALUES
(2, 'admin', '$2y$10$JUJFRIpnJs.zt9H0h6RODOWASwmOJdYygken.Mjyg7yaM9Qexkn22', 'admin@gmail.com', 1, '2017-12-21 16:01:19', '2017-12-21 16:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_san_pham` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_m` int(11) NOT NULL,
  `ma_danh_muc` int(11) NOT NULL,
  `so_luong_ton_kho` int(11) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `anh_dai_dien` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xuat_xu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten_san_pham`, `id_m`, `ma_danh_muc`, `so_luong_ton_kho`, `don_gia`, `anh_dai_dien`, `xuat_xu`, `mo_ta`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Đồ Chơi Hải Tặc Thú Vị Kiểu Mới T205 - 2017 US04165', 20, 10, 11, 12000, 'uploads/do_choi_hai_tac.jpg', 'Trung Quốc', 'Thiết kế độc đáo – sáng tạo\r\n                            Tạo không khí vui nhộn, càng đông càng vui\r\n                            Phù hợp chơi theo nhóm, rất cân não\r\n                            Thích hợp làm trò giải trí trong các quán café, book shop, giải trí tại nhà….\r\n                            Chất liệu nhựa loại 1 – Giúp sản phẩm bền, chịu va đập.\r\n                            Cách chơi:\r\n\r\n                            - Người chơi sử dụng thanh kiếm cho sẵn lần lượt đâm vào thân Hải Tặc\r\n\r\n                            - Khi đâm trúng Hải Tặc , thân hải tặc sẽ bay lên và người chơi thắng', 1, '2017-12-18 06:01:14', '2017-12-22 01:13:03'),
(2, 'Bộ bài Uno Giấy cứng Legaxi UNO1', 20, 10, 8, 30000, 'uploads/uno.jpg', 'Việt Nam', '- Một bộ bài UNO bao gồm 108 quân bài gồm:\r\n                            + 4 màu Đỏ, Xanh dương, Xanh lá và Vàng.\r\n                            + Mỗi màu sẽ có những con số từ 1 - 9 và những lá bài có kí hiệu.', 1, '2017-12-18 06:01:14', '2017-12-21 14:58:16'),
(3, 'Con quay 3 cánh đồng Sakura T7-005 ', 20, 10, 49, 120000, 'uploads/con_quay.jpg', 'Việt Nam', 'Spinner là một sản phẩm EDC (everyday carry - luôn mang theo bên người), có thể giúp loại bỏ sự bồn chồn, lo lắng, hồi hộp;\r\nGiúp tăng tính kiên nhẫn và khả năng tập trung.\r\nNgoài ra spinner là một đồ chơi high-end dành cho những người yêu thích các sản phẩm cơ khí chính xác cao.', 1, '2017-12-18 06:01:14', '2017-12-22 01:17:05'),
(4, 'Bộ trò chơi khám răng cá sấu OEM (Xanh)  ', 20, 10, 12, 15000, 'uploads/ca_sau.jpg', 'Việt Nam', 'Khám răng cá sấu là món đồ chơi hết sức vui nhộn dành cho trẻ em hoặc\r\n                 cả gia đình cùng chơi. Nó tạo cho người chơi sự hồi hộp và bất ngờ, một cảm giác\r\n                  thú vị khi bạn chạm vào chiếc răng cá sấu và bị cả cái hàm to , khỏe cắn lấy ngón tay của bạn.', 1, '2017-12-18 06:01:14', '2017-12-18 06:01:14'),
(5, 'Bộ đồ chơi phi tiêu Dart Board cao cấp ', 20, 10, 12, 40000, 'uploads/phi_tieu.jpg', 'Việt Nam', 'Bộ sản phẩm gồm 1 bảng gỗ cứng được viền kim loại, nhằm đảm bảo cho sản phẩm giữ nguyên\r\n                được hình dáng cả khi bị rơi rớt. Phần phi tiêu có tay cầm bằng nhựa cứng và đầu nhọn bằng kim loại,\r\n                cho người dùng có thể dễ dàng phóng và ghi phi tiêu vào bảng. Thiết kế 2 mặt độc đáo Phần bảng gỗ\r\n                được thiết kế mặt số khác nhau ở cả 2 mặt, giúp cho người dùng có thể thay đổi cách chơi một cách\r\n                linh động và lý thú. Phần mặt số được gai công kĩ lưỡng, sắc nét và giữ nguyên được màu sắc vốn có sau một thời gian sử dụng. Kích thước nhỏ gọn và tiện lợi Sản phẩm được thiết kế nhỏ gọn với phần móc treo chắc chắn, giúp cho người dùng có thể treo sản phẩm ở bất cứ đâu trong gia đình, nơi làm việc và học tập cá nhân. Người dùng có thể chơi cùng bạn bè, đồng nghiệp vào bất cứ khi nào cảm thấy căng thẳng, buồn phiền,…', 1, '2017-12-18 06:01:14', '2017-12-18 06:01:14'),
(6, 'Đồ chơi Con quay giảm Stress 3 cánh -hàng nhập khẩu  ', 20, 10, 120, 59000, 'uploads/con_quay_dong.jpg', 'Việt Nam', 'Giảm căng thẳng, áp lực\r\n                            Giúp thoải mái, giải toả căng thẳng\r\n                            Giúp tăng tính kiên nhẫn và khả năng tập trung.\r\n                            Trò chơi\r\n                            Luyện tập kỹ năng\r\n                            Nhỏ gọn\r\n                            Chất liệu: nhựa', 1, '2017-12-18 06:01:14', '2017-12-18 06:01:14'),
(7, 'Đồ chơi vải lông dạng chú gấu trúc lớn dễ thương', 17, 4, 20, 110000, 'uploads/tmgTpySaQ_gau_truc_bong.jpg', 'Viêt nam', '1. Kích cỡ: 18CM,22CM,30CM,40CM\r\n2. Màu: như trong ảnh\r\n3. Vật liệu: Cotton PP tốt', 1, NULL, '2017-12-22 01:18:06'),
(8, 'Gấu bông Mama & Papa đáng yêu cho bé', 17, 4, 16, 86000, 'uploads/h5TqTKsDO_gau_mama.jpg', 'Trung quốc', '- Thú bông xinh xắn, gương mặt ngộ nghĩnh trông đáng yêu\r\n- Chất liệu vải bông mềm mại, không bị xù lông khi sử dụng lâu ngày hay lúc vệ sinh, vải bông an toàn cho bé sử dụng\r\n- Chiếc nơ nhỏ xinh xắn ở cổ giúp chú gấu thêm phần đáng yêu\r\n- Hình ảnh chú gấu xinh xắn, đường cắt may tỉ mỉ\r\n- Dành cho bé từ sơ sinh trở lên', 1, NULL, '2017-12-21 14:58:16'),
(9, 'Gấu bông gối ôm Brown Line cao cấp cho bé size 50cm', 17, 4, 18, 155000, 'uploads/QacUjJlcQ_goi_gau_cong.jpg', 'Việt nam', '•	Ruột gối được làm bằng chất liệu bông cực kỳ mềm mại, êm ái và đàn hồi.\r\n•	Kích thước: dài 1m là khổ vải vỏ trước khi nhồi gòn, đường kính 30cm.\r\n•	Áo sọc của gấu màu sắc ngẫu nhiên', 1, NULL, '2017-12-22 01:13:03'),
(10, 'Gấu bông mèo MengMeng 30cm', 17, 4, 20, 81000, 'uploads/tYDtOlHmi_melmel.jpg', 'Đài Loan', '•	Chất liệu bông mềm mại\r\n•	Chất liệu an toàn\r\n•	Thiết kế xinh xắn; dễ thương\r\n•	Là món quà lí tưởng cho người thân & bạn bè\r\n•	Kích thước : dài 30cm, rộng 20cm', 1, NULL, NULL),
(11, 'Thú nhồi bông Voi xám cho bé', 17, 4, 20, 140000, 'uploads/Zsm9yI4wa_voi_bong.jpg', 'Hàn Quốc', '+ Làm bằng chất liệu vải lông, không xổ lông\r\n+ Gia công rất tốt, đường may chắc chắn\r\n+ Giúp bé có những giấc ngủ ngon, an toàn\r\n+ Có thể dùng cả cho mẹ và bé\r\n+ Chất liệu: 100 % polyester\r\n+ Rộng:  (45 cm)\r\n+ Cao:  (23 cm)\r\n+ Dài: (53 cm)\r\n+ Cân nặng : 1 lb 11 oz (0.76 kg)', 1, NULL, NULL),
(12, 'GẤU BÔNG BROWN NÂU - 60cm', 17, 4, 20, 131000, 'uploads/jAFzjb4dd_gau_nau.jpg', 'Việt nam', '•	Chất Iiệu an toàn tuyệt đối với mọi độ tuổi\r\n•	100% gòn không độn vải mút\r\n•	Lông gấu mềm mịn, dày dặn\r\n•	Mẫu mã tuyệt đỉnh, chi li đến từng đường chỉ', 1, NULL, NULL),
(13, 'Khủng long nhồi bông tinh nghịch PKSR', 17, 4, 20, 77000, 'uploads/MybsCBKbB_khung_long.jpg', 'Việt nam', 'Chất liệu : Lông Layer Kích thước : 40cm', 1, NULL, NULL),
(14, 'Ngựa Pony cao 14cm', 17, 4, 20, 37000, 'uploads/r9zumEMhG_pony.jpg', 'Trung quốc', 'Làm từ chất liệu vải lông nỉ nhung mịn mượt, không xù', 1, NULL, NULL),
(15, 'Thú nhồi bông angry bird', 17, 4, 20, 58000, 'uploads/Jxww92G0y_angryb.jpg', 'Việt nam', 'Hình ảnh chụp thật 100%\r\n•  Lông gấu mềm mịn, dày dặn\r\n•  Chất Iiệu an toàn tuyệt đối với mọi độ tuổi\r\n•  Kích thước : Cao 18 cm , rộng 8 inch', 1, NULL, NULL),
(16, 'Thú bông Bobby Chan mặc áo vest đeo nơ - 26cm', 17, 4, 20, 40000, 'uploads/b5IbAnguZ_puppy.jpg', 'Việt nam', 'Thú bông Bobby Chan siêu đáng yêu cho bé\r\n•  Được làm từ chất liệu bông cao cấp không gây hại cho bé\r\n•  Phù hợp với nhiều độ tuổi\r\n•  Kích thước 26cm', 1, NULL, NULL),
(17, 'Bộ Đồ Chơi Xếp Hình Bằng Nhựa Nhiều Màu Sắc', 14, 8, 18, 80000, 'uploads/do_choi_xep_hinh_bang_nhua.jpg', 'Việt nam', 'Giúp trẻ sáng tạo', 1, NULL, '2017-12-21 14:49:33'),
(18, 'Đồ Chơi Xếp Hình Biệt Đội Robot Antona AT012', 14, 8, 20, 120000, 'uploads/do_choi_xep_hinh_antona.jpg', 'Việt nam', 'Giúp trẻ tư duy sáng tạo', 1, NULL, NULL),
(19, 'Đồ Chơi Xếp Hình Lego Xe Máy Xúc - Lego Duplo 10812', 14, 1, 20, 200000, 'uploads/lego_xe_may_xuc.jpg', 'Hà Lan', 'Giúp trẻ tư duy sáng tạo', 1, NULL, NULL),
(20, 'Bảng chữ cái mini', 14, 9, 20, 45000, 'uploads/bang_chu_cai.png', 'Việt nam', 'Bảng chữ cái abc giúp trẻ tự học', 1, NULL, NULL),
(21, 'Bộ học kỹ năng Kibu', 14, 9, 20, 45000, 'uploads/hoc_ki_nang_kibu.jpg', 'Trung quốc', 'Liên hệ để biết thêm chi tiết', 1, NULL, NULL),
(22, 'Ngôi nhà thả số', 14, 9, 20, 20000, 'uploads/do_choi_xep_hinh_bang_nhua.jpg', 'Trung quốc', 'Vừa học số vừa chơi', 1, NULL, NULL),
(23, 'Combo 2 kính vạn hoa cho bé', 14, 10, 17, 10000, 'uploads/kinh_van_hoa.jpg', 'Việt nam', 'Hình ảnh sinh động', 1, NULL, '2017-12-22 01:17:05'),
(24, 'con meo', 23, 1, 2, 20000, 'uploads/wvBTAopyt14G7P2coO.jpg', 'Việt Nam', 'jfksdjfksj', 1, NULL, '2017-12-21 04:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan_bi_khoa`
--

CREATE TABLE `tai_khoan_bi_khoa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_m` int(11) NOT NULL,
  `id_w` int(11) NOT NULL,
  `li_do` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ct_hoa_don`
--
ALTER TABLE `ct_hoa_don`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ct_phieu_thu`
--
ALTER TABLE `ct_phieu_thu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_c`),
  ADD UNIQUE KEY `customer_email_unique` (`email`),
  ADD UNIQUE KEY `customer_sdt_unique` (`sdt`);

--
-- Indexes for table `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goi_tin`
--
ALTER TABLE `goi_tin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`id_m`),
  ADD UNIQUE KEY `merchant_email_unique` (`email`),
  ADD UNIQUE KEY `merchant_sdt_unique` (`sdt`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `phieu_thu`
--
ALTER TABLE `phieu_thu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quan_tri_vien`
--
ALTER TABLE `quan_tri_vien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tai_khoan_bi_khoa`
--
ALTER TABLE `tai_khoan_bi_khoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ct_hoa_don`
--
ALTER TABLE `ct_hoa_don`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ct_phieu_thu`
--
ALTER TABLE `ct_phieu_thu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_c` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `goi_tin`
--
ALTER TABLE `goi_tin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `id_m` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `phieu_thu`
--
ALTER TABLE `phieu_thu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quan_tri_vien`
--
ALTER TABLE `quan_tri_vien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tai_khoan_bi_khoa`
--
ALTER TABLE `tai_khoan_bi_khoa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
