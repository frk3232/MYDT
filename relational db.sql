CREATE TABLE Authors (
    AuthorID SERIAL PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50)
);


CREATE TABLE Books (
    BookID SERIAL PRIMARY KEY,
    Title VARCHAR(100),
    Genre VARCHAR(50),
    AuthorID INT,
    FOREIGN KEY (AuthorID) REFERENCES Authors(AuthorID)
);


CREATE TABLE Sales (
    SaleID SERIAL PRIMARY KEY,
    BookID INT,
    SaleDate DATE,
    Quantity INT,
    FOREIGN KEY (BookID) REFERENCES Books(BookID)
);

INSERT INTO Authors (FirstName, LastName)
VALUES ('George', 'Orwell'),
       ('J.K.', 'Rowling'),
       ('J.R.R.', 'Tolkien');

INSERT INTO Books (Title, Genre, AuthorID)
VALUES ('1984', 'Dystopian', 1),
       ('Harry Potter and the Philosophers Stone', 'Fantasy', 2),
       ('The Lord of the Rings', 'Fantasy', 3);


INSERT INTO Sales (BookID, SaleDate, Quantity)
VALUES (1, '2023-05-01', 5),
       (2, '2023-05-02', 10),
       (3, '2023-05-03', 7);

SELECT Books.Title, Authors.FirstName, Authors.LastName, Sales.SaleDate, Sales.Quantity
FROM Sales
JOIN Books ON Sales.BookID = Books.BookID
JOIN Authors ON Books.AuthorID = Authors.AuthorID;