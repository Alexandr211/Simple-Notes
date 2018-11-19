<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CalendrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Notes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create a new Note', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'text:html',
            [
                'attribute' => 'creator',
                //'header' => 'Author',
                'filter' => \app\models\User::find()->indexBy('id')->select('username')->column(),
                'value' => function($model) {
                   /** @var $model \app\models\calendr */
                  //  return $model->user->username;
                    return html::a($model->user->username, ['user/view', 'id'=>$model->user->id]);
                },
                'format' => 'html'
            ],
           // [
         //      'attribute' => 'text', 
       //       'format' => 'html' 
        //    ],
            [
                'attribute' => 'date_event',
                'format' => ['date', 'php:Y-m-d'],
                'headerOptions' => ['style' => 'width:10%'],
            ],
            

            [
                'class' => 'yii\grid\ActionColumn',
                //добавил шаблоны
                'template' => '{view} {update} {delete}',
                'headerOptions' => ['style' => 'width:7%'],
   //             'buttons' => [
   //                 
   //             ] 
            ],
        ],
    ]); ?>
</div>
