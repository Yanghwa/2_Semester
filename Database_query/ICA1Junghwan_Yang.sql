#Name: Junghwan Yang
#Date: May 9, 2016
#Purpose: Create a drink database, a table therein to store drink; name, cost, carbs, color, ice, calories


#drop dbdrinks database if it exists, create a new one and use it

DROP DATABASE IF EXISTS dbdrinks;
CREATE DATABASE dbdrinks;
USE dbdrinks;
#to enforce the NOT NULL directive
SET sql_mode = "STRICT_ALL_TABLES";
#create a table named drinks to store drink information; name, cost, carbs, color, ice, calories
CREATE TABLE drinks
(
	drink_name 	VARCHAR(30) NOT NULL,
    cost 		DECIMAL(3,2) NOT NULL,
    carbs		DECIMAL(3,1) NOT NULL,
    color		VARCHAR(10) NOT NULL,
    ice 		CHAR(1) NOT NULL,
    calories 	TINYINT UNSIGNED NOT NULL
); 

#insert data what are given
INSERT INTO drinks(drink_name, cost, carbs, color, ice, calories)
VALUES
("Blackthorn",		 3, 	8.4, 	"Yellow",	"Y", 33),
("Blue Moon", 		 2.50,  3.2, 	"Blue", 	"Y", 12),
("Oh My Gosh", 		 3.50,  8.6, 	"Orange", 	"Y", 35),
("Lime Fizz", 		 2.50,  5.4, 	"Green", 	"Y", 24),
("Kiss on the Lips", 5.50,  42.5, 	"Purple", 	"Y", 171),
("Hot Gold", 		 3.20,  32.1, 	"Orange", 	"N", 135),
("Lone Tree", 		 3.60,  4.2, 	"Red", 		"Y", 17),
("Greyhound", 		 4.5, 	14, 	"Yellow", 	"Y", 50),
("Indian Summer", 	 2.80,  7.2, 	"Brown", 	"N", 30),
("Bull Frog", 	 	 2.60,  21.5, 	"Tan", 		"Y", 80),
("Soda and It", 	 3.80,  4.7, 	"Red", 		"N", 19);

SELECT * FROM drinks;