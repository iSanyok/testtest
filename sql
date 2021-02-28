CREATE DATABASE test;
CREATE TABLE posts (id BIGINT(20) NOT NULL AUTO_INCREMENT,
 user_id BIGINT(20),
  title varchar(255),
   body varchar(500),
    PRIMARY KEY (id));
CREATE TABLE comments (id BIGINT(20) NOT NULL AUTO_INCREMENT,
 post_id BIGINT(20),
  name varchar(255),
   email varchar(255),
    body varchar(500),
     PRIMARY KEY (id),
      FOREIGN KEY (post_id) REFERENCES posts(id));
