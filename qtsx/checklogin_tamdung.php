<?php
 
$host="localhost"; // luôn luôn là localhost
$username="root"; // user của mysql
$password=""; // Mysql password
$db_name="mms"; // tên database
 
// kết nối cơ sở dữ liệu
mysql_connect("$host", "$username", "$password")or die("Không thể kết nối");
mysql_select_db("$db_name")or die("cannot select DB");
 
// username và password được gửi từ form đăng nhập
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
 
// Xử lý để tránh MySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
 
$sql="SELECT * FROM quanly WHERE msquanly='$myusername' and password='$mypassword' and (msloai = '21' or msloai = '22' or msloai = '23' or msloai = '24' or msloai = '25' or msloai = '26' or msloai = '27')";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
// nếu tài khoản trùng khớp thì sẽ trả về giá trị 1 cho biến $count
if($count==1){
 
// Lúc này nó sẽ tự động gửi đến trang thông báo đăng nhập thành công
session_start();
$_SESSION['myusername_tamdung'] = "$myusername";
header("location:tamdungsanxuat.php");
}
else {
echo "<script type='text/javascript'>alert('Wrong ID or password');
window.location='main_login_tamdung.php';
</script>";
}
?>