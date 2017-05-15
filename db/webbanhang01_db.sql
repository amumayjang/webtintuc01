/*
Navicat MySQL Data Transfer

Source Server         : buildweb
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : webbanhang01_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-15 19:17:09
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
  `imgThumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `cate_id` int(10) unsigned NOT NULL,
  `time_public` datetime NOT NULL,
  `hot` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `articles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('3', 'Thành công của Nga thách thức sự thống trị của Mỹ?', '<p>Li&ecirc;n bang Nga c&oacute; đủ khả năng c&oacute; thể đ&aacute;p trả &ldquo;Chiến lược mũi nhọn thứ 3&quot; của Mỹ về c&aacute;c cuộc đối đầu với Nga v&agrave; Trung Quốc. Th&ocirc;ng tin n&agrave;y được tờ The National Interest của Mỹ đăng tải trong b&agrave;i viết với ti&ecirc;u đề &ldquo;Bom hạt nh&acirc;n, t&agrave;u ngầm hạt nh&acirc;n v&agrave; t&ecirc;n lửa hạt nh&acirc;n: Nga l&ecirc;n kế hoạch th&aacute;ch thức sự thống trị của Mỹ về qu&acirc;n sự như thế n&agrave;o&rdquo;.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/webbanhang01/public/admin/uploads/images/articles/images/photo-0-1494739362672.jpg\" style=\"height:288px; width:480px\" /></p>\r\n\r\n<p>Theo t&aacute;c giả b&agrave;i b&aacute;o, Nga đ&atilde; n&acirc;ng cấp đ&aacute;ng kể lực lượng hạt nh&acirc;n chiến thuật của m&igrave;nh, ch&uacute;ng bao gồm c&oacute; c&aacute;c loại t&ecirc;n lửa đạn đạo tầm ngắn, bom tự ch&aacute;y, t&ecirc;n lửa h&agrave;nh tr&igrave;nh, t&ecirc;n lửa đạn đạo li&ecirc;n lục địa cũng như t&ecirc;n lửa mang đầu đạn hạt nh&acirc;n của lớp &ldquo;đất đối kh&ocirc;ng&rdquo;. N&oacute;i c&aacute;ch kh&aacute;c, c&aacute;c chương tr&igrave;nh của Nga nhằm tăng cường lực lượng hạt nh&acirc;n của m&igrave;nh l&ecirc;n tầm cao mới.</p>\r\n\r\n<p>&ldquo;Việc ưu ti&ecirc;n ph&aacute;t triển c&aacute;c loại vũ kh&iacute; hạt nh&acirc;n chiến thuật v&agrave; chiến lược của Nga l&agrave; phản ứng cứng rắn của Nga trước kế hoạch tổng thế của Lầu Năm G&oacute;c&rdquo;, gi&aacute;o sư Học viện Quốc ph&ograve;ng v&agrave; Viện nghi&ecirc;n cứu chiến lược (IDSS), &ocirc;ng Michael Raska cho biết.</p>\r\n\r\n<p>Nga đang thực hiện việc hiện đại h&oacute;a s&acirc;u rộng to&agrave;n bộ kho vũ kh&iacute; hạt nh&acirc;n của m&igrave;nh cũng như đang t&iacute;ch cực thực hiện c&aacute;c chương tr&igrave;nh để c&oacute; thể chống lại c&aacute;c hệ thống ph&ograve;ng thủ t&ecirc;n lửa của Mỹ, đặc biệt l&agrave; c&aacute;c hệ thống được triển khai tr&ecirc;n l&atilde;nh thổ của ch&acirc;u &Acirc;u. V&iacute; dụ, Nga đ&atilde; triển khai tổ hợp t&ecirc;n lửa đạn đạo thế hệ mới RS-24 &ldquo;Yars&rdquo; v&agrave; trang bị tr&ecirc;n t&agrave;u ngầm &ldquo;Borey&rdquo; thuộc dự &aacute;n 955 loại t&ecirc;n lửa đạn đạo RSM-56 &ldquo;Bulava&rdquo;.</p>\r\n\r\n<p>Ngo&agrave;i ra Nga cũng đang nghi&ecirc;n cứu ph&aacute;t triển loại t&ecirc;n lửa đạn đạo c&oacute; tốc độ tối đa, đến nay &iacute;t nhất hai loại sắp ho&agrave;n th&agrave;nh: t&ecirc;n lửa sử dụng nhi&ecirc;n liệu rắn &ldquo;Sarmat&rdquo; (RS-28) v&agrave; hệ thống di động sử dụng nhi&ecirc;n liệu rắn &ldquo;Frontier&rdquo; (RS-26). Mục đ&iacute;ch tạo ra c&aacute;c sản phẩm mới n&agrave;y nhằm chọc thủng c&aacute;c l&aacute; chắn ph&ograve;ng thủ t&ecirc;n lửa tương lai của Mỹ ở ch&acirc;u &Acirc;u v&agrave; tr&ecirc;n to&agrave;n thế giới.</p>\r\n\r\n<p>Ngo&agrave;i c&aacute;c loại vũ kh&iacute;, Nga cũng đang thực hiện kế hoạch n&acirc;ng cấp m&aacute;y bay n&eacute;m bom chiến lược Tu-160. &ldquo;Moscow t&iacute;ch cực tiến h&agrave;nh kế hoạch n&agrave;y nhằm tăng khả năng v&agrave; hiệu quả của c&aacute;c Lực lượng hạt nh&acirc;n của Nga v&agrave; nhanh ch&oacute;ng lập kế hoạch đối ph&oacute; lại với mối đe dọa mới&rdquo;, &ocirc;ng Rask cho biết.</p>\r\n\r\n<p>Mặt kh&aacute;c Nga cũng kh&ocirc;ng qu&ecirc;n việc hiện đại h&oacute;a những vũ kh&iacute; th&ocirc;ng thường v&agrave; ph&aacute;t triển theo hướng n&agrave;y sẽ &ldquo;đi tr&ecirc;n con đường&rdquo; giống với Hoa Kỳ. &ldquo;C&ocirc;ng nghệ của Nga trong một số lĩnh vực vẫn c&ograve;n đang ở trong giai đoạn đầu ph&aacute;t triển&rdquo;, &ocirc;ng Rask khẳng định. Tuy nhi&ecirc;n, trong nhiều lĩnh vực kh&aacute;c, bao gồm vũ kh&iacute; năng lượng cao, t&agrave;u ngầm kh&ocirc;ng người l&aacute;i, railgun, m&aacute;y bay si&ecirc;u thanh Nga đ&atilde; đạt được nhiều th&agrave;nh tựu v&agrave; thậm ch&iacute; vượt qua Mỹ.</p>\r\n\r\n<p>&Ocirc;ng cũng n&ecirc;u ra định hướng v&agrave; kế hoạch ưu ti&ecirc;n, tập trung ph&aacute;t triển c&ocirc;ng nghệ qu&acirc;n sự của Nga nhằm cản bước Mỹ, bao gồm:</p>\r\n\r\n<p>Thứ nhất, hệ thống robot được điều khiển từ xa, bao gồm cả UAV v&agrave; cũng như xe chiến đấu của Lục qu&acirc;n Nga, hiện ch&uacute;ng đang trải qua giai đoạn thử nghiệm.</p>\r\n\r\n<p>Thứ hai, c&aacute;c tổ hợp ph&ograve;ng kh&ocirc;ng v&agrave; ph&ograve;ng thủ chống t&ecirc;n lửa hiện đại sẽ c&oacute; b&aacute;n k&iacute;nh hoạt động lớn nhằm bảo vệ v&agrave; chiếm ưu thế tr&ecirc;n kh&ocirc;ng.</p>\r\n\r\n<p>Thứ ba, m&aacute;y bay ti&ecirc;m k&iacute;ch hiện đại, c&oacute; khả năng đối đầu v&agrave; gi&agrave;nh ưu thế tr&ecirc;n kh&ocirc;ng trước c&aacute;c m&aacute;y bay thế hệ thứ 5 của kẻ th&ugrave;.</p>\r\n\r\n<p>Thứ tư, vũ kh&iacute; si&ecirc;u thanh như l&agrave; trang bị ch&iacute;nh của hệ thống ph&ograve;ng kh&ocirc;ng v&agrave; ph&ograve;ng thủ t&ecirc;n lửa trong tương lai v&agrave; cuối c&ugrave;ng tập trung tạo ra vũ kh&iacute; năng lượng lớn.</p>\r\n\r\n<p>Chiến lược v&agrave; c&aacute;c kế hoạch của Nga đ&atilde; v&agrave; đang đưa nước n&agrave;y trở th&agrave;nh một cường quốc qu&acirc;n sự h&agrave;ng đầu thế giới, đe dọa vị tr&iacute; của Mỹ. Với chiến lược hợp l&yacute; n&agrave;y Moscow đ&atilde; v&agrave; đang thể hiện tầm ảnh hưởng của m&igrave;nh đối với thế giới.</p>\r\n\r\n<p>Theo Ch&iacute; Huy</p>\r\n\r\n<p>Đất Việt</p>', 'thanh-cong-cua-nga-thach-thuc-su-thong-tri-cua-my', 'rEJcD_photo-0-1494739362672.jpg', 'Tờ báo The National Interest cho rằng, kế hoạch và chiến lược phát triển sức mạnh quân sự của Nga thách thức sự thống trị về quân sự của Mỹ.', '1', '2', '2017-05-15 14:00:00', '0', '1', null, '2017-05-15 14:01:22', '2017-05-15 14:01:52');
INSERT INTO `articles` VALUES ('4', 'Đại sứ Mỹ tại LHQ: Ông Trump có thể sa thải bất kỳ ai nếu muốn', '<p>&ldquo;&Ocirc;ng ấy (Tổng thống Donald Trump) l&agrave; CEO (Gi&aacute;m đốc điều h&agrave;nh) của đất nước. &Ocirc;ng ấy c&oacute; thể cất nhắc v&agrave; sa thải bất kỳ ai &ocirc;ng ấy muốn&rdquo;, Đại sứ Mỹ tại Li&ecirc;n Hợp Quốc Nikki Haley n&oacute;i trong chương tr&igrave;nh &ldquo;This Week&rdquo;, ph&aacute;t s&oacute;ng tr&ecirc;n k&ecirc;nh ABC News h&ocirc;m qua 14/5.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"http://localhost/webbanhang01/public/admin/uploads/images/articles/images/trump-1494822624600.jpg\" style=\"height:360px; width:640px\" /></p>\r\n\r\n<p>B&igrave;nh luận tr&ecirc;n của Đại sứ Haley được đưa ra sau khi người dẫn chương tr&igrave;nh hỏi rằng liệu b&agrave; c&oacute; gặp kh&oacute; khăn g&igrave; khi phải giải th&iacute;ch cho c&aacute;c nh&agrave; ngoại giao nước ngo&agrave;i về c&aacute;c quyết định nội bộ của Tổng thống Trump hay kh&ocirc;ng, bao gồm cả việc bất ngờ sa thải Gi&aacute;m đốc FBI James Comey.</p>\r\n\r\n<p>Li&ecirc;n quan tới vấn đề n&agrave;y, Đại sứ Mỹ tại Qatar Dana Shell Smith ng&agrave;y 10/5 đ&atilde; than phiền tr&ecirc;n mạng x&atilde; hội Twitter rằng c&ocirc;ng việc của b&agrave; ng&agrave;y c&agrave;ng trở n&ecirc;n kh&oacute; khăn khi buổi s&aacute;ng thức dậy ở một đất nước kh&aacute;c, nghe những tin tức mới từ qu&ecirc; nh&agrave; v&agrave; phải d&agrave;nh cả ng&agrave;y h&ocirc;m đ&oacute; để giải th&iacute;ch cho bạn b&egrave; quốc tế về nền d&acirc;n chủ v&agrave; c&aacute;c thể chế của Mỹ.</p>\r\n\r\n<p>Trong khi đ&oacute;, Đại sứ Haley phản b&aacute;c &yacute; kiến của đồng nghiệp Smith, n&oacute;i rằng kh&ocirc;ng ai tại Li&ecirc;n Hợp Quốc hỏi b&agrave; về c&aacute;c động th&aacute;i của Tổng thống Trump. &ldquo;C&aacute;c bạn c&oacute; thể thấy &ocirc;ng ấy l&agrave; một tổng thống h&agrave;nh động. L&yacute; do khiến mọi người cảm thấy kh&ocirc;ng thoải m&aacute;i l&agrave; v&igrave; &ocirc;ng ấy lu&ocirc;n h&agrave;nh động&rdquo;, b&agrave; Haley cho biết.</p>\r\n\r\n<p>Trong cuộc phỏng vấn, người dẫn chương tr&igrave;nh đ&atilde; hỏi Đại sứ Haley rằng Tổng thống Trump c&oacute; y&ecirc;u cầu b&agrave; đưa ra lời hứa trung th&agrave;nh, như c&aacute;ch &ocirc;ng từng l&agrave;m với &ocirc;ng Comey trong bữa tiệc tối hồi th&aacute;ng 1 hay kh&ocirc;ng. C&acirc;u trả lời của b&agrave; Haley l&agrave; kh&ocirc;ng, tuy nhi&ecirc;n, Đại sứ Mỹ tại Li&ecirc;n Hợp Quốc khẳng định khi c&ograve;n l&agrave;m thống đốc bang Nam Carolina, &ldquo;sự trung th&agrave;nh v&agrave; l&ograve;ng tin&rdquo; l&agrave; điều rất quan trọng đối với b&agrave;.</p>\r\n\r\n<p>Th&agrave;nh Đạt</p>\r\n\r\n<p>Theo ABC</p>', 'dai-su-my-tai-lhq-ong-trump-co-the-sa-thai-bat-ky-ai-neu-muon', 'Uf6kr_trump-1494822624600.jpg', 'Đại sứ Mỹ tại Liên Hợp Quốc Nikki Haley đã lên tiếng bênh vực quyết định sa thải Giám đốc Cục Điều tra Liên bang (FBI) của Tổng thống Donald Trump, nói rằng trên cương vị lãnh đạo đất nước, ông có quyền sa thải bất kỳ ai nếu muốn.', '1', '2', '2017-05-15 14:03:00', '1', '1', null, '2017-05-15 14:04:17', '2017-05-15 14:04:17');
INSERT INTO `articles` VALUES ('5', 'Chậm khen thưởng vụ khui 3.000 hồ sơ giả: “Đánh giá ý thức trách nhiệm” 2 lão nông (?!)', '<p>Theo &ocirc;ng Nguyễn Tiến Nhường- Ph&oacute; Chủ tịch thường trực UBND tỉnh ki&ecirc;m Chủ tịch Hội đồng Thi đua-Khen thưởng tỉnh Bắc Ninh, sau khi b&aacute;o ch&iacute; phản &aacute;nh về việc chậm trễ khen thưởng hai l&atilde;o n&ocirc;ng Nguyễn Tiến L&atilde;ng v&agrave; Nguyễn C&ocirc;ng Uẩn (c&ugrave;ng tr&uacute; tại huyện Thuận Th&agrave;nh, Bắc Ninh), Chủ tịch UBND tỉnh Bắc Ninh đ&atilde; chỉ đạo cơ quan li&ecirc;n quan xem x&eacute;t đề nghị hiệp y khen thưởng của Bộ Lao động-Thương binh v&agrave; X&atilde; hội.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/webbanhang01/public/admin/uploads/images/articles/images/ong-nguyen-tien-lang-1494547830616.jpg\" style=\"height:427px; width:640px\" /></p>\r\n\r\n<p>&ldquo;Hiện giờ c&aacute;c cơ quan li&ecirc;n quan đang triển khai, trong đ&oacute; đang chỉ đạo huyện Thuận Th&agrave;nh đ&aacute;nh gi&aacute; &yacute; thức tr&aacute;ch nhiệm (đối với &ocirc;ng L&atilde;ng v&agrave; &ocirc;ng Uẩn - PV) để sớm tr&igrave;nh Ban Thi đua-Khen thưởng tỉnh Bắc Ninh hiệp y với Bộ Lao động-Thương binh v&agrave; X&atilde; hội&rdquo;- &ocirc;ng Nhường n&oacute;i.</p>\r\n\r\n<p>Từ chối đưa ra những đ&aacute;nh gi&aacute; về việc qu&aacute; chậm trễ khen thưởng đối với hai c&ocirc;ng d&acirc;n sinh sống tr&ecirc;n địa b&agrave;n tỉnh Bắc Ninh, &ocirc;ng Nguyễn Tiến Nhường cho rằng sự việc diễn ra từ năm 2015 v&agrave; thời điểm đ&oacute; &ocirc;ng cũng đ&atilde; c&oacute; &yacute; kiến.</p>\r\n\r\n<p>Như D&acirc;n tr&iacute; đ&atilde; phản &aacute;nh, trong qu&aacute; tr&igrave;nh đấu tranh chống tham nhũng ở địa phương tr&ecirc;n 10 năm qua, &ocirc;ng Nguyễn Tiến L&atilde;ng v&agrave; &ocirc;ng Nguyễn C&ocirc;ng Uẩn đ&atilde; nhiều lần bị doạ dẫm, bị đ&aacute;nh, n&eacute;m ph&acirc;n v&agrave;o nh&agrave;, kẻ gian ph&aacute; hoại vườn c&acirc;y ăn quả h&agrave;ng chục triệu đồng,&hellip;</p>\r\n\r\n<p>Trong l&aacute; đơn gần nhất gửi tới Bộ Lao động-Thương binh v&agrave; X&atilde; hội, &ocirc;ng L&atilde;ng v&agrave; &ocirc;ng Uẩn khẳng định, l&uacute;c n&agrave;o cũng đi đầu việc chống tham nhũng về mọi mặt, nhất l&agrave; vấn đề chế độ ch&iacute;nh s&aacute;ch, đ&atilde;i ngộ người c&oacute; c&ocirc;ng trong suốt 11 năm qua.</p>\r\n\r\n<p>&ldquo;Khi gửi đơn tố gi&aacute;c ch&uacute;ng t&ocirc;i chưa bao giờ nghĩ đến tố gi&aacute;c để được khen thưởng. Nhưng hai ch&uacute;ng t&ocirc;i cũng muốn biết m&igrave;nh c&oacute; đủ điều kiện được xem x&eacute;t khen thưởng hay kh&ocirc;ng, v&igrave; ch&uacute;ng t&ocirc;i nhận được c&ocirc;ng văn của Bộ Lao động-Thương binh v&agrave; X&atilde; hội th&ocirc;ng b&aacute;o được khen thưởng nhưng đ&atilde; chờ đợi 2 năm nay vẫn kh&ocirc;ng c&oacute; tin tức g&igrave;&rdquo;- l&aacute; đơn n&ecirc;u r&otilde;.</p>\r\n\r\n<p>&Ocirc;ng Nguyễn C&ocirc;ng Uẩn nu&ocirc;i chim bồ c&acirc;u để c&oacute; tiền đi tố c&aacute;o suốt hơn 10 năm qua (Ảnh: V.L)<br />\r\n&Ocirc;ng Nguyễn C&ocirc;ng Uẩn nu&ocirc;i chim bồ c&acirc;u để c&oacute; tiền đi tố c&aacute;o suốt hơn 10 năm qua (Ảnh: V.L)<br />\r\nBộ Lao động-Thương binh v&agrave; X&atilde; hội đ&atilde; c&oacute; văn bản gửi Chủ tịch UBND tỉnh Bắc Ninh khẳng định, từ năm 2010, c&aacute;c &ocirc;ng Nguyễn Tiến L&atilde;ng v&agrave; Nguyễn C&ocirc;ng Uẩn đ&atilde; c&oacute; đơn gửi tới Bộ Lao động-Thương binh v&agrave; X&atilde; hội tố c&aacute;o h&agrave;ng trăm đối tượng cư tr&uacute; tại huỵen Thuận Th&agrave;nh, Bắc Ninh lập hồ sơ giả để hưởng chế độ ưu đ&atilde;i người c&oacute; c&ocirc;ng với c&aacute;ch mạng. Bộ đ&atilde; tiến h&agrave;nh x&aacute;c minh nội dung đơn tố c&aacute;o v&agrave; ph&aacute;t hiện vụ việc c&oacute; dấu hiệu tội phạm n&ecirc;n chuyển hồ sơ đến Cơ quan Cảnh s&aacute;t điều tra C&ocirc;ng an tỉnh Bắc Ninh đề nghị khởi tố vụ &aacute;n.</p>\r\n\r\n<p>Đến ng&agrave;y 14/6/2013, C&ocirc;ng an tỉnh Bắc Ninh đ&atilde; ban h&agrave;nh quyết định khởi tố 5 bị can (Nguyễn B&aacute; Bi, Nguyễn B&aacute; Tr&igrave;nh, Nguyễn Gia Khu, Nguyễn Đức Nh&acirc;m, Nguyễn Khắc Ngung, c&ugrave;ng tr&uacute; tại huyện Thuận Th&agrave;nh) về tội lừa đảo chiếm đoạt t&agrave;i sản, đồng thời mở rộng điều tra vụ &aacute;n. Bộ Tư lệnh Qu&acirc;n khu I đ&atilde; chỉ đạo Cơ quan điều tra h&igrave;nh sự tiến h&agrave;nh điều tra về việc l&agrave;m giả hồ sơ hưởng chế độ thương binh đối với hồ sơ thương binh do cơ quan qu&acirc;n đội thực hiện tại Qu&acirc;n khu I. Kết quả điều tra ph&aacute;t hiện số đối tượng khai man, giả mạo hồ sơ phải kiến nghị đ&igrave;nh chỉ trợ cấp l&agrave; 2.745 người (đối tượng c&aacute;c tỉnh thuộc địa b&agrave;n Qu&acirc;n khu I), kiến nghị thu hồi nộp ng&acirc;n s&aacute;ch nh&agrave; nước hơn 150 tỷ đồng v&agrave; giảm chi ng&acirc;n s&aacute;ch nh&agrave; nước mỗi năm hơn 20 tỷ đồng, c&oacute; 24 người bị xử l&yacute; h&igrave;nh sự.</p>\r\n\r\n<p>Bộ Lao động-Thương binh v&agrave; X&atilde; hội nhận định, từ tố c&aacute;o của &ocirc;ng L&atilde;ng v&agrave; &ocirc;ng Uẩn c&aacute;c cơ quan chức năng đ&atilde; ph&aacute;t hiện ra nhiều sai s&oacute;t trong việc x&aacute;c lập hồ sơ thương binh, xử l&yacute; nghi&ecirc;m minh theo quy định của ph&aacute;p luật đối với những trường hợp khai man, giả mạo hồ sơ để được hưởng chế độ ưu đ&atilde;i, tạo niềm tin cho người d&acirc;n ở c&aacute;c địa phương về việc thực hiện ch&iacute;nh s&aacute;ch ưu đ&atilde;i người c&oacute; c&ocirc;ng; t&ocirc;n vinh những người thực sự c&oacute; c&ocirc;ng trong c&aacute;c cuộc kh&aacute;ng chiến giải ph&oacute;ng d&acirc;n tộc v&agrave; bảo vệ tổ quốc. Tuy nhi&ecirc;n 2 lần Bộ n&agrave;y gửi văn bản đề nghị tỉnh Bắc Ninh hiệp y khen thưởng th&igrave; đều kh&ocirc;ng nhận được phản hồi.</p>\r\n\r\n<p>Thế Kha</p>', 'cham-khen-thuong-vu-khui-3000-ho-so-gia-danh-gia-y-thuc-trach-nhiem-2-lao-nong', 'G8Wze_ong-nguyen-tien-lang-1494547830616.jpg', 'Liên quan đến việc chậm trễ khen thưởng hai lão nông 80 tuổi khui ra gần 3.000 hồ sơ thương binh giả gây bức xúc dư luận, trả lời phóng viên Dân trí sáng 15/5,...', '1', '1', '2017-05-15 14:06:00', '0', '1', null, '2017-05-15 14:07:24', '2017-05-15 14:07:24');
INSERT INTO `articles` VALUES ('6', 'Phó Thủ tướng: “Tương lai của khu vực là tương lai của Việt Nam”', '<p>S&aacute;ng nay (15/5), Ph&oacute; Thủ tướng Phạm B&igrave;nh Minh tham dự v&agrave; ph&aacute;t biểu tại Hội nghị to&agrave;n thể Hội đồng Hợp t&aacute;c Kinh tế Th&aacute;i b&igrave;nh dương (PECC). Ph&oacute; Thủ tướng cho rằng, PECC đ&atilde; khẳng định vai tr&ograve; l&agrave; một thể chế đặc biệt, nắm bắt được t&acirc;m huyết v&agrave; tr&iacute; tuệ của c&aacute;c c&aacute;c doanh nghiệp, ch&iacute;nh phủ v&agrave; giới học giả để h&igrave;nh th&agrave;nh c&aacute;c &yacute; tưởng nhằm xử l&yacute; những th&aacute;ch thức quan trọng nhất m&agrave; ch&acirc;u &Aacute; - Th&aacute;i B&igrave;nh Dương đang phải đối mặt.</p>\r\n\r\n<p>&ldquo;Nh&igrave;n lại ba thập kỷ qua, ch&uacute;ng ta c&oacute; thể tự h&agrave;o về sự chuyển m&igrave;nh của ch&acirc;u &Aacute; - Th&aacute;i B&igrave;nh Dương, trở th&agrave;nh một khu vực h&ograve;a b&igrave;nh v&agrave; một động lực của tăng trưởng v&agrave; li&ecirc;n kết kinh tế to&agrave;n cầu. Khu vực của ch&uacute;ng ta l&agrave; nơi duy nhất chưa từng trải qua bất cứ một xung đột n&oacute;ng n&agrave;o kể từ khi Chiến tranh Lạnh kết th&uacute;c. Khi PECC được th&agrave;nh lập năm 1980, khu vực của ch&uacute;ng ta chiếm hơn 40% GDP to&agrave;n cầu. Ng&agrave;y nay, con số n&agrave;y đ&atilde; tăng l&ecirc;n tr&ecirc;n 50%. Hơn một tỷ người trong khu vực đ&atilde; tho&aacute;t khỏi cảnh ngh&egrave;o c&ugrave;ng cực&rdquo; - Ph&oacute; Thủ tướng Phạm B&igrave;nh Minh nhấn mạnh.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"http://localhost/webbanhang01/public/admin/uploads/images/articles/images/pttg-pham-binh-minh-1494823297803.jpg\" style=\"height:417px; width:640px\" /></p>\r\n\r\n<p>Hướng tới tương lai, trọng t&acirc;m kinh tế thế giới tiếp tục chuyển dịch về ch&acirc;u &Aacute; &ndash; Th&aacute;i B&igrave;nh Dương; c&aacute;c nền kinh tế mới nổi trong khu vực được dự b&aacute;o sẽ tiếp tục l&agrave; động lực của tăng trưởng khu vực v&agrave; to&agrave;n cầu. Triển vọng khu vực ch&uacute;ng ta tươi s&aacute;ng hơn bao giờ hết. Đ&acirc;y l&agrave; khu vực c&oacute; tốc độ tăng trưởng cao nhất thế giới.</p>\r\n\r\n<p>L&agrave; nơi hội tụ c&aacute;c c&ocirc;ng nghệ mới, lực lượng lao động c&oacute; tay nghề v&agrave; tầng lớp trung lưu ph&aacute;t triển mạnh mẽ, tỉ trọng của khu vực trong GDP to&agrave;n cầu dự b&aacute;o sẽ tăng l&ecirc;n gần 70% v&agrave;o năm 2050. 10 trong số 20 nền kinh tế lớn nhất thế giới sẽ l&agrave; c&aacute;c nền kinh tế ch&acirc;u &Aacute; - Th&aacute;i B&igrave;nh Dương.</p>\r\n\r\n<p>&ldquo;Khu vực n&agrave;y l&agrave; minh chứng cho thịnh vượng chung c&oacute; thể đạt được th&ocirc;ng qua li&ecirc;n kết v&agrave; hợp t&aacute;c kinh tế s&acirc;u rộng hơn, cũng như tự do h&oacute;a thương mại v&agrave; đầu tư. V&igrave; vậy, dự b&aacute;o thế kỷ 21 l&agrave; &ldquo;thế kỷ của ch&acirc;u &Aacute; - Th&aacute;i B&igrave;nh Dương&rdquo; kh&ocirc;ng phải l&agrave; n&oacute;i qu&aacute;. Tuy nhi&ecirc;n, triển vọng của khu vực c&ograve;n phụ thuộc v&agrave;o hiệu quả xử l&yacute; ba nh&oacute;m th&aacute;ch thức m&agrave; khu vực hiện đang đối mặt, cả về ngắn hạn v&agrave; d&agrave;i hạn&rdquo; - Ph&oacute; Thủ tướng n&oacute;i r&otilde;.</p>\r\n\r\n<p>Việt Nam nằm ở t&acirc;m điểm của khu vực ch&acirc;u &Aacute; - Th&aacute;i B&igrave;nh Dương, l&atilde;nh đạo Ch&iacute;nh phủ nhấn mạnh Việt Nam đ&atilde; kh&ocirc;ng ngừng đẩy mạnh đổi mới to&agrave;n diện, hội nhập quốc tế s&acirc;u rộng v&agrave; t&iacute;ch cực triển khai ch&iacute;nh s&aacute;ch đối ngoại đa phương. &ldquo;Khu vực ch&acirc;u &Aacute; - Th&aacute;i B&igrave;nh Dương lu&ocirc;n l&agrave; một trọng t&acirc;m trong ch&iacute;nh s&aacute;ch đối ngoại của Việt Nam. Tương lai của khu vực l&agrave; tương lai của Việt Nam&rdquo; - Ph&oacute; Thủ tướng khẳng định.</p>\r\n\r\n<p>Ph&oacute; Thủ tướng Phạm B&igrave;nh Minh chụp ảnh lưu niệm c&ugrave;ng c&aacute;c đại biểu tham dự Hội nghị (ảnh: An B&igrave;nh)<br />\r\nPh&oacute; Thủ tướng Phạm B&igrave;nh Minh chụp ảnh lưu niệm c&ugrave;ng c&aacute;c đại biểu tham dự Hội nghị (ảnh: An B&igrave;nh)<br />\r\nTheo l&atilde;nh đạo Ch&iacute;nh phủ Việt Nam, đ&acirc;y l&agrave; thời điểm rất th&iacute;ch hợp để ch&uacute;ng ta c&ugrave;ng nhau thảo luận một c&aacute;ch s&acirc;u sắc về tầm nh&igrave;n quan hệ ch&acirc;u &Aacute; - Th&aacute;i B&igrave;nh Dương trong những thập kỷ tới. Ở khu vực ch&acirc;u &Aacute; - Th&aacute;i B&igrave;nh Dương, Cộng đồng ASEAN đang triển khai Tầm nh&igrave;n đến năm 2025. Diễn đ&agrave;n APEC đ&atilde; khởi động tiến tr&igrave;nh tư duy về tầm nh&igrave;n sau năm 2020.</p>\r\n\r\n<p>&ldquo;L&agrave; một cơ chế ti&ecirc;n phong khu vực về c&aacute;c &yacute; tưởng về thương mại, đầu tư, tăng trưởng v&agrave; li&ecirc;n kết, PECC đ&atilde; lu&ocirc;n thể hiện vai tr&ograve; dẫn dắt trong việc h&igrave;nh th&agrave;nh c&aacute;c tầm nh&igrave;n cho khu vực. T&ocirc;i nhận thấy c&oacute; rất nhiều vấn đề được đặt ra tại chương tr&igrave;nh nghị sự của Hội nghị h&ocirc;m nay. T&ocirc;i hi vọng tại Hội nghị, c&aacute;c qu&yacute; vị sẽ chia sẻ những suy nghĩ v&agrave; đ&aacute;nh gi&aacute; về c&aacute;c th&agrave;nh tố chủ chốt của một tầm nh&igrave;n cho khu vực của ch&uacute;ng ta&rdquo; &ndash; Ph&oacute; Thủ tướng Phạm B&igrave;nh Minh cho hay.</p>\r\n\r\n<p>Trong khu&ocirc;n khổ Hội nghị PECC, Ph&oacute; Thủ tướng cho rằng khuyến nghị v&agrave; &yacute; kiến của c&aacute;c qu&yacute; vị ng&agrave;y h&ocirc;m nay sẽ đ&oacute;ng g&oacute;p quan trọng v&agrave;o tiến tr&igrave;nh tư duy về hợp t&aacute;c APEC đến năm 2020 v&agrave; tương lai, v&agrave; v&agrave;o chủ đề bao tr&ugrave;m của Năm APEC 2017 &ldquo;Tạo động lực mới, c&ugrave;ng vun đắp tương lai chung&rdquo;. Điều n&agrave;y rất c&oacute; &yacute; nghĩa đối với &ldquo;Đối thoại nhiều b&ecirc;n về APEC đến 2020 v&agrave; tương lai&rdquo; do Việt Nam v&agrave; PECC đồng tổ chức v&agrave;o ng&agrave;y 16/5.</p>\r\n\r\n<p>An B&igrave;nh - Như Quỳnh</p>', 'pho-thu-tuong-tuong-lai-cua-khu-vuc-la-tuong-lai-cua-viet-nam', 'klMEh_pttg-pham-binh-minh-1494823297803.jpg', '“Khu vực châu Á - Thái Bình Dương luôn là một trọng tâm trong chính sách đối ngoại của Việt Nam. Tương lai của khu vực là tương lai của Việt Nam” - Phó Thủ tướng Chính phủ,...', '1', '3', '2017-05-17 14:05:00', '0', '0', null, '2017-05-15 14:10:17', '2017-05-15 14:10:17');
INSERT INTO `articles` VALUES ('7', 'Giảm gần 100 năm thu phí đối với 13 dự án BOT', '<p>Theo Bộ GTVT, dự &aacute;n BOT (x&acirc;y dựng - kinh doanh - chuyển giao) được điều chỉnh giảm thời gian thu ph&iacute; nhiều nhất l&agrave; c&ocirc;ng tr&igrave;nh đầu tư x&acirc;y dựng Quốc lộ 1 đoạn tr&aacute;nh TP Thanh H&oacute;a với thời gian giảm thu ph&iacute; l&ecirc;n tới 20 năm 1 th&aacute;ng. C&ocirc;ng tr&igrave;nh Quốc lộ 1 đoạn tr&aacute;nh TP Bi&ecirc;n H&ograve;a (Đồng Nai) l&agrave; dự &aacute;n giảm thời gian thu ph&iacute; thấp nhất với 4 th&aacute;ng (từ 13 năm 1 th&aacute;ng xuống 12 năm 9 th&aacute;ng).</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"http://localhost/webbanhang01/public/admin/uploads/images/articles/images/du-an-bot-1488257516393.jpg\" style=\"height:293px; width:448px\" /></p>\r\n\r\n<p>Đại diện Bộ GTVT cho biết, việc điều chỉnh giảm thời gian thu ph&iacute; c&aacute;c dự &aacute;n so với hợp đồng BOT chủ yếu do gi&aacute; trị thỏa thuận (ph&ecirc; duyệt) quyết to&aacute;n giảm so với tổng mức đầu tư được ph&ecirc; duyệt ban đầu v&agrave; sự biến động của lưu lượng xe.</p>\r\n\r\n<p>Cho đến thời điểm n&agrave;y đ&atilde; c&oacute; 21 dự &aacute;n BOT được điều chỉnh giảm thời gian thu ph&iacute;<br />\r\nCho đến thời điểm n&agrave;y đ&atilde; c&oacute; 21 dự &aacute;n BOT được điều chỉnh giảm thời gian thu ph&iacute;<br />\r\n&ldquo;Quy định tại Khoản 1, Điều 4 Nghị định 112/2009 của Ch&iacute;nh phủ, tổng mức đầu tư x&acirc;y dựng c&ocirc;ng tr&igrave;nh l&agrave; chi ph&iacute; dự t&iacute;nh của dự &aacute;n, l&agrave;m cơ sở để chủ đầu tư lập kế hoạch v&agrave; quản l&yacute; vốn thực hiện đầu tư c&ocirc;ng tr&igrave;nh. Trong bước lập dự &aacute;n đầu tư kh&ocirc;ng thể t&iacute;nh ch&iacute;nh x&aacute;c chi ph&iacute; thực tế sẽ đầu tư.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, Th&ocirc;ng tư 04/2010 ng&agrave;y 26/5/2010 của Bộ X&acirc;y dựng c&ograve;n cho ph&eacute;p x&acirc;y dựng tổng mức đầu tư tr&ecirc;n cơ sở ước t&iacute;nh từ suất đầu tư trung b&igrave;nh 1km đường nh&acirc;n với chiều d&agrave;i tuyến&rdquo;, &ocirc;ng Tuấn Anh n&oacute;i v&agrave; cho biết, khi đ&agrave;m ph&aacute;n k&yacute; kết hợp đồng BOT với c&aacute;c nh&agrave; đầu tư, theo quy định, Bộ GTVT sử dụng tổng mức đầu tư để tạm thời x&aacute;c định thời gian thu ph&iacute;&rdquo; &ndash; đại diện Bộ GTVT giải th&iacute;ch.</p>\r\n\r\n<p>Bộ GTVT khẳng định, sau khi quyết to&aacute;n c&ocirc;ng tr&igrave;nh, Bộ GTVT sẽ cập nhật c&aacute;c th&ocirc;ng số v&agrave; t&iacute;nh to&aacute;n lại thời gian thu ph&iacute; để k&yacute; kết với nh&agrave; đầu tư l&agrave;m cơ sở thu ph&iacute; sau n&agrave;y. Việc tổng mức đầu tư giảm sau quyết to&aacute;n, c&ugrave;ng với việc cập nhật lại lưu lượng d&ograve;ng xe thực tế, c&aacute;c th&ocirc;ng số t&agrave;i ch&iacute;nh c&oacute; li&ecirc;n quan,... sẽ l&agrave;m thay đổi thời gian thu ph&iacute; so với dự t&iacute;nh trước đ&acirc;y.</p>\r\n\r\n<p>Được biết, thời gian qua Bộ GTVT đ&atilde; r&agrave; so&aacute;t c&aacute;c dự &aacute;n BOT theo đ&uacute;ng c&aacute;c tr&igrave;nh tự thủ tục quy định của ph&aacute;p luật v&agrave; hợp đồng BOT tr&ecirc;n nguy&ecirc;n tắc c&oacute; kiểm to&aacute;n độc lập hoặc kiểm to&aacute;n Nh&agrave; nước v&agrave; c&aacute;c cơ quan thanh tra, sau đ&oacute; lấy gi&aacute; trị cuối c&ugrave;ng để quyết to&aacute;n dự &aacute;n, t&iacute;nh to&aacute;n lại hợp đồng v&agrave; thời gian thu ph&iacute;.</p>\r\n\r\n<p>&ldquo;Trong qu&aacute; tr&igrave;nh vận h&agrave;nh, khai th&aacute;c c&ocirc;ng tr&igrave;nh, t&ugrave;y thuộc hợp đồng dự &aacute;n, Bộ GTVT sẽ tiến h&agrave;nh r&agrave; so&aacute;t lại doanh thu, lưu lượng xe thực tế l&agrave;m căn cứ để điều chỉnh từng hợp đồng BOT cho đến hết v&ograve;ng đời dự &aacute;n. Do vậy, nhiều c&ocirc;ng tr&igrave;nh sau khi quyết to&aacute;n sẽ giảm thời gian thu ph&iacute; so với dự kiến ban đầu l&agrave; chuyện hết sức b&igrave;nh thường&rdquo; - đại diện Bộ GTVT cho biết th&ecirc;m.</p>\r\n\r\n<p>​Như vậy, t&iacute;nh đến nay, Bộ GTVT đ&atilde; thực hiện điều chỉnh hợp đồng 21 dự &aacute;n BOT sau khi c&oacute; thỏa thuận quyết to&aacute;n từng phần hoặc to&agrave;n bộ giai đoạn x&acirc;y dựng, gồm 19 dự &aacute;n đường bộ v&agrave; 2 dự &aacute;n h&agrave;ng hải.</p>\r\n\r\n<p>Ngo&agrave;i ra, sau điều chỉnh hợp đồng thỏa thuận quyết to&aacute;n, c&oacute; 4 dự &aacute;n phải k&eacute;o d&agrave;i thời gian thu ph&iacute; với tổng số 24 năm 5 th&aacute;ng. Nguy&ecirc;n nh&acirc;n l&agrave; do 4 dự &aacute;n phải k&eacute;o d&agrave;i thời gian thu ph&iacute; chủ yếu do lưu lượng xe sụt giảm so với dự b&aacute;o v&agrave; doanh thu thực tế thấp hơn nhiều so với phương &aacute;n t&agrave;i ch&iacute;nh trong hợp đồng BOT. Đ&acirc;y l&agrave; rủi ro m&agrave; c&aacute;c nh&agrave; đầu tư cần c&acirc;n nhắc đ&aacute;nh gi&aacute; trước khi k&yacute; kết hợp đồng với cơ quan Nh&agrave; nước c&oacute; thẩm quyền.</p>\r\n\r\n<p>Ch&acirc;u Như Quỳnh</p>', 'giam-gan-100-nam-thu-phi-doi-voi-13-du-an-bot', 'dxa1l_du-an-bot-1488257516393.jpg', 'Thông tin từ Bộ Giao thông Vận tải (GTVT) cho biết, Bộ này vừa điều chỉnh giảm thời gian thu phí 92 năm 3 tháng của 13 dự án BOT, cùng đó điều chỉnh tăng thời gian thu phí 24 năm 5 tháng của 4 dự án.', '1', '3', '2017-05-15 14:11:00', '0', '1', null, '2017-05-15 14:13:09', '2017-05-15 14:13:09');
INSERT INTO `articles` VALUES ('8', 'Bàn thắng kiểu “ăn cắp trứng gà” của Nacho vào lưới Sevilla có hợp lệ?', '<p>Đ&ecirc;m qua, Real Madrid đ&atilde; gi&agrave;nh chiến thắng với tỷ số 4-1 trước Sevilla v&agrave; thẳng tiến tới chức v&ocirc; địch La Liga. Trong đ&oacute;, bước ngoặt trận đấu nằm ở b&agrave;n thắng mở tỷ số ở ph&uacute;t thứ 10 của trung vệ Nacho.</p>\r\n\r\n<p style=\"text-align: center;\"><img alt=\"\" src=\"http://localhost/webbanhang01/public/admin/uploads/images/articles/images/nacho-1494819872352.png\" style=\"height:427px; width:640px\" /></p>\r\n\r\n<p>Sau khi Marco Asensio bị phạm lỗi trước khu vực cấm địa của Sevilla, trọng t&agrave;i đ&atilde; cho Real Madird hưởng quả đ&aacute; phạt trực tiếp. Trong l&uacute;c tất cả chưa ổn định (Sevilla chưa xếp xong h&agrave;ng r&agrave;o), Nacho bất ngờ thực hiện c&uacute; s&uacute;t phạt nhanh. B&oacute;ng bay v&agrave;o lưới của Sevilla trong sự bất ngờ của nhiều người.</p>\r\n\r\n<p>B&agrave;n thắng n&agrave;y đ&atilde; tạo ra tranh c&atilde;i lớn sau trận đấu. Nhiều quan điểm cho rằng trọng t&agrave;i Undiano Mallenco đ&atilde; sai khi c&ocirc;ng nhận b&agrave;n thắng của Nacho. Thế nhưng, tr&ecirc;n tờ Marca, cựu Andujar Oliver cho rằng đ&acirc;y l&agrave; pha lập c&ocirc;ng ho&agrave;n to&agrave;n đ&uacute;ng luật.</p>\r\n\r\n<p>Theo luật của FIFA, cầu thủ ho&agrave;n to&agrave;n c&oacute; quyền thực hiện đ&aacute; phạt nhanh nếu như tr&aacute;i b&oacute;ng đứng y&ecirc;n (trong l&uacute;c thực hiện) v&agrave; đội hưởng quả đ&aacute; phạt kh&ocirc;ng y&ecirc;u cầu đối phương giữ khoảng c&aacute;ch (9 m&eacute;t 15 như quy định). V&igrave; vậy, nếu chiếu theo luật, Nacho kh&ocirc;ng sai.</p>\r\n\r\n<p>C&oacute; chăng, những cầu thủ Sevilla cần phải tự tr&aacute;ch m&igrave;nh bởi kh&ocirc;ng c&oacute; sự tập trung cần thiết trong t&igrave;nh huống Nacho tranh thủ chớp thời cơ.</p>\r\n\r\n<p>Trận đấu đ&ecirc;m qua cũng chứng kiến m&agrave;n tr&igrave;nh diễn tuyệt vời của Nacho ở vị tr&iacute; hậu vệ tr&aacute;i. Khả năng l&ecirc;n c&ocirc;ng về thủ to&agrave;n diện của cầu thủ n&agrave;y thực sự khiến nhiều người bất ngờ. Phần lớn đợt tấn c&ocirc;ng trong hiệp 2 của Real Madrid đều tới ở c&aacute;nh của Nacho. Tuy vậy, với việc phải nhận thẻ v&agrave;ng, hậu vệ trẻ của Real Madrid sẽ vắng mặt trong trận đấu tiếp theo với Celta Vigo v&igrave; nhận đủ 5 thẻ.</p>\r\n\r\n<p>H.Long</p>', 'ban-thang-kieu-an-cap-trung-ga-cua-nacho-vao-luoi-sevilla-co-hop-le', '4Etpi_nacho-1494819872352.png', 'Tranh cãi gay gắt đã nổ ra sau trận đấu giữa Real Madrid và Sevilla vì bàn thắng kiểu “ăn cắp trứng gà” của Nacho. Vậy pha lập công của trung vệ người Tây Ban Nha có hợp lệ hay không.', '1', '7', '2017-05-15 14:13:00', '0', '1', null, '2017-05-15 14:15:05', '2017-05-15 14:15:05');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of article_tags
-- ----------------------------
INSERT INTO `article_tags` VALUES ('1', '2', '1', '2017-05-15 13:39:08', '2017-05-15 13:39:08');
INSERT INTO `article_tags` VALUES ('2', '2', '2', '2017-05-15 13:39:08', '2017-05-15 13:39:08');
INSERT INTO `article_tags` VALUES ('3', '5', '3', '2017-05-15 14:07:24', '2017-05-15 14:07:24');
INSERT INTO `article_tags` VALUES ('4', '5', '4', '2017-05-15 14:07:24', '2017-05-15 14:07:24');
INSERT INTO `article_tags` VALUES ('5', '7', '5', '2017-05-15 14:13:09', '2017-05-15 14:13:09');
INSERT INTO `article_tags` VALUES ('6', '7', '6', '2017-05-15 14:13:09', '2017-05-15 14:13:09');
INSERT INTO `article_tags` VALUES ('7', '8', '7', '2017-05-15 14:15:05', '2017-05-15 14:15:05');
INSERT INTO `article_tags` VALUES ('8', '8', '8', '2017-05-15 14:15:05', '2017-05-15 14:15:05');
INSERT INTO `article_tags` VALUES ('9', '8', '9', '2017-05-15 14:15:05', '2017-05-15 14:15:05');
INSERT INTO `article_tags` VALUES ('10', '8', '10', '2017-05-15 14:15:06', '2017-05-15 14:15:06');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `slug_cate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_cate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_cate_unique` (`slug_cate`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Chưa được phân loại', '0', 'chua-duoc-phan-loai', null, null, null);
INSERT INTO `categories` VALUES ('2', 'Thế giới', '0', 'the-gioi', null, '2017-05-15 13:25:47', '2017-05-15 13:25:47');
INSERT INTO `categories` VALUES ('3', 'Xã hội', '0', 'xa-hoi', null, '2017-05-15 13:26:03', '2017-05-15 13:26:03');
INSERT INTO `categories` VALUES ('4', 'Thể thao', '0', 'the-thao', null, '2017-05-15 13:26:23', '2017-05-15 13:26:23');
INSERT INTO `categories` VALUES ('5', 'Sức mạnh số', '0', 'suc-manh-so', null, '2017-05-15 13:26:47', '2017-05-15 13:26:47');
INSERT INTO `categories` VALUES ('6', 'Du lịch', '0', 'du-lich', null, '2017-05-15 13:26:55', '2017-05-15 13:26:55');
INSERT INTO `categories` VALUES ('7', 'Bóng đá', '4', 'bong-da', null, '2017-05-15 13:27:25', '2017-05-15 13:27:25');
INSERT INTO `categories` VALUES ('8', 'Quần vợt', '4', 'quan-vot', null, '2017-05-15 13:27:44', '2017-05-15 13:27:44');

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content_cmt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('60', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('61', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('62', '2017_04_24_062754_create_roles_table', '1');
INSERT INTO `migrations` VALUES ('63', '2017_04_26_081632_create_categories_table', '1');
INSERT INTO `migrations` VALUES ('64', '2017_04_30_114633_create_articles_table', '1');
INSERT INTO `migrations` VALUES ('65', '2017_05_03_105529_create_tags_table', '1');
INSERT INTO `migrations` VALUES ('66', '2017_05_03_105612_create_article__tags_table', '1');
INSERT INTO `migrations` VALUES ('67', '2017_05_06_223640_create_comments_table', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('100', 'Thành viên', null, null);
INSERT INTO `roles` VALUES ('300', 'Cộng tác viên', null, null);
INSERT INTO `roles` VALUES ('500', 'Biên tập viên', null, null);
INSERT INTO `roles` VALUES ('1000', 'Quản trị viên', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES ('1', 'Nga', '2017-05-15 13:39:08', '2017-05-15 13:39:08');
INSERT INTO `tags` VALUES ('2', 'Mỹ', '2017-05-15 13:39:08', '2017-05-15 13:39:08');
INSERT INTO `tags` VALUES ('3', 'khen thưởng', '2017-05-15 14:07:24', '2017-05-15 14:07:24');
INSERT INTO `tags` VALUES ('4', 'hồ sơ giả', '2017-05-15 14:07:24', '2017-05-15 14:07:24');
INSERT INTO `tags` VALUES ('5', 'dự án BOT', '2017-05-15 14:13:09', '2017-05-15 14:13:09');
INSERT INTO `tags` VALUES ('6', 'Bộ Giao thông Vận tải', '2017-05-15 14:13:09', '2017-05-15 14:13:09');
INSERT INTO `tags` VALUES ('7', 'Real Madrid', '2017-05-15 14:15:05', '2017-05-15 14:15:05');
INSERT INTO `tags` VALUES ('8', 'Sevilla', '2017-05-15 14:15:05', '2017-05-15 14:15:05');
INSERT INTO `tags` VALUES ('9', 'Nacho', '2017-05-15 14:15:05', '2017-05-15 14:15:05');
INSERT INTO `tags` VALUES ('10', 'Tây Ban Nha', '2017-05-15 14:15:05', '2017-05-15 14:15:05');

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
  `role_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin@gmail.com', '$2y$10$y5tGBE7MlssRNMfmOTBf8uieek0yfnCYKinLxPdGha9oncrNxRRx.', null, '1000', null, null, null);
