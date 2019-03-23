<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];

    $query = "SELECT * FROM `users` WHERE CONCAT(`id`, `username`, `email`, `fname`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `users`";
    $search_result = filterTable($query);
}


function filterTable($query)
{
    $connect = mysqli_connect('den1.mysql6.gear.host', 'dbgcafe', 'password_', 'dbgcafe');
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}


?>