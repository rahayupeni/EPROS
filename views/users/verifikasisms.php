<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">
    <div class="alert alert-success">
        <strong>Success!</strong> Kode verifikasi anda telah dikirim pada sms nomor handphone yang anda daftarkan, silahkan cek kembali sms pada handphone anda.
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kodeverifikasi')->textInput(['maxlength' => true]) ?>
    <?= Yii::$app->session->getFlash('error'); ?>

    <div class="form-group">
        <?= Html::submitButton('Ok', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
