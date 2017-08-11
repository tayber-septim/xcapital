<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model frontend\models\profile\ProfileUserModel */
/* @var $form yii\widgets\ActiveForm */
?>



    <?php $form = ActiveForm::begin(); ?>

       <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label(false) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(false) ?>

        <?= $form->field($model, 'perfectMoney')->textInput(['maxlength' => true])->label(false) ?>

        <?= $form->field($model, 'peyeer')->textInput(['maxlength' => true])->label(false) ?>

        <?= $form->field($model, 'bitcoin')->textInput(['maxlength' => true])->label(false) ?>

        <?= $form->field($model, 'qiwi')->textInput(['maxlength' => true])->label(false) ?>

        <?= $form->field($model, 'yandex')->textInput(['maxlength' => true])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
  
    <?php ActiveForm::end(); ?>
