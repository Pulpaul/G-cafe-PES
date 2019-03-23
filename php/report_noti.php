<?php 
include 'connect.php';

$pdoQuery = "SELECT * FROM tbl_report WHERE state = 'Unseen' ";

$pdoResult = $pdoConnect->query($pdoQuery);

$pdoRowCount = $pdoResult->rowCount();

if ($pdoRowCount <= 0) {
                echo " ";
              } else {
              echo "<span class='label label-danger pull-right'>$pdoRowCount</span>";  
              } ?>