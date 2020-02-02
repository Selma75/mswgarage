<?php
include('db_connection.php');
session_start();

$user_check = $_SESSION['login_mswgarage'];

$ses_sql = mysqli_query($conn, "SELECT EMAIL FROM CUSTOMER WHERE EMAIL = '$user_check';");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['EMAIL'];

if (!isset($_SESSION['login_mswgarage'])) {
   header("location:login.php");
   die();
}
?>