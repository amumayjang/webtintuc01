/*
Navicat MySQL Data Transfer

Source Server         : Build
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : webbanhang01_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-04-24 17:22:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('3', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('4', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('5', '2017_04_24_062754_create_roles_table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Thành viên', null, null);
INSERT INTO `roles` VALUES ('2', 'Cộng tác viên', null, null);
INSERT INTO `roles` VALUES ('3', 'Biên tập viên', null, null);
INSERT INTO `roles` VALUES ('4', 'Quản trị viên', null, null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Lê Hữu Trường', 'lehuutruong@gmail.com', '$2y$10$BLpEwA4Udb4WmVa0RU2KjeNtN5dQ0O.7jz3uJgXoc.cDFZd3TRzqu', null, '1', null, '2017-04-24 07:04:33', '2017-04-24 07:04:33');
INSERT INTO `users` VALUES ('2', 'Le Hoang Son', 'leson@gmail.com', '$2y$10$gBQWQkDnKOfPHzMGELlQOOUVEyUovhEs21wfRkBL79FMwT6XbvgoK', null, '1', null, '2017-04-24 07:07:19', '2017-04-24 07:07:19');
INSERT INTO `users` VALUES ('3', 'Le hoang', 'lehoang@gmail.com', '$2y$10$ty3rjQusE.Mr38JMSqICveZx/Cd12eiaiJZcmY4SljeA.oYZ9XPMm', null, '1', null, '2017-04-24 07:10:02', '2017-04-24 07:10:02');
INSERT INTO `users` VALUES ('4', 'Le Hồng', 'lehoangson@gmail.com', '$2y$10$h4AM44PjQ71Ynkkp0WtOyO87Xpm1zY/QvJATngssM20NRN80LU1DO', null, '1', null, '2017-04-24 07:11:29', '2017-04-24 07:11:29');
INSERT INTO `users` VALUES ('5', 'Le viet anh', 'levietanh@gmail.com', '$2y$10$8THvqrkwIh9rgZRHPzGd0eneAaw8me7BT80r4AKPD6dxpf3HSCpk2', 'i60aR_0132100.png', '1', null, '2017-04-24 07:14:14', '2017-04-24 07:14:14');
