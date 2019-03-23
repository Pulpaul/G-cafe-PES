<?php 
include 'connect.php';

$pdoQuery = "SELECT * FROM event WHERE status = 'Accepted' AND state = 'Unseen' ";

$pdoResult = $pdoConnect->query($pdoQuery);

$pdoRowCount = $pdoResult->rowCount();

if ($pdoRowCount <= 0) {
                echo "";
              } else {
              echo "<span class='label label-danger pull-right'>$pdoRowCount</span>";  
              } ?>