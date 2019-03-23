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
    <title>G-Cafe | Marshall</title>
    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css"> 
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
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
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="dropdown">
          <a href="#"  class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accounts <span class="caret"></span></a>
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
            <li><a href="#">  <span style="color:gray" class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> </a></li>
            <li><a href="marshall.php?logout='1'">  <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
        <div class=" ">
            <div class="row">
                <div class="col-md-10">
                    <h1> <span class="glyphicon glyphicon-user" aria-hidden="true"> Reports<small></small></h1>
                </div>
                <div class="col-md-2">

                </div>

            </div>

        </div>
    </header>

    <section id="breadcrumb">
        <div class=" ">
            <ol class="breadcrumb">
                <li>Accounts</li>
                <li><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></li>
                <li class="active">Reports</li>
            </ol>
        </div>
    </section>

    <section id="main">
        <div class=" ">
            <div class="row"> 
                <div class="col-md-12">
                    <div class="panel panel-default">
                    <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">Reports</h3>
                    </div>
                    <div class="panel-body table-responsive no-padding">
                    <table id="reportList" class="table table-striped table-hover">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>Time in</th>
                            <th>Time out</th>
                            <th>Event date</th>
                            <th>Cafe name</th>
                            <th>Feedback</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                      </thead> 
                        <tbody>
                          <?php 
                            include('php/connection.php');
          $query=mysqli_query($conn,"SELECT * FROM tbl_report");
          while($row=mysqli_fetch_array($query)){
            ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['time_in']; ?></td>
              <td><?php echo $row['time_out']; ?></td>
              <td><?php echo $row['event_date']; ?></td>
              <td><?php echo $row['cafe_name']; ?></td>
               <td><?php echo $row['feedback']; ?></td>
               <td><?php echo $row['status']; ?></td>
              <td>                
                <a class="btn btn-info btn-sm" href="viewReport.php?id=<?php echo $row['id']; ?>" data-toggle="tooltip" title='Print'><i class="glyphicon glyphicon-print"> </i></a>
                <a class="btn btn-danger btn-sm" href="php/deleteReport.php?id=<?php echo $row['id']; ?>" data-toggle="tooltip" title='Delete'><i class="glyphicon glyphicon-trash"> </i></a>
              </td>
            </tr>
            <?php } ?>
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

<div id="addnewMarhsallmodal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header main-color-bg">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;"><span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title" id="myModalLabel"><img src="img/gcaf.png" style="width:27px; height:30px;"></h6>
        </div>
        <div class="modal-body">
                <h4>Create Marshall Account</h4>
                <div class="h-divider"></div>  
          <form method="post" action="php/addMarshall.php">
            <?php echo display_error(); ?>
            <label>First Name</label>
            <input type="text" name="firstname" onkeyup="lettersOnly(this)" class="form-control" required autofocus>

            <label>Middle Name</label>
            <input type="text" name="mname" onkeyup="lettersOnly(this)" class="form-control" required autofocus>

            <label>Final Name</label>
            <input type="text" name="lastname" onkeyup="lettersOnly(this)" class="form-control" required autofocus>

            <label>Email</label>
            <input type="email" name="email"  class="form-control" required autofocus>

            <label> Location</label>
            <textarea name="location" class="form-control" required autofocus></textarea>

            <label>Contact Number</label>
            <input type="text" name="number" class="form-control" required autofocus>

            <label>Marshall Name</label>
            <input type="text" name="username" onkeyup="lettersOnly(this)" class="form-control" required autofocus>

            <label>Password</label>
            <input type="password" name="password_1" class="form-control" required autofocus>

            <label>Confirm Password</label>
            <input type="password" name="password_2" class="form-control" required autofocus>
            <br>
            <div class="g-recaptcha" data-sitekey="6LdwdWIUAAAAAAZ91m0QVbEphq1Tx-FR3bN4f_K6"></div>
            <br>
          <button type="submit" name="register_marshall" class="btn btn-success btn-sm"> Register</button>
          </div>
        </form>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
     
    <script type="text/javascript" src="js/function.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script>
            
            function isInputNumber(evt){
                
                var ch = String.fromCharCode(evt.which);
                
                if(!(/[0-9]/.test(ch))){
                    evt.preventDefault();
                }
                
            }
            
        </script>
    <script>
            
            function isInputLetter(evt){
                
                var ch = String.fromCharCode(evt.which);
                
                if(!(/[A-Za-z]/.test(ch))){
                    evt.preventDefault();
                }
                
            }
        </script>
                            <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>  
    <script>
      $(function () {
        $('#reportList').DataTable()
        $('#').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      })
    </script>
    <script type="text/javascript" src="js/script1.js"></script>
  </body>
</html>
