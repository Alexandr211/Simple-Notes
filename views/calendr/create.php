<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Calendr */

$this->title = 'Create a new Note';
$this->params['breadcrumbs'][] = ['label' => 'My Notes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
