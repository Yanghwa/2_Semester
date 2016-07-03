/*
#Name: Junghwan Yang
#Date: June 13, 2016
#Purpose: InClass assignment03, update and delete query tests.
*/
#Fill in all the comments where you see ONLY a # in the script on a line, that is lines 7, 12, 17, 20, 30 and 47

#Complete the update and delete statements given at the end of this script


#
DROP DATABASE IF EXISTS dbdrinks;
CREATE DATABASE dbdrinks;
USE dbdrinks;

#
SET SQL_MODE = "STRICT_ALL_TABLES";
SET SQL_SAFE_UPDATES = 0;


#
DROP TABLE IF EXISTS tbldrinks;

#
CREATE TABLE tbldrinks(
	drink_name  VARCHAR(20) NOT NULL,
	cost		DEC(4,2) UNSIGNED NOT NULL,
	carbs		DEC(4,1) UNSIGNED NOT NULL,
	color		VARCHAR(10) NOT NULL,
	ice	        ENUM('Y','N') NOT NULL,
	calories	TINYINT UNSIGNED NOT NULL
);

#
INSERT INTO tbldrinks
VALUES
('Blackthorn', 3, 8.4, 'Yellow', 'Y', 33),
('Blue Moon', 2.5, 3.2, 'Blue', 'Y', 12),
('Oh My Gosh', 3.5, 8.6, 'Orange', 'Y', 35),
('Lime Fizz', 2.5, 5.4, 'Green', 'Y', 24),
('Kiss on the Lips', 5.5, 42.5, 'Purple', 'Y', 171),
('Hot Gold', 3.2, 32.1, 'Orange', 'N', 135),
('Lone Tree', 3.6, 4.2, 'Red', 'Y', 17),
('Greyhound', 4, 14, 'Yellow', 'Y', 50),
('Indian Summer', 2.8, 7.2, 'Brown', 'N', 30),
('Bull Frog', 2.6, 21.5, 'Tan', 'Y', 80),
('Soda and It', 3.8, 4.7, 'Red', 'N', 19),
('P', 3.8, 4.7, 'Red', 'N', 19),
('Pa', 3.8, 4.7, 'Red', 'N', 19);

#
SELECT * FROM tbldrinks;

########### UPDATES #######################


#1 Update the cost of Blue Moon to $3.50
#SELECT * FROM tbldrinks WHERE drink_name = 'Blue Moon' ;
UPDATE tbldrinks
SET cost = 3.50
WHERE drink_name = 'Blue Moon';

#SELECT * FROM tbldrinks WHERE drink_name = 'Blue Moon' ;

#2 Increase the cost by $1 for the drinks Oh My Gosh and Lime Fizz
#SELECT * FROM tbldrinks WHERE drink_name = 'Oh My Gosh' OR drink_name = 'Lime Fizz' ;
UPDATE tbldrinks
SET cost = cost + 1
WHERE drink_name = 'Oh My Gosh' OR drink_name = 'Lime Fizz' ;

#SELECT * FROM tbldrinks WHERE drink_name = 'Oh My Gosh' OR drink_name = 'Lime Fizz';

#3 Change the orange colored drinks to rust colored drinks 
#SELECT * FROM tbldrinks WHERE  color='orange';
UPDATE tbldrinks
SET color = 'rust'
WHERE color = 'orange';
#SELECT * FROM tbldrinks WHERE  color='orange';
#SELECT * FROM tbldrinks WHERE  color='rust';

#4a Set the ice field to N where it is NULL
#SELECT * FROM tbldrinks WHERE  ice IS NULL;
UPDATE tbldrinks
SET ice ='N'
WHERE ice IS NULL;
#SELECT * FROM tbldrinks WHERE  ice IS NULL;

#4b Set the ice field for all the drinks to Y
UPDATE tbldrinks
SET ice ='Y';
#SELECT * FROM tbldrinks WHERE  ice ='Y';
#5 Update the cost of all drinks that are less than or equal to $5 to $4.50
#SELECT * FROM tbldrinks WHERE  cost <= 5;
UPDATE tbldrinks
SET cost = 4.50
WHERE cost <= 5;
#SELECT * FROM tbldrinks WHERE  cost <= 5;

#6 Update the cost to $6 for all the drinks where carbs are greater than 20 and calories at least 80
#SELECT * FROM tbldrinks WHERE carbs > 20 AND calories >= 80;
UPDATE tbldrinks
SET cost = 6
WHERE carbs > 20 AND calories >= 80;
#SELECT * FROM tbldrinks WHERE carbs > 20 AND calories >= 80;
#7 Change the ice to N and color to red for Oh My Gosh
#SELECT * FROM tbldrinks WHERE drink_name='Oh My Gosh';
UPDATE tbldrinks
SET ice = 'N'
WHERE drink_name = 'Oh My Gosh';
UPDATE tbldrinks
SET color = 'red'
WHERE drink_name = 'Oh My Gosh';
#SELECT * FROM tbldrinks WHERE drink_name='Oh My Gosh';
#8 Set the color of Oh My Gosh by appending(add at end) 'green' to its color
#SELECT * FROM tbldrinks WHERE drink_name='Oh My Gosh';
UPDATE tbldrinks
SET color = CONCAT(color, "green") 
WHERE drink_name = 'Oh My Gosh';
#SELECT * FROM tbldrinks WHERE drink_name='Oh My Gosh';



############## DELETES ###############

#1 Delete all records with no ice
#SELECT * FROM tbldrinks WHERE ice='N';
DELETE FROM tbldrinks
WHERE ice = 'N';
#SELECT * FROM tbldrinks WHERE ice='N';
#2 Delete the drink 'p'
#SELECT * FROM tbldrinks WHERE drink_name='P';
DELETE FROM tbldrinks
WHERE drink_name = 'P';
#SELECT * FROM tbldrinks WHERE drink_name='P';

#3 Delete all rust and brown  drinks
#SELECT * FROM tbldrinks WHERE color = 'rust' OR color = 'brown';
DELETE FROM tbldrinks
WHERE color = 'rust' OR color = 'brown';
#SELECT * FROM tbldrinks WHERE color = 'rust' OR color = 'brown';

#4 Delete all drinks with null calories
#SELECT * FROM tbldrinks WHERE calories IS NULL;
DELETE FROM tbldrinks
WHERE calories IS NULL;
#SELECT * FROM tbldrinks WHERE calories IS NULL;
#5 Delete all records 
#SELECT * FROM tbldrinks;
DELETE FROM tbldrinks;
#SELECT * FROM tbldrinks;




