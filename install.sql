/*Table structure for table `core_categories` */

DROP TABLE IF EXISTS `core_categories`;

CREATE TABLE `core_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `core_categories` */

insert  into `core_categories`(`id`,`title`) values (1,'Категория #1'),(2,'Категория #2');

/*Table structure for table `core_discussions` */

DROP TABLE IF EXISTS `core_discussions`;

CREATE TABLE `core_discussions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `text` text COLLATE utf8_bin,
  `category_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `views_count` int(11) DEFAULT '0',
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `core_discussions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `core_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `core_discussions` */

insert  into `core_discussions`(`id`,`title`,`text`,`category_id`,`date`,`status`,`user_id`,`views_count`,`customer_id`) values (2,'test','testt test teste etst teste2',1,'2012-05-26 22:59:23',1,1,17,NULL),(3,'Test2','Test2 Test2 Test2 Test2 Test2 Test2',1,'2012-05-27 15:26:40',1,1,5,NULL),(4,'Тест 3','Тест 3 Тест 3 Тест 3 Тест 3',1,'2012-05-27 19:42:17',1,1,3,NULL),(5,'Новый пост','Пост в категории №2',2,'2012-06-03 21:16:12',1,1,150,NULL),(6,'test','test',1,'2012-09-01 18:46:47',1,NULL,3,1);

/*Table structure for table `core_posts` */

DROP TABLE IF EXISTS `core_posts`;

CREATE TABLE `core_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8_bin,
  `discussion_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_posts_ibfk_1` (`discussion_id`),
  CONSTRAINT `core_posts_ibfk_1` FOREIGN KEY (`discussion_id`) REFERENCES `core_discussions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `core_posts` */

insert  into `core_posts`(`id`,`text`,`discussion_id`,`date`,`user_id`,`customer_id`) values (1,'test test2',2,'2012-05-27 21:25:03',1,NULL),(2,'Еще один коммнатрий',4,'2012-06-03 18:10:46',1,NULL),(3,'добавим поддержку маркдаун',4,'2012-06-03 18:11:14',1,NULL),(4,'Нужно проверить пагинацию',3,'2012-06-03 18:24:48',1,NULL),(5,'Новый комментарий',5,'2012-06-03 21:19:23',1,NULL),(6,'фывфыв',5,'2012-06-03 21:42:17',1,NULL),(7,'ываыва',5,'2012-06-03 21:42:21',1,NULL),(8,'ываыва',5,'2012-06-03 21:42:24',1,NULL),(9,'авпвап',5,'2012-06-03 21:42:28',1,NULL),(10,'вапвап',5,'2012-06-03 21:42:32',1,NULL),(11,'впвапывап',5,'2012-06-03 21:42:37',1,NULL),(12,'впывап',5,'2012-06-03 21:42:41',1,NULL),(13,'фывфыв',5,'2012-06-03 21:49:22',1,NULL),(15,'вапрвапр',5,'2012-06-03 21:49:31',1,NULL),(16,'вапрвапр',5,'2012-06-03 21:49:35',1,NULL),(17,'апрвапрвп',5,'2012-06-03 21:49:40',1,NULL),(18,'This is a twelve column section in a row. Each of these includes a div.panel element so you can see where the columns are - it`s not required at all for the grid.',5,'2012-06-03 21:49:47',1,NULL),(19,'This is a twelve column section in a row. Each of these includes a div.panel element so you can see where the columns are - it`s not required at all for the grid.',5,'2012-06-03 21:50:00',1,NULL),(20,'This is a twelve column section in a row. Each of these includes a div.panel element so you can see where the columns are - it`s not required at all for the grid.',5,'2012-06-03 21:50:08',1,NULL),(21,'This is a twelve column section in a row. Each of these includes a div.panel element so you can see where the columns are - it`s not required at all for the grid.',5,'2012-06-03 21:50:18',1,NULL),(24,'test',5,'2012-06-03 22:50:34',1,NULL),(25,'sdfsdfsdf',5,'2012-06-03 22:51:23',1,NULL),(27,'sdfsdfsdf',5,'2012-06-03 22:54:42',1,NULL),(28,'test',2,'2012-09-01 18:43:42',1,NULL),(29,'test2',6,'2012-09-01 18:46:54',1,NULL);