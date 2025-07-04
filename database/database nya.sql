-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table barang.asset_mutations: ~5 rows (approximately)
REPLACE INTO `asset_mutations` (`id`, `barang_id`, `old_location_id`, `new_location_id`, `mutation_date`, `mutation_type_id`, `kondisi_id`, `bagian_id`, `notes`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, '2025-07-04', 5, 1, 2, 'tesss', 2, '2025-07-04 06:53:39', NULL),
	(2, 1, 3, 1, '2025-07-04', 1, 1, 2, 'tes', 1, '2025-07-04 02:36:49', '2025-07-04 02:36:49'),
	(3, 2, 3, 1, '2025-07-04', 1, 1, 2, 'xczxc', 1, '2025-07-04 02:52:53', '2025-07-04 02:52:53'),
	(4, 2, 3, 1, '2025-07-04', 1, 1, 2, '123456789', 2, '2025-07-04 02:53:45', '2025-07-04 02:53:45'),
	(5, 1, 3, 1, '2025-07-04', 1, 1, 2, '135', 2, '2025-07-04 03:09:35', '2025-07-04 03:09:35');

-- Dumping data for table barang.bagians: ~2 rows (approximately)
REPLACE INTO `bagians` (`id`, `nama_bagian`, `keteranganBagian`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '11', '22', '2025-07-01 19:18:41', '2025-07-01 19:24:23', '2025-07-01 19:24:23'),
	(2, 'admin', 'administrator', '2025-07-01 19:24:32', '2025-07-02 02:45:25', NULL);

-- Dumping data for table barang.barangs: ~2 rows (approximately)
REPLACE INTO `barangs` (`id`, `kategori_id`, `kodeBaranglama`, `kodeBarang`, `namaBarang`, `merek`, `model`, `nomorSeri`, `tanggalPerolehan`, `hargaPerolehan`, `vendor`, `catatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, '123123', 'AIO-20250702-00001', 'PC ALL IN ONE LENOVO A340', 'LENOVO', 'A340', '1239-456321-789', '2025-07-02', '8150000', 'TOKOPEDIA', 'TAMBAH BARU', '2025-07-01 20:02:29', '2025-07-02 19:22:04', NULL),
	(2, 1, '99999', 'AIO-20250703-00001', 'HP 23.8 inch All-in-One 24-cr0200d PC, White', 'HP', '24-cr0200d', 'YY20-123-98585', '2025-07-03', '8000000', 'TOKOPEDIA', 'beli baru', '2025-07-02 20:21:23', '2025-07-02 20:21:23', NULL);

-- Dumping data for table barang.cache: ~0 rows (approximately)

-- Dumping data for table barang.cache_locks: ~0 rows (approximately)

-- Dumping data for table barang.dua_pilihan: ~2 rows (approximately)
REPLACE INTO `dua_pilihan` (`id`, `namaPilihan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'AKTIF', '2025-07-02 02:58:09', NULL, NULL),
	(2, 'NON AKTIF', '2025-07-02 02:58:19', NULL, NULL);

-- Dumping data for table barang.failed_jobs: ~0 rows (approximately)

-- Dumping data for table barang.harddisks: ~3 rows (approximately)
REPLACE INTO `harddisks` (`id`, `barang_id`, `tipeHardDisk_id`, `kapasitas`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 2, '1', 'SSD 1 TB 5400 RPM', '2025-07-01 20:13:21', '2025-07-01 20:13:21', NULL),
	(2, 1, 2, '2', 'hardisk ke dua', '2025-07-02 19:14:39', '2025-07-02 19:14:39', NULL),
	(3, 2, 2, '500', '500gb', '2025-07-02 20:21:43', '2025-07-02 20:21:43', NULL);

-- Dumping data for table barang.jobs: ~0 rows (approximately)

-- Dumping data for table barang.job_batches: ~0 rows (approximately)

