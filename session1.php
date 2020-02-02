<?php
include('db_connection.php');
session_start();

$user_check = $_SESSION['login_admin'];

$ses_sql = mysqli_query($conn, "SELECT EMAIL FROM USER_ADMIN WHERE EMAIL = '$user_check';");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['EMAIL'];

if (!isset($_SESSION['login_admin'])) {
   header("location:login.php");
   die();
}
?>