<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class ContaceController extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }


    public function actionAbout(){
        return $this->render('about');
    }

}