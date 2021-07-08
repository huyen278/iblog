-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: db_iblog
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.10.1

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
-- Table structure for table `tbl_categories`
--

DROP TABLE IF EXISTS `tbl_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `create_at` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categories`
--

LOCK TABLES `tbl_categories` WRITE;
/*!40000 ALTER TABLE `tbl_categories` DISABLE KEYS */;
INSERT INTO `tbl_categories` VALUES (1,'Coding','coding','2021-07-02 17:57:04'),(2,'Security','security','2021-07-02 17:57:04'),(3,'Traveling','traveling','2021-07-02 17:57:04'),(4,'Story','story','2021-07-02 17:57:04');
/*!40000 ALTER TABLE `tbl_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_comments`
--

DROP TABLE IF EXISTS `tbl_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_post` int NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`id_post`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_comment_post_idx` (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_comments`
--

LOCK TABLES `tbl_comments` WRITE;
/*!40000 ALTER TABLE `tbl_comments` DISABLE KEYS */;
INSERT INTO `tbl_comments` VALUES (1,47,'&lt;h1>test comment&lt;/h1>'),(2,0,'47'),(3,0,'1'),(5,47,'&lt;script&gt;alert(1)&lt;/script&gt;'),(6,47,'hello'),(7,48,'test comment'),(8,48,'&lt;script&gt;alert(1)&lt;/script&gt;'),(9,48,'hello');
/*!40000 ALTER TABLE `tbl_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_img`
--

DROP TABLE IF EXISTS `tbl_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_img` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_owner` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `create_at` varchar(45) NOT NULL,
  `delete_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`id_owner`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_id_owern_idx` (`id_owner`),
  CONSTRAINT `fk_id_owern` FOREIGN KEY (`id_owner`) REFERENCES `tbl_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_img`
--

LOCK TABLES `tbl_img` WRITE;
/*!40000 ALTER TABLE `tbl_img` DISABLE KEYS */;
INSERT INTO `tbl_img` VALUES (1,1,'logo.png','2021-07-05 00:30:50',NULL),(2,2,'Screenshot from 2021-07-07 11-28-38.png','2021-07-07 11:36:03',''),(3,3,'Screenshot from 2021-07-07 20-48-52.png','2021-07-07 20:56:12',''),(4,3,'Screenshot-from-2021-07-07-20-48-52.png','2021-07-07 20:58:42',''),(5,4,'Screenshot-from-2021-07-07-20-48-52.png','2021-07-07 22:50:44',''),(6,4,'Screenshot-from-2021-07-07-20-48-52.png','2021-07-07 22:56:59',''),(7,4,'Screenshot-from-2021-07-07-20-48-52.png','2021-07-07 22:57:48',''),(8,4,'Screenshot-from-2021-07-07-20-48-52.png','2021-07-07 23:09:23',NULL),(9,4,'Screenshot-from-2021-07-07-20-48-52-1.png','2021-07-07 23:09:31',NULL),(10,2,'Screenshot-from-2021-07-07-11-28-38.png','2021-07-07 23:16:48',NULL),(11,2,'Screenshot-from-2021-07-07-20-48-52-2.png','2021-07-08 08:51:21',NULL),(12,5,'Screenshot-from-2021-07-07-11-28-38-1.png','2021-07-08 09:15:05',NULL);
/*!40000 ALTER TABLE `tbl_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_posts`
--

DROP TABLE IF EXISTS `tbl_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_author` int NOT NULL,
  `id_category` int DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brief` varchar(255) DEFAULT NULL,
  `views` int DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `content` text,
  `create_at` varchar(45) NOT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `delete_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`slug`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `slug_UNIQUE` (`slug`),
  KEY `fk_category_id_idx` (`id_category`),
  KEY `fk_author_id_idx` (`id_author`),
  CONSTRAINT `fk_author_id` FOREIGN KEY (`id_author`) REFERENCES `tbl_users` (`id`),
  CONSTRAINT `fk_category_id` FOREIGN KEY (`id_category`) REFERENCES `tbl_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_posts`
--

LOCK TABLES `tbl_posts` WRITE;
/*!40000 ALTER TABLE `tbl_posts` DISABLE KEYS */;
INSERT INTO `tbl_posts` VALUES (1,2,1,'Handling Async Errors With Axios in React','handling-async-errors-with-axios-in-react','Ever clicked a button and couldn’t figure out if it worked? This guide has four quick snippets to make your React app feel less janky',0,'logo.png','Have you ever been stuck on what looks like an empty page and asked yourself, “Am I supposed to be seeing something yet?” only for it to appear 30 seconds later? Or maybe you clicked on a button and you’re not sure whether it’s processing or not (e.g. on checkout pages). If that’s what your own app feels like, then read on.</br>Take a look at your React projects that are working with APIs and review how you’re handling errors. These tips are an easy way to give your users a less buggy experience. If you’ve tried it out or have different ways of approaching your errors, let me know in the comments!','2021-07-02 17:57:04',NULL,NULL),(2,3,2,'Title post 1','title-post-1','haha brief',0,'logo.png','oke content chua nghi ra','2021-07-02 17:57:04',NULL,''),(3,2,3,'title 3','title-3','oke nhe',0,'logo.png','<script>alert(1)</script>dsfksjhfksjvkjsnvdds','2021-07-02 17:57:04',NULL,''),(4,3,4,'blah-blah','blah-blah','oke nhe hack ikkk',0,'logo.png','ascds\'.htmlspecialchars(<?php echo \"123 php\"; ?>).\'asca','2021-07-02 17:57:04',NULL,''),(5,2,1,'dung click','dung-click','haha',0,'logo.png','da noi dung click :)','2021-07-02 17:57:04',NULL,''),(6,3,2,'dung quan tam','dung-quan-tam','<h1>breif</h1>',0,'logo.png','khong co content','2021-07-02 17:57:04',NULL,''),(7,2,2,'khong co gi','khong-co-gi','uk',0,'logo.png','dsfsd<br>dsdds','2021-07-02 17:57:04',NULL,''),(9,1,2,'uk','uk','uk',0,'logo.png','sd','2021-07-02 17:57:04',NULL,''),(10,3,2,'uk','uk1','uk',0,'logo.png','sd','2021-07-02 17:57:04',NULL,''),(11,1,1,'vdvs','vdvs','dcsdc',0,'logo.png','dscxc','2021-07-05 09:50:14',NULL,'2021-07-05 09:50:14'),(12,1,1,'uk','uk-1','dsfdsgfd',0,'logo.png','jkshgaksd<br />\r\nsahjcgjshdv<br />\r\ndcvjhsdgvchksdv<br />\r\ncjvsdjhsd<br />\r\nsdcjbsdkjvbsdv<br />\r\nsdkgsdku<br />\r\nsdvjksdgvkusdv<br />\r\nfgbngdbfgb','2021-07-05 09:52:36',NULL,''),(13,2,2,'Attack XSS Post ','attack-xss-post','Dung xem thuong XSS',0,'logo.png','<html><br />\r\n<body onload=\"alert(1);\"><br />\r\n<h1>title1</h1><br />\r\n<h2>title2</h2><br />\r\nday la2 script:<br />\r\n<sCriPt>alert(1);</Script><br />\r\n<h2>title</h2><br />\r\ncode php injection:<br />\r\n;?>&gt;?php system(\'id\');<br />\r\n<img src=\"/assets/public_img/logo.png\"><br />\r\n<h2>title2</h2><br />\r\n<body onload=\"alert(1);\"><br />\r\n</html>','2021-07-07 10:31:58',NULL,''),(14,2,4,'ATTACK lan 2','attack-lan-2','oke',0,'logo.png','<html><br />\r\n<body onload=\"alert(1);\"><br />\r\n<h1>title1</h1><br />\r\n<h2>title2</h2><br />\r\nday la2 script:<br />\r\n<sCriPt>alert(1);</Script><br />\r\n<h2>title</h2><br />\r\ncode php injection:<br />\r\nlt;?php system(\'id\');?><br />\r\n<h2>title2</h2><br />\r\n<body onload=\"alert(1);\"><br />\r\n</html> ','2021-07-07 10:37:56',NULL,''),(15,2,4,'ATTACK lan 2','attack-lan-2-1','oke',0,'logo.png','<html><br />\r\n<body onload=\"alert(1);\"><br />\r\n<h1>title1</h1><br />\r\n<h2>title2</h2><br />\r\nday la2 script:<br />\r\n<sCriPt>alert(1);</Script><br />\r\n<h2>title</h2><br />\r\ncode php injection:<br />\r\nlt;?php system(\'id\');?><br />\r\n<h2>title2</h2><br />\r\n<body onload=\"alert(1);\"><br />\r\n</html> ','2021-07-07 10:38:34',NULL,''),(25,2,3,'Attack lan 3','attack-lan-3','haha',0,'logo.png','<html><br />\r\n<body onload=\"alert(1)\"><br />\r\n<script> alert(1); </script><br />\r\n</body><br />\r\n</html>','2021-07-07 10:58:15',NULL,''),(26,2,3,'Attack lan 3','attack-lan-3-1','haha',0,'logo.png','<html><br />\r\n<body onload=\"alert(1)\"><br />\r\n<script> alert(1); </script><br />\r\n</body><br />\r\n</html>','2021-07-07 10:58:20',NULL,''),(31,2,2,'attack lan 4','attack-lan-4','asdv',0,'logo.png','<script>alert(1)</script><br />\r\n<body onload=\"alert(1)\"><br />\r\n&lt;?php echo(\'1\'_; ?><br />\r\n</body><br />\r\n</html>','2021-07-07 11:04:16',NULL,''),(32,2,2,'attack lan 4','attack-lan-4-1','asdv',0,'logo.png','<script>alert(1)</script><br />\r\n<body onload=\"alert(1)\"><br />\r\n&lt;?php echo(\'1\'_; ?><br />\r\n</body><br />\r\n</html>','2021-07-07 11:04:28',NULL,''),(45,2,2,'ATTACK XSS','attack-xss','OKE DONE',0,'logo.png','&lt;html><br /><br /><br />\r\n&lt;body onload=\"alert(1)\"><br /><br /><br />\r\n<h1>chao cac ban</h1><br /><br /><br />\r\n<h2>Nhom tui</h1><br /><br /><br />\r\n<ul><br /><br /><br />\r\n<li>chi thien - 18520365</li><br /><br /><br />\r\n<li>duc trong - 18521541</li><br /><br /><br />\r\n</ul><br /><br /><br />\r\n<h2>khong co gi</h2><br /><br /><br />\r\n<h1>attack thu<h1><br /><br /><br />\r\n<p>cac loai <b>attack</b><br /><br /><br />\r\n<ul><br /><br /><br />\r\n<li>script::</li><br /><br /><br />\r\n&lt;script>alert(1)</script><br /><br /><br />\r\n<li>php</li><br /><br /><br />\r\n&lt;?php echo \"haha\"; ?><br /><br /><br />\r\n&lt;/body><br /><br /><br />\r\n&lt;/html>','2021-07-07 11:23:53','2021-07-08 00:03:17',NULL),(46,4,3,'nham nhi thiet do','day-la-mot-post-nham-nhi','nham nhi thiet do',0,'logo.png','Da noi nham nhi roi, dung co click vao xem ma :)<br />\r\nadmin da chinh sua','2021-07-07 22:41:56','2021-07-08 00:01:37',NULL),(47,3,4,'user thuong','test-post-update','user thuong test',0,'logo.png','day la user thuong<br />\r\nadmin da chinh sua','2021-07-07 23:46:51','2021-07-08 00:00:23',NULL),(48,3,2,'thu tao 1 bai viet','tao-mot-bai-viet','thu tao 1 bai viet',0,'logo.png','dang tao mot bai viet','2021-07-08 01:00:44',NULL,NULL);
/*!40000 ALTER TABLE `tbl_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password_hashed` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `create_at` varchar(45) NOT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,'$up3rAssmin','$2y$10$RUcSo6Pb3vaGVNfEPGT0/.KTtLb/.CU43rNREwcIVDiINZhOIY7r6','admin','2021-07-02 17:57:04',NULL),(2,'admin','$2y$10$847OahuFABFgPC2GrRT9xOsbSCaEmuXrUw5tI/jlxI5TPBZKg3q46','user','2021-07-04 18:56:01',NULL),(3,'user','$2y$10$s/Z6/Ox9T0ZGNPrdneKdsODn9r/7Zb0v2DxSp/DJx07R3fA20xmUe','user','2021-07-04 18:57:01',NULL),(4,'test','$2y$10$3G3DEkqfI6eueSsUqHe.xek53kJW9cndlFBRhKvE8/vxgAlj0Snlq','user','2021-07-04 18:57:27',NULL),(5,'test123','$2y$10$uUXW51WOogObc3YLnwt.MOk8gSoy0314iX9Mo.xRG8UX.GkYKq.uy','user','2021-07-08 09:14:34','2021-07-08 09:44:12');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-08 10:53:50
