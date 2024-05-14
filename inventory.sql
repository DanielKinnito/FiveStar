CREATE Database IF NOT EXISTS fivestar_inventory;
USE fivestar_inventory;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
-- SET FOREIGN_KEY_CHECKS = 0;

-- Drop tables in the reverse order of creation to avoid foreign key constraints
-- DROP TABLE IF EXISTS TransactionHistory, RequestForm, Materials, Project, Team, RequestStatus, users,request_form;

-- SET FOREIGN_KEY_CHECKS = 1;

-- Create the Users Table for user authentication
CREATE TABLE IF NOT EXISTS `users` (
    `user_id` INT PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL
);

-- Create the Team Table
CREATE TABLE IF NOT EXISTS Team (
    TeamID INT PRIMARY KEY,
    TeamName VARCHAR(255),
    TeamMembers VARCHAR(255)
);

-- Create the Project Table
CREATE TABLE IF NOT EXISTS Project (
    ProjectID INT PRIMARY KEY,
    ProjectName VARCHAR(255),
    TeamID INT,
    FOREIGN KEY (TeamID) REFERENCES Team(TeamID)-- Add the columns from the doc
);

-- Create the RequestStatus Table
CREATE TABLE IF NOT EXISTS RequestStatus (
    StatusID INT PRIMARY KEY,
    StatusName VARCHAR(50)
);

-- Create the Materials Table
CREATE TABLE IF NOT EXISTS Materials (-- MaterialID, MaterialName, Unit, UnitPrice,StockQuantity
    MaterialID INT PRIMARY KEY,
    MaterialName VARCHAR(255),
    Unit VARCHAR(50),
    UnitPrice DECIMAL(10, 2),
    StockQuantity INT
);

-- Create the RequestForm Table
CREATE TABLE IF NOT EXISTS RequestForm (
    RequestFormID INT PRIMARY KEY,
    MaterialID INT,
    RequestedQuantity INT,
    UnitPrice DECIMAL(10, 2),
    PriceTotal DECIMAL(10, 2),
    RequestDate DATE,
    ProjectID INT,
    RemainingStock INT,
    PreparedBy INT,
    ApprovedBy INT,
    ReceivedBy INT,
    StatusID INT,
    TeamID INT, 
    TeamName VARCHAR(255), -- Denormalized TeamName
    FOREIGN KEY (MaterialID) REFERENCES Materials(MaterialID),
    FOREIGN KEY (ProjectID) REFERENCES Project(ProjectID),
    FOREIGN KEY (PreparedBy) REFERENCES `users`(user_id),
    FOREIGN KEY (ApprovedBy) REFERENCES `users`(user_id),
    FOREIGN KEY (ReceivedBy) REFERENCES `users`(user_id),
    FOREIGN KEY (StatusID) REFERENCES RequestStatus(StatusID),
    FOREIGN KEY (TeamID) REFERENCES Team(TeamID)
);

-- Create the TransactionHistory Table
CREATE TABLE IF NOT EXISTS TransactionHistory (
    TransactionID INT PRIMARY KEY,
    MaterialID INT,
    RequestFormID INT,
    QuantityChange INT,
    RequestDate DATE,
    FOREIGN KEY (MaterialID) REFERENCES Materials(MaterialID),
    FOREIGN KEY (RequestFormID) REFERENCES RequestForm(RequestFormID)
    -- Add other fields as needed, such as transaction type (in/out)
);

-- Create an index on MaterialName for faster lookups
CREATE INDEX idx_MaterialName ON Materials(MaterialName);

-- Create an index on RequestDate for faster queries
CREATE INDEX idx_RequestDate ON RequestForm(RequestDate);

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '');

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(2, 'user', 'password', '');