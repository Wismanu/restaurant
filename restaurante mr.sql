-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2022 a las 15:05:17
-- Versión del servidor: 8.0.29
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `COD_ACCESO` varchar(8) NOT NULL,
  `GRADO_ACCESO_GRADO` varchar(45) NOT NULL,
  `CARGO_CARGO` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrio`
--

CREATE TABLE `barrio` (
  `COD_BARRIO` int NOT NULL,
  `COMUNA_COD_COMUNA` int NOT NULL,
  `NOMBRE` varchar(25) NOT NULL,
  `COMUNA_COD_COMUNA1` int NOT NULL,
  `COMUNA_CIUDAD_DEPARTAMENTO_COD_DEPARTAMENTO` int NOT NULL,
  `COMUNA_CIUDAD_COD_CIUDAD` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `CARGO` varchar(45) NOT NULL,
  `DESCRIPCION` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `COD_CIUDAD` int NOT NULL,
  `NOMBRE` varchar(45) NOT NULL,
  `DEPARTAMENTO_COD_DEPARTAMENTO` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID_CLIENTE` int NOT NULL,
  `NOMBRE1` varchar(25) NOT NULL,
  `NOMBRE2` varchar(25) DEFAULT NULL,
  `APELLIDO1` varchar(25) NOT NULL,
  `APELLIDO2` varchar(25) NOT NULL,
  `DNI` varchar(12) DEFAULT NULL,
  `TELEFONO` varchar(15) DEFAULT NULL,
  `DIRECCION` varchar(20) NOT NULL,
  `BARRIO_COD_BARRIO` int NOT NULL,
  `BARRIO_COMUNA_COD_COMUNA` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE `comuna` (
  `COD_COMUNA` int NOT NULL,
  `NOMBRE` varchar(45) NOT NULL,
  `KMS_2` varchar(45) NOT NULL,
  `CIUDAD_COD_CIUDAD` int NOT NULL,
  `CIUDAD_DEPARTAMENTO_COD_DEPARTAMENTO` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `COD_DEPARTAMENTO` int NOT NULL,
  `NOMBRE` varchar(45) NOT NULL,
  `DESCRIPCION` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `PROVEEDOR_NIT` varchar(20) NOT NULL,
  `FACTURA_CONSECUTIVO` int NOT NULL,
  `CANTIDAD` int DEFAULT NULL,
  `VALOR_VENTA` varchar(45) NOT NULL,
  `SUBTOTAL` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `PEDIDO_ID_PEDIDO` int NOT NULL,
  `PRODUCTO_COD_PRUDUCTO` int NOT NULL,
  `CANTIDAD` int NOT NULL,
  `SUBTOTAL` varchar(45) NOT NULL,
  `PEDIDO_MESA_MESA_NUMERO` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ID_EMPLEADO` int NOT NULL,
  `DNI` varchar(12) DEFAULT NULL,
  `NOMBRE1` varchar(25) NOT NULL,
  `NOMBRE2` varchar(25) DEFAULT NULL,
  `APELLIDO1` varchar(25) DEFAULT NULL,
  `APELLIDO2` varchar(25) DEFAULT NULL,
  `DIRECCION` varchar(45) DEFAULT NULL,
  `ACCESO_COD_ACCESO` varchar(8) NOT NULL,
  `CARGO_CARGO` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `CONSECUTIVO` int NOT NULL,
  `FECHA_COMPRA` timestamp(6) NOT NULL,
  `TOTAL` decimal(10,0) NOT NULL,
  `PEDIDO_ID_PEDIDO` int NOT NULL,
  `PEDIDO_MESA_MESA_NUMERO` varchar(2) NOT NULL,
  `CLIENTE_ID_CLIENTE` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_acceso`
--

CREATE TABLE `grado_acceso` (
  `GRADO` varchar(45) NOT NULL,
  `DESCRIPCION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `MESA_NUMERO` varchar(2) NOT NULL,
  `CANT_SILLAS` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `ID_PEDIDO` int NOT NULL,
  `MESA_MESA_NUMERO` varchar(2) NOT NULL,
  `EMPLEADO_ID_EMPLEADO` int NOT NULL
) ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `COD_PRUDUCTO` int NOT NULL,
  `NOMBRE` varchar(45) NOT NULL,
  `PRECIO_UNITARIO` decimal(10,0) NOT NULL,
  `PROVEEDOR_NIT` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `NIT` varchar(20) NOT NULL,
  `NOMBRE` varchar(45) NOT NULL,
  `DIRECCION` varchar(45) NOT NULL,
  `BARRIO_COD_BARRIO` int NOT NULL,
  `BARRIO_COMUNA_COD_COMUNA` int NOT NULL,
  `BARRIO_COMUNA_COD_COMUNA1` int NOT NULL,
  `BARRIO_COMUNA_CIUDAD_DEPARTAMENTO_COD_DEPARTAMENTO` int NOT NULL,
  `BARRIO_COMUNA_CIUDAD_COD_CIUDAD` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`COD_ACCESO`),
  ADD KEY `fk_ACCESO_GRADO_ACCESO_idx` (`GRADO_ACCESO_GRADO`),
  ADD KEY `fk_ACCESO_CARGO1_idx` (`CARGO_CARGO`);

--
-- Indices de la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD PRIMARY KEY (`COD_BARRIO`,`COMUNA_COD_COMUNA`,`COMUNA_COD_COMUNA1`,`COMUNA_CIUDAD_DEPARTAMENTO_COD_DEPARTAMENTO`,`COMUNA_CIUDAD_COD_CIUDAD`),
  ADD UNIQUE KEY `COD_BARRIO_UNIQUE` (`COD_BARRIO`),
  ADD KEY `fk_CIUDAD_COMUNA1_idx` (`COMUNA_COD_COMUNA1`,`COMUNA_CIUDAD_DEPARTAMENTO_COD_DEPARTAMENTO`,`COMUNA_CIUDAD_COD_CIUDAD`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`CARGO`),
  ADD UNIQUE KEY `CARGO_UNIQUE` (`CARGO`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`COD_CIUDAD`,`DEPARTAMENTO_COD_DEPARTAMENTO`),
  ADD UNIQUE KEY `NOMBRE_UNIQUE` (`NOMBRE`),
  ADD KEY `fk_CIUDAD_DEPARTAMENTO1_idx` (`DEPARTAMENTO_COD_DEPARTAMENTO`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_CLIENTE`),
  ADD UNIQUE KEY `ID_CLIENTE_UNIQUE` (`ID_CLIENTE`),
  ADD KEY `fk_CLIENTE_BARRIO1_idx` (`BARRIO_COD_BARRIO`,`BARRIO_COMUNA_COD_COMUNA`);

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`COD_COMUNA`,`CIUDAD_DEPARTAMENTO_COD_DEPARTAMENTO`,`CIUDAD_COD_CIUDAD`),
  ADD UNIQUE KEY `COD_COMUNA_UNIQUE` (`COD_COMUNA`),
  ADD KEY `fk_COMUNA_CIUDAD1_idx` (`CIUDAD_COD_CIUDAD`,`CIUDAD_DEPARTAMENTO_COD_DEPARTAMENTO`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`COD_DEPARTAMENTO`),
  ADD UNIQUE KEY `NOMBRE_UNIQUE` (`NOMBRE`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`PROVEEDOR_NIT`,`FACTURA_CONSECUTIVO`),
  ADD UNIQUE KEY `PROVEEDOR_NIT_UNIQUE` (`PROVEEDOR_NIT`),
  ADD UNIQUE KEY `FACTURA_CONSECUTIVO_UNIQUE` (`FACTURA_CONSECUTIVO`),
  ADD KEY `fk_DETALLE_FACTURA_PROVEEDOR1_idx` (`PROVEEDOR_NIT`),
  ADD KEY `fk_DETALLE_FACTURA_FACTURA1_idx` (`FACTURA_CONSECUTIVO`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`PEDIDO_ID_PEDIDO`,`PRODUCTO_COD_PRUDUCTO`),
  ADD UNIQUE KEY `PEDIDO_ID_PEDIDO_UNIQUE` (`PEDIDO_ID_PEDIDO`),
  ADD UNIQUE KEY `PRODUCTO_COD_PRUDUCTO_UNIQUE` (`PRODUCTO_COD_PRUDUCTO`),
  ADD KEY `fk_DETALLE_PEDIDO_PRODUCTO1_idx` (`PRODUCTO_COD_PRUDUCTO`),
  ADD KEY `fk_DETALLE_PEDIDO_PEDIDO1_idx` (`PEDIDO_ID_PEDIDO`,`PEDIDO_MESA_MESA_NUMERO`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ID_EMPLEADO`),
  ADD UNIQUE KEY `ID_EMPLEADO_UNIQUE` (`ID_EMPLEADO`),
  ADD UNIQUE KEY `DNI_UNIQUE` (`DNI`),
  ADD KEY `fk_EMPLEADO_ACCESO1_idx` (`ACCESO_COD_ACCESO`),
  ADD KEY `fk_EMPLEADO_CARGO1_idx` (`CARGO_CARGO`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`CONSECUTIVO`),
  ADD UNIQUE KEY `CONSECUTIVO_UNIQUE` (`CONSECUTIVO`),
  ADD KEY `fk_FACTURA_PEDIDO1_idx` (`PEDIDO_ID_PEDIDO`,`PEDIDO_MESA_MESA_NUMERO`),
  ADD KEY `fk_FACTURA_CLIENTE1_idx` (`CLIENTE_ID_CLIENTE`);

--
-- Indices de la tabla `grado_acceso`
--
ALTER TABLE `grado_acceso`
  ADD PRIMARY KEY (`GRADO`),
  ADD UNIQUE KEY `GRADO_UNIQUE` (`GRADO`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`MESA_NUMERO`),
  ADD UNIQUE KEY `NUM_MESA_UNIQUE` (`MESA_NUMERO`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID_PEDIDO`,`MESA_MESA_NUMERO`),
  ADD UNIQUE KEY `ID_PEDIDO_UNIQUE` (`ID_PEDIDO`),
  ADD KEY `fk_PEDIDO_MESA1_idx` (`MESA_MESA_NUMERO`),
  ADD KEY `fk_PEDIDO_EMPLEADO1_idx` (`EMPLEADO_ID_EMPLEADO`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`COD_PRUDUCTO`),
  ADD UNIQUE KEY `NOMBRE_UNIQUE` (`COD_PRUDUCTO`),
  ADD KEY `fk_PRODUCTO_PROVEEDOR1_idx` (`PROVEEDOR_NIT`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`NIT`),
  ADD UNIQUE KEY `NIT_UNIQUE` (`NIT`),
  ADD KEY `fk_PROVEEDOR_BARRIO1_idx` (`BARRIO_COD_BARRIO`,`BARRIO_COMUNA_COD_COMUNA`,`BARRIO_COMUNA_COD_COMUNA1`,`BARRIO_COMUNA_CIUDAD_DEPARTAMENTO_COD_DEPARTAMENTO`,`BARRIO_COMUNA_CIUDAD_COD_CIUDAD`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barrio`
--
ALTER TABLE `barrio`
  MODIFY `COD_BARRIO` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `COD_CIUDAD` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_CLIENTE` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comuna`
--
ALTER TABLE `comuna`
  MODIFY `COD_COMUNA` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `COD_DEPARTAMENTO` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `ID_EMPLEADO` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `CONSECUTIVO` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `COD_PRUDUCTO` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `fk_ACCESO_CARGO1` FOREIGN KEY (`CARGO_CARGO`) REFERENCES `cargo` (`CARGO`),
  ADD CONSTRAINT `fk_ACCESO_GRADO_ACCESO` FOREIGN KEY (`GRADO_ACCESO_GRADO`) REFERENCES `grado_acceso` (`GRADO`);

--
-- Filtros para la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD CONSTRAINT `fk_CIUDAD_COMUNA1` FOREIGN KEY (`COMUNA_COD_COMUNA1`,`COMUNA_CIUDAD_DEPARTAMENTO_COD_DEPARTAMENTO`,`COMUNA_CIUDAD_COD_CIUDAD`) REFERENCES `comuna` (`COD_COMUNA`, `CIUDAD_DEPARTAMENTO_COD_DEPARTAMENTO`, `CIUDAD_COD_CIUDAD`);

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_CIUDAD_DEPARTAMENTO1` FOREIGN KEY (`DEPARTAMENTO_COD_DEPARTAMENTO`) REFERENCES `departamento` (`COD_DEPARTAMENTO`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_CLIENTE_BARRIO1` FOREIGN KEY (`BARRIO_COD_BARRIO`,`BARRIO_COMUNA_COD_COMUNA`) REFERENCES `barrio` (`COD_BARRIO`, `COMUNA_COD_COMUNA`);

--
-- Filtros para la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD CONSTRAINT `fk_COMUNA_CIUDAD1` FOREIGN KEY (`CIUDAD_COD_CIUDAD`,`CIUDAD_DEPARTAMENTO_COD_DEPARTAMENTO`) REFERENCES `ciudad` (`COD_CIUDAD`, `DEPARTAMENTO_COD_DEPARTAMENTO`);

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `fk_DETALLE_FACTURA_FACTURA1` FOREIGN KEY (`FACTURA_CONSECUTIVO`) REFERENCES `factura` (`CONSECUTIVO`),
  ADD CONSTRAINT `fk_DETALLE_FACTURA_PROVEEDOR1` FOREIGN KEY (`PROVEEDOR_NIT`) REFERENCES `proveedor` (`NIT`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `fk_DETALLE_PEDIDO_PEDIDO1` FOREIGN KEY (`PEDIDO_ID_PEDIDO`,`PEDIDO_MESA_MESA_NUMERO`) REFERENCES `pedido` (`ID_PEDIDO`, `MESA_MESA_NUMERO`),
  ADD CONSTRAINT `fk_DETALLE_PEDIDO_PRODUCTO1` FOREIGN KEY (`PRODUCTO_COD_PRUDUCTO`) REFERENCES `producto` (`COD_PRUDUCTO`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_EMPLEADO_ACCESO1` FOREIGN KEY (`ACCESO_COD_ACCESO`) REFERENCES `acceso` (`COD_ACCESO`),
  ADD CONSTRAINT `fk_EMPLEADO_CARGO1` FOREIGN KEY (`CARGO_CARGO`) REFERENCES `cargo` (`CARGO`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_FACTURA_CLIENTE1` FOREIGN KEY (`CLIENTE_ID_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`),
  ADD CONSTRAINT `fk_FACTURA_PEDIDO1` FOREIGN KEY (`PEDIDO_ID_PEDIDO`,`PEDIDO_MESA_MESA_NUMERO`) REFERENCES `pedido` (`ID_PEDIDO`, `MESA_MESA_NUMERO`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_PRODUCTO_PROVEEDOR1` FOREIGN KEY (`PROVEEDOR_NIT`) REFERENCES `proveedor` (`NIT`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_PROVEEDOR_BARRIO1` FOREIGN KEY (`BARRIO_COD_BARRIO`,`BARRIO_COMUNA_COD_COMUNA`,`BARRIO_COMUNA_COD_COMUNA1`,`BARRIO_COMUNA_CIUDAD_DEPARTAMENTO_COD_DEPARTAMENTO`,`BARRIO_COMUNA_CIUDAD_COD_CIUDAD`) REFERENCES `barrio` (`COD_BARRIO`, `COMUNA_COD_COMUNA`, `COMUNA_COD_COMUNA1`, `COMUNA_CIUDAD_DEPARTAMENTO_COD_DEPARTAMENTO`, `COMUNA_CIUDAD_COD_CIUDAD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
