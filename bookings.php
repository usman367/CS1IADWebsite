<?php
    session_start();
    require_once('connectdb.php');

    //If they have not signed in then relocate them to the sign-in page
    if (!isset($_SESSION['email'])){
        header("location:signin.php");  
        exit();
    }

    $email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bookings.css?v=<?php echo time(); ?>" />
    <!-- Bootstrap stylesheeet: -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <title>My Bookings</title>
</head>
<body>

    <header>
        <?php
            include("header.php");
        ?>
    </header>

    <main>

        
        <?php
              try{
                $query = "SELECT * FROM bookings WHERE email_id = '$email'";
        
                $userDetails =  $db->query($query);
                
                //Check if the user has any bookings
                if ( $userDetails && $userDetails->rowCount()> 0) {

                    echo '<h2> You can view all of your bookings below </h2>';

                    ?>	
                        <!--Then start creating bootstrap cards to list their bookings-->
                        <div class="events">
                        <div class="row">
                    <?php
                        
                    //For every booking, it will get the booking ID and the event ID
                    //Then using the event ID, it will get the event details sothey can be listed in the event
                    while  ($row =  $userDetails->fetch())	{
                        $BookingID = $row['booking_id'];
                        $eventID = $row['event_id'];

                        ?>

                            <!-- Always let the cards take up 6 columns, even when the screen size is small (A grid has 12 columns in bootstrap)-->
                            <div class="col-sm-6">
                            <div class="card">

                        <?php
        
                        try{
                            //Get the event information, based on the event ID
                            $query2 = "SELECT * FROM events WHERE event_id = '$eventID'";
        
                            $eventDetails =  $db->query($query2);
                    
                            if ( $eventDetails && $eventDetails->rowCount()> 0) {
                                while  ($row2 =  $eventDetails->fetch())	{

                                    //Get the events image based on the events name
                                    if($row2['name'] == '5-a-side Football Tournament'){
                                        //"card-img-top img-fluid" puts the image at the top of the card and make sure it takes up all the available space
                                        echo '<img class="card-img-top img-fluid" src="images/indoorFootball3.jpg">';
                                    }else if($row2['name'] == 'Art Exhibition'){
                                        echo '<img class="card-img-top img-fluid" src="images/art.jpg">';
                                    }else{
                                        echo '<img class="card-img-top img-fluid" src="images/talk.jpg">';
                                    }

                                    //Get the data from the database and display it

                                    $name = $row2['name'];
                                    $category = $row2['category'];
                                    $description = $row2['description'];
                                    $place = $row2['place'];
                                    $date = $row2['date'];
                                    $organiser = $row2['organiser'];

                                    echo '<div class="card-block">';

                                    echo  '<h3 class="card-title">' . $name . '</h3>';
                                    echo  '<p class="card-text">' . $description . "</p>";
                                    echo "<p>Category: ". $category . "</p>";
                                    echo "<p>Date: ". $date . "</p>";
                                    echo "<p> Place: ". $place . "</p>";
                                    echo "<p>Contact Details: ". $organiser . "</p>";
                                    echo "<p>Your booking ID: " .$BookingID . "</p>";

                                    echo  '</div>';
                                    echo '</div>';
                                    echo '</div>';

                                }
                                
                            }
        
                        }catch (PDOException $ex) {
                            echo "Sorry, a database error occurred! <br>";
                            echo "Could not find event details! <br>";
                            echo "Error details: <em>". $ex->getMessage()."</em>";   
                            
                        }
                
                    }
                }
                else{
                    //If they have no bookings yet, inform them about it
                    echo '<h3 class="message">You have not booked any events!</h3>';
                    echo '<p class="message">You can view the events from <a href="index.php#showEvents">here!</a></p>';
                }

                echo  '</div>';
                echo '</div>';

            }catch (PDOException $ex) {
                        echo "Sorry, a database error occurred! <br>";
                        echo "Could not find your bookings! <br>";
                        echo "Error details: <em>". $ex->getMessage()."</em>";   
                        
            }
        
        ?>
    </main>


    <?php
        include("footer.php");
    ?>
    
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>