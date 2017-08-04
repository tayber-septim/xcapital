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
        <a href="/"><img src="img/logo.jpg"></a>
      </div>
      <ul>
        <li>
          <a href="/">
            <img src="img/quit.png" alt=""> Back to Home Page
          </a>
        </li>
      </ul>
      
    </aside>
    <section>
        <div class="adm-containter section-content">
          <div class="personal">
                    <?php 
                    $form = ActiveForm::begin(['id' => 'login-form',
                        'options' => ['class' => '','wrapper' => ''],
                        
                        'fieldConfig' => [
                           
                            'template' => "{input}",
                            'labelOptions' => ['class' => ''],
                            'options' => ['class' => 'war'],
                        ],
                    ]); ?>

                        <h6>LOGIN TO YOUR ACCOUNT</h6><br>

                      

                      <?= $form->field($model, 'username',[
                            'inputTemplate' => '{input}',


                      ])->textInput(['autofocus' => true]) ?> 

                        <?= $form->field($model, 'password')->passwordInput() ?> 
<!-- 
                        <?= $form->field($model, 'rememberMe')->checkbox([
                            'class'=>'example',
                        ])->label('Запомнить') ?> -->

                     <!--    <div style="color:#999;margin:1em 0">
                            If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?> 
                        </div> -->

                        
                        <?= Html::submitButton('Login', ['class' => 'btn  submit', 'name' => 'login-button']) ?> 
                        

                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </section>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
