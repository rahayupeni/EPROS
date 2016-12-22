<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KomunitasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="komunitas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idkomunitas') ?>

    <?= $form->field($model, 'iduser') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'usia') ?>

    <?php // echo $form->field($model, 'cabang') ?>

    <?php // echo $form->field($model, 'gambar') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'bukti') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
