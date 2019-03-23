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
    <title>G-Cafe | Manager</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css"> 
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
    </section>

    <section id="main">
        <div class=" ">
            <div class="row">
                <div class="col-md-2">
                    <div class="list-group">
                    <a href="#" class="list-group-item active main-color-bg">
                        Command
                    </a> 
                    <a style="cursor: pointer;" class="list-group-item" data-toggle="modal" data-target="#addEvent"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create Event</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="panel panel-default">
                    <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">Event List</h3>
                    </div>
                    <div class="panel-body table-responsive no-padding">
                    <table id="eventList" class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Marshall Id</th>
                          <th>Marshall Username</th>
                            <th>Cafe Name</th>
                            <th>Landmark</th>
                            <th>Event Date</th>
                            <th>Event Time</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                      </thead> 
                        <tbody>
                           <?php 
                            include('php/connection.php');
          $query = mysqli_query($conn,"SELECT * FROM event ORDER BY eventdate DESC");
          while($row = mysqli_fetch_array($query)){
            ?> 
            <?php while($row = mysqli_fetch_array($search_result)):?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['marshall']; ?></td>
              <td><?php echo $row['cafename']; ?></td>
               <td><?php echo $row['landmark']; ?></td>
              <td><?php echo $row['eventdate']; ?></td>
               <td><?php echo $row['time']; ?></td>
              <td><?php echo $row['type']; ?></td>
              <td><?php echo $row['status']; ?></td>
              <td>
                <a class="btn btn-success btn-sm" href="editEvents.php?id=<?php echo $row['id']; ?>" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-edit"></i></a> 
                <a class="btn btn-info btn-sm" href="viewEvent.php?id=<?php echo $row['id']; ?>" data-toggle='tooltip' title='View Details'><i class="glyphicon glyphicon-eye-open"></i></a>
                <a class="btn btn-danger btn-sm" href="php/deleteEvents.php?id=<?php echo $row['id']; ?>" data-toggle="tooltip" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>
              </td>
            </tr>
            <?php endwhile;?>
            <?php } ?>
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



    <div id="addEvent" class="modal fade" data-keyboard="false" data-backdrop="static" data-show="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header main-color-bg">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;"><span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title" id="myModalLabel"><img src="img/gcaf.png" style="width:27px; height:30px;"></h6>
        </div>

        <div class="modal-body">
                <h4>Create New Event</h4>
                <div class="h-divider"></div>  

            <form method="post" action="php/addEvent.php" onsubmit="return error()">
            <?php echo display_error(); ?>
            <label>Marshall ID</label>
            <select name="id" id="costEstimateNumber" class="form-control input-sm" required autofocus>
            <option></option>
            </select>
            <label>Marshall  Username</label>
            <input type="text" name="marshall" id="username"  class="form-control" required readonly>

            <label>Marshall  Number</label>
            <input type="text" name="number" id="number" class="form-control" required >
            
            <label>Cafe Name</label><span id="cafe" style="color: red;"></span>
            <input type="text" name="cafename"  id="cafename" class="form-control" required autofocus>

            <label>Landmark</label> <span id="land" style="color: red;"></span>
            <input type="text" name="landmark" id="landmark" class="form-control" required autofocus>

            <label>Event Date</label> <span id="errorDate" class="text-danger"></span>
           <input type="date" name="eventdate" class="form-control" id="date" required autofocus>
        
           <label>Event Time</label>
           <input type="time" name="time" class="form-control" required autofocus>
        
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
              <option>Pending</option> 
            </select>
            <br>
          <input type="submit" value="submit" name="submit" class="btn btn-success" />
        </div>
        </div>
    </div>

<footer class="page-footer font-small blue pt-4 mt-4">

<div class="footer-copyright py-3 text-center" style="color:gray;">
Software Engineer © 2018

</div>
<!--/.Copyright-->
</footer>
 
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
        $(document).on( "click", "#btnEventDetails", function(){
        var id = $(this).attr("data-id");

          $.ajax({
              url: "php/getEventDetails.php",
              type: "POST",
              data: { id:id },
              dataType: "json",
              success: function(data)
              {
                  $("#ids").html(data[0]['id']);
                  $("#mar").html(data[0]['marshall']);
                  $("#caf").html(data[0]['cafename']);
                  $("#lan").html(data[0]['landmark']);
                  $("#eve").html(data[0]['eventdate']);
                  $("#tim").html(data[0]['time']);
                  $("#typ").html(data[0]['type']);
                  $("#sta").html(data[0]['status']);
              }
          });
        });

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

          if (a < "2019-03-23") {
            document.getElementById("errorDate").innerHTML=" Error!";
            return false;
          } 

        } 
</script>
 