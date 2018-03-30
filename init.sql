CREATE TABLE individual (
  id         INT  NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  generation INT  NOT NULL,
  distance   INT  NOT NULL,
  is_elite   BOOL NOT NULL,
  individual TEXT NOT NULL
)
  ENGINE INNODB, CHARSET utf8mb4;