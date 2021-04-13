<?php

    session_start();

    //Get the booking ID from the sessions variable
    $bookingID = $_SESSION['bookingID'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="message.css?v=<?php echo time(); ?>" />
    <title>Booked</title>
</head>
<body>
    <?php
        include("header.php");
    ?>

    <main>
        <h2 class="message">Congratulations, you have booked the event!</h2>
        <p class="message" id="extra"><strong>Your Booking ID is <?php echo $bookingID ?> </strong></p>
    </main>


    <?php
        include("footer.php");
    ?>
</body>
</html>