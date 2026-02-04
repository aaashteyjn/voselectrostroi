<?php
// Куда отправляем
$to = "dashalyusina@yandex.ru";

// Тема письма
$subject = "Заявка с сайта ВОСЭЛЕКТРОСТРОЙ";

// Данные из формы
$name    = htmlspecialchars($_POST['name'] ?? '');
$phone   = htmlspecialchars($_POST['phone'] ?? '');
$email   = htmlspecialchars($_POST['email'] ?? '');
$message = htmlspecialchars($_POST['message'] ?? '');

// Тело письма
$body = "
Новая заявка с сайта ВОСЭЛЕКТРОСТРОЙ

Имя: $name
Телефон: $phone
E-mail: $email

Сообщение:
$message
";

// Заголовки
$headers = "From: no-reply@voselectrostroy.ru\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

// Отправка
if (mail($to, $subject, $body, $headers)) {
  header("Location: thanks.html");
  exit;
} else {
  echo "Ошибка отправки. Попробуйте позже.";
}
