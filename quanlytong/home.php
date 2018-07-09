<!--KIỂM TRA ĐĂNG NHẬP TỪ QUẢN LÝ-->
<?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:main_login_tong.php");
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

     <div class="dropdown show" style="margin-right: 40px;">
        <a class="btn btn-secondary dropdown-toggle"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Pannel </a>
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

  </body>
</html>
