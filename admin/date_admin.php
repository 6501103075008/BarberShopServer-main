<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... -->
    <!-- เรียกใช้ไลบรารี FullCalendar -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
</head>
<body>
    <!-- ตำแหน่งที่ปฏิทินจะแสดง -->
    <div id="calendar"></div>

    <!-- เรียกใช้ไลบรารี FullCalendar -->
    <!-- เรียกใช้ไลบรารี FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales/th.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // สร้างปฏิทิน
            var calendarEl = document.getElementById("calendar");
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: "dayGridMonth", // รายการเริ่มต้นที่แสดงในปฏิทิน
                locale: "th", // ตั้งค่าภาษา
                events: [
                            <?php
                            include "../connect.php"; // เชื่อมต่อกับฐานข้อมูล

                            $sql = "SELECT * FROM reserve"; // คำสั่ง SQL สำหรับดึงข้อมูลการจอง
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $title = "ชื่อลูกค้า: " . $row["name"];
                                    $start = $row["date"] . " " . $row["time"]; // เช่น "2023-09-30 09:00:00"
                                    $start_iso8601 = date("c", strtotime($start)); // แปลงเป็น ISO 8601 format

                                    // สร้างรูปแบบเหตุการณ์และเพิ่มลงในปฏิทิน
                                    echo "{";
                                    echo "title: '" . $title . "',";
                                    echo "start: '" . $start_iso8601 . "',";

                                    echo "},";

                                    echo "{";
                                    echo "title: 'เวลา: " . date("H:i", strtotime($start)) . "',"; // แสดงเฉพาะเวลา
                                    echo "start: '" . $start_iso8601 . "',";
                                    echo "},";     

                                }
                            }

                            $conn->close(); // ปิดการเชื่อมต่อกับฐานข้อมูล
                            ?>
                                ],
            });

            // แสดงปฏิทิน
            calendar.render();
        });
    </script>
</body>
</html>
