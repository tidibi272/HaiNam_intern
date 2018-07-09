<?php
mysql_connect('localhost','root','') or die("<script>alert('KHÔNG THỂ KẾT NỐI DATABASE VUI LÒNG THỬ LẠI SAU')</script>");
mysql_select_db('mms');
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>MONITOR PROJECT</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css">
form {
    font-family: helvetica;
    margin-left: 20px;
    margin-right: 20px;
    margin-top: 20px
}
form div{
   margin-bottom: 25px ;
}
h1#ten{
  text-align: left;
  font-weight: bold;
}

form table{font-weight:bold;font-size: 17px}
form input#dongy{
    font-weight: bold;

}
.fakeimg1 {
      height: 85px;
      background: lightblue;
      color:black;
      padding: 10px;
      font-weight: bold;
      margin-top: 1px;
 }
body{
            background-image: url(../quanlytong/background.jpg);
            background-size: auto;
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
              <li class="active"><a href="theodoiduan.php">MONITOR PROJECT</a></li>
              <li><a href="theodoitu.php" target="_blank">MONITOR PANEL AND COLUMN</a></li>
              <li><a href="phancongcongviec.php" target="_blank">ASSIGNMENT PAGE</a></li>
            </ul>
          </div>
    </nav> 
<!-- 
	***********************
	***********************
	THEO DÕI DỰ ÁN
	***********************
	***********************
-->
    <form method="post" action="" id="theodoiduan" autocomplete="off">
    	<div>
            <h1 id="ten">MONITOR PROJECT</h1>
        </div>
        <div style="width: 100%; float:left;">
            <div style="width: 20%; float:left;float:left;font-weight: bold;font-size: 20px;"><input type="text" class="form-control" value="PROJECT ID:" readonly ></input></div>
            <div style="width: 40%; float:left;"><input type="text"  name="nhap_msduan" id="nhap_msduan" size="30"  value="" class="form-control" required></input></div>
            <div style="width: 20%; float:left;"><input type = "submit" name="dongy" value= "SUBMIT" id="dongy" class="btn btn-primary"></input></div>
            <?php
            	if (isset($_POST['dongy']))
            	{	

            ?>      
                    <div style="width: 100%; float:left;">
                        <div style="width: 20%; float:left;font-weight: bold;font-size: 20px;"><input type="text" class="form-control" value="PROJECT ID:" readonly ></input></div>
                        <div style="width: 40%; float:left;font-weight: bold;font-size: 20px;"><input type="text"  name="msduan" id="msduan" value="<?php echo $_POST['nhap_msduan'] ?>" class="form-control" readonly></input></div>
                    </div>
            		<table class="table table-stripedauto">
                            <thead>
                            <tr>
                                <th width="auto" bgcolor="#999999"><strong>PANEL ID</strong></th>
                                <th width="auto" bgcolor="#999999"><strong>STATE</strong></th>
                            </tr>
                            </thead>
                            <tbody>
            <?php
                            $tu = mysql_query("SELECT * FROM tu WHERE msduan = '$_POST[nhap_msduan]'");
                            if($tu!=0)
                            {
                                $tu_num_row = mysql_num_rows($tu);
                                $tu_num_row_complete = 0;
                                while ($tu_row = mysql_fetch_array($tu))
                                {
                                    $khungtu = mysql_query("SELECT * FROM khungtu WHERE mstu = '$tu_row[0]'");
                                    $khungtu_num_row = mysql_num_rows($khungtu);
                                    $dem_khungtu =0;
                                    while ($khungtu_row=mysql_fetch_array($khungtu)) 
                                        {   
                                            $qtsx = mysql_query("SELECT * FROM qtsx WHERE mskhungtu = $khungtu_row[0]");
                                            $dem_qtsx =0;
                                            while ($qtsx_row = mysql_fetch_array($qtsx)) 
                                            {
                                                if ($qtsx_row[4]!="") $dem_qtsx+=1;
                                            }
                                            if ($dem_qtsx == 7) $dem_khungtu+=1;//số giai đoạn bằng 7
                                        }

                                    if ($dem_khungtu == $khungtu_num_row) {$trangthai = "COMLETE";$color ="#99CCCC";$tu_num_row_complete+=1;}
                                    else {$trangthai = "IN PROGRESS";$color ="#FFFF99";};
            ?>
                            

                                    <tr>
                                    <td  bgcolor="<?php echo $color ?>">&nbsp;<?php echo $tu_row[0];?></td>
                                    <td  bgcolor="<?php echo $color ?>">&nbsp;<?php echo "$trangthai";?></td>
                                    </tr>
            <?php 
                                }
                            }
                }
            ?>
            				</tbody>
            		</table>
                    <?php if (isset($_POST['dongy'])) { ?>
                        <h4><strong>TOTAL NUMBER OF PANEL: <?php echo $tu_num_row; ?></strong></h4>
                        <h4><strong>TOTAL NUMBER OF COMPLETE PANEL: <?php echo $tu_num_row_complete ?> </strong></h4>
                    <?php } ?>
        </div>
    </form>
</body>
</html>