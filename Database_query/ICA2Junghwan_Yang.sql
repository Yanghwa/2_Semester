#Name: Junghwan Yang
#Date: May 30, 2016
#Purpose: For In class assignment2, use select command to solve 14 demands in a docx file


#drop dbdrinks database if it exists, create a new one and use it

DROP DATABASE IF EXISTS dbdrinks;
CREATE DATABASE dbdrinks;
USE dbdrinks;
#to enforce the NOT NULL directive
SET sql_mode = "STRICT_ALL_TABLES";
#create a table named drinks to store drink information; name, cost, carbs, color, ice, calories
CREATE TABLE drinks
(
	drink_name 	VARCHAR(20) NOT NULL,
    cost 		DECIMAL(4,2) UNSIGNED NOT NULL,
    carbs		DECIMAL(4,1) UNSIGNED NOT NULL,
    color		VARCHAR(10) NOT NULL,
    ice 		ENUM('Y', 'N') NOT NULL,
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
("Soda and It", 	 3.80,  4.7, 	"Red", 		"N", 19),
("PPPPPPP", 		 3.80,  4.7, 	"Red", 		"N", 19);

#1)Select the drinks that have name starting with an ‘L’
SELECT * FROM drinks
WHERE drink_name LIKE "L%";

#2)Select drink name of all the drinks that have more than 15 carbs
SELECT * FROM drinks
WHERE carbs >= 15;

#3)Select all drinks that have no calorie information
SELECT * FROM drinks
WHERE calories IS NULL;

#4)Select all drinks that have a defined cost
SELECT * FROM drinks
WHERE cost IS NOT NULL;

#5)Select the name, cost, carbs and calories of all drinks that have ‘go’ embedded in their name 
SELECT drink_name, cost, carbs, calories FROM drinks
WHERE drink_name LIKE "%go%";

#6)Select the drink name, cost, carbs and calories of all drinks that end with the letter ‘n’
SELECT drink_name, cost, carbs, calories FROM drinks
WHERE drink_name LIKE "%n";

#7)Using the relational operators and the AND verb, select the name and cost of all the drinks that have calories in the range 30 to 60, inclusive
SELECT drink_name, cost FROM drinks
WHERE calories >= 30 AND calories <= 60;

#8)Select all the information of drinks that begin with the letters G through O using the BETWEEN verb 
SELECT * FROM drinks
WHERE LEFT(drink_name, 1) BETWEEN 'G' AND 'O';

#9)Select all the drink names that do not have ice
SELECT drink_name FROM drinks
WHERE ice = "N";

#10)Use the OR verb to select all drinks that are either yellow or orange 
SELECT * FROM drinks 
WHERE color = "yellow" OR color = "orange";

#11)Repeat the above query using the IN verb
SELECT * FROM drinks 
WHERE color IN ("yellow", "orange");

#12)Use the NOT IN verb to select all drinks that are neither yellow nor orange. 
SELECT * FROM drinks 
WHERE color NOT IN ("yellow", "orange");

#13)Write a select to display all drinks with a cost greater than $3 and carbs less than 15 
SELECT * FROM drinks 
WHERE cost > 3 AND carbs < 15;

#14)Write a select statement to display the first 5 records of the table
SELECT * FROM drinks 
LIMIT 0, 5;