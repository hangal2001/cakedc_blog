-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2015 at 05:02 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` varchar(36) NOT NULL,
  `parent_id` varchar(36) DEFAULT NULL,
  `foreign_key` varchar(36) NOT NULL,
  `user_id` varchar(36) DEFAULT NULL,
  `lft` int(10) NOT NULL,
  `rght` int(10) NOT NULL,
  `model` varchar(255) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `is_spam` varchar(20) NOT NULL DEFAULT 'clean',
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `body` text,
  `author_name` varchar(255) DEFAULT NULL,
  `author_url` varchar(255) DEFAULT NULL,
  `author_email` varchar(128) NOT NULL DEFAULT '',
  `language` varchar(6) DEFAULT NULL,
  `comment_type` varchar(32) NOT NULL DEFAULT 'comment',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients_recipes`
--

CREATE TABLE IF NOT EXISTS `ingredients_recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredient_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `topic_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `topic_id`, `user_id`, `body`, `created`, `modified`) VALUES
(11, 41, 0, 'this for topic 41', '2015-04-16 16:37:57', '2015-04-16 16:37:57'),
(3, 0, 0, 'ghjghjg', '2015-04-15 22:35:44', '2015-04-15 22:35:44'),
(4, 0, 0, 'ghjghjg', '2015-04-15 22:35:46', '2015-04-15 22:35:46'),
(8, 0, 0, 'new posts', '2015-04-16 15:36:41', '2015-04-16 15:36:41'),
(9, 0, 0, 'new posts', '2015-04-16 15:38:04', '2015-04-16 15:38:04'),
(10, 43, 0, 'body', '2015-04-16 16:17:50', '2015-04-16 16:17:50'),
(12, 41, 0, 'this for topic 41', '2015-04-16 16:38:58', '2015-04-16 16:38:58'),
(13, 41, 0, 'this for topic 41', '2015-04-16 16:40:43', '2015-04-16 16:40:43'),
(14, 0, 0, 'text 43', '2015-04-16 16:46:26', '2015-04-16 16:46:26'),
(15, 0, 0, 'new body for this topic', '2015-04-16 17:01:33', '2015-04-16 17:01:33'),
(16, 0, 0, 'new', '2015-04-16 17:05:33', '2015-04-16 17:05:33'),
(17, 0, 0, 'new post', '2015-04-16 17:07:09', '2015-04-16 17:07:09'),
(18, 0, 0, 'new post', '2015-04-16 17:12:36', '2015-04-16 17:12:36'),
(19, 0, 0, 'post', '2015-04-16 17:18:59', '2015-04-16 17:18:59'),
(20, 28, 2, 'body of the 28', '2015-04-23 22:25:16', '2015-04-23 22:25:16'),
(1, 54, 2015, 'asddsfsdgdfgk kjdfkjkskl hjdhkfdgkdf fdgkjdflgj dflkgjl k j h h hgh ghj', '2015-05-04 00:00:00', '2015-05-12 00:00:00'),
(21, 0, 0, 'jldkgldfkjglk jlkjfdlgjldfkj glkfjdkl fdgdfgrt', '2015-05-11 18:37:18', '2015-05-11 18:37:18'),
(22, 0, 0, 'jldkgldfkjglk jlkjfdlgjldfkj glkfjdkl fdgdfgrt', '2015-05-11 18:37:46', '2015-05-11 18:37:46'),
(23, 0, 0, 'dfgdf', '2015-05-11 18:38:18', '2015-05-11 18:38:18'),
(32, 49, 0, 'new post', '2015-05-18 16:38:06', '2015-05-18 16:38:06'),
(31, 51, 0, 'gh', '2015-05-18 16:37:40', '2015-05-18 16:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` varchar(36) NOT NULL,
  `user_id` varchar(36) NOT NULL,
  `foreign_key` varchar(36) NOT NULL,
  `model` varchar(255) NOT NULL,
  `value` float(8,4) DEFAULT '0.0000',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_RATING` (`user_id`,`foreign_key`,`model`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `foreign_key`, `model`, `value`, `created`, `modified`) VALUES
('55564ace-afb8-4039-be90-12348a331d96', '55536f45-6318-449a-bc2f-1bfc8a331d96', '15', 'Post', 3.0000, '2015-05-15 14:36:46', '2015-05-15 14:36:46'),
('55564d19-967c-48a3-b084-12348a331d96', '55536f45-6318-449a-bc2f-1bfc8a331d96', '1', 'Post', 3.0000, '2015-05-15 14:46:33', '2015-05-15 14:46:33'),
('55564f59-f504-408e-ad34-12348a331d96', '55536f45-6318-449a-bc2f-1bfc8a331d96', '20', 'Post', 2.0000, '2015-05-15 14:56:09', '2015-05-15 14:56:09'),
('55564f8a-1814-42d8-8c6e-12348a331d96', '55536f45-6318-449a-bc2f-1bfc8a331d96', '18', 'Post', 4.0000, '2015-05-15 14:56:58', '2015-05-15 14:56:58'),
('55564ff7-1394-4bb8-8259-12348a331d96', '55536f45-6318-449a-bc2f-1bfc8a331d96', '22', 'Post', 3.0000, '2015-05-15 14:58:47', '2015-05-15 14:58:47'),
('55565032-de1c-4d6a-b64f-12348a331d96', '55536f45-6318-449a-bc2f-1bfc8a331d96', '13', 'Post', 1.0000, '2015-05-15 14:59:46', '2015-05-15 14:59:46'),
('555a0cb0-5e98-4274-8214-0fcc8a331d96', '55536f45-6318-449a-bc2f-1bfc8a331d96', '8', 'Post', 3.0000, '2015-05-18 11:00:48', '2015-05-18 11:00:48'),
('555a393d-f2f0-43f1-90f8-0fcc8a331d96', '55536f45-6318-449a-bc2f-1bfc8a331d96', '10', 'Post', 3.0000, '2015-05-18 14:10:53', '2015-05-18 14:10:53'),
('555a3af6-7438-4845-9a30-0fcc8a331d96', '55536f45-6318-449a-bc2f-1bfc8a331d96', '19', 'Post', 4.0000, '2015-05-18 14:18:14', '2015-05-18 14:18:14'),
('555a3b23-38d8-434b-b6d5-0fcc8a331d96', '55536f45-6318-449a-bc2f-1bfc8a331d96', '9', 'Post', 2.0000, '2015-05-18 14:18:59', '2015-05-18 14:18:59'),
('555a3b92-6698-45e5-862c-0fcc8a331d96', '55536f45-6318-449a-bc2f-1bfc8a331d96', '3', 'Post', 4.0000, '2015-05-18 14:20:50', '2015-05-18 14:20:50'),
('555a3d33-3708-42aa-aa4d-0fcc8a331d96', '55536f45-6318-449a-bc2f-1bfc8a331d96', '11', 'Post', 5.0000, '2015-05-18 14:27:47', '2015-05-18 14:27:47'),
('555a3f3f-4e00-4460-a895-0fcc8a331d96', '55536f45-6318-449a-bc2f-1bfc8a331d96', '14', 'Post', 5.0000, '2015-05-18 14:36:31', '2015-05-18 14:36:31'),
('555a4265-34b0-440e-935e-0fcc8a331d96', '55536f45-6318-449a-bc2f-1bfc8a331d96', '16', 'Post', 4.0000, '2015-05-18 14:49:57', '2015-05-18 14:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE IF NOT EXISTS `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `schema_migrations`
--

CREATE TABLE IF NOT EXISTS `schema_migrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `schema_migrations`
--

INSERT INTO `schema_migrations` (`id`, `class`, `type`, `created`) VALUES
(1, 'InitMigrations', 'Migrations', '2015-05-04 22:24:16'),
(2, 'ConvertVersionToClassNames', 'Migrations', '2015-05-04 22:24:16'),
(3, 'IncreaseClassNameLength', 'Migrations', '2015-05-04 22:24:16'),
(4, 'M49ac311a54844a9d87o822502jedc423', 'Tags', '2015-05-04 22:24:16'),
(5, 'M4c0d42bcd12c4db099c105f40e8f3d6d', 'Tags', '2015-05-04 22:24:16'),
(6, 'M8d01880f01c11e0be500800200c9a66', 'Tags', '2015-05-04 22:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `tagged`
--

CREATE TABLE IF NOT EXISTS `tagged` (
  `id` varchar(36) NOT NULL,
  `foreign_key` varchar(36) NOT NULL,
  `tag_id` varchar(36) NOT NULL,
  `model` varchar(255) NOT NULL,
  `language` varchar(6) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `times_tagged` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_TAGGING` (`model`,`foreign_key`,`tag_id`,`language`),
  KEY `INDEX_TAGGED` (`model`),
  KEY `INDEX_LANGUAGE` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagged`
--

INSERT INTO `tagged` (`id`, `foreign_key`, `tag_id`, `model`, `language`, `created`, `modified`, `times_tagged`) VALUES
('5547dbbf-f988-4a39-96d5-0db88a331d96', '51', '5547dbbf-4008-490e-873b-0db88a331d96', 'Topic', 'en-us', '2015-05-04 22:51:11', '2015-05-04 22:51:11', 1),
('554b8ed2-071c-460b-a5aa-12488a331d96', '52', '554b8ed2-5adc-4112-9e2b-12488a331d96', 'Topic', 'en-us', '2015-05-07 18:12:02', '2015-05-07 18:12:02', 1),
('5550d676-b63c-4be0-8f9e-10f08a331d96', '54', '5550d676-ef7c-4f05-8637-10f08a331d96', 'Topic', 'en-us', '2015-05-11 18:19:02', '2015-05-11 18:19:02', 1),
('5551107c-4c6c-4b51-b8ad-10f08a331d96', '55', '5551107c-26cc-426a-b7fa-10f08a331d96', 'Topic', 'en-us', '2015-05-11 22:26:36', '2015-05-11 22:26:36', 1),
('55521202-d05c-4719-b756-0c488a331d96', '56', '55521202-3e9c-4728-8031-0c488a331d96', 'Topic', 'en-us', '2015-05-12 16:45:22', '2015-05-12 16:45:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` varchar(36) NOT NULL,
  `identifier` varchar(30) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `keyname` varchar(30) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `occurrence` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_TAG` (`identifier`,`keyname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `identifier`, `name`, `keyname`, `created`, `modified`, `occurrence`) VALUES
