<?php
// การเชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "babershop";

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// คำสั่ง SQL ในการดึงข้อมูลรูปภาพ
$sql = "SELECT * FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // แสดงรูปภาพ
    while ($row = $result->fetch_assoc()) {
        $imageData = $row['file_name']; // เปลี่ยนชื่อคอลัมน์เป็นชื่อคอลัมน์ที่เก็บรูปภาพของคุณ
        header("Content-type: image/jpeg"); // กำหนด header เป็นประเภทของรูปภาพ (JPEG)
        echo $imageData; // แสดงรูปภาพ
    }
} else {
    echo "ไม่พบรูปภาพ";
}

$conn->close();
?>
