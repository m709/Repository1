<html>
<head>
<title>Космический сайт</title>
<link rel='stylesheet' type='text/css' href='stili.css'>
</head>
<body>
<div id="header">
<p>Вы хотите узнать о галактиках, которые обладают следующими свойствами:</p>
</div>
<div id="content">
<form action="inf1.php" method="post">
<fieldset>
<p>
<label for="ras">Находятся на расстоянии в диапазоне от <input type="text" id="rasst1" name="ra1"> до <input type="text" id="rasst2" name="ra2"> выбранных единиц измерения от Земли: </label>
<select name="ed" size="1">
<option value="pk" selected>Парсеки</option>
<option value="ly">Световые года</option>
<option value="au">Астрономические единицы</option>
<option value="mlnkm">Миллионы километров</option>
<option value="km">Километры</option>
</select>
<input type="button" value="Проверить правильность ввода" onclick="f2()">
</p>
<p>
<label for="ti">Имеют выбранный тип: </label>
<select name="tip" size="1">
<option value="all" selected>Неважно какой</option>
<option value="sp">Спиральная галактика</option>
<option value="spper">Спиральная галактика с перемычкой</option>
<option value="ell">Эллиптическая галактика</option>
<option value="irr">Неправильная галактика</option>
<option value="pkol">Галактика с полярными кольцами</option>
<option value="pek">Пекулярная галактика</option>
</select>
</p>
<!--
<p>
<label for="sozvez">Находятся в выбранном созвездии: </label>
<select name="soz" size="1">
<option value="all1" selected>Неважно в каком</option>
<option value="so1">Андромеда</option>
<option value="so2">Близнецы</option>
<option value="so3">Большая Медведица</option>
<option value="so4">Большой Пёс</option>
<option value="so5">Весы</option>
<option value="so6">Водолей</option>
<option value="so7">Возничий</option>
<option value="so8">Волк</option>
<option value="so9">Волопас</option>
<option value="so10">Волосы Вероники</option>
<option value="so11">Ворон</option>
<option value="so12">Геркулес</option>
<option value="so13">Гидра</option>
<option value="so14">Голубь</option>
<option value="so15">Гончие Псы</option>
<option value="so16">Дева</option>
<option value="so17">Дельфин</option>
<option value="so18">Дракон</option>
<option value="so19">Единорог</option>
<option value="so20">Жертвенник</option>
<option value="so21">Живописец</option>
<option value="so22">Жираф</option>
<option value="so23">Журавль</option>
<option value="so24">Заяц</option>
<option value="so25">Змееносец</option>
<option value="so26">Змея</option>
<option value="so27">Золотая Рыба</option>
<option value="so28">Индеец</option>
<option value="so29">Кассиопея</option>
<option value="so30">Киль</option>
<option value="so31">Кит</option>
<option value="so32">Козерог</option>
<option value="so33">Компас</option>
<option value="so34">Корма</option>
<option value="so35">Лебедь</option>
<option value="so36">Лев</option>
<option value="so37">Летучая Рыба</option>
<option value="so38">Лира</option>
<option value="so39">Лисичка</option>
<option value="so40">Малая Медведица</option>
<option value="so41">Малый Конь</option>
<option value="so42">Малый Лев</option>
<option value="so43">Малый Пёс</option>
<option value="so44">Микроскоп</option>
<option value="so45">Муха</option>
<option value="so46">Насос</option>
<option value="so47">Наугольник</option>
<option value="so48">Овен</option>
<option value="so49">Октант</option>
<option value="so50">Орёл</option>
<option value="so51">Орион</option>
<option value="so52">Павлин</option>
<option value="so53">Паруса</option>
<option value="so54">Пегас</option>
<option value="so55">Персей</option>
<option value="so56">Печь</option>
<option value="so57">Райская Птица</option>
<option value="so58">Рак</option>
<option value="so59">Резец</option>
<option value="so60">Рыбы</option>
<option value="so61">Рысь</option>
<option value="so62">Северная Корона</option>
<option value="so63">Секстант</option>
<option value="so64">Сетка</option>
<option value="so65">Скорпион</option>
<option value="so66">Скульптор</option>
<option value="so67">Столовая Гора</option>
<option value="so68">Стрела</option>
<option value="so69">Стрелец</option>
<option value="so70">Телескоп</option>
<option value="so71">Телец</option>
<option value="so72">Треугольник</option>
<option value="so73">Тукан</option>
<option value="so74">Феникс</option>
<option value="so75">Хамелеон</option>
<option value="so76">Центавр</option>
<option value="so77">Цефей</option>
<option value="so78">Циркуль</option>
<option value="so79">Часы</option>
<option value="so80">Чаша</option>
<option value="so81">Щит</option>
<option value="so82">Эридан</option>
<option value="so83">Южная Гидра</option>
<option value="so84">Южная Корона</option>
<option value="so85">Южная Рыба</option>
<option value="so86">Южный Крест</option>
<option value="so87">Южный Треугольник</option>
<option value="so88">Ящерица</option>
</select>
</p>
-->
<p>
<label for="gzv">Содержат звёзды выбранного типа: </label>
<select name="ztip" size="1">
<option value="all2" selected>Неважно какого</option>
<option value="zhk">Жёлтый карлик</option>
<option value="kk">Красный карлик</option>
<option value="bk">Белый карлик</option>
<option value="kork">Коричневый карлик</option>
<option value="sverhgig">Сверхгигант</option>
<option value="neytr">Нейтронная звезда</option>
</select>,
<p>
<label for="temz">которые имеют температуру в диапазоне от <input type="text" id="tz1" name="tez1"> до <input type="text" id="tz2" name="tez2"> выбранных единиц измерения: </label>
<select name="ed1" size="1">
<option value="K" selected>Кельвины</option>
<option value="C">Градусы Цельсия</option>
</select>
<input type="button" value="Проверить правильность ввода" onclick="f3()">
</p>
</p>
<p>
<input type ="submit" name="Submit1" value="Найти информацию">
</p>
</fieldset>
</form>
<script>
function f2(){
var input1=document.getElementById('rasst1');
var s1=input1.value;
var input2=document.getElementById('rasst2');
var s2=input2.value;
if((s1=="")&&(s2=="")){
alert("Великолепно! В этих полях ошибок нет.");
} else{
var a=""; var x=0;
while(x<s1.length){
a=a+s1[x]; x=x+1;
}
a=Number.parseInt(a);
var b=""; x=0;
while(x<s2.length){
b=b+s2[x]; x=x+1;
}
b=Number.parseInt(b);
if((!isNaN(a))&&(!isNaN(b))){
alert("Великолепно! В этих полях ошибок нет.");
} else{
alert("Формат этих полей не соблюдён.");
}
}
}
function f3(){
var input1=document.getElementById('tz1');
var s1=input1.value;
var input2=document.getElementById('tz2');
var s2=input2.value;
if((s1=="")&&(s2=="")){
alert("Великолепно! В этих полях ошибок нет.");
} else{
var a=""; var x=0;
while(x<s1.length){
a=a+s1[x]; x=x+1;
}
a=Number.parseInt(a);
var b=""; x=0;
while(x<s2.length){
b=b+s2[x]; x=x+1;
}
b=Number.parseInt(b);
if((!isNaN(a))&&(!isNaN(b))){
alert("Великолепно! В этих полях ошибок нет.");
} else{
alert("Формат этих полей не соблюдён.");
}
}
}
</script>
</div>
<div id="footer">
<p>&copy Усов П.Е.</p>
</div>
</body>
</html>