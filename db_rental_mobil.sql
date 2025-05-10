-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2025 pada 18.02
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
-- Database: `db_rental_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(40) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `alamat` varchar(40) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telp_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `nama_customer`, `foto`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `no_telp_hp`) VALUES
(1, 'della', NULL, 'Sawangan', 'Sukabumi', '2005-10-02', '08112242425'),
(2, 'yazid', NULL, 'Ciseeng', 'Bogor', '2025-05-05', '0883823443'),
(5, 'Ahmad Syauqi Raihan', 'uploads/member (3).jpeg', 'JLN.PAKIS', 'DEPOK', '2025-05-05', '089514801985');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penyewaan`
--

CREATE TABLE `detail_penyewaan` (
  `id` int(11) NOT NULL,
  `penyewaan_id` int(11) DEFAULT NULL,
  `mobil_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_penyewaan`
--

INSERT INTO `detail_penyewaan` (`id`, `penyewaan_id`, `mobil_id`, `harga`) VALUES
(1, 1, 4, 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_mobil`
--

CREATE TABLE `jenis_mobil` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_mobil`
--

INSERT INTO `jenis_mobil` (`id`, `nama_jenis`) VALUES
(1, 'Sedan'),
(2, 'MPV'),
(3, 'SUV'),
(4, 'Sport Car');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_customer`
--

CREATE TABLE `login_customer` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login_customer`
--

INSERT INTO `login_customer` (`id`, `username`, `password`, `role`) VALUES
(1, 'della', '$2y$10$jNEuerAgamvemdLYYLMl0e2EZe9FfvxdFQ5J3hW9b1bE0skxmiw/6', 'customer'),
(2, 'yazid', '$2y$10$jNEuerAgamvemdLYYLMl0e2EZe9FfvxdFQ5J3hW9b1bE0skxmiw/6', 'customer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_pegawai`
--

CREATE TABLE `login_pegawai` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login_pegawai`
--

INSERT INTO `login_pegawai` (`id`, `username`, `password`, `role`) VALUES
(1, 'helena', '$2y$10$jNEuerAgamvemdLYYLMl0e2EZe9FfvxdFQ5J3hW9b1bE0skxmiw/6', 'pegawai'),
(2, 'rifka', '$2y$10$jNEuerAgamvemdLYYLMl0e2EZe9FfvxdFQ5J3hW9b1bE0skxmiw/6', 'pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk_mobil`
--

CREATE TABLE `merk_mobil` (
  `id` int(11) NOT NULL,
  `nama_merk` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `merk_mobil`
--

INSERT INTO `merk_mobil` (`id`, `nama_merk`) VALUES
(1, 'Toyota'),
(2, 'Daihatsu'),
(3, 'Honda'),
(4, 'Mitsubishi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `nama_mobil` varchar(20) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  `no_plat` varchar(12) DEFAULT NULL,
  `jenis_id` int(11) DEFAULT NULL,
  `merk_id` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id`, `nama_mobil`, `tarif`, `no_plat`, `jenis_id`, `merk_id`, `status`) VALUES
(1, 'Avanza', 300000, 'B 1214 AD', 1, 3, 'Tersewa'),
(4, 'Civic', 1000000, 'D 1984 ASU', 4, 3, 'Tersewa'),
(6, 'nisan', 500000, 'g 3435 fg', 3, 2, 'Tersedia'),
(7, 'Alpard', 2000000, 'G 3435 GL', 4, 4, 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(40) DEFAULT NULL,
  `alamat` varchar(40) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telp_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_pegawai`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `no_telp_hp`) VALUES
(1, 'Yazid', 'jln. cempaka', 'Bogor', '2025-05-15', '00343434');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `penyewaan_id` int(11) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `metode_bayar` enum('Cash','Transfer','QRIS') DEFAULT 'Cash'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `penyewaan_id`, `tanggal_bayar`, `jumlah_bayar`, `metode_bayar`) VALUES
(1, 1, '2025-05-10', 500000, 'Cash'),
(2, 2, '2025-05-11', 450000, 'QRIS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id` int(11) NOT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `keperluan_penyewaan` varchar(50) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `status_sewa` enum('Dipinjam','Selesai','Batal') DEFAULT 'Dipinjam',
  `mobil_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penyewaan`
--

INSERT INTO `penyewaan` (`id`, `pegawai_id`, `customer_id`, `keperluan_penyewaan`, `tanggal_pinjam`, `tanggal_kembali`, `biaya`, `status_sewa`, `mobil_id`) VALUES
(1, 1, 5, 'Jalan-jalan', '2025-05-08', '2025-05-09', 500000, 'Dipinjam', 2),
(2, 1, 5, 'Pulang Kampung', '2025-05-08', '2025-05-09', 450000, 'Selesai', 4),
(16, NULL, 5, 'Penyewaan Mobil', '2025-05-10', NULL, NULL, 'Dipinjam', 2),
(17, NULL, 5, 'Penyewaan Mobil', '2025-05-10', NULL, NULL, 'Dipinjam', 1),
(18, NULL, 5, 'Penyewaan Mobil', '2025-05-10', NULL, NULL, 'Dipinjam', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif_jenis_mobil`
--

CREATE TABLE `tarif_jenis_mobil` (
  `id` int(11) NOT NULL,
  `jenis_id` int(11) DEFAULT NULL,
  `tarif_per_hari` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tarif_jenis_mobil`
--

INSERT INTO `tarif_jenis_mobil` (`id`, `jenis_id`, `tarif_per_hari`) VALUES
(1, 4, 1000000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_penyewaan`
--
ALTER TABLE `detail_penyewaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penyewaan_id` (`penyewaan_id`),
  ADD KEY `mobil_id` (`mobil_id`);

--
-- Indeks untuk tabel `jenis_mobil`
--
ALTER TABLE `jenis_mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_customer`
--
ALTER TABLE `login_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_pegawai`
--
ALTER TABLE `login_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `merk_mobil`
--
ALTER TABLE `merk_mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_id` (`jenis_id`),
  ADD KEY `merk_id` (`merk_id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penyewaan_id` (`penyewaan_id`);

--
-- Indeks untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indeks untuk tabel `tarif_jenis_mobil`
--
ALTER TABLE `tarif_jenis_mobil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_id` (`jenis_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `detail_penyewaan`
--
ALTER TABLE `detail_penyewaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_mobil`
--
ALTER TABLE `jenis_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `login_customer`
--
ALTER TABLE `login_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `login_pegawai`
--
ALTER TABLE `login_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `merk_mobil`
--
ALTER TABLE `merk_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tarif_jenis_mobil`
--
ALTER TABLE `tarif_jenis_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_penyewaan`
--
ALTER TABLE `detail_penyewaan`
  ADD CONSTRAINT `detail_penyewaan_ibfk_1` FOREIGN KEY (`penyewaan_id`) REFERENCES `penyewaan` (`id`),
  ADD CONSTRAINT `detail_penyewaan_ibfk_2` FOREIGN KEY (`mobil_id`) REFERENCES `mobil` (`id`);

--
-- Ketidakleluasaan untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_mobil` (`id`),
  ADD CONSTRAINT `mobil_ibfk_2` FOREIGN KEY (`merk_id`) REFERENCES `merk_mobil` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`penyewaan_id`) REFERENCES `penyewaan` (`id`);

--
-- Ketidakleluasaan untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `penyewaan_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `penyewaan_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Ketidakleluasaan untuk tabel `tarif_jenis_mobil`
--
ALTER TABLE `tarif_jenis_mobil`
  ADD CONSTRAINT `tarif_jenis_mobil_ibfk_1` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_mobil` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
