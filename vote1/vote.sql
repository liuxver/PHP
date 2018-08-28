create database if not exists vote
collate 'gb2312_chinese_ci';

use vote;
create table if not exists voteitem(
	id int auto_increment primary key,
	item varchar(50),
	votecount int
);


create table if not exists voteip(
	ip varchar(50) primary key
);
