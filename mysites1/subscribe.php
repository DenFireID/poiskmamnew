<?php require 'block/header.php';?>
<form id="subscribe" class="containers" action="subscribe.php">
    <input type="text"  name="ntsp" placeholder="Имя*" maxlength="50">
    <input type="text"  name="ntspm" placeholder="Почта*" maxlength="40" onkeyup="var yratext=/['<','>']/; if(yratext.test(this.value)) alert('Введены запрещенные символы')">
    <button type="button">Отправить</button>
</form>
<?php
$name = strip_tags(isset($_POST['ntsp']));
$email = strip_tags(isset($_POST['ntspm']));
$formcontent="От: $name \n e-mail: $email";
$recipient = "s.krug@bk.ru";
$subject = "Форма для рассылки";
$mailheader = "Отправитель: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Ошибка!");
?>
<?php require 'block/footer.php';?>
