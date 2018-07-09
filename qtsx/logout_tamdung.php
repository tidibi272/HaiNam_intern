<?php session_start(); 
 
if (isset($_SESSION['myusername_tamdung']))
{
    unset($_SESSION['myusername_tamdung']); // xóa session login
    echo "<script type='text/javascript'>alert('Successfull Log out');
window.location='../index.php';
</script>";
}
else header('Location: ../index.php');
?>
