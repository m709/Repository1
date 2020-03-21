<?
session_start();
$userstable=""; $hostname="localhost"; $username="root"; $password=""; $dbName="kosm_ob_ty";
if($_POST['Submit1']){
//echo "<p>Вы выбрали галактики.</p>";
$userstable="galaktiki";
$st1=$_POST['ra']; $token1=0; $u=""; $v=""; $sch=0;
if($st1!=""){
while(($sch<strlen($st1))&&($st1{$sch}>='0')&&($st1{$sch}<='9')){
$u.=$st1{$sch}; $sch=$sch+1;
}
$sch=$sch+2;
while($sch<strlen($st1)&&($st1{$sch}>='0')&&($st1{$sch}<='9')){
$v.=$st1{$sch}; $sch=$sch+1;
}
if(($u=="")||($v=="")){$token1=2;}
else{
$u=(int)$u; $v=(int)$v;
$token1=1;
$un=$_POST['ed'];
switch($un){
case 'pk':
$u=$u*3.2616; $v=$v*3.2616;
break;
case 'ly':
$u=$u; $v=$v;
break;
case 'au':
$u=$u/63241.077; $v=$v/63241.077;
break;
case 'mlnkm':
$u=$u/9460730.4725808; $v=$v/9460730.4725808;
break;
case 'km':
$u=$u/9460730472580.8; $v=$v/9460730472580.8;
break;
}
//echo "$un $u $v";
}
}
$st2=$_POST['tip']; $token2=1; $u2="";
//echo "$st2 ";
switch($st2){
case 'all':
$token2=0; break;
case 'sp':
$u2="Спиральная галактика"; break;
case 'spper':
$u2="Спиральная галактика с перемычкой"; break;
case 'ell':
$u2="Эллиптическая галактика"; break;
case 'irr':
$u2="Неправильная галактика"; break;
case 'pkol':
$u2="Галактика с полярными кольцами"; break;
case 'pek':
$u2="Пекулярная галактика"; break;
}
//echo "$u2";
$st3=$_POST['ztip']; $token3=1; $u3="";
switch($st3){
case 'all2':
$token3=0; break;
case 'zhk':
$u3="Жёлтый карлик"; break;
case 'kk':
$u3="Красный карлик"; break;
case 'bk':
$u3="Белый карлик"; break;
case 'kork':
$u3="Коричневый карлик"; break;
case 'sverhgig':
$u3="Сверхгигант"; break;
case 'neytr':
$u3="Нейтронная звезда"; break;
}
//echo "$u3";
$st4=$_POST['tez']; $token4=0; $u4=""; $v4=""; $sch4=0;
if($st4!=""){
while(($sch4<strlen($st4))&&($st4{$sch4}>='0')&&($st4{$sch4}<='9')){
$u4.=$st4{$sch4}; $sch4=$sch4+1;
}
$sch4=$sch4+2;
while($sch4<strlen($st4)&&($st4{$sch4}>='0')&&($st4{$sch4}<='9')){
$v4.=$st4{$sch4}; $sch4=$sch4+1;
}
if(($u4=="")||($v4=="")){$token4=2;}
else{
$u4=(int)$u4; $v4=(int)$v4;
$token4=1;
$un1=$_POST['ed1'];
switch($un1){
case 'K':
$u4=$u4; $v4=$v4; break;
case 'C':
$u4=$u4+273; $v4=$v4+273; break;
}
//echo "$u4 $v4";
}
}
$link=mysqli_connect($hostname,$username,$password);
if(!$link){
echo "Ошибка: Невозможно установить соединение с MySQL.".PHP_EOL;
echo "Код ошибки errno: ".mysqli_connect_errno().PHP_EOL;
echo "Текст ошибки error: ".mysqli_connect_error().PHP_EOL;
exit;
} else{
mysqli_select_db($link,$dbName);
$query="";
if(($token1==0)&&($token2==0)&&($token3==0)&&($token4==0)){$query="SELECT * FROM $userstable";}
if(($token1==0)&&($token2==0)&&($token3==0)&&($token4==1)){$query="SELECT * FROM galaktiki LEFT OUTER JOIN zvyozdy ON galaktiki.kod_gal=zvyozdy.kod_gal WHERE zvyozdy.temperature>=$u4 and zvyozdy.temperature<=$v4";}
if(($token1==0)&&($token2==0)&&($token3==1)&&($token4==0)){$query="SELECT * FROM galaktiki LEFT OUTER JOIN zvyozdy ON galaktiki.kod_gal=zvyozdy.kod_gal WHERE zvyozdy.type='$u3'";}
if(($token1==0)&&($token2==0)&&($token3==1)&&($token4==1)){$query="SELECT * FROM galaktiki LEFT OUTER JOIN zvyozdy ON galaktiki.kod_gal=zvyozdy.kod_gal WHERE zvyozdy.type='$u3' and zvyozdy.temperature>=$u4 and zvyozdy.temperature<=$v4";}
if(($token1==0)&&($token2==1)&&($token3==0)&&($token4==0)){$query="SELECT * FROM $userstable WHERE type='$u2'";}
if(($token1==0)&&($token2==1)&&($token3==0)&&($token4==1)){$query="SELECT * FROM galaktiki LEFT OUTER JOIN zvyozdy ON galaktiki.kod_gal=zvyozdy.kod_gal WHERE galaktiki.type='$u2' and zvyozdy.temperature>=$u4 and zvyozdy.temperature<=$v4";}
if(($token1==0)&&($token2==1)&&($token3==1)&&($token4==0)){$query="SELECT * FROM galaktiki LEFT OUTER JOIN zvyozdy ON galaktiki.kod_gal=zvyozdy.kod_gal WHERE galaktiki.type='$u2' and zvyozdy.type='$u3'";}
if(($token1==0)&&($token2==1)&&($token3==1)&&($token4==1)){$query="SELECT * FROM galaktiki LEFT OUTER JOIN zvyozdy ON galaktiki.kod_gal=zvyozdy.kod_gal WHERE galaktiki.type='$u2' and zvyozdy.type='$u3' and zvyozdy.temperature>=$u4 and zvyozdy.temperature<=$v4";}
if(($token1==1)&&($token2==0)&&($token3==0)&&($token4==0)){$query="SELECT * FROM $userstable WHERE distance>=$u and distance<=$v";}
if(($token1==1)&&($token2==0)&&($token3==0)&&($token4==1)){$query="SELECT * FROM galaktiki LEFT OUTER JOIN zvyozdy ON galaktiki.kod_gal=zvyozdy.kod_gal WHERE galaktiki.distance>=$u and galaktiki.distance<=$v and zvyozdy.temperature>=$u4 and zvyozdy.temperature<=$v4";}
if(($token1==1)&&($token2==0)&&($token3==1)&&($token4==0)){$query="SELECT * FROM galaktiki LEFT OUTER JOIN zvyozdy ON galaktiki.kod_gal=zvyozdy.kod_gal WHERE galaktiki.distance>=$u and galaktiki.distance<=$v and zvyozdy.type='$u3'";}
if(($token1==1)&&($token2==0)&&($token3==1)&&($token4==1)){$query="SELECT * FROM galaktiki LEFT OUTER JOIN zvyozdy ON galaktiki.kod_gal=zvyozdy.kod_gal WHERE galaktiki.distance>=$u and galaktiki.distance<=$v and zvyozdy.type='$u3' and zvyozdy.temperature>=$u4 and zvyozdy.temperature<=$v4";}
if(($token1==1)&&($token2==1)&&($token3==0)&&($token4==0)){$query="SELECT * FROM $userstable WHERE distance>=$u and distance<=$v and type='$u2'";}
if(($token1==1)&&($token2==1)&&($token3==0)&&($token4==1)){$query="SELECT * FROM galaktiki LEFT OUTER JOIN zvyozdy ON galaktiki.kod_gal=zvyozdy.kod_gal WHERE galaktiki.distance>=$u and galaktiki.distance<=$v and galaktiki.type='$u2' and zvyozdy.temperature>=$u4 and zvyozdy.temperature<=$v4";}
if(($token1==1)&&($token2==1)&&($token3==1)&&($token4==0)){$query="SELECT * FROM galaktiki LEFT OUTER JOIN zvyozdy ON galaktiki.kod_gal=zvyozdy.kod_gal WHERE galaktiki.distance>=$u and galaktiki.distance<=$v and galaktiki.type='$u2' and zvyozdy.type='$u3'";}
if(($token1==1)&&($token2==1)&&($token3==1)&&($token4==1)){$query="SELECT * FROM galaktiki LEFT OUTER JOIN zvyozdy ON galaktiki.kod_gal=zvyozdy.kod_gal WHERE galaktiki.distance>=$u and galaktiki.distance<=$v and galaktiki.type='$u2' and zvyozdy.type='$u3' and zvyozdy.temperature>=$u4 and zvyozdy.temperature<=$v4";}
if($query!=""){
$res=mysqli_query($link,$query);
$number=mysqli_num_rows($res);
if($number==0){echo "К сожалению, информации нет.";}
else{
echo "Нашлось $number галактик(-и), удовлетворяющих заданным условиям. Это следующие галактики:<br/>";
$k1=0;
while ($row=mysqli_fetch_array($res)){
$di=$row['distance']; $na=$row['name']; $so=$row['sozvezdie']; print_r($row);
echo "<br/>";
$k1=$k1+1;
$di1=$di/3.2616; $di2=$di*63241.077; $di3=$di*9460730.4725808; $di4=$di*9460730472580.8;
//echo "<p>$k1. $na, находящаяся на расстоянии $di световых лет ($di1 пк, $di2 а.е., $di3 млн км, $di4 км) от Земли.</p>";
//echo "<p>$row</p>";
}
}
} else{echo "Вы, к сожалению, неправильно ввели диапазон расстояний или температур.";}
}
} else{
if($_POST['Submit2']){
//echo "<p>Вы выбрали звёзды.</p>";
$userstable="zvyozdy";
$st1=$_POST['ra']; $token1=0; $u=""; $v=""; $sch=0;
if($st1!=""){
while(($sch<strlen($st1))&&($st1{$sch}>='0')&&($st1{$sch}<='9')){
$u.=$st1{$sch}; $sch=$sch+1;
}
$sch=$sch+2;
while($sch<strlen($st1)&&($st1{$sch}>='0')&&($st1{$sch}<='9')){
$v.=$st1{$sch}; $sch=$sch+1;
}
if(($u=="")||($v=="")){$token1=2;}
else{
$u=(int)$u; $v=(int)$v;
$token1=1;
$un=$_POST['ed'];
switch($un){
case 'pk':
$u=$u*3.2616; $v=$v*3.2616;
break;
case 'ly':
$u=$u; $v=$v;
break;
case 'au':
$u=$u/63241.077; $v=$v/63241.077;
break;
case 'mlnkm':
$u=$u/9460730.4725808; $v=$v/9460730.4725808;
break;
case 'km':
$u=$u/9460730472580.8; $v=$v/9460730472580.8;
break;
}
//echo "$un $u $v";
}
}
$st2=$_POST['ztip']; $token2=1; $u2="";
//echo "$st2 ";
switch($st2){
case 'all2':
$token2=0; break;
case 'zhk':
$u2="Жёлтый карлик"; break;
case 'kk':
$u2="Красный карлик"; break;
case 'bk':
$u2="Белый карлик"; break;
case 'kork':
$u2="Коричневый карлик"; break;
case 'sverhgig':
$u2="Сверхгигант"; break;
case 'neytr':
$u2="Нейтронная звезда"; break;
}
//echo "$u2";
$st4=$_POST['tez']; $token4=0; $u4=""; $v4=""; $sch4=0;
if($st4!=""){
while(($sch4<strlen($st4))&&($st4{$sch4}>='0')&&($st4{$sch4}<='9')){
$u4.=$st4{$sch4}; $sch4=$sch4+1;
}
$sch4=$sch4+2;
while($sch4<strlen($st4)&&($st4{$sch4}>='0')&&($st4{$sch4}<='9')){
$v4.=$st4{$sch4}; $sch4=$sch4+1;
}
if(($u4=="")||($v4=="")){$token4=2;}
else{
$u4=(int)$u4; $v4=(int)$v4;
$token4=1;
$un1=$_POST['ed1'];
switch($un1){
case 'K':
$u4=$u4; $v4=$v4; break;
case 'C':
$u4=$u4+273; $v4=$v4+273; break;
}
//echo "$un1 $u4 $v4";
}
}
$st3=$_POST['ekzob']; $token3=1; $u3="";
switch($st3){
case 'all3':
$token3=0; break;
case 'Tr':
$u3="Да"; break;
case 'Fa':
$u3="Нет"; break;
}
//echo "$u3";
$link=mysqli_connect($hostname,$username,$password);
if(!$link){
echo "Ошибка: Невозможно установить соединение с MySQL.".PHP_EOL;
echo "Код ошибки errno: ".mysqli_connect_errno().PHP_EOL;
echo "Текст ошибки error: ".mysqli_connect_error().PHP_EOL;
exit;
} else{
mysqli_select_db($link,$dbName);
$query="";
if(($token1==0)&&($token2==0)&&($token4==0)&&($token3==0)){$query="SELECT * FROM $userstable";}
if(($token1==0)&&($token2==0)&&($token4==0)&&($token3==1)){if($u3=="Да"){$query="SELECT * FROM zvyozdy,(SELECT DISTINCT kod_zvezdy FROM planety)A WHERE A.kod_zvezdy=zvyozdy.kod_zvezdy";} else{$query="SELECT * FROM zvyozdy WHERE NOT EXISTS(SELECT * FROM planety WHERE zvyozdy.kod_zvezdy=planety.kod_zvezdy)";}}
if(($token1==0)&&($token2==0)&&($token4==1)&&($token3==0)){$query="SELECT * FROM $userstable WHERE temperature>=$u4 and temperature<=$v4";}
if(($token1==0)&&($token2==0)&&($token4==1)&&($token3==1)){if($u3=="Да"){$query="SELECT * FROM zvyozdy,(SELECT DISTINCT kod_zvezdy FROM planety)A WHERE A.kod_zvezdy=zvyozdy.kod_zvezdy AND zvyozdy.temperature>=$u4 AND zvyozdy.temperature<=$v4";} else{$query="SELECT * FROM zvyozdy WHERE NOT EXISTS(SELECT * FROM planety WHERE zvyozdy.kod_zvezdy=planety.kod_zvezdy) AND zvyozdy.temperature>=$u4 AND zvyozdy.temperature<=$v4";}}
if(($token1==0)&&($token2==1)&&($token4==0)&&($token3==0)){$query="SELECT * FROM $userstable WHERE type='$u2'";}
if(($token1==0)&&($token2==1)&&($token4==0)&&($token3==1)){if($u3=="Да"){$query="SELECT * FROM zvyozdy,(SELECT DISTINCT kod_zvezdy FROM planety)A WHERE A.kod_zvezdy=zvyozdy.kod_zvezdy AND zvyozdy.type='$u2'";} else{$query="SELECT * FROM zvyozdy WHERE NOT EXISTS(SELECT * FROM planety WHERE zvyozdy.kod_zvezdy=planety.kod_zvezdy) AND zvyozdy.type='$u2'";}}
if(($token1==0)&&($token2==1)&&($token4==1)&&($token3==0)){$query="SELECT * FROM $userstable WHERE type='$u2' and temperature>=$u4 and temperature<=$v4";}
if(($token1==0)&&($token2==1)&&($token4==1)&&($token3==1)){if($u3=="Да"){$query="SELECT * FROM zvyozdy,(SELECT DISTINCT kod_zvezdy FROM planety)A WHERE A.kod_zvezdy=zvyozdy.kod_zvezdy AND zvyozdy.type='$u2' AND zvyozdy.temperature>=$u4 AND zvyozdy.temperature<=$v4";} else{$query="SELECT * FROM zvyozdy WHERE NOT EXISTS(SELECT * FROM planety WHERE zvyozdy.kod_zvezdy=planety.kod_zvezdy) AND zvyozdy.type='$u2' AND zvyozdy.temperature>=$u4 AND zvyozdy.temperature<=$v4";}}
if(($token1==1)&&($token2==0)&&($token4==0)&&($token3==0)){$query="SELECT * FROM $userstable WHERE distance>=$u and distance<=$v";}
if(($token1==1)&&($token2==0)&&($token4==0)&&($token3==1)){if($u3=="Да"){$query="SELECT * FROM zvyozdy,(SELECT DISTINCT kod_zvezdy FROM planety)A WHERE A.kod_zvezdy=zvyozdy.kod_zvezdy AND zvyozdy.distance>=$u AND zvyozdy.distance<=$v";} else{$query="SELECT * FROM zvyozdy WHERE NOT EXISTS(SELECT * FROM planety WHERE zvyozdy.kod_zvezdy=planety.kod_zvezdy) AND zvyozdy.distance>=$u AND zvyozdy.distance<=$v";}}
if(($token1==1)&&($token2==0)&&($token4==1)&&($token3==0)){$query="SELECT * FROM $userstable WHERE distance>=$u and distance<=$v and temperature>=$u4 and temperature<=$v4";}
if(($token1==1)&&($token2==0)&&($token4==1)&&($token3==1)){if($u3=="Да"){$query="SELECT * FROM zvyozdy,(SELECT DISTINCT kod_zvezdy FROM planety)A WHERE A.kod_zvezdy=zvyozdy.kod_zvezdy AND zvyozdy.distance>=$u AND zvyozdy.distance<=$v AND zvyozdy.temperature>=$u4 AND zvyozdy.temperature<=$v4";} else{$query="SELECT * FROM zvyozdy WHERE NOT EXISTS(SELECT * FROM planety WHERE zvyozdy.kod_zvezdy=planety.kod_zvezdy) AND zvyozdy.distance>=$u AND zvyozdy.distance<=$v AND zvyozdy.temperature>=$u4 AND zvyozdy.temperature<=$v4";}}
if(($token1==1)&&($token2==1)&&($token4==0)&&($token3==0)){$query="SELECT * FROM $userstable WHERE distance>=$u and distance<=$v and type='$u2'";}
if(($token1==1)&&($token2==1)&&($token4==0)&&($token3==1)){if($u3=="Да"){$query="SELECT * FROM zvyozdy,(SELECT DISTINCT kod_zvezdy FROM planety)A WHERE A.kod_zvezdy=zvyozdy.kod_zvezdy AND zvyozdy.distance>=$u AND zvyozdy.distance<=$v AND zvyozdy.type='$u2'";} else{$query="SELECT * FROM zvyozdy WHERE NOT EXISTS(SELECT * FROM planety WHERE zvyozdy.kod_zvezdy=planety.kod_zvezdy) AND zvyozdy.distance>=$u AND zvyozdy.distance<=$v AND zvyozdy.type='$u2'";}}
if(($token1==1)&&($token2==1)&&($token4==1)&&($token3==0)){$query="SELECT * FROM $userstable WHERE distance>=$u and distance<=$v and type='$u2' and temperature>=$u4 and temperature<=$v4";}
if(($token1==1)&&($token2==1)&&($token4==1)&&($token3==1)){if($u3=="Да"){$query="SELECT * FROM zvyozdy,(SELECT DISTINCT kod_zvezdy FROM planety)A WHERE A.kod_zvezdy=zvyozdy.kod_zvezdy AND zvyozdy.distance>=$u AND zvyozdy.distance<=$v AND zvyozdy.temperature>=$u4 AND zvyozdy.temperature<=$v4 AND zvyozdy.type='$u2'";} else{$query="SELECT * FROM zvyozdy WHERE NOT EXISTS(SELECT * FROM planety WHERE zvyozdy.kod_zvezdy=planety.kod_zvezdy) AND zvyozdy.distance>=$u AND zvyozdy.distance<=$v AND zvyozdy.temperature>=$u4 AND zvyozdy.temperature<=$v4 AND zvyozdy.type='$u2'";}}
if($query!=""){
$res=mysqli_query($link,$query);
$number=mysqli_num_rows($res);
if($number==0){echo "К сожалению, информации нет.";}
else{
echo "Нашлось $number звезда(-ы), удовлетворяющих заданным условиям. Это следующие звёзды:<br/>";
$k1=0;
while ($row=mysqli_fetch_array($res)){
$di=$row['distance']; $na=$row['name']; $so=$row['sozvezdie']; print_r($row);
echo "<br/>";
$k1=$k1+1;
$di1=$di/3.2616; $di2=$di*63241.077; $di3=$di*9460730.4725808; $di4=$di*9460730472580.8;
//echo "<p>$k1. $na, находящаяся на расстоянии $di световых лет ($di1 пк, $di2 а.е., $di3 млн км, $di4 км) от Земли.</p>";
//echo "<p>$row</p>";
}
}
} else{echo "Вы, к сожалению, неправильно ввели диапазон расстояний или температур.";}
}
} else{
if($_POST['Submit3']){
//echo "<p>Вы выбрали планеты.</p>";
$userstable="planety";
$st1=$_POST['ra']; $token1=0; $u=""; $v=""; $sch=0;
if($st1!=""){
while(($sch<strlen($st1))&&($st1{$sch}>='0')&&($st1{$sch}<='9')){
$u.=$st1{$sch}; $sch=$sch+1;
}
$sch=$sch+2;
while($sch<strlen($st1)&&($st1{$sch}>='0')&&($st1{$sch}<='9')){
$v.=$st1{$sch}; $sch=$sch+1;
}
if(($u=="")||($v=="")){$token1=2;}
else{
$u=(int)$u; $v=(int)$v;
$token1=1;
$un=$_POST['ed'];
switch($un){
case 'pk':
$u=$u*30857118.50937; $v=$v*30857118.50937;
break;
case 'ly':
$u=$u*9460730.4725808; $v=$v*9460730.4725808;
break;
case 'au':
$u=$u*149.5978707; $v=$v*149.5978707;
break;
case 'mlnkm':
$u=$u; $v=$v;
break;
case 'km':
$u=$u/1000000; $v=$v/1000000;
break;
}
//echo "$un $u $v<br/>";
}
}
$st2=$_POST['tp']; $token2=1; $u2="";
//echo "$st2 ";
switch($st2){
case 'all':
$token2=0; break;
case 'hu':
$u2="Холодный юпитер"; break;
case 'gu':
$u2="Горячий юпитер"; break;
case 'hn':
$u2="Холодный нептун"; break;
case 'gn':
$u2="Горячий нептун"; break;
case 'vg':
$u2="Водный гигант"; break;
case 'lg':
$u2="Ледяной гигант"; break;
case 'sz':
$u2="Суперземля"; break;
case 'mez':
$u2="Мегаземля"; break;
case 'miz':
$u2="Миниземля"; break;
case 'po':
$u2="Планета-океан"; break;
}
//echo "$u2";
$st3=$_POST['is']; $token3=1; $u3="";
switch($st3){
case 'all2':
$token3=0; break;
case 'Tr':
$u3="Да"; break;
case 'Fa':
$u3="Нет"; break;
}
//echo "$u3";
$link=mysqli_connect($hostname,$username,$password);
if(!$link){
echo "Ошибка: Невозможно установить соединение с MySQL.".PHP_EOL;
echo "Код ошибки errno: ".mysqli_connect_errno().PHP_EOL;
echo "Текст ошибки error: ".mysqli_connect_error().PHP_EOL;
exit;
} else{
mysqli_select_db($link,$dbName);
$query=""; //echo "$token1 $token2 $token3</br>";
if(($token1==0)&&($token2==0)&&($token3==0)){$query="SELECT * FROM $userstable";}
if(($token1==0)&&($token2==0)&&($token3==1)){if($u3=="Да"){$query="SELECT * FROM planety,(SELECT DISTINCT kod_plan FROM sputniki)A WHERE A.kod_plan=planety.kod_plan";} else{$query="SELECT * FROM planety WHERE NOT EXISTS(SELECT * FROM sputniki WHERE planety.kod_plan=sputniki.kod_plan)";}}
if(($token1==0)&&($token2==1)&&($token3==0)){$query="SELECT * FROM $userstable WHERE type='$u2'";}
if(($token1==0)&&($token2==1)&&($token3==1)){if($u3=="Да"){$query="SELECT * FROM planety,(SELECT DISTINCT kod_plan FROM sputniki)A WHERE A.kod_plan=planety.kod_plan AND planety.type='$u2'";} else{$query="SELECT * FROM planety WHERE NOT EXISTS(SELECT * FROM sputniki WHERE planety.kod_plan=sputniki.kod_plan) AND planety.type='$u2'";}}
if(($token1==1)&&($token2==0)&&($token3==0)){$query="SELECT * FROM $userstable WHERE distance>=$u AND distance<=$v";}
if(($token1==1)&&($token2==0)&&($token3==1)){if($u3=="Да"){$query="SELECT * FROM planety,(SELECT DISTINCT kod_plan FROM sputniki)A WHERE A.kod_plan=planety.kod_plan AND planety.distance>=$u AND planety.distance<=$v";} else{$query="SELECT * FROM planety WHERE NOT EXISTS(SELECT * FROM sputniki WHERE planety.kod_plan=sputniki.kod_plan) AND planety.distance>=$u AND planety.distance<=$v";}}
if(($token1==1)&&($token2==1)&&($token3==0)){$query="SELECT * FROM $userstable WHERE type='$u2' AND distance>=$u AND distance<=$v";}
if(($token1==1)&&($token2==1)&&($token3==1)){if($u3=="Да"){$query="SELECT * FROM planety,(SELECT DISTINCT kod_plan FROM sputniki)A WHERE A.kod_plan=planety.kod_plan AND planety.type='$u2' AND planety.distance>=$u AND planety.distance<=$v";} else{$query="SELECT * FROM planety WHERE NOT EXISTS(SELECT * FROM sputniki WHERE planety.kod_plan=sputniki.kod_plan) AND planety.type='$u2' AND planety.distance>=$u AND planety.distance<=$v";}}
if($query!=""){
$res=mysqli_query($link,$query);
$number=mysqli_num_rows($res);
if($number==0){echo "К сожалению, информации нет.";}
else{
echo "Нашлось $number планета(-ы), удовлетворяющих заданным условиям. Это следующие планеты:<br/>";
$k1=0;
while ($row=mysqli_fetch_array($res)){
print_r($row);
//$di=$row['distance']; $na=$row['name']; $so=$row['sozvezdie'];
echo "<br/>";
//$k1=$k1+1;
//$di1=$di/3.2616; $di2=$di*63241.077; $di3=$di*9460730.4725808; $di4=$di*9460730472580.8;
//echo "<p>$k1. $na, находящаяся на расстоянии $di световых лет ($di1 пк, $di2 а.е., $di3 млн км, $di4 км) от Земли.</p>";
//echo "<p>$row</p>";
}
}
} else{echo "Вы, к сожалению, неправильно ввели диапазон расстояний или температур.";}
}
} else{
if($_POST['Submit4']){
//echo "<p>Вы выбрали спутники.</p>";
$userstable="sputniki";
$st1=$_POST['ra']; $token1=0; $u=""; $v=""; $sch=0;
if($st1!=""){
while(($sch<strlen($st1))&&($st1{$sch}>='0')&&($st1{$sch}<='9')){
$u.=$st1{$sch}; $sch=$sch+1;
}
$sch=$sch+2;
while($sch<strlen($st1)&&($st1{$sch}>='0')&&($st1{$sch}<='9')){
$v.=$st1{$sch}; $sch=$sch+1;
}
if(($u=="")||($v=="")){$token1=2;}
else{
$u=(int)$u; $v=(int)$v;
$token1=1;
$un=$_POST['ed'];
switch($un){
case 'pk':
$u=$u*30857118509370; $v=$v*30857118509370;
break;
case 'ly':
$u=$u*9460730472580.8; $v=$v*9460730472580.8;
break;
case 'au':
$u=$u*149597870.7; $v=$v*149597870.7;
break;
case 'mlnkm':
$u=$u*1000000; $v=$v*1000000;
break;
case 'km':
$u=$u; $v=$v;
break;
}
//echo "$un $u $v<br/>";
}
}
$st4=$_POST['tez']; $token4=0; $u4=""; $v4=""; $sch4=0;
if($st4!=""){
while(($sch4<strlen($st4))&&($st4{$sch4}>='0')&&($st4{$sch4}<='9')){
$u4.=$st4{$sch4}; $sch4=$sch4+1;
}
$sch4=$sch4+2;
while($sch4<strlen($st4)&&($st4{$sch4}>='0')&&($st4{$sch4}<='9')){
$v4.=$st4{$sch4}; $sch4=$sch4+1;
}
if(($u4=="")||($v4=="")){$token4=2;}
else{
$u4=(int)$u4; $v4=(int)$v4;
$token4=1;
$un1=$_POST['ed1'];
switch($un1){
case 'K':
$u4=$u4; $v4=$v4; break;
case 'C':
$u4=$u4+273; $v4=$v4+273; break;
}
//echo "$un1 $u4 $v4";
}
}
$link=mysqli_connect($hostname,$username,$password);
if(!$link){
echo "Ошибка: Невозможно установить соединение с MySQL.".PHP_EOL;
echo "Код ошибки errno: ".mysqli_connect_errno().PHP_EOL;
echo "Текст ошибки error: ".mysqli_connect_error().PHP_EOL;
exit;
} else{
mysqli_select_db($link,$dbName);
$query=""; //echo "$token1 $token2 $token3</br>";
if(($token1==0)&&($token4==0)){$query="SELECT * FROM $userstable";}
if(($token1==0)&&($token4==1)){$query="SELECT * FROM $userstable WHERE temperature>=$u4 AND temperature<=$v4";}
if(($token1==1)&&($token4==0)){$query="SELECT * FROM $userstable WHERE distance>=$u AND distance<=$v";}
if(($token1==1)&&($token4==1)){$query="SELECT * FROM $userstable WHERE distance>=$u AND distance<=$v AND temperature>=$u4 AND temperature<=$v4";}
if($query!=""){
$res=mysqli_query($link,$query);
$number=mysqli_num_rows($res);
if($number==0){echo "К сожалению, информации нет.";}
else{
echo "Нашлось $number спутника(-ов), удовлетворяющих заданным условиям. Это следующие спутники:<br/>";
$k1=0;
while ($row=mysqli_fetch_array($res)){
print_r($row);
//$di=$row['distance']; $na=$row['name']; $so=$row['sozvezdie'];
echo "<br/>";
//$k1=$k1+1;
//$di1=$di/3.2616; $di2=$di*63241.077; $di3=$di*9460730.4725808; $di4=$di*9460730472580.8;
//echo "<p>$k1. $na, находящаяся на расстоянии $di световых лет ($di1 пк, $di2 а.е., $di3 млн км, $di4 км) от Земли.</p>";
//echo "<p>$row</p>";
}
}
} else{echo "Вы, к сожалению, неправильно ввели диапазон расстояний или температур.";}
}
} else{
echo "Данные были отправлены не формой. Отправьте, пожалуйста, данные с помощью <a href='form.php'>формы</a>.";
}
}
}
}
?>