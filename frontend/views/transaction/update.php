<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TransactionModel */

$this->title = 'Update Transaction Model: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transaction Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transaction-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
