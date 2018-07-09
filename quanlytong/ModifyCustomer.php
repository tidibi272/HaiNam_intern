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
   $text1 = $_POST['text1'];  // sdt input
   $texthai = $_POST['texthai'];  //code customer
   $text2 = $_POST['text2'];  #name
   $text3 = $_POST['text3'];  #sdt update
   $text5 = $_POST['text5'];  #ten cty
   $text6 = $_POST['text6'];  #makh
   $text7 = $_POST['text7'];  #dia chi

    if (  mysql_num_rows(mysql_query("SELECT * from khachhang where mskh='$texthai'")) ==1)
       {
          if ($text2!="")
            mysql_query("UPDATE khachhang SET tenkh='$text2' where mskh = '$texthai' ");
          if ($text5!="")
            mysql_query("UPDATE khachhang SET tencongty='$text5' where mskh = '$texthai' ");
          if ($text7!="")
            mysql_query("UPDATE khachhang SET diachi='$text7' where mskh = '$texthai' ");
          if ($text6!="")
          {
            $sql=mysql_query("SELECT * From khachhang where mskh = '$texthai'");
            $sql=mysql_fetch_array($sql);
            $sql=$sql['sdt'];
            $sql=mysql_query("SELECT * From donhang where sdt = '$sql'");
            $sql=mysql_fetch_array($sql);
            $sql=$sql['msduan'];
            $tu=mysql_query("SELECT * FROM tu where msduan ='$sql'");
            while ( $turow=mysql_fetch_array($tu))
            {
              $mstu=$turow[0];
              $khungtu=mysql_query("SELECT * FROM khungtu where mstu = '$mstu'");
              while ($khungturow = mysql_fetch_array($khungtu))
              {
                  $mskhungtu=$khungturow[0];

                  $lenght=strlen($mskhungtu);
                  $msduan=substr($mskhungtu, 0,6);
                  $temp=substr($mskhungtu,9,$lenght-9);
                  $mskhungtu1=$msduan.$text6.$temp;
                  mysql_query("UPDATE khungtu SET mskhungtu='$mskhungtu1' where mskhungtu = '$mskhungtu' ");
              }
              $lenght=strlen($mstu);
              $msduan=substr($mstu,0,6);
              $temp = substr($mstu,9,$lenght-9);
              $mstu1=$msduan.$text6.$temp;
              mysql_query("UPDATE tu SET mstu='$mstu1' where mstu = '$mstu' ");

            }
            mysql_query("UPDATE khachhang SET mskh='$text6' where mskh = '$texthai' ");
          }
          if ($text3!="")
            mysql_query("UPDATE khachhang SET sdt='$text3' where mskh = '$texthai' ");
          echo '<script>alert("Updata Success ")</script>';
       }
    elseif (  mysql_num_rows(mysql_query("SELECT * from khachhang where mskh='$texthai'")) ==0)
       {
        echo '<script>alert("mskh khong ton tai")</script>';
       }
    else
      {
        if ($text1 != "")  #if k nhap sdt bao fail
        {
          # sdt k ton tai bao fail
         if (  mysql_num_rows(mysql_query("SELECT * from khachhang where sdt = '$text1' and mskh='$texthai'")) !=0)
          {
        #text nao rong thi khong update
            if ($text2!="")
              mysql_query("UPDATE khachhang SET tenkh='$text2' where sdt = '$text1' ");
            if ($text5!="")
              mysql_query("UPDATE khachhang SET tencongty='$text5' where sdt = '$text1' ");
            if ($text7!="")
              mysql_query("UPDATE khachhang SET diachi='$text7' where sdt = '$text1' ");
            if ($text6!="")
            {
                  $sql=mysql_query("SELECT * From donhang where sdt = '$text1'");
                  $sql=mysql_fetch_array($sql);
                  $sql=$sql['msduan'];
                  $tu=mysql_query("SELECT * FROM tu where msduan ='$sql'");
                  while ( $turow=mysql_fetch_array($tu))
                  {
                    $mstu=$turow[0];
                    $khungtu=mysql_query("SELECT * FROM khungtu where mstu = '$mstu'");
                    while ($khungturow = mysql_fetch_array($khungtu))
                    {
                        $mskhungtu=$khungturow[0];

                        $lenght=strlen($mskhungtu);
                        $msduan=substr($mskhungtu, 0,6);
                        $temp=substr($mskhungtu,9,$lenght-9);
                        $mskhungtu1=$msduan.$text6.$temp;
                        mysql_query("UPDATE khungtu SET mskhungtu='$mskhungtu1' where mskhungtu = '$      mskhungtu' ");
                    }
                    $lenght=strlen($mstu);
                    $msduan=substr($mstu,0,6);
                    $temp = substr($mstu,9,$lenght-9);
                    $mstu1=$msduan.$text6.$temp;
                    mysql_query("UPDATE tu SET mstu='$mstu1' where mstu = '$mstu' ");

                  }
              mysql_query("UPDATE khachhang SET mskh='$text6' where sdt = '$text1' ");
            }
            if ($text3!="")
             mysql_query("UPDATE khachhang SET sdt='$text3' where sdt = '$text1' ");
             echo '<script>alert("Success Updata")</script>';

           }
           else
            echo '<script>alert("du lieu nhap khong dung")</script>';
       }
        else
         echo '<script>alert("mskh qua nhieu xin moi nhap sdt")</script>';
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
            margin-left: 72px;
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
            margin-left: 98px;
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
            margin-left: 93px;
        }
            .text5 {
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
            margin-left: 99px;
        }
           .text6 {
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
            margin-left: 106px;
        }
            .text7 {
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
            margin-left: 80px;
        }   .texthai {
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
            margin-top: 20px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width: 500px;
            height: 280px;
          }
        .fieldset2 {
            margin-top: 20px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width:550px;
            height: 430px;
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
             <a class="btn btn-secondary dropdown-toggle"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Pannel </a>
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
        <div class="container">
          <div class = "row">
            <div class = "col">
                  <fieldset class="fieldset1">
                    <p>Present Information</p>
                      <lable for = "texthai" class="word">Customer Code: </label>
                      <input type ="text" name="texthai" class="texthai" required=""  > </input>
                      <br>
                      <br>
                      <lable for = "text1" class="word">Customer Phone: </label>
                      <input type ="text" name="text1" class="text1"  > </input>
                  </fieldset>
            </div>
            <div class = "col">
                 <fieldset class="fieldset2">
                   <p>Update Information</p>
                     <lable for = "text2" class="word">Customer.Name: </label>
                     <input type ="text" name="text2" class="text2"  > </input>
                     <br>
                     <br>
                     <lable for = "text3" class="word">Customer Phone: </label>
                     <input type ="text" name="text3" class="text3"  > </input>
                     <br>
                     <br>
                     <lable for = "text5" class="word">Company Name: </label>
                     <input type = "text" name="text5" class="text5" >   </input>
                     <br>
                     <br>
                     <lable for = "text6" class="word">Customer Code: </label>
                     <input type = "text" name="text6" class="text6" >   </input>
                     <br>
                     <br>
                     <lable for = "text7" class="word">Customer Address: </label>
                     <input type = "text" name="text7" class="text7" >   </input>
                </fieldset>
            </div>
          </div>
        </div>
                     <input type = "submit" name="button1" value= "Submit" class="btn btn-lg btn-primary" style="margin-left: 600px;margin-bottom: 50px;margin-top: 10px;">
            </form>
  </body>
</html>