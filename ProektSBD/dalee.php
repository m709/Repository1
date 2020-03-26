<?
session_start();
if($_POST['Submit']){
$a=$_POST['kosm'];
//echo "$a";
switch($a){
case '1':
header("Location: sput.php");
exit;
break;
case '2':
header("Location: plan.php");
exit;
break;
case '3':
header("Location: zv.php");
exit;
break;
case '4':
header("Location: gal.php");
exit;
break;
case '':
print("<html>");
print("<head>");
print("<title>Космический сайт</title>");
print("<link rel='stylesheet' type='text/css' href='stili.css'>");
print("</head>");
print("<body class='grid-container'>");
print("<div id='header'>");
print("<p>Вы на космическом сайте.</p>");
print("</div>");
print("<div id='content'>");
print("<p>Вы не выбрали небесные тела, о которых хотите узнать.</p>");
print("</div>");
print("<div id='footer'>");
print("<p>&copy Усов П.Е.</p>");
print("</div>");
print("</body>");
print("</html>");
break;
}
} else{
print("<html>");
print("<head>");
print("<title>Космический сайт</title>");
print("<link rel='stylesheet' type='text/css' href='stili.css'>");
print("</head>");
print("<body class='grid-container'>");
print("<div id='header'>");
print("<p>Вы на космическом сайте.</p>");
print("</div>");
print("<div id='content'>");
print("<p>Данные были отправлены не формой. Отправьте, пожалуйста, данные с помощью <a href='form.php'>формы</a>.</p>");
print("</div>");
print("<div id='footer'>");
print("<p>&copy Усов П.Е.</p>");
print("</div>");
print("</body>");
print("</html>");
}
?>