<?php
include_once "config.php";

$id = $_GET['editId'];
$sql = "SELECT * FROM users WHERE id='$id' ";
$res = mysqli_query($connection,$sql);
$user = mysqli_fetch_assoc($res);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- <link rel="stylesheet" href="asstes/style.css"> -->

</head>
<body>
     <form action="load.php?editid=<?php echo $id ?>;" method="post" >

     <input type="text" value ="<?php echo $user ['email'] ?>" name='email' >
     <input type="hidden" value = 'edit' name='action'>
     <!-- <button type="submit">update</button> -->
            <button type="submit" class="submit">Update</button>
             </form>
                
</body>
</html>

