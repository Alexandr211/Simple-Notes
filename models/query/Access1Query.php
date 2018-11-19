<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Access1]].
 *
 * @see \app\models\Access1
 */
class Access1Query extends \yii\db\ActiveQuery
{
    
     public function withUser($userId) {
        return $this -> andWhere(['user_id' -> $userId]);
    }
    
     public function withNote($noteId) {
        return $this -> andWhere(['note_id' -> $noteId]);
    }
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Access1[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Access1|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
