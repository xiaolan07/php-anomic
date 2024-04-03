-- 
-- Created by SQL::Translator::Producer::MySQL
-- Created on Mon Sep 14 01:35:47 2009
-- 
SET foreign_key_checks=0;

--
-- Table: `article`
--
CREATE TABLE `article` (
  `id` INTEGER NOT NULL,
  `title` text,
  `closed` NUMERIC,
  `content` text,
  PRIMARY KEY (`id`)
);

--
-- Table: `comment`
--
CREATE TABLE `comment` (
  `id` INTEGER NOT NULL,
  `id_article` NUMERIC,
  `title` text,
  `id_user` NUMERIC,
  `content` text,
  PRIMARY KEY (`id`)
);

--
-- Table: `user`
--
CREATE TABLE `user` (
  `id` INTEGER NOT NULL,
  `login` text,
  `name` text,
  `password` text,
  `url` text,
  PRIMARY KEY (`id`)
);

SET foreign_key_checks=1;

