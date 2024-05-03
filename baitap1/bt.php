<?php 
$server='localhost';
$user='root';
$pass='12022003';
$database='sinhvienpka';

try {
    $conn= new mysqLi($server,$user,$pass,$database);

    if($conn->connect_error){
        die('Kết nối thất bại'.$conn->connect_error);
    }
} catch (Exception $e) {
    die('Kết nối thất bại: '.$e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 50%; /* Độ rộng của bảng */
        margin: auto; /* Căn giữa bảng */
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
</style>
<body>
        
<table>
  <tr>
  <th>ID</th>
    <th>TÊN MÔN HỌC</th>
    <th>TÊN SINH VIÊN</th>
    <th>HỌC KỲ</th>
  </tr>
<?php
$danhsach_sql = "SELECT dangky.id, sinh_vien.TOTEN 
AS ten_sinhvien, mon_hoc.ten_monhoc 
AS ten_monhoc, dangky.ky_hoc FROM dangky 
JOIN sinh_vien ON dangky.MSSV = sinh_vien.ID 
JOIN mon_hoc ON dangky.ma_monhoc = mon_hoc.ID;";
$result = mysqli_query($conn, $danhsach_sql);
if (!$result) {
    die("Truy vấn thất bại: " . mysqli_error($conn));
            }
            while ($r = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
            <td><?php echo $r['id'] ?></td>
            <td><?php echo $r['ten_monhoc'] ?></td>
            <td><?php echo $r['ten_sinhvien'] ?></td>
            <td><?php echo $r['ky_hoc'] ?></td>
            </tr>
            <?php
            }
            ?>
            </table>
</body>
        
</html>