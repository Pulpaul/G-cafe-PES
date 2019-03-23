<?php 
include('php/functions.php');

if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}

include('php/connection.php');
  $id=$_GET['id'];
  $query=mysqli_query($conn,"select * from `event` where id='$id'");
  $row=mysqli_fetch_array($query);
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>G-Cafe | Event</title>
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
            <li class="dropdown">
          <a href="#"  class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accounts <span class="caret"></span></a>
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
            <li><a href="event.php">All Tournaments</a></li>
          </ul>
        </li>
        <li><a href="report.php" id="seen_report_btn">Reports <span id="report_noti"> </span></a></li>

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
            <li><a href="events.php?logout='1'">  <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
        <div class=" ">
            <div class="row">
                <div class="col-md-10">
                    <h1> <span class="glyphicon glyphicon-user" aria-hidden="true"> Event<small>accounts</small></h1>
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
                <li class="active">Events</li>
            </ol>
        </div>
    </section>f

    <section id="main">
        <div class=" ">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                    <a href="#" class="list-group-item active main-color-bg">
                        Command
                    </a> 
                    <a style="cursor: pointer;" class="list-group-item" data-toggle="modal" data-target="#addEvent"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create Event</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                    <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">Event Update</h3>
                    </div>
                    <div class="panel-body">
                    <table class="table table-striped table-hover">
                      
                        <tbody>
            <form method="post" action="php/updateEvents.php?id=<?php echo $id; ?>">
            <?php echo display_error(); ?>
            <label>Marshall ID</label>
            <input type="text" name="id" value="<?php echo $row['id']; ?>" class="form-control" required autofocus readonly>

            <label>Marshall Username</label>
            <input type="text" name="marshall" value="<?php echo $row['marshall']; ?>" class="form-control" required autofocus readonly>

            <label>Cafe Name</label>
            <input type="text" name="cafename" value="<?php echo $row['cafename']; ?>" class="form-control" required autofocus>

            <label>Landmark</label>
            <input type="text" name="landmark" value="<?php echo $row['landmark']; ?>" class="form-control" required autofocus>

            <label>Event Date</label>
            <input type="date" name="eventdate" value="<?php echo $row['eventdate']; ?>" class="form-control" required autofocus>

            <label>Event Time</label>
            <input type="time" name="time" value="<?php echo $row['time']; ?>" class="form-control" required autofocus>

            <label>Event Type</label>
            <select name="type" class="form-control input-sm" required autofocus>
              <option value="GCALP Elite">GCALP Elite</option>
              <option value="Academy Arena">Academy Arena</option>
               <option value="Teemo Cup">Teemo Cup</option>
              <option value="Lulu Cup">Lulu Cup</option>
               <option value="AOV Community Arena">AOV Community Arena</option>
            </select>

            <label>Status</label>
            <select name="status" class="form-control" required autofocus>
              <option value="Available">Available</option>
              <option value="Unavailable">Unavailable</option>
            </select>
            <br>
            <button type="submit" name="submit" class="btn btn-success"> Update </button><a href="event.php" class="btn btn-danger" style="float: right;" >Back <i class="glyphicon glyphicon-arrow-left"></i></a>

            <br>
            
            </form>
                        </tbody>
                        </table>
                    </div>
      
                </div>
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
   

    

        <script src="js/bootstrap.min.js"></script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>  
    <script>
      $(function () {
        $('#eventList').DataTable()
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
        <script type="text/javascript">
      $(document).ready(function(){
        $.ajax({
          url: "php/select_marshal_api.php",
              type: "POST",
              data: { },
              dataType: "json",
              success: function(data)
              {
                for (var i = 0; i < data.length; i++) {
                  $("#costEstimateNumber").append("<option>"+data[i]["id"]+"</option>");
                }
              }
        });
      });
    </script>
    <script type="text/javascript" src="js/script1.js"></script>

  </body>
</html>
<script type="text/javascript">  

        function error(){
          var a = document.getElementById("date").value; 

          if (a < "2018-11-16") {
            document.getElementById("errorDate").innerHTML=" Error!";
            return false;
          } 

        } 
</script>