<!doctype html>
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
      <section class="produktsortiment">
        <?php
        // print the order
        print_order($products);
        ?>

      </section>
    </main>

  </body>

</html>
