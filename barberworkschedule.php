<!DOCTYPE html>
<html>
<head>
<style>
  body {
    background-color: #87CEEB; /* สีฟ้า */
  }
  table {
    border-collapse: collapse;
    width: 80%;
    margin: 0 auto;
    margin-top: 20px;
    background-color: white;
  }
  th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: center;
  }
  th {
    background-color: #f2f2f2; /* สีเทาอ่อน */
  }
</style>
</head>
<body>
    <center>
        <h1>ตารางการทำงานช่างตัดผม</h1></center>


<table>
  <tr>
    <th>เวลา</th>
    <?php
    $barbers = array("ช่าง A", "ช่าง B", "ช่าง C", "ช่าง D", "ช่าง E");
    foreach ($barbers as $barber) {
      echo "<th>$barber</th>";
    }
    ?>
  </tr>
  
  <?php
  // สร้างตารางการทำงานของช่างตัดผม
  $days = 5; // จำนวนวัน
  $start_hour = 9; // เวลาเริ่มต้น
  $end_hour = 20; // เวลาสิ้นสุด
  $break_start_hour = 12; // เวลาพักเริ่มต้น
  $break_end_hour = 13; // เวลาพักสิ้นสุด
  
  for ($hour = $start_hour; $hour <= $end_hour; $hour++) {
    if ($hour == $break_start_hour) {
      continue; // ข้ามเวลาพัก
    }
    
    echo "<tr>";
    echo "<td>$hour:00-$hour:59</td>";
    
    for ($day = 1; $day <= $days; $day++) {
      if ($hour >= $break_start_hour && $hour <= $break_end_hour) {
        echo "<td>พัก</td>";
      } elseif ($day >= 4 && $day <= 5) {
        echo "<td>ว่าง</td>";
      } else {
        echo "<td>ทำงาน</td>";
      }
    }
    
    echo "</tr>";
  }
  ?>
  
</table>

</body>
</html>
