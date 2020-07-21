-- Lab06 Solution
-- DROP the database if it exists
DROP DATABASE IF EXISTS Lab06_ABcXXXXX;
-- CREATE THE DATABASE
CREATE DATABASE Lab06_ABcXXXXX;

-- SHOW DATABASES;

-- Use the database
USE Lab06_ABcXXXXX;

-- Create the Students Table
CREATE TABLE Student_ABcXXXXX (
    StudentID INT AUTO_INCREMENT NOT NULL,
    firstName VARCHAR(32) NOT NULL,
    lastName VARCHAR(32) NOT NULL,
    gender VARCHAR(8),
    age INT,
    PRIMARY KEY(StudentID)
);
DESC Student_ABcXXXXX;

-- Create the Course Table
CREATE TABLE Course_ABcXXXXX (
    CourseID INT AUTO_INCREMENT NOT NULL,
    ShortName VARCHAR(32) NOT NULL,
    FullName VARCHAR(32) NOT NULL,
    EnrollmentCapacity INT(1) NOT NULL,
    PRIMARY KEY(CourseID)
);
DESC Course_ABcXXXXX;

-- Create the Enrollment Table
CREATE TABLE Enrollment_ABcXXXXX (
    EnrollmentID INT AUTO_INCREMENT NOT NULL,
    StudentID INT,
    CourseID INT,
    PRIMARY KEY(EnrollmentID),
    FOREIGN KEY(StudentID) REFERENCES Student_ABcXXXXX(StudentID),
    FOREIGN KEY(CourseID) REFERENCES Course_ABcXXXXX(CourseID)
);
DESC Enrollment_ABcXXXXX;

SHOW TABLES;

-- INSERT Students
INSERT INTO Student_ABcXXXXX (firstName, lastName, gender, age)
    VALUES ('Sam', 'Student', 'male', 24),
    ('Samantha', 'Student', 'female', 18),
    ('Sedrick', 'Student', 'male', 32);

SELECT * FROM Student_ABcXXXXX;

-- UPDATE
UPDATE Student_ABcXXXXX SET `firstName` = 'Sally'
    WHERE firstName = 'Samantha';

SELECT * FROM Student_ABcXXXXX;