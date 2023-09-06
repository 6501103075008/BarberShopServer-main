<?php
include "connect.php"; // อย่าลืมเพิ่มเครื่องหมาย ; ที่สิ้นสุด 

$name = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$sql = "INSERT INTO register (name, password, phone, email) VALUES ('$name', '$password', '$phone', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "บันทึกข้อมูลเรียบร้อยแล้ว";
} else {
    echo "เกิดข้อผิดพลาด: " . $conn->error;
}

$conn->close();
?>
