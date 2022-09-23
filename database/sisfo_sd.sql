-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Apr 2022 pada 15.09
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo_sd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `idguru` int(10) NOT NULL,
  `nip` char(25) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `tlp_guru` varchar(15) NOT NULL,
  `jabatan` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`idguru`, `nip`, `nama_guru`, `tlp_guru`, `jabatan`) VALUES
(1, '19700424 200003 2 005', 'KOFIFAH, S.Pd.SD', '085842739813', 'Wali Kelas 6'),
(3, '19881006 201902 2 003', 'RIFTA NOOR LATIFAH, S.Pd', '085726750000', 'Wali Kelas 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai1`
--

CREATE TABLE `nilai1` (
  `idnilai1` int(10) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `idtahun` int(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `n_bindo` int(10) NOT NULL,
  `p_bindo` varchar(20) NOT NULL,
  `n_agama` int(10) NOT NULL,
  `p_agama` varchar(20) NOT NULL,
  `n_pkn` int(10) NOT NULL,
  `p_pkn` varchar(20) NOT NULL,
  `n_mtk` int(10) NOT NULL,
  `p_mtk` varchar(20) NOT NULL,
  `n_pjok` int(10) NOT NULL,
  `p_pjok` varchar(20) NOT NULL,
  `n_sbdp` int(10) NOT NULL,
  `p_sbdp` varchar(20) NOT NULL,
  `n_bjawa` int(10) NOT NULL,
  `p_bjawa` varchar(20) NOT NULL,
  `jml_nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai1`
--

INSERT INTO `nilai1` (`idnilai1`, `nis`, `nip`, `idtahun`, `semester`, `n_bindo`, `p_bindo`, `n_agama`, `p_agama`, `n_pkn`, `p_pkn`, `n_mtk`, `p_mtk`, `n_pjok`, `p_pjok`, `n_sbdp`, `p_sbdp`, `n_bjawa`, `p_bjawa`, `jml_nilai`) VALUES
(43, '3099', '19881006 201902 2 003', 2, 'Ganjil', 90, 'B', 80, 'C', 95, 'A', 75, 'C', 85, 'B', 97, 'A', 90, 'B', 612),
(45, '3100', '19881006 201902 2 003', 2, 'Genap', 90, 'B', 87, 'B', 80, 'C', 95, 'A', 78, 'C', 90, 'B', 98, 'A', 618),
(47, '3102', '19881006 201902 2 003', 2, 'Genap', 90, 'B', 90, 'B', 90, 'B', 90, 'B', 90, 'B', 90, 'B', 89, 'B', 629);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai2`
--

CREATE TABLE `nilai2` (
  `idnilai2` int(10) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `idtahun` int(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `n_bindo` int(10) NOT NULL,
  `p_bindo` varchar(20) NOT NULL,
  `n_agama` int(10) NOT NULL,
  `p_agama` varchar(20) NOT NULL,
  `n_pkn` int(10) NOT NULL,
  `p_pkn` varchar(20) NOT NULL,
  `n_mtk` int(10) NOT NULL,
  `p_mtk` varchar(20) NOT NULL,
  `n_ipa` int(10) NOT NULL,
  `p_ipa` varchar(20) NOT NULL,
  `n_ips` int(10) NOT NULL,
  `p_ips` varchar(20) NOT NULL,
  `n_pjok` int(10) NOT NULL,
  `p_pjok` varchar(20) NOT NULL,
  `n_sbdp` int(10) NOT NULL,
  `p_sbdp` varchar(20) NOT NULL,
  `n_bjawa` int(10) NOT NULL,
  `p_bjawa` int(20) NOT NULL,
  `jml_nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `kelas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nisn`, `nama_siswa`, `kelas`) VALUES
('2966', '0097915649', 'AJENG PRAMUDYA', 6),
('2967', '0085405592', 'AKHDAN TAUFIQULHAKIM', 6),
('2968', '0083392522', 'ANDRI RAHMADANI', 6),
('3032', '0099468634', 'ADRIANO AMIRZAKY ARASH', 6),
('3099', '3116075697', 'ACHMAD RADITYA FINO QIMATA', 2),
('3100', '3131348112', 'ALFAN RANDIKA HANIF', 2),
('3101', '0125537635', 'ALVARO GILBY KUSHENDRATMO', 2),
('3102', '0133691559', 'ARFI RULIAN MUHLASIN', 2),
('3103', '0123221019', 'ARKARN GIBRANATHA', 2),
('3127', '0097217038', 'ALETHEIA ZELAFESYA', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `thn_ajar`
--

CREATE TABLE `thn_ajar` (
  `idtahun` int(10) NOT NULL,
  `thn_ajar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `thn_ajar`
--

INSERT INTO `thn_ajar` (`idtahun`, `thn_ajar`) VALUES
(2, '2021/2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'gurukls2', '1234', 'Wali Kelas 2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `idguru` (`idguru`);

--
-- Indeks untuk tabel `nilai1`
--
ALTER TABLE `nilai1`
  ADD PRIMARY KEY (`idnilai1`),
  ADD KEY `nis` (`nis`,`nip`,`idtahun`),
  ADD KEY `idtahun` (`idtahun`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `nilai2`
--
ALTER TABLE `nilai2`
  ADD PRIMARY KEY (`idnilai2`),
  ADD KEY `nis` (`nis`),
  ADD KEY `nip` (`nip`,`idtahun`),
  ADD KEY `idtahun` (`idtahun`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `thn_ajar`
--
ALTER TABLE `thn_ajar`
  ADD PRIMARY KEY (`idtahun`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `idguru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `nilai1`
--
ALTER TABLE `nilai1`
  MODIFY `idnilai1` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `nilai2`
--
ALTER TABLE `nilai2`
  MODIFY `idnilai2` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `thn_ajar`
--
ALTER TABLE `thn_ajar`
  MODIFY `idtahun` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai1`
--
ALTER TABLE `nilai1`
  ADD CONSTRAINT `nilai1_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `nilai1_ibfk_2` FOREIGN KEY (`idtahun`) REFERENCES `thn_ajar` (`idtahun`),
  ADD CONSTRAINT `nilai1_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`);

--
-- Ketidakleluasaan untuk tabel `nilai2`
--
ALTER TABLE `nilai2`
  ADD CONSTRAINT `nilai2_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `nilai2_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `nilai2_ibfk_3` FOREIGN KEY (`idtahun`) REFERENCES `thn_ajar` (`idtahun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
