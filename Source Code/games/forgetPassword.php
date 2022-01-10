<html>
<link rel="stylesheet" type="text/css" href="css/button.css">
    <script>
  $('#myForm').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:'profile.php',
        type:'post',
        data:$('#myForm').serialize(),
        success:function(){
        }
    });
});
  </script>
<body>
    <form action="forgot.php" method="POST" id="myForm" name="myForm">
    <label for="email">Email:</label>
      <input type="email" id="email" name="email" spellcheck="false" placeholder="Enter your email" required><br/><br/>
      <input type="submit" id="submit" value="Get">
    </form>
</body>
</html>