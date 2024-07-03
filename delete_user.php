<?php
session_start();
require 'dbconnect.php';

if (!isset($_SESSION['log'])) {
    header('location: Login.php');
    exit;
}

$user_id = $_SESSION['iduser'];
$query = "DELETE FROM login WHERE iduser = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    session_destroy();
    echo "<script>alert('Account deleted successfully');window.location='Login.php';</script>";
} else {
    echo "<script>alert('Account deletion failed');window.location='Account.php';</script>";
}
?>
