-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2018 at 10:08 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasti_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasilpretest`
--

CREATE TABLE `hasilpretest` (
  `id` int(11) NOT NULL,
  `id_siswa` varchar(256) NOT NULL,
  `durasi` time NOT NULL,
  `q1` tinyint(1) NOT NULL,
  `q2` tinyint(1) NOT NULL,
  `q3` tinyint(1) NOT NULL,
  `q4` tinyint(1) NOT NULL,
  `q5` tinyint(1) NOT NULL,
  `q6` tinyint(1) NOT NULL,
  `q7` tinyint(1) NOT NULL,
  `q8` tinyint(1) NOT NULL,
  `q9` tinyint(1) NOT NULL,
  `q10` tinyint(1) NOT NULL,
  `q11` tinyint(1) NOT NULL,
  `q12` tinyint(1) NOT NULL,
  `q13` tinyint(1) NOT NULL,
  `q14` tinyint(1) NOT NULL,
  `q15` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasilpretest`
--

INSERT INTO `hasilpretest` (`id`, `id_siswa`, `durasi`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`) VALUES
(1, '13515123', '00:00:00', 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 1),
(2, '13515123', '00:00:00', 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 1),
(3, '13515123', '00:00:00', 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 1),
(4, '13515123', '00:00:00', 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 1),
(5, '13515123', '00:00:00', 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 1),
(6, '13515123', '00:00:00', 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0),
(7, '13515123', '00:00:00', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(8, '13515123', '00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(9, '13515123', '00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hasiltest`
--

CREATE TABLE `hasiltest` (
  `id` int(11) NOT NULL,
  `id_siswa` varchar(256) NOT NULL,
  `durasi` time NOT NULL,
  `q1` tinyint(1) NOT NULL,
  `q2` tinyint(1) NOT NULL,
  `q3` tinyint(1) NOT NULL,
  `q4` tinyint(1) NOT NULL,
  `q5` tinyint(1) NOT NULL,
  `q6` tinyint(1) NOT NULL,
  `q7` tinyint(1) NOT NULL,
  `q8` tinyint(1) NOT NULL,
  `q9` tinyint(1) NOT NULL,
  `q10` tinyint(1) NOT NULL,
  `q11` tinyint(1) NOT NULL,
  `q12` tinyint(1) NOT NULL,
  `q13` tinyint(1) NOT NULL,
  `q14` tinyint(1) NOT NULL,
  `q15` tinyint(1) NOT NULL,
  `q16` tinyint(1) NOT NULL,
  `q17` tinyint(1) NOT NULL,
  `q18` tinyint(1) NOT NULL,
  `q19` tinyint(1) NOT NULL,
  `q20` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasiltest`
--

INSERT INTO `hasiltest` (`id`, `id_siswa`, `durasi`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`) VALUES
(1, '13515', '00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, '13515', '00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(3, '13515', '00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, '13515', '00:06:23', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, '13515', '00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, '13515', '00:00:19', 0, 0, 1, 1, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0),
(7, '13515', '00:00:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `konseptes`
--

CREATE TABLE `konseptes` (
  `id` int(11) NOT NULL,
  `ID_siswa` varchar(256) NOT NULL,
  `ID_tes` varchar(256) NOT NULL,
  `bobot_tes` int(11) NOT NULL,
  `durasi` time NOT NULL,
  `jawaban_benar` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tingkat_penguasaan` int(11) NOT NULL,
  `jumlah_tes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_konsep` varchar(2) NOT NULL,
  `judul_konsep` varchar(256) NOT NULL,
  `id_topik` varchar(4) NOT NULL,
  `judul_topik` varchar(256) NOT NULL,
  `locked_status` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL,
  `video_url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_konsep`, `judul_konsep`, `id_topik`, `judul_topik`, `locked_status`, `id`, `video_url`) VALUES
('01', 'Pengenalan Survei Tahunan Industri', '0101', 'Pendahuluan', 0, 1, '7CFn3_NAaAw'),
('01', 'Pengenalan Survei Tahunan Industri', '0102', 'Kuesioner', 1, 2, 'h7k9-gSA7BM'),
('01', 'Pengenalan Survei Tahunan Industri', '0103', 'Tes 1', 1, 3, ''),
('02', 'Updating Direktori', '0201', 'Garis Besar', 1, 4, 'p75FGHwysUk'),
('02', 'Updating Direktori', '0202', 'Pedoman Matching', 1, 5, 'p_iL3JCNbxQ'),
('02', 'Updating Direktori', '0203', 'Kuesioner Updating Perusahaan', 1, 6, 'JiQDtvWHrnE'),
('02', 'Updating Direktori', '0204', 'Kuesioner I-B', 1, 7, 'QWbwNmGXYKo'),
('02', 'Updating Direktori', '0205', 'Kuesioner II-B', 1, 8, 'cCY2zd3-qsc'),
('02', 'Updating Direktori', '0206', 'Istilah dan Kode Perusahaan', 1, 9, 'sJC1vJQc6Og'),
('02', 'Updating Direktori', '0207', 'Tes 2', 1, 10, ''),
('03', 'Pedoman Pencacahan II-A', '0301', 'Tata Cara Pengisian Bagian I - II', 1, 11, 'B28no9zaagM'),
('03', 'Pedoman Pencacahan II-A', '0302', 'Tata Cara Pengisian Bagian III', 1, 12, 'FqI1uPEMDr4'),
('03', 'Pedoman Pencacahan II-A', '0303', 'Tata Cara Pengisian Bagian IV - X', 1, 13, 'GSvebYrTTiE'),
('03', 'Pedoman Pencacahan II-A', '0304', 'Konsistensi dan Kewajaran Data', 1, 14, 'dpF41u0h19s'),
('03', 'Pedoman Pencacahan II-A', '0305', 'Kewajaran Data Input - Output', 1, 15, '_EU_FCAamyw'),
('03', 'Pedoman Pencacahan II-A', '0306', 'Tes 3', 1, 16, '');

-- --------------------------------------------------------

--
-- Table structure for table `pertayaantes`
--

CREATE TABLE `pertayaantes` (
  `id` int(11) NOT NULL,
  `id_konsep` int(11) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `id_test` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `question` varchar(471) NOT NULL,
  `correct` varchar(161) NOT NULL,
  `A` varchar(176) NOT NULL,
  `B` varchar(178) DEFAULT NULL,
  `C` varchar(145) DEFAULT NULL,
  `D` varchar(161) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertayaantes`
--

INSERT INTO `pertayaantes` (`id`, `id_konsep`, `id_topik`, `id_test`, `id_question`, `weight`, `question`, `correct`, `A`, `B`, `C`, `D`) VALUES
(1, 1, 101, 1, 1, 4, 'Dasar hukum pelaksanaan survei statistik di atur dalam UU nomor berapa', 'Undang-Undang nomor 16 Tahun 1997', 'Undang-Undang nomor 7 Tahun 2008', 'Undang-Undang Nomor 51 Tahun 1999', 'Undang-Undang Nomor 7 Tahun 2017', 'Undang-Undang nomor 16 Tahun 1997'),
(2, 1, 101, 1, 2, 4, 'Definisi perusahaan/usaha industri manufaktur adalah', 'Suatu unit produksi, terletak pada tempat tertentu, melakukan kegiatan ekonomi, bertujuan mengubah suatu barang menjadi produk baru yang nilainya lebih tinggi', 'Suatu unit produksi (kesatuan) yang memperkerjakan 20 orang atau lebih', 'Perusahaan yang bergerak dalam hal perdagangan', 'Merupakan perusahaan yang dapat dimiliki oleh swasta maupun negara, dapat berupa perusahaan persekutuan', 'Suatu unit produksi, terletak pada tempat tertentu, melakukan kegiatan ekonomi, bertujuan mengubah suatu barang menjadi produk baru yang nilainya lebih tinggi'),
(3, 1, 101, 1, 3, 4, 'Tujuan dan Manfaat dari Survei Industri Besar dan Sedang (IBS) adalah', 'Menyediakan data dan informasi statistik industri besar dan sedang yang lengkap, akurat, relevan dan tepat waktu untuk bahan evaluasi dan perencanaan pembangunan', 'Memberikan pemahaman dan diagnostik awal atas kondisi aspek organisasi yang dapat mempengaruhi kinerja organisasi jangka panjang seluruh pegawai pada setiap level', 'Untuk mengetahui kepuasan para pelanggan dengan pelayanan jasa dan produk yang diberikan', 'Menyelenggarakan pelayanan dibidang perencanaan, ketatausahaan, kepegawaian, keuangan, kearsipan, kehumasan, hukum, perlengkapan dan rumah tangga', 'Menyediakan data dan informasi statistik industri besar dan sedang yang lengkap, akurat, relevan dan tepat waktu untuk bahan evaluasi dan perencanaan pembangunan'),
(4, 1, 101, 1, 4, 4, 'Pendekatan apa yang dipakai dalam menentukan cakupan perusahaan/usaha dalam Survei Industri Besar dan Sedang', 'Jumlah Tenaga Kerja', 'Jumlah Tenaga Kerja', 'Jumlah Omset Usaha per Tahun', 'Jumlah Aset Usaha per Tahun', 'Semua Jawaban Benar'),
(5, 1, 101, 1, 5, 4, 'Yang termasuk cakupan perusahaan / usaha yang dicacah dalam Survei IBS Tahunan adalah perusahaan yang memiliki tenaga kerja', '>19 orang', '1 - 4 orang', '5 - 19 orang', '>19 orang', '1 - 19 orang'),
(6, 1, 101, 1, 6, 4, 'Metode yang digunakan dalam pengumpulan informasi Survei IBS Tahunan adalah', 'Wawancara Langsung dan Tidak Langsung (self-Inumeration)', 'Wawancara Langsung dan Tidak Langsung (self-Inumeration)', 'Observasi', 'Studi Dokumen', 'Semua Jawaban Salah'),
(7, 1, 101, 1, 7, 4, 'Yang termasuk perusahaan Industri skala mikro adalah yang mempunyai jumlah tenaga kerja', '1 - 4 orang', '1 - 4 orang', '5 - 19 orang', '20 - 99 orang', '>99 orang'),
(8, 1, 101, 1, 8, 4, 'Yang termasuk perusahaan Industri skala kecil adalah yang mempunyai jumlah tenaga kerja', '5 - 19 orang', '1 - 4 orang', '5 - 19 orang', '20 - 99 orang', '>99 orang'),
(9, 1, 101, 1, 9, 4, 'Yang termasuk perusahaan Industri skala menengah adalah yang mempunyai jumlah tenaga kerja', '20 - 99 orang', '1 - 4 orang', '5 - 19 orang', '20 - 99 orang', '>99 orang'),
(10, 1, 101, 1, 10, 4, 'Yang termasuk perusahaan Industri skala besar adalah yang mempunyai jumlah tenaga kerja', '>99 orang', '1 - 4 orang', '5 - 19 orang', '20 - 99 orang', '>99 orang'),
(11, 1, 102, 1, 11, 6, 'Daftar apa saja yang dipakai dalam Survei IBS Tahunan', 'IA, IB, IIA, IIB, Updating Perusahaan, Kartu Kendali, IS-L', 'IA, IB, IIA, IIB, IIC, Updating Perusahaan, Kartu Kendali, IS-L', 'IA, IB, IIA, IIB, Updating Perusahaan, Kartu Kendali, IS-L', 'IA, IB, IIA, IIB, Updating Perusahaan, Kartu Kendali', 'IA, IB, IIA, IIB, Updating Perusahaan, IS-L'),
(12, 1, 102, 1, 12, 6, 'Daftar IA digunakan untuk', 'Menjaga kelengkapan, kemutakhiran nama dan alamat perusahaan', 'Menjaga kelengkapan, kemutakhiran nama dan alamat perusahaan', 'Melaporkan hasil pengecekan lapangan calon perusahaan tambahan', 'Mendapatkan data yang benar dari responden', 'Melaporkan keadaan perusahaan yang tidak dapat mengisi kuesioner survei tahunan'),
(13, 1, 102, 1, 13, 6, 'Untuk melaporkan hasil pengecekan lapangan calon perusahaan tambahan', 'IB', 'IB', 'Updating Perusahaan', 'IIA', 'Daftar I-SL'),
(14, 1, 102, 1, 14, 6, 'Daftar IIA digunakan untuk', 'Mendapatkan data yang benar dari responden', 'Menjaga kelengkapan, kemutakhiran nama dan alamat perusahaan', 'Melaporkan hasil pengecekan lapangan calon perusahaan tambahan', 'Mendapatkan data yang benar dari responden', 'Melaporkan keadaan perusahaan yang tidak dapat mengisi kuesioner survei tahunan'),
(15, 1, 102, 1, 15, 6, 'Daftar IIB digunakan untuk', 'Melaporkan keadaan perusahaan yang tidak dapat mengisi kuesioner survei tahunan', 'Menjaga kelengkapan, kemutakhiran nama dan alamat perusahaan', 'Melaporkan hasil pengecekan lapangan calon perusahaan tambahan', 'Mendapatkan data yang benar dari responden', 'Melaporkan keadaan perusahaan yang tidak dapat mengisi kuesioner survei tahunan'),
(16, 1, 102, 1, 16, 6, 'Kuesioner Updating Perusahaan digunakan untuk', 'Untuk mendapatkan informasi umum dan mengecek keberadaan perusahaan aktif menggunakan', 'Untuk mendapatkan informasi umum dan mengecek keberadaan perusahaan aktif menggunakan', NULL, NULL, NULL),
(17, 1, 102, 1, 17, 6, 'Daftar I-SL (C) digunakan untuk', 'Penyalinan hasil matching perusahaan didalam IA dengan instansi lain pada tingkat nasional', 'Penyalinan hasil matching perusahaan didalam IA dengan instansi lain pada tingkat nasional', 'Penyalinan hasil matching perusahaan didalam IA dengan instansi lain pada tingkat provinsi', 'Penyalinan hasil matching perusahaan didalam IA dengan instansi lain pada tingkat kabupaten/kota', 'Penyalinan hasil matching perusahaan didalam IA dengan instansi lain, pada tingkat kecamatan'),
(18, 1, 102, 1, 18, 6, 'Untuk melaporkan hasil matching perusahaan di direktori IBS dengan instansi lain menggunakan', 'Daftar I-SL', 'IB', 'Updating Perusahaan', 'IIA', 'Daftar I-SL'),
(19, 1, 102, 1, 19, 6, 'Daftar I-SL (K) digunakan untuk', 'Penyalinan hasil matching perusahaan didalam IA dengan instansi lain pada tingkat kabupaten/kota', 'Penyalinan hasil matching perusahaan didalam IA dengan instansi lain pada tingkat nasional', 'Penyalinan hasil matching perusahaan didalam IA dengan instansi lain pada tingkat provinsi', 'Penyalinan hasil matching perusahaan didalam IA dengan instansi lain pada tingkat kabupaten/kota', 'Penyalinan hasil matching perusahaan didalam IA dengan instansi lain, pada tingkat kecamatan'),
(20, 1, 102, 1, 20, 6, 'Untuk perusahaan yang aktif dan non-respon, di data dengan kuesioner....', 'II-B', 'IB', 'II-B', 'IIA', 'Daftar I-SL'),
(21, 2, 201, 2, 1, 6, 'Kegiatan yang sangat penting dan utama di dalam Pemutakhiran Direktori untuk melengkapi cakupan Direktori BPS adalah:', 'Menjaring perusahaan baru', 'Melaporkan perusahaan yang pindah kategori menjadi bukan kategori industri manufaktur', 'Melaporkan perusahaan yang berubah skala menjadi kelompok industri mikro atau kecil', 'Melaporkan perusahaan yang pindah, tutup dan non respon', 'Menjaring perusahaan baru'),
(22, 2, 201, 2, 2, 6, 'Beberapa tujuan dilakukannya kegiatan Updating Direktori dalam pelaksanaan kegiatan Survei Tahunan Industri Manufaktur adalah seperti berikut, kecuali:', 'Meningkatkan response rate', 'Menjaring Perusahaan Baru', 'Meningkatkan response rate', 'Melaporkan Perusahaan yang respon, tutup, berubah skala, berubah sub sektor', 'Salah satu manajemen survei'),
(23, 2, 201, 2, 3, 6, 'Berikut adalah kegiatan di dalam Updating Direktori Survei Tahunan Industri Manufaktur di dalam tahun survei, kecuali:', 'Melaporkan perusahaan lewat cacah', 'Melaporkan perusahaan tutup, pindah, dobel, bukan industri dan berubah skala dengan daftar II-B', 'Cek lapangan perusahaan aktif', 'Melaporkan perusahaan lewat cacah', 'Melaporkan perusahaan yang non respon'),
(24, 2, 201, 2, 4, 4, 'Pengecekan hasil updating dan Aproval I-B dan II-B oleh provinsi dilaksanakan pada periode', 'Maret - Juni', 'Januari - Juni', 'Februari - April', 'Maret - Juni', 'November'),
(25, 2, 202, 2, 5, 4, 'Dokumen yang tidak diperlukan petugas saat pendataan ke perusahaan Industri Besar dan Sedang di masing-masing Kabupaten/Kota adalah.', 'Daftar I-SL (P)', 'Kartu Kendali', 'Daftar II-B', 'Daftar I-A', 'Daftar I-SL (P)'),
(26, 2, 202, 2, 6, 6, 'Pelaksanaan paling awal di dalam Pemutakhiran Direktori di dahului dengan:', 'Melakukan matching Direktori BPS dengan Direktori dari Instansi lain', 'Mendata perusahaan yang aktif yang tercatat di Direktori IBS BPS dengan daftar II-A', 'Mengecek perusahaan dengan daftar I-B', 'Mengecek perusahaan dengan daftar II-B', 'Melakukan matching Direktori BPS dengan Direktori dari Instansi lain'),
(27, 2, 202, 2, 7, 4, 'Hasil matching Direktori BPS dengan Direktori dari Instansi lain akan di salin ke:', 'I-SL (K) untuk tingkat Kabupaten/Kota', 'I-SL (P) untuk tingkat Kabupaten/Kota', 'I-SL (P) untuk tingkat Pusat', 'I-SL (K) untuk tingkat Kabupaten/Kota', 'I-SL (K) untuk tingkat Kecamatan'),
(28, 2, 203, 2, 8, 6, 'Jika ternyata didalam isian kuisioner Updating Perusahaan diketahui bahwa perusahaan tersebut sudah tidak berproduksi lagi, maka', 'Lanjutkan ke kuisioner II-B', 'Lanjutkan ke kuisioner II-A', 'Lanjutkan ke kuisioner II-B', 'Hapus perusahaan di dalam direktori IBS', 'Laporkan ke ketua lingkungan setempat'),
(29, 2, 203, 2, 9, 6, 'Manakah pernyataan yang paling benar', 'Perusahaan yang dilaporkan dengan I-B dan telah di approve Provinsi akan dicacah menggunakan Kuesioner Updating Perusahaan dan II-A', 'Perusahaan yang dilaporkan dengan I-B dan telah di approve Provinsi akan dicacah menggunakan Kuesioner Updating Perusahaan dan II-A', 'Perusahaan yang dilaporkan dengan Kuesioner Updating Perusahaan dan ternyata tutup, di lanjutkan dengan Kusesioner IIA', 'Jumlah Kuesioner Updating Perusahaan harus sama dengan jumlah Kuesioner IIA', 'Jumlah Kuesioner Updating Perusahaan harus sama dengan jumlah Kuesioner IB +  jumlah Kuesioner IIA'),
(30, 2, 203, 2, 10, 4, 'Kegiatan yang harus dilakukan oleh setiap petugas di tahun survei sebelum melakukan droping atau penyerahan daftar isian II-A ke perusahaan yang aktif tahun sebelumnya adalah:', 'Mengisi kuesioner updating perusahaan', 'Matching Perusahaan', 'Droping daftar isian II-B', 'Mengisi kuesioner updating perusahaan', 'Menjaring perusahaan baru dengan I-B'),
(31, 2, 204, 2, 11, 4, 'Kelompok perusahaan yang di laporkan dengan Kuesioner I-B adalah, kecuali :', 'Perusahaan Industri Besar dan Sedang yang pindah ke provinsi lain', 'Perusahaan Industri Besar dan Sedang yang baru berdiri', 'Perusahaan Industri Besar dan Sedang yang baru pindah dari provinsi lain', 'Perusahaan Industri Besar dan Sedang yang pindah ke provinsi lain', 'Perusahaan yang baru berubah tenaga kerjanya menjadi 20 orang atau lebih'),
(32, 2, 204, 2, 12, 4, 'Jadwal melaporkan calon perusahaan tambahan (calon perusahaan baru) yang dilakukan oleh petugas lapangan adalah', 'Februari-April', 'Januari', 'Mei-Juni', 'Februari-April', 'November'),
(33, 2, 204, 2, 13, 6, 'Berikut pernyataan yang benar dari kemungkinan yang terjadi saat dilakukan data entri calon perusahaan baru dengan daftar I-B oleh operator:', 'Menambahan ke direktori I-A jika produksi komersil dan perkerja 20 orang keatas', 'Menambahan ke direktori I-A jika produksi komersil dan perkerja 20 orang keatas', 'Tidak dicek kembali karena ditahun survei perusahaan jumlah tenaga kerjanya kurang dari 20 orang', 'Cek kembali tahun depan karena produksi yang dihasilkan bukan industri pengolahan', 'Perusahaan Industri dengan produksi percobaan tidak perlu di cek kembali'),
(34, 2, 205, 2, 14, 6, 'Kelompok perusahaan yang paling tepat dilaporkan dengan daftar isian II-B adalah:', 'Perusahaan pindah Kabupaten/Kota', 'Perusahaan yang lewat cacah', 'Kegiatan produksi masih percobaan', 'Perusahaan pindah Kabupaten/Kota', 'Perusahaan tenaga kerja diatas 20 orang keatas.'),
(35, 2, 205, 2, 15, 4, 'Jadwal melaporkan perusahaan tutup, pindah, dobel, bukan industri manufaktur, dan berubah skala adalah di bulan', 'Januari - April', 'Januari - April', 'Februari - April', 'Maret - Juni', 'November'),
(36, 2, 205, 2, 16, 4, 'Sering kali ketika mendata suatu perusahaan khususnya perusahaan besar, tidak bersedia memberikan data, kemudian dikunjungi kembali tetapi tetap tidak memberikan data dan hal ini menyebabkan non respon, saat yang tepat melaporkan non respon adalah di bulan:', 'November', 'Januari - April', 'Februari - April', 'Maret - Juni', 'November'),
(37, 2, 205, 2, 17, 6, 'Di dalam Pemutakhiran Direktori, apabila ada perusahaan yang pindah ke luar Provinsi, maka di dalam isian kuesioner II-B perusahaan yang pindah tersebut akan dinyakatan sebagai:', 'Tutup permanen', 'Pindah', 'Tutup', 'Tutup sementara', 'Tutup permanen'),
(38, 2, 206, 2, 18, 4, 'Istilah untuk perusahaan yang baru ditemukan (biasanya dengan daftar I-B)', 'AB', 'AL', 'AB', 'AC', 'AK'),
(39, 2, 206, 2, 19, 6, 'Istilah TL digunakan untuk menggambarkan perusahaan yang...', 'Perusahaan yang tutup permanen tahun lalu', 'Perusahaan yang tutup permanen tahun lalu', 'Perusahaan yang sebelumnya aktif tetapi sekarang tutup permanen', 'Perusahaan yang sebelumnya aktif tetapi sekarang tutup', 'Perusahaan yang jenis kegiatan usahanya pada tahun survei tidak termasuk dalam kelompok Industri Manufaktur sesuai KBLI 2009'),
(40, 2, 206, 2, 20, 4, 'Istilah untuk perusahaan yang jenis kegiatan usahanya pada tahun survei tidak termasuk dalam kelompok Industri Manufaktur sesuai KBLI 2009', 'BI', 'UL', 'UB', 'KL', 'BI'),
(41, 3, 301, 3, 1, 4, 'Jadwal mengantarkan Daftar II-A ke perusahaan aktif', 'Januari - Juni', 'Januari - Juni', 'April - Mei', 'Februari - November', 'November'),
(42, 3, 301, 3, 2, 4, 'Jadwal pengambilan daftar II-A ke perusahaan dilaksanakan pada periode', 'Februari - November', 'Januari - Juni', 'April - Mei', 'Februari - November', 'November'),
(43, 3, 301, 3, 3, 4, 'Kode Identitas Perusahaan (KIP) harus terisi untuk setiap perusahaan di dalam kuesioner II-A, berikut adalah pernyatan yang benar terkait dengan KIP, kecuali:', 'Penulisan KIP dilakukan setelah dokumen kuesioner II-A kembali dari perusahaan', 'Penulisan KIP dilakukan setelah dokumen kuesioner II-A kembali dari perusahaan', 'BPS Provinsi tidak boleh mengirim kuesioner II-A ke Pusat tanpa KIP', 'Penulisan KIP di kuesioner II-A dilakukan sebelum dropping kuesioner ke perusahaan', 'KIP dibuat secara otomatis melalui sistim di dalam Moibs'),
(44, 3, 301, 3, 4, 4, '2 digit awal dari KIP adalah kode', 'kode provinsi', 'kode provinsi', 'kode kabupaten/kota', 'kode kecamatan', 'nomor urut perusahaan'),
(45, 3, 301, 3, 5, 4, 'Aturan penulisan nama perusahaan yang mempunyai badan hukum adalah', 'SUMBER MAKMUR, PT', 'PT, SUMBER MAKMUR', 'PT. SUMBER MAKMUR', 'SUMBER MAKMUR, PT', 'SUMBER MAKMUR. PT'),
(46, 3, 301, 3, 6, 4, 'Jika R26 (kuesioner IIA) terisi barang yang dihasilkan adalah : -Produk : Ikan Beku; Volume : 25 ton; Nilai : 1,5 miliar  dan Produk : Ikan Kaleng; Volume : 20 ton; Nilai : 1,5 miliar. Isian Produk utama (R6, Kuesioner IIA)', 'Ikan Beku', 'Ikan Beku', 'Ikan Kaleng', 'Ikan Beku dan Ikan Kaleng', 'Pembekuan dan Pengalengan Ikan'),
(47, 3, 302, 3, 7, 6, 'Usaha Pakaian "Anjung" mempunyai tenaga kerja sebanyak 25 orang. Produk utamanya adalah kaos oblong. Untuk proses penyablonan pada kaos, Usaha Pakaian "Anjung" bekerjasama dengan Usaha Sablon "Aries". Usaha Sablon "Aries" mempekerjakan pegawai sebanyak 30 orang. Tahun 2017, Usaha Pakaian "Anjung" membayar 50 juta untuk proses penyablonan kaos kepada Usaha Sablon "Aries". Pada Kuesioner II-A untuk Usaha Pakaian "Anjung", nilai 50 juta itu akan masuk ke rincian berapa?', 'Rincian 19c. Jasa Industri yang dibayarkan', 'Rincian 18a. Upah/Gaji', 'Rincian 19c. Jasa Industri yang dibayarkan', 'Rincian 19k. Pengeluaran Lainnya', 'Rincian 28. Pendapatan dari jasa industri (Makloon)'),
(48, 3, 302, 3, 8, 4, 'Jika perusahaan menggunakan kemasan/pembungkus dalam proses produksinya, nilai kemasan/pembungkus tersebut akan masuk ke rincian berapa dalam kuesioner IIA', 'Rincian 24i. Pengeluaran lainnya', 'Rincian 24i. Pengeluaran lainnya', 'Rincian 25. Bahan baku dan penolong', 'Rincian 31a. Nilai stok bahan baku, bahan penolong, bahan bakar, pembungkus dan lain-lain', 'Rincian 32.f Nilai taksiran seluruh barang modal tetap lainnya'),
(49, 3, 303, 3, 9, 4, 'Jika perusahaan dengan produk utama adalah Air minum dalam kemasan. Pada R26b Kuesioner IIA dituliskan barang yang diproduksi adalah AMDK (Air Minum Dalam Kemasan) dengan volume sebesar 2000 kardus dan nilai 60 juta . Apa yang harus dilakukan petugas?', 'Konfirmasi ke responden dan mengganti satuan kardus dengan satuan standar (liter/kg), lalu beri catatan 1 kardus berapa liter/kg', 'Mengganti isian banyaknya volume dengan pendekatan rata-rata harga setempat', 'Mengkonversi satuan kardus menjadi liter', 'Mengkonversi satuan menjadi botol dan lihat kewajaran data antara nilai dan volumenya, bila tidak wajar isian volume diganti', 'Konfirmasi ke responden dan mengganti satuan kardus dengan satuan standar (liter/kg), lalu beri catatan konversinya'),
(50, 3, 303, 3, 10, 6, 'Kapasitas Terpasang adalah', 'Target produksi perusahaan', 'Output produksi terhadap target awal perusahaan', 'Rencana produksi tambahan perusahaan', 'Target produksi perusahaan', 'Realisasi produksi pada perusahaan'),
(51, 3, 303, 3, 11, 6, 'Usaha Pakaian "Anjung" membutuhkan bahan baku kain sebanyak 20 ton senilai 100 juta. Dari 20 ton tersebut, sebanyak 19 ton telah terpakai habis untuk proses produksi. Sisa bahan baku tersebut bernilai 10 juta dan rencananya akan disimpan untuk produksi tahun depan. Tetapi sisa bahan baku tersebut laku terjual ke Usaha Sablon "Aries". Mana pernyataan yang tepat dalam Kuesioner II-A Usaha Pakaian "Anjung"?', 'Rincian 29. Pendapatan Lainnya terisi 10 Juta', 'Rincian 25.Bahan Baku dan Penolong terisi Kain dengan nilai 20 juta', 'Rincian 28a. Pendapatan dari jasa industri dalam negeri terisi 10 Juta', 'Rincian 29. Pendapatan Lainnya terisi 10 Juta', 'Rincian 31a. Nilai Stok bahan baku akhir terisi 10 juta'),
(52, 3, 304, 3, 12, 6, 'Berikut alat atau cara pengecekan di dalam kewajaran isian pengeluaran tenaga kerja di dalam isian kuesioner II-A, kecuali', 'Melihat upah perusahaan per tenaga kerja per bulan dengan status permodalan perusahaan.', 'menggunakan alat control dengan upah minimum regional', 'membagi pengeluaran upah dalam satu tahun dibagi dengan jumlah tenaga kerja, kemudian dibagi lagi dengan bulan kegiatan upah, lalu dilihat menghasilkan upah yang wajar atau tidak', 'Melihat kewajaran upah per tenaga kerja per bulan dengan jenis pekerjaan (produksi atau non produksi)', 'Melihat upah perusahaan per tenaga kerja per bulan dengan status permodalan perusahaan.'),
(53, 3, 304, 3, 13, 4, 'Jika di R19 Kuesioner IIA, volume bahan bakar seluruhnya lebih kecil daripada volume bahan bakar untuk pembangkit tenaga listrik. Apa langkah pertama yang harus dilakukan?', 'Konfirmasi ke responden (perusahaan). Kemungkinan isian terbalik', 'Mengganti isian jawaban dengan pendekatan harga setempat', 'Nilai keduanya dibuat sama', 'Konfirmasi ke responden (perusahaan). Kemungkinan isian terbalik', 'Mengganti isian jawaban dengan pendekatan antara bahan bakar dan tenaga listrik yang dibangkitkan'),
(54, 3, 304, 3, 14, 6, 'Apabila isian rincian tenaga listik yang dibangkitkan (R22, Kuesioner IIA) terisi dan isian bahan bakar untuk pembangkit (R19, Kuesioner IIA) tidak terisi, apa langkah pertama yang harus dilakukan?', 'Konfirmasi ke responden (perusahaan). Bila responden tidak dapat menjawab, isikan jawaban dengan pendekatan konversi listrik dan bahan bakar', 'Isikan nilai bahan bakar untuk pembangkit (R19, Kuesioner IIA) dengan pendekatan harga setempat lalu lihat kewajarannya', 'Mengganti isian tenaga listik yang dibangkitkan (R22, Kuesioner IIA) lalu lihat kewajarannya', 'Konfirmasi ke responden (perusahaan). Bila responden tidak dapat menjawab, isikan jawaban dengan pendekatan konversi listrik dan bahan bakar', 'Mengosongkan isian tenaga listik yang dibangkitkan (R22, Kuesioner IIA)'),
(55, 3, 304, 3, 15, 6, 'Apabila perusahaan tidak dapat mengisi rincian tenaga listik yang dibangkitkan (R22, Kuesioner IIA) dan diketahui bahwa perusahaan tersebut menggunakan 1 genset yang berkapasitas listrik rata-rata 10,5kva/380v  (R21, Kuesioner IIA). Genset itu bekerja selama 20 hari/bulan, 8jam/hari. Hitung perkiraan banyaknya tenaga listrik yang dibangkitkan sendiri oleh perusahaan (R22, Kuesioer IIA)', '16128 Kwh', '1344 Kwh', '1680 Kwh', '16128 Kwh', '60800 Kwh'),
(56, 3, 304, 3, 16, 6, 'Manakah pernyataan yang benar terkait kuesioner IIA, kecuali', 'Nilai bahan baku sewajarnya melebihi nilai produksinya', 'Nilai bahan baku sewajarnya melebihi nilai produksinya', 'Rasio nilai tambah berada di antara 0,25-4 terhadap tahun sebelumnya', 'Rincian 19 kolom 4 ? Rincian 19 kolom 5', 'KBLI sesuai dengan produk utama'),
(57, 3, 304, 3, 17, 6, '25 pail cat =...kg', '625 kg', '1000 kg', '750 kg', '625 kg', '500 kg'),
(58, 3, 305, 3, 18, 4, 'Rasio nilai input antar tahun adalah', '4 - 0,25', '0,5 - 5', '4 - 0,25', '7 - 0,25', '0,5 - 2'),
(59, 3, 305, 3, 19, 6, 'Manakah yang termasuk komponen Nilai Tambah, kecuali', 'Nilai stok pada awal dan akhir tahun', 'Pengeluaran untuk pekerja', 'Pendapatan dari jasa industri (makloon)', 'Nilai tenaga listrik yang dibeli', 'Nilai stok pada awal dan akhir tahun'),
(60, 3, 305, 3, 20, 6, 'Manakah pernyataan yang benar', 'Nilai Tambah tidak boleh negatif', 'Jika pada kuesioner IIA Rincian 21 (Generator yang digunakan) terisi, maka kuesioner IIA Rincian 19 (Bahan bakar dan pelumas untuk pembangkit tenaga listrik) harus tidak terisi', 'Kuesioner Updating Perusahaan = Jumlah (IB+IIA+IIB)', 'Untuk perusahaan/usaha yang aktif tetapi non respon, di data dengan menggunakan kuesioner IIA', 'Nilai Tambah tidak boleh negatif');

-- --------------------------------------------------------

--
-- Table structure for table `pretest`
--

CREATE TABLE `pretest` (
  `id` int(11) NOT NULL,
  `id_konsep` int(11) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `id_test` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `weight` varchar(30) DEFAULT NULL,
  `question` varchar(471) NOT NULL,
  `correct` varchar(161) NOT NULL,
  `A` varchar(162) NOT NULL,
  `B` varchar(178) NOT NULL,
  `C` varchar(145) NOT NULL,
  `D` varchar(161) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pretest`
--

INSERT INTO `pretest` (`id`, `id_konsep`, `id_topik`, `id_test`, `id_question`, `weight`, `question`, `correct`, `A`, `B`, `C`, `D`) VALUES
(1, 1, 101, 1, 4, NULL, 'Tujuan dan Manfaat dari Survei Industri Besar dan Sedang (IBS) adalah', 'Menyediakan data dan informasi statistik industri besar dan sedang yang lengkap, akurat, relevan dan tepat waktu untuk bahan evaluasi dan perencanaan pembangunan', 'Memberikan pemahaman dan diagnostik awal atas kondisi aspek organisasi yang dapat mempengaruhi kinerja organisasi jangka panjang seluruh pegawai pada setiap level', 'Untuk mengetahui kepuasan para pelanggan dengan pelayanan jasa dan produk yang diberikan', 'Menyelenggarakan pelayanan dibidang perencanaan, ketatausahaan, kepegawaian, keuangan, kearsipan, kehumasan, hukum, perlengkapan dan rumah tangga', 'Menyediakan data dan informasi statistik industri besar dan sedang yang lengkap, akurat, relevan dan tepat waktu untuk bahan evaluasi dan perencanaan pembangunan'),
(2, 2, 201, 2, 1, NULL, 'Kegiatan yang sangat penting dan utama di dalam Pemutakhiran Direktori untuk melengkapi cakupan Direktori BPS adalah:', 'Menjaring perusahaan baru', 'Melaporkan perusahaan yang pindah kategori menjadi bukan kategori industri manufaktur', 'Melaporkan perusahaan yang berubah skala menjadi kelompok industri mikro atau kecil', 'Melaporkan perusahaan yang pindah, tutup dan non respon', 'Menjaring perusahaan baru'),
(3, 2, 201, 2, 2, NULL, 'Beberapa tujuan dilakukannya kegiatan Updating Direktori dalam pelaksanaan kegiatan Survei Tahunan Industri Manufaktur adalah seperti berikut, kecuali:', 'Meningkatkan response rate', 'Menjaring Perusahaan Baru', 'Meningkatkan response rate', 'Melaporkan Perusahaan yang respon, tutup, berubah skala, berubah sub sektor', 'Salah satu manajemen survei'),
(4, 2, 201, 2, 3, NULL, 'Berikut adalah kegiatan di dalam Updating Direktori Survei Tahunan Industri Manufaktur di dalam tahun survei, kecuali:', 'Melaporkan perusahaan lewat cacah', 'Melaporkan perusahaan tutup, pindah, dobel, bukan industri dan berubah skala dengan daftar II-B', 'Cek lapangan perusahaan aktif', 'Melaporkan perusahaan lewat cacah', 'Melaporkan perusahaan yang non respon'),
(5, 2, 203, 2, 9, NULL, 'Manakah pernyataan yang paling benar', 'Perusahaan yang dilaporkan dengan I-B dan telah di approve Provinsi akan dicacah menggunakan Kuesioner Updating Perusahaan dan II-A', 'Perusahaan yang dilaporkan dengan I-B dan telah di approve Provinsi akan dicacah menggunakan Kuesioner Updating Perusahaan dan II-A', 'Perusahaan yang dilaporkan dengan Kuesioner Updating Perusahaan dan ternyata tutup, di lanjutkan dengan Kusesioner IIA', 'Jumlah Kuesioner Updating Perusahaan harus sama dengan jumlah Kuesioner IIA', 'Jumlah Kuesioner Updating Perusahaan harus sama dengan jumlah Kuesioner IB +  jumlah Kuesioner IIA'),
(6, 2, 204, 2, 11, NULL, 'Kelompok perusahaan yang di laporkan dengan Kuesioner I-B adalah, kecuali :', 'Perusahaan Industri Besar dan Sedang yang pindah ke provinsi lain', 'Perusahaan Industri Besar dan Sedang yang baru berdiri', 'Perusahaan Industri Besar dan Sedang yang baru pindah dari provinsi lain', 'Perusahaan Industri Besar dan Sedang yang pindah ke provinsi lain', 'Perusahaan yang baru berubah tenaga kerjanya menjadi 20 orang atau lebih'),
(7, 2, 205, 2, 17, NULL, 'Di dalam Pemutakhiran Direktori, apabila ada perusahaan yang pindah ke luar Provinsi, maka di dalam isian kuesioner II-B perusahaan yang pindah tersebut akan dinyakatan sebagai:', 'Tutup permanen', 'Pindah', 'Tutup', 'Tutup sementara', 'Tutup permanen'),
(8, 3, 302, 3, 7, NULL, 'Usaha Pakaian "Anjung" mempunyai tenaga kerja sebanyak 25 orang. Produk utamanya adalah kaos oblong. Untuk proses penyablonan pada kaos, Usaha Pakaian "Anjung" bekerjasama dengan Usaha Sablon "Aries". Usaha Sablon "Aries" mempekerjakan pegawai sebanyak 30 orang. Tahun 2017, Usaha Pakaian "Anjung" membayar 50 juta untuk proses penyablonan kaos kepada Usaha Sablon "Aries". Pada Kuesioner II-A untuk Usaha Pakaian "Anjung", nilai 50 juta itu akan masuk ke rincian berapa?', 'Rincian 19c. Jasa Industri yang dibayarkan', 'Rincian 18a. Upah/Gaji', 'Rincian 19c. Jasa Industri yang dibayarkan', 'Rincian 19k. Pengeluaran Lainnya', 'Rincian 28. Pendapatan dari jasa industri (Makloon)'),
(9, 3, 303, 3, 10, NULL, 'Kapasitas Terpasang adalah', 'Target produksi perusahaan', 'Output produksi terhadap target awal perusahaan', 'Rencana produksi tambahan perusahaan', 'Target produksi perusahaan', 'Realisasi produksi pada perusahaan'),
(10, 3, 304, 3, 12, NULL, 'Berikut alat atau cara pengecekan di dalam kewajaran isian pengeluaran tenaga kerja di dalam isian kuesioner II-A, kecuali', 'Melihat upah perusahaan per tenaga kerja per bulan dengan status permodalan perusahaan.', 'menggunakan alat control dengan upah minimum regional', 'membagi pengeluaran upah dalam satu tahun dibagi dengan jumlah tenaga kerja, kemudian dibagi lagi dengan bulan kegiatan upah, lalu dilihat menghasilkan upah yang wajar atau tidak', 'Melihat kewajaran upah per tenaga kerja per bulan dengan jenis pekerjaan (produksi atau non produksi)', 'Melihat upah perusahaan per tenaga kerja per bulan dengan status permodalan perusahaan.'),
(11, 3, 304, 3, 15, NULL, 'Apabila perusahaan tidak dapat mengisi rincian tenaga listik yang dibangkitkan (R22, Kuesioner IIA) dan diketahui bahwa perusahaan tersebut menggunakan 1 genset yang berkapasitas listrik rata-rata 10,5kva/380v  (R21, Kuesioner IIA). Genset itu bekerja selama 20 hari/bulan, 8jam/hari. Hitung perkiraan banyaknya tenaga listrik yang dibangkitkan sendiri oleh perusahaan (R22, Kuesioer IIA)', '16128 Kwh', '1344 Kwh', '1680 Kwh', '16128 Kwh', '60800 Kwh'),
(12, 3, 304, 3, 16, NULL, 'Manakah pernyataan yang benar terkait kuesioner IIA, kecuali', 'Nilai bahan baku sewajarnya melebihi nilai produksinya', 'Nilai bahan baku sewajarnya melebihi nilai produksinya', 'Rasio nilai tambah berada di antara 0,25-4 terhadap tahun sebelumnya', 'Rincian 19 kolom 4 ? Rincian 19 kolom 5', 'KBLI sesuai dengan produk utama'),
(13, 3, 304, 3, 17, NULL, '25 pail cat =...kg', '625 kg', '1000 kg', '750 kg', '625 kg', '500 kg'),
(14, 3, 305, 3, 18, NULL, 'Rasio nilai input antar tahun adalah', '4 - 0,25', '0,5 - 5', '4 - 0,25', '7 - 0,25', '0,5 - 2'),
(15, 3, 305, 3, 19, NULL, 'Manakah yang termasuk komponen Nilai Tambah, kecuali', 'Nilai stok pada awal dan akhir tahun', 'Pengeluaran untuk pekerja', 'Pendapatan dari jasa industri (makloon)', 'Nilai tenaga listrik yang dibeli', 'Nilai stok pada awal dan akhir tahun');

-- --------------------------------------------------------

--
-- Table structure for table `riwayatkonsep`
--

CREATE TABLE `riwayatkonsep` (
  `id` int(11) NOT NULL,
  `ID_siswa` varchar(256) NOT NULL,
  `ID_konsep` varchar(256) NOT NULL,
  `tingkat_penguasaan` int(11) NOT NULL,
  `jumlah_konsep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayattopik`
--

CREATE TABLE `riwayattopik` (
  `id` int(11) NOT NULL,
  `ID_siswa` varchar(256) NOT NULL,
  `ID_topik` varchar(256) NOT NULL,
  `jumlah_topik` int(11) NOT NULL,
  `jawaban_benar` int(11) NOT NULL,
  `jawaban_salah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topiktes`
--

CREATE TABLE `topiktes` (
  `id` int(11) NOT NULL,
  `ID_siswa` varchar(256) NOT NULL,
  `ID_tes` varchar(256) NOT NULL,
  `ID_topik` int(11) NOT NULL,
  `jumlah_pertanyaan` int(11) NOT NULL,
  `jawaban_benar` int(11) NOT NULL,
  `jawaban_salah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nip` varchar(5) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pendidikan` varchar(256) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `email` varchar(256) NOT NULL,
  `pengalaman_survei` varchar(256) NOT NULL,
  `pengalaman_SIBS` varchar(256) NOT NULL,
  `level_kemampuan` varchar(256) NOT NULL,
  `konsep_terakhir` varchar(256) NOT NULL,
  `topik_terakhir` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `nama`, `password`, `tanggal_lahir`, `pendidikan`, `tahun_masuk`, `email`, `pengalaman_survei`, `pengalaman_SIBS`, `level_kemampuan`, `konsep_terakhir`, `topik_terakhir`) VALUES
(1, '13515', 'Royyan', 'admin', '1990-01-01', 'SD', 2011, 'pastibps@gmail.com', 'ya', 'ya', '0', '02', '03'),
(2, '11111', 'admin', 'admin', '1990-01-01', 'SMP', 2018, 'admin@admin.com', 'ya', 'ya', '0', '01', '01');

-- --------------------------------------------------------

--
-- Table structure for table `users_materi`
--

CREATE TABLE `users_materi` (
  `id` int(11) NOT NULL,
  `nip` varchar(256) NOT NULL,
  `0101` tinyint(1) NOT NULL DEFAULT '1',
  `0102` tinyint(1) NOT NULL DEFAULT '0',
  `0103` tinyint(1) NOT NULL DEFAULT '0',
  `0201` tinyint(1) NOT NULL DEFAULT '0',
  `0202` tinyint(1) NOT NULL DEFAULT '0',
  `0203` tinyint(1) NOT NULL DEFAULT '0',
  `0204` tinyint(1) NOT NULL DEFAULT '0',
  `0205` tinyint(1) NOT NULL DEFAULT '0',
  `0206` tinyint(1) NOT NULL DEFAULT '0',
  `0207` tinyint(1) NOT NULL DEFAULT '0',
  `0301` tinyint(1) NOT NULL DEFAULT '0',
  `0302` tinyint(1) NOT NULL DEFAULT '0',
  `0303` tinyint(1) NOT NULL DEFAULT '0',
  `0304` tinyint(1) NOT NULL DEFAULT '0',
  `0305` tinyint(1) NOT NULL DEFAULT '0',
  `0306` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_materi`
--

INSERT INTO `users_materi` (`id`, `nip`, `0101`, `0102`, `0103`, `0201`, `0202`, `0203`, `0204`, `0205`, `0206`, `0207`, `0301`, `0302`, `0303`, `0304`, `0305`, `0306`) VALUES
(1, '11111', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasilpretest`
--
ALTER TABLE `hasilpretest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasiltest`
--
ALTER TABLE `hasiltest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertayaantes`
--
ALTER TABLE `pertayaantes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pretest`
--
ALTER TABLE `pretest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayatkonsep`
--
ALTER TABLE `riwayatkonsep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayattopik`
--
ALTER TABLE `riwayattopik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topiktes`
--
ALTER TABLE `topiktes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_materi`
--
ALTER TABLE `users_materi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasilpretest`
--
ALTER TABLE `hasilpretest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `hasiltest`
--
ALTER TABLE `hasiltest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pertayaantes`
--
ALTER TABLE `pertayaantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `riwayatkonsep`
--
ALTER TABLE `riwayatkonsep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `riwayattopik`
--
ALTER TABLE `riwayattopik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topiktes`
--
ALTER TABLE `topiktes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_materi`
--
ALTER TABLE `users_materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
