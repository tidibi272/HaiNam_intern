<!--KIỂM TRA ĐĂNG NHẬP TỪ QUẢN LÝ-->
<?php
session_start();
if(!(isset($_SESSION['myusername']))){
header("location:main_login.php");
}
?>
<?php

mysql_connect('localhost','root','') or die("<script>alert('KHÔNG THỂ KẾT NỐI DATABASE VUI LÒNG THỬ LẠI SAU')</script>");
mysql_select_db('mms');
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>

<?php
function start($mstu,$msgd)
{
	$dk=mysql_fetch_array(mysql_query("SELECT * FROM qtsx WHERE mskhungtu ='$mstu' AND msgd ='$msgd'"));
	if ($dk['date_start'] =="")
		{
			$dt = date('Y-m-d H:i:s');
			mysql_query("UPDATE qtsx SET date_start = '$dt' WHERE mskhungtu = '$mstu' AND msgd = '$msgd'");
			echo '<script>alert("XÁC NHẬN BẮT ĐẦU THÀNH CÔNG")</script>';
		}
	else 
		{
			echo '<script>alert("LỖI:CÔNG VIỆC ĐÃ BẮT ĐẦU, HÃY KIỂM TRA  VÀ THỰC HIỆN LẠI THAO TÁC")</script>';
		}
}
function finish($mstu,$msgd)
{
	$dk=mysql_fetch_array(mysql_query("SELECT * FROM qtsx WHERE mskhungtu ='$mstu' AND msgd ='$msgd'"));
	if ($dk['date_start'] !="")
		{
			$dt = date('Y-m-d H:i:s');
			mysql_query("UPDATE qtsx SET date_finish = '$dt' WHERE mskhungtu = '$mstu' AND msgd = '$msgd'");
			echo '<script>alert("XÁC NHẬN KẾT THÚC THÀNH CÔNG")</script>';
		}
	else 
		{
			echo '<script>alert("LỖI: CÔNG VIỆC CHƯA BẮT ĐẦU NÊN KHÔNG THỂ KẾT THÚC, HÃY THỬ LẠI")</script>';
		}
}
function error_start(){echo '<script>alert("VUI LÒNG NHẬP MÃ VÀ CHỌN CÔNG VIỆC")</script>';}
function un_start() {}
function error_finish() {echo '<script>alert("VUI LÒNG NHẬP MÃ VÀ CHỌN CÔNG VIỆC")</script>';}

if (isset($_POST['xacnhan']))
	{
		$nv =  mysql_query("SELECT * FROM nhanvien WHERE msnv = '$_POST[nhap_msnv]'");
		$ttnv = mysql_fetch_array($nv);
	}
if (isset($_POST['start'])) 
	{ 
		if($_POST['msnv']!="")
		{
			$i = 1;
			while (1) 
			{
				$istring = (string)$i;
				$mstu = "mstu$istring";
				$msgd = "msgd$istring";
				$chon = "chon$istring";
				if (isset($_POST['chon']))
				{
						if ($_POST['chon']=="$chon") 
							{
								start($_POST["$mstu"],$_POST["$msgd"]);
								break;
							}
						else $i+=1;
				}
				else {error_start();break;} 
			}
		}
		else error_start();
	}
if (isset($_POST['finish'])) 
	{ 
		if($_POST['msnv']!="")
		{
			$i = 1;
			while (1) 
				{
					$istring = (string)$i;
					$mstu = "mstu$istring";
					$msgd = "msgd$istring";
					$chon = "chon$istring";
					if (isset($_POST['chon']))
					{
						if ($_POST['chon']=="$chon") 
							{
								finish($_POST["$mstu"],$_POST["$msgd"]);
								break;
							}
						else $i+=1;
					}
					else {error_finish();break;}
				}
				
		}
		else error_finish();
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INSTALLATION PAGE</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript">
		function clear()
		{
			document.getElementById("qtsx").reset();
		}
	</script>
	<style type="text/css">
body {
    font-family: helvetica;
    margin-left: 20px;
    margin-right: 20px;
    margin-top: 20px
}
form div{
   margin-bottom: 25px ;
}
label {  
    font-weight: bold;
    line-height: 23px;
    float: left;
    font-size: 20px;  
}
fieldset {
	border:  1px solid #999;
	border-radius: 8px;
	box-shadow: 0 0 10px #999;
}
h1{
  text-align: center;
  font-weight: bold;
  font-size: 40px;
  background: lightblue;
}
h2{
  text-align: left;
  font-weight: bold;
  font-size: 30px;
  height: 30px;
  padding: 10px;
}

form table{font-weight:bold;font-size: 17px}
form input#start{
	font-size:30px;
	font-weight: bold;
	float:left;

}

form input#finish{
	font-size:30px;
	font-weight: bold;
	float: right;

}
legend {
	font-size: 22px;
	font-weight: bold;
}
form input#msnv{
	font-weight: bold;
	font-size:20px ;
}

form input#hoten{
	font-weight: bold;
	font-size:20px ;
}
	</style>
