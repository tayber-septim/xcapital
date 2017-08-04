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
       <a href="/site/login">Log in</a>
       
      </div>
    </div> 
</div>

<div class="all_admin">
<aside>
  <div class="logo">
    <a href="../"><img src="/img/logo.jpg"></a>
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
    
    <p>PERSONAL INFORMATION</p>
    <br>

    <?= $form->field($model, 'username')->textInput(['autofocus' => false,'placeholder'=>"Your Full Name"])->label(false) ?>

    <?=  $form->field($model, 'email')->textInput(['placeholder'=>"Your E-mail Address"])->label(false) ?>

    <?= $form->field($model, 'password')->passwordInput()->textInput(['placeholder'=>"Your Password"])->label(false) ?>

    <p>E-CURRENCIES</p>

    <br>

    <?=  $form->field($model, 'perfectMoney')->textInput(['placeholder'=>"Your PerfectMoney Account"])->label(false) ?>

    <?=  $form->field($model, 'peyeer')->textInput(['placeholder'=>"Your Payeer Account"])->label(false) ?>

    <?=  $form->field($model, 'bitcoin')->textInput(['placeholder'=>"Your Bitcoin Account"])->label(false) ?>

    <?=  $form->field($model, 'qiwi')->textInput(['placeholder'=>"Your Qiwi Account"])->label(false) ?>
    
    <?=  $form->field($model, 'yandex')->textInput(['placeholder'=>"Your YandexMoney Account"])->label(false) ?>

<!--         <?= Html::submitButton('Signup', ['class' => 'btn btn-primary submit', 'name' => 'signup-button']) ?> -->
        <input type="checkbox" class="checkbox" name="condition"> 
        <label for="checkbox">I agree with Term & Conditions</label>
       <input type="submit" class="submit" name="signinbtn" value="sign in">
  

<?php ActiveForm::end(); ?>

  </div>
</div>

</section>


</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>