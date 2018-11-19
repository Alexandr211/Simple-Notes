<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CalendrSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'text') ?>

    <?= $form->field($model, 'creator') ?>

    <?= $form->field($model, 'date_event')->widget(\yii\jui\DatePicker::classname(), [
      'language' => 'ru',
      'dateFormat' => 'yyyy-MM-dd',
  ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
