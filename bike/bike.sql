create database if not exists bike collate 'gb2312_chinese_ci';

use bike;
create table customer(
 	number int(15) primary key,
 	name varchar(20),
 	phone varchar(11) not null,
 	records varchar(1000) not null
 );

create table user(
	username varchar(20) primary key not null,
	password varchar(20)
);

insert into user values('444','1234');
