<html>
<head>
<title>Космический сайт</title>
<link rel="stylesheet" type="text/css" href="stili.css">
</head>
<body>
<div id="header">
<p>На этом сайте размещена информация о небесных телах в ближнем и дальнем космосе. Вам предлагается заполнить форму для поиска этой информации.</p>
<p><a href="index.php">На главную</a></p>
</div>
<div id="content">
<form action="dalee.php" method="post">
<fieldset>
<p>
<label for="v1">О каких небесных телах вы хотите что-то узнать?</label>
<input type="radio" name="kosm" id="sput" value="1">Спутниках планет
<input type="radio" name="kosm" id="plan" value="2">Планетах
<input type="radio" name="kosm" id="zv" value="3">Звёздах
<input type="radio" name="kosm" id="gal" value="4">Галактиках
<input type="button" value="Проверить правильность ввода" onclick="f1()">
</p>
<!--
<p>
<label for="ras">Введите диапазон расстояний в формате a..b, где a и b - целые числа, и выберите единицу измерения. Учтите, что есть информация о расстояниях от Земли до галактик, от Земли до звёзд, от планет до родительских звёзд, от спутников до родительских планет.</label>
<input type="text" id="rasst" name="ra">
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
<label for="ti">Выберите тип небесного тела:</label>
<select name="tip" size="1">
<option value="spper" selected>Спиральная галактика с перемычкой</option>
<option value="sp">Спиральная галактика</option>
<option value="zhk">Жёлтый карлик</option>
<option value="kk">Красный карлик</option>
<option value="pz">Планета земной группы</option>
<option value="lg">Ледяной гигант</option>
<option value="gg">Газовый гигант</option>
<option value="kam">Каменистый</option>
</select>
</p>
<p>
<label for="tem">Введите диапазон температур небесного тела в том же формате, что и расстояние, и выберите единицу измерения:</label>
<input type="text" id="temp" name="temper">
<select name="te" size="1">
<option value="K" selected>Кельвины</option>
<option value="C">Градусы Цельсия</option>
</select>
<input type="button" value="Проверить правильность ввода" onclick="f3()">
</p>
-->
<p>
<input type ="submit" name="Submit" value="Далее">
</p>
</fieldset>
</form>
<script>
function f1(){
var input1=document.getElementById('sput');
var input2=document.getElementById('plan');
var input3=document.getElementById('zv');
var input4=document.getElementById('gal');
if((!input1.checked)&&(!input2.checked)&&(!input3.checked)&&(!input4.checked)){
alert("Пожалуйста, отметьте 1 кнопку.");
} else{alert("Великолепно! В этом поле ошибок нет.");}
}
function f2(){
var input=document.getElementById('rasst');
var s=input.value;
if(s==""){
alert("Формат этого поля не соблюдён.");
} else{
var a=""; var b=""; var x=0;
while((x<s.length)&&(s[x]!='.')){
a=a+s[x]; x=x+1;
}
x=x+2;
while(x<s.length){
b=b+s[x]; x=x+1;
}
a=Number.parseInt(a); b=Number.parseInt(b);
if((!isNaN(a))&&(!isNaN(b))){
alert("Великолепно! В этом поле ошибок нет.");
} else{
alert("Формат этого поля не соблюдён.");
}
}
}
function f3(){
var input=document.getElementById('temp');
var s=input.value;
if(s==""){
alert("Формат этого поля не соблюдён.");
} else{
var a=""; var b=""; var x=0;
while((x<s.length)&&(s[x]!='.')){
a=a+s[x]; x=x+1;
}
x=x+2;
while(x<s.length){
b=b+s[x]; x=x+1;
}
a=Number.parseInt(a); b=Number.parseInt(b);
if((!isNaN(a))&&(!isNaN(b))){
alert("Великолепно! В этом поле ошибок нет.");
} else{
alert("Формат этого поля не соблюдён.");
}
}
}
</script>
<!--
<script type="text/javascript" src="C:\Users\Lizard\Documents\Программирование в компьютерных сетях\jquery-3.3.1.js">
</script>
<script type="text/javascript">
alert($("form :radio[name=kosm]:checked").val());
</script>
-->
</div>
<div id="footer">
<p>&copy Усов П.Е.</p>
</div>
</body>
</html>