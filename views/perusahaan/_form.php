<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Acara;
use app\models\Menerima;
use app\models\TimbalBalik;
use app\models\Sponsor;
use app\models\JangkaWaktu;
// or 'use kartikile\FileInput' if you have only installed yii2-widget-fileinput in isolation
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Perusahaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perusahaan-form">
    <div class="row">
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
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
            <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'tanggal')->input('date'); ?>

            <?= $form->field($model, 'cabang')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'acara')->checkboxList(ArrayHelper::map(acara::find()->all(),'idacara', 'acara'),array('empty' => 'Pilih Level Anda')) ?>

            <?= $form->field($model, 'menerima')->checkboxList(ArrayHelper::map(menerima::find()->all(),'idmenerima', 'menerima'),array('empty' => 'Pilih Level Anda'), ['placeholder' => "Alamat perusahaan"]) ?>

            <?= $form->field($model, 'jangka_waktu')->dropDownList(ArrayHelper::map(jangkawaktu::find()->all(),'idjangka', 'jangka'),array('empty' => 'Pilih Level Anda'), ['placeholder' => "Alamat perusahaan"]) ?>

            <?php
            $data = ArrayHelper::map(sponsor::find()->all(),'idsponsor', 'sponsor');
            // Tagging support Multiple
            // initial value
            echo $form->field($model, 'sponsor')->widget(Select2::classname(), [
                'data' => $data,
                'options' => ['placeholder' => 'Select a color ...', 'multiple' => true],
                'pluginOptions' => [
                    'tags' => true,
                    'tokenSeparators' => [',', ' '],
                    'maximumInputLength' => 10
                ],
            ]);

            ?>

            <?php
            $data1 = ArrayHelper::map(timbalbalik::find()->all(),'idtimbal', 'timbal');
            // Tagging support Multiple
            // initial value
            echo $form->field($model, 'timbal_balik')->widget(Select2::classname(), [
                'data' => $data1,
                'options' => ['placeholder' => 'Select a color ...', 'multiple' => true],
                'pluginOptions' => [
                    'tags' => true,
                    'tokenSeparators' => [',', ' '],
                    'maximumInputLength' => 10
                ],
            ]);

            ?>

            <?php 
//            echo "<b>Foto Profil</b><br>";
//            echo FileInput::widget([
//                'model' => $model,
//                'attribute' => 'bukti[]',
//                'pluginOptions' => [
//                    'showCaption' => false,
//                    'showRemove' => false,
//                    'showUpload' => false,
//                    'browseClass' => 'btn btn-primary btn-block',
//                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
//                    'browseLabel' =>  'Select Photo'
//                ],
//                'options' => [
//                    'multiple' => true,
//                    'accept' => 'image/*'
//                ]
//            ]);
            ?>
      </div>
        <div class="col-sm-3">
            </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
