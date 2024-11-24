-- Create database if it doesn't exist
CREATE DATABASE IF NOT EXISTS worldofcolourdb;

-- Select the database to use
USE worldofcolourdb;

-- Create table userData if it doesn't exist
CREATE TABLE IF NOT EXISTS userData (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL
);

-- Create table uploadedPaintings if it doesn't exist
CREATE TABLE IF NOT EXISTS uploadedPaintings (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    PaintingPath VARCHAR(255) NOT NULL,
    PaintingName VARCHAR(255) NOT NULL,
    Artist VARCHAR(255) NOT NULL,
    Year INT NOT NULL
);
