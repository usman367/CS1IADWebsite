<?php

    session_start();

    require_once('connectdb.php');

    //Initially the events are ordered by their category
    $topic = 'category';

    //If the update button is pressed, gets its value
    if (isset($_POST['insert'])){
        $topic = $_POST['order'];
        //echo $topic;
    }

    //Sort the events table based on the option selected
    if($topic == "date"){
        $alist =  "SELECT * FROM events ORDER BY date ASC";
    }else{
        $alist =  "SELECT * FROM events ORDER BY category";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>" />
    <!-- Bootstrap stylesheeet: -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
        <header>
        <?php
            include("header.php");
        ?>
        </header>

        <Section id="start">
            <h2> Find Your Interest </h2>
            <p> Get Involved into our upcoming Events. </p>
        </section>

        <main id="showEvents">

            <br><br>

            <!--Create a dropdown menu which allows the user to select if they want to view the events based on the category or by their date-->
            <div id="order">
                <form id="form1" action="index.php" name="form1" method="post">
                    <!-- <label>Order By:</label> -->
                    <select name="order" id="form">
                        <option value="-1">--Order By--</option>
                        <option value="category">Category</option>
                        <option value="date">Date</option>
                    </select>
                    <br>
                    <input id="orderBtn" type="submit" name="insert" value="Update">
                </form>
            </div>

            <br><br>

            <?php
                try{
                    $rows =  $db->query($alist);
            
                    if ( $rows && $rows->rowCount()> 0) {
                        
                        ?>	
                                <div class="events">
                                <div class="row">
                        <?php
                        // Fetch and  print all  the records.
                            while  ($row =  $rows->fetch())	{
                                //For the header, if the events are listed by category, create a header from the category name
                                if($topic == "category"){
                                    echo '<h2>' .$row['category'] . '</h2>';
                                    echo '<br> <br> <br>';
                                }else{
                                    //Otherwise, create a header based on the events date
                                    echo '<h2>' .$row['date'] . '</h2>';
                                    echo '<br> <br> <br>';
                                }
                            ?>

                        <!-- Always let the cards take up 6 columns, even when the screen size is small (A grid has 12 columns in bootstrap)-->
                        <div class="col-sm-6">
                            <div class="card">
                            <?php
                                //Get the events image based on whate event it is
                                if($row['name'] == '5-a-side Football Tournament'){
                                    //"card-img-top img-fluid" puts the image at the top of the card and make sure it takes up all the available space
                                    echo '<img class="card-img-top img-fluid" src="images/indoorFootball3.jpg">';
                                }else if($row['name'] == 'Art Exhibition'){
                                    echo '<img class="card-img-top img-fluid" src="images/art.jpg">';
                                }else{
                                    echo '<img class="card-img-top img-fluid" src="images/talk.jpg">';
                                }

                                //Get the data from the database and display it
                                echo '<div class="card-block">';
                                echo  '<h3 class="card-title">' . $row['name'] . '</h3>';
                                echo  '<p class="card-text">' . $row['description'] . "</p>";
                                echo "<p>". $row['date'] . "</p>";

                                //Get the correct link to the event page for each event
                                if($row['name'] == '5-a-side Football Tournament'){
                                    echo '<a href="football.php" class="btn btn-primary">More Details</a>';
                                }else if($row['name'] == 'Art Exhibition'){
                                    echo '<a href="art.php" class="btn btn-primary">More Details</a>';
                                }else{
                                    echo '<a href="talk.php" class="btn btn-primary">More Details</a>';
                                }
                                //Closes all the tags for the current card
                                echo  '</div>';
                            echo '</div>';
                        echo '</div>';

                        ?>

                        <!--Displays each event twice (because theres needs to be 6 events in total on the page)-->
                        <div class="col-sm-6">
                            <div class="card">
                            <?php
                                if($row['name'] == '5-a-side Football Tournament'){
                                    echo '<img class="card-img-top img-fluid" src="images/indoorFootball3.jpg">';
                                }else if($row['name'] == 'Art Exhibition'){
                                    echo '<img class="card-img-top img-fluid" src="images/art.jpg">';
                                }else{
                                    echo '<img class="card-img-top img-fluid" src="images/talk.jpg">';
                                }

                                echo '<div class="card-block">';
                                echo  '<h3 class="card-title">' . $row['name'] . '</h3>';
                                echo  '<p class="card-text">' . $row['description'] . "</p>";
                                echo "<p>". $row['date'] . "</p>";

                                //Get the correct link to the event page for each event
                                if($row['name'] == '5-a-side Football Tournament'){
                                    echo '<a href="football.php" class="btn btn-primary">More Details</a>';
                                }else if($row['name'] == 'Art Exhibition'){
                                    echo '<a href="art.php" class="btn btn-primary">More Details</a>';
                                }else{
                                    echo '<a href="talk.php" class="btn btn-primary">More Details</a>';
                                }
                                echo  '</div>';
                                echo '</div>';
                                echo '</div>';

                                
                            }
                            echo  '</div>';
                            echo '</div>';
                        }
                        else {
                            echo  "<p>No  events in the list.</p>\n";
                        }	
                }catch (PDOexception $ex){
                    echo "Sorry, a database error occurred! <br>";
                    echo "Error details: <em>". $ex->getMessage()."</em>";
                }
            ?>


            <br><br>
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