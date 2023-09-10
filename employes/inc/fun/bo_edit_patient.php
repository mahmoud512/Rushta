<?php
include('../desin/conn.php');
$statu = $_POST['status'];
$id = $_POST['id'];

$sql = "UPDATE `revealed` SET `statu`='$statu' WHERE id = $id";
$con->query($sql);
header('location:../../patient.php');
?>