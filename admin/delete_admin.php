<?php
// ตรวจสอบว่ามีพารามิเตอร์ 'id' ที่ส่งมาผ่าน URL
if (isset($_GET['id'])) {

    // ติดต่อกับฐานข้อมูล SQL
    $conn = new mysqli("localhost", "root", "", "babershop");

    // ตรวจสอบการเชื่อมต่อ
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // รับค่า 'id' จาก URL
    $id = $_GET['id'];


    // สร้างคำสั่ง SQL เพื่อลบรายการที่มี 'id' ที่ระบุ
    $sql = "DELETE FROM reserve WHERE id_reserve = '$id'";


    if ($conn->query($sql) === TRUE) {
        // ถ้าการลบเสร็จสมบูรณ์ ให้กลับไปยังหน้าที่แสดงตารางหรือทำการ Redirect
        header("Location: table_admin.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    // ปิดการเชื่อมต่อกับฐานข้อมูล
    $conn->close();
} else {
    echo "Invalid parameter.";
}
?>
