<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shipping Cost Calculator</title>
</head>

<body>
    <h1>Calculate shipping costs</h1>
    <?php

    $selected_method = "";
    $deliverymethod = "";
    $price = "";

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
    
    $selected_method = "Home Delivery";

    $deliverymethod = $selected_method;
    $price = calculateDeliveryPrice($deliverymethod);

    if ($price > -1) {
        echo "Selected shipping method: " . $selected_method . "<br>";
        echo "<b>Price: " . number_format($price, 2, ".", " ") . " €<b>";
    } else {
        echo "Invalid delivery method";
    }
    // 1. Defining a function containing the switch statement     
    // 2. Calling the function and processing the results     $selected_method = "Postal Package";     
    // if statement to print the result (if the price variable is not -1)     if statement {     } else statement {     }     
    ?>
</body>

</html>
