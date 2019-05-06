---- drop ----
DROP TABLE IF EXISTS `board`;
DROP TABLE IF EXISTS `user`;

---- create ----
CREATE TABLE IF NOT EXISTS `comment`
(
 `id`               INT(20) AUTO_INCREMENT,
 `user_id`          INT(20),
 `message`          TEXT NOT NULL,
 `active`           SMALLINT DEFAULT 1,
 `created_at`       DATETIME DEFAULT NULL,
 `updated_at`       DATETIME DEFAULT NULL,
    PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE IF NOT EXISTS `child_comment`
(
 `id`                   INT(20) AUTO_INCREMENT,
 `user_id`              INT(20),
 `parent_comment_id`    INT(20),
 `message`              TEXT NOT NULL,
 `active`               SMALLINT DEFAULT 1,
 `created_at`           DATETIME DEFAULT NULL,
 `updated_at`           DATETIME DEFAULT NULL,
    PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE IF NOT EXISTS `user`
(
 `id`               INT(20) AUTO_INCREMENT,
 `name`             TEXT NOT NULL,
 `user_name`        TEXT,
 `email`            TEXT NOT NULL,
 `salt`             TEXT NOT NULL,
 `password`         TEXT NOT NULL,
 `memo`             TEXT NOT NULL,
 `active`           SMALLINT DEFAULT 1,
 `created_at`       DATETIME DEFAULT NULL,
 `updated_at`       DATETIME DEFAULT NULL,
    PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;