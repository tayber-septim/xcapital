<?php 
    use yii\helpers\Html;
    use yii\grid\GridView;
    use frontend\assets\AppAsset;
    use yii\bootstrap\Nav;
    use yii\bootstrap\NavBar;
    use common\widgets\Alert;   
    use yii\widgets\Breadcrumbs;


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


<div class="profile-user-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

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
                <?php
                /* @var $this yii\web\View */
                /* @var $searchModel frontend\models\profile\ProfileUserSearchModel */
                /* @var $dataProvider yii\data\ActiveDataProvider */

                $this->title = 'Редактирование информации';
                $this->params['breadcrumbs'][] = $this->title;
                ?>


                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                      
                        'layout'=>"{items}",
                        'columns' => [
                           
                            'username',
                            'email:email',
                            'perfectMoney',
                            'peyeer',
                            'bitcoin',
                            'qiwi',
                            'yandex',

                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update}',
                            ],
                        ],
                    ]); ?>

            </div>

        </div>
    </div>
</div>


</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>