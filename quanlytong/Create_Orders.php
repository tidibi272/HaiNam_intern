<!--KIỂM TRA ĐĂNG NHẬP TỪ QUẢN LÝ-->
<?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:main_login_tong.php");
}
?>



<?php
mysql_connect('localhost','root','');
mysql_select_db('mms');
include 'Classes/PHPExcel.php';

?>
<?php

if(isset($_POST['button1']))
  {
    #code xu ly thong tin php
    $text2=$_POST['text2'];     #phone kh
    $text3=$_POST['text3'];     #order cua kh
    $text4=$_POST['text4'];     #no.project
    #code insert table donhang
    #neu msduan is exist printf fails else insert vao
    if ( mysql_num_rows (mysql_query("SELECT * FROM khachhang where sdt = '$text2' ") )!=0)
    {
    if ( mysql_num_rows (mysql_query("SELECT * FROM duan where msduan='$text4'") )!=0)
      {
        if ( mysql_num_rows (mysql_query("SELECT * FROM donhang where  sdt = '$text2' and msduan='$text4' and landat='$text3' ") )==0 && strlen($text3)==2)
        {           # insert thong tin don hang
            $sql= mysql_query("SELECT mskh FROM khachhang where  sdt = '$text2' ");
            $dulieu_kh=mysql_fetch_array($sql);
            $code= $dulieu_kh['mskh'];
            mysql_query("INSERT INTO donhang (sdt,msduan,landat) values ('$text2','$text4','$text3')");
                     #code import excel
             $file=$_FILES['file']['tmp_name'];
             $objReader = PHPExcel_IOFactory::createReaderForFile($file);
             $objReader -> setLoadSheetsOnly('Sheet1');
             $objExcel = $objReader -> load($file);
             $sheetData = $objExcel -> getActiveSheet() -> toArray('null',true,true,true);
             $highestRow = $objExcel -> setActiveSheetIndex() -> getHighestRow();
              for ($row =2 ;$row <= $highestRow;$row++)
                {
                $NoPantemp = $sheetData[$row]['C'];
                $NamePan = $sheetData[$row]['D'];
                $NoPan=$text4.$code.$text3.$NoPantemp;
                if ( $NoPantemp=='null')
                 break;
                mysql_query("INSERT INTO tu (msduan,mstu,tentu) values ('$text4','$NoPan','$NamePan')");
                }
            echo '<script>alert("SUCCESS")</script>';

        }
        else
            echo '<script>alert("Order Fail")</script>';
    }
    else
            echo '<script>alert("Noproject Fail")</script>';
  }
        else
            echo '<script>alert("Customer Fail")</script>';
  }


?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>Intern in Hai Nam Company</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <style>
        .fakeimg1 {
            height: 115px;
            background: lightblue;
            color:black;
            padding: 15px;
                  }
        .carousel-inner img
          {
            width: 100%;
            height: 100%;
          }
          body{
            background-image: url(background.jpg);
              }
        .text2 {
            height: 42px;
            width: 230px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left: 24px;
        }
        .text3 {
            height: 42px;
            width: 230px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left: 97px;
        }
            .text4 {
            height: 42px;
            width: 230px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left: 85px;
        }
        .fieldset1 {
            margin-top: 50px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width: 600px;
            height: 400px;
            margin-left: 400px;

          }
        .word{
            font-size: 20px;
            font-weight: bold;
            margin: 20px;
            }
        p{
            font-size: 20px;
            font-weight: bold;
            margin: 20px;
            text-align: center;
          }
          .p1{
            font-weight: bold;
            text-align: center;
          }
  </style>
</head>
      <body>
          <div class="fakeimg1 text-center" style="margin-bottom:0">
            <h1>HAI NAM AUTOMATION</h1>
            <div class="p1">WELCOM TO OURS COMPANY!</div>
          </div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item" >
                  <a class="nav-link" href="../index.php" style="width: 100px">Home</a>
                </li>
                <li class="nav-item" style="width: 220px">
                  <a class="nav-link" href="Add_Cus_Pro.php">Add Customer and Project </a>
                </li>
                <li class="nav-item" style="width: 140px">
                  <a class="nav-link" href="Create_Orders.php">Create Orders  </a>
                </li>
            </ul>
          </div>

          <div class="dropdown show" style="margin-right: 40px">
              <a class="btn btn-secondary dropdown-toggle"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pannel</a>
             <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
             <a class="dropdown-item" href="Create_Pannel.php">Create</a>
             <a class="dropdown-item" href="listpannel.php">List</a>
             <a class="dropdown-item" href="exporttest.php">Export</a>
             </div>
          </div>

<div class="dropdown show" style="margin-right: 40px">
      <a class="btn btn-secondary dropdown-toggle"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Modify Information </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="ModifyCustomer.php">Modify Customer Information</a>
      <a class="dropdown-item" href="ModifyPannel.php">Modify Pannel Information</a>
      <a class="dropdown-item" href="Modifyproject.php">Modify Project Information</a>
      <a class="dropdown-item" href="ModifyStaff.php">Modify Staff Information</a>
    </div>
    </div>

    <div class="dropdown show" style="margin-right: 240px">
      <a class="btn btn-secondary dropdown-toggle"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Staff Member </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="Staff/Create.php">Create </a>
      <a class="dropdown-item" href="Staff/Delete.php">Delete</a>
      <a class="dropdown-item" href="Staff/List.php">List</a>
    </div>
    </div>


          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item"  >
                <a class="nav-link" href="logout.php" >Logout</a>
              </li>
            </ul>
          </div>
        </nav>

          <form method ="POST" action="" enctype="multipart/form-data">
                    <fieldset class="fieldset1" >
                <p>Orders Information</p>
                <lable for = "text2" class="word">Customer Phone: </label>
                <input type ="text" name="text2" class="text2"  required=""> </input>
                <br>
                <br>
                <lable for = "text3" class="word">Order ID: </label>
                <input type ="text" name="text3" class="text3"  required=""> </input>
                <br>
                <br>
                <lable for = "text4" class="word">Project ID: </label>
                <input type ="text" name="text4" class="text4" required=""  > </input>
                </br>
                </br>
                <input type="file" name = "file" id = "submit" style="margin-left: 20px">
                <br>
                <button name="button1" type="submit" class="btn btn-lg btn-primary" style="margin-left: 200px;margin-bottom: 50px;margin-top: 10px;"> Import</button>
              </fieldset>
          </form>
    </body>
  </html>
