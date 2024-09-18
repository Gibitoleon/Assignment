use assignment

CREATE TABLE users (

   id bigint(10) NOT NULL  auto_increment,
   email VARCHAR(50) NOT NULL  DEFAULT  UNIQUE '',
   username VARCHAR(50) NOT NULL  DEFAULT '',
   firstname VARCHAR(50) NOT NULL  DEFAULT '',
   lastname VARCHAR(50) NOT NULL  DEFAULT '',
   password VARCHAR(255) NOT NULL  DEFAULT '',
   

   PRIMARY_KEY(userId),
  

)