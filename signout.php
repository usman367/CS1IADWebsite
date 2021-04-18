<?php   

        session_start();
        session_destroy();

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="signout.css" />
     <title>Document</title>
 </head>

    <?php
        include("header.php")
    ?>

    <main>
        <h2 class="message">You have successfully signed-out</h2>
        <p class="message">You can sign-in again from <a href="signin.php">here!</a></p>
    </main>

    <?php
        include("footer.php")
    ?>

 <body>
     
 </body>
 </html>