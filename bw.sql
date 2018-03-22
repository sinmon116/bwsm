/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : bw

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-03-01 09:21:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bw_banner
-- ----------------------------
DROP TABLE IF EXISTS `bw_banner`;
CREATE TABLE `bw_banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(150) DEFAULT NULL COMMENT '缩略图',
  `link` varchar(50) DEFAULT NULL COMMENT '链接',
  `title` varchar(255) DEFAULT NULL COMMENT '描述',
  `info` varchar(500) DEFAULT NULL COMMENT '描述',
  `orderby` int(11) DEFAULT NULL COMMENT '显示顺序',
  `isdel` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bw_banner
-- ----------------------------
INSERT INTO `bw_banner` VALUES ('17', 'http://p3fczj25n.bkt.clouddn.com/3.jpg', 'youku.com', '《太平洋战事》', '太平洋是世界上最大、最深、边缘海和岛屿最多的大洋。它位于亚洲、大洋洲、南极洲和南北美洲之间。', '2', '0');
INSERT INTO `bw_banner` VALUES ('16', 'http://p3fczj25n.bkt.clouddn.com/2.jpg', 'www.baidu.com', '1', 'T1', '1', '1');
INSERT INTO `bw_banner` VALUES ('12', 'http://p3fczj25n.bkt.clouddn.com/4.jpg', 'http://youku.com', '《杀死比尔》', 'The Bride（乌玛·瑟曼 饰）以前是毒蛇暗杀小组的杀手，\n剧照\n剧照(20张)\n 企图通过结婚来脱离血腥的生活，但是她的同僚以及所有人的老板比尔', '3', '0');
INSERT INTO `bw_banner` VALUES ('13', 'http://p3fczj25n.bkt.clouddn.com/5.jpg', 'http://youku.com', '《泰山》', '泰山学习星星的一举一动，', '4', '0');
INSERT INTO `bw_banner` VALUES ('14', 'http://p3fczj25n.bkt.clouddn.com/6.jpg', 'http://360.com', '《奔跑吧！猛犸象》', '猛犸象（Mammuthus primigenius），又名毛象（长毛象），是一种适应寒冷气候的动物。', '5', '0');
INSERT INTO `bw_banner` VALUES ('15', 'http://p3fczj25n.bkt.clouddn.com/7.jpg', 'http://youku.com', '《逃出生天》', '电影《逃出生天》是由以拍摄惊悚片见长的彭氏兄弟执导，古天乐、刘青云、李心洁以及陈思诚等两岸三地的演技实力派影星领衔主演。', '6', '0');

-- ----------------------------
-- Table structure for bw_category
-- ----------------------------
DROP TABLE IF EXISTS `bw_category`;
CREATE TABLE `bw_category` (
  `cid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '板块的id',
  `classname` varchar(25) DEFAULT NULL COMMENT '板块的名字',
  `ordeby` int(10) DEFAULT NULL COMMENT '显示顺序',
  `pid` int(10) DEFAULT '0' COMMENT '父级ID',
  `isdel` enum('0','1') DEFAULT '0' COMMENT '0-为不屏蔽 1-为屏蔽',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bw_category
-- ----------------------------
INSERT INTO `bw_category` VALUES ('6', '大咔电影', '6', '4', '0');
INSERT INTO `bw_category` VALUES ('4', '游戏·直播', '4', '0', '0');
INSERT INTO `bw_category` VALUES ('3', '国产动漫', '3', '0', '0');
INSERT INTO `bw_category` VALUES ('2', '热播电影', '2', '0', '0');
INSERT INTO `bw_category` VALUES ('1', '电视剧', '1', '0', '0');
INSERT INTO `bw_category` VALUES ('43', '天影', '6', '31', '0');
INSERT INTO `bw_category` VALUES ('28', '央视新闻', '7', '0', '0');
INSERT INTO `bw_category` VALUES ('31', '天堂影院', '5', '0', '0');
INSERT INTO `bw_category` VALUES ('42', '新闻', '7', '28', '0');
INSERT INTO `bw_category` VALUES ('39', '牛A', '1', '3', '0');
INSERT INTO `bw_category` VALUES ('40', '电影', '2', '2', '0');
INSERT INTO `bw_category` VALUES ('41', 'Tv', '4', '1', '0');
INSERT INTO `bw_category` VALUES ('44', '直播', '9', '4', '0');
INSERT INTO `bw_category` VALUES ('47', '888', '0', '4', '0');

-- ----------------------------
-- Table structure for bw_danmu
-- ----------------------------
DROP TABLE IF EXISTS `bw_danmu`;
CREATE TABLE `bw_danmu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `addtime` int(10) NOT NULL,
  `vid` int(10) DEFAULT NULL COMMENT '视频ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bw_danmu
-- ----------------------------
INSERT INTO `bw_danmu` VALUES ('1', '{ \"text\":\"我的它旦撒旦撒\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":3}', '1461907424', '7');
INSERT INTO `bw_danmu` VALUES ('2', '{ \"text\":\"的大噩噩噩噩鹅鹅鹅\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":56}', '1461907432', '7');
INSERT INTO `bw_danmu` VALUES ('3', '{ \"text\":\"我的 \",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":143}', '1461907440', null);
INSERT INTO `bw_danmu` VALUES ('4', '{ \"text\":\"的撒的\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":155}', '1461907441', null);
INSERT INTO `bw_danmu` VALUES ('5', '{ \"text\":\"ds 三大旦撒\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":124}', '1461908354', null);
INSERT INTO `bw_danmu` VALUES ('6', '{ \"text\":\"helloweba.com欢迎您\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":25}', '1461908369', '7');
INSERT INTO `bw_danmu` VALUES ('7', '{ \"text\":\"车奴就\",\"color\":\"#b3404c\",\"size\":\"1\",\"position\":\"0\",\"time\":31}', '1517883627', '7');
INSERT INTO `bw_danmu` VALUES ('8', '{ \"text\":\"陈江\",\"color\":\"#f5a3e4\",\"size\":\"1\",\"position\":\"0\",\"time\":57}', '1517883630', '7');
INSERT INTO `bw_danmu` VALUES ('9', '{ \"text\":\"陈江江\",\"color\":\"#2ed7d5\",\"size\":\"1\",\"position\":\"0\",\"time\":102}', '1517883634', '7');
INSERT INTO `bw_danmu` VALUES ('10', '{ \"text\":\"888\",\"color\":\"#700745\",\"size\":\"1\",\"position\":\"0\",\"time\":25}', '1517888041', '9');
INSERT INTO `bw_danmu` VALUES ('11', '{ \"text\":\"123\",\"color\":\"#5c35bd\",\"size\":\"1\",\"position\":\"0\",\"time\":15}', '1517888698', '13');
INSERT INTO `bw_danmu` VALUES ('12', '{ \"text\":\"654165416+5\",\"color\":\"#64d1a8\",\"size\":\"1\",\"position\":\"0\",\"time\":43}', '1517994321', '7');
INSERT INTO `bw_danmu` VALUES ('13', '{ \"text\":\"123\",\"color\":\"#7c9cdb\",\"size\":\"1\",\"position\":\"0\",\"time\":43}', '1518058687', '14');

-- ----------------------------
-- Table structure for bw_down
-- ----------------------------
DROP TABLE IF EXISTS `bw_down`;
CREATE TABLE `bw_down` (
  `xid` int(10) NOT NULL AUTO_INCREMENT COMMENT '下载表',
  `uid` int(10) DEFAULT NULL COMMENT '用户ID',
  `vid` int(10) DEFAULT NULL COMMENT '视频ID',
  `vtitle` varchar(100) DEFAULT NULL COMMENT '视频标题',
  `vfengmian` varchar(100) DEFAULT NULL COMMENT '视频的封面',
  `xtime` varchar(50) DEFAULT NULL COMMENT '下载时间',
  PRIMARY KEY (`xid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bw_down
-- ----------------------------
INSERT INTO `bw_down` VALUES ('1', '3', '14', '美女', 'http://p3fczj25n.bkt.clouddn.com/5a79444a4dd9amv.mp4?vframe/jpg/offset/1', '2018-02-07 09:10:31');
INSERT INTO `bw_down` VALUES ('2', '14', '14', '美女', 'http://p3fczj25n.bkt.clouddn.com/5a79444a4dd9amv.mp4?vframe/jpg/offset/1', '2018-02-07 09:20:31');
INSERT INTO `bw_down` VALUES ('3', '1', '24', '高冷艳丽', 'http://p3fczj25n.bkt.clouddn.com/1.mp4?vframe/jpg/offset/1', '2018-02-28 21:47:07');

