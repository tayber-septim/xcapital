<?php 
  use yii\helpers\Html;
  use yii\grid\GridView;
  use frontend\assets\AppAsset;
  use yii\bootstrap\Nav;
  use yii\bootstrap\NavBar;
  use common\widgets\Alert;   
  use yii\widgets\Breadcrumbs;


use frontend\controllers\ReferalSystemController;


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
<div class="adm-containter section-content">
  <div class="personal">
   
   
<div class="col-md-10">
<table class='table table-striped table-bordered'>
    <tbody>
        <tr>
            <?php

            for ($i=0;$i<count($parent);$i++){

                 echo "<td>"; 
                 $parent[$i]['percent'] ;
                  echo "</td>";

            }

            ?>
        </tr>
    </tbody>
</table>
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
