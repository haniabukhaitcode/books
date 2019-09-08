-- Table structure for table `Books`
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `author` text NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM DEFAULT CHARSET = latin1 AUTO_INCREMENT = 38;
-- Dumping data for table `Books`
INSERT INTO
  `books` (
    `id`,
    `title`,
    `author`,
    `tag_id`
  )
VALUES
  (1, 'Book1', 'Author1', 1),
  (2, 'Book2', 'Author2', 1),
  (3, 'Book3', 'Author3', 2),
  (6, 'Book4', 'Author4', 2),
  (7, 'Book5', 'Author5', 3),
  (8, 'Book6', 'Author6', 3),
  (9, 'Book7', 'Author7', 4),
  (10, 'Book8', 'Author8', 4),
  (11, 'Book9', 'Author9', 5),
  (12, 'Book10', 'Author10', 5),
  (13, 'Book11', 'Author11', 6),
  (25, 'Book12', 'Author12', 6),
  (26, 'Book13', 'Author13', 7),
  (27, 'Book14', 'Author14', 7),
  (28, 'Book15', 'Author15', 1),
  (30, 'Book16', 'Author16', 2),
  (31, 'Book17', 'Author17', 2),
  (32, 'Book18', 'Author18', 3);
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