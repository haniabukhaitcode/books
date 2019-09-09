DROP SCHEMA IF EXISTS BookStore;
CREATE DATABASE BookStore;
CREATE TABLE `books` (
  `book_id` INT(11) NOT NULL,
  `title` VARCHAR(256) NOT NULL,
  `author_id` INT(11),
  `tag_id` INT(11),
  PRIMARY KEY (`book_id`)
);
-- Dumping data for table `Books`
INSERT INTO
  `books` (`book_id`, `title`, `author_id`, `tag_id`)
VALUES
  (1, 'Book1', 1, 1),
  (2, 'Book2', 1, 1),
  (3, 'Book3', 2, 2),
  (6, 'Book4', 2, 2),
  (7, 'Book5', 3, 3),
  (8, 'Book6', 3, 3),
  (9, 'Book7', 4, 4),
  (10, 'Book8', 4, 4),
  (11, 'Book9', 5, 6),
  (12, 'Book10', 5, 5),
  (13, 'Book11', 6, 6),
  (25, 'Book12', 6, 6),
  (26, 'Book13', 7, 7),
  (27, 'Book14', 7, 7),
  (28, 'Book15', 1, 1),
  (30, 'Book16', 2, 2),
  (31, 'Book17', 2, 2),
  (32, 'Book18', 3, 3);
-- Table structure for table `authors`
  CREATE TABLE `authors` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `author` VARCHAR(256) NOT NULL,
    PRIMARY KEY (`id`)
  );
-- Dumping data for table `authors`
INSERT INTO
  `authors` (`id`, `author`)
VALUES
  (1, 'Author1'),
  (2, 'Author2'),
  (3, 'Author3'),
  (4, 'Author4'),
  (5, 'Author5'),
  (6, 'Author6'),
  (7, 'Author7');
-- Table structure for table `tags`
  CREATE TABLE `tags` (
    `tag_id` INT(11) NOT NULL AUTO_INCREMENT,
    `tag` VARCHAR (256) NOT NULL,
    PRIMARY KEY (`tag_id`)
  );
-- Dumping data for table `Tags`
INSERT INTO
  `tags` (`tag_id`, `tag`)
VALUES
  (1, 'Tag1'),
  (2, 'Tag1'),
  (3, 'Tag2'),
  (4, 'Tag2'),
  (5, 'Tag3'),
  (6, 'Tag3'),
  (7, 'Tag4');
SELECT
  title,
  tag
FROM
  books
  INNER JOIN tags ON books.tag_id = tags.tag_id;