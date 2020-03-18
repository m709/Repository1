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
echo "<p>Вы не выбрали небесные тела, о которых хотите узнать.</p>";
break;
}
} else{
echo "Данные были отправлены не формой. Отправьте, пожалуйста, данные с помощью <a href='form.php'>формы</a>.";
}
?>