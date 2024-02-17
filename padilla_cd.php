<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $position = $_POST['position'];
    $salaryType = $_POST['salary-type'];
    $salaryAmount = $_POST['salary-amount'];
    $employmentDate = $_POST['employment-date'];

    $servername = "localhost";
    $username = "root";
    $password = '';
    $database = "itec_finals";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO padilla_company_data (position, salary_type, salary_amount, employment_date) 
            VALUES ('$position', '$salaryType', $salaryAmount, '$employmentDate')";

    if ($conn->query($sql) === TRUE) {
        header("Location: padilla_dis_hrd_publicform.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