</head>
<body>    
    <form method="post" action="" id="qtsx" autocomplete="off">
    	<div>
    		<h1 id="ten">INSTALLATION</h1>
    	</div>
    	<div>
			<div style="width: 20%; float:left;"><input type="text" class="form-control" name="nhap_msnv" id="nhap_msnv" autofocus placeholder="EMPLOYEE ID" required></div>
			<div style="width: 20%; float:left;"><input type="text" class="form-control" name="nhap_mskhungtu" id="nhap_mskhungtu" autofocus placeholder="COLUMN ID" required></div>
			<input type="submit" name="xacnhan" id="xacnhan" value="SUBMIT" class="btn btn-primary">
			<input type="button" name="xoa" id="xoa" value="CLEAR" class="btn btn-primary" onclick="document.getElementById('qtsx').reset();document.getElementById('nhap_msnv').focus();">
    	</div>
    	<div>
    	<fieldset>
	    	<h2>EMPLOYEE INFORMATION</h2>
	    	<br>
	    		<div>
	    			<div style="width: 20%; float:left;"><input type="text" class="form-control" value="EMPLOYEE ID:" id="msnv" readonly></input></div>
					<div style="width: 80%; float:left;"><input type="text" class="form-control"  name="msnv" id="msnv" readonly value="<?php if (isset($_POST['xacnhan'])) echo $ttnv['msnv'];?>"></input></div>
				</div>
				<div>
	    			<div style="width: 20%; float:left;"><input type="text" class="form-control" value="NAME:" id="hoten" readonly></input></div>
					<div style="width: 80%; float:left;"><input type="text" class="form-control"  name="hoten" id="hoten" readonly value="<?php if (isset($_POST['xacnhan'])) echo $ttnv['hoten']?>"></input></div>
				</div>
				<br>
    	</fieldset>
    	</div>
    	<div>
	    	<fieldset>
	    		<h2>ASSIGNED TASK</h2>
	    		<br>
				<?php
				if (isset($_POST['xacnhan']))
					{
						$tb =mysql_query("SELECT qtsx.msgd,giaidoan.tengd,mskhungtu,date_start,date_finish FROM qtsx INNER JOIN giaidoan WHERE qtsx.msgd=giaidoan.msgd AND msnv = '$_POST[nhap_msnv]' AND mskhungtu='$_POST[nhap_mskhungtu]'"); 
						
				?>
						<table class="table table-stripedauto">
							<thead>
							<tr>
				                <th width="auto"><input style="font-weight: bold;font-size: 17px;background-color: #00FFFF;" type="text" class="form-control" name="" value="TASK ID" readonly size ="5"></input></th>
				                <th width="auto"><input style="font-weight: bold;font-size: 17px;background-color: #00FFFF;" type="text" class="form-control" name="" value="TASK NAME" readonly size ="auto"></th>
				                <th width="auto"><input style="font-weight: bold;font-size: 17px;background-color: #00FFFF;" type="text" class="form-control" name="" value="COLUMN ID" readonly size ="auto"></th>
				                <th width="auto"><input style="font-weight: bold;font-size: 17px;background-color: #00FFFF;" type="text" class="form-control" name="" value="START TIME" readonly size ="auto"></th>
				                <th width="auto"><input style="font-weight: bold;font-size: 17px;background-color: #00FFFF;" type="text" class="form-control" name="" value="FINISH TIME" readonly size ="auto"></th>
				                <th width="auto"><input style="font-weight: bold;font-size: 17px;background-color: #00FFFF;" type="text" class="form-control" name="" value="SELECT" readonly size ="5"></th>
			              	</tr>
			              	</thead>
			              	<tbody>
			              	<?php
			              	if ($tb!=0)
               				 {
               				 	$i=1;
                   				 while ($row = mysql_fetch_array($tb)) 
                   				 {	
                   				 	if ($row[4]=="")
                   				 	{
                   				 		$istring = (string)$i;
                   				 		$mstu ="mstu$istring";$msgd="msgd$istring";$chon="chon$istring";

			              	?>
				              	<tr>
		                        
		                        <td><input style="font-weight: bold;font-size: 17px" type="text" class="form-control" name="<?php echo ($msgd);?>" value="<?php echo $row[0];?>" readonly size ="5"></input></td>
		                        <td><input style="font-weight: bold;font-size: 17px" type="text" class="form-control" name="" value="<?php echo $row[1];?>" readonly size ="auto"></input></td>
		                        <td><input style="font-weight: bold;font-size: 17px" type="text" class="form-control" name="<?php echo ($mstu);?>" value="<?php echo $row[2];?>" readonly size ="auto"></input></td>
		                        <td><input style="font-weight: bold;font-size: 17px" type="text" class="form-control" name="" value="<?php echo $row[3];?>" readonly size ="auto"></input></td>
		                        <td><input style="font-weight: bold;font-size: 17px" type="text" class="form-control" name="" value="<?php echo $row[4];?>" readonly size ="auto"></input></td>
		                        <td><input style="margin-left: 50%" type="radio" size ="auto" name="chon" value = "<?php echo($chon); ?>"></input></td>
		                      	</tr>
				            <?php
				                	$i=$i+1;
				                	} 
				                 }
				            ?>
				            </tbody>     
				            <?php 
				             if (mysql_num_rows($tb)==0) echo '<script>alert("TASK IS NOT EXIST")</script>';
				             }     
				            ?>
			            </table>       
				<?php 
					}
				?>
				<br>
			</fieldset>
			<br>
			<div>
				<div style="width: 50%; float:left;"><input type="submit" name="start" id= "start" value="START" class="btn btn-primary"></div>
				<div style="width: 50%; float:right;"><input type="submit" name="finish" id="finish" value="FINISH" class="btn btn-primary"></div>
			</div>
	</form>
	<h3 style="text-align: center;"><a href="logout.php"><strong>LOG OUT</strong></a></h3>
</body>
</html>

