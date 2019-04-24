<?php
    include_once 'dbh.php';

    $pmtDate = $_GET['pmt_date'];
    $paidDate = $_GET['paid_date'];
    $amount = $_GET['amount'];
    $bankAccount = $_GET['bank_account'];
    $custId = $_GET['customer_id'];

    $sql = "INSERT INTO payments(pmt_date ,paid_date,amount,bank_account,cust_id)
            VALUES ( '$pmtDate','$paidDate' ,'$amount' ,'$bankAccount','$custId' );";
            mysqli_query($conn, $sql);

header("Location: ../payment.html?payments=success");


?>
