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

        $con = mysqli_connect("localhost","root","1111","xcapital");
        $parent = mysqli_query($con ,"SELECT sum, invest_name  FROM `transaction` WHERE parent = '$hash' "); 

       
        if($parent){
             $parent_arr = array();
            $i = 0;
            while ( $row = mysqli_fetch_assoc( $parent) ) {
                $sum = $row['sum'];
                $parent_arr[$i]['sum'] = $row['sum'];
                $parent_arr[$i]['invest_name'] = $row['invest_name'];
                $parent_arr[$i]['percent'] = $sum/100*10; 
                $i++;       
        } 
       
        $parent_1 = mysqli_query($con ,"SELECT sum, invest_name  FROM `transaction` WHERE parent_1 = '$hash' "); 

        if($parent_1){
            $parent_arr_1 = array();
            $i = 0;
            while ( $row = mysqli_fetch_assoc( $parent_1) ) {
                $sum = $row['sum'];
                $parent_arr_1[$i]['sum'] = $row['sum'];
                $parent_arr_1[$i]['invest_name'] = $row['invest_name'];
                $parent_arr_1[$i]['percent'] = $sum/100*4;    
                $i++;    
            } 
         
        }

        $parent_2 = mysqli_query($con ,"SELECT sum, invest_name  FROM `transaction` WHERE parent_2 = '$hash' "); 

        if($parent_2){
            $parent_arr_2 = array();
            $i = 0;
            while ( $row = mysqli_fetch_assoc( $parent_2) ) {
                
                echo "</br>";
                $sum = $row['sum'];
                $parent_arr_2[$i]['sum'] = $row['sum'];
                $parent_arr_2[$i]['invest_name'] = $row['invest_name'];
                $parent_arr_2[$i]['percent'] = $sum/100*1;    
                $i++;   
            } 

            // return  $parent_arr_2;
        }

// var_dump($parent_arr_2);exit();
    }
//        $dataProvider = new ActiveDataProvider([
//         'query' => ReferalSystemModel::find()->where("parent = '$hash'" ),
//         'pagination' => false,
//         ]);

//          $dataProvider_1 = new ActiveDataProvider([
//         'query' => ReferalSystemModel::find()->where("parent_1 = '$hash'" ),
//         'pagination' => false,
//         ]);
//        // $data = new [];
//        // $data = $dataProvider + $dataProvider_1;

       return $this->render('index', [
        'parent' => $parent_arr,
        'parent_1' => $parent_arr_1,
        'parent_2' => $parent_arr_2,
        ]);
           // return $this->render('index');
   }
    

 
}
