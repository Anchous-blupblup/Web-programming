<?php
$hourly wage = $_POST["hourly wage"] ?? 0;
$hourly rate = $_POST["hourly rate"] ?? 0;
$total wage = $hourly wage * $hourly rate;
echo "Total wage: " . $total wage;
echo "Total salary without weekend bonuses:" . $total wage;
echo "Total salary with weekend bonuses:" . $total wage;
?>