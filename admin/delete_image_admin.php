<?php
if (isset($_GET["id"])) {
    // เชื่อมต่อฐานข้อมูล MySQL
    include "../connect.php"; 

    // รับรหัสรูปภาพจาก URL
    $image_id = $_GET["id"];

    // ส่งคำสั่ง SQL เพื่อลบรูปภาพจากฐานข้อมูล
    $sql = "DELETE FROM images WHERE id = $image_id";

    
    if ($conn->query($sql) === TRUE) {
        // ลบรูปภาพจากโฟลเดอร์
        $image_info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM images WHERE id = $image_id"));
        $image_path = "../uploads/" . $image_info["file_name"];
        unlink($image_path);
        
        echo "ลบรูปภาพเรียบร้อยแล้ว";
    } else {
        echo "เกิดข้อผิดพลาดในการลบรูปภาพ: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ไม่ระบุรหัสรูปภาพที่ต้องการลบ";
}
?>
