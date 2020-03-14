CREATE DATABASE contacts_ten COLLATE utf8_unicode_ci;
USE contacts_ten;
CREATE TABLE users(
    id int(11) auto_increment primary key,
    name varchar(255),
    email varchar(150),
    password varchar(255),
    created_at datetime,
    updated_at datetime
);