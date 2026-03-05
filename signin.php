<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asstes/style.css">
    <?php
    include_once "config.php";
    $query = "select * from users";
    $result = mysqli_query($connection, $query); ?>
</head>
<body>
  <form action="load.php" method="post">

        <div class="container">
            <h1>Log In</h1>
               <?php

         $status = $_GET['status'] ?? '';

         if ($status) {
             echo $status;
         }

     ?>
            <hr>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="enter your vaild email" id="email" name="email" required>
            <label for="password"><b>Password</b></label>

            <input type="password" placeholder="type your password" id="password" name="password" required>
            <input type="hidden" value="signin" name="action">
            <button type="submit" class="submit" style="background-color: black"> sign in</button>
            <p> Dont Have An Account Yet? <a href="register.php">register an acoount</a></p>
             </form>
</div>
</body>

</html>