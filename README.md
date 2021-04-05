# CS1IADWebsite

The tables:

CREATE TABLE events ( `event_id` INT NOT NULL AUTO_INCREMENT ,
`category` VARCHAR(256) NOT NULL ,
`name` VARCHAR(256) NOT NULL ,
`date` DATE NOT NULL ,
`description` VARCHAR(8000) NOT NULL ,
`place` VARCHAR(256) NOT NULL ,
`organiser` VARCHAR(256) NOT NULL ,
PRIMARY KEY (`event_id`)) ENGINE = InnoDB;

CREATE TABLE userinfo ( `email_id` VARCHAR(256) NOT NULL ,
`password` VARCHAR(256) NOT NULL ,
`name` VARCHAR(256) NOT NULL ,
PRIMARY KEY (`email_id`)) ENGINE = InnoDB;

CREATE TABLE bookings ( `booking_id` INT NOT NULL AUTO_INCREMENT ,
`email_fk` VARCHAR(256) NOT NULL ,
`event_fk` INT NOT NULL ,
PRIMARY KEY (`booking_id`)) ENGINE = InnoDB;
