<?php


namespace frontend\controllers;

use frontend\models\profile\ProfileUserModel;
use yii;


class ReferalsController extends \yii\web\Controller
{
    public function actionIndex()
    {

				
    	$user_id = Yii::$app->user->identity->id;

        	$hash = (new \yii\db\Query())->select(['user_hash'])->from('user')->where(['id' => $user_id])->limit(1)->all();
			$user_hash = $hash[0]['user_hash'];
			if($user_hash == ''){
		
				$create_user_hash = md5(uniqid(rand(),$user_id));
				$con1 = Yii::$app->db;
				// $con = mysqli_connect(Yii::$app->db);
				// var_dump($con);exit();
        		// var_dump($con);exit();
        		
				// $sql = mysqli_query("$con" ,"UPDATE `user` SET `user_hash` = '$create_user_hash' WHERE id = '$user_id' "); 


				$user = ProfileUserModel::findOne($user_id);

				$user->user_hash = $create_user_hash;


				$user->save(false);

				$link = "<p>http://xcapital.lan/site/signup/?ref=$create_user_hash</p>";

				return $this->render('index',[
			        'link' => $link,
			    ]);
        		
			}else{
			
			
			$link = "<p>http://xcapital.lan/site/signup/?ref=$user_hash</p>";

	        return $this->render('index',[
	        'link' => $link,
	        ]);

    	}
    }

}