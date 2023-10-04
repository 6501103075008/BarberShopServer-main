<?php
include "connect.php";



$sql = "SELECT MAX(id) as max_id FROM images";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$current_id = $row['max_id'];
$next_id = incrementBookingId($current_id); 


// ตรวจสอบว่าไฟล์ถูกอัปโหลดหรือไม่
if (isset($_FILES["image"])) {
    $file_name = $_FILES["image"]["name"];
    $file_tmp = $_FILES["image"]["tmp_name"];
    
    // อัปโหลดไฟล์รูปภาพไปยังโฟลเดอร์ที่ต้องการเก็บ
    $target_dir = "uploads/";
    $target_file = $target_dir . $file_name;
    
    move_uploaded_file($file_tmp, $target_file);
    
    // รับค่าคำอธิบายจากฟอร์ม
    $description = $_POST["description"];
    
    // เพิ่มข้อมูลลงในฐานข้อมูล
    $sql = "INSERT INTO images (id, file_name, description) VALUES ('$next_id', '$file_name', '$description')";

    
    if ($conn->query($sql) === TRUE) {
        echo "อัปโหลดรูปภาพและบันทึกข้อมูลลงในฐานข้อมูลเรียบร้อยแล้ว";
    } else {
        echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error;
    }
    
    $conn->close();
}
function incrementBookingId($current_id_reserve) {
    $prefix = 'BILL';
    $current_number = (int)substr($current_id_reserve, strlen($prefix));
    $next_number = $current_number + 1;
    $next_id_reserve = $prefix . sprintf('%03d', $next_number);

    return $next_id_reserve;
}

?>
