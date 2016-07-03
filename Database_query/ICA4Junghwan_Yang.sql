/*
#Name: Junghwan Yang
#Date: June 14, 2016
#Purpose: InClass assignment04, summarize every lectures.
*/

#Follwing the script, solve the problems

/*
Please write your name, date and purpose of the script at the head
Create a database 'dbinfo',dropping one if it exists
Create a table 'tblinfo' to store first and last name of people. Your table should have a primary key 
column 'id' with AUTO_INCREMENT and two other atomic columns 'first_name' and 'last_name'. All three
fields do not allow null value
Code any SET statements that are required
*/

#create database 
DROP DATABASE IF EXISTS dbinfo;
CREATE DATABASE dbinfo;
USE dbinfo;

SET SQL_MODE = "STRICT_ALL_TABLES";
SET SQL_SAFE_UPDATES = 0;

#create table
DROP TABLE IF EXISTS tblinfo;
CREATE TABLE tblinfo
(
	id 				INT		 	PRIMARY KEY AUTO_INCREMENT,
    first_name	 	VARCHAR(20) NOT NULL, 
    last_name 		VARCHAR(20) NOT NULL
);

/* 
Try out each of the INSERT statements below. Comment out the ones that do not work.
Write an explanation for why they do not work. Why does the one with null id work?
*/


# This data id is null, but primary key can't be null, so AUTO_INCREMENT makes this id 1, so this query works
INSERT INTO tblinfo(id, first_name,last_name)
VALUES(NULL, 'Anju', 'Chawla');
/*
This query doesn't work. 
id can't be null because of id setted as a primary key, so AUTO_INCREMENT changes 'Anju''s id to 1, id=1 is duplicated here

INSERT INTO tblinfo(id, first_name,last_name)
VALUES(1, 'Greg', 'Rodrigo');
*/

#There are every necessary values, and id is not duplicated, so this query works.
INSERT INTO tblinfo
VALUES(2, 'Jaret', 'Wright');

#This query needs id, but AUTO_INCREMENT makes this id become 3, so this query works.
INSERT INTO tblinfo( first_name,last_name)
VALUES('Douglas', 'Burton');

#There are every necessary values, and id is not duplicated, so this query works.
INSERT INTO tblinfo(id, first_name,last_name)
VALUES(99, 'Chris', 'Hepburn');

# This data id is null, but primary key can't be null, so AUTO_INCREMENT makes this id 100, so this query works
INSERT INTO tblinfo(id, first_name,last_name)
VALUES(null, 'Ross', 'Bigelow'); 
/*
This query doesn't work. 
The information about "Ross" has id=100, because AUTO_INCREMENT put 99+1 to the value of id;it's primary key->can't be null, so id=100 is duplicated.
;;Ross has id=100, and below query try to create column with id=100 -> call error 

INSERT INTO tblinfo(id, first_name,last_name)
VALUES(100, 'Rich', 'Freeman');
*/


