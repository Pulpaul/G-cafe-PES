<?php
include_once('conn.php');
$id = $_GET['marshall_id'];
$data = array();
$sql = "SELECT * FROM tbl_marshall where marshall_id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }
} else {
    echo "0 results";
}
header('Content-Type: application/json');
echo json_encode($data);
$conn->close();
?>