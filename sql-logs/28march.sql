CREATE TABLE `tasks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `purpose` varchar(300) DEFAULT NULL,
  `description` text,
  `address` varchar(300) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `status` enum('open','close') DEFAULT 'open',
  `last_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;