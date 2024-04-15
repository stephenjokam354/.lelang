-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 17 Bulan Mei 2021 pada 15.50
-- Versi server: 5.7.24
-- Versi PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lelang`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusPetugas` (IN `id_ptg` INT(11))  BEGIN
DELETE FROM tb_petugas WHERE id_petugas=id_ptg;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_lelang`
--

CREATE TABLE `history_lelang` (
  `id_history` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penawaran_harga` int(11) NOT NULL,
  `status_penawar` enum('peserta','kalah','menang','lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `history_lelang`
--
DELIMITER $$
CREATE TRIGGER `Jaminan` AFTER INSERT ON `history_lelang` FOR EACH ROW BEGIN
	DECLARE jm INT;
    SET jm = (SELECT jaminan FROM tb_lelang WHERE id_barang=NEW.id_barang);
    UPDATE tb_virtual SET saldo=saldo-jm WHERE id_user = NEW.id_user;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `virtual` AFTER UPDATE ON `history_lelang` FOR EACH ROW BEGIN
DECLARE j INT;
IF(NEW.status_penawar="kalah")
THEN
    SET j = (SELECT jaminan FROM tb_lelang WHERE id_barang = NEW.id_barang);
	UPDATE tb_virtual SET saldo = saldo+j WHERE id_user = NEW.id_user;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `tgl` date NOT NULL,
  `harga_awal` int(11) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ktp`
--

CREATE TABLE `tb_ktp` (
  `id_ktp` int(11) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `status_ktp` enum('1','2','3') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `tb_ktp`
--
DELIMITER $$
CREATE TRIGGER `status_Masyarakat` AFTER UPDATE ON `tb_ktp` FOR EACH ROW BEGIN 
 DECLARE k INT;
 DECLARE n INT;
SET k = (SELECT status_ktp FROM tb_ktp WHERE id_user=NEW.id_user);

SET n = (SELECT status_npwp FROM tb_npwp WHERE id_user=NEW.id_user);

if (k=3 AND n=3)
THEN
UPDATE tb_masyarakat SET status=2 WHERE id_user=NEW.id_user;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lelang`
--

CREATE TABLE `tb_lelang` (
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_lelang` date NOT NULL,
  `harga_akhir` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `status` enum('dibuka','ditutup') NOT NULL,
  `jaminan` int(11) NOT NULL,
  `tgl_jaminan` date NOT NULL,
  `time_awal` time NOT NULL,
  `time_akhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` enum('administrator','petugas','masyarakat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'administrator'),
(2, 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `tb_masyarakat`
--
DELIMITER $$
CREATE TRIGGER `virtual_account` AFTER INSERT ON `tb_masyarakat` FOR EACH ROW INSERT INTO tb_virtual (va,saldo,id_user) values (NEW.telp,0,NEW.id_user)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_npwp`
--

CREATE TABLE `tb_npwp` (
  `id_npwp` int(11) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `status_npwp` enum('1','2','3') NOT NULL DEFAULT '1',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `tb_npwp`
--
DELIMITER $$
CREATE TRIGGER `status_MasyarakatN` AFTER UPDATE ON `tb_npwp` FOR EACH ROW BEGIN 
 DECLARE k INT;
 DECLARE n INT;
SET k = (SELECT status_ktp FROM tb_ktp WHERE id_user=NEW.id_user);

SET n = (SELECT status_npwp FROM tb_npwp WHERE id_user=NEW.id_user);

if (k=3 AND n=3)
THEN
UPDATE tb_masyarakat SET status=2 WHERE id_user=NEW.id_user;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `id_level`) VALUES
(22, 'Stephen', 'admin', 'admin', 1),
(23, 'Roy', 'petugas1', 'petugas1', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_virtual`
--

CREATE TABLE `tb_virtual` (
  `id_virtual` int(11) NOT NULL,
  `va` varchar(100) NOT NULL,
  `saldo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD PRIMARY KEY (`id_history`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_ktp`
--
ALTER TABLE `tb_ktp`
  ADD PRIMARY KEY (`id_ktp`);

--
-- Indeks untuk tabel `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD PRIMARY KEY (`id_lelang`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_npwp`
--
ALTER TABLE `tb_npwp`
  ADD PRIMARY KEY (`id_npwp`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tb_virtual`
--
ALTER TABLE `tb_virtual`
  ADD PRIMARY KEY (`id_virtual`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tb_ktp`
--
ALTER TABLE `tb_ktp`
  MODIFY `id_ktp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_lelang`
--
ALTER TABLE `tb_lelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_npwp`
--
ALTER TABLE `tb_npwp`
  MODIFY `id_npwp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_virtual`
--
ALTER TABLE `tb_virtual`
  MODIFY `id_virtual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
