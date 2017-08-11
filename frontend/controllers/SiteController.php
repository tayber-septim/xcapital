<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\helpers\Url;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return  Yii::$app->response->redirect(Url::to('/profile'));
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
   
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->signup()) {

                if (Yii::$app->getUser()->login($user)) {

                    $hash = Yii::$app->request->get('ref');

                    if($hash != ''){
                        
                        $user_id = Yii::$app->user->identity->id;

                       include "components/con.php";

                        // записваем родителя текущему пользователю

                        $sql = mysqli_query($con ,"UPDATE `user` SET `parent` = '$hash' WHERE id = '$user_id' "); 

                        // проверяем получилось ли записать

                        if($sql == true){

                            // если все ок , проверяем наличие родителя у текущего родителя

                            $parent = mysqli_query($con ,"SELECT parent FROM `user` WHERE user_hash = '$hash' ");
                            
                            if($parent != ''){
                                 
                                while ( $row = mysqli_fetch_assoc( $parent) ) {
                                     
                                    $parent_1 = $row["parent"];
                                     
                                }

                                // если существует , записваем его в parent_1 ( будет получать 4% с продаж)

                                $result_parent_1 = mysqli_query($con ,"UPDATE `user` SET `parent_1` = '$parent_1' WHERE id = '$user_id'");
                                
                            }else{

                                // если пусто , выходим и редиректим на профайл

                                return Yii::$app->response->redirect(Url::to('/profile'));
                            }

                            $parent_1 = mysqli_query($con ,"SELECT parent_1 FROM `user` WHERE user_hash = '$hash' ");

                            if($parent_1 != ''){

                                while ( $row = mysqli_fetch_assoc( $parent_1) ) {
                                     
                                    $parent_2 = $row["parent_1"];
                                    
                                }
                                 // если существует , записваем его в parent_2 ( будет получать 1% с продаж)

                                $result_parent_1 = mysqli_query($con ,"UPDATE `user` SET `parent_2` = '$parent_2' WHERE id = '$user_id'");
                            }else{

                                return Yii::$app->response->redirect(Url::to('/profile'));
                            }

                        }else{

                            return Yii::$app->response->redirect(Url::to('/profile'));
                        }

                    }else{

                        return Yii::$app->response->redirect(Url::to('/profile'));
                    }    

                    return Yii::$app->response->redirect(Url::to('/profile'));
                }
            }
        }


        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    //     public function actionSignup()
    // {
   
    //     $model = new SignupForm();
    //     if ($model->load(Yii::$app->request->post())) {

    //         if ($user = $model->signup()) {
    //             if (Yii::$app->getUser()->login($user)) {
    //                 return Yii::$app->response->redirect(Url::to('/profile'));
    //             }
    //         }
    //     }

    //     return $this->render('signup', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
