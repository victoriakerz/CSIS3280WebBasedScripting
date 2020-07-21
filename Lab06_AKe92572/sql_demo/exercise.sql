-- DROP the database if it exists
DROP DATABASE IF EXISTS csis3280_aBc12345;

-- CREATE THE DATABASE
CREATE DATABASE csis3280_aBc12345;

-- SHOW DATABASES;

-- Use the database
USE csis3280_aBc12345;

-- Create the Location Table
CREATE TABLE Location (
id INT (10) AUTO_INCREMENT NOT NULL,
city VARCHAR(15),
state VARCHAR(2),
country VARCHAR(15),
PRIMARY KEY(id)
)ENGINE=InnoDB;

-- Create the Person Table
CREATE TABLE Person(
id INT(10) AUTO_INCREMENT PRIMARY KEY,
height INT(3),
weight INT(3),
locationid INT(10) REFERENCES Location(id)
) ENGINE=InnoDB;


USE books;

INSERT INTO Customers VALUES
(1, 'Julie Smith', '25 Oak Street', 'Airport West'),
(2, 'Alan Wong', '1/47 Haines Avenue', 'Box Hill'),
(3, 'Michelle Arthur', '357 North Road', 'Yarraville');

INSERT INTO Books VALUES
('0-672-31697-8', 'Michael Morgan',
 'Java 2 for Professional Developers', 34.99),
('0-672-31745-1', 'Thomas Down', 'Installing Debian GNU/Linux', 24.99),
('0-672-31509-2', 'Pruitt, et al.', 'Teach Yourself GIMP in 24 Hours', 24.99),
('0-672-31769-9', 'Thomas Schenk',
 'Caldera OpenLinux System Administration Unleashed', 49.99);

INSERT INTO Orders VALUES
(NULL, 3, 69.98, '2007-04-02'),
(NULL, 1, 49.99, '2007-04-15'),
(NULL, 2, 74.98, '2007-04-19'),
(NULL, 3, 24.99, '2007-05-01');

INSERT INTO Order_Items VALUES
(1, '0-672-31697-8', 2),
(2, '0-672-31769-9', 1),
(3, '0-672-31769-9', 1),
(3, '0-672-31509-2', 1),
(4, '0-672-31745-1', 3);