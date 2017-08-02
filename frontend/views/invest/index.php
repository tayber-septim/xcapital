<?php 
    namespace common\components;

    use Yii;
	use yii\helpers\Html;
	use yii\bootstrap\Nav;
	use yii\bootstrap\NavBar;
	use yii\widgets\Breadcrumbs;
	use frontend\assets\AppAsset;
    use common\widgets\Alert;   
    use app\common\components\Paypal;

    if(!Yii::$app->user->isGuest){
	AppAsset::register($this);
	$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

		<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'XCapital',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

<!-- print_r(Yii::$app->paypal->payDemo()); -->

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>


       
    </div>

    <div class="container">
    	<div class="row">
    		<div class="col-md-2">
    			<div class="sidebar" id="sidebar">
    				<ul class="nav nav-list">
    					<li>
    						<a href="/profile">
    							<i class="icon-question"></i>
    							<span class="menu-text">My account</span>
    						</a>
    					</li>
    					<li>
    						<a href="/invest">
    							<i class="icon-question"></i>
    							<span class="menu-text">Make invest</span>
    						</a>
    					</li>
    				</ul>
    			</div>
    		</div>

            <div class="col-md-10">
            <!--     <form action="https://demomoney.yandex.ru/eshop.xml" method="post">
                    
                    <input name="shopId" value="151" type="hidden"/>
                    <input name="scid" value="4100324820742" type="hidden"/>
                    <input name="customerNumber" value="100500"/>
                    <input name="sum" value="100">
                    Способ оплаты:<br>
                    <input name="paymentType" value="PC" type="radio">Оплата из кошелька в Яндекс.Деньгах<br>
                    <input name="paymentType" value="AC" type="radio">Оплата с произвольной банковской карты<br>
                    <input name="paymentType" value="GP" type="radio">Оплата наличными через кассы и терминалы<br><br>
                    <input type="submit" value="Заплатить"/>
                </form> -->

            </div>

    	</div>
    </div>
</div>

<?php
	}
?>	



<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>