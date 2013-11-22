create database marketify;

create table recipes (
       name varchar(64) primary key,
       forked varchar(64),
       description blob not null,
       code blob not null,
       ts bigint not null,
       url varchar(255) not null
       -- todo:
       -- feature list
       -- params
);

create table rates (
       id int not null auto_increment primary key,
       rid int not null references recipes(id),
       rate tinyint not null,
       ip varchar(15) not null
);