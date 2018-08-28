create database if not exists twoshou;

use twoshou;
create table if not exists bulletin(
	id INT  AUTO_INCREMENT  PRIMARY KEY,#公告编号Id INT  AUTO_INCREMENT  PRIMARY KEY,
	title varchar(50),#公告题目
	content varchar(1000),#公告内容
	posttime datetime,#提交时间
	poster varchar(50)#提交人
) character set = utf8;
create table if not exists goodstype(
	typeid int auto_increment primary key,#商品类型编号
	typename varchar(100)#商品类型
) character set = utf8;

create table if not exists goods(
	goodsid int auto_increment primary key,#商品编号
	typeid int,#商品分类编号
	saleorbuy tinyint,#交易类型  1表示转让 2 表示求购
	goodsname varchar(50),#商品名称
	goodsdetail varchar(1000),#商品说明
	imageurl varchar(100),#图片链接地址
	price varchar(50),#转让价格
	starttime datetime,#开始时间
	oldnew varchar(50),#新旧程度
	invoice varchar(50),#是否有发票
	repaired varchar(50),#是否保修
	carriage varchar(50),#运费
	paymode varchar(50),#支付方式
	delivermode varchar(50),#送货方式
	isover tinyint,#是否结束
	ownerid varchar(50),#卖家用户名
	clicktimes int,#点击次数
	foreign key(typeid) references goodstype(typeid) 
) character set = utf8;

create table if not exists users(
	userid varchar(50) primary key,#用户名
	userpassword varchar(50),#用户密码
	name varchar(50),#用户姓名
	sex tinyint,#性别
	address varchar(500),#地址
	postcode varchar(50),#邮编
	email varchar(50),#电子邮件地址
	telephone varchar(100),#固定电话
	mobile varchar(50),#移动电话
	usertype tinyint#用户类型 0表示普通用户 1表示管理员
) character set = utf8;

insert into users(userid,userpassword,usertype) values('444','1234',1)
