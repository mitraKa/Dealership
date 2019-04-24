<?php

include_once 'dbh.php';


$eId = $_GET['employee_id'];
$eFirstName = $_GET['eFirstName'];
$eLastName = $_GET['eLastName'];
$ePhone = $_GET['ePhone'];

$sql = "INSERT INTO employee_info (emp_id , first_name , last_name , phone)
        VALUES ('$eId','$eFirstName','$eLastName','$ePhone');";

mysqli_query($conn, $sql);


header("Location: ../employee.html?sale=success");
?>
