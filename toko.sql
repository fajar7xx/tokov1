-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 28, 2019 at 12:09 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `pass`, `nama_lengkap`, `created_at`) VALUES
('0ede7c3c-239e-11e9-9183-72f989c43de2', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'fajar setiawan siagian', '2019-01-29 15:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_pelanggan` varchar(50) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `pass_pelanggan` varchar(100) NOT NULL,
  `nm_pelanggan` varchar(255) NOT NULL,
  `telp_pelanggan` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_pelanggan`, `email_pelanggan`, `pass_pelanggan`, `nm_pelanggan`, `telp_pelanggan`, `alamat`, `registered`) VALUES
('4ad220de-42f5-424c-831f-17cd59cf08c1', 'aku@fajarsiagian.com', '25d55ad283aa400af464c76d713c07ad', 'siagian', '081264808425', 'jalan makmur gg dahia 36', '2019-02-27 12:30:33'),
('83f645ff-239e-11e9-9183-72f989c43de2', 'user@mail.com', '25d55ad283aa400af464c76d713c07ad', 'nama pelanggan', '081212341234', '', '2019-01-29 15:18:54'),
('83f66877-239e-11e9-9183-72f989c43de2', 'user2@mail.com', '25d55ad283aa400af464c76d713c07ad', 'namas siapa aja', '0612233111', '', '2019-01-29 15:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(10) NOT NULL,
  `nm_kota` varchar(100) NOT NULL,
  `tarif` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nm_kota`, `tarif`) VALUES
