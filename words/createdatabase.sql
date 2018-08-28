	CREATE DATABASE IF NOT EXISTS book
	COLLATE 'gb2312_chinese_ci';
	
	USE book;
	CREATE TABLE IF NOT EXISTS users(
	username varchar(50) primary key,
	userpwd varchar(50),
	showname varchar(50));
	
	CREATE TABLE IF NOT EXISTS content (
	conid int auto_increment primary key,
	subject varchar(200) not null,
	words varchar(1000) not null,
	username varchar(50) not null,
	face varchar(50),
	email varchar(50),
	homepage varchar(50),
	createtime datetime,
	upperid int);
	
	insert into users values('admin','pass','admin');
