-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2017 at 05:22 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE Users(
U_Id int(5) NOT NULL,
Name_f varchar(20) NOT NULL,
Name_l varchar(20),
Email varchar(30) UNIQUE,
Password varchar(30),
Role varchar(20) NOT NULL DEFAULT "Customer",
Membership_type varchar(10),
verified tinyint(1) NOT NULL DEFAULT '0',
deleted tinyint(4) NOT NULL DEFAULT '0',
PRIMARY KEY (U_Id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Users(U_Id,Name_f,Name_l,Email,Password,Role) VALUES
(1,"Prerit","Gupta","p@gmail.com","prerit","Administrator"),
(2,"Boga","Anilkumar","b@gmail.com","boga","Administrator"),
(3,"Manuveeran","Sandhu","m@gmail.com","manu","Administrator"),
(4,"Raghav",NULL,"r@gmail.com","raghav","Customer"),
(5,"Ritwika",NULL,"ritz@gmail.com","ritwika","Customer");

ALTER TABLE Users
  MODIFY U_Id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

CREATE TABLE User_Add(
U_Id int(5),
A_street varchar(50),
A_city varchar(20),
A_state varchar(20),
A_PIN decimal(6),
Phone_no decimal(10),
PRIMARY KEY (U_Id,A_street,A_city,A_state,A_PIN,Phone_no),
FOREIGN KEY (U_Id) REFERENCES Users(U_Id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO User_Add VALUES
(1,"C-11, Sector-15","Noida","Uttar Pradesh",201301,8436932228),
(1,"B-222, Azad Hall of Residence","Kharagpur","West Bengal",721302,8436932228),
(4,"B-316, RP Hall of Residence","Kharagpur","West Bengal",721302,7461893456);

CREATE TABLE Card_details(
U_Id int(5),
Card_No decimal(16),
Name_f varchar(20) NOT NULL,
Name_l varchar(20) NOT NULL,
Expiry_date date NOT NULL,
Type varchar(15) NOT NULL,
PRIMARY KEY (U_Id,Card_No),
FOREIGN KEY (U_Id) REFERENCES Users(U_Id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Card_details VALUES
(4,1234856839458345,"Anjani","Sonavane","2021-07-01","Visa"),
(1,1236756839458345,"Rajesh","Prajapati","2022-08-01","Master Card"),
(1,3454856839458345,"Ronit","Roy","2019-12-12","Visa"),
(4,1234857899458345,"Akhilesh","Kumar","2020-08-08","Amex");

CREATE TABLE Item(
I_Id int(5) NOT NULL,
Name varchar(20) NOT NULL,
Manf_by varchar(20),
Type varchar(40),
Price int(10),
Details varchar(100),
deleted tinyint(4) NOT NULL DEFAULT '0',
PRIMARY KEY (I_id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Available Types: "Fruits & Vegetables","Beverages","Snacks & Branded Foods","Cleaning & Household"

INSERT INTO Item VALUES
(1,"Bottle","Pearlpet","Cleaning & Household",60,"",0),
(2,"Bag","Fabindia","Cleaning & Household",500,"",0),
(3,"Handwash","Dettol","Cleaning & Household",45,"",0),
(4,"Pepsi","Pepsico","Beverages",30,"",0),
(5,"Lays","Fritolay","Snacks & Branded Foods",10,"",0);

ALTER TABLE Item
  MODIFY I_Id int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

CREATE TABLE Store(
S_Id int(5),
Name varchar(20) NOT NULL,
Manager varchar(20),
Rating decimal(2,1),
A_street varchar(50),
A_city varchar(20),
A_state varchar(20),
A_PIN decimal(6),
Email varchar(30),
Phone_no decimal(10),
deleted tinyint(4) NOT NULL DEFAULT '0',
PRIMARY KEY (S_Id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Store VALUES
(1,"Evergreen Ltd.","Ramesh Haldar",3.5,"A-22,Sector-15","Noida","Uttar Pradesh",201301,"rhaldar@evergreen.com",9933452345,0),
(2,"Fullsome Store","Arun Kumar",4.0,"D-3,Ram Tula Marg","Delhi","Delhi",100006,"karun@gmail.com",8452029348,0);

ALTER TABLE Store
  MODIFY S_Id int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

CREATE TABLE Sold_By(
I_Id int(5),
S_Id int(5),
Discount decimal(7) NOT NULL,
Available_qty int(5),
PRIMARY KEY (I_Id,S_Id),
FOREIGN KEY (I_Id) REFERENCES Item(I_Id),
FOREIGN KEY (S_Id) REFERENCES Store(S_Id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Sold_By VALUES
(1,1,5,6),
(2,1,0,35),
(3,1,10,44),
(5,1,0,21),
(1,2,0,33),
(4,2,0,2);

CREATE TABLE Delivery_Person(
D_Id int(5),
Name_f varchar(20) NOT NULL,
Name_l varchar(20) NOT NULL,
Available tinyint(1) NOT NULL DEFAULT '1',
PRIMARY KEY (D_Id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Delivery_Person VALUES
(1,"Dinesh","Kumar",1),
(2,"Karan","Singh",0),
(3,"Hitesh","Goyal",1);

ALTER TABLE Delivery_Person
  MODIFY D_Id int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

CREATE TABLE Delivery_Ph(
D_Id int(5),
Phone_No decimal(10),
PRIMARY KEY (D_Id,Phone_No),
FOREIGN KEY (D_Id) REFERENCES Delivery_Person(D_Id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Delivery_Ph VALUES
(1,9846732245),
(1,7900467890),
(3,7601790034);

CREATE TABLE Orders(
Order_Id int(5),
Date_time timestamp,
Amount decimal(7),
U_Id int(5),
A_street varchar(50),
A_city varchar(20),
A_state varchar(20),
A_PIN decimal(6),
Phone_no decimal(10),
Card_No decimal(16),
D_Id int(5),
Del_rating float(2,1),
status varchar(25) NOT NULL DEFAULT 'Yet to be delivered',
deleted tinyint(4) NOT NULL DEFAULT '0',
PRIMARY KEY (Order_Id),
FOREIGN KEY (U_Id) REFERENCES Users(U_Id),
FOREIGN KEY (U_Id,A_street,A_city,A_state,A_PIN,Phone_no) REFERENCES User_Add(U_Id,A_street,A_city,A_state,A_PIN,Phone_no),
FOREIGN KEY (U_Id,Card_No) REFERENCES Card_details(U_Id,Card_No),
FOREIGN KEY (D_Id) REFERENCES Delivery_Person(D_Id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Orders VALUES
(1,'2019-03-19 12:59:06',70,1,"C-11, Sector-15","Noida","Uttar Pradesh",201301,8436932228,1236756839458345,1,4.5,'Yet to be delivered',0),
(2,'2019-02-19 11:09:12',517,1,"B-222, Azad Hall of Residence","Kharagpur","West Bengal",721302,8436932228,3454856839458345,1,3.5,'Yet to be delivered',0),
(3,'2019-03-14 05:01:51',45,4,"B-316, RP Hall of Residence","Kharagpur","West Bengal",721302,7461893456,1234857899458345,3,4.0,'Cancelled by Customer',1);

ALTER TABLE Orders
  MODIFY Order_Id int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

CREATE TABLE Order_details(
Order_Id int(5),
I_Id int(5),
S_Id int(5),
Quantity int(3) NOT NULL,
Price int(10),
Rating float(2,1),
PRIMARY KEY (Order_Id,I_Id),
FOREIGN KEY (Order_Id) REFERENCES Orders(Order_Id),
FOREIGN KEY (S_Id) REFERENCES Store(S_Id),
FOREIGN KEY (I_Id) REFERENCES Item(I_Id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Order_details VALUES
(1,1,1,1,60,3.5),
(3,1,2,4,360,4),
(3,2,1,5,2500,4.5);

CREATE TABLE Cart(
U_Id int(5),
I_Id int(5),
S_Id int(5),
Quantity int(3),
PRIMARY KEY (U_Id,I_Id,S_Id),
FOREIGN KEY (U_Id) REFERENCES Users(U_Id),
FOREIGN KEY (I_Id) REFERENCES Item(I_Id),
FOREIGN KEY (S_Id) REFERENCES Store(S_Id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;

