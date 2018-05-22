<?php
namespace frontend\controllers;

use frontend\models\searches\Calendar as CalendarSearch;
use Yii;
use yii\web\Controller;

class CalendarController extends Controller{
    public function actionIndex(){
        $calendarSearch = new CalendarSearch();
        $data = $calendarSearch->getCalendars(Yii::$app->request->queryParams);

        $month = !isset(Yii::$app->request->queryParams['month']) ? 1 : Yii::$app->request->queryParams['month'];

        return $this->render('index',[
            'data' => $data,
            'month' => $month
        ]);
    }
}