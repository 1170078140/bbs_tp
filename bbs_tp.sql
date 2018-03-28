-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: bbs1709
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

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
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webname` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `copy` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (2,'火星时代论坛','1709期','5a65862367a5f.png','YangPan',1);
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friendlink`
--

DROP TABLE IF EXISTS `friendlink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friendlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linkname` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL DEFAULT '',
  `ctime` varchar(50) DEFAULT '0',
  `ordernum` tinyint(4) NOT NULL DEFAULT '1',
  `status` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `linkname` (`linkname`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friendlink`
--

LOCK TABLES `friendlink` WRITE;
/*!40000 ALTER TABLE `friendlink` DISABLE KEYS */;
INSERT INTO `friendlink` VALUES (1,'W3C','http://www.w3school.com.cn/','2018/01/22 17:49:49',0,'1'),(2,'HTML/CSS','http://www.w3school.com.cn/h.asp','2018/01/22 17:49:45',0,'1'),(3,'JavaScript','http://www.w3school.com.cn/b.asp','2018/01/22 17:49:41',0,'1'),(4,'PHP教程','http://www.w3school.com.cn/php/','2018/01/22 17:49:37',0,'1'),(5,'PHP手册','http://php.net/manual/zh/','2018/01/22 17:49:31',0,'1'),(6,'Vue官网','https://cn.vuejs.org/','2018/01/22 17:49:19',0,'1'),(7,'Angular中文社区','http://www.angularjs.cn/','2018/01/22 17:49:12',0,'1'),(8,'ThinkPHP','http://www.thinkphp.cn/','2018/01/22 17:49:53',0,'1');
/*!40000 ALTER TABLE `friendlink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `title` char(255) NOT NULL,
  `content` text NOT NULL,
  `ctime` varchar(20) NOT NULL,
  `count` int(11) DEFAULT '0',
  `elite` enum('1','0') DEFAULT '0',
  `top` enum('1','0') DEFAULT '0',
  `recycle` enum('1','0') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,2,5,'thinkPHP模板问题','<p>如果某些页面不需要使用布局模板功能，可以在模板文件开头加上 {__NOLAYOUT__} 字符串。<br></p>','2018/03/19 18:40:22',0,'0','0','0'),(2,2,5,'SESSION支持','<p>Session赋值比较简单，直接使用：&nbsp;session(\'name\',\'value\');</p><p data-indent=\"0\">Session取值使用：$value = session(\'name\');<br></p><p data-indent=\"0\">删除某个session的值使用：session(\'name\',null);<br></p><p data-indent=\"0\">要删除所有的session:session(null);<br></p>','2018/03/19 18:43:49',0,'0','0','0'),(3,2,5,'测试','<p>测试<br></p>','2018/03/19 18:46:19',0,'0','0','0'),(4,2,5,'测试2','<p>测试2<br></p>','2018/03/19 18:46:36',0,'0','0','0'),(5,2,5,'测试3','<p>测试3<br></p>','2018/03/19 18:46:46',0,'0','0','0'),(6,3,5,'测试4','<p>测试4<br></p>','2018/03/19 19:00:53',0,'0','0','0'),(7,3,5,'测试5','<p>测试5<br></p>','2018/03/19 19:01:29',0,'0','0','1');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `content` text NOT NULL,
  `ctime` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reply`
--

LOCK TABLES `reply` WRITE;
/*!40000 ALTER TABLE `reply` DISABLE KEYS */;
INSERT INTO `reply` VALUES (1,3,1,'赞一个','2018/03/19 18:47:27'),(2,3,1,'再赞一个','2018/03/19 18:54:39');
/*!40000 ALTER TABLE `reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `pid` int(11) NOT NULL DEFAULT '0',
  `path` char(255) NOT NULL DEFAULT '0',
  `blogo` varchar(255) NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'技术交流',1,0,'0','default.jpg'),(2,'兄弟连',1,0,'0','default.jpg'),(3,'连队趣事',1,0,'0','default.jpg'),(5,'PHP技术',1,1,'0-1','default.jpg'),(6,'Java/Android技术交流',1,1,'0-1','5aaf9c9251a7e.png'),(7,'前端（HTML5）技术',1,1,'0-1','5aaf9cdd21c04.png'),(8,'Linux',1,1,'0-1','5aaf9ce5f0844.png'),(9,'SQL',1,1,'0-1','5aaf9d2d48e57.jpg'),(10,'资源分享',1,1,'0-1','5aaf9d421495d.png'),(11,'视频教程',1,2,'0-2','5aaf9d51bad84.png'),(12,'培训教程',1,2,'0-2','5aaf9d5fdb5c0.png'),(13,'兄弟会',1,2,'0-2','5aaf9d697bb53.png'),(14,'招聘求职',1,3,'0-3','5aaf9d7e7437c.gif'),(23,'6677',1,17,'0-17','5aaf9dd9046ff.jpg'),(17,'66',1,0,'0','default.jpg');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userName` char(20) NOT NULL,
  `password` char(33) NOT NULL,
  `auth` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `lastlogin` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','202cb962ac59075b964b07152d234b70',2,1,'2018/03/19 19:58:58'),(2,'yang','202cb962ac59075b964b07152d234b70',0,1,'0'),(3,'pan','202cb962ac59075b964b07152d234b70',0,1,'0');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userdetail`
--

DROP TABLE IF EXISTS `userdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userdetail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `nickName` char(50) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `qq` char(15) DEFAULT NULL,
  `sex` enum('w','m') DEFAULT 'm',
  `photo` char(255) NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdetail`
--

LOCK TABLES `userdetail` WRITE;
/*!40000 ALTER TABLE `userdetail` DISABLE KEYS */;
INSERT INTO `userdetail` VALUES (1,1,'超级管理员','1170078140@qq.com','1170078140','w','default.jpg'),(2,2,'yang','123@qq.com','123','w','5aaf932688521.jpg'),(3,3,'pan','666@qq.com','666','m','5aaf9a0263b2e.jpg');
/*!40000 ALTER TABLE `userdetail` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-19 20:00:28
