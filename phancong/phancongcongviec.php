<?php
session_start();
if(!(isset($_SESSION['quanly'])))
{
header("location:main_login_phancong.php");
}
?>
<?php
mysql_connect('localhost','root','') or die("<script>alert('KHÔNG THỂ KẾT NỐI DATABASE VUI LÒNG THỬ LẠI SAU')</script>");
mysql_select_db('mms');
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<?php
if (isset($_POST['dongy']))
    {
        if (isset($_SESSION['quanly']))
        {

                switch ($_SESSION['quanly']) 
                {
                    case 21:
                        $i = 1;
                        break;
                    case 22:
                        $i = 2;
                        break;
                    case 23:
                        $i = 3;
                        break;
                    case 24:
                        $i = 4;
                        break;
                    case 25:
                        $i = 5;
                        break;
                    case 26:
                        $i = 6;
                        break;
                    case 27:
                        $i = 7;
                        break;
                }
                $istring =(string)$i;
                $mstu = $_POST["nhap_mstu"];
                $msnv = $_POST["nv$istring"];
                $msgd = $istring;
                if ($msnv!="") 
                    {
                        $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mstu' AND msgd ='$msgd'"));
                        if($flag<=0)
                            {
                                mysql_query("INSERT INTO qtsx (mskhungtu,msnv,msgd) VALUES ('$mstu','$msnv','$msgd')");
                                $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mstu' AND msnv ='$msnv' AND msgd ='$msgd'"));
                                if($flag>=0) echo "Phân công giai đoạn $istring: THÀNH CÔNG <br>";
                                else echo "Phân công giai đoạn $istring: THẤT BẠI, VUI LÒNG THỬ LẠI<br>";
                            }
                        else echo "Phân công giai đoạn $istring: THẤT BẠI, GIAI ĐOẠN ĐÃ ĐƯỢC PHÂN CÔNG TRƯỚC ĐÓ <br>";
                    }

        }
    }
if (isset($_POST['capnhat']))
    {
        if (isset($_SESSION['quanly']))
        {

                switch ($_SESSION['quanly']) 
                {
                    case 21:
                        $i = 1;
                        break;
                    case 22:
                        $i = 2;
                        break;
                    case 23:
                        $i = 3;
                        break;
                    case 24:
                        $i = 4;
                        break;
                    case 25:
                        $i = 5;
                        break;
                    case 26:
                        $i = 6;
                        break;
                    case 27:
                        $i = 7;
                        break;
                }
                $istring =(string)$i;
                $mstu = $_POST["nhap_mstu"];
                $msnv = $_POST["nv$istring"];
                $msgd = $istring;
                if ($msnv!="") 
                    {
                        $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mstu' AND msgd ='$msgd'"));
                        if($flag==1)
                            {
                                mysql_query("UPDATE qtsx SET msnv = '$msnv' WHERE mskhungtu = '$mstu' AND msgd ='$msgd'");
                                $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mstu' AND msnv ='$msnv' AND msgd ='$msgd'"));
                                if($flag>=0) echo "Cập nhật giai đoạn $istring: THÀNH CÔNG <br>";
                                else echo "Cập nhật giai đoạn $istring: THẤT BẠI, VUI LÒNG THỬ LẠI<br>";
                            }
                        else echo "Cập nhật giai đoạn $istring: THẤT BẠI, GIAI ĐOẠN CHƯA ĐƯỢC PHÂN CÔNG,KHÔNG THỂ CẬP NHẬT<br>";
                    }

        }
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>ASSIGNMENT PAGE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css">
form {
    font-family: helvetica;
    margin-left: 20px;
    margin-right: 20px;
    margin-top: 20px
}
.fakeimg1 {
      height: 85px;
      background: lightblue;
      color:black;
      padding: 10px;
      font-weight: bold;
      margin-top: 1px;
 }
form div{
   margin-bottom: 25px ;
}

label {  
    font-weight: bold;
    line-height: 23px;
    float: left;
    font-size: 20px;  
}
fieldset {
    border:  1px solid #999;
    border-radius: 8px;
    box-shadow: 0 0 10px #999;
    background-color: white;
    opacity: 0.8;
}
h1#ten{
  text-align: left;
  font-weight: bold;
}
h2{
  text-align: left;
  font-weight: bold;
  font-size: 30px;
  height: 30px;
  padding: 10px;
}

form table{font-weight:bold;font-size: 17px}
legend {
    font-size: 22px;
    font-weight: bold;
}
form input{ 
font-weight: bold;
}
body{
            background-image: url(../quanlytong/background.jpg);
              }

    </style>
