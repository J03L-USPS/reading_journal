-- Create the database
CREATE DATABASE library_database;

-- Use the newly created database
USE library_database;

-- Create the "books" table
CREATE TABLE books (
    book_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    isbn VARCHAR(13) NOT NULL,
    cover_image VARCHAR(255)
);

-- Create the "reading_log" table with a foreign key relationship to "books"
CREATE TABLE reading_log (
    log_id INT PRIMARY KEY AUTO_INCREMENT,
    date DATE NOT NULL,
    time TIME NOT NULL,
    book_id INT,
    start_page INT NOT NULL,
    stop_page INT NOT NULL,
    pages_read INT NOT NULL,
    FOREIGN KEY (book_id) REFERENCES books(book_id)
);
