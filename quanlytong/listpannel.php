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
            margin-top: 50px;

        }
p{
            font-size: 30px;
            font-weight: bold;
            text-align: center;
          }

        .word{
            font-size: 20px;
            font-weight: bold;
            margin: 50px;
          }

          table, th, td {
    border: 2px solid white;
}
.table{
margin-left: 80px;
width: 1200px;
}
th, td {
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
             <a class="btn btn-secondary dropdown-toggle"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  Pannel</a>
             <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="Create_Pannel.php">Create</a>
            <a class="dropdown-item" href="listpannel.php">Create</a>
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
      <a class="btn btn-secondary dropdown-toggle"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Staff Member</a>
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

          <form method ="POST" action="" >
                        <lable for = "text1" class="word" > Key word: </label>
                        <input type ="text" name="text1" class="text1" placeholder="Project ID...."   > </input>
                <input type = "submit" name="button2" value= "Show all" class="btn btn-lg btn-primary" style="margin-left: 56px;margin-bottom: 50px;margin-top: 50px;">
                    <p>Pannels Information</p>
                    <br>
            <table class="table ">

  <tr>
    <th >ID Pannel</th>
    <th >Name</th>
    <th>FAT</th>
    <th>Delivery</th>
    <th>Adjust_FAT</th>
    <th>Adjust_Delivery</th>
    <th>Actual_Delivery</th>
  </tr>
                    <?php
                    if(isset($_POST['button2']))
                    {
                      $text1=$_POST['text1'];
                      if ( mysql_num_rows(mysql_query("SELECT * FROM tu where msduan='$text1'"))==0)
                        echo '<script>alert("Project ID is not existed")</script>';
                    else
                    {
                      $tb=mysql_query("SELECT * FROM tu where msduan='$text1'");
    while ( $temp=mysql_fetch_array($tb))
    {

    ?>
    <tr>
    <td><?php echo $temp[0];?></td>
    <td><?php echo $temp[2];?></td>
    <td><?php echo $temp[3];?></td>
    <td><?php echo $temp[4];?></td>
    <td><?php echo $temp[5];?></td>
    <td><?php echo $temp[6];?></td>
    <td><?php echo $temp[7];?></td>
    </tr>
    <?php
  }
}
?>
<?php
  }
?>
          <?php
                    if(isset($_POST['button1']))
                {
                    $temp1=$_POST['text1'];
                    $tb=mysql_query("SELECT * From quanly where msquanly like '%$temp1%' or msloai like '%$temp1%' or loai like '%$temp1%' or ten like '%$temp1%'");
          ?>
 <?php
    while ( $temp=mysql_fetch_array($tb))
    {

    ?>
    <tr>
    <td><?php echo $temp[0];?></td>
    <td><?php echo $temp[4];?></td>
    <td><?php echo $temp[1];?></td>
    <td><?php echo $temp[3];?></td>
    <td><?php echo $temp[2];?></td>
    <td><?php echo $temp[5];?></td>
    </tr>
    <?php
  }
?>
<?php
  }
?>

</table>
                <br>

          </form>
  </body>
</html>