</head>
<body>
    <div class="fakeimg1 text-center" >
    <h1><strong>HAI NAM AUTOMATION</strong></h1>
    </div>
    <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="../index.php">HOME</a>
            </div>
            <ul class="nav navbar-nav">
              <li><a href="theodoiduan.php" target="_blank">MONITOR PROJECT</a></li>
              <li><a href="theodoitu.php" target="_blank">MONITOR PANEL AND COLUMN</a></li>
              <li class="active"><a href="phancongcongviec.php">ASSIGNMENT PAGE</a></li>
              <li ><a href="danhsachnhanvien.php"  target="_blank">EMPLOYEE LIST</a></li>
              <li><a href="logout_phancong.php">LOG OUT</a></li>
            </ul>
          </div>
    </nav>
    <form method="post" action="" id="phancongcongviec" autocomplete="off">
        <div>
            <h1 id="ten">ASSIGNMENT</h1>
        </div>
        <div>
            <label for = "nhap_mstu">COLUMN ID:</label>
            <input type="text"  name="nhap_mstu" class="form-control" required>
        </div>
        <fieldset>
            <div><h2>ASSIGN TASK</h2></div>
        <?php 
                switch ($_SESSION['quanly']) 
                {
                    case 21:
 
        ?>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 1:EA" readonly></input></div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="EMPLOYEE ID:" readonly></input></div>
                <div style="width: 60%; float:left;"><input type = "text" name ="nv1" id = "nv1" class="form-control"></input></div>
            </div>
        <?php
                    break;
                    case 22:
        ?>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 2:MC" readonly></input></div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="EMPLOYEE ID:" readonly></input></div>
                <div style="width: 60%; float:left;"><input type = "text" name ="nv2" id = "nv2" class="form-control"></input></div>
            </div>
        <?php
                    break;
                    case 23:
        ?>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 3:BUSBAR" readonly></input></div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="EMPLOYEE ID:" readonly></input></div>
                <div style="width: 60%; float:left;"><input type = "text" name ="nv3" id = "nv3" class="form-control"></input></div>
            </div>
        <?php
                    break;
                    case 24:
        ?>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 4:PC" readonly></input></div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="EMPLOYEE ID:" readonly></input></div>
                <div style="width: 60%; float:left;"><input type = "text" name ="nv4" id = "nv4" class="form-control"></input></div>
            </div>
        <?php
                    break;
                    case 25:
        ?>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 5:CW" readonly></input></div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="EMPLOYEE ID:" readonly></input></div>
                <div style="width: 60%; float:left;"><input type = "text" name ="nv5" id = "nv5" class="form-control"></input></div>
            </div>
        <?php
                    break;
                    case 26:
        ?>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 6:TW" readonly></input></div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="EMPLOYEE ID:" readonly></input></div>
                <div style="width: 60%; float:left;"><input type = "text" name ="nv6" id = "nv6" class="form-control"></input></div>
            </div>
        <?php
                    break;
                    case 27:
        ?>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 7:QC" readonly></input></div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="EMPLOYEE ID:" readonly></input></div>
                <div style="width: 60%; float:left;"><input type = "text" name ="nv7" id = "nv7" class="form-control"></input></div>
            </div>
        <?php
                    break;
                }
        ?>
        </fieldset>
        <br>
        <div>
                <div style="width: 7%; float:left;"><input type="submit" name="dongy" id= "dongy" value="SUBMIT" class="btn btn-primary"></div>
                <div style="width: 86%; float:left;"></div>
                <div style="width: 7%; float:left;"><input type="submit" name="capnhat" id="capnhat" value="UPDATE" class="btn btn-primary"></div>
        </div>
        <div>
                <?php
                if (isset($_POST['dongy'])||isset($_POST['capnhat']))
                    {
                        $tb =mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$_POST[nhap_mstu]'"); 
                        
                ?>
                        <table class="table table-stripedauto">
                            <thead>
                            <tr>
                                <th width="200" bgcolor=#999999><strong>COLUMN ID</strong></th>
                                <th width="200" bgcolor=#999999><strong>EMPLOYEE ID</strong></th>
                                <th width="200" bgcolor=#999999><strong>TASK ID</strong></th>
                                <th width="200" bgcolor=#999999><strong>START TIME</strong></th>
                                <th width="200" bgcolor=#999999><strong>FINISH TIME</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($tb!=0)
                             {
                                 while ($row = mysql_fetch_array($tb)) 
                                 {  

                            ?>
                                <tr>
                                <td bgcolor="white">&nbsp;<?php echo $row[0];?></td>
                                <td bgcolor="white">&nbsp;<?php echo $row[1];?></td>
                                <td bgcolor="white">&nbsp;<?php echo $row[2];?></td>
                                <td bgcolor="white">&nbsp;<?php echo $row[3];?></td>
                                <td bgcolor="white">&nbsp;<?php echo $row[4];?></td>
                                </tr>
                                
                            <?php
                                 }
                            ?>
                            </tbody>     
                            <?php 
                             }     
                            ?>
                        </table>       
                <?php 
                    }
                ?>
            </div>
    </form>
</body>