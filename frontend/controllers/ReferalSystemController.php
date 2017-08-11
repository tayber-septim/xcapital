<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ReferalSystemModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;


/**
 * ReferalSystemController implements the CRUD actions for ReferalSystemModel model.
 */
class ReferalSystemController extends Controller
{
    public function actionIndex()
    {

         $hash = Yii::$app->user->identity->user_hash;

       $dataProvider = new ActiveDataProvider([
        'query' => ReferalSystemModel::find()->where("user_hash = '$hash'"),
        'pagination' => false,
        ]);
       // var_dump($dataProvider);exit();
       return $this->render('index', [
        'dataProvider' => $dataProvider,
        ]);
    }
    

 
}
