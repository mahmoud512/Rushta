<?php
include('../desin/conn.php');
$name = $_POST['name'];
$phone = $_POST['phone'];
$pass_md5 =md5($_POST['phone']);
$age = $_POST['age'];
$address = $_POST['address'];
$descri = $_POST['descri'];
$sql = "INSERT INTO patient( name, phone, pass, age, address, descr) VALUES
 ('$name','$phone','$pass_md5','$age','$address','$descri')";
 $con->query($sql);
 header('location:../../patient.php');
 ?>