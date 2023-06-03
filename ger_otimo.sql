-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2023 at 07:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ger_otimo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cadastro`
--

CREATE TABLE `tb_cadastro` (
  `id_usuario` int(11) NOT NULL,
  `cli_nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_cadastro`
--

INSERT INTO `tb_cadastro` (`id_usuario`, `cli_nome`, `email`, `senha`, `status`) VALUES
(1, 'Iraldo', 'iraldo@teste.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'baloi', 'baloi@teste.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'Ana', 'ana@teste.com.br', 'e10adc3949ba59abbe56e057f20f883e', 1),
(8, 'davi', 'davi@teste.com', 'b59c67bf196a4758191e42f76670ceba', 1),
(9, 'helio', 'sale@teste.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(10, 'nunes', 'nunes@teste.com', 'b59c67bf196a4758191e42f76670ceba', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_categoria`
--

INSERT INTO `tb_categoria` (`id_categoria`, `id_usuario`, `name`, `code`, `status`) VALUES
(1, 1, 'Electricos', '123EL', 1),
(2, 3, 'Bebe e crianÃ§a', '123BC', 1),
(3, 1, 'Alimentos', '123AL', 1),
(4, 1, 'Bebidas', '123BD', 1),
(5, 3, 'AgronegÃ³cios', '123AG', 1),
(6, 1, 'Outros', '123OT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_item`
--

CREATE TABLE `tb_item` (
  `id_item` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_item`
--

INSERT INTO `tb_item` (`id_item`, `id_produto`, `id_pedido`, `name`, `quantity`, `category`, `price`) VALUES
(1, 0, 3, '', 0, '', ''),
(2, 0, 4, '', 0, '', ''),
(3, 0, 5, 'name', 0, 'category', 'price'),
(4, 0, 6, 'name', 0, 'category', 'price'),
(5, 0, 16, 'name', 0, 'category', 'price'),
(6, 0, 22, '', 8999, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pedido`
--

CREATE TABLE `tb_pedido` (
  `id_pedido` int(11) NOT NULL,
  `data_pedido` datetime NOT NULL,
  `status` enum('Em Aberto','Pago','Cancelado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pedido`
--

INSERT INTO `tb_pedido` (`id_pedido`, `data_pedido`, `status`) VALUES
(1, '2023-06-02 00:00:00', 'Em Aberto'),
(2, '2023-06-02 00:00:00', 'Em Aberto'),
(3, '2023-06-02 00:00:00', 'Em Aberto'),
(4, '2023-06-02 00:00:00', 'Em Aberto'),
(5, '2023-06-02 00:00:00', 'Em Aberto'),
(6, '2023-06-02 00:00:00', 'Em Aberto'),
(7, '2023-06-02 00:00:00', 'Em Aberto'),
(8, '2023-06-02 00:00:00', 'Em Aberto'),
(9, '2023-06-02 00:00:00', 'Em Aberto'),
(10, '2023-06-02 00:00:00', 'Em Aberto'),
(11, '2023-06-02 00:00:00', 'Em Aberto'),
(12, '2023-06-02 00:00:00', 'Em Aberto'),
(13, '2023-06-02 00:00:00', 'Em Aberto'),
(14, '2023-06-02 00:00:00', 'Em Aberto'),
(15, '2023-06-02 00:00:00', 'Em Aberto'),
(16, '2023-06-03 00:00:00', 'Em Aberto'),
(17, '2023-06-03 00:00:00', 'Em Aberto'),
(18, '2023-06-03 00:00:00', 'Em Aberto'),
(19, '2023-06-03 00:00:00', 'Em Aberto'),
(20, '2023-06-03 00:00:00', 'Em Aberto'),
(21, '2023-06-03 00:00:00', 'Em Aberto'),
(22, '2023-06-03 00:00:00', 'Em Aberto');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produto`
--

CREATE TABLE `tb_produto` (
  `id_produto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_produto`
--

INSERT INTO `tb_produto` (`id_produto`, `id_usuario`, `photo`, `sku`, `name`, `price`, `quantity`, `category`, `description`, `status`) VALUES
(3, 3, 'foto_2019_146_14219_983.jpg', '123-RP1', 'Roupa de bebÃª RN', '35', '100', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer libero nibh, pulvinar quis rutrum sed, lacinia quis neque. Vivamus quis magna ac mi volutpat rutrum vel eu neque. Quisque a elementum purus. Sed at molestie lacus. Ut eu euismod tellus, non fringilla lorem. Cras vulputate, nulla eu vestibulum tempor, ipsum est egestas ligula, et egestas orci lacus et nunc. Praesent rutrum commodo est ut elementum. Proin ac felis justo. Nunc congue est tellus, at rhoncus orci semper lacinia. Aenean et sollicitudin sapien. Quisque non ante at ligula sollicitudin varius ac vitae arcu.', 1),
(4, 3, 'foto_2019_146_142140_994.jpg', '123-RP2', 'Roupinha de bebÃª', '45', '180', 'Bebe e crianÃ§a', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer libero nibh, pulvinar quis rutrum sed, lacinia quis neque. Vivamus quis magna ac mi volutpat rutrum vel eu neque. Quisque a elementum purus. Sed at molestie lacus. Ut eu euismod tellus, non fringilla lorem. Cras vulputate, nulla eu vestibulum tempor, ipsum est egestas ligula, et egestas orci lacus et nunc. Praesent rutrum commodo est ut elementum. Proin ac felis justo. Nunc congue est tellus, at rhoncus orci semper lacinia. Aenean et sollicitudin sapien. Quisque non ante at ligula sollicitudin varius ac vitae arcu.', 1),
(11, 1, 'foto_2023_151_22427_972.jpg', 'S23JHFN', 'Monitor gamer', '15000', '100', 'Electricos', 'monitor de umltima geracao', 1),
(12, 1, 'foto_2023_151_2259_395.jpg', 'tdcvh9', 'Sapato', '2500', '', 'Outros', 'ffff', 1),
(13, 1, 'foto_2023_151_4414_214.png', 'tdcvh9', 'Sapatilha', '2500', '50', '', 'nklknlm', 1),
(14, 1, 'foto_2023_151_155457_337.jpg', 'tdcvh9', 'roupa', '1500', '50', '', '', 1),
(16, 1, 'foto_64795a1b9c744.jpg', 'S23JHFN', 'tv', '1500', '8999', '', 'ffggffg', 1),
(17, 1, 'foto_647978c6adef1.png', 'S23JHFN', 'Samsung ', '17500', '50', 'Electronico', 'linkonioion', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `tb_item`
--
ALTER TABLE `tb_item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indexes for table `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_item`
--
ALTER TABLE `tb_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pedido`
--
ALTER TABLE `tb_pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_item`
--
ALTER TABLE `tb_item`
  ADD CONSTRAINT `tb_item_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `tb_pedido` (`id_pedido`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
