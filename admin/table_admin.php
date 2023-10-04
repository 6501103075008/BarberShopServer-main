<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <title>Bootstrap Table with SQL Data</title>
  
    <style>
        /* เพิ่มสไตล์พื้นหลังสีฟ้า */
        body {
            background-color: #3498db;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        /* เพิ่มสไตล์ขยายปุ่มและตัวหนังสือให้ใหญ่ขึ้น */
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 18px;
        }

        /* เพิ่มสไตล์สำหรับข้อความคำอธิบาย */
        input[type="text"] {
            padding: 10px 20px;
            font-size: 18px;
        }
        input[type="file"] {
            padding: 10px 20px;
            font-size: 18px;
        }
    </style>
      <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Team - Moderna Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <!-- Stylesheets-->
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:400,700,400italic%7CPoppins:300,400,500,700">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="index1.html"><span>Book a hair appointment</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      
      <nav id="navbar" class="navbar">
        <ul>
        <li><a class="active " href="index_admin.html">Home</a></li>
          <li><a href="add_service.php">ADDSERVICE</a></li>
          <li><a href="employee_save.php">AMPLOYEE</a></li>
          <li><a href="table_admin.php">Booking status</a></li>
          <li><a href="Manage employee information.php">Manage employee information</a></li>

        
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <div class="container mt-5">
  <h2>ตรวจสอบข้อมูลการจอง</h2>
  <td><a href='print_to_all_pdf.php' class='btn btn-success'>Print</a></td>
    <table class="table table-bordered"  >
      <thead>
        <tr>
          <th>รหัสจอง</th>
          <th>ชื่อ</th>
          <th>เบอร์โทร</th>
          <th>วันที่จอง</th>
          <th>เวลาที่จอง</th>
          <th>รหัสพนักงาน</th>
          <th>รหัสบริการ</th>
          <th>ออกรายงาน</th> 
          <th>ลบข้อมูลการจอง</th>

          
        </tr>
      </thead>
      <tbody>
        <?php
          // ติดต่อกับฐานข้อมูล SQL
          include "../connect.php"; 

          // ดึงข้อมูลจากฐานข้อมูล
          $sql = "SELECT * FROM reserve";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["id_reserve"] . "</td>";
              echo "<td>" . $row["name"] . "</td>";
              echo "<td>" . $row["phone"] . "</td>";
              echo "<td>" . $row["date"] . "</td>";
              echo "<td>" . $row["time"] . "</td>";
              echo "<td>" . $row["employees_id"] . "</td>";
              echo "<td>" . $row["service_id"] . "</td>";
              echo "<td><a href='print_to_pdf.php?id_reserve=" . $row["id_reserve"] . "' class='btn btn-warning'>Print</a></td>";
              echo "<td><a href='delete_admin.php?id=" . $row["id_reserve"] . "' class='btn btn-danger'>Delete</a></td>";
              echo "</tr>";
            }
          } else {
            echo "0 results";
          }

          // ปิดการเชื่อมต่อกับฐานข้อมูล
          $conn->close();
        ?>
      </tbody>
    </table>
    <h2>เมื่อร้านตรวจสอบข้อมูลการจองโปรดลบข้อมูลที่ผ่านวันการจองมาแล้ว</h2>
  </div>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
