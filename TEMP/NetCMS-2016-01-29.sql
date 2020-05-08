/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : Net3

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2016-01-29 13:27:06
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ExpertCategories
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of Experts
-- ----------------------------
INSERT INTO `Experts` VALUES ('1', 'java script', 'بسیار خوب        ', '0', '0');
INSERT INTO `Experts` VALUES ('2', 'c++', 'بسیار خوب و ...    ', '0', '1');
INSERT INTO `Experts` VALUES ('3', 'java', 'تسلط کامل    ', '0', '0');
INSERT INTO `Experts` VALUES ('4', 'css', 'تسلط کامل    ', '0', '3');
INSERT INTO `Experts` VALUES ('5', 'php', 'تسلط نسبی    ', '0', '3');
INSERT INTO `Experts` VALUES ('6', 'mysql', 'آشنایی نسبی    ', '0', '5');
INSERT INTO `Experts` VALUES ('7', 'مقاله نویسی', 'خوب    ', '0', '3');
INSERT INTO `Experts` VALUES ('60', 'sdfdsfdsf', 'sdfdsdfsdfdsf', '0', '1');
INSERT INTO `Experts` VALUES ('61', 'asdasd', 'asdsadasd', '0', '6');

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
INSERT INTO `ExpertSituationTypes` VALUES ('12', 'sdfdsf', 'sdfdsfds');
INSERT INTO `ExpertSituationTypes` VALUES ('13', 'sdfdsfd', 'sdfsdfdsfsdf');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of MemberExpert
-- ----------------------------
INSERT INTO `MemberExpert` VALUES ('5', '6', '6', '0');
INSERT INTO `MemberExpert` VALUES ('10', '7', '6', '0');
INSERT INTO `MemberExpert` VALUES ('14', '7', '7', '0');
INSERT INTO `MemberExpert` VALUES ('16', '8', '7', '0');
INSERT INTO `MemberExpert` VALUES ('18', '8', '9', '0');
INSERT INTO `MemberExpert` VALUES ('21', '25', '6', '0');
INSERT INTO `MemberExpert` VALUES ('22', '6', '17', '0');
INSERT INTO `MemberExpert` VALUES ('23', '6', '14', '0');
INSERT INTO `MemberExpert` VALUES ('27', '6', '17', '0');
INSERT INTO `MemberExpert` VALUES ('28', '25', '17', '0');
INSERT INTO `MemberExpert` VALUES ('29', '25', '11', '0');
INSERT INTO `MemberExpert` VALUES ('30', '6', '9', '0');

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
INSERT INTO `MemberProject` VALUES ('9', '8', '5', '13', '');
INSERT INTO `MemberProject` VALUES ('10', '25', '2', '13', '');
INSERT INTO `MemberProject` VALUES ('11', '25', '5', '13', '');
INSERT INTO `MemberProject` VALUES ('12', '25', '6', '13', '');
INSERT INTO `MemberProject` VALUES ('13', '25', '9', '13', '');
INSERT INTO `MemberProject` VALUES ('14', '25', '10', '13', '');
INSERT INTO `MemberProject` VALUES ('16', '0', '11', '15', 'بلههههه');
INSERT INTO `MemberProject` VALUES ('18', '0', '11', '17', 'بلههههه');
INSERT INTO `MemberProject` VALUES ('20', '25', '11', '19', '848418');
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of Members
-- ----------------------------
INSERT INTO `Members` VALUES ('6', 'نوین', 'خسروی', 'مرد', '2016-01-01', 'سیاهکل        \r\n            \r\n    ', '0000', '0000', '1', 'kami@test.com', '1', '0');
INSERT INTO `Members` VALUES ('7', 'حمید', 'درند', 'مرد', '1992-01-01', 'اول  کومله        \r\n            \r\n    ', '09389770018', '0000', '2', 'kami@test.com', '1', '0');
INSERT INTO `Members` VALUES ('8', 'کوروش', 'ترابی', 'مرد', '2016-01-01', 'دریاسر        \r\n    ', '0000', '0000', '3', 'kami@test.com', '1', '0');
INSERT INTO `Members` VALUES ('31', 'صص', 'صص', 'زن', '2016-01-01', 'صصصص', '11', '11', '4', 'kami@test.com', '1', '0');
INSERT INTO `Members` VALUES ('32', 'شش', 'شش', 'زن', '2016-01-01', 'شسشسش', '2121', '1212', '5', 'kami@test.com', '1', '0');

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
-- Table structure for Posts
-- ----------------------------
DROP TABLE IF EXISTS `Posts`;
CREATE TABLE `Posts` (
  `PostId` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`PostId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of Posts
-- ----------------------------
INSERT INTO `Posts` VALUES ('13', 'مدیر پروژه', 'مسلط به زبان انگلیسی    ');
INSERT INTO `Posts` VALUES ('14', 'طراح گرافیک', 'مسلط به فتوشاپ    ');
INSERT INTO `Posts` VALUES ('15', 'برنامه نویس', 'مسلط به php    ');
INSERT INTO `Posts` VALUES ('17', 'همکار', 'کمک کردن    ');
INSERT INTO `Posts` VALUES ('20', 'ضض', 'ضضضض');

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
INSERT INTO `ProductCategories` VALUES ('1', 'asdsad', 'sadasdsad', '0');
INSERT INTO `ProductCategories` VALUES ('2', 'asdsa', 'sadasd', '0');
INSERT INTO `ProductCategories` VALUES ('3', 'asds', 'sadsadsadd', '0');
INSERT INTO `ProductCategories` VALUES ('4', 'sadsad', 'asdasdds', '0');
INSERT INTO `ProductCategories` VALUES ('5', 'sdfds', 'dsfsdfs', '3');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ProductMember
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Products
-- ----------------------------
INSERT INTO `Products` VALUES ('2', 'وکیلیار', 'نرم افزار اندرویدی ', '1', '3', '3');
INSERT INTO `Products` VALUES ('3', 'آی املاک', 'تست', '1', '3', '3');
INSERT INTO `Products` VALUES ('4', 'سیستم فروشگاه', 'بهترین سیستم فروشگاهی', '1', '3', '3');
INSERT INTO `Products` VALUES ('5', 'نرم افزار سپیدار', '-', '1', '3', '3');
INSERT INTO `Products` VALUES ('6', 'نرم افزار هلو', '-', '1', '3', '3');
INSERT INTO `Products` VALUES ('7', 'نرم افزار آنلاین فروشگاه اتومبیل', '-', '1', '3', '3');
INSERT INTO `Products` VALUES ('8', 'سیستم آزمون آنلاین', '-', '1', '3', '3');
INSERT INTO `Products` VALUES ('9', 'تست', '-', '1', '3', '3');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ProjectCategories
-- ----------------------------

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
INSERT INTO `Projects` VALUES ('2', 'وکیلیار', '0', 'نرم افزار انتخاباتی', '10');
INSERT INTO `Projects` VALUES ('5', 'پنگوئن', '0', 'سایت مقالات            ', '0');
INSERT INTO `Projects` VALUES ('6', 'فروشگاه اینترنتی', '0', 'با امکانات بالا    ', '0');
INSERT INTO `Projects` VALUES ('9', 'سایت املاک', '0', 'در حال اجرا', '0');
INSERT INTO `Projects` VALUES ('10', 'سایت شبکه', '0', 'طرح اولیه و هنوز ...', '0');
INSERT INTO `Projects` VALUES ('13', 'پروژه دانشجویی کیف پول', '0', '-', '0');
INSERT INTO `Projects` VALUES ('14', 'پروژه مدیریت پروژه', '0', '-', '13');

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
