<?php
/***
*
****/
function print_products($products){
    foreach($products as $prod){
        $prodname = ""; // reset foreach loop
        echo ' <div class="produkt"> ';
        foreach($prod as $key => $value){
          $key = ucfirst($key);
          if ( $key == "Name" ){ // grab name from products
            echo '<span class="name">' . $value . '</span><br />';
            $prodname = preg_replace('/\s/', '_', $value); // replace all whitespace with _
          }                                             // to keep input tag nameing easy
          if ( $key == "Image"){
            echo '<img class="produktbild" src="' . $value . '">';
          }
          if ( $key == "Price"){
            echo '<span class="price">' . adjust_price($value) . 'kr</span>';
          }
          if ( $key == "Color"){
            echo '<span class="color"><b>Color: </b>' . $value . '</span>';
          }
          echo "<br />";
        }
        echo "<br />";
        echo '<span class="color"><b>Quantity:</b> </span><input type="number" name=' . $prodname . ' min="0"> <br>';
        echo '</div>';
      }
}
/***
*
****/
function adjust_price($price){
  $today = date("D");
  $new_price = $price;
  switch($today){
      case "Mon":
          $new_price = $price * .5;
          break;
      case "Tue":
          $new_price = $price * 1.1;
          break;
      case "Wed":
          // T.B.D
          break;
      case "Thu":
          // T.B.D
          break;
      case "Fri":
          if ($price > 200)
            $new_price = $price - 20;
          break;
      case "Sat":
          // T.B.D
          break;
      case "Sun":
          // T.B.D
          break;
      default:
          echo "No price info available.";
          break;
  }
  return $new_price;
}
/***
*
****/
function print_order($products){
  $print_once = 0;
  $grandtotal = 0;
  foreach($products as $prod){
    $antal = 0;
    $total = 0;
    $prodname = ""; // reset foreach loop
    foreach($prod as $key => $value){
      $key = ucfirst($key);
      if ( $key == "Name" ){ // grab name from products
        $prodname = preg_replace('/\s/', '_', $value); // replace all whitespace with _
        $antal = $_POST[$prodname];                    // to keep input tag nameing easy
        if (empty($antal))
          break; // if empty jump to next product
        else{
          if ($print_once == 0){ // we have at least 1 order, print header once
            echo '<div class="your-order">';
            echo '<p class="tack">Thanks for your order ' . $_POST["name"] . '!<br /></p>';
            echo '<p class="adress">Your order will be packed, sent and arrive to ' . $_POST["adress"] . ' within 2-4 workdays </p><br />';
            echo '<h1>- Your Order -</h1>';
            echo '</div>';
             $print_once = 1; // print once
            }
           echo '<div class="produkt">'; // tag for product
        }
      }
      if (!empty($antal)){
        $grandtotal = $grandtotal + $total;
        if(check_special_day()){
        $grandtotal = $grandtotal * 0.95;
        $grandtotal = round($grandtotal, 0);
        }
         if ( $key == "Name" ){
           echo '<span class="name"><b>' . $antal . 'x </b>' . $value . '</span><br /><br />';
         }
         elseif ( $key == "Image" ){    //varför funkar detta INTE i orderprinten men funkar i print products?!
           echo '<img class="produktbild" src="' . $value . '">';
           echo 'hej';
         }
         elseif( $key == "Price" ){
          echo '<span class="color"><b>Price per unit: </b>' . adjust_price($value) . 'kr</span><br />';
           $total = $antal * adjust_price($value);
           echo '<span class="price"><b>Total: </b>' . $total . 'kr</span>' ;
           echo '</div>';
          }
        }
      }
    }
      echo '<p class="tack">Total price:' . $grandtotal . 'kr</p>';
      if(check_special_day()){
      echo "5% discount on your total order!</br>";
      }
}
/***
 *
***/
function check_special_day(){
  date_default_timezone_set("Europe/Stockholm");
  $day = date("j");
  $week = date("W");

  $now = new Datetime("now");
  $begintime = new DateTime('13:00');
  $endtime = new DateTime('17:00');

  if ( ( $day % 2 == 0 ) && !( $week % 2 == 0 ) && $now >= $begintime && $now <= $endtime ) {
    return true;
  }
    else{
      return false;
    }
}

/***
*
****/

?>
