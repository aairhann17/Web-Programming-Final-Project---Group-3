drop database if exists worldofcolourdb;

create database worldofcolourdb;
use worldofcolourdb;

create table userData (
    ID int AUTO_INCREMENT primary key,
    Username varchar(255) NOT NULL,
    Email varchar(255) NOT NULL,
    Password varchar(255) NOT NULL
)

create table painting(
    ID int AUTO_INCREMENT primary key,
    PaintingName varchar(255) NOT NULL,
    Artist varchar(255) NOT NULL,
    Year int NOT NULL
)
