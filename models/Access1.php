<?php

namespace app\models;

use Yii;
use \app\models\query\Access1Query;

/**
 * This is the model class for table "access1".
 *
 * @property int $id
 * @property int $note_id
 * @property int $user_id
 *
 * @property User $note
 * @property User $user
 */
class Access1 extends \yii\db\ActiveRecord
{
    const ACCESS_NO = 0;
    const ACCESS_GUEST = 1;
    const ACCESS_CREATOR = 2;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'access1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['note_id', 'user_id'], 'required'],
            [['note_id', 'user_id'], 'integer'],
            [['note_id'], 'exist', 'skipOnError' => true, 'targetClass' => Calendr::className(), 'targetAttribute' => ['note_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'note_id' => 'Note ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendr()
    {
        return $this->hasOne(Calendr::className(), ['id' => 'note_id']);
    }
    
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\Access1Query the active query used by this AR class.
     */
    public static function find()
    {
        return new Access1Query(get_called_class());
    }
    
    public static function checkAccess(Calendr $model, $userId)
    {
        if(Yii::$app->user->isGuest) {
            return Access1::ACCESS_NO;
        }
        //является ли текущий пользователь создателем
        if($model->creator === $userId) {
            return Access1::ACCESS_CREATOR;
        }
        //проверяем наличие доступа у пользователя
        $existsAccess1 = Access1::find()
        ->withUser($userId)
        ->withNote($model->id);
       // ->exists();
        if($existsAccess1 === 0) {
            return Access1::ACCESS_GUEST;
        }
        //доступа нет
        return Access1::ACCESS_NO;
    }
}
