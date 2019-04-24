<?php

include_once 'dbh.php';



//employment history informatio
$employer = $_GET['employer'];
$title = $_GET['title'];
$supervisor = $_GET['supervisor'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$start = $_GET['start'];

$employer1 = $_GET['employer1'];
$title1 = $_GET['title1'];
$supervisor1 = $_GET['supervisor1'];
$phone1 = $_GET['phone1'];
$address1 = $_GET['address1'];
$start1 = $_GET['start1'];

$employer2 = $_GET['employer2'];
$title2 = $_GET['title2'];
$supervisor2 = $_GET['supervisor2'];
$phone2 = $_GET['phone2'];
$address2 = $_GET['address2'];
$start2 = $_GET['start2'];

//employee information
$eId = $_GET['employee_id'];
//$eFirstName = $_GET['eFirstName'];
//$eLastName = $_GET['eLastName'];
//$ePhone = $_GET['ePhone'];



//payment information
$pmtDate = $_GET['pmt_date'];
$paidDate = $_GET['paid_date'];
$amount = $_GET['amount'];
$bankAccount = $_GET['bank_account'];
$custId = $_GET['customer_id'];

//customer information
$cFirstName = $_GET['first'];
$cLastName = $_GET['last'];
$cPhone = $_GET['custmerPhone'];
$cAdd = $_GET['customerAddress'];
$cCity = $_GET['customerCity'];
$cState = $_GET['customerState'];
$cZip = $_GET['customerZip'];
$cId = $_GET['customerId'];

//sale_car information
$saleDate = $_GET['saleDate'];
$totalDue = $_GET['totalDue'];
$downPayment = $_GET['downPayment'];
$financeAmount = $totalDue - $downPayment;
$serialNumber = $_GET['serial_num'];
$commition = $downPayment * 0.05;


//*********************************************************
//inserting data in customer
//******************************************************
for($i=0;$i<3;$i++)
{
$sql = "INSERT INTO customer (cust_id,first_name,last_name,phone,address,city,state,zip)
VALUES ('$cId','$cFirstName','$cLastName','$cPhone','$cCity','$cAdd','$cState','$cZip');";
}

mysqli_query($conn , $sql);

//*********************************************************
//Entering data into employment History
//*********************************************************


  $sql = "INSERT INTO employment_history (employer_name,title,supervisor, phone , address,cust_id , start_date)
  VALUES ('$employer','$title','$supervisor' ,'$phone','$address','$cId','$start');";

  mysqli_query($conn, $sql);

  $sql = "INSERT INTO employment_history (employer_name,title,supervisor, phone , address,cust_id , start_date)
  VALUES ('$employer1','$title1','$supervisor1' ,'$phone1','$address1','$cId','$start1');";

  mysqli_query($conn, $sql);

  $sql = "INSERT INTO employment_history (employer_name,title,supervisor, phone , address,cust_id , start_date)
  VALUES ('$employer2','$title2','$supervisor2' ,'$phone2','$address2','$cId','$start2');";

  mysqli_query($conn, $sql);



//**********************************************************
//Entering data into payments
//**********************************************************

$sql = "INSERT INTO payments(pmt_date ,paid_date,amount,bank_account,cust_id)
        VALUES ( '$pmtDate','$paidDate' ,'$amount' ,'$bankAccount','$custId' );";
        mysqli_query($conn, $sql);

//************************************************************
//intering info into employee_info
//************************************************************
//$sql = "INSERT INTO employee_info (emp_id , first_name , last_name , phone)
  //      VALUES ('$eId','$eFirstName','$eLastName','$ePhone');";

    //    mysqli_query($conn, $sql);

//***************************************************************
//inserting info into car_sale
//***************************************************************

$sql = "INSERT INTO car_sale (sn , cust_id, emp_id , sale_date , total_due , down_payment ,finance_amount,commition)
VALUES ('$serialNumber','$cId','$eId','$saleDate','$totalDue','$downPayment','$financeAmount','$commition');";

mysqli_query($conn, $sql);

//****************************************************************
//Deleting the car from warehouse when it is sold
//****************************************************************

$sql = "DELETE FROM car_warehouse WHERE sn = $serialNumber;";
mysqli_query($conn, $sql);




$size = sizeof($employer);
















header("Location: ../sale.html?sale=success");
 ?>
