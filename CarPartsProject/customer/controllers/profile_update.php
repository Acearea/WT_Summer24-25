<?php
session_start();
include("../includes/db_connect.php");
if(!isset($_SESSION['user_id'])){ header("Location: ../views/login.php"); exit; }
if(isset($_POST['update'])){
    $id = intval($_SESSION['user_id']);
    $name = $conn->real_escape_string(trim($_POST['name']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $phonenum = $conn->real_escape_string(trim($_POST['phonenum']));
    $address = $conn->real_escape_string(trim($_POST['address']));
    $stmt = $conn->prepare("UPDATE customerinfo SET name=?, email=?, phonenum=?, address=? WHERE id=?");
    $stmt->bind_param("ssssi",$name,$email,$phonenum,$address,$id);
    $stmt->execute();
    $_SESSION['user_name'] = $name;
    header("Location: ../views/profile.php");
    exit;
}
?>