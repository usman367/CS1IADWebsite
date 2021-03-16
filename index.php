<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <!-- Bootstrap stylesheeet: -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <!-- navbar -->
    <!-- "navbar-toggler" means it will be a drop down toggleable navbar -->
    <!-- "navbar-inverse" to change the colour of the links-->
    <nav class="navbar navbar-expand-lg navbar-inverse bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Aston Events</a>
            <!-- For smaller screens, make a menu bar-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav2" >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="mainNav2">
            <!-- Alist for the items on the right -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Sports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Culture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Others</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <Section id="start">
            <h2> Find Your Interest </h2>
            <p> Get Involved into our upcoming Events. </p>
        </section>

        <main>
            <br><br>
            <div class="events">
                <h2 id="sportEvents"> Upcoming Sporting Events </h2>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="images/indoorFootball.jpg">
                            <div class="card-block">
                                <h3 class="card-title"> Indoor Football Tournament </h3>
                                <p class="card-text"> The football society has arranged an Indoor Football tournamment for all Students of the University. Whether you are an Undergraduate or a Postgraduate, every student is welcome to take part.</p>
                                <p>Event Date: 05-05-21</p>
                                <a href="#" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="images/indoorFootball.jpg">
                            <div class="card-block">
                            <h3 class="card-title">Indoor Football Tournament</h3>
                                <p class="card-text">The football society has arranged an Indoor Football tournamment for all Students of the University. Whether you are an Undergraduate or a Postgraduate, every student is welcome to take part.</p>
                                <p>Event Date: 05-05-21</p>
                                <a href="#" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br><br>
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
                                <a href="#" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="images/art.jpg">
                            <div class="card-block">
                                <h3 class="card-title"> Art Exhibition </h3>
                                <p class="card-text">Aston’s Universit's art collection is as wide as it is impressive. From the world’s largest collection of pre-Raphaelite artwork to progressive installations from exciting new artists.  Aston University is home to a fantastic Art gallery that shouldn't be missed.</p>                                <p>Event Date: 10-05-21</p>
                                <a href="#" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br><br>
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
                                <a href="#" class="btn btn-primary">Book Now</a>
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
                                <a href="#" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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