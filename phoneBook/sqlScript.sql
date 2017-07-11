create database if not exists phonebook1 ;
use database phonebook1;
create table if not exists CREATE TABLE `phonebook_table` (
  `id` int(11) NOT NULL auto_increment,
  `number` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL
,primary key(id));