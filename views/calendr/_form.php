<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use moonland\tinymce\TinyMCE;

/* @var $this yii\web\View */
/* @var $model app\models\Calendr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendr-form">

    <?php $form = ActiveForm::begin(); ?>

  <!--   $form->field($model, 'text')->textarea(['rows' => 6]) -->
   
    <?= $form->field($model, 'text')->widget(TinyMCE::className(), [
	'toggle' => [
		'active' => true,
	],
    'showAdvancedImageTab' => false, 
    'plugins' => ['template paste textcolor']
]); ?>

    
<!-- вверху вместо textInput() -->
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

   <!-- $form->field($model, 'creator')->textInput() 
   //  $form->field($model, 'date_event')->widget(\yii\jui\DatePicker::className(), [
    'dateFormat' => "dd.MM.yyyy",
    'language'
=> 'ru']) -->