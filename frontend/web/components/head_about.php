<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);

$this->beginPage(); 
$link_all = '';
//$url = $_SERVER['REQUEST_URI']; // Записываем в переменную значение адрресной строки
//$link_all = 'http://ademo.ru';
//ini_set('include_path', getenv(DOCUMENT_ROOT)."/components/"); //Устанавливаем каталог для подключения по умолчанию
//require_once("connect.php"); // Подключаемся к БД
//
// Coonect to db
//
//
// $url = explode('?', $url);
// $url_key = trim(addslashes($url[0])); // Превращаем урл в строку
// $url_go = mysql_fetch_array(mysql_query('SELECT * FROM `bs_titile` WHERE `url` = "'.$url_key.'" LIMIT 1')); // подключаемся к таблице и ищим страницу по url
// if ($url_go == '') { // Если страница не найден в бд 	 
//	$url_go['titlte'] = '404 || страница не найдна';
//	$url_go['keyword']  = '404';
//	$url_go['desription']  = '404';
// } 
?>	
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="Web-Prisma" />
	<link rel="shortcut icon" href="<?php echo($link_all);?>/images/favicon.ico"> 
	<link rel="stylesheet" type="text/css" href="<?php echo($link_all);?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo($link_all);?>/css/materialize.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo($link_all);?>/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo($link_all);?>/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo($link_all);?>/css/about_us.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php $this->head(); ?>  
</head>
<body>	
<?php $this->beginBody(); ?>  

