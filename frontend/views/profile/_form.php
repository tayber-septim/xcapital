<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\profile\ProfileUserModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-user-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perfectMoney')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'peyeer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bitcoin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qiwi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'yandex')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
