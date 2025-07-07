--Create Data base called => crud_api 
--Support arbic lang using : utf8mb4_general_ci encoding
                    -- character set=> يخزن الحروف إزاي
                                -- as => utf8mb4 
                    -- Collation =>يقارن الحروف إزاي ويرتبها
                                -- as => utf8mb4_unicode_ci

Create database crud_api
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------

create table users(
    id int primary key auto_increment,
    fname varchar(50) not null,
    lname varchar(50) not null,
    age decimal(5,2) ,
);