<?php
$incomeType = $_POST['income'];
$amountPeso = $_POST['amtpeso'];
$salesDate = $_POST['salesdate'];
$client = $_POST['client'];
$transactionDate = $_POST['transdate'];
$paymentMethod = $_POST['paymentmethod'];
$costCenter = $_POST['costcenter'];

$servername = "localhost"; 
$username = "root"; 
$password = ''; 
$dbname = "itec_finals"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO sanguir_table_ar (income_type, amount_peso, sales_date, client, transaction_date, payment_method, cost_center)
        VALUES ('$incomeType', '$amountPeso', '$salesDate', '$client', '$transactionDate', '$paymentMethod', '$costCenter')";

if ($conn->query($sql) === TRUE) {
    header("Location: sanguir_dis_act_ap.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
