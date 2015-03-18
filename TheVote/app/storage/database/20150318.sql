-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: laravel
-- ------------------------------------------------------
-- Server version	5.6.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `assigned_roles`
--

DROP TABLE IF EXISTS `assigned_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assigned_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assigned_roles_user_id_index` (`user_id`),
  KEY `assigned_roles_role_id_index` (`role_id`),
  CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `assigned_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assigned_roles`
--

LOCK TABLES `assigned_roles` WRITE;
/*!40000 ALTER TABLE `assigned_roles` DISABLE KEYS */;
INSERT INTO `assigned_roles` VALUES (1,1,1),(2,2,2),(3,33,1),(4,33,2),(5,33,3),(6,40,1),(7,40,2),(8,40,3);
/*!40000 ALTER TABLE `assigned_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `comments_user_id_index` (`user_id`),
  KEY `comments_post_id_index` (`post_id`),
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,1,'Lorem ipsum dolor sit amet, mutat utinam nonumy ea mel.','2015-02-27 11:58:47','2015-02-27 11:58:47'),(2,1,1,'Lorem ipsum dolor sit amet, sale ceteros liberavisse duo ex, nam mazim maiestatis dissentiunt no. Iusto nominavi cu sed, has.','2015-02-27 11:58:47','2015-02-27 11:58:47'),(3,1,1,'Et consul eirmod feugait mel! Te vix iuvaret feugiat repudiandae. Solet dolore lobortis mei te, saepe habemus imperdiet ex vim. Consequat signiferumque per no, ne pri erant vocibus invidunt te.','2015-02-27 11:58:47','2015-02-27 11:58:47'),(4,1,2,'Lorem ipsum dolor sit amet, mutat utinam nonumy ea mel.','2015-02-27 11:58:47','2015-02-27 11:58:47'),(5,1,2,'Lorem ipsum dolor sit amet, sale ceteros liberavisse duo ex, nam mazim maiestatis dissentiunt no. Iusto nominavi cu sed, has.','2015-02-27 11:58:47','2015-02-27 11:58:47'),(6,1,3,'Lorem ipsum dolor sit amet, mutat utinam nonumy ea mel.','2015-02-27 11:58:47','2015-02-27 11:58:47'),(7,1,3,'in-iisque-similique-reprimique-eum','2015-03-05 18:40:34','2015-03-05 18:40:34'),(8,1,1,'สวัสดีครับ','2015-03-06 12:51:20','2015-03-06 12:51:20'),(9,2,1,'AAAA','2015-03-08 18:44:22','2015-03-08 18:44:22'),(10,33,1,'ดีๆๆๆ\r\n','2015-03-14 08:17:57','2015-03-14 08:17:57'),(11,33,1,'In mea autem etiam menandri, quot elitr vim ei, eos semper disputationi id? Per facer appetere eu, duo et animal maiestatis. Omnesque invidunt mnesarchum ex mel, vis no case senserit dissentias. Te mei minimum singulis inimicus, ne labores accusam necessitatibus vel, vivendo nominavi ne sed. Posidonium scriptorem consequuntur cum ex? Posse fabulas iudicabit in nec, eos cu electram forensibus, pro ei commodo tractatos reformidans. Qui eu lorem augue alterum, eos in facilis pericula mediocritatem?\r\n\r\nEst hinc legimus oporteat in. Sit ei melius delicatissimi. Duo ex qualisque adolescens! Pri cu solum aeque. Aperiri docendi vituperatoribus has ea!\r\n\r\nSed ut ludus perfecto sensibus, no mea iisque facilisi. Choro tation melius et mea, ne vis nisl insolens. Vero autem scriptorem cu qui? Errem dolores no nam, mea tritani platonem id! At nec tantas consul, vis mundi petentium elaboraret ex, mel appareat maiestatis at.\r\n\r\nSed et eros concludaturque. Mel ne aperiam comprehensam! Ornatus delicatissimi eam ex, sea an quidam tritani placerat? Ad eius iriure consequat eam, mazim temporibus conclusionemque eum ex.\r\n\r\nTe amet sumo usu, ne autem impetus scripserit duo, ius ei mutat labore inciderint! Id nulla comprehensam his? Ut eam deleniti argumentum, eam appellantur definitionem ad. Pro et purto partem mucius!\r\n\r\nCu liber primis sed, esse evertitur vis ad. Ne graeco maiorum mea! In eos nostro docendi conclusionemque. Ne sit audire blandit tractatos? An nec dicam causae meliore, pro tamquam offendit efficiendi ut.\r\n\r\nTe dicta sadipscing nam, denique albucius conclusionemque ne usu, mea eu euripidis philosophia! Qui at vivendo efficiendi! Vim ex delenit blandit oportere, in iriure placerat cum. Te cum meis altera, ius ex quis veri.\r\n\r\nMutat propriae eu has, mel ne veri bonorum tincidunt. Per noluisse sensibus honestatis ut, stet singulis ea eam, his dicunt vivendum mediocrem ei. Ei usu mutat efficiantur, eum verear aperiam definitiones an! Simul dicam instructior ius ei. Cu ius facer doming cotidieque! Quot principes eu his, usu vero dicat an.\r\n\r\nEx dicta perpetua qui, pericula intellegam scripserit id vel. Id fabulas ornatus necessitatibus mel. Prompta dolorem appetere ea has. Vel ad expetendis instructior!\r\n\r\nTe his dolorem adversarium? Pri eu rebum viris, tation molestie id pri. Mel ei stet inermis dissentias. Sed ea dolorum detracto vituperata. Possit oportere similique cu nec, rid','2015-03-14 08:25:06','2015-03-14 08:25:06'),(12,33,8,'ddasas','2015-03-14 12:49:49','2015-03-14 12:49:49'),(13,33,8,'asdasdasdas','2015-03-14 12:49:51','2015-03-14 12:49:51'),(14,33,8,'asdasdasdas','2015-03-14 12:49:54','2015-03-14 12:49:54'),(15,33,8,'asdasdasdasdas','2015-03-14 12:49:57','2015-03-14 12:49:57'),(16,33,13,'หกดหกดหกด','2015-03-14 12:56:50','2015-03-14 12:56:50'),(17,33,14,'sadasd','2015-03-14 21:55:14','2015-03-14 21:55:14'),(18,1,13,'สุดยอดมากกกก','2015-03-15 08:15:49','2015-03-15 08:15:49'),(19,33,14,'เชียงใหม่วาเด้น ฝ่าฟัน 3 ทีมคว้าแชมป์\r\nThailand Esport League : HoN by Garena\r\nรับเงินรางวัล 400,000 บาทพร้อมสิทธิ์ลุย HoNTour World Finals 2015\r\n------------------------------------\r\nอีกสักครู่ชมพิธีการมอบรางวัลและการสัมภาษณ์ครับ','2015-03-15 10:01:29','2015-03-15 10:01:29'),(20,33,14,'หฟกฟห dfdnsfgjk sdfnkg nfkjndj ndfgjhd dhjf ขายหฟกฟห dfdnsfgjk sdfnkg nfkjndj ndfgjhd dhjf ขายหฟกฟห dfdnsfgjk sdfnkg nfkjndj ndfgjhd dhjf ขายหฟกฟห dfdnsfgjk sdfnkg nfkjndj ndfgjhd dhjf ขายหฟกฟห dfdnsfgjk sdfnkg nfkjndj ndfgjhd dhjf ขายหฟกฟห dfdnsfgjk sdfnkg nfkjndj ndfgjhd dhjf ขายหฟกฟห dfdnsfgjk sdfnkg nfkjndj ndfgjhd dhjf ขาย','2015-03-15 10:07:02','2015-03-15 10:07:02'),(21,33,15,'รถดูท่าจะแรงนะ 5555+','2015-03-15 10:44:17','2015-03-15 10:44:17'),(22,33,16,'หน้าวัว','2015-03-15 18:35:56','2015-03-15 18:35:56'),(23,33,16,'หฟกฟหกฟหกฟหกฟหก','2015-03-15 18:43:15','2015-03-15 18:43:15'),(24,33,14,'khamfa j ผ่าน Google+2 เดือนที่ผ่านมา\r\n \r\nรวมเพลง - GMM GRAMMY & Everlasting Love Songs 1: http://youtu.be/FqGDbFq3i9g﻿\r\nตอบกลับ  ·  25\r\nดูทั้งหมด 7 คำตอบ\r\n\r\nkhamfa j2 เดือนที่ผ่านมา\r\n \r\n+Rapeepat mungrean \r\nสวัสดียามค่ำคืนครับสุขกายสบายใจพักผ่อนให้สบายใจนะครับหลับฝันดีมีความสุขตลอดคืน ขอบคุณครับที่ชอบ\r\nราตรีสวัสดิ์ครับ﻿\r\nตอบกลับ  ·  \r\n\r\nRapeepat mungrean2 เดือนที่ผ่านมา\r\n \r\nเช่นกันค่า Good night.﻿\r\nตอบกลับ  ·  \r\n\r\nPrathumporn Thajeevorn4 เดือนที่ผ่านมา\r\n \r\nหากโฆษณาของคุณไม่มาคั่นตรงกลางเพลง ขัดจังหวะและอารมณ์ของผู้ฟัง โฆษณาของคุณคงได้รับความสนใจมากกว่านี้﻿\r\nตอบกลับ  ·  5\r\nดู 1 คำตอบ\r\n\r\nNavawee Habibee6 เดือนที่ผ่านมา\r\n \r\nเพราะเวอร์อ่ะ เสียงใสกิ๊งๆๆๆๆ ﻿\r\nตอบกลับ  ·  6\r\nดูทั้งหมด 5 คำตอบ\r\n\r\nเชิดชัย หัวยทราย5 เดือนที่ผ่านมา\r\n \r\n+Navawee Habibee <3﻿\r\nตอบกลับ  ·  \r\n\r\nเชิดชัย หัวยทราย5 เดือนที่ผ่านมา\r\n \r\n+Navawee Habibee (y)﻿\r\nแปล\r\nตอบกลับ  ·  \r\n\r\nSurawut Jindadang6 เดือนที่ผ่านมา\r\n \r\nมันเป็นความรู้สึกที่ สบายๆ + ร้องฮัมตาม = มีความสุขมากๆเลย :)﻿\r\nตอบกลับ  ·  2\r\n\r\nKunsak Kudesri ผ่าน Google+3 สัปดาห์ที่ผ่านมา\r\n \r\nชุ่มฉํ่าใจยามเย็น วันอังคารที่17ก.พ.58 สดชื่น ยิ้มแย้มแจ่มใสสบายๆ เดินทางสะดวกปลอดภัย ธรรมรักษาครับเพื่อนๆG+\r\n  **..รวมเพลง - GMM GRAMMY & Everlasting Love Songs 1..**\r\n.........เผยแพร่เมื่อ 30 ก.ค. 2014\r\n1.ไม่รู้จักฉัน ไม่รู้จักเธอ -- DA endorphine;Calories Blah Blah 00:00\r\n2.อยากรู้...แต่ไม่อยากถาม -- Calories Blah Blah 00:04:05\r\n3.แทงข้างหลัง..ทะลุถึงหัวใจ -- อ๊อฟ ปองศักดิ์ รัตนพงษ์ 00:07:14\r\n4.แค่คนอีกคน -- ปราโมทย์ วิเลปะนะ 00:11:51\r\n5.หนึ่งในไม่กี่คน -- สุนิตา ลีติกุล(โบ) 00:15:53\r\n6.เพื่อนสนิทคิดไม่ซื่อ -- ศรัณยู วินัยพานิช (ไอซ์) 00:19:55\r\n7.มีค่าเวลาเธอเหงา -- ปนัดดา เรืองวุฒิ 00:23:44\r\n8.Perhaps Love -- ศรัณยู วินัยพานิช (ไอซ์);ROSE ศิรินทิพย์ 00:28:09\r\n9.อยู่อย่างเหงาเหงา -- บอย Peacemaker 00:32:43\r\n10.คืนข้ามปี -- DA endorphine 00:37:28\r\n11.คำถามที่ต้องตอบ -- อ๊อฟ ปองศักดิ์ รัตนพงษ์ 00:41:08\r\n12.ความเจ็บปวด -- ปาล์มมี่ 00:44:52\r\n13.เกิดมาแค่รักกัน -- ศิรินทิพย์ หาญประดิษฐ์ ROSE 00:48:36\r\n14.ไม่ต้องรู้ว่าเราคบกันแบบไหน -- DA endorphine 00:53:02\r\n15.ชีวิตที่ขาดเธอ -- ปั๊บ Potato 00:56:53\r\n16.ความทรงจำสีจาง -- ปาล์มมี่ 01:01:04\r\n17.แพ้กลางคืน -- ปั๊บ Potato 01:04:12\r\n18.รักไม่ช่วยอะไร (Acoustic Version) -- นัท มีเรีย 01:08:56\r\n19.คนเจ้าน้ำตา -- นิว นภัสสร ภูธรใจ;จิ๋ว ปิยนุช เสือจงพรู 01:13:13\r\n20.ก้อนหินก้อนนั้น -- วง พาย 01:17:23\r\n21.จากคนรักเก่า -- อ๊อฟ ปองศักดิ์ รัตนพงษ์ 01:22:20\r\n22.เรื่องบนเตียง -- PEACEMAKER 01:27:17\r\n23.กรุณาพูดดังๆ -- ซีต้า ซาไลย์ 01:31:28\r\n24.ปากดี -- POTATO 01:35:21\r\nหมวดหมู่\r\nเพลง\r\nสัญญาอนุญาต\r\nสัญญาอนุญาตมาตรฐานของ YouTube﻿\r\nอ่านเพิ่มเติม (27 บรรทัด)\r\n59\r\n\r\nRarunn mananna ผ่าน Google+2 เดือนที่ผ่านมา\r\n \r\n,...มาอีกแล้วล่ะนะ...แบบนี้...ชุดนี้...ฟังแล้ว เป็นไง กันบ้าง..﻿\r\nตอบกลับ  ·  11\r\nดูทั้งหมด 2 คำตอบ\r\n\r\nRarunn mananna2 เดือนที่ผ่านมา\r\n \r\n+คุณชาย กลางสายฝน ..เพราะๆขอให้ มีความสุขในการฟังเพลงครับผม﻿\r\nตอบกลับ  ·  \r\n\r\nYaowalad Promsan5 เดือนที่ผ่านมา\r\n \r\nชอบทุกเพลง..﻿\r\n16\r\n\r\nlulee pakawadeedilok2 สัปดาห์ที่ผ่านมา\r\n \r\nเบื่อโฆษณาขั้นมากๆเลยอ้ะเสียอารมมากมาย เซ็งอุตส่าห์จะฟังเพลงเพราะๆ รมเสียมากไม่ฟังแล้ว﻿\r\nตอบกลับ  ·  \r\n\r\nJeabs Patvadee ผ่าน Google+6 เดือนที่ผ่านมา\r\n \r\nแม้ห่างไกลกัน  อยากบอกเธอว่า ถ้าพอมีเวลาว่าง\r\nอยากชวนมานั่งฟังเพลง เพลงเดียวกัน^^ ได้มั้ย ^o^﻿\r\nตอบกลับ  ·  20\r\n\r\nImukdaharn Arsenal7 เดือนที่ผ่านมา\r\n \r\nเพราะมาก ๆ โคตรชอบอ่าา ฟินนนนฟริ๊งงงง >//////<﻿\r\nตอบกลับ  ·  3\r\n\r\nGarFiwld7 เดือนที่ผ่านมา\r\n \r\nเพราะมากครับ﻿\r\n2\r\n\r\nHoneY PN.7 เดือนที่ผ่านมา\r\n \r\nรวมเพลงแบบนี้ขายเป็นอัลบั้ม ก็ยังได้ จะซื้อเก็บไว้ฟังในรถ เบย﻿','2015-03-15 18:48:58','2015-03-15 18:48:58'),(25,33,16,'วัวตัวผู้แน่นอน','2015-03-15 18:56:12','2015-03-15 18:56:12'),(26,33,14,'khamfa j ผ่าน Google+2 เดือนที่ผ่านมา\r\n\r\nรวมเพลง - GMM GRAMMY & Everlasting Love Songs 1: http://youtu.be/FqGDbFq3i9g﻿\r\nตอบกลับ · 25\r\nดูทั้งหมด 7 คำตอบ\r\n\r\nkhamfa j2 เดือนที่ผ่านมา\r\n\r\n+Rapeepat mungrean \r\nสวัสดียามค่ำคืนครับสุขกายสบายใจพักผ่อนให้สบายใจนะครับหลับฝันดีมีความสุขตลอดคืน ขอบคุณครับที่ชอบ\r\nราตรีสวัสดิ์ครับ﻿\r\nตอบกลับ · \r\n\r\nRapeepat mungrean2 เดือนที่ผ่านมา\r\n\r\nเช่นกันค่า Good night.﻿\r\nตอบกลับ · \r\n\r\nPrathumporn Thajeevorn4 เดือนที่ผ่านมา\r\n\r\nหากโฆษณาของคุณไม่มาคั่นตรงกลางเพลง ขัดจังหวะและอารมณ์ของผู้ฟัง โฆษณาของคุณคงได้รับความสนใจมากกว่านี้﻿\r\nตอบกลับ · 5\r\nดู 1 คำตอบ\r\n\r\nNavawee Habibee6 เดือนที่ผ่านมา\r\n\r\nเพราะเวอร์อ่ะ เสียงใสกิ๊งๆๆๆๆ ﻿\r\nตอบกลับ · 6\r\nดูทั้งหมด 5 คำตอบ\r\n\r\nเชิดชัย หัวยทราย5 เดือนที่ผ่านมา\r\n\r\n+Navawee Habibee <3﻿\r\nตอบกลับ · \r\n\r\nเชิดชัย หัวยทราย5 เดือนที่ผ่านมา\r\n\r\n+Navawee Habibee (y)﻿\r\nแปล\r\nตอบกลับ · \r\n\r\nSurawut Jindadang6 เดือนที่ผ่านมา\r\n\r\nมันเป็นความรู้สึกที่ สบายๆ + ร้องฮัมตาม = มีความสุขมากๆเลย :)﻿\r\nตอบกลับ · 2\r\n\r\nKunsak Kudesri ผ่าน Google+3 สัปดาห์ที่ผ่านมา\r\n\r\nชุ่มฉํ่าใจยามเย็น วันอังคารที่17ก.พ.58 สดชื่น ยิ้มแย้มแจ่มใสสบายๆ เดินทางสะดวกปลอดภัย ธรรมรักษาครับเพื่อนๆG+\r\n**..รวมเพลง - GMM GRAMMY & Everlasting Love Songs 1..**\r\n.........เผยแพร่เมื่อ 30 ก.ค. 2014\r\n1.ไม่รู้จักฉัน ไม่รู้จักเธอ -- DA endorphine;Calories Blah Blah 00:00\r\n2.อยากรู้...แต่ไม่อยากถาม -- Calories Blah Blah 00:04:05\r\n3.แทงข้างหลัง..ทะลุถึงหัวใจ -- อ๊อฟ ปองศักดิ์ รัตนพงษ์ 00:07:14\r\n4.แค่คนอีกคน -- ปราโมทย์ วิเลปะนะ 00:11:51\r\n5.หนึ่งในไม่กี่คน -- สุนิตา ลีติกุล(โบ) 00:15:53\r\n6.เพื่อนสนิทคิดไม่ซื่อ -- ศรัณยู วินัยพานิช (ไอซ์) 00:19:55\r\n7.มีค่าเวลาเธอเหงา -- ปนัดดา เรืองวุฒิ 00:23:44\r\n8.Perhaps Love -- ศรัณยู วินัยพานิช (ไอซ์);ROSE ศิรินทิพย์ 00:28:09\r\n9.อยู่อย่างเหงาเหงา -- บอย Peacemaker 00:32:43\r\n10.คืนข้ามปี -- DA endorphine 00:37:28\r\n11.คำถามที่ต้องตอบ -- อ๊อฟ ปองศักดิ์ รัตนพงษ์ 00:41:08\r\n12.ความเจ็บปวด -- ปาล์มมี่ 00:44:52\r\n13.เกิดมาแค่รักกัน -- ศิรินทิพย์ หาญประดิษฐ์ ROSE 00:48:36\r\n14.ไม่ต้องรู้ว่าเราคบกันแบบไหน -- DA endorphine 00:53:02\r\n15.ชีวิตที่ขาดเธอ -- ปั๊บ Potato 00:56:53\r\n16.ความทรงจำสีจาง -- ปาล์มมี่ 01:01:04\r\n17.แพ้กลางคืน -- ปั๊บ Potato 01:04:12\r\n18.รักไม่ช่วยอะไร (Acoustic Version) -- นัท มีเรีย 01:08:56\r\n19.คนเจ้าน้ำตา -- นิว นภัสสร ภูธรใจ;จิ๋ว ปิยนุช เสือจงพรู 01:13:13\r\n20.ก้อนหินก้อนนั้น -- วง พาย 01:17:23\r\n21.จากคนรักเก่า -- อ๊อฟ ปองศักดิ์ รัตนพงษ์ 01:22:20\r\n22.เรื่องบนเตียง -- PEACEMAKER 01:27:17\r\n23.กรุณาพูดดังๆ -- ซีต้า ซาไลย์ 01:31:28\r\n24.ปากดี -- POTATO 01:35:21\r\nหมวดหมู่\r\nเพลง\r\nสัญญาอนุญาต\r\nสัญญาอนุญาตมาตรฐานของ YouTube﻿\r\nอ่านเพิ่มเติม (27 บรรทัด)\r\n59\r\n\r\nRarunn mananna ผ่าน Google+2 เดือนที่ผ่านมา\r\n\r\n,...มาอีกแล้วล่ะนะ...แบบนี้...ชุดนี้...ฟังแล้ว เป็นไง กันบ้าง..﻿\r\nตอบกลับ · 11\r\nดูทั้งหมด 2 คำตอบ\r\n\r\nRarunn mananna2 เดือนที่ผ่านมา\r\n\r\n+คุณชาย กลางสายฝน ..เพราะๆขอให้ มีความสุขในการฟังเพลงครับผม﻿\r\nตอบกลับ · \r\n\r\nYaowalad Promsan5 เดือนที่ผ่านมา\r\n\r\nชอบทุกเพลง..﻿\r\n16\r\n\r\nlulee pakawadeedilok2 สัปดาห์ที่ผ่านมา\r\n\r\nเบื่อโฆษณาขั้นมากๆเลยอ้ะเสียอารมมากมาย เซ็งอุตส่าห์จะฟังเพลงเพราะๆ รมเสียมากไม่ฟังแล้ว﻿\r\nตอบกลับ · \r\n\r\nJeabs Patvadee ผ่าน Google+6 เดือนที่ผ่านมา\r\n\r\nแม้ห่างไกลกัน อยากบอกเธอว่า ถ้าพอมีเวลาว่าง\r\nอยากชวนมานั่งฟังเพลง เพลงเดียวกัน^^ ได้มั้ย ^o^﻿\r\nตอบกลับ · 20\r\n\r\nImukdaharn Arsenal7 เดือนที่ผ่านมา\r\n\r\nเพราะมาก ๆ โคตรชอบอ่าา ฟินนนนฟริ๊งงงง >//////<﻿\r\nตอบกลับ · 3\r\n\r\nGarFiwld7 เดือนที่ผ่านมา\r\n\r\nเพราะมากครับ﻿\r\n2\r\n\r\nHoneY PN.7 เดือนที่ผ่านมา\r\n\r\nรวมเพลงแบบนี้ขายเป็นอัลบั้ม ก็ยังได้ จะซื้อเก็บไว้ฟังในรถ เบย﻿','2015-03-15 20:12:49','2015-03-15 20:12:49'),(27,1,16,'สวยจัง','2015-03-15 20:58:28','2015-03-15 20:58:28'),(28,33,14,'สวัสดีครับ','2015-03-17 17:52:46','2015-03-17 17:52:46'),(29,40,14,'comment from Firefox','2015-03-17 18:58:29','2015-03-17 18:58:29');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2013_02_05_024934_confide_setup_users_table',1),('2013_02_05_043505_create_posts_table',1),('2013_02_05_044505_create_comments_table',1),('2013_02_08_031702_entrust_setup_tables',1),('2013_05_21_024934_entrust_permissions',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reminders`
--

DROP TABLE IF EXISTS `password_reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reminders`
--

LOCK TABLES `password_reminders` WRITE;
/*!40000 ALTER TABLE `password_reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission_role_permission_id_role_id_unique` (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1,1),(8,1,3),(2,2,1),(9,2,3),(3,3,1),(4,4,1),(10,4,3),(5,5,1),(6,6,1),(7,6,2);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`),
  UNIQUE KEY `permissions_display_name_unique` (`display_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'manage_blogs','manage blogs'),(2,'manage_posts','manage posts'),(3,'manage_comments','manage comments'),(4,'manage_users','manage users'),(5,'manage_roles','manage roles'),(6,'post_comment','post comment');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'url,image path',
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `posts_user_id_index` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'Lorem ipsum dolor sit amet','lorem-ipsum-dolor-sit-amet','In mea autem etiam menandri, quot elitr vim ei, eos semper disputationi id? Per facer appetere eu, duo et animal maiestatis. Omnesque invidunt mnesarchum ex mel, vis no case senserit dissentias. Te mei minimum singulis inimicus, ne labores accusam necessitatibus vel, vivendo nominavi ne sed. Posidonium scriptorem consequuntur cum ex? Posse fabulas iudicabit in nec, eos cu electram forensibus, pro ei commodo tractatos reformidans. Qui eu lorem augue alterum, eos in facilis pericula mediocritatem?\r\n\r\nEst hinc legimus oporteat in. Sit ei melius delicatissimi. Duo ex qualisque adolescens! Pri cu solum aeque. Aperiri docendi vituperatoribus has ea!\r\n\r\nSed ut ludus perfecto sensibus, no mea iisque facilisi. Choro tation melius et mea, ne vis nisl insolens. Vero autem scriptorem cu qui? Errem dolores no nam, mea tritani platonem id! At nec tantas consul, vis mundi petentium elaboraret ex, mel appareat maiestatis at.\r\n\r\nSed et eros concludaturque. Mel ne aperiam comprehensam! Ornatus delicatissimi eam ex, sea an quidam tritani placerat? Ad eius iriure consequat eam, mazim temporibus conclusionemque eum ex.\r\n\r\nTe amet sumo usu, ne autem impetus scripserit duo, ius ei mutat labore inciderint! Id nulla comprehensam his? Ut eam deleniti argumentum, eam appellantur definitionem ad. Pro et purto partem mucius!\r\n\r\nCu liber primis sed, esse evertitur vis ad. Ne graeco maiorum mea! In eos nostro docendi conclusionemque. Ne sit audire blandit tractatos? An nec dicam causae meliore, pro tamquam offendit efficiendi ut.\r\n\r\nTe dicta sadipscing nam, denique albucius conclusionemque ne usu, mea eu euripidis philosophia! Qui at vivendo efficiendi! Vim ex delenit blandit oportere, in iriure placerat cum. Te cum meis altera, ius ex quis veri.\r\n\r\nMutat propriae eu has, mel ne veri bonorum tincidunt. Per noluisse sensibus honestatis ut, stet singulis ea eam, his dicunt vivendum mediocrem ei. Ei usu mutat efficiantur, eum verear aperiam definitiones an! Simul dicam instructior ius ei. Cu ius facer doming cotidieque! Quot principes eu his, usu vero dicat an.\r\n\r\nEx dicta perpetua qui, pericula intellegam scripserit id vel. Id fabulas ornatus necessitatibus mel. Prompta dolorem appetere ea has. Vel ad expetendis instructior!\r\n\r\nTe his dolorem adversarium? Pri eu rebum viris, tation molestie id pri. Mel ei stet inermis dissentias. Sed ea dolorum detracto vituperata. Possit oportere similique cu nec, ridens animal quo ex?','','meta_title1','meta_description1','meta_keywords1','2015-02-27 11:58:47','2015-02-27 11:58:47'),(2,1,'Vivendo suscipiantur vim te vix','vivendo-suscipiantur-vim-te-vix','In mea autem etiam menandri, quot elitr vim ei, eos semper disputationi id? Per facer appetere eu, duo et animal maiestatis. Omnesque invidunt mnesarchum ex mel, vis no case senserit dissentias. Te mei minimum singulis inimicus, ne labores accusam necessitatibus vel, vivendo nominavi ne sed. Posidonium scriptorem consequuntur cum ex? Posse fabulas iudicabit in nec, eos cu electram forensibus, pro ei commodo tractatos reformidans. Qui eu lorem augue alterum, eos in facilis pericula mediocritatem?\r\n\r\nEst hinc legimus oporteat in. Sit ei melius delicatissimi. Duo ex qualisque adolescens! Pri cu solum aeque. Aperiri docendi vituperatoribus has ea!\r\n\r\nSed ut ludus perfecto sensibus, no mea iisque facilisi. Choro tation melius et mea, ne vis nisl insolens. Vero autem scriptorem cu qui? Errem dolores no nam, mea tritani platonem id! At nec tantas consul, vis mundi petentium elaboraret ex, mel appareat maiestatis at.\r\n\r\nSed et eros concludaturque. Mel ne aperiam comprehensam! Ornatus delicatissimi eam ex, sea an quidam tritani placerat? Ad eius iriure consequat eam, mazim temporibus conclusionemque eum ex.\r\n\r\nTe amet sumo usu, ne autem impetus scripserit duo, ius ei mutat labore inciderint! Id nulla comprehensam his? Ut eam deleniti argumentum, eam appellantur definitionem ad. Pro et purto partem mucius!\r\n\r\nCu liber primis sed, esse evertitur vis ad. Ne graeco maiorum mea! In eos nostro docendi conclusionemque. Ne sit audire blandit tractatos? An nec dicam causae meliore, pro tamquam offendit efficiendi ut.\r\n\r\nTe dicta sadipscing nam, denique albucius conclusionemque ne usu, mea eu euripidis philosophia! Qui at vivendo efficiendi! Vim ex delenit blandit oportere, in iriure placerat cum. Te cum meis altera, ius ex quis veri.\r\n\r\nMutat propriae eu has, mel ne veri bonorum tincidunt. Per noluisse sensibus honestatis ut, stet singulis ea eam, his dicunt vivendum mediocrem ei. Ei usu mutat efficiantur, eum verear aperiam definitiones an! Simul dicam instructior ius ei. Cu ius facer doming cotidieque! Quot principes eu his, usu vero dicat an.\r\n\r\nEx dicta perpetua qui, pericula intellegam scripserit id vel. Id fabulas ornatus necessitatibus mel. Prompta dolorem appetere ea has. Vel ad expetendis instructior!\r\n\r\nTe his dolorem adversarium? Pri eu rebum viris, tation molestie id pri. Mel ei stet inermis dissentias. Sed ea dolorum detracto vituperata. Possit oportere similique cu nec, ridens animal quo ex?',NULL,'meta_title2','meta_description2','meta_keywords2','2015-02-27 11:58:47','2015-02-27 11:58:47'),(3,1,'In iisque similique reprimique eum','in-iisque-similique-reprimique-eum','In mea autem etiam menandri, quot elitr vim ei, eos semper disputationi id? Per facer appetere eu, duo et animal maiestatis. Omnesque invidunt mnesarchum ex mel, vis no case senserit dissentias. Te mei minimum singulis inimicus, ne labores accusam necessitatibus vel, vivendo nominavi ne sed. Posidonium scriptorem consequuntur cum ex? Posse fabulas iudicabit in nec, eos cu electram forensibus, pro ei commodo tractatos reformidans. Qui eu lorem augue alterum, eos in facilis pericula mediocritatem?\r\n\r\nEst hinc legimus oporteat in. Sit ei melius delicatissimi. Duo ex qualisque adolescens! Pri cu solum aeque. Aperiri docendi vituperatoribus has ea!\r\n\r\nSed ut ludus perfecto sensibus, no mea iisque facilisi. Choro tation melius et mea, ne vis nisl insolens. Vero autem scriptorem cu qui? Errem dolores no nam, mea tritani platonem id! At nec tantas consul, vis mundi petentium elaboraret ex, mel appareat maiestatis at.\r\n\r\nSed et eros concludaturque. Mel ne aperiam comprehensam! Ornatus delicatissimi eam ex, sea an quidam tritani placerat? Ad eius iriure consequat eam, mazim temporibus conclusionemque eum ex.\r\n\r\nTe amet sumo usu, ne autem impetus scripserit duo, ius ei mutat labore inciderint! Id nulla comprehensam his? Ut eam deleniti argumentum, eam appellantur definitionem ad. Pro et purto partem mucius!\r\n\r\nCu liber primis sed, esse evertitur vis ad. Ne graeco maiorum mea! In eos nostro docendi conclusionemque. Ne sit audire blandit tractatos? An nec dicam causae meliore, pro tamquam offendit efficiendi ut.\r\n\r\nTe dicta sadipscing nam, denique albucius conclusionemque ne usu, mea eu euripidis philosophia! Qui at vivendo efficiendi! Vim ex delenit blandit oportere, in iriure placerat cum. Te cum meis altera, ius ex quis veri.\r\n\r\nMutat propriae eu has, mel ne veri bonorum tincidunt. Per noluisse sensibus honestatis ut, stet singulis ea eam, his dicunt vivendum mediocrem ei. Ei usu mutat efficiantur, eum verear aperiam definitiones an! Simul dicam instructior ius ei. Cu ius facer doming cotidieque! Quot principes eu his, usu vero dicat an.\r\n\r\nEx dicta perpetua qui, pericula intellegam scripserit id vel. Id fabulas ornatus necessitatibus mel. Prompta dolorem appetere ea has. Vel ad expetendis instructior!\r\n\r\nTe his dolorem adversarium? Pri eu rebum viris, tation molestie id pri. Mel ei stet inermis dissentias. Sed ea dolorum detracto vituperata. Possit oportere similique cu nec, ridens animal quo ex?',NULL,'meta_title3','meta_description3','meta_keywords3','2015-02-27 11:58:47','2015-02-27 11:58:47'),(6,33,'hgjghj','hgjghj','ghjghjgh',NULL,'','','','2015-03-14 12:46:11','2015-03-14 12:46:11'),(7,33,'ghjghj','ghjghj','fghfghfg',NULL,'','','','2015-03-14 12:48:12','2015-03-14 12:48:12'),(8,33,'ASSSA','asssa','AAASA',NULL,'','','','2015-03-14 12:48:40','2015-03-14 12:48:40'),(9,33,'Xiaomi จับมือผู้ผลิตอุปกรณ์กีฬารายใหญ่ ร่วมพัฒนารองเท้าวิ่งอัจฉริยะ','Xiaomi จับมือผู้ผลิตอุปกรณ์กีฬารายใหญ่ ร่วมพัฒนารองเท้าวิ่งอัจฉริยะ','เพิ่งรุกเข้ามาในตลาดอุปกรณ์ไอทีสวมใส่ได้เมื่อไม่กี่เดือนก่อนด้วย Mi Band (อ่านรีวิวที่นี่) วันนี้ Huami บริษัทที่อยู่เบื้องหลังการพัฒนาสายรัดข้อมือรุ่นดังกล่าวก็เดินหน้าแผนไปอีกขั้นด้วยการจับมือกับ Li Ning บริษัทอุปกรณ์กีฬารายใหญ่ของจีนร่วมกันพัฒนารองเท้าอัจฉริยะสำหรับการออกกำลังแล้ว','https://lh3.googleusercontent.com/-es8iucFnp_M/VQekf0o4xII/AAAAAAAAZN0/--9AUuN9MI0/s658/612253.png','','','','2015-03-14 12:49:32','2015-03-14 12:49:32'),(10,33,'กูเกิลได้สิทธิในโดเมน .dev ไม่เปิดให้คนทั่วไปใช้งาน ธนาคารไทยพาณิชย์ถอนการขอ .scb','กูเกิลได้สิทธิในโดเมน .dev ไม่เปิดให้คนทั่วไปใช้งาน ธนาคารไทยพาณิชย์ถอนการขอ .scb','ในบรรดา gTLD (generic top-level domain) ที่ ICANN เปิดให้จองชื่อเพื่อไปให้บริการได้ มีรายชื่ออีกส่วนหนึ่งที่ใช้งานได้เฉพาะผู้ที่จดทะเบียนในองค์กรเท่านั้น ไม่สามารถเปิดขายให้กับบุคคลภายนอกได้ กลุ่มนี้จะได้รับยกเว้นไม่ต้องมีจรรยาบรรณสำหรับการให้บริการ ในรายชื่อทั้งหมดมีหลายชื่อน่าสนใจ','https://www.blognone.com/sites/default/files/imagecache/news-thumbnail/category_pictures/icann.png','','','','2015-03-14 12:52:54','2015-03-14 12:52:54'),(11,33,'Facebook อธิบายลักษณะเนื้อหาที่ห้ามโพสต์: ภาพโป๊เปลือย เฮทสปีช กราฟิกเนื้อหารุนแรง','การปรับเอกสาร Community Standards ของ Facebook นอกจากประเด็นเรื่องชื่อจริง ยังมีประเด็นเกี่ยวกับเนื้อหาที่ Facebook ไม่ยอมให้โพสต์และจะลบทิ้งหรือจำกัดการแสดงผลถ้าได้รับรายงาน','วันก่อนเห็นมีคนเอาข้อมูลจาก opendata จาก http://data.go.th/  มาใช้งานวันนี้ผมลองเขียน api สำหรับบอกข้อมูลว่า ณ. location ที่เราอยู่เราอยู่ใกล้ตำบลอะไร จังหวัดอะไร ส่งข้อมูลเป็น lat long ที่เป็นเลขฐาน 10\r\nไปลองทดลองใช้กันได้ครับที่ http://api.conf.in.th:8081/distance?lat1=100.1&lon1=30.2','https://i.imgur.com/WWv5sCd.png','','','','2015-03-14 12:54:11','2015-03-14 12:54:11'),(12,33,'ต้อนรับ Apple Watch! เตรียม Yo กันจากข้อมือได้เร็วๆ นี้','ต้อนรับ Apple Watch! เตรียม Yo กันจากข้อมือได้เร็วๆ นี้','ในงาน SXSW Interactive ผู้ก่อตั้ง Yo แอพแจ้งเตือนที่เคยทำได้แค่การส่งข้อความสั้นสองตัวอักษร (อ่านข่าวเก่า) แต่ตอนนี้เพิ่มฟีเจอร์เข้ามามากมายเช่นการแนบลิงก์ ส่งที่อยู่อย่างไวในอัพเดตหลังๆ ประกาศว่ากำลังพัฒนาแอพสำหรับ Apple Watch แล้ว','https://lh5.googleusercontent.com/-aT6oBTEVk48/VQet_4VCNfI/AAAAAAAAZOY/nKJpI5w7bvs/s1024/yo-notification.jpg','','','','2015-03-14 12:54:43','2015-03-14 12:54:43'),(13,33,'ร้อนแรง! ผลทดสอบ HTC One M9 ยืนยันปัญหาความร้อนของ Snapdragon 810','ร้อนแรง! ผลทดสอบ HTC One M9 ยืนยันปัญหาความร้อนของ Snapdragon 810','ถูกพูดถึงกันมาพักใหญ่ว่า Snapdragon 810 ชิปรุ่นเรือธงตัวใหม่ของ Qualcomm มีปัญหาความร้อน จนซัมซุงหนีไปใช้รุ่นอื่นแทน แต่ก็ยังมีผู้ผลิตบางรายที่ยังใช้ชิปรุ่นนี้อยู่ ได้แก่ Xiaomi Note Pro, G Flex 2 และล่าสุด HTC One M9','https://lh4.googleusercontent.com/-Ka1SgwUnOAQ/VQfDU-sNmtI/AAAAAAAAZQA/sYU6Plmw7C4/s610/2000587739.jpeg','','','','2015-03-14 12:56:20','2015-03-14 12:56:20'),(14,33,'Facebook ปรับปรุงมาตรฐานการอยู่ร่วมในชุมชน (Community Standards)','Facebook ปรับปรุงมาตรฐานการอยู่ร่วมในชุมชน (Community Standards)','ในทุกๆ วัน ผู้คนรอบโลกใช้ Facebook เชื่อมต่อระหว่างครอบครัวและเพื่อน แบ่งปันข่าวสารหรือเรื่องของตัวเอง ดังนั้นจะมีบทสนทนามากมายที่เกิดขึ้น และก็มีบางเรื่องที่อาจจะเป็นอันตรายต่อสังคม จึงทำให้ Facebook ปรับปรุง Community Standards เพื่อทำให้ผู้คนเข้าใจได้ว่าเนื้อหาใดที่อนุญาตให้แชร์ได้ใน Facebook โดยมีเนื้อหา 4 หมวดหลักคือ','https://i.imgur.com/OmJHbhb.png','','','','2015-03-14 12:57:29','2015-03-14 16:57:29'),(15,32,'ตำนานชีวิต Airbnb - มีห้องว่างอย่านิ่งดูดาย ขึ้นโลกออนไลน์ให้ผู้คนเช่า','ตำนานชีวิต Airbnb - มีห้องว่างอย่านิ่งดูดาย ขึ้นโลกออนไลน์ให้ผู้คนเช่า','แนวคิดธุรกิจแบบ Sharing Economy กำลังเบ่งบานบนโลกออนไลน์ ใครมีทรัพยากรอะไรก็นำมาแลกเปลี่ยนกันบนนี้โดยไม่ต้องพึ่งพาระบบซื้อ-ขาย-เช่าแบบเดิม ไม่ว่าจะเป็นระบบขนส่งโดย Uber, จ้างคนช่วยงานกับ TaskRabbit หรือการเช่าห้องพักทั่วโลกซึ่งผู้คนทั่วไปนำมาปล่อยเช่ากับ Airbnb เรามาอัพเดตเรื่องราวชีวิตของสตาร์ตอัพรายนี้กัน','http://i.imgur.com/7YKuI73.png','','','','2015-03-14 12:59:03','2015-03-14 12:59:03'),(16,32,'พรีวิว Final Fantasy XV -Episode Duscae- ครั้งแรกกับเดโมจริงของเกมที่ใช้เวลาพัฒนากว่า 8 ปี','พรีวิว Final Fantasy XV -Episode Duscae- ครั้งแรกกับเดโมจริงของเกมที่ใช้เวลาพัฒนากว่า 8 ปี','วันนี้ (17 มีนาคม 2558) เป็นวันแรกที่เกม Final Fantasy Type-0 HD วางจำหน่ายอย่างเป็นทางการ ซึ่งในล็อตแรกสุด (Day-Zero) มีของแถมพิเศษเป็นเดโมเกม Final Fantasy XV -Episode Duscae- แถมติดมาด้วย (ถ้าใครซื้อไม่ทัน ใน Online Store ของทั้งสองแพลตฟอร์มมีเวอร์ชัน Early Bird ขายอยู่ มีแถมเหมือนกัน) ซึ่งผมก็ไม่รอช้าที่จะสอยเกมมาเล่น (เพราะผมไม่เคยเล่น Type-0 บน PSP) และจัดแจงจองเกมเอาไว้ตั้งแต่ปลายเดือนก่อนแล้ว','https://upic.me/i/4s/finalfantasyxvepisodeduscae_20150317182641.jpg','meta_title3','meta_description3','meta_keywords3','2015-03-14 13:14:23','2015-03-14 13:14:23');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','2015-02-27 11:58:48','2015-02-27 11:58:48'),(2,'comment','2015-02-27 11:58:48','2015-02-27 11:58:48'),(3,'Facebook','2015-03-04 08:50:23','2015-03-04 08:50:23');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(25) unsigned NOT NULL AUTO_INCREMENT,
  `idSocial` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `channel` enum('facebook','google','normal') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'normal',
  `first_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `accessToken` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idSocial` (`idSocial`),
  KEY `channel` (`channel`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'','normal','Administrator','Ads','admin','admin@example.org','$2y$10$ghBd/d9zMG6ZnKfY87NOoexnFhlgM1vQ0COPkwW.bvse9nleGECDO','0151bc61e207d44bbf5f30a37d301f00','RozwaIZoxB2uhSiYSwntXajmUrRvCbRwTl4DlgYM1ZW6AIdyF5lStHRF5zKS',1,'2015-02-27 11:58:47','2015-03-08 18:45:56',NULL,NULL),(2,'','normal','User','','user','user@example.org','$2y$10$xeCZuuzCJF37dLjZFQJNp.6K.0ONqtQDe5ySP2EemQT2c3Waexo5y','f29d38efcb84f29983fafa95c77bc3d1','aR0LWgEBoSFC5VvOt0HqvKOsewLPMCf4L9vuSqeLe8Q1l6550XEjZPjY3eJL',1,'2015-02-27 11:58:47','2015-03-08 18:44:26',NULL,NULL),(32,'781657808522800','facebook','FakeLow','Sunnysun','781657808522800','781657808522800@facebook.com','$2y$10$h9/95vricGHo7lPUF11cHetcEjYEysqunuIQfcgmsxM7bW6sJe/L2','19d2d0329e1ff72b789ac58b69b489bc','995SgZps9IqDQUV4IDjoByxCkKK5MleFAT5GOD6pAFzUC3GDQUWVzHEa8PgU',1,'2015-03-07 09:10:53','2015-03-17 15:21:59',NULL,NULL),(33,'101042819275144348449','google','รังสิมันต์','หารวงษา','101042819275144348449','sunnamaja@gmail.com','$2y$10$DpsyZWjJ6jR0P/a0xAgV8.C9KyDO3dswqg5Ugku7brAw5C/ld5yyK','d6ddcbd08e7dd7462e796ad6f2b850bb','l8Zbd9GTTc1psRaAZ9Jayf9hHAx7EXl147CMjOWjp3BpFL8MXWSlXEzKklTM',1,'2015-03-07 09:11:14','2015-03-16 16:40:26',NULL,'https://lh3.googleusercontent.com/-52VNjqMXwhc/AAAAAAAAAAI/AAAAAAAAAo0/BJ1zBEY0Rv8/photo.jpg'),(34,'108136833060276699787','google','Rangsimant','Hanwongsa','108136833060276699787','rangsimant@thothmedia.com','$2y$10$2oFR2OoIzwZv1w8tKzzMsekytgzSViIU.18HlfdBWxQj355fHzmVW','511bae991aae1a2466550dedd97bcead','jcpTg2U8uSa0WothUrJlZxEc7J13xiRDDWLZ1EBjGiZwBCmimWPAuBvT8cjl',1,'2015-03-07 09:13:27','2015-03-07 13:39:57',NULL,'https://lh6.googleusercontent.com/-4R8ZitY2aFM/AAAAAAAAAAI/AAAAAAAAAAw/Qws6idK_Iro/photo.jpg'),(39,'10205861312399635','facebook','Pat','Noble','10205861312399635','pat_l.k_jung.26@hotmail.com','$2y$10$1FaPvBsLgVaw7bcEj7Vks.1/wYfz.cS2vLKk8rwMYy8WEUmiD0hqG','d788c85b9d6d66b2e688411ccff6818e','l9RBMxCS6lldTpGmPpsFr4WRg0dFPo6GOG80ONbYpOtm1GI1DtumdePvNdMp',1,'2015-03-07 10:49:34','2015-03-07 10:50:09',NULL,NULL),(40,'107081782975283674846','google','Rangsimant','Hanwongsa','107081782975283674846','hanwongsa.r@gmail.com','$2y$10$fVJb275tcxg9l1M0shluo.XSDGerFSa75Mtg.Vg5gA5IT2HnWzM3q','3f1f5629e4265416eaa2f5b630def3b2','F2UzTwS6Bd6jffcQuCnXkisaE4ulSkgV31B6BZr9R9ChhRKNYNYvi8pnsywK',1,'2015-03-07 11:25:17','2015-03-13 13:49:09',NULL,'https://lh6.googleusercontent.com/-i5_AWopQHkY/AAAAAAAAAAI/AAAAAAAAABI/UeECV1wfhwM/photo.jpg'),(42,'','normal','AAAA','AAAA','aaa','asds@sdfsd.com','$2y$10$.HIKCHvDrY03z2cWCnEeaeJal810rzHDbS/y.Qg8ri1kJeAtjImUO','6ac5979e9c5ae14f3bf12486f3f7b824','YCwopVFPEBGEtUECV5dGIK2VstKLrIA4ngIlvZmojz9gIhbwlJHOVX6B74eN',1,'2015-03-11 18:56:24','2015-03-11 19:01:27',NULL,NULL),(43,'','normal','ณเดช','สุกกี้มั้ยจ๊ะ','sunnamaja','sunnamaja@hotmail.com','$2y$10$9yFQZJrWoqspW0poQTAkzeaNIW3ml2dqJVWVOTKsH9jGgLFp2T8bK','409c6ea180f2543554d05e9349b8be3b','nDSAPL1H3tS1hRT7vlqEPUxxf1C0jqPCWyKtJuCNTqRpOZmdBKJDeMMIzazf',1,'2015-03-14 15:47:34','2015-03-14 15:57:34',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vote` (
  `idVote` int(11) NOT NULL AUTO_INCREMENT,
  `vote` int(1) NOT NULL,
  `type` enum('agree','disagree') NOT NULL,
  `Post` int(10) unsigned NOT NULL,
  `User` int(25) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idVote`),
  UNIQUE KEY `idVote_UNIQUE` (`idVote`),
  KEY `vote_INDEX` (`type`,`vote`),
  KEY `vote_User_FK_idx` (`User`),
  KEY `vote_Post_FK_idx` (`Post`),
  CONSTRAINT `vote_Post_FK` FOREIGN KEY (`Post`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vote_User_FK` FOREIGN KEY (`User`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vote`
--

LOCK TABLES `vote` WRITE;
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
INSERT INTO `vote` VALUES (1,1,'agree',14,33,'2015-03-15 17:20:08','2015-03-15 17:20:08'),(2,1,'agree',14,33,'2015-03-15 17:20:10','2015-03-15 17:20:10'),(3,1,'agree',14,33,'2015-03-15 17:20:12','2015-03-15 17:20:12'),(4,1,'agree',16,33,'2015-03-15 17:20:28','2015-03-15 17:20:28'),(5,1,'disagree',16,33,'2015-03-15 17:20:45','2015-03-15 17:20:45'),(6,1,'disagree',16,33,'2015-03-15 17:20:52','2015-03-15 17:20:52'),(7,1,'agree',15,33,'2015-03-15 17:21:18','2015-03-15 17:21:18'),(8,1,'agree',15,33,'2015-03-15 17:21:20','2015-03-15 17:21:20'),(9,1,'agree',15,33,'2015-03-15 17:21:20','2015-03-15 17:21:20'),(10,1,'agree',15,33,'2015-03-15 17:21:21','2015-03-15 17:21:21'),(11,1,'agree',15,33,'2015-03-15 17:21:21','2015-03-15 17:21:21'),(12,1,'agree',15,33,'2015-03-15 17:21:21','2015-03-15 17:21:21'),(13,1,'agree',15,33,'2015-03-15 17:21:22','2015-03-15 17:21:22'),(14,1,'agree',15,33,'2015-03-15 17:21:22','2015-03-15 17:21:22'),(15,1,'agree',15,33,'2015-03-15 17:21:22','2015-03-15 17:21:22'),(16,1,'agree',15,33,'2015-03-15 17:21:22','2015-03-15 17:21:22'),(17,1,'agree',15,33,'2015-03-15 17:21:22','2015-03-15 17:21:22'),(18,1,'agree',15,33,'2015-03-15 17:21:22','2015-03-15 17:21:22'),(19,1,'agree',15,33,'2015-03-15 17:21:23','2015-03-15 17:21:23'),(20,1,'agree',15,33,'2015-03-15 17:21:24','2015-03-15 17:21:24'),(21,1,'agree',15,33,'2015-03-15 17:21:25','2015-03-15 17:21:25'),(22,1,'agree',15,33,'2015-03-15 17:21:25','2015-03-15 17:21:25'),(23,1,'agree',15,33,'2015-03-15 17:21:25','2015-03-15 17:21:25'),(24,1,'agree',15,33,'2015-03-15 17:21:25','2015-03-15 17:21:25'),(25,1,'agree',15,33,'2015-03-15 17:21:25','2015-03-15 17:21:25'),(26,1,'agree',15,33,'2015-03-15 17:21:25','2015-03-15 17:21:25'),(27,1,'agree',15,33,'2015-03-15 17:21:26','2015-03-15 17:21:26'),(28,1,'agree',15,33,'2015-03-15 17:21:26','2015-03-15 17:21:26'),(29,1,'agree',15,33,'2015-03-15 17:21:26','2015-03-15 17:21:26'),(30,1,'agree',15,33,'2015-03-15 17:21:26','2015-03-15 17:21:26'),(31,1,'agree',15,33,'2015-03-15 17:21:26','2015-03-15 17:21:26'),(32,1,'agree',15,33,'2015-03-15 17:21:26','2015-03-15 17:21:26'),(33,1,'agree',15,33,'2015-03-15 17:21:26','2015-03-15 17:21:26'),(34,1,'agree',15,33,'2015-03-15 17:21:27','2015-03-15 17:21:27'),(35,1,'agree',15,33,'2015-03-15 17:21:27','2015-03-15 17:21:27'),(36,1,'agree',15,33,'2015-03-15 17:21:27','2015-03-15 17:21:27'),(37,1,'agree',15,33,'2015-03-15 17:21:27','2015-03-15 17:21:27'),(38,1,'agree',15,33,'2015-03-15 17:21:27','2015-03-15 17:21:27'),(39,1,'agree',15,33,'2015-03-15 17:21:27','2015-03-15 17:21:27'),(40,1,'agree',15,33,'2015-03-15 17:21:28','2015-03-15 17:21:28'),(41,1,'agree',15,33,'2015-03-15 17:21:28','2015-03-15 17:21:28'),(42,1,'agree',15,33,'2015-03-15 17:21:28','2015-03-15 17:21:28'),(43,1,'agree',15,33,'2015-03-15 17:21:28','2015-03-15 17:21:28'),(44,1,'agree',15,33,'2015-03-15 17:21:28','2015-03-15 17:21:28'),(45,1,'agree',15,33,'2015-03-15 17:21:28','2015-03-15 17:21:28'),(46,1,'agree',15,33,'2015-03-15 17:21:29','2015-03-15 17:21:29'),(47,1,'agree',15,33,'2015-03-15 17:21:29','2015-03-15 17:21:29'),(48,1,'agree',15,33,'2015-03-15 17:21:29','2015-03-15 17:21:29'),(49,1,'agree',15,33,'2015-03-15 17:21:32','2015-03-15 17:21:32'),(50,1,'agree',15,33,'2015-03-15 17:21:33','2015-03-15 17:21:33'),(51,1,'agree',15,33,'2015-03-15 17:21:33','2015-03-15 17:21:33'),(52,1,'agree',15,33,'2015-03-15 17:21:33','2015-03-15 17:21:33'),(53,1,'agree',15,33,'2015-03-15 17:21:33','2015-03-15 17:21:33'),(54,1,'agree',15,33,'2015-03-15 17:21:33','2015-03-15 17:21:33'),(55,1,'agree',15,33,'2015-03-15 17:21:33','2015-03-15 17:21:33'),(56,1,'agree',15,33,'2015-03-15 17:21:34','2015-03-15 17:21:34'),(57,1,'agree',15,33,'2015-03-15 17:21:34','2015-03-15 17:21:34'),(58,1,'agree',15,33,'2015-03-15 17:21:34','2015-03-15 17:21:34'),(59,1,'agree',15,33,'2015-03-15 17:21:34','2015-03-15 17:21:34'),(60,1,'agree',15,33,'2015-03-15 17:21:34','2015-03-15 17:21:34'),(61,1,'agree',15,33,'2015-03-15 17:21:35','2015-03-15 17:21:35'),(62,1,'agree',15,33,'2015-03-15 17:21:35','2015-03-15 17:21:35'),(63,1,'agree',15,33,'2015-03-15 17:21:35','2015-03-15 17:21:35'),(64,1,'agree',15,33,'2015-03-15 17:21:35','2015-03-15 17:21:35'),(65,1,'agree',15,33,'2015-03-15 17:21:35','2015-03-15 17:21:35'),(66,1,'agree',15,33,'2015-03-15 17:21:36','2015-03-15 17:21:36'),(67,1,'agree',15,33,'2015-03-15 17:21:37','2015-03-15 17:21:37'),(68,1,'agree',15,33,'2015-03-15 17:21:38','2015-03-15 17:21:38'),(69,1,'agree',15,33,'2015-03-15 17:21:38','2015-03-15 17:21:38'),(70,1,'agree',15,33,'2015-03-15 17:21:40','2015-03-15 17:21:40'),(71,1,'agree',15,33,'2015-03-15 17:21:41','2015-03-15 17:21:41'),(72,1,'disagree',15,33,'2015-03-15 17:21:45','2015-03-15 17:21:45'),(73,1,'disagree',15,33,'2015-03-15 17:35:38','2015-03-15 17:35:38'),(74,1,'agree',14,33,'2015-03-15 18:49:09','2015-03-15 18:49:09'),(75,1,'agree',14,33,'2015-03-15 18:49:11','2015-03-15 18:49:11'),(76,1,'agree',16,43,'2015-03-15 19:11:28','2015-03-15 19:11:28'),(77,1,'agree',16,43,'2015-03-15 19:12:59','2015-03-15 19:12:59'),(78,1,'agree',16,43,'2015-03-15 19:13:09','2015-03-15 19:13:09'),(79,1,'agree',15,33,'2015-03-15 20:09:07','2015-03-15 20:09:07'),(80,1,'disagree',15,33,'2015-03-15 20:09:09','2015-03-15 20:09:09'),(81,1,'disagree',15,33,'2015-03-15 20:09:10','2015-03-15 20:09:10'),(82,1,'disagree',15,33,'2015-03-15 20:09:10','2015-03-15 20:09:10'),(83,1,'disagree',14,43,'2015-03-15 20:40:41','2015-03-15 20:40:41'),(84,1,'agree',7,43,'2015-03-15 20:45:02','2015-03-15 20:45:02'),(85,1,'agree',7,43,'2015-03-15 20:45:09','2015-03-15 20:45:09'),(86,1,'disagree',7,43,'2015-03-15 20:45:12','2015-03-15 20:45:12'),(87,1,'agree',14,33,'2015-03-16 15:13:22','2015-03-16 15:13:22'),(88,1,'agree',14,33,'2015-03-16 15:13:25','2015-03-16 15:13:25'),(89,1,'agree',14,1,'2015-03-16 17:50:21','2015-03-16 17:50:21'),(90,1,'agree',14,1,'2015-03-16 17:50:25','2015-03-16 17:50:25'),(91,1,'disagree',14,1,'2015-03-16 17:50:27','2015-03-16 17:50:27'),(92,1,'disagree',14,1,'2015-03-16 17:50:30','2015-03-16 17:50:30'),(93,1,'disagree',14,1,'2015-03-16 17:50:33','2015-03-16 17:50:33'),(94,1,'agree',14,1,'2015-03-16 17:50:35','2015-03-16 17:50:35'),(95,1,'agree',14,1,'2015-03-16 17:50:38','2015-03-16 17:50:38'),(96,1,'agree',14,1,'2015-03-16 17:50:41','2015-03-16 17:50:41'),(97,1,'agree',14,1,'2015-03-16 17:50:43','2015-03-16 17:50:43'),(98,1,'agree',14,1,'2015-03-16 17:50:44','2015-03-16 17:50:44'),(99,1,'agree',14,1,'2015-03-16 17:50:48','2015-03-16 17:50:48'),(100,1,'disagree',14,32,'2015-03-17 15:03:17','2015-03-17 15:03:17'),(101,1,'agree',16,33,'2015-03-17 18:02:39','2015-03-17 18:02:39'),(102,1,'agree',16,33,'2015-03-17 18:02:41','2015-03-17 18:02:41'),(103,1,'agree',16,33,'2015-03-17 18:02:43','2015-03-17 18:02:43'),(104,1,'agree',16,33,'2015-03-17 18:02:43','2015-03-17 18:02:43'),(105,1,'agree',16,33,'2015-03-17 18:02:44','2015-03-17 18:02:44'),(106,1,'agree',16,33,'2015-03-17 18:02:44','2015-03-17 18:02:44'),(107,1,'agree',16,33,'2015-03-17 18:02:45','2015-03-17 18:02:45'),(108,1,'agree',16,33,'2015-03-17 18:02:45','2015-03-17 18:02:45'),(109,1,'agree',16,33,'2015-03-17 18:02:45','2015-03-17 18:02:45'),(110,1,'agree',16,33,'2015-03-17 18:02:45','2015-03-17 18:02:45'),(111,1,'agree',16,33,'2015-03-17 18:02:45','2015-03-17 18:02:45'),(112,1,'agree',16,33,'2015-03-17 18:02:45','2015-03-17 18:02:45'),(113,1,'agree',16,33,'2015-03-17 18:02:45','2015-03-17 18:02:45'),(114,1,'agree',16,33,'2015-03-17 18:02:46','2015-03-17 18:02:46'),(115,1,'agree',16,33,'2015-03-17 18:02:46','2015-03-17 18:02:46'),(116,1,'agree',16,33,'2015-03-17 18:02:46','2015-03-17 18:02:46'),(117,1,'agree',16,33,'2015-03-17 18:02:46','2015-03-17 18:02:46'),(118,1,'agree',16,33,'2015-03-17 18:02:46','2015-03-17 18:02:46'),(119,1,'agree',16,33,'2015-03-17 18:02:46','2015-03-17 18:02:46'),(120,1,'agree',16,33,'2015-03-17 18:02:46','2015-03-17 18:02:46'),(121,1,'agree',16,33,'2015-03-17 18:02:47','2015-03-17 18:02:47'),(122,1,'agree',16,33,'2015-03-17 18:02:47','2015-03-17 18:02:47'),(123,1,'agree',16,33,'2015-03-17 18:02:47','2015-03-17 18:02:47'),(124,1,'agree',16,33,'2015-03-17 18:02:47','2015-03-17 18:02:47'),(125,1,'agree',16,33,'2015-03-17 18:02:47','2015-03-17 18:02:47'),(126,1,'disagree',16,33,'2015-03-17 18:02:50','2015-03-17 18:02:50');
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-18 22:02:51
