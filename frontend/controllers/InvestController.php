<?php

namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use frontend\models\MakeInvestsModel;
use yii\helpers\Url;

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


                    $sum = $data['AMT'];

                    $user_id = Yii::$app->user->identity->id;

                    $invest = (new \yii\db\Query())
                        ->select(['price','id','name','day','take','maxPrice'])
                        ->from('invests')
                        ->where(['<=' ,'price',"$sum",])
                        ->andWhere(['>=' ,'maxPrice',"$sum",])
                        ->limit(1)
                        ->all();

                    $invest_plan_id = $invest[0]['id'];
                    $invest_name = $invest[0]['name'];
                    $price = $data["AMT"];
                    $user_name = Yii::$app->user->identity->username;
                    $percent_10 = '10%';
                    $percent_4 = '4%';
                    $percent_1 = '1%';

                    $con = mysqli_connect("localhost","root","1111","xcapital");
                    $parent = mysqli_query($con ,"SELECT parent , parent_1 , parent_2 FROM `user` WHERE id = '$user_id' ");

                    if($parent != ''){
                         
                        while ( $row = mysqli_fetch_assoc( $parent) ) {

                            $parent_transact = $row["parent"];
                            $parent_1 = $row["parent_1"];         
                            $parent_2 = $row["parent_2"];         
                             
                        }

                        if($parent_transact != ''){
                            $sum = $price/100*10; 
                            $sql = mysqli_query($con ,"INSERT INTO `referal_system` (`user_hash`,`sum`,`percent`,`invest_name`,`user_name`,`user_id`,`your_percent`) VALUES ('$parent_transact','$price','$sum','$invest_name','$user_name','$user_id','$percent_10')"); 

                        } 

                        if($parent_1 != ''){
                            $sum = $price/100*4; 
                            $sql = mysqli_query($con ,"INSERT INTO `referal_system` (`user_hash`,`sum`,`percent`,`invest_name`,`user_name`,`user_id`,`your_percent`) VALUES ('$parent_1','$price','$sum','$invest_name','$user_name','$user_id','$percent_4')"); 

                        } 

                        if($parent_2 != ''){
                            $sum = $price/100*1; 
                            $sql = mysqli_query($con ,"INSERT INTO `referal_system` (`user_hash`,`sum`,`percent`,`invest_name`,`user_name`,`user_id`,`your_percent`) VALUES ('$parent_2','$price','$sum','$invest_name','$user_name','$user_id','$percent_1')"); 

                        }

                    }

                    // var_dump($parent_transact ,$parent_1 , $parent_2);exit();
                    $sql = mysqli_query($con ,"INSERT INTO `transaction` (`user_id`,`invest_plan_id`,`sum`, `invest_name`,`parent`,`parent_1`,`parent_2`) VALUES ('$user_id', '$invest_plan_id', '$price', '$invest_name', '$parent_transact', '$parent_1' , '$parent_2')"); 

                    return  Yii::$app->response->redirect(Url::to('/transaction'));
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