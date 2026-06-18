-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2026 pada 05.53
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelurahan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bansos`
--

CREATE TABLE `bansos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rw` varchar(255) NOT NULL,
  `pkh` int(11) NOT NULL,
  `bpnt` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bpjs` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bansos`
--

INSERT INTO `bansos` (`id`, `rw`, `pkh`, `bpnt`, `total`, `created_at`, `updated_at`, `bpjs`) VALUES
(3, 'RW 2', 30, 67, 138, '2026-05-15 20:05:05', '2026-06-14 04:30:13', 41),
(5, 'RW 1', 24, 54, 95, '2026-05-15 20:13:53', '2026-06-14 04:29:34', 17),
(7, 'RW 3', 16, 42, 87, '2026-06-10 15:50:38', '2026-06-14 04:30:28', 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `long_lat` text NOT NULL,
  `jumlah` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `kategori`, `nama_fasilitas`, `long_lat`, `jumlah`, `gambar`, `lokasi`, `created_at`, `updated_at`) VALUES
(28, 'Sekolah', 'SDN 21 BATTANG BARAT', '-2.9509281032349395,120.09466319979603', '150', 'fasilitas/tbxIjg4LhwJt6HYmjLr2WWw81GKnKtRBZJvV8VrJ.jpg', 'RW 1', '2026-05-12 18:01:47', '2026-06-14 16:30:33'),
(29, 'Rumah Ibadah', 'MASJID AL-IKHLAS', '-2.959927,120.089386', '145', 'fasilitas/LJRfiiOxnbkGEUUShr6eIcpD0gijFdONuWO1Ox8x.jpg', 'RW 2', '2026-05-12 18:17:39', '2026-06-14 03:53:16'),
(30, 'Posyandu', 'PUSTU BATTANG BARAT', '-2.950727680265451,120.09433508887834', '79', 'fasilitas/9jUhV5x7Bt9ulAi7EqiDE7MuxhfLb1dsTlwBAGxx.jpg', 'RW 1', '2026-05-13 03:34:35', '2026-06-14 16:30:56'),
(32, 'Rumah Ibadah', 'MASJID AL-HUDA', '-2.9503260213665707,120.09355407971007', '200', 'fasilitas/mmDzBm7FFk9F52Th4qEwZeHYGrYbMhkjoowciGMQ.jpg', 'RW 1', '2026-06-07 16:58:06', '2026-06-14 16:31:19'),
(33, 'Rumah Ibadah', 'MASJID SIDRATUL MUNTAHA', '-2.960152,120.084418', '150', 'fasilitas/Odng4CqVDhX10dxLIbBwskp5CdbxxNvJ17RgJVIp.jpg', 'RW 3', '2026-06-07 16:59:23', '2026-06-14 03:53:53'),
(35, 'Rumah Ibadah', 'GEREJA TORAJA KATTUN', '-2.9519844479842976,120.0866341220569', '100', NULL, 'RW 3', '2026-06-07 17:15:15', '2026-06-07 17:15:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompoktani`
--

CREATE TABLE `kelompoktani` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rw` varchar(255) NOT NULL,
  `nama_kelompok` varchar(255) NOT NULL,
  `ketua` varchar(255) NOT NULL,
  `komoditas` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelompoktani`
--

