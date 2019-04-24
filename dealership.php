<?php
include_once 'includes/dbh.php';
?>
<!DOCTYPE html>

<html>
<head>
  <title>Home</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Westside Auto Inc</h1>
  <a href="purchase.html">Purchase Form</a>
  <a href="sale.html">Sale Form</a>
  <a href="Warranty.html">Waranty Form</a>
  <a href="Payment.html">Payments Form</a>
  <a href="employee.html">Employee Form</a>

<h3>Find the model of all cars made by: </h3>
<form  method="post">
Enter the make of car you looking for:<input type="text" name="make" placeholder="Car Make">

</form>
<?php
if(isset($_POST['model']))
{
$carMake = $_POST['make'];

echo "the models:"."<br>";
$sql="SELECT model FROM car_warehouse WHERE make='$carMake'";
$result = mysqli_query($conn , $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0 )
{
  while($row = mysqli_fetch_assoc($result))
  {
    echo $row['model']."<br>";
  }
}
}
?>

<h3>Find the items coveed of certain waranty: </h3>
<form  method="post">
Enter the waranty id :<input type="number" name="q" placeholder="waranty id">

</form>
<?php
if(isset($_POST['q']))
{
$q = $_POST['q'];
echo "the covered items are:"."<br>";
$sql="SELECT items_covered FROM waranty WHERE waranty_id='$q'";
$result = mysqli_query($conn , $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0 )
{
  while($row = mysqli_fetch_assoc($result))
  {
    echo $row['items_covered']."<br>";
  }
}
}
?>

<h3>Find the information of the employee based on emloyee id</h3>
<form  method="post">
Enter the employee id of employee you looking for:<input type="number" name="q2" placeholder="Employee Id">

</form>
<?php
if(isset($_POST['q2']))
{
$q2 = $_POST['q2'];
//echo "the models:"."<br>";
$sql="SELECT first_name,last_name,phone FROM employee_info WHERE emp_id='$q2'";
$result = mysqli_query($conn , $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0 )
{
  while($row = mysqli_fetch_assoc($result))
  {
    echo "First Name:  ".$row['first_name']."<br>Last Name:  ".$row['last_name']."<br>Phone Number:  ".$row['phone'];
  }
}
}
?>

<h3>Find all the cutomers who live in a spicific city</h3>
<form  method="post">
Enter the city:<input type="text" name="q3" placeholder="City">

</form>
<?php
if(isset($_POST['q3']))
{
$q3 = $_POST['q3'];
//echo "the models:"."<br>";
$sql="SELECT first_name, last_name  FROM customer WHERE city='$q3'";
$result = mysqli_query($conn , $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0 )
{
  while($row = mysqli_fetch_assoc($result))
  {
    echo "First Name:  ".$row['first_name']."<br>Last Name:  ".$row['last_name'];
  }
}
}
?>

<h3>Find all th dealers who work in a specific location</h3>
<form  method="post">
Enter the city:<input type="text" name="q4" placeholder="Dealership Location">

</form>
<?php
if(isset($_POST['q4']))
{
$q4 = $_POST['q4'];
//echo "the models:"."<br>";
$sql="SELECT id , dealer_name FROM seller WHERE location='$q4'";
$result = mysqli_query($conn , $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0 )
{
  while($row = mysqli_fetch_assoc($result))
  {
    echo "Dealer's id:  ".$row['id']."<br>Dealer's Name:  ".$row['dealer_name']."<br>-----------------------<br>";
  }
}
}
?>

<h3>Find the employment history of a customer based on customer ID</h3>
<form  method="post">
Enter the city:<input type="number" name="q5" placeholder="Customer ID">

</form>
<?php
if(isset($_POST['q5']))
{
$q5 = $_POST['q5'];
//echo "the models:"."<br>";
$sql="SELECT * FROM employment_history WHERE cust_id='$q5'";
$result = mysqli_query($conn , $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0 )
{
  while($row = mysqli_fetch_assoc($result))
  {
    echo "Employer Name:  ".$row['employer_name']."<br>title:  ".$row['title'].
    "<br>address:  ".$row['address']."<br>-----------------------<br>";
  }
}
}
?>

<h3>Find the total payments of a specific customer</h3>
<form  method="post">
Enter the customer Id:<input type="number" name="q6" placeholder="Customer ID">

</form>
<?php
if(isset($_POST['q6']))
{
$q6 = $_POST['q6'];
//echo "the models:"."<br>";
$sql="SELECT SUM(amount) as summ FROM payments WHERE cust_id='$q6'";
$result = mysqli_query($conn , $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0 )
{
  while($row = mysqli_fetch_assoc($result))
  {
    echo "Amount:  ".$row['summ'];
  }
}
}
?>

<h3>Find the name of customers and payment history of them after a certain date</h3>
<form  method="post">
Enter the desired date:<input type="number" name="q7" placeholder="Date">

</form>
<?php
if(isset($_POST['q7']))
{
$q7 = $_POST['q7'];
$sql="SELECT customer.first_name ,payments.amount,payments.paid_date FROM customer,payments WHERE customer.cust_id=payments.cust_id AND payments.pmt_date>'$q7'";
$result = mysqli_query($conn , $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0 )
{
  while($row = mysqli_fetch_assoc($result))
  {
    echo "Name:  ".$row['first_name']."<br>Amount:  ".$row['amount']."<br>Paid Date:  ".$row['paid_date']."<br>-----------------------<br>";

  }
}
}
?>
<h3>Find the cars sold and employees who sold them on a certain date</h3>
<form  method="post">
Enter the desired date:<input type="number" name="q8" placeholder="Date">

</form>
<?php
if(isset($_POST['q8']))
{
$q8 = $_POST['q8'];
$sql="SELECT employee_info.first_name,employee_info.last_name,car_warehouse.sn,car_warehouse.make,car_warehouse.model
FROM car_warehouse,employee_info,car_sale
WHERE car_sale.emp_id = employee_info.emp_id AND car_sale.sn = car_warehouse.sn AND car_sale.sale_date='$q8'";
$result = mysqli_query($conn , $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0 )
{
  while($row = mysqli_fetch_assoc($result))
  {
    echo "employee's First Name:  ".$row['first_name']."<br>employee's Last Name:  ".$row['last_name'].
    "<br>Serial number:  ".$row['sn']."<br>Make:  ".$row['make']."<br>Model:  ".$row['model']."<br>-----------------------<br>";

  }
}
}
?>

<h3>Number of total waranties sold by Employees in a certain time period</h3>
<form  method="post">
Enter the desired date:<input type="number" name="q9" placeholder="Start">

</form>
<?php
if(isset($_POST['q9']))
{
$q9 = $_POST['q9'];

$sql="SELECT COUNT(waranty_sale.emp_id) as total ,employee_info.first_name,employee_info.last_name
FROM employee_info,waranty_sale
WHERE employee_info.emp_id = waranty_sale.emp_id AND waranty_sale.saleDate>'$q9';";
$result = mysqli_query($conn , $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0 )
{
  while($row = mysqli_fetch_assoc($result))
  {
    echo "employee's First Name:  ".$row['first_name']."<br>employee's Last Name:  ".$row['last_name'].
    "<br>Total Waranies Sold:  ".$row['total']."<br>-----------------------<br>";

  }
}
}
?>

</body>

</html>
