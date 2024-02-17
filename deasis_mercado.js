function calculatePay() {
  var dailyRate = parseFloat(document.getElementById("daily_rate").value);
  var daysWorked = parseFloat(document.getElementById("days_worked").value);
  var overtime = parseFloat(document.getElementById("overtime").value);
  var tax = parseFloat(document.getElementById("tax").value);
  var _sss = parseFloat(document.getElementById("sss").value);
  var pagIbig = parseFloat(document.getElementById("pagibig").value);
  var philHealth = parseFloat(document.getElementById("philhealth").value);
  var _13th = parseFloat(document.getElementById("13thmonth").value);
  var holidayPay30 = parseFloat(document.getElementById("30%").value);
  var holidayPay100 = parseFloat(document.getElementById("100%").value);
  var bonusPay = parseFloat(document.getElementById("bonus").value);
  var miscPay = parseFloat(document.getElementById("misc").value);
  var allowancePay = parseFloat(document.getElementById("allowance").value);
  var loanPayment = parseFloat(document.getElementById("loancost").value);
  var cashAdv = parseFloat(document.getElementById("c/a").value);
  var miscDed = parseFloat(document.getElementById("miscded").value);

  
  var regularPay = dailyRate * daysWorked;
  var overtimePay = (dailyRate / 25) * overtime;
  var _13thmonth = ((dailyRate * 30) * 12) / 12;
  var grossPay = regularPay + overtimePay + (dailyRate * holidayPay30) + (dailyRate*holidayPay100) + _13thmonth + bonusPay + miscPay + allowancePay;
  var totalDeduction = (grossPay * (tax / 100)) + (grossPay * _sss) + (daysWorked * pagIbig) + (daysWorked * philHealth) + loanPayment + cashAdv + miscDed;
  var netPay = grossPay - totalDeduction;
  
  document.getElementById("regular-pay").value = regularPay.toFixed(2);
  document.getElementById("overtime-pay").value = overtimePay.toFixed(2);
  document.getElementById("gross-pay").value = grossPay.toFixed(2);
  document.getElementById("total-deduction").value = totalDeduction.toFixed(2);
  document.getElementById("net-pay").value = netPay.toFixed(2);

}