(1, 'Medan', '35000'),
(2, 'Jakarta', '20000'),
(3, 'Palembang', '23000'),
(4, 'Padang', '27500'),
(5, 'maluku', '45000'),
(6, 'bandung', '10000'),
(7, 'Bekasi', '19000'),
(8, 'Aceh', '38000');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` varchar(50) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `id_ongkir` int(10) NOT NULL,
  `total_orders` decimal(10,0) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `tarif` decimal(10,0) NOT NULL,
  `alamat_kirim` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `id_pelanggan`, `id_ongkir`, `total_orders`, `kota`, `tarif`, `alamat_kirim`, `created_at`) VALUES
('1a75832e-67f7-461a-9b0e-cfd4b654acbe', '83f645ff-239e-11e9-9183-72f989c43de2', 1, '231000', '', '0', '', '2019-02-22 16:51:38'),
('26202398-4558-4160-a566-ce0fdb762f69', '83f645ff-239e-11e9-9183-72f989c43de2', 7, '215000', '', '0', '', '2019-02-22 17:06:32'),
('2ea6d4fa-e71a-494b-9b9f-ecbbaae1c975', '83f645ff-239e-11e9-9183-72f989c43de2', 2, '216000', '', '0', '', '2019-02-22 17:06:27'),
('3a066863-cfa7-4b05-a754-8bd63447c860', '83f645ff-239e-11e9-9183-72f989c43de2', 2, '216000', '', '0', '', '2019-02-22 16:41:45'),
('42e66854-e6c8-4899-a397-d73a3fcda4f1', '83f645ff-239e-11e9-9183-72f989c43de2', 2, '216000', '', '0', '', '2019-02-22 17:14:43'),
('4898591d-06f1-4dbe-afbd-5d782fbe0dd5', '83f645ff-239e-11e9-9183-72f989c43de2', 5, '241000', '', '0', '', '2019-02-22 17:18:00'),
('508b5baa-6c18-431b-b3c8-f6da1b112182', '83f645ff-239e-11e9-9183-72f989c43de2', 2, '216000', '', '0', '', '2019-02-22 17:10:26'),
('543c0352-85d8-4767-ae41-838a97da33cf', '83f645ff-239e-11e9-9183-72f989c43de2', 1, '940000', '', '0', '', '2019-02-26 12:14:38'),
('5664b837-06e3-4ea7-b038-07782e64778a', '83f645ff-239e-11e9-9183-72f989c43de2', 2, '216000', '', '0', '', '2019-02-22 17:03:55'),
('595a7a7b-9db4-47cd-94f8-a4864a930dd6', '83f645ff-239e-11e9-9183-72f989c43de2', 1, '231000', '', '0', '', '2019-02-22 16:52:38'),
('61f67d64-fd76-4ac8-88a0-56da2f846b0b', '83f645ff-239e-11e9-9183-72f989c43de2', 7, '215000', '', '0', '', '2019-02-22 17:15:52'),
('676b85aa-e454-4f52-88bb-2bae7486fbe2', '83f645ff-239e-11e9-9183-72f989c43de2', 3, '219000', '', '0', '', '2019-02-22 17:11:31'),
('766cb598-239f-11e9-9183-72f989c43de2', '83f645ff-239e-11e9-9183-72f989c43de2', 1, '150000', '', '0', '', '2019-01-29 15:25:41'),
('766d0024-239f-11e9-9183-72f989c43de2', '83f645ff-239e-11e9-9183-72f989c43de2', 1, '231000', '', '0', '', '2019-01-29 15:25:41'),
('8531778c-d27e-47be-b789-40485b0a601a', '83f645ff-239e-11e9-9183-72f989c43de2', 1, '231000', '', '0', '', '2019-02-22 17:08:50'),
('8a4af2cd-a64d-4558-9b59-ba8ec85ca459', '83f66877-239e-11e9-9183-72f989c43de2', 1, '106000', 'Medan', '35000', 'jalan denai no. 176 20227', '2019-02-26 13:02:38'),
('a0790e59-e673-4797-9364-f4321cef6dda', '83f645ff-239e-11e9-9183-72f989c43de2', 1, '231000', '', '0', '', '2019-02-22 17:03:51'),
('c32a0e0d-be99-4cc6-997e-255d2347fbee', '83f645ff-239e-11e9-9183-72f989c43de2', 1, '231000', '', '0', '', '2019-02-22 17:09:42'),
('d7b4ffee-3aa6-4100-a1fb-fe4483f935eb', '83f645ff-239e-11e9-9183-72f989c43de2', 1, '231000', '', '0', '', '2019-02-22 17:02:14'),
('dce1713b-3bfe-490c-8696-2cd73549f5d6', '83f645ff-239e-11e9-9183-72f989c43de2', 8, '234000', '', '0', '', '2019-02-22 17:09:45'),
('ebec589a-88f3-4e7e-bf40-d94ae39e2468', '83f66877-239e-11e9-9183-72f989c43de2', 8, '528000', 'Aceh', '38000', '', '2019-02-26 12:51:58'),
('ee264e21-0643-4153-afbd-95a8cc008ff7', '83f645ff-239e-11e9-9183-72f989c43de2', 1, '231000', '', '0', '', '2019-02-22 17:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` varchar(50) NOT NULL,
  `id_orders` varchar(50) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `berat` decimal(10,0) NOT NULL,
  `sub_berat` decimal(10,0) NOT NULL,
  `sub_harga` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_orders`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `sub_berat`, `sub_harga`) VALUES
('0f58c59f-5bc5-4993-888f-628459da48af', '543c0352-85d8-4767-ae41-838a97da33cf', '99b1ce19-09db-48b8-929b-670e08bd5472', 1, 'sepatu adidas', '780000', '1000', '1000', '780000'),
('1d3c7bc5-9180-476a-bdcd-b6e7087b14ee', '42e66854-e6c8-4899-a397-d73a3fcda4f1', 'eccb4faf-239e-11e9-9183-72f989c43de2', 1, '', '0', '0', '0', '0'),
('2cc80dfd-97f8-4112-ac11-62a08b5fdf95', '61f67d64-fd76-4ac8-88a0-56da2f846b0b', 'eccb64f4-239e-11e9-9183-72f989c43de2', 1, '', '0', '0', '0', '0'),
('76425ce7-a0a1-42cb-9ec9-9913560eb9dd', 'ebec589a-88f3-4e7e-bf40-d94ae39e2468', 'b93c78d5-8e89-4a1a-aedd-0b5061a283bf', 2, 'dress merah panajng', '245000', '500', '1000', '490000'),
('82877532-2d5b-48cb-8fd0-3b84ceadb045', '8a4af2cd-a64d-4558-9b59-ba8ec85ca459', 'eccb64f4-239e-11e9-9183-72f989c43de2', 1, 'baju kaos anime L', '71000', '200', '200', '71000'),
('96c3cb58-a3d9-47c8-9f0a-f089dde542bf', '61f67d64-fd76-4ac8-88a0-56da2f846b0b', 'eccb4faf-239e-11e9-9183-72f989c43de2', 1, '', '0', '0', '0', '0'),
('b27e8729-90ea-4260-bf9f-045124203bbf', '676b85aa-e454-4f52-88bb-2bae7486fbe2', 'eccb4faf-239e-11e9-9183-72f989c43de2', 1, '', '0', '0', '0', '0'),
('c216d958-046e-4588-b898-ad013b13a91f', '42e66854-e6c8-4899-a397-d73a3fcda4f1', 'eccb64f4-239e-11e9-9183-72f989c43de2', 1, '', '0', '0', '0', '0'),
('cb579a57-a332-42b6-9ef2-84ba83fe3cf3', '676b85aa-e454-4f52-88bb-2bae7486fbe2', 'eccb64f4-239e-11e9-9183-72f989c43de2', 1, '', '0', '0', '0', '0'),
('cfa27762-f8db-4def-a424-6d4bb71309ff', '4898591d-06f1-4dbe-afbd-5d782fbe0dd5', 'eccb64f4-239e-11e9-9183-72f989c43de2', 1, '', '0', '0', '0', '0'),
('e6fe5c45-c148-43cd-9bb3-afbcbea9e87a', '543c0352-85d8-4767-ae41-838a97da33cf', 'eccb4faf-239e-11e9-9183-72f989c43de2', 1, 'celana jeans pria XL', '125000', '1000', '1000', '125000'),
('ea5232d5-0f8f-4099-b70d-9d550b7f4e67', '4898591d-06f1-4dbe-afbd-5d782fbe0dd5', 'eccb4faf-239e-11e9-9183-72f989c43de2', 1, '', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_produk` varchar(50) NOT NULL,
  `nm_products` varchar(100) NOT NULL,
  `harga` decimal(11,0) NOT NULL,
  `berat` int(11) NOT NULL,
  `img` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_produk`, `nm_products`, `harga`, `berat`, `img`, `deskripsi`, `created`) VALUES
('99b1ce19-09db-48b8-929b-670e08bd5472', 'sepatu adidas', '780000', 1000, 'chuttersnap-648751-unsplash.jpg', 'lorem ipsum aja ya', '2019-02-19 11:48:17'),
('b93c78d5-8e89-4a1a-aedd-0b5061a283bf', 'dress merah panajng', '245000', 500, 'tamara-bellis-422421-unsplash.jpg', 'dress merah panjang nampak sexy ketiak d pakai', '2019-02-19 11:49:10'),
('eccb4faf-239e-11e9-9183-72f989c43de2', 'celana jeans pria XL', '235000', 1000, 'WhatsApp Image 2018-03-26 at 19.08.31.jpeg', 'Loreman Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lobortis orci at commodo mattis. Morbi mollis velit a molestie posuere. Donec vel justo sit amet dui tempus pellentesque at laoreet metus. In sit amet egestas lorem, ut aliquet tortor. Vestibulum eu metus a lectus cursus tristique. Praesent non pretium sem. Morbi vitae tortor at nulla sollicitudin volutpat ac vitae arcu. Integer lorem risus, mattis non urna vitae, sagittis ornare erat.					', '2019-01-29 15:21:50'),
('eccb64f4-239e-11e9-9183-72f989c43de2', 'baju kaos anime L', '71000', 200, 'young-man-with-cap_23-2147646499.jpg', 'baju anime nya Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lobortis orci at commodo mattis. Morbi mollis velit a molestie posuere. Donec vel justo sit amet dui tempus pellentesque at laoreet metus. In sit amet egestas lorem, ut aliquet tortor. Vestibulum eu metus a lectus cursus tristique. Praesent non pretium sem. Morbi vitae tortor at nulla sollicitudin volutpat ac vitae arcu. Integer lorem risus, mattis non urna vitae, sagittis ornare erat.					', '2019-01-29 15:21:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`),
  ADD KEY `id_orders` (`id_orders`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD CONSTRAINT `pembelian_produk_ibfk_1` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id_orders`),
  ADD CONSTRAINT `pembelian_produk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `products` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
