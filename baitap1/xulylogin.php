<?php
session_start();
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if ($_SESSION["IsLogin"] != true) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: login.html");
    exit(); // Đảm bảo dừng việc thực thi mã PHP sau khi chuyển hướng
}
// Kiểm tra xem người dùng đã submit form chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kết nối CSDL
    $server='localhost';
    $user='root';
    $pass='12022003';
    $database='sinhvienpka';

    $conn = new mysqli($server, $user, $pass, $database);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Lấy thông tin từ form đăng nhập
    $name = $_POST["name"];
    $pass = $_POST["pass"];

    // SQL query để kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM login WHERE name='$name' AND pass='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Đăng nhập thành công
        $_SESSION["IsLogin"] = true;
        header("Location: welcome.php"); // Chuyển hướng đến trang chào mừng sau khi đăng nhập thành công
    } else {
        // Đăng nhập thất bại
        header("Location: login.html"); // Chuyển hướng lại trang đăng nhập
    }

    $conn->close();
} else {
    // Nếu không phải là phương thức POST, chuyển hướng về trang đăng nhập
    header("Location: login.html");
}
?>