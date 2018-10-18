/* Creating database (or dropping it before re-creating database) */
CREATE DATABASE phpProject;
USE phpProject;

/* Creating teacher table */
CREATE TABLE teacher(id INT AUTO_INCREMENT, name VARCHAR(255), salary INT, PRIMARY KEY(id));
CREATE TABLE subject(id INT AUTO_INCREMENT, name VARCHAR(255), hrs INT, PRIMARY KEY(id));
CREATE TABLE course(teacher INT, subject INT);

/* Data entry for Teacher */

