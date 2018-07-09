<?php
mysql_connect('localhost','root','');
mysql_select_db('mms');
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<?php
if (isset($_POST['submit']))
    {
    $nv_query = mysql_query("SELECT * FROM nhanvien WHERE msnv = '$_POST[manv_nhap]' ");
    if (mysql_num_rows($nv_query)>0)
        {
            $ttnv = mysql_fetch_array($nv_query);
            $tennv = $ttnv['hoten'];
            $manv = $ttnv['msnv'];
            $tb =mysql_query("SELECT mskhungtu,giaidoan.tengd,date_start,date_finish,tamdung,tieptuc FROM qtsx INNER JOIN giaidoan ON qtsx.msgd = giaidoan.msgd WHERE msnv = $manv and (date_finish between '$_POST[start]' and '$_POST[end]') ");
        }
    else
        {
            $tennv = "";
            $manv = "";
            echo '<script>alert("KHÔNG TÌM THẤY NHÂN VIÊN")</script>';
        }

    }
else
    { 
        $tennv = "";
        $manv = "";
        $tb = 0;
    }
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<title>EMPLOYEE'S TASK HISTORY</title>
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
#nv{
    font-size: 17px;
    font-weight: bold;
}
    </style>
	<script type="text/javascript">
        function In_Content(strid)
        {   
            var prtContent = document.getElementById(strid);
            var WinPrint = window.open('','','resizable=1,letf=0,top=0,width=1000,height=1000');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
        }
        function trochuot()
        {
            document.getElementById("manv_nhap").focus();
        }
	</script>
</head>
<body>    
    <form method="post" action="" id="txnv" autocomplete="off">
    	<div>
    		<h1 id="ten" style="text-align: center;">MONITOR TASK HISTORY</h1>
    	</div>
    <table>
        <head>
        <tr>
            <th>
            <div>
                <div><label for="start">START DAY</label></div>
                <div><input type="date" name="start" class="form-control"></input></div>
            </div>
            </th>
            <th>
            <div>
                <div><label for="end">END DAY</label></div>
                <div><input type="date" name="end" onmouseup="trochuot()" class="form-control"></input></div>
            </div>
            </th>
            <th>
            <div>
                <div><label for = "manv_nhap">EMPLOYEE ID</label></div>
                <div><input type="text"  name="manv_nhap" id="manv_nhap" size="10" required class="form-control"></div>
            </div>
            </th>
        </tr>
        </head>
    </table>
        <div><input type="submit" name="submit" value="SUBMIT" class="btn btn-primary"></div>
        <fieldset>
        <article class="content" id="print">
        <h2 id="ten_bang" style="text-align: center;">TASK HISTORY TABLE</h2>
    	<div>
    		<p id="nv">NAME: <?php echo $tennv; ?></p>
        </div>
        <p></p>
        <div>
            <p id="nv">EMPLOYEE ID: <?php echo $manv; ?></p>
    	</div>
        <p></p>
        <div>
            <table class="table table-stripedauto" border="1">
            <thead>
              <tr>
                <td width="200" bgcolor="#999999"><strong>COLUMN ID</strong></td>
                <td width="200" bgcolor="#999999"><strong>TASK NAME</strong></td>
                <td width="200" bgcolor="#999999"><strong>START TIME</strong></td>
                <td width="200" bgcolor="#999999"><strong>FINISH TIME</strong></td>
                <td width="200" bgcolor="#999999"><strong>PAUSE TIME</strong></td>
                <td width="200" bgcolor="#999999"><strong>RESUME TIME</strong></td>
                <td width="200" bgcolor="#999999"><strong>WORKING TIME(h)</strong></td>
              </tr>
            </thead>
            <tbody>
              <?php
                if ($tb!=0)
                {
                	$so_luong_khung = mysql_num_rows($tb);
                	$total_workingtime =0;
                    while ($row = mysql_fetch_array($tb)) 
                    { 
                        $start = strtotime("$row[2]");
                        $finish = strtotime("$row[3]");
                        $pause = strtotime("$row[4]");
                        $resume = strtotime("$row[5]");
                        $workingtime =(($finish-$start)-($resume-$pause));
                        $total_workingtime+=$workingtime;
                    ?>
                      <tr>
                        <td>&nbsp;<?php echo $row[0];?></td>
                        <td>&nbsp;<?php echo $row[1];?></td>
                        <td>&nbsp;<?php echo $row[2];?></td>
                        <td>&nbsp;<?php echo $row[3];?></td>
                        <td>&nbsp;<?php echo $row[4];?></td>
                        <td>&nbsp;<?php echo $row[5];?></td>
                        <td>&nbsp;<?php echo $workingtime/3600;?></td>
                      </tr>
              <?php
                    }
                }
              ?>
              </tbody>
            </table>
            <?php if ($tb!=0) { ?>
            <h4>Total Number Of Column: <?php echo $so_luong_khung; ?></h4>
            <h4>Total Working Time : <?php echo $total_workingtime/3600; ?></h4>
            <h4>Productivity: <?php echo $total_workingtime/3600/$so_luong_khung;echo "(h/task)"?></h4>
            <?php } ?>
        </div>
        </article>
        </fieldset>
        <div>
            <input type="button" name="in" onclick="In_Content('print')" value="PRINT" style="margin-top: 30px" class="btn btn-primary">
        </div>      		
	</form>
</body>
</html>