-- ----------------------------
-- Table structure for bw_fwjl
-- ----------------------------
DROP TABLE IF EXISTS `bw_fwjl`;
CREATE TABLE `bw_fwjl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '记录用户访问的id',
  `username` varchar(50) DEFAULT NULL,
  `ip` varchar(25) DEFAULT NULL,
  `brows` int(50) DEFAULT NULL COMMENT '浏览次数',
  `retime` varchar(25) DEFAULT NULL COMMENT '登录时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bw_fwjl
-- ----------------------------
INSERT INTO `bw_fwjl` VALUES ('16', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-05 13:46:25');
INSERT INTO `bw_fwjl` VALUES ('15', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-03 14:26:29');
INSERT INTO `bw_fwjl` VALUES ('14', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-03 08:38:02');
INSERT INTO `bw_fwjl` VALUES ('10', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-02 20:50:58');
INSERT INTO `bw_fwjl` VALUES ('9', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-02 20:48:16');
INSERT INTO `bw_fwjl` VALUES ('7', '4', '王二', '10.0.126.3', '4', '2018-02-01 16:46:51');
INSERT INTO `bw_fwjl` VALUES ('8', '5', '网二', '10.0.126.3', '4', '2018-02-01 16:46:51');
INSERT INTO `bw_fwjl` VALUES ('11', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-02 20:51:18');
INSERT INTO `bw_fwjl` VALUES ('12', '2', '17807728196', '::1', null, '2018-02-02 20:52:21');
INSERT INTO `bw_fwjl` VALUES ('13', '10', '17611134695', '::1', null, '2018-02-02 20:54:13');
INSERT INTO `bw_fwjl` VALUES ('17', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-05 15:34:34');
INSERT INTO `bw_fwjl` VALUES ('18', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-05 15:35:51');
INSERT INTO `bw_fwjl` VALUES ('19', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-05 15:36:02');
INSERT INTO `bw_fwjl` VALUES ('20', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-05 15:36:30');
INSERT INTO `bw_fwjl` VALUES ('21', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-05 15:54:29');
INSERT INTO `bw_fwjl` VALUES ('22', '11', 'Mr_刘', '::1', null, '2018-02-05 16:15:00');
INSERT INTO `bw_fwjl` VALUES ('23', '11', 'Mr_刘', '::1', null, '2018-02-05 16:26:40');
INSERT INTO `bw_fwjl` VALUES ('24', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-05 19:17:05');
INSERT INTO `bw_fwjl` VALUES ('25', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-05 21:40:24');
INSERT INTO `bw_fwjl` VALUES ('26', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-06 08:37:36');
INSERT INTO `bw_fwjl` VALUES ('27', '12', 'PHP开发猿', '::1', null, '2018-02-06 08:45:16');
INSERT INTO `bw_fwjl` VALUES ('28', '13', 'PHP开发猿', '::1', null, '2018-02-06 08:51:49');
INSERT INTO `bw_fwjl` VALUES ('29', '13', 'PHP开发猿', '::1', null, '2018-02-06 08:52:34');
INSERT INTO `bw_fwjl` VALUES ('30', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-06 08:53:32');
INSERT INTO `bw_fwjl` VALUES ('31', '3', '17611134691', '::1', null, '2018-02-06 11:41:09');
INSERT INTO `bw_fwjl` VALUES ('32', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-06 11:46:32');
INSERT INTO `bw_fwjl` VALUES ('33', '3', '17611134691', '::1', null, '2018-02-06 12:03:03');
INSERT INTO `bw_fwjl` VALUES ('34', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-06 13:38:40');
INSERT INTO `bw_fwjl` VALUES ('35', '2', '17807728196', '::1', null, '2018-02-06 15:30:00');
INSERT INTO `bw_fwjl` VALUES ('36', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-06 17:21:33');
INSERT INTO `bw_fwjl` VALUES ('37', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-06 19:30:42');
INSERT INTO `bw_fwjl` VALUES ('38', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-06 19:34:46');
INSERT INTO `bw_fwjl` VALUES ('39', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-06 20:33:40');
INSERT INTO `bw_fwjl` VALUES ('40', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-06 20:35:15');
INSERT INTO `bw_fwjl` VALUES ('41', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-06 20:38:45');
INSERT INTO `bw_fwjl` VALUES ('42', '9', '@o(︶︿︶)o 唉@', '::1', null, '2018-02-06 20:39:34');
INSERT INTO `bw_fwjl` VALUES ('52', '14', 'chen', '::1', null, '2018-02-07 10:42:04');
INSERT INTO `bw_fwjl` VALUES ('51', '14', 'chen', '::1', null, '2018-02-07 08:59:50');
INSERT INTO `bw_fwjl` VALUES ('45', '2', '17611134690', '::1', null, '2018-02-06 21:12:56');
INSERT INTO `bw_fwjl` VALUES ('50', '14', 'chen', '::1', null, '2018-02-07 08:36:38');
INSERT INTO `bw_fwjl` VALUES ('47', '14', 'chenjiang', '::1', null, '2018-02-06 22:17:34');
INSERT INTO `bw_fwjl` VALUES ('48', '14', 'chenjiang', '::1', null, '2018-02-06 22:18:07');
INSERT INTO `bw_fwjl` VALUES ('49', '14', 'chen', '::1', null, '2018-02-06 22:18:30');
INSERT INTO `bw_fwjl` VALUES ('53', '14', 'chen', '::1', null, '2018-02-07 11:04:58');
INSERT INTO `bw_fwjl` VALUES ('54', '14', 'chen123', '::1', null, '2018-02-07 11:06:44');
INSERT INTO `bw_fwjl` VALUES ('55', '14', 'chen1456', '::1', null, '2018-02-07 12:07:34');
INSERT INTO `bw_fwjl` VALUES ('56', '14', 'chen1456', '::1', null, '2018-02-07 12:08:12');
INSERT INTO `bw_fwjl` VALUES ('57', '14', 'chen1456', '::1', null, '2018-02-07 12:12:22');
INSERT INTO `bw_fwjl` VALUES ('58', '14', 'chen1456', '::1', null, '2018-02-07 15:30:29');
INSERT INTO `bw_fwjl` VALUES ('59', '14', 'chen1456', '::1', null, '2018-02-07 15:40:04');
INSERT INTO `bw_fwjl` VALUES ('60', '11', 'Mr_刘', '::1', null, '2018-02-07 17:20:26');
INSERT INTO `bw_fwjl` VALUES ('61', '14', 'chen1456', '::1', null, '2018-02-07 17:21:02');
INSERT INTO `bw_fwjl` VALUES ('62', '11', 'Mr_刘', '::1', null, '2018-02-07 17:22:04');
INSERT INTO `bw_fwjl` VALUES ('63', '10', '17611134695', '::1', null, '2018-02-08 09:17:13');
INSERT INTO `bw_fwjl` VALUES ('64', '14', 'chen1456', '::1', null, '2018-02-08 09:21:17');
INSERT INTO `bw_fwjl` VALUES ('65', '14', 'chen1456', '::1', null, '2018-02-08 09:50:47');
INSERT INTO `bw_fwjl` VALUES ('66', '14', 'chen1456', '::1', null, '2018-02-08 09:59:04');
INSERT INTO `bw_fwjl` VALUES ('67', '10', '17611134695', '::1', null, '2018-02-08 10:14:56');
INSERT INTO `bw_fwjl` VALUES ('68', '14', 'chen1456', '::1', null, '2018-02-08 10:33:40');
INSERT INTO `bw_fwjl` VALUES ('69', '14', 'chen1456', '::1', null, '2018-02-08 10:38:48');
INSERT INTO `bw_fwjl` VALUES ('70', '14', 'chen1456', '::1', null, '2018-02-08 10:43:15');
INSERT INTO `bw_fwjl` VALUES ('71', '3', '17611134692', '::1', null, '2018-02-08 10:54:02');
INSERT INTO `bw_fwjl` VALUES ('72', '14', 'chen1456', '::1', null, '2018-02-08 13:39:44');
INSERT INTO `bw_fwjl` VALUES ('73', '14', '陈江', '::1', null, '2018-02-08 17:25:51');
INSERT INTO `bw_fwjl` VALUES ('74', '4', '17611134695', '::1', null, '2018-02-13 18:50:53');
INSERT INTO `bw_fwjl` VALUES ('75', '4', '17611134695', '::1', null, '2018-02-13 18:50:54');
INSERT INTO `bw_fwjl` VALUES ('76', '4', '17611134695', '::1', null, '2018-02-15 09:52:59');
INSERT INTO `bw_fwjl` VALUES ('77', '2', '17611134691', '::1', null, '2018-02-17 18:28:36');
INSERT INTO `bw_fwjl` VALUES ('78', '2', '17611134691', '::1', null, '2018-02-18 17:19:02');
INSERT INTO `bw_fwjl` VALUES ('79', '1', '17611134697', '::1', null, '2018-02-18 18:25:40');
INSERT INTO `bw_fwjl` VALUES ('80', '1', '17611134697', '::1', null, '2018-02-27 10:22:18');
INSERT INTO `bw_fwjl` VALUES ('81', '1', '17611134697', '::1', null, '2018-02-28 11:27:53');
INSERT INTO `bw_fwjl` VALUES ('82', '1', '17611134697', '::1', null, '2018-02-28 11:29:21');
INSERT INTO `bw_fwjl` VALUES ('83', '1', '17611134697', '::1', null, '2018-02-28 11:30:47');
INSERT INTO `bw_fwjl` VALUES ('84', '1', '17611134697', '::1', null, '2018-02-28 11:32:03');
INSERT INTO `bw_fwjl` VALUES ('85', '1', '17611134697', '::1', null, '2018-02-28 11:33:00');
INSERT INTO `bw_fwjl` VALUES ('86', '1', '17611134697', '::1', null, '2018-02-28 11:35:25');
INSERT INTO `bw_fwjl` VALUES ('87', '1', '17611134697', '::1', null, '2018-02-28 11:36:25');
INSERT INTO `bw_fwjl` VALUES ('88', '1', '17611134697', '::1', null, '2018-02-28 11:37:16');
INSERT INTO `bw_fwjl` VALUES ('89', '1', '17611134697', '::1', null, '2018-02-28 11:37:50');
INSERT INTO `bw_fwjl` VALUES ('90', '1', '17611134697', '::1', null, '2018-02-28 21:46:53');

-- ----------------------------
-- Table structure for bw_guanggao
-- ----------------------------
DROP TABLE IF EXISTS `bw_guanggao`;
CREATE TABLE `bw_guanggao` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告表',
  `gtitle` varchar(50) DEFAULT NULL COMMENT '广告标题',
  `gurl` varchar(255) DEFAULT NULL COMMENT '广告链接',
  `gpic` varchar(255) DEFAULT NULL COMMENT '广告封面',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bw_guanggao
-- ----------------------------
INSERT INTO `bw_guanggao` VALUES ('1', '广告2', 'p3fczj25n.bkt.clouddn.com/101.mp4', 'http://p3fczj25n.bkt.clouddn.com/101.mp4?vframe/jpg/offset/1');
INSERT INTO `bw_guanggao` VALUES ('5', '踢球', 'p3fczj25n.bkt.clouddn.com/100.mp4', 'http://p3fczj25n.bkt.clouddn.com/100.mp4?vframe/jpg/offset/1');

-- ----------------------------
-- Table structure for bw_link
-- ----------------------------
DROP TABLE IF EXISTS `bw_link`;
CREATE TABLE `bw_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT NULL COMMENT '顺序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bw_link
-- ----------------------------
INSERT INTO `bw_link` VALUES ('5', '百度', 'http://www.baidu.com', '1');
INSERT INTO `bw_link` VALUES ('6', '网易', 'http://www.163.com', '2');
INSERT INTO `bw_link` VALUES ('7', '腾讯', 'http://qq.com', '3');
INSERT INTO `bw_link` VALUES ('11', '火狐', 'http://www.huohu.com', '5');
INSERT INTO `bw_link` VALUES ('12', '360影视', 'http://v.360.cn/', '6');

