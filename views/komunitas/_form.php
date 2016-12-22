<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Komunitas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="komunitas-form">
    <div class="row ">
        <div class="col-sm-3">
            <?php
            //            echo "<b>Foto Profil</b><br>";
            //            echo FileInput::widget([
            //                'model' => $model,
            //                'attribute' => 'gambar',
            //                'pluginOptions' => [
            //                    'showCaption' => false,
            //                    'showRemove' => false,
            //                    'showUpload' => false,
            //                    'browseClass' => 'btn btn-primary btn-block',
            //                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            //                    'browseLabel' =>  'Select Photo'
            //                ],
            //                'options' => ['accept' => 'image/*']
            //            ]);
            ?>
        </div>
        <div class="col-sm-6">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'tanggal')->input('date'); ?>

            <?= $form->field($model, 'cabang')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
