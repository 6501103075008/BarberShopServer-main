<?php
// เชื่อมต่อฐานข้อมูล SQL
include "../connect.php";
// รับข้อมูลจากแบบฟอร์ม

$sql = "SELECT MAX(service_id) as max_service_id FROM services";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// สร้างรหัสบริการใหม่
$current_service_id = $row['max_service_id'];
$next_service_id = incrementServiceId($current_service_id);

$service_name = $_POST['service_name'];
$description = $_POST['description'];
$price = $_POST['price'];

// สร้างคำสั่ง SQL INSERT
$sql = "INSERT INTO services (service_id, service_name, description, price) VALUES ('$next_service_id', '$service_name', '$description', '$price')";


if ($conn->query($sql) === TRUE) {
    echo "บริการถูกเพิ่มเรียบร้อยแล้ว";
} else {
    echo "เกิดข้อผิดพลาด: " . $conn->error;
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
function incrementServiceId($current_service_id) {
    $prefix = 'SV';
    $current_number = (int)substr($current_service_id, strlen($prefix)); // แปลงตัวเลขปัจจุบันเป็น integer
    $next_number = $current_number + 1;
    $next_service_id = $prefix . sprintf('%03d', $next_number); // รูปแบบรหัสใหม่เป็น "SV001", "SV002", ...

    return $next_service_id;
}

?>
