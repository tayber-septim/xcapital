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



<div class="all_admin">
<aside>
  <div class="logo">
    <a href="/"><img src="img/logo.jpg"></a>
  </div>
  <ul>
    <li>
      <a href="../">
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
                /* @var $this yii\web\View */
                /* @var $searchModel frontend\models\profile\ProfileUserSearchModel */
                /* @var $dataProvider yii\data\ActiveDataProvider */

                $this->title = 'Редактирование информации';
                $this->params['breadcrumbs'][] = $this->title;
                ?>

                <?= 
                  GridView::widget([
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
