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
if(($u!="")&&($v!="")){
$u=(int)$u; $v=(int)$v;
//echo " $u $v <br/>";
} /*else{
echo " Неверный диапазон.";
}*/
//echo "$a";
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
$query="SELECT * FROM $userstable";
/* Выполнить запрос. Если произойдёт ошибка - вывести её. */
$res=mysqli_query($link,$query);
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
$x=$row['distance_ly'];
$x=(float)$x;
//echo "$x <br/>";
//echo " $u $v <br/>";
if(($u!="")&&($v!="")){
if(($x>=$u)&&($x<=$v)){
echo $row['name']; echo "; расстояние составляет "; echo $row['distance_ly']; echo " световых лет (световых года, светового года). "; $k1=$k1+1;
}
}
//echo " $x";
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