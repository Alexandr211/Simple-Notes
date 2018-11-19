<?php
namespace app\commands;
use Yii;
//use \app\commands\Controller;
use app\models\SigninHistory;
use \yii\helpers\Console;

class HistoryController extends Controller {
    
    public function actionClear($outdatedDays = 1)
    {
      //делаем поведение int 
   $outdatedDays = (int) $outdatedDays;
   // получаем TimeStamp по состоянию на сутки назад 
   $dateTime = strtotime("-{$outdatedDays} day");
        //форматируем $dateTime в нужный формат
   $dateCritical = date("Y-m-d H:i:s", $dateTime);
   //удаляем только записи, которые старше, чем сутки назад     
   SigninHistory::deleteAll('date_time < :id', [':id' => $dateCritical]);
   
$this->stdout("\n"."Operation is done!"."\n", Console::FG_GREEN);
   //echo dirname(__FILE__);
   //$this->stdout(dirname(__FILE__)."\n", Console::FG_GREEN);
  //  $this->stdout($command->sql."\n", Console::FG_GREEN); 
  //  $this->stdout(json_encode($command->params)."\n", Console::FG_GREEN);
    return Controller::EXIT_CODE_NORMAL;
        
//  Ниже работающие настройки для CRON планировщика - вызов контроллера каждую минуту
//    */1 * * * *
//  c:/OpenServer/domains/YiiBasic/Basic/yii  history/clear

        
    }
}