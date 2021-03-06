<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;
use Yii;


class User extends ActiveRecord implements IdentityInterface
{
   // public $id;
   // public $username;
    private static $password;
    private static $hashpass;
  //  public $authKey;
  //  public $accessToken;
   
    
    public static function tableName()
    {
        return 'user';
    }
    
    //private static $users = Yii::$app->db->createCommand('SELECT id, username, password FROM users')->queryAll();
          
    
  //   private static $users = [
     //     '100' => 
     //    [
     //       'id' => '100',
     //       'username' => 'admin',
    //        'password' => 'admin',
     //       'authKey' => 'test100key',
     //       'accessToken' => '100-token',
     //  ]
    //    ];
  //      '101' => [
   //         'id' => '101',
   //         'username' => 'demo',
   //         'password' => 'demo',
   //         'authKey' => 'test101key',
   //         'accessToken' => '101-token',
   //     ],
  //  ];


    /**
     * {@inheritdoc}
     */
    
         
      
    public static function findIdentity($id)        
    {
    return static::findOne(['id'=>$id]);
   }
    
//    public static function findIdentity($id)        
//    {
//       return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
//   }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
     //   foreach (self::$users as $user) {
     //       if ($user['accessToken'] === $token) {
     //           return new static($user);
     //       }
     //   }

      //  return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
   
    
    public static function findByUsername($username)
    {
      // $users = User::findOne($username);
       // $pass = $users->hashpass;
      //  self::$password = $pass; 
       return static::findOne(['username' => $username]);
        
    }
    
 //    public static function findByUsername($username)
 //  {
  //       foreach (self::$users as $user) {
  //          if (strcasecmp($user['username'], $username) === 0) {
  //              return new static($user);
 //           }
  //      }

 //      return null;
//    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
    //    return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
    //    return $this->authKey === $authKey;
    }
    
   
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
    //$hash = Yii::$app->getSecurity()->generatePasswordHash($password);
    return Yii::$app->getSecurity()->validatePassword($password, $this->hashpass);
        //return $this->password === $hash;
    }
    
    public function setHash($password)
    {
        $this->hashpass = Yii::$app->getSecurity()->generatePasswordHash($password);
    }
}
 