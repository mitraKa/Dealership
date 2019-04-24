<?php
    include_once 'dbh.php';


    $dealerName = $_GET['seller'];
    $auction = $_GET['auction'];
    $location = $_GET['location'];
    $dealerId = $_GET['dealerId'];

    $sn = $_GET['serial_number'];
    $make = $_GET['make'];
    $model = $_GET['model'];
    $year = $_GET['year'];
    $color = $_GET['color'];
    $miles = $_GET['miles'];
    $condition = $_GET['condition'];
    $bookPrice = $_GET['bookPrice'];
    $pricePaid = $_GET['pricePaid'];
    $purchaseDate = $_GET['date'];

    $problem = $_GET['problem'];
    $estCost = $_GET['estCost'];
    $actCost = $_GET['actCost'];

    //$problem2 = $_GET['problem2'];
    //$estCost2 = $_GET['estCost2'];
    //$actCost2 = $_GET['actCost2'];

    //$problem3 = $_GET['problem3'];
    //$estCost3 = $_GET['estCost3'];
    //$actCost3 = $_GET['actCost3'];
//*****************************************************
//inserting data into car_warehouse
//******************************************************

    $sql ="INSERT INTO car_warehouse (sn,make,model,year,color,miles,cond,book_price,price_paid,purchase_date,id)
           VALUES ('$sn','$make','$model','$year','$color','$miles','$condition',
          '$bookPrice','$pricePaid','$purchaseDate','$dealerId');";
           mysqli_query($conn, $sql);
//************************************************************
//insert info into repair
//************************************************************
    $sql = "INSERT INTO repair_info (est_cost , act_cost , sn , problem)
            VALUES ('$estCost' , '$actCost','$sn','$problem');";
            mysqli_query($conn, $sql);

//**********************************************************
//inserting data into Seller
//**********************************************************

    $sql = "INSERT INTO seller(id, dealer_name ,auction ,location)
            VALUES ( '$dealerId','$dealerName','$auction' ,'$location');";
            mysqli_query($conn, $sql);










    header("Location: ../purchase.html?signup=success");


 ?>
