<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Username;


/**
 * Site controller
 */
class MemberController extends Controller{
    public function actionResume(){
        $model = new Username();
        return $this->render('resume');
    }
    public function actionApply(){
        return $this->render('apply');
    }
    public function actionCollect(){
        return $this->render('collect');
    }

}