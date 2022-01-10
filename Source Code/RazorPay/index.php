<html>
<script LANGUAGE="JavaScript">
function getParams(){
var idx = document.URL.indexOf('?');
var params = new Array();
if (idx != -1) {
var pairs = document.URL.substring(idx+1, document.URL.length).split('&');
for (var i=0; i<pairs.length; i++){
nameVal = pairs[i].split('=');
params[nameVal[0]] = nameVal[1];
}
}
return params;
}
params = getParams();
venue = unescape(params["venues"]);
document.write("<b><font color='green'>Your venue is " + venue + "<br></font></b>");
document.write("<b><font color='green'>Click on below button to continue payment process</font></b>");
</script>
</html>
<?php 
  require_once('config.php'); 
?>
<html>
  <head>
    <title>RazorPay Integration</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="styles/razor.css">
  </head>
  <body>
    <form action="charge.php" method="POST">
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo $razor_api_key; ?>"
        data-amount="100000"
        data-buttontext="Pay with Razorpay"
        data-name="Pay with RazorPay"
        data-description="For Participation"
        data-image="images/orangesports.jpg"
        data-prefill.name="Sarnav Kundu"
        data-prefill.email="support@razorpay.com"
        data-theme.color="#F37254"
    ></script>
    <input type="hidden" value="<?php str_shuffle("qwertyuasdfghjk") ?>" name="hidden">
    </form>
  </body>
</html>