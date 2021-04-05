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
        if(empty($_POST["password"])){
            $passError = "<p>Please enter your Password</p>";
            echo $passError;
        }else{
            $password = $_POST["password"];
        }

        require_once("connectdb.php");

        try {
            //Query DB to find the matching email and password
            //using prepare/bindparameter to prevent SQL injection.
                $stat = $db->prepare('SELECT password FROM userinfo WHERE email_id = ?');
                $stat->execute(array($_POST['email']));
                
                // fetch the result row and check 
                if ($stat->rowCount()>0){ 
                    $row=$stat->fetch();
    
                    //If the passwords match then start the session
                    //Using password_verify to check if the users password matches the hashed password in the database
                    if (password_verify($_POST['password'], $row['password'])){ //matching password
                        
                        //??recording the user session variable and go to loggedin page?? 
                      session_start();
                      
                        //Set the session to the username the user ended
                        $_SESSION["email"]=$_POST['email'];
                        $_SESSION["password"]=$_POST['password'];

                        //After they have successfully signed in, relocate them to the home page where they can view the events
                        header("Location:index.php");
                        exit();
                    
                    } else {
                     echo "<p>Please try again, the password does not match </p>";
                     }
                } else {
                 //else display an error
                  echo "<p>Please try again, the email isn't found </p>";
                //   echo "<p>Haven't registered yet? Click <a href="registered.php">here></a></p>";
                }
            }
            catch(PDOException $ex) {
                echo("Failed to connect to the database.<br>");
                // echo($ex->getMessage());
                exit;
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
            <h2>Sign-in</h2>
            <form id="details" method="post" action="signin.php">
            <input type="email" placeholder="Email" name="email" pattern=".+(aston\.ac\.uk)" title="Please enter your aston email address." required/>
            <input type="password" placeholder="Password" name="password" required/>
            <!-- <input type="name" placeholder="Name" name="name" required/> -->
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