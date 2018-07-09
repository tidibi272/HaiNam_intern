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
      $text1=$_POST['text1'];     #name project
      $text3=$_POST['text3'];     #noproject
      if ( mysql_num_rows (mysql_query("SELECT * FROM duan where msduan='$text3'") )==0 && strlen($text3)==6)
        {
        mysql_query("INSERT INTO duan (msduan,tenduan) values ('$text3','$text1')");
        echo '<script>alert("Data Success")</script>';
        }
      else
        echo '<script>alert("Data Fail")</script>';
  }
if(isset($_POST['button2']))
  {
    $text4=$_POST['text4'];     #name
    $text5=$_POST['text5'];     #phone
    $text7=$_POST['text7'];     #company name
    $text8=$_POST['text8'];     #code
    $text9=$_POST['text9'];     #address
    if ( mysql_num_rows (mysql_query("SELECT * FROM khachhang where sdt='$text5'") )==0 && strlen($text8)==3)
    {
       mysql_query("INSERT INTO khachhang (mskh,tenkh,tencongty,diachi,sdt) values ('$text8','$text4','$text7','$text9','$text5')");
    echo '<script>alert("Data Success")</script>';
    }
    else
    echo '<script>alert("Data Fail")</script>';
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
            margin-left: 35px;
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
            margin-left: 85px;
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
            margin-left: 45px;
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
            margin-left: 39px;
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
            margin-left: 45px;
        }   .text7 {
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
            margin-left: 53px;
        }   .text8 {
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
            margin-left: 25px;
        }
        .fieldset1 {
            margin-top: 50px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width: 450px;
            height: 300px;
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

     <div class="dropdown show" style="margin-right: 40px;">
        <a class="btn btn-secondary dropdown-toggle"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Pannel </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="Create_Pannel.php">Create</a>
        <a class="dropdown-item" href="listpannel.php">list</a>
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

    <div class="dropdown show" style="margin-right:240px">
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

        <div class="container">
          <div class ="row">
             <div class ="col">
                <form method ="POST" action="" >
                    <fieldset class="fieldset1" >
                      <p> Customer Information </p>
                      <label for="text1"  class="word">Project Name:</label>
                      <input type="text" class="text1" name="text1" >
                      <br>
                      <br>
                      <lable for = "text3" class="word"> Project ID: </label>
                      <input type ="text" class="text3" name="text3" required=""  > </input>
                      <br>
                      <br>
                      <input type = "submit"  name="button1" value= "Submit" class="btn btn-lg btn-primary" style="margin-left: 200px;margin-top: 1px;">
                    </fieldset>
                </form>
             </div>

          <div class = "col">
               <form method="post" action="" class="container">
                  <fieldset class="fieldset2">
                      <p> Project Information </p>
                         <lable for = "text4" class="word"> Customer Name: </label>
                         <input type ="text" name="text4" class="text4" required="" > </input>
                      <br>
                      <br>
                          <lable for = "text5" class="word"> Customer Phone: </label>
                          <input type ="text" name="text5" class="text5"  required=""> </input>
                      <br>
                      <br>
                           <lable for = "text7" class="word">Company Name: </label>
                           <input type = "text" name="text7" class="text6" required="">   </input>
                      <br>
                      <br>
                          <lable for = "text8" class="word">Customer Code: </label>
                          <input type = "text" name="text8" class="text7" required="">   </input>
                      <br>
                      <br>
                          <lable for = "text9" class="word">Customer Address: </label>
                          <input type = "text" name="text9" class="text8" required="">   </input>
                          <input type = "submit" name="button2" value= "Submit"  class="btn btn-lg btn-primary" style="margin-left: 200px;margin-top: 20px;">
                  </fieldset>
               </form>
          </div>
          </div>
        </div>
      </body>
</html>




