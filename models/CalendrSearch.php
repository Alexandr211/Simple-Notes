<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Calendr;
use app\components\AuthBehavior;
//use yii\data\Sort;

/**
 * CalendrSearch represents the model behind the search form of `app\models\Calendr`.
 */
class CalendrSearch extends Calendr
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'creator'], 'integer'],
            [['text', 'date_event'], 'safe'],
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
        $query = Calendr::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [],
                'defaultOrder' => [
                    'date_event' => SORT_DESC,       
                ]
            ], 
            
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
            'creator' => $this->creator,
            'date_event' => $this->date_event,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);
        
        if (!\Yii::$app->user->can('View')) {
        $idAuth = Yii::$app->user->id;                   
        $query->andFilterWhere(['like', 'creator', $idAuth]);   
            return $dataProvider;
        }
// $query -> count(); Общее кол-во записей
//$query -> all; все данные  
// $query -> joinWith("user");
// $query -> andFilterWhere("user.username" => "test");
        else {
            return $dataProvider;  
        }
        
    }
       
}
