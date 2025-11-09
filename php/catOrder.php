<!DOCTYPE html>
<html lang="fi">
<head>
  <meta charset="UTF-8">
  <title>Buy cute cat!</title>
  <link rel="stylesheet" href="catStyle.css">
</head>
<body>

  <?php 
  session_start();
  include 'catNavigation.php';
  ?>

  <main>
    <?php
    if (empty($_SESSION['cart'])) {
        header("Location: catHomepage.php");
        exit;
    }

    $delivery_selected = isset($_POST['delivery']);
    $delivery_cost = $delivery_selected ? 5.00 : 0.00;

    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['quantity'] * $item['price'];
    }
    $grand_total = $total + $delivery_cost;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['customer_name'])) {
        $name = htmlspecialchars($_POST['customer_name']);
        $address = htmlspecialchars($_POST['address']);
        $email = htmlspecialchars($_POST['email']);

        $subject = "New Cat Order";
        $message = "Hello!\n\nYou have a new cat order:\n\n";

        foreach ($_SESSION['cart'] as $item) {
            $message .= "- Color: {$item['color']}, Quantity: {$item['quantity']}, Subtotal: " . number_format($item['quantity'] * $item['price'], 2) . " €\n";
        }

        $message .= "\nDelivery: " . ($delivery_selected ? "Yes (+5 €)" : "No") . "\n";
        $message .= "Total to pay: " . number_format($grand_total, 2) . " €\n\n";
        $message .= "Customer details:\n";
        $message .= "Name: $name\n";
        $message .= "Address: $address\n";
        $message .= "Email: $email\n";

        $to = "anja.zibrova@gmail.com";
        $headers = "From: no-reply@cute-cat-shop.com\r\n";
        $headers .= "Reply-To: $email\r\n";

        if (mail($to, $subject, $message, $headers)) {
            echo "<main><h1>Thank you for your order! 😻</h1><p>Your order details were sent successfully.</p></main>";
            $_SESSION['cart'] = [];
            exit;
        } else {
            echo "<main><h1>Oops!</h1><p>Something went wrong, please try again later.</p></main>";
            exit;
        }
    }
    ?>

    <h1>Order Confirmation 🐱</h1>

    <h2>Your items:</h2>
    <table border="0" cellpadding="10" cellspacing="0" style="margin: 0 auto; text-align: left;">
      <tr>
        <th>Color</th>
        <th>Quantity</th>
        <th>Price (each)</th>
        <th>Total</th>
      </tr>
      <?php foreach ($_SESSION['cart'] as $item): ?>
        <tr>
          <td><?php echo htmlspecialchars($item['color']); ?></td>
          <td><?php echo (int)$item['quantity']; ?></td>
          <td><?php echo number_format($item['price'], 2); ?> €</td>
          <td><?php echo number_format($item['quantity'] * $item['price'], 2); ?> €</td>
        </tr>
      <?php endforeach; ?>
    </table>

    <p><strong>Delivery:</strong> <?php echo $delivery_selected ? "Yes (+5 €)" : "No"; ?></p>
    <p><strong>Total to pay:</strong> <?php echo number_format($grand_total, 2); ?> €</p>

    <hr style="width: 60%; margin: 20px auto;">

    <h2>Delivery Information:</h2>
    <form action="catOrder.php" method="POST" class="cat-form">
      <input type="hidden" name="delivery" value="<?php echo $delivery_selected ? 'home' : ''; ?>">

      <label for="customer_name">Your name:</label>
      <input type="text" id="customer_name" name="customer_name" required>

      <label for="address">Delivery address:</label>
      <textarea id="address" name="address" rows="3" required></textarea>

      <label for="email">Contact email:</label>
      <input type="email" id="email" name="email" required>

      <button type="submit">Place Order</button>
    </form>
  </main>

</body>
</html>
