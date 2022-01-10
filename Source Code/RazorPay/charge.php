<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="styles/razor.css">
</head>
<body>
	<div id="d1">
	<?php
	echo "<br><br><center><h1>Payment done.</h1>";
echo "<br><h3>Thanks for participating in our games.</h3>";
	echo "Razorpay success ID: ". $_POST['razorpay_payment_id']."</center><br/><br/><br/><br/>";
?>
	</div>
</body>
</html>