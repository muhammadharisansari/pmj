-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2021 pada 14.58
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmj`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `hp_admin` varchar(13) NOT NULL,
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `foto_admin` varchar(255) NOT NULL,
  `level_admin` varchar(11) NOT NULL,
  `blokir` varchar(5) NOT NULL,
  `status` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`hp_admin`, `username_admin`, `password_admin`, `foto_admin`, `level_admin`, `blokir`, `status`) VALUES
('3333', 'coba', '87620b4587cc54edfdf7b606cee40f8b', 'nurhadi.png', 'admin', 'ya', 'offline'),
('0876', 'febi', 'bd039fb0c1e7345572582b0cfde4c132', 'febi.png', 'admin', 'tidak', 'offline'),
('08786', 'risfan', '87620b4587cc54edfdf7b606cee40f8b', 'Screenshot_1.png', 'admin 2', 'tidak', 'offline');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`) VALUES
(1, 'BRI'),
(2, 'BNI'),
(3, 'BCA'),
(4, 'Britama'),
(5, 'Bank Kalsel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `carosel`
--

CREATE TABLE `carosel` (
  `id_carosel` int(11) NOT NULL,
  `file_carosel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `carosel`
--

INSERT INTO `carosel` (`id_carosel`, `file_carosel`) VALUES
(1, 'spanduk2.png'),
(2, 'coba31.png'),
(3, 'spanduk1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hadiah`
--

CREATE TABLE `hadiah` (
  `id_hadiah` int(11) NOT NULL,
  `jumlah_poin` int(3) NOT NULL,
  `ket_hadiah` varchar(30) NOT NULL,
  `gambar_hadiah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hadiah`
--

INSERT INTO `hadiah` (`id_hadiah`, `jumlah_poin`, `ket_hadiah`, `gambar_hadiah`) VALUES
(1, 100, 'Saldo Rp.100.000', 'saldo.jfif'),
(2, 150, 'Token PLN 200.000', 'token_hadiah.jfif'),
(6, 1000, 'Sepeda ban 2', '1441917955.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga`
--

CREATE TABLE `harga` (
  `id_harga` int(11) NOT NULL,
  `ukuran` varchar(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `poin` int(3) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `harga`
--

INSERT INTO `harga` (`id_harga`, `ukuran`, `harga`, `poin`, `keterangan`) VALUES
(1, '1000', 1000, 1, '1000 ml sama dengan 1 liter.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_pengepul`
--

CREATE TABLE `harga_pengepul` (
  `id_harga_pengepul` int(11) NOT NULL,
  `harga_pengepul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `harga_pengepul`
--

INSERT INTO `harga_pengepul` (`id_harga_pengepul`, `harga_pengepul`) VALUES
(1, 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `info`
--

CREATE TABLE `info` (
  `id_info` int(11) NOT NULL,
  `judul_info` varchar(100) NOT NULL,
  `tanggal_info` date NOT NULL,
  `konten_info` varchar(800) NOT NULL,
  `link` varchar(500) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`id_info`, `judul_info`, `tanggal_info`, `konten_info`, `link`, `gambar`) VALUES
(2, 'Kuy follow', '2021-03-15', 'let\'s go follow ig bos mimin, siapa tau dapat cuan', 'https://www.instagram.com/risfanhabibie/', ''),
(3, 'Yuk lengkapi Profil, ga sampe 5 menit', '2021-03-12', 'Kamu punya kesempatan lebih besar untuk menang hadiah dan menikmati semua fitur yang tersedia jika profil kamu sudah  lengkap loh..', '', 'Lambang_Kabupaten_Hulu_Sungai_Selatan.png'),
(20, 'Undangan semua member', '2021-04-22', 'diharapkan berhadir ke acara pengajian', '', 'kajian_islami.png'),
(25, 'coba info tanpa pendukung', '2021-04-23', 'info ini tanpa pendukung info ini tanpa pendukung info ini tanpa pendukung info ini tanpa pendukung', '', 'hss.png'),
(26, 'coba dari halaman baru', '2021-04-23', 'tanpa teks jangan dibaca tanpa teks jangan dibaca ', 'https://www.google.com/search?q=weschool&oq=we&aqs=chrome.3.69i60j69i57j69i59l2j35i39l2j69i61j69i60.3537j0j4&sourceid=chrome&ie=UTF-8', ''),
(27, 'coba buka referensi', '2021-04-29', 'link ini salahsatu yang bermanfaat', 'https://www.google.com/search?q=weschool&oq=we&aqs=chrome.3.69i60j69i57j69i59l2j35i39l2j69i61j69i60.3537j0j4&sourceid=chrome&ie=UTF-8', 'karosel12.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klaim_hadiah`
--

CREATE TABLE `klaim_hadiah` (
  `id_klaim` int(11) NOT NULL,
  `nik` int(16) NOT NULL,
  `username` varchar(30) NOT NULL,
  `ket_hadiah` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `code` varchar(20) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `klaim_hadiah`
--

INSERT INTO `klaim_hadiah` (`id_klaim`, `nik`, `username`, `ket_hadiah`, `tanggal`, `code`, `status`) VALUES
(6, 6306029, 'haris', 'Saldo Rp.100.000', '2021-04-14', '2105-0107-3241-pm', 'selesai'),
(7, 6306029, 'haris', 'Saldo Rp.100.000', '2021-04-19', '2107-1107-3241-am', 'menunggu'),
(9, 6306029, 'haris', 'Token PLN 200.000', '2021-05-01', '2105-0107-3241-am', 'menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `alamat_pmj` varchar(100) NOT NULL,
  `email_pmj` varchar(20) NOT NULL,
  `wa_pmj` varchar(14) NOT NULL,
  `jam_pmj` varchar(200) NOT NULL,
  `map_pmj` varchar(400) NOT NULL,
  `fb_pmj` varchar(20) NOT NULL,
  `ig_pmj` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `alamat_pmj`, `email_pmj`, `wa_pmj`, `jam_pmj`, `map_pmj`, `fb_pmj`, `ig_pmj`) VALUES
(1, 'Jl.A.Yani no.55 Erlangga', 'pmj@gmail.com', '087866574453', '09.00-16.00\r\n(tanggal merah libur)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d837.7726143844202!2d115.26369145260686!3d-2.7747249241891!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de50b62f77c0b6f%3A0xcbf59a3f9a7e185d!2sOlshop%20shona%20zack!5e0!3m2!1sid!2sid!4v1619444917944!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:8;\" allowfullscreen=\"\" loading=\"lazy\">haloooo</iframe>', 'boy.ayez', 'risfanhabibie');

-- --------------------------------------------------------

--
-- Struktur dari tabel `minmax`
--

CREATE TABLE `minmax` (
  `id_minmax` int(11) NOT NULL,
  `minimal` int(11) NOT NULL,
  `maksimal` int(11) NOT NULL,
  `jenis` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `minmax`
--

INSERT INTO `minmax` (`id_minmax`, `minimal`, `maksimal`, `jenis`) VALUES
(1, 10000, 500000, 'tf'),
(2, 10000, 500000, 'tt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi`
--

CREATE TABLE `mutasi` (
  `id_transaksi` int(11) NOT NULL,
  `id_nasabah` int(11) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` varchar(8) NOT NULL,
  `jumlah_penarikan` int(10) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `rek` varchar(50) NOT NULL,
  `code_id` varchar(15) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mutasi`
--

INSERT INTO `mutasi` (`id_transaksi`, `id_nasabah`, `waktu`, `tanggal`, `jenis`, `jumlah_penarikan`, `bank`, `rek`, `code_id`, `status`) VALUES
(23, 6, '02:57 pm', '2021-03-08', 'transfer', 50000, '', '', '', 'ditolak'),
(24, 6, '02:59 pm', '2021-03-08', 'transfer', 100000, '', '', '', 'berhasil'),
(25, 6, '03:07 pm', '2021-03-08', 'transfer', 100000, '', '', '', 'berhasil'),
(30, 6, '12:13 pm', '2021-03-13', 'transfer', 50000, 'KALSEL', '123456789', '', 'berhasil'),
(37, 6, '12:29 pm', '2021-03-21', 'tunai', 50000, '', '', 'id3820556', 'berhasil'),
(38, 6, '05:26 pm', '2021-03-24', 'transfer', 50000, 'BRI', '123456789', '', 'berhasil'),
(39, 6, '05:28 pm', '2021-03-24', 'transfer', 50000, 'BRI', '123456789', '', 'berhasil'),
(40, 6, '12:05 pm', '2021-03-25', 'transfer', 55000, 'BNI', '123456789', '', 'ditolak'),
(41, 6, '12:07 pm', '2021-03-25', 'tunai', 50000, '', '', 'id592656', 'berhasil'),
(44, 4, '03:25 pm', '2021-04-15', 'transfer', 50000, 'BRI', '123444444444', '', 'menunggu'),
(46, 6, '10:12 am', '2021-04-27', 'tunai', 50000, '', '', 'id7977376', 'menunggu'),
(47, 6, '11:11 am', '2021-04-27', 'tunai', 10000, '', '', 'id3869096', 'berhasil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` int(11) NOT NULL,
  `tgl_daftar` varchar(11) NOT NULL,
  `username_nasabah` varchar(30) NOT NULL,
  `password_nasabah` varchar(255) NOT NULL,
  `nama_nasabah` varchar(50) NOT NULL,
  `nik_nasabah` int(16) NOT NULL,
  `tl_nasabah` date NOT NULL,
  `hp_nasabah` varchar(15) NOT NULL,
  `jk_nasabah` varchar(10) NOT NULL,
  `rek_nasabah` varchar(30) NOT NULL,
  `bank_nasabah` varchar(20) NOT NULL,
  `ktp_nasabah` varchar(255) NOT NULL,
  `alamat_nasabah` varchar(50) NOT NULL,
  `status_verifikasi` varchar(15) NOT NULL,
  `sisa_saldo` int(11) NOT NULL,
  `code_tarik` varchar(255) NOT NULL,
  `poin` int(11) NOT NULL,
  `blokir` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `tgl_daftar`, `username_nasabah`, `password_nasabah`, `nama_nasabah`, `nik_nasabah`, `tl_nasabah`, `hp_nasabah`, `jk_nasabah`, `rek_nasabah`, `bank_nasabah`, `ktp_nasabah`, `alamat_nasabah`, `status_verifikasi`, `sisa_saldo`, `code_tarik`, `poin`, `blokir`) VALUES
(4, '2021-02-23', 'user', 'c0ba88b8bca79ca3b50b96abdf431766', 'User on3 two     ', 123, '2021-02-23', '12345', 'Perempuan', '123444444444', 'BRI', 'KTP-min.jpg', 'alamat', 'diverifikasi', 41000, '', 1, 'tidak'),
(5, '2021-02-23', 'nasabah 2', 'c0ba88b8bca79ca3b50b96abdf431766', 'nasabah dua', 22, '2021-02-23', '087722988', 'Laki-laki', '12345', 'BNI', 'kepercayaan-mulai.jpg', 'alamat', 'menunggu', 7000, '', 2, 'tidak'),
(6, '2020-01-23', 'haris', 'c0ba88b8bca79ca3b50b96abdf431766', 'Muhammad Haris                                    ', 6306029, '1997-08-29', '087815653374', 'Laki-laki', '123456789', 'BRI', 'Office_Lens_20170712-1358161.jpg', 'jalan panjang, HSS, Kalsel\r\n', 'diverifikasi', 26100, '', 750, 'tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notif`
--

CREATE TABLE `notif` (
  `id_notif` int(11) NOT NULL,
  `id_nasabah` int(11) NOT NULL,
  `waktu_notif` varchar(13) NOT NULL,
  `tanggal_notif` date NOT NULL,
  `isi_notif` varchar(600) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notif`
--

INSERT INTO `notif` (`id_notif`, `id_nasabah`, `waktu_notif`, `tanggal_notif`, `isi_notif`, `status`) VALUES
(36, 6, '12:05:41 am', '2021-04-19', 'Klaim hadiah Saldo Rp.100.000 kamu berhasil. Segera datang ke PMJ bawa KTPnya ya, kuy.', 'sudah'),
(41, 6, '08:42:20 pm', '2021-04-20', 'Kamu telah menabung minyak sebanyak 4000 ml, senilai Rp.4000. Cek detailnya di menu setoran. <a href=\"riwayat_minyak\">(klik disini)</a> ', 'sudah'),
(42, 4, '05:14:02 am', '2021-04-21', 'Kamu telah menabung minyak sebanyak 2000 ml, senilai Rp.2000. Cek detailnya di menu setoran. <a href=\"riwayat_minyak\">(klik disini)</a> ', 'sudah'),
(44, 5, '07:26:38 am', '2021-04-22', 'Kamu telah menabung minyak sebanyak 5000 ml, senilai Rp.5000. Cek detailnya di menu setoran. <a href=\"riwayat_minyak\">(klik disini)</a> ', 'belum'),
(47, 6, '07:49:51 am', '2021-04-22', 'Kamu telah menabung minyak sebanyak 600 ml, senilai Rp.600. Cek detailnya di menu setoran. <a href=\"riwayat_minyak\">(klik disini)</a> ', 'belum'),
(48, 4, '07:17:02 am', '2021-04-24', 'Kamu telah menabung minyak sebanyak 1000 ml, senilai Rp.1000. Cek detailnya di menu setoran. <a href=\"riwayat_minyak\">(klik disini)</a> ', 'belum'),
(55, 6, '07:32:41 am', '2021-05-01', 'Klaim hadiah Token PLN 200.000 kamu berhasil. Segera datang ke PMJ bawa KTPnya ya, kuy.', 'belum'),
(61, 5, '03:57:23 pm', '2021-06-18', 'Kamu telah menabung minyak sebanyak 1000 ml, senilai Rp.1000. Cek detailnya di menu setoran. <a href=\"riwayat_minyak\">(klik disini)</a> ', 'belum'),
(62, 5, '03:57:40 pm', '2021-06-18', 'Kamu telah menabung minyak sebanyak 1000 ml, senilai Rp.1000. Cek detailnya di menu setoran. <a href=\"riwayat_minyak\">(klik disini)</a> ', 'belum'),
(63, 6, '03:06:34 pm', '2021-06-20', 'Kamu telah menabung minyak sebanyak 600 ml, senilai Rp.600. Cek detailnya di menu setoran. <a href=\"riwayat_minyak\">(klik disini)</a> ', 'belum'),
(64, 11, '12:07:54 am', '2021-06-21', 'silahkan lengkapi profil kamu ya', 'belum'),
(65, 11, '12:08:44 am', '2021-06-21', 'Kamu telah menabung minyak sebanyak 500 ml, senilai Rp.500. Cek detailnya di menu setoran. <a href=\"riwayat_minyak\">(klik disini)</a> ', 'belum'),
(74, 5, '01:44:05 am', '2021-06-24', 'silahkan lengkapi profil kamu ya, biar kamu bisa full make fiturnya..', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `id_nasabah` int(11) NOT NULL,
  `harga` int(5) NOT NULL,
  `tot_modal` int(11) NOT NULL,
  `jumlah_pesan` int(3) NOT NULL,
  `total_harga` int(6) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama_barang`, `id_nasabah`, `harga`, `tot_modal`, `jumlah_pesan`, `total_harga`, `tanggal`, `status`) VALUES
(11, 'Minyak Goreng', 6, 15500, 27000, 2, 32000, '2021-03-25', 'selesai'),
(18, 'Gula Pasir', 6, 12000, 10000, 1, 12000, '2021-04-14', 'dipesan'),
(19, 'Gula Pasir', 4, 12000, 10000, 1, 12000, '2021-04-15', 'dipesan'),
(20, 'Gula Pasir', 6, 12000, 10000, 1, 12000, '2021-04-22', 'dipesan'),
(21, 'Gula Pasir', 6, 12000, 10000, 1, 12000, '2021-04-22', 'selesai'),
(22, 'Gula Pasir', 6, 12000, 10000, 1, 12000, '2021-04-22', 'selesai'),
(24, 'Beras', 6, 30000, 28000, 1, 30000, '2021-06-22', 'dipesan'),
(25, 'Beras', 6, 30000, 56000, 2, 60000, '2021-06-22', 'dipesan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_setoran`
--

CREATE TABLE `riwayat_setoran` (
  `id_setoran` int(11) NOT NULL,
  `id_nasabah` int(11) NOT NULL,
  `waktu_setor` varchar(13) NOT NULL,
  `tanggal_setor` date NOT NULL,
  `jumlah_setor` int(11) NOT NULL,
  `senilai` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat_setoran`
--

INSERT INTO `riwayat_setoran` (`id_setoran`, `id_nasabah`, `waktu_setor`, `tanggal_setor`, `jumlah_setor`, `senilai`) VALUES
(25, 6, '12:21:04 am', '2020-04-19', 1000, 1000),
(26, 6, '08:17:46 pm', '2020-04-20', 3000, 3000),
(27, 6, '08:42:20 pm', '2020-04-20', 4000, 4000),
(28, 4, '05:14:02 am', '2020-04-21', 2000, 2000),
(29, 6, '07:22:58 am', '2021-05-22', 1000, 1000),
(30, 5, '07:26:38 am', '2021-04-22', 5000, 5000),
(31, 6, '07:48:07 am', '2021-04-22', 1000, 1000),
(32, 6, '07:49:30 am', '2021-04-22', 1000, 1000),
(33, 6, '07:49:51 am', '2021-04-22', 600, 600),
(34, 4, '07:17:02 am', '2021-04-24', 1000, 1000),
(35, 5, '03:57:23 pm', '2021-06-18', 1000, 1000),
(36, 5, '03:57:40 pm', '2021-06-18', 1000, 1000),
(37, 6, '03:06:34 pm', '2021-06-20', 600, 600),
(38, 11, '12:08:44 am', '2021-06-21', 500, 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `syarat`
--

CREATE TABLE `syarat` (
  `id_syarat` int(11) NOT NULL,
  `syarat` varchar(500) NOT NULL,
  `kategori` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `syarat`
--

INSERT INTO `syarat` (`id_syarat`, `syarat`, `kategori`) VALUES
(1, 'minimal transfer Rp.10.000', 'transfer'),
(2, 'minimal penarikan Rp.10.000', 'tunai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tukar`
--

CREATE TABLE `tukar` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `ket_barang` varchar(100) NOT NULL,
  `satuan` varchar(7) NOT NULL,
  `harga` int(6) NOT NULL,
  `modal` int(11) NOT NULL,
  `gambar_barang` varchar(20) NOT NULL,
  `sedia` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tukar`
--

INSERT INTO `tukar` (`id_barang`, `nama_barang`, `ket_barang`, `satuan`, `harga`, `modal`, `gambar_barang`, `sedia`) VALUES
(1, 'Gula Pasir', 'tukarkan 12000 saldo anda menjadi 1 kg gula pasir.', 'kg', 12000, 10000, 'Gula-Pasir.jpg', 10),
(2, 'Minyak Goreng', 'tukarkan 16000 saldo anda menjadi 1 liter minyak goreng', 'liter', 15500, 13500, 'minyak-goreng.jpg', 8),
(3, 'Beras', 'Tukarkan saldo senilai Rp.30.000 dengan beras sekarung ukuran sedang.', 'satuan', 30000, 28000, 'beras3.png', 7);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username_admin`) USING BTREE;

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `carosel`
--
ALTER TABLE `carosel`
  ADD PRIMARY KEY (`id_carosel`);

--
-- Indeks untuk tabel `hadiah`
--
ALTER TABLE `hadiah`
  ADD PRIMARY KEY (`id_hadiah`);

--
-- Indeks untuk tabel `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indeks untuk tabel `harga_pengepul`
--
ALTER TABLE `harga_pengepul`
  ADD PRIMARY KEY (`id_harga_pengepul`);

--
-- Indeks untuk tabel `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indeks untuk tabel `klaim_hadiah`
--
ALTER TABLE `klaim_hadiah`
  ADD PRIMARY KEY (`id_klaim`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `minmax`
--
ALTER TABLE `minmax`
  ADD PRIMARY KEY (`id_minmax`);

--
-- Indeks untuk tabel `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indeks untuk tabel `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `riwayat_setoran`
--
ALTER TABLE `riwayat_setoran`
  ADD PRIMARY KEY (`id_setoran`);

--
-- Indeks untuk tabel `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`id_syarat`);

--
-- Indeks untuk tabel `tukar`
--
ALTER TABLE `tukar`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `carosel`
--
ALTER TABLE `carosel`
  MODIFY `id_carosel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `hadiah`
--
ALTER TABLE `hadiah`
  MODIFY `id_hadiah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `harga_pengepul`
--
ALTER TABLE `harga_pengepul`
  MODIFY `id_harga_pengepul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `klaim_hadiah`
--
ALTER TABLE `klaim_hadiah`
  MODIFY `id_klaim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `minmax`
--
ALTER TABLE `minmax`
  MODIFY `id_minmax` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `notif`
--
ALTER TABLE `notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `riwayat_setoran`
--
ALTER TABLE `riwayat_setoran`
  MODIFY `id_setoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `syarat`
--
ALTER TABLE `syarat`
  MODIFY `id_syarat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tukar`
--
ALTER TABLE `tukar`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
