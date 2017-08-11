 <?php 

use Yii;
use yii\data\ActiveDataProvider;
use frontend\models\MakeInvestsModel;
use yii\helpers\Url;

$sum = $data["PAYMENTINFO_0_AMT"];

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
$price = $data["PAYMENTINFO_0_AMT"];

// $parent = mysqli_query($con ,"SELECT parent FROM `user` WHERE id = '$user_id' ");
// var_dump($parent);exit();
// if($parent != ''){
     
//     while ( $row = mysqli_fetch_assoc( $parent) ) {
         
//         $parent = $row["parent"];
         
//     }
// }

$con = mysqli_connect("localhost","root","1111","xcapital");
$sql = mysqli_query($con ,"INSERT INTO `transaction` (`user_id`,`invest_plan_id`,`sum`, `invest_name`) VALUES ('$user_id', '$invest_plan_id', '$price', '$invest_name')"); 

 return  Yii::$app->response->redirect(Url::to('/transaction'));