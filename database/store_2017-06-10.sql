# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: store
# Generation Time: 2017-06-10 02:21:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table carts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `open_id` varchar(50) COLLATE utf8_general_ci NOT NULL,
  `count` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `goods_id` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img_url` varchar(500) COLLATE utf8_general_ci DEFAULT NULL,
  `name` varchar(30) COLLATE utf8_general_ci DEFAULT NULL,
  `total_price` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;

INSERT INTO `carts` (`id`, `open_id`, `count`, `goods_id`, `remember_token`, `created_at`, `updated_at`, `img_url`, `name`, `total_price`)
VALUES
	(9,'11','1','1',NULL,'2017-05-08 06:38:51','2017-05-08 06:38:51','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1493967240595&di=af6d4ebc635af5febea13db1edc0b81b&imgtype=0&src=http%3A%2F%2Fimg3.jc001.cn%2Fwgoods%2F71%2F93%2F719359adfbd871d1dbdf60ca39006e92.jpg','实木楼梯',1341),
	(13,'11','3','1',NULL,'2017-05-24 14:13:44','2017-05-24 14:13:44','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1493967240595&di=af6d4ebc635af5febea13db1edc0b81b&imgtype=0&src=http%3A%2F%2Fimg3.jc001.cn%2Fwgoods%2F71%2F93%2F719359adfbd871d1dbdf60ca39006e92.jpg','实木楼梯',1341),
	(14,'ou1v9s5uL1MidSgFotMKJtW-iIfc','1','1',NULL,'2017-06-09 03:55:30','2017-06-09 03:55:30','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1493967240595&di=af6d4ebc635af5febea13db1edc0b81b&imgtype=0&src=http%3A%2F%2Fimg3.jc001.cn%2Fwgoods%2F71%2F93%2F719359adfbd871d1dbdf60ca39006e92.jpg','实木楼梯',1341),
	(15,'ou1v9s5uL1MidSgFotMKJtW-iIfc','1','1',NULL,'2017-06-09 03:56:07','2017-06-09 03:56:07','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1493967240595&di=af6d4ebc635af5febea13db1edc0b81b&imgtype=0&src=http%3A%2F%2Fimg3.jc001.cn%2Fwgoods%2F71%2F93%2F719359adfbd871d1dbdf60ca39006e92.jpg','实木楼梯',1341),
	(16,'ou1v9s5uL1MidSgFotMKJtW-iIfc','1','1',NULL,'2017-06-09 04:00:26','2017-06-09 04:00:26','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1493967240595&di=af6d4ebc635af5febea13db1edc0b81b&imgtype=0&src=http%3A%2F%2Fimg3.jc001.cn%2Fwgoods%2F71%2F93%2F719359adfbd871d1dbdf60ca39006e92.jpg','实木楼梯',1341),
	(17,'ou1v9s5uL1MidSgFotMKJtW-iIfc','1','1',NULL,'2017-06-09 04:04:05','2017-06-09 04:04:05','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1493967240595&di=af6d4ebc635af5febea13db1edc0b81b&imgtype=0&src=http%3A%2F%2Fimg3.jc001.cn%2Fwgoods%2F71%2F93%2F719359adfbd871d1dbdf60ca39006e92.jpg','实木楼梯',1341),
	(18,'ou1v9s5uL1MidSgFotMKJtW-iIfc','1','1',NULL,'2017-06-09 04:20:45','2017-06-09 04:20:45','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1493967240595&di=af6d4ebc635af5febea13db1edc0b81b&imgtype=0&src=http%3A%2F%2Fimg3.jc001.cn%2Fwgoods%2F71%2F93%2F719359adfbd871d1dbdf60ca39006e92.jpg','实木楼梯',1341),
	(19,'ou1v9s5uL1MidSgFotMKJtW-iIfc','1','1',NULL,'2017-06-09 04:21:07','2017-06-09 04:21:07','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1493967240595&di=af6d4ebc635af5febea13db1edc0b81b&imgtype=0&src=http%3A%2F%2Fimg3.jc001.cn%2Fwgoods%2F71%2F93%2F719359adfbd871d1dbdf60ca39006e92.jpg','实木楼梯',1341);

/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table goods
# ------------------------------------------------------------

DROP TABLE IF EXISTS `goods`;

CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_general_ci DEFAULT NULL,
  `intro` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `imgUrl` varchar(1000) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;

INSERT INTO `goods` (`id`, `name`, `type`, `intro`, `price`, `imgUrl`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'实木楼梯','成品楼梯','这是一款实木楼梯','1341','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1493967240595&di=af6d4ebc635af5febea13db1edc0b81b&imgtype=0&src=http%3A%2F%2Fimg3.jc001.cn%2Fwgoods%2F71%2F93%2F719359adfbd871d1dbdf60ca39006e92.jpg',NULL,NULL,NULL),
	(2,'实木楼梯3','成品楼梯','这是一款实木楼梯2号','2341','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1493967240595&di=220a5f6500642af1faf2649b70ba05fc&imgtype=0&src=http%3A%2F%2Fimages.onccc.com%2Fi001%2F2014%2F05%2F27%2F81%2Fmiddle_756c528a7b9bc1074f869f71d1bc8429.jpg',NULL,NULL,NULL),
	(3,'铁花扶手1','楼梯扶手','这是一个铁花扶手','827','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1494502589146&di=0bbd1883459bbae8edc7878b60fa9e77&imgtype=0&src=http%3A%2F%2Ffiles1.szhome.com%2FUploadFiles%2FBBS%2F2004%2F03%2F14%2F3037257_82490.3.jpg',NULL,NULL,NULL),
	(4,'菠萝格1','实木门','菠萝格木门的另一个优点是，他们是环保，它们还有助于建立个人隐私。菠萝格不同的风格和设计都是现成的。菠萝格很受欢迎，在传统以及当代物业。','24','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1495093604062&di=9a6b0abaf5fd8b4714efb78a2a174e55&imgtype=0&src=http%3A%2F%2Fwww.china-juhao.com%2Fkeditor%2Fattached%2Fimage%2F20141120%2F20141120113355_92117.jpg',NULL,NULL,NULL),
	(5,'菠萝格2','实木门','菠萝格木门的另一个优点是，他们是环保，它们还有助于建立个人隐私。菠萝格不同的风格和设计都是现成的。菠萝格很受欢迎，在传统以及当代物业。','5688','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1495094928776&di=946e3ee0d7d1173810d612bd634b7aec&imgtype=0&src=http%3A%2F%2Fwww.oupudoors.com%2FUploadFiles%2Fb_b_2013117134827484.jpg',NULL,NULL,NULL),
	(6,'实木扶手1','楼梯扶手','这是一个楼梯扶手的相关描述','1003','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1495095106283&di=5d7a25e9542def349c3ac3899553ab09&imgtype=0&src=http%3A%2F%2Fimgsrc.baidu.com%2Fforum%2Fw%253D580%2Fsign%3D31fc15fb4e086e066aa83f4332097b5a%2Fbb2322a4462309f7193724d8700e0cf3d6cad60e.jpg',NULL,NULL,NULL);

/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2017_05_05_032516_create_order_table',2),
	(4,'2017_05_05_032528_create_user_table',2),
	(5,'2017_05_05_032541_create_goods_table',2),
	(6,'2017_05_05_033642_create_carts_table',3);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `number` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `total_price` int(20) DEFAULT NULL,
  `progress` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_general_ci DEFAULT '',
  `sex` varchar(10) COLLATE utf8_general_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_general_ci DEFAULT '',
  `address` varchar(255) COLLATE utf8_general_ci DEFAULT '',
  `access_token` varchar(255) COLLATE utf8_general_ci DEFAULT '',
  `openid` varchar(255) COLLATE utf8_general_ci DEFAULT '',
  `wx_name` varchar(255) COLLATE utf8_general_ci DEFAULT '',
  `avatar` varchar(1000) COLLATE utf8_general_ci DEFAULT '',
  `refresh_token` varchar(100) COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `sex`, `phone`, `address`, `access_token`, `openid`, `wx_name`, `avatar`, `refresh_token`, `created_at`, `updated_at`)
VALUES
	(1,'张',NULL,'1871277777','东秦','','11','Kaling','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1493896761373&di=767c1f59416f5eee6f4ec9c8dd9248b2&imgtype=0&src=http%3A%2F%2Fimg3.duitang.com%2Fuploads%2Fitem%2F201602%2F12%2F20160212214325_iFSaZ.thumb.224_0.jpeg',NULL,NULL,NULL),
	(2,'','1','','','','ou1v9s5uL1MidSgFotMKJtW-iIfc','余嘉陵','http://wx.qlogo.cn/mmopen/fWRDBYbZDXIzsIvSTgLPAiamnicmtEpnIqNZtibMnmy4F6dRYbHeXXjVdficoNggLVibQHIYDj74mENmibjkYY0pORIvAShVian1QSn/0',NULL,'2017-06-09 03:43:13','2017-06-09 03:43:13'),
	(3,'','1','','','','oTdXV051joj3r7JxrzDaR9V64WfM','余嘉陵','http://wx.qlogo.cn/mmopen/8fhicNibPsqmh0mgiabXQ6vZ3KZtvtaLyib8DU8n4Ha9IlKk1CfYK04KG4C7ML8gG7No7sZiacz0bVXFy28bcSt6zDzvVZBUmWcFP/0',NULL,'2017-06-09 09:34:25','2017-06-09 09:34:25');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
