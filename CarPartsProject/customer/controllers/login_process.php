<?php
session_start();
include("../includes/db_connect.php");
if(isset($_POST['login'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    if($email == '' || $password == ''){ $_SESSION['error'] = 'All fields required'; header("Location: ../views/login.php"); exit; }
    $stmt = $conn->prepare("SELECT * FROM customerinfo WHERE email=? LIMIT 1");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $res = $stmt->get_result();
    if($res && $res->num_rows == 1){
        $u = $res->fetch_assoc();
        if($password === $u['password']){
            $_SESSION['user_id'] = $u['id'];
            $_SESSION['user_name'] = $u['name'];
            header("Location: ../views/customer_dashboard.php");
            exit;
        } else {
            $_SESSION['error'] = 'Invalid password';
            header("Location: ../views/login.php");
            exit;
        }
    } else {
        $_SESSION['error'] = 'Invalid email';
        header("Location: ../views/login.php");
        exit;
    }
}
?>