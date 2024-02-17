<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $lname = $_POST["lname"];
    $suffix = $_POST["suffix"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $compname = $_POST["compname"];
    $compweb = $_POST["compweb"];

    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "itec_finals";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO paciente_customer_data (fname, mname, lname, suffix, email, phone, address, compname, compweb)
            VALUES ('$fname', '$mname', '$lname', '$suffix', '$email', '$phone', '$address', '$compname', '$compweb')";

    if ($conn->query($sql) === TRUE) {
        header("Location: paciente_dis_mkt_index2.html");
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
