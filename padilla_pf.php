<?php
$name = $_POST['name'] ?? '';
$personalAddress = $_POST['personal-address'] ?? '';
$currentAddress = $_POST['current-address'] ?? '';
$contact = $_POST['contact'] ?? '';
$email = $_POST['email'] ?? '';
$socmed = $_POST['socmed'] ?? '';

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "itec_finals";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO padilla_personal_data (name, personal_address, current_address, contact, email, socmed) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $personalAddress, $currentAddress, $contact, $email, $socmed);

if ($stmt->execute()) {
    header("Location: padilla_dis_hrd_companydata.html");
} else {
    echo "Error inserting data: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
