<? php
namespace app\components;

use yii\base\Behavior;

class AuthBehavior extends Behavior
{   
   public $idAuth = Yii::$app->user->id;
   public $query->andFilterWhere(['like', 'creator', $idAuth]); 
}

?>