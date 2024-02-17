<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "itec_finals";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sss = $_POST["sss"];
    $pagibig = $_POST["pagibig"];
    $philhealth = $_POST["philhealth"];
    $tax = $_POST["tax"];
    $nationalid = $_POST["nationalid"];
    $license = $_POST["license"];

    $sql = "INSERT INTO padilla_form_data (sss, pagibig, philhealth, tax, nationalid, license)
            VALUES ('$sss', '$pagibig', '$philhealth', '$tax', '$nationalid', '$license')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
