<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $employeeName = $_POST["employee_name"];
    $employeeID = $_POST["employee_ID"];
    $dailyRate = $_POST["daily_rate"];
    $daysWorked = $_POST["days_worked"];
    $overtimeHours = $_POST["overtime"];
    $is13thMonthPay = isset($_POST["13thmonth"]);
    $holidayPayPercentage = $_POST["30%"] ?? $_POST["100%"];
    $bonusPay = $_POST["bonus"];
    $miscellaneousPay = $_POST["misc"];
    $allowancePay = $_POST["allowance"];
    $taxDeduction = $_POST["tax"];
    $isSSSContribution = isset($_POST["sss"]);
    $isPagibigContribution = isset($_POST["pagibig"]);

    $regularPay = $dailyRate * $daysWorked;

    $overtimePayRate = $dailyRate * 1.25; 
    $overtimePay = $overtimePayRate * $overtimeHours;

    $grossPay = $regularPay + $overtimePay + $bonusPay + $miscellaneousPay + $allowancePay;
    if ($is13thMonthPay) {
        $grossPay += $regularPay;
    }

    $totalDeduction = 0;
    if ($isSSSContribution) {
        $totalDeduction += $grossPay * 0.14; 
    }
    if ($isPagibigContribution) {
        $totalDeduction += 200; 
    }
    $totalDeduction += 500; 
    $totalDeduction += $taxDeduction;

    $netPay = $grossPay - $totalDeduction;
    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "itec_finals";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO deasis_mercado_payroll (employee_name, employee_id, regular_pay, overtime_pay, gross_pay, total_deduction, net_pay)
            VALUES ('$employeeName', '$employeeID', '$regularPay', '$overtimePay', '$grossPay', '$totalDeduction', '$netPay')";

    if ($conn->query($sql) === TRUE) {
        echo "Payroll data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
