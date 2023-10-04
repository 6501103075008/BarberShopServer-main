<?php
include "connect.php";


$sql = "SELECT MAX(id_reserve) as max_id_reserve FROM reserve";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$current_id_reserve = $row['max_id_reserve'];
$next_id_reserve = incrementBookingId($current_id_reserve);

$name = $_POST['name'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$adult = $_POST['adult'];
$young = $_POST['young'];
$employees_id = $_POST['employees_id'];
$service_ids = $_POST['service_id']; // รับข้อมูลบริการที่ถูกเลือกเป็นอาร์เรย์

// แปลงอาร์เรย์ของบริการเป็นสตริงที่ใช้ในคำสั่ง SQL
$service_ids_str = implode(', ', $service_ids);

// สร้างคำสั่ง SQL สำหรับเพิ่มข้อมูลการจอง
$sql = "INSERT INTO reserve (id_reserve, name, phone, date, time, adult, young, employees_id, service_id) 
VALUES ('$next_id_reserve', '$name', '$phone', '$date', '$time', '$adult', '$young', '$employees_id', '$service_ids_str')";

// ทำการส่งคำสั่ง SQL ไปยังฐานข้อมูล
if ($conn->query($sql) === TRUE) {
    echo "บันทึกการจองสำเร็จ";
    header("Refresh: 3; URL=table.php"); // เปลี่ยนไปหน้าอื่นหลังจาก 3 วินาที
    exit(); // อย่าลืมใส่ exit() เพื่อหยุดการทำงานของสคริปต์
} else {
    echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error;
    echo "<script>setTimeout(function() { window.location.href = 'team1.php'; }, 3000);</script>"; // กลับไปยังหน้าเดิมหลังจาก 3 วินาที
}


// ปิดการเชื่อมต่อกับฐานข้อมูล
$conn->close();

function incrementBookingId($current_id_reserve) {
    $prefix = 'REV';
    $current_number = (int)substr($current_id_reserve, strlen($prefix));
    $next_number = $current_number + 1;
    $next_id_reserve = $prefix . sprintf('%03d', $next_number);

    return $next_id_reserve;
}

?>
