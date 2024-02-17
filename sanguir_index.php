<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'itec_finals';

$connection = mysqli_connect($host, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $incomeType = $_POST["incomeType"];
    $incomeAmount = $_POST["incomeAmount"];
    $salesDate = $_POST["salesDate"];
    $client = $_POST["client"];
    $transactionDate = $_POST["transactionDate"];
    $paymentMethod = $_POST["paymentMethod"];

    $expenseType = $_POST["expenseType"];
    $supplier = $_POST["supplier"];
    $expenseTransactionDate = $_POST["expenseTransactionDate"];
    $expensePaymentMethod = $_POST["expensePaymentMethod"];

    $recordNumber = $_POST["recordNumber"];
    $costCenterName = $_POST["costCenterName"];
    $costCenterCode = $_POST["costCenterCode"];
    $remarks = $_POST["remarks"];

    $sql = "INSERT INTO sanguir_form_data (income_type, income_amount, sales_date, client, transaction_date, payment_method, expense_type, supplier, expense_transaction_date, expense_payment_method, record_number, cost_center_name, cost_center_code, remarks) 
            VALUES ('$incomeType', '$incomeAmount', '$salesDate', '$client', '$transactionDate', '$paymentMethod', '$expenseType', '$supplier', '$expenseTransactionDate', '$expensePaymentMethod', '$recordNumber', '$costCenterName', '$costCenterCode', '$remarks')";

    if (mysqli_query($connection, $sql)) {
        header("Location: sanguir_dis_act_ap.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
