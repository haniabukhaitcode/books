-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 17, 2019 at 10:14 AM
-- Server version: 5.7.27-0ubuntu0.19.04.1
-- PHP Version: 7.2.19-0ubuntu0.19.04.2
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
  time_zone = "+00:00";
  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;
--
  -- Database: `BookStore`
  --
  DROP DATABASE IF EXISTS `BookStore`;
CREATE DATABASE `BookStore`;
-- --------------------------------------------------------
  --
  -- Table structure for table `authors`
  --
  CREATE TABLE `authors` (
    `id` int(11) NOT NULL,
    `author` varchar(256) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
  -- Dumping data for table `authors`
  --
INSERT INTO
  `authors` (`id`, `author`)
VALUES
  (1, 'Mo2ayad'),
  (2, 'Mesh Mo2ayad'),
  (3, 'Author3'),
  (4, 'Author4'),
  (5, 'Author5'),
  (6, 'Author6'),
  (7, 'Author7');
-- --------------------------------------------------------
  --
  -- Table structure for table `books`
  --
  CREATE TABLE `books` (
    `book_id` int(11) NOT NULL,
    `title` varchar(256) NOT NULL,
    `author_id` int(11) DEFAULT NULL,
    `book_image` varchar(255) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
  -- Dumping data for table `books`
  --
INSERT INTO
  `books` (`book_id`, `title`, `author_id`, `book_image`)
VALUES
  (2, 'AAA', 1, 'download.jpeg'),
  (3, 'BBB', 1, 'download.jpeg'),
  (4, 'CCC', 1, 'download.jpeg'),
  (5, 'AAA', 2, 'download.jpeg'),
  (6, 'BBB', 2, 'download.jpeg'),
  (7, 'CCC', 2, 'download.jpeg');
-- --------------------------------------------------------
  --
  -- Table structure for table `books_tags`
  --
  CREATE TABLE `books_tags` (
    `book_id` int(11) NOT NULL,
    `tag_id` int(11) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
  -- Dumping data for table `books_tags`
  --
INSERT INTO
  `books_tags` (`book_id`, `tag_id`)
VALUES
  (3, 1),
  (6, 1),
  (1, 2),
  (2, 2),
  (4, 2),
  (7, 2),
  (1, 3),
  (2, 3),
  (3, 3),
  (5, 3),
  (6, 3),
  (1, 4),
  (2, 4),
  (4, 4),
  (5, 4),
  (7, 4);
-- --------------------------------------------------------
  --
  -- Table structure for table `tags`
  --
  CREATE TABLE `tags` (
    `id` int(11) NOT NULL,
    `tag` varchar(256) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
  -- Dumping data for table `tags`
  --
INSERT INTO
  `tags` (`id`, `tag`)
VALUES
  (1, 'Tag1'),
  (2, 'Tag1'),
  (3, 'Tag2'),
  (4, 'Tag2'),
  (5, 'Tag3'),
  (6, 'Tag3'),
  (7, 'Tag4');
--
  -- Indexes for dumped tables
  --
  --
  -- Indexes for table `authors`
  --
ALTER TABLE
  `authors`
ADD
  PRIMARY KEY (`id`);
--
  -- Indexes for table `books`
  --
ALTER TABLE
  `books`
ADD
  PRIMARY KEY (`book_id`);
--
  -- Indexes for table `books_tags`
  --
ALTER TABLE
  `books_tags`
ADD
  PRIMARY KEY (`book_id`, `tag_id`),
ADD
  KEY `tag_id` (`tag_id`);
--
  -- Indexes for table `tags`
  --
ALTER TABLE
  `tags`
ADD
  PRIMARY KEY (`id`);
--
  -- AUTO_INCREMENT for dumped tables
  --
  --
  -- AUTO_INCREMENT for table `authors`
  --
ALTER TABLE
  `authors`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 8;
--
  -- AUTO_INCREMENT for table `books`
  --
ALTER TABLE
  `books`
MODIFY
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 8;
--
  -- AUTO_INCREMENT for table `tags`
  --
ALTER TABLE
  `tags`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 8;
--
  -- Constraints for dumped tables
  --
  --
  -- Constraints for table `books_tags`
  --
ALTER TABLE
  `books_tags`
ADD
  CONSTRAINT `books_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
  -- Database: `loginapp`
  --
  CREATE DATABASE IF NOT EXISTS `loginapp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `loginapp`;
-- --------------------------------------------------------
  --
  -- Table structure for table `users`
  --
  CREATE TABLE `users` (
    `user_id` int(3) NOT NULL,
    `username` varchar(255) NOT NULL,
    `user_password` varchar(255) NOT NULL,
    `user_firstname` varchar(255) NOT NULL,
    `user_lastname` varchar(255) NOT NULL,
    `user_email` varchar(255) NOT NULL,
    `user_image` text NOT NULL,
    `user_role` varchar(255) NOT NULL,
    `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22',
    `token` text NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
  -- Dumping data for table `users`
  --
INSERT INTO
  `users` (
    `user_id`,
    `username`,
    `user_password`,
    `user_firstname`,
    `user_lastname`,
    `user_email`,
    `user_image`,
    `user_role`,
    `randSalt`,
    `token`
  )
VALUES
  (
    1,
    'rico',
    '$2y$12$19ZpnAkuhoaAFH7dclUGy.WFIL84PJ8AS216azZtXALy6sqexsScC',
    '',
    '',
    'rico@gmail.com',
    '',
    'subscriber',
    '$2y$10$iusesomecrazystrings22',
    ''
  ),
  (
    2,
    'suave',
    '$2y$12$jG3YUwNt3X39OB.YJd311O9akwOw17N4e1NQ79N2xrojC5NG3Na3S',
    '',
    '',
    'edwin@codingfaculty.com',
    '',
    'admin',
    '$2y$10$iusesomecrazystrings22',
    ''
  );
--
  -- Database: `phpmyadmin`
  --
  CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `phpmyadmin`;
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__bookmark`
  --
  CREATE TABLE `pma__bookmark` (
    `id` int(11) NOT NULL,
    `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
    `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
    `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
    `query` text COLLATE utf8_bin NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'Bookmarks';
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__central_columns`
  --
  CREATE TABLE `pma__central_columns` (
    `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
    `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
    `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
    `col_length` text COLLATE utf8_bin,
    `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
    `col_isNull` tinyint(1) NOT NULL,
    `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
    `col_default` text COLLATE utf8_bin
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'Central list of columns';
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__column_info`
  --
  CREATE TABLE `pma__column_info` (
    `id` int(5) UNSIGNED NOT NULL,
    `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
    `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
    `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
    `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
    `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
    `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'Column information for phpMyAdmin';
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__designer_settings`
  --
  CREATE TABLE `pma__designer_settings` (
    `username` varchar(64) COLLATE utf8_bin NOT NULL,
    `settings_data` text COLLATE utf8_bin NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'Settings related to Designer';
--
  -- Dumping data for table `pma__designer_settings`
  --
INSERT INTO
  `pma__designer_settings` (`username`, `settings_data`)
VALUES
  (
    'hani',
    '{\"angular_direct\":\"direct\",\"snap_to_grid\":\"off\",\"relation_lines\":\"false\"}'
  );
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__export_templates`
  --
  CREATE TABLE `pma__export_templates` (
    `id` int(5) UNSIGNED NOT NULL,
    `username` varchar(64) COLLATE utf8_bin NOT NULL,
    `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
    `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
    `template_data` text COLLATE utf8_bin NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'Saved export templates';
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__favorite`
  --
  CREATE TABLE `pma__favorite` (
    `username` varchar(64) COLLATE utf8_bin NOT NULL,
    `tables` text COLLATE utf8_bin NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'Favorite tables';
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__history`
  --
  CREATE TABLE `pma__history` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `sqlquery` text COLLATE utf8_bin NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'SQL history for phpMyAdmin';
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__navigationhiding`
  --
  CREATE TABLE `pma__navigationhiding` (
    `username` varchar(64) COLLATE utf8_bin NOT NULL,
    `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
    `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
    `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
    `table_name` varchar(64) COLLATE utf8_bin NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'Hidden items of navigation tree';
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__pdf_pages`
  --
  CREATE TABLE `pma__pdf_pages` (
    `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `page_nr` int(10) UNSIGNED NOT NULL,
    `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'PDF relation pages for phpMyAdmin';
--
  -- Dumping data for table `pma__pdf_pages`
  --
INSERT INTO
  `pma__pdf_pages` (`db_name`, `page_nr`, `page_descr`)
VALUES
  ('myBookStore', 1, 'tag-bookstable-relation');
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__recent`
  --
  CREATE TABLE `pma__recent` (
    `username` varchar(64) COLLATE utf8_bin NOT NULL,
    `tables` text COLLATE utf8_bin NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'Recently accessed tables';
--
  -- Dumping data for table `pma__recent`
  --
INSERT INTO
  `pma__recent` (`username`, `tables`)
VALUES
  (
    'hani',
    '[{\"db\":\"BookStore\",\"table\":\"books\"},{\"db\":\"BookStore\",\"table\":\"books_tags\"},{\"db\":\"BookStore\",\"table\":\"authors\"},{\"db\":\"BookStore\",\"table\":\"tags\"},{\"db\":\"loginapp\",\"table\":\"users\"},{\"db\":\"BookStore\",\"table\":\"images\"},{\"db\":\"sakila\",\"table\":\"actor\"},{\"db\":\"FruitShop\",\"table\":\"Units\"},{\"db\":\"FruitShop\",\"table\":\"Fruit\"},{\"db\":\"test\",\"table\":\"company\"}]'
  );
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__relation`
  --
  CREATE TABLE `pma__relation` (
    `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'Relation table';
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__savedsearches`
  --
  CREATE TABLE `pma__savedsearches` (
    `id` int(5) UNSIGNED NOT NULL,
    `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `search_data` text COLLATE utf8_bin NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'Saved searches';
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__table_coords`
  --
  CREATE TABLE `pma__table_coords` (
    `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `pdf_page_number` int(11) NOT NULL DEFAULT '0',
    `x` float UNSIGNED NOT NULL DEFAULT '0',
    `y` float UNSIGNED NOT NULL DEFAULT '0'
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'Table coordinates for phpMyAdmin PDF output';
--
  -- Dumping data for table `pma__table_coords`
  --
INSERT INTO
  `pma__table_coords` (
    `db_name`,
    `table_name`,
    `pdf_page_number`,
    `x`,
    `y`
  )
VALUES
  ('myBookStore', 'booksTable', 1, 174, 161);
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__table_info`
  --
  CREATE TABLE `pma__table_info` (
    `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
    `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'Table information for phpMyAdmin';
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__table_uiprefs`
  --
  CREATE TABLE `pma__table_uiprefs` (
    `username` varchar(64) COLLATE utf8_bin NOT NULL,
    `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
    `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
    `prefs` text COLLATE utf8_bin NOT NULL,
    `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'Tables'' UI preferences';
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__tracking`
  --
  CREATE TABLE `pma__tracking` (
    `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
    `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
    `version` int(10) UNSIGNED NOT NULL,
    `date_created` datetime NOT NULL,
    `date_updated` datetime NOT NULL,
    `schema_snapshot` text COLLATE utf8_bin NOT NULL,
    `schema_sql` text COLLATE utf8_bin,
    `data_sql` longtext COLLATE utf8_bin,
    `tracking`
    set(
        'UPDATE',
        'REPLACE',
        'INSERT',
        'DELETE',
        'TRUNCATE',
        'CREATE DATABASE',
        'ALTER DATABASE',
        'DROP DATABASE',
        'CREATE TABLE',
        'ALTER TABLE',
        'RENAME TABLE',
        'DROP TABLE',
        'CREATE INDEX',
        'DROP INDEX',
        'CREATE VIEW',
        'ALTER VIEW',
        'DROP VIEW'
      ) COLLATE utf8_bin DEFAULT NULL,
      `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'Database changes tracking for phpMyAdmin';
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__userconfig`
  --
  CREATE TABLE `pma__userconfig` (
    `username` varchar(64) COLLATE utf8_bin NOT NULL,
    `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `config_data` text COLLATE utf8_bin NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'User preferences storage for phpMyAdmin';
--
  -- Dumping data for table `pma__userconfig`
  --
INSERT INTO
  `pma__userconfig` (`username`, `timevalue`, `config_data`)
VALUES
  (
    'hani',
    '2019-09-06 06:20:27',
    '{\"collation_connection\":\"utf8mb4_unicode_ci\"}'
  );
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__usergroups`
  --
  CREATE TABLE `pma__usergroups` (
    `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
    `tab` varchar(64) COLLATE utf8_bin NOT NULL,
    `allowed` enum('Y', 'N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'User groups with configured menu items';
-- --------------------------------------------------------
  --
  -- Table structure for table `pma__users`
  --
  CREATE TABLE `pma__users` (
    `username` varchar(64) COLLATE utf8_bin NOT NULL,
    `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_bin COMMENT = 'Users and their assignments to user groups';
--
  -- Indexes for dumped tables
  --
  --
  -- Indexes for table `pma__bookmark`
  --
ALTER TABLE
  `pma__bookmark`
ADD
  PRIMARY KEY (`id`);
--
  -- Indexes for table `pma__central_columns`
  --
ALTER TABLE
  `pma__central_columns`
ADD
  PRIMARY KEY (`db_name`, `col_name`);
--
  -- Indexes for table `pma__column_info`
  --
ALTER TABLE
  `pma__column_info`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `db_name` (`db_name`, `table_name`, `column_name`);
--
  -- Indexes for table `pma__designer_settings`
  --
ALTER TABLE
  `pma__designer_settings`
ADD
  PRIMARY KEY (`username`);
--
  -- Indexes for table `pma__export_templates`
  --
ALTER TABLE
  `pma__export_templates`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `u_user_type_template` (`username`, `export_type`, `template_name`);
--
  -- Indexes for table `pma__favorite`
  --
ALTER TABLE
  `pma__favorite`
ADD
  PRIMARY KEY (`username`);
--
  -- Indexes for table `pma__history`
  --
ALTER TABLE
  `pma__history`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `username` (`username`, `db`, `table`, `timevalue`);
--
  -- Indexes for table `pma__navigationhiding`
  --
ALTER TABLE
  `pma__navigationhiding`
ADD
  PRIMARY KEY (
    `username`,
    `item_name`,
    `item_type`,
    `db_name`,
    `table_name`
  );
--
  -- Indexes for table `pma__pdf_pages`
  --
ALTER TABLE
  `pma__pdf_pages`
ADD
  PRIMARY KEY (`page_nr`),
ADD
  KEY `db_name` (`db_name`);
--
  -- Indexes for table `pma__recent`
  --
ALTER TABLE
  `pma__recent`
ADD
  PRIMARY KEY (`username`);
--
  -- Indexes for table `pma__relation`
  --
ALTER TABLE
  `pma__relation`
ADD
  PRIMARY KEY (`master_db`, `master_table`, `master_field`),
ADD
  KEY `foreign_field` (`foreign_db`, `foreign_table`);
--
  -- Indexes for table `pma__savedsearches`
  --
ALTER TABLE
  `pma__savedsearches`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `u_savedsearches_username_dbname` (`username`, `db_name`, `search_name`);
--
  -- Indexes for table `pma__table_coords`
  --
ALTER TABLE
  `pma__table_coords`
ADD
  PRIMARY KEY (`db_name`, `table_name`, `pdf_page_number`);
--
  -- Indexes for table `pma__table_info`
  --
ALTER TABLE
  `pma__table_info`
ADD
  PRIMARY KEY (`db_name`, `table_name`);
--
  -- Indexes for table `pma__table_uiprefs`
  --
ALTER TABLE
  `pma__table_uiprefs`
ADD
  PRIMARY KEY (`username`, `db_name`, `table_name`);
--
  -- Indexes for table `pma__tracking`
  --
ALTER TABLE
  `pma__tracking`
ADD
  PRIMARY KEY (`db_name`, `table_name`, `version`);
--
  -- Indexes for table `pma__userconfig`
  --
ALTER TABLE
  `pma__userconfig`
ADD
  PRIMARY KEY (`username`);
--
  -- Indexes for table `pma__usergroups`
  --
ALTER TABLE
  `pma__usergroups`
ADD
  PRIMARY KEY (`usergroup`, `tab`, `allowed`);
--
  -- Indexes for table `pma__users`
  --
ALTER TABLE
  `pma__users`
ADD
  PRIMARY KEY (`username`, `usergroup`);
--
  -- AUTO_INCREMENT for dumped tables
  --
  --
  -- AUTO_INCREMENT for table `pma__bookmark`
  --
ALTER TABLE
  `pma__bookmark`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;
--
  -- AUTO_INCREMENT for table `pma__column_info`
  --
ALTER TABLE
  `pma__column_info`
MODIFY
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
  -- AUTO_INCREMENT for table `pma__export_templates`
  --
ALTER TABLE
  `pma__export_templates`
MODIFY
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
  -- AUTO_INCREMENT for table `pma__history`
  --
ALTER TABLE
  `pma__history`
MODIFY
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
  -- AUTO_INCREMENT for table `pma__pdf_pages`
  --
ALTER TABLE
  `pma__pdf_pages`
MODIFY
  `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
  -- AUTO_INCREMENT for table `pma__savedsearches`
  --
ALTER TABLE
  `pma__savedsearches`
MODIFY
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
  -- Database: `test`
  --
  CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
-- --------------------------------------------------------
  --
  -- Table structure for table `company`
  --
  CREATE TABLE `company` (
    `company_id` int(11) NOT NULL,
    `company_name` varchar(300) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
  --
  -- Table structure for table `company_employee`
  --
  CREATE TABLE `company_employee` (
    `company_id` int(11) NOT NULL,
    `employee_id` int(11) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
  --
  -- Table structure for table `employee`
  --
  CREATE TABLE `employee` (
    `employee_id` int(11) NOT NULL,
    `employee_name` varchar(100) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
  -- Indexes for dumped tables
  --
  --
  -- Indexes for table `company`
  --
ALTER TABLE
  `company`
ADD
  PRIMARY KEY (`company_id`);
--
  -- Indexes for table `company_employee`
  --
ALTER TABLE
  `company_employee`
ADD
  PRIMARY KEY (`company_id`, `employee_id`),
ADD
  KEY `employee_id` (`employee_id`);
--
  -- Indexes for table `employee`
  --
ALTER TABLE
  `employee`
ADD
  PRIMARY KEY (`employee_id`);
--
  -- Constraints for dumped tables
  --
  --
  -- Constraints for table `company_employee`
  --
ALTER TABLE
  `company_employee`
ADD
  CONSTRAINT `company_employee_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON UPDATE CASCADE,
ADD
  CONSTRAINT `company_employee_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON UPDATE CASCADE;
  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;