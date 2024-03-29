<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
/* change the background color */
.navbar {
    background-color: #240053;
}
</style>
<body>

    <!-- "navbar-toggler" means it will be a drop down toggleable navbar -->
    <!-- "navbar-inverse" to change the colour of the links-->
    <!--"fixed-top" added to make the navbar stick to the top even when you're scrolling down-->
    <nav class="navbar navbar-expand-lg navbar-inverse ">
        <div class="container">
            <a class="navbar-brand" href="index.php">Aston Events</a>
            <!-- For smaller screens, make a menu bar-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="mainNav">
            <!-- Alist for the items on the right -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                         <!--href link for when events is pressed it will take you to the events section-->
                        <!--"index.php" added before the "#events" to take you to the main page first-->
                        <a class="nav-link" href="index.php#showEvents">Events</a>
                    </li>

                    <?php
                        //If the user has not signed in, then display the "Register" and "Sign-in" options
                        if(!isset($_SESSION['email'])){
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="register.php">Register</a>';
                            echo '</li>';
                            echo '<li class="nav-item">';
                                echo '<a class="nav-link" href="signin.php">Sign-in</a>';
                            echo '</li>';
                        }
                        //If the user has already signed in, then display the "My Bookings" and the "Sign Out" options
                        if(isset($_SESSION['email'])){
                            echo '<li class="nav-item">';
                                echo '<a class="nav-link" href="bookings.php">My bookings</a>';
                            echo '</li>';
                            echo '<li class="nav-item">';
                                echo '<a class="nav-link" href="signout.php">Sign Out</a>';
                            echo '</li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>