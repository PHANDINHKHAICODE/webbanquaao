-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: datashop_db
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog` (
  `ma_blog` int NOT NULL AUTO_INCREMENT,
  `image_blog` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `noidung1` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `noidung2` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`ma_blog`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (1,'client/images/blog001.png','Mùa hè sôi động cùng coolmate','Mặc quần áo không chỉ là việc chọn lựa trang phục mỗi ngày, mà còn là cách thể hiện bản thân và tạo ra một ấn tượng đầu tiên mạnh mẽ. Mỗi món đồ trên người tôi không chỉ là một mảnh vải, mà là một cách để tôi tự tin, phản ánh cá tính và phong cách cá nhân của mình.'),(2,'client/images/blog003.png','Đồ thể thao , quần áo thoáng mát năng động hơn','Áo sơ mi cao cấp: Một chiếc áo sơ mi được làm từ vải chất lượng cao và có kiểu dáng sang trọng sẽ là một món quà lý tưởng.'),(3,'client/images/blog-06.jpg','Xu hướng thời trang mùa hè 2024 cho phái đẹp','Áo bò: áo bò không chỉ toát lên vẻ sang trọng mà còn mang đến cho người mặc một sự trẻ trung đầy cá tính');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chi_tiet_don_hang`
--

DROP TABLE IF EXISTS `chi_tiet_don_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chi_tiet_don_hang` (
  `ma_chi_tiet_don_hang` int NOT NULL AUTO_INCREMENT,
  `ma_don_hang` int DEFAULT NULL,
  `ma_san_pham` int DEFAULT NULL,
  `so_luong` int DEFAULT NULL,
  `gia` float DEFAULT NULL,
  `ten_san_pham` varchar(255) DEFAULT NULL,
  `kich_co` varchar(50) DEFAULT NULL,
  `mau_sac` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ma_chi_tiet_don_hang`),
  KEY `ma_don_hang` (`ma_don_hang`),
  KEY `ma_san_pham` (`ma_san_pham`),
  CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`ma_don_hang`) REFERENCES `don_hang` (`ma_don_hang`),
  CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`ma_san_pham`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chi_tiet_don_hang`
--

LOCK TABLES `chi_tiet_don_hang` WRITE;
/*!40000 ALTER TABLE `chi_tiet_don_hang` DISABLE KEYS */;
INSERT INTO `chi_tiet_don_hang` VALUES (29,28,2,1,350000,'Áo thun thể thao Jacquard Active','XL','Xanh'),(31,33,1,1,200000,'Áo Thun Nam Chạy Bộ Graphic Heartbeat','XL','Xanh'),(32,34,1,2,200000,'Áo Thun Nam Chạy Bộ Graphic Heartbeat','M','Xanh'),(33,35,1,1,200000,'Áo Thun Nam Chạy Bộ Graphic Heartbeat','M','Xanh'),(34,36,2,1,350000,'Áo thun thể thao Jacquard Active','M','Xám'),(35,37,1,2,200000,'Áo Thun Nam Chạy Bộ Graphic Heartbeat','M','Xanh');
/*!40000 ALTER TABLE `chi_tiet_don_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danh_muc_san_pham`
--

DROP TABLE IF EXISTS `danh_muc_san_pham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `danh_muc_san_pham` (
  `ma_danh_muc` int NOT NULL AUTO_INCREMENT,
  `ten_danh_muc` varchar(255) NOT NULL,
  PRIMARY KEY (`ma_danh_muc`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danh_muc_san_pham`
--

LOCK TABLES `danh_muc_san_pham` WRITE;
/*!40000 ALTER TABLE `danh_muc_san_pham` DISABLE KEYS */;
INSERT INTO `danh_muc_san_pham` VALUES (1,'Áo thun'),(2,'Áo sơ mi'),(3,'Quần jeans'),(4,'Quần kaki'),(5,'Áo khoác'),(6,'Mũ lenn'),(8,'Đồ thể thao');
/*!40000 ALTER TABLE `danh_muc_san_pham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `don_hang`
--

DROP TABLE IF EXISTS `don_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `don_hang` (
  `ma_don_hang` int NOT NULL AUTO_INCREMENT,
  `ma_khach_hang` int DEFAULT NULL,
  `ngay_dat_hang` date DEFAULT NULL,
  `tong_tien` float DEFAULT NULL,
  `trang_thai` varchar(50) DEFAULT NULL,
  `ten_khach` varchar(255) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `ghi_chu` varchar(255) DEFAULT NULL,
  `sdt` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ma_don_hang`),
  KEY `ma_khach_hang` (`ma_khach_hang`),
  CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`ma_khach_hang`) REFERENCES `khach_hang` (`ma_khach_hang`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `don_hang`
--

LOCK TABLES `don_hang` WRITE;
/*!40000 ALTER TABLE `don_hang` DISABLE KEYS */;
INSERT INTO `don_hang` VALUES (28,1,'2024-05-23',350000,'1','Đinh Việt Hùng','Hưng Yên','Giao hàng nhanh giúp em','0909929292'),(33,1,'2024-05-23',200000,'1','Hà Thị Ánh','Hưng Yên','Shop ơi đóng hàng sớm giúp em ạ','0122121212'),(34,3,'2024-05-24',400000,'2','Hoàng Văn Hán','Hưng Yên','Ad giao hàng sớm giùm em ạ , nhớ kiểm tra chất lượng',NULL),(35,3,'2024-05-24',200000,'2','Hà Thị Ánh','Hưng Yên','Giao hàng nhanh giúp em',NULL),(36,3,'2024-05-24',350000,'2','Hoàng Văn Hán','Hưng Yên','Sản phẩm okki',NULL),(37,1,'2024-05-24',400000,'2','Đinh Việt Hùng','Hưng Yên','Giao hàng nhanh giúp em',NULL);
/*!40000 ALTER TABLE `don_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khach_hang`
--

DROP TABLE IF EXISTS `khach_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khach_hang` (
  `ma_khach_hang` int NOT NULL AUTO_INCREMENT,
  `ten_khach_hang` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ma_khach_hang`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khach_hang`
--

LOCK TABLES `khach_hang` WRITE;
/*!40000 ALTER TABLE `khach_hang` DISABLE KEYS */;
INSERT INTO `khach_hang` VALUES (1,'Nguyễn Văn Ánh','nguyenvana@example.com','123 Đường ABC, Quận XYZ, TP HCM','0901234567'),(2,'Trần Thị Ánh','tranthib@example.com','456 Đường XYZ, Quận ABC, TP HCM','0909876543'),(3,'Lê Hoàng Cương','lehoangc@example.com','789 Đường XYZ, Quận XYZ, TP HCM','0902468135'),(4,'Phạm Thị Dung','phamthid@example.com','321 Đường ABC, Quận XYZ, TP HCM','0903692581'),(5,'Võ Văn Thành','vovane@example.com','987 Đường ABC, Quận ABC, TP HCM','0907539512'),(6,'Hà Văn Cường','chithanh@gmail.com','912 Đường Hải long , Quận 1','0092929292'),(7,'Nguyễn Đức Thọ','Thotran@gmail.com',NULL,'0292992929');
/*!40000 ALTER TABLE `khach_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kho_hang`
--

DROP TABLE IF EXISTS `kho_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kho_hang` (
  `ma_san_pham` int NOT NULL AUTO_INCREMENT,
  `ten_san_pham` varchar(255) NOT NULL,
  `ngay_san_xuat` date DEFAULT NULL,
  `so_luong` int DEFAULT NULL,
  `mau_sac` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`ma_san_pham`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kho_hang`
--

LOCK TABLES `kho_hang` WRITE;
/*!40000 ALTER TABLE `kho_hang` DISABLE KEYS */;
INSERT INTO `kho_hang` VALUES (1,'Áo khoác gió','2023-04-05',100,'Xanh');
/*!40000 ALTER TABLE `kho_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loai_tai_khoan`
--

DROP TABLE IF EXISTS `loai_tai_khoan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loai_tai_khoan` (
  `ma_loai_tai_khoan` int NOT NULL AUTO_INCREMENT,
  `ten_loai_tai_khoan` varchar(255) NOT NULL,
  PRIMARY KEY (`ma_loai_tai_khoan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loai_tai_khoan`
--

LOCK TABLES `loai_tai_khoan` WRITE;
/*!40000 ALTER TABLE `loai_tai_khoan` DISABLE KEYS */;
INSERT INTO `loai_tai_khoan` VALUES (1,'Admin'),(2,'NhanVien'),(3,'KhachHang');
/*!40000 ALTER TABLE `loai_tai_khoan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhan_vien`
--

DROP TABLE IF EXISTS `nhan_vien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhan_vien` (
  `ma_nhan_vien` int NOT NULL AUTO_INCREMENT,
  `ten_nhan_vien` varchar(255) NOT NULL,
  `gioi_tinh` enum('Nam','Nữ','Khác') DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `cmnd` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `anh_nhanvien` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`ma_nhan_vien`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhan_vien`
--

LOCK TABLES `nhan_vien` WRITE;
/*!40000 ALTER TABLE `nhan_vien` DISABLE KEYS */;
INSERT INTO `nhan_vien` VALUES (1,'Nguyễn Văn Anh','Nam','1990-05-15','Hà Nội','0123456789','012345678912','client/images/Screenshot 2024-05-21 165002.png'),(2,'Trần Thị Bình','Nữ','1985-12-20','Hồ Chí Minh','0987654321','012345678912','client/images/blog-02.jpg'),(3,'Lê Văn Cương','Nam','1988-08-10','Đà Nẵng','0369874123','012345678912','client/images/gallery-09.jpg'),(4,'Phạm Thị Trà Giang','Nữ','1995-03-25','Nha Trang','0932145786','012345678912','client/images/gallery-07.jpg'),(5,'Hoàng Văn Minh','Nam','1982-07-03','Hải Phòng','0845263791','012345678912','client/images/gallery-03.jpg');
/*!40000 ALTER TABLE `nhan_vien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `san_pham`
--

DROP TABLE IF EXISTS `san_pham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `san_pham` (
  `ma_san_pham` int NOT NULL AUTO_INCREMENT,
  `ten_san_pham` varchar(255) NOT NULL,
  `gia` float DEFAULT NULL,
  `size` varchar(3) DEFAULT NULL,
  `mau_sac` varchar(10) DEFAULT NULL,
  `mo_ta` text,
  `ma_danh_muc` int DEFAULT NULL,
  `anh_sanpham` varchar(350) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `soluong` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `anhhover1` varchar(255) DEFAULT NULL,
  `anhhover2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ma_san_pham`),
  KEY `ma_danh_muc` (`ma_danh_muc`),
  CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`ma_danh_muc`) REFERENCES `danh_muc_san_pham` (`ma_danh_muc`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `san_pham`
--

LOCK TABLES `san_pham` WRITE;
/*!40000 ALTER TABLE `san_pham` DISABLE KEYS */;
INSERT INTO `san_pham` VALUES (1,'Áo Thun Nam Chạy Bộ Graphic Heartbeat',200000,'XL','Đỏ','Áo thun là một trong những mảnh đồ chủ chốt của bộ sưu tập thời trang đương đại, mang lại sự thoải mái và phong cách cho mọi dịp. Với sự đa dạng về kiểu dáng, chất liệu và màu sắc, áo thun không chỉ là một lựa chọn đơn giản mà còn là biểu tượng của sự tự tin và phong cách cá nhân.  Một chiếc áo thun cổ tròn có thể làm từ vải cotton mềm mại, tạo cảm giác thoáng đãng và êm ái cho người mặc.',8,'client/images/Screenshot 2024-05-21 161054.png','90','client/images/anhhover1.png','client/images/anhhover2.png'),(2,'Áo thun thể thao Jacquard Active',350000,'XL','Xanh','Đây là một phiên bản hiện đại của áo sơ mi truyền thống với cổ áo tròn thay vì cổ áo bình thường. Loại áo này thường có kiểu dáng suông, thoải mái và dễ dàng kết hợp với nhiều trang phục khác nhau, từ quần jean đến chân váy.',8,'client/images/Screenshot 2024-05-21 161418.png','99','client/images/Screenshot 2024-05-21 161418.png','client/images/Screenshot 2024-05-21 161418.png'),(3,'Áo Thun Nam Chạy Bộ Graphic Special',450000,'L','Xanh','Họa tiết kẻ xọc trên áo thường làm từ các đường kẻ song song chạy dọc theo áo. Có nhiều loại kẻ xọc khác nhau, từ kẻ dày đậm và nổi bật đến kẻ mảnh và tinh tế. Màu sắc của các đường kẻ cũng đa dạng, từ các gam màu cơ bản như đen, xanh, xám đến các màu sắc sáng hơn như đỏ, vàng hoặc xanh dương.',8,'client/images/Screenshot 2024-05-21 162228.png','89','client/images/Screenshot 2024-05-21 162228.png','client/images/Screenshot 2024-05-21 162228.png'),(4,'Áo Thun Nam Chạy Bộ Graphic Photic Zone',300000,'XL','Nâu','Áo dạ nữ có sẵn trong nhiều màu sắc và họa tiết khác nhau, từ các màu sắc cơ bản như đen, xám, và nâu đến các màu sắc sặc sỡ như đỏ, xanh lam, và hồng. Họa tiết cũng đa dạng, từ các hoa văn truyền thống đến các hoa văn độc đáo và hiện đại',4,'client/images/Screenshot 2024-05-21 162309.png','45','client/images/Screenshot 2024-05-21 162309.png','client/images/Screenshot 2024-05-21 162309.png'),(5,'Áo Thun Nam Chạy Bộ Graphic Jungle',600000,'XL','Đen','Áo bò có nhiều kiểu dáng khác nhau để phù hợp với nhiều dáng người và phong cách. Có thể là áo bò cổ bẻ, áo bò cổ trụ, áo bò cổ vest, áo bò dài tay hoặc áo bò cộc tay. Mỗi kiểu dáng mang lại một phong cách riêng biệt, từ năng động đến lịch lãm.',8,'client/images/Screenshot 2024-05-21 164249.png','33','client/images/Screenshot 2024-05-21 164249.png','client/images/Screenshot 2024-05-21 164249.png'),(29,'Áo Polo Thể Thao Pro Active 1595',250000,'M','Nâu','Biểu tượng của quý ông với tính năng hiển thị cả ngày và ngày tháng, thường được làm từ vàng 18k hoặc platina. Đồng hồ chuyên dụng cho đua xe với tính năng chronograph và thiết kế thể thao độc đáo.',8,'client/images/Screenshot 2024-05-21 162525.png','445','client/images/Screenshot 2024-05-21 162525.png','client/images/Screenshot 2024-05-21 162525.png'),(30,'Áo Khoác Coolmate 2024',999999,'XL','Xám','Áo dạ bomber có kiểu dáng ngắn, thường có cổ áo đứng và góc cắt ở phần cổ tay và gấu áo. Đây là một phong cách thể thao và cá nhân hóa, phù hợp với cả nam và nữ.',5,'client/images/Screenshot 2024-05-21 162553.png','55','client/images/Screenshot 2024-05-21 162553.png','client/images/Screenshot 2024-05-21 162553.png'),(31,'Áo Sơ Mi Dài Tay Premium Dobby',399999,'XL','Xanh','Áo thun mới nhất năm 2024 được công ty phát triển , chất liệu thoáng mát cho một mùa hè đầy năng lượng , hình tự chọn .',2,'client/images/Screenshot 2024-05-21 165002.png','78','client/images/Screenshot 2024-05-21 165002.png','client/images/Screenshot 2024-05-21 165002.png'),(32,'Áo Sơ Mi Dài Tay Essentials Cotton',399999,'XL','Xanh','Chất liệu 100% Cotton mềm mại\r\nThoáng mát, thấm hút mồ hôi tốt\r\nVải có độ bền cao, không bị xù lông sau nhiều lần giặt\r\nPhù hợp với: đi làm, đi chơi\r\nKiểu dáng: Regular loose dễ dàng phối đồ, tạo layer',2,'client/images/Screenshot 2024-05-21 165205.png','78','client/images/Screenshot 2024-05-21 165205.png','client/images/Screenshot 2024-05-21 165205.png'),(33,'Sét đũi đi biển nữ',399999,'XL','Xám','Coolmate mang đến cho bạn một phong cách năng động trẻ trung , bên cạnh đó là chất liệu của sản cotton thoáng mát',1,'client/images/Screenshot 2024-05-21 170455.png','78','client/images/Screenshot 2024-05-21 170455.png','client/images/Screenshot 2024-05-21 170455.png'),(34,'Sét pijama',399999,'XL','Nâu Naila','Áo dạ nữ có sẵn trong nhiều màu sắc và họa tiết khác nhau, từ các màu sắc cơ bản như đen, xám, và nâu đến các màu sắc sặc sỡ như đỏ, xanh lam, và hồng. Họa tiết cũng đa dạng, từ các hoa văn truyền thống đến các hoa văn độc đáo và hiện đại',1,'client/images/Screenshot 2024-05-21 170555.png','78','client/images/Screenshot 2024-05-21 170555.png','client/images/Screenshot 2024-05-21 170555.png'),(35,'Pijama korean',399999,'XL','Xanh neon','Họa tiết kẻ xọc trên áo thường làm từ các đường kẻ song song chạy dọc theo áo. Có nhiều loại kẻ xọc khác nhau, từ kẻ dày đậm và nổi bật đến kẻ mảnh và tinh tế. Màu sắc của các đường kẻ cũng đa dạng, từ các gam màu cơ bản như đen, xanh, xám đến các màu sắc sáng hơn như đỏ, vàng hoặc xanh dương.',1,'client/images/Screenshot 2024-05-21 170644.png','78','client/images/Screenshot 2024-05-21 170644.png','client/images/Screenshot 2024-05-21 170644.png'),(36,'Sơ mi kẻ',399999,'XL','đổ thạch','Đây là một phiên bản hiện đại của áo sơ mi truyền thống với cổ áo tròn thay vì cổ áo bình thường. Loại áo này thường có kiểu dáng suông, thoải mái và dễ dàng kết hợp với nhiều trang phục khác nhau, từ quần jean đến chân váy.',1,'client/images/Screenshot 2024-05-21 170727.png','78','client/images/Screenshot 2024-05-21 170727.png','client/images/Screenshot 2024-05-21 170727.png'),(37,'Váy hoa 3 tầng',2000000,'XL','Hồng','Váy đẹp thoáng mát ôm dáng , chất liệu vải tăm thoáng mát , đường nét tinh tế hiện đại mang đến cho bạn trải nhiệm bất ngờ',1,'client/images/Screenshot 2024-05-21 170803.png','78','client/images/Screenshot 2024-05-21 170803.png','client/images/Screenshot 2024-05-21 170803.png'),(39,'Áo khoác Cottom',399999,'XL','Xanh','Áo khoác kết hợp từ công nghệ dệt proxy và vải cotton cho bạn một trải nhiệm đầy thú vị',5,'client/images/Screenshot 2024-05-23 231906.png','78','client/images/Screenshot 2024-05-23 231906.png','client/images/Screenshot 2024-05-23 231906.png'),(40,'Áo khoác gió',200000,'XL','Xám','Áo khoác thoáng mát cá tính , trẻ trung đầy phong cách mang đến trải nhiệm tốt cho người dùng',5,'client/images/Screenshot 2024-05-23 231812.png','50','client/images/Screenshot 2024-05-23 231812.png','client/images/Screenshot 2024-05-23 231812.png');
/*!40000 ALTER TABLE `san_pham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slider` (
  `ma_slider` int NOT NULL AUTO_INCREMENT,
  `image_slider` varchar(255) DEFAULT NULL,
  `text1` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `text2` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`ma_slider`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` VALUES (1,'client/images/slide-01.jpg','Nữ','Hè 2018'),(2,'client/images/slide-02.jpg','Sưu tập nam','Jackets & Coats'),(3,'client/images/slide-06.jpg','Bộ sưu tập nam 2018','Phong cách mới');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Đinh Tuấn Kiệt','dinhtuankiet@gmail.com',0,NULL,'$2y$10$QhreBz6CwXLu8NyS/WH/FeM606g1qOouNdzuXN10GL2IQ60jQJDEq',NULL,'2024-04-18 19:39:59','2024-04-18 19:39:59'),(2,'Admin Web','dinhviethung@gmail.com',1,NULL,'$2y$10$AwmH0dLfmo8dCmwOS7IjkOOPwmcZCB2x8LA.hnJyKxslV5VHu9cPC',NULL,'2024-04-18 19:43:56','2024-04-18 19:43:56'),(3,'Hoàng Văn Hán','123@gmail.com',0,NULL,'$2y$10$LSSS4t5gMJhA/b2685rwf.weltTYANwzigbxzdnVBdA0gx9latbT2',NULL,'2024-05-23 21:11:10','2024-05-23 21:11:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-25 16:49:39
