<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $model frontend\models\profile\ProfileUserModel */
// var_dump($model->id);exit();

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


<section>
<div class="adm-containter section-content">
  <div class="personal">

<?php

if($model->id == Yii::$app->user->identity->id){

	$this->title = 'Update Profile : ' . $model->username;
	$this->params['breadcrumbs'][] = ['label' => 'Profile User Models', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Update';
	?>
	<div class="profile-user-model-update">

		<h1><?= Html::encode($this->title) ?></h1>

		<?= $this->render('_form', [
			'model' => $model,
		]) ?>
	</div>

	<?php }else{

		return Yii::$app->response->redirect(Url::to('/profile'));
	}?>


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
