<?php
include_once 'config.php';

$deleteid=$_GET['deleteId'];

if($deleteid) {
         $sql = "DELETE FROM users WHERE id = $deleteid";
           mysqli_query($connection, $sql);
          
           header("location:user-list.php?status=deleted");
} 
else {
    echo "Error: " . mysqli_error($connection);
}
?>