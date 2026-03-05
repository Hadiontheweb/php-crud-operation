<?php

session_start();
include 'config.php';
$id=$_SESSION['id'];
if(!$id){
    $status='please login first!';
header("location:signin.php?status={$status}"); exit;

}

$queryone= "select * from users where id=$id";
$result=mysqli_query($connection,$queryone);
$loggedUser=mysqli_fetch_assoc($result);
$email=$loggedUser['email'];
$lggedUserId=$loggedUser['id'];
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="asstes/style.css">
</head>

<body style="background-color: white;">
    <div style="display: flex; align-items: center;gap: 20px;">
    <h3>My Account:</h3>
    <h3>id:<?php echo $lggedUserId ?></h3>
    <h3><?php echo $email ?></h3>
    <a href="edit.php?editId=<?php echo $loggedUser['id'] ?>">Edit</a>
    <a href="logout.php">Logout</a>
  </div>
 
  <div class="container">
             
    <?php
$status='';
if(isset($_GET['status'])){
    $status=$_GET['status'];
}
?>

    <?php if ($status == 'deleted'): ?>
        <p>User deleted successfully!</p>

        <?php elseif ($status == 'updated'): ?>
        <p>User updated successfully!</p>
    <?php endif; ?>
      
  <table>
    <tr>
      <th>ID</th>
      <th>email</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    <?php
      $query  = $query = "SELECT * FROM users WHERE id != $id";
    $result = mysqli_query($connection, $query);?>

    <?php while ($data = mysqli_fetch_assoc($result)) {?>
      <tr>
        <td><?php echo $data['id'] ?></td>
        <td><?php echo $data['email'] ?></td>

        <td><a href="edit.php?editId=<?php echo $data['id'] ?>" class="btn-edit">Edit</a></td>

        <td><a href="delete.php?deleteId=<?php echo $data['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a></td>

      </tr>
    <?php }?>


  </table>

</body>

</html>