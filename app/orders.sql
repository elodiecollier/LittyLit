CREATE TABLE orders (id varchar(10) NOT NULL UNIQUE,
                       firstName varchar(15) NOT NULL,
                       lastName VARCHAR(30) NOT NULL ,
                       username VARCHAR(30) NOT NULL , 
                       order_id VARCHAR(30) NOT NULL, 
                       confirmation_id VARCHAR(320) NOT NULL , 
                       Address    VARCHAR(120),
                       day_ordered        VARCHAR(100) NOT NULL,
                    
                       PRIMARY KEY (username));