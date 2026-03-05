<?php
$status='';
if(isset($_GET['status'])){
    $status=$_GET['status'];
}
?>


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
             <?php if ($status == 'inserted'): ?>
        <p style="color: white;">User registered successfully!</p>
    
    <?php elseif ($status == 'exists'): ?>
        <p style="color: white;">Email Already Existed!</p>
    <?php elseif ($status == 'deleted'): ?>
        <p style="color: white;">User deleted successfully!</p>
    <?php endif; ?>
            <h1>Register</h1>
            <hr>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="enter your vaild email" id="email" name="email" required>
            <label for="password"><b>Password</b></label>

            <input type="password" placeholder="type your password" id="password" name="password" required>
            <input type="hidden" value="register" name="action">
            <button type="submit" class="submit"> sign up</button>
            <p>Already Have An Account? <a href="signin.php">sign in</a></p>



        






    </form>
</div>
</body>

</html>