<!DOCTYPE html>
<html lang="fi">
<head>
  <meta charset="UTF-8">
  <title>Buy cute cat!</title>
  <link rel="stylesheet" href="catStyle.css">
</head>
<body>

  <?php include 'catNavigation.php'; ?>

  <main>
    <h1>Order cute plushy cat!</h1>
    <p>Choose your favorite and order!</p>
       <section class="cat-order">
      <img src="images/cat.png" alt="Cute plush cats" class="cat-image">

      <form action="catCart.php" method="POST" class="cat-form">
        <label for="color">Choose color:</label>
        <select id="color" name="color" required>
          <option value="">-- Select color --</option>
          <option value="white">White</option>
          <option value="gray">Gray</option>
          <option value="black">Black</option>
          <option value="orange">Orange</option>
        </select>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" value="1" required>

        <button type="submit">Add to Cart</button>
      </form>
    </section>
  </main>

</body>
</html>
