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
            <form id="booking">
              <button class="main__btn"><a href="#">Book Now</a></button>
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