<?php

namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use frontend\models\TransactionModel;

class TransactionController extends \yii\web\Controller
{

    public function actionIndex()
    {

       $id = Yii::$app->user->id;

       $dataProvider = new ActiveDataProvider([
        'query' => TransactionModel::find()->where("user_id = $id"),
        'pagination' => false,
        ]);
       // var_dump($dataProvider);exit();
       return $this->render('index', [
        'dataProvider' => $dataProvider,
        ]);
   }

}
