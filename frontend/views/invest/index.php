<?php 
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
namespace common\components;

use Yii;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;  
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use frontend\models\MakeInvestsModel;
use yii\widgets\ListView;

// подключаем Шапку html разметки
include "components/head_profile.php";
?>

<?php $this->beginBody() ?>

<div class="section_name">
    <div class="adm-containter">
      <h2><?= Yii::$app->user->identity->username ?></h2>
     <h4 style="font-weight: bold;color: #c00;"> </h4>
      
    </div> 
</div>

<div class="all_admin">
<aside>
  <div class="logo">
    <a href="/"><img src="/img/logo.jpg"></a>
  </div>
  <ul>
    <li>
      <a href="/">
        <img src="/img/quit.png" alt=""> Back to Home Page
      </a>
    </li> 
    <li>
      <a href="/profile">
        <img src="/img/quit.png" alt=""> Profile
      </a>
    </li> 
    <li>
      <a href="/invest">
        <img src="/img/quit.png" alt=""> Invest
      </a>
    </li>
  </ul>
  
</aside>

<section>
<div class="wrap">
  <div class="adm-containter section-content">
    <div class="personal">
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
       <div>PayPal</div>
         <div class="site-login">
              <h1><?= Html::encode($this->title) ?></h1>
              <?php $form = ActiveForm::begin([
                  'id' => 'login-form',
                  'layout' => 'horizontal',
                  'fieldConfig' => [
                      'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                      'labelOptions' => ['class' => 'col-lg-1 control-label'],
                  ],
              ]); ?>

              <?= $form->field($model, 'amount'); ?>
              <?= $form->field($model, 'currency')->dropDownList(\frontend\models\PayPalModel::$currencies); ?>
             <!--  <?= $form->field($model, 'description')->textarea(); ?> -->

              <div class="form-group">
                  <div class="col-lg-offset-1 col-lg-11">
                      <?= Html::submitButton('pay', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                  </div>
              </div>
              <?php ActiveForm::end(); ?>
          </div>
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
