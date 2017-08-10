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
      <div class="login">
       <?= Html::a('Logout', ['site/logout'], ['data' => ['method' => 'post']]) ?>
      </div>
      
    </div> 
</div>

<div class="all_admin">
 <!-- Подключаем левое меню навигации  -->
<?php include "components/leftAdminMenu.php" ?>
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
                      'inputOptions' => ['pattern' => '[0-9]{4,10}'],
                  ],
              ]); ?>

              <?= $form->field($model, 'amount'); ?>
              <?= $form->field($model, 'currency')->dropDownList(\frontend\models\PayPalModel::$currencies); ?>
             <!--  <?= $form->field($model, 'description')->textarea(); ?> -->

              <div class="form-group">
                  <div class="col-lg-offset-1 col-lg-11">
                      <?= Html::submitButton('pay', ['class' => 'btn btn-primary', 'id' => 'btn-primary', 'name' => 'login-button']) ?>
                  </div>
              </div>
              <?php ActiveForm::end(); ?>
          </div>
    </div>
  </div>
</div>
</section>

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
