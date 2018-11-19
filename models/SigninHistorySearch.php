<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SigninHistory;

/**
 * SigninHistorySearch represents the model behind the search form of `app\models\SigninHistory`.
 */
class SigninHistorySearch extends SigninHistory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['name', 'date_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SigninHistory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'date_time' => $this->date_time,
        ]);
        if($this->name){
          //  $idAuth = Yii::$app->user->id;
          //  $query->andFilterWhere(['like', 'user_id', $idAuth]);
            $idAuth = $this->name;
            $query -> joinWith("user");
            $query -> andFilterWhere(["user.username" => $idAuth]);
        }
       
     // добавляем фильтр отображения записей по правам: Админ - смотрит все, остальные только свои
        if (!\Yii::$app->user->can('View')) {
        $idAuth = Yii::$app->user->id;                   
        $query->andFilterWhere(['like', 'user_id', $idAuth]); 
        return $dataProvider;
    }
      else {   

        return $dataProvider;
    }
}
}
