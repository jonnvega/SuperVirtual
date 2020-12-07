-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2020 at 05:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SuperVirtual`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facturacion`
--

CREATE TABLE `tbl_facturacion` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasillos`
--

CREATE TABLE `tbl_pasillos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pasillos`
--

INSERT INTO `tbl_pasillos` (`id`, `descripcion`) VALUES
(1, 'bebidas'),
(2, 'lacteos'),
(3, 'granos'),
(4, 'carnes'),
(5, 'limpieza'),
(6, 'snacks'),
(8, 'frutas y verduras');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pedidos`
--

CREATE TABLE `tbl_pedidos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `monto` decimal(10,0) NOT NULL,
  `fecha_hora` date NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_repartidor` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `tipo_pago` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productos`
--

CREATE TABLE `tbl_productos` (
  `id` int(11) NOT NULL,
  `id_pasillo` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `description`) VALUES
(0, 'cliente'),
(1, 'admin'),
(2, 'empleado'),
(3, 'repartidor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_facturacion`
--
ALTER TABLE `tbl_facturacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_pedido` (`id_pedido`),
  ADD KEY `idx_producto` (`id_producto`);

--
-- Indexes for table `tbl_pasillos`
--
ALTER TABLE `tbl_pasillos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_empleado` (`id_empleado`),
  ADD KEY `idx_cliente` (`id_cliente`),
  ADD KEY `idx_repartidor` (`id_repartidor`);

--
-- Indexes for table `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_categoria` (`id_pasillo`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UniqueEmail` (`email`),
  ADD KEY `idx_role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_facturacion`
--
ALTER TABLE `tbl_facturacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pasillos`
--
ALTER TABLE `tbl_pasillos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_facturacion`
--
ALTER TABLE `tbl_facturacion`
  ADD CONSTRAINT `tbl_facturacion_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `tbl_pedidos` (`id`);

--
-- Constraints for table `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  ADD CONSTRAINT `tbl_pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_usuarios` (`id`),
  ADD CONSTRAINT `tbl_pedidos_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `tbl_usuarios` (`id`),
  ADD CONSTRAINT `tbl_pedidos_ibfk_3` FOREIGN KEY (`id_repartidor`) REFERENCES `tbl_usuarios` (`id`);

--
-- Constraints for table `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD CONSTRAINT `tbl_productos_ibfk_1` FOREIGN KEY (`id_pasillo`) REFERENCES `tbl_pasillos` (`id`);

--
-- Constraints for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`role`) REFERENCES `tbl_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
