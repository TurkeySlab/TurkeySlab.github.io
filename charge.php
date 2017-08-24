<?php
  require_once("header.php");
  require_once('./config.php');


  $token  = $_POST['stripeToken'];
  $email = $_POST['stripeEmail'];

  $customer = \Stripe\Customer::create(array(
      'email' => $email,
      'source'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      //cents
      'amount'   => 5000,
      'currency' => 'usd'
  ));






  echo '<div class="hbuffer"></div><div class="infoHold"><div class="infoCell"><h1>Purchase successful!</h1><br><br>';

  require_once('./singleuse/create.php');

  $link = generate();

  echo '<p>This link will remain active for one week. It can be used once only.</p>';

  // Add info to database

  require_once('./helper.php');
  //change
  db_query("INSERT INTO `Customers` (`Email`, `Product Key`, `First Launch`) VALUES ('$email', '$link', '0')");

?>
