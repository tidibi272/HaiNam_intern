<?php session_start();

if (isset($_SESSION['id_tong'])){
    unset($_SESSION['id_tong']); // xóa session login
}

echo "<script type='text/javascript'>window.location='../index.php';
</script>";

?>
