/*
Navicat MySQL Data Transfer

Source Server         : Build
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : webbanhang01_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-03 16:46:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imgThumb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `cate_id` int(10) unsigned NOT NULL,
  `time_public` datetime DEFAULT NULL,
  `hot` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', 'Máy bay ném bom B-1 của Mỹ quần thảo bán đảo Triều Tiên', '<p>C&aacute;c m&aacute;y bay n&eacute;m bom B-1 của Kh&ocirc;ng qu&acirc;n Mỹ đ&atilde; tiến h&agrave;nh 4 sứ mệnh hiện diện tại khu vực Ấn Độ-ch&acirc;u &Aacute;-Th&aacute;i B&igrave;nh Dương kể từ ng&agrave;y 1/4 v&agrave; bay gần b&aacute;n đảo Triều Ti&ecirc;n 2 lần trong 2 tuần qua, Kh&ocirc;ng qu&acirc;n Mỹ x&aacute;c nhận, trong một động th&aacute;i khiến B&igrave;nh Nhưỡng nổi giận giữa l&uacute;c căng thẳng leo thang trong khu vực.<br />\r\n&nbsp;&gt;&gt; Triều Ti&ecirc;n &ldquo;tố&rdquo; Mỹ g&acirc;y căng thẳng khi đưa m&aacute;y bay n&eacute;m bom tới khu vực<br />\r\n&nbsp;&gt;&gt; T&agrave;u s&acirc;n bay Mỹ đ&atilde; v&agrave;o vị tr&iacute; c&oacute; thể vươn tầm bắn tới Triều Ti&ecirc;n</p>\r\n\r\n<p>C&aacute;c m&aacute;y bay n&eacute;m bom B-1 của Mỹ (Ảnh: Aviationist)<br />\r\nC&aacute;c m&aacute;y bay n&eacute;m bom B-1 của Mỹ (Ảnh: Aviationist)<br />\r\nTheo Kh&ocirc;ng qu&acirc;n Mỹ, h&ocirc;m 1/5, hai m&aacute;y bay n&eacute;m bom B-1 của Mỹ đ&atilde; rời căn cứ kh&ocirc;ng qu&acirc;n Andersen tại đảo Guam v&agrave; tiến h&agrave;nh một cuộc tập trận chung với c&aacute;c lực lượng kh&ocirc;ng qu&acirc;n Nhật Bản v&agrave; H&agrave;n Quốc tr&ecirc;n b&aacute;n đảo Triều Ti&ecirc;n, CNN đưa tin.</p>\r\n\r\n<p>Trong một động th&aacute;i ri&ecirc;ng rẽ, hai m&aacute;y bay n&eacute;m bom B-1 đ&atilde; bay qua H&agrave;n Quốc hồi cuối th&aacute;ng 4, một quan chức quốc ph&ograve;ng Mỹ giấu t&ecirc;n tiết lộ. C&aacute;c m&aacute;y bay n&agrave;y cũng bay gần Australia h&ocirc;m 17/4 v&agrave; gần Biển Đ&ocirc;ng v&agrave;o ng&agrave;y 11/4.</p>\r\n\r\n<p>Theo quan chức tr&ecirc;n, cả hai sứ mệnh gần b&aacute;n đảo Triều Ti&ecirc;n đ&atilde; được l&ecirc;n kế hoạch từ l&acirc;u nhưng giới chức Mỹ đ&atilde; quyết định kh&ocirc;ng c&ocirc;ng bố rộng r&atilde;i c&aacute;c sứ mệnh n&agrave;y để tr&aacute;nh l&agrave;m gia tăng căng thẳng trong khu vực.</p>\r\n\r\n<p>Nhưng c&aacute;c chuyến bay cũng nhằm &ldquo;ph&ocirc; diễn sức mạnh của c&aacute;c li&ecirc;n minh song phương giữa Mỹ, Nhật Bản v&agrave; H&agrave;n Quốc, v&agrave; cho thấy sự hợp t&aacute;c 3 b&ecirc;n ng&agrave;y c&agrave;ng mở rộng nhằm bảo vệ trước c&aacute;c mối đe dọa th&ocirc;ng thường trong khu vực&rdquo;, ph&aacute;t ng&ocirc;n vi&ecirc;n Kh&ocirc;ng qu&acirc;n Mỹ Lori Hodge cho hay.</p>\r\n\r\n<p>Triều Ti&ecirc;n ng&agrave;y 2/5 đ&atilde; c&aacute;o buộc Mỹ cố t&igrave;nh tiến h&agrave;nh một &ldquo;h&agrave;nh động khi&ecirc;u kh&iacute;ch qu&acirc;n sự&rdquo; li&ecirc;n quan tới việc điều động c&aacute;c m&aacute;y bay n&eacute;m bom B-1.</p>\r\n\r\n<p>&ldquo;C&aacute;c m&aacute;y bay B-1B từ Guam đ&atilde; &acirc;m thầm bay qua v&ugrave;ng trời tr&ecirc;n Hoa Đ&ocirc;ng (h&ocirc;m 1/5) v&agrave; tham gia v&agrave;o c&aacute;c hoạt động phối hợp t&aacute;c chiến c&ugrave;ng với c&aacute;c phương tiện tấn c&ocirc;ng chiến lược, bao gồm t&agrave;u s&acirc;n bay v&agrave; t&agrave;u ngầm hạt nh&acirc;n&rdquo;, h&atilde;ng th&ocirc;ng tấn nh&agrave; nước Triều Ti&ecirc;n KCNA đưa tin.</p>\r\n\r\n<p>Đợt hai của hai sứ mệnh bay tr&ecirc;n diễn ra c&ugrave;ng ng&agrave;y Tổng thống Mỹ Donald Trump bất ngờ tuy&ecirc;n bố &ocirc;ng c&oacute; thể gặp nh&agrave; l&atilde;nh đạo Triều Ti&ecirc;n Kim Jong-un &ldquo;khi điều kiện cho ph&eacute;p&rdquo; để th&aacute;o gỡ căng thẳng tr&ecirc;n b&aacute;n đảo Triều Ti&ecirc;n.</p>\r\n\r\n<p>Chưa c&oacute; một nh&agrave; l&atilde;nh đạo Mỹ đương nhiệm n&agrave;o từng gặp một l&atilde;nh đạo Triều Ti&ecirc;n đang tại vị, v&agrave; tuy&ecirc;n bố của &ocirc;ng Trump đ&atilde; g&acirc;y nhiều tranh c&atilde;i.</p>\r\n\r\n<p>Ngo&agrave;i m&aacute;y bay nem bom B-1, Mỹ c&ograve;n điều một nh&oacute;m t&aacute;c chiến t&agrave;u s&acirc;n bay tới khu vực v&agrave; triển khai hệ thống ph&ograve;ng thủ t&ecirc;n lửa đạn đạo THAAD tới H&agrave;n Quốc.</p>\r\n\r\n<p>Việc Mỹ sử dụng c&aacute;c m&aacute;y bay n&eacute;m bom đồn tr&uacute; tại đảo Guam để &ldquo;nắn g&acirc;n&rdquo; Triều Ti&ecirc;n kh&ocirc;ng phải l&agrave; mới. Sau khi B&igrave;nh Nhưỡng thử hạt nh&acirc;n lần 4 hồi th&aacute;ng 1/2016, một m&aacute;y n&eacute;m bom B-52 của Mỹ tại Guam đ&atilde; bay qua b&aacute;n đảo Triều Ti&ecirc;n.</p>\r\n\r\n<p>C&aacute;c m&aacute;y bay n&eacute;m bom của Mỹ đ&atilde; duy tr&igrave; sự hiện diện ở Th&aacute;i B&igrave;nh Dương từ năm 2004.</p>\r\n\r\n<p>An B&igrave;nh</p>', 'may-bay-nem-bom-b-1-cua-my-quan-thao-ban-dao-trieu-tien', '6mEq9_Classics.jpg', 'C&aacute;c m&aacute;y bay n&eacute;m bom B-1 của Kh&ocirc;ng qu&acirc;n Mỹ đ&atilde; tiến h&a', '2', '2', null, '1', null, null, '2017-05-03 11:03:11', '2017-05-03 11:03:11');
INSERT INTO `articles` VALUES ('2', 'Ngày mai miền Bắc chấm dứt nắng nóng', '<p>&iacute; Ng&agrave;y mai (4/5), nắng n&oacute;ng diện rộng chấm dứt ở Bắc Bộ, Bắc Trung Bộ v&agrave; dịu dần ở khu vực Trung Trung Bộ.<br />\r\nNgười d&acirc;n đối ph&oacute; với nắng n&oacute;ng đầu h&egrave; (Ảnh minh họa: Phạm Nguyễn)<br />\r\nNgười d&acirc;n đối ph&oacute; với nắng n&oacute;ng đầu h&egrave; (Ảnh minh họa: Phạm Nguyễn)<br />\r\nTheo Trung t&acirc;m Dự b&aacute;o Kh&iacute; tượng thuỷ văn Trung ương, ng&agrave;y h&ocirc;m qua (2/5), ở khu vực ph&iacute;a T&acirc;y Bắc Bộ v&agrave; c&aacute;c tỉnh từ Nghệ An đến Ph&uacute; Y&ecirc;n đ&atilde; c&oacute; nắng n&oacute;ng với nhiệt độ cao nhất trong ng&agrave;y phổ biến khoảng 35-38 độ C, c&oacute; nơi tr&ecirc;n 38 độ C như: Mường La 38.5 độ C, Y&ecirc;n Ch&acirc;u 39.5 độ C, Tương Dương v&agrave; Quỳ Hợp 39.0 độ C, Đ&ocirc;ng H&agrave; 39.0 độ C.</p>\r\n\r\n<p>Dự b&aacute;o ng&agrave;y h&ocirc;m nay (3/5), nắng n&oacute;ng xảy ra tr&ecirc;n diện rộng ở hầu khắp Bắc Bộ v&agrave; c&aacute;c tỉnh từ Thanh H&oacute;a đến Ph&uacute; Y&ecirc;n với nhiệt độ cao nhất phổ biến 35-38 độ C, c&oacute; nơi tr&ecirc;n 39 độ C. Thời gian c&oacute; nhiệt độ tr&ecirc;n 35 độ từ 12-16 giờ.</p>\r\n\r\n<p>Khu vực H&agrave; Nội: Ng&agrave;y h&ocirc;m nay c&oacute; nắng n&oacute;ng với nhiệt độ cao nhất trong ng&agrave;y phổ biến 35-37 độ C.</p>\r\n\r\n<p>Ngo&agrave;i ra, bộ phận kh&ocirc;ng kh&iacute; lạnh đ&atilde; b&aacute;o vẫn đang di chuyển xuống ph&iacute;a Nam. Do ảnh hưởng của kh&ocirc;ng kh&iacute; lạnh n&eacute;n r&atilde;nh &aacute;p thấp, từ gần s&aacute;ng v&agrave; s&aacute;ng ng&agrave;y mai (4/5) ở khu vực Đ&ocirc;ng Bắc Bắc Bộ c&oacute; mưa r&agrave;o v&agrave; rải r&aacute;c c&oacute; gi&ocirc;ng; chiều v&agrave; đ&ecirc;m mai ở c&aacute;c tỉnh ph&iacute;a Đ&ocirc;ng Bắc Bộ, Bắc v&agrave; Trung Trung Bộ c&oacute; mưa r&agrave;o v&agrave; gi&ocirc;ng rải r&aacute;c. Trong cơn gi&ocirc;ng c&oacute; khả năng xảy ra tố, lốc, mưa đ&aacute; v&agrave; gi&oacute; giật mạnh.</p>\r\n\r\n<p>Ng&agrave;y mai (4/5), nắng n&oacute;ng diện rộng chấm dứt ở Bắc Bộ, Bắc Trung Bộ v&agrave; dịu dần ở khu vực Trung Trung Bộ.</p>\r\n\r\n<p>Nguyễn Dương</p>', 'ngay-mai-mien-bac-cham-dut-nang-nong', 'Xs5aL_d36bb9ef6cbab80383ed6ab92f1c4fb5.jpg', '&iacute; Ng&agrave;y mai (4/5), nắng n&oacute;ng diện rộng chấm dứt ở Bắc Bộ, Bắc ', '2', '3', null, '1', null, null, '2017-05-03 11:43:36', '2017-05-03 11:43:36');
INSERT INTO `articles` VALUES ('3', 'Ngày mai miền Bắc chấm dứt nắng nóng', '<p>&iacute; Ng&agrave;y mai (4/5), nắng n&oacute;ng diện rộng chấm dứt ở Bắc Bộ, Bắc Trung Bộ v&agrave; dịu dần ở khu vực Trung Trung Bộ.<br />\r\nNgười d&acirc;n đối ph&oacute; với nắng n&oacute;ng đầu h&egrave; (Ảnh minh họa: Phạm Nguyễn)<br />\r\nNgười d&acirc;n đối ph&oacute; với nắng n&oacute;ng đầu h&egrave; (Ảnh minh họa: Phạm Nguyễn)<br />\r\nTheo Trung t&acirc;m Dự b&aacute;o Kh&iacute; tượng thuỷ văn Trung ương, ng&agrave;y h&ocirc;m qua (2/5), ở khu vực ph&iacute;a T&acirc;y Bắc Bộ v&agrave; c&aacute;c tỉnh từ Nghệ An đến Ph&uacute; Y&ecirc;n đ&atilde; c&oacute; nắng n&oacute;ng với nhiệt độ cao nhất trong ng&agrave;y phổ biến khoảng 35-38 độ C, c&oacute; nơi tr&ecirc;n 38 độ C như: Mường La 38.5 độ C, Y&ecirc;n Ch&acirc;u 39.5 độ C, Tương Dương v&agrave; Quỳ Hợp 39.0 độ C, Đ&ocirc;ng H&agrave; 39.0 độ C.</p>\r\n\r\n<p>Dự b&aacute;o ng&agrave;y h&ocirc;m nay (3/5), nắng n&oacute;ng xảy ra tr&ecirc;n diện rộng ở hầu khắp Bắc Bộ v&agrave; c&aacute;c tỉnh từ Thanh H&oacute;a đến Ph&uacute; Y&ecirc;n với nhiệt độ cao nhất phổ biến 35-38 độ C, c&oacute; nơi tr&ecirc;n 39 độ C. Thời gian c&oacute; nhiệt độ tr&ecirc;n 35 độ từ 12-16 giờ.</p>\r\n\r\n<p>Khu vực H&agrave; Nội: Ng&agrave;y h&ocirc;m nay c&oacute; nắng n&oacute;ng với nhiệt độ cao nhất trong ng&agrave;y phổ biến 35-37 độ C.</p>\r\n\r\n<p>Ngo&agrave;i ra, bộ phận kh&ocirc;ng kh&iacute; lạnh đ&atilde; b&aacute;o vẫn đang di chuyển xuống ph&iacute;a Nam. Do ảnh hưởng của kh&ocirc;ng kh&iacute; lạnh n&eacute;n r&atilde;nh &aacute;p thấp, từ gần s&aacute;ng v&agrave; s&aacute;ng ng&agrave;y mai (4/5) ở khu vực Đ&ocirc;ng Bắc Bắc Bộ c&oacute; mưa r&agrave;o v&agrave; rải r&aacute;c c&oacute; gi&ocirc;ng; chiều v&agrave; đ&ecirc;m mai ở c&aacute;c tỉnh ph&iacute;a Đ&ocirc;ng Bắc Bộ, Bắc v&agrave; Trung Trung Bộ c&oacute; mưa r&agrave;o v&agrave; gi&ocirc;ng rải r&aacute;c. Trong cơn gi&ocirc;ng c&oacute; khả năng xảy ra tố, lốc, mưa đ&aacute; v&agrave; gi&oacute; giật mạnh.</p>\r\n\r\n<p>Ng&agrave;y mai (4/5), nắng n&oacute;ng diện rộng chấm dứt ở Bắc Bộ, Bắc Trung Bộ v&agrave; dịu dần ở khu vực Trung Trung Bộ.</p>\r\n\r\n<p>Nguyễn Dương</p>', 'ngay-mai-mien-bac-cham-dut-nang-nong', '', '&iacute; Ng&agrave;y mai (4/5), nắng n&oacute;ng diện rộng chấm dứt ở Bắc Bộ, Bắc ', '2', '1', null, '0', null, null, '2017-05-03 11:44:44', '2017-05-03 16:45:23');
INSERT INTO `articles` VALUES ('4', 'Ngày mai miền Bắc chấm dứt nắng nóng', '<p>&iacute; Ng&agrave;y mai (4/5), nắng n&oacute;ng diện rộng chấm dứt ở Bắc Bộ, Bắc Trung Bộ v&agrave; dịu dần ở khu vực Trung Trung Bộ.<br />\r\nNgười d&acirc;n đối ph&oacute; với nắng n&oacute;ng đầu h&egrave; (Ảnh minh họa: Phạm Nguyễn)<br />\r\nNgười d&acirc;n đối ph&oacute; với nắng n&oacute;ng đầu h&egrave; (Ảnh minh họa: Phạm Nguyễn)<br />\r\nTheo Trung t&acirc;m Dự b&aacute;o Kh&iacute; tượng thuỷ văn Trung ương, ng&agrave;y h&ocirc;m qua (2/5), ở khu vực ph&iacute;a T&acirc;y Bắc Bộ v&agrave; c&aacute;c tỉnh từ Nghệ An đến Ph&uacute; Y&ecirc;n đ&atilde; c&oacute; nắng n&oacute;ng với nhiệt độ cao nhất trong ng&agrave;y phổ biến khoảng 35-38 độ C, c&oacute; nơi tr&ecirc;n 38 độ C như: Mường La 38.5 độ C, Y&ecirc;n Ch&acirc;u 39.5 độ C, Tương Dương v&agrave; Quỳ Hợp 39.0 độ C, Đ&ocirc;ng H&agrave; 39.0 độ C.</p>\r\n\r\n<p>Dự b&aacute;o ng&agrave;y h&ocirc;m nay (3/5), nắng n&oacute;ng xảy ra tr&ecirc;n diện rộng ở hầu khắp Bắc Bộ v&agrave; c&aacute;c tỉnh từ Thanh H&oacute;a đến Ph&uacute; Y&ecirc;n với nhiệt độ cao nhất phổ biến 35-38 độ C, c&oacute; nơi tr&ecirc;n 39 độ C. Thời gian c&oacute; nhiệt độ tr&ecirc;n 35 độ từ 12-16 giờ.</p>\r\n\r\n<p>Khu vực H&agrave; Nội: Ng&agrave;y h&ocirc;m nay c&oacute; nắng n&oacute;ng với nhiệt độ cao nhất trong ng&agrave;y phổ biến 35-37 độ C.</p>\r\n\r\n<p>Ngo&agrave;i ra, bộ phận kh&ocirc;ng kh&iacute; lạnh đ&atilde; b&aacute;o vẫn đang di chuyển xuống ph&iacute;a Nam. Do ảnh hưởng của kh&ocirc;ng kh&iacute; lạnh n&eacute;n r&atilde;nh &aacute;p thấp, từ gần s&aacute;ng v&agrave; s&aacute;ng ng&agrave;y mai (4/5) ở khu vực Đ&ocirc;ng Bắc Bắc Bộ c&oacute; mưa r&agrave;o v&agrave; rải r&aacute;c c&oacute; gi&ocirc;ng; chiều v&agrave; đ&ecirc;m mai ở c&aacute;c tỉnh ph&iacute;a Đ&ocirc;ng Bắc Bộ, Bắc v&agrave; Trung Trung Bộ c&oacute; mưa r&agrave;o v&agrave; gi&ocirc;ng rải r&aacute;c. Trong cơn gi&ocirc;ng c&oacute; khả năng xảy ra tố, lốc, mưa đ&aacute; v&agrave; gi&oacute; giật mạnh.</p>\r\n\r\n<p>Ng&agrave;y mai (4/5), nắng n&oacute;ng diện rộng chấm dứt ở Bắc Bộ, Bắc Trung Bộ v&agrave; dịu dần ở khu vực Trung Trung Bộ.</p>\r\n\r\n<p>Nguyễn Dương</p>', 'ngay-mai-mien-bac-cham-dut-nang-nong', 'OfTWu_d36bb9ef6cbab80383ed6ab92f1c4fb5.jpg', '&iacute; Ng&agrave;y mai (4/5), nắng n&oacute;ng diện rộng chấm dứt ở Bắc Bộ, Bắc ', '2', '3', null, '1', null, null, '2017-05-03 11:44:55', '2017-05-03 11:44:55');
INSERT INTO `articles` VALUES ('5', 'HLV Zidane: “C.Ronaldo là cầu thủ độc nhất vô nhị”', '<p>Sau trận đấu với Atletico Madrid, HLV Zidane đ&atilde; kh&ocirc;ng ngớt lời khen ngợi C.Ronaldo. Thậm ch&iacute;, &ocirc;ng cho rằng cậu học tr&ograve; của m&igrave;nh l&agrave; cầu thủ độc nhất v&ocirc; nhị.<br />\r\n&nbsp;&gt;&gt; Những khoảnh khắc C.Ronaldo nhấn ch&igrave;m Atletico tại Bernabeu<br />\r\n&nbsp;&gt;&gt; Real Madrid 3-0 Atletico: Hat-trick của C.Ronaldo<br />\r\nĐ&ecirc;m qua, C.Ronaldo lại sắm vai người h&ugrave;ng của Rael Madrid khi tỏa s&aacute;ng rực rỡ với 3 b&agrave;n thắng, gi&uacute;p cho đội nh&agrave; gi&agrave;nh chiến thắng với tỷ số 3-0 trước Atletico Madrid ở lượt đi v&ograve;ng b&aacute;n kết Champions League.</p>\r\n\r\n<p>HLV Zidane hết lời khen ngợi C.Ronaldo v&agrave; đồng đội<br />\r\nHLV Zidane hết lời khen ngợi C.Ronaldo v&agrave; đồng đội<br />\r\nSau trận đấu, HLV Zidane v&ocirc; c&ugrave;ng hạnh ph&uacute;c khi chứng kiến m&agrave;n tr&igrave;nh diễn của cậu học tr&ograve; C.Ronaldo. &Ocirc;ng đ&atilde; kh&ocirc;ng ngớt lời khen ngợi cầu thủ n&agrave;y. &Ocirc;ng th&agrave;y người Ph&aacute;p cho biết: &ldquo;C.Ronaldo l&agrave; tay săn b&agrave;n thực thụ. Cậu ấy độc nhất v&ocirc; nhị.</p>\r\n\r\n<p>Nh&igrave;n chung, c&aacute;c vị tr&iacute; của Real Madrid đều chơi tốt trong ng&agrave;y h&ocirc;m nay. Ch&uacute;ng t&ocirc;i đ&atilde; lường trước được những diễn biến c&oacute; thể xảy ra v&agrave; chuẩn bị kỹ lưỡng trước trận đấu. Mọi thứ đ&atilde; diễn ra đ&uacute;ng theo những g&igrave; ch&uacute;ng t&ocirc;i muốn.</p>\r\n\r\n<p>Isco, cầu thủ thi đấu trong vai tr&ograve; số 10, đ&atilde; thi đấu rất tốt. Sau đ&oacute;, ch&uacute;ng t&ocirc;i đ&atilde; triển khai trận đấu theo chiều ngang s&acirc;n b&oacute;ng với Lucas Varquez v&agrave; Marco Asensio. Trong cả phương diện ph&ograve;ng ngự, ch&uacute;ng t&ocirc;i cũng rất xuất sắc. T&ocirc;i rất h&agrave;i l&ograve;ng v&igrave; mọi người đ&atilde; ho&agrave;n th&agrave;nh nhiệm vụ của m&igrave;nh.</p>\r\n\r\n<p>Trước mắt ch&uacute;ng t&ocirc;i vẫn c&ograve;n trận lượt về. To&agrave;n đội sẽ tiếp tục l&agrave;m việc chăm chỉ v&agrave; chiến đấu. D&ugrave; ai cũng đang hạnh ph&uacute;c nhưng n&ecirc;n nhớ, trước mắt ch&uacute;ng ta vẫn l&agrave; chặng đường d&agrave;i ở Champions League v&agrave; La Liga&rdquo;.</p>\r\n\r\n<p>Trận lượt về giữa Real Madrid v&agrave; Atletico Madrid sẽ diễn ra ở s&acirc;n Vicente Calderon v&agrave;o tuần sau.</p>\r\n\r\n<p>H.Long</p>', 'hlv-zidane-cronaldo-la-cau-thu-doc-nhat-vo-nhi', 'bF669_default (1).jpg', 'Sau trận đấu với Atletico Madrid, HLV Zidane đ&atilde; kh&ocirc;ng ngớt lời khen ngợi ', '2', '5', null, '1', null, null, '2017-05-03 11:52:59', '2017-05-03 11:52:59');
INSERT INTO `articles` VALUES ('6', 'HLV Zidane: “C.Ronaldo là cầu thủ độc nhất vô nhị”', '<p>Sau trận đấu với Atletico Madrid, HLV Zidane đ&atilde; kh&ocirc;ng ngớt lời khen ngợi C.Ronaldo. Thậm ch&iacute;, &ocirc;ng cho rằng cậu học tr&ograve; của m&igrave;nh l&agrave; cầu thủ độc nhất v&ocirc; nhị.<br />\r\n&nbsp;&gt;&gt; Những khoảnh khắc C.Ronaldo nhấn ch&igrave;m Atletico tại Bernabeu<br />\r\n&nbsp;&gt;&gt; Real Madrid 3-0 Atletico: Hat-trick của C.Ronaldo<br />\r\nĐ&ecirc;m qua, C.Ronaldo lại sắm vai người h&ugrave;ng của Rael Madrid khi tỏa s&aacute;ng rực rỡ với 3 b&agrave;n thắng, gi&uacute;p cho đội nh&agrave; gi&agrave;nh chiến thắng với tỷ số 3-0 trước Atletico Madrid ở lượt đi v&ograve;ng b&aacute;n kết Champions League.</p>\r\n\r\n<p>HLV Zidane hết lời khen ngợi C.Ronaldo v&agrave; đồng đội<br />\r\nHLV Zidane hết lời khen ngợi C.Ronaldo v&agrave; đồng đội<br />\r\nSau trận đấu, HLV Zidane v&ocirc; c&ugrave;ng hạnh ph&uacute;c khi chứng kiến m&agrave;n tr&igrave;nh diễn của cậu học tr&ograve; C.Ronaldo. &Ocirc;ng đ&atilde; kh&ocirc;ng ngớt lời khen ngợi cầu thủ n&agrave;y. &Ocirc;ng th&agrave;y người Ph&aacute;p cho biết: &ldquo;C.Ronaldo l&agrave; tay săn b&agrave;n thực thụ. Cậu ấy độc nhất v&ocirc; nhị.</p>\r\n\r\n<p>Nh&igrave;n chung, c&aacute;c vị tr&iacute; của Real Madrid đều chơi tốt trong ng&agrave;y h&ocirc;m nay. Ch&uacute;ng t&ocirc;i đ&atilde; lường trước được những diễn biến c&oacute; thể xảy ra v&agrave; chuẩn bị kỹ lưỡng trước trận đấu. Mọi thứ đ&atilde; diễn ra đ&uacute;ng theo những g&igrave; ch&uacute;ng t&ocirc;i muốn.</p>\r\n\r\n<p>Isco, cầu thủ thi đấu trong vai tr&ograve; số 10, đ&atilde; thi đấu rất tốt. Sau đ&oacute;, ch&uacute;ng t&ocirc;i đ&atilde; triển khai trận đấu theo chiều ngang s&acirc;n b&oacute;ng với Lucas Varquez v&agrave; Marco Asensio. Trong cả phương diện ph&ograve;ng ngự, ch&uacute;ng t&ocirc;i cũng rất xuất sắc. T&ocirc;i rất h&agrave;i l&ograve;ng v&igrave; mọi người đ&atilde; ho&agrave;n th&agrave;nh nhiệm vụ của m&igrave;nh.</p>\r\n\r\n<p>Trước mắt ch&uacute;ng t&ocirc;i vẫn c&ograve;n trận lượt về. To&agrave;n đội sẽ tiếp tục l&agrave;m việc chăm chỉ v&agrave; chiến đấu. D&ugrave; ai cũng đang hạnh ph&uacute;c nhưng n&ecirc;n nhớ, trước mắt ch&uacute;ng ta vẫn l&agrave; chặng đường d&agrave;i ở Champions League v&agrave; La Liga&rdquo;.</p>\r\n\r\n<p>Trận lượt về giữa Real Madrid v&agrave; Atletico Madrid sẽ diễn ra ở s&acirc;n Vicente Calderon v&agrave;o tuần sau.</p>\r\n\r\n<p>H.Long</p>', 'hlv-zidane-cronaldo-la-cau-thu-doc-nhat-vo-nhi', 'bJNH4_default (1).jpg', 'Sau trận đấu với Atletico Madrid, HLV Zidane đ&atilde; kh&ocirc;ng ngớt lời khen ngợi ', '2', '5', null, '1', null, null, '2017-05-03 11:54:44', '2017-05-03 11:54:44');
INSERT INTO `articles` VALUES ('7', 'C.Ronaldo lý giải màn ăn mừng khó hiểu ở Bernabeu', '<p>&nbsp;Sau khi ghi b&agrave;n thắng thứ 3 cho Real Madrid trong trận đấu với Atletico Madrid, C.Ronaldo đ&atilde; c&oacute; pha ăn mừng v&ocirc; c&ugrave;ng kh&oacute; hiểu. Sau đ&oacute;, CR7 đ&atilde; l&yacute; giải về h&agrave;nh động n&agrave;y.<br />\r\n&nbsp;&gt;&gt; Những khoảnh khắc C.Ronaldo nhấn ch&igrave;m Atletico tại Bernabeu<br />\r\n&nbsp;&gt;&gt; Real Madrid 3-0 Atletico: Hat-trick của C.Ronaldo<br />\r\nC.Ronaldo đ&atilde; tỏa s&aacute;ng rực rỡ trong trận đấu với Atletico Madrid đ&ecirc;m qua khi ghi cả 3 b&agrave;n thắng gi&uacute;p cho Real Madrid gi&agrave;nh chiến thắng 3-0 ở Bernabeu, qua đ&oacute; đứng trước cơ hội lớn lọt v&agrave;o trận chung kết Champions League.</p>\r\n\r\n<p>C.Ronaldo gửi th&ocirc;ng điệp tới CĐV Real Madrid sau khi ghi b&agrave;n thứ 3 v&agrave;o lưới Atletico Madrid<br />\r\nC.Ronaldo gửi th&ocirc;ng điệp tới CĐV Real Madrid sau khi ghi b&agrave;n thứ 3 v&agrave;o lưới Atletico Madrid<br />\r\nĐ&acirc;y l&agrave; lần thứ 3 li&ecirc;n tiếp, C.Ronaldo sắm vai người h&ugrave;ng của Real Madrid. Trước đ&oacute;, cầu thủ n&agrave;y đ&atilde; ghi 5 b&agrave;n thắng sau hai lượt đấu v&ograve;ng tứ kết (2 b&agrave;n ở lượt đi, 3 b&agrave;n ở lượt về) gi&uacute;p Los Blancos vượt qua Bayern Munich với tổng tỷ số 6-3.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, ngay cả khi tỏa s&aacute;ng, C.Ronaldo vẫn chưa thực sự h&agrave;i l&ograve;ng. Bằng chứng, sau khi ghi b&agrave;n thắng thứ 3 cho Real Madrid v&agrave;o lưới Atletico Madrid, cầu thủ n&agrave;y đ&atilde; hướng về ph&iacute;a đ&aacute;m đ&ocirc;ng CĐV nh&agrave; v&agrave; c&oacute; h&agrave;nh động đưa hai ng&oacute;n trỏ l&ecirc;n miệng, k&egrave;m biểu hiện kh&ocirc;ng vui.</p>\r\n\r\n<p>Sau trận đấu, &ldquo;si&ecirc;u sao&rdquo; người Bồ Đ&agrave;o Nha đ&atilde; l&yacute; giải về m&agrave;n h&agrave;nh động kỳ quặc n&agrave;y. Anh cho biết: &ldquo;T&ocirc;i lu&ocirc;n cố gắng l&agrave;m tốt c&ocirc;ng việc của m&igrave;nh. Thực sự, t&ocirc;i kh&ocirc;ng muốn bị CĐV nh&agrave; la &oacute;, hu&yacute;t s&aacute;o. Đ&oacute; l&agrave; l&yacute; do t&ocirc;i muốn gửi th&ocirc;ng điệp ấy&rdquo;.</p>\r\n\r\n<p>Mặc d&ugrave; rất vui sau chiến thắng nhưng C.Ronaldo cũng tỏ ra thận trọng khi n&oacute;i về cơ hội đi tiếp của Real Madrid. Cầu thủ người Bồ Đ&agrave;o Nha n&oacute;i th&ecirc;m: &ldquo;T&ocirc;i rất hạnh ph&uacute;c khi ghi được 3 b&agrave;n thắng ở trận đấu n&agrave;y v&agrave; đồng thời c&aacute;n mốc 400 b&agrave;n thắng cho CLB của m&igrave;nh. D&ugrave; vậy Atletico Madrid l&agrave; đối thủ nguy hiểm. Hơn nữa, ch&uacute;ng t&ocirc;i đang thi đấu ở v&ograve;ng b&aacute;n kết. Do đ&oacute;, to&agrave;n đội cần phải duy tr&igrave; sự tập trung tối đa&rdquo;.</p>\r\n\r\n<p>Trận lượt về giữa Rael Madrid v&agrave; Atletico Madrid sẽ diễn ra v&agrave;o tuần sau.</p>\r\n\r\n<p>H.Long</p>', 'cronaldo-ly-giai-man-an-mung-kho-hieu-o-bernabeu', 'qUHYp_C7C5396150569047F58CAFF3B2161FE3.png', '&nbsp;Sau khi ghi b&agrave;n thắng thứ 3 cho Real Madrid trong trận đấu với Atletico Madr', '2', '5', null, '0', null, null, '2017-05-03 11:56:34', '2017-05-03 11:56:34');
INSERT INTO `articles` VALUES ('8', 'Mỹ điều tàu ngầm tấn công tới Nhật Bản giữa lúc căng thẳng với Triều Tiên', '<p>Mỹ ng&agrave;y 2/5 đ&atilde; triển khai t&agrave;u ngầm tấn c&ocirc;ng USS Cheyenne tới căn cứ hải qu&acirc;n của nước n&agrave;y ở Sasebo, Nhật Bản trong bối cảnh căng thẳng tr&ecirc;n b&aacute;n đảo Triều Ti&ecirc;n đang ng&agrave;y c&agrave;ng d&acirc;ng cao.<br />\r\n&nbsp;&gt;&gt; Triều Ti&ecirc;n dọa đ&aacute;nh ch&igrave;m t&agrave;u ngầm hạt nh&acirc;n Mỹ<br />\r\n&nbsp;&gt;&gt; T&agrave;u s&acirc;n bay Mỹ &aacute;p s&aacute;t Triều Ti&ecirc;n sau vụ ph&oacute;ng t&ecirc;n lửa<br />\r\n&nbsp;&gt;&gt; T&agrave;u s&acirc;n bay Mỹ ph&ocirc; diễn sức mạnh tr&ecirc;n đường tới b&aacute;n đảo Triều Ti&ecirc;n<br />\r\nT&agrave;u ngầm tấn c&ocirc;ng USS Cheyenne của Mỹ (Ảnh: Hải qu&acirc;n Mỹ)<br />\r\nT&agrave;u ngầm tấn c&ocirc;ng USS Cheyenne của Mỹ (Ảnh: Hải qu&acirc;n Mỹ)<br />\r\nSputnik dẫn th&ocirc;ng c&aacute;o b&aacute;o ch&iacute; của Hải qu&acirc;n Nhật Bản cho biết t&agrave;u ngầm tấn c&ocirc;ng lớp Los Angeles USS Cheyenne đ&atilde; tới căn cứ hải qu&acirc;n Mỹ ở Sasebo, Nhật Bản trong khu&ocirc;n khổ chuyến thăm hữu nghị giữa lực lượng hải qu&acirc;n của hai nước đồng minh. Căn cứ Sasebo nằm tr&ecirc;n đảo Kyushu của Nhật Bản. Cả t&agrave;u của Mỹ v&agrave; t&agrave;u của Nhật Bản đều neo đậu tại căn cứ được mở rộng từ thời cựu Tổng thống Barack Obama n&agrave;y.</p>\r\n\r\n<p>&ldquo;Chuyến thăm gi&uacute;p tăng cường mối quan hệ đồng minh vốn rất tốt đẹp giữa Mỹ v&agrave; Nhật Bản th&ocirc;ng qua c&aacute;c hoạt động tương t&aacute;c giữa thủy thủ đo&agrave;n (Mỹ) với Lực lượng Ph&ograve;ng vệ bờ biển Nhật Bản&rdquo;, th&ocirc;ng c&aacute;o b&aacute;o ch&iacute; của Hải qu&acirc;n Mỹ cho biết.</p>\r\n\r\n<p>&ldquo;Chuyến thăm cũng khẳng định cam kết của Hải qu&acirc;n Mỹ đối với sự ổn định khu vực v&agrave; an ninh h&agrave;ng hải trong phạm vi hoạt động của Hạm đội 7&rdquo;, th&ocirc;ng c&aacute;o nhấn mạnh.</p>\r\n\r\n<p>Được bi&ecirc;n chế từ ng&agrave;y 13/9/1996, t&agrave;u ngầm USS Cheyenne l&agrave; một trong 62 t&agrave;u ngầm tấn c&ocirc;ng lớp Los Angeles của Mỹ. Tốc độ, khả năng t&agrave;ng h&igrave;nh, t&iacute;nh th&iacute;ch ứng v&agrave; sức mạnh tấn c&ocirc;ng đ&atilde; đưa USS Cheyenne trở th&agrave;nh một trong những kh&iacute; t&agrave;i mạnh nhất của Mỹ. USS Cheyenne c&oacute; khả năng thực hiện nhiều sứ mệnh trong c&aacute;c cuộc chiến chống t&agrave;u ngầm, chống t&agrave;u nổi, c&aacute;c cuộc kh&ocirc;ng k&iacute;ch hay c&aacute;c cuộc chiến hải qu&acirc;n.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; t&agrave;u ngầm thứ hai Mỹ triển khai tới v&ugrave;ng biển gần Triều Ti&ecirc;n trong v&agrave;i tuần qua giữa l&uacute;c khu vực n&agrave;y đang c&oacute; nhiều diễn biến phức tạp. Trước đ&oacute;, t&agrave;u ngầm chạy bằng năng lượng hạt nh&acirc;n c&oacute; khả năng mang theo t&ecirc;n lửa USS Michigan đ&atilde; cập cảng Busan của H&agrave;n Quốc h&ocirc;m 24/4 trong lộ tr&igrave;nh tuần tra định kỳ tại khu vực T&acirc;y Th&aacute;i B&igrave;nh Dương. Triều Ti&ecirc;n dọa sẽ đ&aacute;nh ch&igrave;m t&agrave;u ngầm n&agrave;y, giống như lời cảnh b&aacute;o m&agrave; B&igrave;nh Nhưỡng đưa ra trước đ&oacute; nhằm v&agrave;o t&agrave;u s&acirc;n bay USS Carl Vinson do Mỹ điều tới v&ugrave;ng biển s&aacute;t b&aacute;n đảo Triều Ti&ecirc;n.</p>\r\n\r\n<p>Th&agrave;nh Đạt</p>\r\n\r\n<p>Theo Sputnik</p>', 'my-dieu-tau-ngam-tan-cong-toi-nhat-ban-giua-luc-cang-thang-voi-trieu-tien', '', 'Mỹ ng&agrave;y 2/5 đ&atilde; triển khai t&agrave;u ngầm tấn c&ocirc;ng USS Cheyenne tới c', '2', '2', '2017-05-03 16:13:00', '0', null, null, '2017-05-03 16:14:37', '2017-05-03 16:34:49');

-- ----------------------------
-- Table structure for article_tags
-- ----------------------------
DROP TABLE IF EXISTS `article_tags`;
CREATE TABLE `article_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of article_tags
-- ----------------------------
INSERT INTO `article_tags` VALUES ('1', '6', '1', '2017-05-03 11:54:45', '2017-05-03 11:54:45');
INSERT INTO `article_tags` VALUES ('2', '6', '2', '2017-05-03 11:54:45', '2017-05-03 11:54:45');
INSERT INTO `article_tags` VALUES ('3', '6', '3', '2017-05-03 11:54:45', '2017-05-03 11:54:45');
INSERT INTO `article_tags` VALUES ('4', '6', '4', '2017-05-03 11:54:45', '2017-05-03 11:54:45');
INSERT INTO `article_tags` VALUES ('5', '7', '2', '2017-05-03 11:56:34', '2017-05-03 11:56:34');
INSERT INTO `article_tags` VALUES ('6', '7', '4', '2017-05-03 11:56:34', '2017-05-03 11:56:34');
INSERT INTO `article_tags` VALUES ('7', '7', '1', '2017-05-03 11:56:34', '2017-05-03 11:56:34');
INSERT INTO `article_tags` VALUES ('8', '8', '5', '2017-05-03 16:14:38', '2017-05-03 16:14:38');
INSERT INTO `article_tags` VALUES ('9', '8', '6', '2017-05-03 16:14:38', '2017-05-03 16:14:38');
INSERT INTO `article_tags` VALUES ('10', '8', '7', '2017-05-03 16:14:38', '2017-05-03 16:14:38');
INSERT INTO `article_tags` VALUES ('11', '8', '8', '2017-05-03 16:14:38', '2017-05-03 16:14:38');
INSERT INTO `article_tags` VALUES ('12', '8', '9', '2017-05-03 16:14:38', '2017-05-03 16:14:38');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Kinh tế', null, 'kinh-te', null, '2017-05-03 10:46:45', '2017-05-03 10:46:45');
INSERT INTO `categories` VALUES ('2', 'Chính trị', null, 'chinh-tri', null, '2017-05-03 10:46:59', '2017-05-03 10:46:59');
INSERT INTO `categories` VALUES ('3', 'Xã hội', null, 'xa-hoi', null, '2017-05-03 10:47:10', '2017-05-03 10:47:10');
INSERT INTO `categories` VALUES ('4', 'Thể thao', null, 'the-thao', null, '2017-05-03 10:47:21', '2017-05-03 10:47:21');
INSERT INTO `categories` VALUES ('5', 'Bóng đá', '4', 'bong-da', null, '2017-05-03 10:47:38', '2017-05-03 10:47:38');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('7', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('8', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('9', '2017_04_24_062754_create_roles_table', '1');
INSERT INTO `migrations` VALUES ('10', '2017_04_26_081632_create_categories_table', '1');
INSERT INTO `migrations` VALUES ('11', '2017_04_30_114633_create_articles_table', '1');
INSERT INTO `migrations` VALUES ('12', '2017_05_03_105529_create_tags_table', '2');
INSERT INTO `migrations` VALUES ('13', '2017_05_03_105612_create_article__tags_table', '2');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Thành viên', null, null);
INSERT INTO `roles` VALUES ('2', 'Cộng tác viên', null, null);
INSERT INTO `roles` VALUES ('3', 'Biên tập viên', null, null);
INSERT INTO `roles` VALUES ('4', 'Quản trị viên', null, null);
INSERT INTO `roles` VALUES ('5', 'Thành viên', null, null);
INSERT INTO `roles` VALUES ('6', 'Cộng tác viên', null, null);
INSERT INTO `roles` VALUES ('7', 'Biên tập viên', null, null);
INSERT INTO `roles` VALUES ('8', 'Quản trị viên', null, null);

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES ('1', 'zidane', '2017-05-03 11:54:45', '2017-05-03 11:54:45');
INSERT INTO `tags` VALUES ('2', 'ronaldo', '2017-05-03 11:54:45', '2017-05-03 11:54:45');
INSERT INTO `tags` VALUES ('3', 'c1', '2017-05-03 11:54:45', '2017-05-03 11:54:45');
INSERT INTO `tags` VALUES ('4', 'bong da', '2017-05-03 11:54:45', '2017-05-03 11:54:45');
INSERT INTO `tags` VALUES ('5', 'mỹ', '2017-05-03 16:14:38', '2017-05-03 16:14:38');
INSERT INTO `tags` VALUES ('6', 'triều tiên', '2017-05-03 16:14:38', '2017-05-03 16:14:38');
INSERT INTO `tags` VALUES ('7', 'tàu ngầm', '2017-05-03 16:14:38', '2017-05-03 16:14:38');
INSERT INTO `tags` VALUES ('8', 'hạt nhân', '2017-05-03 16:14:38', '2017-05-03 16:14:38');
INSERT INTO `tags` VALUES ('9', 'chiến tranh', '2017-05-03 16:14:38', '2017-05-03 16:14:38');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', 'admin', 'admin@gmail.com', '$2y$10$mcO1iBFmzNHM8L4D1kYoPO6P0f247fYZ.h34Vktmxf6ydz8oBssXe', '', '4', 'PHxp6Vj7LNu6yOob4wfMCSb5Ap7IOiQlarXdSsXK6d9CN4b3QcxtgQWSxxGY', '2017-05-03 10:41:35', '2017-05-03 10:41:35');
