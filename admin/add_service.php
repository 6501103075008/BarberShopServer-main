<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>เข้าสู่ระบบ</title>
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
  .login-form {
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
  input[type="password"] {
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
<div class="service-form">
  <center><h1>เพิ่มบริการใหม่</h1></center>
    <form action="insert_service.php" method="post">
        <label for="service_name">ชื่อบริการ:</label>
        <input type="text" name="service_name" required><br>
        
        <label for="description">คำอธิบาย:</label>
        <textarea name="description"></textarea><br>
        
        <label for="price">ราคา:</label>
        <input type="number" name="price" required><br>
        
        <input type="submit" value="บันทึก">
    </form>

</body>
