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
<p>Вы хотите узнать о планетах, которые обладают следующими свойствами:</p>
</div>
<div id="content">
<form action="inf1.php" method="post">
<fieldset>
<p>
<label for="ras">Находятся на расстоянии в диапазоне от a до b выбранных единиц измерения от родительской звезды (введите a..b или ничего не вводите): </label>
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
<label for="ti">Имеют выбранный тип: </label>
<select name="tp" size="1">
<option value="all" selected>Неважно какой</option>
<option value="hu">Холодный юпитер</option>
<option value="gu">Горячий юпитер</option>
<option value="hn">Холодный нептун</option>
<option value="gn">Горячий нептун</option>
<option value="vg">Водный гигант</option>
<option value="lg">Ледяной гигант</option>
<option value="sz">Суперземля</option>
<option value="mez">Мегаземля</option>
<option value="miz">Миниземля</option>
<option value="po">Планета-океан</option>
</select>
</p>
<p>
<label for="ims">Имеют спутники</label>
<select name="is" size="1">
<option value="all2" selected>Неважно</option>
<option value="Tr">Да</option>
<option value="Fa">Нет или неизвестно</option>
</select>
</p>
<p>
<input type ="submit" name="Submit3" value="Найти информацию">
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
</script>
</div>
<div id="footer">
<p>&copy Усов П.Е.</p>
</div>
</body>
</html>