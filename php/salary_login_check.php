<!DOCTYPE html>
<html>

<head>
  <title>Salary Login Check</title>
</head>

<body>
  <?php
  //Checking whether the form has been submitted
  $login = $_POST["login"] ?? "";
  $password = $_POST["password"] ?? "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Add the code below that receives the form data
  

    //Correct and complete the if statement below that checks the username and password
    if ($login == "admin" && $password == "cat123") {
      //Login successful
      echo "Welcome admin!";
      echo "You will be redirected to the salary calculator in a few seconds...";
      //The code below redirects the user to the salary calculator after 2 seconds
      echo '<meta http-equiv="refresh" content="2;url=salary_calculator.php">';
      exit();

    } else {
      //Login failed
      echo "Incorrect username or password.";
    }
  }
  ?>

</body>

</html>