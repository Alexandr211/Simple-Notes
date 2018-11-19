<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Calendr]].
 *
 * @see \app\models\Calendr
 */
class CalendrQuery extends \yii\db\ActiveQuery
{
   public function withUser($userId) {
        return $this -> andWhere(['creator' -> $userId]);
    }
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Calendr[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Calendr|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
