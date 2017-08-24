<?php
	require_once('stripe/init.php');
//get keys from stripe account at ready to launch
	$stripe = array(
	  "secret_key"      => "sk_test_JgYGWfnkWU85aI96rZsQgu0z",
	  "publishable_key" => "pk_test_XX1GO2lDwDz16r4DFO4oGUD3"
	);

	\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>
