
<?php

use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'label' => 'activity_name',
            'value' => $model[name],
        ],
        'body:html',
        [
            'label' => 'Автор',
            'value' => $model[id_user],
            'contentOptions' => ['class' => 'bg-red'],
            'captionOptions' => ['tooltip' => 'Tooltip'],
        ],
        'activity_start_timestamp:datetime',        
        'activity_end_timestamp:datetime'
    ],
]);
?>