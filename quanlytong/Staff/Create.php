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
      $text1=$_POST['text1'];     #manager id
      $text2=$_POST['text2'];     #manager name
      $text3=$_POST['text3'];     #type id
      $text4=$_POST['text4'];     #type name
      $text9=$_POST['text9'];     #type name
      $text10=$_POST['text10'];     #type name
      if ( mysql_num_rows (mysql_query("SELECT * FROM quanly where msquanly='$text1'") )==0 )
        {
        mysql_query("INSERT INTO quanly (msquanly,password,msloai,loai,ten, sdt) values ('$text1','$text2','$text3','$text4','$text9','$text10')");
        echo '<script>alert("Create Manager Success")</script>';
        }
      else
        echo '<script>alert("ID Manager is existed")</script>';
  }
if(isset($_POST['button2']))
  {
    $text5=$_POST['text5'];     #Employee ID
    $text6=$_POST['text6'];     #Employee name
    $text7=$_POST['text7'];     #Employee dep
    $text8=$_POST['text8'];     #Employee subdep
    if ( mysql_num_rows (mysql_query("SELECT * FROM nhanvien where msnv='$text5'") )==0 )
    {
       mysql_query("INSERT INTO nhanvien (msnv,hoten,dep,subdep) values ('$text5','$text6','$text7','$text8')");
    echo '<script>alert("Create Employee Success")</script>';
    }
    else
    echo '<script>alert("ID Employee is existed ")</script>';
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
            background-image: url(../background.jpg);
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
            margin-left: 112px;
        }
        .text2 {
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
            margin-left: 45px;
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
            margin-left: 62px;
        }
            .text4 {
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
            margin-left: 98px;
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
            margin-left: 64px;
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
            margin-left: 82px;
        }
            .text8 {
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
            margin-left: 39px;
        }
           .text10 {
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
            margin-left: 74px;
        }
          .text9 {
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
            margin-left: 77px;
        }

        .fieldset1 {
            margin-top: 50px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width: 500px;
            height: 600px;
        }
        .fieldset2 {
            margin-top: 50px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width: 500px;
            height: 500px;
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
                  <a class="nav-link" href="../../index.php" style="width: 100px">Home</a>
                </li>
                <li class="nav-item" style="width: 220px">
                  <a class="nav-link" href="../Add_Cus_Pro.php">Add Customer and Project </a>
                </li>
                <li class="nav-item" style="width: 140px">
                  <a class="nav-link" href="../Create_Orders.php">Create Orders  </a>
                </li>
            </ul>
          </div>

        <div class="dropdown show" style="margin-right: 50px">
           <a class="btn btn-secondary dropdown-toggle"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Pannel </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="../Create_Pannel.php">Create</a>
          <a class="dropdown-item" href="../listpannel.php">List</a>
          <a class="dropdown-item" href="../exporttest.php">Export</a>
          </div>
        </div>

<div class="dropdown show" style="margin-right: 50px">
      <a class="btn btn-secondary dropdown-toggle"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Modify Information </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="../ModifyCustomer.php">Modify Customer Information</a>
      <a class="dropdown-item" href="../ModifyPannel.php">Modify Pannel Information</a>
      <a class="dropdown-item" href="../Modifyproject.php">Modify Project Information</a>
      <a class="dropdown-item" href="../ModifyStaff.php">Modify Staff Information</a>
    </div>
    </div>

    <div class="dropdown show" style="margin-right: 240px">
      <a class="btn btn-secondary dropdown-toggle"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Staff Member </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="Create.php">Create </a>
      <a class="dropdown-item" href="Delete.php">Delete</a>
      <a class="dropdown-item" href="List.php">List</a>
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
          <div class="container">
            <div class="row">
              <div class="col">
               <form method="post" action="" class="container">
                  <fieldset class="fieldset1">
                      <p> Manager Information </p>
                         <lable for = "text1" class="word"> ID: </label>
                         <input type ="text" name="text1" class="text1" required="" > </input>
                      <br>
                      <br>
                          <lable for = "text2" class="word"> Password: </label>
                          <input type ="text" name="text2" class="text2"  required=""> </input>
                      <br>
                      <br>
                           <lable for = "text3" class="word">Type ID: </label>
                           <input type = "text" name="text3" class="text3" required="">   </input>
                      <br>
                      <br>
                          <lable for = "text4" class="word">Type Name: </label>
                          <input type = "text" name="text4" class="text4" required="">   </input>
                      <br>
                      <br>
                          <lable for = "text9" class="word"> Name: </label>
                          <input type = "text" name="text9" class="text9" required="">   </input>
                      <br>
                      <br>
                          <lable for = "text10" class="word">Phone: </label>
                          <input type = "text" name="text10" class="text10" required="">   </input>
                      <br>
                      <br>
                          <input type = "submit" name="button1" value= "Submit"  class="btn btn-lg btn-primary" style="margin-left: 200px;margin-top: 20px;">
                  </fieldset>
               </form>
              </div>
              <div class = "col">
               <form method="post" action="" class="container">
                  <fieldset class="fieldset2">
                      <p> Employee </p>
                         <lable for = "text5" class="word">  ID: </label>
                         <input type ="text" name="text5" class="text5" required="" > </input>
                      <br>
                      <br>
                          <lable for = "text6" class="word">  Name: </label>
                          <input type ="text" name="text6" class="text6"  required=""> </input>
                      <br>
                      <br>
                           <lable for = "text7" class="word"> Dep: </label>
                           <input type = "text" name="text7" class="text7" required="">   </input>
                      <br>
                      <br>
                          <lable for = "text8" class="word"> Sub-Dep: </label>
                          <input type = "text" name="text8" class="text8" required="">   </input>
                      <br>
                      <br>
                          <input type = "submit" name="button2" value= "Submit"  class="btn btn-lg btn-primary" style="margin-left: 200px;margin-top: 20px;">
                  </fieldset>
               </form>
              </div>
            </div>
          </div>
      </body>
</html>




