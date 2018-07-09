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

?>
<?php
if(isset($_POST['button1']))
  {
      $text1=$_POST['text1'];     #no pannel
      $text2=$_POST['text2'];     #no frame
      if ( mysql_num_rows (mysql_query("SELECT * FROM tu where mstu='$text1'") )!=0)
        {
          if ($text2!="" && $text2<100)
          {
              for ($i=1;$i<=$text2;$i++)
              {
                if ( $i <10)
                {
                  $mskhungtu=$text1.'0'.$i;
                  if ( mysql_num_rows(mysql_query("SELECT * from khungtu where mskhungtu='$mskhungtu'"))!=0)
                  mysql_query("UPDATE khungtu set  mskhungtu='$mskhungtu' where mskhungtu='$mskhungtu'");
                  if ( mysql_num_rows(mysql_query("SELECT * from khungtu where mskhungtu='$mskhungtu'"))==0)
                  mysql_query("INSERT INTO khungtu (mskhungtu,mstu) values ('$mskhungtu','$text1')");
                }
                else
                {
                  $mskhungtu=$text1.$i;
                  if ( mysql_num_rows(mysql_query("SELECT * from khungtu where mskhungtu='$mskhungtu'"))!=0)
                  mysql_query("UPDATE khungtu set  mskhungtu='$mskhungtu' where mskhungtu='$mskhungtu'");
                  if ( mysql_num_rows(mysql_query("SELECT * from khungtu where mskhungtu='$mskhungtu'"))==0)
                  mysql_query("INSERT INTO khungtu (mskhungtu,mstu) values ('$mskhungtu','$text1')");
                }
              }
              for ( $i= $text2+1;$i<100;$i++)
              {
                if ($i<10)
                {
                  $mskhungtu=$text1.'0'.$i;
                  if ( mysql_num_rows(mysql_query("SELECT * from khungtu where mskhungtu='$mskhungtu'"))!=0)
                  mysql_query("DELETE FROM  khungtu  where mskhungtu='$mskhungtu'");
                }
                else
                {
                  $mskhungtu=$text1.$i;
                if ( mysql_num_rows(mysql_query("SELECT * from khungtu where mskhungtu='$mskhungtu'"))!=0)
                  mysql_query("DELETE FROM  khungtu  where mskhungtu='$mskhungtu'");
                }
              }
          }
          else
            echo '<script>alert("format Fail")</script>';
        }
        else
          echo '<script>alert("pannel khong ton tai Fail")</script>';

          #xu ly ngay
        $FAT=$_POST['Fat'];
        $Delivery=$_POST['Delivery'];
        $Adjust_FAT=$_POST['Adj_Fat'];
        $Adjust_Delivery=$_POST['Adj_Delivery'];
        $Actual_Delivery=$_POST['Actual_Delivery'];
        if ($FAT !="")
          {
            mysql_query("UPDATE tu SET fatdukien='$FAT'where mstu = '$text1' ");
            echo '<script>alert("update fat success")</script>';
          }
        if ($Delivery !="")
          {
            mysql_query("UPDATE tu SET giaohangthucte='$Delivery'where mstu = '$text1' ");
            echo '<script>alert("update Delivery success")</script>';
          }
        if ($Adjust_FAT !="")
          {
          mysql_query("UPDATE tu SET fathieuchinh='$Adjust_FAT' where mstu = '$text1' ");
          echo '<script>alert("update Adjust_FAT success")</script>';
          }
        if ($Adjust_Delivery !="")
          {
            mysql_query("UPDATE tu SET giaohanghieuchinh='$Adjust_Delivery' where mstu = '$text1' ");
            echo '<script>alert("update Adj_Delivery success")</script>';
          }
        if ($Actual_Delivery !="")
          {
            mysql_query("UPDATE tu SET giaohangthucte='$Actual_Delivery' where mstu = '$text1' ");
            echo '<script>alert("update Actual_Delivery success")</script>';
          }
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
            .text1 {
            width: 230px;
            height: 42px;
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
            margin-left: 104px;
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
            margin-left: 38px;
        }
            .text3 {
            width: 230px;
            height: 42px;
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
            margin-left: 141px;
        }
            .text4 {
            width: 230px;
            height: 42px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size:  18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left: 95px;
        }
            .text5 {
            width: 230px;
            height: 42px;
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
            margin-left: 78px;
        }
           .text6 {
            width: 230px;
            height: 42px;
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
            margin-left: 28px;
        }
            .text7 {
            width: 230px;
            height: 42px;
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
            margin-left: 28px;
        }
        .fieldset1 {
            margin-top: 20px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width: 700px;
            height: 680px;
            margin-left: 400px;
          }

        .word{
            font-size: 20px;
            font-weight: bold;
            margin: 20px;
            }
        p{
            font-size: 30px;
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

        <div class="dropdown show" style="margin-right: 50px">
           <a class="btn btn-secondary dropdown-toggle"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Pannel</a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="Create_Pannel.php">Create</a>
          <a class="dropdown-item" href="listpannel.php">List</a>
          <a class="dropdown-item" href="exporttest.php">Export</a>
          </div>
        </div>

     <div class="dropdown show" style="margin-right: 50px">
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



          <form method="post" action="">
              <fieldset class="fieldset1">
                <p>Pannel Information</p>
                <lable for = "text1" class="word"> Pannel ID: </label>
                <input type = "text" name="text1" class="text1" required="">   </input>
                <br>
                <br>
                <lable for = "text2" class="word"> Number Column: </label>
                <input type = "text" name="text2" class="text2" >   </input>
                <br>
                <label for = "Fat" class="word">FAT:</label>
                <input type="date"  name="Fat" class="text3" >
                <br>
                <label for = "Delivery" class="word">Delivery:</label>
                <input type="date"  name="Delivery" class="text4" >
                <br>
                <label for = "Adj_Fat" class="word">Adjust FAT</label>
                <input type="date"  name="Adj_Fat" class="text5"  >
                <br>
                <label for = "Adj_Delivery" class="word">Adjust Delivery:</label>
                <input type="date" name="Adj_Delivery" class="text6" >
                <br>
                <label for = "Actual_Delivery" class="word">Actual Delivery:</label>
                <input type="date"  name="Actual_Delivery" class="text7" >
                <input type = "submit" name="button1" value= "Submit" class="btn btn-lg btn-primary" style="margin-left: 250px;margin-bottom: 50px;margin-top: 10px;">
              </fieldset>
            </form>

          </body>
          </html>