-- ----------------------------
-- Table structure for bw_permission
-- ----------------------------
DROP TABLE IF EXISTS `bw_permission`;
CREATE TABLE `bw_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '' COMMENT '权限名称',
  `path` varchar(100) DEFAULT '' COMMENT '权限路径',
  `description` varchar(200) DEFAULT '' COMMENT '权限描述',
  `status` int(1) DEFAULT '0' COMMENT '权限状态',
  `create_time` int(10) DEFAULT '0' COMMENT '创建时间',
  `pid` int(11) DEFAULT NULL COMMENT '父id',
  `dj` int(11) DEFAULT NULL COMMENT '等级，偏移量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
-- Records of bw_permission
-- ----------------------------
INSERT INTO `bw_permission` VALUES ('1', '后台', '/admin/index/index', '后台首页', '0', '0', '0', '1');
INSERT INTO `bw_permission` VALUES ('2', '问题管理', '/admin/quest', '问题管理板块', '0', '0', '1', '2');
INSERT INTO `bw_permission` VALUES ('3', '问题留言列表', '/admin/quest/questionlist', '', '0', '0', '2', '3');
INSERT INTO `bw_permission` VALUES ('4', '访问记录', '/admin/quest/questiondel', '', '0', '0', '2', '3');
INSERT INTO `bw_permission` VALUES ('5', '板块管理', '/admin/videoclass', '', '0', '0', '1', '2');
INSERT INTO `bw_permission` VALUES ('6', '添加板块', '/admin/videoclass/category', '', '0', '0', '5', '3');
INSERT INTO `bw_permission` VALUES ('7', '编辑板块', '/admin/videoclass/cateedit', '', '0', '0', '5', '3');
INSERT INTO `bw_permission` VALUES ('8', '轮播管理', '/admin/videoclass', '', '0', '0', '1', '2');
INSERT INTO `bw_permission` VALUES ('9', '视频列表', '/admin/videoclass/bannerlist', '', '0', '0', '8', '3');
INSERT INTO `bw_permission` VALUES ('10', '首页轮播', '/admin/videoclass/bannerlb', '', '0', '0', '8', '2');
INSERT INTO `bw_permission` VALUES ('11', '评论管理', '/admin/comment', '', '0', '0', '1', '2');
INSERT INTO `bw_permission` VALUES ('12', '评论列表', '/admin/comment/commentlist', '', '0', '0', '11', '3');
INSERT INTO `bw_permission` VALUES ('13', '会员管理', '/admin/vip', '', '0', '0', '1', '2');
INSERT INTO `bw_permission` VALUES ('14', '会员列表', '/admin/vip/memberlist', '', '0', '0', '13', '3');
INSERT INTO `bw_permission` VALUES ('15', '管理员管理', '/admin/admingl', '', '0', '0', '1', '2');
INSERT INTO `bw_permission` VALUES ('16', '管理员列表', '/admin/admingl/adminlist', '', '0', '0', '15', '3');
INSERT INTO `bw_permission` VALUES ('17', '角色管理', '/admin/admingl/adminrole', '', '0', '0', '15', '3');
INSERT INTO `bw_permission` VALUES ('18', '权限分类', '/admin/admingl/admincate', '', '0', '0', '15', '3');
INSERT INTO `bw_permission` VALUES ('19', '系统设置', '/admin/sys', '', '0', '0', '1', '2');
INSERT INTO `bw_permission` VALUES ('20', '系统设置项', '/admin/sys/sysset', '', '0', '0', '19', '3');
INSERT INTO `bw_permission` VALUES ('21', '友情链接', '/admin/sys/syslink', '', '0', '0', '19', '3');
INSERT INTO `bw_permission` VALUES ('22', '登陆过滤普通用户', '/admin/user/dologin', '登陆过滤普通用户', '0', '0', '22', '2');
INSERT INTO `bw_permission` VALUES ('23', '权限管理', '/admin/admingl/adminrule', '', '0', '0', '15', '3');
INSERT INTO `bw_permission` VALUES ('24', '系统统计', '/admin/echarts', '', '0', '0', '1', '2');
INSERT INTO `bw_permission` VALUES ('25', '饼图', '/admin/echarts/echarsb', '', '0', '0', '24', '3');
INSERT INTO `bw_permission` VALUES ('26', '网站数据统计', '/admin/echarts/echars', '', '0', '0', '24', '3');
INSERT INTO `bw_permission` VALUES ('27', '角色编辑', '/admin/admingl/roleedit', '', '0', '0', '15', '3');
INSERT INTO `bw_permission` VALUES ('28', '视频添加', '/admin/videoclass/banneradd', '', '0', '0', '8', '3');
INSERT INTO `bw_permission` VALUES ('29', '地图', '/admin/echarts/map', '', '0', '0', '24', '3');
INSERT INTO `bw_permission` VALUES ('33', '订单管理', '/admin/vip', '', '0', '0', '1', '2');
INSERT INTO `bw_permission` VALUES ('34', '订单列表', '/admin/vip/order', '', '0', '0', '33', '3');
INSERT INTO `bw_permission` VALUES ('35', '广告列表', '/admin/videoclass/guanggao', '', '0', '0', '8', '3');

-- ----------------------------
-- Table structure for bw_question
-- ----------------------------
DROP TABLE IF EXISTS `bw_question`;
CREATE TABLE `bw_question` (
  `qid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '用户的id',
  `uname` varchar(50) DEFAULT NULL COMMENT '发表意见人的名字',
  `content` varchar(255) DEFAULT NULL COMMENT '内容',
  `create_time` int(25) DEFAULT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bw_question
