-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Apr 2022 pada 06.19
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teguh_hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `teguh_fasilitas_hotel`
--

CREATE TABLE `teguh_fasilitas_hotel` (
  `teguh_id_fasilitas` int(11) NOT NULL,
  `teguh_nama_fasilitas` varchar(100) NOT NULL,
  `teguh_jumlah_fasilitas` int(11) NOT NULL,
  `teguh_keterangan` varchar(100) NOT NULL,
  `teguh_lantai_fasilitas` int(11) NOT NULL,
  `teguh_foto_fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `teguh_fasilitas_hotel`
--

INSERT INTO `teguh_fasilitas_hotel` (`teguh_id_fasilitas`, `teguh_nama_fasilitas`, `teguh_jumlah_fasilitas`, `teguh_keterangan`, `teguh_lantai_fasilitas`, `teguh_foto_fasilitas`) VALUES
(4, 'Kolam Renang', 3, 'Berukuran 50m di lantai 1', 2, '6233acfc27c6c.jpg'),
(5, 'Tempat Meeting', 1, 'Berada didekat restoran', 2, '6233ae081fe5b.jpeg'),
(7, 'Restoran', 1, 'dekat tempat gym', 3, '6233b3ed72197.jpg'),
(8, 'Tempat Gym', 1, 'dekat restoran', 3, '6233b435283ec.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teguh_kamar`
--

CREATE TABLE `teguh_kamar` (
  `teguh_id_kamar` int(11) NOT NULL,
  `teguh_no_kamar` varchar(50) NOT NULL,
  `teguh_id_tipe` int(11) NOT NULL,
  `teguh_status` varchar(100) NOT NULL,
  `teguh_lantai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `teguh_kamar`
--

INSERT INTO `teguh_kamar` (`teguh_id_kamar`, `teguh_no_kamar`, `teguh_id_tipe`, `teguh_status`, `teguh_lantai`) VALUES
(1, 'A-101', 2, 'Tersedia', '1'),
(7, 'A-102', 2, 'Tersedia', '1'),
(8, 'A-103', 2, 'Tersedia', '1'),
(9, 'A-104', 2, 'Tersedia', '1'),
(10, 'B-201', 1, 'Tersedia', '2'),
(12, 'B-202', 1, 'Tersedia', '2'),
(13, 'B-203', 1, 'Tersedia', '2'),
(14, 'B-204', 1, 'Tersedia', '2'),
(15, 'B-205', 1, 'Tersedia', '2'),
(16, 'B-206', 1, 'Tersedia', '2'),
(17, 'B-207', 1, 'Tersedia', '2'),
(18, 'B-208', 1, 'Tersedia', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teguh_reservasii`
--

CREATE TABLE `teguh_reservasii` (
  `teguh_id_reservasi` int(11) NOT NULL,
  `teguh_kode_reservasi` varchar(255) NOT NULL,
  `teguh_nama_tamu` varchar(100) NOT NULL,
  `teguh_email_tamu` varchar(255) NOT NULL,
  `teguh_telpon_tamu` varchar(50) NOT NULL,
  `teguh_chekin` date NOT NULL,
  `teguh_chekout` date NOT NULL,
  `teguh_no_kamar` varchar(255) NOT NULL,
  `teguh_jumlahkamar` varchar(255) NOT NULL,
  `teguh_jumlahtamu` int(11) NOT NULL,
  `teguh_pesan` varchar(255) NOT NULL,
  `teguh_id_tipe` int(11) NOT NULL,
  `teguh_status2` varchar(255) NOT NULL,
  `teguh_total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `teguh_reservasii`
--

INSERT INTO `teguh_reservasii` (`teguh_id_reservasi`, `teguh_kode_reservasi`, `teguh_nama_tamu`, `teguh_email_tamu`, `teguh_telpon_tamu`, `teguh_chekin`, `teguh_chekout`, `teguh_no_kamar`, `teguh_jumlahkamar`, `teguh_jumlahtamu`, `teguh_pesan`, `teguh_id_tipe`, `teguh_status2`, `teguh_total`) VALUES
(78, 'RSV001', 'Wiwin', 'wiwin213@gmail.com', '90581309581', '2022-03-30', '2022-04-02', 'B-201 ', '1', 1, 'tidak ada', 1, 'Sudah Checkout', '2250000'),
(79, 'RSV002', 'roro', 'roro219@gmail.cpm', '0218', '2022-03-30', '2022-04-02', 'B-201 B-202 B-203 B-204 ', '4', 1, 'ahdliad', 1, 'Sudah Checkout', '9000000'),
(80, 'RSV003', 'roro', 'roro219@gmail.cpm', '02821', '2022-03-30', '2022-04-02', 'A-101 ', '1', 1, 'tidak ada', 2, 'Sudah Checkout', '2700000'),
(81, 'RSV004', 'Teguh Bagas', 'teguh213@gmail.com', '0819194', '2022-03-31', '2022-04-02', 'B-201 B-202 B-203 ', '3', 4, 'tidak ada', 1, 'Sudah Checkout', '4500000'),
(82, 'RSV005', 'Wiwin', 'wiwin213@gmail.com', '02189427', '2022-04-06', '2022-04-09', 'B-201 B-202 ', '2', 2, 'tidak ada', 1, 'Sudah Checkout', '4500000'),
(83, 'RSV006', 'Wiwin', 'wiwin213@gmail.com', '43634', '2022-04-06', '2022-04-08', 'A-101 A-102 A-103 A-104 ', '4', 4, 'tidak', 2, 'Sudah Checkout', '7200000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teguh_reserved_room`
--

CREATE TABLE `teguh_reserved_room` (
  `teguh_id` int(11) NOT NULL,
  `teguh_kode_reservasi` varchar(50) NOT NULL,
  `teguh_no_kamar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `teguh_reserved_room`
--

INSERT INTO `teguh_reserved_room` (`teguh_id`, `teguh_kode_reservasi`, `teguh_no_kamar`) VALUES
(98, 'RSV001', 'B-201 '),
(99, 'RSV002', 'B-201 B-202 B-203 B-204 '),
(100, 'RSV003', 'A-101 '),
(101, 'RSV004', 'B-201 B-202 B-203 '),
(102, 'RSV005', 'B-201 B-202 '),
(103, 'RSV006', 'A-101 A-102 A-103 A-104 ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teguh_role`
--

CREATE TABLE `teguh_role` (
  `teguh_id_role` int(11) NOT NULL,
  `teguh_jenis_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `teguh_role`
--

INSERT INTO `teguh_role` (`teguh_id_role`, `teguh_jenis_role`) VALUES
(1, 'Administrator'),
(2, 'Resepsionis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teguh_tamu`
--

CREATE TABLE `teguh_tamu` (
  `teguh_no_identitas` varchar(100) NOT NULL,
  `teguh_nama_tamu` varchar(100) NOT NULL,
  `teguh_email_tamu` varchar(100) NOT NULL,
  `teguh_username` varchar(100) NOT NULL,
  `teguh_password` varchar(100) NOT NULL,
  `teguh_telpon_tamu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `teguh_tamu`
--

INSERT INTO `teguh_tamu` (`teguh_no_identitas`, `teguh_nama_tamu`, `teguh_email_tamu`, `teguh_username`, `teguh_password`, `teguh_telpon_tamu`) VALUES
('2134', 'amanda putri', 'amandaptr34@gmail.com', 'amanda', '4551466523fa62d3702041a341861c24', '081214242103'),
('211', 'rifki', 'rifki@gmail.com', 'toto', 'f71dbe52628a3f83a77ab494817525c6', '634'),
('9988', 'roro', 'roro219@gmail.cpm', 'roro', '54b1d109dc7156ef46816a9527a861bc', '081923'),
('2131', 'Teguh Bagas', 'teguh213@gmail.com', 'teguh', 'f5cd3a020bc94866049206a7cf14e266', '081213148695'),
('2135', 'Wiwin', 'wiwin213@gmail.com', 'win', '0b08bd98d279b88859b628cd8c061ae0', '081321191726');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teguh_tipe_kamar`
--

CREATE TABLE `teguh_tipe_kamar` (
  `teguh_id_tipe` int(11) NOT NULL,
  `teguh_tipe_kamar` varchar(50) NOT NULL,
  `teguh_deskripsi` varchar(150) NOT NULL,
  `teguh_fasilitas` varchar(100) NOT NULL,
  `teguh_harga` varchar(50) NOT NULL,
  `teguh_jumlah_bed` varchar(100) NOT NULL,
  `teguh_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `teguh_tipe_kamar`
--

INSERT INTO `teguh_tipe_kamar` (`teguh_id_tipe`, `teguh_tipe_kamar`, `teguh_deskripsi`, `teguh_fasilitas`, `teguh_harga`, `teguh_jumlah_bed`, `teguh_foto`) VALUES
(1, 'Deluxe', 'Nyaman', 'Wifi Gratis', '750000', '8', '622cb723b5922.jpg'),
(2, 'Superior', 'Sangat Nyaman', 'AC', '900000', '4', '622cb73b6d7c3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teguh_user`
--

CREATE TABLE `teguh_user` (
  `teguh_id_user` int(11) NOT NULL,
  `teguh_id_role` int(11) NOT NULL,
  `teguh_nama_user` varchar(100) NOT NULL,
  `teguh_email_user` varchar(100) NOT NULL,
  `teguh_username_user` varchar(50) NOT NULL,
  `teguh_password_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `teguh_user`
--

INSERT INTO `teguh_user` (`teguh_id_user`, `teguh_id_role`, `teguh_nama_user`, `teguh_email_user`, `teguh_username_user`, `teguh_password_user`) VALUES
(1, 1, 'Teguh Maulana', 'teguhmaul21@gmail.com', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda'),
(2, 2, 'Mauriel Badrun', 'mauriel36@gmail.com', 'resep', '13016b898b3877960653191b72b2f03c');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `teguh_fasilitas_hotel`
--
ALTER TABLE `teguh_fasilitas_hotel`
  ADD PRIMARY KEY (`teguh_id_fasilitas`);

--
-- Indeks untuk tabel `teguh_kamar`
--
ALTER TABLE `teguh_kamar`
  ADD PRIMARY KEY (`teguh_id_kamar`),
  ADD KEY `teguh_id_tipe` (`teguh_id_tipe`);

--
-- Indeks untuk tabel `teguh_reservasii`
--
ALTER TABLE `teguh_reservasii`
  ADD PRIMARY KEY (`teguh_id_reservasi`),
  ADD KEY `razid_id_tipe` (`teguh_id_tipe`),
  ADD KEY `razid_kode_reservasi` (`teguh_kode_reservasi`);

--
-- Indeks untuk tabel `teguh_reserved_room`
--
ALTER TABLE `teguh_reserved_room`
  ADD PRIMARY KEY (`teguh_id`),
  ADD KEY `teguh_kode_reservasi` (`teguh_kode_reservasi`),
  ADD KEY `teguh_id_kamar` (`teguh_no_kamar`);

--
-- Indeks untuk tabel `teguh_role`
--
ALTER TABLE `teguh_role`
  ADD PRIMARY KEY (`teguh_id_role`);

--
-- Indeks untuk tabel `teguh_tamu`
--
ALTER TABLE `teguh_tamu`
  ADD PRIMARY KEY (`teguh_email_tamu`);

--
-- Indeks untuk tabel `teguh_tipe_kamar`
--
ALTER TABLE `teguh_tipe_kamar`
  ADD PRIMARY KEY (`teguh_id_tipe`);

--
-- Indeks untuk tabel `teguh_user`
--
ALTER TABLE `teguh_user`
  ADD PRIMARY KEY (`teguh_id_user`),
  ADD KEY `teguh_id_role` (`teguh_id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `teguh_fasilitas_hotel`
--
ALTER TABLE `teguh_fasilitas_hotel`
  MODIFY `teguh_id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `teguh_kamar`
--
ALTER TABLE `teguh_kamar`
  MODIFY `teguh_id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `teguh_reservasii`
--
ALTER TABLE `teguh_reservasii`
  MODIFY `teguh_id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `teguh_reserved_room`
--
ALTER TABLE `teguh_reserved_room`
  MODIFY `teguh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `teguh_role`
--
ALTER TABLE `teguh_role`
  MODIFY `teguh_id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `teguh_tipe_kamar`
--
ALTER TABLE `teguh_tipe_kamar`
  MODIFY `teguh_id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `teguh_user`
--
ALTER TABLE `teguh_user`
  MODIFY `teguh_id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `teguh_user`
--
ALTER TABLE `teguh_user`
  ADD CONSTRAINT `teguh_user_ibfk_1` FOREIGN KEY (`teguh_id_role`) REFERENCES `teguh_role` (`teguh_id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
