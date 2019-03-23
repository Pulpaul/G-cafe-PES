<?php 
include('php/functions.php');
include('php/connection.php');

$id = $_GET['id'];

$sql = "SELECT * FROM tbl_report WHERE Id = '$id' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>G-Cafe | Marshall</title>
   <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css"> 
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <script src='https://www.google.com/recaptcha/api.js'></script> 
    <style type="text/css">
      .logo{ 
        width: 25%;
      } 
    </style>
  </head>
  <body>
   
     
    <section> <br>
      <div class="text-center">
        <img src="img/gcafelog.png" class="logo"> <br>
        G-CAFE MARHSALL REPORT
        <br>
        Ticket ID: <?php echo $row['id']; ?>
        <br>
        Date Issued: <?php echo date("Y/m/d"); ?>
        <br>
        Time Issued: <?php echo date("h:i a"); ?>
      </div> <br>
      <div class="container" class="report_table">
        <div class="row">
          <div class="col-md-4">
            
          </div>
          <div class="col-md-4">
            <table class="table table-bordered">
              <tr>
              <th>REPORT</th>
              <th>DETAILS</th>  
            </tr> 
            <tr>
              <td><label>Time In:</label></td>
              <td><label><?php echo $row['time_in']; ?></label></td>  
            </tr>
            <tr>
              <td><label>Time Out:</label></td>
              <td><label><?php echo $row['time_out']; ?></label></td>  
            </tr>
            <tr>
              <td><label>Event Date:</label></td>
              <td><label><?php echo $row['event_date']; ?></label></td>  
            </tr>
            <tr>
              <td><label>Cafe Name:</label></td>
              <td><label><?php echo $row['cafe_name']; ?></label></td>  
            </tr>
            <tr>
              <td><label>Feedback:</label></td>
              <td><label><?php echo $row['feedback']; ?></label></td>  
            </tr>
            </table>
          </div>
        </div>
      </div>
      <button onclick="printTicket()" class="btn btn-primary btn-link btn-round btn-fab btn-sm" style="margin-left: 60%;"><i class="glyphicon glyphicon-print"></i></button>
    </section>




    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>  
    <script type="text/javascript" src="js/function.js"></script>
    <script type="text/javascript" src="js/script1.js"></script>
  </body>
</html>
