 <?php 


use Yii;
use yii\data\ActiveDataProvider;
use frontend\models\MakeInvestsModel;
use frontend\controllers\TransactionController;
use yii\helpers\Url;


// Success();
// $this->TransactionController->actionSuccess;
$sum = $data["PAYMENTINFO_0_AMT"];
// var_dump($sum);

$user_id = Yii::$app->user->identity->id;

$invest = (new \yii\db\Query())
    ->select(['price','id','name','day','take','maxPrice'])
    ->from('invests')
    ->where([ '<=' ,'price',"$sum",])
    ->andWhere([ '>=' ,'maxPrice',"$sum",])
    ->limit(10)
    ->all();
   
$invest_plan_id = $invest[0]['id'];
$invest_name = $invest[0]['name'];
$price = $data["PAYMENTINFO_0_AMT"];



$con=mysqli_connect("localhost","root","1111","xcapital");
$sql = mysqli_query($con ,"INSERT INTO `transaction` (`user_id`,`invest_plan_id`,`sum`, `invest_name`) VALUES ('$user_id', '$invest_plan_id', '$price', '$invest_name')"); 

 return  Yii::$app->response->redirect(Url::to('/transaction'));