<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Teman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teman-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ini')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'denganini')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
