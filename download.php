<?php require_once("header.php"); ?>

<div class="hbuffer"></div>

<div class="infoHold">
    <div class="infoCell">

    	<h1>Download the thing here</h1>

    	<p>price is whatever, blah blah blah</a>

    	<p>WE ARE STILL IN TESTING MODE.</p>

    	<br><br>

    	<!-- embed stripe checkout code -->
       <?php require_once('config.php'); ?>

        <form action="./charge.php" method="post">
            	<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            		  data-key="<?php echo $stripe['publishable_key']; ?>"
            		  data-description="PURCHASE TITLE"
            		  data-amount="5000"
            		  data-locale="auto"
            		  data-zip-code="true"
            		  data-shipping-address="true"
                      data-billing-address="true"
            		  >
            	</script>
      	</form>



        <br>
        <br>
        <!-- [Option to donate : same code from "donate.html" but does not redirect] -->
    </div>
</div>

</body>
</html>
