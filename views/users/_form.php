<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label("username") ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <p><b>Register as</b></p>
    <?php
    $data = [1 => 'Perusahaan', 2 => 'Komunitas', 3 => 'Institusi'];

    // Simple basic usage
    echo $form->field($model, 'level')->radioButtonGroup($data,['class' => 'vertical-center'])->label(false) ?>

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?= Yii::$app->session->getFlash('error'); ?>

</div>
