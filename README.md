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
`email_id` VARCHAR(256) NOT NULL ,
`event_id` INT NOT NULL ,
PRIMARY KEY (`booking_id`)) ENGINE = InnoDB;

//connectdb
<?php

    $db_host = 'localhost';
    $db_name = 'astonevents';
    $username = 'root';
    $password = '';

    try{
        $db = new PDO("mysql:host=$db_host;dbname=$db_name", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
           
            ?>
            <p>Sorry, a database error occurred.</p>
            <p> Error details: <em> <?= $ex->getMessage() ?> </em></p>
        <?php
            }
        ?>

//Event booking
   try{
           $sth=$db->prepare("insert into bookings values(default,?,?)");
           $sth->execute(array($email, $eventID));
           header("location:booked.php");
           //echo "Congratulations you have successfully booked this event";

       }catch (PDOException $ex) {
        echo "Sorry, a database error occurred! <br>";
        echo "Error details: <em>". $ex->getMessage()."</em>";   
           ?>

          <p>Sorry 2, a database error occurred. Please try again.</p>
          <p>(Error details: <?= $ex->getMessage() ?>)</p>

      <?php
          }
