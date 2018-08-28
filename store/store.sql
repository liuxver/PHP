drop database store;
create database store;
use store;
create table if not exists goodstype(
	typeid int auto_increment primary key,#商品类型编号
	typename varchar(100)#商品类型
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

create table if not exists goods(
	goodsid int auto_increment primary key,#商品编号
	typeid int,#商品分类编号
	goodsname varchar(50),#商品名称
	goodsdetail varchar(1000),#商品说明
	imageurl varchar(100),#图片链接地址
	price varchar(50),#转让价格
	starttime datetime,#开始时间
	num int,
	clicktimes int,#点击次数
	foreign key(typeid) references goodstype(typeid),
	check(num>=0)
) character set = utf8;

create table if not exists sell(
	id int auto_increment primary key,
	userid varchar(50),
	goodsid int,
	foreign key(userid) references users(userid),
	foreign key(goodsid) references goods(goodsid)
);

delimiter //
create trigger buy
after insert on sell
for each row 
begin
update goods set goods.num=goods.num-1 where new.goodsid=goods.goodsid;
end;//
delimiter ;

delimiter //
create trigger disbuy
after delete on sell
for each row 
begin
update goods set goods.num=goods.num+1 where old.goodsid=goods.goodsid;
end;//
delimiter ;

insert into users(userid,userpassword,usertype) values('444','1234',1);