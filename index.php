<!DOCTYPE html>

<?php
require "functions.php";
require "products.php";
?>

<html lang="se">

    <head>
        <meta charset="utf-8">
        <title>Produkter</title>
        <link href="https://fonts.googleapis.com/css?family=Antic+Slab" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
     <header>
      <nav role="navigation">
        <div class="logotype"><a href="http://localhost"><img src="img/logo.png"></a></div>
      </nav>
     </header>
    <main>

      <?php
       $date = date("l d M Y");
        echo '<h2>' . $date . '</h2>';
        if(check_special_day()){
          echo '<p class="adress">Todays a special day! 5% discount on your order total!</p>';
        }
      ?>
      <h1>- Our products -</h1>

      <form onkeypress="" action="form.php" method="POST">
        <section class="produktsortiment">
          <?php
          // print all products
          print_products($products);
          ?>
        </section>

        <h1>- Your information -</h1>
        <div class="kontaktuppgifter">
          <div class="kontakt-flex">
            <span class="label">Name:</span><br>
            <input type="name" name="name" placeholder="Your Name" required></input><br>
            <span class="label">Adress:</span><br>
            <input type="text" name="adress" placeholder="Your Adress" required></input><br>
          </div>
          <div class="kontakt-flex">
            <span class="label">Phonenumber:</span><br>
            <input type="tel" name="phone" placeholder="Your Phonenumber" required></input><br>
            <span class="label">E-mail Adress:</span><br>
            <input type="email" name="email" placeholder="Your Email adress" required></input><br>
          </div>
        </div>
        <input type="submit" value="Order">
      </form>
    </main>
  </body>
</html>
