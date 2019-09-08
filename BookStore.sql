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