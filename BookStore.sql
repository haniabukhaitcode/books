-- Table structure for table `Books`
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `author_id` int,
  `tag` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM DEFAULT CHARSET = latin1 AUTO_INCREMENT = 38;
-- Dumping data for table `Books`
INSERT INTO
  `books` (
    `id`,
    `title`,
    `author_id`,
    `tag`
  )
VALUES
  (1, 'Book1', 1, 'Tag1'),
  (2, 'Book2', 1, 'Tag2'),
  (3, 'Book3', 2, 'Tag3'),
  (6, 'Book4', 2, 'Tag4'),
  (7, 'Book5', 3, 'Tag5'),
  (8, 'Book6', 3, 'Tag6'),
  (9, 'Book7', 4, 'Tag7'),
  (10, 'Book8', 4, 'Tag8'),
  (11, 'Book9', 5, 'Tag9'),
  (12, 'Book10', 5, 'Tag10'),
  (13, 'Book11', 6, 'Tag11'),
  (25, 'Book12', 6, 'Tag12'),
  (26, 'Book13', 7, 'Tag13'),
  (27, 'Book14', 7, 'Tag14'),
  (28, 'Book15', 1, 'Tag15'),
  (30, 'Book16', 2, 'Tag16'),
  (31, 'Book17', 2, 'Tag17'),
  (32, 'Book18', 3, 'Tag18');
-- Table structure for table `tags`
  CREATE TABLE IF NOT EXISTS `authors` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `author` varchar(256) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = MyISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT = 4;
-- Dumping data for table `tags`
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


  CREATE TABLE IF NOT EXISTS `tags` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `tags` VARCHAR (256) NO NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = MyISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT = 4;

  INSERT INTO 
  `tags` (`tag_id`, `tags`)

  VALUES
  (1, 'Tag1'),
  (2, 'Tag2'),
  (3, 'Tag3'),
  (4, 'Tag4'),
  (5, 'Tag5'),
  (6, 'Tag6'),
  (7, 'Tag7');

CREATE TABLE `books_tags` (  
  `book_id`  INT(11) NOT NULL,
  `tag_id` INT(11) NOT NULL,
  FOREIGN KEY (`book_id`) REFERENCES(`book_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (`tag_id`) REFERENCES(`tag_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
   PRIMARY KEY (`book_id`, `tag_id`)
);

SELECT `b.book_id`, `t.tag_id`, 
FROM `books b`
INNER JOIN `books_tags bt`
ON `b.book_id` = `bt.book_id`
INNER JOIN `tags t`
ON `t.tag_id` = `bt.book_id`;   

