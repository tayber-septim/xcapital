<?php 
    use yii\helpers\Html;
    use yii\grid\GridView;
    use frontend\assets\AppAsset;
    use yii\bootstrap\Nav;
    use yii\bootstrap\NavBar;
    use common\widgets\Alert;   
    use yii\widgets\Breadcrumbs;
    use yii\bootstrap\ActiveForm;

include "components/head_login.php";
?>


<?php $this->beginBody() ?>

<div class="section_name">
    <div class="adm-containter">
      <h2>LOG IN</h2>
      <div class="login">
       <a href="sign_in.php">SIGN IN</a>
       
      </div>
    </div> 
</div>

<div class="all_admin">
<aside>
  <div class="logo">
    <a href="../"><img src="img/logo.jpg"></a>
  </div>
  <ul>
    <li>
      <a href="../">
        <img src="img/quit.png" alt=""> Back to Home Page
      </a>
    </li>
  </ul>
  
</aside>

<section>
<div class="adm-containter section-content">
  <div class="personal">
   
   <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
    
    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?=  $form->field($model, 'email') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <p>E-CURRENCIES</p>

    <?=  $form->field($model, 'perfectMoney') ?>

    <?=  $form->field($model, 'peyeer') ?>

    <?=  $form->field($model, 'bitcoin') ?>

    <?=  $form->field($model, 'qiwi') ?>
    
    <?=  $form->field($model, 'yandex') ?>

    <div class="form-group">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>

<?php ActiveForm::end(); ?>

  </div>
</div>

</section>


</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>