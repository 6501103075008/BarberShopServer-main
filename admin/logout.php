<?php
// เริ่ม session (ถ้ายังไม่เริ่ม)
session_start();

// ลบ session ทั้งหมด
session_destroy();

// ส่งผู้ใช้กลับไปยังหน้าหลักหรือหน้าล็อกอิน
header("Location: ../index.html"); // แทน "login.php" ด้วยหน้าที่คุณต้องการให้ผู้ใช้กลับมาที่นั่น
exit(); // ให้แน่ใจว่าไม่มีการดำเนินการเพิ่มเติมหลังจากส่งผู้ใช้กลับ
?>
