<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $expenseType = $_POST['expense'];
    $supplier = $_POST['supplier'];
    $transactionDate = $_POST['exptransdate'];
    $paymentMethod = $_POST['payment_method'];
    $costCenter = $_POST['cost_center'];

    $host = 'localhost';
    $dbname = 'itec_finals'; 
    $username = 'root';
    $password = ''; 
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO sanguir_expenses (expense_type, supplier, transaction_date, payment_method, cost_center)
            VALUES (:expenseType, :supplier, :transactionDate, :paymentMethod, :costCenter)");

        $stmt->bindParam(':expenseType', $expenseType);
        $stmt->bindParam(':supplier', $supplier);
        $stmt->bindParam(':transactionDate', $transactionDate);
        $stmt->bindParam(':paymentMethod', $paymentMethod);
        $stmt->bindParam(':costCenter', $costCenter);

        $stmt->execute();

        header('Location: sanguir_dis_act_costcenter.html');
        exit;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
