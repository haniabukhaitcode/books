CREATE TABLE `booksTable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT "",
  `tag` varchar(255) DEFAULT "",
  `author` varchar(255) NOT NULL DEFAULT "",
  `action` varchar(255) NOT NULL DEFAULT "",
  PRIMARY KEY (`id`)
);
INSERT INTO
  `booksTable` (`title`, `tag`, `author`, `action`)
VALUES
  (
    'First Book',
    'PHP',
    'Micheal',
    'add/edit/delete'
  ),
  (
    'Second Book',
    'JavaScript',
    'John',
    'add/edit/delete'
  ),
  (
    'Third Book',
    'Java',
    'Johnson',
    'add/edit/delete'
  );