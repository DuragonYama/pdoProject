create database taskplanner;

use taskplanner;

CREATE TABLE user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);


select * from user;

drop database taskplanner;