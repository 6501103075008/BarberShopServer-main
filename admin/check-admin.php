<?php
// เชื่อมต่อกับฐานข้อมูลและซอร์สข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "babershop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์มเข้าสู่ระบบ
$username = $_POST['username'];
$password = $_POST['password'];

// ตรวจสอบข้อมูลการเข้าสู่ระบบ
$sql = "SELECT * FROM register WHERE name='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // เข้าสู่ระบบสำเร็จ
    echo '<script>
            setTimeout(function() {
                window.location.href = "index1.html"; // แทน new_page.php ด้วย URL ของหน้าที่คุณต้องการไป
            }, 5000);
        </script>';
} else {
    // เข้าสู่ระบบไม่สำเร็จ
    echo '<script>
            setTimeout(function() {
                window.location.href = "index.html"; // แทน new_page.php ด้วย URL ของหน้าที่คุณต้องการไป
            }, 50);
        </script>';
}

$conn->close();
?>
