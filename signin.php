<?php
    //If they've pressed the sign- button
     if (isset($_POST['submitted'])){

        //If they havent entered the email adress then send an appropriate error
        if(empty($_POST["email"])){
            $emailError = "<p>Please enter your email</p>";
            echo $emailError;
        }else{
            $email = $_POST["email"];
            //Check if the email enetered matches the required format
            if(strpos($email, "@aston.ac.uk") === false){
                echo "<p>Please enter your Aston Email Adress</p>";
            }
        }

        //If they havent entered the email adress then send an appropriate error
        if(empty($_POST["name"])){
            $nameError = "<p>Please enter your name</p>";
            echo $nameError;
        }else{
            $name = $_POST["name"];
            // if (!preg_match('^[a-zA-Z]+$', $name)){
            //     echo "<p>Please enter a valid name</p>";
            // }
        }

        require_once("connectdb.php");

        session_start();
        header("Location:index.php");
     }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signin.css"/>
    <title>Document</title>
</head>
<body>
    <header>
        <?php
            include("header.php");
        ?>
    </header>

    <main>
        <section id="signin">
            <h2>Sign-in</h2>
            <form id="signin" method="post" action="signin.php">
            <input type="email" placeholder="Email" name="email" pattern=".+(aston\.ac\.uk)" title="Please enter your aston email address." required/>
            <input type="name" placeholder="Name" name="name" required/>
            <!-- <button class="main__btn"><a href="#">Sign-in</a></button> -->
            <input type="submit" value="Sign-in" class="main__btn"/>
            <input type="hidden" name="submitted" value="true"/>

          </form>
        </section>
    </main>

    <?php
        include("footer.php");
    ?>
</body>
</html>