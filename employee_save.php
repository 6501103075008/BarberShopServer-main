<?php
// ตรวจสอบว่ามีการส่งข้อมูลผ่านฟอร์มหรือไม่
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // ค่าที่ส่งมาจากฟอร์ม
        $name = $_POST['name'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];

        // คำสั่งเพิ่มข้อมูลลงในฐานข้อมูล (ตั้งค่าการเชื่อมต่อกับฐานข้อมูลก่อน)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "babershop";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO employees (name, position, salary) VALUES ('$name', '$position', '$salary')";

        if ($conn->query($sql) === TRUE) {
            echo "บันทึกข้อมูลพนักงานเรียบร้อยแล้ว";
        } else {
            echo "เกิดข้อผิดพลาด: " . $conn->error;
        }

        $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>เพิ่มข้อมูลพนักงาน</title>

    <style>
        body {
            background-color: #00aaff;
            color: #000;
            font-family: Arial, sans-serif;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            width: 300px;
            margin: 0 auto;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #00aaff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0077dd;
        }
    </style>
</head>
<body>
<center><h1>เพิ่มข้อมูลพนักงาน</h1></center>
    <form method="POST" action="">
        <label for="name">ชื่อ:</label>
        <input type="text" name="name" required><br>

        <label for="position">ตำแหน่ง:</label>
        <input type="text" name="position" required><br>

        <label for="salary">เงินเดือน:</label>
        <input type="number" name="salary" required><br>

        <input type="submit" value="บันทึก">
    </form>
</body>
</html>
