/*
Navicat MySQL Data Transfer

Source Server         : home
Source Server Version : 50541
Source Host           : 192.168.1.114:3306
Source Database       : schoolfriend

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-03-23 22:08:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_accept
-- ----------------------------
DROP TABLE IF EXISTS `t_accept`;
CREATE TABLE `t_accept` (
  `AcceptId` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `RecruitId` int(8) NOT NULL,
  `SFUserId` int(8) NOT NULL,
  `AcceptTime` date NOT NULL,
  `AcceptSalary` varchar(12) DEFAULT NULL,
  `AcceptClaim` text,
  `AcceptType` tinyint(1) NOT NULL,
  PRIMARY KEY (`AcceptId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_apply
-- ----------------------------
DROP TABLE IF EXISTS `t_apply`;
CREATE TABLE `t_apply` (
  `ApplyTrade` char(5) NOT NULL,
  `ApplyId` int(8) NOT NULL AUTO_INCREMENT,
  `SFUserId` int(8) NOT NULL,
  `ApplyUnit` varchar(40) NOT NULL,
  `ApplySalary` int(12) NOT NULL,
  `ApplyClaim` text,
  `ApplyLocation` varchar(40) NOT NULL,
  `ApplyTime` date NOT NULL,
  `ApplyETime` date NOT NULL,
  `ApplyType` bit(1) NOT NULL,
  PRIMARY KEY (`ApplyId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_basecode
-- ----------------------------
DROP TABLE IF EXISTS `t_basecode`;
CREATE TABLE `t_basecode` (
  `CodeId` int(4) NOT NULL AUTO_INCREMENT,
  `CodeCategoryId` int(3) DEFAULT NULL,
  `CodeCategoryName` varchar(10) DEFAULT NULL,
  `CodeName` varchar(10) DEFAULT NULL,
  `CodeOrder` int(3) DEFAULT NULL,
  PRIMARY KEY (`CodeId`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_class
-- ----------------------------
DROP TABLE IF EXISTS `t_class`;
CREATE TABLE `t_class` (
  `ClassId` int(8) NOT NULL AUTO_INCREMENT,
  `ClassName` varchar(50) NOT NULL,
  `SchoolId` int(8) NOT NULL,
  `GoSTime` year(4) NOT NULL,
  `CollegeName` varchar(50) NOT NULL,
  `MajorName` varchar(50) DEFAULT NULL,
  `ClassCDate` date DEFAULT NULL,
  `ClassContent` text,
  `SFUserId` int(8) NOT NULL,
  `ClassOrder` int(10) NOT NULL,
  PRIMARY KEY (`ClassId`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_function
-- ----------------------------
DROP TABLE IF EXISTS `t_function`;
CREATE TABLE `t_function` (
  `FunctionId` int(8) NOT NULL,
  `FunctionName` varchar(10) NOT NULL,
  `FunctionOrder` int(3) NOT NULL,
  PRIMARY KEY (`FunctionId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_idcode
-- ----------------------------
DROP TABLE IF EXISTS `t_idcode`;
CREATE TABLE `t_idcode` (
  `CityId` int(8) NOT NULL,
  `CityName` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CityId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_information
-- ----------------------------
DROP TABLE IF EXISTS `t_information`;
CREATE TABLE `t_information` (
  `InfoId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SFUserId` int(8) NOT NULL,
  `InfoTitle` varchar(50) NOT NULL,
  `InfoContent` text,
  `InfoPictureAdd` varchar(50) DEFAULT NULL,
  `InfoRTime` date NOT NULL,
  `InfoETime` date NOT NULL,
  `Visibility` tinyint(2) DEFAULT NULL,
  `InfoType` bit(1) NOT NULL,
  `InfoOrder` int(3) DEFAULT NULL,
  `InfoVisitTimes` int(11) DEFAULT NULL,
  PRIMARY KEY (`InfoId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_news
-- ----------------------------
DROP TABLE IF EXISTS `t_news`;
CREATE TABLE `t_news` (
  `NewsId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NewsTitle` varchar(20) NOT NULL,
  `NewsContent` text NOT NULL,
  `NewsCategory` varchar(8) NOT NULL,
  `NewsAddTime` datetime NOT NULL,
  `SFUserId` int(8) NOT NULL,
  `NewsVisitTimes` int(8) DEFAULT NULL,
  `NewsOrder` int(3) NOT NULL,
  PRIMARY KEY (`NewsId`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_photo
-- ----------------------------
DROP TABLE IF EXISTS `t_photo`;
CREATE TABLE `t_photo` (
  `PhotoId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SFUserId` int(10) NOT NULL,
  `PhotoType` tinyint(2) NOT NULL,
  `PhotoAdd` varchar(50) NOT NULL,
  `PhotoTitle` varchar(20) NOT NULL,
  `PhotoPresent` varchar(100) DEFAULT NULL,
  `Visibility` tinyint(2) NOT NULL,
  `PhotoTime` date NOT NULL,
  `PhotoTimes` int(5) DEFAULT NULL,
  PRIMARY KEY (`PhotoId`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_product
-- ----------------------------
DROP TABLE IF EXISTS `t_product`;
CREATE TABLE `t_product` (
  `ProductId` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `SFUserId` int(8) NOT NULL,
  `ProductName` varchar(20) NOT NULL,
  `ProductContent` text NOT NULL,
  `ProductFContent` text,
  `ProductPrice` varchar(20) NOT NULL,
  `ProductUnit` varchar(8) NOT NULL,
  `ProductPAdd` varchar(50) DEFAULT NULL,
  `ProductRTime` date NOT NULL,
  `ProductETime` date NOT NULL,
  `Visibility` tinyint(1) DEFAULT NULL,
  `ProductOrder` tinyint(1) DEFAULT NULL,
  `ProductRecommend` bit(1) NOT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_recruit
-- ----------------------------
DROP TABLE IF EXISTS `t_recruit`;
CREATE TABLE `t_recruit` (
  `RecruitId` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `SFUserId` int(8) NOT NULL,
  `RecruitTrade` char(4) DEFAULT NULL,
  `RecruitTitle` varchar(60) NOT NULL,
  `RecruitPosition` varchar(40) NOT NULL,
  `RecruitPContent` text,
  `RecruitClaim` text,
  `RecruitLocation` varchar(40) NOT NULL,
  `RecruitDegree` varchar(8) DEFAULT NULL,
  `RecruitTime` date NOT NULL,
  `RecruitETime` date NOT NULL,
  `RecruitType` bit(1) NOT NULL,
  `RecruitOrder` tinyint(4) DEFAULT NULL,
  `RecruitVisitTimes` int(11) NOT NULL,
  PRIMARY KEY (`RecruitId`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_role
-- ----------------------------
DROP TABLE IF EXISTS `t_role`;
CREATE TABLE `t_role` (
  `SFUserId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SFUserGrade` int(5) NOT NULL,
  `FunctionId` int(8) NOT NULL,
  `SmallPoints` int(5) NOT NULL,
  `BigPoints` int(8) NOT NULL,
  `GradeName` varchar(10) NOT NULL,
  `GradeOrder` int(5) NOT NULL,
  PRIMARY KEY (`SFUserId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_school
-- ----------------------------
DROP TABLE IF EXISTS `t_school`;
CREATE TABLE `t_school` (
  `SchoolId` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `CityId` char(8) NOT NULL,
  `SchoolName` varchar(50) NOT NULL,
  `SchoolRelation` int(10) DEFAULT NULL,
  `SchoolAdd` varchar(50) NOT NULL,
  `School985` bit(1) DEFAULT NULL,
  `School211` int(1) DEFAULT NULL,
  `SchoolBirthday` date DEFAULT NULL,
  `SchoolSynopsis` text,
  `SchoolCDate` date DEFAULT NULL,
  `SFUserId` int(8) NOT NULL,
  `SchooOrder` int(3) NOT NULL,
  PRIMARY KEY (`SchoolId`)
) ENGINE=MyISAM AUTO_INCREMENT=3503 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_sfuser
-- ----------------------------
DROP TABLE IF EXISTS `t_sfuser`;
CREATE TABLE `t_sfuser` (
  `SFUserId` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `SFUserLogin` varchar(20) NOT NULL,
  `SFUserKey` varchar(50) NOT NULL,
  `SFUserTime` date DEFAULT NULL,
  `SFULandTime` datetime DEFAULT NULL,
  `SFULandTimes` int(5) DEFAULT NULL,
  `SFUserState` bit(1) DEFAULT NULL,
  `SFUserGrade` int(2) DEFAULT NULL,
  `SFUserManage` bit(1) NOT NULL,
  `SFUserIdentifying` varchar(50) DEFAULT NULL,
  `SFUserAdd` varchar(50) DEFAULT NULL,
  `SFUserTrueName` varchar(50) DEFAULT NULL,
  `SFUserSex` tinyint(1) DEFAULT NULL,
  `SFUserBirthday` date DEFAULT NULL,
  `SFUserSno` varchar(20) DEFAULT NULL,
  `SchoolID` int(8) DEFAULT NULL,
  `ClassID` varchar(50) DEFAULT NULL,
  `ClassFriendId` varchar(50) DEFAULT NULL,
  `LastDegree` int(2) DEFAULT NULL,
  `SFUserRank` int(2) DEFAULT NULL,
  `SFUserPosition` varchar(50) DEFAULT NULL,
  `SFUserCompany` varchar(50) DEFAULT NULL,
  `CompanyPresent` text,
  `CompanyTrade` varchar(20) DEFAULT NULL,
  `CompanyAdd` varchar(50) DEFAULT NULL,
  `Hometown` varchar(50) DEFAULT NULL,
  `SFUserPreAdd` varchar(50) DEFAULT NULL,
  `SFUserQq` varchar(20) DEFAULT NULL,
  `SFUserTel` char(11) DEFAULT NULL,
  `SFUserWTel` char(12) DEFAULT NULL,
  `SFUserPostCode` char(6) DEFAULT NULL,
  `SFUserEmail` varchar(50) DEFAULT NULL,
  `SFUserLike` varchar(100) DEFAULT NULL,
  `SFUserExperience` text,
  `CompanyType` tinyint(1) DEFAULT NULL,
  `SFUserRelasion` tinyint(1) DEFAULT NULL,
  `SFUserExamine` bit(1) NOT NULL,
  `SFUserExamineId` int(8) DEFAULT NULL,
  `ExamineDate` date DEFAULT NULL,
  `Accumulated` int(100) DEFAULT NULL,
  PRIMARY KEY (`SFUserId`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_talk
-- ----------------------------
DROP TABLE IF EXISTS `t_talk`;
CREATE TABLE `t_talk` (
  `TalkId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TalkContent` text,
  `SFUserId` int(8) NOT NULL,
  `TalkTime` datetime DEFAULT NULL,
  PRIMARY KEY (`TalkId`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_thing
-- ----------------------------
DROP TABLE IF EXISTS `t_thing`;
CREATE TABLE `t_thing` (
  `ThingId` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `ThingTitle` varchar(50) NOT NULL,
  `ThingContent` text NOT NULL,
  `SFUserId` int(8) NOT NULL,
  `ThingTime` date NOT NULL,
  `RelatedId` varchar(100) DEFAULT NULL,
  `ThingHTime` date DEFAULT NULL,
  `ThingGuess` bit(1) DEFAULT NULL,
  `ThingOrder` int(11) DEFAULT NULL,
  `ThingVisitTimes` int(11) DEFAULT NULL,
  PRIMARY KEY (`ThingId`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_trade
-- ----------------------------
DROP TABLE IF EXISTS `t_trade`;
CREATE TABLE `t_trade` (
  `TradeId` char(8) NOT NULL,
  `TradeName` varchar(50) NOT NULL,
  `TradeOrder` int(2) DEFAULT NULL,
  PRIMARY KEY (`TradeId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
