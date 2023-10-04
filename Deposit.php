<!DOCTYPE html>
<html>
<head>
    
    <title>อัปโหลดรูปภาพ</title>
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
          <li><a class="active " href="index1.html">Home</a></li>
          <li><a href="about1.html">About</a></li>
          <li><a href="date.php">Barber work schedule</a></li>
          <li><a href="team1.php">Reserve</a></li>
          <li><a href="table.php">Booking status</a></li>
          <li><a href="Deposit.php">Deposit</a></li>

        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
    <h1>อัปโหลดรูปภาพชำระค่ามัดจำ</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="image">
        <input type="text" name="description" placeholder="ชื่อของผู้ใช้บริการ">
        <input type="submit" value="อัปโหลด">
    </form>
    <h2>เมื่ออัพโหลดรูปภาพชำระค่ามัดจำแล้วกรุณารอทางร้านอนุมัติ</h2>




    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
