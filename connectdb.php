<?php
    // Creates a PDO object called $db and establishes the MySQL
    //database connection

    $db_host = 'localhost';
    $db_name = 'astonEvents';
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

