/**
 * Student Name:            Anna Victoria Kerz
 * Student ID:              300292572
 * Assignment/File Name:    Lab06
 *
 * Description:
 *
 * MySQL CRUD operations
 *
 * References:
 * w3schools
 *
 **/

-- DROP the database if it exists
DROP DATABASE IF EXISTS $vet_AKe92572;

-- CREATE THE DATABASE
CREATE DATABASE $vet_AKe92572;

-- Use the database
USE $vet_AKe92572;

-- Create the Product_Sale Table
CREATE TABLE Patients (
    patient_id INT (8) AUTO_INCREMENT NOT NULL,
    patient_name VARCHAR (256) NOT NULL,
    patient_dob DATE,
    patient_breed_id INT(5) REFERENCES $vet_AKe92572.Breeds(breed_id),
    patient_owner INT (7) NOT NULL REFERENCES $vet_AKe92572.Owners(owner_id),
    patient_last_visit DATE,

    PRIMARY KEY(patient_id)
) ENGINE=InnoDB AUTO_INCREMENT=1000;

-- Create the Breeds Table
CREATE TABLE Breeds (
    breed_id INT (5) AUTO_INCREMENT NOT NULL,
    breed_name VARCHAR(256),
    breed_size VARCHAR(12),

    PRIMARY KEY(breed_id)
)ENGINE=InnoDB;

-- Create the Owners Table
CREATE TABLE Owners (
    owner_id INT (8) AUTO_INCREMENT NOT NULL,
    owner_name VARCHAR(256),
    owner_address VARCHAR(512),
    owner_city VARCHAR(64),
    owner_zipcode VARCHAR(7),
    owner_phone VARCHAR (10),
    owner_email VARCHAR (256),
    owner_account_balance DECIMAL (7,2),

    PRIMARY KEY(owner_id)
)ENGINE=InnoDB;

-- Use the database
USE $vet_AKe92572;

-- Populate Patients Table
INSERT INTO Patients VALUES
    (0, 'Max', '2015-04-12', 5, 1, '2020-04-30'),
    (0, 'Buddy', '2014-06-14', 3, 1, '2020-05-01'),
    (0, 'Bailey', '2017-03-02', 1, 2, '2019-07-14'),
    (0, 'Bella', '2011-08-12', 4, 3, '2016-01-13'),
    (0, 'Lucy', '2011-12-19', 4, 5, '2018-07-17');

-- Populate Breeds Table
INSERT INTO Breeds VALUES
    (0,'American Staffordshire Terrier', 'Large'),
    (0,'Bearded Collie', 'Medium'),
    (0,'Border Collie', 'Medium'),
    (0,'English Bulldog', 'Medium'),
    (0,'Cane Corso', 'Extra Large');

-- Populate Owners Table
INSERT INTO Owners VALUES
    (0, 'Amber G Kirkland','733  Bank St','Vancouver','V0E 3B0',6137394584,'bms42kzrn0i@classesmail.com',512.41),
    (0, 'Janice J Rowe','1417 Blind Bay Road','Westwold','T7E 6B0',2503757019,'06ic5llt62bk@classesmail.com',0),
    (0, 'Tommy S Zito','1546 Yonge Street','Elko','V0B 1J0', 2505297390,'imldoe7nqp@meantinc.com',0),
    (0, 'Patricia W Blackburn','14 Bay Road','Crawford Bay','V0E 1B0',2502256123,'7v9xm13ij0a@fakemailgenerator.net',1971.12),
    (0, 'Jean A Ball','1972 Burdett Avenue','Victoria','V8Z 2J8',2504798988,'yg85z51p6w@powerencry.com',0),
    (0, 'Rochelle L Pawlak','669 Robson St','Vancouver','V6B 3K9',6049742016,'ecj323b5a78@groupbuff.com',0);

-- Update entry in Patients table
UPDATE Patients
SET patient_last_visit = CURDATE()
WHERE patient_id = 1002;

-- Use Join to display specific data from all three tables
SELECT
    p.patient_id, p.patient_name, p.patient_last_visit,
    b.breed_name,
    o.owner_phone, o.owner_account_balance
FROM Patients p
JOIN Breeds b ON p.patient_breed_id = b.breed_id
JOIN Owners o ON p.patient_owner = o.owner_id
ORDER BY p.patient_id;

-- Delete an entry from Patients
DELETE FROM Patients WHERE patient_id = 1004;