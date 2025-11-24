-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2025 at 12:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  `gambar` varchar(255) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `tanggal`, `gambar`, `kategori_id`) VALUES
(3, 'Kain karawo khas Gorontalo', '<p><strong>Karawo</strong> adalah kain tradisional khas <a href=\"https://id.wikipedia.org/wiki/Gorontalo\">Gorontalo</a>. <i>Karawo</i> itu sendiri berasal dari <a href=\"https://id.wikipedia.org/wiki/Bahasa_Gorontalo\">Bahasa Gorontalo</a> yang artinya sulaman dengan tangan Jadi <i>Karawo</i> adalah hasil kerajinan tangan. Orang-orang di luar Gorontalo mengenalnya dengan sebutan <i>Kerawang</i>.</p><p><i>Karawo</i> lahir dari proses panjang yang merupakan buah dari ketekunan para perajin. Seni membuat Kerawang atau Karawo disebut “Makarawo”. Seni ini telah diturunkan dari generasi ke generasi sejak masa Kerajaan Gorontalo masih berjaya. Keindahan motif, keunikan cara pengerjaan, dan kualitas yang bagus membuat Kerawang atau Karawo bernilai sangat tinggi. Maka tak mengherankan jika keunikan dan kualitas tersebut diminati oleh banyak kalangan, baik dari dalam maupun luar negeri.</p><p>Produksi Kain Kerawang atau Karawo sempat mati suri. Tak banyak perajin yang menekuni dunia ini karena kerumitan yang menyita banyak energi, waktu, dan ketekunan. Oleh karena itu, pemerintah melakukan berbagai cara untuk membuat kerajinan ini dapat terus lestari dan semakin populer, baik di dalam maupun luar negeri.</p><p>Salah satu cara yang dilakukan pemerintah adalah mengadakan <a href=\"https://id.wikipedia.org/wiki/Festival_Karawo\">Festival Karawo</a> yang telah digelar untuk pertama kalinya pada 17-18 Desember 2011 silam. Festival yang akan terus digelar setahun sekali ini bertujuan untuk menarik minat masyarakat dalam mengenakan produk Karawo sekaligus menguatkan ekonomi melalui pengembangan budaya daerah.</p>', '2025-11-18', '1558817215_zc77yd7kp66id5b.jpeg', 4),
(5, 'Makanan Khas Gorontalo yang Terkenal', '1. Binte Biluhuta\r\nBinte Biluhuta (Reddoorz.com)\r\nFoto: Binte Biluhuta (Reddoorz.com)\r\nBinte biluhuta, makanan khas Gorontalo, terbuat dari jagung dengan tambahan seafood seperti ikan cakalang atau udang, dimasak dengan bumbu khas.\r\n\r\nRasanya manis, asin, dan pedas, serta kaya gizi.\r\n\r\nMengutip Healthline, jagung mengandung vitamin B, mineral, dan serat tinggi yang baik untuk pencernaan, meski dapat meningkatkan kadar gula darah.\r\n\r\n2. Ayam Iloni\r\nAyam Iloni khas Gorontalo (Sajiansedap.grid.id)\r\nFoto: Ayam Iloni khas Gorontalo (Sajiansedap.grid.id)\r\nMakanan khas Gorontalo yang juga tidak boleh dilewatkan yaitu ayam iloni.\r\n\r\nAyam iloni merupakan ayam bakar khas Gorontalo yang memiliki cita rasa berbeda dari ayam bakar pada umumnya.\r\n\r\nADVERTISEMENT\r\n\r\nbanner-ss1-hijack-cap-kaki-tiga-anak-3\r\nKeunikan ayam bakar iloni terletak pada cara mengolahnya.\r\n\r\nAyam iloni dibumbui khas dan dicampur santan sebelum dipanggang, agar bumbu meresap ke dalam daging.\r\n\r\nSetelah bumbu meresap, barulah ayam dibakar hingga siap untuk disantap.\r\n\r\n3. Tili Aya\r\nTili Aya (Resepyummy.com)\r\nFoto: Tili Aya (Resepyummy.com)\r\nTili aya merupakan makanan khas Gorontalo yang bercita rasa manis dan sering ditemui pada saat bulan Ramadhan.\r\n\r\nUniknya, tili aya merupakan makanan wajib yang disantap saat hari pertama sahur.\r\n\r\nNamun sayangnya, saat ini keberadaan kue tili aya sudah sangat sulit untuk ditemui.\r\n\r\nHal ini karena menjamurnya makanan siap saji yang dianggap lebih praktis dan membantu menahan lapar lebih lama saat berpuasa.\r\n\r\nBaca Juga: 10+ Tempat Wisata Gorontalo, Kunjungi Pulo Cinta, Yuk!\r\n\r\n4. Sashimi Tuna\r\nIkan Tuna (Freepik.com)\r\nFoto: Ikan Tuna (Freepik.com)\r\nMakanan khas Gorontalo ini mungkin mengejutkan banyak orang, karena sashimi lebih dikenal dari Jepang.\r\n\r\nNamun, sashimi khas Gorontalo menggunakan ikan tuna, yang banyak ditemukan di sana, dan memiliki cita rasa berbeda dari sashimi Jepang.\r\n\r\nSelain itu, tuna kaya akan manfaat kesehatan, termasuk protein berkualitas tinggi, omega-3, dan selenium.\r\n\r\nMengutip Selenium in Tuna Protects Against Mercury, tuna bermanfaat untuk jantung dan kesehatan otak anak-anak, dewasa, serta manula.\r\n\r\n5. Sate Tuna\r\nSate Tuna (Factsofindonesia.com)\r\nFoto: Sate Tuna (Factsofindonesia.com)\r\nSelain sashimi tuna, makanan khas Gorontalo yang terkenal dan berbahan dasar tuna adalah sate tuna.\r\n\r\nIndonesia memang terkenal akan kuliner satenya. Namun, sate tuna sangat jarang terdengar.\r\n\r\nDi Gorontalo, sate tuna cukup banyak dijumpai karena tuna merupakan hasil laut terbesar di Gorontalo.\r\n\r\nKeunikan sate tuna terletak pada dagingnya yang sangat lembut.\r\n\r\n6. Bilenthango\r\nMenikmati Bilenthango (Factsofindonesia.com)\r\nFoto: Menikmati Bilenthango (Factsofindonesia.com)\r\nBilenthango adalah makanan khas Gorontalo yang terbuat dari ikan kerapu, dikenal sebagai salah satu makanan sehat untuk jantung.\r\n\r\nProses memasaknya unik, menggunakan daun pisang sebagai alas saat menggoreng untuk mencegah ikan gosong.\r\n\r\nPenelitian menunjukkan bahwa rutin mengonsumsi ikan dapat menurunkan risiko penyakit jantung hingga 15%.\r\n\r\n7. Ilabulo\r\nIlabulo (Pospena.com)\r\nFoto: Ilabulo (Pospena.com)\r\nMeskipun nama ilabulo sangat jarang terdengar, namun di Gorontalo ilabulo merupakan makanan yang wajib dicoba ketika mengunjungi kota ini.\r\n\r\nIlabulo merupakan makanan khas Gorontalo yang berbahan ati ayam, ampela, dan lemak ayam yang nantinya dibumbui dan dibungkus dengan daun pisang kemudian dibakar atau dikukus.\r\n\r\nHidangan ini sekilas memang mirip dengan pepes.\r\n\r\nBaca Juga: Yuk, Kenali Rumah Adat Gorontalo dan Segala Keunikannya!\r\n\r\n8. Sayur Putungo\r\nSayur Putungo (Cookpad.com/Sri Suharyaningsih)\r\nFoto: Sayur Putungo (Cookpad.com/Sri Suharyaningsih)\r\nSayur putungo, hidangan khas Gorontalo berbahan dasar jantung pisang, dikenal dengan rasa pedasnya.\r\n\r\nJantung pisang memiliki banyak manfaat kesehatan, seperti memperkuat uterus dan mengurangi nyeri haid.\r\n\r\nSelain itu, makanan pedas, seperti yang mengandung capsaicin, dapat membantu menurunkan berat badan dengan mengurangi nafsu makan dan meningkatkan energi.\r\n\r\n9. Perkedel Nike\r\nPerkedel Nike (Sindonews.com)\r\nFoto: Perkedel Nike (Sindonews.com)\r\nKalau mendengar kata perkedel, pasti yang terbayang di benak Moms dan Dads adalah kuliner yang berbahan baku kentang yang kemudian dihaluskan.\r\n\r\nBerbeda dengan perkedel kebanyakan, perkedel khas Gorontalo ini merupakan perkedel yang terbuat dari ikan nike yaitu ikan yang berukuran kecil mirip seperti ikan teri.\r\n\r\nKuliner khas Gorontalo memang banyak yang menggunakan ikan sebagai bahan utamanya.\r\n\r\nHal ini karena ikan menjadi salah satu komoditi terbesar di Gorontalo.\r\n\r\nSelain enak, ikan memang mengandung banyak nutrisi penting seperti protein, yodium, dan berbagai vitamin dan mineral yang baik untuk tubuh.', '2025-11-18', '1022895593_makanan-khas-Gorontalo-2-Gorontalo-Family-Portal.jpg', 4),
(6, 'Ini 15 Tempat Wisata di Gorontalo dengan Panorama Alam Mempesona', '<p>Lokasi wisata di Indonesia memiliki daya tarik alam yang sangat indah. Tidak heran jika banyak lokasi wisata yang sangat populer dikunjungi oleh wisatawan domestik maupun mancanegara. Banyaknya kepulauan di Indonesia membuat banyak pantai indah yang menarik untuk dikunjungi. Namun, tempat wisata di Pulau Sulawesi biasanya tidak sepopuler lokasi wisata di Pulau Jawa. Tempat wisata di Gorontalo merupakan area wisata yang indah dan terletak di Provinsi Sulawesi Utara. Berikut ini berbagai lokasi wisata alam hingga spot kekinian di Gorontalo yang bisa sahabat kunjungi.</p><p>&nbsp;</p><h3><strong>1. Taman Laut Olele</strong></h3><p>Bagi yang menyukai snorkeling, coral endemik di Taman Laut Olele akan menjadi salah satu daya tarik yang indah. Sahabat bisa berenang di air yang jernih sambil melihat terumbu karang di pasir putih yang bersih dan cantik. Lokasi: Poduoma, Suwawa Timur, Olele, Bone Bolango, Kabupaten Bone Bolango, Gorontalo Waktu operasional: 24 jam Harga tiket masuk: tidak ada (gratis)</p><h3><strong>2. Benteng Otanaha</strong></h3><p>Saat berwisata ke Gorontalo, sahabat harus mengunjungi Benteng Otanaha agar dapat melihat seluruh panorama indah di sana. Untuk naik ke atas benteng ini, sahabat setidaknya harus menaiki 350 anak tangga untuk melihat panorama Teluk Tomini dan Danau Limboto. Tenang, rasa lelah pasti akan terbayar saat sahabat melihat panorama 360 derajat di atas benteng. Bakalan worth it banget, deh. Lokasi: Jl. Usman Isa Kel. Dembe I, Kota Bar., Kota Gorontalo, Gorontalo Waktu operasional: 08.00 – 18.00 Harga tiket masuk: Rp5.000</p><h3><strong>3. Pantai Bolihutuo, Botubarani</strong></h3><p>Jika berkunjung ke Gorontalo, sahabat bukan hanya bisa berkunjung ke pantai berpasir putih, loh. Salah satu daya tarik wisata yang menarik terletak di kawasan perairan Pantai Botubarani karena sahabat bisa berkenalan dengan hiu dan paus dari jarak dekat. Lokasi: Botubarani, Kabila Bone, Kabupaten Bone Bolango, Gorontalo Waktu operasional: 06.00 – 17.00 Harga tiket masuk: Rp5.000</p><h3><strong>4. Air Terjun Lombongo</strong></h3><p>Lombongo mungkin juga terkenal dengan kolam pemandian air panasnya. Meski begitu, ada ait terjun yang indah dan bisa dijelajahi di tengah kaki gunung Tilong Kabila. Sahabat juga bisa ditemani oleh pemandu wisata lokal, tapi pastikan untuk negosiasi harga sesuai budget dulu sebelum memulai penjelajahan, ya. Lokasi: Jalan Natsir Mooduto Desa Tapadaa, Suwawa Tengah, Kabupaten Bone Bolango Waktu operasional: 24 jam Harga tiket masuk: Rp5.000 (dewasa), Rp2.500 (anak-anak)</p><h3><strong>5. Taman Nasional Bogani Nani Wartabone</strong></h3><p>Kawasan vegetasi hutan tropis ini ditetapkan sebagai taman nasional pada 1991. Luas Taman Nasional Bogani Nani Wartabone mencapai 287.115 hektare. Taman nasional ini dikelilingi lembah dan lereng bukit yang terjal dengan berbagai keunikan ekologi sebagai kawasan peralihan daerah Indomalayan dan Papua-Australia (Wallace Area). Lokasi: JL. AKD. Mongkonai Barat, Kotamobagu, Sulawesi Utara Waktu operasional: 08.00 – 18.00 Harga tiket masuk wisatawan domestik: Rp5.000 (weekday), Rp7.500 (weekend dan libur) Harga tiket masuk wisatawan mancanegara: Rp150.000 (weekday), Rp175.000 (weekend dan libur)</p><h3><strong>6. Monumen Tugu Langga</strong></h3><p>Langga merupakan salah satu seni bela diri yang berasal dari Gorontalo. Monumen ini dibuat dalam miniatur dan “Langga” memiliki makna tanpa senjata. Lokasi: Jl. Aloe Saboe, Padebuolo, Kota Tim., Kota Gorontalo, Gorontalo Waktu operasional: 24 jam Harga tiket masuk: gratis</p><h3><strong>7. Hutan Hungayono</strong></h3><p>Destinasi wisata alam ini sangat populer sebagai lokasi hewan endemik Sulawesi yaitu burung maleo. Sahabat bisa melihat langsung kehidupan burung maleo mulai dari kebiasaannya hingga paket wisata pengembangbiakkan telurnya ke hatcery. Lokasi: Tulabolo, Suwawa Tim., Kabupaten Bone Bolango, Gorontalo Waktu operasional: disarankan setelah pukul 10.00 Harga tiket masuk: Rp150.000</p><h3><strong>8. Pulau Saronde</strong></h3><p>Daya tarik panorama alam cantik dengan kebudayaan yang masih asli bisa sahabat temukan di Saronde. Waktu terbaik berkunjung ke Pulau Saronde adalah bulan Juli saat Festival Saronde diselenggarakan. Sahabat bisa lebih berbaur dengan kebudayaan lokal, termasuk kulinernya. Lokasi: Teluk Kwandang Utara Waktu operasional: 24 jam Harga tiket masuk: Rp5.000 – Rp10.000</p><h3><strong>9. Pantai Minanga</strong></h3><p>Masih dengan daya tarik pantai pasir putihnya, Pantai Minanga lebih cantik dikunjungi di malam hari. Cahaya matahari tenggelam akan membuat hamparan pasir putih dan jernihnya air laut terlihat mempesona. Lokasi: Desa Kotajin Utara, Kecamatan Atinggola, Kabupaten Gorontalo Utara Waktu operasional: 24 jam Harga tiket masuk: Rp2.000 + Rp3.000 (parkir motor), Rp5.000 (parkir mobil)</p><h3><strong>10. Monumen B. J. Habibie</strong></h3><p>Patung yang didedikasikan kepada Bacharuddin Jusuf Habibie ini didedikasikan sebagai penghormatan kepada Presiden ke-3 berdarah Gorontalo. Sosok BJ Habibie dibuat sedang memegang pesawat terbang yang mengarah ke jalur lepas landas Bandara Djalaludin. Lokasi: Jl. Trans Sulawesi, Tolotio, Tibawa, Kota Gorontalo, Gorontalo 96251 Waktu operasional: 24 jam Harga tiket masuk: tidak ada</p><h3><strong>11. Menara Keagungan Limboto</strong></h3><p>Menara yang terbuat dari konstruksi baja ini dikenal juga sebagai replika Menara Eiffel. Pada 2019, objek wisata yang dikenal juga sebagai Pakaya Tower Limboto ini dipercantik sebagai hasil kerja sama pemerintah Kabupaten Gorontalo dengan PT Panasonic Gobel Indonesia. Lokasi: Jl. Baso Bobihoe No.308, Kayubulan, Limboto, Kota Gorontalo, Gorontalo Waktu operasional: 24 jam Harga tiket masuk: Rp10.000 (dewasa), Rp5.000 (anak-anak)</p><h3><strong>12. Pantai dan Taman Lahilote</strong></h3><p>Daya tarik unik dari panorama laut di lokasi ini adalah garis pantainya yang mirip teluk. Salah satu ciri khas dari pantai ini adalah batu yang bentuknya mirip telapak kaki dan disebut dengan Botu Liyodu Lei Lahilote. Lokasi: l. Drs. Achmad Nadjamuddin No.35, Limba U Dua, Kota Sel., Kota Gorontalo Waktu operasional: 24 jam Harga tiket masuk: tidak ada</p><h3><strong>13. Pantai Ratu Boalemo</strong></h3><p>Tidak sedikit wisatawan yang menghabiskan waktu untuk bermalam di Pantai Ratu. Selain wisata alamnya yang indah, pantai ini juga memiliki keanekaragaman hayati yang sangat kaya. Pantai ini juga aman karena air lautnya cukup tenang untuk berenang. Lokasi: Desa Tenilo, Kecamatan Tilamuta, Kabupaten Boalemo Waktu operasional: 24 jam Harga tiket masuk: gratis</p><h3><strong>14. Pantai Pohon Cinta</strong></h3><p>Meskipun masih objek wisata pantai lagi, sepertinya wisata ke Gorontalo belum lengkap jika belum ke sini. Ya, di pantai cantik ini juga merupakan lokasi yang cocok untuk sekalian mencoba kuliner khas Gorontalo. Makan sambil melihat pemandangan tentu akan sangat menyenangkan, bukan? Lokasi: Pohuwato Tim., Marisa, Kabupaten Pohuwato, Gorontalo Waktu operasional: 24 jam Harga tiket masuk: Rp100.000 (tiket kapal)</p><h3><strong>15. Pulau Lahe</strong></h3><p>Nah, wisata eksotis ini sering direkomendasikan untuk para penyelam dan dikenal sebagai surga bawah laut. Pesona terumbu karang dan biota lautnya merupakan potensi wisata yang luar biasa bagi pada pengunjung domestik maupun mancanegara. Lokasi: Kecamatan Marisa, Kabupaten Pohuwato, Provinsi Gorontalo Waktu operasional: 24 jam Harga tiket masuk: Rp20.000 (biaya perahu) Itulah berbagai rekomendasi lokasi wisata yang bisa sahabat kunjungi di Gorontalo. Jangan lupa untuk selalu melakukan persiapan berkendara dan juga mengutamakan keselamatan dan kesehatan, ya. Selamat berwisata di Gorontalo!</p>', '2025-11-18', '743770240_Gorontalo-Pulau-Cinta-7-768x432.jpg', 4),
(8, '5 Jurusan Program Vokasi Universitas Negeri Gorontalo', '<p>Berbicara menegnai Program Vokasi Universitas Negeri Gorontalo ada 5 jurusan yaitu:</p><h2><strong>1. Teknologi Rekayasa Perangkat Lunak</strong></h2><p>Adalah jurusan yang fokus pada bidang it.</p><p>&nbsp;</p>', '2025-11-18', '954645883_download (27).jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Teknologi'),
(2, 'Olahraga'),
(3, 'Pendidikan'),
(4, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `berita_id` int(11) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `berita_id`, `nama_pengirim`, `isi_komentar`, `tanggal`) VALUES
(1, 3, 'bagus', 'mantapuuuu!', '2025-11-18 15:20:04'),
(2, 6, 'irma', 'wowww', '2025-11-18 15:30:47'),
(3, 3, 'Sofyan', 'sangat menginspirasi', '2025-11-18 17:11:32'),
(5, 5, 'nurul', 'binte seenak ituuu nyam nyam', '2025-11-18 17:43:52'),
(7, 6, 'peby', 'kt pe rumah di pohuwatoo', '2025-11-18 17:45:30'),
(8, 6, 'duta', 'pengen kesana cuyyyy', '2025-11-18 17:45:55'),
(9, 6, 'azrul', 'okeee', '2025-11-20 13:58:53'),
(10, 3, 'BAGUS ARIF SETIAWAN', 'okeee', '2025-11-20 14:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_id` (`berita_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`berita_id`) REFERENCES `berita` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
