<?php

namespace frontend\controllers;

use Yii;
use frontend\models\profile\ProfileUserModel;
use frontend\models\profile\ProfileUserSearchModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;


/**
 * ProfileController implements the CRUD actions for ProfileUserModel model.
 */
class ProfileController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors(){

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    /**
     * Lists all ProfileUserModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $id = Yii::$app->user->id;

         $dataProvider = new ActiveDataProvider([
            'query' => ProfileUserModel::find()->where("id = $id"),
            'pagination' => false,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProfileUserModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing ProfileUserModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the ProfileUserModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProfileUserModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProfileUserModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
