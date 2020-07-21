DROP DATABASE IF EXISTS StudentFeedback;
CREATE DATABASE StudentFeedback;
USE StudentFeedback;

-- Create table course
Create TABLE Department (
    DeptID TINYINT(3) AUTO_INCREMENT PRIMARY KEY,
    ShortName CHAR(5),
    LongName TINYTEXT
) Engine=InnoDB;


-- Insert Courses
INSERT INTO Department (ShortName, LongName) 
    VALUES ('MAR', 'Marketing'),
    ('BA', 'Business Administration'),
    ('CSIS', 'Computing Studies and Information Systems'),
    ('ACCT', 'Accounting'),
    ('FIN', 'Finance');


-- create table feedback
Create TABLE Feedback (
	FeedbackID INT,
	FullName VARCHAR(50),
	Email VARCHAR(50),
	NumberOfTerms TINYINT(3),
	DOB DATE,
	DeptID TINYINT(3),
	Feedback TINYTEXT,
    FOREIGN KEY (DeptID) REFERENCES Department (DeptID) ON DELETE CASCADE ON UPDATE CASCADE
);    

insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (1, 'Hope McQuorkel', 'hmcquorkel0@mayoclinic.com', 8, '1994-11-23', 5, 'Awesome');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (2, 'Guthry Charteris', 'gcharteris1@epa.gov', 7, '2000-04-27', 3, 'Could be bettter');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (3, 'Mada Willans', 'mwillans2@webs.com', 5, '1995-05-22', 5, 'Awesome');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (4, 'Sig Court', 'scourt3@nytimes.com', 6, '1998-09-19', 1, 'Could be bettter');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (5, 'Johnath Treece', 'jtreece4@sogou.com', 3, '1990-05-05', 3, 'Noice');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (6, 'Darcee McGeachy', 'dmcgeachy5@hao123.com', 9, '2000-07-31', 3, 'Cool');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (7, 'Hatti Zorzenoni', 'hzorzenoni6@msn.com', 6, '2001-07-29', 4, 'Cool');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (8, 'Ransell Tadman', 'rtadman7@jalbum.net', 1, '2002-05-20', 4, 'It''s OK');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (9, 'Goddard Renvoise', 'grenvoise8@gnu.org', 7, '1992-07-02', 4, 'Not bad');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (10, 'Brandi Arnison', 'barnison9@bing.com', 3, '1997-11-10', 2, 'It''s OK');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (11, 'Koressa Comusso', 'kcomussoa@indiegogo.com', 9, '1996-04-30', 5, 'Could be bettter');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (12, 'Krispin Gronaller', 'kgronallerb@unicef.org', 2, '1999-04-18', 4, 'Not bad');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (13, 'Lonee Mico', 'lmicoc@mit.edu', 4, '2001-09-17', 2, 'Could be bettter');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (14, 'Kathy Goshawke', 'kgoshawked@cmu.edu', 4, '2002-09-28', 3, 'Cool');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (15, 'Emmit Grigsby', 'egrigsbye@jimdo.com', 8, '1997-07-20', 2, 'Awesome');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (16, 'Bealle Brodeur', 'bbrodeurf@economist.com', 7, '1997-09-13', 5, 'It''s OK');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (17, 'Hedy Spadollini', 'hspadollinig@narod.ru', 2, '1996-08-05', 3, 'It''s OK');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (18, 'Halsy Davers', 'hdaversh@narod.ru', 10, '2002-02-14', 4, 'Great');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (19, 'Renado Crysell', 'rcryselli@nymag.com', 2, '1996-11-02', 3, 'Awesome');
insert into Feedback (FeedbackID, FullName, Email, NumberOfTerms, DOB, DeptID, Feedback) values (20, 'Yank Ilive', 'yilivej@seattletimes.com', 6, '1995-09-23', 5, 'Awesome');


DESC Department; 
SELECT COUNT(*) FROM Department; -- 5
SELECT * FROM Department;

DESC Feedback;
SELECT COUNT(*) FROM Feedback; -- 20
SELECT * FROM Feedback;
