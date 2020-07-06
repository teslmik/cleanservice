<? // #начало Обработчик данных
header("Content-Type: text/html; charset=UTF-8");

if($_POST['name']) { $name = htmlspecialchars ($_POST['name']); }
if($_POST['phone']) { $phone = htmlspecialchars ($_POST['phone']); }
$ip_r = $_SERVER['REMOTE_ADDR'];

$product = "Himchistka"; // Подпись отправителя

if($_POST['email']) { $memail = htmlspecialchars ($_POST['email']); } else { $memail = '<span style="color:grey;">Данных нет</span>'; }
if($_POST['message']) { $mmessage = htmlspecialchars ($_POST['message']); } else { $mmessage = '<span style="color:grey;">Данных нет</span>'; }

$name1 =  substr(htmlspecialchars(trim($name)), 0, 100); 
$phone1 =  substr(htmlspecialchars(trim($phone)), 0, 20);

if(empty($name1)) {
	echo '<h2><p align=center><font color="red">Внимание! Запрещено отправлять пустые поля.<br> Вернитесь и заполните обязательные поля <b>"Имя"</b> и <b>"Телефон"</b></font><br><br><a href="javascript:history.back()">Вернуться назад</a></p></h2>';
	exit; }
	
if(empty($phone1)) {
	echo '<h2><p align=center><font color="red">Внимание! Запрещено отправлять пустые поля.<br> Вернитесь и заполните обязательные поля <b>"Имя"</b> и <b>"Телефон"</b></font><br><br><a href="javascript:history.back()">Вернуться назад</a></p></h2>';
	exit; } 
	
$tema_r = 'ЗАЯВКА: Химчистка ковров и мягкой мебели';	 
$to = "Konstantin.prasolov@gmail.com"; // ЗДЕСЬ МЕНЯЕМ ПОЧТУ НА КОТОРУЮ ПРИХОДЯТ ЗАКАЗЫ!
$from="{$product} <noreply@{$_SERVER['HTTP_HOST']}>"; // Адрес отправителя

$subject="=?utf-8?B?". base64_encode("$tema_r"). "?=";
$header="From: $from"; 
$header.="\nContent-type: text/html; charset=\"utf-8\"";
$message = 'Имя: '.$name.' <br>Телефон: '.$phone.' <br>Email: '.$memail.' <br>Сообщение от клиента: '.$mmessage.' <br><br>Заявка с лендинга: http://'.$_SERVER['SERVER_NAME'].' <br>IP адрес клиента: <a href="http://ipgeobase.ru/?address='.$ip_r.'">'.$ip_r.'</a><br>Время заявки: '.date("Y-m-d H:i:s").'';
?>

<?if(mail($to, $subject, $message, $header)):?>True<?endif;?>