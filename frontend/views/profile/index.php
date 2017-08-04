<?php 
  use yii\helpers\Html;
  use yii\grid\GridView;
  use frontend\assets\AppAsset;
  use yii\bootstrap\Nav;
  use yii\bootstrap\NavBar;
  use common\widgets\Alert;   
  use yii\widgets\Breadcrumbs;



include "components/head_profile.php";
?>


<?php $this->beginBody() ?>

<div class="section_name">
    <div class="adm-containter">
      <h2><?= Yii::$app->user->identity->username ?></h2>
   
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
<div class="adm-containter section-content">
  <div class="personal">
   
   
        <h6>PERSONAL INFORMATION</h6><br>

      <input type="text" name="name" value="<?= Yii::$app->user->identity->username ?>"><br>
      <input type="text" name="username" value="<?= Yii::$app->user->identity->email ?>"><br><br>

      <div class="second_form">

        <h6>E-CURREncies</h6><br>
        <input type="text" name="money_acc" value="<?= Yii::$app->user->identity->perfectMoney ?>" ><br>
        <input type="text" name="pay_acc" value="<?= Yii::$app->user->identity->peyeer ?>"><br>
        <input type="text" name="bit_acc" value="<?= Yii::$app->user->identity->bitcoin ?>"><br>
        <input type="text" name="qiwi_acc" value="<?= Yii::$app->user->identity->qiwi ?>"><br>
        <input type="text" name="yand_acc" value="<?= Yii::$app->user->identity->yandex ?>"><br>

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
