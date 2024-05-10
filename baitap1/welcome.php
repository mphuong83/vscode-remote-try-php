<?php
// Khởi đầu phiên làm việc
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if ($_SESSION["IsLogin"] != true) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: login.html");
    exit(); // Đảm bảo dừng việc thực thi mã PHP sau khi chuyển hướng
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> chao mung den voiw github</h1>
</body>
</html>