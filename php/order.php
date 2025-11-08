<?php

$summary = "";


function calculateDeliveryPrice($deliverymethod) {
    switch ($deliverymethod) {
        case "Pickup": return 0.00;
        case "Postal Package": return 6.90;
        case "Home Delivery": return 12.50;
        default: return 0;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $price_piece = 349.90;
    $quantity = (int)($_POST["quantity"] ?? 1);
    $deliverymethod = $_POST["deliverymethod"] ?? "Pickup";

    $subtotal = $price_piece * $quantity;
    $delivery = calculateDeliveryPrice($deliverymethod);
    $total = $subtotal + $delivery;

    $summary = "
        <div class='summary-box'>
            <h3>Order Summary</h3>
            <p><strong>Quantity:</strong> $quantity pcs</p>
            <p><strong>Subtotal:</strong> " . number_format($subtotal, 2) . " €</p>
            <p><strong>Delivery method:</strong> $deliverymethod</p>
            <p><strong>Shipping cost:</strong> " . number_format($delivery, 2) . " €</p>
            <p><strong>Total price:</strong> <span class='total'>" . number_format($total, 2) . " €</span></p>
        </div>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Form</title>
    <link rel="stylesheet" href="order.css">
</head>

<body>
    <div class="container">
        <h1>Order the product</h1>
        <h3>Product: Electric scooter (€349.90/piece)</h3>

        <form method="post" action="">
            <label for="quantity">Quantity:</label><br>
            <input type="number" id="quantity" name="quantity" value="1" min="1"><br>

            <label for="deliverymethod">Delivery method:</label><br>
            <select id="deliverymethod" name="deliverymethod">
                <option value="Pickup">Pickup (0.00€)</option>
                <option value="Postal Package">Postal Package (6.90€)</option>
                <option value="Home Delivery">Home Delivery (12.50€)</option>
            </select><br><br>

            <input type="submit" class="button" value="Calculate the price">
        </form>

        <?php

        if ($summary) {
            echo $summary;
        }
        ?>
    </div>
</body>
</html>
