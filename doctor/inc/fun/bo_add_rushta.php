<?php
session_start();
include('../desin/conn.php');
$doctor_id = $_SESSION['id_do'];
$patient_id = $_POST['patient_id'];
$name = $_POST['name'];
$time = $_POST['time'];
$num = $_POST['num'];
$desc = $_POST['desc'];

$date = date('Y-m-d');

$name_emplo = implode("$", $name);
$time_emplo = implode("$", $time);
$num_emplo = implode("$", $num);

$sql2 = "SELECT * FROM `doctor` WHERE  id = $doctor_id";
$result = $con->query($sql2);
$row = $result->fetch_assoc();
$rows = $row['special'];

$sql3 = "SELECT * FROM `special` WHERE  id = $rows";
$result0 = $con->query($sql3);
$row0 = $result0->fetch_assoc();
$rows0 = $row0['name'];

$sql0 = "INSERT INTO rushta(id_patient, id_doctor, prescription_name, medicl_name, num_doses, time_doses, date_add , `des`) VALUES
 ('$patient_id','$doctor_id','$rows0','$name_emplo','$num_emplo','$time_emplo','$date' ,'$desc')";
 $con->query($sql0);

 header('location:../../viwe_patient.php?patient_id='.$patient_id);