INSERT INTO `kelompoktani` (`id`, `rw`, `nama_kelompok`, `ketua`, `komoditas`, `status`, `jumlah`, `created_at`, `updated_at`) VALUES
(2, 'RW 3', 'Puri Rima', 'Zainal Ahmadi', 'Perkebunan (Cengkeh dan Kopi)', 'Aktif', 32, '2026-05-15 23:17:56', '2026-06-10 04:04:53'),
(3, 'RW 1', 'Poktan Siandekan', 'Muliadi', 'Perkebunan (Cengkeh dan Kopi)', 'Aktif', 22, '2026-05-15 23:18:23', '2026-06-10 04:05:53'),
(4, 'RW 2', 'To\' Jambu Marendeng', 'Daming', 'Perkebunan (Cengkeh dan Kopi)', 'Aktif', 26, '2026-05-15 23:18:54', '2026-06-10 04:04:17'),
(6, 'RW 2', 'Alam Lestari', 'Abdul Waris', 'Perkebunan (Cengkeh dan Kopi)', 'Aktif', 23, '2026-05-15 23:19:50', '2026-06-10 04:47:18'),
(7, 'RW 1', 'Mentari', 'Ismail Rante', 'Hortikultura (Cabe)', 'Aktif', 19, '2026-06-10 04:44:25', '2026-06-10 04:44:25'),
(8, 'RW 2', 'Karya bersama', 'Yesaya Sa\'bi', 'Perkebunan (Cengkeh dan Kopi)', 'Aktif', 23, '2026-06-10 04:45:49', '2026-06-10 04:45:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2026_05_15_140358_potensi', 1),
(3, '2026_05_16_013147_bansos', 2),
(4, '2026_05_16_053044_kelompoktani', 3),
(5, '2026_05_16_084408_penduduk', 4),
(6, '2026_06_09_063026_add_gambar_to_fasilitas_table', 5),
(7, '2026_06_09_065658_add_gambar_to_fasilitas_table', 6),
(8, '2026_06_09_071821_add_gambar_to_potensis_table', 7),
(9, '2026_06_09_072859_add_bpjs_to_bansos_table', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduks`
--

CREATE TABLE `penduduks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_penduduk` int(11) NOT NULL,
  `jumlah_kk` int(11) NOT NULL,
  `laki_laki` int(11) NOT NULL,
  `perempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penduduks`
--

INSERT INTO `penduduks` (`id`, `jumlah_penduduk`, `jumlah_kk`, `laki_laki`, `perempuan`, `created_at`, `updated_at`) VALUES
(2, 880, 253, 402, 478, '2026-05-16 02:05:14', '2026-06-10 20:03:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `potensis`
--

CREATE TABLE `potensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `lat_long` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `potensis`
--

INSERT INTO `potensis` (`id`, `nama`, `kategori`, `lokasi`, `lat_long`, `created_at`, `updated_at`, `gambar`) VALUES
(7, 'Warung nata', 'UMKM', 'RW 3', '-2.9542572336571045,120.08700451419341', '2026-06-10 19:30:46', '2026-06-10 19:30:46', 'potensi/9URvqct4YFWtdPP2Psw53r9fgNe5KjgumPGkejJh.jpg'),
(8, 'Rumah makan Pasya', 'UMKM', 'RW 3', '-2.9563965265532626,120.08610672183748', '2026-06-10 20:55:52', '2026-06-10 20:55:52', 'potensi/xF80aHDAOpAcc99bbU2YWMTUmScPNs68ZXFtU2dt.jpg'),
(11, 'Warung Makan Barokah', 'UMKM', 'RW 3', '-2.9580503527488626,120.08395992823844', '2026-06-10 21:00:15', '2026-06-10 21:00:15', 'potensi/fXNvALuDnJyUrXmTXRaVIB1a5WU9oPMyN3lpf1RD.jpg'),
(13, 'Rumah Makan Anda puncak', 'UMKM', 'RW 3', '-2.960293143151354,120.08427585575862', '2026-06-10 21:10:57', '2026-06-10 21:10:57', 'potensi/M4wKW7qEfaErb4JsgD5boJacBIXrAH0cdQVZvjmC.jpg'),
(16, 'Rumah Makan selera Djogja', 'UMKM', 'RW 3', '-2.9610898574924143,120.08498525126082', '2026-06-10 21:15:10', '2026-06-10 21:15:10', 'potensi/89tMlokmWiloN3vcgSAeU5ZCUkW5Qnw9dO23IShJ.jpg'),
(20, 'Rumah makan selera djogja 2', 'UMKM', 'RW 3', '-2.9558275962805522,120.08901087449019', '2026-06-10 21:19:20', '2026-06-10 21:19:20', 'potensi/VtZNMUWLgU9JEMz5QXvsjOb5LC2hGMYtG1mvSBpa.jpg'),
(21, 'Kios Ferri', 'UMKM', 'RW 3', '-2.953904762688488,120.08959892568782', '2026-06-10 21:20:09', '2026-06-10 21:20:09', 'potensi/4Xf7fszSXylEns5Mb9SdgyPw79v9jZumotNC5qaB.jpg'),
(23, 'Rumah makan sederhana sangalla', 'UMKM', 'RW 3', '-2.951559034815155,120.09009073584414', '2026-06-10 21:22:19', '2026-06-10 21:22:19', 'potensi/WhxoOTvLrGjcJ6e278OKETxBeaktJU24CaLjfPWR.jpg'),
(24, 'Rumah Makan sang Bua lepi', 'UMKM', 'RW 2', '-2.9550242851526685,120.08980459928952', '2026-06-10 21:23:14', '2026-06-10 21:23:14', 'potensi/qrz6QJvkEPPqFcWoRcFl9xngs10WnCNtoFwEX8l4.jpg'),
(25, 'Rumah makan siap saji', 'UMKM', 'RW 2', '-2.957670238849191,120.0899404235905', '2026-06-10 21:25:04', '2026-06-10 21:25:04', 'potensi/mM84T0wW5dGcYP7NSbTSvjG9ts45oBYNxPUHvwJo.jpg'),
(26, 'Kios Ma fandi', 'UMKM', 'RW 2', '-2.9595837133948897,120.08881579821796', '2026-06-10 21:25:59', '2026-06-10 21:25:59', 'potensi/aTNvLT5jnsNljMV0zp4ptLXAFdvu96xcey5HApKY.jpg'),
(27, 'Warung makan hikmah', 'UMKM', 'RW 2', '-2.959334129945754,120.0891327216193', '2026-06-10 21:26:53', '2026-06-10 21:26:53', 'potensi/MZwBXoo618Uhi9Q66N5N7rmcnPBQFgMkFUl7mszs.jpg'),
(28, 'Warung makan dila', 'UMKM', 'RW 3', '-2.9579551184434743,120.0841878651422', '2026-06-14 04:12:17', '2026-06-14 04:12:17', 'potensi/X4aQk29DMsQaWk9wz8RSoMQNs2tI2jHyC8ljEkTo.jpg'),
(29, 'warung mama Appol', 'UMKM', 'RW 3', '-2.9578622069181355,120.0840413342755', '2026-06-14 04:13:16', '2026-06-14 04:13:16', 'potensi/FsPa6xXFlOopTbQAXHmn6Pt8GOZzkbhNRO8Kq671.jpg'),
(30, 'Warung makan athar', 'UMKM', 'RW 3', '-2.9580503527488626,120.0839599282384', '2026-06-14 04:14:14', '2026-06-14 04:14:14', 'potensi/n4a9cQs5xkfH4Yb8MnWK7kLAmDbxZHdvWUYzwM60.jpg'),
(31, 'Warung Makan Puncak', 'UMKM', 'RW 3', '-2.9601886179045374,120.08447820791574', '2026-06-14 04:15:41', '2026-06-14 04:15:41', 'potensi/AqfmytLa2iJB8KjmZb2z9s0tkaUzMigYbRlfBeag.jpg'),
(32, 'Warung makan Saudara', 'UMKM', 'RW 3', '-2.960293143151354,120.08427585575862', '2026-06-14 04:16:53', '2026-06-14 04:16:53', 'potensi/iANEkThPgCt1WagYu6r1Yk2EgeaORPfdpoHmtmed.jpg'),
(33, 'Kios miranda', 'UMKM', 'RW 2', '-2.955348658932023,120.09061794036143', '2026-06-14 04:20:39', '2026-06-14 04:20:39', 'potensi/6T6toXK9VmpeBSSbqIGRqwg3c7FJ6zYKzQsMxnNv.jpg'),
(34, 'warung makan duri sadan', 'UMKM', 'RW 3', '-2.9566376354943964,120.08734691861972', '2026-06-14 04:23:31', '2026-06-14 04:23:31', 'potensi/rxtlpTJpj46p4xzfA6w6cJLQ4JifjXrR0yucnK8G.jpg'),
(35, 'Penginapan Puri Rimba', 'UMKM', 'RW 3', '-2.958846048281569,120.08672734054375', '2026-06-14 04:25:47', '2026-06-14 04:25:47', 'potensi/bG1bP9W7Gm8DWR78wpunXO0BCcfLZbiQ7CHVySRM.jpg'),
(36, 'warung makan Puncak selfi', 'UMKM', 'RW 3', '-2.9560012510370797,120.08910888301679', '2026-06-14 04:26:59', '2026-06-14 04:26:59', 'potensi/dz7hfnLh82eMIcybnzgasCYYTUh30Gikt2nLv2HC.jpg'),
(37, 'Kios Lekko Pitu', 'UMKM', 'RW 2', '-2.956347183955894,120.090443547364', '2026-06-14 04:28:40', '2026-06-14 04:28:40', 'potensi/5LPKP7ATcwPWEE5M3Bsk3l9jTC3KEC7SrI7AAQwp.jpg'),
(38, 'Warung makan puncak bahagia', 'UMKM', 'RW 1', '-2.951237396734567,120.09367399730337', '2026-06-14 16:27:52', '2026-06-14 16:27:52', 'potensi/hSoO5P6sue5G8x0xWY6cQrvkMys3ZIYEQnPSJu4K.jpg'),
(39, 'Warung makan Stevi', 'UMKM', 'RW 1', '-2.9529899759371423,120.09599632565674', '2026-06-14 16:28:49', '2026-06-14 16:28:49', 'potensi/ZujEKQRzhLCu2ydVdD31V88n9DZT45MwcopJfsq1.jpg'),
(40, 'Warung makan Ma zul', 'UMKM', 'RW 1', '-2.952878979338002,120.09577111246539', '2026-06-14 16:29:37', '2026-06-14 16:29:37', 'potensi/pIrn2oSnQtkCFd7SR23SVDGYK0u2qA35zQM6VFky.jpg'),
(41, 'Warung makan Putri', 'UMKM', 'RW 1', '-2.952899426080776,120.09568336706614', '2026-06-14 16:30:15', '2026-06-14 16:30:15', 'potensi/sbl6zT0XPuFhD5hOBkBS0rhmTvbzdRNkMvFhi1yN.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$12$qlyNrodvxP7XvOfqFkqb4OZKF8htBq5F8uFztmgqmhaYxWHUb9Dmi', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bansos`
--
ALTER TABLE `bansos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelompoktani`
--
ALTER TABLE `kelompoktani`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduks`
--
ALTER TABLE `penduduks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `potensis`
--
ALTER TABLE `potensis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bansos`
--
ALTER TABLE `bansos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `kelompoktani`
--
ALTER TABLE `kelompoktani`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penduduks`
--
ALTER TABLE `penduduks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `potensis`
--
ALTER TABLE `potensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
