-- enter the database name your are using
-- USE dbname;
CREATE TABLE tblteams(
id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
team_name VARCHAR(20) NOT NULL,
team_city VARCHAR(20) NOT NULL,
team_arena VARCHAR(20),
PRIMARY KEY(id)  
);

CREATE TABLE tblplayers(
id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
player_fname VARCHAR(15) NOT NULL,
player_lname VARCHAR(15) NOT NULL,
player_position VARCHAR(15),
player_number TINYINT UNSIGNED,
team_id TINYINT UNSIGNED NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY (team_id) REFERENCES tblteams(id) ON DELETE CASCADE ON UPDATE CASCADE 
);
