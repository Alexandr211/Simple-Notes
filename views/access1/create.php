<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Access1 */

$this->title = 'Create Access1';
$this->params['breadcrumbs'][] = ['label' => 'Access1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
