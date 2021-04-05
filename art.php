<?php
   session_start();

   //Connect to the database
   require_once('connectdb.php');

   //The events ID used to get the data from the database
   $eventID = 2;
   //This statement is used later for displaying the event details
   $query =  "SELECT * FROM events WHERE event_id = $eventID";

   //If they've pressed the book now button, check if they have logged-in
   if(isset($_POST["booked"])){

       //If they have not signed in then relocate them to the sign-in page
       if (!isset($_SESSION['email'])){
           //If not then take them to the sign-in page
           header("location:signin.php");  
           exit();
       }

       //Get the data from the sessions
       $email = $_SESSION['email'];
        // echo $email;


        try{
            //Insert the users data into the database
            $sth=$db->prepare("insert into bookings values(default,?,?)");
            $sth->execute(array($email, $eventID));
            header("location:booked.php");
 
        }catch (PDOException $ex) {
         echo "Sorry, a database error occurred! <br>";
         echo "Error details: <em>". $ex->getMessage()."</em>";   
           }

   }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="art.css?v=<?php echo time(); ?>"/>
    <script src="likeBtn.js"></script>
    <title>Art</title>
</head>
<body>
    <header>
        <?php
            include("header.php");
        ?>
    </header>

    <section id="start">
        <h3>Lorem ipsum dolor sit amet</h3>
        <p>Ut enim ad minim veniam</p>
    </section>

    <main>
    <section id="event-details">
            <?php 
            //Get the details form the database to be displayed on the event page
                try{
                    $details =  $db->query($query);
        
                    if ( $details && $details->rowCount()> 0) {
        
                        while  ($row =  $details->fetch())	{
                            $name = $row['name'];
                            echo "<p> $name </p>";
                            $place = $row['place'];
                            echo "<p> $place </p>";
                            $date = $row['date'];
                            echo "<p> $date </p>";
                            $organiser = $row['organiser'];
                            echo "<p>Contact Details: $organiser </p>";
                        }
                    }
        
                }catch (PDOException $ex) {
                    echo "Sorry, a database error occurred! <br>";
                    echo "Could not find event details! <br>";
                    echo "Error details: <em>". $ex->getMessage()."</em>";   
                    
                }
             ?>

            <!-- For the like button, if its clicked, it chnages colour-->
            <div class="likesection">
                <button id=likebtn onclick="changeColor()"><a>Like</a></button>
            </div>
        </section>

        <!-- Displays the additional information the user may need to know for the event-->
        <section id="extra-info">
            <h2>Get involved into Aston's own Football competition!</h2>
            <div class="benefit">
                <h4>What we have on offer for you:</h4>
                <p>Nullam dictum felis eu pede</p>
                <p>Aenean leo ligula, porttitor eu</p>
                <p>Aenean imperdiet. Etiam ultricies nisi vel augue</p>
            </div>
            <div class="benefit">
                <h4>More Details</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
            </div>
        </section>

        <!-- Creates the booking button that allows the user to book this event-->
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