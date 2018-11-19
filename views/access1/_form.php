<?php
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Access1 */
/* @var $form yii\widgets\ActiveForm */
$userList = User::find()->select('username')->indexBy('id')->column();
?>

<div class="access1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'note_id')->hiddenInput()?>

    <?= $form->field($model, 'user_id')->DropDownList($userList) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
