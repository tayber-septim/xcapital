<?php
    use yii\helpers\Html;
    use yii\helpers\HtmlPurifier;
?>
<table class="table table-striped table-bordered">
    <tbody>
        <tr>
            <td><?= Html::encode($model->take) ?></td>
            <td><?= Html::encode($model->day) ?></td>
            <td><?= Html::encode($model->price) ?> - <?= Html::encode($model->maxPrice) ?></td>
            <td><?= Html::encode($model->take) ?></td>
        </tr>
    </tbody>
</table>
                   
