<?php
include "connect.php"; // อย่าลืมเพิ่มเครื่องหมาย ; ที่สิ้นสุด 

$sql = "SELECT MAX(user_id) as max_user_id FROM register";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$current_user_id = $row['max_user_id'];
$next_user_id = incrementUserId($current_user_id);

$name = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$sql = "INSERT INTO register (user_id, name, password, phone, email) VALUES ('$next_user_id', '$name', '$password', '$phone', '$email')";



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
function incrementUserId($current_user_id) {
    $prefix = 'user';
    $current_number = (int)substr($current_user_id, strlen($prefix)); // แปลงตัวเลขปัจจุบันเป็น integer
    $next_number = $current_number + 1;
    $next_user_id = $prefix . sprintf('%03d', $next_number); // รูปแบบรหัสใหม่เป็น "user001", "user002", ...

    return $next_user_id;
}
?>
