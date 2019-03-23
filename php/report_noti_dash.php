<?php
include 'connect.php';

$pdoQuery = "SELECT * FROM tbl_report WHERE state = 'Unseen' ";

$pdoResult = $pdoConnect->query($pdoQuery);

$pdoRowCount = $pdoResult->rowCount();

echo "<span class='badge pull-right'>$pdoRowCount</span>";
 ?>