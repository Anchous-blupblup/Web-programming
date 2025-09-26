<!DOCTYPE html>
<html>

<head>
    <title>Salary</title>
</head>

<body>
    <?php

    // PHP task 7: Order form prototype
    
    // Copy the function from task 6
    
    // Initialize the variables so that they exist even if the form has not been submitted
    $summary = null;
    $quantity = null;
    $selected_method = "";
    $deliverymethod = "";
    $price = "";
    $total  = "";
    $subtotal  = "";

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from the form
        // Product information
        // Calculations
        // Build a summary variable for printing

        $price_piece = 349.90;
        $quantity = $_POST["quantity"] ?? "";
        $selected_method = $_POST["deliverymethod"] ?? "";
        $deliverymethod = $selected_method;
        $price = calculateDeliveryPrice($deliverymethod);
        function calculateDeliveryPrice($deliverymethod)
        {
            switch ($deliverymethod) {
                case "Pickup":
                    return 0.00;
                case "Postal Package":
                    return 6.90;
                case "Home Delivery":
                    return 12.50;
                default:
                    return -1;
            }
        }
        $subtotal = $price_piece * $quantity;
        $total = $price + $subtotal; 
        $summary = "
        <h2>Order Summary</h2>
        <p><strong>Quantity:</strong> $quantity pcs</p>
        <p><strong>Subtotal:</strong> " . number_format($subtotal, 2) . " €</p>
        <p><strong>Delivery method:</strong> $selected_method;</p>
        <p><strong>Shipping cost:</strong> " . number_format($price, 2) . " €</p>
        <p><strong>Total price:</strong> <span class='total'>" . number_format($total, 2) . " €</span></p>
    ";
    }

    ?>
</body>

</html>