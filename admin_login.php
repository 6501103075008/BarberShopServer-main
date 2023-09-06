<?php
include "connect.php";

// รับข้อมูลจากฟอร์มเข้าสู่ระบบ
$username = $_POST['username'];
$password = $_POST['password'];

// ตรวจสอบข้อมูลการเข้าสู่ระบบ
$sql = "SELECT * FROM admin WHERE admin_id='$username' AND admin_pass='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // เข้าสู่ระบบสำเร็จ
    echo "เข้าสู่ระบบสำเร็จ";
} else {
    // เข้าสู่ระบบไม่สำเร็จ
    echo "เข้าสู่ระบบไม่สำเร็จ";
}

$conn->close();
?>
