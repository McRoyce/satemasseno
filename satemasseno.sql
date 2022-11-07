-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Nov 2022 pada 03.00
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satemasseno`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_a` int(11) NOT NULL,
  `nama_a` varchar(255) NOT NULL,
  `nama_d` varchar(255) NOT NULL,
  `nama_b` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `sandi` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_a`, `nama_a`, `nama_d`, `nama_b`, `email`, `telepon`, `sandi`, `alamat`, `foto`) VALUES
(1, 'adminganteng', 'Tatang', 'Suherman', 'admin@gmail.com', '08937273217', '$2y$10$4wjzbno0vQCN9EGM4/kPGuGHLN47Yw.E82ZdTSjweYvNEIPOBdFKe', 'Jl. Bambu Kuning Kecamatan No.6, RT.1/RW.04, Pd. Betung, Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15221', 'adminganteng.png'),
(2, 'admincakep', 'Lumine', 'Markonah', 'lm@gmail.com', '+62873282312', '$2y$10$jtOxsHodYrCTmNBAuVUrDeNDItKJfi8R/hPTdD8AE40UZtJU.lCnK', 'Jl. M.H. Thamrin No.30, RT.9/RW.5, Gondangdia, Menteng, Central Jakarta City, Jakarta 10350', 'admincakep.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang_resto`
--

