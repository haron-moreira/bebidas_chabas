CREATE DATABASE  IF NOT EXISTS `bebidas_chabas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `bebidas_chabas`;
-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: bebidas_chabas
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

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
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(65) NOT NULL,
  `fabricante` varchar(45) NOT NULL,
  `tipo_volume` varchar(45) NOT NULL,
  `qtd_volume` int(11) NOT NULL,
  `qtd_estoque` int(11) NOT NULL,
  `comercializado` bit(1) NOT NULL DEFAULT b'1',
  `dt_primeiro_cadastro` datetime DEFAULT NULL,
  `dt_ultima_alteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (1,'Vodka Absolut','Absolut Company','ML',1000,1210,'',NULL,NULL),(2,'Whisky Johnnie Walker Black Label','Diageo','ML',1000,560,'',NULL,NULL),(3,'Tequila Don Julio Reposado','Diageo','ML',750,2960,'',NULL,NULL),(4,'Gin Beefeater','Pernod Ricard','ML',750,10,'',NULL,NULL),(5,'Rum Bacardi Superior','Bacardi Limited','ML',750,735,'',NULL,NULL),(6,'Cachaça Ypióca Ouro','Ypióca Agroindustrial','ML',1000,48,'',NULL,NULL),(7,'Vinho tinto Château Margaux','Château Margaux','ML',750,82,'',NULL,NULL),(8,'Vinho branco Sauvignon Blanc Cloudy Bay','Cloudy Bay Vineyards','ML',750,68,'',NULL,NULL),(9,'Vinho rosé Whispering Angel','Château d\'Esclans','ML',750,40,'',NULL,NULL),(10,'Champanhe Moët & Chandon Brut Impérial','Moët & Chandon','ML',750,15,'',NULL,NULL),(11,'Cerveja belga Chimay Blue','Abbaye de Scourmont','ML',750,0,'',NULL,NULL),(12,'Cerveja alemã Weihenstephaner Hefe Weissbier','Bayerische Staatsbrauerei Weihenstephan','ML',500,0,'',NULL,NULL),(13,'Cerveja inglesa Fuller\'s ESB','Fuller\'s Brewery','ML',500,0,'',NULL,NULL),(14,'Cerveja americana Sierra Nevada Pale Ale','Sierra Nevada Brewing Co.','ML',355,0,'',NULL,NULL),(15,'Cerveja mexicana Corona Extra','Grupo Modelo','ML',355,0,'',NULL,NULL),(16,'Cerveja brasileira Wäls Niobium','Cervejaria Wäls','ML',375,0,'',NULL,NULL),(17,'Cerveja portuguesa Super Bock Stout','Super Bock Group','ML',330,0,'',NULL,NULL),(18,'Cerveja japonesa Kirin Ichiban','Kirin Brewery Company','ML',330,38,'',NULL,NULL),(19,'Cerveja holandesa La Trappe Quadrupel','Bierbrouwerij De Koningshoeven','ML',330,0,'',NULL,NULL),(20,'Vermute Carpano Antica Formula','Francesco Carpano','ML',1000,0,'',NULL,NULL),(21,'Aperol Spritz','Campari Group','ML',1000,0,'',NULL,NULL),(22,'Licor de café Kahlúa','Pernod Ricard','ML',750,0,'',NULL,NULL),(23,'Licor de menta Creme de Menthe Peppermint','Marie Brizard','ML',700,0,'',NULL,NULL),(24,'Licor de anis Pernod','Pernod Ricard','ML',700,0,'',NULL,NULL),(25,'Licor de cereja Cherry Heering','Peter F. Heering','ML',700,0,'',NULL,NULL),(26,'Licor de laranja Grand Marnier','Campari Group','ML',700,0,'',NULL,NULL),(27,'Água com gás','Schweppes','ML',2000,100,'',NULL,NULL),(28,'Água sem gás','Crystal','ML',2000,150,'',NULL,NULL),(29,'Água tônica','Schweppes','ML',1000,80,'',NULL,NULL),(30,'Refrigerante Coca-Cola','Coca-Cola Company','ML',2000,120,'',NULL,NULL),(31,'Refrigerante Pepsi','PepsiCo','ML',2000,80,'',NULL,NULL),(32,'Suco de laranja','Del Valle','ML',1000,50,'',NULL,NULL),(33,'Suco de uva','Maguary','ML',1000,30,'',NULL,NULL),(34,'Suco de maçã','Juxx','ML',1000,40,'',NULL,NULL),(35,'Chá mate','Lipton','ML',2000,60,'',NULL,NULL),(36,'Chá verde','Nestea','ML',2000,50,'',NULL,NULL),(37,'Chá de hibisco','Twinings','ML',1000,40,'',NULL,NULL),(38,'Leite integral','Nestlé','ML',1000,20,'',NULL,NULL),(39,'Leite desnatado','Itambé','ML',1000,15,'',NULL,NULL),(40,'Leite de coco','Sococo','ML',200,50,'',NULL,NULL),(41,'Iogurte natural','Nestlé','ML',500,30,'',NULL,NULL),(42,'Iogurte de frutas','Danone','Unidades',1,60,'',NULL,NULL),(43,'Queijo minas frescal','Tirolez','Gramas',500,40,'',NULL,NULL),(44,'Manteiga','Aviação','Gramas',200,25,'',NULL,NULL),(45,'Cream cheese','Philadelphia','Gramas',150,30,'',NULL,NULL),(46,'Patê de frango','Perdigão','Gramas',100,50,'',NULL,NULL),(47,'Gelo em cubos','Iceberg','Quilos',1,100,'',NULL,NULL),(48,'Gelo triturado','Polar','Quilos',1,50,'',NULL,NULL),(49,'Gelo em escamas','Arctic','Quilos',1,30,'',NULL,NULL),(50,'Gelo seco','Dry Ice','Quilos',1,20,'',NULL,NULL),(51,'Gelo em pacotes','Crystal Ice','Unidades',10,80,'',NULL,NULL),(52,'Gelo em barras','Ice Bar','Quilos',2,40,'',NULL,NULL),(53,'Gelo em esferas','Ice Ball','Unidades',1,60,'',NULL,NULL),(54,'Gelo colorido','Crazy Ice','Unidades',50,30,'',NULL,NULL),(55,'Gelo em formato de coração','Love Ice','Unidades',5,20,'',NULL,NULL),(56,'Gelo comestível','Freezable','Unidades',10,15,'',NULL,NULL),(57,'Whisky Jack Daniel\'s','Jack Daniel\'s','ML',750,50,'',NULL,NULL),(58,'Whisky Johnnie Walker Red Label','Johnnie Walker','ML',1000,70,'',NULL,NULL),(59,'Whisky Johnnie Walker Black Label','Johnnie Walker','ML',1000,40,'',NULL,NULL),(60,'Whisky Ballantine\'s','Ballantine\'s','ML',1000,60,'',NULL,NULL),(61,'Whisky Chivas Regal','Chivas Brothers','ML',1000,30,'',NULL,NULL),(62,'Whisky Jameson','Jameson Irish Whiskey','ML',750,50,'',NULL,NULL),(63,'Whisky Glenfiddich 12 anos','Glenfiddich','ML',750,20,'',NULL,NULL),(64,'Whisky Macallan','The Macallan Distillers','ML',750,30,'',NULL,NULL),(65,'Whisky Talisker','Talisker Distillery','ML',700,-35,'',NULL,NULL),(66,'Whisky Lagavulin','Lagavulin Distillery','ML',750,15,'',NULL,NULL),(67,'Whisky Laphroaig','Laphroaig Distillery','ML',700,20,'',NULL,NULL),(68,'Whisky Glenlivet','The Glenlivet Distillery','ML',750,25,'',NULL,NULL),(69,'Whisky Hibiki','Suntory','ML',700,35,'',NULL,NULL),(70,'Whisky Nikka','Nikka Whisky Distilling Co.','ML',700,45,'',NULL,NULL),(71,'Whisky Yamazaki','Suntory','ML',700,30,'',NULL,NULL),(72,'Whisky Buffalo Trace','Buffalo Trace Distillery','ML',750,50,'',NULL,NULL),(73,'Whisky Maker\'s Mark','Maker\'s Mark Distillery','ML',750,40,'',NULL,NULL),(74,'Whisky Woodford Reserve','Woodford Reserve Distillery','ML',750,30,'',NULL,NULL),(75,'Whisky Wild Turkey','Wild Turkey Distillery','ML',750,20,'',NULL,NULL),(76,'Whisky Jim Beam','Jim Beam Brands Co.','ML',750,25,'',NULL,NULL),(77,'Vodka Absolut','The Absolut Company','ML',750,50,'',NULL,NULL),(78,'Vodka Smirnoff','Diageo','ML',1000,70,'',NULL,NULL),(79,'Vodka Belvedere','LVMH','ML',1000,40,'',NULL,NULL),(80,'Vodka Grey Goose','Bacardi','ML',1000,60,'',NULL,NULL),(81,'Vodka Ketel One','Ketel One Distillery','ML',1000,30,'',NULL,NULL),(82,'Vodka Cîroc','Diageo','ML',750,50,'',NULL,NULL),(83,'Vodka Stolichnaya','SPI Group','ML',750,20,'',NULL,NULL),(84,'Vodka Beluga','Mariinsk Distillery','ML',750,30,'',NULL,NULL),(85,'Vodka Russian Standard','Russian Standard Vodka','ML',700,25,'',NULL,NULL),(86,'Vodka Eristoff','Bacardi','ML',750,15,'',NULL,NULL),(87,'Vodka Finlandia','Altia','ML',700,20,'',NULL,NULL),(88,'Vodka Skyy','Campari Group','ML',750,25,'',NULL,NULL),(89,'Vodka Reyka','William Grant & Sons','ML',700,35,'',NULL,NULL),(90,'Vodka Absolut Elyx','The Absolut Company','ML',700,45,'',NULL,NULL),(91,'Vodka Beluga Gold Line','Mariinsk Distillery','ML',700,30,'',NULL,NULL),(92,'Vodka Grey Goose La Poire','Bacardi','ML',750,50,'',NULL,NULL),(93,'Vodka Ketel One Botanical','Ketel One Distillery','ML',750,40,'',NULL,NULL),(94,'Vodka Absolut Juice Pear & Elderflower','The Absolut Company','ML',750,30,'',NULL,NULL),(95,'Vodka Crystal Head','Crystal Head Vodka','ML',750,20,'',NULL,NULL),(96,'Vodka Svedka','Constellation Brands','ML',750,25,'',NULL,NULL),(97,'Vinho tinto Château Margaux','Château Margaux','ML',750,10,'',NULL,NULL),(98,'Vinho tinto Château Latour','Château Latour','ML',750,20,'',NULL,NULL),(99,'Vinho tinto Château Lafite Rothschild','Château Lafite Rothschild','ML',750,15,'',NULL,NULL),(100,'Vinho tinto Petrus','Petrus','ML',750,5,'',NULL,NULL),(101,'Vinho tinto Vega Sicilia Único','Vega Sicilia','ML',750,30,'',NULL,NULL),(102,'Vinho tinto Pingus','Pingus','ML',750,25,'',NULL,NULL),(103,'Vinho tinto Ornellaia','Ornellaia','ML',750,35,'',NULL,NULL),(104,'Vinho tinto Sassicaia','Tenuta San Guido','ML',750,40,'',NULL,NULL),(105,'Vinho tinto Masseto','Masseto','ML',750,10,'',NULL,NULL),(106,'Vinho branco Chardonnay','Domaine Leflaive','ML',750,15,'',NULL,NULL),(107,'Vinho branco Sauvignon Blanc','Domaine de la Romanée-Conti','ML',750,20,'',NULL,NULL),(108,'Vinho branco Riesling','Egon Müller-Scharzhof','ML',750,25,'',NULL,NULL),(109,'Vinho branco Sauternes','Château d\'Yquem','ML',375,5,'',NULL,NULL),(110,'Vinho rosé Domaines Ott','Domaines Ott','ML',750,30,'',NULL,NULL),(111,'Vinho do Porto Graham\'s 40 anos','Graham\'s','ML',750,10,'',NULL,NULL),(112,'Vinho do Porto Taylor\'s 40 anos','Taylor\'s','ML',750,15,'',NULL,NULL),(113,'Vinho do Porto Quinta do Noval Nacional Vintage','Quinta do Noval','ML',750,5,'',NULL,NULL),(114,'Vinho do Porto Dow\'s Vintage','Dow\'s','ML',750,20,'',NULL,NULL),(115,'Vinho do Porto Warre\'s Vintage','Warre\'s','ML',750,25,'',NULL,NULL),(116,'Gin Beefeater','Beefeater','ML',750,50,'',NULL,NULL),(117,'Gin Bombay Sapphire','Bombay Sapphire','ML',750,70,'',NULL,NULL),(118,'Gin Tanqueray','Tanqueray','ML',750,40,'',NULL,NULL),(119,'Gin Hendrick\'s','Hendrick\'s','ML',750,60,'',NULL,NULL),(120,'Gin Bulldog','Bulldog Gin Company','ML',750,30,'',NULL,NULL),(121,'Gin Gordon\'s','Gordon\'s Gin','ML',750,50,'',NULL,NULL),(122,'Gin Seagram\'s','Seagram\'s Gin','ML',750,20,'',NULL,NULL),(123,'Gin Martin Miller\'s','Martin Miller\'s Gin','ML',700,30,'',NULL,NULL),(124,'Gin Roku','Roku Gin','ML',700,25,'',NULL,NULL),(125,'Gin Monkey 47','Monkey 47','ML',500,15,'',NULL,NULL),(126,'Gin Aviation','Aviation Gin','ML',750,20,'',NULL,NULL),(127,'Gin Plymouth','Plymouth Gin','ML',750,25,'',NULL,NULL),(128,'Gin The Botanist','The Botanist Gin','ML',750,35,'',NULL,NULL),(129,'Gin No. 3','No. 3 Gin','ML',700,45,'',NULL,NULL),(130,'Gin Bluecoat','Bluecoat Gin','ML',750,30,'',NULL,NULL),(131,'Gin G\'Vine Floraison','G\'Vine Gin','ML',750,50,'',NULL,NULL),(132,'Gin Sipsmith London Dry','Sipsmith Gin','ML',750,40,'',NULL,NULL),(133,'Gin Bulldog Bold','Bulldog Gin Company','ML',750,30,'',NULL,NULL),(134,'Gin Brockmans','Brockmans Gin','ML',750,20,'',NULL,NULL),(135,'Tequila Jose Cuervo Especial','Jose Cuervo','ML',750,50,'',NULL,NULL),(136,'Tequila Patrón Silver','Patrón Spirits','ML',750,70,'',NULL,NULL),(137,'Tequila Don Julio Blanco','Don Julio','ML',750,40,'',NULL,NULL),(138,'Tequila Sauza Hornitos Plata','Sauza Tequila','ML',750,60,'',NULL,NULL),(139,'Tequila 1800 Reposado','1800 Tequila','ML',750,30,'',NULL,NULL),(140,'Tequila Olmeca Altos Plata','Olmeca Tequila','ML',750,50,'',NULL,NULL),(141,'Tequila El Jimador Reposado','El Jimador','ML',750,20,'',NULL,NULL),(142,'Tequila Casamigos Blanco','Casamigos Tequila','ML',750,30,'',NULL,NULL),(143,'Tequila Herradura Silver','Herradura Tequila','ML',750,25,'',NULL,NULL),(144,'Tequila Cazadores Blanco','Cazadores Tequila','ML',750,15,'',NULL,NULL),(145,'Tequila Milagro Silver','Milagro Tequila','ML',750,20,'',NULL,NULL),(146,'Tequila Avión Silver','Avión Tequila','ML',750,25,'',NULL,NULL),(147,'Tequila Clase Azul Plata','Clase Azul Tequila','ML',750,25,'',NULL,NULL),(148,'Tequila Corralejo Reposado','Corralejo Tequila','ML',750,35,'',NULL,NULL),(149,'Tequila Fortaleza Blanco','Tequila Fortaleza','ML',750,45,'',NULL,NULL),(150,'Tequila Casa Noble Crystal','Casa Noble Tequila','ML',750,30,'',NULL,NULL),(151,'Tequila Espolòn Blanco','Espolòn Tequila','ML',750,50,'',NULL,NULL),(152,'Tequila Maestro Dobel Silver','Maestro Dobel Tequila','ML',750,40,'',NULL,NULL),(153,'Tequila Tres Generaciones Plata','Tres Generaciones Tequila','ML',750,30,'',NULL,NULL),(154,'Tequila El Tesoro Platinum','Tequila El Tesoro','ML',750,20,'',NULL,NULL),(155,'Champagne Veuve Clicquot Brut','Veuve Clicquot Ponsardin','ML',750,20,'',NULL,NULL),(156,'Champagne Dom Perignon Brut Vintage','Moet & Chandon','ML',750,10,'',NULL,NULL),(157,'Champagne Krug Grande Cuvee Brut','Krug','ML',750,5,'',NULL,NULL),(158,'Champagne Louis Roederer Cristal','Louis Roederer','ML',750,15,'',NULL,NULL),(159,'Champagne Bollinger R.D. Extra Brut','Bollinger','ML',750,10,'',NULL,NULL),(160,'Champagne Taittinger Comtes de Champagne Blanc de Blancs','Taittinger','ML',750,20,'',NULL,NULL),(161,'Champagne Laurent-Perrier Grand Siecle','Laurent-Perrier','ML',750,25,'',NULL,NULL),(162,'Champagne Moet & Chandon Imperial Brut','Moet & Chandon','ML',750,30,'',NULL,NULL),(163,'Champagne Perrier-Jouet Belle Epoque','Perrier-Jouet','ML',750,20,'',NULL,NULL),(164,'Champagne Pol Roger Brut Reserve','Pol Roger','ML',750,15,'',NULL,NULL),(165,'Champagne Ruinart Blanc de Blancs','Ruinart','ML',750,25,'',NULL,NULL),(166,'Champagne Veuve Clicquot La Grande Dame','Veuve Clicquot Ponsardin','ML',750,10,'',NULL,NULL),(167,'Champagne Moet & Chandon Rose Imperial','Moet & Chandon','ML',750,30,'',NULL,NULL),(168,'Champagne Louis Roederer Cristal Rose','Louis Roederer','ML',750,5,'',NULL,NULL),(169,'Champagne Piper-Heidsieck Rare Brut','Piper-Heidsieck','ML',750,10,'',NULL,NULL),(170,'Champagne Charles Heidsieck Brut Reserve','Charles Heidsieck','ML',750,20,'',NULL,NULL),(171,'Champagne Veuve Clicquot Demi-Sec','Veuve Clicquot Ponsardin','ML',750,15,'',NULL,NULL),(172,'Champagne Gosset Grand Reserve Brut','Gosset','ML',750,25,'',NULL,NULL),(173,'Champagne Moet & Chandon Nectar Imperial','Moet & Chandon','ML',750,30,'',NULL,NULL),(174,'Champagne Krug Rose','Krug','ML',750,5,'',NULL,NULL),(175,'Rum Bacardi Carta Blanca','Bacardi','ML',750,50,'',NULL,NULL),(176,'Rum Captain Morgan','Captain Morgan','ML',750,70,'',NULL,NULL),(177,'Rum Havana Club 3 anos','Havana Club','ML',700,40,'',NULL,NULL),(178,'Rum Malibu','Pernod Ricard','ML',700,60,'',NULL,NULL),(179,'Rum Myers\'s','Myers\'s Rum','ML',750,30,'',NULL,NULL),(180,'Rum Sailor Jerry','Sailor Jerry Ltd.','ML',750,50,'',NULL,NULL),(181,'Rum Appleton Estate','Appleton Estate','ML',700,20,'',NULL,NULL),(182,'Rum Ron Zacapa 23 anos','Zacapa','ML',750,30,'',NULL,NULL),(183,'Rum Mount Gay','Mount Gay Distilleries','ML',700,25,'',NULL,NULL),(184,'Rum Angostura','Angostura Holdings','ML',750,15,'',NULL,NULL),(185,'Rum Ron Barceló','Barceló','ML',700,20,'',NULL,NULL),(186,'Rum Brugal','Brugal','ML',750,25,'',NULL,NULL),(187,'Rum Flor de Caña','Flor de Caña','ML',700,35,'',NULL,NULL),(188,'Rum Diplomático','Destilerías Unidas S.A.','ML',700,45,'',NULL,NULL),(189,'Rum Gosling\'s Black Seal','Gosling Brothers Ltd.','ML',750,30,'',NULL,NULL),(190,'Rum Matusalem','Matusalem & Company','ML',750,40,'',NULL,NULL),(191,'Rum Ron del Barrilito','Ron del Barrilito','ML',750,30,'',NULL,NULL),(192,'Rum Wray & Nephew','J. Wray and Nephew Ltd.','ML',700,20,'',NULL,NULL),(193,'Rum Cacique','Destilerías Unidas S.A.','ML',750,25,'',NULL,NULL),(194,'Cachaça 51','Companhia Müller de Bebidas','ML',1000,80,'',NULL,NULL),(195,'Cachaça Sagatiba','Pernod Ricard','ML',700,50,'',NULL,NULL),(196,'Cachaça Ypióca','Ypióca Agroindustrial','ML',1000,70,'',NULL,NULL),(197,'Cachaça Velho Barreiro','Indústria e Comércio Velho Barreiro','ML',1000,60,'',NULL,NULL),(198,'Cachaça Pirassununga 51','Companhia Müller de Bebidas','ML',1000,90,'',NULL,NULL),(199,'Cachaça Weber Haus','Weber Haus Destilaria Artesanal','ML',700,30,'',NULL,NULL),(200,'Cachaça Leblon','Cachaça Leblon Ltda','ML',700,40,'',NULL,NULL),(201,'Cachaça Nêga Fulô','Fazenda Soledade Indústria e Comércio LTDA','ML',700,25,'',NULL,NULL),(202,'Cachaça Seleta','Engenho Camargo Corrêa','ML',700,20,'',NULL,NULL),(203,'Cachaça Magnífica','Destilaria Magnífica','ML',700,15,'',NULL,NULL),(204,'Cachaça 51','Companhia Müller de Bebidas','ML',1000,80,'',NULL,NULL),(205,'Cachaça Sagatiba','Pernod Ricard','ML',700,50,'',NULL,NULL),(206,'Cachaça Ypióca','Ypióca Agroindustrial','ML',1000,70,'',NULL,NULL),(207,'Cachaça Velho Barreiro','Indústria e Comércio Velho Barreiro','ML',1000,60,'',NULL,NULL),(208,'Cachaça Pirassununga 51','Companhia Müller de Bebidas','ML',1000,90,'',NULL,NULL),(209,'Cachaça Weber Haus','Weber Haus Destilaria Artesanal','ML',700,30,'',NULL,NULL),(210,'Cachaça Leblon','Cachaça Leblon Ltda','ML',700,40,'',NULL,NULL),(211,'Cachaça Nêga Fulô','Fazenda Soledade Indústria e Comércio LTDA','ML',700,25,'',NULL,NULL),(212,'Cachaça Seleta','Engenho Camargo Corrêa','ML',700,20,'',NULL,NULL),(213,'Cachaça Magnífica','Destilaria Magnífica','ML',700,15,'',NULL,NULL),(214,'Skol Pilsen','Ambev','ML',350000,100,'',NULL,NULL),(215,'Brahma Pilsen','Ambev','ML',350000,120,'',NULL,NULL),(216,'Bohemia','Ambev','ML',355000,80,'',NULL,NULL),(217,'Antarctica Pilsen','Ambev','ML',350000,90,'',NULL,NULL),(218,'Original','Ambev','ML',600000,70,'',NULL,NULL),(219,'Serramalte','Ambev','ML',600000,60,'',NULL,NULL),(220,'Heineken','Heineken','ML',355000,50,'',NULL,NULL),(221,'Stella Artois','AB InBev','ML',275000,40,'',NULL,NULL),(222,'Corona Extra','Grupo Modelo','ML',355000,30,'',NULL,NULL),(223,'Budweiser','AB InBev','ML',355000,20,'',NULL,NULL),(224,'Colorado','Cervejaria Colorado','ML',600000,10,'',NULL,NULL),(225,'Eisenbahn','Cervejaria Sudbrack','ML',600000,15,'',NULL,NULL),(226,'Patagônia','Cervecería Patagonia','ML',740000,25,'',NULL,NULL),(227,'Baden Baden','Cervejaria Baden Baden','ML',600000,20,'',NULL,NULL),(228,'Wäls','Cervejaria Wäls','ML',600000,30,'',NULL,NULL),(229,'Bohemia Confraria','Ambev','ML',600000,40,'',NULL,NULL),(230,'Leffe Blonde','AB InBev','ML',330000,35,'',NULL,NULL),(231,'Paulaner','Paulaner Brauerei GmbH & Co. KG','ML',500000,45,'',NULL,NULL),(232,'Franziskaner','Spaten-Franziskaner-Bräu GmbH','ML',500000,55,'',NULL,NULL),(233,'Erdinger Weissbier','Erdinger Weissbräu','ML',500000,50,'',NULL,NULL),(234,'Cerveja Skol','Ambev','ML',269,0,'',NULL,NULL),(235,'Guaraná Jesus','The Coca-cola Company','ML',350,3000,'',NULL,NULL),(236,'Guaraviton','Guaravita','ML',280,0,'','2023-04-24 21:36:42','2023-04-24 21:36:42'),(237,'Danone','Danone','ML',900,0,'\0','2023-04-24 21:38:19','2023-04-24 21:38:19'),(238,'Guaraná','Antartica','ML',2000,2,'','2023-04-24 21:38:57','2023-04-24 21:38:57'),(239,'Suco Tang','Tang','ML',1000,1030,'','2023-04-28 18:47:34','2023-04-28 18:47:34'),(240,'Chá Mate','Mate Leão','ML',250,122,'\0','2023-04-28 19:50:17','2023-04-28 19:50:17');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nm_usuario` varchar(45) NOT NULL,
  `login_usuario` varchar(45) NOT NULL,
  `senha_usuario` varchar(130) NOT NULL,
  `nv_acesso` int(11) NOT NULL,
  `status` bit(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Root','Root','b123e9e19d217169b981a61188920f9d28638709a5132201684d792b9264271b7f09157ed4321b1c097f7a4abecfc0977d40a7ee599c845883bd1074ca23c4af',2,''),(2,'José Silva','jose','b123e9e19d217169b981a61188920f9d28638709a5132201684d792b9264271b7f09157ed4321b1c097f7a4abecfc0977d40a7ee599c845883bd1074ca23c4af',1,''),(3,'Anderson','ed','5796eff413af73eeab41fef01ccfef0ebba646daa09cc073bfbc9c0bec4807b4cd78da143f0a076c7c7d61395275651a17eba14b1ea8e492512032e36253fb56',1,''),(4,'Edson','edson','eef35e3f6f06ef5a349b24908145a0c6f4f27a87049b522e3416685a7f038d6f58118f642fbb58daa087e170c68927f5971989150cf7818554825334585ee8ea',2,'');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venda`
