<?php
$item_ink = $_POST['item_ink'];
$qty_ink = $_POST['qty_ink'];

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "itec_finals";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$table = "CREATE TABLE IF NOT EXISTS your_table_name (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_ink VARCHAR(255) NOT NULL,
    qty_ink VARCHAR(255) NOT NULL
)";

if ($conn->query($table) === TRUE) {
    $insert = "INSERT INTO hilis_inbound (item_ink, qty_ink) VALUES ('$item_ink', '$qty_ink')";

    if ($conn->query($insert) === TRUE) {
        header("Location: hilis_dis_scm_new_itemt.html");
        exit;
    } else {
        echo "Error: " . $insert . "<br>" . $conn->error;
    }
} else {
    echo "Error creating table: " . $table . "<br>" . $conn->error;
}

$conn->close();
?>