-- ----------------------------
INSERT INTO `bw_question` VALUES ('1', '1', '战三', '哈哈哈', '1523388276');
INSERT INTO `bw_question` VALUES ('9', '9', '@o(︶︿︶)o 唉@', '123', '1517622938');
INSERT INTO `bw_question` VALUES ('12', '11', 'Mr_刘', '垃圾', '1517819300');
INSERT INTO `bw_question` VALUES ('11', '9', '@o(︶︿︶)o 唉@', 'tyut', '1517622967');
INSERT INTO `bw_question` VALUES ('14', '2', '17611134691', '多发点视频啊', '1518947075');

-- ----------------------------
-- Table structure for bw_reply
-- ----------------------------
DROP TABLE IF EXISTS `bw_reply`;
CREATE TABLE `bw_reply` (
  `rid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vnames` varchar(50) DEFAULT NULL COMMENT '视频的名字',
  `name` varchar(25) DEFAULT NULL COMMENT '评论者姓名',
  `uid` int(11) DEFAULT NULL,
  `vid` int(11) DEFAULT NULL,
  `concent` varchar(255) DEFAULT NULL,
  `create_time` varchar(50) DEFAULT '',
  `uname` varchar(50) DEFAULT NULL COMMENT '被回复者的name',
  `pid` int(11) DEFAULT NULL COMMENT '父级id',
  `prc` varchar(100) DEFAULT NULL,
  `isdel` enum('0','1') DEFAULT '0' COMMENT '0-否 1-屏蔽',
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bw_reply
-- ----------------------------
INSERT INTO `bw_reply` VALUES ('1', null, '刘猛', '2', '10', '哈哈哈这个视频厉害了', '2018-02-01 16:26:58', '', '0', 'http://q.qlogo.cn/qqapp/100378832/C1958610EF8CADC53252E503A32BFD47/100', '0');
INSERT INTO `bw_reply` VALUES ('2', null, '刘翔1', '3', '10', '66666', '2018-02-01 16:28:24', '刘猛', '1', 'http://q.qlogo.cn/qqapp/100378832/C1958610EF8CADC53252E503A32BFD47/100', '0');
INSERT INTO `bw_reply` VALUES ('3', null, '刘翔3', '3', '10', '5555', '2018-02-01 16:28:24', '刘翔1', '2', 'http://q.qlogo.cn/qqapp/100378832/C1958610EF8CADC53252E503A32BFD47/100', '0');
INSERT INTO `bw_reply` VALUES ('6', '新村vxcb', '@o(︶︿︶)o 唉@', '9', '10', '垃圾', '2018-02-05 15:45:44', '刘翔3', '3', 'http://q.qlogo.cn/qqapp/100378832/C1958610EF8CADC53252E503A32BFD47/100', '0');
INSERT INTO `bw_reply` VALUES ('19', 'qqqqq', 'chen1456', '14', '7', '66666655553333', '2018-02-07 17:06:23', 'chen1456', '17', '\\uploads\\20180206\\31a7869ed79e61911e4e1b991b784f78.png', '0');
INSERT INTO `bw_reply` VALUES ('15', '123', '@o(︶︿︶)o 唉@', '9', '13', 'zxczx', '2018-02-06 11:46:55', '@o(︶︿︶)o 唉@', '14', 'http://q.qlogo.cn/qqapp/100378832/C1958610EF8CADC53252E503A32BFD47/100', '0');
INSERT INTO `bw_reply` VALUES ('17', 'qqqqq', 'chen1456', '14', '7', '411111', '2018-02-07 17:06:00', 'chen1456', '16', '\\uploads\\20180206\\31a7869ed79e61911e4e1b991b784f78.png', '0');
INSERT INTO `bw_reply` VALUES ('18', 'qqqqq', 'chen1456', '14', '7', '666666', '2018-02-07 17:06:11', 'chen1456', '17', '\\uploads\\20180206\\31a7869ed79e61911e4e1b991b784f78.png', '0');
INSERT INTO `bw_reply` VALUES ('16', 'qqqqq', 'chen1456', '14', '7', 'eeee ', '2018-02-07 17:05:43', null, null, '\\uploads\\20180206\\31a7869ed79e61911e4e1b991b784f78.png', '0');
INSERT INTO `bw_reply` VALUES ('20', 'qqqqq', 'chen1456', '14', '7', '411111', '2018-02-07 17:06:47', 'chen1456', '16', '\\uploads\\20180206\\31a7869ed79e61911e4e1b991b784f78.png', '0');
INSERT INTO `bw_reply` VALUES ('21', '猫猫', 'chen1456', '14', '16', '垃圾', '2018-02-08 14:05:37', null, null, '\\uploads\\20180206\\31a7869ed79e61911e4e1b991b784f78.png', '0');
INSERT INTO `bw_reply` VALUES ('22', '猫猫', 'chen1456', '14', '16', '123', '2018-02-08 14:06:25', 'chen1456', '21', '\\uploads\\20180206\\31a7869ed79e61911e4e1b991b784f78.png', '0');

-- ----------------------------
-- Table structure for bw_role
-- ----------------------------
DROP TABLE IF EXISTS `bw_role`;
CREATE TABLE `bw_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '角色名称',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父角色id',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '描述信息',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '角色状态',
  `sort_num` int(11) NOT NULL DEFAULT '0' COMMENT '排序值',
  `left_key` int(11) NOT NULL DEFAULT '0' COMMENT '用来组织关系的左值',
  `right_key` int(11) NOT NULL DEFAULT '0' COMMENT '用来组织关系的右值',
  `level` int(11) NOT NULL DEFAULT '0' COMMENT '所处层级',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='角色';

-- ----------------------------
-- Records of bw_role
-- ----------------------------
INSERT INTO `bw_role` VALUES ('1', '超级管理员', '0', '具有至高无上的权利', '0', '0', '0', '0', '0');
INSERT INTO `bw_role` VALUES ('2', '普通管理员', '0', '我是一个小管理会员', '0', '0', '0', '0', '0');
INSERT INTO `bw_role` VALUES ('4', '普通管理', '0', '我最小', '0', '0', '0', '0', '0');
INSERT INTO `bw_role` VALUES ('5', '普通', '0', '歪歪', '0', '0', '0', '0', '0');
INSERT INTO `bw_role` VALUES ('6', 'ee', '0', 'ee', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for bw_role_permission
-- ----------------------------
DROP TABLE IF EXISTS `bw_role_permission`;
CREATE TABLE `bw_role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色Id',
  `permission_id` int(11) NOT NULL DEFAULT '0' COMMENT '权限ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8 COMMENT='角色权限对应表';

-- ----------------------------
-- Records of bw_role_permission
-- ----------------------------
INSERT INTO `bw_role_permission` VALUES ('1', '1', '1');
INSERT INTO `bw_role_permission` VALUES ('2', '1', '2');
INSERT INTO `bw_role_permission` VALUES ('3', '1', '3');
INSERT INTO `bw_role_permission` VALUES ('4', '1', '4');
INSERT INTO `bw_role_permission` VALUES ('5', '1', '5');
INSERT INTO `bw_role_permission` VALUES ('6', '1', '6');
INSERT INTO `bw_role_permission` VALUES ('7', '1', '7');
INSERT INTO `bw_role_permission` VALUES ('8', '1', '8');
INSERT INTO `bw_role_permission` VALUES ('9', '1', '9');
INSERT INTO `bw_role_permission` VALUES ('10', '1', '10');
INSERT INTO `bw_role_permission` VALUES ('11', '1', '11');
INSERT INTO `bw_role_permission` VALUES ('12', '1', '12');
INSERT INTO `bw_role_permission` VALUES ('13', '1', '13');
INSERT INTO `bw_role_permission` VALUES ('14', '1', '14');
INSERT INTO `bw_role_permission` VALUES ('15', '1', '15');
INSERT INTO `bw_role_permission` VALUES ('16', '1', '16');
INSERT INTO `bw_role_permission` VALUES ('17', '1', '17');
INSERT INTO `bw_role_permission` VALUES ('18', '1', '18');
INSERT INTO `bw_role_permission` VALUES ('19', '1', '19');
INSERT INTO `bw_role_permission` VALUES ('20', '1', '20');
INSERT INTO `bw_role_permission` VALUES ('21', '1', '21');
INSERT INTO `bw_role_permission` VALUES ('22', '1', '22');
INSERT INTO `bw_role_permission` VALUES ('23', '1', '23');
INSERT INTO `bw_role_permission` VALUES ('44', '1', '25');
INSERT INTO `bw_role_permission` VALUES ('45', '1', '26');
INSERT INTO `bw_role_permission` VALUES ('107', '1', '27');
INSERT INTO `bw_role_permission` VALUES ('108', '1', '28');
INSERT INTO `bw_role_permission` VALUES ('109', '1', '29');
INSERT INTO `bw_role_permission` VALUES ('194', '1', '33');
INSERT INTO `bw_role_permission` VALUES ('195', '1', '34');
INSERT INTO `bw_role_permission` VALUES ('196', '1', '35');
INSERT INTO `bw_role_permission` VALUES ('209', '2', '1');
INSERT INTO `bw_role_permission` VALUES ('210', '2', '3');
INSERT INTO `bw_role_permission` VALUES ('211', '2', '4');
INSERT INTO `bw_role_permission` VALUES ('212', '2', '12');
INSERT INTO `bw_role_permission` VALUES ('213', '2', '22');
INSERT INTO `bw_role_permission` VALUES ('214', '2', '0');
INSERT INTO `bw_role_permission` VALUES ('215', '2', '2');
INSERT INTO `bw_role_permission` VALUES ('216', '2', '11');
INSERT INTO `bw_role_permission` VALUES ('217', '2', '22');
INSERT INTO `bw_role_permission` VALUES ('218', '4', '1');
INSERT INTO `bw_role_permission` VALUES ('219', '4', '3');
INSERT INTO `bw_role_permission` VALUES ('220', '4', '4');
INSERT INTO `bw_role_permission` VALUES ('221', '4', '9');
INSERT INTO `bw_role_permission` VALUES ('222', '4', '10');
INSERT INTO `bw_role_permission` VALUES ('223', '4', '12');
INSERT INTO `bw_role_permission` VALUES ('224', '4', '22');
INSERT INTO `bw_role_permission` VALUES ('225', '4', '0');
INSERT INTO `bw_role_permission` VALUES ('226', '4', '2');
INSERT INTO `bw_role_permission` VALUES ('227', '4', '8');
INSERT INTO `bw_role_permission` VALUES ('228', '4', '11');
INSERT INTO `bw_role_permission` VALUES ('229', '4', '22');
INSERT INTO `bw_role_permission` VALUES ('230', '5', '3');
INSERT INTO `bw_role_permission` VALUES ('231', '5', '6');
INSERT INTO `bw_role_permission` VALUES ('232', '5', '9');
INSERT INTO `bw_role_permission` VALUES ('233', '5', '10');
INSERT INTO `bw_role_permission` VALUES ('234', '5', '11');
INSERT INTO `bw_role_permission` VALUES ('235', '5', '12');
INSERT INTO `bw_role_permission` VALUES ('236', '5', '35');
INSERT INTO `bw_role_permission` VALUES ('237', '5', '2');
INSERT INTO `bw_role_permission` VALUES ('238', '5', '5');
INSERT INTO `bw_role_permission` VALUES ('239', '5', '8');
INSERT INTO `bw_role_permission` VALUES ('240', '5', '1');
INSERT INTO `bw_role_permission` VALUES ('241', '5', '11');
INSERT INTO `bw_role_permission` VALUES ('242', '6', '1');
INSERT INTO `bw_role_permission` VALUES ('243', '6', '2');
INSERT INTO `bw_role_permission` VALUES ('244', '6', '3');
INSERT INTO `bw_role_permission` VALUES ('245', '6', '22');
INSERT INTO `bw_role_permission` VALUES ('246', '6', '0');
INSERT INTO `bw_role_permission` VALUES ('247', '6', '1');
INSERT INTO `bw_role_permission` VALUES ('248', '6', '2');
INSERT INTO `bw_role_permission` VALUES ('249', '6', '22');

-- ----------------------------
-- Table structure for bw_scang
-- ----------------------------
DROP TABLE IF EXISTS `bw_scang`;
CREATE TABLE `bw_scang` (
  `sid` int(10) NOT NULL AUTO_INCREMENT COMMENT '收藏表',
  `uid` int(10) DEFAULT NULL,
  `vid` int(10) DEFAULT NULL,
  `vtitle` varchar(100) DEFAULT NULL,
  `vfengmian` varchar(100) DEFAULT NULL,
  `stime` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bw_scang
-- ----------------------------
INSERT INTO `bw_scang` VALUES ('12', '14', '14', '美女', 'http://p3fczj25n.bkt.clouddn.com/5a79444a4dd9amv.mp4?vframe/jpg/offset/1', '2018-02-07 10:19:14');
INSERT INTO `bw_scang` VALUES ('16', '3', '13', '123', 'http://p3fczj25n.bkt.clouddn.com/5a7923ea527755.MP4?vframe/jpg/offset/1', '2018-02-08 11:36:48');
INSERT INTO `bw_scang` VALUES ('14', '14', '6', '123', 'http://p3fczj25n.bkt.clouddn.com/2.mp4?vframe/jpg/offset/1', '2018-02-07 10:19:43');
INSERT INTO `bw_scang` VALUES ('15', '14', '5', 'lalala', 'http://p3fczj25n.bkt.clouddn.com/8.mp4?vframe/jpg/offset/1', '2018-02-07 10:19:45');
INSERT INTO `bw_scang` VALUES ('17', '14', '13', '123', 'http://p3fczj25n.bkt.clouddn.com/5a7923ea527755.MP4?vframe/jpg/offset/1', '2018-02-08 11:44:44');
INSERT INTO `bw_scang` VALUES ('18', '14', '15', '美女', 'http://p3fczj25n.bkt.clouddn.com/5a7944678ba76mv.mp4?vframe/jpg/offset/1', '2018-02-08 11:44:56');
INSERT INTO `bw_scang` VALUES ('19', '14', '4', '哈哈', 'http://p3fczj25n.bkt.clouddn.com/6.MP4?vframe/jpg/offset/1', '2018-02-08 11:45:12');
INSERT INTO `bw_scang` VALUES ('20', '14', '9', '呵呵', 'http://p3fczj25n.bkt.clouddn.com/5.MP4?vframe/jpg/offset/1', '2018-02-08 11:45:20');
INSERT INTO `bw_scang` VALUES ('21', '14', '7', 'qqqqq', 'http://p3fczj25n.bkt.clouddn.com/7.MP4?vframe/jpg/offset/1', '2018-02-08 11:45:28');
INSERT INTO `bw_scang` VALUES ('22', '4', '26', '雪域美女', 'http://p3fczj25n.bkt.clouddn.com/1.mp4?vframe/jpg/offset/1', '2018-02-15 11:02:32');
INSERT INTO `bw_scang` VALUES ('23', '2', '35', '真正的使徒', 'http://p3fczj25n.bkt.clouddn.com/dnf_使徒.mp4?vframe/jpg/offset/1', '2018-02-18 17:47:47');

-- ----------------------------
-- Table structure for bw_sign
-- ----------------------------
DROP TABLE IF EXISTS `bw_sign`;
CREATE TABLE `bw_sign` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '用户的id',
  `uname` varchar(25) DEFAULT NULL COMMENT '用户名',
  `qdtime` int(50) DEFAULT NULL COMMENT '签到时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=247 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bw_sign
-- ----------------------------
INSERT INTO `bw_sign` VALUES ('227', '11', 'Mr_刘', '1517995235');
INSERT INTO `bw_sign` VALUES ('228', '11', 'Mr_刘', '1517995237');
INSERT INTO `bw_sign` VALUES ('229', '11', 'Mr_刘', '1517995242');
INSERT INTO `bw_sign` VALUES ('246', '2', '17611134691', '1518863347');
INSERT INTO `bw_sign` VALUES ('245', '14', 'chen1456', '1518055964');
INSERT INTO `bw_sign` VALUES ('232', '10', '17611134695', '1518052719');
INSERT INTO `bw_sign` VALUES ('244', '14', 'chen1456', '1518055964');
INSERT INTO `bw_sign` VALUES ('243', '14', 'chen1456', '1518055962');
INSERT INTO `bw_sign` VALUES ('242', '14', 'chen1456', '1518055962');
INSERT INTO `bw_sign` VALUES ('241', '14', 'chen1456', '1518055962');
INSERT INTO `bw_sign` VALUES ('240', '14', 'chen1456', '1518055960');
INSERT INTO `bw_sign` VALUES ('239', '14', 'chen1456', '1518055959');

-- ----------------------------
-- Table structure for bw_user
-- ----------------------------
DROP TABLE IF EXISTS `bw_user`;
CREATE TABLE `bw_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT '' COMMENT '用户账号',
  `password` varchar(64) DEFAULT '' COMMENT '用户密码',
  `phone` varchar(20) DEFAULT '' COMMENT '手机号码',
  `email` varchar(50) DEFAULT '' COMMENT '邮箱',
  `last_login_time` int(11) DEFAULT '0' COMMENT '最后登录时间',
  `status` int(1) DEFAULT '0' COMMENT '用户状态 1-超级管理员  2-小管理员',
  `picture` varchar(100) DEFAULT 'public/static/1.jpg' COMMENT '头像',
  `isvip` int(2) DEFAULT '1' COMMENT '1-非会员  2-vip',
  `isdel` int(10) DEFAULT '0' COMMENT '0-未锁定 1 -锁定',
  `laiyuan` varchar(10) DEFAULT NULL COMMENT '登陆来源',
  `type` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of bw_user
-- ----------------------------
INSERT INTO `bw_user` VALUES ('1', '超管', '123', '17611134697', '2991326381@qq.com', '1517878309', '1', '\\uploads\\20180206\\240c162cae0efa3f6c7e45eaccdd89f4.png', '2', '0', 'phone', '1');
INSERT INTO `bw_user` VALUES ('2', '小管理', '123', '17611134691', '345678912@qq.com', '1517402865', '2', 'public/static/1.jpg', '1', '0', null, '1');
INSERT INTO `bw_user` VALUES ('3', 'user', '123456', '17611134692', '', '1517576107', '0', 'uploads\\20180206\\062dae95418d2ab1629eeae675c478f1.png', '1', '1', null, '0');
INSERT INTO `bw_user` VALUES ('4', '17611134695', '123456', '17611134695', '1421525520@qq.com', '1517576302', '0', '\\uploads\\20180213\\3367e7205100f9a18a2b595c354e5a4f.jpg', '1', '0', 'phone', '1');
INSERT INTO `bw_user` VALUES ('11', 'Mr_刘', 'qqTiLoUnyBbOw', '', '', '1517818755', '0', 'http://q.qlogo.cn/qqapp/100378832/EA03797468CFB0FFD5355DA19521390E/100', '2', '0', null, '0');
INSERT INTO `bw_user` VALUES ('13', 'PHP开发猿', 'we5czMMz0a9Lo', '', '', '1517878309', '0', 'http://tva2.sinaimg.cn/crop.8.0.133.133.180/006hI81pjw8ey0ax42u0dj3046046744.jpg', '1', '1', 'weibo', '0');
INSERT INTO `bw_user` VALUES ('14', '陈江', 'qqpBlzQsDUnxI', '', '', '1517921737', '0', '\\uploads\\20180206\\31a7869ed79e61911e4e1b991b784f78.png', '1', '0', 'qq', '0');
INSERT INTO `bw_user` VALUES ('17', '15106630449', '123', '15106630449', '', '1519826493', '0', 'public/static/1.jpg', '1', '0', 'phone', '0');
INSERT INTO `bw_user` VALUES ('36', '测试管理员', '123', '17611134695', '13425678@qq.com', '1519862962', '0', 'public/static/1.jpg', '1', '0', null, '1');

-- ----------------------------
-- Table structure for bw_user_role
-- ----------------------------
DROP TABLE IF EXISTS `bw_user_role`;
CREATE TABLE `bw_user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='用户角色对应关系';

-- ----------------------------
-- Records of bw_user_role
-- ----------------------------
INSERT INTO `bw_user_role` VALUES ('1', '1', '1');
INSERT INTO `bw_user_role` VALUES ('2', '2', '2');
INSERT INTO `bw_user_role` VALUES ('3', '4', '4');
INSERT INTO `bw_user_role` VALUES ('4', '15', '2');
INSERT INTO `bw_user_role` VALUES ('5', '16', '2');
INSERT INTO `bw_user_role` VALUES ('6', '18', '5');
INSERT INTO `bw_user_role` VALUES ('7', '19', '2');
INSERT INTO `bw_user_role` VALUES ('8', '20', '20');
INSERT INTO `bw_user_role` VALUES ('9', '26', '26');
INSERT INTO `bw_user_role` VALUES ('10', '27', '27');
INSERT INTO `bw_user_role` VALUES ('11', '28', '28');
INSERT INTO `bw_user_role` VALUES ('12', '29', '29');
INSERT INTO `bw_user_role` VALUES ('13', '30', '30');
INSERT INTO `bw_user_role` VALUES ('14', '31', '31');
INSERT INTO `bw_user_role` VALUES ('15', '32', '32');
INSERT INTO `bw_user_role` VALUES ('16', '33', '33');
INSERT INTO `bw_user_role` VALUES ('17', '34', '2');
INSERT INTO `bw_user_role` VALUES ('18', '35', '5');
INSERT INTO `bw_user_role` VALUES ('19', '36', '6');

-- ----------------------------
-- Table structure for bw_video
-- ----------------------------
DROP TABLE IF EXISTS `bw_video`;
CREATE TABLE `bw_video` (
  `vid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vname` varchar(50) NOT NULL COMMENT '视频文件名称',
  `vurl` varchar(200) DEFAULT NULL COMMENT '连接地址',
  `username` varchar(50) NOT NULL,
  `uid` int(10) DEFAULT NULL,
  `fengmian` varchar(100) DEFAULT NULL COMMENT '封面',
  `isdel` enum('0','1') DEFAULT '0' COMMENT '0-否  1-屏蔽',
  `info` varchar(255) DEFAULT NULL COMMENT '视频描述',
  `dcid` int(11) DEFAULT NULL COMMENT '大板块id',
  `xcid` int(11) DEFAULT NULL COMMENT '小板块id',
  `vplay` int(50) DEFAULT '0' COMMENT '浏览次数',
  `isvip` enum('0','1') DEFAULT '0' COMMENT '0 - 非vip  1- vip',
  `ctime` varchar(20) DEFAULT NULL COMMENT '上传时间',
  `vcishu` int(50) DEFAULT '0' COMMENT '下载次数',
  `title` varchar(50) DEFAULT NULL COMMENT '视频标题',
  `vtype` varchar(100) DEFAULT NULL COMMENT '视频类型',
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bw_video
-- ----------------------------
INSERT INTO `bw_video` VALUES ('4', '6.MP4', 'p3fczj25n.bkt.clouddn.com/6.MP4', '@o(︶︿︶)o 唉@', '7', 'http://p3fczj25n.bkt.clouddn.com/6.MP4?vframe/jpg/offset/1', '0', '12376457', '4', '6', '33', '0', '2018-02-02 16:30:15', '1', '哈哈', 'video/mp4');
INSERT INTO `bw_video` VALUES ('5', '8.mp4', 'p3fczj25n.bkt.clouddn.com/8.mp4', '@o(︶︿︶)o 唉@', '7', 'http://p3fczj25n.bkt.clouddn.com/8.mp4?vframe/jpg/offset/1', '0', 'qweqwdasd', '4', '6', '8', '0', '2018-02-02 17:06:36', '1', 'lalala', 'video/mp4');
INSERT INTO `bw_video` VALUES ('6', '2.mp4', 'p3fczj25n.bkt.clouddn.com/2.mp4', '@o(︶︿︶)o 唉@', '7', 'http://p3fczj25n.bkt.clouddn.com/2.mp4?vframe/jpg/offset/1', '0', '去问驱蚊器', '4', '6', '107', '1', '2018-02-02 17:40:31', '0', '123', 'video/mp4');
INSERT INTO `bw_video` VALUES ('7', '7.MP4', 'p3fczj25n.bkt.clouddn.com/7.MP4', '@o(︶︿︶)o 唉@', '9', 'http://p3fczj25n.bkt.clouddn.com/7.MP4?vframe/jpg/offset/1', '0', 'niuniu ', '3', '39', '53', '0', '2018-02-03 08:44:38', '14', 'qqqqq', 'video/mp4');
INSERT INTO `bw_video` VALUES ('9', '5.MP4', 'p3fczj25n.bkt.clouddn.com/5.MP4', '@o(︶︿︶)o 唉@', '9', 'http://p3fczj25n.bkt.clouddn.com/5.MP4?vframe/jpg/offset/1', '0', '这是一部非常经典的电影哦', '4', '6', '18', '0', '2018-02-03 11:26:00', '0', '呵呵', 'video/mp4');
INSERT INTO `bw_video` VALUES ('15', '5a7944678ba76mv.mp4', 'p3fczj25n.bkt.clouddn.com/5a7944678ba76mv.mp4', '@o(︶︿︶)o 唉@', '9', 'http://p3fczj25n.bkt.clouddn.com/5a7944678ba76mv.mp4?vframe/jpg/offset/1', '0', '啊施工工艺和家人通话请问请问', '4', '44', '25', '0', '2018-02-06 14:00:14', '1', '美女', 'video/mp4');
INSERT INTO `bw_video` VALUES ('14', '5a79444a4dd9amv.mp4', 'p3fczj25n.bkt.clouddn.com/5a79444a4dd9amv.mp4', '@o(︶︿︶)o 唉@', '9', 'http://p3fczj25n.bkt.clouddn.com/5a79444a4dd9amv.mp4?vframe/jpg/offset/1', '0', '其违纪即可消除vnzxcjkasojdjijsdcaksd啊ops的考试', '4', '44', '66', '0', '2018-02-06 13:59:45', '3', '美女', 'video/mp4');
INSERT INTO `bw_video` VALUES ('13', '5a7923ea527755.MP4', 'p3fczj25n.bkt.clouddn.com/5a7923ea527755.MP4', '17611134691', '3', 'http://p3fczj25n.bkt.clouddn.com/5a7923ea527755.MP4?vframe/jpg/offset/1', '0', '122333', '31', '43', '52', '1', '2018-02-06 11:41:48', '0', '123', 'video/mp4');
INSERT INTO `bw_video` VALUES ('16', '5a7be7a997d79', 'p3fczj25n.bkt.clouddn.com/5a7be7a997d79', 'chen1456', '14', 'http://p3fczj25n.bkt.clouddn.com/5a7be7a997d79?vframe/jpg/offset/1', '0', '这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫这是猫', '2', '40', '16', '0', '2018-02-08 14:01:28', '0', '猫猫', 'video/mp4');
INSERT INTO `bw_video` VALUES ('19', '熊.mp4', 'p3fczj25n.bkt.clouddn.com/熊.mp4', '超管', '1', 'http://p3fczj25n.bkt.clouddn.com/熊.mp4?vframe/jpg/offset/1', '0', '这是一只熊', '1', '41', '2', '1', '2018-02-08 14:26:56', '0', '熊大', 'video/mp4');
INSERT INTO `bw_video` VALUES ('20', '5a7bf270b1cac', 'p3fczj25n.bkt.clouddn.com/5a7bf270b1cac', '超管', '1', 'http://p3fczj25n.bkt.clouddn.com/5a7bf270b1cac?vframe/jpg/offset/1', '0', '360·逆转', '31', '43', '1', '0', '2018-02-08 14:47:23', '0', '这是啥呀', 'video/mp4');
INSERT INTO `bw_video` VALUES ('21', '5a7bf371bded3', 'p3fczj25n.bkt.clouddn.com/5a7bf371bded3', '超管', '1', 'http://p3fczj25n.bkt.clouddn.com/5a7bf371bded3?vframe/jpg/offset/1', '0', '6666', '4', '6', '1', '0', '2018-02-08 14:51:38', '0', '大红唇', 'video/mp4');
INSERT INTO `bw_video` VALUES ('22', '5a7bf3ed543ae', 'p3fczj25n.bkt.clouddn.com/5a7bf3ed543ae', '超管', '1', 'http://p3fczj25n.bkt.clouddn.com/5a7bf3ed543ae?vframe/jpg/offset/1', '0', '我的天哪', '28', '42', '6', '0', '2018-02-08 14:53:44', '0', '撩妹的主持人', 'video/mp4');
INSERT INTO `bw_video` VALUES ('23', '手视频_20180131093748.mp4', 'p3fczj25n.bkt.clouddn.com/手机QQ视频_20180131093748.mp4', '超管', '1', 'http://p3fczj25n.bkt.clouddn.com/手机QQ视频_20180131093748.mp4?vframe/jpg/offset/1', '0', '哈哈', '2', '40', '1', '0', '2018-02-15 10:44:34', '0', '小猫猫', 'video/mp4');
INSERT INTO `bw_video` VALUES ('24', '1.mp4', 'p3fczj25n.bkt.clouddn.com/1.mp4', '超管', '1', 'http://p3fczj25n.bkt.clouddn.com/1.mp4?vframe/jpg/offset/1', '0', '美', '2', '40', '5', '0', '2018-02-15 10:48:13', '1', '高冷艳丽', 'video/mp4');
INSERT INTO `bw_video` VALUES ('26', '1.mp4', 'p3fczj25n.bkt.clouddn.com/1.mp4', '超管', '1', 'http://p3fczj25n.bkt.clouddn.com/1.mp4?vframe/jpg/offset/1', '0', '天仙', '1', '41', '4', '0', '2018-02-15 11:01:04', '0', '雪域美女', 'video/mp4');
INSERT INTO `bw_video` VALUES ('28', 'w1.mp4', 'p3fczj25n.bkt.clouddn.com/w1.mp4', '超管', '1', 'http://p3fczj25n.bkt.clouddn.com/w1.mp4?vframe/jpg/offset/1', '0', '李白', '4', '44', '7', '0', '2018-02-16 20:27:23', '0', '酒剑仙李白', 'video/mp4');
INSERT INTO `bw_video` VALUES ('31', 'lp_仙人掌5分钟教你嘴炮.mp4', 'p3fczj25n.bkt.clouddn.com/lp_仙人掌5分钟教你嘴炮.mp4', '超管', '1', 'http://p3fczj25n.bkt.clouddn.com/lp_仙人掌5分钟教你嘴炮.mp4?vframe/jpg/offset/1', '0', '仙人掌5分钟教你嘴炮', '4', '44', '6', '0', '2018-02-17 18:38:27', '0', '仙人掌5分钟教你嘴炮', 'video/mp4');
INSERT INTO `bw_video` VALUES ('32', 'lp_1.mp4', 'p3fczj25n.bkt.clouddn.com/lp_1.mp4', '17611134691', '2', 'http://p3fczj25n.bkt.clouddn.com/lp_1.mp4?vframe/jpg/offset/1', '0', '德玛云操作', '4', '44', '10', '0', '2018-02-17 18:50:05', '0', '德玛云操作', 'video/mp4');
INSERT INTO `bw_video` VALUES ('34', 'w_2皮肤.mp4', 'p3fczj25n.bkt.clouddn.com/w_2皮肤.mp4', '17611134691', '2', 'http://p3fczj25n.bkt.clouddn.com/w_2皮肤.mp4?vframe/jpg/offset/1', '0', '皮肤盘点', '4', '6', '5', '0', '2018-02-17 19:25:06', '0', '皮肤盘点', 'video/mp4');
INSERT INTO `bw_video` VALUES ('35', 'dnf_使徒.mp4', 'p3fczj25n.bkt.clouddn.com/dnf_使徒.mp4', '17611134691', '2', 'http://p3fczj25n.bkt.clouddn.com/dnf_使徒.mp4?vframe/jpg/offset/1', '0', '真正的使徒', '4', '44', '7', '0', '2018-02-17 19:40:48', '0', '真正的使徒', 'video/mp4');
INSERT INTO `bw_video` VALUES ('36', 'qq_1.mp4', 'p3fczj25n.bkt.clouddn.com/qq_1.mp4', '17611134691', '2', 'http://p3fczj25n.bkt.clouddn.com/qq_1.mp4?vframe/jpg/offset/1', '0', '鹊桥飞车', '1', '41', '6', '0', '2018-02-18 17:32:59', '0', '鹊桥飞车', 'video/mp4');
INSERT INTO `bw_video` VALUES ('37', '100.mp4', 'p3fczj25n.bkt.clouddn.com/100.mp4', '超管', '1', 'http://p3fczj25n.bkt.clouddn.com/100.mp4?vframe/jpg/offset/1', '0', '6666', '28', '42', '1', '0', '2018-02-28 20:36:43', '0', '踢球', 'video/mp4');

-- ----------------------------
-- Table structure for bw_vip
-- ----------------------------
DROP TABLE IF EXISTS `bw_vip`;
CREATE TABLE `bw_vip` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `uname` varchar(50) DEFAULT NULL COMMENT '用户名',
  `ctime` int(25) DEFAULT NULL COMMENT '创建时间',
  `gqtime` int(11) DEFAULT NULL COMMENT '过期时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bw_vip
-- ----------------------------
INSERT INTO `bw_vip` VALUES ('5', '1', '超管', '1518951142', '1919555942');
INSERT INTO `bw_vip` VALUES ('6', '3', 'user', '1518951142', '1920419942');
INSERT INTO `bw_vip` VALUES ('7', '2', '18878222213', '1519636225', '1520932225');
INSERT INTO `bw_vip` VALUES ('8', '10', '17611134695', '1519638200', '1520934200');

-- ----------------------------
-- Table structure for bw_website
-- ----------------------------
DROP TABLE IF EXISTS `bw_website`;
CREATE TABLE `bw_website` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `wname` varchar(50) DEFAULT NULL,
  `wurl` varchar(50) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `number` varchar(25) DEFAULT NULL COMMENT '备案号',
  `email` varchar(50) DEFAULT NULL,
  `ban` varchar(11) DEFAULT NULL COMMENT '底部版权',
  `key` int(11) DEFAULT NULL COMMENT '是否关闭站点 0-开 1- 关闭',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bw_website
-- ----------------------------
INSERT INTO `bw_website` VALUES ('1', '博文尚美影视互联', 'http://bwsm.msinmon.cn', '只有你想不到的，没有你看不到的', '京ICP备00001号', 'liumeng9516@163.com', '©2018BWSM', '0');

-- ----------------------------
-- Table structure for codepay_order
-- ----------------------------
DROP TABLE IF EXISTS `codepay_order`;
CREATE TABLE `codepay_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pay_id` varchar(50) NOT NULL COMMENT '用户ID或订单ID',
  `money` decimal(6,2) unsigned NOT NULL COMMENT '实际金额',
  `price` decimal(6,2) unsigned NOT NULL COMMENT '原价',
  `type` int(1) NOT NULL DEFAULT '1' COMMENT '支付方式',
  `pay_no` varchar(100) NOT NULL COMMENT '流水号',
  `param` varchar(200) DEFAULT NULL COMMENT '自定义参数',
  `pay_time` bigint(11) NOT NULL DEFAULT '0' COMMENT '付款时间',
  `pay_tag` varchar(100) NOT NULL DEFAULT '0' COMMENT '金额的备注',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '订单状态',
  `creat_time` bigint(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `up_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `main` (`pay_id`,`pay_time`,`money`,`type`,`pay_tag`),
  UNIQUE KEY `pay_no` (`pay_no`,`type`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8 COMMENT='用于区分是否已经处理';

-- ----------------------------
-- Records of codepay_order
-- ----------------------------
INSERT INTO `codepay_order` VALUES ('1', 'admin', '0.10', '0.10', '1', '2018022621001004230229567128', null, '1519607719', '0', '2', '1519607755', '2018-02-26 09:15:55');
INSERT INTO `codepay_order` VALUES ('3', 'admin', '0.10', '0.10', '1', '2018022621001004100577776292', null, '1519608625', '0', '2', '1519608637', '2018-02-26 09:30:37');
INSERT INTO `codepay_order` VALUES ('39', '17807728196', '0.10', '0.10', '1', '2018022621001004100578998331', null, '1519616497', '0', '2', '1519617042', '2018-02-26 11:50:42');
INSERT INTO `codepay_order` VALUES ('43', '17807728196', '0.10', '0.10', '1', '2018022621001004230231496342', null, '1519617289', '0', '2', '1519617297', '2018-02-26 11:54:57');
INSERT INTO `codepay_order` VALUES ('45', '18878222213', '0.10', '0.10', '1', '2018022621001004230229677228', null, '1519624599', '0', '2', '1519624695', '2018-02-26 13:58:15');
INSERT INTO `codepay_order` VALUES ('65', '18878222213', '0.10', '0.10', '1', '2018022621001004100579429194', null, '1519628852', '0', '2', '1519628859', '2018-02-26 15:07:39');
INSERT INTO `codepay_order` VALUES ('80', '18878222213', '0.10', '0.10', '1', '2018022621001004100580293051', null, '1519629945', '0', '2', '1519630000', '2018-02-26 15:26:40');
INSERT INTO `codepay_order` VALUES ('90', '18878222213', '0.10', '0.10', '1', '2018022621001004230231927304', null, '1519630178', '0', '2', '1519630184', '2018-02-26 15:29:44');
INSERT INTO `codepay_order` VALUES ('101', '18878222213', '0.10', '0.10', '1', '2018022621001004100579279702', null, '1519630428', '0', '2', '1519630437', '2018-02-26 15:33:57');
INSERT INTO `codepay_order` VALUES ('104', '17807728169', '0.10', '0.10', '1', '2018022621001004100579071199', null, '1519630567', '0', '2', '1519630574', '2018-02-26 15:36:14');
INSERT INTO `codepay_order` VALUES ('111', '3', '0.10', '0.10', '1', '2018022621001004100579072308', null, '1519632596', '0', '2', '1519632605', '2018-02-26 16:10:05');
INSERT INTO `codepay_order` VALUES ('113', '3', '0.20', '0.20', '1', '2018022621001004100579491750', null, '1519632687', '0', '2', '1519632696', '2018-02-26 16:11:36');
INSERT INTO `codepay_order` VALUES ('114', '3', '0.30', '0.30', '1', '2018022621001004100578835237', null, '1519632879', '0', '2', '1519632889', '2018-02-26 16:14:49');
INSERT INTO `codepay_order` VALUES ('116', '3', '0.10', '0.10', '1', '2018022621001004230231530443', null, '1519633035', '0', '2', '1519633042', '2018-02-26 16:17:22');
INSERT INTO `codepay_order` VALUES ('153', '2', '0.10', '0.10', '1', '2018022621001004230231930327', null, '1519636219', '0', '2', '1519636225', '2018-02-26 17:10:25');
INSERT INTO `codepay_order` VALUES ('173', '10', '0.10', '0.10', '1', '2018022621001004230232525202', null, '1519637852', '0', '2', '1519638200', '2018-02-26 17:43:20');

-- ----------------------------
-- Table structure for codepay_user
-- ----------------------------
DROP TABLE IF EXISTS `codepay_user`;
CREATE TABLE `codepay_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `uid` int(10) NOT NULL COMMENT '用户ID',
  `user` varchar(100) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `money` decimal(6,2) NOT NULL DEFAULT '0.00' COMMENT '金额',
  `vip` int(1) NOT NULL DEFAULT '0' COMMENT '会员开通',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '会员状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of codepay_user
-- ----------------------------
INSERT INTO `codepay_user` VALUES ('2', '1', '17807728196', '0.20', '0', '0');
INSERT INTO `codepay_user` VALUES ('6', '3', '17807728169', '0.80', '0', '0');
