<?php
include "connect.php"; // อย่าลืมเพิ่มเครื่องหมาย ; ที่สิ้นสุด 

$name = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$sql = "INSERT INTO register (name, password, phone, email) VALUES ('$name', '$password', '$phone', '$email')";

if ($conn->query($sql) === TRUE) {
    echo '<script>
            setTimeout(function() {
                window.location.href = "login.html"; // แทน new_page.php ด้วย URL ของหน้าที่คุณต้องการไป
            }, 5000);
        </script>';
} else {
    echo '<script>
            setTimeout(function() {
                window.location.href = "index.html"; // แทน new_page.php ด้วย URL ของหน้าที่คุณต้องการไป
            }, 5000);
        </script>';
}

$conn->close();
?>
