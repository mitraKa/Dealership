<?php
    include_once 'dbh.php';

    $empId = $_GET['employee_id'];
    $sn = $_GET['vehicle_sn'];
    $customerId = $_GET['customer_id'];
    $coSigner = $_GET['co_signer'];
    $saleDate = $_GET['sale_date'];
    $warantyId = $_GET['warantyId'];
    $monthlyCost = $totalCost/$length;
    $totalCost = $_GET['total_cost'];
    $startDate = $_GET['start_date'];
    $length = $_GET['length'];


    $sql = "INSERT INTO waranty_sale(sn,emp_id,waranty_id,cust_id,saleDate,co_signer,monthly_cost,start_date,length,total_cost)
            VALUES ( '$sn','$empId' ,'$warantyId' ,'$customerId','$saleDate','$coSigner','$monthlyCost','$startDate','$length','$totalCost' );";
            mysqli_query($conn, $sql);
  header("Location: ../warranty.html?waranty=success");


?>
