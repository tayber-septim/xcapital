<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\profile\ProfileUserModel */
// var_dump($model->id);exit();

if($model->id == Yii::$app->user->identity->id){
	$this->title = 'Update Profile User Model: ' . $model->username;
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