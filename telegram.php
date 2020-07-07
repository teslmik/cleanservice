<?php

/* https://api.telegram.org/bot1228994626:AAHUNA2k_0Sj3KYU3MfZW2Yrp6Ml8dzOoQE/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

// $name = $_POST['user_name'];
$phone = $_POST['phone'];
// $email = $_POST['user_email'];
$token = "1228994626:AAHUNA2k_0Sj3KYU3MfZW2Yrp6Ml8dzOoQE";
$chat_id = "-469883320";
$arr = array(
  'Заявка на химчистку!!!'
  // 'Имя пользователя: ' => $name,
  'Телефон: ' => $phone
  // 'Email' => $email
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  header('Location: thank-you.html');
} else {
  echo "Error";
}
?>
