<?php
namespace console\controllers;

use common\models\Visitcount;
use Yii;
use yii\console\Controller;
 
class ViewController extends Controller
{
    public function actionCount()
    {
        $count = new Visitcount();
        $count->date = $date = date('Y-m-d');
        $today = Yii::$app->redis->get('view_count');
        $count->count = is_null($today) ? 0 : $today;
        $count->save();
    }
}