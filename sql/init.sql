CREATE TABLE IF NOT EXISTS users
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS links
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    original varchar(5000) NOT NULL ,
    converted varchar(1000) NOT NULL ,
    user_id int NOT NULL,
    KEY FK_Users (user_id),
    CONSTRAINT FK_Users_Constraint FOREIGN KEY FK_Users (user_id) REFERENCES users (id)
);

