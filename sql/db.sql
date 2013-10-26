create database marketify;

create table recipes (
       id int not null auto_increment primary key,
       name varchar(64) not null,
       description blob,
       add_ts bigint not null,
       url varchar(255) not null
       -- feature list
       -- params
);

create table rates (
       id int not null auto_increment primary key,
       rid int not null references recipes(id),
       rate tinyint not null,
       ip varchar(15) not null
);