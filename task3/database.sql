create databse crud_api
character set ustf8mb4
collate ustf8mb4_unicide_ci;


--create table (users)
create table users(
    id int primary key auto_increment,
    username varchar(100) not null unique,
    age decimal(5,2) not null
);