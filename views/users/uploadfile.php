<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;


/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">
    <div class="alert alert-success">
        <strong>Success!</strong> Silahkan upload file bukti perusahaan / komunitas / instansi anda
    </div>

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>
    <?= $form->field($model, 'imageFile[]')->widget(FileInput::classname(), [
        'options' => ['multiple' => true],
        'pluginOptions' => ['previewFileType' => 'any']
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton('Ok', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
