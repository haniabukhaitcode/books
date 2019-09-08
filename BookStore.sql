-- Table structure for table `Books`
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `author_id` text NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM DEFAULT CHARSET = latin1 AUTO_INCREMENT = 38;
-- Dumping data for table `Books`
INSERT INTO
  `books` (
    `id`,
    `title`,
    `author_id`,
    `tag_id`
  )
VALUES
  (1, 'Book1', 1, 1),
  (2, 'Book2', 1, 1),
  (3, 'Book3', 2, 2),
  (6, 'Book4', 2, 2),
  (7, 'Book5', 3, 3),
  (8, 'Book6', 3, 3),
  (9, 'Book7', 4, 4),
  (10, 'Book8', 4, 4),
  (11, 'Book9', 5, 5),
  (12, 'Book10', 5, 5),
  (13, 'Book11', 6, 6),
  (25, 'Book12', 6, 6),
  (26, 'Book13', 7, 7),
  (27, 'Book14', 7, 7),
  (28, 'Book15', 1, 1),
  (30, 'Book16', 2, 2),
  (31, 'Book17', 2, 2),
  (32, 'Book18', 3, 3);
-- Table structure for table `tags`
  CREATE TABLE IF NOT EXISTS `tags` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `tag` varchar(256) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = MyISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT = 4;
-- Dumping data for table `tags`
INSERT INTO
  `tags` (`id`, `tag`)
VALUES
  (1, 'PHP'),
  (2, 'JAVA'),
  (3, 'JAVASCRIPT'),
  (4, 'C#'),
  (5, 'Python'),
  (6, 'GoLang'),
  (7, 'C++');

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
  (1, 'author1'),
  (2, 'author2'),
  (3, 'author3'),
  (4, 'author4'),
  (5, 'author5'),
  (6, 'author6'),
  (7, 'author7');