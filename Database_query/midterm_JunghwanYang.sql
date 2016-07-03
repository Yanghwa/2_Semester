/*
#Name: Junghwan Yang
#Date: June 20, 2016
#Purpose: mid term test, Database and table for books.
*/
# (1) Create a database dbbooks(delete one if already exists) and use it  
DROP DATABASE IF EXISTS dbbooks;
CREATE DATABASE dbbooks;
USE dbbooks;

SET SQL_MODE = "STRICT_ALL_TABLES";
SET SQL_SAFE_UPDATES = 0;

# (2) Create a table called tblbooks(delete one if it already exists)
DROP TABLE IF EXISTS tblbooks;
CREATE TABLE tblbooks
(
	title_id	CHAR(6) NOT NULL,
	book_title  VARCHAR(80) NOT NULL,
	book_type 	VARCHAR(20) NOT NULL,
	pub_id		CHAR(4) NOT NULL,
	book_price	DECIMAL(5,2) NOT NULL DEFAULT 0,
	ytd_sales	INT NOT NULL DEFAULT 0,
	pub_date	DATE #Note:date is provided in format yyyy-mm-dd
);
# (3) DISPLAY THE DESCRIPTION OF THE TABLE TO ENSURE ALL REQUIREMENTS OF THE COLUMNS ARE MET 
DESC tblbooks;

/* (4) Here are the 18 records to be inserted in the table. The first 16 have all the fields. The last 2 do not have a book_price, ytd_sales and pub_date - these fields
will be automatically populated with the default values. So use two insert statements, one to insert the first 16 records and the second one to insert the last 2 records. 
You can copy and paste the table data in your insert statements to save time. Ensure you use the correct syntax.
*/
INSERT INTO tblbooks
VALUES 
	('PC8888', 'Secrets of Silicon Valley', 'popular_comp', '1389', 40.00,  4095, '1998-06-12'),

	('BU1032', 'The Busy Executive\'s Database Guide', 'business', '1389', 29.99, 4000,'1999-06-10'),

	('PS7777', 'Emotional Security: A New Algorithm', 'psycho', '0736', 17.99,  3336,'1998-12-10'),

	('PS3333', 'Prolonged Data Deprivation: Four Case Studies', 'psycho', '0736', 29.99, 407, '2000-12-31'),

	('BU1111', 'Cooking with Computers: Surreptitious Balance Sheets', 'business', '1389', 21.95, 3876, '1999-02-10'),

	('MC2222', 'Silicon Valley Gastronomic Treats', 'mod_cook', '0877', 29.99,  203, '1998-06-09'),

	('TC7777', 'Sushi, Anyone?', 'trad_cook', '0877', 29.99,  4095,'2002-05-31'),

	('TC4203', 'Fifty Years in Buckingham Palace Kitchens', 'trad_cook', '0877', 21.95,  15096,'2008-02-12'),

	('PC1035', 'But Is It User Friendly?', 'popular_comp', '1389', 42.95,  8780,'1998-06-30'),

	('BU2075', 'You Can Combat Computer Stress!', 'business', '0736', 12.99, 18722, '2000-11-19'),

	('PS2091', 'Is Anger the Enemy?', 'psycho', '0736', 21.95,  2045, '1998-06-15'),

	('PS2106', 'Life Without Fear', 'psycho', '0736', 17.00, 111, '2003-10-05'),

	('MC3021', 'The Gourmet Microwave', 'mod_cook', '0877', 12.99, 22246,'2005-06-18'),

	('TC3218', 'Onions, Leeks, and Garlic: Cooking Secrets of the Mediterranean', 'trad_cook', '0877', 40.95,  375, '1998-10-21'),

	('BU7832', 'Straight Talk About Computers', 'business', '1389', 29.99, 4095, '2004-07-22'),

	('PC9999', 'Net Etiquette', 'popular_comp', '1389', 59.99, 2011,'2002-10-26') ;
    
INSERT INTO tblbooks(title_id, book_title, book_type, pub_id)
VALUES 
	('PS1372', 'Computer Phobic and Non-Phobic Individuals: Behavior Variations', 'psycho', '0736'), 

	('PC1234','Intro to Java','popular_comp', '1111');
    
#(5) DISPLAY ALL THE RECORDS OF THE TABLE
SELECT * FROM tblbooks;

#(6) Write an Alter statement to make the title_id the primary key. - > put it when making the table 
ALTER TABLE tblbooks
ADD PRIMARY KEY(title_id);

#(7) Now add this statement to the script.It will add a new field/column called short_desc of type varchar(100) to the table
ALTER TABLE tblbooks 
ADD COLUMN short_desc VARCHAR(100) AFTER book_title;

#(8) DISPLAY THE DESCRIPTION OF THE TABLE TO ENSURE THAT THE STRUCTURE OF THE TABLE HAS BEEN ALTERED.
DESC tblbooks;

/*(9) The title, type and pub_date of all the books published only in the 20th century (Jan 01, 1900 to Dec 31, 1999) using relational operators and the 'and' verb.
   DO NOT use the 'BETWEEN' verb in the where condition. 
*/
SELECT book_title, book_type, pub_date FROM tblbooks 
WHERE pub_date >= '1900-01-01' AND pub_date <= '1999-12-31';

#(10) A list of all computer and business books. The title_id field starts with PC for Computer books and BU for business books.
SELECT * FROM tblbooks
WHERE title_id LIKE 'PC%' OR title_id LIKE 'BU%';

#(11)  Use the 'IN' verb to list all books that are published by 0736, 0877 or 1111 publisher identifiers.
SELECT * FROM tblbooks 
WHERE pub_id IN(0736, 0877, 1111);

#(12) The book title and  publisher id of all the books whose publisher date is undefined. The headings of these columns when displayed should be Book Title and Publisher Id. 
SELECT book_title as 'Book Title', pub_id as 'Publisher Id' FROM tblbooks
WHERE pub_date IS NULL;

#(13) Update the ytd_sales to 10 for books that currently have a ytd_sales of 0.
UPDATE tblbooks
SET ytd_sales = 10
WHERE ytd_sales = 0;

#(14) Using a single update statement, set the short_desc field as follows(use the given book_type for looking up the records):
UPDATE tblbooks
   SET short_desc = CASE book_type 
                      WHEN 'popular_comp' THEN 'Computing is fun' 
                      WHEN 'business' THEN 'Be a smart business person' 
                      WHEN 'psycho' THEN 'De-stress yourself' 
                      WHEN 'mod_cook' THEN 'Modern Cooking is quick' 
                      WHEN 'trad_cook' THEN 'Traditional cooking takes time' 
                      ELSE 'There is no option for this book'
                      END
 WHERE book_type IN('popular_comp', 'business', 'psycho', 'mod_cook', 'trad_cook');
/*
UPDATE tblbooks
SET short_desc = 'Computing is fun', short_desc = 'Be a smart business person', short_desc= 'De-stress yourself', short_desc = 'Modern Cooking is quick', short_desc = 'Traditional cooking takes time'
WHERE book_type = 'popular_comp', book_type = 'business', book_type = 'psycho', book_type = 'mod_cook', book_type = 'trad_cook';
*/
#(15) DISPLAY ALL THE RECORDS OF THE TABLE. 
SELECT * FROM tblbooks;
#(16) Delete the records for all the books published in 1998 using the 'BETWEEN' verb.
DELETE FROM tblbooks WHERE pub_date BETWEEN '1998-01-01' AND '1998-12-31';
#(17) DISPLAY ALL THE RECORDS OF THE TABLE. 
SELECT * FROM tblbooks;


