-- 创建个用户表，包含管理员、和普通注册用户
CREATE TABLE `user`(
	`id` int primary key auto_increment,	-- 主键标示
	`nick_name` varchar(50) not null default '无名氏',	-- 登陆昵称，不允许为空
	`telephone` varchar(20) not null default '123456789',	-- 用户的电话，登陆的账户
	`email` varchar(100) not null default '',	-- 用户的邮箱地址，也可作为登陆
	`password` varchar(100) not null default 'e10adc3949ba59abbe56e057f20f883e', -- 默认是‘123456’的md5值
	`role` enum('admin', 'receive', 'normal') default 'normal', 	-- 用户角色，管理员或普通注册用户，默认是普通用户
	`is_allow_login` enum('yes', 'no') default 'yes', 	-- 默认允许登陆	 
	`last_login_time` varchar(20)	-- 记录了本条记录的更新时间，UNIX时间戳
);
INSERT INTO `user`(`nick_name`, `telephone`, `email`, `role`)
VALUES('admin', '123456', 'admin@qq.com', 'admin');

-- 创建订单表
CREATE TABLE `order`(
	`id` int primary key auto_increment,	-- 主键标示
	`user_normal_id` int not null default 1,	-- 普通网站注册用户的user_id
	`room_count` int not null default 0,	-- 预定房间的数量
	`start_time` varchar(20), -- 记录本订单的开始时间
	`end_time` varchar(20),	-- 记录本订单的结束时间
	`user_receive_id` int not null default 1, 	-- 接待人员user_ID
	`create_time` varchar(20)	-- 订单对应的该条记录的更新时间
);

-- 创建房间表
CREATE TABLE `room`(
	`id` int primary key auto_increment,	-- 主键标示
	`room_count` int not null default 0, --	该类型的房间总数量
	`price` int not null default 100, 	-- 房间的价格，单位元
	`area_mearsure` int not null default 0, 	-- 房间的平米数
	`picture` varchar(200) default '',	-- 房间的展示图
	`category` enum('shortcut', 'cheap', 'meeting', 'business') default 'shortcut', 	-- 房间类型
	`status` enum('available', 'unavailable') default 'available',	-- 房间此刻所属状态 available,unavailable
	`create_time` varchar(20)	-- 记录更新时间 
);

-- 留言评价表
CREATE TABLE `note`(
	`id` int primary key auto_increment,  -- 主键标示
	`user_normal_id` int not null default 1, -- 评价用户的user_id
	`content` varchar(400) not null default '',	-- 评价内容
	`create_time` varchar(20)	-- 记录更新时间
);

-- 新闻列表
CREATE TABLE `news_list`(
	`id` int primary key auto_increment, 	-- 主键标示
	`user_admin_id` int not null default 1, 	-- 添加新闻内容的管理员Id
	`title` varchar(200) not null default '无题', 	-- 新闻的标题
	`content` text not null, 	 -- 新闻内容
	`create_time` varchar(20) 	-- 记录的更新时间
);