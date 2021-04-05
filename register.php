<?php

    //If they've pressed submit, then do some checks, before inserting their data into the database
    if (isset($_POST['submitted'])){
    
        // connect to the database
        require_once('connectdb.php');
        
        $email=isset($_POST['email'])?$_POST['email']:false;
        $password=isset($_POST['password'])?password_hash($_POST['password'],PASSWORD_DEFAULT):false;
        // $password=isset($_POST['password'])?$_POST['password']:false;
        $password2=isset($_POST['password2'])?$_POST['password2']:false;
        $name=isset($_POST['name'])?$_POST['name']:false;

        //If the user hasn't entered the fields then give them an appropriate message

        if(empty($email)){
            $emailError = "<p>Please enter your email</p>";
            echo $emailError;
            exit;
        }//Check if the email enetered matches the required format
        elseif(strpos($email, "@aston.ac.uk") === false){
                echo "<p>Please enter your Aston Email Adress</p>";
                exit;
        }

        //Check the password and confirm password fields are not empty
        if(empty($password)){
            $passError = "<p>Please enter your password</p>";
            echo $passError;
            exit;
         }
        //else{
        //     //$password = $_POST['password'];
        //         // $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        //         $password = $_POST['password'];

        // }

        if(empty($password2)){
            $pass2Error = "<p>Please enter your confirmed password</p>";
            echo $pass2Error;
            exit;
        }

        //If they havent entered the email adress then send an appropriate error
        if(empty($_POST["name"])){
            $nameError = "<p>Please enter your name</p>";
            echo $nameError;
            exit;
         }
         //else{
        //     $name = $_POST["name"];
        // }

        // echo $password;



        try{        
        
            #register user by inserting the user info into the database
            $stat=$db->prepare("insert into userinfo values(?,?,?)");
            $stat->execute(array( $email, $password, $name));

            //Take them to the registered page, to confirm they've been registered
            header("location:registered.php");
        
        }
        catch (PDOexception $ex){
            //If we were unsuccessful to enter the data into the database, then inform the user
            echo "Sorry, a database error occurred! <br>";
            echo "Please try again!<br>";
            // echo "Error details: <em>". $ex->getMessage()."</em>";
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userdetails.css"/>
    <script src="validatePassword.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <?php
            include("header.php");
        ?>
    </header>

    <main>
        <section id="details">
            <h2>Register Now!</h2>
            <form id="details" method="post" action="register.php">
            <input type="email" placeholder="Email" name="email" pattern=".+(aston\.ac\.uk)" title="Please enter your aston email address." required/>
            <input type="password" placeholder="Password" name="password" id="pass1" required/>
            <input type="password" placeholder="Confirm Password" name="password2" id="pass2" required/>
            <input type="name" placeholder="Name" name="name" required/>
            <!-- <button class="main__btn"><a href="#">Sign-in</a></button> -->
            <input type="submit" value="Register" class="main__btn"/>
            <input type="hidden" name="submitted" value="true"/>

          </form>
        </section>
    </main>

    <?php
        include("footer.php");
    ?>
</body>
</html>