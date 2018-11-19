<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SigninHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'History of Log In';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="signin-history-index">

    <h1><?= Html::encode($this->title) ?></h1>
  <!--   echo $this->render('_search', ['model' => $searchModel]); -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
               'attribute' => 'name', 
                'value' => function($model) {
                    return Html::a($model->user->username, ['user/view', 'id' => $model->user_id], ['target' => 'blank']);
                },
               'format' => 'raw', 
            ],
            [
                'attribute' => 'user_id',
                'value' => function($model) {
                    return Html::a($model->user->username, ['user/view', 'id' => $model->user_id], ['target' => 'blank']);
                
                },
                'format' => 'raw',
                'visible' => false,
            ],
            'date_time',        
        ],
    ]); ?>
</div>
