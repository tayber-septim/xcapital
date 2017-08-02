<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\profile\ProfileUserModel */

$this->params['breadcrumbs'][] = ['label' => 'Profile User Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-user-model-view">
<p>Данные успешно сохранены</p>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            'perfectMoney',
            'peyeer',
            'bitcoin',
            'qiwi',
            'yandex',
        ],
    ]) ?>

</div>
