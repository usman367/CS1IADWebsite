<?php
   session_start();

   //If they've pressed the book now button, check if they have logged-in
   if(isset($_POST["booked"])){
       //If they have not signed in then relocate them to the sign-in page
       if (!isset($_SESSION['email'])){
           //If not then take them to the sign-in page
           header("location:signin.php");  
           exit();
       }
       //Get the data from 
       $email = $_SESSION['email'];
       $name = $_SESSION['name'];
       $event = "Art Exhibition";

       //Connect to the database
       require_once('connectdb.php');

       try{
           $sth=$db->prepare("insert into userinfo values(default,?,?,?)");
           $sth->execute(array($email, $name, $event));
           header("location:booked.php");

       }catch (PDOException $ex) {
        echo "Sorry, a database error occurred! <br>";
        echo "Error details: <em>". $ex->getMessage()."</em>";   
           ?>

          <p>Sorry 2, a database error occurred. Please try again.</p>
          <p>(Error details: <?= $ex->getMessage() ?>)</p>

      <?php
          }
   }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="events.css"/>
     <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <header>
        <?php
            include("header.php");
        ?>
    </header>

    <section id="start">
        <h3>Back in the game</h3>
        <p>Get ready for kick off</p>
    </section>

    <main>
        <section id="event-details">
            <p>Aston Hall</p>
            <p>10th March<p>
            <p>10 am</p>
            <p>Contact details: emilyjohnson@aston.ac.uk</p>
        </section>

        <section id="extra-info">
            <h2>Get involved into Aston's own Football competition!</h2>
            <div class="benefit">
                <h4>What we have on offer for you:</h4>
                <p>Several prizes to win form</p>
                <p>Free food and drinks</p>
                <p>Lots of mini-games in-between matches</p>
            </div>
            <div class="benefit">
                <h4>More Details</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
            </div>
        </section>

        <section id="booking">
            <h2>Book Now with just one click!</h2>
            <form id="booking" method = "post" action="art.php">
                <button class="main__btn"><a>Book Now</a></button>
	            <input type="hidden" name="booked" value="true"/>

          </form>
        </section>
    </main>

    <br>
    
    <?php
        include("footer.php");
    ?>
</body>
</html>