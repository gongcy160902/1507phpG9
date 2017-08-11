<?php
namespace frontend\controllers;
use app\models\Details;
use yii;
use yii\web\Controller;
class ApplyController extends Controller{
    public $enableCsrfValidation = false;
    public $layout ="apply";
    public function actionApply_info(){
        $model = new Details();
        $request = Yii::$app->request;
        if($request->isPost){
            if($model->load($request->post()) && $model->validate()){
                $model->save();
                $this->redirect('?r=apply/apply_resume');
            }
        }
        return $this->render('apply_info');
    }

//    function actionApply_resume()
//    {
//        return $this->render('apply_resume');
//    }
//    function actionApply_review()
//    {
//        return $this->render('Apply_review');
//    }

}


?>