('5547dbbf-4008-490e-873b-0db88a331d96', NULL, 'tagged my', 'taggedmy', '2015-05-04 22:51:11', '2015-05-04 22:51:11', 1),
('554b8ed2-5adc-4112-9e2b-12488a331d96', NULL, 'topic tag', 'topictag', '2015-05-07 18:12:02', '2015-05-07 18:12:02', 1),
('5550d676-ef7c-4f05-8637-10f08a331d96', NULL, 'new post', 'newpost', '2015-05-11 18:19:02', '2015-05-11 18:19:02', 1),
('5551107c-26cc-426a-b7fa-10f08a331d96', NULL, 'old post', 'oldpost', '2015-05-11 22:26:36', '2015-05-11 22:26:36', 1),
('55521202-3e9c-4728-8031-0c488a331d96', NULL, 'fjfjf', 'fjfjf', '2015-05-12 16:45:22', '2015-05-12 16:45:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `title` varchar(100) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `title_2` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `user_id`, `title`, `visible`, `created`, `modified`) VALUES
(51, 0, 'My taggable topic', 1, '2015-05-04 22:51:11', '2015-05-13 16:35:48'),
(49, 0, 'new topic', 1, '2015-04-16 17:15:52', '2015-04-16 17:15:52'),
(47, 0, 'new post 2', 0, '2015-04-16 16:34:07', '2015-04-16 16:34:07'),
(46, 0, 'new post', 1, '2015-04-16 16:31:08', '2015-04-16 16:31:08'),
(52, 0, 'new topic with tags', 0, '2015-05-07 18:12:02', '2015-05-07 18:12:02'),
(28, 0, 'edited', 1, '2015-04-13 19:08:40', '2015-04-15 16:44:04'),
(56, 0, 'new', 1, '2015-05-12 16:45:22', '2015-05-12 16:45:22'),
(50, 0, 'my new topic', 1, '2015-04-30 20:20:24', '2015-04-30 20:20:24'),
(55, 0, 'old post', 1, '2015-05-11 22:26:36', '2015-05-11 22:26:36'),
(53, 0, 'my new post with topic id', 0, '2015-05-11 18:18:36', '2015-05-11 18:18:36'),
(54, 0, 'new post last', 1, '2015-05-11 18:19:02', '2015-05-11 18:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `password_token` varchar(128) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT '0',
  `email_token` varchar(255) DEFAULT NULL,
  `email_token_expires` datetime DEFAULT NULL,
  `tos` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_action` datetime DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `role` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `BY_USERNAME` (`username`),
  KEY `BY_EMAIL` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `slug`, `password`, `password_token`, `email`, `email_verified`, `email_token`, `email_token_expires`, `tos`, `active`, `last_login`, `last_action`, `is_admin`, `role`, `created`, `modified`) VALUES
('55427b66-e1b8-44aa-8a00-120c8a331d96', 'Khangal', '', '13c70ac78dca63207ab87f3309c499578f476a66', NULL, 'hangal2001@gmail.com', 1, NULL, NULL, 1, 1, '2015-05-13 16:38:56', NULL, 1, 'admin', '2015-04-30 20:58:46', '2015-05-13 16:38:56'),
('55536f45-6318-449a-bc2f-1bfc8a331d96', 'user1', '', 'b3c8e27eb4cd29eb5278878dd814e9c7694f9834', NULL, 'user1@gmail.com', 1, '0kofaew7c8', '2015-05-14 11:35:33', 1, 1, '2015-05-18 17:00:08', NULL, 0, 'registered', '2015-05-13 11:35:33', '2015-05-18 17:00:08'),
('5554aea9-4f1c-4552-be70-05648a331d96', 'user2', '', '5d75a83502354e928289deb94f50dd683911811c', NULL, 'user2@gmail.com', 0, '0bktzy3d47', '2015-05-15 09:18:17', 1, 1, NULL, NULL, 0, 'registered', '2015-05-14 09:18:17', '2015-05-14 09:18:17'),
('5554af3e-5304-4ea3-83cf-0d008a331d96', 'ken', '', 'b3c8e27eb4cd29eb5278878dd814e9c7694f9834', NULL, 'ken@gmail.com', 1, 'blzp4ynsrm', '2015-05-15 09:20:46', 1, 1, '2015-05-14 09:21:17', NULL, 0, 'registered', '2015-05-14 09:20:46', '2015-05-14 09:21:17'),
('5554ec31-23b8-4775-b74e-1bf48a331d96', 'user12', '', '252172b1b061493836c4d9897e7ee6d50822300c', NULL, 'user12@gmail.com', 1, '21zd64nemb', '2015-05-15 13:40:49', 1, 1, '2015-05-15 09:24:02', NULL, 0, 'registered', '2015-05-14 13:40:49', '2015-05-15 09:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` varchar(36) NOT NULL,
  `user_id` varchar(36) NOT NULL,
  `position` float NOT NULL DEFAULT '1',
  `field` varchar(255) NOT NULL,
  `value` text,
  `input` varchar(16) NOT NULL,
  `data_type` varchar(16) NOT NULL,
  `label` varchar(128) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_PROFILE_PROPERTY` (`field`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
