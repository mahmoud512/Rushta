<?php
include('conn.php');
$id = $_GET['id'];
$sql = "DELETE FROM `employes` WHERE id = $id";
$con->query($sql);
header('location:../../employee.php');

?>