<?php
include("ayar.php");
$email = $_SESSION["email"];




?>
<html>
<head>
<style>
a{

	text-decoration:none;
	color:red;
}
.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } 
.datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #006699; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; color:#FFFFFF; font-size: 20px; font-weight: bold; border-left: 1px solid #0070A8; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #00557F; border-left: 1px solid #E1EEF4;font-size: 16px;font-weight: normal;border-bottom: 1px solid; }.datagrid table tbody .alt td { background: #E1EEf4; color: #00557F; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #006699;background: #E1EEf4;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }.datagrid table tfoot  li { display: inline; }.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #FFFFFF;border: 1px solid #006699;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #00557F; color: #FFFFFF; background: none; background-color:#006699;}div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; }
</style>
</head>
<body>
<div class="datagrid"><table>

<?php


$cek23 = mysql_query("select * from bildirimler2 WHERE email = '$email' or email = 'all' order by id DESC limit 10");	
	
	$sayac = 0;
	$cokguzelsayac = 0;
	while($gonderiq= mysql_fetch_array($cek23))    
	{
		$cokguzelsayac += 1;
		$gelensayac = $gonderiq["sayac"];
		$sayac = $sayac + 1;
		$mesaj = $gonderiq["veritipi"];
		$konuid = $gonderiq["konuid"];
		
		if($mesaj == "1")
		{
			$mesaj = "<img src='img/ikon/comments.png' style='float:left;width: 25px;margin-top: 9px;'>&nbsp;&nbsp; <p style='float:left;margin-left:10px;margin-top: 14px;'><a href='konu.php?id=$konuid&alan=mezdeke'>Açmış Olduğun Konuya</a>&nbsp; Yorum yapıldı.</p>";
			
		}
		else if($mesaj == "2")
		{
			$mesaj = "<img src='img/ikon/point.png' style='float:left;width: 25px;margin-top: 9px;'>&nbsp;&nbsp; <p style='float:left;margin-left:10px;margin-top: 14px;'><a href='#'>Yayın Paylaşım</a>&nbsp; Puanında Tıklama : +5 Puan</p>";
			
		}
		else if($mesaj == "3")
		{
			$mesaj = "<img src='img/ikon/point.png' style='float:left;width: 25px;margin-top: 9px;'>&nbsp;&nbsp; <p style='float:left;margin-left:10px;margin-top: 14px;'>".$konuid."</p>";
			
		}
		else if($mesaj == "4")
		{
			$mesaj = "<img src='img/ikon/like.png' style='float:left;width: 25px;margin-top: 9px;'>&nbsp;&nbsp; <p style='float:left;margin-left:10px;margin-top: 14px;'><a href='konu.php?id=$konuid&alan=mezdeke'>Açmış Olduğun Konu</a>&nbsp; Yeni Beğeni Aldı : +1 Puan</p>";
			
		}
		else if($mesaj == "5")
		{
			$mesaj = "<img src='img/ikon/caps.png' style='float:left;width: 25px;margin-top: 9px;'>&nbsp;&nbsp; <p style='float:left;margin-left:10px;margin-top: 14px;'><a href='#'>Paylaştığın Caps</a>&nbsp; Yeni Beğeni Aldı : +1 Puan</p>";
			
		}
		
		if($gelensayac == "1")
		{
			echo '<tr><td>'.$mesaj.'</td></tr>';
			
		}
		else
		{
			echo '<tr class="alt"><td>'.$mesaj.'</td></tr>';
			
		}
		
		
	}
	
	
	if($cokguzelsayac == "0")
	{
		
			echo "<tr><td><img src='img/ikon/smile.png' style='float:left;width: 25px;margin-top: 9px;'>&nbsp;&nbsp; <p style='float:left;margin-left:10px;margin-top: 14px;'>Çok Temizsin Bakıyorum, Hiç Bildirimin Yok</p></td></tr>";
			
		
	}
	
	

?>


</tbody>
</table></div>
</body>
</html>
<?php mysql_query("UPDATE bildirimler2 SET sayac = '1' WHERE email='$email' "); ?>
