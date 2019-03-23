<?php include('php/functions.php') ?>
<!DOCTYPE html>
<html>
    <title>G-Cafe</title>

<head>
    <link rel="icon" href="img/gcaf.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h2 style="color:white;"> <span class="glyphicon glyphicon-flash" aria-hidden="true">LOGIN<small>YourAccount.</small></h2>
        </div>
    </nav>
        <center>
        <a> <img src="img/gcafelog.png" style="width:300px; height:100px; margin-top:45px"></a>
        </center>  
    

    <form method="post" action="login.php" style="width: 23%;
  margin: 10px auto;
  padding: 20px;
  border: 1px solid gray;
  border-radius: 0px 0px 10px 10px;">
        <?php echo display_error(); ?>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" onkeyup="lettersOnly(this)" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" id="user_password" class="form-control" required>
        </div>
            <div>
            <input type="checkbox" onclick="myFunction()">Show Password
        </div>
            <div class="form-group">
                <br>
            <button type="submit" class="btn btn-info form-control" name="login_btn">Login</button>
        </div>
    </form>
</body>
</html>
<script>
function lettersOnly(input){
    var regex = /[^a-z]/gi;
    input.value = input.value.replace(regex,"");
}
</script>
        <script>
        function myFunction() {
            var x = document.getElementById("user_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        </script>