-- Dumping data for table barang.kategoris: ~2 rows (approximately)
REPLACE INTO `kategoris` (`id`, `kodeKategori`, `namaKategori`, `duaPilihan_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'AIO', 'PC ALL IN ONE', 1, '2025-07-01 19:58:41', '2025-07-01 19:59:02', NULL),
	(2, 'PCR', 'PC RAKITAN', 1, '2025-07-01 19:59:26', '2025-07-01 19:59:26', NULL),
	(3, 'PRNT', 'PRINTER', 1, '2025-07-01 19:59:46', '2025-07-01 19:59:46', NULL);

-- Dumping data for table barang.kondisis: ~11 rows (approximately)
REPLACE INTO `kondisis` (`id`, `namaKondisi`, `keteranganKondisi`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Baik', 'Aset dalam kondisi baik dan berfungsi normal sesuai', '2025-07-02 02:37:29', '2025-07-02 02:37:29', NULL),
	(2, 'Rusak Ringan', 'Aset mengalami kerusakan kecil yang tidak', '2025-07-02 02:37:59', '2025-07-02 02:37:59', NULL),
	(3, 'Rusak Berat', 'Aset mengalami kerusakan parah dan tidak dapat', '2025-07-02 02:38:15', '2025-07-02 02:38:15', NULL),
	(4, 'Hilang', 'Aset tidak dapat ditemukan atau tidak diketahui', '2025-07-02 02:38:34', '2025-07-02 02:38:34', NULL),
	(5, 'Usang', 'Aset sudah tidak sesuai lagi dengan kebutuhan atau perkembangan teknologi. Meskipun masih berfungsi, nilai ekonominya mungkin sudah menurun.', '2025-07-02 02:39:14', '2025-07-02 02:39:14', NULL),
	(6, 'Dalam Perbaikan', 'Aset sedang dalam proses perbaikan dan belum dapat digunakan.', '2025-07-02 02:39:30', '2025-07-02 02:39:30', NULL),
	(7, 'Belum Siap', 'Aset belum siap digunakan karena berbagai alasan, misalnya belum dipasang, belum dikalibrasi, atau belum dioperasikan.', '2025-07-02 02:39:47', '2025-07-02 02:39:47', NULL),
	(8, 'Tersedia', 'Aset siap untuk digunakan, tetapi belum dimanfaatkan.', '2025-07-02 02:40:11', '2025-07-02 02:40:11', NULL),
	(9, 'Digunakan', 'Aset sedang digunakan dalam kegiatan operasional.', '2025-07-02 02:40:30', '2025-07-02 02:40:30', NULL),
	(10, 'Disewakan', 'Aset disewakan kepada pihak lain.', '2025-07-02 02:40:46', '2025-07-02 02:40:46', NULL),
	(11, 'Dipinjamkan', 'Aset dipinjamkan kepada pihak lain.', '2025-07-02 02:41:02', '2025-07-02 02:41:02', NULL),
	(12, 'Dihapuskan', 'Aset secara resmi dihapuskan dari catatan aset.', '2025-07-02 02:41:17', '2025-07-02 02:41:17', NULL);

-- Dumping data for table barang.kotas: ~5 rows (approximately)
REPLACE INTO `kotas` (`id`, `profinsi_id`, `namaKota`, `keteranganKota`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'JAKARTA UTARA', 'JAKUT', '2025-07-02 00:00:36', '2025-07-02 00:00:36', NULL),
	(2, 1, 'JAKARTA SELATAN', 'JAKSEL', '2025-07-02 00:00:50', '2025-07-02 00:00:50', NULL),
	(3, 1, 'JAKARTA BARAT', 'JAKBAR', '2025-07-02 00:01:02', '2025-07-02 00:01:02', NULL),
	(4, 1, 'JAKARTA PUSAT', 'JAKPUS', '2025-07-02 00:01:22', '2025-07-02 00:01:31', NULL),
	(5, 1, 'JAKARTA TIMUR', 'JAKTIM', '2025-07-02 00:01:46', '2025-07-02 00:01:46', NULL);

-- Dumping data for table barang.lokasis: ~3 rows (approximately)
REPLACE INTO `lokasis` (`id`, `kota_id`, `namaLokasi`, `lantai`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, 'GEDUNG BATAVIA', '10', 'KARET JAKARATA PUSAT', '2025-07-02 00:06:26', '2025-07-02 00:14:10', NULL),
	(2, 4, 'GEDUNG BATAVIA', '11', 'JAKARATA PUSAT KARET', '2025-07-02 00:14:00', '2025-07-02 00:21:34', NULL),
	(3, 4, 'BELUM ADA', '0', 'BELUM ADA LOKASI', '2025-07-04 09:31:01', NULL, NULL);

-- Dumping data for table barang.migrations: ~31 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_05_26_062949_create_dua_pilihan_table', 1),
	(5, '2025_05_26_063040_create_tiga_pilihan_table', 1),
	(6, '2025_05_27_024619_create_kategoris_table', 1),
	(7, '2025_05_27_033334_create_barangs_table', 1),
	(8, '2025_05_28_032226_add_kode_barang_lama_to_barangs_table', 1),
	(9, '2025_06_02_041749_create_sosmeds_table', 1),
	(10, '2025_06_02_051651_create_sosmed_details_table', 1),
	(11, '2025_06_03_030012_create_sosmed_detail_logins_table', 1),
	(12, '2025_06_04_024650_create_tipe_hard_disks_table', 1),
	(13, '2025_06_04_095109_create_harddisks_table', 1),
	(14, '2025_06_05_062511_create_tipe_rams_table', 1),
	(15, '2025_06_05_062618_create_rams_table', 1),
	(16, '2025_06_05_081455_create_tipe_procesors_table', 1),
	(17, '2025_06_05_081555_create_prosesors_table', 1),
	(18, '2025_06_09_080633_add_keterangan_to_harddisks_table', 1),
	(19, '2025_06_15_045714_create_pelanggans_table', 1),
	(20, '2025_06_15_094438_create_status_tagihans_table', 1),
	(21, '2025_06_16_034632_create_vendors_table', 1),
	(22, '2025_06_16_034741_create_tagihans_table', 1),
	(23, '2025_06_17_025352_create_tagihan_details_table', 1),
	(24, '2025_06_20_070406_add_email_to_tagihans_table', 1),
	(25, '2025_06_20_071156_add_email_to_vendors_table', 1),
	(26, '2025_06_30_064532_create_bagians_table', 1),
	(32, '2025_06_30_064752_create_negaras_table', 2),
	(33, '2025_06_30_064803_create_profinsis_table', 2),
	(34, '2025_06_30_064845_create_kotas_table', 2),
	(35, '2025_07_02_041056_create_lokasis_table', 2),
	(36, '2025_07_02_041126_create_tipe_mutasis_table', 2),
	(41, '2025_07_02_041145_create_kondisis_table', 3),
	(42, '2025_07_02_045121_create_asset_mutations_table', 3);

-- Dumping data for table barang.negaras: ~1 rows (approximately)
REPLACE INTO `negaras` (`id`, `namaNegara`, `keteranganNegara`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'indonesia', 'indo', '2025-07-01 23:59:44', '2025-07-02 00:20:08', NULL);

-- Dumping data for table barang.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table barang.pelanggans: ~2 rows (approximately)
REPLACE INTO `pelanggans` (`id`, `namaPelanggan`, `picPelanggan`, `tLpPelanggan`, `alamatPelanggan`, `emailPelanggan`, `keteranganPelanggan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'PT. ABC', 'Joko', '021-32546465', 'JL. gajah mada jakarta barat', 'joko@gmial.com', 'perusahaan 1', '2025-07-01 19:29:22', '2025-07-01 19:29:22', NULL),
	(2, 'PT. XYZ', 'Maman', '021-2312', 'jl. Hayam Wuruk no. 12 Jakarta', 'maman@gmaol.com', 'perusahaan 2', '2025-07-01 19:30:22', '2025-07-01 19:30:22', NULL);

