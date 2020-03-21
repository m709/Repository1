<html>
<head>
<title>Космический сайт</title>
<style>
div{
background: url(2.png);
margin: -16px;
}
p{
color: #87CEFA;
}
a{
color: #00FF7F;
}
</style>
</head>
<body>
<div id="header">
<p>Вы хотите узнать о спутниках, которые обладают следующими свойствами:</p>
</div>
<div id="content">
<form action="inf1.php" method="post">
<fieldset>
<p>
<label for="ras">Находятся на расстоянии в диапазоне от a до b выбранных единиц измерения от родительской планеты (введите a..b или ничего не вводите): </label>
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
<label for="tems">Имеют температуру в диапазоне от a до b выбранных единиц измерения (введите a..b или ничего не вводите): </label>
<input type="text" id="tz" name="tez">
<select name="ed1" size="1">
<option value="K" selected>Кельвины</option>
<option value="C">Градусы Цельсия</option>
</select>
<input type="button" value="Проверить правильность ввода" onclick="f3()">
</p>
<p>
<input type ="submit" name="Submit4" value="Найти информацию">
</p>
</fieldset>
</form>
<script>
function f2(){
var input=document.getElementById('rasst');
var s=input.value;
if(s==""){
alert("Великолепно! В этом поле ошибок нет.");
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
var input=document.getElementById('tz');
var s=input.value;
if(s==""){
alert("Великолепно! В этом поле ошибок нет.");
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
</div>
<div id="footer">
<p>&copy Усов П.Е.</p>
</div>
</body>
</html>