/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : Net1

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2016-01-15 03:01:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for experts
-- ----------------------------
DROP TABLE IF EXISTS `experts`;
CREATE TABLE `experts` (
  `ExpertId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `Parent` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ExpertId`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of experts
-- ----------------------------
INSERT INTO `experts` VALUES ('1', 'java script', 'بسیار خوب        ', '0');
INSERT INTO `experts` VALUES ('2', 'c++', 'بسیار خوب و ...    ', '1');
INSERT INTO `experts` VALUES ('3', 'java', 'تسلط کامل    ', '0');
INSERT INTO `experts` VALUES ('4', 'css', 'تسلط کامل    ', '3');
INSERT INTO `experts` VALUES ('5', 'php', 'تسلط نسبی    ', '3');
INSERT INTO `experts` VALUES ('6', 'mysql', 'آشنایی نسبی    ', '5');
INSERT INTO `experts` VALUES ('7', 'مقاله نویسی', 'خوب    ', '0');

-- ----------------------------
-- Table structure for Expertsituationtypes
-- ----------------------------
DROP TABLE IF EXISTS `Expertsituationtypes`;
CREATE TABLE `Expertsituationtypes` (
  `ExpertSituationTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`ExpertSituationTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of Expertsituationtypes
-- ----------------------------
INSERT INTO `Expertsituationtypes` VALUES ('11', 'dsfds', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxdsfsdfsd');
INSERT INTO `Expertsituationtypes` VALUES ('12', 'sdfdsf', 'sdfdsfds');

-- ----------------------------
-- Table structure for memberexpert
-- ----------------------------
DROP TABLE IF EXISTS `memberexpert`;
CREATE TABLE `memberexpert` (
  `MemberExpertId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Member` bigint(20) NOT NULL,
  `Expert` bigint(20) NOT NULL,
  `ExpertSituation` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MemberExpertId`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of memberexpert
-- ----------------------------
INSERT INTO `memberexpert` VALUES ('5', '6', '6', '0');
INSERT INTO `memberexpert` VALUES ('10', '7', '6', '0');
INSERT INTO `memberexpert` VALUES ('14', '7', '7', '0');
INSERT INTO `memberexpert` VALUES ('16', '8', '7', '0');
INSERT INTO `memberexpert` VALUES ('18', '8', '9', '0');
INSERT INTO `memberexpert` VALUES ('21', '25', '6', '0');
INSERT INTO `memberexpert` VALUES ('22', '6', '17', '0');
INSERT INTO `memberexpert` VALUES ('23', '6', '14', '0');
INSERT INTO `memberexpert` VALUES ('27', '6', '17', '0');
INSERT INTO `memberexpert` VALUES ('28', '25', '17', '0');
INSERT INTO `memberexpert` VALUES ('29', '25', '11', '0');
INSERT INTO `memberexpert` VALUES ('30', '6', '9', '0');

-- ----------------------------
-- Table structure for memberproject
-- ----------------------------
DROP TABLE IF EXISTS `memberproject`;
CREATE TABLE `memberproject` (
  `MemberProjectId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Member` bigint(20) NOT NULL,
  `Project` bigint(20) NOT NULL,
  `Post` bigint(20) NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`MemberProjectId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of memberproject
-- ----------------------------
INSERT INTO `memberproject` VALUES ('5', '6', '6', '14', 'خوب');
INSERT INTO `memberproject` VALUES ('7', '7', '2', '13', '');
INSERT INTO `memberproject` VALUES ('9', '8', '5', '13', '');
INSERT INTO `memberproject` VALUES ('10', '25', '2', '13', '');
INSERT INTO `memberproject` VALUES ('11', '25', '5', '13', '');
INSERT INTO `memberproject` VALUES ('12', '25', '6', '13', '');
INSERT INTO `memberproject` VALUES ('13', '25', '9', '13', '');
INSERT INTO `memberproject` VALUES ('14', '25', '10', '13', '');
INSERT INTO `memberproject` VALUES ('16', '0', '11', '15', 'بلههههه');
INSERT INTO `memberproject` VALUES ('18', '0', '11', '17', 'بلههههه');
INSERT INTO `memberproject` VALUES ('20', '25', '11', '19', '848418');
INSERT INTO `memberproject` VALUES ('21', '6', '2', '14', '');
INSERT INTO `memberproject` VALUES ('22', '6', '2', '15', '');

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `MemberId` bigint(20) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `LastName` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Sex` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `BirthDate` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `Address` varchar(400) COLLATE utf8_persian_ci NOT NULL,
  `MobileNummber` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `MelliCode` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `ImagePath` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `Parent` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MemberId`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of members
-- ----------------------------
INSERT INTO `members` VALUES ('6', 'نوین', 'خسروی', 'مرد', '2016-01-01', 'سیاهکل        \r\n            \r\n    ', '0000', '0000', 'Novin.jpg', '0');
INSERT INTO `members` VALUES ('7', 'حمید', 'درند', 'مرد', '1992-01-01', 'اول  کومله        \r\n            \r\n    ', '09389770018', '0000', 'hamid.jpg', '0');
INSERT INTO `members` VALUES ('8', 'کوروش', 'ترابی', 'مرد', '2016-01-01', 'دریاسر        \r\n    ', '0000', '0000', 'Korosh.jpg', '0');
INSERT INTO `members` VALUES ('31', 'صص', 'صص', 'زن', '2016-01-01', 'صصصص', '11', '11', 'Novin - C5115opy.jpg', '0');
INSERT INTO `members` VALUES ('32', 'شش', 'شش', 'زن', '2016-01-01', 'شسشسش', '2121', '1212', 'zz.jpg', '0');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `PostId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`PostId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('13', 'مدیر پروژه', 'مسلط به زبان انگلیسی    ');
INSERT INTO `posts` VALUES ('14', 'طراح گرافیک', 'مسلط به فتوشاپ    ');
INSERT INTO `posts` VALUES ('15', 'برنامه نویس', 'مسلط به php    ');
INSERT INTO `posts` VALUES ('17', 'همکار', 'کمک کردن    ');
INSERT INTO `posts` VALUES ('20', 'ضض', 'ضضضض');

-- ----------------------------
-- Table structure for projectexpert
-- ----------------------------
DROP TABLE IF EXISTS `projectexpert`;
CREATE TABLE `projectexpert` (
  `ProjectExpertId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Project` bigint(20) NOT NULL,
  `Expert` bigint(20) NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`ProjectExpertId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of projectexpert
-- ----------------------------
INSERT INTO `projectexpert` VALUES ('2', '2', '6', 'ss');
INSERT INTO `projectexpert` VALUES ('4', '2', '9', '');
INSERT INTO `projectexpert` VALUES ('8', '6', '6', '');
INSERT INTO `projectexpert` VALUES ('9', '6', '9', '');
INSERT INTO `projectexpert` VALUES ('10', '6', '10', '');
INSERT INTO `projectexpert` VALUES ('11', '6', '11', '');
INSERT INTO `projectexpert` VALUES ('12', '2', '14', '');
INSERT INTO `projectexpert` VALUES ('13', '2', '15', '');
INSERT INTO `projectexpert` VALUES ('14', '5', '12', '');
INSERT INTO `projectexpert` VALUES ('15', '2', '12', '');

-- ----------------------------
-- Table structure for ProjectLogs
-- ----------------------------
DROP TABLE IF EXISTS `ProjectLogs`;
CREATE TABLE `ProjectLogs` (
  `ProjectLogId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Description` varchar(2000) COLLATE utf8_persian_ci NOT NULL,
  `ProjectSituation` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ProjectLogId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of ProjectLogs
-- ----------------------------

-- ----------------------------
-- Table structure for projects
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `ProjectId` bigint(20) NOT NULL AUTO_INCREMENT,
  `ProjectName` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `Parent` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ProjectId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES ('2', 'وکیلیار', 'نرم افزار انتخاباتی', '0');
INSERT INTO `projects` VALUES ('5', 'پنگوئن', 'سایت مقالات            ', '0');
INSERT INTO `projects` VALUES ('6', 'فروشگاه اینترنتی', 'با امکانات بالا    ', '0');
INSERT INTO `projects` VALUES ('9', 'سایت املاک', 'در حال اجرا', '0');
INSERT INTO `projects` VALUES ('10', 'سایت شبکه', 'طرح اولیه و هنوز ...', '0');
INSERT INTO `projects` VALUES ('11', 'تست', 'تست', '0');
INSERT INTO `projects` VALUES ('12', 'sdffd', 'dsfsdfsdf', '5');

-- ----------------------------
-- Table structure for projectsituations
-- ----------------------------
DROP TABLE IF EXISTS `projectsituations`;
CREATE TABLE `projectsituations` (
  `ProjectSituationId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Project` bigint(20) NOT NULL,
  `ProjectSituationType` bigint(20) NOT NULL,
  `Date` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `Title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`ProjectSituationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of projectsituations
-- ----------------------------

-- ----------------------------
-- Table structure for projectsituationtypes
-- ----------------------------
DROP TABLE IF EXISTS `projectsituationtypes`;
CREATE TABLE `projectsituationtypes` (
  `ProjectSituationTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`ProjectSituationTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of projectsituationtypes
-- ----------------------------
INSERT INTO `projectsituationtypes` VALUES ('7', 'طرح اولیه', 'هنوز گروهی مسئولش نشدند');
INSERT INTO `projectsituationtypes` VALUES ('8', 'در حال اجرا', 'شروع شده و گروه مشغول انجام آن میباشند    ');
INSERT INTO `projectsituationtypes` VALUES ('10', 'قرمز', 'بسیار بد');
