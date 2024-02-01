create table users(
userID varchar(15),
userPass varchar(255) default 'user@123',
accountType varchar(7),
primary key (userID)
);

create table students(
studentID varchar(15) primary key,
fName varchar(30),
lName varchar(30),
branch char(4),
yearOfStudy char(2),
email varchar(40),
phone varchar(10),
resi_address varchar(40),
foreign key (studentID) references users(userID)
);

create table faculty(
facultyID varchar(15) primary key,
fName varchar(30),
lName varchar(30),
branch char(4),
yearsOfExp char(2),
email varchar(40),
phone varchar(10),
resi_address varchar(40),
foreign key (facultyID) references users(userID)
);

create table staff(
staffID varchar(15) primary key,
fName varchar(30),
lName varchar(30),
branch char(4),
yearsOfExp char(2),
email varchar(40),
phone varchar(10),
resi_address varchar(40),
foreign key (studentID) references users(userID)
);

INSERT INTO users (userID, accountType) VALUES ('16010121200', 'Student');
INSERT INTO students (studentID, fName, lName, branch) VALUES ('16010121200', 'Asmi', 'Takle', 'COMP')

SELECT * FROM users WHERE userID = '16010121200'
UPDATE users SET userPass = 'asmitakle' WHERE userID = '16010121200'

SELECT * FROM users WHERE userID = '16010121200'
UPDATE students SET email = 'asmi.takle@somaiya.edu' WHERE studentID = '16010121200'
UPDATE students SET phone = '8291093915' WHERE studentID = '16010121200'
UPDATE students SET resi_address = 'Thane' WHERE studentID = '16010121200'

