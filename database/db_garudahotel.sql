-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Mar 2022 pada 11.05
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_garudahotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_checkin`
--

CREATE TABLE `tb_checkin` (
  `id_checkin` int(11) NOT NULL,
  `id_tamu` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `tanggal_checkin` date NOT NULL,
  `tanggal_checkout` date NOT NULL,
  `tanggal` date NOT NULL,
  `jml_kamar` int(11) NOT NULL,
  `jml_orang` int(11) NOT NULL,
  `jml_hari` int(11) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `status_checkin` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_checkin`
--

INSERT INTO `tb_checkin` (`id_checkin`, `id_tamu`, `id_room`, `tanggal_checkin`, `tanggal_checkout`, `tanggal`, `jml_kamar`, `jml_orang`, `jml_hari`, `total_pembayaran`, `status_checkin`) VALUES
(1, 1, 1, '2022-03-14', '2022-03-16', '2022-03-13', 2, 2, 0, 6000000, 'tunggu-konfimasi-admin'),
(10, 1, 5, '2022-03-24', '2022-03-29', '2022-03-14', 3, 4, 5, 20000000, 'sudah-selesai'),
(11, 1, 6, '2022-03-16', '2022-03-25', '2022-03-14', 3, 3, 9, 27000000, 'selesai'),
(13, 1, 11, '2022-03-30', '2022-03-31', '2022-03-14', 3, 5, 1, 3000000, 'sudah-selesai'),
(14, 2, 10, '2022-03-14', '2022-03-16', '2022-03-19', 2, 2, 2, 6000000, 'pending'),
(15, 4, 11, '2022-03-16', '2022-03-24', '2022-03-19', 2, 4, 8, 24000000, 'tunggu-konfimasi-admin'),
(16, 1, 12, '2022-03-23', '2022-03-24', '2022-03-19', 2, 3, 1, 250000, 'tunggu-konfimasi-admin'),
(17, 1, 16, '2022-03-22', '2022-03-25', '2022-03-20', 2, 3, 3, 2400000, 'tunggu-konfimasi-admin'),
(20, 1, 17, '2022-03-22', '2022-03-26', '2022-03-20', 2, 3, 4, 2000000, 'tunggu-konfimasi-admin'),
(21, 1, 5, '2022-03-24', '2022-03-26', '2022-03-23', 1, 1, 2, 1300000, 'tunggu-konfimasi-admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_checkout`
--

CREATE TABLE `tb_checkout` (
  `id_checkout` int(11) NOT NULL,
  `id_checkin` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_checkout`
--

INSERT INTO `tb_checkout` (`id_checkout`, `id_checkin`, `tanggal_keluar`) VALUES
(1, 13, '2022-03-17'),
(2, 13, '2022-03-22'),
(3, 10, '2022-03-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas_nama` varchar(50) NOT NULL,
  `fasilitas_indoor` text NOT NULL,
  `fasilitas_outdoor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas_nama`, `fasilitas_indoor`, `fasilitas_outdoor`) VALUES
(1, 'Standard Room', 'TV , AC , Kamar Mandi , Kamar', 'Parkir'),
(5, ' Junior Suite Room', 'Wi-Fi Internet gratis , Kamar mandi mandi , Ukuran kamar , TV , AC', 'Restoran , Wi-Fi Internet gratis , Parkir'),
(6, 'Suite Room', 'Wi-Fi Internet gratis ,  Kamar mandi mandi , Ukuran kamar <br> TV ,  AC  , Seprai kualitas premium ', 'Caffe , Wi-Fi Internet gratis , Parkir , Bebas Rokok , Kolam renang'),
(7, 'Presidential Suite', 'Wi-Fi Internet gratis ,  Kamar mandi mandi , Ukuran kamar <br> TV ,  AC  , Seprai kualitas premium ', 'Restoran , Wi-Fi Internet gratis , Parkir <br> Layanan Front Office 24 jam , Bebas Rokok <br> Kolam renang , Bar , AC '),
(8, 'Twin Room', 'Wi-Fi Internet gratis ,  Kamar mandi mandi , Ukuran kamar <br> TV ,  AC ,  Kopi/teh , Ruangan bebas rokok <br> Seprai kualitas premium ,   Housekeeping harian , Tipe Matras ', 'Sarapan gratis , Restoran , Wi-Fi Internet gratis , Parkir <br> Layanan Front Office 24 jam , Bebas Rokok <br> Kolam renang , Bar , AC , Kopi/teh di lobi hotel'),
(9, 'Single Room', 'Wi-Fi Internet gratis ,  Kamar mandi mandi , Ukuran kamar <br> TV ,  AC ,  Kopi/teh , Ruangan bebas rokok , Seprai kualitas premium ', 'Sarapan gratis , Restoran , Wi-Fi Internet gratis , Parkir <br> Layanan Front Office 24 jam , Bebas Rokok <br> Kolam renang , Bar , AC '),
(26, 'Deluxe Room', 'Wi-Fi Internet gratis , TV , AC , Kamar Mandi , Double Bed , Sprai Kualitas Premium', 'Parkir , bar , Caffe'),
(27, 'Superior Room', 'Wi-Fi Internet gratis , TV , AC , Kamar Mandi , Kamar', 'Parkir , bar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kritik`
--

CREATE TABLE `tb_kritik` (
  `id_kritik` int(11) NOT NULL,
  `id_tamu` int(11) NOT NULL,
  `nama_kritik` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kritik`
--

INSERT INTO `tb_kritik` (`id_kritik`, `id_tamu`, `nama_kritik`, `email`, `pesan`) VALUES
(1, 1, 'Reza Risyan', 'rezarisyan21@gmail.com', 'Ruang kamar cukup lumayan enak tapi ventilasi udara dan cahaya kurang , tetang kebersihan kamar dan ruangan lain cukup baik . Staff dan kru lain sangat sopan dan bersahabat letak hotel sangat strategis di tengah kota .sipp deh pokoknya '),
(2, 2, 'Julian Pratama', 'julianpratama22@gmail.com', 'Pelayanan Bagus, Sarapan Ok. Harga bersahabat. Poin lebih anda tidak perlu khawatir ketinggalan barang di hotel ini. Staf hotel dgn sigap mengkonfirmasi dan mengirimkan barang tersebut ke rumah anda. Keren..'),
(3, 3, 'Rendi Sinaga', 'rendisinaga44@gmail.com', 'Pada saat keadatangan pelayanan ramah dan ada promo kamar psbb mereka sebut saya diberikan masker, hand sanitizer, vitamin jadi ini sangat membantu kami dalam perjalanan untuk lebih aman dan nyaman\r\nRecomended berkunjung di BIL hotel'),
(4, 4, 'Wildan Ahmad', 'wildanch56@gmail.com', 'Terimakasih untuk pelayanannya yang ramah, kamar yang bersih dan nyaman\r\n\r\nMaaf saya pernah memecahkan gelas yang di wastafel tapi saya sudah konfirmasi saat check out\r\n\r\nPastri untuk sarapan banyakin yang manis-manis yaa\r\n\r\nMakan malem Suki sukinya enak'),
(6, 1, 'Reza Risyan', 'rezarisyan21@gmail.com', 'Kualitas terbaik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_checkin` int(11) NOT NULL,
  `no_hotel` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_checkin`, `no_hotel`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 10, 0, 'Reza Risyan', 'BCA', 20000000, '2022-03-14', '20220314082016'),
(2, 10, 0, 'Reza Risyan', '2', 20000000, '2022-03-14', '20220314083248'),
(8, 11, 0, 'Reza Risyan', 'BCA', 2000000, '2022-03-14', '2022031410182361d1aca81bacf.jpg'),
(9, 11, 0, 'Reza Risyan', 'BCA', 27000000, '2022-03-14', '202203141020461081647-nama-upin-ipin.jpg'),
(10, 13, 0, 'Reza Risyan', 'BNI Syariah', 3000000, '2022-03-14', '20220314112642bxa.png'),
(11, 15, 2543546, 'Wildan', 'BCA', 24000000, '2022-03-19', '20220319124209bxa.png'),
(12, 16, 0, 'Reza Risyan', 'Mandiri', 250000, '2022-03-19', '20220319133239room5.jpg'),
(13, 20, 0, 'Reza Risyan', 'BCA', 2000000, '2022-03-20', '20220320072915room5.jpg'),
(14, 1, 0, 'Reza Risyan', 'BCA', 6000000, '2022-03-20', '20220320073726room10.jpg'),
(15, 17, 0, 'Reza Risyan', 'BNI Syariah', 2400000, '2022-03-22', '20220322080939room1.jpg'),
(16, 21, 0, 'Reza Risyan', 'BCA', 1300000, '2022-03-23', '20220323110242room5.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_room`
--

CREATE TABLE `tb_room` (
  `id_room` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_hotel` varchar(200) NOT NULL,
  `status_hotel` varchar(100) NOT NULL,
  `harga_hotel` int(11) NOT NULL,
  `hotel_deskripsi` text NOT NULL,
  `gambar_hotel` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_room`
--

INSERT INTO `tb_room` (`id_room`, `id_kelas`, `nama_hotel`, `status_hotel`, `harga_hotel`, `hotel_deskripsi`, `gambar_hotel`, `status`) VALUES
(1, 1, 'Standar Room', 'Tersedia', 250000, 'sarana yang lengkap', 'hotel1647692376.jpg', 1),
(5, 5, 'Junior Suite Room', 'Dipesan', 650000, 'Fasilitas Terbaik', 'hotel1647691593.jpg', 1),
(6, 1, 'Standar Room', 'Terisi', 250000, 'Sarana Yang Lengkap', 'hotel1647691923.jpg', 1),
(9, 6, 'Suite Room', 'Tersedia', 800000, 'Fasilitas Terbaik', 'hotel1647691607.jpg', 1),
(10, 7, 'Presidential Suite', 'Tersedia', 1000000, 'Fasilitas Terbaik', 'hotel1647691855.jpg', 1),
(11, 8, 'Twin Room', 'Tersedia', 1500000, 'Fasilitas Terbaik', 'hotel1647691706.jpg', 1),
(12, 9, 'Single Room', 'Tersedia', 1200000, 'Sarana Yang Lengkap', 'hotel1647691694.jpg', 1),
(16, 7, 'Presidential Suite', 'Dipesan', 1000000, 'Sarana Yang Lengkap', 'hotel1647691628.jpg', 1),
(17, 27, 'Superior Room', 'Tersedia', 400000, 'Sarana Yang Lengkap', 'hotel1647692611.jpg', 1),
(18, 26, 'Deluxe Room', 'Tersedia', 500000, 'Fasilitas Terbaik', 'hotel1647691573.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tamu`
--

CREATE TABLE `tb_tamu` (
  `id_tamu` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `level_user` enum('tamu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tamu`
--

INSERT INTO `tb_tamu` (`id_tamu`, `nama`, `username`, `password`, `telepon`, `email`, `alamat`, `foto`, `level_user`) VALUES
(1, 'Reza Risyan', 'risyan123', '1898e75ab947df2c3cbd3439419c2140', '082130842118', 'rezarisyan21@gmail.com', 'Kp Resgal', 'profil1647492947.jpg', 'tamu'),
(2, 'Julian', 'julian12', '6a18116dc7e7b609684a4340b6ac2ea6', '083585825557', 'julianpratama22@gmail.com', 'kp Ragi ', 'julian.png', 'tamu'),
(3, 'Rendi', 'rendi44', '40431e62a60b9cdcd6a76a25b2c5034b', '0821998545', 'rendisinaga44@gmail.com', 'Kp Cihurip', 'rendi.jpg', 'tamu'),
(4, 'Wildan', 'wildan56', 'ac174e67e662c4d31dcc2e8b16358024', '0859766586', 'wildanch56@gmail.com', 'Kp Babakan Tegal', 'wildan.jpg', 'tamu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `level_user` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `telepon`, `email`, `alamat`, `foto`, `level_user`) VALUES
(1, 'Reza Risyan F', 'reza123', '1898e75ab947df2c3cbd3439419c2140', '082130842118', 'rezarisyanfauzi21@gmail.com', 'Kp Resmigalih Rt 04 Rw 02', 'reza.jpg', 'admin'),
(2, 'Reza Risyan Fauzi', 'faurezreza', '1898e75ab947df2c3cbd3439419c2140', '083821200138', 'rezarisyan25@gmail.com', 'Kp Batujajar', 'profil1647760278.jpg', 'petugas'),
(4, 'Julian p', 'julian123', '6a18116dc7e7b609684a4340b6ac2ea6', '082130842118', 'julian123@gmail.com', 'Kp Cihirup', 'julian.jpg', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_checkin`
--
ALTER TABLE `tb_checkin`
  ADD PRIMARY KEY (`id_checkin`),
  ADD KEY `id_tamu` (`id_tamu`),
  ADD KEY `id_room` (`id_room`);

--
-- Indeks untuk tabel `tb_checkout`
--
ALTER TABLE `tb_checkout`
  ADD PRIMARY KEY (`id_checkout`),
  ADD KEY `id_checkin` (`id_checkin`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_kritik`
--
ALTER TABLE `tb_kritik`
  ADD PRIMARY KEY (`id_kritik`),
  ADD KEY `id_tamu` (`id_tamu`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_checkin` (`id_checkin`);

--
-- Indeks untuk tabel `tb_room`
--
ALTER TABLE `tb_room`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tb_tamu`
--
ALTER TABLE `tb_tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_checkin`
--
ALTER TABLE `tb_checkin`
  MODIFY `id_checkin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_checkout`
--
ALTER TABLE `tb_checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_kritik`
--
ALTER TABLE `tb_kritik`
  MODIFY `id_kritik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_room`
--
ALTER TABLE `tb_room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_tamu`
--
ALTER TABLE `tb_tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_checkin`
--
ALTER TABLE `tb_checkin`
  ADD CONSTRAINT `tb_checkin_ibfk_1` FOREIGN KEY (`id_tamu`) REFERENCES `tb_tamu` (`id_tamu`),
  ADD CONSTRAINT `tb_checkin_ibfk_2` FOREIGN KEY (`id_room`) REFERENCES `tb_room` (`id_room`);

--
-- Ketidakleluasaan untuk tabel `tb_checkout`
--
ALTER TABLE `tb_checkout`
  ADD CONSTRAINT `tb_checkout_ibfk_1` FOREIGN KEY (`id_checkin`) REFERENCES `tb_checkin` (`id_checkin`);

--
-- Ketidakleluasaan untuk tabel `tb_kritik`
--
ALTER TABLE `tb_kritik`
  ADD CONSTRAINT `tb_kritik_ibfk_1` FOREIGN KEY (`id_tamu`) REFERENCES `tb_tamu` (`id_tamu`);

--
-- Ketidakleluasaan untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_checkin`) REFERENCES `tb_checkin` (`id_checkin`);

--
-- Ketidakleluasaan untuk tabel `tb_room`
--
ALTER TABLE `tb_room`
  ADD CONSTRAINT `tb_room_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
