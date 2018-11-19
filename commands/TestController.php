<?php 
namespace app\commands;
//use yii\console\Controller;
use \yii\helpers\Console;
use \app\commands\Controller;
class TestController extends Controller
{
    public function actionMethod1($arg1, $arg2) {
    if (empty($arg1) || empty($arg2))
    {
        return Controller::EXIT_CODE_WARNING;
    }
       $this->stdout("\nHello, My Friend! \n", Console::BG_GREEN);
        // echo "Hello, My Friend!\n";
        return Controller::EXIT_CODE_NORMAL;    
    }
    
}