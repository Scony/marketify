create database marketify;

create table recipes (
       name varchar(64) primary key,
       forked varchar(64),
       description blob not null,
       code blob not null,
       ts bigint not null,
       url varchar(255) not null
);

create table rates (
       recipe varchar(64) not null,
       rate tinyint not null,
       ip varchar(15) not null,
       primary key(recipe,ip)
);