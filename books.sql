CREATE TABLE `booksTable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT "",
  `tag` varchar(255) DEFAULT "",
  `author` varchar(255) NOT NULL DEFAULT "",
  PRIMARY KEY (`id`)
);
INSERT INTO
  `booksTable` (`title`, `tag`, `author`)
VALUES
  (
    'First Book',
    'PHP',
    'Micheal'
  ),
  (
    'Second Book',
    'JavaScript',
    'John'
  ),
  (
    'Third Book',
    'Java',
    'Johnson'
  );