<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "itec_finals";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
// Retrieve form data
$services = isset($_POST['services']) ? implode(", ", $_POST['services']) : "";
$subscription = $_POST['subscription'] ?? "";
$payment = $_POST['payment'] ?? "";
$supplier = $_POST['supplier'] ?? "";
$transactionDate = $_POST['transaction-date'] ?? "";
$remarks = $_POST['remarks'] ?? "";
$customerNumber = $_POST['customer-number'] ?? "";

var_dump($services);
var_dump($subscription);
var_dump($payment);
var_dump($supplier);
var_dump($transactionDate);
var_dump($remarks);
var_dump($customerNumber);

$sql = "INSERT INTO paciente_order_data (services, subscription, payment, supplier, transaction_date, remarks, customer_number)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $services, $subscription, $payment, $supplier, $transactionDate, $remarks, $customerNumber);

if ($supplier !== "") { 
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "Order submitted successfully.";
    } else {
        echo "Error submitting order.";
    }
} else {
    echo "Please select a preferred service provider.";
}

$stmt->close();
$conn->close();
}