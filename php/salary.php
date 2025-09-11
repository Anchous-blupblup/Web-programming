<!DOCTYPE html>
<html>
  <head>
    <title>Salary</title>
  </head>
  <body>
    <?php
$hourly_wage = $_POST["hourly_wage"] ?? 0;
$hourly_rate = $_POST["hourly_rate"] ?? 0;
$weekend_allowance = $_POST["weekend_allowance"] ?? 0;
$weekends = $_POST["weekends"] ?? 0;

$total_wage = $hourly_wage * $hourly_rate;
$total_without_bonus = $hourly_wage * $hourly_rate;
$total_with_bonus = $total_without_bonus + ($weekend_allowance * $weekends);

echo "Total wage: " . $total_wage . "<br>"; 
echo "Total salary without weekend bonuses:" . $total_without_bonus . "<br>"; 
echo "Total salary with weekend bonuses:" . $total_with_bonus . "<br>"; 
?>
</body>
</html>