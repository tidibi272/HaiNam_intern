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
		$text1temp=$_POST['text1'];    #Phonenumber
    $text2temp=$_POST['text2'];  #order id
    $text3temp=$_POST['text3'];  #project id
		if ( mysql_num_rows (mysql_query("SELECT * FROM donhang where sdt='$text1temp' and landat='$text2temp' and msduan='$text3temp' ") )==0)
    {
    	$text1="";    #noproject
		$text2="";    #code cus
		$text3="";    #order
        echo '<script>alert("404 not found")</script>';

    }
    else
    {
      $text1=$text3temp;
      $text3=$text2temp;
      $text2=mysql_fetch_array(mysql_query("SELECT * from khachhang where sdt ='$text1temp' "));
      $text2=$text2['mskh'];
    }

}
if(isset($_POST['button2']))
{
	$text1 = $_POST['text4'];   #norpoject
	$text2 = $_POST['text5'];	#code cus
	$text3 = $_POST['text6'];	#order
	$text7 = $_POST['text7'];	#nopannel
	$text8 = $_POST['text8'];	#nofamre
    		$mstu= $text1.$text2.$text3.$text7;

  if (($text1 =="" and $text2 =="" and $text3 =="" ) || $text8 >=100)
        echo '<script>alert("405 not found")</script>';
    else
    {
      if (mysql_num_rows(mysql_query("SELECT * FROM tu where mstu ='$mstu'") ) !=0)
      {
       if (mysql_num_rows(mysql_query("SELECT * FROM khungtu where mstu ='$mstu'") ) ==0)
       {
    		for ($i =1;$i <= $text8; $i++)
    		{   if ($i <10)
          {
    				$frame=$mstu.'0'.$i;
    				mysql_query("INSERT INTO khungtu (mskhungtu,mstu) values ('$frame','$mstu')");
    		  }
          else
          {
            $frame=$mstu.$i;
            mysql_query("INSERT INTO khungtu (mskhungtu,mstu) values ('$frame','$mstu')");
          }
        }
    		$FAT=$_POST['Fat'];
    		$Delivery=$_POST['Delivery'];
    		$Adjust_FAT=$_POST['Adj_Fat'];
    		$Adjust_Delivery=$_POST['Adj_Delivery'];
    		$Actual_Delivery=$_POST['Actual_Delivery'];
   			mysql_query("UPDATE tu SET fatdukien='$FAT', giaohangdukien='$Delivery' where mstu = '$mstu' ");
   			if ($Adjust_FAT !="")
   				mysql_query("UPDATE tu SET fathieuchung='$Adjust_FAT' where mstu = '$mstu' ");
			if ($Adjust_Delivery !="")
   				mysql_query("UPDATE tu SET giaohanghieuchinh='$Adjust_Delivery' where mstu = '$mstu' ");
   			if ($Actual_Delivery !="")
   				mysql_query("UPDATE tu SET giaohangthucte='$Actual_Delivery' where mstu = '$mstu' ");
    	}

    	else
      	echo '<script>alert("Pannel dang ton tai")</script>';
      }
      else
        echo '<script>alert("Pannel khong ton tai trong import")</script>';

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
            margin-left: 24px;
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
            margin-left: 87px;
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
            margin-left: 73px;
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
            margin-left: 23px;
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
            margin-left: 85px;
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
            margin-left: 134px;
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
            margin-left: 68px;
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
            margin-left: 170px;
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
            margin-left: 125px;
        }
            .text11 {
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
            margin-left: 105px;
        }
            .text12 {
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
            margin-left: 55px;
        }
            .text13 {
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
            margin-left: 55px;
        }
        .fieldset1 {
            margin-top: 20px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width: 500px;
            height: 380px;
            margin-left: 400px;
          }
        .fieldset2 {
            margin-top: 20px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width: 1200px;
            height: 700px;
            margin-left: 80px;

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
           <a class="btn btn-secondary dropdown-toggle"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pannel</a>
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

			<form method ="POST" action="">
              <fieldset class="fieldset1">
                <p>Import Project</p>
                <lable for = "text1" class="word"> Customer Phone: </label>
                <input type ="text" name="text1" class="text1" required="" > </input>
                <br>
                <br>
                <lable for = "text2" class="word"> Order ID: </label>
                <input type ="text" name="text2" class="text2" required="" > </input>
                <br>
                <br>
                <lable for = "text3" class="word"> Project ID: </label>
                <input type ="text" name="text3" class="text3" required="" > </input>
                <button name="button1" type="submit" class="btn btn-lg btn-primary" style="margin-left: 200px;margin-bottom: 50px;margin-top: 20px;"> Import</button>
              </fieldset>
      </form>


      <form method="post" action="">
              <fieldset class="fieldset2">
                <p>Create Pannel Information</p>
                <div class="container">
                  <div class = "row">
                    <div class = "col">
                      <label class="word">Project ID:</label>
                      <input type ="text" name="text4" class="text4"  value ="<?php if (isset($_POST['button1']) || isset($_POST['button2'])) echo $text1 ?>"> </input>
                      <br>
                      <br>
                      <label class="word">Customer Code:</label>
                      <input type ="text" name="text5" class="text5"  value ="<?php if (isset($_POST['button1']) || isset($_POST['button2'])) echo $text2 ?>"> </input>
                      <br>
                      <br>
                      <label class="word">Order ID:</label>
                      <input type ="text" name="text6" class="text6"  value ="<?php if (isset($_POST['button1']) || isset($_POST['button2'])) echo $text3 ?>"> </input>
                    </div>
                    <div class = "col" style="margin-top: 16px">
                      <lable for = "text7" class="word"> Pannel ID: </label>
                      <input type = "text" name="text7" class="text7" >   </input>
                      <br>
                      <br>
                      <br>
                      <lable for = "text8" class="word">Number Column: </label>
                      <input type = "text" name="text8" class="text8" >   </input>
                      <br>
                      <br>
                      <label for = "Fat" class="word">FAT:</label>
                      <input type="date"  name="Fat" class="text9" required="">
                      <br>
                      <label for = "Delivery" class="word">Delivery:</label>
                      <input type="date"  name="Delivery" class="text10" required="">
                      <br>
                      <label for = "Adj_Fat" class="word">Adjust FAT</label>
                      <input type="date"  name="Adj_Fat" class="text11"  >
                      <br>
                      <label for = "Adj_Delivery" class="word">Adjust Delivery:</label>
                      <input type="date" name="Adj_Delivery" class="text12" >
                      <br>
                      <label for = "Actual_Delivery" class="word">Actual Delivery:</label>
                      <input type="date"  name="Actual_Delivery" class="text13" >
                      <br>
                    </div>
                  </div>
                </div>
                      <input type = "submit" name="button2" value= "Submit" class="btn btn-lg btn-primary" style="margin-left: 500px;margin-bottom: 50px;margin-top: 10px;">
              </fieldset>
            </form>
          </body>
          </html>
