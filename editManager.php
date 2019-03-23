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

include('php/connection.php');

  $id = $_GET['id'];

  $query = mysqli_query($conn,"select * from `users` where id='$id'");
  $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>G-Cafe | Manager</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
.h-divider{
 margin-top:5px;
 margin-bottom:5px;
 height:1px;
 width:100%;
 border-top:1px solid gray;

}
</style>

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
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="dropdown">
          <a href="#"  class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accounts <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="active"><a href="manager.php"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Manager accounts</a></li>
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
            <li><a href="#">  <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Welcome <?php echo ucfirst($_SESSION['user']['user_type']); ?></a></li>
            <li><a href="#">  <span style="color:gray" class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> </a></li>
            <li><a href="manager.php?logout='1'">  <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1> <span class="glyphicon glyphicon-user" aria-hidden="true"> Manager<small>accounts</small></h1>
                </div>
                <div class="col-md-2">

                </div>

            </div>

        </div>
    </header>

    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li>Accounts</li>
                <li><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></li>
                <li class="active">Manager</li>
            </ol>
        </div>
    </section>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                    <a href="#" class="list-group-item active main-color-bg">
                        Command
                    </a>
                    <div class="input-group">
      <input type="text" class="form-control borderless" placeholder="Search for name">
      <span class="input-group-btn">
        <button class="btn btn-default borderless" type="button">Search</button>
      </span>
    </div><!-- /input-group -->
                    <a style="cursor: pointer;" class="list-group-item" data-toggle="modal" data-target="#addnewManagermodal"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create Manager Account</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                    <div class="panel-heading main-color-bg">
                        <h3 class="panel-title"> Update Manager List</h3>
                    </div>
                    <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <tbody>
            <form method="post" action="php/updateManager.php?id=<?php echo $id; ?>">
            <?php echo display_error(); ?>
            <label>First Name</label>
            <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>" required autofocus>
            <label>Middle Name</label>
            <input type="text" name="mname" class="form-control" value="<?php echo $row['mname']; ?>" required autofocus>
            <label>last Name</label>
            <input type="text" name="lname" class="form-control" value="<?php echo $row['lname']; ?>" required autofocus>
            <label>Manage Name</label>
            <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" required autofocus>

            <label>Email</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" required autofocus>

            <label> Address</label>
            <input type="text" name="address" value="<?php echo $row['username']; ?>" class="form-control" required autofocus></input>

            <label>Contact Number</label>
            <input type="text" name="number" value="<?php echo $row['number']; ?>" class="form-control" required autofocus>

           <label>User Type</label>
            <select name="user_type" class="form-control input-sm" placeholder="Enter Name" required autofocus>
              <option value="manager">Manager</option>
            </select>
            <br>
          <input type="submit" name="submit" class="btn btn-success"><a href="manager.php" class="btn btn-danger" style="float: right;" >Back</a>
          </div>
        </div>
    </div>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<footer class="page-footer font-small blue pt-4 mt-4">

<div class="footer-copyright py-3 text-center" style="color:gray;">
Software Engineer © 2018

</div>
<!--/.Copyright-->
</footer>

<!--/.Modal-->
   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/function.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
