-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2024 a las 00:05:27
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `constructora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adquisicion`
--

CREATE TABLE `adquisicion` (
  `id_adquisicion` int(11) NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `fecha_adq` date DEFAULT NULL,
  `detalle_adq` text DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(50) DEFAULT NULL,
  `ap_paterno_cli` varchar(50) DEFAULT NULL,
  `ap_materno_cli` varchar(50) DEFAULT NULL,
  `ci_cliente` varchar(50) DEFAULT NULL,
  `telefono_cli` varchar(50) DEFAULT NULL,
  `direccion_cli` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre_cliente`, `ap_paterno_cli`, `ap_materno_cli`, `ci_cliente`, `telefono_cli`, `direccion_cli`) VALUES
(1, 'Juan', 'Pérez', 'García', '12345678LP', '76543210', 'Calle Falsa 123, Ciudad A'),
(2, 'María', 'López', 'Martínez', '87654321CB', '71234567', 'Av. Central 456, Ciudad B'),
(3, 'Pedro', 'Gutiérrez', 'Ramírez', '45612378SC', '70001234', 'Calle Luna 789, Ciudad C'),
(4, 'mario', 'Fernández', 'Díaz', '15975328OR', '78785632', 'Av. Sol 321, Ciudad D'),
(5, 'Carlos', 'Sánchez', 'Herrera', '85274196PO', '69999888', 'Calle Estrella 654, Ciudad E'),
(8, 'Marioo', 'Vecerra', 'Bizarra', '123', '4293074', 'calle alamos 123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo_material`
--

CREATE TABLE `codigo_material` (
  `id_codigo` int(11) NOT NULL,
  `cod_clasificador` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `codigo_material`
--

INSERT INTO `codigo_material` (`id_codigo`, `cod_clasificador`, `descripcion`) VALUES
(1, '30000', 'Materiales Y Suministros'),
(2, '32100', 'Papel'),
(3, '32200', 'Productos de Artes Gráficas'),
(4, '32300', 'Libros, Manuales y Revistas'),
(5, '32400', 'Textos de Enseñanza'),
(6, '32500', 'Periódicos y Boletines'),
(7, '34000', 'Combustibles, Productos Químicos, Farmacéuticos y Otras Fuentes de Energía'),
(8, '34100', 'Combustibles, Lubricantes, Derivados y otras Fuentes de Energía'),
(9, '34110', 'Combustibles, Lubricantes y Derivados para consumo'),
(10, '34120', 'Combustibles, Lubricantes y Derivados para comercialización'),
(11, '34130', 'Energía Eléctrica para Comercialización'),
(12, '34200', 'Productos Químicos y Farmacéuticos'),
(13, '34300', 'Llantas y Neumáticos'),
(14, '34400', 'Productos de Cuero y Caucho'),
(15, '34500', 'Productos de Minerales no Metálicos y Plásticos'),
(16, '34600', 'Productos Metálicos'),
(17, '34700', 'Minerales'),
(18, '34800', 'Herramientas Menores'),
(19, '39000', 'Productos Varios'),
(20, '39100', 'Material de Limpieza e Higiene'),
(21, '39200', 'Material Deportivo y Recreativo'),
(22, '39300', 'Utensilios de Cocina y Comedor'),
(23, '39400', 'Instrumental Menor Médico-Quirúrgico'),
(24, '39500', 'Útiles de Escritorio y Oficina'),
(25, '39600', 'Útiles Educacionales, Culturales y de Capacitación'),
(26, '39700', 'Útiles y Materiales Eléctricos'),
(27, '39800', 'Otros Repuestos y Accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id_contrato` int(11) NOT NULL,
  `cod_contrato` varchar(50) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha_contrato` date DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `tipo_venta` varchar(50) DEFAULT NULL,
  `archivo_contrato` varchar(255) DEFAULT NULL,
  `estado_contrato` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`id_contrato`, `cod_contrato`, `id_cliente`, `fecha_contrato`, `fecha_inicio`, `fecha_entrega`, `tipo_venta`, `archivo_contrato`, `estado_contrato`) VALUES
(1, 'CON2024001', 1, '2024-01-10', '2024-01-15', '2024-02-15', 'Contado', 'contrato_001.pdf', 1),
(2, 'CON2024002', 2, '2024-02-05', '2024-02-10', '2024-03-10', 'Crédito', 'contrato_002.pdf', 1),
(3, 'CON2024003', 3, '2024-03-20', '2024-03-25', '2024-04-25', 'Contado', 'contrato_003.pdf', 0),
(4, 'CON2024004', 4, '2024-04-15', '2024-04-20', '2024-05-20', 'Crédito', 'contrato_004.pdf', 1),
(5, 'CON2024005', 5, '2024-05-30', '2024-06-05', '2024-07-05', 'Contado', 'contrato_005.pdf', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cobro`
--

CREATE TABLE `detalle_cobro` (
  `id_detalle_cobro` int(11) NOT NULL,
  `id_plan_cobro` int(11) DEFAULT NULL,
  `monto_cobro` decimal(10,2) DEFAULT NULL,
  `fecha_cobro` date DEFAULT NULL,
  `desc_cobro` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramienta`
--

CREATE TABLE `herramienta` (
  `id_herramienta` int(11) NOT NULL,
  `cod_herramienta` varchar(50) DEFAULT NULL,
  `desc_herramienta` varchar(255) DEFAULT NULL,
  `valor_herramienta` decimal(10,2) DEFAULT NULL,
  `costo_herramienta` decimal(10,2) DEFAULT NULL,
  `img_herramienta` varchar(255) DEFAULT NULL,
  `cod_clasificacion_her` varchar(50) DEFAULT NULL,
  `estado_herramienta` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `herramienta`
--

INSERT INTO `herramienta` (`id_herramienta`, `cod_herramienta`, `desc_herramienta`, `valor_herramienta`, `costo_herramienta`, `img_herramienta`, `cod_clasificacion_her`, `estado_herramienta`) VALUES
(1, 'her-001', 'martillo con mango metálico        ', 150.00, 120.00, '', '34700', 1),
(3, 'her-002', 'Llantas de goma pura, calados                                ', 280.00, 220.00, 'thS.jpg', '34300', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_material`
--

CREATE TABLE `ingreso_material` (
  `id_ingreso` int(11) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `cod_ingreso` varchar(50) NOT NULL,
  `entregado_por` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `detalle_ingreso` text DEFAULT NULL,
  `cod_proyecto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ingreso_material`
--

INSERT INTO `ingreso_material` (`id_ingreso`, `fecha_ingreso`, `cod_ingreso`, `entregado_por`, `id_usuario`, `descripcion`, `detalle_ingreso`, `cod_proyecto`) VALUES
(4, '2024-04-16', 'NI-01', 1, 1, 'compra', '[{\"idMaterial\":\"1\",\"descMaterial\":\"Cemento Coboce\",\"cantMaterial\":20},{\"idMaterial\":\"3\",\"descMaterial\":\"Arenilla\",\"cantMaterial\":10},{\"idMaterial\":\"4\",\"descMaterial\":\"Cola\",\"cantMaterial\":5}]', 'p-01'),
(5, '2024-06-02', 'NI-02', 1, 1, 'Adquisicion', '[{\"idMaterial\":\"1\",\"descMaterial\":\"Cemento Coboce\",\"cantMaterial\":20},{\"idMaterial\":\"4\",\"descMaterial\":\"Cola\",\"cantMaterial\":50}]', 'p-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_stock`
--

CREATE TABLE `ingreso_stock` (
  `id_ingreso_stock` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cod_ingreso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ingreso_stock`
--

INSERT INTO `ingreso_stock` (`id_ingreso_stock`, `id_material`, `cantidad`, `cod_ingreso`) VALUES
(9, 1, 20, 'NI-01'),
(10, 3, 10, 'NI-01'),
(11, 4, 5, 'NI-01'),
(12, 1, 20, 'NI-02'),
(13, 4, 50, 'NI-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `cod_item` varchar(50) DEFAULT NULL,
  `desc_item` varchar(255) DEFAULT NULL,
  `clasificacion` varchar(100) NOT NULL,
  `estado_item` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`id_item`, `cod_item`, `desc_item`, `clasificacion`, `estado_item`) VALUES
(1, 'L001', 'Lote en zona norte', 'Lote', 1),
(2, 'C001', 'Casa de 3 habitaciones', 'Casa', 1),
(3, 'D001', 'Departamento en el centro', 'Departamento', 1),
(4, 'L002', 'Lote en zona sur', 'Lote', 0),
(5, 'C002', 'Casa de 2 habitaciones', 'Casa', 1),
(6, 'D002', 'Departamento con vista al mar', 'Departamento', 1),
(7, 'L003', 'Lote en zona este', 'Lote', 1),
(8, 'C003', 'Casa con fachada de cemento y ladrillo', 'Casa', 1),
(9, 'D003', 'Departamento de 1 habitación', 'Departamento', 1),
(14, 'C004', 'Casa con fachada de cemento', 'Casa', 0),
(15, 'C005', 'Casa con fachada de Ladrillo', 'Casa', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `cod_material` varchar(50) NOT NULL,
  `desc_material` varchar(255) NOT NULL,
  `unidad` varchar(50) DEFAULT NULL,
  `valor_unidad` decimal(10,2) DEFAULT NULL,
  `costo_material` decimal(10,2) DEFAULT NULL,
  `img_material` varchar(255) DEFAULT NULL,
  `estado_material` tinyint(1) DEFAULT 1,
  `cod_clasificador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id_material`, `cod_material`, `desc_material`, `unidad`, `valor_unidad`, `costo_material`, `img_material`, `estado_material`, `cod_clasificador`) VALUES
(1, 'cod_001', 'Cemento Coboce', 'BL', 80.00, 60.00, '', 1, '34000'),
(3, 'cod_003', 'Lorem ipsum .', 'kl', 20.00, 11.00, 'birdbot-4.jpg', 1, '32300'),
(4, 'cod_004', 'Cola', 'ml', 8.00, 5.00, 'tester.jpeg', 1, '30000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL,
  `ci_personal` varchar(20) DEFAULT NULL,
  `ap_paterno` varchar(255) DEFAULT NULL,
  `ap_materno` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `departamento` varchar(100) DEFAULT NULL,
  `estado_personal` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `ci_personal`, `ap_paterno`, `ap_materno`, `nombre`, `cargo`, `direccion`, `telefono`, `departamento`, `estado_personal`) VALUES
(1, '7904767', 'Saez', 'Garcia', 'Wilfredo', 'Encargado de Almacen', 'C/ Los Lirios #2048', '71446134', 'Alamacenes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_cobro`
--

CREATE TABLE `plan_cobro` (
  `id_plan_cobro` int(11) NOT NULL,
  `id_contrato` int(11) DEFAULT NULL,
  `forma_pago` varchar(50) DEFAULT NULL,
  `monto_total` decimal(10,2) DEFAULT NULL,
  `estado_plan_cobro` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_empresa` varchar(50) DEFAULT NULL,
  `nombre_pro` varchar(50) DEFAULT NULL,
  `ap_paterno_pro` varchar(50) DEFAULT NULL,
  `ap_materno_pro` varchar(50) DEFAULT NULL,
  `ci_proveedor` varchar(50) DEFAULT NULL,
  `direccion_pro` varchar(100) DEFAULT NULL,
  `telefono_pro` varchar(50) DEFAULT NULL,
  `email_pro` varchar(50) DEFAULT NULL,
  `estado_pro` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre_empresa`, `nombre_pro`, `ap_paterno_pro`, `ap_materno_pro`, `ci_proveedor`, `direccion_pro`, `telefono_pro`, `email_pro`, `estado_pro`) VALUES
(4, 'Proveedora Andes', 'Ana', 'Rodriguez', 'Martinez', '34567890', 'Av. Los Andes 101', '555-1010', 'arodriguez@andes.com', 1),
(5, 'Suministros del Norte', 'Luis', 'Hernandez', 'Vega', '45678901', 'Calle Central 202', '555-2020', 'lhernandez@norte.com', 0),
(6, 'Pil Andina', 'Leonardo', 'Fabio', 'Beltran', '123458', 'calle los lirios 248', '75483115', 'pil@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `cod_proyecto` varchar(50) NOT NULL,
  `nombre_proyecto` varchar(255) NOT NULL,
  `desc_proyecto` text DEFAULT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_entrega` date NOT NULL,
  `lugar` varchar(255) DEFAULT NULL,
  `personal_encargado` int(11) DEFAULT NULL,
  `encargado_superior` int(11) NOT NULL,
  `estado_proyecto` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `cod_proyecto`, `nombre_proyecto`, `desc_proyecto`, `fecha_creacion`, `fecha_inicio`, `fecha_entrega`, `lugar`, `personal_encargado`, `encargado_superior`, `estado_proyecto`) VALUES
(3, 'proy-001', 'Instalación de cámaras de Seguridad', 'Proyecto donde se realizara Instalación de cámaras de seguridad, para una institución publica', '2024-10-01', '2024-10-10', '2024-10-30', 'Av. Franco Vale, El Alto', 1, 2, 0),
(4, 'proy-002', 'Instalación de Gas a Domiciliario', 'Un técnico especializado evalúa la estructura del inmueble para determinar la ruta adecuada para las tuberías de gas', '0000-00-00', '2024-10-21', '0000-00-00', 'El Alto. Zona San Felipe de Seke', 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_material`
--

CREATE TABLE `salida_material` (
  `id_salida` int(11) NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `cod_salida` varchar(50) NOT NULL,
  `solicitado_por` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `detalle_salida` text DEFAULT NULL,
  `cod_proyecto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `salida_material`
--

INSERT INTO `salida_material` (`id_salida`, `fecha_salida`, `cod_salida`, `solicitado_por`, `id_usuario`, `descripcion`, `detalle_salida`, `cod_proyecto`) VALUES
(1, '2024-04-08', 'NS-01', 1, 1, 'contruccion', '[{\"idMaterial\":\"1\",\"descMaterial\":\"Cemento Comboce\",\"cantMaterial\":2}]', 'p-01'),
(4, '2024-06-02', 'NS-02', 3, 1, 'Derrame', '[{\"idMaterial\":\"1\",\"descMaterial\":\"Cemento Coboce\",\"cantMaterial\":2},{\"idMaterial\":\"4\",\"descMaterial\":\"Cola\",\"cantMaterial\":5}]', 'p-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_stock`
--

CREATE TABLE `salida_stock` (
  `id_salida_stock` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cod_salida` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `salida_stock`
--

INSERT INTO `salida_stock` (`id_salida_stock`, `id_material`, `cantidad`, `cod_salida`) VALUES
(1, 1, 1, 'NS-01'),
(6, 1, 2, 'NS-02'),
(7, 4, 5, 'NS-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estado_usuario` tinyint(1) DEFAULT 1,
  `categoria` varchar(50) NOT NULL DEFAULT 'Encargado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `email`, `password`, `estado_usuario`, `categoria`) VALUES
(1, 'Usuario Administrador', 'admin@hotmail.com', '$2y$10$y5Oc7mG8p4MPuFPvUdOk/.Gkf6iD/3kNqtYm2Lw0fOxRiBrLItehS', 1, 'Administrador'),
(4, 'Usuario moderador', 'moderador@hotmail.com', '$2y$10$KICMqEmzgqfjwmnfEixSyO8Vs.zDWFkKIVWErOgSgQdTuh8QhWewS', 1, 'Encargado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `fecha_venta` date DEFAULT NULL,
  `detalle_venta` text DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_proyecto` int(11) DEFAULT NULL,
  `monto_contrato` decimal(10,2) DEFAULT NULL,
  `archivo_plano` varchar(200) DEFAULT NULL,
  `archivo_contrato` varchar(200) DEFAULT NULL,
  `fecha_contrato` date DEFAULT NULL,
  `observaciones_venta` text DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `a_cuenta` decimal(10,2) DEFAULT NULL,
  `nro_cuotas` int(11) DEFAULT NULL,
  `forma_pago` varchar(50) DEFAULT NULL,
  `fecha_emision_venta` date NOT NULL,
  `estado_venta` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `fecha_venta`, `detalle_venta`, `id_cliente`, `id_proyecto`, `monto_contrato`, `archivo_plano`, `archivo_contrato`, `fecha_contrato`, `observaciones_venta`, `fecha_entrega`, `a_cuenta`, `nro_cuotas`, `forma_pago`, `fecha_emision_venta`, `estado_venta`) VALUES
(1, '2024-10-14', '3', 0, 0, 5000.00, 'pngegg (3).png', 'jesus.pdf', '2024-10-10', 'sin obs', '2024-11-30', 500.00, 8, 'credito', '2024-10-12', NULL),
(2, '2024-10-31', '5', 5, 4, 8000.00, 'pngwing.com (7).png', 'CARIMBO.pdf', '2024-10-30', 'Sin observacion', '2024-12-31', 3000.00, 500, 'contado', '2024-10-12', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adquisicion`
--
ALTER TABLE `adquisicion`
  ADD PRIMARY KEY (`id_adquisicion`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `codigo_material`
--
ALTER TABLE `codigo_material`
  ADD PRIMARY KEY (`id_codigo`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id_contrato`);

--
-- Indices de la tabla `detalle_cobro`
--
ALTER TABLE `detalle_cobro`
  ADD PRIMARY KEY (`id_detalle_cobro`);

--
-- Indices de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD PRIMARY KEY (`id_herramienta`);

--
-- Indices de la tabla `ingreso_material`
--
ALTER TABLE `ingreso_material`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD UNIQUE KEY `cod_ingreso` (`cod_ingreso`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `ingreso_stock`
--
ALTER TABLE `ingreso_stock`
  ADD PRIMARY KEY (`id_ingreso_stock`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `cod_ingreso` (`cod_ingreso`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`),
  ADD UNIQUE KEY `cod_material` (`cod_material`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`);

--
-- Indices de la tabla `plan_cobro`
--
ALTER TABLE `plan_cobro`
  ADD PRIMARY KEY (`id_plan_cobro`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD UNIQUE KEY `cod_proyecto` (`cod_proyecto`);

--
-- Indices de la tabla `salida_material`
--
ALTER TABLE `salida_material`
  ADD PRIMARY KEY (`id_salida`),
  ADD UNIQUE KEY `cod_salida` (`cod_salida`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `salida_stock`
--
ALTER TABLE `salida_stock`
  ADD PRIMARY KEY (`id_salida_stock`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `cod_salida` (`cod_salida`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adquisicion`
--
ALTER TABLE `adquisicion`
  MODIFY `id_adquisicion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `codigo_material`
--
ALTER TABLE `codigo_material`
  MODIFY `id_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_cobro`
--
ALTER TABLE `detalle_cobro`
  MODIFY `id_detalle_cobro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  MODIFY `id_herramienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ingreso_material`
--
ALTER TABLE `ingreso_material`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ingreso_stock`
--
ALTER TABLE `ingreso_stock`
  MODIFY `id_ingreso_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `plan_cobro`
--
ALTER TABLE `plan_cobro`
  MODIFY `id_plan_cobro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `salida_material`
--
ALTER TABLE `salida_material`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `salida_stock`
--
ALTER TABLE `salida_stock`
  MODIFY `id_salida_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingreso_material`
--
ALTER TABLE `ingreso_material`
  ADD CONSTRAINT `ingreso_material_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `ingreso_stock`
--
ALTER TABLE `ingreso_stock`
  ADD CONSTRAINT `ingreso_stock_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`),
  ADD CONSTRAINT `ingreso_stock_ibfk_2` FOREIGN KEY (`cod_ingreso`) REFERENCES `ingreso_material` (`cod_ingreso`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `salida_material`
--
ALTER TABLE `salida_material`
  ADD CONSTRAINT `salida_material_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `salida_stock`
--
ALTER TABLE `salida_stock`
  ADD CONSTRAINT `salida_stock_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`),
  ADD CONSTRAINT `salida_stock_ibfk_2` FOREIGN KEY (`cod_salida`) REFERENCES `salida_material` (`cod_salida`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
