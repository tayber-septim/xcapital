<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TransactionModel */

$this->title = 'Create Transaction Model';
$this->params['breadcrumbs'][] = ['label' => 'Transaction Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
