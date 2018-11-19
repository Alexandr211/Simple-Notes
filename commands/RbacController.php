<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        
        $auth->removeAll(); //На всякий случай удаляем старые данные из БД...

        // добавляем разрешение "View"
        $View = $auth->createPermission('View');
        $View->description = 'View';
        $auth->add($View);

        // добавляем разрешение "updatePost"
    //    $updatePost = $auth->createPermission('updatePost');
    //    $updatePost->description = 'Update post';
    //    $auth->add($updatePost);

        // добавляем роль "author" и даём роли разрешение "View"
    //    $author = $auth->createRole('author');
    //    $auth->add($author);
    //    $auth->addChild($author, $View);

        // добавляем роль "admin" и даём роли разрешение "updatePost"
        // а также все разрешения роли "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $View);
     //   $auth->addChild($admin, $author);
        $author = $auth->createRole('author');
        $auth->add($author);
        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
      //  $auth->assign($author, 2);
        $auth->assign($admin, 14);
      //  $auth->assign($author, 15);
        // add the rule
$rule = new \app\rbac\AdminRule;
$auth->add($rule);

// добавляем разрешение "ViewOwnNote" и привязываем к нему правило.
$ViewOwnNote = $auth->createPermission('ViewOwnNote');
$ViewOwnNote->description = 'View own note';
$ViewOwnNote->ruleName = $rule->name;
$auth->add($ViewOwnNote);

// "ViewOwnNote" будет использоваться из "View"
$auth->addChild($ViewOwnNote, $View);

// разрешаем "автору" обновлять его посты
$auth->addChild($author, $ViewOwnNote);
        
// добавляем разрешение "HistoryLogin"
        $HistoryLogin = $auth->createPermission('HistoryLogin');
        $HistoryLogin->description = 'HistoryLogin';
        $auth->add($HistoryLogin);
// добавляем  author разрешение "HistoryLogin"
        $auth->addChild($author, $HistoryLogin);
        
    }
}

?>