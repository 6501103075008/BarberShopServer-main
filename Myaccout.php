<!DOCTYPE html>
<html>
<head>
    <title>User Login History</title>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid #ddd;
            }

            th, td {
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>
</head>
<body>
    <h1>User Login History</h1>

    <?php
    // คำสั่ง SQL เพื่อดึงข้อมูลผู้ใช้ที่เข้าสู่ระบบจากฐานข้อมูล
    include "connect.php";

    // ดึงข้อมูลจากฐานข้อมูล
    $sql = "SELECT name, password, phone, email FROM register";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Username</th><th>Phone</th><th>Email</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</body>
</html>
