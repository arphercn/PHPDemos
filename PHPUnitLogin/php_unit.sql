CREATE TABLE php_unit(
id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
account VARCHAR(20) NOT NULL,
password VARCHAR(20) NOT NULL
);

INSERT php_unit(account,password) VALUES('admin','123456');