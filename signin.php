<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signin.css"/>
    <title>Document</title>
</head>
<body>
    <header>
        <?php
            include("header.php");
        ?>
    </header>

    <main>
        <section id="signin">
            <h2>Sign-in</h2>
            <form id="signin">
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
              <button class="main__btn"><a href="#">Sign-in</a></button>
          </form>
        </section>
    </main>

    <?php
        include("footer.php");
    ?>
</body>
</html>