-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 15-03-2018 a las 20:29:06
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `tierraalta`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `alquiler_cc`
-- 

CREATE TABLE `alquiler_cc` (
  `id_cc` int(11) NOT NULL auto_increment,
  `codigo_cc` varchar(15) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `nombre_cc` varchar(50) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `direccion_cc` varchar(50) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `cantidad_pisos_cc` int(11) NOT NULL,
  `cantidad_locales_cc` int(11) NOT NULL,
  `telefono1_cc` varchar(20) NOT NULL,
  `telefono2_cc` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_cc`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Volcar la base de datos para la tabla `alquiler_cc`
-- 

INSERT INTO `alquiler_cc` VALUES (1, '001', 'Centro Financiero Atef Nemer ', 'Av. Universidad con calle Cataluña Qta. Amal, ', 2, 10, '02735330747', '02735330747');
INSERT INTO `alquiler_cc` VALUES (2, '002', 'Inversiones Seven 2008 C.A', 'Av. Universidad con calle Cataluña Qta. Amal, ', 2, 4, '02735330747', '02735330747');
INSERT INTO `alquiler_cc` VALUES (3, '003', 'Centro Comercial Divino Niño ', 'Av. Universidad Urb. Alto Barinas Sur.  ', 1, 2, '04147477098', '');
INSERT INTO `alquiler_cc` VALUES (4, '004', 'Centro Comercial Monte Cristo ', 'Avenida los Llanos Urb. Alto Barinas. Edo. Barinas', 1, 1, '04245162637', '04245162637');
INSERT INTO `alquiler_cc` VALUES (5, '005', 'Constructora Tierra Dorada C.C ', 'Av. Suiza entre Av. los Llanos y Av. Pie de Monte ', 2, 20, '04245373859', '04245373859');
INSERT INTO `alquiler_cc` VALUES (6, '006', 'Constructora Palma de Oro C.A ', 'Edificio Palma de Oro Avenida los Andes ', 1, 1, '04127731104', '04127731104');
INSERT INTO `alquiler_cc` VALUES (7, '007', 'Centro Comercial LLano de Oro', 'Av. Piedemonte entre Av. los Andes y Francia', 2, 20, '04245788894', '04145680543');
INSERT INTO `alquiler_cc` VALUES (8, '008', 'Centro Comercial Damasco ', 'Av. Cruz Paredes frente al Banco Banesco Centro', 1, 8, '04143535844', '04143535844');
INSERT INTO `alquiler_cc` VALUES (9, '009', 'Centro Comercial FORUM ', 'Avenida 23 de Enero ', 2, 8, '04245373859', '04245373859');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `alquiler_inmueble`
-- 

CREATE TABLE `alquiler_inmueble` (
  `id_inmueble` int(11) NOT NULL auto_increment,
  `codigo_inmueble` varchar(15) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `tipo_inmueble` varchar(30) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `tipo_residencia_inmueble` varchar(20) NOT NULL,
  `precio_inmueble` decimal(13,2) NOT NULL,
  `moneda_precio_inmueble` varchar(20) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `iva_inmueble` tinyint(2) NOT NULL,
  `direccion_inmueble` varchar(50) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `descripcion_inmueble` varchar(50) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `codigo_cc` varchar(15) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `pisos_cc` int(11) NOT NULL,
  `estado_inmueble` text NOT NULL,
  PRIMARY KEY  (`id_inmueble`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

-- 
-- Volcar la base de datos para la tabla `alquiler_inmueble`
-- 

INSERT INTO `alquiler_inmueble` VALUES (1, 'N1-10C', 'Local', 'Apto', 4600000.00, 'BsF', 12, 'Av. Universidad con calle Cataluña Qta. Amal, ', '108 Mts', '001', 2, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (50, 'APTO 2-B', 'Residencia', 'Apto', 2000000.00, 'BsF', 0, 'Edif. OMAR Piso 2', 'Edif. OMAR Piso 2', '', 0, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (6, '002', 'Independiente', 'Apto', 1800000.00, 'BsF', 0, 'Edif. Inversiones Seven. Av. Rondon y Vuelvan C.', 'local con un area aproximada de 211,20Mts° ', '', 0, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (7, '003', 'Residencia', 'Apto', 2500000.00, 'BsF', 0, 'Av. Paez. con Calle Camejo', 'Edif. OMAR. Piso 2 APTO 2-A', '', 0, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (8, 'Mario Martinez', 'Residencia', 'Apto', 385000.00, 'BsF', 0, 'Avenida Sucre ', 'Edif. KARO Piso 3 APTO 3A-1 con un área 117,08Mts°', '', 0, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (9, '005', 'Independiente', 'Apto', 5600000.00, 'BsF', 12, 'Local N° 131 ubicado en la Av. Venezuela del sub-s', 'Sub-Sector B-1a-B superficie 474m°', '', 0, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (10, 'NI-08B', 'Local', '', 1385000.00, 'BsF', 12, 'Av. Universidad con calle Cataluña Qta. Amal, ', 'Nivel Uno. Area del Local 104,00 m°', '001', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (11, 'NI-08C', 'Local', '', 1385000.00, 'BsF', 12, 'Av. Universidad con calle Cataluña Qta. Amal, ', 'Nivel Uno. Área del Local 104,00 m°', '001', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (12, 'PB-01B', 'Local', '', 1000000.00, 'BsF', 12, 'Av. Universidad con calle Cataluña Qta. Amal, ', 'Nivel Peso. Planta Baja de 246Mts°', '001', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (13, 'PB-03', 'Local', 'Apto', 1704183.24, 'BsF', 12, 'Av. Universidad con calle Cataluña Qta. Amal, ', 'Nivel Peso. Planta Baja de 215Mts°', '001', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (18, 'PETROPERIJA S.A', 'Independiente', '', 87296730.00, 'BsF', 12, 'Edif. Ubicado en la Av. 4 Bella Vista del Municipi', 'Maracaibo local 6.325,85 Mts°', '', 0, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (17, 'Local 1-2', 'Local', '', 490000.00, 'BsF', 12, 'Av. Universidad Urb. Alto Barinas Sur.  ', 'Locales 1 y 2 con un Área de 250Mts° ', '003', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (19, 'Local N° 3', 'Local', 'Apto', 490000.00, 'BsF', 12, 'Av. Universidad Urb. Alto Barinas Sur.  ', 'Local N°3 de 250Mts° ', '003', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (20, 'PB-05-A', 'Local', 'Apto', 300000.00, 'BsF', 12, 'Av. Universidad con calle Cataluña Qta. Amal, ', 'Planta baja. Con una superficie de 108Mts°', '002', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (21, 'PB-05A ', 'Local', '', 3654000.00, 'BsF', 12, 'Av. Universidad con calle Cataluña Qta. Amal, ', 'Nivel Bolivar N1 del C.F. Atef 104,00Mts°', '001', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (22, 'N07,08,09,10,11', 'Local', '', 22199370.00, 'BsF', 12, 'Av. Universidad con calle Cataluña Qta. Amal, ', 'Nivel 2. Nivel Cruzeiro 1.608,65Mts° ', '001', 2, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (24, 'N1-7,8,9,10A10B', 'Local', '', 15250000.00, 'BsF', 12, 'Av. Universidad con calle Cataluña Qta. Amal, ', 'Nivel Bolívar N1 Área 1052,29Mts° 74 puestos', '001', 2, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (25, 'Local 1', 'Local', '', 3500000.00, 'BsF', 12, 'Avenida los Llanos Urb. Alto Barinas. Edo. Barinas', 'Nivel Uno del Centro Comercial Monte Cristo ', '004', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (26, 'Local 1hasta 14', 'Local', '', 4698105.00, 'BsF', 12, 'Av. Suiza entre Av. los Llanos y Av. Pie de Monte ', 'Locales N°1 hasta el 14 Area 1.417,79Mts°', '005', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (27, 'PB-01-A', 'Local', '', 1750000.00, 'BsF', 12, 'Av. Los Andes con Av. Universidad con calle Catalu', 'Nivel Peso PB. con un Área 130.58Mts°', '002', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (28, 'Local N1', 'Independiente', 'Apto', 357142.86, 'BsF', 12, 'Carretera Nacional los Pinos Barinas-San Cristobal', '92 Mts° al margen izquierdo de la C.N San Cristoba', '', 0, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (29, 'PANCOLOMBIA', 'Local', 'Apto', 12000000.00, 'BsF', 0, 'Edificio Palma de Oro Avenida los Andes ', 'Local S/N Area 450Mts° Edificio Amarillo', '006', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (42, 'APTO 3B-1', 'Residencia', 'Apto', 2000000.00, 'BsF', 0, 'Edif. KARO Piso 3', 'Con un Area Aproximadamente de 90Mts°', '', 0, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (30, 'Colombia Moda C', 'Independiente', '', 3600000.00, 'BsF', 0, 'Av. Sucre y Calle Cruz Paredes Proveduria Zona Lib', 'Local de 2 Plantas ', '', 0, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (31, 'PB-06-A', 'Local', '', 360000.00, 'BsF', 12, 'Av. Universidad con calle Cataluña Qta. Amal, ', 'Nivel Peso Financiero de 180Mts°', '001', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (32, 'Local 22', 'Local', '', 2140000.00, 'BsF', 0, 'Av. Suiza entre Av. los Llanos y Av. Pie de Monte ', 'Av. Los LLanos 140,25Mts° local N°22', '005', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (52, 'Epal,Nguara,L4', 'Independiente', '', 20000000.00, 'BsF', 0, 'Sector Centro. Av. Marquez del Pumar y Av. Sucre', 'Locales con un área aproximado de 2.443,32Mts°', '', 0, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (39, 'Local N° 5', 'Local', 'Apto', 67080000.00, 'BsF', 0, 'Av. Piedemonte entre Av. los Andes y Francia', 'Bodegon. calle suiza con un area de 670,85Mts°', '007', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (35, 'Local N°4', 'Local', '', 46500000.00, 'BsF', 0, 'Av. Piedemonte entre Av. los Andes y Francia', 'Distribuidora d Plastico area aproximada d 465Mts°', '007', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (36, 'Locales N°1,2,3', 'Local', '', 28800000.00, 'BsF', 0, 'Av. Cruz Paredes frente al Banco Banesco Centro', 'Local Comercial con un area aproximada d 1616,88M2', '008', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (37, 'Edif. Primavera', 'Independiente', '', 21600000.00, 'BsF', 0, 'Av. Sucre de la ciudad Barinas Estado Barinas', 'Edificio de 3 Niveles con un area de 1256,76Mts°', '', 0, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (38, 'Local Comercial', 'Local', '', 4500000.00, 'BsF', 0, 'Av. Piedemonte entre Av. los Andes y Francia', 'Con un area aproximadamente de 250Mts°', '007', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (40, 'Bodegon 49Grado', 'Local', 'Apto', 80.00, 'US$', 0, 'Av. Suiza entre Av. los Llanos y Av. Pie de Monte ', 'Local N° 55 con un area aproximada de 140,28Mts°', '005', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (41, 'Local N° 71', 'Local', '', 8000000.00, 'BsF', 0, 'Av. Suiza entre Av. los Llanos y Av. Pie de Monte ', 'Nivel 1 y 2 Tierra Dorada area total de 1391,2m2', '005', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (43, 'APTO 2B-2', 'Residencia', 'Apto', 2000000.00, 'BsF', 0, 'Edif. KARO Piso 2', 'Con un Área Aproximada de 70Mts°', '', 0, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (44, 'APTO 1A-4', 'Residencia', 'Apto', 2000000.00, 'BsF', 0, 'Edif. KARO Piso 1', 'Con un Area Aproximada de 88Mts°', '', 0, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (45, 'APTO 2B-1', 'Residencia', 'Apto', 2000000.00, 'BsF', 0, 'Edif. KARO Piso 2', 'Con Area Aproximada de 75Mts°', '', 0, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (46, 'APTO 1A-5', 'Residencia', 'Apto', 2500000.00, 'BsF', 0, 'Edif. KARO Piso 1', 'Con un Area Aproximada de 123Mts°', '', 0, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (47, 'APTO 3B-2', 'Residencia', 'Apto', 3500000.00, 'BsF', 0, 'Edif. KARO Piso 3', 'Con un Area Aproximada de 90Mts°', '', 0, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (48, 'Locales 33 y 34', 'Local', '', 1600000.00, 'BsF', 0, 'Avenida 23 de Enero ', 'Con Area Aproximada de 98Mts°', '009', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (49, 'Local 35', 'Local', '', 2200000.00, 'BsF', 12, 'Avenida 23 de Enero ', 'Con un Área Aproximada de 130,35Mts°', '009', 1, 'Ocupado');
INSERT INTO `alquiler_inmueble` VALUES (51, 'APTO 3A,B,C,D', 'Residencia', 'Apto', 3000000.00, 'BsF', 0, 'Edif. OMAR Piso 3', 'Responsable Jesus Eliezer Ramirez ', '', 0, 'Ocupado');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `alquiler_inquilino`
-- 

CREATE TABLE `alquiler_inquilino` (
  `id_inquilino` int(11) NOT NULL auto_increment,
  `rif_inquilino` varchar(20) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `nombre_inquilino` varchar(30) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `telefono1_inquilino` varchar(20) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `telefono2_inquilino` varchar(20) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `correo_inquilino` varchar(50) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `direccion_inquilino` varchar(50) character set utf8 collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id_inquilino`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

-- 
-- Volcar la base de datos para la tabla `alquiler_inquilino`
-- 

INSERT INTO `alquiler_inquilino` VALUES (2, 'V-4.525.286', 'Yolanda Lizarraga', '04143573127', '', 'NO POSEE', 'Edif. OMAR Piso 2 APTO 2-B Avenida Paez ');
INSERT INTO `alquiler_inquilino` VALUES (3, 'V-17.988.919', 'Feddy Corbag Nimer ', '04124697185', '', 'NO POSEE', 'Av. Rondon y Vuelvan Caras local de 3plantas ');
INSERT INTO `alquiler_inquilino` VALUES (4, 'V-19.238.430', 'Martinez Mario Jose ', '04140875928', '', 'NO POSEE', 'Edif. KARO. Piso 3 APTO 3A-1 ');
INSERT INTO `alquiler_inquilino` VALUES (5, 'V-20.800.016', 'Yassine Ahmad', '04245383167', '', 'NO POSEE', 'Edif. OMAR Piso 2 APTO 2-A Av. Camejo');
INSERT INTO `alquiler_inquilino` VALUES (6, 'J-40745960-0', 'Distribuidora Integral D. Juan', '04245051249', '', 'distribuidoraintegraldonjuan@g', 'Av. Venezuela del Sub-sector B-14-B de la Urb.Alt');
INSERT INTO `alquiler_inquilino` VALUES (35, 'V-14.917.157', 'Camilo Torres Local C. N° 22', '04242953686', '', 'josecamilotorresvielma@gmail.com', 'Av. los Llanos Local S/N Alto Barinas Sur ');
INSERT INTO `alquiler_inquilino` VALUES (8, 'J-00002949-0', 'Banco del Caribe C.A ', '04142640381', '', 'TMoreno@bancaribe.com.ve', 'Nivel Peso Planta Baja del Centro Comercial Atef ');
INSERT INTO `alquiler_inquilino` VALUES (9, 'J-30467796-0', 'Hispana Seguros S.A ', '04129550186', '', 'jairo.rondon@hispana.com.ve ', 'Nivel Peso Planta Baja Local PB-06A C.F. Atef ');
INSERT INTO `alquiler_inquilino` VALUES (10, 'J-30220253-1', 'Proseguros S.A', '04245219124', '', 'lourdes.tablante@proseguros.co', 'Nivel Bolivar N1-10C del Centro Financiero Atef');
INSERT INTO `alquiler_inquilino` VALUES (11, 'G-20009148-7', 'Banco Bicentenario del Pueblo ', '02129544618', '', 'douglas.urdaneta@bicentenariobu.com', 'Nivel Peso Planta Baja Local PB-03 del C.F. Atef');
INSERT INTO `alquiler_inquilino` VALUES (12, 'J-00148811-1', 'Seguros Universitas C.A', '04145055218', '', 'nelvis.rojas@segurosuniversita', 'Nivel Bolivar N1-08C del Centro Financiero Atef');
INSERT INTO `alquiler_inquilino` VALUES (13, 'J-40173743-9', 'Vulcanizadora los Pinos 2013 ', '04245991670', '', 'vulcanizadoralospinos@gmail.co', 'A la altura del Km4 margen izq Carretera Nacional ');
INSERT INTO `alquiler_inquilino` VALUES (14, 'J-40588170-4', 'Distribuidora C & P C.A', '04147477098', '', 'distribuidorac&p@gmail.com', 'Mini Centro Comercial Divino Niño local 1 y 2');
INSERT INTO `alquiler_inquilino` VALUES (15, 'J-40744733-5', 'SUCOMECA C.A', '04147477098', '', 'distribuidorac&p@gmail.com', 'Mini Centro Comercial Divino Niño local 5');
INSERT INTO `alquiler_inquilino` VALUES (16, 'J-29496388-7', 'Tiendita express C.A ', '04245162637', '', 'tienditaexpress@gmail.com', 'Av. los LLanos Alto B. C.C Monte Cristo local N° 1');
INSERT INTO `alquiler_inquilino` VALUES (17, 'J-30620632-9', 'Oceanica de Seguros C.A ', '04245373859', '', 'ivirguez@oceanicadeseguros.com', 'Nivel Peso Planta Baja Local 05-A del C.F. Atef  ');
INSERT INTO `alquiler_inquilino` VALUES (18, 'J-08006622-7', 'Banco Activo C.A Banco Univers', '04245373859', '', 'vizquiel@bancoactivo.com', 'Nivel Peso Planta Baja local 01-A del C.F. Atef ');
INSERT INTO `alquiler_inquilino` VALUES (19, 'J-40450821-0', 'Boaine Super Market C.A ', '04140731191', '', 'boainesupermarket@gmail.com', 'Centro Comercial Tierra Dorada Locales desde 1-14');
INSERT INTO `alquiler_inquilino` VALUES (20, 'J-00076727-0', 'PDVSA GAS S.A SECTOR CERRO SUR', '04165757937', '', 'morenorav@pdvsa.com', 'Nivel Bolivar Locales N1-7,8,9,10A y 10B del C.F.A');
INSERT INTO `alquiler_inquilino` VALUES (21, 'J-30679358-5', 'Jhon Cari - Sucesor ', '04265502167', '', 'cariviajeraderecho@gmail.com ', 'C. Comercial Forum local N° P-35');
INSERT INTO `alquiler_inquilino` VALUES (22, 'J-40221067-1', 'Juan Carlos Suarez ', '04145049891', '', 'NO POSEE', 'Av. Marquez del Pumar y Av. Sucre Local N° 04');
INSERT INTO `alquiler_inquilino` VALUES (23, 'J-40163580-6', 'Colombia Moda 2012 C.A', '04245440382', '', 'nacacha26@hotmail.com', 'Av. Sucre y Calle Cruz Paredes Proveduria Zona Lib');
INSERT INTO `alquiler_inquilino` VALUES (24, 'V-14.676.093', 'SAREN', '04045373859', '', 'osaurafermin@hotmail.com', 'Edif. OMAR Calle Bolivar cruce con Av Medina J');
INSERT INTO `alquiler_inquilino` VALUES (25, 'J-29996388-7', 'Tiendita Express C.A ', '04245078586', '', 'cxp.lte@gmail.com', 'Edif. Mario Local 1-1 Av. 23 de Enero ');
INSERT INTO `alquiler_inquilino` VALUES (26, 'J-40372454-7', 'Farmatiendita Express C.A', '04245078586', '', 'farmatienditaexpressca@gmail.c', 'Edif. Mario Local 1 Av. 23 de Enero');
INSERT INTO `alquiler_inquilino` VALUES (27, 'J-41037713-5', 'PANCOLOMBIA C.A', '04121502537', '04127731104', 'criskass14@gmail.com', 'Av. los Llanos Local S/N Alto Barinas Sur ');
INSERT INTO `alquiler_inquilino` VALUES (28, 'J-30772607-5', 'Comercial HUNG FENG ', '04145700018', '', 'NO POSEE', 'Sector Centro en la Ciudad de Barinas ');
INSERT INTO `alquiler_inquilino` VALUES (29, 'G-20005807-2', 'HIDROANDES ', '04141587438', '', 'NO POSEE', 'Edif OMAR Av. Paez entre Calle Carvajal y Camejo');
INSERT INTO `alquiler_inquilino` VALUES (30, 'V-25.965.511', 'Renzo Rodriguez', '04144496245', '', 'NO POSEE', 'Edif. KARO. Piso 2 APTO 2B-2');
INSERT INTO `alquiler_inquilino` VALUES (31, 'V-25965511', 'Rodriguez Renzo', '04144496245', '', 'NO POSEE', 'Edif. KARO Piso 3 APTO 3B-1');
INSERT INTO `alquiler_inquilino` VALUES (32, 'J-00041627-3', 'Gas Comunal S.A', '04145035410', '02123603193', 'yjreyes@pdvcomunal.com.ve', 'Centro Financiero Atef Nivel Planta Bolivar 05-A');
INSERT INTO `alquiler_inquilino` VALUES (33, 'J-31666609-3', 'PRETOPERIJA S.A ', '04246178348', '', 'MONTIELCN@pdvsa.com', 'Av. 4 de Bella Vista Municipio Maracaibo Estado Z.');
INSERT INTO `alquiler_inquilino` VALUES (34, 'J-30730680-7', 'PDVSA Servicios Petroleros ', '04145035410', '', 'patinoag@pdvsa.com', 'Nivel Cruzeiro 2 ubicado en el C.F Atef ');
INSERT INTO `alquiler_inquilino` VALUES (36, 'J-409224694', 'Mariolly Contreras Arellano', '04143766059', '04145062476', 'mariolly23@hotmail.com', 'Calle Suiza. Alto Barinas Sur, Barinas. ');
INSERT INTO `alquiler_inquilino` VALUES (37, 'V-23.719.008', 'Aldo Lenin Gonzalez Marquez ', '04245537942', '04140715676', 'aldolening@gmail.com', 'Av. Piedemonte entre Av. los Andes y Francia');
INSERT INTO `alquiler_inquilino` VALUES (38, 'V-0000000', 'Victor Silva ', '04261059401', '', 'victorsilva_732@hotmail.com', 'Av. Piedemonte entre Av. los Andes y Francia');
INSERT INTO `alquiler_inquilino` VALUES (39, 'J-31073962-5', 'Cayca Alimentos S.A', '04143535844', '04143535844', 'NO POSEE', 'Av. Cruz Paredes frente al Banco Banesco Centro');
INSERT INTO `alquiler_inquilino` VALUES (40, 'J-310739625', 'Calsa S.A', '04143535844', '04143535844', 'NO POSEE', 'Av. Sucre de la ciudad Barinas Estado Barinas');
INSERT INTO `alquiler_inquilino` VALUES (41, 'J31073962-5', 'Cayca Alimentos S,A', '04143535844', '04143535844', 'NO POSEE', 'Av. Piedemonte entre Av. los Andes y Francia');
INSERT INTO `alquiler_inquilino` VALUES (42, 'J-41064352-8', 'Discoteca - Restauran', '04245441959', '04247370800', 'ovalles243@gmail.com', 'Av. Universidad C.C T. Dorada Nivel 1 y 2 Barinas');
INSERT INTO `alquiler_inquilino` VALUES (43, 'E-84.596.487', 'Yiran Berrio Arroyave ', '04245803058', '04245803058', 'NO POSEE', 'Edif. KARO Piso 1 APTO 1A-5');
INSERT INTO `alquiler_inquilino` VALUES (44, 'V-9.380.614', 'DISPONIBLE ', '04245373859', '04245373859', 'NO POSEE', 'Edif. KARO Planta Baja B-2');
INSERT INTO `alquiler_inquilino` VALUES (45, 'V-20.537.076', 'FELIPE / Karen Bravo ', '04125452835', '04125452835', 'NO POSEE', 'Edif. KARO Piso 1 APTO 1A-4');
INSERT INTO `alquiler_inquilino` VALUES (46, 'V-15.685.689', 'Pablo Rico Jaimes', '0', '0', 'NO POSEE', 'Edif. KARO Piso 3 APTO 3B-2');
INSERT INTO `alquiler_inquilino` VALUES (47, 'E-85.200.370', 'DIANA / Jorge Rodriguez ', '0', '0', 'NO POSEE', 'Edif. KARO Piso 2 APTO 2B-1');
INSERT INTO `alquiler_inquilino` VALUES (48, 'V-18.937.186', 'Ron y Alegria Local 33 y 34', '0', '0', 'NO POSEE', 'Av. 23 de enero C.C Forum ');
INSERT INTO `alquiler_inquilino` VALUES (49, 'E-84.583.154', 'Jesus Eliezer Ramirez', '04145791264', '04145791264', 'NO POSEE', 'Edif. OMAR Piso 3 APTO 3A,B,C,D');
INSERT INTO `alquiler_inquilino` VALUES (50, 'KAIPING XIE - BIN', 'KAIPING XIE - BIN', '04241899488', '04241899488', 'NO POSEE', 'Edif. OMAR Piso 1 APTO 1-A');
INSERT INTO `alquiler_inquilino` VALUES (51, 'NABIL (Sra. Sousan)', 'NABIL (Sra. Sousan)', '04245383167', '04245383167', 'NO POSEE', 'Edif. OMAR Piso 1 APTO 1-B');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `alquiler_moneda`
-- 

CREATE TABLE `alquiler_moneda` (
  `id_moneda` int(11) NOT NULL auto_increment,
  `nombre_moneda` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_moneda`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `alquiler_moneda`
-- 

INSERT INTO `alquiler_moneda` VALUES (1, 'BsF');
INSERT INTO `alquiler_moneda` VALUES (2, 'US$');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `alquiler_renta`
-- 

CREATE TABLE `alquiler_renta` (
  `codigo_factura` int(11) NOT NULL auto_increment,
  `codigo_inmueble` varchar(15) NOT NULL,
  `rif_inquilino` varchar(20) NOT NULL,
  `fecha_contrato` date NOT NULL,
  `fecha_contrato_con_mes_muerto` date NOT NULL,
  `hora_contrato` time NOT NULL,
  `tiempo_alquiler` int(11) NOT NULL,
  `periodo_alquiler` varchar(10) NOT NULL,
  `meses_deposito` int(11) NOT NULL,
  `total_deposito` decimal(13,2) NOT NULL,
  `gastos_legales` decimal(13,2) NOT NULL,
  `moneda_gastos_legales` varchar(20) NOT NULL,
  `gastos_administrativos` decimal(13,2) NOT NULL,
  `moneda_gastos_administrativos` varchar(20) NOT NULL,
  `mes_muerto` int(11) NOT NULL,
  `estado_contrato` varchar(10) NOT NULL,
  PRIMARY KEY  (`codigo_factura`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

-- 
-- Volcar la base de datos para la tabla `alquiler_renta`
-- 

INSERT INTO `alquiler_renta` VALUES (2, '002', 'V-17.988.919', '2017-10-01', '2017-10-01', '15:39:00', 6, 'Mensual', 0, 0.00, 0.00, 'BsF', 1800000.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (3, '005', 'J-40745960-0', '2018-01-01', '2018-01-01', '16:43:00', 2, 'Mensual', 1, 436000.00, 0.00, 'BsF', 436000.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (35, 'Local N°4', 'V-0000000', '2017-12-01', '2017-12-01', '15:27:00', 12, 'Mensual', 3, 139500000.00, 1200000.00, 'BsF', 11625000.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (5, 'N1-10C', 'J-30220253-1', '2018-01-01', '2018-01-01', '10:53:00', 6, 'Mensual', 0, 0.00, 0.00, 'BsF', 5152000.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (6, 'NI-08B', 'J-00148811-1', '2018-01-01', '2018-01-01', '11:12:00', 9, 'Mensual', 0, 0.00, 0.00, 'BsF', 1551200.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (7, 'NI-08C', 'J-00148811-1', '2018-01-01', '2018-01-01', '11:27:00', 9, 'Mensual', 0, 0.00, 0.00, 'BsF', 1551200.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (8, 'PB-01B', 'J-00002949-0', '2018-01-01', '2018-01-01', '10:53:00', 9, 'Mensual', 0, 0.00, 0.00, 'BsF', 1120000.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (9, 'PETROPERIJA S.A', 'J-31666609-3', '2017-08-18', '2017-08-18', '11:38:00', 12, 'Mensual', 0, 0.00, 0.00, 'BsF', 97772337.60, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (12, 'PB-03', 'G-20009148-7', '2018-01-01', '2018-01-01', '13:39:00', 17, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (10, 'Local 1-2', 'J-40588170-4', '2018-01-01', '2018-01-01', '15:25:00', 15, 'Mensual', 0, 0.00, 0.00, 'BsF', 548800.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (13, 'Local N° 3', 'J-40744733-5', '2018-01-01', '2018-01-01', '14:33:00', 15, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (14, 'PB-05-A', 'J-30620632-9', '2018-01-30', '2018-01-30', '15:28:00', 17, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (15, 'PB-05A ', 'J-00041627-3', '2017-12-15', '2017-12-15', '10:03:00', 12, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (16, 'N07,08,09,10,11', 'J-30730680-7', '2017-09-04', '2017-09-04', '10:39:00', 12, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (17, 'N1-7,8,9,10A10B', 'J-00076727-0', '2018-01-01', '2018-01-01', '10:49:00', 3, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (18, 'Local 1', 'J-29496388-7', '2018-01-31', '2018-01-31', '11:25:00', 6, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (19, 'Local 1hasta 14', 'J-40450821-0', '2018-01-31', '2018-01-31', '11:40:00', 3, '', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (20, 'PB-01-A', 'J-08006622-7', '2018-01-16', '2018-01-16', '14:16:00', 7, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (21, 'Local N1', 'J-40173743-9', '2018-01-31', '2018-01-31', '14:53:00', 4, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (22, 'PANCOLOMBIA', 'J-41037713-5', '2018-01-01', '2018-01-01', '15:14:00', 7, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (48, 'APTO 2-B', 'V-4.525.286', '2018-01-10', '2018-01-10', '15:33:00', 6, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (27, 'PB-06-A', 'J-30467796-0', '2018-01-01', '2018-01-01', '10:24:00', 24, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (26, 'Colombia Moda C', 'J-40163580-6', '2018-01-01', '2018-01-01', '09:59:00', 12, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (34, 'Local N° 5', 'V-23.719.008', '2017-12-01', '2017-12-01', '15:24:00', 12, 'Mensual', 3, 201240000.00, 1200000.00, 'BsF', 16770000.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (29, 'Local 22', 'V-14.917.157', '2017-12-01', '2017-12-01', '10:04:00', 6, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (30, 'Locales N°1,2,3', 'J-31073962-5', '2018-01-01', '2018-01-01', '11:24:00', 10, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (31, 'Edif. Primavera', 'J-310739625', '2018-01-01', '2018-01-01', '11:31:00', 10, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (32, 'Local Comercial', 'J31073962-5', '2018-01-01', '2018-01-01', '11:40:00', 10, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (36, 'Bodegon 49Grado', 'J-409224694', '2018-01-01', '2018-01-01', '16:19:00', 12, 'Mensual', 3, 1176000.00, 0.00, 'BsF', 350000.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (37, 'Local N° 71', 'J-41064352-8', '2017-12-01', '2017-12-01', '16:56:00', 12, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (38, '003', 'V-20.800.016', '2018-01-15', '2018-01-15', '10:13:00', 6, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (39, 'Mario Martinez', 'V-19.238.430', '2018-01-10', '2018-01-10', '10:17:00', 6, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (40, 'APTO 3B-1', 'V-25965511', '2018-01-10', '2018-01-10', '10:30:00', 6, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (41, 'APTO 2B-2', 'V-25.965.511', '2018-01-10', '2018-01-10', '10:33:00', 6, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (42, 'APTO 1A-4', 'V-20.537.076', '2018-01-10', '2018-01-10', '10:36:00', 6, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (43, 'APTO 2B-1', 'E-85.200.370', '2018-01-10', '2018-01-10', '10:39:00', 6, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (44, 'APTO 1A-5', 'E-84.596.487', '2018-01-01', '2018-01-01', '10:50:00', 6, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (45, 'APTO 3B-2', 'V-15.685.689', '2018-01-10', '2018-01-10', '10:53:00', 6, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (46, 'Locales 33 y 34', 'V-18.937.186', '2018-01-10', '2018-01-10', '11:06:00', 6, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (47, 'Local 35', 'J-30679358-5', '2018-01-10', '2018-01-10', '11:08:00', 6, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (49, 'APTO 3A,B,C,D', 'E-84.583.154', '2018-01-10', '2018-01-10', '16:07:00', 6, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');
INSERT INTO `alquiler_renta` VALUES (50, 'Epal,Nguara,L4', 'J-40221067-1', '2018-01-10', '2018-01-10', '17:04:00', 12, 'Mensual', 0, 0.00, 0.00, 'BsF', 0.00, 'BsF', 0, 'Vigente');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `alquiler_renta_detalle`
-- 

CREATE TABLE `alquiler_renta_detalle` (
  `codigo_factura` int(11) NOT NULL,
  `codigo_inmueble` varchar(15) collate utf8_spanish2_ci NOT NULL,
  `cuota_renta` text collate utf8_spanish2_ci NOT NULL,
  `fecha_cuota_pagada` date NOT NULL,
  `hora_cuota_pagada` time NOT NULL,
  `estado_cuota` varchar(15) collate utf8_spanish2_ci NOT NULL,
  `monto_cuota` decimal(13,2) NOT NULL,
  `moneda_monto_cuota` varchar(20) collate utf8_spanish2_ci NOT NULL,
  `forma_pago` varchar(15) collate utf8_spanish2_ci NOT NULL,
  `datos_transferencia` varchar(100) collate utf8_spanish2_ci NOT NULL,
  `procedencia_cheque` varchar(50) collate utf8_spanish2_ci NOT NULL,
  `datos_cheque` varchar(50) collate utf8_spanish2_ci NOT NULL,
  `cheque_banco_depositado` varchar(50) collate utf8_spanish2_ci NOT NULL,
  `cheque_referencia_depositado` varchar(50) collate utf8_spanish2_ci NOT NULL,
  KEY `CODIGO_FACTURA` (`codigo_factura`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- 
-- Volcar la base de datos para la tabla `alquiler_renta_detalle`
-- 

INSERT INTO `alquiler_renta_detalle` VALUES (1, '001', '3', '2018-01-25', '13:53:00', 'Pendiente', 300000.00, 'BsF', 'Transferencia', 'Banco Mercantil N° 66620064', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (1, '001', '1', '2018-01-25', '13:52:00', 'Pagado', 300000.00, 'BsF', 'Transferencia', 'Banco Mercantil N° 66620064', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (1, '001', '2', '2018-01-25', '13:52:00', 'Pagado', 300000.00, 'BsF', 'Transferencia', 'Banco Mercantil N° 66620064', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (2, '002', '5', '2018-02-19', '16:58:00', 'Pendiente', 1800000.00, 'BsF', 'Transferencia', 'Banco Nacional de Crédito Ref. 190426234 fecha 06/02/2018', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (2, '002', '1', '2018-01-25', '15:40:00', 'Pagado', 1800000.00, 'BsF', 'Efectivo', '', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (2, '002', '3', '2018-01-25', '15:43:00', 'Pagado', 1800000.00, 'BsF', 'Transferencia', 'Banco Nacional de Credito Ref. 1611040637', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (2, '002', '2', '2018-01-25', '15:42:00', 'Pagado', 1800000.00, 'BsF', 'Transferencia', 'Banco Nacional de Credito Ref. 85136687', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (3, '005', '1', '2018-02-15', '10:25:00', 'Pendiente', 436000.00, 'BsF', 'Transferencia', 'Banesco Ref: 01312537543 07/02/18', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (19, 'Local 1hasta 14', '2', '2018-02-21', '15:37:00', 'Pendiente', 5261877.60, 'BsF', 'Cheque', '', 'Provincial', 'N° 00014975. Fecha 20/02/2018 ', 'Provincial', 'N°965758. Fecha 21/02/2018');
INSERT INTO `alquiler_renta_detalle` VALUES (22, 'PANCOLOMBIA', '3', '2018-03-03', '11:49:00', 'Pendiente', 12000000.00, 'BsF', 'Transferencia', 'Banesco Ref. 1365870304', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (22, 'PANCOLOMBIA', '1', '2018-02-19', '15:38:00', 'Pagado', 1200000.00, 'BsF', 'Transferencia', 'Banesco Ref. 1261232839 11/01/2018', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (18, 'Local 1', '1', '2018-02-19', '16:41:00', 'Pendiente', 3920000.00, 'BsF', 'Transferencia', 'Banesco Ref. 1308879915 05/02/2018', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (2, '002', '4', '2018-01-25', '15:46:00', 'Pagado', 1800000.00, 'BsF', 'Transferencia', 'Banco Nacional de Credito Ref. 93807951', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (19, 'Local 1hasta 14', '1', '2018-02-19', '11:44:00', 'Pagado', 5261877.60, 'BsF', 'Cheque', '', 'Provincial', '00013969 Pago de Ref. 000004895 BBVA Provincial', 'Provincial', '000004895');
INSERT INTO `alquiler_renta_detalle` VALUES (22, 'PANCOLOMBIA', '2', '2018-02-19', '15:40:00', 'Pagado', 10000000.00, 'BsF', 'Transferencia', 'Banesco Ref. 1309924205 05/02/2018', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (6, 'NI-08B', '2', '2018-02-23', '16:04:00', 'Pendiente', 1551200.00, 'BsF', 'Transferencia', 'BanCaribe Ref. 20150681', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (5, 'N1-10C', '1', '2018-02-21', '15:50:00', 'Pendiente', 508032.00, 'BsF', 'Transferencia', 'BanCaribe Ref. 23501413220. Fecha 05/02/2018', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (7, 'NI-08C', '2', '2018-02-23', '16:05:00', 'Pendiente', 1551200.00, 'BsF', 'Transferencia', 'BanCaribe Ref. 20150681', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (26, 'Colombia Moda C', '2', '2018-02-23', '10:05:00', 'Pendiente', 3600000.00, 'BsF', 'Transferencia', 'Banesco Ref.00001163182 el 07/02/18', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (26, 'Colombia Moda C', '1', '2018-02-23', '10:03:00', 'Pagado', 3600000.00, 'BsF', 'Transferencia', 'Banesco Ref.933881 Abono 360.000,00Bs 09/01/18 Banesco Ref.061631 Diferencia 3.240.000,00Bs 29/01/18', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (14, 'PB-05-A', '1', '2018-02-23', '12:23:00', 'Pendiente', 336000.00, 'BsF', 'Transferencia', 'Banesco Inversiones Seven Ref. 1041283 Fecha 26/01/2018', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (27, 'PB-06-A', '1', '2018-01-01', '10:33:00', 'Pendiente', 403200.00, 'BsF', 'Transferencia', 'Banesco Ref. 23500008216', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (29, 'Local 22', '3', '2018-02-26', '10:09:00', 'Pendiente', 2140000.00, 'BsF', 'Transferencia', 'Provincial Ref. 68212772', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (29, 'Local 22', '1', '2017-12-26', '10:07:00', 'Pagado', 2140000.00, 'BsF', 'Transferencia', 'Provincial Ref. 00006713', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (29, 'Local 22', '2', '2018-01-20', '10:08:00', 'Pagado', 2140000.00, 'BsF', 'Transferencia', 'Banesco Ref. 1277558512', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (21, 'Local N1', '1', '2018-02-07', '15:18:00', 'Pendiente', 400000.00, 'BsF', 'Cheque', '', 'Bicentenario del Pueblo', '83030253 Ref. 1112034590', 'Banesco', '1112034590');
INSERT INTO `alquiler_renta_detalle` VALUES (13, 'Local N° 3', '2', '2018-02-28', '09:23:00', 'Pendiente', 548800.00, 'BsF', 'Cheque', '', 'Activo', '14000026', 'Banesco. Mes Febrero ', '1411322467');
INSERT INTO `alquiler_renta_detalle` VALUES (13, 'Local N° 3', '1', '2018-02-28', '09:19:00', 'Pagado', 548800.00, 'BsF', 'Cheque', '', 'Activo', '14000026', 'Banesco. Meses Enero y Febrero por un total de 980', '1411322467');
INSERT INTO `alquiler_renta_detalle` VALUES (10, 'Local 1-2', '2', '2018-02-28', '09:33:00', 'Pendiente', 548800.00, 'BsF', 'Cheque', 'A', 'Activo', '92000212', 'Banesco. Mes Febroro total 490.000,00Bs', '1411322467');
INSERT INTO `alquiler_renta_detalle` VALUES (10, 'Local 1-2', '1', '2018-02-28', '09:28:00', 'Pagado', 548800.00, 'BsF', 'Cheque', '', 'Activo', '92000212', 'Banesco. Mes de Enero total 490.000.00Bs', '1411322467');
INSERT INTO `alquiler_renta_detalle` VALUES (31, 'Edif. Primavera', '10', '2018-02-21', '15:30:00', 'Pendiente', 21600000.00, 'BsF', 'Cheque', '', 'Venezuela', '47016585', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (37, 'Local N° 71', '1', '2017-12-21', '14:34:00', 'Pendiente', 8000000.00, 'BsF', 'Transferencia', 'Banesco Ref. 01229465120', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (36, 'Bodegon 49Grado', '3', '2018-03-06', '11:54:00', 'Pendiente', 80.00, 'BsF', 'Transferencia', 'BANK OF AMERICA ', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (36, 'Bodegon 49Grado', '1', '2018-03-05', '11:49:00', 'Pagado', 350000.00, 'BsF', 'Transferencia', 'Banesco Ref. 1369959283', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (36, 'Bodegon 49Grado', '2', '2018-03-06', '11:53:00', 'Pagado', 80.00, 'BsF', 'Transferencia', 'BANK OF AMERICA ', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (30, 'Locales N°1,2,3', '10', '2018-02-21', '15:19:00', 'Pendiente', 28800000.00, 'BsF', 'Cheque', '', 'Venezuela', '74016584', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (30, 'Locales N°1,2,3', '1', '2017-02-21', '15:13:00', 'Pagado', 28800000.00, 'BsF', 'Cheque', '', 'Venezuela', '74016584', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (30, 'Locales N°1,2,3', '2', '2018-02-21', '15:15:00', 'Pagado', 28800000.00, 'BsF', 'Cheque', '', 'Venezuela', '74016584', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (30, 'Locales N°1,2,3', '3', '2018-02-21', '15:15:00', 'Pagado', 28800000.00, 'BsF', 'Cheque', '', 'Venezuela', '74016584', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (30, 'Locales N°1,2,3', '4', '2018-02-21', '15:16:00', 'Pagado', 28800000.00, 'BsF', 'Cheque', '', 'Venezuela', '74016584', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (30, 'Locales N°1,2,3', '5', '2018-02-21', '15:16:00', 'Pagado', 28800000.00, 'BsF', 'Cheque', '', 'Venezuela', '74016584', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (30, 'Locales N°1,2,3', '6', '2018-02-21', '15:18:00', 'Pagado', 28800000.00, 'BsF', 'Cheque', '', 'Venezuela', '74016584', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (30, 'Locales N°1,2,3', '7', '2018-02-21', '15:18:00', 'Pagado', 28800000.00, 'BsF', 'Cheque', '', 'Venezuela', '74016584', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (30, 'Locales N°1,2,3', '8', '2018-02-21', '15:19:00', 'Pagado', 28800000.00, 'BsF', 'Cheque', '', 'Venezuela', '74016584', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (30, 'Locales N°1,2,3', '9', '2018-02-21', '15:19:00', 'Pagado', 28800000.00, 'BsF', 'Cheque', '', 'Venezuela', '74016584', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (31, 'Edif. Primavera', '1', '2018-02-21', '15:30:00', 'Pagado', 21600000.00, 'BsF', 'Cheque', '', 'Venezuela ', '47016585', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (31, 'Edif. Primavera', '2', '2018-02-21', '15:25:00', 'Pagado', 21600000.00, 'BsF', 'Cheque', '', 'Venezuela', '47016585', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (31, 'Edif. Primavera', '3', '2018-02-21', '15:26:00', 'Pagado', 21600000.00, 'BsF', 'Cheque', '', 'Venezuela', '47016585', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (31, 'Edif. Primavera', '4', '2018-02-21', '15:26:00', 'Pagado', 21600000.00, 'BsF', 'Cheque', '', 'Venezuela', '47016585', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (31, 'Edif. Primavera', '5', '2018-02-21', '15:26:00', 'Pagado', 21600000.00, 'BsF', 'Cheque', '', 'Venezuela', '47016585', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (31, 'Edif. Primavera', '6', '2018-02-21', '15:27:00', 'Pagado', 21600000.00, 'BsF', 'Cheque', '', 'Venezuela', '47016585', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (31, 'Edif. Primavera', '7', '2018-02-21', '15:27:00', 'Pagado', 21600000.00, 'BsF', 'Cheque', '', 'Venezuela', '47016585', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (31, 'Edif. Primavera', '8', '2018-02-21', '15:27:00', 'Pagado', 21600000.00, 'BsF', 'Cheque', '', 'Venezuela', '47016585', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (31, 'Edif. Primavera', '9', '2018-02-21', '15:28:00', 'Pagado', 21600000.00, 'BsF', 'Cheque', '', 'Venezuela', '47016585', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (32, 'Local Comercial', '9', '2018-02-21', '15:38:00', 'Pendiente', 4500000.00, 'BsF', 'Cheque', '', 'Venezuela', '71016586', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (32, 'Local Comercial', '1', '2018-02-21', '15:35:00', 'Pagado', 4500000.00, 'BsF', 'Cheque', '', 'Venezuela', '71016586', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (32, 'Local Comercial', '2', '2018-02-21', '15:36:00', 'Pagado', 4500000.00, 'BsF', 'Cheque', '', 'Venezuela', '71016586', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (32, 'Local Comercial', '3', '2018-02-21', '15:36:00', 'Pagado', 4500000.00, 'BsF', 'Cheque', '', 'Venezuela', '71016586', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (32, 'Local Comercial', '4', '2018-02-21', '15:36:00', 'Pagado', 4500000.00, 'BsF', 'Cheque', '', 'Venezuela', '71016586', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (32, 'Local Comercial', '5', '2018-02-21', '15:36:00', 'Pagado', 4500000.00, 'BsF', 'Cheque', '', 'v', '71016586', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (32, 'Local Comercial', '6', '2018-02-21', '15:37:00', 'Pagado', 4500000.00, 'BsF', 'Cheque', '', 'Venezuela', '71016586', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (32, 'Local Comercial', '7', '2018-02-21', '15:37:00', 'Pagado', 4500000.00, 'BsF', 'Cheque', '', 'Venezuela', '71016586', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (32, 'Local Comercial', '8', '2018-02-21', '15:38:00', 'Pagado', 4500000.00, 'BsF', 'Cheque', '', 'Venezuela', '71016586', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (6, 'NI-08B', '1', '2018-02-21', '15:40:00', 'Pagado', 1551200.00, 'BsF', 'Transferencia', 'BanCaribe Ref. 2351046453. Fecha 07/02/2018', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (7, 'NI-08C', '1', '2018-02-21', '15:52:00', 'Pagado', 1551200.00, 'BsF', 'Transferencia', 'BanCaribe Ref. 2351046453. Fecha 07/02/2018', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (8, 'PB-01B', '8', '2018-02-07', '16:54:00', 'Pendiente', 1120000.00, 'BsF', 'Transferencia', 'BanCaribe Ref. 1531052332669', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (8, 'PB-01B', '1', '2018-02-07', '16:50:00', 'Pagado', 1120000.00, 'BsF', 'Transferencia', 'BanCaribe Ref. 1531052332669', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (8, 'PB-01B', '2', '2018-02-07', '16:51:00', 'Pagado', 1120000.00, 'BsF', 'Transferencia', 'BanCaribe Ref. 1531052332669', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (8, 'PB-01B', '3', '2018-02-07', '16:52:00', 'Pagado', 1120000.00, 'BsF', 'Transferencia', 'BanCaribe Ref. 1531052332669', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (8, 'PB-01B', '4', '2018-02-07', '16:52:00', 'Pagado', 1120000.00, 'BsF', 'Transferencia', 'BanCaribe Ref. 1531052332669', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (8, 'PB-01B', '5', '2018-02-07', '16:53:00', 'Pagado', 1120000.00, 'BsF', 'Transferencia', 'BanCaribe Ref. 1531052332669', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (8, 'PB-01B', '6', '2018-02-07', '16:53:00', 'Pagado', 1120000.00, 'BsF', 'Transferencia', 'BanCaribe Ref. 1531052332669', '', '', '', '');
INSERT INTO `alquiler_renta_detalle` VALUES (8, 'PB-01B', '7', '2018-02-07', '16:53:00', 'Pagado', 1120000.00, 'BsF', 'Transferencia', 'BanCaribe Ref. 1531052332669', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `articulos`
-- 

CREATE TABLE `articulos` (
  `id_articulos` int(11) NOT NULL auto_increment,
  `codigo_articulos` varchar(15) collate utf8_spanish2_ci NOT NULL,
  `nombre_articulos` varchar(80) collate utf8_spanish2_ci NOT NULL,
  `rif_proveedores` varchar(20) collate utf8_spanish2_ci NOT NULL,
  `cantidad_articulos` int(11) NOT NULL,
  `nombre_rubro` varchar(40) collate utf8_spanish2_ci NOT NULL,
  `nombre_unidad` varchar(30) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id_articulos`),
  KEY `CODIGO` (`codigo_articulos`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1063 ;

-- 
-- Volcar la base de datos para la tabla `articulos`
-- 

INSERT INTO `articulos` VALUES (1, '1TE', 'TUBOS 320*120*12 MTS', '', 2, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (2, '2TE', 'TUBOS 320*120*6 MTS', '0', 200, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (3, '3TE', 'TUBO 350*170*12 MTS', '0', 5, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (4, '4TE', 'TUBOS 300*100*6 MTS', '0', 51, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (5, '5TE', 'TUBOS 260*260*6 MTS', '0', 43, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (6, '6TE', 'TUBOS 260*90*12 MTS', '0', 3, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (7, '7TE', 'TUBOS 260*90*6 MTS', '0', 22, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (8, '8TE', 'TUBOS 220*90*6 MTS', '0', 1, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (9, '9TE', 'TUBOS 200*200*12(7 MM)', '0', 52, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (10, '10TE', 'TUBOS 200*200*12(5,5 MM)', '0', 15, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (11, '11TE', 'TUBOS 200*200*6 MTS', '0', 47, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (12, '12TE', 'TUBOS 200*70*12 MTS', '0', 47, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (13, '13TE', 'TUBO 180*65*8 MTS', '0', 1, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (14, '14TE', 'TUBOS 175*175*12 MTS', '0', 1, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (15, '15TE', 'TUBOS 175*175*6 MTS', '0', 2, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (16, '16TE', 'TUBOS 175*175*4 MTS', '0', 0, 'Tuberia Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (17, '17TE', 'TUBO 160*65 *7,50 MTS', '0', 1, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (18, '18TE', 'TUBO 160*65*6 MTS', '0', 1, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (19, '19TE', 'TUBOS 155*155*12 MTS', '0', 1, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (20, '20TE', 'TUBOS 155*155*6 MTS', '0', 2, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (21, '21TE', 'TUBOS 135*135*6 MTS', '0', 0, 'Tuberia Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (22, '22TE', 'TUBOS 135*135*12 MTS', '0', 2, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (23, '23TE', 'TUBOS 120*120*12 MTS', '0', 63, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (24, '24TE', 'TUBOS 100*100*12 MTS', '0', 188, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (25, '25TE', 'TUBOS 100*40*12 MTS', '0', 21, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (26, '26TE', 'TUBOS 100*40*12 MTS', '0', 0, 'Tuberia Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (27, '27TE', 'TUBOS 200*70*12 (DORADO)', '0', 18, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (28, '28TE', 'TUBOS 180*65*12 (DORADO)', '0', 15, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (29, '29TE', 'TUBOS 120*120*12 (DORADO)', '0', 64, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (30, '30TE', 'TUBOS 110*110*12 (DORADO)', '0', 181, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (31, '31TE', 'TUBOS 100*100*12 (DORADO)', '0', 50, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (32, '32TE', 'TUBOS 120*60*12(USEMA)', '0', 5, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (33, '33TE', 'TUBOS 120*60*12', '', 930, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (34, '34TE', 'TUBOS 100*100*12(USEMA)', '0', 320, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (35, '35TE', 'TUBOS 80*40*12(USEMA)', '0', 6674, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (36, '36TE', 'TUBOS 80*40*6(USEMA)', '0', 400, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (37, '1GE', 'ABRAZADERA METALICA(PARES)', '0', 107, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (38, '2GE', 'AIRE ACOND. 12000 BTU', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (39, '3GE', 'AIRE ACOND. 3 TONELADAS', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (40, '4GE', 'ALAMBRE (KILO)', '0', 147, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (41, '5GE', 'ANCLAJES 15 X 15', '0', 156, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (42, '6GE', 'ANCLAJES 20 X 20', '0', 8, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (43, '7GE', 'ANCLAJES 25 X 25', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (44, '8GE', 'ANCLAJES 30 X 30 (DANIEL NEMER)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (45, '9GE', 'ANCLAJES 35 X 35', '0', 19, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (46, '10GE', 'ANCLAJES 42 X 42 ', '0', 17, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (47, '11GE', 'ANGULO 65*65 X12MTS', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (48, '12GE', 'ANGULO 65*7 X 12MTS', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (49, '13GE', 'ANGULO BLANCO 1*1*6', '0', 247, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (50, '14GE', 'ARANDELA PLANA', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (51, '15GE', 'ARANDELA PLANA 3/16', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (52, '16GE', 'ARANDELA 1 X TRIPA 14 IMSA', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (53, '17GE', 'ARENA SILICE 20/40 (SACO)', '0', 24, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (54, '18GE', 'ASFALTO LIQUIDO ( CUNETE)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (55, '19GE', 'BASE DE EXTRACTOR EOLICO', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (56, '20GE', 'BISAGRA 2 METAL', '0', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (57, '21GE', 'BISAGRA 3 MADERA', '0', 512, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (58, '22GE', 'BISAGRA 3 METAL ', '0', 51, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (59, '23GE', 'BISAGRA CASOLETA RECTA', '0', 44, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (60, '24GE', 'CAL (SACO)', '', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (61, '25GE', 'CABILLA 6MM x 6 MTS KALSA', '0', 114, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (62, '26GE', 'CABILLA 6MM x 3 MTS KALSA', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (63, '27GE', 'CABILLA DE 1/2 X 6MTS', '', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (64, '28GE', 'CABILLA DE 1/2 X 12MTS', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (65, '29GE', 'CABILLA 3/8 X 12MTS', '0', 3169, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (66, '30GE', 'CABILLA LISA REDONDA 9MM X 6', '0', 25, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (67, '31GE', 'CABILLA 1/2 X 1/2', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (68, '32GE', 'CAMPANA MODELO CXW-200-H603', '0', 9, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (69, '33GE', 'CANDADOS 40 MM CISA', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (70, '34GE', 'CANDADOS 70 MM CISA ANTICIZALLA', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (71, '35GE', 'CAUCHOS 11-00-20 (USADOS)', '0', 6, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (72, '36GE', 'CAUCHOS 11-24,5 (USADOS)', '0', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (73, '37GE', 'CEMENTO GRIS (SACO)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (74, '38GE', 'CEMENTO BLANCO (SACO)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (75, '39GE', 'CEMENTO PLASTICO (CUNETE)', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (76, '40GE', 'CEPILLO DE ALAMBRE', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (77, '41GE', 'CERCHAS DE 10', '0', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (78, '42GE', 'CERCHAS DE 12', '0', 95, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (79, '43GE', 'CERCHAS DE 15', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (80, '44GE', 'CERRADURA 35 MM CISA', '0', 14, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (81, '45GE', 'CERRADURA 45 MM CISA (DAÑADAS)', '0', 13, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (82, '46GE', 'CERRADURA POMO CON LLAVE', '0', 163, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (83, '47GE', 'CERRADURA POMO LLAVE DORADA', '0', 6, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (84, '48GE', 'CERRADURA DIENTE DE PERRO', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (85, '49GE', 'CERRADURA PARA CAJA INCENDIO', '0', 33, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (86, '50GE', 'CERRADURA POMO BRONCE S/LLAVE', '0', 84, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (87, '51GE', 'CERRADURAS DE POMO SIN LLAVE', '0', 140, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (88, '52GE', 'CILINDRO DE CERRADURA CISA', '0', 11, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (89, '53GE', 'CLAVO 1 ACERO ', '0', 155, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (90, '54GE', 'CLAVO 1 1/2 ACERO ', '0', 8920, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (91, '55GE', 'CLAVO 1 1/2 DULCE (KILO)', '0', 7, 'General', 'Kg');
INSERT INTO `articulos` VALUES (92, '56GE', 'CLAVO 2 1/2 ACERO', '0', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (93, '57GE', 'CLAVO 2 1/2 DULCE (KILO)', '', 12, 'General', 'Kg');
INSERT INTO `articulos` VALUES (94, '58GE', 'CLAVO 3 ACERO', '', 251, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (95, '59GE', 'CLAVO 3 DULCE (KILO)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (96, '60GE', 'CLAVO 4 ACERO', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (97, '61GE', 'CLAVO 4 DULCE (KILO)', '0', 5, 'General', 'Kg');
INSERT INTO `articulos` VALUES (98, '62GE', 'COMPRESOR 2HP DOMOSA 115V', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (99, '63GE', 'COMPRESOR DAMFOSS(DORADO)', '0', 21, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (100, '64GE', 'CROMATO DE ZINC (GALON)', '0', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (101, '65GE', 'CUPULAS DE 60 X 60', '0', 440, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (102, '66GE', 'DISCO 7 DE CONCRETO', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (103, '67GE', 'DISCO 14', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (104, '68GE', 'DUCTOS DE BASURA', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (105, '69GE', 'ELECTRODO 60/13 1/8 (KILO)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (106, '70GE', 'ENCHAPADO PUERTA DE MADERA', '0', 198, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (107, '71GE', 'ESTUCO ESPECIAL', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (108, '72GE', 'EXTRACTOR EOLICO DE 26', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (109, '73GE', 'FLEJES BLANCOS', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (110, '74GE', 'FLEJES NEGROS', '0', 500, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (111, '75GE', 'FLEJES NEGROS PARA PORCELANATO', '0', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (112, '76GE', 'FLOTANTE 2 MECANICO', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (113, '77GE', 'GANCHO TECHO 3" X 2 1/2"', '0', 62, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (114, '78GE', 'GOMA TRANSPORTADORA 30 MTS X 30 X 12 MIL', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (115, '79GE', 'GRAFIADO (SACO)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (116, '80GE', 'GRANITO NEGRO N°0 (SACO)', '0', 31, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (117, '81GE', 'GRANITO NEGRO N°1 (SACO)', '0', 4, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (118, '82GE', 'GRAVILLA N°1 (SACO GRANDE)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (119, '83GE', 'GRAVILLA N°1 (SACO PEQUEÑO)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (120, '84GE', 'GRAVILLA N° 2 BLANCA( SACO)', '0', 8, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (121, '85GE', 'GRIFERIAS CHINAS (PIEZAS)', '0', 493, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (122, '86GE', 'HERRAJES (TRAIDOS DE LA CHINA)', '0', 10, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (123, '87GE', 'HOJA DE SEGUETA ', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (124, '88GE', 'KIT PARA MALLA VIFOR', '0', 8, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (125, '89GE', 'LAMINA 2,40 X 1,20  9 MM', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (126, '90GE', 'LAMINA 4 X 8 CALIBRE 22 (CANALES)', '', 5, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (127, '91GE', 'LAMINA 3 X 2 X 1 HN', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (128, '92GE', 'LAMINA ACERAL X 6,10 MTS', '0', 464, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (129, '93GE', 'LAMINA ALUCUBON BLACK GOLD', '0', 56, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (130, '94GE', 'LAMINA ALUCUBON CHINESE RED', '0', 36, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (131, '95GE', 'LAMINA ALUCUBON DARK BLUE', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (132, '96GE', 'LAMINA ALUCUBON FINAND GREEN', '0', 33, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (133, '97GE', 'LAMINA ALUCUBON MATE GOLD', '0', 15, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (134, '98GE', 'LAMINA ALUCUBON TANGERINE PED', '0', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (135, '99GE', 'LAMINA ALUCUBON YELLOW', '0', 96, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (136, '100GE', 'LAMINA ALUCUBON FACHADA(VIEJAS)', '0', 8, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (137, '101GE', 'LAMINA ACEROLIT 4MTS ROJO', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (138, '102GE', 'LAMINA ACEROLIT 4,50MTS ROJO', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (139, '103GE', 'LAMINA ACEROLIT 5MTS ROJO', '0', 10, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (140, '104GE', 'LAMINA ACEROLIT 5,8MTS ROJO', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (141, '105GE', 'LAMINA ACEROLIT 6MTS BLANCO(USADO)', '0', 7, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (142, '106GE', 'LAMINA ACEROLIT 5,81MTS ROJO', '0', 230, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (143, '107GE', 'LAMINA MACHIEMBRADO PLAS', '0', 142, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (144, '108GE', 'LAMINA MADERA SINTETICA 4,5', '0', 836, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (145, '109GE', 'LAMINA PLAFONES PLASTICOS', '0', 8555, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (146, '110GE', 'LENGUETA BLANCA 6 X 25MTS', '0', 75, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (147, '111GE', 'LIJA ROJA (MTS)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (148, '112GE', 'LIJA DE AGUA GRANO N°80', '0', 40, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (149, '113GE', 'LIJA N° 120 MTS', '0', 18, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (150, '114GE', 'LIJA N°220 (PLIEGOS)', '0', 6, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (151, '115GE', 'LIJA GRANO N° 400(SANDPAPER)', '0', 50, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (152, '116GE', 'LIMPOTEX LIMP/CEMENTO', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (153, '117GE', 'LIMPOTEX LIMP/CEMENTO (LITRO)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (154, '118GE', 'LIMPIADOR 1/4', '0', 43, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (155, '119GE', 'LIMPIADOR 1/8"', '0', 20, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (156, '120GE', 'LISTON DE MADERA DE 2,94 MTS', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (157, '121GE', 'LISTON DE MADERA DE 3 MTS', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (158, '122GE', 'MACROFIBRA (BOLSA)', '0', 9, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (159, '123GE', 'MACROFIBRA (SACO)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (160, '124GE', 'MALLA GALLINERA (ROLLO)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (161, '125GE', 'MALLA TRUCKSON DE 100 MTS', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (162, '126GE', 'MALLA VIFOR 2,50*2 MTS', '0', 38, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (163, '127GE', 'MANGUERA DE 32 MM (1)', '0', 8, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (164, '128GE', 'MANGUERA DE 63 MM (2)', '0', 13, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (165, '129GE', 'MANILLA FIJA PRINCIPAL', '0', 146, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (166, '130GE', 'MANILLA H 40X60 ACERADAS', '0', 55, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (167, '131GE', 'MANTO ASFALTICO (ROLLO)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (168, '132GE', 'MANTO REAL (ROLLO)', '0', 218, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (169, '133GE', 'MAQUINA DE HACER PRUEBA', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (170, '134GE', 'MAQUINA SOLDAR AC/DC 250', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (171, '135GE', 'MAQUINA SOLDAR LINCOLN SA250-D3.152', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (172, '136GE', 'Maquina soldar lincoln SAF-600', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (173, '137GE', 'COMPRESOR INGERSOLL-RAND', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (174, '138GE', 'Maquina soldar red seal C245', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (175, '139GE', 'MARCOS DE PUERTA 0,70 CMS', '0', 79, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (176, '140GE', 'Martillo neumatico amarillo', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (177, '141GE', 'MARCOS DE PUERTA 0,75 CMS', '0', 26, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (178, '142GE', 'MARCOS DE PUERTA 0,80 CMS', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (179, '143GE', 'MARCOS DE PUERTA 0,85 CMS', '0', 23, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (180, '144GE', 'MARCOS DE PUERTA 1 MTS', '0', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (181, '145GE', 'MECATILLO PP30 (ROLLO)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (182, '146GE', 'MECHAS DE CONCRETO 1/2', '0', 11, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (183, '147GE', 'MECHAS DE HIERRO  1/2', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (184, '148GE', 'MECHAS DE HIERRO 3/8', '0', 14, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (185, '149GE', 'METILAN 55 GR', '0', 7, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (186, '150GE', 'MEZCLA PINTURA FLAMUKO', '0', 16, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (187, '151GE', 'MOPAS DE RODILLO', '0', 3, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (188, '152GE', 'MOTOBOMBA 4', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (189, '153GE', 'MOTOR DE AGUA S/SERIAL', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (190, '154GE', 'MOTOR AIRE ACOND. 12000BTU', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (191, '155GE', 'MOTOR DE LA PLANTA DE CEMENTO', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (192, '156GE', 'MOTOR DE PISCINA (DANADO)', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (193, '157GE', 'MOTOR TRADEWINDS 283PSL1507 SERIAL LM-186404-1095', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (194, '158GE', 'NEVERA 15 PIES MODELO BCD-368W', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (195, '159GE', 'NEVERA EJECUTIVA MODELO BCD-86', '0', 9, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (196, '160GE', 'NIPLES DE BRONCE 1 1/2', '0', 137, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (197, '161GE', 'PASAMANO GOMA ESCALERAS MEC', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (198, '162GE', 'PASTA PROFESIONAL (GALON)', '0', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (199, '163GE', 'PEGA ANARANJADA 1/8', '0', 8, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (200, '164GE', 'PEGA BLANCA (GALON)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (201, '165GE', 'PEGA DE ZAPATO (GALON)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (202, '166GE', 'PEGA VERDE 1/4 AGUA FRIA', '', 187, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (203, '167GE', 'PEGO GRIS MX30 (SACO)', '', 15, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (204, '168GE', 'PERFIL DE INICIO', '0', 18, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (205, '169GE', 'PERFIL DE VENTANA DE 12', '0', 24, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (206, '170GE', 'PERFIL DE VENTANA DE 15', '0', 48, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (207, '171GE', 'PERFIL DE VENTANA DE 20', '0', 132, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (208, '172GE', 'PERFIL MARCO DE PUERTA B-15', '0', 18, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (209, '173GE', 'PERFIL MARCO DE PUERTA B-20', '0', 5, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (210, '174GE', 'PERILLAS DE DUCHA (PARES)', '0', 216, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (211, '175GE', 'PERMATEX DE 473 GR', '0', 194, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (212, '176GE', 'PERMATEX GALON', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (213, '177GE', 'PIEZA H', '0', 16, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (214, '178GE', 'PIEZAS REDONDAS DE DIAMANTE', '0', 20, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (215, '179GE', 'PLASTICO NEGRO (ROLLO)', '0', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (216, '180GE', 'PLASTICOS DE CUPULA', '0', 60, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (217, '181GE', 'PLETINAS 1 X 1/8 X 6 MTS', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (218, '182GE', 'PLETINAS 1 1/2 X 1/8 ', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (219, '183GE', 'PLETINA 2 X 3/16 X 6MTS', '0', 3, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (220, '184GE', 'PLETINAS 1 1/2 X 3/16 X 6 MTS ', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (221, '185GE', 'POLEAS DE VIDRIO', '0', 14, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (222, '186GE', 'POSTE 60 X 60 PARA MALLA VIFON', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (223, '187GE', 'PROTECTOR CILINDRO OVALADO', '0', 71, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (224, '188GE', 'PROTECTOR CILINDRO REDONDO', '0', 113, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (225, '189GE', 'PUERTAS DE VIDRIO 1 MT X 2,13', '0', 4, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (226, '190GE', 'PUERTAS DE VIDRIO 2,08 MT X 80', '0', 3, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (227, '191GE', 'PUERTAS DE VIDRIO 2,10 MT X 1,65', '0', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (228, '192GE', 'PUERTAS ENTAMBORADAS DE 0,70', '0', 25, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (229, '193GE', 'PUERTAS ENTAMBORADAS DE 0,80', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (230, '194GE', 'RAMPLU ANARANJADO ', '0', 48, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (231, '195GE', 'RAMPLU AZUL', '0', 365, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (232, '196GE', 'RAMPLU GRIS', '0', 19, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (233, '197GE', 'RAMPLU HIERRO 3/8', '0', 131, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (234, '198GE', 'RASTRILLO', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (235, '199GE', 'REDUCION 400 X 160 MM DUCTO DE BASURA', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (236, '200GE', 'RIEL (RUEDA) 90 MM 3 1/2', '0', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (237, '201GE', 'RUEDA ESCALERA MECANICA', '0', 4416, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (238, '202GE', 'SELLADOR TRANSPARENTE', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (239, '203GE', 'SELLADOR MARFIL (CAJA)', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (240, '204GE', 'SIAMESES', '0', 20, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (241, '205GE', 'SILICON LIQUIDO (GALON)', '0', 12, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (242, '206GE', 'SILICON TRANSPARENTE', '0', 44, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (243, '207GE', 'SOMBRERO DE VENTILACION', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (244, '208GE', 'TABLERO MADERA 0,60 X 1,20', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (245, '209GE', 'TANQUE AZUL PLAS 1500/2400(dañado)', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (246, '210GE', 'TANQUE ESTAC. 120 GALON', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (247, '211GE', 'TANQUE ESTAC. 500 GALON', '0', 4, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (248, '212GE', 'TANQUE PARA HIDRONEUNATICO', '0', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (249, '213GE', 'TAPA DE MEDIDORES DE AGUA', '0', 15, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (250, '214GE', 'TAPAS DE W.C (CHINA)', '0', 4, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (251, '215GE', 'TEE DE DUCTOS DE BASURA', '0', 4, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (252, '216GE', 'TEFLON', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (253, '217GE', 'TEIPE', '0', 16, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (254, '218GE', 'TEIPE SCOTH 33', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (255, '219GE', 'TERMO 19 LTS', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (256, '220GE', 'TIRRO VERDE PARA PINTAR 2X50', '0', 24, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (257, '221GE', 'TIZA DE HERRERIA', '0', 104, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (258, '222GE', 'TOPE DE COCINA MODELO A-SG4017', '0', 9, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (259, '223GE', 'TORNILLOS 1', '0', 60, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (260, '224GE', 'TORNILLOS 1 DRYWALL', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (261, '225GE', 'TORNILLOS 12 X 2', '0', 67, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (262, '226GE', 'TORNILLOS 2', '0', 5, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (263, '227GE', 'TORNILLOS 5/8 X 3 1/2', '', 54, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (264, '228GE', 'TORNILLOS 6 X 2 DRYWALL', '', 680, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (265, '229GE', 'TORNILLOS 7 X 2 1/2 DRYWALL', '', 855, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (266, '230GE', 'TORNILLOS 8 X 1', '0', 237, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (267, '231GE', 'TORNILLOS PARA TECHO 4', '0', 200, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (268, '232GE', 'TORNILLOS PARA TECHO 6', '0', 250, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (269, '233GE', 'TORNILLO HEX INOX 1', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (270, '234GE', 'TORNILLO ESTUFA', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (271, '235GE', 'TUERCA 10-24', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (272, '236GE', 'TUERCA  HEX GAL', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (273, '237GE', 'TUBO 1 X 1 DE ALUMINIO', '0', 75, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (274, '238GE', 'TUBO 1 X 1 DE ALUMINIO DE 4,60', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (275, '239GE', 'TUBO 2 X 1 X 6 MTS', '0', 77, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (276, '240GE', 'TUBO 2 X 3,20 MTS HN', '0', 16, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (277, '241GE', 'TUBO 2 X 6 MTS HN', '0', 105, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (278, '242GE', 'TUBO 3 X 1 1/2 X 6 ALUMINIO ', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (279, '243GE', 'Tubo 1/2 X 6 redondo ventilacion', '0', 4, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (280, '244GE', 'TUBO 80 X 40 X 6,85 MTS', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (281, '245GE', 'U DE ALUMINIO 1/2 NATURAL', '0', 26, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (282, '246GE', 'U DE ALUMINIO 3/4 NATURAL', '0', 8, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (283, '247GE', 'UNAS PARA LAVAMANOS', '0', 458, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (284, '248GE', 'Unas lavamanos plasticas', '0', 7, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (285, '249GE', 'UNAS PARA LAVAMANOS PEQUENAS', '0', 33, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (286, '250GE', 'VALVULA HEMBRA/HEMBRA ', '0', 16, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (287, '251GE', 'VENTANAS DE 1 X 1', '0', 1024, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (288, '252GE', 'VENTANAS DE 1,20 X 1,20', '0', 80, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (289, '253GE', 'VIBRO CON MANGUERA', '0', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (290, '254GE', 'YESO (SACO)', '0', 7, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (291, '255GE', 'Amasadora horquilla 150KG AM150P', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (292, '256GE', 'SOBADORA PESADA ANDINA', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (293, '257GE', 'PICADORA TACOS PICAD-001', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (294, '258GE', 'FORMADORA SACAPUNTAS', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (295, '259GE', 'REBANADORA MOD. 160/B', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (296, '260GE', 'BATIDORA MOD PL 40 LTS ', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (297, '261GE', 'MALLAS PLANAS 15*15', '0', 2154, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (298, '262GE', 'CABILLAS 3/8 X 12 MTS', '', 400, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (301, '265GE', 'CABILLAS 5/8 X 12 MTS', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (302, '266GE', 'CABILLAS 3/4 X 12 MTS', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (303, '267GE', 'LOSACERO 6 MTS', '0', 37, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (304, '268GE', 'LOSACERO 0,70 X 12 MTS CAL. 22', '0', 4, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (305, '269GE', 'LOSACERO 1 X 12 MTS', '', 8, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (306, '270GE', 'LOSACERO 65 CM X 75 MTS ', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (307, '271GE', 'LOSACERO 1 MTS X 93 MTS ', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (308, '272GE', 'LOSACERO 3 MTS X 93 MTS ', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (309, '273GE', 'LOSACERO 35 CM X 93 MTS ', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (310, '274GE', 'LOSACERO 65 CM X 93 MTS ', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (311, '275GE', 'LOSACERO 79 CM X 93 MTS ', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (312, '276GE', 'LOSACERO 69 CM X 93 MTS ', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (313, '277GE', 'LOSACERO 90 CM X 6 MTS ', '0', 37, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (314, '278GE', 'LOSACERO 95 CM X 93 MTS ', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (315, '279GE', 'LOSACERO 6 MTS X 93 MTS ', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (316, '280GE', 'LOSACERO 6 MTS X 40 MTS ', '0', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (317, '281GE', 'VIGA DOBLE T 8', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (318, '282GE', 'VIGA DOBLE T 12', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (319, '283GE', 'TUBOS REDONDOS 12 X 6 MTS', '0', 9, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (320, '284GE', 'TUBOS 10 X 15 MTS', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (321, '285GE', 'TUBOS 10 X 12 MTS', '0', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (322, '286GE', 'CABILLA 1/2X6MTS ', '0', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (323, '1PI', 'FONDO BLANCO FONDEAR ', '0', 0, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (324, '2PI', 'FONDO ANTICORROSIVO NEGRO ', '0', 0, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (325, '3PI', 'FONDO ANTICORROSIVO BLANCO ', '0', 26, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (326, '4PI', 'FONDO NEGRO AYA (DAMIAN) ', '0', 0, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (327, '5PI', 'FONDO NEGRO AYA (FCO VINCE) ', '0', 0, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (328, '6PI', 'PINTURA AMARILLO INTENSO (GALON) ', '0', 1, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (329, '7PI', 'Pintura Esmalte Blanco Mate (Domino)', '0', 3, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (330, '8PI', 'Pintura esmalte brillante negro d-kor', '0', 69, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (331, '9PI', 'Pintura esmalte amarillo val.', '0', 44, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (332, '10PI', 'Pintura esmalte martillado negro', '0', 0, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (333, '11PI', 'Pintura esmalte brillante blanco 1/4', '0', 60, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (334, '12PI', 'PINTURA ESMALTE NEGRO ', '0', 3, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (335, '13PI', 'PINTURA ESMALTE GRIS CLARO ', '0', 1, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (336, '14PI', 'Pintura esmalte industrial negro', '0', 4, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (337, '15PI', 'Pintura esmalte verde pistacho', '0', 3, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (338, '16PI', 'PINTURA MARFIL (CUNETE)  CLAS ', '0', 10, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (339, '17PI', 'Pintura marfil (cunete) (cinducasa)', '0', 0, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (340, '18PI', 'Pintura verde manzana (cunete) (cinducasa)', '0', 1, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (341, '19PI', 'Pintura aguamarina (cunete) (cinducasa)', '0', 20, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (342, '20PI', 'PINTURA BLANCO  (CINDUCASA)', '0', 0, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (343, '21PI', 'Pintura blanco colonial (cunete)', '0', 0, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (344, '22PI', 'Pintura gris cemento (cunete)', '0', 20, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (345, '23PI', 'PINTURA MARFIL (CUNETE)', '0', 14, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (346, '24PI', 'PINTURA NEGRA EN ACEITE ', '0', 0, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (347, '25PI', 'Pintura negra oleo brillante solintex', '0', 5, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (348, '26PI', 'Pintura roja en aceite solintex', '0', 5, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (349, '27PI', 'Pintura roja mate colonial', '0', 3, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (350, '28PI', 'Primer (damian) (cunete)', '0', 163, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (351, '29PI', 'Primer (compania) (cunete)', '0', 24, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (352, '30PI', 'Primer cunetes empezados santa maria', '0', 0, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (353, '1CMP', 'Ceramica 27 x 36 (1,70)  pared (CAJA)', '0', 33, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (354, '2CMP', 'Ceramica 27 x 36 (1,70)pared (piezas)', '0', 6, 'Cerámica, Mármol y Porcelanato', 'Pza');
INSERT INTO `articulos` VALUES (355, '3CMP', 'Ceramica 30 x 60 (1,44) pared (CAJA)', '0', 816, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (356, '4CMP', 'Ceramica 32 x 32 (1,64) beige (CAJA)', '0', 20, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (357, '5CMP', 'Ceramica 33 x 33 (1,56)  piso (CAJA)', '0', 0, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (359, '7CMP', 'Ceramica 33 x 33 (1,56) piso', '0', 10, 'Cerámica, Mármol y Porcelanato', 'Pza');
INSERT INTO `articulos` VALUES (360, '8CMP', 'Ceramica 36x36 (1,89)piso (CAJA)', '0', 4, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (361, '9CMP', 'Ceramica blanca viselada 30x60', '0', 6, 'Cerámica, Mármol y Porcelanato', 'Pza');
INSERT INTO `articulos` VALUES (362, '10CMP', 'Ceramica dolomiti 45x45piso', '0', 0, 'Ceramica, Marmol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (363, '11CMP', 'Ceramica marron (1,73) 34x34 (CAJA)', '0', 11, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (364, '12CMP', 'Ceramica  piscina mosaico', '0', 5, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (365, '13CMP', 'Ceramica punto anaranjado (1,73) 34x34', '0', 37, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (366, '14CMP', 'Ceramica punto negro(1,73) 34x34', '0', 96, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (367, '15CMP', 'Ceramica punto negro (1,73) 34x34', '0', 12, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (368, '16CMP', 'Ceramica rosada canaima (1,73) 34x34', '0', 56, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (369, '17CMP', 'Ceramica rosada canaima (1,73) 34x34', '0', 6, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (370, '18CMP', 'Ceramica venecia class rosa (paleta)', '0', 17, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (371, '19CMP', 'Ceramica venecia class rosa', '0', 64, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (372, '20CMP', 'Marmol amarillo triana 30x60 (paleta)', '0', 7, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (373, '21CMP', 'Marmol amarillo triana 30x60(pieza)', '0', 39, 'Cerámica, Mármol y Porcelanato', 'Pza');
INSERT INTO `articulos` VALUES (374, '22CMP', 'Marmol drack emperador 30x60 (paleta)', '0', 6, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (375, '23CMP', 'Marmol gris escal 30x60 (paleta)', '0', 21, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (376, '24CMP', 'Marmol gris ercal 30x60 (piezas)', '0', 94, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (377, '25CMP', 'Marmol macael blanco 30x30 (paleta)', '0', 41, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (378, '26CMP', 'Marmol macael blanco 30x40 (paleta)', '0', 14, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (379, '27CMP', 'Marmol macael blanco 30x60 (paleta)', '0', 9, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (380, '28CMP', 'Marmol macael blanco 30x60 (piezas)', '0', 0, 'Ceramica, Marmol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (381, '29CMP', 'Marmol marfil crema 30x60x1 (paleta)', '0', 4, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (382, '30CMP', 'Marmol marfil crema 30x60x1 (piezas)', '0', 35, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (383, '31CMP', 'Marmol marfil crema 60x30 (paleta)', '0', 109, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (384, '32CMP', 'Marmol marfil crema 60x30 (piezas)', '0', 0, 'Ceramica, Marmol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (385, '33CMP', 'Marmol marfil crema 60x40 (paleta)', '0', 25, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (386, '34CMP', 'Marmol marfil crema 60x40 (piezas)', '0', 86, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (387, '35CMP', 'Marmol verde india 30x60', '0', 12, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (388, '36CMP', 'Marmol verde india 30x60 (paleta)', '0', 33, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (389, '37CMP', 'Marmol verde india 30x60 (piezas)', '0', 9, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (390, '38CMP', 'Porcelanato 60x60 v6117 beige', '0', 26, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (391, '39CMP', 'Porcelanato 60x60 v6117 beige (paleta)', '0', 87, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (392, '40CMP', 'Porcelanato 60x60 v6117 beige (pieza)', '0', 1, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (393, '41CMP', 'Porcelanato ae6503 30x60', '0', 0, 'Ceramica, Marmol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (394, '42CMP', 'Porcelanato ae6503 30x60 (pieza)', '0', 6, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (395, '43CMP', 'Porcelanato amarillo 60x60 ae6502', '0', 64, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (396, '44CMP', 'Porcelanato amarillo 60x60 (pieza)', '0', 1, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (397, '45CMP', 'Porcelanato beige 60x60 ci0060', '0', 22, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (398, '46CMP', 'Porcelanato beige 60x60(paleta)', '0', 14, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (399, '47CMP', 'Porcelanato beige 60x60 js6836', '0', 14, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (400, '48CMP', 'Porcelanato beige 60x60 js6836 (paleta)', '0', 3, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (401, '49CMP', 'Porcelanato beige 60x60 ral 2608', '0', 12, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (402, '50CMP', 'Porcelanato beige 60x60 vt6021l', '0', 6, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (403, '51CMP', 'Porcelanato beige 60x60 vt6021l (paleta)', '0', 17, 'Cerámica, Mármol y Porcelanato', 'Pza');
INSERT INTO `articulos` VALUES (404, '52CMP', 'Porcelanato beige claro 60x60 eo600', '0', 20, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (405, '53CMP', 'Porcelanato beige claro 60x60 eo600 (paleta)', '0', 20, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (406, '54CMP', 'Porcelanato beige/blanco 60x60 s690l', '0', 17, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (407, '55CMP', 'Porcelanato beige/blanco 60x60 s690l (paleta)', '0', 16, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (408, '56CMP', 'Porcelanato beige/blanco 60x60 s690l (pieza)', '0', 1, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (409, '57CMP', 'Porcelanato blanco crema 60x60', '0', 14, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (410, '58CMP', 'Porcelanato beige 30x60(financiero)', '0', 9, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (411, '59CMP', 'Porcelanato rosado 30x60(financiero)', '0', 32, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (412, '60CMP', 'Porcelanato marmol intenso 50x50', '0', 3, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (413, '61CMP', 'Porcelanato marmol intenso 50x50 (paleta)', '0', 3, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (414, '62CMP', 'Porcelanato negro 60x60', '0', 3, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (415, '63CMP', 'Porcelanato negro 60x60 (paleta)', '0', 6, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (416, '64CMP', 'Porcelanato negro 60x60 (pieza)', '0', 3, 'Cerámica, Mármol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (417, '65CMP', 'Porcelanato rosado 60x30', '0', 0, 'Ceramica, Marmol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (418, '66CMP', 'Porcelanato rosado 60x30 (pieza)', '0', 0, 'Ceramica, Marmol y Porcelanato', 'Unidades');
INSERT INTO `articulos` VALUES (419, '1HG', 'ANILLO 3/4" HG', '0', 3, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (420, '2HG', 'ANILLO 1/2" HG', '0', 321, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (421, '3HG', 'ANILLO 1 HG', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (422, '4HG', 'ANILLO 1 1/2" HG', '0', 66, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (423, '5HG', 'ANILLO 2" HG', '0', 45, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (424, '6HG', 'ANILLO 2 1/2" HG', '0', 65, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (425, '7HG', 'ANILLO 3" HG', '0', 4, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (426, '8HG', 'ANILLO 4" HG', '0', 1, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (427, '9HG', 'CODO 3/4" X 1/2" X 90° HG', '0', 3, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (428, '10HG', 'CODO 3/4" X 45° HG', '0', 8, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (429, '11HG', 'CODO 3/4" X 90° HG', '0', 114, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (430, '12HG', 'CODO 1/2" X 45° HG', '0', 5, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (431, '13HG', 'CODO 1/2" X 90° HG', '0', 117, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (432, '14HG', 'Codo 1/2" x 90° cachimbo hg', '0', 32, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (433, '15HG', 'CODO 1" X 45° HG', '0', 9, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (434, '16HG', 'CODO 1 X 90 HG', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (435, '17HG', 'CODO 1 1/2" X 45° HG', '0', 13, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (436, '18HG', 'CODO 1 1/2" X 90° HG', '0', 21, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (437, '19HG', 'CODO 1 1/4 X 45 HG', '0', 1, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (438, '20HG', 'CODO 2" X 45° HG', '0', 3, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (439, '21HG', 'CODO 2" X 90° HG', '0', 3, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (440, '22HG', 'Codo 2x90 cachimbo hg', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (441, '23HG', 'CODO 2 1/2" X 45° HG', '0', 2, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (442, '24HG', 'CODO 2 1/2" X 90° HG', '0', 34, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (443, '25HG', 'CODO 3" X 90° HG', '0', 25, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (444, '26HG', 'NIPLE 3/4" X 5 HG', '0', 1, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (445, '27HG', 'NIPLE 3/4" X 10 HG', '0', 2, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (446, '28HG', 'NIPLE 1/2" X 5 HG', '0', 21, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (447, '29HG', 'NIPLE 1/2 X 7 HG', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (448, '30HG', 'NIPLE 1/2" X 15 HG', '0', 4, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (449, '31HG', 'NIPLE 1/2 X 32 HG', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (450, '32HG', 'NIPLE 1/2" X 75 HG', '0', 11, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (451, '33HG', 'NIPLE 1" X 5 HG', '0', 5, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (452, '34HG', 'NIPLE 1" X 7 HG', '0', 5, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (453, '35HG', 'NIPLE 1 1/2" X 15 HG', '0', 34, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (454, '36HG', 'NIPLE 1 1/2" X 20 HG', '0', 1, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (455, '37HG', 'NIPLE 1 1/2 X 25 HG', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (456, '38HG', 'NIPLE 1 1/2" X 40 HG', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (457, '39HG', 'NIPLE 1 1/2" X 5 HG', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (458, '40HG', 'NIPLE 1 1/2" X 7 HG', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (459, '41HG', 'NIPLE 2" X 5 HG', '0', 10, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (460, '42HG', 'NIPLE 2" X 8 HG', '0', 18, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (461, '43HG', 'NIPLE 2" X 10 HG', '0', 12, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (462, '44HG', 'NIPLE 2" X 12 HG', '0', 18, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (463, '45HG', 'NIPLE 2" X 14 HG', '0', 41, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (464, '46HG', 'NIPLE 2" X 16 HG', '0', 17, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (465, '47HG', 'NIPLE 2" X 18 HG', '0', 18, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (466, '48HG', 'NIPLE 2" X 20 HG', '0', 20, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (467, '49HG', 'NIPLE 2" X 30 HG', '0', 13, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (468, '50HG', 'NIPLE 2" X 35 HG', '0', 7, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (469, '51HG', 'NIPLE 2" X 40 HG', '0', 8, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (470, '52HG', 'NIPLE 2 X 45 HG', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (471, '53HG', 'NIPLE 2 1/2" X 7 HG', '0', 4, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (472, '54HG', 'NIPLE 2 1/2" X 10 HG', '0', 1, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (473, '55HG', 'NIPLE 2 1/2" X 15 HG', '0', 10, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (474, '56HG', 'NIPLE 2 1/2" X 25 HG', '0', 2, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (475, '57HG', 'NIPLE 3" X 15 HG', '0', 1, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (476, '58HG', 'NIPLE 3" X 35 HG', '0', 1, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (477, '59HG', 'Reduccion 3/4 x 1/2 copa hg', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (478, '60HG', 'Reduccion 1x1" 1/2 hg', '0', 104, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (479, '61HG', 'Reduccion 1" x 3/4" copa hg', '0', 1, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (480, '62HG', 'REDUCCION 2" X 1/2" HG', '0', 8, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (481, '63HG', 'Reduccion 2" x 1" busing hg', '0', 1, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (482, '64HG', 'Reduccion 2" x1 1/2" copa hg', '0', 40, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (483, '65HG', 'REDUCCION 2 1/2" X 1 1/2" HG', '0', 50, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (484, '66HG', 'Reduccion 3" x 2" busing hg', '0', 10, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (485, '67HG', 'Reduccion 3" x 2 1/2" busing hg', '0', 1, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (486, '68HG', 'Reduccion 3" x 2 1/2" copa hg', '0', 1, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (487, '69HG', 'Reduccion 4" x 2 1/2" busing hg', '0', 1, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (488, '70HG', 'Reduccion 4" x 2 1/2" copa hg', '0', 1, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (489, '71HG', 'Reduccion 4" x 2" busing hg', '0', 8, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (490, '72HG', 'REDUCCION 4" X 2" COPA HG ', '0', 3, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (491, '73HG', 'Reduccion 4" x 3" busing hg', '0', 1, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (492, '74HG', 'REDUCCION 4" X 3" COPA HG ', '0', 5, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (493, '75HG', 'TAPON 3/4" HEMBRA HG ', '0', 4, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (494, '76HG', 'TAPON 3/4 MACHO HG ', '0', 11, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (495, '77HG', 'TAPON 1/2" HEMBRA HG', '0', 259, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (496, '78HG', 'TAPON 1/2 MACHO HG', '0', 2, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (497, '79HG', 'TAPON 1" MACHO HG ', '0', 2, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (498, '80HG', 'TAPON 1 1/2"', '0', 4, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (499, '81HG', 'TAPON 1 1/2" MACHO HG', '0', 3, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (500, '82HG', 'TAPON 2" HEMBRA HG', '0', 10, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (501, '83HG', 'TAPON 2" MACHO HG', '0', 5, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (502, '84HG', 'TAPON 2 1/2" MACHO HG', '0', 1, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (503, '85HG', 'TAPON 3" HEMBRA HG', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (504, '86HG', 'TEE 3/4" HG', '0', 8, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (505, '87HG', 'TEE 1/2" HG', '0', 22, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (506, '88HG', 'TEE 1" HG', '0', 8, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (507, '89HG', 'TEE 1 X 1/2 HG', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (508, '90HG', 'TEE 1 1/2" X 3/4" HG', '0', 37, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (509, '91HG', 'TEE 2" HG', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (510, '92HG', 'TEE 2 X 3/4 X 1/2 HG', '0', 2, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (511, '93HG', 'TEE 2" X 1" HG', '0', 3, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (512, '94HG', 'TEE 2 1/2" HG', '0', 11, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (513, '95HG', 'TEE 2 1/2" X 2" HG', '0', 3, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (514, '96HG', 'TEE 3" HG', '0', 1, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (515, '97HG', 'TUBO 1/2" X 6 MTS  HG', '0', 13, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (516, '98HG', 'TUBO 1" X 6 MTS HG', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (517, '99HG', 'TUBO 1 1/2" X 6 MTS HG', '0', 99, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (518, '100HG', 'TUBO 2 1/2" X 6 MTS HG', '0', 9, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (519, '101HG', 'TUBO 4" X 6 MTS HG', '0', 6, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (520, '102HG', 'UNION DREX 1" HG', '0', 2, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (521, '103HG', 'UNION DREX 2" HG', '0', 5, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (522, '104HG', 'UNION UNIVERSAL 3/4" HG', '0', 4, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (523, '105HG', 'UNION UNIVERSAL 1 HG', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (524, '106HG', 'UNION UNIVERSAL 1 1/2" HG', '0', 5, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (525, '107HG', 'UNION UNIVERSAL 2" HG', '0', 0, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (526, '108HG', 'UNION UNIVERSAL 2 1/2" HG', '0', 4, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (527, '109HG', 'UNION UNIVERSAL 3" HG', '0', 3, 'Hierro Galvanizado', 'Unidades');
INSERT INTO `articulos` VALUES (528, '1AN', 'ANILLOS 2', '0', 264, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (529, '2AN', 'ANILLOS 3', '0', 140, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (530, '3AN', 'ANILLOS 4', '0', 75, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (531, '4AN', 'ANILLOS 6', '0', 24, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (532, '5AN', 'BAJANTES DE LAVAMANOS', '0', 350, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (533, '6AN', 'BAJANTES DE LAVAMANOS CROMADAS', '0', 6, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (534, '7AN', 'CODOS 2 X 45', '0', 145, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (535, '8AN', 'CODOS 2 X 90', '0', 0, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (536, '9AN', 'CODOS 3 X 45', '0', 106, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (537, '10AN', 'CODOS 3 X 90', '0', 1208, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (538, '11AN', 'CODOS 4 X 45', '0', 27, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (539, '12AN', 'CODOS 4 X 90', '0', 126, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (540, '13AN', 'CODOS 6 X 45', '0', 20, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (541, '14AN', 'CODOS 8 X 45', '0', 15, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (542, '15AN', 'Gomas reductoras de lavamanos', '0', 329, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (543, '16AN', 'Juego sanitario blanco econ S/plus', '0', 249, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (544, '17AN', 'Lavamanos (deposito taller)', '0', 7, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (545, '18AN', 'Lavamanos blanco (santa maria)', '0', 75, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (546, '19AN', 'Lavamanos blanco grande', '0', 10, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (547, '20AN', 'Lavamanos de lujo con pedestal', '0', 205, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (548, '21AN', 'MANGUERA 1/2 X 1/2 EMT', '0', 47, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (549, '22AN', 'MANGUERA 1/2 X 1/2 PLASTICAS', '0', 76, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (550, '23AN', 'MANGUERA 1/2 X 5/8 EMT', '0', 57, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (551, '24AN', 'MANGUERA 1/2 X 5/8 PLASTICAS', '0', 641, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (552, '25AN', 'Pedestales (taller)', '0', 28, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (553, '26AN', 'PIEZAS DE BANO (LAVAMANOS)', '0', 216, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (554, '27AN', 'PIEZAS DE BANO (WC, TANQUE)', '0', 98, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (555, '28AN', 'POCETAS (DEPOSITO DEL TALLER)', '0', 0, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (556, '29AN', 'REDUCCION 3 X 2', '0', 62, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (557, '30AN', 'REDUCCION 4 X 2', '0', 334, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (558, '31AN', 'REDUCCION 4" X 3"', '0', 49, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (559, '32AN', 'REDUCCION 6 X 4', '0', 24, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (560, '33AN', 'REDUCCION 8" X 6" ', '0', 32, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (561, '34AN', 'REDUCCION 8" X 6" BUSINY', '0', 1, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (562, '35AN', 'REGADERAS CROMADAS', '0', 3, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (563, '36AN', 'REJILLA 2', '0', 414, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (564, '37AN', 'REGILLA 3"', '0', 145, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (565, '38AN', 'REGILLA 4"', '0', 58, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (566, '39AN', 'REJILLA 6"', '0', 1, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (567, '40AN', 'SIFON 2"', '0', 1234, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (568, '41AN', 'SIFON 3"', '0', 943, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (569, '42AN', 'SILLAS REDUCTORAS 10 X 6', '0', 43, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (570, '43AN', 'SILLAS REDUCTORAS 8 X 6', '0', 48, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (571, '44AN', 'Tanque para wc blanco (santa maria)', '0', 59, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (572, '45AN', 'Tanques (taller)', '0', 5, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (573, '46AN', 'TAPA 2" REGISTRO', '0', 607, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (574, '47AN', 'TAPA 3" REGISTRO', '0', 0, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (575, '48AN', 'TAPAS 4" REGISTRO PLASTICAS', '0', 105, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (576, '49AN', 'TAPAS 6" REGISTRO', '0', 1, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (577, '50AN', 'TAPA DE BOCA DE VISITA', '0', 0, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (578, '51AN', 'TAPONES 2" LISOS', '0', 93, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (579, '52AN', 'TAPONES 3 LISO', '0', 210, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (580, '53AN', 'TAPONES 4 LISO', '0', 537, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (581, '54AN', 'TEE 2', '0', 106, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (582, '55AN', 'TEE 2" CRUZ', '0', 7, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (583, '56AN', 'TEE 3"', '0', 484, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (584, '57AN', 'TEE 4', '0', 205, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (585, '58AN', 'TEE 4" X 2"', '0', 747, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (586, '59AN', 'TEE 4" X 3"', '0', 362, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (587, '60AN', 'TEE 6"', '0', 5, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (588, '61AN', 'TEE 6" X 4"', '0', 20, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (589, '62AN', 'TEE 3 X 2', '0', 205, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (590, '63AN', 'TUBOS 2', '0', 316, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (591, '64AN', 'TUBOS 3', '0', 0, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (592, '65AN', 'TUBOS 4', '0', 2, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (593, '66AN', 'TUBOS 4" BLANCOS', '0', 6, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (594, '67AN', 'Tubos 6" x 6 mts junta automatica', '0', 1, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (595, '68AN', 'Tubos 8x6 junta automatica', '0', 0, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (596, '69AN', 'Tubos 10x6 junta automatica', '0', 0, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (597, '70AN', 'Tubos 12" x 6mts junta automatica', '0', 20, 'Aguas Negras', 'Pza');
INSERT INTO `articulos` VALUES (598, '71AN', 'URINARIO', '0', 1, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (599, '72AN', 'W.C BLANCO CON TODO', '0', 286, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (600, '73AN', 'WC BLANCO (CORTESI)', '0', 48, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (601, '74AN', 'WC BLANCO (LA SANTA MARIA)', '0', 55, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (602, '75AN', 'YEE 2"', '0', 1345, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (603, '76AN', 'YEE 3', '0', 138, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (604, '77AN', 'YEE 3" X 2"', '0', 509, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (605, '78AN', 'YEE 4', '0', 74, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (606, '79AN', 'YEE 4" DOBLE', '0', 28, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (607, '80AN', 'YEE 4 X 2', '0', 235, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (608, '81AN', 'YEE 4 X 3', '0', 114, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (609, '82AN', 'YEE 6', '0', 183, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (610, '83AN', 'YEE 6" X 4"', '0', 45, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (611, '84AN', 'YEE 8"', '0', 13, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (615, '1AF', 'ABRAZADERA 1 1/2" X 3/4"', '0', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (616, '2AF', 'ABRAZADERA 2" X 3/4"', '0', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (617, '3AF', 'ABRAZADERA 2 1/2" X 1"', '0', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (618, '4AF', 'ABRAZADERA 2 1/2" X 3/4"', '0', 7, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (619, '5AF', 'ABRAZADERA 2 1/2" X 1/2"', '0', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (620, '6AF', 'ABRAZADERA 3" X 1 1/2"', '0', 8, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (621, '7AF', 'ABRAZADERA 4 X 1', '0', 21, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (622, '8AF', 'ABRAZADERA 4" X 3/4"', '0', 3, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (623, '9AF', 'ABRAZADERA PEAD 4" X 1 1/2"', '0', 4, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (624, '10AF', 'ABRAZADERA PEAD 6" X 1 1/2"', '0', 4, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (625, '11AF', 'ABRAZADERA 6" X 2"', '0', 4, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (626, '12AF', 'ADAPTADOR 1 1/2 MACHO ', '0', 42, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (627, '13AF', 'ADAPTADOR 1 MACHO ', '0', 36, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (628, '14AF', 'ADAPTADOR 1/2 MACHO', '0', 88, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (629, '15AF', 'ADAPTADOR 2 1/2" MACHO', '0', 86, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (630, '16AF', 'ADAPTADOR 2 MACHO ', '0', 55, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (631, '17AF', 'ADAPTADOR 3" MACHO', '0', 25, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (632, '18AF', 'ADAPTADOR 3/4 MACHO', '0', 6036, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (633, '19AF', 'ADAPTADOR 4" MACHO', '0', 9, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (634, '20AF', 'ADAPTADOR 4" *110 COPA', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (635, '21AF', 'ANILLOS 3/4" CON ROSCA', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (636, '22AF', 'ANILLOS 3/4', '0', 685, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (637, '23AF', 'ANILLOS 1/2 CON ROSCA ', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (638, '24AF', 'ANILLOS 1/2 LISO', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (639, '25AF', 'ANILLOS 1" LISO', '0', 346, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (640, '26AF', 'ANILLOS 1 1/2 CON ROSCA ', '0', 36, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (641, '27AF', 'ANILLOS 1 1/2', '0', 558, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (642, '28AF', 'ANILLOS 2" CON ROSCA ', '0', 4, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (643, '29AF', 'ANILLOS 2 LISO', '0', 16, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (644, '30AF', 'ANILLOS 2 1/2" CON ROSCA', '0', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (645, '31AF', 'ANILLOS 2 1/2 LISO', '0', 44, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (646, '32AF', 'ANILLOS 3 LISO', '0', 29, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (647, '33AF', 'ANILLOS 4" JUNTA AUTOMATICA', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (648, '34AF', 'ANILLOS 4" LISO', '0', 7, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (649, '35AF', 'Bocallave de extension 10x4', '0', 6, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (650, '36AF', 'CHEKER 4"', '0', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (651, '37AF', 'CODOS 3/4" X 45°', '0', 504, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (652, '38AF', 'CODOS 3/4 X 90', '0', 176, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (653, '39AF', 'CODOS 1/2 X 45', '0', 979, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (654, '40AF', 'CODOS 1/2" X 90°', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (655, '41AF', 'CODOS 1° X 45', '0', 89, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (656, '42AF', 'CODOS 1 X 90', '0', 13, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (657, '43AF', 'CODOS 1 1/2 X 45', '0', 85, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (658, '44AF', 'CODOS 1 1/2 X 90°', '0', 4, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (659, '45AF', 'CODOS 2" X 45°', '0', 38, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (660, '46AF', 'CODOS 2 X 90', '0', 3, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (661, '47AF', 'CODOS 2 1/2 X 90', '0', 91, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (662, '48AF', 'CODOS 2 1/2 X 45', '0', 24, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (663, '49AF', 'CODOS 3" X 45°', '0', 4, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (664, '50AF', 'CODOS 3 X 90', '0', 43, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (665, '51AF', 'Codos 3 x 90 junta auto', '0', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (666, '52AF', 'CODOS 4" X 45°', '0', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (667, '53AF', 'CODOS 4" X 45° JUNTA AUTOMATICA', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (668, '54AF', 'CODOS 4 X 90', '0', 5, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (669, '55AF', 'Codos 4 X 90 JUNTA AUT ESPIGA', '0', 3, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (670, '56AF', 'CODOS 6" X 90° JUNTA AUTOMATICA', '0', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (671, '57AF', 'Colector universal fregadero 1 1/2"', '0', 6, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (672, '58AF', 'Desague batea y fregadero 1 1/2"', '0', 60, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (673, '59AF', 'DESAGUE DE LAVAMANOS 1 1/4"', '0', 54, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (674, '60AF', 'EMPACADURAS 3"', '0', 11, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (675, '61AF', 'EXTENSION PLASTICA 1 1/2"', '0', 6, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (676, '62AF', 'EXTENSION PLASTICA 1" X 1/4"', '0', 103, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (677, '63AF', 'Extremidad acueducto 110 mm (4', '0', 15, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (678, '64AF', 'Extremidad acueducto 4" JUNTA AUT', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (679, '65AF', 'Extremidad acueducto 75 mm (3")espiga', '0', 6, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (680, '66AF', 'JUNTA DREX ROSCA 1" 1/2', '', 16, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (681, '67AF', 'LLAVES DE CHORRO 1/2"', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (682, '68AF', 'LLAVES DE DUCHA', '0', 107, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (683, '69AF', 'LLAVES DE LAVAMANOS DOBLE', '0', 131, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (684, '70AF', 'LLAVES DE LAVAPLATO', '0', 90, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (685, '71AF', 'LLAVES DE PASO 1"', '0', 65, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (686, '72AF', 'LLAVES DE PASO 2"', '0', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (687, '73AF', 'LLAVES DE PASO 3/4"', '0', 31, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (688, '74AF', 'LLAVES DE PASO 1/2', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (689, '75AF', 'REDUCCION 1 1/2 X 1 BUSYN ', '0', 81, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (690, '76AF', 'REDUCCION 1 1/2 X 1 COPA', '0', 1567, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (691, '77AF', 'REDUCCION 1 1/2 X 3/4', '0', 19, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (692, '78AF', 'REDUCCION 1 X 1/2', '0', 257, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (693, '79AF', 'REDUCCION 1', '0', 1645, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (694, '80AF', 'REDUCCION 1 X 3/4 CON ROSCA', '0', 6, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (695, '81AF', 'REDUCCION 2 1/2" X 2" BUSINY', '0', 2, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (696, '82AF', 'REDUCCION 2 1/2 X 2 COPA', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (697, '83AF', 'REDUCCION 2" X 1 1/2"', '0', 2, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (698, '84AF', 'REDUCCION 2" X 1 1/2" MILIMETRICA', '0', 7, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (699, '85AF', 'REDUCCION 2 X 1', '0', 2, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (700, '86AF', 'REDUCCION 2 X 3/4 MILIMETRICA BUSING', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (701, '87AF', 'REDUCCION 3" X 2 1/2"', '0', 55, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (702, '88AF', 'REDUCCION 3" X 2 1/2" PEAD', '0', 2, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (703, '89AF', 'REDUCCION 3" X 2" BUSING', '0', 3, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (704, '90AF', 'REDUCCION 3" X 2" COPA', '0', 12, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (705, '91AF', 'Reduccion 3" x 2" junta autom', '0', 18, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (706, '92AF', 'REDUCCION 3/4 X 1/2 BUSYN', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (707, '93AF', 'REDUCCION 4" AZUL CON ROSCA', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (708, '94AF', 'REDUCCION 4" X 2"', '0', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (709, '95AF', 'REDUCCION 4" X 3"', '0', 7, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (710, '96AF', 'Reduccion 4" x 3"  junta autom', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (711, '97AF', 'Reduccion 4" x 3" junta autom x espiga', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (712, '98AF', 'Reduccion 6" x 4" junta autom', '0', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (713, '99AF', 'REDUCCION 75" X 62"', '0', 2, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (714, '100AF', 'REDUCCION 90" X 75"', '0', 2, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (715, '101AF', 'SIFON 1 1/2"', '0', 7, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (716, '102AF', 'Sifon 1 1/4" corrugado lavamanos', '0', 469, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (717, '103AF', 'SIFON CORRUGADO 1 1/2"', '0', 3, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (718, '104AF', 'TAPON 3/4" CON ROSCA', '0', 398, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (719, '105AF', 'TAPON 3/4 liso', '0', 1061, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (720, '106AF', 'TAPON 1/2 rosca', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (721, '107AF', 'TAPON 1/2 liso ', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (722, '108AF', 'TAPON 1" liso ', '0', 95, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (723, '109AF', 'TAPON 1 1/2" LISO', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (724, '110AF', 'TAPON 2" LISO', '0', 51, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (725, '111AF', 'TAPON 2" CON ROSCA', '0', 2, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (726, '112AF', 'TAPON 2 1/2 LISO', '0', 78, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (727, '113AF', 'TAPON 3 LISO', '0', 15, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (728, '114AF', 'TAPON BRIDA 3" ESPIGA', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (729, '115AF', 'TAPON 4 JUNTA AUTO ', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (730, '116AF', 'TEE 3/4', '0', 243, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (731, '117AF', 'TEE 3/4" X 1/2"', '0', 1762, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (732, '118AF', 'TEE 1/2', '0', 62, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (733, '119AF', 'TEE 1', '0', 665, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (734, '120AF', 'TEE 1 X 3/4', '0', 298, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (735, '121AF', 'TEE 1" X 1/2', '0', 416, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (736, '122AF', 'TEE 1 1/2', '0', 243, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (737, '123AF', 'TEE 2', '0', 144, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (738, '124AF', 'TEE 2 1/2', '0', 13, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (739, '125AF', 'TEE 3', '0', 13, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (740, '126AF', 'TEE 4 ', '0', 3, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (741, '127AF', 'TEE 4 JUNTA AUTOM', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (742, '128AF', 'TEE 6" X 4" ACUEDUCTO', '0', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (743, '129AF', 'Tubos acueducto 110mm x 6 junta auto', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (744, '130AF', 'TUBOS 3/4 6MTS PAVCO', '0', 32, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (745, '131AF', 'TUBOS 3/4" X 6 MTS AZUL', '0', 88, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (746, '132AF', 'TUBOS 1/2" X 6 MTS AZUL', '0', 5, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (747, '133AF', 'TUBOS 1/2 X 6MTS PVCO', '0', 363, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (748, '134AF', 'TUBOS 1 X 6MTS PAVCO', '0', 52, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (749, '135AF', 'TUBOS 1 X 6 MTRS AZUL', '0', 130, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (750, '136AF', 'TUBOS 1 1/2', '0', 141, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (751, '137AF', 'TUBOS 2" X 6 MTS PAVCO', '0', 5, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (752, '138AF', 'Tubos 2" x 6mts  junta autom', '0', 72, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (753, '139AF', 'TUBOS 2 1/2" X 6 MTS', '0', 69, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (754, '140AF', 'TUBOS 3" X 6 MTS', '0', 91, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (755, '141AF', 'TUBOS 3" X 6 MTS  JUNTA AUTOMATICA', '0', 78, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (756, '142AF', 'TUBOS 4" X 6 MTS', '0', 4, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (757, '143AF', 'TUBOS 4" X 6 JUNTA AUTOM', '0', 28, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (758, '144AF', 'Tubos 6" x 6 mts junta autom', '0', 2, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (759, '145AF', 'UNION DRE X 3" PEAD', '0', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (760, '146AF', 'UNION DRECK 1"', '0', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (761, '147AF', 'UNION DRECK 2"', '0', 9, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (762, '148AF', 'Union reparacion acueducto 110mm(4)', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (763, '149AF', 'Union reparacion acueducto 75mm(3', '0', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (764, '1EL', 'ABRAZADERA 1 EMT', '0', 5, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (765, '2EL', 'ABRAZADERA 1/2 EMT', '0', 57, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (766, '3EL', 'ABRAZADERA 3/4 EMT', '0', 54, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (767, '4EL', 'AISLADOR TIPO CARRETE', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (768, '5EL', 'ANILLOS 1 1/2', '0', 393, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (769, '6EL', 'ANILLOS 1 1/2 EMT', '0', 29, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (770, '7EL', 'ANILLOS 1"', '0', 113, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (771, '8EL', 'ANILLOS 1 EMT', '0', 2, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (772, '9EL', 'ANILLOS 1/2 EMT', '0', 230, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (773, '10EL', 'ANILLOS 1/2 LISO', '0', 495, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (774, '11EL', 'ANILLOS 2 ', '0', 140, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (775, '12EL', 'ANILLOS 3', '0', 599, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (776, '13EL', 'ANILLOS 3 EMT', '0', 2, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (777, '14EL', 'ANILLOS 3/4 EMT', '0', 127, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (778, '15EL', 'ANILLOS 3/4 LISO', '0', 1101, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (779, '16EL', 'ANILLOS 4 EMT', '0', 5, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (780, '17EL', 'APAGADORES DOBLES', '0', 233, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (781, '18EL', 'APAGADORES SENCILLOS LUMISTAR', '0', 340, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (782, '19EL', 'Balastro de lampara (usados)', '0', 55, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (783, '20EL', 'BALAUSTRES DE CAMARA', '0', 10, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (784, '21EL', 'BARRA COOPERWELD', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (785, '22EL', 'Bateria  12v grande', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (786, '23EL', 'Bateria 12v', '0', 8, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (787, '24EL', 'Bateria 12v-4,5 central incendio', '0', 8, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (788, '25EL', 'Bateria 6v-4amp p/lampara emergencia', '0', 62, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (789, '26EL', 'Bomba sumergible 2hp serial mao419x-12a', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (790, '27EL', 'Bomba alta presion trifamer 5hp', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (791, '28EL', 'Bomba 3hp 220 (reparada)', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (792, '29EL', 'Bomba 7,5hp (reparada)', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (793, '30EL', 'Bomba modelo teibfoxo', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (794, '31EL', 'Bombillo ahorrador espiral 23w', '0', 33, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (795, '32EL', 'Breaker 1x20 empotrar', '0', 275, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (796, '33EL', 'Breaker 1x20 superficial industrial', '0', 4, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (797, '34EL', 'Breaker 1x30 empotrar', '0', 164, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (798, '35EL', 'Breaker 1x30 semi industrial', '0', 33, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (799, '36EL', 'Breaker 1x30 superficial industrial', '0', 12, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (800, '37EL', 'Breaker 1x40 superficial', '0', 2, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (801, '38EL', 'Breaker 1x50 empotrar', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (802, '39EL', 'Breaker 2x100 empotrar', '0', 300, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (803, '40EL', 'Breaker 2x125 empotrar', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (804, '41EL', 'Breaker 2x175 empotrar', '0', 10, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (805, '42EL', 'Breaker 2x20 blanco', '0', 2, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (806, '43EL', 'Breaker 2x20 empotrar', '0', 5, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (807, '44EL', 'Breaker 2x200 empotrar', '0', 4, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (808, '45EL', 'Breaker 2x225 empotrar', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (809, '46EL', 'Breaker 2x30 empotrar', '0', 383, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (810, '47EL', 'Breaker 2x30 superficial', '0', 5, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (811, '48EL', 'Breaker 2x40 empotrar', '0', 3, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (812, '49EL', 'Breaker 2x40 superficial industrial', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (813, '50EL', 'Breaker 2x50 superficial industrial', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (814, '51EL', 'BREAKER 2X60 EMPOTRAR', '0', 11, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (815, '52EL', 'BREAKER 2X60 SUPERFICIAL', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (816, '53EL', 'Breaker 2x70 empotrar', '0', 12, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (817, '54EL', 'Breaker 3x150 para empotrar', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (818, '55EL', 'BREAKER 3X50 SUPERFICIAL', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (819, '56EL', 'CABLE N 0 (METROS)', '0', 473, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (820, '57EL', 'Cable n 4 de aluminio(mts)', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (821, '58EL', 'CABLE N 2 AL THHW 100 MTS', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (822, '59EL', 'Cable negro anti espia', '0', 240, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (823, '60EL', 'Cable ttu 2awg (bobina)aluminio', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (824, '61EL', 'Cable ttu 1/0 awg (bobina)alum', '0', 2, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (825, '62EL', 'Cable conductor thw (al) 4/0 awg (mts)', '0', 3, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (826, '63EL', 'Cable n 8 de cobre', '0', 13, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (827, '64EL', 'CABLE N 4 AL (MTS)', '0', 29, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (828, '65EL', 'Cable de cobre 500 kc mil (bobina)', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (829, '66EL', 'Cable de cobre 250kc mil (bobina)', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (830, '67EL', 'CABLE TTU 4/0 AWG (BOBINA)', '0', 2, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (831, '68EL', 'CAJA CONTRA INCENDIO', '0', 2, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (832, '69EL', 'CAJA PASO 4X4X2 ', '0', 8, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (833, '70EL', 'CAJA PASO 6X6X6', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (834, '71EL', 'CAJETIN 4X2', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (835, '72EL', 'CAJETIN 4X2 EMT', '0', 88, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (836, '73EL', 'CAJETIN 4X4 EMT', '0', 20, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (837, '74EL', 'CAJETIN 4X4 ', '0', 794, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (838, '75EL', 'CAJETIN OCTAGONAL', '0', 786, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (839, '76EL', 'CAJETIN OCTAGONAL EMT', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (840, '77EL', 'Camaras rectangular 6mm', '0', 8, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (841, '78EL', 'Camaras redondas sec d310a 6 mm', '0', 8, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (842, '79EL', 'Cargadores de aire (con 2 mangueras)', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (843, '80EL', 'Central deteccion incendio 16z', '0', 5, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (844, '81EL', 'Central deteccion incendio 8z', '0', 3, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (845, '82EL', 'Cheeker de fondo maraca 2"', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (846, '83EL', 'CONECTOR 1 1/2  ', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (847, '84EL', 'CONECTOR 1 EMT', '0', 20, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (848, '85EL', 'CONECTOR 1 1/2 EMT', '0', 27, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (849, '86EL', 'CONECTOR 1', '0', 32, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (850, '87EL', 'CONECTOR 1/2 EMT', '0', 439, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (851, '88EL', 'CONECTOR 3', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (852, '89EL', 'CONECTOR 3/4 MT', '0', 50, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (853, '90EL', 'CONECTOR 3 EMT', '0', 50, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (854, '91EL', 'CONECTOR 4" EMT', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (855, '92EL', 'CONECTORES 1/2', '0', 1116, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (856, '93EL', 'CONECTOR 2 EMT', '0', 31, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (857, '94EL', 'CONECTOR 3/4', '0', 2560, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (858, '95EL', 'CONECTOR 5/8', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (859, '96EL', 'CONTACTORES 220 V', '0', 4, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (860, '97EL', 'Conector compresion barracuda500', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (861, '98EL', 'Conector compresion barracuda3/0', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (862, '99EL', 'Conectores p/camara negra', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (863, '100EL', 'Conectores p/camara plateado', '0', 31, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (864, '101EL', 'CURVAS 1 1/2', '0', 1530, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (865, '102EL', 'CURVAS 1 1/2 EMT', '0', 13, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (866, '103EL', 'CURVAS 1 1/2 NEGRAS', '0', 14, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (867, '104EL', 'CURVAS 1  ', '0', 170, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (868, '105EL', 'CURVAS 1/2', '0', 1175, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (869, '106EL', 'CURVAS 1/2 EMT', '0', 13, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (870, '107EL', 'CURVAS 1/2 EMT CON ROSCA', '0', 7, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (871, '108EL', 'CURVAS 2 1/2 NEGRAS', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (872, '109EL', 'CURVAS 2 NEGRAS', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (873, '110EL', 'CURVAS 2"', '0', 44, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (874, '111EL', 'CURVAS 3"', '0', 194, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (875, '112EL', 'CURVAS 3 EMT', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (876, '113EL', 'CURVAS 3 NEGRAS', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (877, '114EL', 'CURVAS 3/4', '0', 179, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (878, '115EL', 'CURVAS 4"', '0', 5, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (879, '116EL', 'DETECTOR CALOR TERMICO', '0', 12, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (880, '117EL', 'Detector de humo por ionizacion', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (881, '118EL', 'DIFUSOR DE SONIDO', '0', 102, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (882, '119EL', 'Estacion manual plug grande pequeno', '0', 3, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (883, '120EL', 'Estacion manual doble accion plug grande', '0', 51, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (884, '121EL', 'EXTRACTOR  CUADRADO PLASTICO 6', '0', 588, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (885, '122EL', 'EXTRACTOR 10 CON REJILLA', '0', 4, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (886, '123EL', 'FOTOCELULA CON BASE HC ', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (887, '124EL', 'INTERCOMUNICADORES', '0', 18, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (888, '125EL', 'LAMPARA 160MM', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (889, '126EL', 'LAMPARA SPOT 4 P/TECHO', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (890, '127EL', 'Lamparas de emergencia dos focos', '0', 64, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (891, '128EL', 'LAMPARAS DE EMPOTRAR 6 TECHO', '0', 4, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (892, '129EL', 'Lamparas de empotrar 8 techo', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (893, '130EL', 'Lamparas de mesa', '0', 3, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (894, '131EL', 'Lamparas grandes', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (895, '132EL', 'Lamparas metal halide 400w(daniel chavez)', '0', 6, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (896, '133EL', 'Manguera contra incendio', '0', 106, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (897, '134EL', 'Manometro', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (898, '135EL', 'Marco reductor 4x2', '0', 231, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (899, '136EL', 'Marco reductor 4x4', '0', 6, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (900, '137EL', 'Modulo de 8z central model', '0', 10, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (901, '138EL', 'Modulo para central de incendio', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (902, '139EL', 'Planta electrica serial 0001758896', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (903, '140EL', 'Planta electrica serial 0001758887', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (905, '142EL', 'Perros u 1', '0', 8, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (906, '143EL', 'Perros u 3/8', '0', 8, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (907, '144EL', 'Piton (manguera incendio)', '0', 101, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (908, '145EL', 'Planta 300 kva', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (909, '146EL', 'Presostato', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (910, '147EL', 'Protector 220 exceline', '0', 10, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (911, '148EL', 'Pulsador de timbre', '0', 124, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (912, '149EL', 'Reflector laminaria 400 w', '0', 6, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (913, '150EL', 'Rollo cable negro p/camara', '0', 8, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (914, '151EL', 'Sistema inteligente d/pres constante', '0', 2, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (915, '152EL', 'Socates de goma con porcelana', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (916, '153EL', 'Socates de porcelana', '0', 7, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (917, '154EL', 'Supervisor de alta voz final (saf)', '0', 7, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (918, '155EL', 'Supervisor alta voz normal(san)', '0', 52, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (919, '156EL', 'Tablero 16 circuitos', '0', 55, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (920, '157EL', 'Tablero 16 circuitos 16 espacios', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (921, '158EL', 'Tablero 16 circuitos 8 espacios', '0', 2, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (922, '159EL', 'Tablero 8 circuitos (daniel chavez)', '0', 42, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (923, '160EL', 'TABLERO DIGITAL', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (924, '161EL', 'TABLEROS 4 CIRCUITOS', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (925, '162EL', 'TANQUES T120-1X', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (926, '163EL', 'TAPA CENTRAL DE INCENDIO 4Z', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (927, '164EL', 'TAPA CIEGA 4X2', '0', 3571, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (928, '165EL', 'TAPA CIEGA 4X4  ', '0', 1676, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (929, '166EL', 'TAPA CIEGA 4X4 CON ORIFICIO', '0', 14, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (930, '167EL', 'TAPAS 4 X 2 DOBLE HUECO', '0', 339, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (931, '168EL', 'TAPAS 4 X 2 TICINO', '0', 28, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (932, '169EL', 'TEIPE SCOTCH 23', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (933, '170EL', 'TERMINALES 3/8', '0', 100, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (934, '171EL', 'Terminal barracuda 1/0 1/2 largo', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (935, '172EL', 'Terminal barracuda 1/0 5/16 largo', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (936, '173EL', 'TOMACORRIENTE DOBLE', '0', 829, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (937, '174EL', 'Tomacorriente sencillo 220 c/tapa', '0', 27, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (938, '175EL', 'Tomacorriente sencillo chino', '0', 8, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (939, '176EL', 'TOMAS DE TELEFONO', '0', 143, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (940, '177EL', 'TOMAS DE TV', '0', 176, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (941, '178EL', 'Transformador 15 kva serial 3917151512', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (942, '179EL', 'Transformador 25kva serial 3917152519', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (943, '180EL', 'TUBOS 1 1/2"  ', '0', 74, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (944, '181EL', 'TUBOS 1"', '0', 88, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (945, '182EL', 'TUBOS 1 EMT  ', '0', 3, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (946, '183EL', 'TUBOS 1" NEGRO X 3MTS', '0', 64, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (947, '184EL', 'TUBOS 1/2"  ', '0', 747, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (948, '185EL', 'TUBO 1 X 3 MTS', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (949, '186EL', 'TUBOS 1/2 EMT  ', '0', 5, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (950, '187EL', 'TUBOS 1/2 X 3MTS NEGRO', '0', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (951, '188EL', 'TUBOS 2 X 6 MTS  ', '0', 2, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (952, '189EL', 'TUBOS 2 X 3 MTS  ', '0', 4, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (953, '190EL', 'TUBOS 3" X 3 MTS  ', '0', 82, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (954, '191EL', 'TUBOS 3" X 6 MTS', '0', 6, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (955, '192EL', 'TUBOS 3/4"  ', '0', 83, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (956, '193EL', 'TUBOS 3/4" EMT', '0', 10, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (957, '194EL', 'TUBOS 3/4" X 3 MTS (NEGRO)', '0', 468, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (958, '195EL', 'Tubos 4" (santa maria)', '0', 8, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (959, '196EL', 'WINCHE 2 TONELADAS (sin cadena)', '0', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (960, '1AC', 'ADAPTADORES 1/2 MACHO', '0', 330, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (961, '2AC', 'ADAPTADORES 3/4 MACHO', '0', 183, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (962, '3AC', 'ANILLOS 1/2', '0', 896, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (963, '4AC', 'ANILLOS 3/4 X 1/2 C/Rosca Hembra', '0', 682, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (964, '5AC', 'ANILLOS 3/4 LISOS', '0', 814, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (965, '6AC', 'CODOS 3/4" X 45°', '0', 627, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (966, '7AC', 'CODOS 3/4 X 90', '0', 263, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (967, '8AC', 'CODOS 45° 1/2"', '0', 240, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (968, '9AC', 'CODOS 90° 1"', '0', 2, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (969, '10AC', 'CODOS 1/2" X 90', '0', 381, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (970, '11AC', 'CONEXION 3/4" HEMBRA-COPA', '0', 171, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (971, '12AC', 'CONEXION 1/2" HEMBRA-COPA', '0', 198, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (972, '13AC', 'REDUCCIONES 3/4', '0', 235, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (973, '14AC', 'T 1/2"', '0', 567, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (974, '15AC', 'T 3/4', '0', 432, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (975, '16AC', 'TAPONES 1/2" LISOS', '0', 932, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (976, '17AC', 'TAPONES 3/4', '0', 475, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (977, '18AC', 'TUBOS 3/4', '0', 417, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (978, '19AC', 'TUBOS 1/2', '0', 23, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (979, '20AC', 'T 1"*3/4 CON ROSCA', '0', 1, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (992, '21AC', 'T 3/4 CON ROSCA', '', 6, 'Agua Caliente', 'Unidades');
INSERT INTO `articulos` VALUES (993, '150AF', 'ANILLO 1 CON ROSCA ', '', 1, 'Agua Fria', 'Pza');
INSERT INTO `articulos` VALUES (1034, '350GE ', 'CANDADO 30mm HERMEX', '', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (999, '157AF', 'TUBOS DE 1 1/2X6 MTS PAVCO', '', 174, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (1043, '204EL', 'PLAFONES PLASTICOS ', '', 484, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (1005, '92AN', 'TEE 8', '', 5, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (1057, '300EL', 'BOBINA CABLE N° 2 ALUMINIO ', '', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (983, '85AN', 'TUBOS 8 X 3MTS', '', 55, 'Aguas Negras', 'Pza');
INSERT INTO `articulos` VALUES (984, '86AN', 'TUBO 6', '', 1, 'Aguas Negras', 'Pza');
INSERT INTO `articulos` VALUES (1033, '324GE', 'COLA BLACA 1/4', '', 0, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (1036, '40PI', 'GRIS CEMENTO (PREPARDO)', '', 1, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (1020, '199EL', 'BOMBA SUMERGIBLE (USADA) ', '', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (1031, '201EL', 'FOTOCELULA CON BASE NC', '', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (985, '197EL', 'TRANSFORMADOR 50 KVA 5381216', '', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (986, '198EL', 'TRANSFORMADOR 50 KVA 5351216', '', 1, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (1024, '162AF', 'LLAVE DE DUCHA SENCILLA ', '', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (987, '31PI', 'BLANCO INTENSO (CUÑETE)', '', 40, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (988, '32PI', 'pintura blanco caucho (decomax)(cuñete)', '', 2, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (989, '33PI', 'PINTURA AMARILLO TRAFIT (CUÑETE)', '', 0, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (990, '37TE', 'TUBOS 120*60*6 MTS', '', 2, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (991, '38TE', 'TUBO 80*40*6 MTS', '', 1, 'Tubería Estructural', 'Pza');
INSERT INTO `articulos` VALUES (1038, '170AF', 'VALVULA DE COMPUERTA', '', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (994, '151AF', 'TAPON 1" CON ROSCA ', '', 2, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (995, '152AF', 'TAPON 1 1/2 CON ROSCA ', '', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (996, '153AF', 'TAPON 6" JUNTA AUT BRIDA ', '', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (997, '154AF', 'TEE 6 JUNTA AUTOM', '', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (1000, '87AN', 'LAVAMANOS BLANCO(EDIFICIOS)', '', 19, 'Aguas Negras', 'Pza');
INSERT INTO `articulos` VALUES (1001, '88AN', 'PEDESTALES (EDIFICIO)', '', 38, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (1002, '89AN', 'tanque wc blanco (edificios)', '', 55, 'Aguas Negras', 'Pza');
INSERT INTO `articulos` VALUES (1003, '90AN', 'TAPAS WC (EDIFICIOS ', '', 549, 'Aguas Negras', 'Pza');
INSERT INTO `articulos` VALUES (1004, '91AN', 'TAPAS 4 REGISTRO BRONCE ', '', 5, 'Aguas Negras', 'Pza');
INSERT INTO `articulos` VALUES (1007, '94AN', 'WC BLACOS TRAIDOS DE LOS EDIFICIOS', '', 23, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (1041, '200AF', 'CODOS 3/4', '', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (1008, '256', 'ANGULO ALUMINIO 360 X 3/4', '', 108, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (1009, '157GN', 'CERRADURA 45 MM CISA(incompleta)', '', 4, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (1010, '300GE', 'REJILLA PARA DUCTO DE AIRE 35X35', '', 15, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (1011, '301GE', 'REJILLA PARA DUCTO DE AIRE 30X25', '', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (1012, '302GE', 'REJILLA PARA DUCTO DE AIRE 20X20', '', 2, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (1013, '303GE', 'TRAMOS DE ESCALERA MECANICA', '', 17, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (1014, '34PI', 'PINTURA BLANCO INTENSO', '', 9, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (1015, '36PI', 'Pintura esmalte brillante blanco (GALON)', '', 12, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (1016, '304GE', 'TAPA DE TORNILLO ALUCUBOM', '', 57369, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (1017, '305GE', 'TAPA SELLADORA  ALUCUBOM', '', 20200, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (1018, '306GE', 'GOMAS DE ALUCUBOM', '', 12000, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (1019, '308GE', 'CANDADO ANTICIZALLA 80 mm', '', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (1021, '310GE', 'LLAVE PARA LAVAMANOS ', '', 1, 'General', 'Pza');
INSERT INTO `articulos` VALUES (1022, '311GE', 'REGADERA PARA BAÑO', '', 1, 'General', 'Pza');
INSERT INTO `articulos` VALUES (1025, '200EL', 'LAMPARA SENCILLA  110/120 VOLTIOS', '', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (1061, '5AG', 'ACEITE DIESEL por litro', '', 886, 'ACEITE Y GRASA', 'Unidades');
INSERT INTO `articulos` VALUES (1027, '320GE', 'ESPUMA EN CUÑETE ', '', 5, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (1028, '321GE', 'TUBO 1 1/2 X 6,60 ALFAJOL', '', 77, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (1029, '322GE', 'TUBO 2 X 2,20 ALFAJOL', '', 17, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (1030, '323GE', 'COPA DE ALFAJOL', '', 10, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (1032, '202EL', 'BOMBILLO 70W', '', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (1035, '330GE', 'CONOS DE BOCA DE VISITA ', '', 1, 'General', 'Unidades');
INSERT INTO `articulos` VALUES (1037, '96AN', 'CONOS DE BOCA DE VISITA ', '', 3, 'Aguas Negras', 'Unidades');
INSERT INTO `articulos` VALUES (1040, '171PI', 'PINTURA ROJO BRILLANTE(GALON)', '', 0, 'Pintura', 'Unidades');
INSERT INTO `articulos` VALUES (1042, '40TE ', 'TUBOS 80*40*12 MTS', '', 651, 'Tubería Estructural', 'Unidades');
INSERT INTO `articulos` VALUES (1044, '203EL', 'CABLE N 2 ALUMINIO 100MTS', '', 2, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (1045, '171AG', 'LLAVE DE PASO 1 1/2', '', 0, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (1046, '300AG', 'REDUCCION 1 X 3/4 ', '', 1615, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (1047, '201', 'ROLLO DE CABLE N 12 (CORTESI)', '', 0, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (1054, '210EL', 'TAPA CIEGA OCTAGONAL', '', 24, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (1048, '201AF', 'CHEKER 2', '', 2, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (1049, '202AF', 'LLAVE DE PASO 2 1/2', '', 1, 'Agua Fria', 'Unidades');
INSERT INTO `articulos` VALUES (1050, '205EL', 'Contactor LC1 D09m7', '', 2, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (1051, '207EL', 'RELEX TERMICO 15 A 23AMP', '', 3, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (1052, '208EL', 'TAPAS CAJA DE PASO 17X17', '', 27, 'Electricidad', 'Unidades');
INSERT INTO `articulos` VALUES (1055, '44TE', 'TUBOS 100*40*6 METROS ', '', 2, 'Tubería Estructural', 'Pza');
INSERT INTO `articulos` VALUES (1056, '1 AG', 'TUBO DE GRASA VENOCO 397', '', 36, 'ACEITE Y GRASA', 'Unidades');
INSERT INTO `articulos` VALUES (1058, '2AG', 'CUEÑTE DE GRASA 3,5KG', '', 3, 'ACEITE Y GRASA', 'Unidades');
INSERT INTO `articulos` VALUES (1059, '3AG', 'PAILA ACEITE HIDRAULICO 19ltros', '', 8, 'ACEITE Y GRASA', 'Unidades');
INSERT INTO `articulos` VALUES (1060, '4AG', 'PAILA ACEITE DE MOTOR', '', 2, 'ACEITE Y GRASA', 'Unidades');
INSERT INTO `articulos` VALUES (1062, '400GE', 'DISCO DE CORTE 14" Dewalt', '', 0, 'General', 'Unidades');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `autorizadores`
-- 

CREATE TABLE `autorizadores` (
  `id_autorizadores` int(11) NOT NULL auto_increment,
  `ci_autorizadores` varchar(20) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `nombre_autorizadores` varchar(50) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `telefono1_autorizadores` varchar(20) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `telefono2_autorizadores` varchar(20) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `correo_autorizadores` varchar(40) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `direccion_autorizadores` varchar(50) character set utf8 collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id_autorizadores`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `autorizadores`
-- 

INSERT INTO `autorizadores` VALUES (1, '123456789', 'Sumi Nemer', '12345647890', '12345647890', 'ejemplo@hotmail.com', 'Barinas');
INSERT INTO `autorizadores` VALUES (2, '12345678', 'Damian Nemer', '12345647890', '12345647890', 'ejemplo@hotmail.com', 'Barinas');
INSERT INTO `autorizadores` VALUES (3, '1234567', 'Daniel Nemer', '12345647890', '12345647890', 'ejemplo@hotmail.com', 'Barinas');
INSERT INTO `autorizadores` VALUES (4, '3', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '12345647890', '12345647890', 'ejemplo@hotmail.com', 'Barinas');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `compras`
-- 

CREATE TABLE `compras` (
  `codigo_factura` int(11) NOT NULL auto_increment,
  `rif_proveedores` varchar(20) collate utf8_spanish2_ci NOT NULL,
  `fecha_generada_compras` date NOT NULL,
  `hora_generada_compras` time NOT NULL,
  `fecha_recibido_compras` date NOT NULL,
  `hora_recibido_compras` time NOT NULL,
  `estado_compras` varchar(10) collate utf8_spanish2_ci NOT NULL,
  `nombre_autorizadores` varchar(50) collate utf8_spanish2_ci NOT NULL,
  `nombre_encargado` varchar(30) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`codigo_factura`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=10 ;

-- 
-- Volcar la base de datos para la tabla `compras`
-- 

INSERT INTO `compras` VALUES (1, 'j40820469', '2018-01-25', '09:53:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'EDGAR HERNANDEZ');
INSERT INTO `compras` VALUES (2, 'J30323830', '2018-01-25', '09:58:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'JAVIER MOLINA ');
INSERT INTO `compras` VALUES (3, 'J-40276208-9', '2018-01-26', '14:16:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer', 'MARIA MORA (CHARITO)');
INSERT INTO `compras` VALUES (4, 'j40820469', '2018-01-29', '11:52:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'MARIA MORA (CHARITO)');
INSERT INTO `compras` VALUES (5, 'j40820469', '2018-01-29', '17:02:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'MARIA MORA (CHARITO)');
INSERT INTO `compras` VALUES (6, 'j40820469', '2018-02-05', '17:07:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'FRANCISCO TOLEDO ');
INSERT INTO `compras` VALUES (7, 'J30323830', '2018-02-08', '08:34:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'WILMER SANZHEZ ');
INSERT INTO `compras` VALUES (9, 'J-30983114-3', '2018-03-06', '09:22:00', '0000-00-00', '00:00:00', 'LISTA', 'Daniel Nemer', 'WALTER MONTES ');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `compra_detalle`
-- 

CREATE TABLE `compra_detalle` (
  `codigo_factura` int(11) NOT NULL,
  `codigo_articulos` varchar(15) collate utf8_spanish2_ci NOT NULL,
  `cantidad_articulos` int(11) NOT NULL,
  `nombre_unidad` varchar(30) collate utf8_spanish2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- 
-- Volcar la base de datos para la tabla `compra_detalle`
-- 

INSERT INTO `compra_detalle` VALUES (1, '39GE', 3, 'Unidades');
INSERT INTO `compra_detalle` VALUES (2, '50AN', 4, 'Unidades');
INSERT INTO `compra_detalle` VALUES (3, '308GE', 1, 'Unidades');
INSERT INTO `compra_detalle` VALUES (4, '18EL', 16, 'Unidades');
INSERT INTO `compra_detalle` VALUES (4, '174EL', 16, 'Unidades');
INSERT INTO `compra_detalle` VALUES (4, '17EL', 10, 'Unidades');
INSERT INTO `compra_detalle` VALUES (4, '173EL', 10, 'Unidades');
INSERT INTO `compra_detalle` VALUES (4, '310GE', 1, 'Pza');
INSERT INTO `compra_detalle` VALUES (4, '311GE', 1, 'Pza');
INSERT INTO `compra_detalle` VALUES (5, '310GE', 1, 'Pza');
INSERT INTO `compra_detalle` VALUES (5, '311GE', 1, 'Pza');
INSERT INTO `compra_detalle` VALUES (5, '17EL', 10, 'Unidades');
INSERT INTO `compra_detalle` VALUES (6, '72AF', 1, 'Unidades');
INSERT INTO `compra_detalle` VALUES (6, '324GE', 1, 'Unidades');
INSERT INTO `compra_detalle` VALUES (6, '33GE', 1, 'Unidades');
INSERT INTO `compra_detalle` VALUES (6, '21GE', 20, 'Unidades');
INSERT INTO `compra_detalle` VALUES (7, '330GE', 4, 'Unidades');
INSERT INTO `compra_detalle` VALUES (9, '204EL', 200, 'Unidades');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `despacho`
-- 

CREATE TABLE `despacho` (
  `codigo_factura` int(11) NOT NULL auto_increment,
  `ci_encargado` varchar(20) collate utf8_spanish2_ci NOT NULL,
  `fecha_generada_despacho` date NOT NULL,
  `hora_generada_despacho` time NOT NULL,
  `fecha_entregado_despacho` date NOT NULL,
  `hora_entregado_despacho` time NOT NULL,
  `estado_despacho` varchar(10) collate utf8_spanish2_ci NOT NULL,
  `nombre_autorizadores` varchar(50) collate utf8_spanish2_ci NOT NULL,
  `nombre_responsable_opcional_2` varchar(30) collate utf8_spanish2_ci NOT NULL,
  `nombre_responsable_opcional_3` varchar(30) collate utf8_spanish2_ci NOT NULL,
  `nombre_obra` varchar(30) collate utf8_spanish2_ci NOT NULL,
  `nombre_jefe_deposito` varchar(30) collate utf8_spanish2_ci NOT NULL,
  `chofer_despacho` varchar(30) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`codigo_factura`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=191 ;

-- 
-- Volcar la base de datos para la tabla `despacho`
-- 

INSERT INTO `despacho` VALUES (1, '14663269', '2018-01-25', '14:05:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'Placido Arcia ', 'Jose Verenzuela ', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (2, '12555062', '2018-01-25', '16:21:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (3, '20101649', '2018-01-26', '11:23:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'REINALDO BAY', '', 'CENTRO FINANCIERO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (4, '14663269', '2018-01-29', '08:59:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'JOSE VERENZUELA ', 'FRANKLIN PIRTO ', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (5, '12555062', '2018-01-30', '08:41:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'HABER SUAREZ ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (6, '20101649', '2018-01-30', '09:27:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'REINALDO BAY', '', 'CENTRO FINANCIERO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (7, '19243988', '2018-01-30', '10:44:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (8, '14663269', '2018-01-30', '11:33:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (9, '18879459', '2018-01-30', '13:25:00', '0000-00-00', '00:00:00', 'LISTA', 'Daniel Nemer', 'EDGAR HERNANDEZ ', '', 'URB. CIUDAD DE ORO', 'raul escalona', '');
INSERT INTO `despacho` VALUES (10, '19243988', '2018-01-31', '08:26:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'JUAN MANZANO ', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (11, '12555062', '2018-01-31', '08:35:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'EDGAR HERNANDEZ ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (12, '18879459', '2018-01-31', '08:38:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'URB. CIUDAD DE ORO', 'raul escalona', '');
INSERT INTO `despacho` VALUES (13, '14663269', '2018-01-31', '08:41:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'JOSE VERENZUELA ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (14, '20101649', '2018-01-31', '09:46:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'REINALDO BAY', '', 'CENTRO FINANCIERO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (15, '20101649', '2018-01-31', '10:58:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'REINALDO BAY', '', 'CENTRO FINANCIERO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (16, '14663269', '2018-01-31', '11:11:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'GIOVANNY MENDEZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (17, '12555062', '2018-02-01', '08:41:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'JUAN MANZANO ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (18, '18879459', '2018-01-31', '16:46:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'URB. CIUDAD DE ORO', 'raul escalona', '');
INSERT INTO `despacho` VALUES (19, '14663269', '2018-02-01', '09:56:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (20, '14663269', '2018-02-01', '10:00:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (21, '19243988', '2018-02-01', '10:50:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer', 'SUMI NEMER ', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (22, '20101649', '2018-02-01', '10:53:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C EL DORADO', 'raul escalona', '');
INSERT INTO `despacho` VALUES (23, '12555062', '2018-02-01', '11:03:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'IBRAIN MEDINA ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (24, '12555062', '2018-02-01', '15:51:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'EBER SUAREZ ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (25, '12555062', '2018-02-01', '15:55:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'EBER SUAREZ ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (26, '14663269', '2018-02-02', '08:44:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'MIGUEL GONZALEZ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (27, '18879459', '2018-02-05', '08:43:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'URB. CIUDAD DE ORO', 'raul escalona', '');
INSERT INTO `despacho` VALUES (28, '13934393', '2018-02-02', '09:10:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'LOS BUHONEROS', 'raul escalona', '');
INSERT INTO `despacho` VALUES (29, '20101649', '2018-02-02', '15:37:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ALEXANDER SEGOVIA', '', 'C.C EL DORADO', 'raul escalona', '');
INSERT INTO `despacho` VALUES (30, '14663269', '2018-02-05', '08:48:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'JOSE VERENZUELA ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (31, '12555062', '2018-02-05', '09:20:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ALCIBIADES CANELONES ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (32, '12555062', '2018-02-05', '16:52:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'FRANCO VINCI ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (33, '26392401', '2018-02-06', '08:30:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'MARCELO ARTAHONA ', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (34, '26392401', '2018-02-06', '08:36:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ALEXANDRA VALERO ', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (35, '167917526', '2018-02-06', '09:26:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C / URB. SANTA MARIA', 'raul escalona', '');
INSERT INTO `despacho` VALUES (36, '12555062', '2018-02-06', '09:37:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'FRANCO VINCI ', 'JUAN MANZANO ', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (37, '12555062', '2018-02-06', '09:46:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'GIOVANNY MENDEZ ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (38, '12555062', '2018-02-06', '09:49:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'FRANKLIN PIRTO', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (39, '12555062', '2018-02-06', '09:57:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'FRANCO VINCI ', 'JUAN MANZANO ', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (40, '13934393', '2018-02-06', '10:02:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'EDGAR HERNANDEZ ', '', 'LOS BUHONEROS', 'raul escalona', '');
INSERT INTO `despacho` VALUES (41, '13934393', '2018-02-06', '10:03:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'EDGAR HERNANDEZ ', '', 'LOS BUHONEROS', 'raul escalona', '');
INSERT INTO `despacho` VALUES (42, '12555062', '2018-02-06', '10:10:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'FRANCO VINCI ', 'JUAN MANZANO ', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (43, '26392401', '2018-02-06', '10:59:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (44, '26392401', '2018-02-06', '11:02:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (45, '26392401', '2018-02-06', '11:06:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (46, '18879459', '2018-02-06', '11:30:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'URB. CIUDAD DE ORO', 'raul escalona', '');
INSERT INTO `despacho` VALUES (47, '26392401', '2018-02-06', '13:49:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'SUMI NEMER ', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (48, '12555062', '2018-02-06', '17:40:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ', 'HEBER SUAREZ ', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (49, '26392401', '2018-02-07', '08:43:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (50, '12555062', '2018-02-07', '10:31:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'EBER SUAREZ ', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (51, '14663269', '2018-02-07', '09:05:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'LUIS VERENZUELA ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (52, '20101649', '2018-02-07', '09:28:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'LUIS ESPINOZA ', '', 'CENTRO FINANCIERO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (53, '26392401', '2018-02-07', '10:33:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ALEXANDER SEGOVIA', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (54, '167917526', '2018-02-07', '11:29:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C / URB. SANTA MARIA', 'raul escalona', '');
INSERT INTO `despacho` VALUES (55, '14663269', '2018-02-08', '09:45:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer', 'LUIS VERENZUELA ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (56, '12555062', '2018-02-08', '10:24:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer', '', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (57, '2452757', '2018-02-08', '10:54:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer', 'SUMI NEMER ', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (58, '12555062', '2018-02-08', '14:24:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'IBRAIM MEDINA ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (59, '12555062', '2018-02-09', '11:08:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'FRANCO VINCI ', 'JUAN MANZANO ', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (60, '14663269', '2018-02-08', '14:34:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'GIOVANNY MENDEZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (61, '2452757', '2018-02-08', '15:06:00', '0000-00-00', '00:00:00', 'LISTA', 'Daniel Nemer', 'OMAR NEMER ', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (62, '20101649', '2018-02-09', '09:12:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'PEDRO MATHEUS', '', 'C.C EL DORADO', 'raul escalona', '');
INSERT INTO `despacho` VALUES (63, '12555062', '2018-02-14', '08:34:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'JUAN MANZANO ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (64, '12555062', '2018-02-14', '10:52:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (65, '12555062', '2018-02-14', '11:21:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'GIOVANNY MENDEZ ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (66, '12555062', '2018-02-14', '14:03:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'FRANKLIN PIRTO', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (67, '12555062', '2018-02-14', '14:48:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'JUAN MANZANO ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (68, '2452757', '2018-02-14', '16:40:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ANDRES CAMARGO ', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (69, '20101649', '2018-02-15', '08:58:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'REINALDO BAY', '', 'CENTRO FINANCIERO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (70, '12555062', '2018-02-15', '09:06:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'LUIS ESPINOZA ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (71, '14663269', '2018-02-15', '14:48:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (72, '2452757', '2018-02-16', '08:59:00', '0000-00-00', '00:00:00', 'LISTA', 'Damian Nemer', 'JUAN MANZANO ', 'FRANCO VINCI ', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (73, '2452757', '2018-02-16', '09:29:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'SUMI NEMER ', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (74, '12555062', '2018-02-16', '10:30:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'GIOVANNY MENDEZ ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (75, '12555062', '2018-02-16', '10:51:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ', 'EBER SUAREZ ', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (79, '12555062', '2018-02-19', '08:30:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'IBRAIM MEDINA ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (78, '12555062', '2018-02-16', '13:21:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (80, '12555062', '2018-02-19', '09:03:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'FRANCO VINCI ', 'JUAN MANZANO ', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (81, '14663269', '2018-02-19', '08:55:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'GIOVANNY MENDEZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (82, '12555062', '2018-02-19', '09:18:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'EBER SUAREZ ', 'GIOVANNY MENDEZ ', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (83, '12555062', '2018-02-19', '09:24:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'FRANKLIN PIRTO', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (84, '2452757', '2018-02-19', '09:59:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ANDRES CAMARGO ', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (85, '2452757', '2018-02-19', '13:54:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ATEF NEMER ', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (86, '20101649', '2018-02-19', '13:57:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'CENTRO FINANCIERO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (87, '12555062', '2018-02-19', '15:43:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'FRANKLIN PIRTO', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (88, '20101649', '2018-02-19', '17:16:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C EL DORADO', 'raul escalona', '');
INSERT INTO `despacho` VALUES (89, '12555062', '2018-02-20', '09:36:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer', 'GIOVANNY MENDEZ ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (90, '2452757', '2018-02-20', '10:17:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'OMAR NEMER ', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (91, '12555062', '2018-02-20', '11:40:00', '0000-00-00', '00:00:00', 'LISTA', 'Damian Nemer', 'ENGELBERT SUAREZ', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (92, '18879459', '2018-02-20', '14:27:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'URB. CIUDAD DE ORO', 'raul escalona', '');
INSERT INTO `despacho` VALUES (93, '12555062', '2018-02-20', '14:52:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer', 'GIOVANNY MENDEZ ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (94, '14663269', '2018-02-21', '09:00:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'GIOVANNY MENDEZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (95, '167917526', '2018-02-21', '09:10:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C / URB. SANTA MARIA', 'raul escalona', '');
INSERT INTO `despacho` VALUES (96, '2452757', '2018-02-21', '09:49:00', '0000-00-00', '00:00:00', 'LISTA', 'Daniel Nemer', 'DANIEL NEMER ', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (97, '2452757', '2018-02-21', '10:02:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'LUIS ESPINOZA ', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (98, '2452757', '2018-02-21', '10:43:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ANDRES CAMARGO ', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (99, '12555062', '2018-02-21', '11:05:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'GIOVANNY MENDEZ ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (100, '14663269', '2018-02-21', '11:36:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'DANIEL GUTIERREZ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (101, '14663269', '2018-02-21', '11:42:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'CARLOS VELANDRIA ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (102, '14663269', '2018-02-21', '16:33:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'Placido Arcia ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (103, '2452757', '2018-02-22', '08:45:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'JOSE RONDON', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (104, '2452757', '2018-02-22', '09:18:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (105, '2452757', '2018-02-26', '08:31:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ANDRES CAMARGO ', 'SAUSA NEMER ', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (106, '14663269', '2018-02-22', '09:25:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (107, '14663269', '2018-02-26', '08:19:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (108, '14663269', '2018-02-26', '08:59:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'GIOVANNY MENDEZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (109, '12555062', '2018-02-26', '09:20:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'FRANKLIN PIRTO', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (110, '167917526', '2018-02-26', '10:10:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C / URB. SANTA MARIA', 'raul escalona', '');
INSERT INTO `despacho` VALUES (111, '167917526', '2018-02-26', '10:11:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C / URB. SANTA MARIA', 'raul escalona', '');
INSERT INTO `despacho` VALUES (112, '9382045', '2018-02-26', '10:37:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'HOTEL GOLDEN SUITE', 'raul escalona', '');
INSERT INTO `despacho` VALUES (113, '167917526', '2018-02-26', '15:05:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C / URB. SANTA MARIA', 'raul escalona', '');
INSERT INTO `despacho` VALUES (114, '14663269', '2018-02-27', '08:24:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBER SUAREZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (115, '14663269', '2018-02-27', '08:26:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'GIOVANNY MENDEZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (116, '14663269', '2018-02-27', '08:39:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBER SUAREZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (117, '14663269', '2018-02-27', '08:41:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBER SUAREZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (118, '167917526', '2018-02-27', '09:49:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C / URB. SANTA MARIA', 'raul escalona', '');
INSERT INTO `despacho` VALUES (119, '12555062', '2018-02-28', '08:24:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'IBRAHIM MEDINA ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (120, '12555062', '2018-02-28', '08:59:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'DANIEL GUTIERREZ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (121, '12555062', '2018-02-28', '09:00:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'FRANKLIN PIRTO ', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (122, '167917526', '2018-02-28', '09:03:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C / URB. SANTA MARIA', 'raul escalona', '');
INSERT INTO `despacho` VALUES (123, '14663269', '2018-02-28', '09:11:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (124, '14663269', '2018-02-28', '09:56:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (125, '18879459', '2018-02-28', '09:43:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'URB. CIUDAD DE ORO', 'raul escalona', '');
INSERT INTO `despacho` VALUES (126, '14663269', '2018-02-28', '10:14:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'JOEL TERAN ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (127, '14663269', '2018-02-28', '13:07:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELVER SUAREZ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (128, '26392401', '2018-03-01', '10:22:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (129, '20865552', '2018-03-01', '10:28:00', '0000-00-00', '00:00:00', 'LISTA', 'Daniel Nemer', 'MATEO GUTIERREZ ', '', 'CASA DANIEL NEMER', 'raul escalona', '');
INSERT INTO `despacho` VALUES (130, '167917526', '2018-03-05', '11:14:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C / URB. SANTA MARIA', 'raul escalona', '');
INSERT INTO `despacho` VALUES (131, '167917526', '2018-03-05', '11:22:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C / URB. SANTA MARIA', 'raul escalona', '');
INSERT INTO `despacho` VALUES (132, '12555062', '2018-03-05', '13:43:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ROMULO GANSALEZ', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (133, '14663269', '2018-03-05', '14:04:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (134, '12555062', '2018-03-05', '15:10:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'EDGAR HERNANDEZ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (135, '14663269', '2018-03-05', '15:12:00', '0000-00-00', '00:00:00', 'LISTA', 'Damian Nemer', 'ALBERTO QUINTERO', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (136, '12555062', '2018-03-06', '08:29:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'GIOVANNY MENDEZ ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (137, '167917526', '2018-03-06', '08:36:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C / URB. SANTA MARIA', 'raul escalona', '');
INSERT INTO `despacho` VALUES (138, '12555062', '2018-03-06', '08:59:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ALBERTO QUINTERO', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (139, '14663269', '2018-03-06', '09:47:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'IBRAHIN MEDINA ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (140, '14663269', '2018-03-06', '10:35:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (141, '14663269', '2018-03-06', '10:41:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (142, '14663269', '2018-03-06', '10:58:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (143, '12555062', '2018-03-06', '11:10:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'LIBORIO VALLADARES ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (144, '20865552', '2018-03-06', '14:10:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer', '', '', 'CASA ATEF NEMER', 'raul escalona', '');
INSERT INTO `despacho` VALUES (145, '14663269', '2018-03-06', '14:24:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (146, '9382045', '2018-03-06', '15:17:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'JUAN MANZANO ', '', 'HOTEL GOLDEN SUITE', 'raul escalona', '');
INSERT INTO `despacho` VALUES (147, '14663269', '2018-03-06', '16:21:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'PLACIDO ARCIA ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (148, '20865552', '2018-03-07', '09:28:00', '0000-00-00', '00:00:00', 'LISTA', 'Daniel Nemer', '', '', 'CASA SR. ATEF NEMER', 'raul escalona', '');
INSERT INTO `despacho` VALUES (149, '12555062', '2018-03-07', '09:33:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'FRANKLIN PIRTO ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (150, '14663269', '2018-03-07', '09:44:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ ', 'PLACIDO ARCIA ', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (151, '14663269', '2018-03-07', '09:53:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'LUIS VERENZUELA ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (152, '14663269', '2018-03-07', '10:10:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'PLACIDO ARCIA ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (153, '12555062', '2018-03-07', '10:16:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'FRANCO VINCI ', 'JUAN MANZANO ', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (154, '14663269', '2018-03-07', '10:43:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ ', 'FRANKLIN PIRTO ', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (155, '12555062', '2018-03-07', '15:07:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'GIOVANNY MENDEZ ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (156, '26392401', '2018-03-08', '08:25:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ANTONIO MORENO ', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (157, '14663269', '2018-03-08', '09:23:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'GIOVANNY MENDEZ ', 'LUIS VERENZUELA ', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (158, '12202602', '2018-03-08', '09:27:00', '0000-00-00', '00:00:00', 'LISTA', 'Damian Nemer', 'MARIO (CAMARA)', '', 'CASA DAMIAN NEMER', 'raul escalona', '');
INSERT INTO `despacho` VALUES (159, '14663269', '2018-03-08', '11:16:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'LIBORIO VALLADARES ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (160, '20865552', '2018-03-08', '14:53:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'CASA ATEF NEMER', 'raul escalona', '');
INSERT INTO `despacho` VALUES (161, '12555062', '2018-03-08', '15:38:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'EDGAR MIRELES', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (162, '9382045', '2018-03-08', '16:24:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'JUAN MANZANO ', '', 'HOTEL GOLDEN SUITE', 'raul escalona', '');
INSERT INTO `despacho` VALUES (163, '14663269', '2018-03-09', '08:21:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (164, '12555062', '2018-03-09', '08:27:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ROMULO GANSALEZ', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (165, '14663269', '2018-03-09', '08:34:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (166, '13062075', '2018-03-12', '08:43:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'JOSE RONDON ', 'OMAR GABALO', 'GALPON MERCEDES BENZ(CHIGUIRE)', 'raul escalona', '');
INSERT INTO `despacho` VALUES (167, '12555062', '2018-03-12', '08:54:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'GIOVANNY MENDEZ ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (168, '20101649', '2018-03-12', '09:06:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'PEDRO MATHEUS ', '', 'C.C EL DORADO', 'raul escalona', '');
INSERT INTO `despacho` VALUES (169, '26392401', '2018-03-12', '09:21:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (170, '26392401', '2018-03-12', '09:26:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (171, '14663269', '2018-03-12', '09:50:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'PLACIDO ARCIA ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (172, '20101649', '2018-03-12', '10:45:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'REINALDO BAY', '', 'CENTRO FINANCIERO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (173, '12555062', '2018-03-12', '10:48:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ALCIDE GUZMAN', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (174, '14663269', '2018-03-13', '08:13:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (175, '12555062', '2018-03-13', '08:41:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ROMULO GANSALEZ', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (176, '167917526', '2018-03-13', '11:05:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C / URB. SANTA MARIA', 'raul escalona', '');
INSERT INTO `despacho` VALUES (177, '26392401', '2018-03-13', '11:22:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'TIERRA ALTA GRUPO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (178, '14663269', '2018-03-13', '15:15:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (179, '20101649', '2018-03-13', '15:50:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'CENTRO FINANCIERO ATEF', 'raul escalona', '');
INSERT INTO `despacho` VALUES (180, '167917526', '2018-03-13', '16:32:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C / URB. SANTA MARIA', 'raul escalona', '');
INSERT INTO `despacho` VALUES (181, '167917526', '2018-03-14', '08:51:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'C.C / URB. SANTA MARIA', 'raul escalona', '');
INSERT INTO `despacho` VALUES (182, '14663269', '2018-03-14', '11:11:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ ', 'PLACIDO ARCIA ', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (183, '14663269', '2018-03-14', '11:41:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'EBER SUAREZ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (184, '14663269', '2018-03-14', '14:25:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'LUIS VERENZUELA ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (185, '12555062', '2018-03-15', '09:42:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ROMULO GANZALEZ', '', 'URB. TIERRA DEL SOL 3', 'raul escalona', '');
INSERT INTO `despacho` VALUES (186, '20642026', '2018-03-15', '09:58:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'GRANJA SUMI NEMER', 'raul escalona', '');
INSERT INTO `despacho` VALUES (187, '12555062', '2018-03-15', '10:33:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'IBRAHIN MEDINA ', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (188, '12555062', '2018-03-15', '10:35:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'EDGAR MIRELES', '', 'C.C TIERRA DORADA 1', 'raul escalona', '');
INSERT INTO `despacho` VALUES (189, '14663269', '2018-03-15', '10:53:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', 'ENGELBERT SUAREZ ', '', 'URB. TIERRA DEL SOL 1 Y 2', 'raul escalona', '');
INSERT INTO `despacho` VALUES (190, '18879459', '2018-03-15', '11:01:00', '0000-00-00', '00:00:00', 'LISTA', 'Sumi Nemer, Damian Nemer, Daniel Nemer', '', '', 'URB. CIUDAD DE ORO', 'raul escalona', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `despacho_detalle`
-- 

CREATE TABLE `despacho_detalle` (
  `codigo_factura` int(11) NOT NULL,
  `codigo_articulos` varchar(15) collate utf8_spanish2_ci NOT NULL,
  `cantidad_articulos` int(11) NOT NULL,
  `nombre_unidad` varchar(30) collate utf8_spanish2_ci NOT NULL,
  `objetivo_despacho` varchar(50) collate utf8_spanish2_ci NOT NULL,
  KEY `CODIGO_FACTURA` (`codigo_factura`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- 
-- Volcar la base de datos para la tabla `despacho_detalle`
-- 

INSERT INTO `despacho_detalle` VALUES (1, '65AN', 10, 'Unidades', 'Reparacion de tuberia AN casilla vigilancia');
INSERT INTO `despacho_detalle` VALUES (1, '29AF', 2, 'Unidades', 'Reparacion de tuberia tanque N°3');
INSERT INTO `despacho_detalle` VALUES (1, '46AF', 2, 'Unidades', 'Reparacion de tuberia tanque N° 3');
INSERT INTO `despacho_detalle` VALUES (2, '19AF', 2, 'Unidades', 'TUBERIA PARA ACUEDUCTO E INCENDIO');
INSERT INTO `despacho_detalle` VALUES (2, '36AF', 1, 'Unidades', 'TUBERIA PARA ACUEDUCTO E INCENDIO ');
INSERT INTO `despacho_detalle` VALUES (2, '15AF', 4, 'Unidades', 'TUBERIA PARA ACUEDUCTO E INCENDIO ');
INSERT INTO `despacho_detalle` VALUES (3, '11AN', 2, 'Unidades', 'CONEXION DE TUBERIA ');
INSERT INTO `despacho_detalle` VALUES (3, '38AF', 4, 'Unidades', 'CONEXION DE TUBERIA');
INSERT INTO `despacho_detalle` VALUES (3, '14AF', 2, 'Unidades', 'CONEXION DE TUBERIA ');
INSERT INTO `despacho_detalle` VALUES (3, '34EL', 4, 'Unidades', 'ELECTRICIDAD PARA GARITA DE VIGILANCIA ');
INSERT INTO `despacho_detalle` VALUES (4, '82EL', 2, 'Unidades', 'REPARACION DE CUARTO DE BOMBA TORRE 3 Y 4');
INSERT INTO `despacho_detalle` VALUES (4, '4GE', 2, 'Unidades', 'AMARRE DE ENCOFRADO');
INSERT INTO `despacho_detalle` VALUES (4, '56GE', 10, 'Unidades', 'PARA FIJAR ENCOFRADO DE CAMINERIA ');
INSERT INTO `despacho_detalle` VALUES (4, '167GE', 10, 'Unidades', 'PEGO DE CRAMICA TORRE 4 Y 5');
INSERT INTO `despacho_detalle` VALUES (5, '4GE', 1, 'Unidades', 'CONSTRUCCION DE TAPAS DE TANQUILLAS ELEC Y DRENAJE');
INSERT INTO `despacho_detalle` VALUES (5, '29GE', 5, 'Unidades', 'CONSTRUCCION DE TAPAS DE TANQUILLA ELEC Y DRENAJE');
INSERT INTO `despacho_detalle` VALUES (6, '175EL', 4, 'Unidades', 'CASILLA DE VIGILANCIA ');
INSERT INTO `despacho_detalle` VALUES (6, '18EL', 2, 'Unidades', 'CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (6, '22AN', 1, 'Unidades', 'CASILLA DE VIGILANCIA ');
INSERT INTO `despacho_detalle` VALUES (6, '24AN', 1, 'Unidades', 'CASILLA DE VIGILANCIA ');
INSERT INTO `despacho_detalle` VALUES (6, '68AF', 1, 'Unidades', 'CASILLA DE VIGILANCIA ');
INSERT INTO `despacho_detalle` VALUES (6, '166GE', 1, 'Unidades', 'CASILLA DE VIGILANCIA ');
INSERT INTO `despacho_detalle` VALUES (6, '102AF', 1, 'Unidades', 'CASILLA DE VIGILANCIA ');
INSERT INTO `despacho_detalle` VALUES (6, '310GE', 1, 'Pza', 'BAÑO CASILLA DE VIGILANCIA ');
INSERT INTO `despacho_detalle` VALUES (7, '67AF', 1, 'Unidades', 'PARA TALLER GRUPO NEMER ');
INSERT INTO `despacho_detalle` VALUES (8, '166GE', 3, 'Unidades', 'AGUAS BLANCAS Y AGUAS NEGRAS TORRE N° 1');
INSERT INTO `despacho_detalle` VALUES (8, '176GE', 1, 'Unidades', 'AGUAS BLANCAS Y AGUAS NEGRAS TORRE N° 1');
INSERT INTO `despacho_detalle` VALUES (8, '92AF', 20, 'Unidades', 'AGUAS BLANCAS Y AGUAS NEGRAS TORRE N°1');
INSERT INTO `despacho_detalle` VALUES (8, '24AF', 20, 'Unidades', 'AGUAS BLANCAS Y AGUAS NEGRAS TORRE N°1');
INSERT INTO `despacho_detalle` VALUES (8, '22AN', 20, 'Unidades', 'AGUAS BLANCAS Y AGUAS NEGRAS TORRE N°1');
INSERT INTO `despacho_detalle` VALUES (8, '19AC', 4, 'Unidades', 'AGUAS BLANCAS Y AGUAS NEGRAS TORRE N°1');
INSERT INTO `despacho_detalle` VALUES (9, '166GE', 1, 'Unidades', 'REPARACION DE TUBERIA ');
INSERT INTO `despacho_detalle` VALUES (10, '39HG', 1, 'Unidades', 'CUARTO DE BOMBA ');
INSERT INTO `despacho_detalle` VALUES (10, '40HG', 1, 'Unidades', 'CUARTO DE BOMBA ');
INSERT INTO `despacho_detalle` VALUES (10, '18HG', 1, 'Unidades', 'CUARTO DE BOMBA ');
INSERT INTO `despacho_detalle` VALUES (10, '240GE', 1, 'Unidades', 'CUARTO DE BOMBA ');
INSERT INTO `despacho_detalle` VALUES (10, '35HG', 1, 'Unidades', 'CAURTO DE BOMBA');
INSERT INTO `despacho_detalle` VALUES (10, '38HG', 1, 'Unidades', 'CAURTO DE BOMBA ');
INSERT INTO `despacho_detalle` VALUES (10, '106HG', 1, 'Unidades', 'CUARTO DE BOMBA');
INSERT INTO `despacho_detalle` VALUES (10, '21HG', 1, 'Unidades', 'CUARTO DE BOMBA ');
INSERT INTO `despacho_detalle` VALUES (10, '107HG', 1, 'Unidades', 'CUARTO DE BOMBA ');
INSERT INTO `despacho_detalle` VALUES (10, '51HG', 1, 'Unidades', 'CAURTO DE BOMBA ');
INSERT INTO `despacho_detalle` VALUES (11, '22GE', 4, 'Unidades', 'REALIZACION DE PUERTA PARA ESTACION DE BOMBA ');
INSERT INTO `despacho_detalle` VALUES (12, '42GE', 10, 'Unidades', 'PAREDES PERIMETRALES');
INSERT INTO `despacho_detalle` VALUES (12, '29GE', 1, 'Unidades', 'PAREDES PERIMETRALES');
INSERT INTO `despacho_detalle` VALUES (13, '4GE', 2, 'Unidades', 'LEVANTAMIENTO DE TANQUILLAS DE CAMINERIA ');
INSERT INTO `despacho_detalle` VALUES (13, '29GE', 2, 'Unidades', 'EVANTAMIENTO DE TANQUILLAS DE CAMINERIA');
INSERT INTO `despacho_detalle` VALUES (14, '311GE', 1, 'Pza', 'CASILLA DE VIGILANCIA ');
INSERT INTO `despacho_detalle` VALUES (14, '59AF', 1, 'Unidades', 'CASILLA DE VIGILANCIA ');
INSERT INTO `despacho_detalle` VALUES (15, '162AF', 1, 'Unidades', 'BAÑO CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (15, '200EL', 2, 'Unidades', 'ALUMBRADO DE BAÑO PARA CASILLA DE VIGILANCIA ');
INSERT INTO `despacho_detalle` VALUES (16, '162GE', 3, 'Unidades', 'REMATES DE PASILLOS DE CIRCULACION T 8/9/10');
INSERT INTO `despacho_detalle` VALUES (17, '199EL', 1, 'Unidades', 'COLOCACION DE BOMBA ');
INSERT INTO `despacho_detalle` VALUES (18, '29GE', 9, 'Unidades', 'SELLOS DE BOCA DE VISITA ');
INSERT INTO `despacho_detalle` VALUES (17, '240GE', 14, 'Unidades', 'BOMBA SUMERGIBLE ');
INSERT INTO `despacho_detalle` VALUES (19, '1AC', 50, 'Unidades', 'ADAPTACION DE POSETA Y LAVAMNOS ');
INSERT INTO `despacho_detalle` VALUES (20, '106AF', 60, 'Unidades', 'ADAPTACION DE POSETAS Y LAVAMANOS ');
INSERT INTO `despacho_detalle` VALUES (21, '29AF', 2, 'Unidades', 'GRANJA SUMI');
INSERT INTO `despacho_detalle` VALUES (21, '85AF', 2, 'Unidades', 'GRANJA SUMI');
INSERT INTO `despacho_detalle` VALUES (21, '12AF', 1, 'Unidades', 'GRANJA SUMI');
INSERT INTO `despacho_detalle` VALUES (21, '75AF', 1, 'Unidades', 'GRANJA SUMI');
INSERT INTO `despacho_detalle` VALUES (22, '90GE', 4, 'Unidades', 'DUCTERIA DE EXTRACCION DE FERIA DE COMIDA ');
INSERT INTO `despacho_detalle` VALUES (23, '42GE', 4, 'Unidades', 'PARA PAREDES INTERNAS DE DIVISON DEL COUNTRY CLUB');
INSERT INTO `despacho_detalle` VALUES (23, '27GE', 8, 'Unidades', 'ENCOFRADO DE PLACA DE LOCAL ');
INSERT INTO `despacho_detalle` VALUES (23, '4GE', 5, 'Unidades', 'AMARRE DE ENCOFRADO Y VIGAS');
INSERT INTO `despacho_detalle` VALUES (23, '57GE', 1, 'Unidades', 'ENCOFRADO DE VIGA ');
INSERT INTO `despacho_detalle` VALUES (23, '58GE', 10, 'Unidades', 'ENCOFRADO DE VIGA');
INSERT INTO `despacho_detalle` VALUES (24, '141AF', 2, 'Unidades', 'REPARACION DE TUBERIA DE BOAINE ');
INSERT INTO `despacho_detalle` VALUES (25, '149AF', 1, 'Unidades', 'REPARACION DE TUBERIA DE BOAINE ');
INSERT INTO `despacho_detalle` VALUES (26, '63HG', 1, 'Unidades', 'CUARTO DE BOMBA TORRE N° 8');
INSERT INTO `despacho_detalle` VALUES (26, '61HG', 1, 'Unidades', 'CUARTO DE BOMBA TORRE N° 8');
INSERT INTO `despacho_detalle` VALUES (26, '18AF', 1, 'Unidades', 'CUARTO DE BOMBA TORRE N° 8');
INSERT INTO `despacho_detalle` VALUES (26, '38AF', 1, 'Unidades', 'CUARTO DE BOMBA TORRE N° 8');
INSERT INTO `despacho_detalle` VALUES (26, '130AF', 1, 'Unidades', 'CUARTO DE BOMBA TORRE N° 8');
INSERT INTO `despacho_detalle` VALUES (28, '38AF', 4, 'Unidades', 'REPARACION DE TUBERIA PRINCIPAL');
INSERT INTO `despacho_detalle` VALUES (28, '116AF', 2, 'Unidades', 'REPARACION DE TUBERIA PRINCIPAL');
INSERT INTO `despacho_detalle` VALUES (28, '130AF', 1, 'Unidades', 'REPARACION DE TUBERIA PRINCIPAL');
INSERT INTO `despacho_detalle` VALUES (28, '22AF', 4, 'Unidades', 'REPARACION DE TUBERIA PRINCIPAL');
INSERT INTO `despacho_detalle` VALUES (28, '166GE', 1, 'Unidades', 'REPARACION DE TUBERIA PRINCIPAL');
INSERT INTO `despacho_detalle` VALUES (28, '119GE', 1, 'Unidades', 'REPARACION DE TUBERIA PRINCIPAL');
INSERT INTO `despacho_detalle` VALUES (29, '186EL', 15, 'Unidades', 'DORADO');
INSERT INTO `despacho_detalle` VALUES (27, '4GE', 25, 'Unidades', 'SELLO DE BOCA DE VISITA Y PERIMETRAL DE CANAL');
INSERT INTO `despacho_detalle` VALUES (30, '56GE', 10, 'Unidades', 'FIGURIN DE TANQUILLAS PARA CAMINERIA ');
INSERT INTO `despacho_detalle` VALUES (30, '4GE', 2, 'Unidades', 'FIGURIN DE TANQUILLAS PARA CAMINERIA');
INSERT INTO `despacho_detalle` VALUES (31, '201EL', 1, 'Unidades', 'ALUMBRADO DE ESTACIONAMIENTO ');
INSERT INTO `despacho_detalle` VALUES (31, '202EL', 10, 'Unidades', 'ALUMBRADO DE ESTACIONAMIENTO');
INSERT INTO `despacho_detalle` VALUES (32, '27EL', 2, 'Unidades', 'SOLICITADA POR FRANCO VINCI ');
INSERT INTO `despacho_detalle` VALUES (33, '307GE', 2, 'Unidades', 'PAYLOADER 624J (TALLER)');
INSERT INTO `despacho_detalle` VALUES (34, '17EL', 1, 'Unidades', 'CASILLA VIGILANCIA ENTRADA ');
INSERT INTO `despacho_detalle` VALUES (35, '166GE', 2, 'Unidades', 'PEGADO DE TUBERIA DE AGUA BLANCA EDIFICIO LC');
INSERT INTO `despacho_detalle` VALUES (36, '91HG', 1, 'Unidades', 'HRIDRONEUMATICO TIERRA DORADA 1 ETAPA II');
INSERT INTO `despacho_detalle` VALUES (36, '45HG', 4, 'Unidades', 'HRIDRONEUMATICO TIERRA DORADA 1 ETAPA II');
INSERT INTO `despacho_detalle` VALUES (36, '21HG', 2, 'Unidades', 'HRIDRONEUMATICO TIERRA DORADA 1 ETAPA II');
INSERT INTO `despacho_detalle` VALUES (36, '42HG', 2, 'Unidades', 'HRIDRONEUMATICO TIERRA DORADA 1 ETAPA II');
INSERT INTO `despacho_detalle` VALUES (36, '107HG', 2, 'Unidades', 'HRIDRONEUMATICO TIERRA DORADA 1 ETAPA II');
INSERT INTO `despacho_detalle` VALUES (37, '23PI', 2, 'Unidades', 'NIVEL DE FERIA DE LA PIE DE MONTE ');
INSERT INTO `despacho_detalle` VALUES (38, '16CMP', 59, 'Unidades', 'REVESTIMIENTO DE TANQUE N° 2');
INSERT INTO `despacho_detalle` VALUES (38, '167GE', 20, 'Unidades', 'REVESTIMIENTO DE TANQUE N° 2');
INSERT INTO `despacho_detalle` VALUES (39, '72AF', 3, 'Unidades', 'HIDRONEUMATICO TIERRA DORADA ETAPA II ');
INSERT INTO `despacho_detalle` VALUES (39, '6GE', 2, 'Unidades', 'HIDRONEUMATICO TIERRA DORADA ETAPA II');
INSERT INTO `despacho_detalle` VALUES (40, '39GE', 1, 'Unidades', 'JUNTA DE CANALES ');
INSERT INTO `despacho_detalle` VALUES (41, '39GE', 1, 'Unidades', 'JUNTA DE CANALES ');
INSERT INTO `despacho_detalle` VALUES (41, '54GE', 30, 'Unidades', 'COLOCACION DE TAPAS PARA CANALES ');
INSERT INTO `despacho_detalle` VALUES (42, '46HG', 2, 'Unidades', 'HIDRONEUMATICO TIERRA DORADA ETAPA II');
INSERT INTO `despacho_detalle` VALUES (43, '307GE', 9, 'Unidades', 'DONG FENG PLACA A50AG6S');
INSERT INTO `despacho_detalle` VALUES (44, '307GE', 24, 'Unidades', 'PAILOVER DW624JZ617746 CAMBIO 7132 PROX 7632');
INSERT INTO `despacho_detalle` VALUES (45, '307GE', 5, 'Unidades', 'MAZDA BT-50 PLACA A73AA8B');
INSERT INTO `despacho_detalle` VALUES (46, '58GE', 40, 'Unidades', 'ENCOFRADO DE LOSA');
INSERT INTO `despacho_detalle` VALUES (47, '307GE', 7, 'Unidades', 'POLICIA DEL ESTADO ');
INSERT INTO `despacho_detalle` VALUES (48, '127AF', 6, 'Unidades', 'ACUEDUCTO ');
INSERT INTO `despacho_detalle` VALUES (48, '55AF', 2, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (48, '97AF', 2, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (48, '96AF', 1, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (48, '63AF', 2, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (48, '114AF', 1, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (48, '64AF', 3, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (48, '91AF', 1, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (48, '53AF', 4, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (48, '51AF', 1, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (48, '33AF', 2, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (48, '60AF', 1, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (49, '350GE ', 1, 'Unidades', 'CAJA DE HERRAMIENTAS ');
INSERT INTO `despacho_detalle` VALUES (50, '138AF', 3, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (51, '29GE', 15, 'Unidades', 'COLOCACION DE COLUMNAS DE SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (52, '54GE', 50, 'Unidades', 'ENCOFRADO DE BROCALES DE ACERA');
INSERT INTO `despacho_detalle` VALUES (52, '4GE', 3, 'Unidades', 'ENCOFRADO DE BROCALES DE ACERA');
INSERT INTO `despacho_detalle` VALUES (50, '141AF', 10, 'Unidades', 'ACUEDUCTO ');
INSERT INTO `despacho_detalle` VALUES (53, '29PI', 2, 'Unidades', 'CASA SUMI NEMER ');
INSERT INTO `despacho_detalle` VALUES (54, '21GE', 20, 'Unidades', 'PARA PUERTAS DE MADERA DE LOS APARTAMENTOS  ');
INSERT INTO `despacho_detalle` VALUES (54, '324GE', 1, 'Unidades', 'PARA PUERTAS DE MADERA DE LOS APARTAMENTOS');
INSERT INTO `despacho_detalle` VALUES (55, '4GE', 8, 'Unidades', 'PARA SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (55, '56GE', 30, 'Unidades', 'PARA SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (56, '33TE', 24, 'Unidades', 'ESTRUCTURA TIERRA DEL SOL 3');
INSERT INTO `despacho_detalle` VALUES (57, '50CMP', 15, 'Unidades', 'CAJAS /GUANARE SUMI NEMER ');
INSERT INTO `despacho_detalle` VALUES (57, '167GE', 50, 'Unidades', 'GUANARE SUMI NEMER');
INSERT INTO `despacho_detalle` VALUES (58, '4GE', 4, 'Unidades', 'ENCOFRADO DE PLACA DEL LOCLA 101 A');
INSERT INTO `despacho_detalle` VALUES (58, '27GE', 1, 'Unidades', 'ENCOFRADO DE PLACA DEL LOCLA 101 A');
INSERT INTO `despacho_detalle` VALUES (60, '162GE', 2, 'Unidades', 'ENCOFRADO DE PLACA DEL LOCLA 101 A');
INSERT INTO `despacho_detalle` VALUES (61, '217GE', 1, 'Unidades', 'CASA OMAR NEMER ');
INSERT INTO `despacho_detalle` VALUES (61, '197GE', 8, 'Unidades', 'CASA OMAR NEMER ');
INSERT INTO `despacho_detalle` VALUES (62, '109GE', 20, 'Unidades', 'REPARACION DE TECHO FERIA DE COMIDA ');
INSERT INTO `despacho_detalle` VALUES (59, '72EL', 2, 'Unidades', 'PARA TAPAR CAJETINES');
INSERT INTO `despacho_detalle` VALUES (59, '114EL', 6, 'Unidades', 'PARA TAPAR CAJETINES');
INSERT INTO `despacho_detalle` VALUES (59, '107HG', 2, 'Unidades', 'CUARTO DE MAQUINAS ');
INSERT INTO `despacho_detalle` VALUES (59, '217GE', 2, 'Unidades', 'CUARTO DE MAQUINA');
INSERT INTO `despacho_detalle` VALUES (59, '62HG', 1, 'Unidades', 'CUARTO DE MAQUINAS ');
INSERT INTO `despacho_detalle` VALUES (63, '20HG', 2, 'Unidades', 'CUARTO DE MAQUINA');
INSERT INTO `despacho_detalle` VALUES (63, '21HG', 4, 'Unidades', 'CUARTO DE MAQUINA');
INSERT INTO `despacho_detalle` VALUES (63, '87HG', 3, 'Unidades', 'CUARTO DE MAQUINA');
INSERT INTO `despacho_detalle` VALUES (63, '46HG', 2, 'Unidades', 'CUARTO DE MAQUINA');
INSERT INTO `despacho_detalle` VALUES (63, '146EL', 1, 'Unidades', 'CUARTO DE MAQUINA');
INSERT INTO `despacho_detalle` VALUES (63, '82HG', 1, 'Unidades', 'CUARTO DE MAQUINA');
INSERT INTO `despacho_detalle` VALUES (63, '79EL', 2, 'Unidades', 'CUARTO DE MAQUINA');
INSERT INTO `despacho_detalle` VALUES (64, '330GE', 3, 'Unidades', 'INSTALACION DE BOCA DE VISITA ');
INSERT INTO `despacho_detalle` VALUES (65, '40PI', 1, 'Unidades', 'REMATES ');
INSERT INTO `despacho_detalle` VALUES (66, '167GE', 20, 'Unidades', 'REVESTIMIENTO TANQUE N° 3');
INSERT INTO `despacho_detalle` VALUES (67, '71AF', 1, 'Unidades', 'CUARTO DE MAQUINA');
INSERT INTO `despacho_detalle` VALUES (67, '43HG', 2, 'Unidades', 'CUARTO DE MAQUINA ');
INSERT INTO `despacho_detalle` VALUES (68, '307GE', 2, 'Unidades', 'CAMION DONGFENG A49AG5S');
INSERT INTO `despacho_detalle` VALUES (69, '123GE', 1, 'Unidades', 'PISO DE ENTRADA DE ESTACIONAMIENTO');
INSERT INTO `despacho_detalle` VALUES (69, '4GE', 3, 'Unidades', 'PISO DE ENTRADA DE ESTACIONAMIENTO');
INSERT INTO `despacho_detalle` VALUES (70, '269GE', 1, 'Unidades', 'SELLO DE ESTRUCTURA EN PANADERA ');
INSERT INTO `despacho_detalle` VALUES (71, '106AF', 56, 'Unidades', 'PRUEBA DE AGUA Y GAS');
INSERT INTO `despacho_detalle` VALUES (72, '73AF', 1, 'Unidades', 'CASA DAMIAN NEMER ');
INSERT INTO `despacho_detalle` VALUES (72, '130AF', 1, 'Unidades', 'CASA DAMIAN NEMER ');
INSERT INTO `despacho_detalle` VALUES (72, '38AF', 6, 'Unidades', 'CASA DAMIAN NEMER ');
INSERT INTO `despacho_detalle` VALUES (72, '18AF', 3, 'Unidades', 'CASA DAMIAN NEMER ');
INSERT INTO `despacho_detalle` VALUES (72, '104AF', 1, 'Unidades', 'CASA DAMIAN NEMER ');
INSERT INTO `despacho_detalle` VALUES (72, '22AF', 3, 'Unidades', 'CASA DAMIAN NEMER ');
INSERT INTO `despacho_detalle` VALUES (72, '119GE', 1, 'Unidades', 'CASA DAMIAN NEMER ');
INSERT INTO `despacho_detalle` VALUES (73, '74EL', 1, 'Unidades', 'GRANJA SUMI NEMER ');
INSERT INTO `despacho_detalle` VALUES (74, '22PI', 1, 'Unidades', 'REMATES ');
INSERT INTO `despacho_detalle` VALUES (74, '40PI', 1, 'Unidades', 'REMATES ');
INSERT INTO `despacho_detalle` VALUES (75, '51AF', 2, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '112AF', 2, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '108AF', 1, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '76AF', 1, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '26AF', 4, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '136AF', 4, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '175GE', 1, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '166GE', 2, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '43AF', 2, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '170AF', 2, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '91AF', 1, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '93AF', 2, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '9AF', 1, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '20AF', 1, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '12AF', 1, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '109AF', 1, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '29AN', 1, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '110AF', 1, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (75, '115AF', 1, 'Unidades', 'ACUEDUCTO');
INSERT INTO `despacho_detalle` VALUES (78, '171PI', 1, 'Unidades', 'PARA PINTAR CAJETIN DE MANGUERA PARA BOMBEROS ');
INSERT INTO `despacho_detalle` VALUES (79, '2AN', 3, 'Unidades', 'LOCAL 100-A');
INSERT INTO `despacho_detalle` VALUES (79, '22AF', 3, 'Unidades', 'LOCAL 100-A');
INSERT INTO `despacho_detalle` VALUES (79, '130AF', 1, 'Unidades', 'LOCAL 100-A');
INSERT INTO `despacho_detalle` VALUES (79, '166GE', 1, 'Unidades', 'LOCAL 100-A');
INSERT INTO `despacho_detalle` VALUES (80, '73AF', 2, 'Unidades', 'CUARTO DE MAQUINA');
INSERT INTO `despacho_detalle` VALUES (81, '34PI', 2, 'Unidades', 'PASILLOS TORRE N° 8');
INSERT INTO `despacho_detalle` VALUES (80, '59HG', 1, 'Unidades', 'CUARTO DE MAQUINA ');
INSERT INTO `despacho_detalle` VALUES (80, '28HG', 6, 'Unidades', 'CUARTO DE MAQUINA');
INSERT INTO `despacho_detalle` VALUES (82, '141GE', 2, 'Unidades', 'BAÑOS PUBLICOS ');
INSERT INTO `despacho_detalle` VALUES (82, '33PI', 1, 'Unidades', 'TOPES DE ESTACIONAMIENTO');
INSERT INTO `despacho_detalle` VALUES (82, '49AF', 2, 'Unidades', 'REPARACION DE TUBERIA PRINCIPAL AG DE LOCALES ');
INSERT INTO `despacho_detalle` VALUES (83, '32AF', 3, 'Unidades', 'ACHIQUE DE TANQUE N° 1');
INSERT INTO `despacho_detalle` VALUES (83, '49AF', 1, 'Unidades', 'BOMBA DE ACHIQUE DE TANQUE N° 1');
INSERT INTO `despacho_detalle` VALUES (84, '307GE', 24, 'Unidades', 'CAMBIO DE ACEITE PARA EL DONG FEND PLACA A63BY4G');
INSERT INTO `despacho_detalle` VALUES (85, '192EL', 20, 'Unidades', 'CASA ATEF NEMER ');
INSERT INTO `despacho_detalle` VALUES (85, '114EL', 15, 'Unidades', 'CASA ATEF NEMER ');
INSERT INTO `despacho_detalle` VALUES (85, '74EL', 10, 'Unidades', 'CASA ATEF NEMER ');
INSERT INTO `despacho_detalle` VALUES (85, '165EL', 10, 'Unidades', 'CASA ATEF NEMER');
INSERT INTO `despacho_detalle` VALUES (86, '4GE', 3, 'Unidades', 'ENCOFRADO DE BROCALES Y CULMINACION DE PISO');
INSERT INTO `despacho_detalle` VALUES (86, '56GE', 300, 'Unidades', 'ENCOFRADO DE BROCALES Y CULMINACION DE PISO ');
INSERT INTO `despacho_detalle` VALUES (87, '16CMP', 59, 'Unidades', 'REVESTIMIENTO TANQUE N° 1');
INSERT INTO `despacho_detalle` VALUES (87, '167GE', 20, 'Unidades', 'REVESTIMIENTO TANQUE N° 1');
INSERT INTO `despacho_detalle` VALUES (88, '132GE', 1, 'Unidades', 'DE UN ROLLO SE NECESITAN 7 MTRS/DUCTERIA DE EXTRAC');
INSERT INTO `despacho_detalle` VALUES (89, '40PI', 1, 'Unidades', 'REMATES');
INSERT INTO `despacho_detalle` VALUES (90, '197GE', 4, 'Unidades', 'CASA OMAR NEMER ');
INSERT INTO `despacho_detalle` VALUES (91, '46AF', 3, 'Unidades', 'REPARACION DE BOMBA');
INSERT INTO `despacho_detalle` VALUES (91, '29AF', 2, 'Unidades', 'REPARACION DE BOMBA');
INSERT INTO `despacho_detalle` VALUES (91, '166GE', 1, 'Unidades', 'REPARACION DE BOMBA');
INSERT INTO `despacho_detalle` VALUES (92, '50AN', 4, 'Unidades', 'PARA CERRAR LAS BOCA DE VISITA');
INSERT INTO `despacho_detalle` VALUES (92, '4GE', 10, 'Unidades', 'BROCALES Y SELLOS DE BOCA DE VISITA');
INSERT INTO `despacho_detalle` VALUES (93, '167GE', 3, 'Unidades', 'REMATES DE FERIA DE COMIDA Y PORTONES DE ENTRADA');
INSERT INTO `despacho_detalle` VALUES (94, '34PI', 2, 'Unidades', 'PASILLOS TORRE N° 8');
INSERT INTO `despacho_detalle` VALUES (95, '136AF', 10, 'Unidades', 'AGUAS BLANCAS PARTE POSTERIOR EDIFICIO EL');
INSERT INTO `despacho_detalle` VALUES (95, '26AF', 40, 'Unidades', 'AGUAS BLANCAS PARTE POSTERIOR EDIFICIO LC');
INSERT INTO `despacho_detalle` VALUES (95, '44AF', 30, 'Unidades', 'AGUAS BLANCAS PARTE POSTERIOR EDIFICIO LC');
INSERT INTO `despacho_detalle` VALUES (95, '166GE', 3, 'Unidades', 'AGUAS BLANCAS PARTE POSTERIOR EDIFICIO LC');
INSERT INTO `despacho_detalle` VALUES (96, '104EL', 10, 'Unidades', 'CASA ATEF NEMER');
INSERT INTO `despacho_detalle` VALUES (96, '181EL', 10, 'Unidades', 'CASA ATEF NEMER ');
INSERT INTO `despacho_detalle` VALUES (96, '74EL', 4, 'Unidades', 'CASA ATEF NEMER');
INSERT INTO `despacho_detalle` VALUES (96, '165EL', 5, 'Unidades', 'CASA ATEF NEMER');
INSERT INTO `despacho_detalle` VALUES (97, '14AF', 2, 'Unidades', 'CASILLA DE VIGILANCIA ');
INSERT INTO `despacho_detalle` VALUES (97, '17AN', 1, 'Unidades', 'CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (97, '28AN', 1, 'Unidades', 'CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (97, '23AF', 2, 'Unidades', 'CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (97, '54AN', 1, 'Unidades', 'CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (97, '8AN', 1, 'Unidades', 'CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (97, '166GE', 1, 'Unidades', 'CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (97, '48AN', 1, 'Unidades', 'CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (97, '217GE', 1, 'Unidades', 'CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (97, '32EL', 2, 'Unidades', 'CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (97, '167GE', 1, 'Unidades', 'CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (97, '173EL', 5, 'Unidades', 'CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (97, '38GE', 1, 'Unidades', 'CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (97, '17EL', 1, 'Unidades', 'CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (98, '22GE', 3, 'Unidades', 'PUERTA DEL DEPOSITO DE TALLER ');
INSERT INTO `despacho_detalle` VALUES (99, '23PI', 1, 'Unidades', 'REMATES NIVEL FERIA ');
INSERT INTO `despacho_detalle` VALUES (100, '20GE', 3, 'Unidades', 'ASEGURAR CENTRO DE MEDICION ');
INSERT INTO `despacho_detalle` VALUES (101, '34PI', 1, 'Unidades', 'VENTANAL DE PH');
INSERT INTO `despacho_detalle` VALUES (102, '204EL', 42, 'Unidades', 'TORRE N° 6');
INSERT INTO `despacho_detalle` VALUES (102, '224GE', 100, 'Unidades', 'TORRE N° 6');
INSERT INTO `despacho_detalle` VALUES (102, '228GE', 100, 'Unidades', 'TORRE N° 6');
INSERT INTO `despacho_detalle` VALUES (102, '217GE', 1, 'Unidades', 'TORRE N° 6');
INSERT INTO `despacho_detalle` VALUES (103, '40TE ', 60, 'Unidades', 'ESTRUCTURA DE GALPON DE TALLER ');
INSERT INTO `despacho_detalle` VALUES (104, '22AN', 1, 'Unidades', 'CASILLA DE VIGILANCIA ');
INSERT INTO `despacho_detalle` VALUES (104, '36AN', 1, 'Unidades', 'CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (104, '90AN', 1, 'Pza', 'CASILLA DE VIGILANCIA');
INSERT INTO `despacho_detalle` VALUES (110, '38AF', 50, 'Unidades', 'CONEXIONES DE AGUA EDIFICIO LC');
INSERT INTO `despacho_detalle` VALUES (109, '167GE', 25, 'Unidades', 'RECUBRIMIENTO DE TANQUE N° 1');
INSERT INTO `despacho_detalle` VALUES (108, '34PI', 2, 'Unidades', 'PASILLOS DE TORRE N° 8');
INSERT INTO `despacho_detalle` VALUES (105, '307GE', 6, 'Unidades', 'CASA ATEF NEMER ');
INSERT INTO `despacho_detalle` VALUES (106, '7AN', 1, 'Unidades', 'REPARACION TORRE N° 2 PB');
INSERT INTO `despacho_detalle` VALUES (106, '8AN', 1, 'Unidades', 'REPARACION TORRE N° 2 PB');
INSERT INTO `despacho_detalle` VALUES (106, '63AN', 1, 'Unidades', 'REPARACION TORRE N° 2 PB');
INSERT INTO `despacho_detalle` VALUES (106, '64AN', 1, 'Unidades', 'REPARACION TORRE N° 2 PB');
INSERT INTO `despacho_detalle` VALUES (106, '40AN', 1, 'Unidades', 'REPARACION TORRE N° 2 PB');
INSERT INTO `despacho_detalle` VALUES (107, '72EL', 10, 'Unidades', 'SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (107, '94EL', 10, 'Unidades', 'SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (107, '75EL', 8, 'Unidades', 'SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (107, '105EL', 20, 'Unidades', 'SALON DE FIESTA');
INSERT INTO `despacho_detalle` VALUES (107, '159EL', 1, 'Unidades', 'SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (110, '300AG', 30, 'Unidades', 'CONEXION DE AGUA DE EFIDICIO LC ');
INSERT INTO `despacho_detalle` VALUES (111, '203EL', 2, 'Unidades', 'ADECUACION DE MODULO DE MEDICION ');
INSERT INTO `despacho_detalle` VALUES (112, '206GE', 2, 'Unidades', 'REPARACION DE TUBERIA ');
INSERT INTO `despacho_detalle` VALUES (113, '4GE', 50, 'Unidades', 'TANQUE ');
INSERT INTO `despacho_detalle` VALUES (114, '148EL', 15, 'Unidades', 'PASILLOS TORRE N° 8');
INSERT INTO `despacho_detalle` VALUES (115, '34PI', 7, 'Unidades', 'TORRE N° 8 PASILLOS ');
INSERT INTO `despacho_detalle` VALUES (116, '148EL', 10, 'Unidades', 'TORRE N° 1 ');
INSERT INTO `despacho_detalle` VALUES (116, '165EL', 20, 'Unidades', 'TORRE N° 1');
INSERT INTO `despacho_detalle` VALUES (116, '164EL', 20, 'Unidades', 'TORRE N° 1');
INSERT INTO `despacho_detalle` VALUES (116, '173EL', 18, 'Unidades', 'TORRE N° 1');
INSERT INTO `despacho_detalle` VALUES (116, '18EL', 18, 'Unidades', 'TORRE N° 1');
INSERT INTO `despacho_detalle` VALUES (116, '217GE', 1, 'Unidades', 'TORRE N° 1');
INSERT INTO `despacho_detalle` VALUES (116, '201', 2, 'Unidades', 'ELECTRICIDAD DE PASILLOS TORRE N° 1');
INSERT INTO `despacho_detalle` VALUES (116, '228GE', 100, 'Unidades', 'TORRE N° 1');
INSERT INTO `despacho_detalle` VALUES (116, '224GE', 100, 'Unidades', 'TORRE N° 1');
INSERT INTO `despacho_detalle` VALUES (116, '77AN', 1, 'Unidades', 'REPARACIÓN TORRE N° 2');
INSERT INTO `despacho_detalle` VALUES (116, '2AN', 1, 'Unidades', 'REPARACIÓN TORRE N° 2');
INSERT INTO `despacho_detalle` VALUES (116, '64AN', 1, 'Unidades', 'REPARACIÓN TORRE N° 2');
INSERT INTO `despacho_detalle` VALUES (117, '31AF', 2, 'Unidades', 'REPARACIÓN DE TUBERÍA ');
INSERT INTO `despacho_detalle` VALUES (117, '29AF', 1, 'Unidades', 'REPARACIÓN DE TUBERÍA');
INSERT INTO `despacho_detalle` VALUES (118, '171AG', 2, 'Unidades', 'PREPARACION DE DISTRIBUIDOR DE AGUA HIDRONEUMATICO');
INSERT INTO `despacho_detalle` VALUES (119, '4GE', 2, 'Unidades', 'ENCOFRADO DE PESTAÑA DE LOCAL 101-A');
INSERT INTO `despacho_detalle` VALUES (119, '58GE', 20, 'Unidades', 'ENCOFRADO DE PESTAÑA DE LOCAL 101-A');
INSERT INTO `despacho_detalle` VALUES (119, '57GE', 1, 'Unidades', '1k/ ENCOFRADO DE PESTAÑA DE LOCAL 101-A');
INSERT INTO `despacho_detalle` VALUES (122, '22AF', 20, 'Unidades', 'INSTALACION DE AGUA FRIA LC ');
INSERT INTO `despacho_detalle` VALUES (121, '167GE', 20, 'Unidades', 'REVESTIMIENTO DE PISO TANQUE N° 1');
INSERT INTO `despacho_detalle` VALUES (120, '40TE ', 6, 'Unidades', 'CURVA LOS LLANOS LOCAL 26');
INSERT INTO `despacho_detalle` VALUES (123, '63AN', 5, 'Unidades', 'SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (123, '64AN', 5, 'Unidades', 'SALON DE FIESTA');
INSERT INTO `despacho_detalle` VALUES (123, '77AN', 5, 'Unidades', 'SALON DE FIESTA');
INSERT INTO `despacho_detalle` VALUES (123, '9AN', 5, 'Unidades', 'SALON DE FIESTA');
INSERT INTO `despacho_detalle` VALUES (123, '29AN', 5, 'Unidades', 'SALON DE FIESTA');
INSERT INTO `despacho_detalle` VALUES (123, '40AN', 5, 'Unidades', 'SALON DE FIESTA');
INSERT INTO `despacho_detalle` VALUES (125, '29GE', 6, 'Unidades', 'PAREDES Y SELLO DE BOCA DE VISITA ');
INSERT INTO `despacho_detalle` VALUES (125, '42GE', 6, 'Unidades', 'PAREDES Y SELLO DE BOCA DE VISITA');
INSERT INTO `despacho_detalle` VALUES (124, '173EL', 7, 'Unidades', 'TORRE N° 2');
INSERT INTO `despacho_detalle` VALUES (124, '18EL', 17, 'Unidades', 'TORRE N° 2');
INSERT INTO `despacho_detalle` VALUES (124, '148EL', 28, 'Unidades', 'TORRE N° 2');
INSERT INTO `despacho_detalle` VALUES (124, '164EL', 20, 'Unidades', 'TORRE N° 2');
INSERT INTO `despacho_detalle` VALUES (124, '165EL', 20, 'Unidades', 'TORRE N° 2');
INSERT INTO `despacho_detalle` VALUES (124, '224GE', 100, 'Unidades', 'TORRE N° 2');
INSERT INTO `despacho_detalle` VALUES (124, '217GE', 1, 'Unidades', 'TORRE N° 2');
INSERT INTO `despacho_detalle` VALUES (124, '201', 2, 'Unidades', 'TORRE N° 2');
INSERT INTO `despacho_detalle` VALUES (126, '61CMP', 1, 'Unidades', 'PALETA/ SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (126, '167GE', 25, 'Unidades', 'SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (126, '132GE', 3, 'Unidades', 'SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (127, '51AN', 100, 'Unidades', 'REPARACION DE TUBERIA PARA APARTAMENTOS ');
INSERT INTO `despacho_detalle` VALUES (127, '7AN', 100, 'Unidades', 'REPARACION DE TUBERIA PARA APARTAMENTOS');
INSERT INTO `despacho_detalle` VALUES (127, '48AF', 2, 'Unidades', 'REPARACION EN LOCAL 100 A');
INSERT INTO `despacho_detalle` VALUES (127, '31AF', 1, 'Unidades', 'REPARACION EN LOCAL 100 A');
INSERT INTO `despacho_detalle` VALUES (127, '14AF', 100, 'Unidades', 'REPARACION DE TUBERIA PARA APARTAMENTOS');
INSERT INTO `despacho_detalle` VALUES (127, '166GE', 3, 'Unidades', 'REPARACION DE TUBERIA PARA APARTAMENTOS');
INSERT INTO `despacho_detalle` VALUES (127, '19AC', 3, 'Unidades', 'REPARACION DE TUBERIA PARA APARTAMENTOS');
INSERT INTO `despacho_detalle` VALUES (127, '18AC', 3, 'Unidades', 'REPARACION DE TUBERIA PARA APARTAMENTOS');
INSERT INTO `despacho_detalle` VALUES (127, '130AF', 3, 'Unidades', 'REPARACION DE TUBERIA PARA APARTAMENTOS');
INSERT INTO `despacho_detalle` VALUES (128, '307GE', 10, 'Unidades', 'PATROL 670G SERIAL *1DW670GXPCC642638*');
INSERT INTO `despacho_detalle` VALUES (129, '108GE', 6, 'Unidades', 'CASA DANIEL NEMER ');
INSERT INTO `despacho_detalle` VALUES (130, '203EL', 2, 'Unidades', 'MODULO DE MEDICION');
INSERT INTO `despacho_detalle` VALUES (131, '203EL', 4, 'Unidades', 'MODULO DE MEDICION');
INSERT INTO `despacho_detalle` VALUES (132, '27GE', 240, 'Unidades', 'TAPA DE TANQUES ');
INSERT INTO `despacho_detalle` VALUES (133, '104AF', 10, 'Unidades', 'CONEXIONES DE AGUA ');
INSERT INTO `despacho_detalle` VALUES (134, '109GE', 70, 'Unidades', 'BAÑOS NIVEL FERIA ');
INSERT INTO `despacho_detalle` VALUES (135, '20AN', 1, 'Unidades', 'APARTAMENTO 4 PISO 3 TORRE C ');
INSERT INTO `despacho_detalle` VALUES (136, '24GE', 10, 'Unidades', 'PARA FERMENTAR');
INSERT INTO `despacho_detalle` VALUES (136, '167GE', 5, 'Unidades', 'GRAFIADO ');
INSERT INTO `despacho_detalle` VALUES (137, '66AF', 1, 'Unidades', 'REPARACIÓN DE HIDRONEUMATICOS ');
INSERT INTO `despacho_detalle` VALUES (138, '29GE', 10, 'Unidades', 'CONSTRUCCIÓN DE SEPARADORES DE TANQUE ');
INSERT INTO `despacho_detalle` VALUES (139, '4GE', 1, 'Unidades', 'PANADERÍA ');
INSERT INTO `despacho_detalle` VALUES (139, '77AF', 1, 'Unidades', 'PANADERIA');
INSERT INTO `despacho_detalle` VALUES (139, '27AF', 1, 'Unidades', 'PANADERIA');
INSERT INTO `despacho_detalle` VALUES (139, '18AF', 1, 'Unidades', 'PANADERIA ');
INSERT INTO `despacho_detalle` VALUES (139, '130AF', 1, 'Unidades', 'PANADERIA ');
INSERT INTO `despacho_detalle` VALUES (139, '104AF', 1, 'Unidades', 'PANADERIA');
INSERT INTO `despacho_detalle` VALUES (139, '166GE', 1, 'Unidades', 'PANADERIA ');
INSERT INTO `despacho_detalle` VALUES (140, '208EL', 160, 'Unidades', 'TORRE N° 1-2');
INSERT INTO `despacho_detalle` VALUES (140, '92AF', 10, 'Unidades', 'SALÓN DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (140, '40AF', 10, 'Unidades', 'SALÓN DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (140, '192EL', 25, 'Unidades', 'SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (140, '184EL', 20, 'Unidades', 'SALÓN DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (140, '114EL', 20, 'Unidades', 'SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (140, '105EL', 40, 'Unidades', 'SALON DE FIESTA');
INSERT INTO `despacho_detalle` VALUES (140, '77AN', 20, 'Unidades', 'SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (140, '7AN', 20, 'Unidades', 'SALÓN DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (140, '8AN', 5, 'Unidades', 'SALÓN DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (140, '64AN', 10, 'Unidades', 'SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (140, '63AN', 10, 'Unidades', 'SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (140, '2AN', 10, 'Unidades', 'REPARACION DE BAJANTE DE AIRE ACONDICIONADO ');
INSERT INTO `despacho_detalle` VALUES (141, '1AN', 10, 'Unidades', 'REPARACION DE BAJANTES DE AIRES ACONDICIONADOS ');
INSERT INTO `despacho_detalle` VALUES (141, '133AF', 5, 'Unidades', 'REPARACION DE BAJANTES DE AIRES ACONDICIONADOS');
INSERT INTO `despacho_detalle` VALUES (141, '130AF', 5, 'Unidades', 'REPARACION DE BAJANTES DE AIRES ACONDICIONADOS');
INSERT INTO `despacho_detalle` VALUES (141, '166GE', 3, 'Unidades', 'REPARACION DE TUBERIA ');
INSERT INTO `despacho_detalle` VALUES (141, '163GE', 3, 'Unidades', 'REPARACION DE TUBERIA AGUA CALIENTE');
INSERT INTO `despacho_detalle` VALUES (141, '75AN', 10, 'Unidades', 'REPARACION DE BAJANTES DE AIRES ACONDICIONADOS');
INSERT INTO `despacho_detalle` VALUES (142, '201', 3, 'Unidades', 'TORRE N° 1');
INSERT INTO `despacho_detalle` VALUES (142, '107AF', 22, 'Unidades', 'REPARACIÓN DE TUBERÍA TORRE N° 3');
INSERT INTO `despacho_detalle` VALUES (142, '38AF', 200, 'Unidades', 'REPARACIÓN DE TUBERÍA TORRE N° 3');
INSERT INTO `despacho_detalle` VALUES (142, '40AF', 31, 'Unidades', 'REPARACIÓN DE TUBERÍA TORRE N° 3');
INSERT INTO `despacho_detalle` VALUES (142, '118AF', 100, 'Unidades', 'REPARACIÓN DE TUBERÍA TORRE N° 3');
INSERT INTO `despacho_detalle` VALUES (142, '117AF', 100, 'Unidades', 'REPARACIÓN DE TUBERÍA TORRE N° 3');
INSERT INTO `despacho_detalle` VALUES (142, '116AF', 100, 'Unidades', 'REPARACIÓN DE TUBERÍA TORRE N° 3');
INSERT INTO `despacho_detalle` VALUES (142, '92AF', 75, 'Unidades', 'REPARACIÓN DE TUBERÍA TORRE N° 3');
INSERT INTO `despacho_detalle` VALUES (142, '23AF', 93, 'Unidades', 'REPARACIÓN DE TUBERÍA TORRE N° 3');
INSERT INTO `despacho_detalle` VALUES (142, '24AF', 57, 'Unidades', 'REPARACIÓN DE TUBERÍA TORRE N° 3');
INSERT INTO `despacho_detalle` VALUES (142, '15EL', 100, 'Unidades', 'REPARACIÓN DE TUBERÍA TORRE N° 3');
INSERT INTO `despacho_detalle` VALUES (142, '21AF', 52, 'Unidades', 'REPARACIÓN DE TUBERÍA TORRE N° 3');
INSERT INTO `despacho_detalle` VALUES (142, '6AC', 100, 'Unidades', 'REPARACIÓN DE TUBERÍA TORRE N° 3');
INSERT INTO `despacho_detalle` VALUES (143, '132GE', 1, 'Unidades', 'AMPLIACIÓN DE TECHO EN FERIA DE COMIDA(DEUDA) ');
INSERT INTO `despacho_detalle` VALUES (144, '7PI', 1, 'Unidades', 'CASA ATEF NEMER ');
INSERT INTO `despacho_detalle` VALUES (145, '75EL', 10, 'Unidades', 'TORRE N° 1');
INSERT INTO `despacho_detalle` VALUES (145, '210EL', 50, 'Unidades', 'TORRE N° 1');
INSERT INTO `despacho_detalle` VALUES (146, '1PI', 1, 'Unidades', 'PARA EL NUEVO PORTON ');
INSERT INTO `despacho_detalle` VALUES (146, '7PI', 2, 'Unidades', 'PARA EL NUEVO PORTON');
INSERT INTO `despacho_detalle` VALUES (147, '210EL', 30, 'Unidades', 'TORRES N° 2 Y 6');
INSERT INTO `despacho_detalle` VALUES (147, '208EL', 150, 'Unidades', 'TORRES N° 1/2/3/6');
INSERT INTO `despacho_detalle` VALUES (148, '114GE', 1, 'Unidades', 'CASA ATEF NEMER ');
INSERT INTO `despacho_detalle` VALUES (148, '217GE', 3, 'Unidades', 'CASA ATEF NEMER');
INSERT INTO `despacho_detalle` VALUES (148, '57GE', 3, 'Kg', 'CASA ATEF NEMER ');
INSERT INTO `despacho_detalle` VALUES (149, '14CMP', 19, 'Unidades', 'CAJAS/ BAÑOS DE SERVICIO DETRAS DE LOCAL 100A');
INSERT INTO `despacho_detalle` VALUES (149, '167GE', 20, 'Unidades', 'BAÑOS DE SERVICIO DETRAS DE LOCAL 100A');
INSERT INTO `despacho_detalle` VALUES (150, '204EL', 80, 'Unidades', 'TORRE N° 1 Y 2');
INSERT INTO `despacho_detalle` VALUES (151, '14CMP', 15, 'Unidades', 'BAÑOS DE SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (151, '167GE', 20, 'Unidades', 'BAÑOS SALON DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (152, '227GE', 50, 'Unidades', 'TORRE N° 6');
INSERT INTO `despacho_detalle` VALUES (153, '81HG', 1, 'Unidades', 'HIDRONEUMATICO ');
INSERT INTO `despacho_detalle` VALUES (153, '4HG', 1, 'Unidades', 'HIDRONEUMATICO');
INSERT INTO `despacho_detalle` VALUES (153, '43HG', 1, 'Unidades', 'HIDRONEUMATICO');
INSERT INTO `despacho_detalle` VALUES (153, '24HG', 1, 'Unidades', 'HIDRONEUMATICO');
INSERT INTO `despacho_detalle` VALUES (153, '5HG', 1, 'Unidades', 'HIDRONEUMATICO');
INSERT INTO `despacho_detalle` VALUES (154, '229GE', 200, 'Unidades', 'TORRE N° 6');
INSERT INTO `despacho_detalle` VALUES (155, '23PI', 1, 'Unidades', 'REMATES ');
INSERT INTO `despacho_detalle` VALUES (156, '320GE', 1, 'Unidades', 'GRANJA SUMI NEMER ');
INSERT INTO `despacho_detalle` VALUES (157, '23PI', 3, 'Unidades', 'TORRE N° 9');
INSERT INTO `despacho_detalle` VALUES (157, '61CMP', 1, 'Unidades', 'PALETA/SALÓN DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (158, '204EL', 1, 'Unidades', 'CASA DAMIAN ');
INSERT INTO `despacho_detalle` VALUES (158, '173EL', 2, 'Unidades', 'CASA DAMIAN ');
INSERT INTO `despacho_detalle` VALUES (158, '17EL', 1, 'Unidades', 'CASA DAMIAN ');
INSERT INTO `despacho_detalle` VALUES (159, '131GE', 2, 'Unidades', 'SALON DE FIESTA');
INSERT INTO `despacho_detalle` VALUES (160, '7PI', 1, 'Unidades', 'CASA ATEF NEMER ');
INSERT INTO `despacho_detalle` VALUES (161, '109GE', 100, 'Unidades', 'FERIA DE COMIDA ');
INSERT INTO `despacho_detalle` VALUES (162, '51AN', 1, 'Unidades', 'REMODELACION DE BAÑO EN OFICINAS ');
INSERT INTO `despacho_detalle` VALUES (162, '79AN', 1, 'Unidades', 'REMODELACION DE BAÑO EN OFICINAS');
INSERT INTO `despacho_detalle` VALUES (162, '75AN', 1, 'Unidades', 'REMODELACION DE BAÑO EN OFICINAS');
INSERT INTO `despacho_detalle` VALUES (162, '118AF', 8, 'Unidades', 'REMODELACION DE BAÑO EN OFICINAS');
INSERT INTO `despacho_detalle` VALUES (162, '39AF', 4, 'Unidades', 'REMODELACION DE BAÑO EN OFICINAS');
INSERT INTO `despacho_detalle` VALUES (162, '166GE', 1, 'Unidades', 'REMODELACION DE BAÑO EN OFICINAS');
INSERT INTO `despacho_detalle` VALUES (162, '119GE', 1, 'Unidades', 'REMODELACION DE BAÑO EN OFICINAS');
INSERT INTO `despacho_detalle` VALUES (162, '10AC', 10, 'Unidades', 'REMODELACION DE BAÑO EN OFICINAS');
INSERT INTO `despacho_detalle` VALUES (162, '14AC', 6, 'Unidades', 'REMODELACION DE BAÑO EN OFICINAS');
INSERT INTO `despacho_detalle` VALUES (162, '163GE', 1, 'Unidades', 'REMODELACION DE BAÑO EN OFICINAS');
INSERT INTO `despacho_detalle` VALUES (163, '167GE', 35, 'Unidades', 'SALON DE FIESTA  ');
INSERT INTO `despacho_detalle` VALUES (163, '18EL', 60, 'Unidades', 'TORRE N° 1 Y 2');
INSERT INTO `despacho_detalle` VALUES (164, '4GE', 4, 'Unidades', 'AMARRE DE COLUMNAS ');
INSERT INTO `despacho_detalle` VALUES (164, '56GE', 36, 'Unidades', 'TANQUE 1');
INSERT INTO `despacho_detalle` VALUES (164, '57GE', 4, 'Kg', 'TANQUE N° 1');
INSERT INTO `despacho_detalle` VALUES (165, '57AN', 1, 'Unidades', 'OFICINA EDIFICIO 1');
INSERT INTO `despacho_detalle` VALUES (165, '76AN', 1, 'Unidades', 'OFICINA EDIFICIO 1');
INSERT INTO `despacho_detalle` VALUES (165, '3AN', 1, 'Unidades', 'OFICINA EDIFICIO 1');
INSERT INTO `despacho_detalle` VALUES (166, '44TE', 4, 'Pza', 'CIERRE DE PORTONES ');
INSERT INTO `despacho_detalle` VALUES (167, '40PI', 1, 'Unidades', 'LA QUE ESTA COMENZADA -REMATES');
INSERT INTO `despacho_detalle` VALUES (168, '83AF', 1, 'Unidades', 'REPARACIÓN DE TUBERÍA ');
INSERT INTO `despacho_detalle` VALUES (168, '28AF', 1, 'Unidades', 'REPARACIÓN DE TUBERÍA');
INSERT INTO `despacho_detalle` VALUES (168, '137AF', 1, 'Unidades', 'RETAZO /REPARACIÓN DE TUBERÍA');
INSERT INTO `despacho_detalle` VALUES (169, '307GE', 10, 'Unidades', 'CAMBIO DE ACEITE AL PATROL ');
INSERT INTO `despacho_detalle` VALUES (170, '1 AG', 1, 'Unidades', 'CAMION DE SUMI ');
INSERT INTO `despacho_detalle` VALUES (170, '307GE', 12, 'Unidades', 'RETRO ');
INSERT INTO `despacho_detalle` VALUES (171, '217GE', 1, 'Unidades', 'CABLEADO TORRE N° 2');
INSERT INTO `despacho_detalle` VALUES (172, '25TE', 8, 'Unidades', 'ESTRUCTURA DE CUARTO DE BASURA ');
INSERT INTO `despacho_detalle` VALUES (173, '4GE', 2, 'Unidades', 'TANQUE N° 2 ENCOFRADO DE COLUMNAS ');
INSERT INTO `despacho_detalle` VALUES (174, '217GE', 1, 'Unidades', 'TORRE N° 1');
INSERT INTO `despacho_detalle` VALUES (174, '64AN', 14, 'Unidades', 'REPARACIÓN DE BAJANTES DE AGUA PLUVIALES TN°8');
INSERT INTO `despacho_detalle` VALUES (174, '9AN', 8, 'Unidades', 'REPARACIÓN DE BAJANTES DE AGUA PLUVIALES TN°8');
INSERT INTO `despacho_detalle` VALUES (174, '10AN', 4, 'Unidades', 'REPARACIÓN DE BAJANTES DE AGUA PLUVIALES TN°8');
INSERT INTO `despacho_detalle` VALUES (174, '166GE', 2, 'Unidades', 'REPARACIÓN DE BAJANTES DE AGUA PLUVIALES TN°8');
INSERT INTO `despacho_detalle` VALUES (174, '4GE', 1, 'Unidades', 'REPARACIÓN DE BAJANTES DE AGUA PLUVIALES TN°8');
INSERT INTO `despacho_detalle` VALUES (174, '224GE', 100, 'Unidades', 'COLOCACIÓN DE SOCATES TIPO PLAFONES ');
INSERT INTO `despacho_detalle` VALUES (174, '228GE', 100, 'Unidades', 'COLOCACIÓN DE SOCATES TIPO PLAFONES');
INSERT INTO `despacho_detalle` VALUES (175, '4GE', 4, 'Unidades', 'ENCOFRADO DE TANQUE N° 2');
INSERT INTO `despacho_detalle` VALUES (175, '57GE', 8, 'Kg', 'ENCOFRADO DE TANQUE N° 2');
INSERT INTO `despacho_detalle` VALUES (175, '56GE', 32, 'Unidades', 'ENCOFRADO DE TANQUE N° 2');
INSERT INTO `despacho_detalle` VALUES (176, '56GE', 120, 'Unidades', 'ENCOFRAR VACIADO DE CAMINERIAS, RAMPAS Y ESCALERAS');
INSERT INTO `despacho_detalle` VALUES (177, '307GE', 1, 'Unidades', 'PARA COMPLETAR CAMBIO DE ACEITE DEL RETRO');
INSERT INTO `despacho_detalle` VALUES (178, '167GE', 30, 'Unidades', 'SALÓN DE FIESTA ');
INSERT INTO `despacho_detalle` VALUES (178, '209EL', 18, 'Unidades', 'TORRE N°3');
INSERT INTO `despacho_detalle` VALUES (179, '58GE', 100, 'Unidades', 'ENCOFRADO DE CUARTO DE BASURA ');
INSERT INTO `despacho_detalle` VALUES (179, '4GE', 1, 'Unidades', 'ENCOFRADO DE CUARTO DE BASURA	');
INSERT INTO `despacho_detalle` VALUES (180, '122GE', 3, 'Unidades', 'ADITIVO PARA PREMESCLADO ');
INSERT INTO `despacho_detalle` VALUES (181, '400GE', 1, 'Unidades', 'PROTECTORES DE MODULO DE MEDICIÓN ');
INSERT INTO `despacho_detalle` VALUES (182, '204EL', 40, 'Unidades', 'TORRE N° 3');
INSERT INTO `despacho_detalle` VALUES (182, '173EL', 11, 'Unidades', 'TORRE N° 3');
INSERT INTO `despacho_detalle` VALUES (182, '165EL', 10, 'Unidades', 'TORRE N° 3');
INSERT INTO `despacho_detalle` VALUES (182, '148EL', 28, 'Unidades', 'TORRE N° 3	');
INSERT INTO `despacho_detalle` VALUES (182, '224GE', 100, 'Unidades', 'TORRE N° 3	');
INSERT INTO `despacho_detalle` VALUES (182, '7AN', 200, 'Unidades', 'REPARACION DE BAJANTES DE AIRE ACONDICIONADO ');
INSERT INTO `despacho_detalle` VALUES (182, '228GE', 100, 'Unidades', 'TORRE N°3');
INSERT INTO `despacho_detalle` VALUES (182, '107AF', 100, 'Unidades', 'PRUEBA DE TUBERÍA ');
INSERT INTO `despacho_detalle` VALUES (183, '81AN', 12, 'Unidades', 'REPARACIÓN DE BAJANTES DE AGUA PLUVIAL TORRE N° 8');
INSERT INTO `despacho_detalle` VALUES (183, '3AN', 10, 'Unidades', 'REPARACIÓN DE BAJANTES DE AGUA PLUVIAL TORRE N° 8');
INSERT INTO `despacho_detalle` VALUES (183, '47AN', 2, 'Unidades', 'REPARACIÓN DE BAJANTES DE AGUA PLUVIAL TORRE N° 8');
INSERT INTO `despacho_detalle` VALUES (183, '166GE', 2, 'Unidades', 'REPARACIÓN DE BAJANTES DE AGUA PLUVIAL TORRE N° 8');
INSERT INTO `despacho_detalle` VALUES (184, '38GE', 2, 'Unidades', 'SALON DE FIESTA');
INSERT INTO `despacho_detalle` VALUES (184, '167GE', 20, 'Unidades', 'SALON DE FIESTA');
INSERT INTO `despacho_detalle` VALUES (185, '27GE', 160, 'Unidades', 'TANQUE N°1');
INSERT INTO `despacho_detalle` VALUES (185, '29GE', 10, 'Unidades', 'TANQUE N° 1');
INSERT INTO `despacho_detalle` VALUES (186, '22AF', 4, 'Unidades', 'GRANJA SUMI');
INSERT INTO `despacho_detalle` VALUES (186, '18AF', 4, 'Unidades', 'GRANJA SUMI');
INSERT INTO `despacho_detalle` VALUES (187, '4GE', 2, 'Unidades', 'PANADERIA');
INSERT INTO `despacho_detalle` VALUES (188, '109GE', 50, 'Unidades', 'PARA FACHADAS DONDE ESTA LA DISCOTECA  ');
INSERT INTO `despacho_detalle` VALUES (189, '80AN', 10, 'Unidades', 'TORRE N°1 REPARACION DE TUBERIA DE AIRE ACONDCNDO');
INSERT INTO `despacho_detalle` VALUES (189, '75AN', 20, 'Unidades', 'TORRE N°1 REPARACION DE TUBERIA DE AIRE ACONDCNDO');
INSERT INTO `despacho_detalle` VALUES (189, '14AF', 100, 'Unidades', 'REPARACION DE TUBERIA TORRE N° 3 Y 4');
INSERT INTO `despacho_detalle` VALUES (189, '166GE', 4, 'Unidades', 'REPARACION DE TUBERIA');
INSERT INTO `despacho_detalle` VALUES (189, '163GE', 2, 'Unidades', 'REPARACION DE TUBERIA');
INSERT INTO `despacho_detalle` VALUES (190, '55GE', 2, 'Kg', 'ENCOFRADO DE COLECTORES DE AGUA DE LLUVIA ');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `encargado`
-- 

CREATE TABLE `encargado` (
  `id_encargado` int(11) NOT NULL auto_increment,
  `ci_encargado` varchar(20) collate utf8_spanish2_ci NOT NULL,
  `nombre_encargado` varchar(30) collate utf8_spanish2_ci NOT NULL,
  `telefono1_encargado` varchar(20) collate utf8_spanish2_ci NOT NULL,
  `telefono2_encargado` varchar(20) collate utf8_spanish2_ci NOT NULL,
  `correo_encargado` varchar(40) collate utf8_spanish2_ci NOT NULL,
  `direccion_encargado` varchar(50) collate utf8_spanish2_ci NOT NULL,
  `nombre_obra` varchar(30) collate utf8_spanish2_ci NOT NULL,
  `nombre_obra2` varchar(30) collate utf8_spanish2_ci NOT NULL,
  `nombre_obra3` varchar(30) collate utf8_spanish2_ci NOT NULL,
  `nombre_obra4` varchar(30) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id_encargado`),
  UNIQUE KEY `CEDULA` (`ci_encargado`),
  KEY `nombre_obra` (`nombre_obra`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=19 ;

-- 
-- Volcar la base de datos para la tabla `encargado`
-- 

INSERT INTO `encargado` VALUES (1, '14663269', 'WALTER MONTES ', '04149518686', '', 'waltermontes1980@gmail.com', 'BARINAS', 'URB. TIERRA DEL SOL 1 Y 2', '', '', '');
INSERT INTO `encargado` VALUES (10, '13934393', 'DOMINGO GOMEZ ', '04268713159', '', 'NO TIENEN ', 'BARINAS', 'LOS BUHONEROS', '', '', '');
INSERT INTO `encargado` VALUES (3, '18879459', 'JAVIER MOLINA ', '04141577449', '', 'javiermolina267@gmail.com', 'BARINAS ', 'URB. CIUDAD DE ORO', '', '', '');
INSERT INTO `encargado` VALUES (11, '26392401', 'ANDRES CAMARGO ', '04145071956', '', 'NO', 'BARINAS', 'TIERRA ALTA GRUPO ATEF ', '', '', '');
INSERT INTO `encargado` VALUES (5, '12555062', 'WILMER SANZHEZ ', '04264282382', '', 'sanchezchuy.1272@gmail.com', 'BARINAS', 'C.C TIERRA DORADA 1', 'URB. TIERRA DEL SOL 3', 'C.C TIERRA DORADA 2', '');
INSERT INTO `encargado` VALUES (6, '167917526', 'FRANCISCO TOLEDO ', '04145443550', '', 'frantolep85@gmail.com', 'BARINAS ', 'C.C / URB. SANTA MARIA ', '', '', '');
INSERT INTO `encargado` VALUES (7, '20101649', 'JOSE RONDON', '04245018190', '', 'joserondon1981@hotmail.com', 'BARINAS', 'C.C EL DORADO', 'CENTRO FINANCIERO ATEF', '', '');
INSERT INTO `encargado` VALUES (8, '9382045', 'FRANCO VINCI', '04166733366', '', 'francovinci@gmail.com', 'BARINAS', 'HOTEL GOLDEN SUITE', 'C.C TIERRA DORADA 1', '', '');
INSERT INTO `encargado` VALUES (9, '20273368', 'EDGAR HERNANDEZ', '04245904045', '', 'envican@hotmail.com', 'BARINAS', 'LOS BUHONEROS', '', '', '');
INSERT INTO `encargado` VALUES (15, '20865552', 'DANIEL NEMER ', '04145697601', '', 'NO', 'PALMA DE ORO', 'CASA SR. ATEF NEMER', 'CASA DANIEL NEMER ', 'CASA ATEF NEMER', '');
INSERT INTO `encargado` VALUES (13, '20642026', 'SUMI NEMER ', '04245905884', '', 'NO', 'BARINAS', 'GRANJA SUMI NEMER ', '', '', '');
INSERT INTO `encargado` VALUES (16, '13062075', 'FREDDY GARCIA', '04141596886', '', 'ingfreddygarcia1@hotmail.com', 'Barinas ', 'GALPON MERCEDES BENZ(CHIGUIRE)', '', '', '');
INSERT INTO `encargado` VALUES (17, '9262848', 'MANUEL MASIA ', '04245244803', '', 'mmenrique62@hotmail.com', 'Barinas ', 'GALPON MERCEDES BENZ(CHIGUIRE)', '', '', '');
INSERT INTO `encargado` VALUES (18, '12202602', 'ALDO SAN LORENZO', '04245025086', '', 'NO', 'Barinas ', 'CASA DAMIAN NEMER ', '', '', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `obras`
-- 

CREATE TABLE `obras` (
  `id_obra` int(11) NOT NULL auto_increment,
  `nombre_obra` varchar(30) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `direccion_obra` varchar(50) character set utf8 collate utf8_spanish2_ci NOT NULL,
  `fecha_inicio_obra` date NOT NULL,
  PRIMARY KEY  (`id_obra`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- 
-- Volcar la base de datos para la tabla `obras`
-- 

INSERT INTO `obras` VALUES (2, 'C.C EL DORADO', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (3, 'C.C PALMA DE ORO', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (4, 'C.C TIERRA DORADA 1', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (5, 'C.C TIERRA DORADA 2', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (6, 'C.C / URB. SANTA MARIA ', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (7, 'CASA SR. ATEF NEMER', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (8, 'CENTRO FINANCIERO ATEF', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (9, 'EL DORADO COUNTRY CLUB', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (10, 'GALPON MERCEDES BENZ(CHIGUIRE)', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (11, 'HOTEL GOLDEN SUITE', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (12, 'JACQUI CORTESI', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (13, 'LOCAL CANCHA CHINA', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (14, 'LOCAL CENTRO BIBLIOTECA', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (15, 'LOCAL CENTRO RONI', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (16, 'LOS BUHONEROS', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (17, 'TIERRA ALTA GRUPO ATEF ', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (18, 'URB. CIUDAD DE ORO', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (19, 'URB. TIERRA DEL SOL 1 Y 2', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (20, 'URB. TIERRA DEL SOL 3', 'BARINAS', '2018-01-22');
INSERT INTO `obras` VALUES (22, 'CASA DANIEL NEMER ', 'CORTESI ', '2018-03-01');
INSERT INTO `obras` VALUES (23, 'CASA ATEF NEMER', 'PALMA DE ORO', '2018-03-06');
INSERT INTO `obras` VALUES (24, 'CASA DAMIAN NEMER ', 'PALMA DE ORO', '2018-03-08');
INSERT INTO `obras` VALUES (25, 'GRANJA SUMI NEMER ', 'BARINAS ', '2018-03-15');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proveedores`
-- 

CREATE TABLE `proveedores` (
  `id_proveedores` int(11) NOT NULL auto_increment,
  `rif_proveedores` varchar(20) collate utf8_spanish2_ci NOT NULL,
  `nombre_proveedores` varchar(30) collate utf8_spanish2_ci NOT NULL,
  `telefono1_proveedores` varchar(20) collate utf8_spanish2_ci NOT NULL,
  `telefono2_proveedores` varchar(20) collate utf8_spanish2_ci NOT NULL,
  `telefono3_proveedores` varchar(20) collate utf8_spanish2_ci NOT NULL,
  `telefono4_proveedores` varchar(20) collate utf8_spanish2_ci NOT NULL,
  `correo_proveedores` varchar(30) collate utf8_spanish2_ci NOT NULL,
  `direccion_proveedores` varchar(50) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id_proveedores`),
  UNIQUE KEY `CEDULA` (`rif_proveedores`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `proveedores`
-- 

INSERT INTO `proveedores` VALUES (3, 'J30323830', 'Concreteria Industrial Barinas', '02739234468', '', '', '', 'coinbaca.ventas@gmail.com', 'Carretera Troncal 5, Local Nº. 13-83 LA CARAMUCA');
INSERT INTO `proveedores` VALUES (4, 'j40820469', 'Agroferremat, C.A ', '02735530998', '', '', '', 'NO TIENEN ', 'Av. cuatricentenaria Barinas');
INSERT INTO `proveedores` VALUES (5, 'J-40276208-9', 'FERRE EXPRESS BARINAS, C.A.', '02739350553', '', '', '', 'ferreexpress@gmail.com', 'Av. Francia Con Av. Marquitos. C.C. Palma Real');
INSERT INTO `proveedores` VALUES (6, 'V11925466', 'PEDRO QUINTANA ', '04145443550', '', '', '', 'NO TIENEN ', 'BARINAS');
INSERT INTO `proveedores` VALUES (8, 'J-30983114-3', 'Ferreunica, C.A', '04127734557', '', '', '', 'NO', 'Barinas ');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rubro`
-- 

CREATE TABLE `rubro` (
  `id_rubro` int(11) NOT NULL auto_increment,
  `nombre_rubro` varchar(40) character set utf8 collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id_rubro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- Volcar la base de datos para la tabla `rubro`
-- 

INSERT INTO `rubro` VALUES (1, 'Aguas Negras');
INSERT INTO `rubro` VALUES (2, 'Agua Fria');
INSERT INTO `rubro` VALUES (3, 'Pintura');
INSERT INTO `rubro` VALUES (4, 'Agua Caliente');
INSERT INTO `rubro` VALUES (5, 'Electricidad');
INSERT INTO `rubro` VALUES (6, 'Hierro Galvanizado');
INSERT INTO `rubro` VALUES (7, 'Tubería Estructural');
INSERT INTO `rubro` VALUES (8, 'General');
INSERT INTO `rubro` VALUES (11, 'Cerámica, Mármol y Porcelanato');
INSERT INTO `rubro` VALUES (14, 'ACEITE Y GRASA');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `unidad`
-- 

CREATE TABLE `unidad` (
  `id_unidad` int(11) NOT NULL auto_increment,
  `nombre_unidad` varchar(30) character set utf8 collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id_unidad`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `unidad`
-- 

INSERT INTO `unidad` VALUES (1, 'Kg');
INSERT INTO `unidad` VALUES (3, 'Unidades');
INSERT INTO `unidad` VALUES (4, 'Pza');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL auto_increment,
  `usuario` varchar(30) collate utf8_spanish2_ci NOT NULL,
  `clave` varchar(30) collate utf8_spanish2_ci NOT NULL,
  `cedula_usuario` varchar(20) collate utf8_spanish2_ci NOT NULL,
  `correo_usuario` varchar(30) collate utf8_spanish2_ci NOT NULL,
  `tipo` varchar(16) collate utf8_spanish2_ci NOT NULL,
  PRIMARY KEY  (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=20 ;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES (9, 'Alexandra Valero', '1', '2452751', 'ejemplo@hotmail.com', 'ADMIN_INVENTARIO');
INSERT INTO `usuarios` VALUES (6, 'raul escalona', '1', '12345678', 'depositario@ejemplo.com', 'DEPOSITARIO');
INSERT INTO `usuarios` VALUES (14, 'Carolina', '9380', '1234567899', 'ejemplo@hotmail.com', 'ADMIN_PRINCIPAL');
INSERT INTO `usuarios` VALUES (16, 'genebrice28', 'genesis89', '19613604', 'gbcdm_21_8@hotmail.com', 'ADMIN_INMUEBLE');
INSERT INTO `usuarios` VALUES (17, 'yeimary', 'janna2709', '17323813', 'consultoriagruponeme@gmail.com', 'ADMIN_INMUEBLE');
