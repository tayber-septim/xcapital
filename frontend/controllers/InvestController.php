<?php

namespace frontend\controllers;

use frontend\models\PayPalModel;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


/**
 * Class PayPalController
 */

class InvestController extends Controller
{

    /**
     * @return string
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

    public function actionIndex()
    {
     
        $model = new PayPalModel();
        $model->setScenario(PayPalModel::SCENARIO_PAY);
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $currency = PayPalModel::$currencies[$model->currency];
            $amount = $model->amount;
            $transactionData = \Yii::$app->paypal->getTransactionToken($amount, $currency);
            if ($transactionData['ACK'] == 'Success') {
                \Yii::$app->paypal->goToExpressCheckout($transactionData['TOKEN']);
            } else {
                return $this->redirect(['error']);
            }
        }

        $viewData = [
        'model' => $model
        ];

        return $this->render('index', $viewData);
    }

    /**
     * @return string
     */
    public function actionSuccess()
    {
        $token = $this->getToken();
        if ($token) {

            $data = \Yii::$app->paypal->getDetails($token);
            if ($data) {
                $token = $this->getToken($data);

                $amt = isset($data['PAYMENTREQUEST_0_AMT']) ? $data['PAYMENTREQUEST_0_AMT'] : 0;
                $payerId = isset($data['PAYERID']) ? $data['PAYERID'] : 0;
                $currency = isset($data['PAYMENTREQUEST_0_CURRENCYCODE']) ? $data['PAYMENTREQUEST_0_CURRENCYCODE'] : 0;

                if (!$amt && !$payerId && !$currency && !$token) {
                    return $this->render('error');
                }

                $confirmData = \Yii::$app->paypal->confirm($token, $payerId, $amt, $currency);
                if (isset($confirmData['ACK']) && $confirmData['ACK'] == 'Success') {
                    return $this->render('success', ['data' => $confirmData]);
                }
            }
        }

        return $this->render('error');
    }


    /**
     * @return string
     */
    public function actionError()
    {
        $token = $this->getToken();
        return $this->render('error', ['token' => $token]);
    }


    /**
     * @param array $data
     * @return array|int|mixed
     */
    private function getToken($data = [])
    {
        if ($data) {
            $token = isset($data['TOKEN']) ? $data['TOKEN'] : 0;
            if (!$token) {
                $token = isset($data['token']) ? $data['token'] : 0;
            }
        } else {
            $token = \Yii::$app->request->get('TOKEN', 0);
            if (!$token) {
                $token = \Yii::$app->request->get('token', 0);
            }
        }


        return $token;
    }
}