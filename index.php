<html>
<head>
<title>Космический сайт</title>
</head>
<body>
<p>Здравствуйте, уважаемый пользователь! Вы попали на космический сайт. Чтобы узнать что-нибудь интересное о небесных телах, заполните форму ниже.</p>
<form action="inf.php" method="POST">
<fieldset>
<p>
<label for="v1">О каких небесных телах вы хотите что-то узнать?</label>
<input type="radio" name="kosm" id="sput" value="1">Спутниках планет
<input type="radio" name="kosm" id="plan" value="2">Планетах
<input type="radio" name="kosm" id="zv" value="3">Звёздах
<input type="radio" name="kosm" id="gal" value="4">Галактиках
<input type="button" value="Проверить правильность ввода" onclick="f1()">
</p>
<p>
<label for="ras">Введите диапазон расстояний в световых годах от Земли до интересных вам космических тел в формате a..b, где a и b - целые числа:</label>
<input type="text" id="rasst" name="ra">
<input type="button" value="Проверить правильность ввода" onclick="f2()">
</p>
<p>
<input type ="submit" value="Найти информацию">
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
</script>
</body>
</html>