CREATE TABLE `cabang_resto` (
  `id_cr` int(11) NOT NULL,
  `id_k` int(11) NOT NULL,
  `nama_cr` varchar(255) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `tentang` text NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cabang_resto`
--

INSERT INTO `cabang_resto` (`id_cr`, `id_k`, `nama_cr`, `status`, `tentang`, `alamat`, `foto`) VALUES
(1, 1, 'Sate Mas Seno Cabang Bekasi', 'Buka', 'Cabang Sate Mas Seno yang terletak di Kota Bekasi', 'Jl. Dasa Darma, RT.002/RW.004, Bojong Rawalumbu, Kec. Rawalumbu, Kota Bks, Jawa Barat 17115', 'sms2.jpg'),
(2, 1, 'Sate Mas Seno Cabang Purwokerto', 'Tutup', 'Cabang Sate Mas Seno yang terletak Di  Purwokerto', 'Desa Tipar Kidul, Kec. Ajibarang, Banyumas, Jawa Tengah', 'sms.jpg'),
(3, 2, 'Aci Ngambay', 'Buka', 'Aci Ngambay merupakan cabang dari sate mas seno yang menjual jajanan olahan aci', 'Jl. Dasa Darma, RT.001/RW.028, Bojong Rawalumbu, Kec. Rawalumbu, Kota Bks, Jawa Barat 17116', 'cibay.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_k` int(11) NOT NULL,
  `nama_k` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_k`, `nama_k`) VALUES
(1, 'Sate'),
(2, 'Jajanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_menu`
--

CREATE TABLE `paket_menu` (
  `id_pm` int(11) NOT NULL,
  `id_cr` int(11) NOT NULL,
  `nama_pm` varchar(255) NOT NULL,
  `harga` float NOT NULL,
  `stok` varchar(20) DEFAULT NULL,
  `ongkir` float NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket_menu`
--

INSERT INTO `paket_menu` (`id_pm`, `id_cr`, `nama_pm`, `harga`, `stok`, `ongkir`, `deskripsi`, `foto`) VALUES
(1, 1, 'Aqiqah Jantan Paket A', 3500000, 'Tersedia', 0, '<ol>\r\n<li>Sate Kambing Saus Kacang 600 Tusuk/60 Porsi</li>\r\n<li>Gulai Kering 60 Porsi</li>\r\n<li>Keping CD Video Penyembelihan Kambing</li>\r\n<li>Kartu Ucapan</li>\r\n<li>Risalah Aqiqah</li>\r\n</ol>', 'Aqiqah_Jantan.jpg'),
(2, 1, 'Aqiqah Betina Paket A', 3000000, 'Tersedia', 0, '<ol>\r\n<li>Sate Kambing Saus Kacang 500 Tusuk/50 Porsi</li>\r\n<li>Gulai Kering 50 Porsi</li>\r\n<li>Keping CD Video Penyembelihan Kambing</li>\r\n<li>Kartu Ucapan</li>\r\n<li>Risalah Aqiqah</li>\r\n</ol>', 'Aqiqah_Betina.jpg'),
(3, 1, 'Aqiqah Jantan Paket B', 3300000, 'Tersedia', 50000, '<ol>\r\n<li>Sate Kambing Saus Kacang 550 Tusuk/55 Porsi</li>\r\n<li>Gulai Kering 55 Porsi</li>\r\n<li>Keping CD Video Penyembelihan Kambing</li>\r\n<li>Kartu Ucapan</li>\r\n<li>Risalah Aqiqah</li>\r\n</ol>', 'Aqiqah_Jantan1.jpg'),
(4, 1, 'Aqiqah Betina Paket B', 2800000, 'Tersedia', 50000, '<ol>\r\n<li>Sate Kambing Saus Kacang 450 Tusuk/45 Porsi</li>\r\n<li>Gulai Kering 45 Porsi</li>\r\n<li>Keping CD Video Penyembelihan Kambing</li>\r\n<li>Kartu Ucapan</li>\r\n<li>Risalah Aqiqah</li>\r\n</ol>', 'Aqiqah_Betina1.jpg'),
(5, 1, 'Aqiqah Jantan Paket C', 3000000, 'Habis', 50000, '<ol>\r\n<li>Sate Kambing Saus Kacang 500 Tusuk/50 Porsi</li>\r\n<li>Gulai Kering 50 Porsi</li>\r\n<li>Keping CD Video Penyembelihan Kambing</li>\r\n<li>Kartu Ucapan</li>\r\n<li>Risalah Aqiqah</li>\r\n</ol>', 'aqiqahB.jpg'),
(6, 1, 'Aqiqah Betina Paket C', 2500000, 'Habis', 50000, '<ol>\r\n<li>Sate Kambing Saus Kacang 400 Tusuk/40 Porsi</li>\r\n<li>Gulai Kering 40 Porsi</li>\r\n<li>Keping CD Video Penyembelihan Kambing</li>\r\n<li>Kartu Ucapan</li>\r\n<li>Risalah Aqiqah</li>\r\n</ol>', 'AqiqahA.jpg'),
(7, 1, 'Catering Paket Ayam Gold', 4000000, 'Tersedia', 0, '<ol>\r\n<li>Sate Ayam Saus Kacang 1000 Tusuk/100 Porsi</li>\r\n<li>Tongseng Ayam Kering 100 Porsi</li>\r\n<li>Kartu Ucapan</li>\r\n</ol>', 'Sate_Ayam.jpg'),
(8, 1, 'Catering Paket Kambing Gold', 5000000, 'Tersedia', 0, '<ol>\r\n<li>Sate Kambing Saus Kecap 1000 Tusuk/100 Porsi</li>\r\n<li>Tongseng Kambing Kering 100 Porsi</li>\r\n<li>Kartu Ucapan</li>\r\n</ol>', 'Sate_Kambing.png'),
(9, 1, 'Catering Paket Ayam Silver', 3000000, 'Tersedia', 50000, '<ol>\r\n<li>Sate Ayam Saus Kacang 750 Tusuk/75 Porsi</li>\r\n<li>Tongseng Ayam Kering 75 Porsi</li>\r\n<li>Kartu Ucapan</li>\r\n</ol>', 'Sate_Ayam1.jpg'),
(10, 1, 'Catering Paket Kambing Silver', 3750000, 'Tersedia', 50000, '<ol>\r\n<li>Sate Kambing Saus Kecap 750 Tusuk/75 Porsi</li>\r\n<li>Tongseng Kambing Kering 75 Porsi</li>\r\n<li>Kartu Ucapan</li>\r\n</ol>', 'Sate_Kambing1.png'),
(11, 1, 'Catering Paket Ayam Bronze', 2000000, 'Habis', 50000, '<ol>\r\n<li>Sate Ayam Saus Kacang 500 Tusuk/50 Porsi</li>\r\n<li>Tongseng Ayam Kering 50 Porsi</li>\r\n<li>Kartu Ucapan</li>\r\n</ol>', 'Sate_Ayam2.jpg'),
(12, 1, 'Catering Paket Kambing Bronze', 2500000, 'Habis', 50000, '<ol>\r\n<li>Sate Kambing Saus Kecap 500 Tusuk/50 Porsi</li>\r\n<li>Tongseng Kambing Kering 50 Porsi</li>\r\n<li>Kartu Ucapan</li>\r\n</ol>', 'Sate_Kambing2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_p` int(11) NOT NULL,
  `nama_p` varchar(255) NOT NULL,
  `nama_d` varchar(255) NOT NULL,
  `nama_b` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `sandi` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_p`, `nama_p`, `nama_d`, `nama_b`, `email`, `telepon`, `sandi`, `alamat`, `foto`) VALUES
(1, 'cjganteng', 'Carl', 'Johnson', 'cj@gs.com', '+62-895-1456-9999', '$2y$10$7wgU02j6TYtVkmyJ9y8lA.CLv3U3igSCjTSEShV4NjWTdb4B2/E16', 'Grove Street Nomor 10, Kota Los Santos, San Andreas, Indonesia', 'cj.png'),
(2, 'ronaldosui', 'Cristiano', 'Ronaldo', 'cr7@gmail.com', '088 3621 773', '$2y$10$i920XQgS4PvoUZkn2HCeguU4kgZpERQ9ZHNp19KXqBfpGfnB2/lv2', 'Por Tegal, Jawa Tengah, Indonesia', 'ronaldo.gif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_t` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `id_pm` int(11) NOT NULL,
  `nama_pm` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_cr` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` float NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `success-date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `resi` text NOT NULL,
  `pembayaran` varchar(20) DEFAULT NULL,
  `acara` date DEFAULT NULL,
  `catatan` text NOT NULL,
  `transfer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_t`, `id_p`, `id_pm`, `nama_pm`, `deskripsi`, `id_cr`, `jumlah`, `harga`, `status`, `date`, `success-date`, `resi`, `pembayaran`, `acara`, `catatan`, `transfer`) VALUES
(1, 1, 1, 'Aqiqah Jantan Paket A', '<ol>\r\n<li>Sate Kambing Saus Kacang 600 Tusuk/60 Porsi</li>\r\n<li>Gulai Kering 60 Porsi</li>\r\n<li>Keping CD Video Penyembelihan Kambing</li>\r\n<li>Kartu Ucapan</li>\r\n<li>Risalah Aqiqah</li>\r\n</ol>', 1, 1, 3500000, 'closed', '2022-10-05 08:18:44', '2022-10-05 07:43:11', 'EM.L7S6JYQ48W-20191211-4-7FFG1B', 'qris', '2022-10-10', '', 'transfer8.png'),
(2, 1, 7, 'Catering Paket Ayam Gold', '<ol>\r\n<li>Sate Ayam Saus Kacang 1000 Tusuk/100 Porsi</li>\r\n<li>Tongseng Ayam Kering 100 Porsi</li>\r\n<li>Kartu Ucapan</li>\r\n</ol>', 1, 1, 4000000, 'deliver', '2022-10-05 09:44:08', '2022-10-05 07:44:31', 'EM.L7S6JYQ48W-20191211-4-7FFG1A', 'bank', '2022-10-28', '', 'transfer9.png'),
(3, 2, 2, 'Aqiqah Betina Paket A', '<ol>\r\n<li>Sate Kambing Saus Kacang 500 Tusuk/50 Porsi</li>\r\n<li>Gulai Kering 50 Porsi</li>\r\n<li>Keping CD Video Penyembelihan Kambing</li>\r\n<li>Kartu Ucapan</li>\r\n<li>Risalah Aqiqah</li>\r\n</ol>', 1, 1, 3000000, NULL, '2022-10-05 09:45:15', '2022-10-05 07:45:28', '', 'qris', '2022-10-21', '', 'transfer10.png'),
(4, 2, 9, 'Catering Paket Ayam Silver', '<ol>\r\n<li>Sate Ayam Saus Kacang 750 Tusuk/75 Porsi</li>\r\n<li>Tongseng Ayam Kering 75 Porsi</li>\r\n<li>Kartu Ucapan</li>\r\n</ol>', 1, 1, 3050000, 'rejected', '2022-10-05 09:46:04', '2022-10-05 02:46:04', '', 'bank', '2022-10-18', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_a`);

--
-- Indeks untuk tabel `cabang_resto`
--
ALTER TABLE `cabang_resto`
  ADD PRIMARY KEY (`id_cr`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_k`);

--
-- Indeks untuk tabel `paket_menu`
--
ALTER TABLE `paket_menu`
  ADD PRIMARY KEY (`id_pm`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_p`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_t`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `cabang_resto`
--
ALTER TABLE `cabang_resto`
  MODIFY `id_cr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `paket_menu`
--
ALTER TABLE `paket_menu`
  MODIFY `id_pm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
