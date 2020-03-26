<html>
<head>
<title>Космический сайт</title>
<link rel='stylesheet' type='text/css' href='stili.css'>
</head>
<body class='grid-container'>
<div id="header">
<p>Вы хотите узнать о спутниках, которые обладают следующими свойствами:</p>
</div>
<div id="content">
<form action="inf1.php" method="post">
<fieldset>
<p>
<label for="ras">Находятся на расстоянии в диапазоне от <input type="text" id="rasst1" name="ra1"> до <input type="text" id="rasst2" name="ra2"> выбранных единиц измерения от родительской планеты: </label>
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
<label for="tems">Имеют температуру в диапазоне от <input type="text" id="tz1" name="tez1"> до <input type="text" id="tz2" name="tez2"> выбранных единиц измерения: </label>
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