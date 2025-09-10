<!DOCTYPE html>
<html>
  <head>
    <title>First PHP page</title>
  </head>
  <body>
    <p>There are <?php echo 24 * 60 * 60; ?> seconds in a day.</p>
    <p>Today is <?php echo date("jnY"); ?>.</p>
    <p>The server is running PHP version <?php echo PHP_VERSION; ?>.</p>
    <?php
    echo "<ul>";
    for ($i = 1; $i <= 10; $i++) {
        echo "<li>" . $i;
    }
    echo "</ul>";

    $greeting = "Welcome to the world of PHP!<br>";
    $times = 5;

    for ($i = 1; $i <= $times; $i++) {
        echo $greeting;
    }
   

    ?>
  </body>
</html>