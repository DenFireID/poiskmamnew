<?php
    $name = strip_tags(isset($_POST['ntsp']));
    $email = strip_tags(isset($_POST['ntspm']));
    $formcontent = "От: $name  e-mail: $email";
    $recipient = "s.krug@bk.ru";
    $subject = "Форма для рассылки";
    $mailheader = "Отправитель: $email ";
    mail($recipient, $subject, $formcontent, $mailheader) or die("Ошибка");
