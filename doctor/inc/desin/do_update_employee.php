<?php
include('conn.php');
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$id = $_POST['id'];

$sql = "UPDATE `employes` SET `name`='$name',`email`='$email',`phone`='$phone' WHERE id = $id";
$con->query($sql);
header('location:../../employee.php');
?>