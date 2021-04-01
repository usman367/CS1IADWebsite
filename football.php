<?php
   session_start();
//    $email = $_SESSION['email'];
//    $password = $_SESSION['password'];
//    echo $email;
//    echo $password;

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
       $eventID = 1;
       $password = $_SESSION['password'];
       $event = "5-a-side Football Tournament";
        // echo $email;
        // echo $password;

        //Connect to the database
       require_once('connectdb.php');

        // try{
        //     $stat = $db->prepare('SELECT user_id FROM userdetails WHERE email = ?');
		// 	$userID = $stat->execute(array($email));
        //     echo $userID;
        // }catch (PDOException $ex) {
        //     echo "Sorry, could not identify your id! <br>";
        // }

        // try{
        //     $stat = $db->prepare('SELECT event_id FROM events WHERE name = ?');
		// 	$eventID = $stat->execute(array($event));
        //     echo $eventID;
        // }catch (PDOException $ex) {
        //     echo "Sorry, could not identify the event! <br>";
        // }


        
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
            <p>Aston Sports Hall</p>
            <p>5th March<p>
            <p>12 pm</p>
            <p>Contact details: johnsmith@aston.ac.uk</p>
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
                <p>Please bring your own Astro Turf trainers and appropriate kit to wear. Refreshments will be available on-site.</p>
            </div>
        </section>

        <section id="booking">
            <h2>Book Now with just one click!</h2>
            <form id="booking" method = "post" action="football.php">
                <button class="main__btn"><a>Book Now</a></button>
	            <input type="hidden" name="booked" value="true"/>

          </form>
        </section>
    </main>

    <br>

    <!-- <section id="extra-info">
            <h2>Get involved into Aston's own Football competition!</h2>
            <div class="benefit">
                <h5>More Details</h5>
                <ul>
                    <li>Contact details: johnsmith@aston.ac.uk</li>
                    <li>Venue: Aston Sports hall</li>
                    <li>Date: 05-05-21</li>
                    <li>Time: 12pm</li>
                </ul>
            </div>
            <div class="benefit">
                <h5>What we have on offer for you:</h3>
                <ul>
                    <li>Several prizes to win form</li>
                    <li>Free food and drinks</li>
                    <li>Lots of mini-games in-between matches</li>
                </ul>
            </div>
        </section>
        <div id="like-btn">
            <i onclick="myFunction(this)" class="fa fa-thumbs-up fa-3x"></i>
        <div> -->

    <!-- <section id="booking">
        <h2>Book NOW!</h2>
        <form id="booking">
        <input type="email"
           placeholder="Email"
           name="email"
           required
           pattern=".+(\.ac\.uk)"
           title="Please enter your aston email address."/>
        <input type="name"
          placeholder="Name"
          name="name"
          required />
        <input type="submit"
          value="Book Now" />
      </form>
    </section> -->
    

    <?php
        include("footer.php");
    ?>
</body>
</html>