<?php 
 @session_start();include("ayar.php"); 
if(!isset($_SESSION["email"]))
{@header("Location: index.php"); }
else
{

$email = $_SESSION["email"];
		$linkcik=$_GET["adi"]; // Adres satirindan dosya yolunu aliyoruz ve degisekene atiyoruz.
// Bi kisimdan dosyamizi cekecek fonksiyona giris yapiyoruz.
function dosya_indir($link,$name=null)
{
$link_info = pathinfo($link); //Yol bilgilerini deðiþkene atýyoruz.
$uzanti = strtolower($link_info['extension']); //Dosyanýn uzantýsýný deðiþkene atýyoruz.
$file = ($name) ? $name.'.'.$uzanti : $link_info['basename'];
$yolcuk = "capsler/".$file; // Dosya/ buradan cektigimiz dosyanin kaydedilecegi yeri seciyoruz, sonunda / isareti olmak zorunda ve klasorun yazma izni (777) olmali.
$curl = curl_init($link);
$fopen = fopen($yolcuk,'w');
curl_setopt($curl, CURLOPT_HEADER,0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl, CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_0);
curl_setopt($curl, CURLOPT_FILE, $fopen);
curl_exec($curl);
curl_close($curl);
fclose($fopen);
$email = $_SESSION["email"];
$tarihcekbugun =  date('d.m.Y H:i:s');


$tarihsirala = date('Ymd');



mysql_query("INSERT INTO `mezdeke_gonderi`(`id`, `email`, `icerik`, `resim`, `begeni`, `yorum`,`sabit`,`tarih`,`tarihler`,gosterim) VALUES ('','$email','','$yolcuk','0','0','0','$tarihcekbugun','$tarihsirala','0')");

}
//cekme islemi bitti sira diger kisimalarda.
$rasgele_sayi = rand(1,10000000); // Rastgele sayi olusturup, degiskene atiyoruz.
dosya_indir($linkcik,$rasgele_sayi); // ilk satirda get metodu ile aldigimiz linki degiskene atamistik, burada url adresini ve bir onceki sayirda random sayimizi ekliyoruz, inecek dosyayi ve ismini belirliyoruz.
// islem tamamlandi dosyalar cekildi, simdide cekilen dosyayi ve yeni ismini ekrana yazdiralim..

$emailsss = $_SESSION["email"];

      $sorgu6x = "SELECT * FROM uyeler2 WHERE email='".$emailsss."'";
$admin_sorgu6x = mysql_query($sorgu6x, $mysqlbaglantisi) or die(mysql_error());
$uyeler6x = mysql_fetch_array($admin_sorgu6x);
$sonbegeni2x = $uyeler6x['paylaspuan'];
$sonbegeni2x = $sonbegeni2x + 5;
mysql_query("UPDATE `uyeler2` SET `paylaspuan`='".$sonbegeni2x."' WHERE `email`='".$emailsss."'");



$capssil2 = $_GET["adi"];


/*@header("Location: ");
echo '<form action="capsler.php"><button class="sayfabutonu" style="
border-radius: 7px;
background: #b6ee65;
text-decoration: center;
border: none;
color: #51771a;
margin-top: 5px;
padding-top: 9px;
padding-bottom: 9px;
outline: none;
font-size: 13px;
border-bottom: 3px solid #307d63;
cursor: pointer;
width:100%;
height:80px;
">Yükeleme Başarılı > Devam</button></form>';

*/
}
?>
<html>
<script>
window.top.location.href = "http://cuemk.com/capsyap/capssil.php?id=<?php echo $capssil2 ?>"; 
</script>
</html>
