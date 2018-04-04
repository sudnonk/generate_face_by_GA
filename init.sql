CREATE TABLE individual (
  id         INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
  exp_num    INT  NOT NULL,
  generation INT  NOT NULL,
  distance   INT  NOT NULL,
  individual TEXT NOT NULL
)
  ENGINE INNODB, CHARSET utf8mb4;