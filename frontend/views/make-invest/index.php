<?php 
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */


use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;  
use yii\bootstrap\ActiveForm;
use frontend\models\MakeInvestsModel;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

// подключаем Шапку html разметки
include "components/head_profile.php";
?>

<?php $this->beginBody() ?>

<div class="all_admin">
<aside>
  <div class="logo">
    <a href="/"><img src="img/logo.jpg"></a>
  </div>
  <ul>
    <li>
      <a href="/">
        <img src="img/quit.png" alt=""> Back to Home Page
      </a>
    </li>

    <li>
      <a href="/profile">
        <img src="img/quit.png" alt=""> Profile
      </a>
    </li>

    <li>
      <a href="/invest">
        <img src="img/quit.png" alt=""> Invest
      </a>
    </li>
    <li>
      <a href="/make-invest">
        <img src="img/quit.png" alt=""> Make invest
      </a>
    </li>
  </ul>
  
</aside>
<section>  
  <div class="adm-containter section-content">
    <div class="peronal">
       <div class="col-md-10">
             <?php
                $dataProvider = new ActiveDataProvider([

                    'query' => MakeInvestsModel::find(),
                    'pagination' => [
                        'pageSize' => 20,
                    ],
                ]);
                 
                echo ListView::widget([
                  'layout'=>"{items}",
                    'dataProvider' => $dataProvider,
                    'itemView' => '_list',
                ]);
            ?>
      </div>
    </div>
  </div>
</section>
</div>
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
