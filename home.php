<?php 
include('php/functions.php');

if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: login.php");
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
            <li class="active"><a href="dashboard.php">Dashboard</a></li>
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accounts <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="manager.php"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Manager accounts</a></li>
            <li><a href="marshall.php"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Marshall accounts</a></li>
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
            <li><a href="events.php">All Tournaments</a></li>
          </ul>
        </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">  <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Welcome <?php echo ucfirst($_SESSION['user']['user_type']); ?> </a></li>
            <li><a href="#">  <span class="glyphicon-usern glyphicon-option-vertical" aria-hidden="true"></span> </a></li>
            <li><a href="home.php?logout='1'">  <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1> <span class="glyphicon glyphicon-stats" aria-hidden="true"> Dashboard<small>CheckYourSite</small></h1>
                </div>
                <div class="col-md-2">

                </div>

            </div>

        </div>
    </header>

    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </section>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                    <a href="#" class="list-group-item active main-color-bg">
                        Dashboard
                    </a>
                    <a href="#" class="list-group-item"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Accounts <span class="badge">0</span></a>
                    <a href="#" class="list-group-item"> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Events <span class="badge">0</span></a>
                    <a href="#" class="list-group-item"> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Reports <span class="badge">0</span></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                    <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">Website Overview</h3>
                    </div>
                    <div class="panel-body">
                       <div class="col-md-3">
                           <div class="well dash-box">
                               <h2> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  0</h2>
                               <h4>Manager</h4>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="well dash-box">
                               <h2> <span class="glyphicon glyphicon-user" aria-hidden="true"></span>  0</h2>
                               <h4>Marshalls</h4>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="well dash-box">
                               <h2> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>  0</h2>
                               <h4>Events</h4>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="well dash-box">
                               <h2> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>  0</h2>
                               <h4>Reports</h4>
                           </div>
                       </div>
                    </div>
                    </div>

                    <div class="panel panel-default">
                    <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">Latest Events</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover">
                        <tr>
                            <th>Cafe Name</th>
                            <th>Location</th>
                            <th>Tourna Type</th>
                            <th>Date</th>
                        </tr>
                        </table>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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