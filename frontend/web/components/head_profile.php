<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);

$this->beginPage(); 
$link_all = '';
 
    AppAsset::register($this);
    $this->beginPage();
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
	<link rel="stylesheet" type="text/css" href="<?php echo($link_all);?>/css/materialize.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo($link_all);?>/css/materialize.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo($link_all);?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo($link_all);?>/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php $this->head(); ?>  
</head>
<body>	
<?php $this->beginBody(); ?>  
