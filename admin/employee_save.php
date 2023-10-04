<?php
// เชื่อมต่อฐานข้อมูล SQL
include "../connect.php";

// ตรวจสอบว่ามีการส่งข้อมูลผ่านฟอร์มหรือไม่
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sql = "SELECT MAX(employees_id) as max_employee_id FROM employees";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // สร้างรหัสพนักงานใหม่
    $current_employee_id = $row['max_employee_id'];
    $next_employee_id = incrementEmployeeId($current_employee_id);

    // ค่าที่ส่งมาจากฟอร์ม
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    // คำสั่งเพิ่มข้อมูลลงในฐานข้อมูล
    $sql = "INSERT INTO employees (employees_id, name, position, salary) VALUES ('$next_employee_id', '$name', '$position', '$salary')";

    if ($conn->query($sql) === TRUE) {
        echo "บันทึกข้อมูลพนักงานเรียบร้อยแล้ว";
    } else {
        echo "เกิดข้อผิดพลาด: " . $conn->error;
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
}

// ฟังก์ชันเพื่อเพิ่มค่า employee_id อัตโนมัติ
function incrementEmployeeId($current_employee_id) {
    $prefix = 'EM';
    $current_number = (int)substr($current_employee_id, strlen($prefix)); // แปลงตัวเลขปัจจุบันเป็น integer
    $next_number = $current_number + 1;
    $next_employee_id = $prefix . sprintf('%03d', $next_number); // รูปแบบรหัสใหม่เป็น "EM001", "EM002", ...

    return $next_employee_id;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>เพิ่มข้อมูลพนักงาน</title>
    <style>
        body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #00aaff;
    font-family: Arial, sans-serif;
  }
  .signup-form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    width: 300px;
  }
  .form-group {
    margin-bottom: 15px;
  }
  label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }
  input[type="text"],
  input[type="password"],
  input[type="tel"],
  input[type="email"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  button {
    background-color: #00aaff;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
    </style>

    
</head>
<body>
<div class="signup-form">
    <center><h1>เพิ่มข้อมูลพนักงาน</h1></center>
        <form action="" method="post">
            <div class="form-group">
            <label for="name">ชื่อ:</label>
            <input type="text" name="name" required><br>
            </div>
            <div class="form-group">
            <label for="position">ตำแหน่ง:</label>
            <input type="text" name="position" required><br>
            </div>

            <div class="form-group">
            <label for="salary">เงินเดือน:</label>
            <input type="number" name="salary" required><br>
            </div>

        <input type="submit" value="บันทึก">
        </form>
 </div>
</body>
</html>
