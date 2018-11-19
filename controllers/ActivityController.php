<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\Activity;

class ActivityController extends Controller
{
    public function actionIndex()
    {
       // return "Контроллер активностей";
        if(\Yii::$app->request->get('id_activity') > 0){
            
            $mod = ['id_user' => 1, 'name' => 'Alex'];
            
            return $this->render('index1', ['model' => $mod]);
            }
            else{
                return $this->render('no_access');
            }
        }
        
    

   
    
public function actionCreate()
    {
        //return "Создание активности";
$model = new Activity();
        return $this->render('index', [
    'model' => $model,
]);

    }

}
