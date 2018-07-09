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
	$objExcel = new PHPExcel;
	$objExcel->setActiveSheetindex(0);
	$sheet = $objExcel -> getActiveSheet() ->setTitle('sheet1');

	$rowCount =1;
	$sheet ->setCellValue('A'.$rowCount,'mstu');
	$sheet ->setCellValue('B'.$rowCount,'mskhungtu');
	$text1=$_POST['text1']; //msdu
	$sql=mysql_query("SELECT * from tu where msduan='$text1'");
	while($tu=mysql_fetch_array($sql))
	{
		$mstu=$tu[0];
		$result = mysql_query("SELECT mstu,mskhungtu FROM khungtu where mstu='$mstu'");

		while($row = mysql_fetch_array($result))
			{
				$rowCount++;
				$sheet ->setCellValue('A'.$rowCount,$row['mstu']);
				$sheet ->setCellValue('B'.$rowCount,$row['mskhungtu']);
		}
	}
	$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
	$filename = "export.xlsx";
	$objWriter -> save($filename);
ob_end_clean();
	header('Content-Disposition: attachment; filename="' . $filename . '"');
	header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
	header('Content-Length: ' . filesize($filename));
	header('Content-Transfer-Encoding: binary');
	header('Cache-Control: must-revalidate');
	header('Pragma: no-cache');
	readfile($filename);
  ob_end_clean();
	echo "<script type='text/javascript'>alert('Export Success');
window.location='home.php';
</script>";
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
  .carousel-inner img {
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
            margin-left: 42px;
        }
                .fieldset1 {
            margin-top: 50px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width: 450px;
            height: 200px;
            margin-left: 500px;
        }
                p{
            font-size: 20px;
            font-weight: bold;
            margin: 20px;
            text-align: center;
          }
                  .word{
            font-size: 20px;
            font-weight: bold;
            margin: 20px;
            }
  </style>
</head>
<body>
<div class="fakeimg1 text-center" style="margin-bottom:0">
  <h1>HAI NAM AUTOMATION</h1>
  <p>WELCOM TO OURS COMPANY!</p>
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

 <form method="post" action="">
              <fieldset class="fieldset1">
                <p>Export Project ID</p>
                <lable for = "text1" class="word"> Project ID: </label>
                <input type = "text" name="text1" class="text1" required="">   </input>
                <input type = "submit" name="button1" value= "Submit" class="btn btn-lg btn-primary" style="margin-left: 200px;margin-bottom: 50px;margin-top: 20px;">
              </fieldset>
            </form>


  </body>
</html>
