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
$_SESSION['cart'] = [];
include 'catNavigation.php';


$cat_price = 15.00;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $color = $_POST['color'] ?? '';
    $quantity = (int)($_POST['quantity'] ?? 1);

    if ($color && $quantity > 0) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $_SESSION['cart'][] = [
            'color' => $color,
            'quantity' => $quantity,
            'price' => $cat_price
        ];
    }
}
?>

<main>
  <h1>Your Cart 🛒</h1>

  <?php if (!empty($_SESSION['cart'])): ?>
    <table border="0" cellpadding="10" cellspacing="0" style="margin: 0 auto; text-align: left;">
      <tr>
        <th>Color</th>
        <th>Quantity</th>
        <th>Price (each)</th>
        <th>Total</th>
      </tr>

      <?php
      $total = 0;
      foreach ($_SESSION['cart'] as $item):
          $subtotal = $item['quantity'] * $item['price'];
          $total += $subtotal;
      ?>
      <tr>
        <td><?php echo htmlspecialchars($item['color']); ?></td>
        <td><?php echo (int)$item['quantity']; ?></td>
        <td><?php echo number_format($item['price'], 2); ?> €</td>
        <td><?php echo number_format($subtotal, 2); ?> €</td>
      </tr>
      <?php endforeach; ?>
    </table>

    <hr style="width: 60%; margin: 20px auto;">

    <form action="catOrder.php" method="POST" class="cat-form">
      <p><strong>Total to pay:</strong> <?php echo number_format($total, 2); ?> €</p>

      <label>
        <input type="checkbox" name="delivery" value="home">
        Delivery to home by mail (+5 €)
      </label>

      <button type="submit">Proceed to Order →</button>
    </form>

  <?php else: ?>
    <p>Your cart is empty 😿</p>
    <a href="catHomepage.php">← Go back to shop</a>
  <?php endif; ?>
</main>


</body>
</html>
