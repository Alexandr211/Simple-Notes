<?php
namespace app\models;
use yii\base\Model;
use app\models\User;
use Yii;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $passagain;
    //public $test;
    public $rememberMe = true;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This login already exists.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email already exists.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['passagain', 'required'],
            ['passagain', 'string', 'min' => 6],
            ['passagain', 'validatePassagain'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            
            
        ];
    }
    
     public function validatePassagain($attribute, $params, $validator)
    {
        if (!$this->hasErrors()) {
            
            if (!in_array($this->$attribute, [$this->password])) {
            $this->addError($attribute, 'The password again is incorrect !');
        }
        }
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = $this->password;
        $user->setHash($this->password);
        $user->save(false);
        
        // следующие три строки ля установления RBAC:
        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('author');
        $auth->assign($authorRole, $user->getId());
                
        //return $user->save() ? $user : null;
        return $user ? $user : null;
    }
}