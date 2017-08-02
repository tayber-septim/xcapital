<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\profile\ProfileUserModel */

$this->title = 'Create Profile User Model';
$this->params['breadcrumbs'][] = ['label' => 'Profile User Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-user-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
