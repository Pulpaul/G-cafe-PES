<?php 
  include('php/functions.php');
  
  if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>G-Cafe | Dashboard</title>
   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
          <a class="navbar-brand" href="#"> <img src="img/gcafelogs.png" style="width:125px; height:40px;"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accounts <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="marshalls.php"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Marshall accounts</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">GCALP Elite</a></li>
            <li><a href="#">Academy Arena</a></li>
            <li><a href="#">Teemo Cup</a></li>
            <li><a href="#">Lulu Cup</a></li>
            <li><a href="#">AOV Community Arena</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">All Tournaments</a></li>
          </ul>
        </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">  <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Welcome <?php echo ucfirst($_SESSION['user']['user_type']); ?> </a></li>
            <li><a href="#">  <span class="glyphicon-usern glyphicon-option-vertical" aria-hidden="true"></span> </a></li>
            <li><a href="index.php?logout='1'">  <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    



   









<footer class="page-footer font-small blue pt-4 mt-4">
<div class="footer-copyright py-3 text-center">
Software Engineer © 2018

</div>

</footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html> 