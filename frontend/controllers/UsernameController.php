<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Username;

/**
 * Site controller
 */
class UsernameController extends Controller
{
     public $enableCsrfValidation=false;

    public function actionUser_info(){


        if(isset($_COOKIE["tel"])){
            $post=yii::$app->request->post();

            $model = new Username();
            if($post){
                var_dump($post);exit;
            }else{
                $n = date('Y-m-d H:i:s',time());
                $ni = substr($n,0,4);
                $nian = array();
                for($i=0;$i<100;$i++){
                    $nian[] = $ni-$i;
                }
                return $this->render('user_info',['model'=>$model,'nian'=>$nian]);
            }
        }else{
            return $this->redirect("?r=username/login");
        }

    }
}