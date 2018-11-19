<?php

namespace app\models;

use Yii;
use \app\models\query\CalendrQuery;

/**
 * This is the model class for table "calendr".
 *
 * @property int $id
 * @property string $text
 * @property int $creator
 * @property string $date_event
 *
 * @property User $creator0
 */
class Calendr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string'],
            [['creator'], 'integer'],
        //    [['date_event'], 'safe'],
        //    [['creator'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creator' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'creator' => 'Author',
            'date_event' => 'Date',
        ];
    }
   
    /** вызывается автоматически перед сохранением данных в базу
   * @param bool $insert
   * @return bool
    */
   public function beforeSave($insert) {
       if(!parent::beforeSave($insert)) {
           return false;
       }
    //проверяем, что запись новая и присваиваем создателя   
       if($insert) {
           $this->creator = Yii::$app->user->id;
       }
       return true;
   }
   /** вызывается автоматически при сохранении данных в базу
   * @param bool $skipIfSet
   * @return $this
    */ 
   //public function loadDefaultValues($skipIfSet = true) {
  //     $this->creator = Yii::$app->user->id;
 //      return parent::loadDefaultValues($skipIfSet);
 //  }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'creator']);
    }
    
    public static function find()
    {
        return new CalendrQuery(get_called_class());
    }
}
