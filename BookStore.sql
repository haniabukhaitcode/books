DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `author_id` int(11),
  PRIMARY KEY (`book_id`)
);
-- Dumping data for table `Books`
INSERT INTO
  `books` (`book_id`, `title`, `author_id`)
VALUES
  (1, 'Book1', 1),
  (2, 'Book2', 1),
  (3, 'Book3', 2),
  (6, 'Book4', 2),
  (7, 'Book5', 3),
  (8, 'Book6', 3),
  (9, 'Book7', 4),
  (10, 'Book8', 4),
  (11, 'Book9', 5),
  (12, 'Book10', 5),
  (13, 'Book11', 6),
  (25, 'Book12', 6),
  (26, 'Book13', 7),
  (27, 'Book14', 7),
  (28, 'Book15', 1),
  (30, 'Book16', 2),
  (31, 'Book17', 2),
  (32, 'Book18', 3);
-- Table structure for table `authors`
  DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `author` varchar(256) NOT NULL,
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
  DROP TABLE IF EXISTS `tags`;
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
  (2, 'Tag2'),
  (3, 'Tag3'),
  (4, 'Tag4'),
  (5, 'Tag5'),
  (6, 'Tag6'),
  (7, 'Tag7');
DROP TABLE IF EXISTS `books_tags`;
CREATE TABLE `books_tags` (
    `book_id` INT(11) NOT NULL,
    `tag_id` INT(11) NOT NULL,
    FOREIGN KEY (book_id) REFERENCES books (book_id) ON DELETE CASCADE ON UPDATE RESTRICT,
    FOREIGN KEY (tag_id) REFERENCES tags (tag_id) ON DELETE CASCADE ON UPDATE RESTRICT,
    PRIMARY KEY(book_id, tag_id)
  );
SELECT
  books.book_id,
  tags.tag_id
FROM
  books
  INNER JOIN books_tags ON books.book_id = books_tags.book_id
  INNER JOIN tags ON tags.tag_id = books_tags.tag_id;