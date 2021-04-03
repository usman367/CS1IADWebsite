<?php

    session_start();

    require_once('connectdb.php');

    //Initially the events are ordered by their category
    $topic = 'category';

    if (isset($_POST['insert'])){
        $topic = $_POST['category'];
        echo $topic;
    }

    if($topic == "date"){
        $alist =  "SELECT * FROM events ORDER BY date ASC";
        // $results = mysql_num_rows($alist);
    }else{
        $alist =  "SELECT * FROM events ORDER BY category";
        // $results = mysql_num_rows($alist);
    }

    try{
        // $query="SELECT  * FROM  events ";
		$rows =  $db->query($alist);

        if ( $rows && $rows->rowCount()> 0) {
		
            ?>	
        <table cellspacing="0"  cellpadding="5">
          <tr><th align='left'><b>Course_id</b></th>   <th align='left'><b>Course_Name</b></th> <th align='left'><b>Course_NumofStudent</b></th ></tr>
            <?php
            // Fetch and  print all  the records.
                while  ($row =  $rows->fetch())	{
                    echo  "<tr><td align='left'>" . $row['name'] . "</td>";
                    echo  "<td align='left'>" . $row['description'] . "</td>";
                    echo "<td align='left'>". $row['date'] . "</td></tr>\n";
                }
                echo  '</table>';
            }
            else {
                echo  "<p>No  course in the list.</p>\n"; //no match found
            }	
    }catch (PDOexception $ex){
		echo "Sorry, a database error occurred! <br>";
		echo "Error details: <em>". $ex->getMessage()."</em>";
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
    <!--For the slideshow -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
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

        <main>

            <br><br>

            <div id="order">
                <form id="form1" action="index.php" name="form1" method="post">
                    <label>Order By:</label>
                    <select name="category" id="form">
                    <!-- <option value="-1">--Select a Topic--</option> -->
                        <option value="category">Category</option>
                        <option value="date">Date</option>
                    </select>
                    <input type="submit" name="insert" value="Update">
                </form>
            </div>

            <?php
                try{
                    $rows =  $db->query($alist);
            
                    if ( $rows && $rows->rowCount()> 0) {
                        
                        ?>	
                            <section id="sports">
                                <div class="events">
                                <div class="row">
                        <?php
                        // Fetch and  print all  the records.
                            while  ($row =  $rows->fetch())	{
                            ?>
                        <!-- Always let the cards take up 6 columns, even when the screen size is small (A grid has 12 columns in bootsstrap)-->
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

                        ?>


                        <!-- Always let the cards take up 6 columns, even when the screen size is small (A grid has 12 columns in bootsstrap)-->
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
                            echo '</section>';
                            echo '</div>';
                        }
                        else {
                            echo  "<p>No  course in the list.</p>\n"; //no match found
                        }	
                }catch (PDOexception $ex){
                    echo "Sorry, a database error occurred! <br>";
                    echo "Error details: <em>". $ex->getMessage()."</em>";
                }
            ?>

            <section id="sports">
                <div class="events">
                    <h2 id="sportEvents"> Upcoming Sporting Events </h2>
                    <div class="row">
                        <!-- Always let the cards take up 6 columns, even when the screen size is small (A grid has 12 columns in bootsstrap)-->
                        <div class="col-sm-6">
                            <div class="card">
                                <!--Place the image at the top and take up the whole card-->
                                <img class="card-img-top img-fluid" src="images/indoorFootball3.jpg">
                                <div class="card-block">
                                    <h3 class="card-title"> 5-a-side Football Tournament </h3>
                                    <p class="card-text"> The football society has arranged an Indoor Football tournamment for all Students of the University. Whether you are an Undergraduate or a Postgraduate, every student is welcome to take part.</p>
                                    <p>Event Date: 05-05-21</p>
                                    <!--Button for the link to its page-->
                                    <a href="football.php" class="btn btn-primary">More Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="images/indoorFootball3.jpg">
                                <div class="card-block">
                                <h3 class="card-title">5-a-side Football Tournament</h3>
                                    <p class="card-text">The football society has arranged an Indoor Football tournamment for all Students of the University. Whether you are an Undergraduate or a Postgraduate, every student is welcome to take part.</p>
                                    <p>Event Date: 05-05-21</p>
                                    <a href="football.php" class="btn btn-primary">More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <br><br>

            <section id="culture">
                <div class="events">
                    <h2 id="sportEvents"> Explore Culture </h2>
                    <div class="row">
                    <div class="col-sm-6">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="images/art.jpg">
                                <div class="card-block">
                                    <h3 class="card-title"> Art Exhibition </h3>
                                    <p class="card-text">Aston’s Universit's art collection is as wide as it is impressive. From the world’s largest collection of pre-Raphaelite artwork to progressive installations from exciting new artists.  Aston University is home to a fantastic Art gallery that shouldn't be missed.</p>
                                    <p>Event Date: 10-05-21</p>
                                    <a href="art.php" class="btn btn-primary">More Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="images/art.jpg">
                                <div class="card-block">
                                    <h3 class="card-title"> Art Exhibition </h3>
                                    <p class="card-text">Aston’s Universit's art collection is as wide as it is impressive. From the world’s largest collection of pre-Raphaelite artwork to progressive installations from exciting new artists.  Aston University is home to a fantastic Art gallery that shouldn't be missed.</p>                                <p>Event Date: 10-05-21</p>
                                    <a href="art.php" class="btn btn-primary">More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <br><br>

            <section id="others">
                <div class="events">
                    <h2 id="sportEvents"> Other Upcoming Events </h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="images/talk.jpg">
                                <div class="card-block">
                                    <h3 class="card-title">Live Talk</h3>
                                    <p class="card-text">John Smith delivers a fascinating talk about microbiology. The speaker has 15 years of reaserch experience, and has previously given a TED talk.</p>
                                    <p>Event Date: 15-05-21</p>
                                    <a href="talk.php" class="btn btn-primary">More Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="images/talk.jpg">
                                <div class="card-block">
                                    <h3 class="card-title">Live Talk</h3>
                                    <p class="card-text">John Smith delivers a fascinating talk about microbiology. The speaker has 15 years of reaserch experience, and has previously given a TED talk.</p>
                                    <p>Event Date: 15-05-21</p>
                                    <a href="talk.php" class="btn btn-primary">More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <br><br>
        </main>

        <?php
			include("footer.php");
		?>
    

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>
</html>