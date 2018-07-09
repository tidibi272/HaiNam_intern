<?php

$host="localhost"; // luôn luôn là localhost
$username="root"; // user của mysql
$password=""; // Mysql password
$db_name="mms"; // tên database

// kết nối cơ sở dữ liệu
mysql_connect("$host", "$username", "$password")or die("Không thể kết nối");
mysql_select_db("$db_name")or die("cannot select DB");

// username và password được gửi từ form đăng nhập
$ID=$_POST['ID'];
$password=$_POST['password'];

// Xử lý để tránh MySQL injection
$ID = stripslashes($ID);
$password = stripslashes($password);
$ID = mysql_real_escape_string($ID);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM quanly WHERE msquanly='$ID' and password='$password' and msloai='1'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
// nếu tài khoản trùng khớp thì sẽ trả về giá trị 1 cho biến $count
if($count==1){

// Lúc này nó sẽ tự động gửi đến trang thông báo đăng nhập thành công
session_start();
$_SESSION['id_tong'] = "$ID";
echo "<script type='text/javascript'>alert('Successfull Access');
window.location='home.php';
</script>";

}
else {
echo "<script type='text/javascript'>alert('Wrong Username or Password');
window.location='main_login_tong.php';
</script>";

}
?>