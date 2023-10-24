use ProfiDB;

CREATE TABLE IF NOT EXISTS Staff
(
    id INT,
    name VARCHAR(255) NOT NULL,
    position VARCHAR(30),
    birthday Date
);