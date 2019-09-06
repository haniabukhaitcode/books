CREATE TABLE `books`(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255),
  `author` TEXT,
  PRIMARY KEY(`id`)
);
INSERT INTO
  `books`(`title`, `author`)
VALUES('Book1', 'Author1');
INSERT INTO
  `books`(`title`, `author`)
VALUES('Book2', 'Author2');
INSERT INTO
  `books`(`title`, `author`)
VALUES('Book3', 'Author3');
INSERT INTO
  `books`(`title`, `author`)
VALUES('Book4', 'Author4');
INSERT INTO
  `books`(`title`, `author`)
VALUES('Book5', 'Author5');
INSERT INTO
  `books`(`title`, `author`)
VALUES('Book6', 'Author6');
INSERT INTO
  `books`(`title`, `author`)
VALUES('Book7', 'Author7');
-- *********************** --
  CREATE TABLE `bookTag`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `tag` VARCHAR(255),
    PRIMARY KEY(`id`)
  );
INSERT INTO
  `bookTag`(`tag`)
VALUES('PHP');
INSERT INTO
  `bookTag`(`tag`)
VALUES('JavaScript');
INSERT INTO
  `bookTag`(`tag`)
VALUES('C#');
INSERT INTO
  `bookTag`(`tag`)
VALUES('Java');
INSERT INTO
  `bookTag`(`tag`)
VALUES('GoLang');
INSERT INTO
  `bookTag`(`tag`)
VALUES('C');
INSERT INTO
  `bookTag`(`tag`)
VALUES('C++');
ALTER TABLE
  `books`
ADD
  `book_id` INT(11)
AFTER
  `author`;
UPDATE
  books
SET
  book_id = ' 1 '
WHERE
  id = ' 1 ';
UPDATE
  books
SET
  book_id = ' 2 '
WHERE
  id = ' 2 ';
UPDATE
  books
SET
  book_id = ' 3 '
WHERE
  id = ' 3 ';
UPDATE
  books
SET
  book_id = ' 4 '
WHERE
  id = ' 4 ';
UPDATE
  books
SET
  book_id = ' 5 '
WHERE
  id = ' 5 ';
UPDATE
  books
SET
  book_id = ' 6 '
WHERE
  id = ' 6 ';
UPDATE
  books
SET
  book_id = ' 7 '
WHERE
  id = ' 7 ';
SELECT
  books.id,
  books.author,
  books.title,
  bookTag.tag AS Tag
FROM
  books,
  bookTag
WHERE
  books.book_id = bookTag.id
ORDER BY
  books.author ASC;