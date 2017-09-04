/*
Navicat MySQL Data Transfer

Source Server         : LH
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : tp_blog_com

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-08-01 18:10:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin_log`;
CREATE TABLE `blog_admin_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_info` varchar(255) DEFAULT NULL,
  `log_time` int(11) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `adm_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_admin_log
-- ----------------------------

-- ----------------------------
-- Table structure for blog_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin_user`;
CREATE TABLE `blog_admin_user` (
  `adm_id` int(11) NOT NULL AUTO_INCREMENT,
  `adm_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `last_time` int(11) DEFAULT NULL,
  `last_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_admin_user
-- ----------------------------
INSERT INTO `blog_admin_user` VALUES ('1', 'admin', '202cb962ac59075b964b07152d234b70', null, null, '');

-- ----------------------------
-- Table structure for blog_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `art_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) unsigned DEFAULT '0',
  `title` varchar(120) NOT NULL DEFAULT '' COMMENT '标题',
  `short_desc` varchar(255) DEFAULT '',
  `author` varchar(30) NOT NULL DEFAULT '' COMMENT '作者',
  `content` text COMMENT '内容',
  `img` varchar(255) DEFAULT NULL COMMENT '图片',
  `read_num` int(11) unsigned NOT NULL DEFAULT '0',
  `click_num` int(11) NOT NULL DEFAULT '0' COMMENT '点赞量',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_top` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否推介（1  推荐：0不推荐）',
  `add_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`art_id`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('143', '1', '你永远不知道你多美', '我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到他，依靠他，将一生交付给他。做他的妻子，他孩子的母亲，为他做饭，洗衣服，缝一颗掉了的纽扣。然后，我们一起在时光中变老。', '鱼', '茫茫人海中， 我遇见了你，  你是那么的美丽，但是你自己却浑然不知', '2016-07-13/5785eb33a458e.jpg', '3', '0', '0', '1', '1468394291');
INSERT INTO `blog_article` VALUES ('150', '1', '美丽姑娘', '男人都是孩子，需要用一生时间来长大。女人都想当孩子，却最擅长的角色是妈妈。恋爱一开始，是两个孩子之间的游戏，到后来，成了大人和孩子之间的游戏。恋爱这回事，总要有一个人先长大，对另一半多些包容和宠溺。而通常来看：谁更心软，谁就先长大', '鱼', '你是我见过最美丽的姑娘', '2016-07-13/5786182d9e361.JPG', '57', '13', '0', '1', '1468405805');
INSERT INTO `blog_article` VALUES ('153', '1', '你永远不知道你多美', '有时候不是我不理你，其实我也想你了，只是我不知道该对你说什么。不管过去如何，过去的已经过去，最好的总在未来等着你。当我们懂得珍惜平凡的幸福的时候，就已经成了人生的赢家。Nothing is as sweet as you再没什么，能甜蜜如你。我以为只要很认真的喜欢就能打动一个人', '鱼', '茫茫人海里遇见一个人有多难？有时候很难，几十亿人，一生也难见一次。有时却很容易，人群中第一眼就能把他认出来。我们总在不设防的时候喜欢上一些人。没什么原因，也许只是一个温和的笑容，一句关切的问候。可能未曾谋面，可能志趣并不相投，可能不在一个高度，却牢牢地放在心上了。冥冥中该来则来，无处可逃，就好像喜欢一首歌，往往就因为一个旋律或一句打动你的歌词。喜欢或者讨厌，是让人莫名其妙的事情。 <', '2016-07-13/5785eb33a458e.jpg', '2', '0', '0', '1', '1468394291');
INSERT INTO `blog_article` VALUES ('154', '1', '有一种思念，是淡淡的幸福,一个心情一行文字', '男人都是孩子，需要用一生时间来长大。女人都想当孩子，却最擅长的角色是妈妈。恋爱一开始，是两个孩子之间的游戏，到后来，成了大人和孩子之间的游戏。恋爱这回事，总要有一个人先长大，对另一半多些包容和宠溺。而通常来看：谁更心软，谁就先长大', '鱼', '可能我不懂得煽情，我学不会安慰别人，每次看到别人伤心，我总是生硬的问句怎么了，别想太多了。我学不会思念，即使很长时间没见，我也不会主动打电话发短信说句我好想你之类的话。每次想要为别人做什么的时候还总是态度强硬闹得不愉快，可这就是我的方式，如果爱我，请接受这样的我。', '2016-07-13/5785ecdd8450a.jpg', '1', '0', '0', '0', '1468394717');
INSERT INTO `blog_article` VALUES ('155', '1', '有一种思念，是淡淡的幸福,一个心情一行文字', '趁我们都还年轻,多走几步路，多欣赏下沿途的风景，不要急于抵达目的地而错过了流年里温暖的人和物；趁我们都还年轻，多说些浪漫的话语，多做些幼稚的事情，不要嫌人笑话错过了生命中最美好的片段和场合；趁我们都还年轻，把距离缩短，把时间延长。趁我们都还年轻，多做些我们想要做的任何事', '鱼', '要我们真正相爱，哪怕只有一天，一个小时，我们就不应该再有一刀两断的日子。也许你会在将来不爱我，也许你要离开我，但是我永远对你负有责任，就是你的一切苦难就永远是我的。我觉得我爱了你了，从此以后，不管什么时候，我都不能对你无动于衷', '2016-07-13/5786182d9e361.JPG', '4', '0', '0', '1', '1468405805');
INSERT INTO `blog_article` VALUES ('162', '1', 'woshi**', '晟宇之力，天下无敌，晟宇一出，谁干不服！', 'lsy', '', null, '3', '0', '0', '1', '1469174074');
INSERT INTO `blog_article` VALUES ('170', '1', '恰似一群太监上青楼。', '不要问我过的好不好,你又不是不知道我的支付宝', 'admin', '<p>不要问我过的好不好,你又不是不知道我的支付宝不要问我过的好不好,你又不是不知道我的支付宝不要问我过的好不好,你又不是不知道我的支付宝不要问我过的好不好,你又不是不知道我的支付宝不要问我过的好不好,你又不是不知道我的支付宝不要问我过的好不好,你又不是不知道我的支付宝不要问我过的好不好,你又不是不知道我的支付宝不要问我过的好不好,你又不是不知道我的支付宝不要问我过的好不好,你又不是不知道我的支付宝不要问我过的好不好,你又不是不知道我的支付宝不要问我过的好不好,你又不是不知道我的支付宝不要问我过的好不好,你又不是不知道我的支付宝不要问我过的好不好,你又不是不知道我的支付宝不要问我过的好不好,你又不是不知道我的支付宝不要问我过的好不好,你又不是不知道我的支付宝不要问我过的好不好,你又不是不知道我的支付宝</p>', null, '14', '20', '0', '0', '1469587792');

-- ----------------------------
-- Table structure for blog_category
-- ----------------------------
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `cat_name` varchar(45) NOT NULL DEFAULT '‘’' COMMENT '栏目名',
  `sort` smallint(5) NOT NULL DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='博文栏目';

-- ----------------------------
-- Records of blog_category
-- ----------------------------
INSERT INTO `blog_category` VALUES ('1', '旅游', '0');
INSERT INTO `blog_category` VALUES ('2', '网站建设', '50');
INSERT INTO `blog_category` VALUES ('3', '图书推荐', '50');
INSERT INTO `blog_category` VALUES ('4', '慢生活', '500');
INSERT INTO `blog_category` VALUES ('6', '鱼宝宝', '50');
INSERT INTO `blog_category` VALUES ('7', '丁冰', '50');
INSERT INTO `blog_category` VALUES ('8', '你好  冰哥', '50');
INSERT INTO `blog_category` VALUES ('9', '冰冰', '50');
INSERT INTO `blog_category` VALUES ('10', '陈中原', '50');
INSERT INTO `blog_category` VALUES ('11', '冰哥好！', '1');

-- ----------------------------
-- Table structure for blog_click_log
-- ----------------------------
DROP TABLE IF EXISTS `blog_click_log`;
CREATE TABLE `blog_click_log` (
  `click_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(30) NOT NULL DEFAULT '',
  `art_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`click_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_click_log
-- ----------------------------
INSERT INTO `blog_click_log` VALUES ('3', '0.0.0.0', '150');

-- ----------------------------
-- Table structure for blog_comment
-- ----------------------------
DROP TABLE IF EXISTS `blog_comment`;
CREATE TABLE `blog_comment` (
  `comm_id` int(11) NOT NULL AUTO_INCREMENT,
  `comm_title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  `art_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`comm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_comment
-- ----------------------------
INSERT INTO `blog_comment` VALUES ('1', '恩爱发热袜发热无法温热,而为爱人分为。', '真的是一片美好文章', '1469683625', '150');
INSERT INTO `blog_comment` VALUES ('2', '股份家乐福卡发货威', '神作', '1469683743', '150');
INSERT INTO `blog_comment` VALUES ('3', '尔奇特提供惹他果然', '任务而非', '1469683797', '150');
INSERT INTO `blog_comment` VALUES ('4', '尔奇特提供惹他果然', '任务而非', '1469683852', '150');
INSERT INTO `blog_comment` VALUES ('5', '日体育和体育人间互通也', '二个人是通过', '1469683943', '150');
INSERT INTO `blog_comment` VALUES ('6', '郭egress', '供热个人', '1469686133', '150');
INSERT INTO `blog_comment` VALUES ('7', '郭egress', '供热个人', '1469686180', '150');
INSERT INTO `blog_comment` VALUES ('12', '测试标题', '测试内容', '1469704913', '150');
INSERT INTO `blog_comment` VALUES ('13', '测试标题', '测试内容', '1469705064', '150');
INSERT INTO `blog_comment` VALUES ('14', '测试', '测试', '1469705204', '150');
INSERT INTO `blog_comment` VALUES ('15', '测试', '测试', '1469705213', '150');
INSERT INTO `blog_comment` VALUES ('16', '测试', '测试', '1469705362', '150');
INSERT INTO `blog_comment` VALUES ('17', '测试222', '测试22222', '1469705369', '150');
INSERT INTO `blog_comment` VALUES ('18', '美丽姑娘', '美丽姑娘美丽姑娘', '1469705431', '150');
INSERT INTO `blog_comment` VALUES ('19', '美丽的姑娘', '你是我见过最美丽的姑娘', '1469705506', '150');

-- ----------------------------
-- Table structure for blog_config
-- ----------------------------
DROP TABLE IF EXISTS `blog_config`;
CREATE TABLE `blog_config` (
  `cfg_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cfg_name` varchar(30) DEFAULT '',
  `cfg_value` varchar(512) DEFAULT '',
  PRIMARY KEY (`cfg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_config
-- ----------------------------
INSERT INTO `blog_config` VALUES ('1', 'website_title', '个人技术博客');
INSERT INTO `blog_config` VALUES ('2', 'keywords', '设计, 开发, 前端资源, CSS, JavaScript, Ajax, Html5');
INSERT INTO `blog_config` VALUES ('3', 'website_desc', '『前端迷』，分享前端设计资源和前端开发技术的专业博客！');
INSERT INTO `blog_config` VALUES ('4', 'email', 'itbing@sina.cn');
INSERT INTO `blog_config` VALUES ('5', 'linkman', 'BING');
INSERT INTO `blog_config` VALUES ('6', 'linkmobile', '15035574759');
INSERT INTO `blog_config` VALUES ('7', 'icp', '12313213123');
INSERT INTO `blog_config` VALUES ('8', 'address', '中国 • 北京');

-- ----------------------------
-- Table structure for blog_friend_link
-- ----------------------------
DROP TABLE IF EXISTS `blog_friend_link`;
CREATE TABLE `blog_friend_link` (
  `link_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `link_logo` varchar(255) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_friend_link
-- ----------------------------
INSERT INTO `blog_friend_link` VALUES ('29', '百度', 'http://www.baidu.com', '', null);
INSERT INTO `blog_friend_link` VALUES ('30', '刘宇的微博', '热武器', '', null);
INSERT INTO `blog_friend_link` VALUES ('31', '刘宇的微博', '123456', '', null);
INSERT INTO `blog_friend_link` VALUES ('32', '刘宇的微博', '热武器', '', null);

-- ----------------------------
-- Table structure for blog_reply
-- ----------------------------
DROP TABLE IF EXISTS `blog_reply`;
CREATE TABLE `blog_reply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `comm_id` int(11) DEFAULT NULL,
  `reply_text` text,
  `reply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_reply
-- ----------------------------
INSERT INTO `blog_reply` VALUES ('1', '1', '好', null);
INSERT INTO `blog_reply` VALUES ('2', '1', '很好', null);
INSERT INTO `blog_reply` VALUES ('3', '1', '非常好', null);
INSERT INTO `blog_reply` VALUES ('4', '2', '不好', null);
INSERT INTO `blog_reply` VALUES ('5', '18', '发生地方就死定了', '1469706640');
INSERT INTO `blog_reply` VALUES ('6', '19', '当然啦', '1469706855');
INSERT INTO `blog_reply` VALUES ('7', '19', '当然啦2222', '1469706860');
INSERT INTO `blog_reply` VALUES ('8', '13', '好爱好', '1469706887');
INSERT INTO `blog_reply` VALUES ('9', '13', '好爱好55555', '1469706891');
INSERT INTO `blog_reply` VALUES ('10', '19', '反倒是反倒是', '1469707677');
