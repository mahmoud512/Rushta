<?php
session_start();
include('inc/desin/conn.php');
$id_doctor = $_SESSION['id_do'];
$name = $_POST['name'];  
$email = $_POST['email'];  
$pass = $_POST['pass'];
$pass_md5 = md5($pass) ; 
$phone = $_POST['phone'];  
$sql = "INSERT INTO `employes`(id_doctor, `name`, `email`, `pass`, `phone`)
 VALUES
 ('$id_doctor','$name','$email','$pass_md5','$phone')";
 $con->query($sql);
 header('location:employee.php');