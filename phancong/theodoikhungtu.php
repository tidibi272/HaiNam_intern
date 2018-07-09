<?php
mysql_connect('localhost','root','') or die("<script>alert('KHÔNG THỂ KẾT NỐI DATABASE VUI LÒNG THỬ LẠI SAU')</script>");
mysql_select_db('mms');
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>MONITOR COLUMN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
h1#ten{
  text-align: left;
  font-weight: bold;
}

form table{font-weight:bold;font-size: 17px}
form input#dongy{
    font-weight: bold;

}
body{
            background-image: url(../quanlytong/background.jpg);
              }
    </style>
</head>
<body>
	<!-- 
	***********************
	***********************
	THEO DÕI TỦ
	***********************
	***********************
-->
    <form method="post" action="" id="quanlyduan.css" autocomplete="off">
    	<div>
            <h1 id="ten">MONITOR COLUMN</h1>
        </div>
        <div>
            <div style="width: 20%; float:left;font-weight: bold;font-size: 20px;"><input type="text" class="form-control" value="COLUMN ID:" readonly ></input></div>
            <div style="width: 40%; float:left;font-weight: bold;font-size: 20px;"><input type="text"  name="nhap_mstu" id="nhap_mstu" size="30"  value="" class="form-control" required></input></div>
            <div style="width: 20%; float:left;"><input type = "submit" name="dongy" value= "SUBMIT" id="dongy" class="btn btn-primary"></input></div>            
        </div>
        <br>
                <?php
                if (isset($_POST['dongy']))
                    {
                        $tb = mysql_query("SELECT mskhungtu,msnv,giaidoan.tengd,date_start,date_finish FROM qtsx INNER JOIN giaidoan WHERE qtsx.msgd=giaidoan.msgd AND mskhungtu = '$_POST[nhap_mstu]'"); 
                        
                ?>
                        <table class="table table-stripedauto">
                            <thead>
                            <tr>
                                <th width="200" bgcolor="#999999"><strong>COLUMN ID </strong></th>
                                <th width="200" bgcolor="#999999"><strong>EMPLOYEE ID </strong></th>
                                <th width="200" bgcolor="#999999"><strong>TASK NAME</strong></th>
                                <th width="200" bgcolor="#999999"><strong>START TIME </strong></th>
                                <th width="200" bgcolor="#999999"><strong>FINISH TIME </strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($tb!=0)
                             {
                                 while ($row = mysql_fetch_array($tb)) 
                                 {  

                            ?>
                                <tr>
                                <td bgcolor="<?php if (($row[4]!="")and ($row[3]!="")) echo "#99CCCC";elseif (($row[4]=="")and ($row[3]!="")) echo "#FFFF99"; else echo "white" ?>">&nbsp;<?php echo $row[0];?></td>
                                <td bgcolor="<?php if (($row[4]!="")and ($row[3]!="")) echo "#99CCCC";elseif (($row[4]=="")and ($row[3]!="")) echo "#FFFF99"; else echo "white" ?>">&nbsp;<?php echo $row[1];?></td>
                                <td bgcolor="<?php if (($row[4]!="")and ($row[3]!="")) echo "#99CCCC";elseif (($row[4]=="")and ($row[3]!="")) echo "#FFFF99"; else echo "white" ?>">&nbsp;<?php echo $row[2];?></td>
                                <td bgcolor="<?php if (($row[4]!="")and ($row[3]!="")) echo "#99CCCC";elseif (($row[4]=="")and ($row[3]!="")) echo "#FFFF99"; else echo "white" ?>">&nbsp;<?php echo $row[3];?></td>
                                <td bgcolor="<?php if (($row[4]!="")and ($row[3]!="")) echo "#99CCCC";elseif (($row[4]=="")and ($row[3]!="")) echo "#FFFF99"; else echo "white" ?>">&nbsp;<?php echo $row[4];?></td>
                                </tr>
                                
                            <?php
                                 }
                            ?>
                            </tbody>     
                            <?php 
                             }     
                            ?>
                        </table>       
                <?php 
                    }
                ?>
    </form>
</body>
</html>