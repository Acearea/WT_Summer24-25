<?php
include("../includes/db_connect.php");
session_start();
if(isset($_POST['register'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $address = trim($_POST['address']);
    if($name == '' || $email == '' || $password == ''){ $_SESSION['reg_error']='All fields required'; header("Location: ../views/register.php"); exit; }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ $_SESSION['reg_error']='Invalid email'; header("Location: ../views/register.php"); exit; }
    $chk = $conn->prepare("SELECT id FROM customerinfo WHERE email=?");
    $chk->bind_param("s",$email);
    $chk->execute();
    $r = $chk->get_result();
    if($r && $r->num_rows>0){ $_SESSION['reg_error']='Email already registered'; header("Location: ../views/register.php"); exit; }
    $stmt = $conn->prepare("INSERT INTO customerinfo (id,name,password,email,phonenum,address) VALUES (NULL,?,?,?,NULL,?)");
    $stmt->bind_param("ssss",$name,$password,$email,$address);
    if($stmt->execute()){
        header("Location: ../views/login.php");
        exit;
    } else {
        $_SESSION['reg_error']='Registration failed';
        header("Location: ../views/register.php");
        exit;
    }
}
?>