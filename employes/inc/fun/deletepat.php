<?php
include('../desin/conn.php');
$id = $_GET['id'];
$sql = "DELETE FROM revealed WHERE id = $id";
$con->query($sql);
header('location:../../patient.php');

?>