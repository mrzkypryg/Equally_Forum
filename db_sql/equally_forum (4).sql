-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2023 pada 21.52
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `equally_forum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `equally_topics`
--

CREATE TABLE `equally_topics` (
  `id` int(11) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(225) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_post` datetime DEFAULT current_timestamp(),
  `count` int(11) NOT NULL,
  `active` varchar(5) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `equally_topics`
--

INSERT INTO `equally_topics` (`id`, `title`, `description`, `url`, `user_id`, `date_post`, `count`, `active`) VALUES
(35, 'Literasi Digital Kesetaraan Gender', 'Bagaimana mengembangkan literasi digital yang kuat dan kritis dapat membantu individu, terutama perempuan, melindungi diri mereka sendiri dan menghadapi pelecehan online dengan lebih percaya diri?', 'topic-1', 59, '2023-05-26 02:53:54', 26, 'YES'),
(36, 'Hentikan Pembenaran Kekerasan', '\"Hentikan Pembenaran Kekerasan\": Kita harus bersama-sama menghentikan pembenaran terhadap kekerasan terhadap perempuan dan membangun masyarakat yang bebas dari segala bentuk kekerasan berbasis gender.', 'topic-2', 59, '2023-05-26 02:53:54', 29, 'YES'),
(37, 'Mengatasi Kesenjangan Upah: Langkah-langkah Menuju Kesetaraan Gender dalam Dunia Kerja', 'Kesenjangan upah antara pria dan wanita masih menjadi isu yang perlu diatasi dalam dunia kerja saat ini. Dalam beberapa industri, perempuan masih mendapatkan upah yang lebih rendah dibandingkan dengan rekan pria mereka yang memiliki kualifikasi dan pengalaman yang sama. Menurut kalian gimana sih caranya mengatasi kesenjangan tersebut?', 'topic-3', 59, '2023-05-26 02:53:54', 20, 'YES'),
(38, 'Mencegah Kekerasan terhadap Perempuan: Merangkul Perubahan dan Membangun Kesadaran', 'Mencegah kekerasan terhadap perempuan adalah tugas bersama yang memerlukan perubahan sosial dan kesadaran yang lebih luas. Hal ini melibatkan pengenalan dan penghapusan norma yang mendukung kekerasan serta pendidikan yang lebih baik tentang hak-hak perempuan dan pentingnya menghormati kehidupan dan integritas mereka. Menurut kalian gimana sih caranya mencegah kekerasan terhadap perempuan yang kini marak terjadi di Indonesia?', 'topic-4', 59, '2023-05-26 02:53:54', 13, 'YES'),
(39, 'Kartini dan Kesetaraan Gender, No One Left Behind', 'Kartini sangat erat kaitannya dengan isu gender di masa kini. Konsep gender menurut KMK 807 Tahun 2018 merupakan peran dan status yang melekat pada laki-laki atau perempuan berdasarkan konstruksi sosial budaya yang dipengaruhi oleh struktur masyarakat yang lebih luas dan dapat berubah sesuai perkembangan zaman, bukan berdasarkan perbedaan biologis. Keadilan dan kesetaraan gender di Indonesia dipelopori oleh RA Kartini sejak tahun 1908. Perjuangan persamaan hak antara laki-laki dan perempuan khususnya dalam bidang pendidikan dimulai oleh RA Kartini sebagai wujud perlawanan atas ketidak adilan terhadap kaum perempuan pada masa itu.', 'topic-5', 59, '2023-05-26 02:53:54', 19, 'YES'),
(40, 'Rekomendasi Brand Fashion yang Mendukung Kesetaraan Gender', 'Rekomendasi Brand Fashion lokal yang mendukung kesetaraan gender di Indonesia tercinta ini dong masbro dan mbaksis :D. Saya lagi berusaha menyokong brand lokal yang mendukung kesetaraan gender nih hehehe...', 'topic-6', 59, '2023-05-26 02:53:54', 36, 'YES'),
(41, 'Berani Sama-sama: Kampanye Kesetaraan Gender untuk Membangun Masyarakat yang Adil dan Inklusif', '\"Mari Hentikan Pembenaran Kekerasan\": Kita harus bersama-sama menghentikan pembenaran terhadap kekerasan terhadap perempuan dan membangun masyarakat yang bebas dari segala bentuk kekerasan berbasis gender.', 'topic-7', 59, '2023-05-26 02:53:54', 33, 'YES'),
(42, 'Cerita Nyata Mewujudkan Kesetaraan Gender', 'Saya ingin berbagi cerita nyata tentang perjalanan saya dalam mewujudkan kesetaraan gender. Sebagai seorang pria, saya menyadari bahwa keadilan dan kesetaraan tidak hanya menjadi tanggung jawab perempuan, tetapi juga merupakan tanggung jawab saya sebagai individu yang peduli dengan keadilan sosial.\n\nSaya memulai perubahan ini dengan merenungkan priviledge yang saya miliki sebagai pria dan menyadari bahwa ada banyak hambatan dan diskriminasi yang dihadapi oleh perempuan di masyarakat. Saya bertekad untuk menjadi sekutu yang aktif dan mendukung perempuan dalam perjuangan mereka untuk mendapatkan hak-hak yang setara.\n\nSaya mulai dengan mendengarkan perempuan di sekitar saya dan belajar dari pengalaman mereka. Saya menyadari bahwa penting untuk tidak hanya mendengarkan, tetapi juga untuk memperhatikan dan bertindak. Saya mendukung aspirasi dan impian perempuan di lingkungan kerja dan berusaha menciptakan lingkungan yang inklusif, di mana mereka dapat berkembang dan mencapai kesuksesan yang sama dengan pria.\n\nSaya juga terlibat dalam kegiatan sosial yang berkaitan dengan kesetaraan gender. Saya berpartisipasi dalam kampanye dan acara yang mempromosikan kesadaran akan kekerasan terhadap perempuan dan pentingnya mengubah pola pikir yang merugikan. Saya merangkul peran sebagai pria yang membantu memperjuangkan keadilan sosial.\n\nDi dalam keluarga, saya mempraktikkan keseimbangan tugas dan tanggung jawab dengan pasangan saya. Saya terlibat secara aktif dalam tugas rumah tangga dan perawatan anak, menunjukkan bahwa peran dalam keluarga tidak terikat pada jenis kelamin.\n\nMelalui langkah-langkah kecil ini, saya berharap dapat menjadi bagian dari gerakan yang lebih besar untuk mewujudkan kesetaraan gender. Saya berkomitmen untuk terus belajar, tumbuh, dan berkontribusi dalam menciptakan dunia yang adil dan inklusif bagi semua individu, tanpa memandang jenis kelamin.', 'topic-8', 59, '2023-05-26 02:53:54', 44, 'YES'),
(43, 'Representasi Media & Budaya: Mengatasi Stereotip Gender dalam Industri Fashion di Indonesia', 'Penting bagi industri fashion untuk secara aktif menciptakan kesadaran akan pentingnya representasi gender yang akurat dan positif. Ini dapat dilakukan melalui kampanye pemasaran yang mempromosikan keberagaman, penempatan model yang mewakili berbagai identitas gender, dan kolaborasi dengan desainer yang memperhatikan inklusivitas.\r\n\r\nPendidikan dan pelatihan dalam industri fashion dapat memainkan peran penting dalam mengubah paradigma dan menekankan pentingnya menghormati identitas gender yang beragam. Institusi pendidikan dapat mengintegrasikan materi yang mempromosikan kesetaraan gender dalam kurikulum mereka, serta memberikan kesempatan bagi mahasiswa untuk berkolaborasi dan belajar dari desainer dan profesional yang berdedikasi untuk inklusivitas di Indonesia.\r\n\r\nSecara keseluruhan, dengan mengatasi stereotip gender dalam industri fashion, kita dapat menciptakan lingkungan yang lebih inklusif dan menginspirasi individu untuk merayakan identitas mereka tanpa takut akan diskriminasi. Industri fashion memiliki kekuatan untuk menjadi agen perubahan dalam memperjuangkan kesetaraan gender dan merangkul keberagaman yang sejati.', 'topic-9', 59, '2023-05-26 02:53:54', 324, 'YES'),
(44, 'TES POSTING YGY', '<p>TESTTSTSTSTSTSTSTSTAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</p><p>AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</p>', 'tes-posting-ygy', 85, '2023-05-28 18:13:33', 3, 'NO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `equally_users`
--

CREATE TABLE `equally_users` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `email_address` varchar(125) DEFAULT NULL,
  `nickname` varchar(125) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `active` varchar(5) DEFAULT 'YES',
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `equally_users`
--

INSERT INTO `equally_users` (`id`, `name`, `email_address`, `nickname`, `password`, `active`, `role`) VALUES
(59, 'equally', 'equally@dicoding.org', 'equally', '5e2fe5d765545e770b01a5a2a45b01ce9e26d8c91c2fb38353fbbd7ddeb126a24f437408ec0201ae8e9d0dcc8b8eba9904661471b63f763a992eaf06754b24ecx0CJduD7WG7ntnKjVoHGtfVJSUPB4xDV+/RDwMafSuA=', 'YES', 'user'),
(85, 'Dico Indo', 'dicoding@dicoding.org', 'Dicoding', 'd550c28822610bc04013d2380b0fe3c17782bc819372767969bf47713644bbc6d1d679eda6a1db1f6330461b68430d0e03da8efeed2f31443cbf7fcc57a94f2cnVx1fpU8SmVjJ6Fl685f/Cz0Z3Px5KTCtggyhdbsP44=', 'YES', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `equally_topics`
--
ALTER TABLE `equally_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ref` (`user_id`);

--
-- Indeks untuk tabel `equally_users`
--
ALTER TABLE `equally_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `equally_topics`
--
ALTER TABLE `equally_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `equally_users`
--
ALTER TABLE `equally_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `equally_topics`
--
ALTER TABLE `equally_topics`
  ADD CONSTRAINT `equally_topics_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `equally_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
