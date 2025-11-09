<?php
$pages = [
    'Buy cute cat!' => 'catHomepage.php',
    'Your Cart' => 'catCart.php',
    'Your Order' => 'catOrder.php'
];

$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav>
  <ul>
    <?php foreach ($pages as $name => $url): ?>
      <li class="<?php if ($current_page == $url) echo 'active'; ?>">
        <a href="<?php echo $url; ?>"><?php echo $name; ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>
