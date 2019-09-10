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
  (1, 'Title1', 1, 1),
  (2, 'Title2', 1, 1),
  (3, 'Title3', 2, 2),
  (6, 'Title4', 2, 2),
  (7, 'Title5', 3, 3),
  (8, 'Title6', 3, 3),
  (9, 'Title7', 4, 4),
  (10, 'Title8', 4, 4),
  (11, 'Title9', 5, 6),
  (12, 'Title10', 5, 5),
  (13, 'Title11', 6, 6),
  (25, 'Title12', 6, 6),
  (26, 'Title13', 7, 7),
  (27, 'Title14', 7, 7),
  (28, 'Title15', 1, 1),
  (30, 'Title16', 2, 2),
  (31, 'Title17', 2, 2),
  (32, 'Title18', 3, 3);
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


  CREATE TABLE `books_tags`(
      `book_id` INT(11),
      `tag_id` INT(11),
      PRIMARY KEY (`book_id`,`tag_id`)

  );

  -- SELECT
  -- title,
  -- tag,
  -- GROUP_CONCAT(tag ORDER BY title)

  -- FROM
  --   books
  --   INNER JOIN tags ON books.book_id = tags.tag_id GROUP BY books.book_id;

