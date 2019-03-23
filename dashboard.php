<?php
 include('php/connection.php');
 include('php/connect.php');
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
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css"> 
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  </head>

  <body>

    <nav class="navbar navbar-default">
      <div class=" ">
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
        <li><a href="reports.php" id="seen_report_btn">Reports <span id="report_noti"> </span></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right"> 
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="seen_accept_noti"> <i class="glyphicon glyphicon-bell"></i> <span id="count_accept"></span></a>
              <ul class="dropdown-menu">
                <li id="fetch_accep_noti"></li>
              </ul>
            </li>
            <li><a href="#">  <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Welcome <?php echo ucfirst($_SESSION['user']['user_type']); ?></a></li>
            <li><a href="#">  <span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> </a></li>
            <li><a href="dashboard.php?logout='1'">  <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>

          </ul> 
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
        <div class=" ">
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
        <div class=" ">
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </section>

    <section id="main">
        <div class=" ">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                    <a href="#" class="list-group-item active main-color-bg">
                        Dashboard
                    </a>
                    <a href="#" class="list-group-item"> <span class="glyphicon glyphicon-user" aria-hidden="true"   style="color: deepskyblue;"></span> Accounts <span class="badge"><?php 

$pdoQuery = "SELECT * FROM users";

$pdoResult = $pdoConnect->query($pdoQuery);

$pdoRowCount = $pdoResult->rowCount();

echo "$pdoRowCount"; ?></span></a>
                    <a href="#" class="list-group-item"> <span class="glyphicon glyphicon-calendar" aria-hidden="true"   style="color: deepskyblue;"></span> Events <span class="badge"><?php 

$pdoQuery = "SELECT * FROM event";

$pdoResult = $pdoConnect->query($pdoQuery);

$pdoRowCount = $pdoResult->rowCount();

echo "$pdoRowCount"; ?></span></a>
                    <a href="#" class="list-group-item"> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"   style="color: deepskyblue;"></span> Reports 
                      <span id="report_noti_dash"></span>
                    </a>
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
                               <h2> <span class="glyphicon glyphicon-ok" aria-hidden="true"   style="color: deepskyblue;"> </span><?php 

$pdoQuery = "SELECT * FROM users Where user_type='manager'";

$pdoResult = $pdoConnect->query($pdoQuery);

$pdoRowCount = $pdoResult->rowCount();

echo "<h1>$pdoRowCount</h1>"; ?> </span>
                               <h4>Manager</h4>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="well dash-box">
                               <h2> <span class="glyphicon glyphicon-user" aria-hidden="true"  style="color: deepskyblue;"></span><?php 

$pdoQuery = "SELECT * FROM tbl_marshall";

$pdoResult = $pdoConnect->query($pdoQuery);

$pdoRowCount = $pdoResult->rowCount();

echo "<h1>$pdoRowCount</h1>"; ?></h2>
                               <h4>Marshalls</h4>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="well dash-box">
                               <h2> <span class="glyphicon glyphicon-calendar" aria-hidden="true"  style="color: deepskyblue;"></span><?php 

$pdoQuery = "SELECT * FROM event";

$pdoResult = $pdoConnect->query($pdoQuery);

$pdoRowCount = $pdoResult->rowCount();

echo "<h1>$pdoRowCount</h1>"; ?></h2>
                               <h4>Events</h4>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="well dash-box">
                               <h2> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"  style="color: deepskyblue;"></span><?php 

$pdoQuery = "SELECT * FROM tbl_report";

$pdoResult = $pdoConnect->query($pdoQuery);

$pdoRowCount = $pdoResult->rowCount();

echo "<h1>$pdoRowCount</h1>"; ?>
                               </h2>
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
                            <th>Marshall Id</th>
                          <th>Marshall Username</th>
                            <th>Cafe Name</th>
                            <th>Landmark</th>
                            <th>Event Date</th>
                            <th>Type</th>
                            <th>Status</th> 
                        </tr>
                       
                        <tbody>
                          <?php 
                            include('php/connection.php');
          $query = mysqli_query($conn,"SELECT * FROM event ORDER BY eventdate DESC");
          while($row = mysqli_fetch_array($query)){
            ?> 
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['marshall']; ?></td>
              <td><?php echo $row['cafename']; ?></td>
               <td><?php echo $row['landmark']; ?></td>
              <td><?php echo $row['eventdate']; ?></td>
              <td><?php echo $row['type']; ?></td>
              <td><?php echo $row['status']; ?></td>
              <td>  
              </td>
            </tr>
            <?php } ?>
                        </tbody>
                         </table>
                    </div>
                    </div>
<br>
<div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="panel-title">Event Chart</h3> 
            </div>
            <div class="panel-body">
              <div id="donut-chart" style="height: 300px;"></div>
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
<!--/.Copyright-->
</footer>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
            <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/Flot/jquery.flot.js"></script> 
<script src="bower_components/Flot/jquery.flot.resize.js"></script> 
<script src="bower_components/Flot/jquery.flot.pie.js"></script> 
<script src="bower_components/Flot/jquery.flot.categories.js"></script> 
<script>
  $(function () {   
    var donutData = [
      { label: 'Event 1', data: 30, color: '#3c8dbc' },
      { label: 'Event 2', data: 20, color: '#0073b7' },
      { label: 'Event 3', data: 50, color: '#00c0ef' }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })  
  }) 
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>
<script type="text/javascript" src="js/script1.js"></script>
  </body>
</html>
