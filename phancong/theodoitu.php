<?php
mysql_connect('localhost','root','') or die("<script>alert('KHÔNG THỂ KẾT NỐI DATABASE VUI LÒNG THỬ LẠI SAU')</script>");
mysql_select_db('mms');
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>MONITOR PANEL</title>
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
form input{
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
              <li class="active"><a href="theodoitu.php">MONITOR PANEL AND COLUMN</a></li>
              <li><a href="phancongcongviec.php" target="_blank">ASSIGNMENT PAGE</a></li>
            </ul>
          </div>
    </nav>
<!-- 
	***********************
	***********************
	THEO DÕI TỦ
	***********************
	***********************
-->
    <form method="post" action="" id="theodoitu" autocomplete="off">
    	<div>
            <h1 id="ten">MONITOR PANEL</h1>
        </div>
        <div>
            <div style="width: 20%; float:left;font-weight: bold;font-size: 20px;"><input type="text" class="form-control" value="PANEL ID:" readonly ></input></div>
            <div style="width: 40%; float:left;font-weight: bold;font-size: 20px;"><input type="text"  name="nhap_mstu" id="nhap_mstu" size="30"  value="" class="form-control" required></input></div>
            <div style="width: 20%; float:left;"><input type = "submit" name="dongy" value= "SUBMIT" id="dongy" class="btn btn-primary"></input></div>
            <?php
            	if (isset($_POST['dongy']))
            	{	
            ?>
            		<table class="table table-stripedauto">
                            <thead>
                            <tr>
                                <th width="200" bgcolor="#999999"><strong>PANEL ID </strong></th>
                                <th width="200" bgcolor="#999999"><strong>COLUMN ID </strong></th>
                                <th width="200" bgcolor="#999999"><strong>STATE</strong></th>
                            </tr>
                            </thead>
                            <tbody>
            <?php
            		$khungtu = mysql_query("SELECT * FROM khungtu WHERE mstu = '$_POST[nhap_mstu]'");
            		if ($khungtu!=0)
            			while ($row_khungtu = mysql_fetch_array($khungtu)) 
            			{
            				$qtsx=mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$row_khungtu[0]'");
            				if(mysql_num_rows($qtsx)==7)
            					{
            						$dem =0;
            						while ($row_qtsx=mysql_fetch_array($qtsx))
            						{
            							if ($row_qtsx[4]!="") $dem+=1; 
            						}
            						if ($dem == 7) {$trangthai="COMPLETE";$color ="#99CCCC";}//số giai đoạn bằng 7
            						else {$trangthai="IN PROGRESS";$color ="#FFFF99";}		
            					}
            				else
            				    {
            				  	    $flag = array(0,0,0,0,0,0,0,0);//$flag[i] là trạng thái được phân công hay chưa của giai đoạn i
            				  	    while ($row_qtsx=mysql_fetch_array($qtsx))
            				  	    {
            				  	    	for ($j=1; $j <8 ; $j++) 
            				  	    	{ 
            				  	    		if ($row_qtsx[2]==$j) $flag[$j] = 1;
            				  	    	}
            				  	    }
            				  	    $trangthai = "NOT ASSIGN:";
            				  	    for ($j=1; $j <8 ; $j++) 
            				  	    { 
            				  	    	if ($flag[$j] == 0) $trangthai = "$trangthai $j,";
            				  	    }
            				  	    $color ="white";
            				    }
            ?>
            				<tr>
            				<td  bgcolor="<?php echo $color ?>">&nbsp;<?php echo $_POST['nhap_mstu'];?></td>
                            <td  bgcolor="<?php echo $color ?>">&nbsp;<?php echo "$row_khungtu[0]";?></td>
                            <td  bgcolor="<?php echo $color ?>">&nbsp;<?php echo "$trangthai";?></td>
            				</tr>
            <?php					
            			}

            	}
            ?>
            				</tbody>
            		</table>
        </div>
        <div>
    		<iframe src="theodoikhungtu.php" width="100%" height="500px"></iframe>
        </div>
    </form>
</body>
</html>