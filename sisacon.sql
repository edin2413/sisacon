-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2021 a las 02:56:17
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisacon`
--

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `asientos_empresas_categorias`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `asientos_empresas_categorias` (
`id` bigint(20) unsigned
,`empresa_id` bigint(20) unsigned
,`categoria_id` bigint(20) unsigned
,`total` decimal(10,2)
,`created_at` timestamp
,`updated_at` timestamp
,`codigo` varchar(15)
,`nombre` varchar(50)
,`descripcion_empresa` varchar(50)
,`capital_base` decimal(12,2)
,`capital_actual` decimal(12,2)
,`descripcion_categoria` varchar(30)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion_categoria` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion_categoria`, `created_at`, `updated_at`) VALUES
(1, 'Ingresos', '2021-08-30 04:31:11', '2021-08-30 04:31:11'),
(2, 'Gastos', '2021-08-30 04:35:33', '2021-08-30 04:35:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_asientos`
--

CREATE TABLE `control_asientos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `empresa_id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `control_asientos`
--

INSERT INTO `control_asientos` (`id`, `empresa_id`, `categoria_id`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '12000.00', '2021-08-30 04:39:22', '2021-08-30 04:39:22'),
(2, 1, 1, '4400.00', '2021-08-30 04:40:34', '2021-08-30 04:40:34'),
(3, 1, 2, '10000.00', '2021-08-30 04:42:11', '2021-08-30 04:42:11');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `control_asientos_detalles`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `control_asientos_detalles` (
`detalle_asiento_id` bigint(20) unsigned
,`descripcion_detalle` varchar(50)
,`cantidad` int(11)
,`precio` decimal(10,2)
,`total_detalle` decimal(10,2)
,`created_at` timestamp
,`updated_at` timestamp
,`controlasiento_id` bigint(20) unsigned
,`empresa_id` bigint(20) unsigned
,`codigo` varchar(15)
,`nombre` varchar(50)
,`categoria_id` bigint(20) unsigned
,`descripcion_categoria` varchar(30)
,`descripcion_empresa` varchar(50)
,`capital_base` decimal(12,2)
,`capital_actual` decimal(12,2)
,`total_asieto` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_asientos`
--

CREATE TABLE `detalle_asientos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `controlasiento_id` bigint(20) UNSIGNED NOT NULL,
  `descripcion_detalle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_asientos`
--

INSERT INTO `detalle_asientos` (`id`, `controlasiento_id`, `descripcion_detalle`, `cantidad`, `precio`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 'Venta de productos', 10, '200.00', '2000.00', '2021-08-30 04:39:22', '2021-08-30 04:39:22'),
(2, 1, 'venta de queso', 20, '500.00', '10000.00', '2021-08-30 04:39:22', '2021-08-30 04:39:22'),
(3, 2, 'venta de producto 1', 5, '300.00', '1500.00', '2021-08-30 04:40:34', '2021-08-30 04:40:34'),
(4, 2, 'venta de producto 3', 2, '200.00', '400.00', '2021-08-30 04:40:35', '2021-08-30 04:40:35'),
(5, 2, 'venta de producto 3', 5, '500.00', '2500.00', '2021-08-30 04:40:35', '2021-08-30 04:40:35'),
(6, 3, 'Compra de materiales', 10, '1000.00', '10000.00', '2021-08-30 04:42:11', '2021-08-30 04:42:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_empresa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capital_base` decimal(12,2) NOT NULL,
  `capital_actual` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `codigo`, `nombre`, `descripcion_empresa`, `capital_base`, `capital_actual`, `created_at`, `updated_at`) VALUES
(1, 'Emp1', 'Lacteos Bufalinda', 'Empresa de productos lacteos', '10000.00', '16400.00', '2021-08-30 04:17:59', '2021-08-30 04:42:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2021_08_24_170915_create_empresa_table', 1),
(11, '2021_08_24_194856_create_empresas_table', 2),
(12, '2021_08_24_195357_create_asientos_table', 3),
(13, '2021_08_25_111633_create_detalle_asientos_table', 4),
(14, '2021_08_25_121722_create_controlasientos_table', 4),
(17, '2021_08_26_112112_create_control_sientos_table', 7),
(122, '2014_10_12_000000_create_users_table', 8),
(123, '2014_10_12_100000_create_password_resets_table', 8),
(124, '2014_10_12_200000_add_two_factor_columns_to_users_table', 8),
(125, '2019_08_19_000000_create_failed_jobs_table', 8),
(126, '2019_12_14_000001_create_personal_access_tokens_table', 8),
(127, '2021_08_21_202107_create_sessions_table', 8),
(128, '2021_08_22_175510_create_articulos_table', 8),
(129, '2021_08_24_023524_create_clientes_table', 8),
(130, '2021_08_24_024216_create_categorias_table', 8),
(131, '2021_08_26_164300_create_empresas_table', 8),
(132, '2021_08_26_164549_create_control_asientos_table', 8),
(133, '2021_08_29_003143_create_detalle_asientos_table', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9Vr6gsUij90rOxu1o1kVGxSuQyQRSw3Zc2rOg4qP', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicko2bXNZMHBRWFBvQkExZGFvUU5HMzB4YjkwcVl2NnV4QmVBMTNJWCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwOi8vbG9jYWxob3N0L3Npc2Fjb24vcHVibGljL2VtcHJlc2FzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDhqM0R3Lkk4dDZyZk15RWpiWTBRRk83d1F5ODFDT2tMUmhCRDBTbFhndktYRG9UZmlwdUFHIjt9', 1630281829),
('NHZ3SuRwFDcOsfUMWrJ9g3ihxSDCYPUdhhJItiBf', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiekhOSWJZc2hXcVhtY0NCR2VzdFhuUEhJcjFTVlJRUWNGZEdHMTdNcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjEvc2lzYWNvbi9wdWJsaWMvaW5pY2lvIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDhqM0R3Lkk4dDZyZk15RWpiWTBRRk83d1F5ODFDT2tMUmhCRDBTbFhndktYRG9UZmlwdUFHIjt9', 1630284963),
('ZQsk6EptnV8SVegg9lj14SY72iQAKgiwqI5BI0CL', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVViZ1dpSER6QTFsSUc0MjdGVXJ4QzJ4YzFTajBodVd0cTcyS2ptTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Qvc2lzYWNvbi9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1630276287);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'sisacon', 'sisacon@gmail.com', NULL, '$2y$10$8j3Dw.I8t6rfMyEjbY0QFO7wQy81COkLRhBD0SlXgvKXDoTfipuAG', NULL, NULL, NULL, NULL, NULL, '2021-08-30 04:00:18', '2021-08-30 04:00:18');

-- --------------------------------------------------------

--
-- Estructura para la vista `asientos_empresas_categorias`
--
DROP TABLE IF EXISTS `asientos_empresas_categorias`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `asientos_empresas_categorias`  AS  select `a`.`id` AS `id`,`a`.`empresa_id` AS `empresa_id`,`a`.`categoria_id` AS `categoria_id`,`a`.`total` AS `total`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at`,`b`.`codigo` AS `codigo`,`b`.`nombre` AS `nombre`,`b`.`descripcion_empresa` AS `descripcion_empresa`,`b`.`capital_base` AS `capital_base`,`b`.`capital_actual` AS `capital_actual`,`c`.`descripcion_categoria` AS `descripcion_categoria` from ((`control_asientos` `a` join `empresas` `b`) join `categorias` `c`) where `a`.`empresa_id` = `b`.`id` and `a`.`categoria_id` = `c`.`id` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `control_asientos_detalles`
--
DROP TABLE IF EXISTS `control_asientos_detalles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `control_asientos_detalles`  AS  select `a`.`id` AS `detalle_asiento_id`,`a`.`descripcion_detalle` AS `descripcion_detalle`,`a`.`cantidad` AS `cantidad`,`a`.`precio` AS `precio`,`a`.`total` AS `total_detalle`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at`,`a`.`controlasiento_id` AS `controlasiento_id`,`b`.`empresa_id` AS `empresa_id`,`b`.`codigo` AS `codigo`,`b`.`nombre` AS `nombre`,`b`.`categoria_id` AS `categoria_id`,`b`.`descripcion_categoria` AS `descripcion_categoria`,`b`.`descripcion_empresa` AS `descripcion_empresa`,`b`.`capital_base` AS `capital_base`,`b`.`capital_actual` AS `capital_actual`,`b`.`total` AS `total_asieto` from (`detalle_asientos` `a` join `asientos_empresas_categorias` `b`) where `a`.`controlasiento_id` = `b`.`id` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `control_asientos`
--
ALTER TABLE `control_asientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `control_asientos_empresa_id_foreign` (`empresa_id`),
  ADD KEY `control_asientos_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `detalle_asientos`
--
ALTER TABLE `detalle_asientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_asientos_controlasiento_id_foreign` (`controlasiento_id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `control_asientos`
--
ALTER TABLE `control_asientos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_asientos`
--
ALTER TABLE `detalle_asientos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `control_asientos`
--
ALTER TABLE `control_asientos`
  ADD CONSTRAINT `control_asientos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `control_asientos_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`);

--
-- Filtros para la tabla `detalle_asientos`
--
ALTER TABLE `detalle_asientos`
  ADD CONSTRAINT `detalle_asientos_controlasiento_id_foreign` FOREIGN KEY (`controlasiento_id`) REFERENCES `control_asientos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
