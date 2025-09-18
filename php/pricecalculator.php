<!DOCTYPE html>
<html>

<head>
    <title>Price Calculator</title>
</head>

<body>
    <h1> Product price information </h1>
    <?php
    $product_name = "Electric Scooter";
    $price_pcs = 349.90;
    $number_of_pieces = 2;
    $discountpercentage = 15;

    $amount = $price_pcs * $number_of_pieces;
    $discount_eur = $amount * ($discountpercentage / 100);
    $finalsum = $amount - $discount_eur;

    echo "Product: " . $product_name . "<br>";
    echo "Unit price: " . number_format($price_pcs, 2, ".", " ") . " €" . "<br>";
    echo "Quantity: " . $number_of_pieces . " pcs" . "<br>";
    echo "-----------------------------------------------" . "<br>";
    echo "Subtotal: " . number_format($amount, 2, ".", " ") . " €" . "<br>";
    echo "Discount (15%): " . number_format($discount_eur, 2, ".", " ") . " €" . "<br>";
    echo "-----------------------------------------------" . "<br>";
    echo "<b>Final price: " . number_format($finalsum, 2, ".", " ") . " €</b><br>";

    ?>

</body>

</html>