/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : Net5

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2016-02-25 03:21:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ArticleCategories
-- ----------------------------
DROP TABLE IF EXISTS `ArticleCategories`;
CREATE TABLE `ArticleCategories` (
  `ArticleCategoryId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `Parent` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ArticleCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ArticleCategories
-- ----------------------------
INSERT INTO `ArticleCategories` VALUES ('1', 'توسعه', '-', '0');

-- ----------------------------
-- Table structure for Articles
-- ----------------------------
DROP TABLE IF EXISTS `Articles`;
CREATE TABLE `Articles` (
  `ArticleId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Content` text COLLATE utf8_persian_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `ArticleCategory` bigint(20) NOT NULL,
  `Parent` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ArticleId`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of Articles
-- ----------------------------
INSERT INTO `Articles` VALUES ('1', 'طراحی صفحات وب ', 'حمید درند مدیر و برنامه نویس در شرکت جادوی ارتباط افزار است.\r\nایشان در مقطع کارشناسی مشغول به تحصیل میباشند.\r\nنزدیک به 5 سال در زمینه طراحی game  ، برنامه نویسی و آموزش فعالیت دارند.\r\nزمینه‌های مورد علاقه وی طراحی game   ، ایده پردازی ، ایجاد کسب و کارهای نوین ، مدیریت دیجیتال ، برنامه نویسی android ، php و ... می‌باشد.\r\n', 'بسیار خوب        ', '1', '0');
INSERT INTO `Articles` VALUES ('2', 'برنامه نویسی اندروید', 'سینا شعبانی مقاله نویس و مدرس در گروه برنامه نویسی پنگوئن است.\r\nایشان در مقطع دبیرستان مشغول به تحصیل میباشند.\r\nنزدیک به 1 سال در زمینه مقاله نویسی و تدریس فعالیت دارند.\r\nزمینه‌های مورد علاقه وی برنامه نویسی زبانهای c – c++ و... می‌باشد.\r\n', 'بسیار خوب و ...    ', '1', '0');
INSERT INTO `Articles` VALUES ('3', 'برنامه نویسی جاوا', 'سینا شعبانی مقاله نویس و مدرس در گروه برنامه نویسی پنگوئن است.\r\nایشان در مقطع دبیرستان مشغول به تحصیل میباشند.\r\nنزدیک به 1 سال در زمینه مقاله نویسی و تدریس فعالیت دارند.\r\nزمینه‌های مورد علاقه وی برنامه نویسی زبانهای c – c++ و... می‌باشد.\r\n', 'تسلط کامل    ', '0', '0');
INSERT INTO `Articles` VALUES ('4', 'برنامه نویسی سی شارپ', 'سینا شعبانی مقاله نویس و مدرس در گروه برنامه نویسی پنگوئن است.\r\nایشان در مقطع دبیرستان مشغول به تحصیل میباشند.\r\nنزدیک به 1 سال در زمینه مقاله نویسی و تدریس فعالیت دارند.\r\nزمینه‌های مورد علاقه وی برنامه نویسی زبانهای c – c++ و... می‌باشد.\r\n', 'تسلط کامل    ', '1', '0');
INSERT INTO `Articles` VALUES ('5', 'برنامه نویسی سی پلاس پلاس', 'سینا شعبانی مقاله نویس و مدرس در گروه برنامه نویسی پنگوئن است.\r\nایشان در مقطع دبیرستان مشغول به تحصیل میباشند.\r\nنزدیک به 1 سال در زمینه مقاله نویسی و تدریس فعالیت دارند.\r\nزمینه‌های مورد علاقه وی برنامه نویسی زبانهای c – c++ و... می‌باشد.\r\n', 'تسلط نسبی    ', '1', '0');
INSERT INTO `Articles` VALUES ('6', 'برنامه نویسی پی اچ پی', 'سینا شعبانی مقاله نویس و مدرس در گروه برنامه نویسی پنگوئن است.\r\nایشان در مقطع دبیرستان مشغول به تحصیل میباشند.\r\nنزدیک به 1 سال در زمینه مقاله نویسی و تدریس فعالیت دارند.\r\nزمینه‌های مورد علاقه وی برنامه نویسی زبانهای c – c++ و... می‌باشد.\r\n', 'آشنایی نسبی    ', '1', '0');
INSERT INTO `Articles` VALUES ('7', 'مقاله نویسی', 'سینا شعبانی مقاله نویس و مدرس در گروه برنامه نویسی پنگوئن است.\r\nایشان در مقطع دبیرستان مشغول به تحصیل میباشند.\r\nنزدیک به 1 سال در زمینه مقاله نویسی و تدریس فعالیت دارند.\r\nزمینه‌های مورد علاقه وی برنامه نویسی زبانهای c – c++ و... می‌باشد.\r\n', 'خوب    ', '1', '0');
INSERT INTO `Articles` VALUES ('8', 'امنیت شبکه', 'سینا شعبانی مقاله نویس و مدرس در گروه برنامه نویسی پنگوئن است.\r\nایشان در مقطع دبیرستان مشغول به تحصیل میباشند.\r\nنزدیک به 1 سال در زمینه مقاله نویسی و تدریس فعالیت دارند.\r\nزمینه‌های مورد علاقه وی برنامه نویسی زبانهای c – c++ و... می‌باشد.\r\n', '-', '1', '0');
INSERT INTO `Articles` VALUES ('9', 'طراحی بازی', 'سینا شعبانی مقاله نویس و مدرس در گروه برنامه نویسی پنگوئن است.\r\nایشان در مقطع دبیرستان مشغول به تحصیل میباشند.\r\nنزدیک به 1 سال در زمینه مقاله نویسی و تدریس فعالیت دارند.\r\nزمینه‌های مورد علاقه وی برنامه نویسی زبانهای c – c++ و... می‌باشد.\r\n', '-', '1', '0');

-- ----------------------------
-- Table structure for ArticleSituationTypes
-- ----------------------------
DROP TABLE IF EXISTS `ArticleSituationTypes`;
CREATE TABLE `ArticleSituationTypes` (
  `ArticleSituationTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`ArticleSituationTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of ArticleSituationTypes
-- ----------------------------
INSERT INTO `ArticleSituationTypes` VALUES ('1', 'sdfdsf', 'sdfdsfds');
INSERT INTO `ArticleSituationTypes` VALUES ('2', 'sdfdsfd', 'sdfsdfdsfsdf');

-- ----------------------------
-- Table structure for AssignedItems
-- ----------------------------
DROP TABLE IF EXISTS `AssignedItems`;
CREATE TABLE `AssignedItems` (
  `AssignedItemId` bigint(20) NOT NULL AUTO_INCREMENT,
  `SiteItem` bigint(20) NOT NULL,
  `MemberType` bigint(20) NOT NULL,
  PRIMARY KEY (`AssignedItemId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of AssignedItems
-- ----------------------------

-- ----------------------------
-- Table structure for ContestExpert
-- ----------------------------
DROP TABLE IF EXISTS `ContestExpert`;
CREATE TABLE `ContestExpert` (
  `ContestExpertId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Contest` bigint(20) NOT NULL,
  `Expert` bigint(20) NOT NULL,
  PRIMARY KEY (`ContestExpertId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ContestExpert
-- ----------------------------

-- ----------------------------
-- Table structure for ContestQuestion
-- ----------------------------
DROP TABLE IF EXISTS `ContestQuestion`;
CREATE TABLE `ContestQuestion` (
  `ContestQuestionId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Contest` bigint(20) NOT NULL,
  `Question` bigint(20) NOT NULL,
  PRIMARY KEY (`ContestQuestionId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ContestQuestion
-- ----------------------------

-- ----------------------------
-- Table structure for Contests
-- ----------------------------
DROP TABLE IF EXISTS `Contests`;
CREATE TABLE `Contests` (
  `ContestId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(2000) NOT NULL,
  `Content` varchar(2000) NOT NULL,
  `ExamQuestionLevel` bigint(20) NOT NULL,
  `ContestType` bigint(20) NOT NULL,
  PRIMARY KEY (`ContestId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Contests
-- ----------------------------

-- ----------------------------
-- Table structure for ContestTypes
-- ----------------------------
DROP TABLE IF EXISTS `ContestTypes`;
CREATE TABLE `ContestTypes` (
  `ContestTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  PRIMARY KEY (`ContestTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ContestTypes
-- ----------------------------

-- ----------------------------
-- Table structure for Courses
-- ----------------------------
DROP TABLE IF EXISTS `Courses`;
CREATE TABLE `Courses` (
  `CourseId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(2000) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Expert` bigint(20) NOT NULL,
  PRIMARY KEY (`CourseId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Courses
-- ----------------------------
INSERT INTO `Courses` VALUES ('1', '2132', '321', '1');
INSERT INTO `Courses` VALUES ('3', '2121', '2131321', '2');
INSERT INTO `Courses` VALUES ('4', '213214554', '54665464', '3');
INSERT INTO `Courses` VALUES ('6', '', '', '0');
INSERT INTO `Courses` VALUES ('9', 'fsdfdsf', 'sdfdsfsdf', '1');
INSERT INTO `Courses` VALUES ('10', 'sdfdsf', 'sdfsdfdsf', '1');

-- ----------------------------
-- Table structure for ExamQuestion
-- ----------------------------
DROP TABLE IF EXISTS `ExamQuestion`;
CREATE TABLE `ExamQuestion` (
  `ExamQuestionId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Exam` bigint(20) NOT NULL,
  `Question` bigint(20) NOT NULL,
  PRIMARY KEY (`ExamQuestionId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ExamQuestion
-- ----------------------------
INSERT INTO `ExamQuestion` VALUES ('5', '3', '2');
INSERT INTO `ExamQuestion` VALUES ('6', '3', '4');
INSERT INTO `ExamQuestion` VALUES ('7', '3', '6');

-- ----------------------------
-- Table structure for ExamQuestionLevels
-- ----------------------------
DROP TABLE IF EXISTS `ExamQuestionLevels`;
CREATE TABLE `ExamQuestionLevels` (
  `ExamQuestionLevelId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  PRIMARY KEY (`ExamQuestionLevelId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ExamQuestionLevels
-- ----------------------------
INSERT INTO `ExamQuestionLevels` VALUES ('1', 'دانشجو', '-');
INSERT INTO `ExamQuestionLevels` VALUES ('2', 'مدرس', '-');
INSERT INTO `ExamQuestionLevels` VALUES ('3', 'استاد', '-');

-- ----------------------------
-- Table structure for Exams
-- ----------------------------
DROP TABLE IF EXISTS `Exams`;
CREATE TABLE `Exams` (
  `ExamId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(2000) NOT NULL,
  `ExamQuestionLevel` bigint(20) NOT NULL,
  `ExamType` bigint(20) NOT NULL,
  `Lesson` bigint(20) NOT NULL,
  PRIMARY KEY (`ExamId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Exams
-- ----------------------------
INSERT INTO `Exams` VALUES ('3', 'asdasdsdad', '3', '1', '2');

-- ----------------------------
-- Table structure for ExamTypes
-- ----------------------------
DROP TABLE IF EXISTS `ExamTypes`;
CREATE TABLE `ExamTypes` (
  `ExamTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  PRIMARY KEY (`ExamTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ExamTypes
-- ----------------------------
INSERT INTO `ExamTypes` VALUES ('1', 'میان ترم', '-');
INSERT INTO `ExamTypes` VALUES ('2', 'پایان دوره', '-');

-- ----------------------------
-- Table structure for ExpertCategories
-- ----------------------------
DROP TABLE IF EXISTS `ExpertCategories`;
CREATE TABLE `ExpertCategories` (
  `ExpertCategoryId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `Parent` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ExpertCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ExpertCategories
-- ----------------------------
INSERT INTO `ExpertCategories` VALUES ('1', 'توسعه', '-', '0');

-- ----------------------------
-- Table structure for Experts
-- ----------------------------
DROP TABLE IF EXISTS `Experts`;
CREATE TABLE `Experts` (
  `ExpertId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `ExpertCategory` bigint(20) NOT NULL,
  `Parent` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ExpertId`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of Experts
-- ----------------------------
INSERT INTO `Experts` VALUES ('1', 'طراحی صفحات وب ', 'بسیار خوب        ', '1', '0');
INSERT INTO `Experts` VALUES ('2', 'برنامه نویسی اندروید', 'بسیار خوب و ...    ', '1', '0');
INSERT INTO `Experts` VALUES ('3', 'برنامه نویسی جاوا', 'تسلط کامل    ', '0', '0');
INSERT INTO `Experts` VALUES ('4', 'برنامه نویسی سی شارپ', 'تسلط کامل    ', '1', '0');
INSERT INTO `Experts` VALUES ('5', 'برنامه نویسی سی پلاس پلاس', 'تسلط نسبی    ', '1', '0');
INSERT INTO `Experts` VALUES ('6', 'برنامه نویسی پی اچ پی', 'آشنایی نسبی    ', '1', '0');
INSERT INTO `Experts` VALUES ('7', 'مقاله نویسی', 'خوب    ', '1', '0');
INSERT INTO `Experts` VALUES ('8', 'امنیت شبکه', '-', '1', '0');
INSERT INTO `Experts` VALUES ('9', 'طراحی بازی', '-', '1', '0');

-- ----------------------------
-- Table structure for ExpertSituationTypes
-- ----------------------------
DROP TABLE IF EXISTS `ExpertSituationTypes`;
CREATE TABLE `ExpertSituationTypes` (
  `ExpertSituationTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`ExpertSituationTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of ExpertSituationTypes
-- ----------------------------
INSERT INTO `ExpertSituationTypes` VALUES ('1', 'sdfdsf', 'sdfdsfds');
INSERT INTO `ExpertSituationTypes` VALUES ('2', 'sdfdsfd', 'sdfsdfdsfsdf');

-- ----------------------------
-- Table structure for Lessons
-- ----------------------------
DROP TABLE IF EXISTS `Lessons`;
CREATE TABLE `Lessons` (
  `LessonId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(2000) NOT NULL,
  `Content` varchar(5000) NOT NULL,
  `Course` bigint(20) NOT NULL,
  PRIMARY KEY (`LessonId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Lessons
-- ----------------------------
INSERT INTO `Lessons` VALUES ('2', 'dfd', 'sdfdsfs', '1');
INSERT INTO `Lessons` VALUES ('3', 'sdfsdfsdfsdf', 'dsfsdf', '1');

-- ----------------------------
-- Table structure for MemberArticle
-- ----------------------------
DROP TABLE IF EXISTS `MemberArticle`;
CREATE TABLE `MemberArticle` (
  `MemberArticleId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Member` bigint(20) NOT NULL,
  `Article` bigint(20) NOT NULL,
  `ArticleSituation` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MemberArticleId`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of MemberArticle
-- ----------------------------
INSERT INTO `MemberArticle` VALUES ('5', '1', '1', '1');
INSERT INTO `MemberArticle` VALUES ('10', '1', '2', '1');
INSERT INTO `MemberArticle` VALUES ('14', '2', '3', '1');
INSERT INTO `MemberArticle` VALUES ('16', '2', '5', '1');
INSERT INTO `MemberArticle` VALUES ('18', '2', '7', '1');
INSERT INTO `MemberArticle` VALUES ('21', '2', '4', '1');
INSERT INTO `MemberArticle` VALUES ('22', '3', '1', '1');
INSERT INTO `MemberArticle` VALUES ('23', '3', '2', '1');
INSERT INTO `MemberArticle` VALUES ('27', '3', '5', '1');
INSERT INTO `MemberArticle` VALUES ('28', '4', '8', '1');
INSERT INTO `MemberArticle` VALUES ('29', '4', '6', '1');
INSERT INTO `MemberArticle` VALUES ('30', '4', '7', '1');
INSERT INTO `MemberArticle` VALUES ('31', '4', '4', '1');
INSERT INTO `MemberArticle` VALUES ('32', '5', '3', '1');
INSERT INTO `MemberArticle` VALUES ('33', '5', '4', '1');
INSERT INTO `MemberArticle` VALUES ('34', '1', '5', '1');
INSERT INTO `MemberArticle` VALUES ('35', '6', '2', '1');
INSERT INTO `MemberArticle` VALUES ('36', '6', '3', '1');
INSERT INTO `MemberArticle` VALUES ('37', '6', '6', '1');
INSERT INTO `MemberArticle` VALUES ('38', '6', '5', '1');
INSERT INTO `MemberArticle` VALUES ('39', '7', '4', '1');
INSERT INTO `MemberArticle` VALUES ('40', '7', '7', '1');
INSERT INTO `MemberArticle` VALUES ('41', '7', '8', '1');
INSERT INTO `MemberArticle` VALUES ('42', '7', '5', '1');

-- ----------------------------
-- Table structure for MemberContest
-- ----------------------------
DROP TABLE IF EXISTS `MemberContest`;
CREATE TABLE `MemberContest` (
  `MemberContestId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Member` bigint(20) NOT NULL,
  `Contest` bigint(20) NOT NULL,
  `Value` bigint(20) NOT NULL,
  PRIMARY KEY (`MemberContestId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of MemberContest
-- ----------------------------

-- ----------------------------
-- Table structure for MemberExam
-- ----------------------------
DROP TABLE IF EXISTS `MemberExam`;
CREATE TABLE `MemberExam` (
  `MemberExamId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Member` bigint(20) NOT NULL,
  `Exam` bigint(20) NOT NULL,
  `Value` bigint(20) NOT NULL,
  PRIMARY KEY (`MemberExamId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of MemberExam
-- ----------------------------

-- ----------------------------
-- Table structure for MemberExamQuestion
-- ----------------------------
DROP TABLE IF EXISTS `MemberExamQuestion`;
CREATE TABLE `MemberExamQuestion` (
  `MemberExamQuestionId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Question` bigint(20) NOT NULL,
  `Value` bigint(20) NOT NULL,
  `MemberExam` bigint(20) NOT NULL,
  PRIMARY KEY (`MemberExamQuestionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of MemberExamQuestion
-- ----------------------------

-- ----------------------------
-- Table structure for MemberExpert
-- ----------------------------
DROP TABLE IF EXISTS `MemberExpert`;
CREATE TABLE `MemberExpert` (
  `MemberExpertId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Member` bigint(20) NOT NULL,
  `Expert` bigint(20) NOT NULL,
  `ExpertSituation` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MemberExpertId`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of MemberExpert
-- ----------------------------
INSERT INTO `MemberExpert` VALUES ('5', '1', '1', '1');
INSERT INTO `MemberExpert` VALUES ('10', '1', '2', '1');
INSERT INTO `MemberExpert` VALUES ('14', '2', '3', '1');
INSERT INTO `MemberExpert` VALUES ('16', '2', '5', '1');
INSERT INTO `MemberExpert` VALUES ('18', '2', '7', '1');
INSERT INTO `MemberExpert` VALUES ('21', '2', '4', '1');
INSERT INTO `MemberExpert` VALUES ('22', '3', '1', '1');
INSERT INTO `MemberExpert` VALUES ('23', '3', '2', '1');
INSERT INTO `MemberExpert` VALUES ('27', '3', '5', '1');
INSERT INTO `MemberExpert` VALUES ('28', '4', '8', '1');
INSERT INTO `MemberExpert` VALUES ('29', '4', '6', '1');
INSERT INTO `MemberExpert` VALUES ('30', '4', '7', '1');
INSERT INTO `MemberExpert` VALUES ('31', '4', '4', '1');
INSERT INTO `MemberExpert` VALUES ('32', '5', '3', '1');
INSERT INTO `MemberExpert` VALUES ('33', '5', '4', '1');
INSERT INTO `MemberExpert` VALUES ('34', '1', '5', '1');
INSERT INTO `MemberExpert` VALUES ('35', '6', '2', '1');
INSERT INTO `MemberExpert` VALUES ('36', '6', '3', '1');
INSERT INTO `MemberExpert` VALUES ('37', '6', '6', '1');
INSERT INTO `MemberExpert` VALUES ('38', '6', '5', '1');
INSERT INTO `MemberExpert` VALUES ('39', '7', '4', '1');
INSERT INTO `MemberExpert` VALUES ('40', '7', '7', '1');
INSERT INTO `MemberExpert` VALUES ('41', '7', '8', '1');
INSERT INTO `MemberExpert` VALUES ('42', '7', '5', '1');

-- ----------------------------
-- Table structure for MemberMemberTypes
-- ----------------------------
DROP TABLE IF EXISTS `MemberMemberTypes`;
CREATE TABLE `MemberMemberTypes` (
  `MemberMemberTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `MemberType` bigint(20) NOT NULL,
  `Member` bigint(20) NOT NULL,
  PRIMARY KEY (`MemberMemberTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of MemberMemberTypes
-- ----------------------------

-- ----------------------------
-- Table structure for MemberProject
-- ----------------------------
DROP TABLE IF EXISTS `MemberProject`;
CREATE TABLE `MemberProject` (
  `MemberProjectId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Member` bigint(20) NOT NULL,
  `Project` bigint(20) NOT NULL,
  `Post` bigint(20) NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`MemberProjectId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of MemberProject
-- ----------------------------
INSERT INTO `MemberProject` VALUES ('5', '6', '6', '14', 'خوب');
INSERT INTO `MemberProject` VALUES ('7', '7', '2', '13', '');
INSERT INTO `MemberProject` VALUES ('9', '1', '5', '13', '');
INSERT INTO `MemberProject` VALUES ('10', '1', '2', '13', '');
INSERT INTO `MemberProject` VALUES ('11', '1', '5', '13', '');
INSERT INTO `MemberProject` VALUES ('12', '2', '6', '13', '');
INSERT INTO `MemberProject` VALUES ('13', '3', '9', '13', '');
INSERT INTO `MemberProject` VALUES ('14', '4', '10', '13', '');
INSERT INTO `MemberProject` VALUES ('16', '4', '11', '15', 'بلههههه');
INSERT INTO `MemberProject` VALUES ('18', '4', '11', '17', 'بلههههه');
INSERT INTO `MemberProject` VALUES ('20', '2', '11', '19', '848418');
INSERT INTO `MemberProject` VALUES ('21', '6', '2', '14', '');
INSERT INTO `MemberProject` VALUES ('22', '6', '2', '15', '');

-- ----------------------------
-- Table structure for Members
-- ----------------------------
DROP TABLE IF EXISTS `Members`;
CREATE TABLE `Members` (
  `MemberId` bigint(20) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `LastName` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Profile` text COLLATE utf8_persian_ci NOT NULL,
  `Sex` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `BirthDate` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `Address` varchar(400) COLLATE utf8_persian_ci NOT NULL,
  `MobileNummber` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `MelliCode` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `Username` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `Email` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `Parent` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MemberId`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of Members
-- ----------------------------
INSERT INTO `Members` VALUES ('1', 'حمید', 'درند', 'حمید درند مدیر و برنامه نویس در شرکت جادوی ارتباط افزار است.\r\nایشان در مقطع کارشناسی مشغول به تحصیل میباشند.\r\nنزدیک به 5 سال در زمینه طراحی game  ، برنامه نویسی و آموزش فعالیت دارند.\r\nزمینه‌های مورد علاقه وی طراحی game   ، ایده پردازی ، ایجاد کسب و کارهای نوین ، مدیریت دیجیتال ، برنامه نویسی android ، php و ... می‌باشد.\r\n', 'مرد', '2016-01-01', 'سیاهکل        \r\n            \r\n    ', '0000', '0000', '1', 'kami@test.com', '1', '0');
INSERT INTO `Members` VALUES ('2', 'نوین', 'خسروی', '', 'مرد', '1992-01-01', 'اول  کومله        \r\n            \r\n    ', '09389770018', '0000', '2', 'kami@test.com', '1', '0');
INSERT INTO `Members` VALUES ('3', 'کوروش', 'ترابی', 'کوروش ترابی برنامه نویس وب در شرکت جادوی ارتباط افزار است.\r\nایشان در مقطع دبیرستان مشغول به تحصیل میباشند.\r\nنزدیک به 1 سال در زمینه طراحی وبسایت و برنامه نویسی وب فعالیت دارند.\r\nزمینه‌های مورد علاقه وی برنامه نویسی زبانهای php – javascript - css و... می‌باشد.\r\n', 'مرد', '2016-01-01', 'دریاسر        \r\n    ', '0000', '0000', '3', 'kami@test.com', '1', '0');
INSERT INTO `Members` VALUES ('4', 'سینا', 'شعبانی', 'سینا شعبانی مقاله نویس و مدرس در گروه برنامه نویسی پنگوئن است.\r\nایشان در مقطع دبیرستان مشغول به تحصیل میباشند.\r\nنزدیک به 1 سال در زمینه مقاله نویسی و تدریس فعالیت دارند.\r\nزمینه‌های مورد علاقه وی برنامه نویسی زبانهای c – c++ و... می‌باشد.\r\n', 'زن', '2016-01-01', 'لنگرود', '11', '11', '4', 'kami@test.com', '1', '0');
INSERT INTO `Members` VALUES ('5', 'مهدی', 'صالح پور', 'مهدی صالحپور مقاله نویس و مدرس در گروه برنامه نویسی پنگوئن است.\r\nایشان در مقطع دبیرستان مشغول به تحصیل میباشند.\r\nنزدیک به 1 سال در زمینه مقاله نویسی و تدریس فعالیت دارند.\r\nزمینه‌های مورد علاقه وی لینوکس و برنامه نویسی زبانهای c – c++ و... می‌باشد.\r\n', 'زن', '2016-01-01', 'لنگرود', '2121', '1212', '5', 'kami@test.com', '1', '0');
INSERT INTO `Members` VALUES ('6', 'فریدون', 'مقدم فشکالی', 'فریدون مقدم مدیر سایت و مدرس در گروه برنامه نویسی پنگوئن است.\r\nایشان در مقطع کارشناسی مشغول به تحصیل میباشند.\r\nنزدیک به 2 سال در زمینه طراحی وبسایت های وردپرس ، کسب و کار اینترنتی ، مدیریت سایت ، مقاله نویسی و تدریس فعالیت دارند.\r\nزمینه‌های مورد علاقه وی WordPress  ،  FL Studio ، راه اندازی کسب و کار آنلاین و ... می‌باشد.\r\nاز تجربیات کاری ایشان میتوان به : طراحی سایت فروشگاهی ،طراحی سایت های متعدد دانلود، شخصی سازی قالب های حرفه ای، ترجبیات آموزشی در زمینه وردپرس، طراحی سایت خبری اشاره کرد.\r\n', 'مرد', '1370', '-', '09121415245', '2514521452', 'fereydoon', 'fereydoon@gmail.com', '1234', '0');
INSERT INTO `Members` VALUES ('7', 'امین', 'مرادی', 'امین مرادی مقاله نویس گروه برنامه نویسی پنگوئن است.\r\nایشان در مقطع دبیرستان مشغول به تحصیل میباشند.\r\nنزدیک به 1 سال در زمینه مقاله نویسی و تدریس فعالیت دارند.\r\nزمینه‌های مورد علاقه وی CSS3 – HTML5   JavaScript-و... می‌باشد.\r\n', 'مرد', '1375', '-', '09112452365', '27014521452', 'amin', 'amin@gmail.com', '1234', '0');

-- ----------------------------
-- Table structure for MemberTeam
-- ----------------------------
DROP TABLE IF EXISTS `MemberTeam`;
CREATE TABLE `MemberTeam` (
  `MemberTeamId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Member` bigint(20) NOT NULL,
  `Team` bigint(20) NOT NULL,
  `TeamSituation` bigint(20) NOT NULL,
  PRIMARY KEY (`MemberTeamId`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of MemberTeam
-- ----------------------------
INSERT INTO `MemberTeam` VALUES ('1', '1', '1', '1');
INSERT INTO `MemberTeam` VALUES ('2', '2', '1', '1');
INSERT INTO `MemberTeam` VALUES ('3', '5', '1', '1');
INSERT INTO `MemberTeam` VALUES ('4', '5', '2', '1');
INSERT INTO `MemberTeam` VALUES ('5', '4', '2', '1');
INSERT INTO `MemberTeam` VALUES ('6', '7', '2', '1');
INSERT INTO `MemberTeam` VALUES ('7', '6', '1', '1');
INSERT INTO `MemberTeam` VALUES ('8', '1', '3', '1');
INSERT INTO `MemberTeam` VALUES ('9', '2', '3', '1');
INSERT INTO `MemberTeam` VALUES ('10', '7', '3', '1');
INSERT INTO `MemberTeam` VALUES ('51', '6', '2', '1');

-- ----------------------------
-- Table structure for MemberTypes
-- ----------------------------
DROP TABLE IF EXISTS `MemberTypes`;
CREATE TABLE `MemberTypes` (
  `MemberTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  PRIMARY KEY (`MemberTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of MemberTypes
-- ----------------------------
INSERT INTO `MemberTypes` VALUES ('1', 'Admin', '-');
INSERT INTO `MemberTypes` VALUES ('2', 'User', '');

-- ----------------------------
-- Table structure for ProductCategories
-- ----------------------------
DROP TABLE IF EXISTS `ProductCategories`;
CREATE TABLE `ProductCategories` (
  `ProductCategoryId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `Parent` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ProductCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ProductCategories
-- ----------------------------
INSERT INTO `ProductCategories` VALUES ('1', 'وب', 'وب', '0');
INSERT INTO `ProductCategories` VALUES ('2', 'اندروید', 'اندروید', '0');
INSERT INTO `ProductCategories` VALUES ('3', 'سایت', 'سایت', '0');
INSERT INTO `ProductCategories` VALUES ('4', 'پژوهش', 'پژوهش', '0');
INSERT INTO `ProductCategories` VALUES ('5', 'آموزش', 'آموزش', '3');

-- ----------------------------
-- Table structure for ProductLevels
-- ----------------------------
DROP TABLE IF EXISTS `ProductLevels`;
CREATE TABLE `ProductLevels` (
  `ProductLevelId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`ProductLevelId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ProductLevels
-- ----------------------------
INSERT INTO `ProductLevels` VALUES ('2', 'Student', '-');
INSERT INTO `ProductLevels` VALUES ('3', 'Master', '-');

-- ----------------------------
-- Table structure for ProductMediaTypes
-- ----------------------------
DROP TABLE IF EXISTS `ProductMediaTypes`;
CREATE TABLE `ProductMediaTypes` (
  `ProductMediaTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`ProductMediaTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ProductMediaTypes
-- ----------------------------
INSERT INTO `ProductMediaTypes` VALUES ('2', 'pdf', '-');
INSERT INTO `ProductMediaTypes` VALUES ('3', 'video', '-');

-- ----------------------------
-- Table structure for ProductMember
-- ----------------------------
DROP TABLE IF EXISTS `ProductMember`;
CREATE TABLE `ProductMember` (
  `ProductMemberId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Product` bigint(20) NOT NULL,
  `Member` bigint(20) NOT NULL,
  PRIMARY KEY (`ProductMemberId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ProductMember
-- ----------------------------
INSERT INTO `ProductMember` VALUES ('1', '1', '1');
INSERT INTO `ProductMember` VALUES ('2', '2', '1');
INSERT INTO `ProductMember` VALUES ('3', '2', '2');
INSERT INTO `ProductMember` VALUES ('4', '2', '3');
INSERT INTO `ProductMember` VALUES ('5', '3', '1');
INSERT INTO `ProductMember` VALUES ('6', '4', '1');
INSERT INTO `ProductMember` VALUES ('7', '4', '2');
INSERT INTO `ProductMember` VALUES ('8', '4', '5');
INSERT INTO `ProductMember` VALUES ('9', '4', '6');
INSERT INTO `ProductMember` VALUES ('10', '5', '7');
INSERT INTO `ProductMember` VALUES ('11', '6', '6');
INSERT INTO `ProductMember` VALUES ('12', '1', '7');

-- ----------------------------
-- Table structure for ProductPrices
-- ----------------------------
DROP TABLE IF EXISTS `ProductPrices`;
CREATE TABLE `ProductPrices` (
  `ProductPriceId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Value` bigint(20) NOT NULL,
  `Product` bigint(20) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  PRIMARY KEY (`ProductPriceId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ProductPrices
-- ----------------------------

-- ----------------------------
-- Table structure for ProductProductProperty
-- ----------------------------
DROP TABLE IF EXISTS `ProductProductProperty`;
CREATE TABLE `ProductProductProperty` (
  `ProductProductPropertyId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Product` bigint(20) NOT NULL,
  `ProductProperty` bigint(20) NOT NULL,
  `Value` varchar(2000) NOT NULL,
  PRIMARY KEY (`ProductProductPropertyId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ProductProductProperty
-- ----------------------------
INSERT INTO `ProductProductProperty` VALUES ('1', '2', '4', '435');
INSERT INTO `ProductProductProperty` VALUES ('2', '2', '5', '1');
INSERT INTO `ProductProductProperty` VALUES ('3', '2', '6', 'نقی');

-- ----------------------------
-- Table structure for ProductProperties
-- ----------------------------
DROP TABLE IF EXISTS `ProductProperties`;
CREATE TABLE `ProductProperties` (
  `ProductPropertyId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(2000) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `Values` varchar(2000) NOT NULL,
  PRIMARY KEY (`ProductPropertyId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ProductProperties
-- ----------------------------
INSERT INTO `ProductProperties` VALUES ('4', '111111111', '111111111111111', '');
INSERT INTO `ProductProperties` VALUES ('5', '2222222222222222', '22222222222222222222222222', '2-1-3-4');
INSERT INTO `ProductProperties` VALUES ('6', '333333333333', '33333333333333333333333333333', 'تست-تقی-نقی-حسن');
INSERT INTO `ProductProperties` VALUES ('7', '4444444444444', '444444444444444444444444', '');
INSERT INTO `ProductProperties` VALUES ('8', '5555555555555555555555', '55555555555555555555', '555555555555');
INSERT INTO `ProductProperties` VALUES ('9', '66666666666666', '666666666666666', '6666666666666');

-- ----------------------------
-- Table structure for ProductPropertyPresets
-- ----------------------------
DROP TABLE IF EXISTS `ProductPropertyPresets`;
CREATE TABLE `ProductPropertyPresets` (
  `ProductPropertyPresetId` bigint(20) NOT NULL AUTO_INCREMENT,
  `ProductProperty` bigint(20) NOT NULL,
  `ProductCategory` bigint(20) NOT NULL,
  `Required` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`ProductPropertyPresetId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ProductPropertyPresets
-- ----------------------------
INSERT INTO `ProductPropertyPresets` VALUES ('1', '4', '1', '\0');
INSERT INTO `ProductPropertyPresets` VALUES ('2', '5', '1', '\0');
INSERT INTO `ProductPropertyPresets` VALUES ('3', '6', '1', '\0');
INSERT INTO `ProductPropertyPresets` VALUES ('4', '3', '2', '\0');
INSERT INTO `ProductPropertyPresets` VALUES ('5', '4', '2', '\0');
INSERT INTO `ProductPropertyPresets` VALUES ('6', '5', '2', '\0');
INSERT INTO `ProductPropertyPresets` VALUES ('7', '7', '2', '\0');

-- ----------------------------
-- Table structure for Products
-- ----------------------------
DROP TABLE IF EXISTS `Products`;
CREATE TABLE `Products` (
  `ProductId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(2000) NOT NULL,
  `Description` mediumtext NOT NULL,
  `ProductCategory` bigint(20) NOT NULL,
  `ProductMediaType` bigint(20) NOT NULL,
  `ProductLevel` bigint(20) NOT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Products
-- ----------------------------
INSERT INTO `Products` VALUES ('1', 'وکیلیار', 'نرم افزار اندرویدی ', '1', '3', '3');
INSERT INTO `Products` VALUES ('2', 'آی املاک', 'تست', '2', '3', '3');
INSERT INTO `Products` VALUES ('3', 'سیستم فروشگاه', 'بهترین سیستم فروشگاهی', '3', '3', '3');
INSERT INTO `Products` VALUES ('4', 'نرم افزار سپیدار', '-', '1', '3', '3');
INSERT INTO `Products` VALUES ('5', 'نرم افزار هلو', '-', '4', '3', '3');
INSERT INTO `Products` VALUES ('6', 'نرم افزار آنلاین فروشگاه اتومبیل', '-', '2', '3', '3');
INSERT INTO `Products` VALUES ('7', 'سیستم آزمون آنلاین', '-', '3', '3', '3');

-- ----------------------------
-- Table structure for ProjectCategories
-- ----------------------------
DROP TABLE IF EXISTS `ProjectCategories`;
CREATE TABLE `ProjectCategories` (
  `ProjectCategoryId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `Parent` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ProjectCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ProjectCategories
-- ----------------------------
INSERT INTO `ProjectCategories` VALUES ('1', 'تحقیقاتی', '-', '0');
INSERT INTO `ProjectCategories` VALUES ('2', 'پژوهشی', '-', '0');
INSERT INTO `ProjectCategories` VALUES ('3', 'وب', '-', '0');

-- ----------------------------
-- Table structure for ProjectExpert
-- ----------------------------
DROP TABLE IF EXISTS `ProjectExpert`;
CREATE TABLE `ProjectExpert` (
  `ProjectExpertId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Project` bigint(20) NOT NULL,
  `Expert` bigint(20) NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`ProjectExpertId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of ProjectExpert
-- ----------------------------
INSERT INTO `ProjectExpert` VALUES ('2', '2', '6', 'ss');
INSERT INTO `ProjectExpert` VALUES ('4', '2', '9', '');
INSERT INTO `ProjectExpert` VALUES ('8', '6', '6', '');
INSERT INTO `ProjectExpert` VALUES ('9', '6', '9', '');
INSERT INTO `ProjectExpert` VALUES ('10', '6', '10', '');
INSERT INTO `ProjectExpert` VALUES ('11', '6', '11', '');
INSERT INTO `ProjectExpert` VALUES ('12', '2', '14', '');
INSERT INTO `ProjectExpert` VALUES ('13', '2', '15', '');
INSERT INTO `ProjectExpert` VALUES ('14', '5', '12', '');
INSERT INTO `ProjectExpert` VALUES ('15', '2', '12', '');

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
-- Table structure for ProjectPosts
-- ----------------------------
DROP TABLE IF EXISTS `ProjectPosts`;
CREATE TABLE `ProjectPosts` (
  `ProjectPostId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`ProjectPostId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of ProjectPosts
-- ----------------------------
INSERT INTO `ProjectPosts` VALUES ('13', 'مدیر پروژه', 'مسلط به زبان انگلیسی    ');
INSERT INTO `ProjectPosts` VALUES ('14', 'طراح گرافیک', 'مسلط به فتوشاپ    ');
INSERT INTO `ProjectPosts` VALUES ('15', 'برنامه نویس', 'مسلط به php    ');
INSERT INTO `ProjectPosts` VALUES ('17', 'همکار', 'کمک کردن    ');
INSERT INTO `ProjectPosts` VALUES ('20', 'ضض', 'ضضضض');

-- ----------------------------
-- Table structure for Projects
-- ----------------------------
DROP TABLE IF EXISTS `Projects`;
CREATE TABLE `Projects` (
  `ProjectId` bigint(20) NOT NULL AUTO_INCREMENT,
  `ProjectName` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `ProjectCategory` bigint(20) NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `Parent` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ProjectId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of Projects
-- ----------------------------
INSERT INTO `Projects` VALUES ('2', 'وکیلیار', '1', 'نرم افزار انتخاباتی', '10');
INSERT INTO `Projects` VALUES ('5', 'پنگوئن', '1', 'سایت مقالات            ', '0');
INSERT INTO `Projects` VALUES ('6', 'فروشگاه اینترنتی', '1', 'با امکانات بالا    ', '0');
INSERT INTO `Projects` VALUES ('9', 'سایت املاک', '1', 'در حال اجرا', '0');
INSERT INTO `Projects` VALUES ('10', 'سایت شبکه', '1', 'طرح اولیه و هنوز ...', '0');
INSERT INTO `Projects` VALUES ('13', 'پروژه دانشجویی کیف پول', '1', '-', '0');
INSERT INTO `Projects` VALUES ('14', 'پروژه مدیریت پروژه', '1', '-', '13');

-- ----------------------------
-- Table structure for ProjectSituations
-- ----------------------------
DROP TABLE IF EXISTS `ProjectSituations`;
CREATE TABLE `ProjectSituations` (
  `ProjectSituationId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Project` bigint(20) NOT NULL,
  `ProjectSituationType` bigint(20) NOT NULL,
  `Date` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `Title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`ProjectSituationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of ProjectSituations
-- ----------------------------

-- ----------------------------
-- Table structure for ProjectSituationTypes
-- ----------------------------
DROP TABLE IF EXISTS `ProjectSituationTypes`;
CREATE TABLE `ProjectSituationTypes` (
  `ProjectSituationTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`ProjectSituationTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of ProjectSituationTypes
-- ----------------------------
INSERT INTO `ProjectSituationTypes` VALUES ('7', 'طرح اولیه', 'هنوز گروهی مسئولش نشدند');
INSERT INTO `ProjectSituationTypes` VALUES ('8', 'در حال اجرا', 'شروع شده و گروه مشغول انجام آن میباشند    ');
INSERT INTO `ProjectSituationTypes` VALUES ('10', 'قرمز', 'بسیار بد');

-- ----------------------------
-- Table structure for QuestionChoises
-- ----------------------------
DROP TABLE IF EXISTS `QuestionChoises`;
CREATE TABLE `QuestionChoises` (
  `QuestionChoiseId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Content` varchar(2000) NOT NULL,
  `Question` bigint(20) NOT NULL,
  PRIMARY KEY (`QuestionChoiseId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of QuestionChoises
-- ----------------------------

-- ----------------------------
-- Table structure for Questions
-- ----------------------------
DROP TABLE IF EXISTS `Questions`;
CREATE TABLE `Questions` (
  `QuestionId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Content` varchar(2000) NOT NULL,
  `ExamQuestionLevel` bigint(20) NOT NULL,
  `Lesson` bigint(20) NOT NULL,
  `QuestionType` bigint(20) NOT NULL,
  PRIMARY KEY (`QuestionId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Questions
-- ----------------------------
INSERT INTO `Questions` VALUES ('2', 'asdsadsad', '2', '2', '1');
INSERT INTO `Questions` VALUES ('4', 'asdasdasdsada', '1', '2', '2');
INSERT INTO `Questions` VALUES ('6', 'dsffsdfddsf', '1', '2', '2');

-- ----------------------------
-- Table structure for QuestionTypes
-- ----------------------------
DROP TABLE IF EXISTS `QuestionTypes`;
CREATE TABLE `QuestionTypes` (
  `QuestionTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  PRIMARY KEY (`QuestionTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of QuestionTypes
-- ----------------------------
INSERT INTO `QuestionTypes` VALUES ('1', 'تشریحی', '-');
INSERT INTO `QuestionTypes` VALUES ('2', 'تستی  ', '-');

-- ----------------------------
-- Table structure for SiteItems
-- ----------------------------
DROP TABLE IF EXISTS `SiteItems`;
CREATE TABLE `SiteItems` (
  `SiteItemId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(2000) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  PRIMARY KEY (`SiteItemId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of SiteItems
-- ----------------------------

-- ----------------------------
-- Table structure for TeamCategories
-- ----------------------------
DROP TABLE IF EXISTS `TeamCategories`;
CREATE TABLE `TeamCategories` (
  `TeamCategoryId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `Parent` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`TeamCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of TeamCategories
-- ----------------------------
INSERT INTO `TeamCategories` VALUES ('1', 'توسعه', '-', '0');

-- ----------------------------
-- Table structure for Teams
-- ----------------------------
DROP TABLE IF EXISTS `Teams`;
CREATE TABLE `Teams` (
  `TeamId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `TeamCategory` bigint(20) NOT NULL,
  `Parent` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`TeamId`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of Teams
-- ----------------------------
INSERT INTO `Teams` VALUES ('1', 'گروه آلفا گرافیک', '-', '1', '0');
INSERT INTO `Teams` VALUES ('2', 'گروه برنامه نویسی پنگوئن', '', '0', '0');
INSERT INTO `Teams` VALUES ('3', 'گروه ارناهیت', '', '0', '0');

-- ----------------------------
-- Table structure for TeamSituationTypes
-- ----------------------------
DROP TABLE IF EXISTS `TeamSituationTypes`;
CREATE TABLE `TeamSituationTypes` (
  `TeamSituationTypeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`TeamSituationTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of TeamSituationTypes
-- ----------------------------
INSERT INTO `TeamSituationTypes` VALUES ('1', 'sdfdsf', 'sdfdsfds');
INSERT INTO `TeamSituationTypes` VALUES ('2', 'sdfdsfd', 'sdfsdfdsfsdf');
