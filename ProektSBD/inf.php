<?
/* Переменные для соединения с базой данных */ 
$hostname="localhost"; 
$username="root"; 
$password=""; 
$dbName="kosm_ob_ty";
$userstable=""; $neb="";
$a=$_POST['kosm'];
switch($a){
case '1':
$userstable="sputniki"; $neb="спутников";
break;
case '2':
$userstable="planety"; $neb="планет";
break;
case '3':
$userstable="zvyozdy"; $neb="звёзд";
break;
case '4':
$userstable="galaktiki"; $neb="галактик";
break;
}
$st=$_POST['ra'];
$u=""; $v=""; $sch=0;
while(($sch<strlen($st))&&($st{$sch}>='0')&&($st{$sch}<='9')){
$u.=$st{$sch}; $sch=$sch+1;
}
$sch=$sch+2;
while($sch<strlen($st)&&($st{$sch}>='0')&&($st{$sch}<='9')){
$v.=$st{$sch}; $sch=$sch+1;
}

$un=$_POST['ed']; $edin=-1;
switch($un){
case 'pk':
$edin=0;
break;
case 'ly':
$edin=1;
break;
case 'au':
$edin=2;
break;
case 'mlnkm':
$edin=3;
break;
case 'km':
$edin=4;
break;
}
if(($u!="")&&($v!="")){
//$u=(int)$u; $v=(int)$v;
$u=(float)$u; $v=(float)$v;
if($edin==0){
if($usertable=="sputniki"){$u=$u*30856775814914; $v=$v*30856775814914;}
if($usertable=="planety"){$u=$u*30856775.814914; $v=$v*30856775.814914;}
if(($usertable=="zvyozdy")||($usertable=="galaktiki")){$u=$u*3.2616; $v=$v*3.2616;}
}
if($edin==1){
if($usertable=="sputniki"){$u=$u*9460730472580.8; $v=$v*9460730472580.8;}
if($usertable=="planety"){$u=$u*9460730.4725808; $v=$v*9460730.4725808;}
if(($usertable=="zvyozdy")||($usertable=="galaktiki")){$u=$u; $v=$v;}
}
if($edin==2){
if($usertable=="sputniki"){$u=$u*149597870.7; $v=$v*149597870.7;}
if($usertable=="planety"){$u=$u*149.5978707; $v=$v*149.5978707;}
if(($usertable=="zvyozdy")||($usertable=="galaktiki")){$u=$u/63241.077; $v=$v/63241.077;}
}
if($edin==3){
if($usertable=="sputniki"){$u=$u*1000000; $v=$v*1000000;}
if($usertable=="planety"){$u=$u; $v=$v;}
if(($usertable=="zvyozdy")||($usertable=="galaktiki")){$u=$u/9460730.4725808; $v=$v/9460730.4725808;}
}
if($edin==4){
if($usertable=="sputniki"){$u=$u; $v=$v;}
if($usertable=="planety"){$u=$u/1000000; $v=$v/1000000;}
if(($usertable=="zvyozdy")||($usertable=="galaktiki")){$u=$u/9460730472580.8; $v=$v/9460730472580.8;}
}
//echo " $u $v <br/>";
} /*else{
echo " Неверный диапазон.";
}*/
$ti=$_POST['tip']; $ty='';
switch($ti){
case 'spper':
$ty='Спиральная галактика с перемычкой';
break;
case 'sp':
$ty='Спиральная галактика';
break;
case 'zhk':
$ty='Жёлтый карлик';
break;
case 'kk':
$ty='Красный карлик';
break;
case 'pz':
$ty='Планета земной группы';
break;
case 'lg':
$ty='Ледяной гигант';
break;
case 'gg':
$ty='Газовый гигант';
break;
case 'kam':
$ty='Каменистый';
break;
}
$t_=$_POST['te']; $ed_tem=-1;
switch($t_){
case 'K':
$ed_tem=0;
break;
case 'C':
$ed_tem=1;
break;
}
//echo "$edin $ty $ed_tem";
//echo "$a";
$st1=$_POST['temper'];
$u1=""; $v1=""; $sch1=0;
while(($sch1<strlen($st1))&&($st1{$sch1}>='0')&&($st1{$sch1}<='9')){
$u1.=$st1{$sch1}; $sch1=$sch1+1;
}
$sch1=$sch1+2;
while($sch1<strlen($st1)&&($st1{$sch1}>='0')&&($st1{$sch1}<='9')){
$v1.=$st1{$sch1}; $sch1=$sch1+1;
}
if(($u1!="")&&($v1!="")){
$u1=(int)$u1; $v1=(int)$v1;
if($ed_tem==1){$u1=$u1+273; $v1=$v1+273;}
//echo " $u1 $v1 <br/>";
}
/* Таблица MySQL, в которой хранятся данные */ 
//$userstable = "planety";
/* создать соединение */
$link=mysqli_connect($hostname,$username,$password);
/* выбрать базу данных. Если произойдёт ошибка - вывести её */
if(!$link){
echo "Ошибка: Невозможно установить соединение с MySQL.".PHP_EOL;
echo "Код ошибки errno: ".mysqli_connect_errno().PHP_EOL;
echo "Текст ошибки error: ".mysqli_connect_error().PHP_EOL;
exit;
} else{
mysqli_select_db($link,$dbName);
/*составить запрос, который выберет все планеты*/
/*$doc=new DOMDocument;
@$doc->loadHTMLFile("https://en.wikipedia.org/wiki/List_of_exoplanets_discovered_in_2015");
$xpath=new DOMXpath($dom);
$xpath->query('//div[contains(@class, "wikitable plainrowheaders sortable jquery-tablesorter")]');
echo $doc;*/
/*$query1="INSERT INTO planety VALUES(1,'2MASS J02192210-3925225 b','13.9','1.44','','156','','imaging','129','0.11','3064','')";
$res1=mysqli_query($link,$query1);*/
if($userstable!=""){
//echo "$ty";
$query="SELECT * FROM $userstable WHERE type='$ty'";
$query1="SELECT * FROM galaktiki LEFT OUTER JOIN zvyozdy ON galaktiki.kod_gal=zvyozdy.kod_gal";
/* Выполнить запрос. Если произойдёт ошибка - вывести её. */
$res=mysqli_query($link,$query);
$res1=mysqli_query($link,$query1);
/* Как много нашлось таких */
$number=mysqli_num_rows($res);
/*Напечатать всех в красивом виде*/
//echo "$number <br/>";
if($number==0){
echo "<CENTER><P>Общее количество известных $neb: 0.<BR><BR>";
  echo "<CENTER><P>В указанном диапазоне расстояний известных $neb нет или диапазон указан неверно.</CENTER>";
} else {
  echo "<CENTER><P>Общее количество известных $neb: $number.<BR><BR>"; 
/* Получать по одной строке из таблицы в массив $row, пока строки не кончатся */
$k1=0;
while ($row=mysqli_fetch_array($res)) 
{
$x=$row['distance'];
$x=(float)$x;
//echo "$x <br/>";
//echo " $u $v <br/>";
if(($u!="")&&($v!="")){
if(($x>=$u)&&($x<=$v)){
echo $row['name']; echo "; расстояние составляет "; echo $row['distance']; echo " световых лет (световых года, светового года). "; $k1=$k1+1;
}
} else{echo $row['name']; echo "; расстояние составляет "; echo $row['distance']; echo " световых лет (световых года, светового года). "; $k1=$k1+1;}
//echo " $x";
}
while ($row1=mysqli_fetch_array($res1)){
echo $row1['name']; echo "<br/>"; echo $row1['distance']; echo "<br/>"; echo $row1['temperature']; echo "<br/><br/>";
}
if($k1==0){
echo "<br/>В указанном диапазоне расстояний известных $neb нет или диапазон указан неверно.";
} else{
echo "<br/>Всего $k1 известных $neb в указанном диапазоне расстояний.";
}
echo "</CENTER>"; 
}
} else{
echo "Вы не выбрали небесные тела, о которых хотите узнать.";
}
}
?>
<html>
<head>
<style>
div{
background: url(2.png);
margin: -16px;
}
p{
color: #87CEFA;
}
a{
color: green;
}
</style>
</head>
<body>
<div id="header">

</div>
<div id="content">

</div>
<div id="footer">

</div>
</body>
</html>