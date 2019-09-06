CREATE TABLE `tagTable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) DEFAULT "",
  PRIMARY KEY (`id`)
);
INSERT INTO
  `tagTable` (`tag`)
VALUES
  ('PHP'),
  ('JavaScript'),
  ('C#'),
  ('Java'),
  ('GoLang'),
  ('C'),
  ('C++')