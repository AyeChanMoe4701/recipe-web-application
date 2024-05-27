CREATE DATABASE  IF NOT EXISTS `recipe` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `recipe`;
-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: recipe
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recipes` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `ingridents` varchar(300) NOT NULL,
  `method` varchar(800) NOT NULL,
  `category` varchar(30) NOT NULL,
  `cuisine` varchar(30) NOT NULL,
  `collection` varchar(30) NOT NULL,
  `preparation_time` int NOT NULL,
  `image_link` varchar(200) NOT NULL,
  `chef_id` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recipe_ibfk_1` (`chef_id`),
  CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`chef_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes`
--

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
INSERT INTO `recipes` VALUES (1,'Baked Chicken','1 chicken,cut into 8 parts <br> Extra virgin olive oil <br> Kosher salt <br> Freshly ground black pepper <br>','Trim and salt the chicken. <br> Preheat the oven <br> Prepare the chicken <br> Bake the chicken <br> Let the chicken rest <br> make the gravy <br> Serve','Fast Food','Korean','Chicken',45,'images/baked-chicken-with-dark-sauce.jpg',1,'2022-04-23 07:11:20','2022-05-09 06:19:33','http://localhost/CW/RecipeDetail.php'),(2,'Barcecue Meatball','2 lb of beef <br> 2 eggs <br> salt <br> pepper','Make meatball mixture <br> Bake the meatballs <br>Serve the meatballs. <br>','Fast Food','American','Beef',30,'images/barbecue-pork-meatballs-with dark-sauce.jpg',2,'2022-04-23 07:14:20','2022-04-23 07:14:20',NULL),(3,'Bean Paste Soup','tofu <br> radish <br> onion <br> chili pepper <br> salt','Cut tofu <br> preheat the pot <br> Add oil and water <br> Add onion <br> Add seasoning','Soup','Korean','Vegan',20,'images/bean-paste-soup-korean-style.jpg',3,'2022-04-23 07:16:01','2022-04-23 07:16:01',NULL),(4,'Fried Dumplings','wrappers <br> vegetables <br> salt <br> pepper','make dumpling fillings <br> fold dumplings <br> Pan fry dumplings <br> Plate','Dessert','Chinese','Pork',40,'images/fried_dumplings.jpg',1,'2022-04-24 09:42:14','2022-04-24 09:42:14',NULL),(5,'Tom Yum Seafood Soup','Tom yum <br> seafood <br> onion <br> salt <br> pepper','Boil the water <br> Add seasoning <br> Add seafood <br> Serve','Soup','Thai','Seafood',30,'images/tom-yum-mixed-seafood-soup.jpg',6,'2022-04-24 10:02:55','2022-04-24 10:02:55',NULL),(6,'Spaghetti','Noodle <br> Tomato sauce <br> olive oil <br> salt <br> seasoning','Boil the water and cook the noodles <br> prepare the tomato sauce <br> Add noodle in the sauce <br> Stir <br> Serve','Pasta','Itilian','Vegan',55,'images/spaghetti-dish.jpg',2,'2022-04-24 10:45:38','2022-04-24 10:45:38',NULL);
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `review` (
  `id` int NOT NULL,
  `recipe_id` int NOT NULL,
  `user_id` int NOT NULL,
  `rating` int NOT NULL DEFAULT '5',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `review_ibfk_1` (`recipe_id`),
  CONSTRAINT `review_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (1,1,11,5,'2022-05-09 08:15:43','2022-05-09 08:15:43'),(2,2,10,2,'2022-05-09 08:16:36','2022-05-09 08:16:36'),(3,3,11,1,'2022-05-09 08:25:13','2022-05-09 08:25:13'),(4,4,9,4,'2022-05-09 08:25:13','2022-05-09 08:25:13'),(5,5,11,4,'2022-05-09 08:16:36','2022-05-09 08:16:36'),(6,6,9,5,'2022-05-09 08:15:43','2022-05-09 08:15:43');
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(35) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'User',
  `image` varchar(300) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'ayechan@gmail.com','Aye Chan Moe','Abc123!@#','User',NULL,'123456789','2022-04-29 14:58:52','2022-09-02 13:43:54'),(2,'pierregagnaire@gmail.com','Pierre Gagnaire','Pierre123!','Chef','https://d3h1lg3ksw6i6b.cloudfront.net/media/image/2019/05/03/d95ff46b2fd4455bafdeeb6192c10de4_Legendary+Chef+Pierre+Gagnaire+%28mid-res%29.jpg','09674933076','2022-04-23 06:40:32','2022-04-23 06:40:32'),(3,'martinberasategui@gmail.com','Martin Berasategui','Martin123!','Chef','https://www.saxun.com/wp-content/uploads/2018/11/Gimenez_Ganga_Saxun_Martin_Berasategui_Estrella_Michellin_1.jpg','095437680','2022-04-23 06:42:41','2022-04-23 06:42:41'),(4,'yannickalleno@gmail.com','Yannick Alleno','Yannick123!','Chef','https://cdn.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_640/https://trulyexperiences.com/blog/wp-content/uploads/2018/04/Yannick-Alleno-e1584303824770.jpg','09345619738','2022-04-23 06:43:32','2022-04-23 06:43:32'),(5,'annesophiepic@gmail.com','Anne-Sophie Pic','Anne123!','Chef','https://cdn.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_842/https://trulyexperiences.com/blog/wp-content/uploads/2018/04/Anne-Sophie_Pic_par_Claude_Truong-Ngoc_mars_2014-842x1263.jpg',NULL,'2022-04-23 06:44:52','2022-04-23 06:44:52'),(6,'gordonramsay@gmail.com','Gordon Ramsay','Gordon123!','Chef','https://cdn.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_766/https://trulyexperiences.com/blog/wp-content/uploads/2018/04/5034956030_78d7847da0_o-e1614080434624.jpg',NULL,'2022-04-23 06:45:47','2022-04-23 06:45:47'),(7,'thomaskeller@gmail.com','Thomas Keller','Thomas123!','Chef','https://cdn.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_1536/https://trulyexperiences.com/blog/wp-content/uploads/2018/04/4202807186_a75b2506b8_k-1536x864.jpg','0987654879','2022-04-23 06:46:58','2022-04-23 06:46:58'),(8,'yoshihiromurata@gmail.com','Yoshihiro Murata','Yoshi123!','Chef','https://www.finedininglovers.com/sites/g/files/xknfdk626/files/styles/im_landscape_100/public/2020-02/Yoshihiro_Murata_american_express_icon.jpg.webp?itok=xoM5u3Iq','09347622289','2022-04-23 06:48:20','2022-04-23 06:48:20'),(9,'seijiyamamoto@gmail.com','Seiji Yamamoto','Seiji123!','Chef','https://www.joselitolab.com/ftp/2016/bio/yamamoto/photo1.jpg',NULL,'2022-04-23 06:55:20','2022-04-23 06:55:20'),(10,'andreascaminada@gmail.com','Andreas Caminada','Andreas123!','Chef','https://www.ktchnrebel.com/wp-content/uploads/2020/12/Andreas-Caminada-Head-chef-Schloss-Schauenstein-and-host-at-Casa-Caminada-c-Veronique-Hoegger.jpg','0987698709','2022-04-23 06:56:29','2022-04-23 06:56:29'),(11,'ayechan12@gmail.com','Aye Chan','Abc123!@#','User',NULL,'09969864965','2022-04-29 14:58:52','2022-05-12 22:27:58');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_favorite`
--

DROP TABLE IF EXISTS `user_favorite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_favorite` (
  `recipe_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `user_favorite_ibfk_1` (`recipe_id`),
  KEY `user_favorite_ibfk_2` (`user_id`),
  CONSTRAINT `user_favorite_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_favorite_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_favorite`
--

LOCK TABLES `user_favorite` WRITE;
/*!40000 ALTER TABLE `user_favorite` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_favorite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'recipe'
--

--
-- Dumping routines for database 'recipe'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-02 17:32:43
