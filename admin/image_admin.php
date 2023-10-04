<!DOCTYPE html>
<html>
<head>
    <title>รูปภาพ</title>
</head>
<body>
    <h1>รูปภาพ</h1>
    <?php
    // เชื่อมต่อฐานข้อมูล MySQL
    include "../connect.php";
    // ส่งคำสั่ง SQL เพื่อดึงข้อมูลรูปภาพ
    $sql = "SELECT * FROM images";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $image_path = "../uploads/" . $row["file_name"];
            $description = $row["description"];
            $image_id = $row["id"]; // เก็บรหัสรูปภาพ
            
            echo "<div>";
            echo "<img src='$image_path' alt='$description' width='300'>";
            echo "<p>$description</p>";
            echo "<a href='delete_image_admin.php?id=$image_id'>ลบ</a>"; // สร้างลิงค์ลบ
            echo "</div>";
        }
    } else {
        echo "ไม่พบรูปภาพในฐานข้อมูล";
    }

    $conn->close();
    ?>
</body>
</html>
