<?php
   session_start();

   //Connect to the database
   require_once('connectdb.php');

   //The events ID used to get the data from the database
   $eventID = 2;

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



        //Firstly, checks if the user has already booked the event
        //If they haven't booked the event, then it adds their details to the bookings table
        try{
            //Get all the rows where the email and the event id are equal to the users email and this events id
            $query = "SELECT * FROM bookings WHERE email_id = '$email' AND event_id = '$eventID'";
            $stat = $db->query($query);
            $stat->execute();

            $count = $stat->rowCount();
            //If theres any row selected, it means the user has already booked the event
            if($count>0){
                //Therefore, alert the user that have already booked the event
                echo "<p>You have already booked the event </p>";
            }else{
                //Otherwise, if no row was selected, add this booking to the bookings table
                try{
                    //Insert the users data into the database
                    $sth2=$db->prepare("insert into bookings values(default,?,?)");
                    $sth2->execute(array($email, $eventID));
                    //Take them to the booked page, to show them an appropriate message
                    header("location:booked.php");
         
                }catch (PDOException $ex) {
                    echo "Sorry, a database error occurred! <br>";
                    echo "Error details: <em>". $ex->getMessage()."</em>";   
                }
            }
        }catch (PDOexception $ex){
            echo "Sorry, a database error occurred! <br>";
            echo "Could not book the event!<br>";
            echo "Please try again!<br>";
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
                    //This statement is used later for displaying the event details
                    $query =  "SELECT * FROM events WHERE event_id = $eventID";

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