<?php
   session_start();

   //Connect to the database
   require_once('connectdb.php');

   //The events ID used to get the data from the database
   $eventID = 1;


        //Get the total number of likes for this event
        $query = "SELECT * FROM likes WHERE event_id = '$eventID'";
        $stat = $db->query($query);
        $stat->execute();

        $totalLikes = $stat->rowCount();  


    if(isset($_SESSION['email'])){
    //Get the data from the sessions
        $email = $_SESSION['email'];
        //If the user ries to like the event
        if(isset($_POST["likebtn"])){

            try{
                //Get all the rows where the email and the event id are equal to the users email and this events id
                $query = "SELECT * FROM likes WHERE email_id = '$email' AND event_id = '$eventID'";
                $stat = $db->query($query);
                $stat->execute();
    
                $count = $stat->rowCount();
                //If theres any row selected, it means the user has already liked the event
                if($count>0){
                    //Therefore, alert the user that have already liked the event
                    echo "<p>You have already liked the event </p>";
                }else{
                    try{
                        //Insert the users data into the database
                        $sth2=$db->prepare("insert into likes values(default,?,?)");
                        $sth2->execute(array($email, $eventID));

                        //Take them to the liked page, to show them an appropriate message
                        header("location:liked.php");  
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
    }else{
        echo "<p> Please remember to sign-in! <br>";
    }


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

                    //Store booking id in a session variable, so it can be displayed on the booked.php page
                    $_SESSION['bookingID'] = $db->lastInsertId();

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
    <link rel="stylesheet" href="events.css?v=<?php echo time(); ?>"/>
    <script src="likeBtn.js"></script>
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Football</title>
</head>
<body>
    <header>
        <?php
            include("header.php");
        ?>
    </header>

    <section id="start" style="background-image: url('images/indoorFootball.jpg');">
        <h3>Back in the game</h3>
        <p>Get ready for kick off</p>
    </section>

    <main>
        <section id="event-details">
            <?php 
            //Get the details form the database to be displayed on the event page
                try{
                    //This statement is used for displaying the event details
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

                            //These two will be displayed in the "extra_info" section
                            $description = $row['description'];
                            $extra_info = $row['extra_info'];
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
                <form method = "post" action="football.php">
                    <button id=likebtn  name="likebtn" onclick="changeColor()" class="fa fa-thumbs-up"><?php echo " " . $totalLikes; ?></button>
                </form>
            </div>
        </section>

        <!-- Displays the additional information the user may need to know for the event-->
        <section id="extra-info">
            <h2>Get involved into Aston's own Football competition!</h2>
            <div class="benefit1">
                <h4 class="benefit1-info">More Details</h4>
                <p class="benefit1-info" id="benefit1-info"> <?php echo $description; ?> </p>
            </div>
            <div class="benefit2">
                <h4 id="benefit2-heading">Additional Information</h4>
                <?php echo $extra_info; ?>
            </div>
        </section>

        <!-- Creates the booking button that allows the user to book this event-->
        <section id="booking">
            <h2>Book Now with just one click!</h2>
            <form id="booking" method = "post" action="football.php">
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