--

DROP TABLE IF EXISTS `venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL AUTO_INCREMENT,
  `qtd_produto` int(11) NOT NULL,
  `list_produtos` text NOT NULL,
  `dt_compra` datetime NOT NULL,
  PRIMARY KEY (`id_venda`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venda`
--

LOCK TABLES `venda` WRITE;
/*!40000 ALTER TABLE `venda` DISABLE KEYS */;
INSERT INTO `venda` VALUES (1,10,'[{\"id\":1,\"quantidade\":10},{\"id\":2,\"quantidade\":10},{\"id\":3,\"quantidade\":10},{\"id\":4,\"quantidade\":10},{\"id\":5,\"quantidade\":10},{\"id\":6,\"quantidade\":10},{\"id\":7,\"quantidade\":10},{\"id\":8,\"quantidade\":10},{\"id\":9,\"quantidade\":10},{\"id\":10,\"quantidade\":10}]','2023-04-28 18:34:52'),(2,10,'[{\"id\":1,\"quantidade\":10},{\"id\":2,\"quantidade\":10},{\"id\":3,\"quantidade\":10},{\"id\":4,\"quantidade\":10},{\"id\":5,\"quantidade\":10},{\"id\":6,\"quantidade\":10},{\"id\":7,\"quantidade\":10},{\"id\":8,\"quantidade\":10},{\"id\":9,\"quantidade\":10},{\"id\":10,\"quantidade\":10}]','2023-04-28 18:36:05'),(3,10,'[{\"id\":1,\"quantidade\":10},{\"id\":2,\"quantidade\":10},{\"id\":3,\"quantidade\":10},{\"id\":4,\"quantidade\":10},{\"id\":5,\"quantidade\":10},{\"id\":6,\"quantidade\":10},{\"id\":7,\"quantidade\":10},{\"id\":8,\"quantidade\":10},{\"id\":9,\"quantidade\":10},{\"id\":10,\"quantidade\":10}]','2023-04-28 18:36:46'),(4,10,'[{\"id\":1,\"quantidade\":10},{\"id\":2,\"quantidade\":10},{\"id\":3,\"quantidade\":10},{\"id\":4,\"quantidade\":10},{\"id\":5,\"quantidade\":10},{\"id\":6,\"quantidade\":10},{\"id\":7,\"quantidade\":10},{\"id\":8,\"quantidade\":10},{\"id\":9,\"quantidade\":10},{\"id\":10,\"quantidade\":10}]','2023-04-28 19:51:42'),(5,55,'[{\"id\":5,\"quantidade\":55}]','2023-05-19 14:56:55'),(6,63,'[{\"id\":8,\"quantidade\":63}]','2023-05-19 14:58:00'),(7,12,'[{\"id\":18,\"quantidade\":12}]','2023-05-19 14:58:16'),(8,1,'[{\"id\":65,\"quantidade\":1}]','2023-05-19 14:58:29'),(9,1,'[{\"id\":65,\"quantidade\":1}]','2023-05-19 14:58:30'),(10,1,'[{\"id\":65,\"quantidade\":1}]','2023-05-19 14:58:31'),(11,1,'[{\"id\":65,\"quantidade\":1}]','2023-05-19 14:58:32'),(12,35,'[{\"id\":65,\"quantidade\":35}]','2023-05-19 15:19:27'),(13,35,'[{\"id\":65,\"quantidade\":35}]','2023-05-19 15:25:36'),(14,35,'[{\"id\":65,\"quantidade\":35}]','2023-06-02 18:07:56');
/*!40000 ALTER TABLE `venda` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-02  9:40:27
