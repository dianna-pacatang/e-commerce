<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recordNumber = $_POST['rcrdnum'];
    $costCenterName = $_POST['ccn'];
    $costCenterCode = $_POST['ccc'];
    $remarks = $_POST['message'];

    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "itec_finals";

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO sanguir_cost_centers (record_number, cost_center_name, cost_center_code, remarks) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$recordNumber, $costCenterName, $costCenterCode, $remarks])) {
        echo "Data Saved Successfully!.";
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>
