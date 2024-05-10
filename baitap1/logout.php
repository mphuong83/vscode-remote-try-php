<?php
// Khởi đầu phiên làm việc
session_start();

// Reset trạng thái đăng nhập
$_SESSION["IsLogin"] = false;

// Hủy bỏ tất cả các biến phiên
session_unset();

// Hủy bỏ phiên
session_destroy();

// Chuyển hướng người dùng đến trang đăng nhập hoặc trang chính
header("Location: xulylogin.php"); // Đổi login.php thành trang mà bạn muốn người dùng chuyển hướng đến sau khi đăng xuất
exit();
?>