-- Dumping data for table barang.profinsis: ~0 rows (approximately)
REPLACE INTO `profinsis` (`id`, `negara_id`, `namaProfinsi`, `keteranganProfinsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'DKI JAKRATA', 'JAKRATA', '2025-07-02 00:00:12', '2025-07-02 00:00:12', NULL);

-- Dumping data for table barang.prosesors: ~0 rows (approximately)
REPLACE INTO `prosesors` (`id`, `barang_id`, `tipeProsesor_id`, `kapasitas`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, 'INTEL CORE i5-9400T PROCESSOR', NULL, '2025-07-01 20:15:52', '2025-07-01 20:15:52', NULL),
	(2, 2, 1, 'Core™ i3 processor', NULL, '2025-07-02 20:23:14', '2025-07-02 20:23:14', NULL);

-- Dumping data for table barang.rams: ~3 rows (approximately)
REPLACE INTO `rams` (`id`, `barang_id`, `tipeRam_id`, `kapasitas`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 4, '8', '8 GB', '2025-07-01 20:11:59', '2025-07-01 20:11:59', NULL),
	(2, 1, 4, '8', 'tambah ram baru', '2025-07-02 19:24:17', '2025-07-02 19:24:17', NULL),
	(3, 2, 4, '8', '8 gb', '2025-07-02 20:22:36', '2025-07-02 20:22:36', NULL),
	(4, 1, 4, '8', 'tambah lagi', '2025-07-03 04:14:42', '2025-07-03 04:14:42', NULL);

-- Dumping data for table barang.sessions: ~4 rows (approximately)
REPLACE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('CCTNHKpTpKt5gIssah3nxalLwYoZCqIRDuVGH9y8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWDN0dDFYSExhaWtGOFFLNWM0cXdFbEFRWFoySWFzbkpMSjdDZUhDViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9iYXJhbmcudGVzdC9hc3NldC1tdXRhc2kvY3JlYXRlIjt9fQ==', 1751626907);

-- Dumping data for table barang.sosmeds: ~0 rows (approximately)

-- Dumping data for table barang.sosmed_details: ~0 rows (approximately)

-- Dumping data for table barang.sosmed_detail_logins: ~0 rows (approximately)

-- Dumping data for table barang.status_tagihans: ~0 rows (approximately)

-- Dumping data for table barang.tagihans: ~0 rows (approximately)

-- Dumping data for table barang.tagihan_details: ~0 rows (approximately)

-- Dumping data for table barang.tiga_pilihan: ~0 rows (approximately)

-- Dumping data for table barang.tipe_hard_disks: ~4 rows (approximately)
REPLACE INTO `tipe_hard_disks` (`id`, `namaTipeHardDisk`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'HD SATA', 'HD SATA', '2025-07-02 03:07:10', NULL, NULL),
	(2, 'SSD SATA', 'SSD SATA', NULL, NULL, NULL),
	(3, 'NVME', 'NVME', '2025-07-02 03:07:32', NULL, NULL),
	(4, 'USB', 'USB', '2025-07-02 03:07:48', NULL, NULL);

-- Dumping data for table barang.tipe_mutasis: ~17 rows (approximately)
REPLACE INTO `tipe_mutasis` (`id`, `namaMutasi`, `keteranganMutasi`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Mutasi antar ruangan', 'Perpindahan aset dari satu ruangan ke ruangan lain dalam satu gedung.', '2025-07-02 03:19:02', '2025-07-02 03:19:02', NULL),
	(2, 'Mutasi antar gedung', 'Perpindahan aset dari satu gedung ke gedung lain, baik dalam satu area maupun antar area.', '2025-07-02 03:19:18', '2025-07-02 03:19:18', NULL),
	(3, 'Mutasi antar unit kerja', 'Perpindahan aset antar unit kerja atau departemen dalam suatu organisasi.', '2025-07-02 03:19:31', '2025-07-02 03:19:31', NULL),
	(4, 'Mutasi antar wilayah', 'Perpindahan aset antar wilayah atau lokasi yang berbeda.', '2025-07-02 03:19:41', '2025-07-02 03:19:41', NULL),
	(5, 'Mutasi antar pemakai', 'Perpindahan aset dari satu pengguna ke pengguna lain, misalnya dari karyawan satu ke karyawan lain.', '2025-07-02 03:19:50', '2025-07-02 03:19:50', NULL),
	(6, 'Mutasi ke unit lain', 'Perpindahan aset dari satu unit kerja ke unit kerja lain dalam organisasi.', '2025-07-02 03:20:00', '2025-07-02 03:20:00', NULL),
	(7, 'Mutasi ke gudang', 'Perpindahan aset ke gudang, baik karena rusak, tidak terpakai, atau untuk penyimpanan sementara.', '2025-07-02 03:20:10', '2025-07-02 03:20:10', NULL),
	(8, 'Mutasi aset tetap', 'Perpindahan aset tetap seperti peralatan, mesin, bangunan, dan tanah.', '2025-07-02 03:20:19', '2025-07-02 03:20:19', NULL),
	(9, 'Mutasi aset bergerak', 'Perpindahan aset yang dapat dipindahkan, seperti kendaraan, peralatan, atau inventaris.', '2025-07-02 03:20:28', '2025-07-02 03:20:28', NULL),
	(10, 'Mutasi aset tak bergerak', 'Perpindahan aset yang tidak dapat dipindahkan, seperti tanah dan bangunan.', '2025-07-02 03:21:10', '2025-07-02 03:21:10', NULL),
	(11, 'Mutasi aset lancar', 'Perpindahan aset yang bersifat sementara atau memiliki masa manfaat kurang dari satu tahun, seperti kas, piutang, dan persediaan.', '2025-07-02 03:21:18', '2025-07-02 03:21:18', NULL),
	(12, 'Mutasi karena perbaikan', 'Aset dipindahkan untuk diperbaiki dan kemudian dikembalikan ke lokasi awal.', '2025-07-02 03:21:28', '2025-07-02 03:21:28', NULL),
	(13, 'Mutasi karena pemeliharaan', 'Aset dipindahkan untuk pemeliharaan berkala.', '2025-07-02 03:21:37', '2025-07-02 03:21:37', NULL),
	(14, 'Mutasi karena penghapusan', 'Aset dipindahkan karena sudah tidak layak pakai dan akan dihapus dari pembukuan.', '2025-07-02 03:21:46', '2025-07-02 03:21:46', NULL),
	(15, 'Mutasi karena penghapusan', 'Aset dipindahkan karena sudah tidak layak pakai dan akan dihapus dari pembukuan.', '2025-07-02 03:21:46', '2025-07-02 03:21:46', NULL),
	(16, 'Mutasi karena pemindahan lokasi', 'Aset dipindahkan karena perubahan lokasi kerja atau kebutuhan operasional.', '2025-07-02 03:21:53', '2025-07-02 03:21:53', NULL),
	(17, 'Mutasi karena hibah/pinjaman', 'Aset dipindahkan karena diberikan sebagai hibah atau dipinjamkan kepada pihak lain.', '2025-07-02 03:22:02', '2025-07-02 03:22:02', NULL);

-- Dumping data for table barang.tipe_procesors: ~2 rows (approximately)
REPLACE INTO `tipe_procesors` (`id`, `namaTipeProsesor`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'INTEL', 'INTEL', '2025-07-02 03:14:17', NULL, NULL),
	(2, 'AMD', 'AMD', '2025-07-02 03:14:26', NULL, NULL);

-- Dumping data for table barang.tipe_rams: ~3 rows (approximately)
REPLACE INTO `tipe_rams` (`id`, `tipeRam`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'DDR 1', 'DDR 1', '2025-07-02 03:06:12', NULL, NULL),
	(2, 'DDR 2', 'DDR 2', '2025-07-02 03:06:34', NULL, NULL),
	(3, 'DDR 3', 'DDR 3', '2025-07-02 03:06:48', NULL, NULL),
	(4, 'DDR 4', 'DDR 4', '2025-07-02 03:09:20', NULL, NULL);

-- Dumping data for table barang.users: ~2 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'wawan', 'wawan@gmail.com', '2025-07-02 04:35:46', '0', NULL, NULL, NULL),
	(2, 'andi', 'andi@gmail.com', '2025-07-02 04:36:16', '1', NULL, NULL, NULL);

-- Dumping data for table barang.vendors: ~2 rows (approximately)
REPLACE INTO `vendors` (`id`, `namaVendor`, `alamatVendor`, `tlpVendor`, `emailVendor`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Artatel', 'jl. makaliwe jakarta barat', '12345-2354822', 'artatel@gmail.com', 'vendor1', '2025-07-01 19:39:15', '2025-07-01 19:51:24', NULL),
	(2, 'Spektra', 'jl. mangga besar raya no.1 jakarta barat', '021-87978546', 'spektra@gmail.com', 'tes', '2025-07-01 19:49:18', '2025-07-01 19:52:55', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
